<!DOCTYPE html>
<html>
@include('partials.head-v2', ['title'=> $pivot->title])
<body class="catalogue {{$category->url ?? "full"}}">
<script>
    if (location.hash == "") {
        location.href = "/".{{$operation->shortname}}
    }
    document.addEventListener('DOMContentLoaded', (e) => {
        if (!location.hash) {
            location.href = "/".{{$operation->shortname}}
        }
    })
</script>
{{-- Modal --}}
@include('partials.modal')
{{-- End Modal --}}

@include('partials.banner-v2')
@include('partials.menu-v2')

{{-- Arrow nav --}}
@include('partials.slide-arrows')
{{-- End Arrow nav--}}

<div class="section__wrapper">
    @if (count($sous_categories) != 0)
        @foreach($sous_categories as $sous_category)
            {{--        @if ($key == "")--}}
            {{--            <div id="{{$category_url ?? $category}}" class="section-wrapper">--}}
            {{--        @else--}}
            <div id="{{$sous_category->url}}" class="section-wrapper">
                {{--        @endif--}}
                <div class="cat__wrapper">
                    <div class="nav-section category-01">
                        <a href="#" class="arrow arrow-left w-inline-block"></a>
                        <a href="#" class="arrow arrow--right w-inline-block"></a>
                    </div>
                    {{-- Produit Bombe--}}
                    @if (isset($bombe) && $bombe)
                        @include('partials.product-bombe-v2', ['product'=>$bombe ?? ''])
                    @endif
                    {{-- End Produit Bombe--}}
                    <div class="items-wrapper" style="display: none">
                        <div class="w-layout-grid grid">
                            @if (count($sous_categories) != 0)
                                @foreach($products->where('sous_categorie_url', $sous_category->url)->where('bombe_1', '0') as $product)
                                    @include('partials.product', ['product'=> $product])
                                @endforeach
                            @else
                                @foreach($products as $product)
                                    @if ($product->bombe_1 == '0')
                                        @include('partials.product', ['product'=> $product])
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{--Cata entier--}}
    @elseif ($category == "Cataloque")
        @foreach($categories as $sous_category)
            {{--        @if ($key == "")--}}
            {{--            <div id="{{$category_url ?? $category}}" class="section-wrapper">--}}
            {{--        @else--}}
            <div id="{{$sous_category->url}}" class="section-wrapper">
                {{--        @endif--}}
                <div class="cat__wrapper">
                    <div class="nav-section category-01">
                        <a href="#" class="arrow arrow-left w-inline-block"></a>
                        <a href="#" class="arrow arrow--right w-inline-block"></a>
                    </div>
                    {{-- Produit Bombe--}}
                    {{--                    @foreach($bombes as $bombe)--}}
                    {{--                        @if ($bombe->category_id == $sous_category->id)--}}
                    {{--                            @include('partials.product-bombe-v2', ['product'=> $bombe ])--}}
                    {{--                        @endif--}}
                    {{--                    @endforeach--}}
                    @include('partials.product-bombe-v2', ['product'=> $sous_category->bombe() ])

                    {{-- End Produit Bombe--}}
                    <div class="items-wrapper" style="display: none">
                        <div class="w-layout-grid grid">
                            @foreach($products->where('category_id', $sous_category->id) as $product)
                                @if (($product->convertData())->bombe_1 != '1')
                                    @include('partials.product-v2', ['product'=> ($product)])
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    @else
        {{--Cata par catégorie--}}
        <div id="{{$category->url}}" class="section-wrapper">
            {{--        @endif--}}
            <div class="cat__wrapper">
                <div class="nav-section category-01">
                    <a href="#" class="arrow arrow-left w-inline-block"></a>
                    <a href="#" class="arrow arrow--right w-inline-block"></a>
                </div>
                {{-- Produit Bombe--}}
                @if ($bombe ?? '')
                    @include('partials.product-bombe-v2', ['product'=>$bombe ?? ''])
                @endif
                {{-- End Produit Bombe--}}
                <div class="items-wrapper" style="display: none">
                    <div class="w-layout-grid grid">
                        @foreach($products as $product)
                            @if ($product->bombe_1 != '1')
                                @include('partials.product-v2', ['product'=> $product])
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
</div>
@include('partials.footer-v2', ['page', 'catalogue'])
</body>
</html>
