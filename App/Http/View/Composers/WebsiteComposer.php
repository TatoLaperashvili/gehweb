<?php

namespace App\Http\View\Composers;


use Illuminate\View\View;
use App\Models\Section;
use App\Models\Banner;
use App\Models\User;
use Carbon\Carbon;
class WebsiteComposer
{
    private $sections;
    private $footerSections;
    private $mainBanner;
    private $contact;
  

    public function __construct()
    {

        $this->sections = Section::whereHas('translations', function($q) {
            $q->whereActive(true)->whereLocale(app()->getLocale());
        })
        ->whereHas('menuTypes', function($q){
            $q->where('menu_type_id', 1);
        })->where('parent_id', null)
        ->orderBy('order', 'asc')
        ->get();


         $this->footerSections = Section::whereHas('translations', function($q) {
            $q->whereActive(true)->whereLocale(app()->getLocale());
        })
        ->whereHas('menuTypes', function($q){
            $q->where('menu_type_id', 2);
        })->where('parent_id', null)
        ->orderBy('order', 'asc')
        ->get();
        
        // $this->footerSections = Section::whereHas('translations', function($q) {
        //     $q->where('active' , 1)->whereLocale(app()->getLocale());
        // })->orderBy('order', 'asc')->limit(6)->get();
       
            $this->contact = Section::where('type_id', sectionTypes()['contact']['id'])->with('translations')->first();
            $this->mainBanner = Banner::whereHas('translations', function($q) {
                $q->where('active' ,1)->whereLocale(app()->getLocale());
            })->orderBy('date', 'desc')->get();
            
	

    }
    public function compose(View $view)
    {
        $view->with([
			'sections' => $this->sections,
			'footerSections' => $this->footerSections,
			'mainBanner' => $this->mainBanner,
			'sidebar_menu' => $this->footerSections,
            'contact' => $this->contact,
            
		]);
    }
}
