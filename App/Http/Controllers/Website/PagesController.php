<?php



namespace App\Http\Controllers\Website;



use App\Http\Controllers\Controller;

use App\Models\User;

use App\Models\Banner;

use Illuminate\Http\Request;

use App\Models\Section;

use App\Models\SectionTranslation;

use App\Models\Subscription;

use App\Models\Post;

use App\Models\Product;

use App\Models\PostTranslation;

use App\Models\PostFile;

use App\Models\Slug;

use App\Models\Submission;

use App\Models\SubmissionFile;

use Illuminate\Support\Facades\Validator;

use Carbon\Carbon;

use Illuminate\View\View;

use DB;

use File;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Hash;



use function PHPUnit\Framework\isEmpty;



class PagesController extends Controller

{

	

	public static function index($model,Request $request)

	

	{

		



		if (request()->method() == 'POST') {

			$values = request()->all();

			

			$values['additional'] = getAdditional($values, config('submissionAttr.additional'));

			$submission = Submission::create($values);

			return redirect()->back()->with([

				'message' => trans('website.submission_sent'),

			]);

		}

		$section = $model;

		$language_slugs = $section->getTranslatedFullSlugs();

		// BreadCrumb ----------------------------

		$breadcrumbs = [];

		$breadcrumbs[] = [

			'name' => $model[app()->getlocale()]->title,

			'url' => $model->getFullSlug()

		];

		

		while ($section->parent_id !== null) {

			$section = Section::where('id', $model->parent_id)->with('translations')->first();

			$breadcrumbs[] = [

				'name' => $section->title,

				'url' => $section->getFullSlug()

			

			];		

		}

		

		$breadcrumbs = array_reverse($breadcrumbs);

	

		   switch ($model->type_id) {

       	 case 1:

            return HomePageController::homePage($model, $locales = null);

       	 case 2:

            return self::contact($model, $language_slugs);

       	 case 4:

            $post = Post::where('section_id', $model->id)->with('translations', 'files')->first();

            $vacancy = Section::where('type_id', 6)->with('translations')->with('posts')->first();

            $popular_vacancy = Post::where('section_id', $vacancy->id)->whereHas('translations',function ($q) {

				$q->whereActive(true)->whereLocale(app()->getLocale());

			})->where('populars', 1)->orderBy('created_at', 'desc')->first();

            return view('website.pages.text_page.index', compact('model','post',

                'language_slugs','breadcrumbs','vacancy','popular_vacancy'

            ));

        default:

            $posts = Post::where('section_id', $model->id)

                ->join('post_translations', 'posts.id', '=', 'post_translations.post_id')

                ->where('post_translations.locale', '=', app()->getLocale())
				
                ->select('posts.*', 'post_translations.text', 'post_translations.desc',  'post_translations.title', 'post_translations.locale_additional', 'post_translations.slug')
				->where('active', 1)->whereLocale(app()->getLocale())
                ->with('files')
                ->orderBy('date', 'desc')

                ->paginate(settings('paginate'));

            $vacancy = Section::where('type_id', 6)->with('translations')->with('posts')->first();

            $popular_vacancy = Post::where('section_id', $vacancy->id)->whereHas('translations',function ($q) {

			$q->where('active', 1);

			})->where('populars', 1)->first();

            $programs = Section::where('type_id', 3)->with('translations')->with('posts')->first();

            return view("website.pages.{$model->type['folder']}.index", compact('model','breadcrumbs','language_slugs',

                'posts','vacancy','popular_vacancy','programs'

            ));

    }

				

		return view("website.pages.{$model->type['folder']}.index", compact(['model', 'breadcrumbs',

		 'language_slugs','posts','vacancy','popular_vacancy','programs']));

	}

	public static function contact($model)

