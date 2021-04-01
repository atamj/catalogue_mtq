<div class="menu">
    <div class="menu_list">
<!--        <a href="{{url('/'.$operation->shortname)}}" data-w-id="13c335a3-d343-5feb-6ae3-f865f09756f7" class="link-block-15 w-inline-block">
            <div class="text-block-15 back-btn">RETOUR A L’ACCUEIL</div>
        </a>-->
        @if (isset($sous_categories) && count($sous_categories) > 0)
            @foreach($sous_categories as $sous_category)
                <a href="#{{$sous_category->url}}" data-w-id="Link Block 21" class="link-block-15 w-inline-block">
                    <div class="text-block-15">{{$sous_category->name}}</div>
                </a>
            @endforeach
        @else
            @foreach($categories as $sous_category)
                <a href="{{url($operation->shortname . "/" . $sous_category->url . "#" . $sous_category->url)}}" data-w-id="Link Block 21" class="link-block-15 w-inline-block">
                    <div class="text-block-15 {{url()->current() == url($operation->shortname . "/" . $sous_category->url) ? "current" : ""}}">{{$sous_category->name}}</div>
                </a>
            @endforeach
        @endif
    </div>
</div>
