<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Post;
use App\Models\SectionTranslation;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public static function homePage($model, $locales = null)
	{
		
			if ($model == null) {
				$model = Section::where('type_id', 1)->first();
			}
			if ($locales == null) {
				$locales = [];
				foreach (config('app.locales') as $value) {
					$locales[$value] =  '/'.$value;
	
				}
			}
			
			$section = $model;

			$language_slugs = $model->getTranslatedFullSlugs();
			
			
            $vacancy = Section::where('type_id', 6)->with('translations')->first();

			$vacancy_posts = Post::where('section_id', $vacancy->id)->whereHas('translations',function ($q) {
				$q->whereActive(true)->whereLocale(app()->getLocale());
			})->orderBy('created_at', 'desc')->get();
			
            $popular_vacancy = Post::where('section_id', $vacancy->id)->whereHas('translations',function ($q) {

			$q->whereActive(true)->whereLocale(app()->getLocale());

			})->where('populars', 1)->first();

            $programs = Section::where('type_id', 3)->with('translations')->first();
			$programs_posts = Post::where('section_id', $programs->id)->whereHas('translations',function ($q) {
				$q->whereActive(true)->whereLocale(app()->getLocale());
			})->orderBy('created_at', 'desc')->get();
			
			$about = Section::where('type_id', 4)->with('translations')->first();

			$about_post = Post::where('section_id', $about->id)->whereHas('translation', function ($q) {
				$q->whereActive(true)->whereLocale(app()->getLocale());
			})->first();
			
				
		return view('website.home', compact('model','popular_vacancy','programs','vacancy_posts','programs_posts','section','about','about_post','vacancy','language_slugs'));
	
}
}
