<footer>
    <div class="footer">
        <div class="container">
            <div class="footer-box">
                <div class="row footer-row-resp">
                    <div class="col-lg-4 col-md-4 col-8 p-r-01 hidden-responsive-footer-2">
                        <div class="footer-logo-box">
                            <a href="/{{ app()->getLocale() }}" class="f-logo">
                                <img src="/website/assets/img/footer-logo.svg" alt="footer-logo">
                            </a>
                            <div class="text">
                                {{settings('footer_text')}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-5 col-7 p-r-01">
                        <div class="footer-contact-info">
                            <h1>{{ __('website.contact_information') }}</h1>
                            <ul>
                                <li>
                                    
                                    <a href="{{settings('address')}}" target="_blank">  {{trans('website.address')}}</a>
                                </li>
                                <li>
                                    <a href="tel:{{settings('phone')}}">{{settings('phone')}}</a>
                                </li>
                            
                                <li>
                                    <a href="mailto:{{settings('email')}}">{{settings('email')}}e</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-3 col-6 hidden-responsive-footer p-r-01">
                        <div class="footer-links">
                            <ul>
                                @foreach ($footerSections as $key => $fsection)
                                <li>
                                    <a href="/{{ $fsection->getFullSlug() }}">{{ strtoupper($fsection[app()->getlocale()]->title) }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-5 p-r-01">
                        <div class="footer-message-box">
                            <div class="hidden-footer-logo-resp">
                                <a href="/{{ app()->getLocale() }}">
                                    <img src="/website/assets/img/footer-logo.svg" alt="footer-logo">
                                </a>
                            </div>
                            <div class="footer-socails">
                                <a href="mailto:{{settings('email')}}" class="f-soc-icon">
                                    <span class="icon-mail"></span>
                                </a>
                                <a href="{{settings('facebook')}}" class="f-soc-icon">
                                    <span class="icon-fb"></span>
                                </a>
                                <a href="{{settings('instagram')}}" class="f-soc-icon">
                                    <span class="icon-instagram"></span>
                                </a>
                            </div>
                            <div class="text">
                                {{settings('footer_description')}}
                            </div>
                            <a href="/{{ $contact->getFullSlug() }}" class="footer-a">
                                {{ __('website.Contact_Us') }}
                            </a>
                        </div>
                    </div> 
                </div>
                 
            </div>
        </div>
    </div>
     <div class="create-box">
        <div class="container create-cont">
            <div class="create">
                <span>{{trans('admin.COPYRIGHT')}}</span>
                <a href="https://ideadesigngroup.ge/ka" class="title">{{trans('admin.MADE_BY_IDEA')}}</>
            </div>
        </div> 
     </div>
   </footer>
