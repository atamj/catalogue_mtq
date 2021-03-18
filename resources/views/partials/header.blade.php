<div class="nav_conrainer__wrapper">

    <a data-w-id="Link Block 11" href="{{$client->site}}" rel="nofollow"
       class="logo-full w-inline-block">
        <img src="{{asset('storage/clients/'.$client->id.'/logo_header/'.$client->logo_header)}}" loading="lazy"
             height="60" width="150" alt="" class="logo">
    </a>
    <a href="{{$client->site}}" rel="nofollow" class="logo-short w-inline-block"><img
            src="{{asset('storage/client/'.$client->id.'/logo_short/logo_short.svg')}}" loading="lazy" width="50"
            alt=""></a>
    <a href="{{url($operation->shortname)}}" class="event-link w-nav-brand">
        <h1 class="event" style="color: {{$pivot->title_color}}">
            {{$pivot->title}}
        </h1>
    </a>
    <a href="{{asset('storage/'.$operation->shortname.'/catalogue/'.$client->id.'/catalogue.pdf')}}" download="catalogue.pdf" class="download_catalogue w-inline-block">
        <img src="{{asset('icons/arrow-down-circle-outline.svg')}}"
             loading="lazy" alt="" class="image">
        <div class="text-block-2">Télécharger le catalogue</div>
    </a>
</div>
