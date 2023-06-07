
@if(isset($model) && ($model->type_id == 1))
<div class="home-banner-container">
    <div class="home-banner-box">
        <div class="home-banner-image">
            <img src="{{ image($model->cover) }}" alt="banner-img">
        </div>
        <div class="home-banner-nav">
            <ul class="home-ul">
                @foreach($sections as $section)
                <li class="home-li">
                    <a href="/{{ $section->getFullSlug() }}" class="home-a">
                        {{ $section->translate(app()->getlocale())->title }}
                    </a>
                </li>
                @endforeach
             
            </ul>
        </div>
        <div class="home-banner-text" >
            <div class="text">
              {!! $model->translate(app()->getlocale())->desc !!}
            </div>
        </div>
    </div>
</div>
@endif

