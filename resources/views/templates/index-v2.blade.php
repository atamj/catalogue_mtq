<!DOCTYPE html><!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Fri Feb 05 2021 18:12:15 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="601d786ad06b3f9b2b0ad294" data-wf-site="601d786ad06b3f2f840ad293">
@include('partials.head-v2', ['title'=> $pivot->title])
<body>
<div data-collapse="medium" data-animation="default" data-duration="400" role="banner" class="nav w-nav">
    @include('partials.header-v2')
</div>
<div class="hero">
    @foreach($categories as $category)

        <div class="categories">
            @if($loop->even)
                <div class="ctg__title img_gears"
                     style="background-image: url('{{asset('storage/'.$operation->shortname.'/images/categories/'.$category->img)}}')">
                    <div class="ctg__title--size bg--yellow bg_primary txt_secondary">{{$category->name}}</div>
                </div>
                <div class="ctg__menu ctg__menu--gears" style="background-color: {{$pivot->primary_color}}e6;">
                    <a data-w-id="Link Block 11" href="#" class="ctg__link close_menu w-inline-block">
                        <div class="ctg__link_txt"></div>
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
                        <a href="{{url($operation->shortname."/".$category->url)}}"
                           class="ctg__link w-inline-block">
                            <div class="ctg__link_txt link_text--green txt_secondary">
                                {{$category->name}}
                            </div>
                        </a>
                    @endif
                </div>
            @else
                <div class="ctg__title img_gears"
                     style="background-image: url('{{asset('storage/'.$operation->shortname.'/images/categories/'.$category->img)}}')">
                    <div class="ctg__title--size bg--yellow bg_secondary txt_primary">{{$category->name}}</div>
                </div>
                <div class="ctg__menu ctg__menu--gears" style="background-color: {{$pivot->secondary_color}}e6;">
                    <a data-w-id="Link Block 11" href="#" class="ctg__link close_menu w-inline-block">
                        <div class="ctg__link_txt"></div>
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
                        <a href="{{url($operation->shortname."/".$category->url)}}"
                           class="ctg__link w-inline-block">
                            <div class="ctg__link_txt link_text--green txt_primary">
                                {{$category->name}}
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
