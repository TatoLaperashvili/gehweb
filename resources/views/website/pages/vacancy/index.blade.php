@extends('website.master')
@section('main')

<main>

    <div class="scroll-top-button">
        
    </div>

    <section>
        <div class="_banner">
            <div class="_banner-img">
                <img src="{{ image($model->cover) }}" alt="banner">
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            @foreach ($breadcrumbs as $breadcrumb)
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
                <a href="/{{ $breadcrumb['url'] }}" class="brc-active">{{ $breadcrumb['name'] }}</a>
            </div>
            @endforeach
        </div> 
    </section>
    <section>
        <div class="vacancy-page-section_12">
            <div class="container">
                <div class="important-title">
                    <img src="/website/assets/img/title-img.png" alt="title-img">
                    <h1>{{ $model->translate(app()->getlocale())->title }}</h1>
                </div>
                <div class="row resp-row-03">
                    @foreach($posts as $post)
                    <div class="col-lg-6 col-md-6 col-12 pos-rel">
                        <div class="vacancy-right-box">
                            <a href="/{{ $post->getFullSlug()  }}" class="vacancy-right-img vacancy-right-img_01">
                                <img src="{{ image($post->thumb) }}" alt="vacancy-img">
                                <div class="vacancy-time-box">
                                {{ $post->start_date }} - {{ $post->end_date }}
                                </div>
                                <div class="vacancy-top-fixed-box">
                                    <div class="img-fix-box_1">
                                        <img src="/website/assets/img/vac-0000.svg" alt="cap">
                                    </div>
                                    <h1>{{ $post->translate(app()->getlocale())->title }}</h1>
                                </div>
                            </a>
                            <div class="vacancy-context vacancy-context_2">
                                <h1> {{$post->translate(app()->getlocale())->field_of_employment}}</h1>
                                <div class="text">
                                    {!! $post->translate(app()->getlocale())->desc !!}
                                </div>
                                <ul class="vacancy-ul v-det-ul">

                                    <div class="vacancy-li">

                                        <span class="icon-placeholder"></span>

                                        <a>{{ $post->translate(app()->getlocale())->adress }} </a>

                                    </div>

                                    <div class="vacancy-li">

                                        <span class="icon-money"></span>

                                        <a>{{ $post->translate(app()->getlocale())->daily_pay }}</a>

                                    </div>

                                    <div class="vacancy-li">

                                        <span class="icon-clock"></span>

                                        <a>{{ $post->translate(app()->getlocale())->workin_hours }}</a>

                                    </div>

                                    <div class="vacancy-li">

                                        <span class="icon-graduation-cap"></span>

                                        <a>{{ $post->translate(app()->getlocale())->position }}</a>

                                    </div>

                                    <div class="vacancy-li">

                                        <span class="icon-office-chair"></span>

                                        <a>{{ $post->translate(app()->getlocale())->Vacant_place }}</a>

                                    </div>

                                </ul>

                                <div class="vacancy-dots">
                                    <a href="/{{ $post->getFullSlug() }}">
                                        <img src="/website/assets/img/blue-dots.png" alt="dots">
                                    </a>
                                </div>
                            </div>
                        </div> 
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="pagintaion_0">
              
                {{ $posts->links('website.components.pagination') }}
              
            </div>
        </div>
    </section>    
    <section>
        <div class="programs-section programs-section_01">
            <div class="important-title">
                <img src="/website/assets/img/title-img.png" alt="title-img">
                <h1>{{ $programs->translate(app()->getlocale())->title }}</h1>
            </div>
            <div class="container">
                <div class="programs-box">
                    @forelse ($programs->posts as $post )
                    <a href="/{{ $post->getFullSlug() }}" class="program-item">
                        <div class="p-item" style="background-image: url('{{ image($post->thumb) }}')"></div>
                        <div class="program-text-box">
                            <h1 class="hover-title">{{ $post->translate(app()->getlocale())->title }}</h1>
                            <div class="program-text"> 
                                <div class="p-text-icon">
                                    <img src="/website/assets/img/3.svg" alt="home">
                                </div>
                                <h2>{{ $post->translate(app()->getlocale())->title }}</h2>
                                <div class="text">
                                    {!! $post->translate(app()->getlocale())->desc !!}
                                </div>
                                <span>
                                    <img src="/website/assets/img/dots.svg" alt="dots">
                                </span>
                            </div>
                        </div>
                    </a>
                    @empty
                        
                    @endforelse
                   
                 
                </div>
            </div>
        </div>
    </section>

   </main>


@endsection
