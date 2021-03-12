<!DOCTYPE html>
<html>
@include('partials.head', ['title'=> env('TILE')])
<body>
<script>
    if (location.hash == ""){
        location.href = "/".{{$ope}}
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

    @foreach($sous_categories as $key => $sous_category)
        @if ($key == "")
            <div id="{{$category_url ?? $category}}" class="section-wrapper">
                @else
                    <div id="{{$key}}" class="section-wrapper">
                        @endif
                        <div class="cat__wrapper">
                            <div class="nav-section category-01">
                                <a href="#" class="arrow arrow-left w-inline-block"></a>
                                <a href="#" class="arrow arrow--right w-inline-block"></a>
                            </div>
                            {{-- Produit Bombe--}}
                            @if ($bombe->where('sous_categorie', $sous_category)->first())
                                @include('partials.product-bombe', ['product'=>$bombe->where('sous_categorie', $sous_category)->first()])
                            @endif
                            {{-- End Produit Bombe--}}
                            <div class="items-wrapper" style="display: none">
                                <div class="w-layout-grid grid">
                                    @foreach($products->where('sous_categorie', $sous_category)->where('bombe_1', '0') as $product)
                                        @include('partials.product', ['product'=> $product])
                                    @endforeach
                                </div>
                            </div>
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

</body>
</html>
