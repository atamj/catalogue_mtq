<div style="opacity:0;display:none;background-color: rgba(52,52,52,0.95);"
     class="product_detail">
    <div class="detail__container">
        <div class="close_window_wrapper">
            <a data-w-id="Link Block 15" href="#" class="close_window w-inline-block">
                <div class="p__more_infos more_infos--detail">
                    <div class="more_infos_cross cross--detail">+</div>
                </div>
                <div>Fermer</div>
            </a>
        </div>
        <div class="div-block-10">
            <div class="p_img--big" style="background-image: url('{{asset('storage/' . $operation->shortname . "/images/modal_bg/modal_bg.svg" )}}');">
                <div style="" id="photo_principale"></div>
            </div>
            <div class="p__details">
                <div class="p__wrapper p_wrapper_details">
                    <div class="p__title p_title--detail" id="designation"><br></div>
                    <p class="p__infos p_infos--details" id="description_short"></p>

<!--                    <div class="p__old_price" style="display: none">
                        <div class="p__old_price_wrapper">
                            <div
                                class="p__price_1st price_1st&#45;&#45;old" id="prix_barre_1"></div>
                            <div class="p__price_2nd">
                                <div class="p__price_cents price_cents&#45;&#45;old" id="prix_barre_2"></div>
                            </div>
                        </div>
                        <div
                            class="p__cross_bar"></div>
                    </div>-->
                    <div class="p__price_wrapper p_price_wrapper--detail">
                        <div class="p__price_1st _1st--detail" id="prix_vente_1"></div>
                        <div class="p__price_cents" id="prix_vente_2"></div>
                    </div>
                    {{--                    <div class="p__ecopart" id="eco_part"></div>--}}
                    <div class="brand brand--detail" id="marque"></div>
                    {{--                    <div class="text-block-12"><span class="ean ean--detail" id="ean"></span></div>--}}
                    <p class="paragraph" id="description_produit"></p>
                    <div class="img-gallery" style="display: none">
                        <div class="img-gallery-txt">Plus d&#x27;images</div>
                        <div class="w-layout-grid img-gallery-grid">
                            {{--                            <a id="" href="#" class="img_details_arrow arrow--left w-inline-block"></a>--}}
                            <a id="photo_1" href="#" class="link-block-8 w-inline-block"></a>
                            <a id="photo_2" href="#" class="link-block-8 w-inline-block"></a>
                            <a id="photo_3" style="display: none" href="#" class="link-block-8 w-inline-block"></a>
                            {{--                            <a id="" href="#" class="img_details_arrow arrow--right w-inline-block"></a>--}}
                        </div>
                    </div>
                    <div class="img_details_wrapper">
                        <div class="img-share--wrapper">
                            @include('partials.share')

                            <a href="#" class="link-block-11 w-inline-block" onclick="(e)=>e.preventDefault()">
                                <div class="share-bn__wrapper"><img src="{{asset('icons/share-icon.svg')}}"
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
