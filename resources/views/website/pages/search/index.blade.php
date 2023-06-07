@extends('website.master')
@section('main')
<main>
    
    <div class="scroll-top-button">
        
    </div>

    <section>
        <div class="_banner">
            <div class="_banner-img">
                <img src="/website/assets/img/banner2.png" alt="banner">
            </div>
        </div>
    </section>
<section>
    <div class="container">
        <div class="brc-cont">
            <a href="/{{app()->getlocale()}}">{{ trans('website.home') }}</a>
            <span> 
                <svg xmlns="http://www.w3.org/2000/svg" width="10.07" height="17.14" viewBox="0 0 10.07 17.14">
                    <g id="right-arrow_1_" data-name="right-arrow (1)" transform="translate(-101.478)">
                    <g id="Group_213" data-name="Group 213" transform="translate(101.478)">
                        <path id="Path_140" data-name="Path 140" d="M111.274,7.9,103.647.274a.94.94,0,0,0-1.326,0l-.562.562a.939.939,0,0,0,0,1.326l6.405,6.405-6.412,6.412a.94.94,0,0,0,0,1.326l.562.561a.94.94,0,0,0,1.326,0l7.635-7.635a.946.946,0,0,0,0-1.331Z" transform="translate(-101.478 0)" fill="#29607e"/>
                    </g>
                    </g>
                </svg> 
            </span>
            <a href="#" class="active-brc">{{ __('website.search') }}</a>
        </div>
    
    </div> 
</section>
 
      
         
    <section>
        <div class="search-page-section"> 
            <div class="container">
                <div class="search-cont">
                    <form action="">
                         <div class="search-input-box">
                            <input type="text" class="form-controller" id="search" name="que" value="@if(isset($searchText)) {{$searchText}} @endif">
                            <button>
                                <span> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19.309" height="20" viewBox="0 0 19.309 20">
                                        <path id="search_2_" data-name="search (2)" d="M20,18.217l-4.76-4.951A8.072,8.072,0,1,0,9.059,16.15a7.989,7.989,0,0,0,4.626-1.461l4.8,4.988A1.053,1.053,0,1,0,20,18.217ZM9.059,2.107A5.968,5.968,0,1,1,3.091,8.075,5.975,5.975,0,0,1,9.059,2.107Z" transform="translate(-0.984)" fill="#488597"></path>
                                    </svg> 
                                </span>
                            </button>
                            <h3 class="result-text">
                                {{ __('website.Page_Results') }}:{{ $posts->total() }}
                            </h3>
                         </div>
                    </form>
                    <div class="results-box">
                        @foreach ($posts as $item)
                        <div class="result-item">
                            <h1>{!! strip_tags($item->translate(app()->getlocale())->title) !!} </h1>
                            <div class="text">
                                {!! strip_tags($item->translate(app()->getlocale())->text) !!}
                            </div>
                            <div class="read-more-box_0">
                                <h2>{!! strip_tags($item->parent->translate(app()->getlocale())->title) !!}</h2>
                                <a href="/{{ $item->getfullslug() }}">{{ __('website.See_All') }}</a>
                            </div>
                        </div> 
                        @endforeach
                    </div>
                    <div class="pagintaion_0">
                        @if (isset($posts) && count($posts) > 0)
                        {{ $posts->links('website.components.pagination') }}
                    @endif
                    </div>
                </div>
            </div> 
        </div>
    </section> 
      
    </main>
@endsection
