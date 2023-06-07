<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Post;
use App\Models\Subscription;
use App\Models\PostFile;
use App\Models\PostTranslation;
use App\Models\SectionTranslation;
use Illuminate\Support\Facades\Storage;
use App\Mail\NewsletterMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostController extends Controller
{
    public function index($sec){
        $section = Section::where('id', $sec)->with('translations')->first();

        if (isset($section->type) && in_array($section->type['type'], [1, 4, 2] ) ) {
            $post = Post::where('section_id', $sec)->with(['translations', 'slugs'])->first();
            if (isset($post) && $post !== null) {
                return Redirect::route('post.edit', [app()->getLocale(), $post->id,]);
            }
            return Redirect::route('post.create', [app()->getLocale(), $sec,]);
        }   
        $posts = Post::where('section_id', $sec)->orderBy('date', 'desc')->orderBy('created_at', 'asc')
		->join('post_translations', 'posts.id', '=', 'post_translations.post_id')
		->where('post_translations.locale', '=', app()->getLocale())
        
		->select('posts.*', 'post_translations.text', 'post_translations.desc', 'post_translations.title', 'post_translations.locale_additional', 'post_translations.slug');
       
		$posts = $posts->with(['translations', 'slugs'])->paginate(settings('Paginate'));
        return view('admin.posts.list', compact(['section', 'posts']));
    }

    public function create($sec){
        $section = Section::where('id', $sec)->with('translations')->first();
        return view('admin.posts.add', compact(['section']));
    }



    public function store($sec, Request $request){
        $section = Section::where('id', $sec)->with('translations')->first();
        $values = $request->all();
        $values['section_id'] = $sec;
        $values['author_id'] = auth()->user()->id;
        $postFillable = (new Post)->getFillable();
        $postTransFillable = (new PostTranslation)->getFillable();
        if(isset($values['icon']) && ($values['icon'] != '')){
            $newiconName = uniqid() . "." . $values['icon']->getClientOriginalExtension();
            $values['icon']->move(config('config.file_path'), $newiconName );
            $values['icon'] = '';
            $values['icon'] = $newiconName;
        }elseif(isset($values['old_icon'])){
            $values['icon'] = $values['old_icon'];
        }
        $values['additional'] = getAdditional($values, array_diff(array_keys($section->fields['nonTrans']) , $postFillable) );
        foreach(config('app.locales') as $locale){
            if($values[$locale]['slug'] != ''){
                $values[$locale]['slug'] = SlugService::createSlug(PostTranslation::class, 'slug', $values[$locale]['slug']);
                $values[$locale]['slug'] = SlugService::createSlug(SectionTranslation::class, 'slug', $values[$locale]['slug']);
            }else{
                $values[$locale]['slug'] = SlugService::createSlug(PostTranslation::class, 'slug', $values[$locale]['title']);
            }
           
            if(isset($values[$locale]['file']) && $values[$locale]['file'] != ''){
                $newfileName = uniqid() . "." . $values[$locale]['file']->getClientOriginalExtension();
                $orignalName = $values[$locale]['file']->getClientoriginalname();
                $values[$locale]['file']->move(config('config.file_path'), $newfileName );
                $values[$locale]['file'] = '';
                $values[$locale]['file'] = $newfileName;
                $values[$locale]['filename'] = $orignalName;
                if (isset($values[$locale]['old_file'])) {
                    // Delete the old file if it exists
                    Storage::delete(config('config.file_path') . $values[$locale]['old_file']);
                }
            }
            $fullslug[$locale] = $locale.'/'.$values[$locale]['slug'];
            $values[$locale]['locale_additional'] = getAdditional($values[$locale], array_diff(array_keys($section->fields['trans']), $postTransFillable) );   
        }
        $post = Post::create($values); 
        $request->flash();
        Session::flash('success_message', 'Post successfully saved!');
        foreach(config('app.locales') as $locale){
            $post->slugs()->create([
                'fullSlug' => $locale.'/'.$post->translate($locale)->slug,
                'locale' => $locale
            ]);
        }   
       
        if (isset($values['files']) && count($values['files']) > 0) {		
            foreach($values['files'] as $key => $files){
				foreach($files['file'] as $k => $file){
					$postFile = new PostFile;
					$postFile->type = $key;
					$postFile->file = $file;
					$postFile->title = $values['files'][$key]['desc'][$k];
					$postFile->post_id = $post->id;
					$postFile->save();
				}
            }
        }   
        return redirect()->route('post.edit', [app()->getLocale(), $post->id]);
    }

    public function edit($id){  
        $post = Post::where('id', $id)->with(['translations', 'files'])->first();
       
        $section = Section::where('id', $post->section_id)->with('translations')->first();
       
        return view('admin.posts.edit', compact('section', 'post'));
    }


 
       public function update($id, Request $request){
       
        $post = Post::where('id', $id)->with('translations','files')->first();
        
        $section = Section::where('id', $post->section_id)->with('translations')->first();

        Post::find($id)->slugs()->delete();

        $values = $request->all();
      
        $postFillable = (new Post)->getFillable();
        $postTransFillable = (new PostTranslation)->getFillable();

        if(isset($values['image']) && ($values['image'] != '')){

            $file_name = uniqid() . '.' .$values['image'] ->getClientOriginalExtension();
            // Generate Thumbnail
            Image::make($values['image'])->fit(config('config.thumbnail.width'), config('config.thumbnail.height'))
            ->save(config('config.image_path') . config('config.thumb_path') . $file_name, 70);
        
            // Save original image
            Image::make($values['image'] )->save(config('config.image_path') .  $file_name, 70);
            $values['thumb'] = '';
            $values['thumb'] = $file_name;
           
        }
       
        if(isset($values['old_image'])){
            $values['thumb'] = $values['old_image'];
            if(file_exists(config('config.image_path').$values['old_image'])){
                unlink(config('config.image_path').$values['old_image']);
                unlink(config('config.image_thumb_path').$values['old_image']);
                }
            
        }

      
        $values['additional'] = getAdditional($values, array_diff(array_keys($section->fields['nonTrans']), $postFillable) );

       
        foreach(config('app.locales') as $locale){
            if($values[$locale]['slug'] != $post[$locale]->slug){
                $values[$locale]['slug'] = SlugService::createSlug(PostTranslation::class, 'slug', $values[$locale]['slug']);
            }
        
            // Handle file upload for this language
            if(isset($values[$locale]['file']) && ($values[$locale]['file'] != '')){
                $newfileName = uniqid() . "." . $values[$locale]['file']->getClientOriginalExtension();
                $values[$locale]['file']->move(config('config.file_path'), $newfileName);
                $values[$locale]['file'] = $newfileName;
            } elseif(isset($values[$locale]['old_file'])){
                $values[$locale]['file'] = $values[$locale]['old_file'];
            } else {
                $values[$locale]['file'] = $post[$locale]->file; // reuse existing file
            }
        
            // Update database record for this language
            $post->translateOrNew($locale)->fill([
                'title' => $values[$locale]['title'],
                'slug' => $values[$locale]['slug'],
                'file' => $values[$locale]['file'],
                'locale_additional' => getAdditional($values[$locale], array_diff(array_keys($section->fields['trans']), $postTransFillable))
            ])->save();
        
            // Update slug for this language
            $post->slugs()->updateOrCreate([
                'locale' => $locale
            ], [
                'fullSlug' => $locale.'/'.$post->translate($locale)->slug
            ]);
        }
        $allOldFiles = PostFile::where('post_id', $post->id)->get();
        
        foreach ($allOldFiles as $key => $fil) {
            if(isset($values['old_file']) && count($values['old_file']) > 0) {
            if(!in_array($fil->id, array_keys($values['old_file']))){
                $fil->delete();
            }
            }else{
                $fil->delete();
            }
        }

       
        Post::find($post->id)->update($values);
       
        $request->flash();
        Session::flash('success_message', 'Post successfully update!');
     
        
        return Redirect::route('post.update', [app()->getLocale(), $post->id,]);
    }


    public function destroy($id){

        $post = Post::where('id', $id)->first();
        // foreach (Post::find($id)->slugs()->get() as $slug) {

        //     // Post::find($id)->delete();
        // }
        $section = Section::where('id', $post->section_id)->with('translations')->first();

        $files = PostFile::where('post_id', $post->id)->get();
        foreach($files as $file){
           
            if(file_exists(config('config.image_path').$file->file)){
                unlink(config('config.image_path').$file->file);
                }else{
                dd('File does not exists.');
                }
                if(file_exists(config('config.image_path').'thumb/'.$file->file)){
                    unlink(config('config.image_path').'thumb/'.$file->file);
                    }else{
                    dd('File does not exists.');
                    }
            $file->delete();
        }
        PostTranslation::where('post_id', $post->id)->delete();
        Post::find($id)->slugs()->delete();
        $post->delete();
        return Redirect::route('post.list', [app()->getLocale(), $section->id,]);
    }

    
    public function DeleteFile(Request $request) {
        $lang = $request->lang;
        $que = $request->que;
        $post = Post::where('id', $que)->whereHas('translations',function ($q) use($lang) {

			    $q->where('locale', $lang);

			})->with('translation')->first();
            
        if(isset($post->translate()->locale_additional['file']) && file_exists(config('config.file_path').$post->translate()->locale_additional['file'])){
            unlink(config('config.file_path').$post->translate()->locale_additional['file']);       
        }
        if($post->$lang->locale_additional != ''){
            $data = json_decode($post->$lang->locale_additional, true);
            unset($data['file']);
            $post->$lang->locale_additional = $data;

            $post->save();
        }
        
        return response()->json(['success' => 'File Deleted']);
    }
    


     
         public function sendNewsletter($post)
         {
            $post = Post::where('id', $post)->with('translations','files')->first();
           
            $subscribers = Subscription::all();
           
            foreach ($subscribers as $subscriber) {
                Mail::to($subscriber->email)->queue(new NewsletterMail($post));
            }
     
             return redirect()->back()->with('success', 'Newsletter sent successfully!');
         }    
}