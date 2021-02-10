<div class="sticky-menu">
    <a data-w-id="Link Block" href="#" class="burger w-inline-block"><img src="images/menu-outline.svg" loading="lazy"
                                                                          width="30" alt=""></a>
    <div data-w-id="Div Block 3" class="list-menu">
        @foreach($sous_categories as $key => $sous_category)
            <a href="#{{$key}}" class="menu-items w-inline-block">
                <div class="text-block-2">{{$sous_category}}</div>
            </a>
        @endforeach
    </div>
</div>
