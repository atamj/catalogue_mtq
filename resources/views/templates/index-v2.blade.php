<!DOCTYPE html><!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Fri Feb 05 2021 18:12:15 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="601d786ad06b3f9b2b0ad294" data-wf-site="601d786ad06b3f2f840ad293">
@include('partials.head-v2', ['title'=> $pivot->title])
<body class="home">
<div data-collapse="medium" data-animation="default" data-duration="400" role="banner" class="nav w-nav" style="{{$pivot->header_bgi ? "background-image: url(".asset('storage/'.$operation->shortname.'/images/header_bgi/'.$client->id.'/'.$pivot->header_bgi).")" : ""}}">
    @include('partials.header-v2')
</div>
@include('partials.menu-v2')

<div class="hero">
    <div class="voir-cata-container">
        @if(count($categories) > 0)
            <a class="voir-cata" href="{{url('/'.$operation->shortname.'/catalogue#'.($categories->first()->subCategories()->first() ? $categories->first()->subCategories()->first()->url : $categories->first()->url))}}">
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

</div>
@include('partials.footer-v2')
</body>
</html>
