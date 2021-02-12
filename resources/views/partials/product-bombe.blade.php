<div class="spotlight spotlight__eveil"
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
    @if ($sous_category)
        <h5 class="sub-category">
            {{$product->sous_categorie}}
        </h5>
    @endif
    <div class="spotlight--img"
         style="background-image: url('{{$product->photo_principale ? asset('images/'.$product->photo_principale) : ""}}')"></div>
    <div class="spotlight__container">
        <div class="spotlight_price">
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
            <ul role="list" class="list-3 w-list-unstyled">
                <li class="p__brand">
                    <div
                        class="brand">{{$product->marque}}</div>
                </li>
                <li class="p__more_infos more_infos__wrapper more_infos--spotlight">
                    <a data-w-id="33f97a03-21e4-12a9-30dc-9699c5fda5f7" href="#"
                       class="p__more_infos w-inline-block">
                        <div class="more_infos_cross"></div>
                    </a>
                </li>
            </ul>
            <div
                class="p__title p__title--spotlight">{{$product->designation}}</div>
            <p class="p__infos p__infos--spotlight">Divers coloris</p>
        </div>
    </div>
</div>
