<!DOCTYPE html><!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Fri Feb 05 2021 19:18:40 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="601d786ad06b3fd5b30ad297" data-wf-site="601d786ad06b3f2f840ad293">
@include('partials.head', ['title'=> "Catalogue:".$category])
<body>
{{-- Modal --}}
@include('partials.modal')
{{-- End Modal --}}

@include('partials.banner')
@include('partials.menu')

{{--@include('partials.sticky-menu')--}}
{{-- Arrow nav --}}
@include('partials.slide-arrows')
{{-- End Arrow nav--}}

<div class="section__wrapper">

    @foreach($sous_categories as $key => $sous_category)
        @if ($key == "")
            <div id="{{$category}}" class="section-wrapper">
                @else
                    <div id="{{$key}}" class="section-wrapper">
                        @endif
                        <div class="cat__wrapper">
                            <div class="nav-section category-01">
                                <a href="#" class="arrow arrow-left w-inline-block"></a>
                                <a href="#" class="arrow arrow--right w-inline-block"></a>
                            </div>
                            <link rel="stylesheet" href="{{asset('css/vertical-scrolling-nav.webflow.css')}}">
                            {{-- Produit Bombe--}}
                            @if ($bombe->where('sous_categorie', $sous_category)->first())
                                @include('partials.product-bombe', ['product'=>$bombe->where('sous_categorie', $sous_category)->first()])
                            @endif
                            {{-- End Produit Bombe--}}
                            <div class="items-wrapper">
                                <div class="w-layout-grid grid">
                                    @foreach($products->where('sous_categorie', $sous_category)->where('bombe_1', '0') as $product)
                                        @include('partials.product', ['product'=> $product])
                                    @endforeach
                                </div>
                            </div>
                            {{--Vertical indicator--}}
                            @if (count($products->where('sous_categorie', $sous_category)) > 5)
                                <div class="vertical-scroll">
                                    <a href="#" class="arrow w-inline-block"></a>
                                    <div class="div-block-7"></div>
                                    <a href="#" class="arrow down w-inline-block"></a>
                                </div>
                            @endif
                            {{--End Vertical indicator--}}
                        </div>
                    </div>
                    @endforeach
            </div>
@include('partials.footer')
</body>
</html>
