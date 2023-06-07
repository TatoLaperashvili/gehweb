
@if(isset($model)  && ($model->type_id == 1))
<div class="home_page_header" style="background-image: url('/website/assets/img/m-banner-background.png')">
    <div class="header-1-box">
        <div class="container">
            <div class="header_1">
                <div class="logo">
                    <a href="/{{ app()->getlocale() }}">
                        <img src="/website/assets/img/logo.svg" alt="logo">
                    </a>
                </div>
                <div class="right-side-info-header">
                    <div class="contact-info-header">
                        <a href="tel:{{settings('phone')}}">
                            <div class="icon_he_0">
                                <span class="icon-phone-call"></span>
                            </div>
                            +{{settings('phone')}}
                        </a>
                        <a href="{{settings('address')}}" target="_blank">
                            <div class="icon_he_0">
                                <span class="icon-placeholder"></span>
                            </div>
                            {{trans('website.address')}}
                        </a>
                    </div>
                   <div class="lang-box">
                       <div class="lang">
                            
                            <a href="@if (isset($language_slugs)) {{ asset($language_slugs[app()->getLocale()]) }} @else {{ app()->getLocale() }} @endif">{{ trans('website.'.app()->getLocale()) }}</a>
                            @foreach (config('app.locales') as $k => $value)
                          
                            @if ($value != app()->getLocale())
                            
                            <a href="@if (isset($language_slugs)) {{ asset($language_slugs[$value]) }} @else {{ $value }} @endif">{{ trans('website.'.$value) }}</a>
                            @endif
                       @endforeach
                        </div>
                     </div>
                    <div class="searc-box-header">
                        <form action="/{{ app()->getLocale() }}/search" method="GET" class="search-form">
                            <input type="text" placeholder="{{ trans('website.search') }}" name="que" value="@if(isset($que)) {{$que}} @endif">
                        
                            <button type="submit" class="button-search">
                                <span> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19.309" height="20" viewBox="0 0 19.309 20">
                                        <path id="search_2_" data-name="search (2)" d="M20,18.217l-4.76-4.951A8.072,8.072,0,1,0,9.059,16.15a7.989,7.989,0,0,0,4.626-1.461l4.8,4.988A1.053,1.053,0,1,0,20,18.217ZM9.059,2.107A5.968,5.968,0,1,1,3.091,8.075,5.975,5.975,0,0,1,9.059,2.107Z" transform="translate(-0.984)" fill="#488597"/>
                                    </svg> 
                                </span>
                            </button>
                              
                        
                        </form>
                    </div>
                </div>
                <div class="burger-lines">
                    <div class="br-line"></div>
                    <div class="br-line"></div>
                    <div class="br-line"></div>
                </div>
            </div>
        </div>
        <div class="burger-menu-box">
            <div class="burger-menu">
                <div class="burger-close-btn">
                    <div class="close-line"></div>
                    <div class="close-line"></div>
                </div>
                <div class="burger-lang">
                    @foreach (config('app.locales') as $k => $value)
                          
                   
                    <a href="@if (isset($language_slugs)) {{ asset($language_slugs[$value]) }} @else {{ $value }} @endif">{{ trans('website.'.$value) }}</a>
                 
                    <span> / </span>
               @endforeach
        
                </div>
                <form action="">
                    <input type="text" name="text">
                    <button>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="19.309" height="20" viewBox="0 0 19.309 20">
                                <path id="search_2_" data-name="search (2)" d="M20,18.217l-4.76-4.951A8.072,8.072,0,1,0,9.059,16.15a7.989,7.989,0,0,0,4.626-1.461l4.8,4.988A1.053,1.053,0,1,0,20,18.217ZM9.059,2.107A5.968,5.968,0,1,1,3.091,8.075,5.975,5.975,0,0,1,9.059,2.107Z" transform="translate(-0.984)" fill="#488597"></path>
                            </svg>
                        </span>
                    </button>
                </form>
                <ul class="burger-ul">
                    @foreach($sections as $section)
                    <li class="burger-li">
                        <a href="/{{ $section->getFullSlug() }}" class="burger-a"> {{ $section->translate(app()->getlocale())->title }}</a>
                    </li>
                    @endforeach
                </ul>
                <div class="burger-contact contact-info-header">
                    <a href="{{settings('phone')}}">
                        <div class="icon_he_0">
                            <span class="icon-phone-call"></span>
                        </div> 
                    </a>
                     <a href="{{settings('address')}}" target="_blank">
                            <div class="icon_he_0">
                                <span class="icon-placeholder"></span>
                            </div>
                            {{trans('website.address')}}
                        </a>
                </div>
            </div>
        </div>
    </div>
