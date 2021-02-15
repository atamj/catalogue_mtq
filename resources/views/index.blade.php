<!DOCTYPE html><!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Fri Feb 05 2021 18:12:15 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="601d786ad06b3f9b2b0ad294" data-wf-site="601d786ad06b3f2f840ad293">
@include('partials.head', ['title'=> "Le meilleur pour bebe"])
<body>
<div data-collapse="medium" data-animation="default" data-duration="400" role="banner" class="nav w-nav">
    @if (env('APP_URL') === "https://catalogue.carrefour-martinique.com")
        @include('partials.header-carrefour')
    @elseif(env('APP_URL') === "https://catalogue.euromarche-martinique.com")
        @include('partials.header-euro')
    @else
        @include('partials.header')
    @endif
    <ul role="list" class="nav__center w-list-unstyled">
        <li class="nav__snd_title">
            <div class="text-block-4">du 17 février au 7 mars</div>
        </li>
        <li class="nav__ctg_lnk">
            <a href="{{url('/catalogue#rehausseur')}}" class="link-block-6 w-inline-block">
                <div class="text-block-5">VOIR LE CATALOGUE</div>
            </a>
        </li>
    </ul>
</div>
<div class="hero">
    @foreach($menu as $category_url => $category)
        <div class="categories">
            <div data-w-id="a33e95c8-212f-b6d9-7add-46fac327b305" class="ctg__title img_{{$category->img}}">
                <div class="ctg__title--size bg--{{$category->bg}}">{{$category->string}}</div>
            </div>
            <div data-w-id="2877d8d1-2777-7bb4-3ce4-761949e2038e" class="ctg__menu ctg__menu--{{$category->menu}}">
                <a data-w-id="Link Block 11" href="#" class="ctg__link close_menu w-inline-block">
                    <div class="ctg__link_txt"></div>
                </a>
                @foreach($category->sous_categories as $sous_category_url => $sous_category)
                    <a href="{{url($category_url.'#'.$sous_category_url)}}" class="ctg__link w-inline-block">
                        <div class="ctg__link_txt link_text--{{$category->txt}}">{{$sous_category}}</div>
                    </a>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
@if (env('APP_URL') === "https://catalogue.carrefour-martinique.com")
    @include('partials.footer-carrefour')
@elseif(env('APP_URL') === "https://catalogue.euromarche-martinique.com")
    @include('partials.footer-euro')
@else
    @include('partials.footer')
@endif
    <script src="{{asset('js/webflow.js')}}"></script>
</body>
</html>
