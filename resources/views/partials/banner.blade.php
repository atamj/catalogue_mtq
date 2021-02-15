<div data-collapse="medium" data-animation="default" data-duration="400" role="banner" class="nav w-nav">
    <div class="nav__container">
        @if (env('APP_URL') === "https://catalogue.carrefour-martinique.com")
            @include('partials.header-carrefour')
        @elseif(env('APP_URL') === "https://catalogue.euromarche-martinique.com")
            @include('partials.header-euro')
        @else
            @include('partials.header')
        @endif
    </div>
    <div class="nav_center__wrapper">
        <ul role="list" class="nav__center--products w-list-unstyled">
            <li class="nav__snd_title">
                <div class="ctg__title_display">{{$category}}</div>
            </li>
            <li class="nav__ctg_lnk comeback">
                <a href="{{url('/')}}" class="link-block-6 w-inline-block">
                    <div class="ctg__return">Retour</div>
                </a>
            </li>
        </ul>
    </div>
</div>
