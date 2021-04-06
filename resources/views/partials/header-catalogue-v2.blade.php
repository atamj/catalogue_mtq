<div class="nav_conrainer__wrapper">

    <a data-w-id="Link Block 11" href="{{$client->site}}" rel="nofollow"
       class="logo-full w-inline-block">
        <img src="{{asset('storage/clients/'.$client->id.'/logo_header/'.$client->logo_header)}}" loading="lazy"
             height="60" width="150" alt="" class="logo">
    </a>
    <a href="{{$client->site}}" rel="nofollow" class="logo-short w-inline-block"><img
            src="{{asset('storage/clients/'.$client->id.'/logo_short/logo_short.svg')}}" loading="lazy" width="50"
            alt=""></a>
    <div class="ope-title-block">
        <a href="{{url($operation->shortname)}}" class="{{--event-link--}} w-nav-brand">
            <h1 class="event" style="color: {{$pivot->title_color}}">
                {{$pivot->title}}
            </h1>
        </a>
        <div class="text-block-4 bg_primary txt-white">
            {{$category->name ?? $category}}
        </div>
        <div class="back">
            <a href="{{url('/'.$operation->shortname)}}">RETOUR A L’ACCUEIL</a>
        </div>

    </div>
    <a data-w-id="Link Block 22" href="#" class="menu_btn w-inline-block">
        <div class="lines_wrapper">
            <div class="lines lines--top"></div>
            <div class="lines lines--mdl"></div>
            <div class="lines lines--btm"></div>
        </div>
    </a>
    <div class="header-right-content">
        @if(isset($categories) && count($categories) > 0)
            <a class="voir-cata" href="{{url('/'.$operation->shortname.'/catalogue#'.($categories->first()->subCategories()->first() ? $categories->first()->subCategories()->first()->url : $categories->first()->url))}}">
                VOIR TOUT LE CATALOGUE
            </a>
        @else
            <a href="#" class="voir-cata">
                VOIR TOUT LE CATALOGUE
            </a>
        @endif
        <div class="separator">|</div>
        <div>
            <a class="download-cata" href="{{asset('storage/'.$operation->shortname.'/catalogue/'.$client->id.'/catalogue.pdf')}}"
               download="catalogue.pdf">Télécharger</a>
        </div>
    </div>
</div>
<div class="nav-mobile-active">
    <div class="text-block-4 bg_primary txt-white">
        du {{strftime('%d %B',strtotime($operation->start)) ?? "19 février"}}
        au {{strftime('%d %B',strtotime($operation->end)) ?? "7 mars"}}
    </div>
    <div>
        @if(isset($categories) && count($categories) > 0)
            <a class="voir-cata" href="{{url('/'.$operation->shortname.'/catalogue#'.($categories->first()->subCategories()->first() ? $categories->first()->subCategories()->first()->url : $categories->first()->url))}}">
                VOIR TOUT LE CATALOGUE
            </a>
        @else
            <a href="#" class="voir-cata">
                VOIR TOUT LE CATALOGUE
            </a>
        @endif
    </div>
</div>
