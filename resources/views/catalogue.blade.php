<!DOCTYPE html>
<html>
@if(env('APP_VERSION') == '2')
    @include('partials.head', ['title'=> $pivot->title])
@else
    @include('partials.head', ['title'=> env("TILE")])
@endif
<body>
<script>
    if (location.hash == "") {
        location.href = "/".{{$operation->shortname}}
    }
</script>
{{-- Modal --}}
@include('partials.modal')
{{-- End Modal --}}

@include('partials.banner')
@include('partials.menu')

{{-- Arrow nav --}}
@include('partials.slide-arrows')
{{-- End Arrow nav--}}

<div class="section__wrapper">
    @if (count($sous_categories) > 0)

        @foreach($sous_categories as $sous_category)

            <div id="{{$sous_category->url ?? $sous_category["url"]}}" class="section-wrapper">
                <div class="cat__wrapper">
                    <div class="nav-section category-01">
                        <a href="#" class="arrow arrow-left w-inline-block"></a>
                        <a href="#" class="arrow arrow--right w-inline-block"></a>
                    </div>
                    {{-- Produit Bombe--}}
                    @foreach($sous_category->products()->get() as $product)
                        @if ($product->convertData()->bombe_1 == "1")
                            @include('partials.product-bombe', ['product'=>$product])
                        @endif
                    @endforeach

                    {{-- End Produit Bombe--}}
                    <div class="items-wrapper" style="display: none">
                        <div class="w-layout-grid grid">
                            @foreach($products->where('sous_categorie_url', $sous_category->url)->where('bombe_1', '0') as $product)
                                @include('partials.product', ['product'=> $product])
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div id="{{$category->url ?? ""}}" class="section-wrapper">
            <div class="cat__wrapper">
                <div class="nav-section category-01">
                    <a href="#" class="arrow arrow-left w-inline-block"></a>
                    <a href="#" class="arrow arrow--right w-inline-block"></a>
                </div>
                {{-- Produit Bombe--}}
                @foreach($category->products()->get() as $product)
                    @if ($product->convertData()->bombe_1 == "1")
                        @include('partials.product-bombe', ['product'=>$product])
                    @endif
                @endforeach

                {{-- End Produit Bombe--}}
                <div class="items-wrapper" style="display: none">
                    <div class="w-layout-grid grid">
                        @foreach($products->where('categorie_url', $category->url)->where('bombe_1', '0') as $product)
                            @include('partials.product', ['product'=> $product])
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@if (env('APP_URL') === "https://catalogue.carrefour-martinique.com")
    @include('partials.footer-carrefour')
@elseif(env('APP_URL') === "https://catalogue.euromarche-martinique.com")
    @include('partials.footer-euro')
@else
    @include('partials.footer')
@endif

</body>
</html>
