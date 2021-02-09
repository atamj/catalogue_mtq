<!DOCTYPE html><!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Fri Feb 05 2021 19:18:40 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="601d786ad06b3fd5b30ad297" data-wf-site="601d786ad06b3f2f840ad293">
@include('partials.head', ['title'=> "Catalogue:".$category])
<body>
{{-- Modal --}}
<script>
    {{--let product = JSON.parse({{$products->toJson()}})--}}
</script>
<div style="opacity:0;display:none" class="product_detail">
    <div class="detail__container">
        <div class="close_window_wrapper">
            <a data-w-id="Link Block 15" href="#" class="close_window w-inline-block">
                <div class="p__more_infos more_infos--detail">
                    <div class="more_infos_cross cross--detail"></div>
                </div>
                <div>Fermer</div>
            </a>
        </div>
        <div class="div-block-10">
            <div class="p_img--big" id="photo_principale"></div>
            <div class="p__details">
                <div class="p__wrapper p_wrapper_details">
                    <div class="p__title p_title--detail" id="designation">Produit<br></div>
                    <p class="p__infos p_infos--details">Le range pyjama ours ou pingouin est
                        idéal comme ami pour tous
                        les bébés.Dès la naissance Composition : 100% polyester   </p>
                    <div class="p__price_wrapper p_price_wrapper--detail">
                        <div class="p__price_1st _1st--detail" id="prix_vente_1">00</div>
                        <div class="p__price_cents" id="prix_vente_2">€99</div>
                    </div>
                    <div class="p__ecopart" id="eco_part">ÉCOPART 0€90</div>
                    <div class="brand brand--detail" id="marque">MARQUE</div>
                    <div class="text-block-12"><span class="ean ean--detail" id="ean">EAN: 3616181593223</span></div>
                    <p class="paragraph" id="description_produit">Lorem ipsum dolor sit amet, consectetur adipiscing
                        elit. Suspendisse varius
                        enim in eros elementum tristique. Duis cursus, mi quis viverra ornare.</p>
                    <div class="img-gallery" style="display: none">
                        <div class="img-gallery-txt">Plus d&#x27;images</div>
                        <div class="w-layout-grid img-gallery-grid">
{{--                            <a id="" href="#" class="img_details_arrow arrow--left w-inline-block"></a>--}}
                            <a id="photo_1" href="#" class="link-block-8 w-inline-block"></a>
                            <a id="photo_2" href="#" class="link-block-8 w-inline-block"></a>
                            <a id="photo_3"style="display: none" href="#" class="link-block-8 w-inline-block"></a>
{{--                            <a id="" href="#" class="img_details_arrow arrow--right w-inline-block"></a>--}}
                        </div>
                    </div>
                    <div class="img_details_wrapper">
                        <div class="img-share--wrapper">
                            <a href="#" class="link-block-11 w-inline-block">
                                <div class="share-bn__wrapper"><img src="images/share-icon.svg"
                                                                    loading="lazy" alt="">
                                </div>
                                <div class="text-block-11" id="share">Partager</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- End Modal --}}

@include('partials.menu')
@include('partials.banner')
{{-- Arrow nav --}}
<div class="arrow-wrapper">
    <div class="arrows-wrapper">
        <a href="#" class="arrows arrow-left w-inline-block" id="prev"></a>
    </div>
    <div class="arrows-wrapper">
        <a data-w-id="8f692ea2-1522-ccf7-9c8f-2320d1ae467b" href="#" class="arrows arrow-right w-inline-block"
           id="next"></a>
    </div>
