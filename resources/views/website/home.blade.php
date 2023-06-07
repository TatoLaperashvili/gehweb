@extends('website.master')

@section('main')
<main>
    <div class="scroll-top-button">

    </div>
  
    <section>
        <div class="programs-section">
            <div class="important-title">
                <img src="/website/assets/img/title-img.png" alt="title-img">
               
                <h1>{{$programs->translate(app()->getlocale())->title }}</h1>
                
            </div>
            <div class="container">
                <div class="programs-box">
                    @foreach($programs_posts as $post)
                   
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
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="vacancy-section" style="background-image: url('/website/assets/img/vacancy-background.png')"> 
            <div class="vacancy-blur"></div>
            <div class="vacancy-cont">
                <div class="container">
                    <div class="row row_resp_vacancy">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="vacancy-box">
                                <div class="important-title vacancy-title">
                                    <img src="/website/assets/img/title-img.png" alt="title-img"> 
                                    <h1>{{ $vacancy->translate(app()->getlocale())->title  }}</h1> 
                                </div> 
                                <div class="vacancy-type-list">
                                    @php
                                    $count = 0; 
                                @endphp
                                    @foreach($vacancy_posts as $post )

                                   
                                    @if($post->populars == 0 && $count < 4)
                                   
                                    <a href="/{{ $post->getFullSlug() }}" class="vacancy-item">
                                        <div class="icon-vacancy">
                                            <img src="/website/assets/img/vac-0000.svg" alt="icon">
                                        </div>
                                        <span>
                                            {{$post->translate(app()->getlocale())->title}}
                                        </span>
                                    </a>
                                    @endif
                                    @endforeach
                                  
                                </div>
                                <div class="see-all-link resp-link-show">
                                    <a href="/{{ $vacancy->getFullSlug() }}">
                                        {{ __('website.See_All') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-lg-6 col-md-6 col-sm-7 col-12 pos-rel">
                            @if(isset($popular_vacancy) && $popular_vacancy != '') 
                            <a href="/{{ $popular_vacancy->getFullSlug() }}" class="vacancy-right-box">
                                <div class="vacancy-right-img">
                                    <img src="{{ image($popular_vacancy->thumb) }}" alt="vacancy-img">
                                    <div class="vacancy-time-box">
                                        {{ $popular_vacancy->start_date }} - {{ $popular_vacancy->end_date }}
                                    </div>
                                </div>
                                <div class="vacancy-context">
                                    <h1>{{ $popular_vacancy->translate(app()->getlocale())->title }}</h1>
                                    <div class="text">
                                        {!!$popular_vacancy->translate(app()->getlocale())->desc   !!}
                                    </div>
             
                                    <ul class="vacancy-ul ">

                                            <div class="vacancy-li">

                                                <span class="icon-placeholder"></span>

                                                <p>{{ $popular_vacancy->translate(app()->getlocale())->adress }} </p>

                                            </div>

                                            <div class="vacancy-li">

                                                <span class="icon-money"></span>

                                                <p>{{ $popular_vacancy->translate(app()->getlocale())->workin_hours }}</p>

                                            </div>

                                            <div class="vacancy-li">

                                                <span class="icon-clock"></span>

                                                <p>{{ $popular_vacancy->translate(app()->getlocale())->position }}</p>

                                            </div>

                                            <div class="vacancy-li">

                                                <span class="icon-graduation-cap"></span>

                                                <p>{{ $popular_vacancy->translate(app()->getlocale())->daily_pay }}</p>

                                            </div>

                                            <div class="vacancy-li">

                                                <span class="icon-office-chair"></span>

                                                <p>{{ $popular_vacancy->translate(app()->getlocale())->Vacant_place }}</p>

                                            </div>

                                    </ul>
                                    <div class="vacancy-dots">
                                        <span>
                                            <img src="/website/assets/img/blue-dots.png" alt="dots">
                                        </span>
                                    </div>
                                </div>
                            </a>
                            @else
                            <a href="/{{ $vacancy->posts[0]->getFullSlug() }}" class="vacancy-right-box">
                                <div class="vacancy-right-img">
                                    <img src="{{ image($vacancy->posts[0]->thumb) }}" alt="vacancy-img">
                                    <div class="vacancy-time-box">
                                        {{ $vacancy->posts[0]->start_date }} - {{ $vacancy->posts[0]->end_date }}
                                    </div>
                                </div>
                                <div class="vacancy-context">
                                    <h1>{{ $vacancy->posts[0]->translate(app()->getlocale())->title }}</h1>
                                    <div class="text">
                                        {!!$vacancy->posts[0]->translate(app()->getlocale())->desc   !!}
                                    </div>
                                    <ul class="vacancy-ul">
                                        <div class="vacancy-li">
                                            <span class="icon-placeholder"></span>
                                            <p>{{ $vacancy->posts[0]->translate(app()->getlocale())->adress }} </p>
                                        </div>
                                        <div class="vacancy-li">
                                            <span class="icon-money"></span>
                                            <p>{{ $vacancy->posts[0]->translate(app()->getlocale())->daily_pay }}</p>
                                        </div>
                                        <div class="vacancy-li">
                                            <span class="icon-clock"></span>
                                            <p>{{ $vacancy->posts[0]->translate(app()->getlocale())->workin_hours }}</p>
                                        </div>
                                        <div class="vacancy-li">
                                            <span class="icon-graduation-cap"></span>
                                            <p>{{ $vacancy->posts[0]->translate(app()->getlocale())->Vacant_place }}</p>
                                        </div>
                                        <div class="vacancy-li">
                                            <span class="icon-office-chair"></span>
                                            <p>{{ $vacancy->posts[0]->translate(app()->getlocale())->position }} (Kassierer/in)</p>
                                        </div>
                                    </ul>
                                    <div class="vacancy-dots">
                                        <span>
                                            <img src="/website/assets/img/blue-dots.png" alt="dots">
                                        </span>
                                    </div>
                                </div>
                            </a>
                            @endif
                         
                           
                            <div class="see-all-link">
                                <a href="/{{ $vacancy->getFullSlug() }}">
                                    {{ __('website.See_All') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </section>
    @if(Session::has('subscribe'))
    <p class="alert alert-info">{{ Session::get('subscribe') }}</p>
    @endif
 
    <section>
        <div class="home-about-us-section">
            <div class="about-us-home">
                <div class="container">
                    <div class="about-relatve-cont">
                        <div class="left-about-box">
                            <div class="important-title about-section-title">
                                <img src="/website/assets/img/title-img.png" alt="title-img">
                                <h1>{{ $about->translate(app()->getlocale())->title  }}</h1>
                            </div>
                            <a href="/{{ $about->getFullSlug() }}" class="__about-left-image-box">
                                <img src="{{ image($post->thumb) }}" alt="about">
                                @if($about_post != null)
                                <div class="__left-about-text">
                                    <h1>{{ $about_post->translate(app()->getlocale())->title  }}</h1>
                                    <div class="text">
                                        {!! $about_post->translate(app()->getlocale())->desc  !!}
                                    </div>
                                    <div class="about-dots">
                                        <img src="/website/assets/img/about-dots.svg" alt="about">
                                    </div>
                                </div>
                                @endif
                            </a>
                          
                        </div> 
                        <div class="right-about-box">
                            <div class="right-about-image">
                                <img src="/website/assets/img/about2.png" alt="about2">
                            </div>
                            <div class="backgournd-about-blur"></div>
                            <div class="about-subscribe-box">
                               
                                <h2>{{ __('website.subscribe_news') }}</h2>
                                <form action="/{{ app()->getlocale() }}/subscribe" class="about-form" method="post">
                                    @csrf
                                    <input type="email"  name="email" id="email" placeholder="">
                                    <button>
                                        <span> 
                                            <svg id="Group_213" data-name="Group 213" xmlns="http://www.w3.org/2000/svg" width="20" height="34.043" viewBox="0 0 20 34.043">
                                                <path id="Path_140" data-name="Path 140" d="M120.935,15.693,105.785.544a1.866,1.866,0,0,0-2.634,0l-1.116,1.115a1.865,1.865,0,0,0,0,2.634l12.721,12.721L102.022,29.75a1.867,1.867,0,0,0,0,2.634l1.116,1.115a1.866,1.866,0,0,0,2.634,0l15.164-15.163a1.879,1.879,0,0,0,0-2.643Z" transform="translate(-101.478 0)" fill="#fff"/>
                                            </svg> 
                                        </span>
                                    </button>
                                    
                                </form>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</main>
@endsection
