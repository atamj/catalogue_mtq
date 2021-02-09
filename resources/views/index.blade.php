<!DOCTYPE html><!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Fri Feb 05 2021 18:12:15 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="601d786ad06b3f9b2b0ad294" data-wf-site="601d786ad06b3f2f840ad293">
@include('partials.head', ['title'=> "Le meilleur pour bebe"])
<body>
<div data-collapse="medium" data-animation="default" data-duration="400" role="banner" class="nav w-nav">
    <div class="nav__container">
        <div class="nav_conrainer__wrapper">
            <a href="https://www.carrefour-martinique.com/" rel="nofollow" class="logo-full w-inline-block"><img
                    src="{{asset('images/logo-jai_choisi_color.svg')}}" loading="lazy" height="60" width="150" alt=""
                    class="logo"></a>
            <a href="#" class="logo-short w-inline-block"><img src="{{asset('images/logo-short.svg')}}" loading="lazy" width="50"
                                                               alt=""></a>
            <a href="{{url('/')}}" aria-current="page" class="event-link w-nav-brand w--current">
                <h1 class="event">Avec Carrefour, <span class="text-span-4">je choisis le meilleur pour bébé</span></h1>
            </a>
            <a href="#" class="download_catalogue w-inline-block"><img src="{{asset('images/arrow-down-circle-outline.svg')}}"
                                                                       loading="lazy" alt="" class="image">
                <div class="text-block-2">Télécharger le catalogue</div>
            </a>
        </div>
    </div>
    <ul role="list" class="nav__center w-list-unstyled">
        <li class="nav__snd_title">
            <div class="text-block-4">du 17 février au 7 mars</div>
        </li>
        <li class="nav__ctg_lnk">
            <a href="{{url('/equipement#rehausseur')}}" class="link-block-6 w-inline-block">
                <div class="text-block-5">VOIR LE CATALOGUE</div>
            </a>
        </li>
    </ul>
</div>
<div class="hero">
    <div class="categories">
        <div data-w-id="a33e95c8-212f-b6d9-7add-46fac327b305" class="ctg__title img_gears">
            <div class="ctg__title--size bg--yellow">Equipement</div>
        </div>
        <div data-w-id="2877d8d1-2777-7bb4-3ce4-761949e2038e" class="ctg__menu ctg__menu--gears">
            <a data-w-id="Link Block 11" href="#" class="ctg__link close_menu w-inline-block">
                <div class="ctg__link_txt"></div>
            </a>
            <a href="{{url('equipement#rehausseur')}}" class="ctg__link w-inline-block">
                <div class="ctg__link_txt link_text--green">Réhausseur</div>
            </a>
            <a href="{{url('equipement#siege-auto')}}" class="ctg__link w-inline-block">
                <div class="ctg__link_txt link_text--green">Siège auto</div>
            </a>
            <a href="{{url('equipement#poussette')}}" class="ctg__link w-inline-block">
                <div class="ctg__link_txt link_text--green">Poussettes</div>
            </a>
            <a href="{{url('equipement#lit')}}" class="ctg__link w-inline-block">
                <div class="ctg__link_txt link_text--green">Lit bébé</div>
            </a>
            <a href="{{url('equipement#repas')}}" class="ctg__link w-inline-block">
                <div class="ctg__link_txt link_text--green">REPAS</div>
            </a>

        </div>
    </div>
    <div class="categories">
        <div data-w-id="e737e8ab-8ea7-a3fc-5439-b8442fdbf467" class="ctg__title img_bath">
            <div class="ctg__title--size bg--green">Eveil et bain</div>
        </div>
        <div data-w-id="e737e8ab-8ea7-a3fc-5439-b8442fdbf46a" class="ctg__menu ctg__menu--bath">
            <a data-w-id="e737e8ab-8ea7-a3fc-5439-b8442fdbf46b" href="#" class="ctg__link close_menu w-inline-block">
                <div class="ctg__link_txt"></div>
            </a>
            <a href="{{url('eveil-bain#eveil')}}" class="ctg__link w-inline-block">
                <div class="ctg__link_txt link_text--yellow">éveil</div>
            </a>
            <a href="{{url('eveil-bain#bain')}}" class="ctg__link w-inline-block">
                <div class="ctg__link_txt link_text--yellow">Bain</div>
            </a>
        </div>
    </div>
    <div class="categories">
        <div data-w-id="ecfbe255-90d7-dc63-a8b7-bbde5cd9b659" class="ctg__title img_clothes">
            <div class="ctg__title--size bg--yellow">Textile</div>
        </div>
        <div data-w-id="ecfbe255-90d7-dc63-a8b7-bbde5cd9b65c" class="ctg__menu ctg__menu--gears">
            <a data-w-id="ecfbe255-90d7-dc63-a8b7-bbde5cd9b65d" href="#" class="ctg__link close_menu w-inline-block">
                <div class="ctg__link_txt"></div>
            </a>
            <a href="{{url('textile#textile')}}" class="ctg__link w-inline-block">
                <div class="ctg__link_txt link_text--green">TEXTILE</div>
            </a>
        </div>
    </div>
    <div class="categories">
        <div data-w-id="c8f6ca3f-e9eb-085e-770b-b505a46bc94a" class="ctg__title img_food">
            <div class="ctg__title--size bg--green">Epicerie bebe</div>
        </div>
        <div data-w-id="c8f6ca3f-e9eb-085e-770b-b505a46bc94d" class="ctg__menu ctg__menu--bath">
            <a data-w-id="8c75a8a5-985e-7def-8afb-372d46c7a396" href="#"
               class="ctg__link close_menu w-inline-block"></a>
            <a href="{{url('epicerie#epicerie-bebe')}}" class="ctg__link w-inline-block">
                <div class="ctg__link_txt link_text--yellow">Epicerie Bébé</div>
            </a>
        </div>
    </div>
    <div class="categories">
        <div data-w-id="16fb7820-59f5-8ce6-762d-36811848249e" class="ctg__title img_hygene">
            <div class="ctg__title--size bg--yellow">Hygiène</div>
        </div>
        <div data-w-id="16fb7820-59f5-8ce6-762d-3681184824a1" class="ctg__menu ctg__menu--gears">
            <a data-w-id="16fb7820-59f5-8ce6-762d-3681184824a2" href="#"
               class="ctg__link close_menu w-inline-block"></a>
            <a href="{{url('hygiene#hygiene-bebe')}}" class="ctg__link w-inline-block">
                <div class="ctg__link_txt link_text--green">Hygiene bébé</div>
            </a>
            <a href="{{url('hygiene#hygiene')}}" class="ctg__link w-inline-block">
                <div class="ctg__link_txt link_text--green">Hygiène</div>
            </a>
        </div>
    </div>
</div>
@include('partials.footer')
</body>
</html>
