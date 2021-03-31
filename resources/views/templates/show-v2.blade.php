<!doctype html>
<html lang="fr">
@include('partials.head',['title'=> "Catalogue:".$product->designation])
<body>
<div class="product_detail" style="display: block;background-image: url('{{asset('storage/' . $product->ope . '/images/autres/bg-show.svg')}}');">
    <div class="detail__container">
        <div class="close_window_wrapper">
            <a data-w-id="Link Block 15" href="{{url($product->ope.'/'.$product->categorie_url.'#'.$product->sous_categorie_url)}}"
               class="close_window w-inline-block">
                <div class="p__more_infos more_infos--detail">
                    <div class="more_infos_cross cross--detail"></div>
                </div>
                <div>Fermer</div>
            </a>
        </div>
        <div class="div-block-10">
            <div class="p_img--big" id="photo_principale"
                 style="background-image: url('{{asset('images/'.$product->photo_principale)}}')"></div>
            <div class="p__details">
                <div class="p__wrapper p_wrapper_details">
                    <div class="p__title p_title--detail" id="designation">{{$product->designation}}<br></div>
                    <p class="p__infos p_infos--details"></p>
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
                                class="p__cross_bar"></div>
                        </div>
                    @endif
                    <div class="p__price_wrapper p_price_wrapper--detail">
                        <div class="p__price_1st _1st--detail"
                             id="prix_vente_1">{{explode(',', $product->prix_vente)[0]}}</div>
                        <div class="p__price_cents" id="prix_vente_2">€{{explode(',', $product->prix_vente)[1]}}</div>
                    </div>
                    {{--@if ($product->eco_part)
                        <div class="p__ecopart" id="eco_part">ÉCOPART {{$product->eco_part}}€</div>
                    @endif--}}
                    <div class="brand brand--detail" id="marque">{{$product->marque}}</div>
{{--                    <div class="text-block-12"><span class="ean ean--detail" id="ean">EAN: {{$product->ean}}</span></div>--}}
                    <p class="paragraph" id="description_produit">{{$product->description_produit}}</p>
                    <div class="img-gallery" style="display: none">
                        <div class="img-gallery-txt">Plus d&#x27;images</div>
                        <div class="w-layout-grid img-gallery-grid">
                            <a id="photo_1" href="#" class="link-block-8 w-inline-block"
                               style="background-image: url('{{asset('images/'.$product->photo_principale)}}')"></a>
                            @if ($product->photo_2)
                                <a id="photo_2" href="#" class="link-block-8 w-inline-block"
                                   style="background-image: url('{{asset('storage/'.$product->ope.'/images/'.$product->photo_2)}}')"></a>
                            @endif
                            @if ($product->photo_3)
                                <a id="photo_3" style="display: none" href="#" class="link-block-8 w-inline-block"
                                   style="background-image: url('{{asset('storage/'. $product->ope .'/images/'.$product->photo_3)}}')"></a>
                            @endif
                        </div>
                    </div>
                    {{--<div class="img_details_wrapper">
                        <div class="img-share--wrapper">
                            @include('partials.share')

                            <a href="#" class="link-block-11 w-inline-block">
                                <div class="share-bn__wrapper"><img src="images/share-icon.svg"
                                                                    loading="lazy" alt="">
                                </div>
                                <div class="text-block-11" id="share">Partager</div>
                            </a>
                        </div>
                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/laflow.js')}}"></script>
</body>
</html>
