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

            <div class="brc-cont">

                <a href="/{{app()->getlocale()}}">{{ trans('website.home') }}</a>

                <span>

                    <svg xmlns="http://www.w3.org/2000/svg" width="10.07" height="17.14" viewBox="0 0 10.07 17.14">

                        <g id="right-arrow_1_" data-name="right-arrow (1)" transform="translate(-101.478)">

                            <g id="Group_213" data-name="Group 213" transform="translate(101.478)">

                                <path id="Path_140" data-name="Path 140"
                                    d="M111.274,7.9,103.647.274a.94.94,0,0,0-1.326,0l-.562.562a.939.939,0,0,0,0,1.326l6.405,6.405-6.412,6.412a.94.94,0,0,0,0,1.326l.562.561a.94.94,0,0,0,1.326,0l7.635-7.635a.946.946,0,0,0,0-1.331Z"
                                    transform="translate(-101.478 0)" fill="#29607e" />

                            </g>

                        </g>

                    </svg>

                </span>

                @foreach ($breadcrumbs as $breadcrumb)

                <a href="/{{ $breadcrumb['url'] }}" class="active-brc">{{ $breadcrumb['name'] }}</a>

                @endforeach

            </div>

        </div>

    </section>
    <section>

        <div class="contact-section">

            <div class="important-title">

                <img src="/website/assets/img/title-img.png" alt="title-img">

                <h1>{{ $post->translate(app()->getlocale())->title }}</h1>

            </div>

            <div class="container">

                <div class="contact-box">

                    <div class="left-contact">

                        <img src="/website/assets/img/Mask Group 154.png" alt="phone">

                        <div class="left-text-side-box">

                            <h1>{{ (__('website.contact_information')) }}</h1>

                            <ul>

                                <li>

                                    <a>{{ $post->translate(app()->getlocale())->adress }}</a>

                                </li>

                                <li>

                                    <a>{{ $post->phone }}</a>

                                </li>

                                <li>

                                    <a>{{ $post->mobile }}</a>

                                </li>

                                <li>

                                    <a>{{ $post->email }}</a>

                                </li>

                            </ul>

                            <img src="/website/assets/img/Group 184.png" alt="gourp">

                        </div>

                    </div>

                    <div class="right-contact">

                        <div class="right-cont-form-box">

                            <h1>{{ __('website.Write_to_us') }}</h1>

                            <form action="/{{app()->getlocale()}}/submission" method="POST"
                                enctype="multipart/form-data" onsubmit="showAlert(); return false;">

                                @csrf
                                <input type="hidden" name="post_id" value="{{ $model->id }}">

                                <div class="valid-input-box">
                                    <label for="">{{ __('admin.name') }}</label>
                                    <input type="text" name="name" placeholder="{{ __('admin.name') }}" autocomplete="off" required>
                                </div>

                                <input type="text" name="lastname" placeholder="{{ __('admin.lastname') }}" autocomplete="off">

                                <input type="text" name="phone" placeholder="{{ __('admin.phone') }}"autocomplete="off" >

                                <div class="valid-input-box">
                                    <label for="">{{ __('admin.email') }}</label>
                                    <input type="email" name="email" placeholder="{{ __('admin.email') }}" autocomplete="off" required>
                                </div>


                                <div class="valid-textarea-box">
                                    <label for="">{{ __('admin.text') }}</label>
                                    <textarea name="text" placeholder="{{ __('admin.text') }}" autocomplete="off" required></textarea>
                                </div>

                                <div class="contact-btn">

                                    <button>{{ __('website.Send') }}</button>
                                    @if(Session::has('message'))
                                         <p class="alert alert-info">{{ Session::get('message') }}</p>
                                    @endif
                                </div>
                                
                              

                            </form>
                         

                        </div>

                    </div>

                </div>

            </div>

        </div>
        <div class="alert alert-info" style="display:none;"> asdafqw</div>
        <div class="map-box">

            <div class="map">

                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2976.4481650714174!2d44.78855861567889!3d41.753994281150185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x404472827a931753%3A0xd8b6ae771b6e90f2!2s17%20Gvazauri%20St%2C%20T&#39;bilisi!5e0!3m2!1sen!2sge!4v1675941130759!5m2!1sen!2sge"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>

            </div>

        </div>

    </section>



</main>



@endsection