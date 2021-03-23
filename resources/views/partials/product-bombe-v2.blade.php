<div class="spotlight spotlight__eveil"
     style="background-image: url('{{asset('storage/'.$operation->shortname.'/images/bombe_bg/bombe_bg.png')}}');"
     data-designation="{{$product->designation}}"
     data-description_produit="{{$product->description_produit}}"
     data-prix_vente_1="{{explode(',', $product->prix_vente)[0]}}"
     data-prix_vente_2="{{explode(',', $product->prix_vente)[1] ?? "00"}}"
     data-prix_barre_1="{{explode(',', $product->prix_barre)[0]}}"
     data-prix_barre_2="{{explode(',', $product->prix_barre)[1] ?? "00"}}"
     data-eco_part="{{$product->eco_part}}"
     data-marque="{{$product->marque}}"
     data-ean="{{$product->ean}}"
     data-photo_principale="{{$product->photo_principale}}"
     data-photo_2="{{$product->photo_2}}"
     data-photo_3="{{$product->photo_3}}">
    @if ( isset($sous_category) && $sous_category)
        <h5 class="sub-category">
            {{$product->subcategory()->name()}}
        </h5>
    @endif
    <div class="spotlight--img"
         style="background-image: url('{{$product->photo_principale ? asset('storage/'.$operation->shortname.'/images/products/'.$product->photo_principale) : ""}}')"></div>
    <div class="spotlight__container">
        <div class="spotlight_price"
             style="background-image: url({{asset('storage/'.$operation->shortname.'/images/stickers/price_bombe1.svg')}});">
            @if ($product->prix_barre)
                <div class="p__old_price old_price--spotlight">
                    <div class="p__old_price_wrapper old_price_wrapper--spotlight">
                        <div
                            class="p__price_1st price_1st--old _1st--spotlight">{{explode(",",$product->prix_barre)[0]}}</div>
                        <div class="p__price_2nd">
                            <div
                                class="p__price_cents price_cents--old cents--spotlight">
                                €{{explode(",",$product->prix_barre)[1] ?? "00"}}</div>
                        </div>
                    </div>
                    <div class="p__cross_bar cross_bar--spotlight"></div>
                </div>
            @endif
            <div class="price_content_wrapper">
                <div class="p__price_wrapper p_price_wrapper--spotlight">
                    <div
                        class="p__price_1st price_1st--spotlight">{{explode(",",$product->prix_vente)[0]}}</div>
                    <div class="p__price_cents price_cents--spotlight">
                        €{{explode(",",$product->prix_vente)[1] ?? "00"}}</div>
                </div>
                @if ($product->eco_part)
                    <div class="p__ecopart p_ecopart--spotlight">
                        ÉCOPART {{explode(",",$product->eco_part)[0] ?? "0"}}
                        €{{explode(",",$product->eco_part)[1] ?? "00"}}</div>
                @endif
            </div>
        </div>
        <div class="p__wrapper p__wrapper--spotlight">

            <div class="p__title p__title--spotlight">
                {{$product->designation}}
            </div>
            <div class="brand">
                {{$product->marque}}
            </div>
        </div>
    </div>
</div>