	{
		

		$breadcrumbs = [];

		$sec = $model;

		$breadcrumbs[] = [

			'name' => $model->translate(app()->getlocale())->title,

			'url' => $model->getFullSlug()

		];
		$language_slugs = $model->getTranslatedFullSlugs();
		

		while ($sec->parent_id !== null) {

			$sec = Section::where('id', $model->parent_id)->with('translations')->first();

			$breadcrumbs[] = [

				'name' => $sec->title,

				'url' => $sec->getFullSlug()

			];

		}
		$sec = Section::where('type_id', sectionTypes()['home']['id'])->with('translations')->first();

		$breadcrumbs[] = [

			'name' => $sec->title,

			'url' => $sec->getFullSlug()

		];

		$breadcrumbs = array_reverse($breadcrumbs);

		$submenu_sections = Section::where('parent_id', $model->id)->orderBy('order', 'asc')->get();

		$post = Post::where('section_id', $model->id)->whereHas('translations', function($q){

			$q->where('active', 1);

		})->first();

		return view("website.pages.contact.show", compact('model','language_slugs', 'submenu_sections', 'breadcrumbs','post'),['successMsg'=>'Contact form successfully send']);

	}

	public static function submenu($model)

	{

		$breadcrumbs = [];

		$sec = $model;

		$breadcrumbs[] = [

			'name' => $model->title,

			'url' => $model->getFullSlug()

		];

		while ($sec->parent_id !== null) {

			$sec = Section::where('id', $model->parent_id)->with('translations')->first();

			$breadcrumbs[] = [

				'name' => $sec->title,

				'url' => $sec->getFullSlug()

			];

		}

		$sec = Section::where('type_id', sectionTypes()['home']['id'])->with('translations')->first();



		$breadcrumbs[] = [

			'name' => $sec->title,

			'url' => $sec->getFullSlug()

		];

		$breadcrumbs = array_reverse($breadcrumbs);

		$submenu_sections = Section::where('parent_id', $model->id)->orderBy('order', 'asc')->get();



		return view("website.pages.submenu.index", compact('model', 'submenu_sections', 'breadcrumbs'));

	}

	public static function show($model)

	{		

		$post = $model;

		$language_slugs = $post->getTranslatedFullSlugs();

			// BreadCrumb ----------------------------

		$breadcrumbs = [];

		$breadcrumbs[] = [

			'name' => $model[app()->getLocale()]->title,

			'url' => $model->getFullSlug()

		];

		if ($model->section_id !== null) {

			$section = Section::where('id', $model->section_id)->with('translations')->first();

			$breadcrumbs[] = [

				'name' => $section->title,

				'url' => $section->getFullSlug()

			];

			while ($model->parent_id !== null) {

				$sec = Section::where('id', $section->section_id)->with('translations')->first();

		

				$breadcrumbs[] = [

					'name' => $sec->title,

					'url' => $sec->getFullSlug()

				];

			}

		}

		$breadcrumbs = array_reverse($breadcrumbs);

		$vacancy = Section::where('type_id', 6)->with('translations')->with('posts')->first();

		$programs = Section::where('type_id' , 3)->with('translations')->with('posts')->first();

				$popular_vacancy = Post::where('section_id', $vacancy->id)->whereHas('translations',function ($q) {

					$q->where('active', 1);

				})->where('populars', 1)->first();

		$post = Post::where('posts.id', $model->id)

			->join('post_translations', 'posts.id', '=', 'post_translations.post_id')

			->where('post_translations.locale', '=', app()->getLocale())

			->select('posts.*', 'post_translations.text', 'post_translations.desc',  'post_translations.title', 'post_translations.locale_additional', 'post_translations.slug')

			->with('files')->first();

		$model->views = $model->views + 1;

		$model->save();	

		$model->type_id = $model->parent->type_id;

		return view("website.pages.{$section->type['folder']}.show", [

			'model' => $model,

			'section' => $section,'post' => $post,

			'post' => $model,

			'breadcrumbs' => $breadcrumbs,'language_slugs' => $language_slugs,

			'vacancy' => $vacancy,

			'popular_vacancy' => $popular_vacancy,

			'programs' => $programs

		])->render();

	}



}
