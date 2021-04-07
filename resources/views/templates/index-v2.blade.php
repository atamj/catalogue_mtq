<!DOCTYPE html><!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Fri Feb 05 2021 18:12:15 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="601d786ad06b3f9b2b0ad294" data-wf-site="601d786ad06b3f2f840ad293">
@if ($operation->template)
    @include('partials.head-'.$operation->template, ['title'=> $pivot->title])
@else
    @include('partials.head', ['title'=> $pivot->title])
@endif
<body class="home">
<div data-collapse="medium" data-animation="default" data-duration="400" role="banner" class="nav w-nav"
     style="{{$pivot->header_bgi ? "background-image: url(".asset('storage/'.$operation->shortname.'/images/header_bgi/'.$client->id.'/'.$pivot->header_bgi).")" : ""}}">
    @if ($operation->template)
        @include('partials.header-'.$operation->template)
    @else
        @include('partials.header')
    @endif
</div>
@if ($operation->template)
    @include('partials.menu-'.$operation->template)
@else
    @include('partials.menu')
@endif

<div class="video-modal hidden"></div>
<div class="p__more_infos more_infos--detail hide-video hidden">
    <div class="more_infos_cross cross--detail">+</div>
</div>
<div class="hero">
    <div class="voir-cata-container">
        @if(count($categories) > 0)
            <a class="voir-cata"
               href="{{url('/'.$operation->shortname.'/catalogue#'.($categories->first()->subCategories()->first() ? $categories->first()->subCategories()->first()->url : $categories->first()->url))}}">
                VOIR TOUT LE CATALOGUE
                <br><small>ou consulter nos rubriques</small>
            </a>
        @else
            <a href="#" class="voir-cata">
                VOIR TOUT LE CATALOGUE
                <br><small>ou consulter nos rubriques</small>
            </a>
        @endif
    </div>
    @foreach($categories as $category)

        <div class="categories">
            @if($loop->odd)
                <div class="ctg__title"
                     style="background-image: url('{{asset('storage/'.$operation->shortname.'/images/categories/'.$category->img)}}')">
                    <div class="ctg__title--size bg--yellow bg_primary txt_secondary">{{$category->name}}</div>
                </div>
                <div class="ctg__menu ctg__menu--gears" style="background-color: {{$pivot->primary_color}}e6;">
                    <a data-w-id="Link Block 11" href="#" class="ctg__link close_menu w-inline-block">
                        {{--                        <div class="ctg__link_txt"></div>--}}
                        +
                    </a>
                    @if($category->subCategories()->count() != 0)
                        @foreach($category->subCategories()->get() as $subCategory)
                            <a href="{{url($operation->shortname."/".$category->url.'#'.$subCategory->url)}}"
                               class="ctg__link w-inline-block">
                                <div class="ctg__link_txt link_text--green txt_secondary">
                                    {{$subCategory->name ?? $category->name}}
                                </div>
                            </a>
                        @endforeach
                    @else
                        <a href="{{url($operation->shortname."/".$category->url.'#'.$category->url)}}"
                           class="ctg__link w-inline-block">
                            <div class="ctg__link_txt txt_secondary">
                                CONSULTER LA RUBRIQUE
                            </div>
                        </a>
                    @endif
                </div>
            @else
                <div class="ctg__title"
                     style="background-image: url('{{asset('storage/'.$operation->shortname.'/images/categories/'.$category->img)}}')">
                    <div class="ctg__title--size bg--yellow bg_secondary txt_primary">{{$category->name}}</div>
                </div>
                <div class="ctg__menu ctg__menu--gears" style="background-color: {{$pivot->secondary_color}}e6;">
                    <a data-w-id="Link Block 11" href="#" class="ctg__link close_menu w-inline-block txt-white">
                        {{--                        <div class="ctg__link_txt"></div>--}}
                        +
                    </a>
                    @if($category->subCategories()->count() != 0)
                        @foreach($category->subCategories()->get() as $subCategory)
                            <a href="{{url($operation->shortname."/".$category->url.'#'.$subCategory->url)}}"
                               class="ctg__link w-inline-block">
                                <div class="ctg__link_txt link_text--green txt_primary">
                                    {{$subCategory->name ?? $category->name}}
                                </div>
                            </a>
                        @endforeach
                    @else
                        <a href="{{url($operation->shortname."/".$category->url."#".$category->url)}}"
                           class="ctg__link w-inline-block">
                            <div class="ctg__link_txt link_text--green txt_primary">
                                CONSULTER LA RUBRIQUE
                            </div>
                        </a>
                    @endif
                </div>
            @endif
        </div>
    @endforeach
    {{--VIDEO--}}
    <div class="categories" style="">
        <div class="ctg__title" style="background-image: url('{{asset('storage/'.$operation->shortname.'/images/categories')}}/section-video.jpg')">
            <div class="ctg__title--size bg--yellow bg_primary txt_secondary">video</div>
        </div>
        <div class="ctg__menu ctg__menu--gears" style="background-color: {{$pivot->primary_color}}e6;">
            <a data-w-id="Link Block 11" href="#" class="ctg__link close_menu w-inline-block">
                {{--                        <div class="ctg__link_txt"></div>--}}
                +
            </a>
            <a href="#"
               class="ctg__link w-inline-block">
                <div class="ctg__link_txt txt_secondary show-video">
                    CONSULTER LA RUBRIQUE
                </div>
            </a>

        </div>
    </div>

</div>
@if ($operation->template)
    @include('partials.footer-'.$operation->template)
@else
    @include('partials.footer')
@endif
</body>
</html>
