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
            <div class="p_img--big"></div>
            <div class="p__details">
                <div class="p__wrapper p_wrapper_details">
                    <div class="p__title p_title--detail">Produit<br></div>
                    <p class="p__infos p_infos--details">Le range pyjama ours ou pingouin est idéal comme ami pour tous
                        les bébés.Dès la naissance Composition : 100% polyester   </p>
                    <div class="p__price_wrapper p_price_wrapper--detail">
                        <div class="p__price_1st _1st--detail">00</div>
                        <div class="p__price_cents">€99</div>
                    </div>
                    <div class="p__ecopart">ÉCOPART 0€90</div>
                    <div class="brand brand--detail">MARQUE</div>
                    <div class="text-block-12"><span class="ean ean--detail">EAN: 3616181593223</span></div>
                    <p class="paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius
                        enim in eros elementum tristique. Duis cursus, mi quis viverra ornare.</p>
                    <div class="img_details_wrapper">
                        <div class="img-share--wrapper">
                            <a href="#" class="link-block-11 w-inline-block">
                                <div class="share-bn__wrapper"><img src="images/share-icon.svg" loading="lazy" alt="">
                                </div>
                                <div class="text-block-11">Partager</div>
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
        <a href="#" class="arrows arrow-left w-inline-block"></a>
    </div>
    <div class="arrows-wrapper">
        <a data-w-id="8f692ea2-1522-ccf7-9c8f-2320d1ae467b" href="#" class="arrows arrow-right w-inline-block"></a>
    </div>
</div>
{{-- End Arrow nav--}}