</div>
@else
    <div class="home_page_header another-page-header" >
        <div class="header-1-box header-box">
            <div class="container">
                <div class="header_1 header_01">
                    <div class="logo">
                        <a href="/{{ app()->getlocale() }}">
                            <img src="/website/assets/img/logo.svg" alt="logo">
                        </a>
                    </div>
                    <div class="right-header-nav-box">
                        <div class="right-side-info-header">
                            <div class="contact-info-header">
                                <a href="tel:{{settings('phone')}}">
                                    <div class="icon_he_0">
                                        <span class="icon-phone-call"></span>
                                    </div>
                                    +{{settings('phone')}}
                                </a>
                                <a href="{{settings('address')}}" target="_blank">
                                    <div class="icon_he_0">
                                        <span class="icon-placeholder"></span>
                                    </div>
                                    {{trans('website.address')}}
                                </a>
                            </div>
                             <div class="lang-box">
                                <div class="lang">
                            
                            <a href="@if (isset($language_slugs)) {{ asset($language_slugs[app()->getLocale()]) }} @else {{ app()->getLocale() }} @endif">{{ trans('website.'.app()->getLocale()) }}</a>
                            @foreach (config('app.locales') as $k => $value)
                          
                            @if ($value != app()->getLocale())
                            
                            <a href="@if (isset($language_slugs)) {{ asset($language_slugs[$value]) }} @else {{ $value }} @endif">{{ trans('website.'.$value) }}</a>
                            @endif
                       @endforeach
                        </div>
                             </div>
                            <div class="searc-box-header">
                                  <form action="/{{ app()->getLocale() }}/search" method="GET" class="search-form">
                            <input type="text" placeholder="{{ trans('website.search') }}" name="que" value="@if (isset($que)) {{$que}} @endif">
                        
                            <button type="submit" class="button-search">
                                <span> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19.309" height="20" viewBox="0 0 19.309 20">
                                        <path id="search_2_" data-name="search (2)" d="M20,18.217l-4.76-4.951A8.072,8.072,0,1,0,9.059,16.15a7.989,7.989,0,0,0,4.626-1.461l4.8,4.988A1.053,1.053,0,1,0,20,18.217ZM9.059,2.107A5.968,5.968,0,1,1,3.091,8.075,5.975,5.975,0,0,1,9.059,2.107Z" transform="translate(-0.984)" fill="#488597"/>
                                    </svg> 
                                </span>
                            </button>
                              
                        
                        </form>
                            </div>
                        </div>
                        <div class="nav-box">
                            <ul>
                                @foreach($sections as $section)
                                <li class="burger-li">
                                    <a href="/{{ $section->getFullSlug() }}" class="burger-li"> {{ $section->translate(app()->getlocale())->title }}</a>
                                </li>
                                @endforeach
                                
                            </ul>
                        </div>
                    </div>
                    <div class="burger-lines">
                        <div class="br-line"></div>
                        <div class="br-line"></div>
                        <div class="br-line"></div>
                    </div>
                </div>
            </div>
            <div class="burger-menu-box">
                <div class="burger-menu">
                    <div class="burger-close-btn">
                        <div class="close-line"></div>
                        <div class="close-line"></div>
                    </div>
                    <div class="burger-lang">
                        @foreach (config('app.locales') as $k => $value)
                              
                        @if ($value != app()->getLocale())
                        
                        <a href="@if (isset($language_slugs)) {{ asset($language_slugs[$value]) }} @else {{ $value }} @endif">{{ trans('website.'.$value) }}</a>
                        @endif
                        <span>/</span>
                   @endforeach
            
                    </div>
                    <form action="">
                        <input type="text" name="text">
                        <button>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="19.309" height="20" viewBox="0 0 19.309 20">
                                    <path id="search_2_" data-name="search (2)" d="M20,18.217l-4.76-4.951A8.072,8.072,0,1,0,9.059,16.15a7.989,7.989,0,0,0,4.626-1.461l4.8,4.988A1.053,1.053,0,1,0,20,18.217ZM9.059,2.107A5.968,5.968,0,1,1,3.091,8.075,5.975,5.975,0,0,1,9.059,2.107Z" transform="translate(-0.984)" fill="#488597"></path>
                                </svg>
                            </span>
                        </button>
                    </form>
                    <ul class="burger-ul">
                        @foreach($sections as $section)
                                <li class="burger-li">
                                    <a href="/{{ $section->getFullSlug() }}" class="burger-a"> {{ $section->translate(app()->getlocale())->title }}</a>
                                </li>
                                @endforeach
                    </ul>
                    <div class="burger-contact contact-info-header">
                        <a href="{{settings('phone')}}">
                            <div class="icon_he_0">
                                <span class="icon-phone-call"></span>
                            </div> 
                        </a>
                        <a href="{{settings('address')}}">
                            <div class="icon_he_0">
                                <span class="icon-placeholder"></span>
                            </div> 
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
