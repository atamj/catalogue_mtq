<div class="menu">
    <a data-w-id="Link Block 22" href="#" class="menu_btn w-inline-block">
        <div class="lines_wrapper">
            <div class="lines lines--top"></div>
            <div class="lines lines--mdl"></div>
            <div class="lines lines--btm"></div>
        </div>
    </a>
    <div class="menu_list">
        <a href="{{url('/'.$operation->shortname)}}" data-w-id="13c335a3-d343-5feb-6ae3-f865f09756f7" class="link-block-15 w-inline-block">
            <div class="text-block-15 back-btn">Retour au catalogue</div>
        </a>
        @foreach($sous_categories as $sous_category)
            <a href="#{{$sous_category->url}}" data-w-id="Link Block 21" class="link-block-15 w-inline-block">
                <div class="text-block-15">{{$sous_category->name}}</div>
            </a>
        @endforeach
    </div>
</div>