<div class="section__wrapper">

    @foreach($sous_categories as $key => $sous_category)
        <div id="{{$key}}" data-num="{{$loop->index + 1}}" class="section-wrapper">
            <div class="cat__wrapper">
                <div class="nav-section category-01">
                    <a href="#" class="arrow arrow-left w-inline-block"></a>
                    <a href="#" class="arrow arrow--right w-inline-block"></a>
                </div>

                {{-- Produit Bombe--}}
                <div class="spotlight spotlight__eveil">
                    <div class="spotlight--img"
                         style="background-image: url('{{$bombe->where('sous_categorie', $sous_category)->first()->photo_principale ? asset('images/'.$bombe->where('sous_categorie', $sous_category)->first()->photo_principale) : ""}}')"></div>
                    <div class="spotlight__container">
                        <div class="spotlight_price">
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
                                        ÉCOPART 0€00</div>
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
                                        <div class="more_infos_cross"></div>
                                    </a>
                                </li>
                            </ul>
                            <div
                                class="p__title p__title--spotlight">{{$bombe->where('sous_categorie', $sous_category)->first()->designation}}</div>
                            <p class="p__infos p__infos--spotlight">Divers coloris</p>
                        </div>
                    </div>
                </div>
                {{-- End Produit Bombe--}}
                <div class="items-wrapper">
                    <div class="w-layout-grid grid">
                        @foreach($products->where('sous_categorie', $sous_category)->where('bombe_1', '0') as $product)
                            <div id="w-node-643069de73f7-b30ad297" class="product eveil_article_01" style="background-image: url('{{$product->photo_principale ? asset('images/'.$product->photo_principale) : ""}}')">
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
                                            <div class="spotlight-02-bg"></div>
                                        @else
                                            <div
                                                class="p__ecopart {{($product->bombe_2 == '1') ? "spotlight-02" : ""}}-txt">
                                                ÉCOPART 0€00
                                            </div>
                                            <div class="spotlight-02-bg"></div>
                                        @endif
                                    </div>
                                    <div class="p__wrapper">
                                        <div class="p__title">{{$product->designation}}</div>
                                        <p class="p__infos">{{$product->description_produit}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{--<div class="product article__02">
                            <ul role="list" class="list-3 w-list-unstyled">
                                <li class="p__brand">
                                    <div class="brand">bambisol</div>
                                </li>
                                <li class="p__more_infos more_infos__wrapper">
                                    <a data-w-id="cfcede4d-edd2-4be6-0364-723270e002bf" href="#"
                                       class="p__more_infos w-inline-block">
                                        <div class="more_infos_cross"></div>
                                    </a>
                                </li>
                            </ul>
                            <div class="p__price">
                                <div class="p__old_price mask">
                                    <div class="p__old_price_wrapper">
                                        <div class="p__price_1st price_1st--old">21</div>
                                        <div class="p__price_2nd">
                                            <div class="p__price_cents price_cents--old">€99</div>
                                        </div>
                                    </div>
                                    <div class="p__cross_bar"></div>
                                </div>
                                <div class="p__price_wrapper">
                                    <div class="p__price_1st">00</div>
                                    <div class="p__price_cents">€00</div>
                                </div>
                                <div class="p__ecopart mask">ÉCOPART 0€90</div>
                            </div>
                            <div class="p__wrapper">
                                <div class="p__title">Produit</div>
                                <p class="p__infos p__infos--mask">Du 6 au 36 mois, différents coloris.96% coton <br>issu
                                    de l’agriculture biologique- 4% élasthanne.</p>
                            </div>
                        </div>
                        <div class="product article__03">
                            <ul role="list" class="list-3 w-list-unstyled">
                                <li class="p__brand">
                                    <div class="brand">MARQUE</div>
                                </li>
                                <li class="p__more_infos more_infos__wrapper">
                                    <a data-w-id="bf123b4b-1df3-ad40-6cf6-b5e572715905" href="#"
                                       class="p__more_infos w-inline-block">
                                        <div class="more_infos_cross"></div>
                                    </a>
                                </li>
                            </ul>
                            <div class="p__price">
                                <div class="p__old_price">
                                    <div class="p__old_price_wrapper">
                                        <div class="p__price_1st price_1st--old">00</div>
                                        <div class="p__price_2nd">
                                            <div class="p__price_cents price_cents--old">€00</div>
                                        </div>
                                    </div>
                                    <div class="p__cross_bar"></div>
                                </div>
                                <div class="p__price_wrapper">
                                    <div class="p__price_1st">0</div>
                                    <div class="p__price_cents">€00</div>
                                </div>
                                <div class="p__ecopart">ÉCOPART 0€00</div>
                            </div>
                            <div class="p__wrapper">
                                <div class="p__title">Produit</div>
                                <p class="p__infos p__infos--mask">Composé d’un bonnetbrodé + une paire de chaussons
                                    <br>+ une paire de moufles, coloris blanc</p>
                            </div>
                        </div>
                        <div class="product article__03">
                            <ul role="list" class="list-3 w-list-unstyled">
                                <li class="p__brand">
                                    <div class="brand">MARQUE</div>
                                </li>
                                <li class="p__more_infos more_infos__wrapper">
                                    <a data-w-id="98e97390-5ae1-92b8-a9fe-5f954882a8c4" href="#"
                                       class="p__more_infos w-inline-block">
                                        <div class="more_infos_cross"></div>
                                    </a>
                                </li>
                            </ul>
                            <div class="p__price">
                                <div class="p__old_price">
                                    <div class="p__old_price_wrapper">
                                        <div class="p__price_1st price_1st--old">00</div>
                                        <div class="p__price_2nd">
                                            <div class="p__price_cents price_cents--old">€00</div>
                                        </div>
                                    </div>
                                    <div class="p__cross_bar"></div>
                                </div>
                                <div class="p__price_wrapper">
                                    <div class="p__price_1st">0</div>
                                    <div class="p__price_cents">€00</div>
                                </div>
                                <div class="p__ecopart">ÉCOPART 0€00</div>
                            </div>
                            <div class="p__wrapper">
                                <div class="p__title">Produit</div>
                                <p class="p__infos p__infos--mask">Composé d’un bonnetbrodé + une paire de chaussons
                                    <br>+ une paire de moufles, coloris blanc</p>
                            </div>
                        </div>
                        <div class="product article__03">
                            <ul role="list" class="list-3 w-list-unstyled">
                                <li class="p__brand">
                                    <div class="brand">MARQUE</div>
                                </li>
                                <li class="p__more_infos more_infos__wrapper">
                                    <a data-w-id="62517cd2-d7c5-28cd-2995-5816e7dde436" href="#"
                                       class="p__more_infos w-inline-block">
                                        <div class="more_infos_cross"></div>
                                    </a>
                                </li>
                            </ul>
                            <div class="p__price">
                                <div class="p__old_price">
                                    <div class="p__old_price_wrapper">
                                        <div class="p__price_1st price_1st--old">00</div>
                                        <div class="p__price_2nd">
                                            <div class="p__price_cents price_cents--old">€00</div>
                                        </div>
                                    </div>
                                    <div class="p__cross_bar"></div>
                                </div>
                                <div class="p__price_wrapper">
                                    <div class="p__price_1st">0</div>
                                    <div class="p__price_cents">€00</div>
                                </div>
                                <div class="p__ecopart">ÉCOPART 0€00</div>
                            </div>
                            <div class="p__wrapper">
                                <div class="p__title">Produit</div>
                                <p class="p__infos p__infos--mask">Composé d’un bonnetbrodé + une paire de chaussons
                                    <br>+ une paire de moufles, coloris blanc</p>
                            </div>
                        </div>
                        <div class="product article__03">
                            <ul role="list" class="list-3 w-list-unstyled">
                                <li class="p__brand">
                                    <div class="brand">MARQUE</div>
                                </li>
                                <li class="p__more_infos more_infos__wrapper">
                                    <a data-w-id="476a5554-d725-80a9-0e19-35520214cea7" href="#"
                                       class="p__more_infos w-inline-block">
                                        <div class="more_infos_cross"></div>
                                    </a>
                                </li>
                            </ul>
                            <div class="p__price">
                                <div class="p__old_price">
                                    <div class="p__old_price_wrapper">
                                        <div class="p__price_1st price_1st--old">00</div>
                                        <div class="p__price_2nd">
                                            <div class="p__price_cents price_cents--old">€00</div>
                                        </div>
                                    </div>
                                    <div class="p__cross_bar"></div>
                                </div>
                                <div class="p__price_wrapper">
                                    <div class="p__price_1st">0</div>
                                    <div class="p__price_cents">€00</div>
                                </div>
                                <div class="p__ecopart">ÉCOPART 0€00</div>
                            </div>
                            <div class="p__wrapper">
                                <div class="p__title">Produit</div>
                                <p class="p__infos p__infos--mask">Composé d’un bonnetbrodé + une paire de chaussons
                                    <br>+ une paire de moufles, coloris blanc</p>
                            </div>
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{--<div id="lit" class="ctg__epicerie">
        <div class="cat__wrapper">
            <div class="nav-section category-01">
                <a href="#" class="arrow arrow-left w-inline-block"></a>
                <a href="#" class="arrow arrow--right w-inline-block"></a>
            </div>
            <div class="spotlight spotlight__eveil">
                <div class="spotlight--img"></div>
                <div class="spotlight__container">
                    <div class="spotlight_price">
                        <div class="p__old_price old_price--spotlight">
                            <div class="p__old_price_wrapper old_price_wrapper--spotlight">
                                <div class="p__price_1st price_1st--old _1st--spotlight">00</div>
                                <div class="p__price_2nd">
                                    <div class="p__price_cents price_cents--old cents--spotlight">€00</div>
                                </div>
                            </div>
                            <div class="p__cross_bar cross_bar--spotlight"></div>
                        </div>
                        <div class="price_content_wrapper">
                            <div class="p__price_wrapper p_price_wrapper--spotlight">
                                <div class="p__price_1st price_1st--spotlight">00</div>
                                <div class="p__price_cents price_cents--spotlight">€95</div>
                            </div>
                            <div class="p__ecopart p_ecopart--spotlight">ÉCOPART 0€00</div>
                        </div>
                    </div>
                    <div class="p__wrapper p__wrapper--spotlight">
                        <ul role="list" class="list-3 w-list-unstyled">
                            <li class="p__brand">
                                <div class="brand">MARQUE</div>
                            </li>
                            <li class="p__more_infos more_infos__wrapper more_infos--spotlight">
                                <a data-w-id="33f97a03-21e4-12a9-30dc-9699c5fda5f7" href="#"
                                   class="p__more_infos w-inline-block">
                                    <div class="more_infos_cross"></div>
                                </a>
                            </li>
                        </ul>
                        <div class="p__title p__title--spotlight">Produit</div>
                        <p class="p__infos p__infos--spotlight">Divers coloris</p>
                    </div>
                </div>
            </div>
            <div class="items-wrapper">
                <div class="w-layout-grid grid">
                    <div id="w-node-643069de73f7-b30ad297" class="product eveil_article_01">
                        <div class="product-wrapper">
                            <ul role="list" class="list-3 w-list-unstyled">
                                <li class="p__brand">
                                    <div class="brand">tex baby</div>
                                </li>
                                <li class="p__more_infos more_infos__wrapper">
                                    <a data-w-id="Link Block 16" href="#" class="p__more_infos w-inline-block">
                                        <div class="more_infos_cross"></div>
                                    </a>
                                </li>
                            </ul>
                            <div class="p__price spotlight-02">
                                <div class="p__old_price">
                                    <div class="p__old_price_wrapper">
                                        <div class="p__price_1st price_1st--old">00</div>
                                        <div class="p__price_2nd">
                                            <div class="p__price_cents price_cents--old">€00</div>
                                        </div>
                                    </div>
                                    <div class="p__cross_bar spotlight-02"></div>
                                </div>
                                <div class="p__price_wrapper">
                                    <div class="p__price_1st spotlight-02-txt">00</div>
                                    <div class="p__price_cents spotkight-02-txt">€00</div>
                                </div>
                                <div class="p__ecopart spotlight-02-txt">ÉCOPART 0€00</div>
                                <div class="spotlight-02-bg"></div>
                            </div>
                            <div class="p__wrapper">
                                <div class="p__title">Produit</div>
                                <p class="p__infos">Le range pyjama ours ou pingouin est idéal comme ami pour tous
                                    les bébés.Dès la naissance Composition : 100% polyester   </p>
                            </div>
                        </div>
                    </div>
                    <div class="product article__02">
                        <ul role="list" class="list-3 w-list-unstyled">
                            <li class="p__brand">
                                <div class="brand">bambisol</div>
                            </li>
                            <li class="p__more_infos more_infos__wrapper">
                                <a data-w-id="cfcede4d-edd2-4be6-0364-723270e002bf" href="#"
                                   class="p__more_infos w-inline-block">
                                    <div class="more_infos_cross"></div>
                                </a>
                            </li>
                        </ul>
                        <div class="p__price">
                            <div class="p__old_price mask">
                                <div class="p__old_price_wrapper">
                                    <div class="p__price_1st price_1st--old">21</div>
                                    <div class="p__price_2nd">
                                        <div class="p__price_cents price_cents--old">€99</div>
                                    </div>
                                </div>
                                <div class="p__cross_bar"></div>
                            </div>
                            <div class="p__price_wrapper">
                                <div class="p__price_1st">00</div>
                                <div class="p__price_cents">€00</div>
                            </div>
                            <div class="p__ecopart mask">ÉCOPART 0€90</div>
                        </div>
                        <div class="p__wrapper">
                            <div class="p__title">Produit</div>
                            <p class="p__infos p__infos--mask">Du 6 au 36 mois, différents coloris.96% coton <br>issu
                                de l’agriculture biologique- 4% élasthanne.</p>
                        </div>
                    </div>
                    <div class="product article__03">
                        <ul role="list" class="list-3 w-list-unstyled">
                            <li class="p__brand">
                                <div class="brand">MARQUE</div>
                            </li>
                            <li class="p__more_infos more_infos__wrapper">
                                <a data-w-id="bf123b4b-1df3-ad40-6cf6-b5e572715905" href="#"
                                   class="p__more_infos w-inline-block">
                                    <div class="more_infos_cross"></div>
                                </a>
                            </li>
                        </ul>
                        <div class="p__price">
                            <div class="p__old_price">
                                <div class="p__old_price_wrapper">
                                    <div class="p__price_1st price_1st--old">00</div>
                                    <div class="p__price_2nd">
                                        <div class="p__price_cents price_cents--old">€00</div>
                                    </div>
                                </div>
                                <div class="p__cross_bar"></div>
                            </div>
                            <div class="p__price_wrapper">
                                <div class="p__price_1st">0</div>
                                <div class="p__price_cents">€00</div>
                            </div>
                            <div class="p__ecopart">ÉCOPART 0€00</div>
                        </div>
                        <div class="p__wrapper">
                            <div class="p__title">Produit</div>
                            <p class="p__infos p__infos--mask">Composé d’un bonnetbrodé + une paire de chaussons
                                <br>+ une paire de moufles, coloris blanc</p>
                        </div>
                    </div>
                    <div class="product article__03">
                        <ul role="list" class="list-3 w-list-unstyled">
                            <li class="p__brand">
                                <div class="brand">MARQUE</div>
                            </li>
                            <li class="p__more_infos more_infos__wrapper">
                                <a data-w-id="98e97390-5ae1-92b8-a9fe-5f954882a8c4" href="#"
                                   class="p__more_infos w-inline-block">
                                    <div class="more_infos_cross"></div>
                                </a>
                            </li>
                        </ul>
                        <div class="p__price">
                            <div class="p__old_price">
                                <div class="p__old_price_wrapper">
                                    <div class="p__price_1st price_1st--old">00</div>
                                    <div class="p__price_2nd">
                                        <div class="p__price_cents price_cents--old">€00</div>
                                    </div>
                                </div>
                                <div class="p__cross_bar"></div>
                            </div>
                            <div class="p__price_wrapper">
                                <div class="p__price_1st">0</div>
                                <div class="p__price_cents">€00</div>
                            </div>
                            <div class="p__ecopart">ÉCOPART 0€00</div>
                        </div>
                        <div class="p__wrapper">
                            <div class="p__title">Produit</div>
                            <p class="p__infos p__infos--mask">Composé d’un bonnetbrodé + une paire de chaussons
                                <br>+ une paire de moufles, coloris blanc</p>
                        </div>
                    </div>
                    <div class="product article__03">
                        <ul role="list" class="list-3 w-list-unstyled">
                            <li class="p__brand">
                                <div class="brand">MARQUE</div>
                            </li>
                            <li class="p__more_infos more_infos__wrapper">
                                <a data-w-id="62517cd2-d7c5-28cd-2995-5816e7dde436" href="#"
                                   class="p__more_infos w-inline-block">
                                    <div class="more_infos_cross"></div>
                                </a>
                            </li>
                        </ul>
                        <div class="p__price">
                            <div class="p__old_price">
                                <div class="p__old_price_wrapper">
                                    <div class="p__price_1st price_1st--old">00</div>
                                    <div class="p__price_2nd">
                                        <div class="p__price_cents price_cents--old">€00</div>
                                    </div>
                                </div>
                                <div class="p__cross_bar"></div>
                            </div>
                            <div class="p__price_wrapper">
                                <div class="p__price_1st">0</div>
                                <div class="p__price_cents">€00</div>
                            </div>
                            <div class="p__ecopart">ÉCOPART 0€00</div>
                        </div>
                        <div class="p__wrapper">
                            <div class="p__title">Produit</div>
                            <p class="p__infos p__infos--mask">Composé d’un bonnetbrodé + une paire de chaussons
                                <br>+ une paire de moufles, coloris blanc</p>
                        </div>
                    </div>
                    <div class="product article__03">
                        <ul role="list" class="list-3 w-list-unstyled">
                            <li class="p__brand">
                                <div class="brand">MARQUE</div>
                            </li>
                            <li class="p__more_infos more_infos__wrapper">
                                <a data-w-id="476a5554-d725-80a9-0e19-35520214cea7" href="#"
                                   class="p__more_infos w-inline-block">
                                    <div class="more_infos_cross"></div>
                                </a>
                            </li>
                        </ul>
                        <div class="p__price">
                            <div class="p__old_price">
                                <div class="p__old_price_wrapper">
                                    <div class="p__price_1st price_1st--old">00</div>
                                    <div class="p__price_2nd">
                                        <div class="p__price_cents price_cents--old">€00</div>
                                    </div>
                                </div>
                                <div class="p__cross_bar"></div>
                            </div>
                            <div class="p__price_wrapper">
                                <div class="p__price_1st">0</div>
                                <div class="p__price_cents">€00</div>
                            </div>
                            <div class="p__ecopart">ÉCOPART 0€00</div>
                        </div>
                        <div class="p__wrapper">
                            <div class="p__title">Produit</div>
                            <p class="p__infos p__infos--mask">Composé d’un bonnetbrodé + une paire de chaussons
                                <br>+ une paire de moufles, coloris blanc</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="poussette" class="ctg__poussette">
        <div class="cat__wrapper">
            <div class="nav-section category-01">
                <a href="#" class="arrow arrow-left w-inline-block"></a>
                <a href="#" class="arrow arrow--right w-inline-block"></a>
            </div>
            <div class="spotlight spotlight__eveil">
                <div class="spotlight--img"></div>
                <div class="spotlight__container">
                    <div class="spotlight_price">
                        <div class="p__old_price old_price--spotlight">
                            <div class="p__old_price_wrapper old_price_wrapper--spotlight">
                                <div class="p__price_1st price_1st--old _1st--spotlight">00</div>
                                <div class="p__price_2nd">
                                    <div class="p__price_cents price_cents--old cents--spotlight">€00</div>
                                </div>
                            </div>
                            <div class="p__cross_bar cross_bar--spotlight"></div>
                        </div>
                        <div class="price_content_wrapper">
                            <div class="p__price_wrapper p_price_wrapper--spotlight">
                                <div class="p__price_1st price_1st--spotlight">00</div>
                                <div class="p__price_cents price_cents--spotlight">€95</div>
                            </div>
                            <div class="p__ecopart p_ecopart--spotlight">ÉCOPART 0€00</div>
                        </div>
                    </div>
                    <div class="p__wrapper p__wrapper--spotlight">
                        <ul role="list" class="list-3 w-list-unstyled">
                            <li class="p__brand">
                                <div class="brand">MARQUE</div>
                            </li>
                            <li class="p__more_infos more_infos__wrapper more_infos--spotlight">
                                <a data-w-id="7df5f606-bd24-0ec1-1873-e0a683aaa08a" href="#"
                                   class="p__more_infos w-inline-block">
                                    <div class="more_infos_cross"></div>
                                </a>
                            </li>
                        </ul>
                        <div class="p__title p__title--spotlight">Produit</div>
                        <p class="p__infos p__infos--spotlight">Divers coloris</p>
                    </div>
                </div>
            </div>
            <div class="items-wrapper">
                <div class="w-layout-grid grid">
                    <div id="w-node-e0a683aaa092-b30ad297" class="product eveil_article_01">
                        <div class="product-wrapper">
                            <ul role="list" class="list-3 w-list-unstyled">
                                <li class="p__brand">
                                    <div class="brand">tex baby</div>
                                </li>
                                <li class="p__more_infos more_infos__wrapper">
                                    <a data-w-id="7df5f606-bd24-0ec1-1873-e0a683aaa099" href="#"
                                       class="p__more_infos w-inline-block">
                                        <div class="more_infos_cross"></div>
                                    </a>
                                </li>
                            </ul>
                            <div class="p__price spotlight-02">
                                <div class="p__old_price">
                                    <div class="p__old_price_wrapper">
                                        <div class="p__price_1st price_1st--old">00</div>
                                        <div class="p__price_2nd">
                                            <div class="p__price_cents price_cents--old">€00</div>
                                        </div>
                                    </div>
                                    <div class="p__cross_bar spotlight-02"></div>
                                </div>
                                <div class="p__price_wrapper">
                                    <div class="p__price_1st spotlight-02-txt">00</div>
                                    <div class="p__price_cents spotkight-02-txt">€00</div>
                                </div>
                                <div class="p__ecopart spotlight-02-txt">ÉCOPART 0€00</div>
                                <div class="spotlight-02-bg"></div>
                            </div>
                            <div class="p__wrapper">
                                <div class="p__title">Produit</div>
                                <p class="p__infos">Le range pyjama ours ou pingouin est idéal comme ami pour tous
                                    les bébés.Dès la naissance Composition : 100% polyester   </p>
                            </div>
                        </div>
                    </div>
                    <div class="product article__02">
                        <ul role="list" class="list-3 w-list-unstyled">
                            <li class="p__brand">
                                <div class="brand">bambisol</div>
                            </li>
                            <li class="p__more_infos more_infos__wrapper">
                                <a data-w-id="7df5f606-bd24-0ec1-1873-e0a683aaa0b7" href="#"
                                   class="p__more_infos w-inline-block">
                                    <div class="more_infos_cross"></div>
                                </a>
                            </li>
                        </ul>
                        <div class="p__price">
                            <div class="p__old_price mask">
                                <div class="p__old_price_wrapper">
                                    <div class="p__price_1st price_1st--old">21</div>
                                    <div class="p__price_2nd">
                                        <div class="p__price_cents price_cents--old">€99</div>
                                    </div>
                                </div>
                                <div class="p__cross_bar"></div>
                            </div>
                            <div class="p__price_wrapper">
                                <div class="p__price_1st">00</div>
                                <div class="p__price_cents">€00</div>
                            </div>
                            <div class="p__ecopart mask">ÉCOPART 0€90</div>
                        </div>
                        <div class="p__wrapper">
                            <div class="p__title">Produit</div>
                            <p class="p__infos p__infos--mask">Du 6 au 36 mois, différents coloris.96% coton <br>issu
                                de l’agriculture biologique- 4% élasthanne.</p>
                        </div>
                    </div>
                    <div class="product article__03">
                        <ul role="list" class="list-3 w-list-unstyled">
                            <li class="p__brand">
                                <div class="brand">MARQUE</div>
                            </li>
                            <li class="p__more_infos more_infos__wrapper">
                                <a data-w-id="7df5f606-bd24-0ec1-1873-e0a683aaa0d6" href="#"
                                   class="p__more_infos w-inline-block">
                                    <div class="more_infos_cross"></div>
                                </a>
                            </li>
                        </ul>
                        <div class="p__price">
                            <div class="p__old_price">
                                <div class="p__old_price_wrapper">
                                    <div class="p__price_1st price_1st--old">00</div>
                                    <div class="p__price_2nd">
                                        <div class="p__price_cents price_cents--old">€00</div>
                                    </div>
                                </div>
                                <div class="p__cross_bar"></div>
                            </div>
                            <div class="p__price_wrapper">
                                <div class="p__price_1st">0</div>
                                <div class="p__price_cents">€00</div>
                            </div>
                            <div class="p__ecopart">ÉCOPART 0€00</div>
                        </div>
                        <div class="p__wrapper">
                            <div class="p__title">Produit</div>
                            <p class="p__infos p__infos--mask">Composé d’un bonnetbrodé + une paire de chaussons
                                <br>+ une paire de moufles, coloris blanc</p>
                        </div>
                    </div>
                    <div class="product article__03">
                        <ul role="list" class="list-3 w-list-unstyled">
                            <li class="p__brand">
                                <div class="brand">MARQUE</div>
                            </li>
                            <li class="p__more_infos more_infos__wrapper">
                                <a data-w-id="7df5f606-bd24-0ec1-1873-e0a683aaa0f5" href="#"
                                   class="p__more_infos w-inline-block">
                                    <div class="more_infos_cross"></div>
                                </a>
                            </li>
                        </ul>
                        <div class="p__price">
                            <div class="p__old_price">
                                <div class="p__old_price_wrapper">
                                    <div class="p__price_1st price_1st--old">00</div>
                                    <div class="p__price_2nd">
                                        <div class="p__price_cents price_cents--old">€00</div>
                                    </div>
                                </div>
                                <div class="p__cross_bar"></div>
                            </div>
                            <div class="p__price_wrapper">
                                <div class="p__price_1st">0</div>
                                <div class="p__price_cents">€00</div>
                            </div>
                            <div class="p__ecopart">ÉCOPART 0€00</div>
                        </div>
                        <div class="p__wrapper">
                            <div class="p__title">Produit</div>
                            <p class="p__infos p__infos--mask">Composé d’un bonnetbrodé + une paire de chaussons
                                <br>+ une paire de moufles, coloris blanc</p>
                        </div>
                    </div>
                    <div class="product article__03">
                        <ul role="list" class="list-3 w-list-unstyled">
                            <li class="p__brand">
                                <div class="brand">MARQUE</div>
                            </li>
                            <li class="p__more_infos more_infos__wrapper">
                                <a data-w-id="7df5f606-bd24-0ec1-1873-e0a683aaa114" href="#"
                                   class="p__more_infos w-inline-block">
                                    <div class="more_infos_cross"></div>
                                </a>
                            </li>
                        </ul>
                        <div class="p__price">
                            <div class="p__old_price">
                                <div class="p__old_price_wrapper">
                                    <div class="p__price_1st price_1st--old">00</div>
                                    <div class="p__price_2nd">
                                        <div class="p__price_cents price_cents--old">€00</div>
                                    </div>
                                </div>
                                <div class="p__cross_bar"></div>
                            </div>
                            <div class="p__price_wrapper">
                                <div class="p__price_1st">0</div>
                                <div class="p__price_cents">€00</div>
                            </div>
                            <div class="p__ecopart">ÉCOPART 0€00</div>
                        </div>
                        <div class="p__wrapper">
                            <div class="p__title">Produit</div>
                            <p class="p__infos p__infos--mask">Composé d’un bonnetbrodé + une paire de chaussons
                                <br>+ une paire de moufles, coloris blanc</p>
                        </div>
                    </div>
                    <div class="product article__03">
                        <ul role="list" class="list-3 w-list-unstyled">
                            <li class="p__brand">
                                <div class="brand">MARQUE</div>
                            </li>
                            <li class="p__more_infos more_infos__wrapper">
                                <a data-w-id="7df5f606-bd24-0ec1-1873-e0a683aaa133" href="#"
                                   class="p__more_infos w-inline-block">
                                    <div class="more_infos_cross"></div>
                                </a>
                            </li>
                        </ul>
                        <div class="p__price">
                            <div class="p__old_price">
                                <div class="p__old_price_wrapper">
                                    <div class="p__price_1st price_1st--old">00</div>
                                    <div class="p__price_2nd">
                                        <div class="p__price_cents price_cents--old">€00</div>
                                    </div>
                                </div>
                                <div class="p__cross_bar"></div>
                            </div>
                            <div class="p__price_wrapper">
                                <div class="p__price_1st">0</div>
                                <div class="p__price_cents">€00</div>
                            </div>
                            <div class="p__ecopart">ÉCOPART 0€00</div>
                        </div>
                        <div class="p__wrapper">
                            <div class="p__title">Produit</div>
                            <p class="p__infos p__infos--mask">Composé d’un bonnetbrodé + une paire de chaussons
                                <br>+ une paire de moufles, coloris blanc</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="ctg__poussette" class="ctg__rehausseur">
        <div class="cat__wrapper">
            <div class="nav-section category-01">
                <a href="#" class="arrow arrow-left w-inline-block"></a>
                <a href="#" class="arrow arrow--right w-inline-block"></a>
            </div>
            <div class="spotlight spotlight__eveil">
                <div class="spotlight--img"></div>
                <div class="spotlight__container">
                    <div class="spotlight_price">
                        <div class="p__old_price old_price--spotlight">
                            <div class="p__old_price_wrapper old_price_wrapper--spotlight">
                                <div class="p__price_1st price_1st--old _1st--spotlight">00</div>
                                <div class="p__price_2nd">
                                    <div class="p__price_cents price_cents--old cents--spotlight">€00</div>
                                </div>
                            </div>
                            <div class="p__cross_bar cross_bar--spotlight"></div>
                        </div>
                        <div class="price_content_wrapper">
                            <div class="p__price_wrapper p_price_wrapper--spotlight">
                                <div class="p__price_1st price_1st--spotlight">00</div>
                                <div class="p__price_cents price_cents--spotlight">€95</div>
                            </div>
                            <div class="p__ecopart p_ecopart--spotlight">ÉCOPART 0€00</div>
                        </div>
                    </div>
                    <div class="p__wrapper p__wrapper--spotlight">
                        <ul role="list" class="list-3 w-list-unstyled">
                            <li class="p__brand">
                                <div class="brand">MARQUE</div>
                            </li>
                            <li class="p__more_infos more_infos__wrapper more_infos--spotlight">
                                <a data-w-id="409ea112-f4a0-42f6-7f76-e71e46ea01fb" href="#"
                                   class="p__more_infos w-inline-block">
                                    <div class="more_infos_cross"></div>
                                </a>
                            </li>
                        </ul>
                        <div class="p__title p__title--spotlight">Produit</div>
                        <p class="p__infos p__infos--spotlight">Divers coloris</p>
                    </div>
                </div>
            </div>
            <div class="items-wrapper">
                <div class="w-layout-grid grid">
                    <div id="w-node-e71e46ea0203-b30ad297" class="product eveil_article_01">
                        <div class="product-wrapper">
                            <ul role="list" class="list-3 w-list-unstyled">
                                <li class="p__brand">
                                    <div class="brand">tex baby</div>
                                </li>
                                <li class="p__more_infos more_infos__wrapper">
                                    <a data-w-id="409ea112-f4a0-42f6-7f76-e71e46ea020a" href="#"
                                       class="p__more_infos w-inline-block">
                                        <div class="more_infos_cross"></div>
                                    </a>
                                </li>
                            </ul>
                            <div class="p__price spotlight-02">
                                <div class="p__old_price">
                                    <div class="p__old_price_wrapper">
                                        <div class="p__price_1st price_1st--old">00</div>
                                        <div class="p__price_2nd">
                                            <div class="p__price_cents price_cents--old">€00</div>
                                        </div>
                                    </div>
                                    <div class="p__cross_bar spotlight-02"></div>
                                </div>
                                <div class="p__price_wrapper">
                                    <div class="p__price_1st spotlight-02-txt">00</div>
                                    <div class="p__price_cents spotkight-02-txt">€00</div>
                                </div>
                                <div class="p__ecopart spotlight-02-txt">ÉCOPART 0€00</div>
                                <div class="spotlight-02-bg"></div>
                            </div>
                            <div class="p__wrapper">
                                <div class="p__title">Produit</div>
                                <p class="p__infos">Le range pyjama ours ou pingouin est idéal comme ami pour tous
                                    les bébés.Dès la naissance Composition : 100% polyester   </p>
                            </div>
                        </div>
                    </div>
                    <div class="product article__02">
                        <ul role="list" class="list-3 w-list-unstyled">
                            <li class="p__brand">
                                <div class="brand">bambisol</div>
                            </li>
                            <li class="p__more_infos more_infos__wrapper">
                                <a data-w-id="409ea112-f4a0-42f6-7f76-e71e46ea0228" href="#"
                                   class="p__more_infos w-inline-block">
                                    <div class="more_infos_cross"></div>
                                </a>
                            </li>
                        </ul>
                        <div class="p__price">
                            <div class="p__old_price mask">
                                <div class="p__old_price_wrapper">
                                    <div class="p__price_1st price_1st--old">21</div>
                                    <div class="p__price_2nd">
                                        <div class="p__price_cents price_cents--old">€99</div>
                                    </div>
                                </div>
                                <div class="p__cross_bar"></div>
                            </div>
                            <div class="p__price_wrapper">
                                <div class="p__price_1st">00</div>
                                <div class="p__price_cents">€00</div>
                            </div>
                            <div class="p__ecopart mask">ÉCOPART 0€90</div>
                        </div>
                        <div class="p__wrapper">
                            <div class="p__title">Produit</div>
                            <p class="p__infos p__infos--mask">Du 6 au 36 mois, différents coloris.96% coton <br>issu
                                de l’agriculture biologique- 4% élasthanne.</p>
                        </div>
                    </div>
                    <div class="product article__03">
                        <ul role="list" class="list-3 w-list-unstyled">
                            <li class="p__brand">
                                <div class="brand">MARQUE</div>
                            </li>
                            <li class="p__more_infos more_infos__wrapper">
                                <a data-w-id="409ea112-f4a0-42f6-7f76-e71e46ea0247" href="#"
                                   class="p__more_infos w-inline-block">
                                    <div class="more_infos_cross"></div>
                                </a>
                            </li>
                        </ul>
                        <div class="p__price">
                            <div class="p__old_price">
                                <div class="p__old_price_wrapper">
                                    <div class="p__price_1st price_1st--old">00</div>
                                    <div class="p__price_2nd">
                                        <div class="p__price_cents price_cents--old">€00</div>
                                    </div>
                                </div>
                                <div class="p__cross_bar"></div>
                            </div>
                            <div class="p__price_wrapper">
                                <div class="p__price_1st">0</div>
                                <div class="p__price_cents">€00</div>
                            </div>
                            <div class="p__ecopart">ÉCOPART 0€00</div>
                        </div>
                        <div class="p__wrapper">
                            <div class="p__title">Produit</div>
                            <p class="p__infos p__infos--mask">Composé d’un bonnetbrodé + une paire de chaussons
                                <br>+ une paire de moufles, coloris blanc</p>
                        </div>
                    </div>
                    <div class="product article__03">
                        <ul role="list" class="list-3 w-list-unstyled">
                            <li class="p__brand">
                                <div class="brand">MARQUE</div>
                            </li>
                            <li class="p__more_infos more_infos__wrapper">
                                <a data-w-id="409ea112-f4a0-42f6-7f76-e71e46ea0266" href="#"
                                   class="p__more_infos w-inline-block">
                                    <div class="more_infos_cross"></div>
                                </a>
                            </li>
                        </ul>
                        <div class="p__price">
                            <div class="p__old_price">
                                <div class="p__old_price_wrapper">
                                    <div class="p__price_1st price_1st--old">00</div>
                                    <div class="p__price_2nd">
                                        <div class="p__price_cents price_cents--old">€00</div>
                                    </div>
                                </div>
                                <div class="p__cross_bar"></div>
                            </div>
                            <div class="p__price_wrapper">
                                <div class="p__price_1st">0</div>
                                <div class="p__price_cents">€00</div>
                            </div>
                            <div class="p__ecopart">ÉCOPART 0€00</div>
                        </div>
                        <div class="p__wrapper">
                            <div class="p__title">Produit</div>
                            <p class="p__infos p__infos--mask">Composé d’un bonnetbrodé + une paire de chaussons
                                <br>+ une paire de moufles, coloris blanc</p>
                        </div>
                    </div>
                    <div class="product article__03">
                        <ul role="list" class="list-3 w-list-unstyled">
                            <li class="p__brand">
                                <div class="brand">MARQUE</div>
                            </li>
                            <li class="p__more_infos more_infos__wrapper">
                                <a data-w-id="409ea112-f4a0-42f6-7f76-e71e46ea0285" href="#"
                                   class="p__more_infos w-inline-block">
                                    <div class="more_infos_cross"></div>
                                </a>
                            </li>
                        </ul>
                        <div class="p__price">
                            <div class="p__old_price">
                                <div class="p__old_price_wrapper">
                                    <div class="p__price_1st price_1st--old">00</div>
                                    <div class="p__price_2nd">
                                        <div class="p__price_cents price_cents--old">€00</div>
                                    </div>
                                </div>
                                <div class="p__cross_bar"></div>
                            </div>
                            <div class="p__price_wrapper">
                                <div class="p__price_1st">0</div>
                                <div class="p__price_cents">€00</div>
                            </div>
                            <div class="p__ecopart">ÉCOPART 0€00</div>
                        </div>
                        <div class="p__wrapper">
                            <div class="p__title">Produit</div>
                            <p class="p__infos p__infos--mask">Composé d’un bonnetbrodé + une paire de chaussons
                                <br>+ une paire de moufles, coloris blanc</p>
                        </div>
                    </div>
                    <div class="product article__03">
                        <ul role="list" class="list-3 w-list-unstyled">
                            <li class="p__brand">
                                <div class="brand">MARQUE</div>
                            </li>
                            <li class="p__more_infos more_infos__wrapper">
                                <a data-w-id="409ea112-f4a0-42f6-7f76-e71e46ea02a4" href="#"
                                   class="p__more_infos w-inline-block">
                                    <div class="more_infos_cross"></div>
                                </a>
                            </li>
                        </ul>
                        <div class="p__price">
                            <div class="p__old_price">
                                <div class="p__old_price_wrapper">
                                    <div class="p__price_1st price_1st--old">00</div>
                                    <div class="p__price_2nd">
                                        <div class="p__price_cents price_cents--old">€00</div>
                                    </div>
                                </div>
                                <div class="p__cross_bar"></div>
                            </div>
                            <div class="p__price_wrapper">
                                <div class="p__price_1st">0</div>
                                <div class="p__price_cents">€00</div>
                            </div>
                            <div class="p__ecopart">ÉCOPART 0€00</div>
                        </div>
                        <div class="p__wrapper">
                            <div class="p__title">Produit</div>
                            <p class="p__infos p__infos--mask">Composé d’un bonnetbrodé + une paire de chaussons
                                <br>+ une paire de moufles, coloris blanc</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="ctg__poussette" class="ctg__repas">
        <div class="cat__wrapper">
            <div class="nav-section category-01">
                <a href="#" class="arrow arrow-left w-inline-block"></a>
                <a href="#" class="arrow arrow--right w-inline-block"></a>
            </div>
            <div class="spotlight spotlight__eveil">
                <div class="spotlight--img"></div>
                <div class="spotlight__container">
                    <div class="spotlight_price">
                        <div class="p__old_price old_price--spotlight">
                            <div class="p__old_price_wrapper old_price_wrapper--spotlight">
                                <div class="p__price_1st price_1st--old _1st--spotlight">00</div>
                                <div class="p__price_2nd">
                                    <div class="p__price_cents price_cents--old cents--spotlight">€00</div>
                                </div>
                            </div>
                            <div class="p__cross_bar cross_bar--spotlight"></div>
                        </div>
                        <div class="price_content_wrapper">
                            <div class="p__price_wrapper p_price_wrapper--spotlight">
                                <div class="p__price_1st price_1st--spotlight">00</div>
                                <div class="p__price_cents price_cents--spotlight">€95</div>
                            </div>
                            <div class="p__ecopart p_ecopart--spotlight">ÉCOPART 0€00</div>
                        </div>
                    </div>
                    <div class="p__wrapper p__wrapper--spotlight">
                        <ul role="list" class="list-3 w-list-unstyled">
                            <li class="p__brand">
                                <div class="brand">MARQUE</div>
                            </li>
                            <li class="p__more_infos more_infos__wrapper more_infos--spotlight">
                                <a data-w-id="f2a684d6-f70e-b6c7-0f89-3e9328e5c95a" href="#"
                                   class="p__more_infos w-inline-block">
                                    <div class="more_infos_cross"></div>
                                </a>
                            </li>
                        </ul>
                        <div class="p__title p__title--spotlight">Produit</div>
                        <p class="p__infos p__infos--spotlight">Divers coloris</p>
                    </div>
                </div>
            </div>
            <div class="items-wrapper">
                <div class="w-layout-grid grid">
                    <div id="w-node-3e9328e5c962-b30ad297" class="product eveil_article_01">
                        <div class="product-wrapper">
                            <ul role="list" class="list-3 w-list-unstyled">
                                <li class="p__brand">
                                    <div class="brand">tex baby</div>
                                </li>
                                <li class="p__more_infos more_infos__wrapper">
                                    <a data-w-id="f2a684d6-f70e-b6c7-0f89-3e9328e5c969" href="#"
                                       class="p__more_infos w-inline-block">
                                        <div class="more_infos_cross"></div>
                                    </a>
                                </li>
                            </ul>
                            <div class="p__price spotlight-02">
                                <div class="p__old_price">
                                    <div class="p__old_price_wrapper">
                                        <div class="p__price_1st price_1st--old">00</div>
                                        <div class="p__price_2nd">
                                            <div class="p__price_cents price_cents--old">€00</div>
                                        </div>
                                    </div>
                                    <div class="p__cross_bar spotlight-02"></div>
                                </div>
                                <div class="p__price_wrapper">
                                    <div class="p__price_1st spotlight-02-txt">00</div>
                                    <div class="p__price_cents spotkight-02-txt">€00</div>
                                </div>
                                <div class="p__ecopart spotlight-02-txt">ÉCOPART 0€00</div>
                                <div class="spotlight-02-bg"></div>
                            </div>
                            <div class="p__wrapper">
                                <div class="p__title">Produit</div>
                                <p class="p__infos">Le range pyjama ours ou pingouin est idéal comme ami pour tous
                                    les bébés.Dès la naissance Composition : 100% polyester   </p>
                            </div>
                        </div>
                    </div>
                    <div class="product article__02">
                        <ul role="list" class="list-3 w-list-unstyled">
                            <li class="p__brand">
                                <div class="brand">bambisol</div>
                            </li>
                            <li class="p__more_infos more_infos__wrapper">
                                <a data-w-id="f2a684d6-f70e-b6c7-0f89-3e9328e5c987" href="#"
                                   class="p__more_infos w-inline-block">
                                    <div class="more_infos_cross"></div>
                                </a>
                            </li>
                        </ul>
                        <div class="p__price">
                            <div class="p__old_price mask">
                                <div class="p__old_price_wrapper">
                                    <div class="p__price_1st price_1st--old">21</div>
                                    <div class="p__price_2nd">
                                        <div class="p__price_cents price_cents--old">€99</div>
                                    </div>
                                </div>
                                <div class="p__cross_bar"></div>
                            </div>
                            <div class="p__price_wrapper">
                                <div class="p__price_1st">00</div>
                                <div class="p__price_cents">€00</div>
                            </div>
                            <div class="p__ecopart mask">ÉCOPART 0€90</div>
                        </div>
                        <div class="p__wrapper">
                            <div class="p__title">Produit</div>
                            <p class="p__infos p__infos--mask">Du 6 au 36 mois, différents coloris.96% coton <br>issu
                                de l’agriculture biologique- 4% élasthanne.</p>
                        </div>
                    </div>
                    <div class="product article__03">
                        <ul role="list" class="list-3 w-list-unstyled">
                            <li class="p__brand">
                                <div class="brand">MARQUE</div>
                            </li>
                            <li class="p__more_infos more_infos__wrapper">
                                <a data-w-id="f2a684d6-f70e-b6c7-0f89-3e9328e5c9a6" href="#"
                                   class="p__more_infos w-inline-block">
                                    <div class="more_infos_cross"></div>
                                </a>
                            </li>
                        </ul>
                        <div class="p__price">
                            <div class="p__old_price">
                                <div class="p__old_price_wrapper">
                                    <div class="p__price_1st price_1st--old">00</div>
                                    <div class="p__price_2nd">
                                        <div class="p__price_cents price_cents--old">€00</div>
                                    </div>
                                </div>
                                <div class="p__cross_bar"></div>
                            </div>
                            <div class="p__price_wrapper">
                                <div class="p__price_1st">0</div>
                                <div class="p__price_cents">€00</div>
                            </div>
                            <div class="p__ecopart">ÉCOPART 0€00</div>
                        </div>
                        <div class="p__wrapper">
                            <div class="p__title">Produit</div>
                            <p class="p__infos p__infos--mask">Composé d’un bonnetbrodé + une paire de chaussons
                                <br>+ une paire de moufles, coloris blanc</p>
                        </div>
                    </div>
                    <div class="product article__03">
                        <ul role="list" class="list-3 w-list-unstyled">
                            <li class="p__brand">
                                <div class="brand">MARQUE</div>
                            </li>
                            <li class="p__more_infos more_infos__wrapper">
                                <a data-w-id="f2a684d6-f70e-b6c7-0f89-3e9328e5c9c5" href="#"
                                   class="p__more_infos w-inline-block">
                                    <div class="more_infos_cross"></div>
                                </a>
                            </li>
                        </ul>
                        <div class="p__price">
                            <div class="p__old_price">
                                <div class="p__old_price_wrapper">
                                    <div class="p__price_1st price_1st--old">00</div>
                                    <div class="p__price_2nd">
                                        <div class="p__price_cents price_cents--old">€00</div>
                                    </div>
                                </div>
                                <div class="p__cross_bar"></div>
                            </div>
                            <div class="p__price_wrapper">
                                <div class="p__price_1st">0</div>
                                <div class="p__price_cents">€00</div>
                            </div>
                            <div class="p__ecopart">ÉCOPART 0€00</div>
                        </div>
                        <div class="p__wrapper">
                            <div class="p__title">Produit</div>
                            <p class="p__infos p__infos--mask">Composé d’un bonnetbrodé + une paire de chaussons
                                <br>+ une paire de moufles, coloris blanc</p>
                        </div>
                    </div>
                    <div class="product article__03">
                        <ul role="list" class="list-3 w-list-unstyled">
                            <li class="p__brand">
                                <div class="brand">MARQUE</div>
                            </li>
                            <li class="p__more_infos more_infos__wrapper">
                                <a data-w-id="f2a684d6-f70e-b6c7-0f89-3e9328e5c9e4" href="#"
                                   class="p__more_infos w-inline-block">
                                    <div class="more_infos_cross"></div>
                                </a>
                            </li>
                        </ul>
                        <div class="p__price">
                            <div class="p__old_price">
                                <div class="p__old_price_wrapper">
                                    <div class="p__price_1st price_1st--old">00</div>
                                    <div class="p__price_2nd">
                                        <div class="p__price_cents price_cents--old">€00</div>
                                    </div>
                                </div>
                                <div class="p__cross_bar"></div>
                            </div>
                            <div class="p__price_wrapper">
                                <div class="p__price_1st">0</div>
                                <div class="p__price_cents">€00</div>
                            </div>
                            <div class="p__ecopart">ÉCOPART 0€00</div>
                        </div>
                        <div class="p__wrapper">
                            <div class="p__title">Produit</div>
                            <p class="p__infos p__infos--mask">Composé d’un bonnetbrodé + une paire de chaussons
                                <br>+ une paire de moufles, coloris blanc</p>
                        </div>
                    </div>
                    <div class="product article__03">
                        <ul role="list" class="list-3 w-list-unstyled">
                            <li class="p__brand">
                                <div class="brand">MARQUE</div>
                            </li>
                            <li class="p__more_infos more_infos__wrapper">
                                <a data-w-id="f2a684d6-f70e-b6c7-0f89-3e9328e5ca03" href="#"
                                   class="p__more_infos w-inline-block">
                                    <div class="more_infos_cross"></div>
                                </a>
                            </li>
                        </ul>
                        <div class="p__price">
                            <div class="p__old_price">
                                <div class="p__old_price_wrapper">
                                    <div class="p__price_1st price_1st--old">00</div>
                                    <div class="p__price_2nd">
                                        <div class="p__price_cents price_cents--old">€00</div>
                                    </div>
                                </div>
                                <div class="p__cross_bar"></div>
                            </div>
                            <div class="p__price_wrapper">
                                <div class="p__price_1st">0</div>
                                <div class="p__price_cents">€00</div>
                            </div>
                            <div class="p__ecopart">ÉCOPART 0€00</div>
                        </div>
                        <div class="p__wrapper">
                            <div class="p__title">Produit</div>
                            <p class="p__infos p__infos--mask">Composé d’un bonnetbrodé + une paire de chaussons
                                <br>+ une paire de moufles, coloris blanc</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="ctg__poussette" class="ctg__siegeauto">
        <div class="cat__wrapper">
            <div class="nav-section category-01">
                <a href="#" class="arrow arrow-left w-inline-block"></a>
                <a href="#" class="arrow arrow--right w-inline-block"></a>
            </div>
            <div class="spotlight spotlight__eveil">
                <div class="spotlight--img"></div>
                <div class="spotlight__container">
                    <div class="spotlight_price">
                        <div class="p__old_price old_price--spotlight">
                            <div class="p__old_price_wrapper old_price_wrapper--spotlight">
                                <div class="p__price_1st price_1st--old _1st--spotlight">00</div>
                                <div class="p__price_2nd">
                                    <div class="p__price_cents price_cents--old cents--spotlight">€00</div>
                                </div>
                            </div>
                            <div class="p__cross_bar cross_bar--spotlight"></div>
                        </div>
                        <div class="price_content_wrapper">
                            <div class="p__price_wrapper p_price_wrapper--spotlight">
                                <div class="p__price_1st price_1st--spotlight">00</div>
                                <div class="p__price_cents price_cents--spotlight">€95</div>
                            </div>
                            <div class="p__ecopart p_ecopart--spotlight">ÉCOPART 0€00</div>
                        </div>
                    </div>
                    <div class="p__wrapper p__wrapper--spotlight">
                        <ul role="list" class="list-3 w-list-unstyled">
                            <li class="p__brand">
                                <div class="brand">MARQUE</div>
                            </li>
                            <li class="p__more_infos more_infos__wrapper more_infos--spotlight">
                                <a data-w-id="17ed5541-1ecf-cbea-5064-bf7d9dd3bf3c" href="#"
                                   class="p__more_infos w-inline-block">
                                    <div class="more_infos_cross"></div>
                                </a>
                            </li>
                        </ul>
                        <div class="p__title p__title--spotlight">Produit</div>
                        <p class="p__infos p__infos--spotlight">Divers coloris</p>
                    </div>
                </div>
            </div>
            <div class="items-wrapper">
                <div class="w-layout-grid grid">
                    <div id="w-node-bf7d9dd3bf44-b30ad297" class="product eveil_article_01">
                        <div class="product-wrapper">
                            <ul role="list" class="list-3 w-list-unstyled">
                                <li class="p__brand">
                                    <div class="brand">tex baby</div>
                                </li>
                                <li class="p__more_infos more_infos__wrapper">
                                    <a data-w-id="17ed5541-1ecf-cbea-5064-bf7d9dd3bf4b" href="#"
                                       class="p__more_infos w-inline-block">
                                        <div class="more_infos_cross"></div>
                                    </a>
                                </li>
                            </ul>
                            <div class="p__price spotlight-02">
                                <div class="p__old_price">
                                    <div class="p__old_price_wrapper">
                                        <div class="p__price_1st price_1st--old">00</div>
                                        <div class="p__price_2nd">
                                            <div class="p__price_cents price_cents--old">€00</div>
                                        </div>
                                    </div>
                                    <div class="p__cross_bar spotlight-02"></div>
                                </div>
                                <div class="p__price_wrapper">
                                    <div class="p__price_1st spotlight-02-txt">00</div>
                                    <div class="p__price_cents spotkight-02-txt">€00</div>
                                </div>
                                <div class="p__ecopart spotlight-02-txt">ÉCOPART 0€00</div>
                                <div class="spotlight-02-bg"></div>
                            </div>
                            <div class="p__wrapper">
                                <div class="p__title">Produit</div>
                                <p class="p__infos">Le range pyjama ours ou pingouin est idéal comme ami pour tous
                                    les bébés.Dès la naissance Composition : 100% polyester   </p>
                            </div>
                        </div>
                    </div>
                    <div class="product article__02">
                        <ul role="list" class="list-3 w-list-unstyled">
                            <li class="p__brand">
                                <div class="brand">bambisol</div>
                            </li>
                            <li class="p__more_infos more_infos__wrapper">
                                <a data-w-id="17ed5541-1ecf-cbea-5064-bf7d9dd3bf69" href="#"
                                   class="p__more_infos w-inline-block">
                                    <div class="more_infos_cross"></div>
                                </a>
                            </li>
                        </ul>
                        <div class="p__price">
                            <div class="p__old_price mask">
                                <div class="p__old_price_wrapper">
                                    <div class="p__price_1st price_1st--old">21</div>
                                    <div class="p__price_2nd">
                                        <div class="p__price_cents price_cents--old">€99</div>
                                    </div>
                                </div>
                                <div class="p__cross_bar"></div>
                            </div>
                            <div class="p__price_wrapper">
                                <div class="p__price_1st">00</div>
                                <div class="p__price_cents">€00</div>
                            </div>
                            <div class="p__ecopart mask">ÉCOPART 0€90</div>
                        </div>
                        <div class="p__wrapper">
                            <div class="p__title">Produit</div>
                            <p class="p__infos p__infos--mask">Du 6 au 36 mois, différents coloris.96% coton <br>issu
                                de l’agriculture biologique- 4% élasthanne.</p>
                        </div>
                    </div>
                    <div class="product article__03">
                        <ul role="list" class="list-3 w-list-unstyled">
                            <li class="p__brand">
                                <div class="brand">MARQUE</div>
                            </li>
                            <li class="p__more_infos more_infos__wrapper">
                                <a data-w-id="17ed5541-1ecf-cbea-5064-bf7d9dd3bf88" href="#"
                                   class="p__more_infos w-inline-block">
                                    <div class="more_infos_cross"></div>
                                </a>
                            </li>
                        </ul>
                        <div class="p__price">
                            <div class="p__old_price">
                                <div class="p__old_price_wrapper">
                                    <div class="p__price_1st price_1st--old">00</div>
                                    <div class="p__price_2nd">
                                        <div class="p__price_cents price_cents--old">€00</div>
                                    </div>
                                </div>
                                <div class="p__cross_bar"></div>
                            </div>
                            <div class="p__price_wrapper">
                                <div class="p__price_1st">0</div>
                                <div class="p__price_cents">€00</div>
                            </div>
                            <div class="p__ecopart">ÉCOPART 0€00</div>
                        </div>
                        <div class="p__wrapper">
                            <div class="p__title">Produit</div>
                            <p class="p__infos p__infos--mask">Composé d’un bonnetbrodé + une paire de chaussons
                                <br>+ une paire de moufles, coloris blanc</p>
                        </div>
                    </div>
                    <div class="product article__03">
                        <ul role="list" class="list-3 w-list-unstyled">
                            <li class="p__brand">
                                <div class="brand">MARQUE</div>
                            </li>
                            <li class="p__more_infos more_infos__wrapper">
                                <a data-w-id="17ed5541-1ecf-cbea-5064-bf7d9dd3bfa7" href="#"
                                   class="p__more_infos w-inline-block">
                                    <div class="more_infos_cross"></div>
                                </a>
                            </li>
                        </ul>
                        <div class="p__price">
                            <div class="p__old_price">
                                <div class="p__old_price_wrapper">
                                    <div class="p__price_1st price_1st--old">00</div>
                                    <div class="p__price_2nd">
                                        <div class="p__price_cents price_cents--old">€00</div>
                                    </div>
                                </div>
                                <div class="p__cross_bar"></div>
                            </div>
                            <div class="p__price_wrapper">
                                <div class="p__price_1st">0</div>
                                <div class="p__price_cents">€00</div>
                            </div>
                            <div class="p__ecopart">ÉCOPART 0€00</div>
                        </div>
                        <div class="p__wrapper">
                            <div class="p__title">Produit</div>
                            <p class="p__infos p__infos--mask">Composé d’un bonnetbrodé + une paire de chaussons
                                <br>+ une paire de moufles, coloris blanc</p>
                        </div>
                    </div>
                    <div class="product article__03">
                        <ul role="list" class="list-3 w-list-unstyled">
                            <li class="p__brand">
                                <div class="brand">MARQUE</div>
                            </li>
                            <li class="p__more_infos more_infos__wrapper">
                                <a data-w-id="17ed5541-1ecf-cbea-5064-bf7d9dd3bfc6" href="#"
                                   class="p__more_infos w-inline-block">
                                    <div class="more_infos_cross"></div>
                                </a>
                            </li>
                        </ul>
                        <div class="p__price">
                            <div class="p__old_price">
                                <div class="p__old_price_wrapper">
                                    <div class="p__price_1st price_1st--old">00</div>
                                    <div class="p__price_2nd">
                                        <div class="p__price_cents price_cents--old">€00</div>
                                    </div>
                                </div>
                                <div class="p__cross_bar"></div>
                            </div>
                            <div class="p__price_wrapper">
                                <div class="p__price_1st">0</div>
                                <div class="p__price_cents">€00</div>
                            </div>
                            <div class="p__ecopart">ÉCOPART 0€00</div>
                        </div>
                        <div class="p__wrapper">
                            <div class="p__title">Produit</div>
                            <p class="p__infos p__infos--mask">Composé d’un bonnetbrodé + une paire de chaussons
                                <br>+ une paire de moufles, coloris blanc</p>
                        </div>
                    </div>
                    <div class="product article__03">
                        <ul role="list" class="list-3 w-list-unstyled">
                            <li class="p__brand">
                                <div class="brand">MARQUE</div>
                            </li>
                            <li class="p__more_infos more_infos__wrapper">
                                <a data-w-id="17ed5541-1ecf-cbea-5064-bf7d9dd3bfe5" href="#"
                                   class="p__more_infos w-inline-block">
                                    <div class="more_infos_cross"></div>
                                </a>
                            </li>
                        </ul>
                        <div class="p__price">
                            <div class="p__old_price">
                                <div class="p__old_price_wrapper">
                                    <div class="p__price_1st price_1st--old">00</div>
                                    <div class="p__price_2nd">
                                        <div class="p__price_cents price_cents--old">€00</div>
                                    </div>
                                </div>
                                <div class="p__cross_bar"></div>
                            </div>
                            <div class="p__price_wrapper">
                                <div class="p__price_1st">0</div>
                                <div class="p__price_cents">€00</div>
                            </div>
                            <div class="p__ecopart">ÉCOPART 0€00</div>
                        </div>
                        <div class="p__wrapper">
                            <div class="p__title">Produit</div>
                            <p class="p__infos p__infos--mask">Composé d’un bonnetbrodé + une paire de chaussons
                                <br>+ une paire de moufles, coloris blanc</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}
</div>
@include('partials.footer')
</body>
</html>
