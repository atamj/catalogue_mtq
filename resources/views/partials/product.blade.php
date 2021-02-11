<div id="w-node-643069de73f7-b30ad297" class="product article__02"
     style="background-image: url('{{$product->photo_principale ? asset('images/'.$product->photo_principale) : ""}}')"
     data-designation="{{$product->designation}}"
     data-description_produit="{{$product->description_produit}}"
     data-prix_vente_1="{{explode(',', $product->prix_vente)[0]}}"
     data-prix_vente_2="{{explode(',', $product->prix_vente)[1] ?? "00"}}"
     data-eco_part="{{$product->eco_part}}"
     data-marque="{{$product->marque}}"
     data-ean="{{$product->ean}}"
     data-photo_principale="{{$product->photo_principale}}"
     data-photo_2="{{$product->photo_2}}"
     data-photo_3="{{$product->photo_3}}">

    <div class="product-wrapper">
        <ul role="list" class="list-3 w-list-unstyled">
            <li class="p__brand">
                <div class="brand">{{$product->marque}}</div>
            </li>
            <li class="p__more_infos more_infos__wrapper">
                <a data-w-id="Link Block 16" href="#" class="p__more_infos w-inline-block">
                    <div class="more_infos_cross"></div>
                </a>
            </li>
        </ul>
        <div class="p__price {{($product->bombe_2 == '1') ? "spotlight-02" : ""}} ">
            @if ($product->prix_barre)
                <div class="p__old_price">
                    <div class="p__old_price_wrapper">
                        <div
                            class="p__price_1st price_1st--old">{{explode(',', $product->prix_barre)[0]}}</div>
                        <div class="p__price_2nd">
                            <div class="p__price_cents price_cents--old">
                                €{{explode(',', $product->prix_barre)[1] ?? "00"}}</div>
                        </div>
                    </div>
                    <div
                        class="p__cross_bar {{($product->bombe_2 == '1') ? "spotlight-02" : ""}}"></div>
                </div>
            @endif

            <div class="p__price_wrapper">
                <div
                    class="p__price_1st {{($product->bombe_2 == '1') ? "spotlight-02" : ""}}-txt">{{explode(',', $product->prix_vente)[0]}}</div>
                <div
                    class="p__price_cents {{($product->bombe_2 == '1') ? "spotlight-02" : ""}}-txt">
                    €{{explode(',', $product->prix_vente)[1] ?? "00"}}</div>
            </div>
            @if ($product->eco_part)
                <div
                    class="p__ecopart {{($product->bombe_2 == '1') ? "spotlight-02" : ""}}-txt">
                    DONT {{explode(',', $product->eco_part)[0] ?? "0"}}€{{explode(',', $product->eco_part)[1] ?? "00"}} D'ÉCO-PART
                    </div>
            @endif
            @if ($product->bombe_2 == '1')
                <div class="spotlight-02-bg"></div>
            @endif
        </div>
        <div class="p__wrapper">
            <div class="p__title">{{$product->designation}}</div>
            <p class="p__infos">{{$product->description_produit}}</p>
        </div>
    </div>
</div>
