<div id="{{$product->id}}" class="product {{($product->bombe_2 == '1') ? "bombe2" : ""}}{{($product->smart_cash != "") ? "smartcash" : ""}}"
     @if ($product->photo_principale && \Illuminate\Support\Facades\Storage::exists('public/'. $operation->shortname .'/images/products/'.$product->photo_principale))
     style="background-image: url('{{$product->photo_principale ? asset('storage/'. $operation->shortname .'/images/products/'.$product->photo_principale) : ""}}')"
     @endif
     data-designation="{{$product->designation}}"
     data-description_produit="{{$product->description_produit}}"
     data-description_short="{{$product->description_short}}"
     data-prix_vente_1="{{explode(',', $product->prix_vente)[0]}}"
     data-prix_vente_2="{{explode(',', $product->prix_vente)[1] ?? "00"}}"
     data-prix_barre_1="{{explode(',', $product->prix_barre)[0]}}"
     data-prix_barre_2="{{explode(',', $product->prix_barre)[1] ?? "00"}}"
     data-eco_part="{{$product->eco_part}}"
     data-marque="{{$product->marque}}"
     data-ean="{{$product->ean}}"
     data-photo_principale="{{$product->photo_principale ?  asset('storage/' . $operation->shortname . '/images/products/' . $product->photo_principale) : ""}}"
     data-photo_2="{{$product->photo_2 ? asset('storage/' . $operation->shortname . '/images/products/' . $product->photo_2) : ""}}"
     data-photo_3="{{$product->photo_3 ? asset('storage/' . $operation->shortname . '/images/products/' . $product->photo_3) : ""}}">

    <div class="product-wrapper">
        <ul role="list" class="list-3 w-list-unstyled">
            <li class="p__brand">
                <div class="brand">{{$product->marque}}</div>
            </li>
            <li class="p__more_infos more_infos__wrapper">
                <a data-w-id="Link Block 16" href="#" class="p__more_infos w-inline-block">
                    <div class="more_infos_cross">+</div>
                </a>
            </li>
        </ul>
{{--        <img src="{{$product->photo_principale ? asset('storage/'. $operation->shortname .'/images/products/'.$product->photo_principale) : ""}}" alt="">--}}
    @if ($product->bombe_2 == '1' && $product->smart_cash != "")
            {{--Bombe 2 + smartcash--}}

            <div class="p__price" style="background-image: url({{asset('storage/'.$operation->shortname.'/images/stickers/price_smart.svg')}});">

        @elseif ($product->bombe_2 == '1')
            {{--Bombe 2 --}}

            <div class="p__price" style="background-image: url({{asset('storage/'.$operation->shortname.'/images/stickers/price_bombe2.svg')}});">
        @elseif($product->smart_cash != "")
            {{--Smartcash --}}

            <div class="p__price" style="background-image: url({{asset('storage/'.$operation->shortname.'/images/stickers/price_smart.svg')}});">

        @else
            {{--Normale--}}
            <div class="p__price" style="background-image: url({{asset('storage/'.$operation->shortname.'/images/stickers/price.svg')}});">

        @endif
{{--        <div class="p__price {{($product->bombe_2 == '1') ? "spotlight-02" : ""}} ">--}}
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
            @elseif($product->smart_cash != "")
                    <div class="p__old_price">
                        <div class="p__old_price_wrapper">
                            <div
                                class="p__price_1st price_1st--old">{{explode(',', $product->smart_cash)[0]}}</div>
                            <div class="p__price_2nd">
                                <div class="p__price_cents price_cents--old">
                                    €{{explode(',', $product->smart_cash)[1] ?? "00"}}</div>
                            </div>
                        </div>
                        <div class="small-cagnotte">
                            <small>Prix cagnotte réduite</small>
                        </div>
                    </div>{{--p__old_price--}}

            @endif

            <div class="p__price_wrapper">
                <div
                    class="p__price_1st {{($product->bombe_2 == '1') ? "spotlight-02" : ""}}-txt">{{explode(',', $product->prix_vente)[0]}}</div>
                <div
                    class="p__price_cents {{($product->bombe_2 == '1') ? "spotlight-02" : ""}}-txt">
                    €{{explode(',', $product->prix_vente)[1] ?? "00"}}</div>
            </div>{{--p__price_wrapper--}}
            <div class="smartmention">
                prix payé en caisse
            </div>
                {{--Disabled ecopart--}}
            @if ($product->eco_part && 0 == 1)
                <div
                    class="p__ecopart {{($product->bombe_2 == '1') ? "spotlight-02" : ""}}-txt">
                    DONT {{explode(',', $product->eco_part)[0] ?? "0"}}€{{explode(',', $product->eco_part)[1] ?? "00"}}
                    D'ÉCO-PART
                </div>{{--p__ecopart--}}
            @endif
                @if ($product->smart_cash != "")
                    <div class="smartcash" style="background-image: url({{asset('storage/'.$operation->shortname.'/images/stickers/smartcash.svg')}});">
                        <p>
                            -{{explode(',', $product->smart_cash)[0]}}<sup>€{{explode(',', $product->smart_cash)[1] ?? "00"}}</sup>
                            <br>
                            <span>EN SMART <i>Cash **</i></span>
                        </p>
                    </div>
                @endif

        </div>{{--p__price--}}
        <div class="p__wrapper">
            <div class="p__title">{{$product->designation}}</div>
            <p class="p__infos">{{$product->description_short}}</p>
        </div>{{--p__wrapper--}}
    </div>{{--product-wrapper--}}
</div>{{--product--}}
