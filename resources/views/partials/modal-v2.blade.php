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
            <div class="p_img--big" id="bg_img_spot" style="background-image: url('{{asset('storage/' . $operation->shortname . "/images/modal_bg/modal_bg.svg" )}}');" data-bg="{{asset('storage/' . $operation->shortname . "/images/modal_bg/modal_bg.svg" )}}" data-bg-smart="{{asset('storage/' . $operation->shortname . "/images/modal_bg/modal_bg_smartcash.svg" )}}">
                <div style="" id="photo_principale"></div>
            </div>
            <div class="p__details">
                <div class="p__wrapper p_wrapper_details">
                    <div class="p__title p_title--detail" id="designation"><br></div>
                    <p class="p__infos p_infos--details" id="description_short"></p>

                    <div class="p__old_price" style="display: none">
                        <div class="p__old_price_wrapper">
                            <div
                                class="p__price_1st price_1st--old" id="prix_barre_1"></div>
                            <div class="p__price_2nd">
                                <div class="p__price_cents price_cents--old" id="prix_barre_2"></div>
                            </div>
                        </div>
                        <div
                            class="p__cross_bar"></div>
                    </div>
                    <div id="prix_cagnotte_reduite"></div>
                    <small id="prix_cagnotte_reduite_mention">Prix cagnotte deduite</small>
                    <div class="parent_price">
                        <div>
                            <div class="p__price_wrapper p_price_wrapper--detail">
                                <div class="p__price_1st _1st--detail" id="prix_vente_1"></div>
                                <div class="p__price_cents" id="prix_vente_2"></div>
                            </div>
                            <small id="prix_caise_smart_mention">prix payé en caisse</small>
                        </div>
                        <div class="smartcash" style="background-image: url('{{asset('storage/je-choisis-etre-belle/images/stickers/smartcash.svg')}}');">
                            <p>
                                <sup></sup>
                                <br>
                                <span>EN SMART <i>Cash **</i></span>
                            </p>
                        </div>
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
                                <div class="share-bn__wrapper">
                                    <svg height="20" viewBox="0 0 18.462 20" width="18.462" xmlns="http://www.w3.org/2000/svg"><path d="m79.385 48a3.089 3.089 0 0 0 -3.077 3.077 3.046 3.046 0 0 0 .1.79l-7.118 4.006a3.077 3.077 0 1 0 0 4.255l7.122 4.006a3.046 3.046 0 0 0 -.1.79 3.075 3.075 0 0 0 6.15.078.769.769 0 0 0 0-.156 3.069 3.069 0 0 0 -5.287-2.05l-7.123-4.007a3.049 3.049 0 0 0 .1-.71.769.769 0 0 0 0-.156 3.048 3.048 0 0 0 -.1-.71l7.123-4.007a3.069 3.069 0 0 0 5.287-2.05.769.769 0 0 0 0-.156 3.087 3.087 0 0 0 -3.077-3zm0 1.538a1.538 1.538 0 1 1 -1.311 2.351q-.014-.03-.03-.059t-.031-.051a1.55 1.55 0 0 1 -.167-.7 1.527 1.527 0 0 1 1.539-1.541zm-12.308 6.924a1.528 1.528 0 0 1 1.311.726q.014.03.03.059t.031.051a1.568 1.568 0 0 1 0 1.407q-.017.025-.031.051t-.03.059a1.54 1.54 0 1 1 -1.311-2.351zm12.308 6.923a1.538 1.538 0 1 1 -1.538 1.538 1.55 1.55 0 0 1 .167-.7q.017-.025.031-.051t.03-.059a1.528 1.528 0 0 1 1.31-.728z" fill="#fff" transform="translate(-64 -48)"/></svg>
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
