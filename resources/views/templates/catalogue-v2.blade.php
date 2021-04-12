<!DOCTYPE html>
<html>
@if ($operation->template)
    @include('partials.head-'.$operation->template, ['title'=> $pivot->title])
@else
    @include('partials.head', ['title'=> $pivot->title])
@endif
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

@if ($operation->template)
    {{-- Modal --}}
    @include('partials.modal-'.$operation->template)
    {{-- End Modal --}}
    @include('partials.menu-'.$operation->template)
    @include('partials.banner-'.$operation->template)
    {{-- Arrow nav --}}
    @include('partials.slide-arrows-'.$operation->template)
    {{-- End Arrow nav--}}

@else
    {{-- Modal --}}
    @include('partials.modal')
    {{-- End Modal --}}
    @include('partials.menu')
    @include('partials.banner')
    {{-- Arrow nav --}}
    @include('partials.slide-arrows')
    {{-- End Arrow nav--}}
@endif


<div class="section__wrapper">
    @if (count($sous_categories) != 0)
        @foreach($sous_categories as $sous_category)

            <div id="{{$sous_category->url}}" class="section-wrapper">
                <div class="cat__wrapper">
                    <div class="nav-section category-01">
                        <a href="#" class="arrow arrow-left w-inline-block"></a>
                        <a href="#" class="arrow arrow--right w-inline-block"></a>
                    </div>
                    {{-- Produit Bombe--}}
                    @if (isset($bombe) && $bombe)
                        @if ($operation->template)
                            @include('partials.product-bombe-'.$operation->template, ['product'=>$bombe ?? ''])
                        @else
                            @include('partials.product-bombe', ['product'=>$bombe ?? ''])
                        @endif
                    @endif
                    {{-- End Produit Bombe--}}
                    <div class="items-wrapper" style="display: none">
                        <div class="w-layout-grid grid">
                            @if (count($sous_categories) != 0)
                                @foreach($products->where('sous_categorie_url', $sous_category->url)->where('bombe_1', '0') as $product)
                                    @if ($operation->template)
                                        @include('partials.product-'.$operation->template, ['product'=> $product])
                                    @else
                                        @include('partials.product', ['product'=> $product])
                                    @endif
                                @endforeach
                            @else
                                @foreach($products as $product)
                                    @if ($product->bombe_1 == '0')
                                        @if ($operation->template)
                                            @include('partials.product-'.$operation->template, ['product'=> $product])
                                        @else
                                            @include('partials.product', ['product'=> $product])
                                        @endif
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

            <div id="{{$sous_category->url}}" class="section-wrapper">
                <div class="cat__wrapper">
                    <div class="nav-section category-01">
                        <a href="#" class="arrow arrow-left w-inline-block"></a>
                        <a href="#" class="arrow arrow--right w-inline-block"></a>
                    </div>
                    {{-- Produit Bombe--}}

                    @if ($operation->template)
                        @include('partials.product-bombe-'.$operation->template, ['product'=> $sous_category->bombe() ])
                    @else
                        @include('partials.product-bombe', ['product'=> $sous_category->bombe() ])
                    @endif
                    {{-- End Produit Bombe--}}
                    <div class="items-wrapper" style="display: none">
                        <div class="w-layout-grid grid">
                            @foreach($products->where('category_id', $sous_category->id) as $product)
                                @if (($product->convertData())->bombe_1 != '1')
                                    @if ($operation->template)
                                        @include('partials.product-'.$operation->template, ['product'=> $product])
                                    @else
                                        @include('partials.product', ['product'=> $product])
                                    @endif
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
            <div class="cat__wrapper">
                <div class="nav-section category-01">
                    <a href="#" class="arrow arrow-left w-inline-block"></a>
                    <a href="#" class="arrow arrow--right w-inline-block"></a>
                </div>
                {{-- Produit Bombe--}}
                @if ($bombe ?? '')
                    @if ($operation->template)
                        @include('partials.product-bombe-'.$operation->template, ['product'=>$bombe ?? ''])
                    @else
                        @include('partials.product-bombe', ['product'=>$bombe ?? ''])
                    @endif
                @endif
                {{-- End Produit Bombe--}}
                <div class="items-wrapper" style="display: none">
                    <div class="w-layout-grid grid">
                        @foreach($products as $product)
                            @if ($product->bombe_1 != '1')
                                @if ($operation->template)
                                    @include('partials.product-'.$operation->template, ['product'=> $product])
                                @else
                                    @include('partials.product', ['product'=> $product])
                                @endif
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