</div>
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
                {{-- Produit Bombe--}}
                @if ($bombe->where('sous_categorie', $sous_category)->first())

                    <div class="spotlight spotlight__eveil">
                        @if ($sous_category)
                            <h5 class="sub-category">
                                {{$sous_category}}
                            </h5>
                        @endif
                        <div class="spotlight--img"
                             style="background-image: url('{{$bombe->where('sous_categorie', $sous_category)->first()->photo_principale ? asset('images/'.$bombe->where('sous_categorie', $sous_category)->first()->photo_principale) : ""}}')"></div>
                        <div class="spotlight__container">
                            <div class="spotlight_price">
                                @if ($bombe->where('sous_categorie', $sous_category)->first()->prix_barre)
                                    <div class="p__old_price old_price--spotlight">
                                        <div class="p__old_price_wrapper old_price_wrapper--spotlight">
                                            <div
                                                class="p__price_1st price_1st--old _1st--spotlight">{{explode(",",$bombe->where('sous_categorie', $sous_category)->first()->prix_barre)[0]}}</div>
                                            <div class="p__price_2nd">
                                                <div class="p__price_cents price_cents--old cents--spotlight">
                                                    €{{explode(",",$bombe->where('sous_categorie', $sous_category)->first()->prix_barre)[1] ?? "00"}}</div>
                                            </div>
                                        </div>
                                        <div class="p__cross_bar cross_bar--spotlight"></div>
                                    </div>
                                @endif
                                <div class="price_content_wrapper">
                                    <div class="p__price_wrapper p_price_wrapper--spotlight">
                                        <div
                                            class="p__price_1st price_1st--spotlight">{{explode(",",$bombe->where('sous_categorie', $sous_category)->first()->prix_vente)[0]}}</div>
                                        <div class="p__price_cents price_cents--spotlight">
                                            €{{explode(",",$bombe->where('sous_categorie', $sous_category)->first()->prix_vente)[1] ?? "00"}}</div>
                                    </div>
                                    @if ($bombe->where('sous_categorie', $sous_category)->first()->eco_part)
                                        <div class="p__ecopart p_ecopart--spotlight">
                                            ÉCOPART {{explode(",",$bombe->where('sous_categorie', $sous_category)->first()->eco_part)[0] ?? "0"}}
                                            €{{explode(",",$bombe->where('sous_categorie', $sous_category)->first()->eco_part)[1] ?? "00"}}</div>
                                    @else

                                        <div class="p__ecopart p_ecopart--spotlight">
                                            ÉCOPART 0€00
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="p__wrapper p__wrapper--spotlight">
                                <ul role="list" class="list-3 w-list-unstyled">
                                    <li class="p__brand">
                                        <div
                                            class="brand">{{$bombe->where('sous_categorie', $sous_category)->first()->marque}}</div>
                                    </li>
                                    <li class="p__more_infos more_infos__wrapper more_infos--spotlight">
                                        <a data-w-id="33f97a03-21e4-12a9-30dc-9699c5fda5f7" href="#"
                                           class="p__more_infos w-inline-block">
                                            <div class="more_infos_cross"
                                                 data-designation="{{$bombe->where('sous_categorie', $sous_category)->first()->designation}}"
                                                 data-description_produit="{{$bombe->where('sous_categorie', $sous_category)->first()->description_produit}}"
                                                 data-prix_vente_1="{{$bombe->where('sous_categorie', $sous_category)->first()->prix_vente_1}}"
                                                 data-prix_vente_2="{{$bombe->where('sous_categorie', $sous_category)->first()->prix_vente_2}}"
                                                 data-eco_part="{{$bombe->where('sous_categorie', $sous_category)->first()->eco_part}}"
                                                 data-marque="{{$bombe->where('sous_categorie', $sous_category)->first()->marque}}"
                                                 data-ean="{{$bombe->where('sous_categorie', $sous_category)->first()->ean}}"
                                                 data-photo_principale="{{$bombe->where('sous_categorie', $sous_category)->first()->photo_principale}}"
                                                 data-photo_2="{{$bombe->where('sous_categorie', $sous_category)->first()->photo_2}}"
                                                 data-photo_3="{{$bombe->where('sous_categorie', $sous_category)->first()->photo_3}}"
                                            ></div>
                                        </a>
                                    </li>
                                </ul>
                                <div
                                    class="p__title p__title--spotlight">{{$bombe->where('sous_categorie', $sous_category)->first()->designation}}</div>
                                <p class="p__infos p__infos--spotlight">Divers coloris</p>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- End Produit Bombe--}}
                <div class="items-wrapper">
                    <div class="w-layout-grid grid">
                        @foreach($products->where('sous_categorie', $sous_category)->where('bombe_1', '0') as $product)
                            <div id="w-node-643069de73f7-b30ad297" class="product article__02"
                                 style="background-image: url('{{$product->photo_principale ? asset('images/'.$product->photo_principale) : ""}}')">

                                <div class="product-wrapper">
                                    <ul role="list" class="list-3 w-list-unstyled">
                                        <li class="p__brand">
                                            <div class="brand">{{$product->marque}}</div>
                                        </li>
                                        <li class="p__more_infos more_infos__wrapper">
                                            <a data-w-id="Link Block 16" href="#" class="p__more_infos w-inline-block">
                                                <div class="more_infos_cross"
                                                     data-designation="{{$product->designation}}"
                                                     data-description_produit="{{$product->description_produit}}"
                                                     data-prix_vente_1="{{$product->prix_vente_1}}"
                                                     data-prix_vente_2="{{$product->prix_vente_2}}"
                                                     data-eco_part="{{$product->eco_part}}"
                                                     data-marque="{{$product->marque}}"
                                                     data-ean="{{$product->ean}}"
                                                     data-photo_principale="{{$product->photo_principale}}"
                                                     data-photo_2="{{$product->photo_2}}"
                                                     data-photo_3="{{$product->photo_3}}"
                                                ></div>
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
                                                ÉCOPART {{explode(',', $product->eco_part)[0] ?? "0"}}
                                                €{{explode(',', $product->eco_part)[1] ?? "00"}}</div>
                                            @if ($product->bombe_2 == '1')
                                                <div class="spotlight-02-bg"></div>
                                            @endif
                                        @else
                                            <div
                                                class="p__ecopart {{($product->bombe_2 == '1') ? "spotlight-02" : ""}}-txt">
                                                ÉCOPART 0€00
                                            </div>
                                            @if ($product->bombe_2 == '1')
                                                <div class="spotlight-02-bg"></div>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="p__wrapper">
                                        <div class="p__title">{{$product->designation}}</div>
                                        <p class="p__infos">{{$product->description_produit}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@include('partials.footer')
</body>
</html>
