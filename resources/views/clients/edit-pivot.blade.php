@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modifier les infos <b>{{$client->name}}</b> sur l'opération <b>{{$operation->title}}</b></div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{url('admin/client-operation/'. $pivot->client_id)}}"
                              enctype="multipart/form-data">
                            @csrf()
                            @method('PUT')
                            <input type="hidden" name="pivot_id" value="{{$pivot->id}}">
                            <div class="mb-3">
                                <label for="title" class="form-label">Titre d'affichage de l'opération</label>
                                <input type="text" class="form-control" id="title" name="title"
                                       aria-describedby="titleHelp" required value="{{$pivot->title ?? ""}}">
                                {{--                                <div id="titleHelp" class="form-text">Sera afficher dans le footer</div>--}}
                            </div>
                            <div class="mb-3">
                                <label for="title_color" class="form-label">Couleur du titre d'affichage de l'opération</label>
                                <input type="color" class="form-control" id="title_color" name="title_color"
                                       aria-describedby="title_colorHelp" value="{{$pivot->title_color ?? "#A45F3F"}}">
                            </div>
                            <div class="mb-3">
                                <label for="header_bgc" class="form-label">Couleur de fond du header</label>
                                <input type="color" class="form-control" id="header_bgc" name="header_bgc"
                                       aria-describedby="header_bgcHelp" value="{{$pivot->header_bgc ?? "#FFFFFF"}}">
                            </div>
                            <div class="mb-3 row">
                                <div class="col-7">
                                    <label for="header_bgi" class="form-label">
                                        Image de fond du header
                                    </label>
                                    <input type="file" class="form-control" id="header_bgi" name="header_bgi"
                                           aria-describedby="header_bgiHelp" accept="image/*">
                                </div>
                                @if ($pivot->header_bgi)
                                    <div class="col-5">
                                        <img width="100px" height="auto" src="{{asset('storage/'.$operation->shortname.'/images/header_bgi/'.$client->id.'/'.$pivot->header_bgi)}}" alt="header_bgi">
                                        <label for="del_header_bgi" class="text-danger">Supprimer</label> <input type="checkbox" id="del_header_bgi" name="del_header_bgi" value="1">
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="header_color" class="form-label">Couleur de texte du header</label>
                                <input type="color" class="form-control" id="header_color" name="header_color"
                                       aria-describedby="header_colorHelp" value="{{$pivot->header_color ?? "#05539c"}}">
                            </div>
                            <hr>
                            <div class="mb-3">
                                <label for="footer_top_bgc" class="form-label">Couleur de fond du haut footer</label>
                                <input type="color" class="form-control" id="footer_top_bgc" name="footer_top_bgc"
                                       aria-describedby="footer_top_bgcHelp" value="{{$pivot->footer_top_bgc ?? "#05539c"}}">
                            </div>
                            <div class="mb-3 row">
                                <div class="col-7">
                                    <label for="footer_top_bgi" class="form-label">Image de fond du haut footer</label>
                                    <input type="file" class="form-control" id="footer_top_bgi" name="footer_top_bgi"
                                           aria-describedby="footer_top_bgiHelp" accept=".jpg, .jpeg, .png, .svg">
                                </div>
                                @if ($pivot->footer_top_bgi)
                                    <div class="col-5">
                                        <img width="100px" height="auto" src="{{asset('storage/'.$operation->shortname.'/images/footer_top_bgi/'.$client->id.'/'.$pivot->footer_top_bgi)}}" alt="footer_top_bgi">
                                        <label for="del_footer_top_bgi" class="text-danger">Supprimer</label> <input type="checkbox" id="del_footer_top_bgi" name="del_footer_top_bgi" value="1">
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="footer_top_color" class="form-label">Couleur de texte du haut footer</label>
                                <input type="color" class="form-control" id="footer_top_color" name="footer_top_color"
                                       aria-describedby="footer_top_colorHelp" value="{{$pivot->footer_top_color ?? "#FFFFFF"}}">
                            </div>
                            <div class="mb-3">
                                <label for="footer_top_btn_bgc" class="form-label">Couleur de fond du bouton newsletter</label>
                                <input type="color" class="form-control" id="footer_top_btn_bgc" name="footer_top_btn_bgc"
                                       aria-describedby="footer_top_btn_bgcHelp" value="{{$pivot->footer_top_btn_bgc ?? "#df1e26"}}">
                            </div>
                            <div class="mb-3">
                                <label for="footer_top_btn_color" class="form-label">Couleur de texte du bouton newsletter</label>
                                <input type="color" class="form-control" id="footer_top_btn_color" name="footer_top_btn_color"
                                       aria-describedby="footer_top_btn_colorHelp" value="{{$pivot->footer_top_btn_color ?? "#FFFFFF"}}">
                            </div>
                            <div class="mb-3">
                                <label for="footer_top_btn_radius" class="form-label">Border radius du bouton newsletter</label>
                                <input type="text" class="form-control" id="footer_top_btn_radius" name="footer_top_btn_radius"
                                       aria-describedby="footer_top_btn_radiusHelp" value="{{$pivot->footer_top_btn_radius ?? "40px"}}">
                            </div>
                            <div class="mb-3">
                                <label for="footer_top_input_radius" class="form-label">Border radius du input newsletter</label>
                                <input type="text" class="form-control" id="footer_top_input_radius" name="footer_top_input_radius"
                                       aria-describedby="footer_top_input_radiusHelp" value="{{$pivot->footer_top_input_radius ?? "35px"}}">
                            </div>
                            <hr>
                            <div class="mb-3">
                                <label for="cover" class="form-label">Image de la couverture de catalogue</label>
                                <input type="file" class="form-control" id="cover" name="cover" accept="image/*">
                            </div>
                            <div class="mb-3">
                                <label for="footer_bottom_bgc" class="form-label">Couleur de fond du bas du footer</label>
                                <input type="color" class="form-control" id="footer_bottom_bgc" name="footer_bottom_bgc"
                                       aria-describedby="footer_bottom_bgcHelp" value="{{$pivot->footer_bottom_bgc ?? "#5cb1b5"}}">
                            </div>
                            <div class="mb-3">
                                <label for="footer_bottom_bgi" class="form-label">Image de fond du bas du footer</label>
                                <input type="file" class="form-control" id="footer_bottom_bgi" name="footer_bottom_bgi"
                                       aria-describedby="footer_bottom_bgiHelp" accept="image/*">
                            </div>
                            <div class="mb-3">
                                <label for="footer_bottom_color" class="form-label">Couleur de texte du bas du footer</label>
                                <input type="color" class="form-control" id="footer_bottom_color" name="footer_bottom_color"
                                       aria-describedby="footer_bottom_colorHelp" value="{{$pivot->footer_bottom_color ?? "#FFFFFF"}}">
                            </div>
                            <div class="mb-3">
                                <label for="primary_color" class="form-label">Couleur primaire</label>
                                <input type="color" class="form-control" id="primary_color" name="primary_color"
                                       aria-describedby="primary_colorHelp" value="{{$pivot->primary_color ?? "#5CB1B5"}}">
                            </div>
                            <div class="mb-3">
                                <label for="secondary_color" class="form-label">Couleur secondaire</label>
                                <input type="color" class="form-control" id="secondary_color" name="secondary_color"
                                       aria-describedby="secondary_colorHelp" value="{{$pivot->secondary_color ?? "#FFDB28"}}">
                            </div>
                            <hr>
                            <div class="mb-3">
                                <label for="catalogue" class="form-label">Catalogue pdf</label>
                                <input type="file" class="form-control" id="catalogue" name="catalogue" accept=".pdf">
                            </div>
                            <hr>
                            <div class="form-floating mb-3">
                                <label for="css">CSS custom</label>
                                <textarea class="form-control" name="css" id="css" style="height: 100px">{{$pivot->css ?? ""}}</textarea>
                            </div>
                            <div class="form-floating mb-3">
                                <label for="css">JS custom</label>
                                <textarea class="form-control" name="js" id="js" style="height: 100px">{{$pivot->js ?? ""}}</textarea>
                            </div>

                            <button class="btn btn-primary" type="submit">Save</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
