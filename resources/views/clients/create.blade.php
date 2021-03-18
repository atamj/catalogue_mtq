@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Nouveau client</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{url('admin/client')}}" enctype="multipart/form-data">
                            @csrf()
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome du client</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       aria-describedby="nameHelp" required>
                                <div id="nameHelp" class="form-text">Sera afficher dans le footer</div>
                            </div>
                            <div class="mb-3">
                                <label for="url" class="form-label">Url catalogue</label>
                                <input type="text" id="url" name="url" class="form-control" aria-describedby="urlHelp"
                                       required>
                                <div id="urlHelp"></div>
                            </div>
                            <div class="mb-3">
                                <label for="site" class="form-label">Url du site client</label>
                                <input type="text" id="site" name="site" class="form-control" aria-describedby="siteHelp" required>
                                <div id="siteHelp"></div>
                            </div>
                            <div class="mb-3">
                                <label for="gtag" class="form-label">Google tag <b>(Optionnel)</b></label>
                                <input type="text" id="gtag" name="gtag" class="form-control"
                                       aria-describedby="gtagHelp">
                                <div id="gtagHelp"></div>
                            </div>
                            <div class="mb-3">
                                <label for="logo_header" class="form-label">Logo header</label>
                                <input type="file" id="logo_header" name="logo_header" class="form-control"
                                       aria-describedby="logo_headerHelp" required>
                                <div id="logo_headerHelp"></div>
                            </div>
                            <div class="mb-3">
                                <label for="logo_footer" class="form-label">Logo footer <b>(Optionnel)</b></label>
                                <input type="file" id="logo_footer" name="logo_footer" class="form-control"
                                       aria-describedby="logo_footerHelp">
                                <div id="logo_footerHelp">Si non renseigné le logo du header sera pris</div>
                            </div>
                            <div class="mb-3">
                                <label for="favicon" class="form-label">Favicon <b>(Optionnel)</b></label>
                                <input type="file" id="favicon" name="favicon" class="form-control" accept=".png"
                                       aria-describedby="faviconHelp">
{{--                                <div id="logo_footerHelp">Si non renseigné le logo du header sera pris</div>--}}
                            </div>
                            <div class="mb-3">
                                <label for="logo_short" class="form-label">Logo header mobile <b>(Optionnel)</b></label>
                                <input type="file" id="logo_short" name="logo_short" class="form-control"
                                       aria-describedby="logo_shortHelp" accept=".svg">
{{--                                <div id="logo_shortHelp">Si non renseigné le logo du header sera pris</div>--}}
                            </div>
                            <div class="mb-3">
                                <label for="facebook_link" class="form-label">Lien page facebook
                                    <b>(Optionnel)</b></label>
                                <input type="text" id="facebook_link" name="facebook_link" class="form-control"
                                       aria-describedby="facebook_linkHelp">
                                <div id="facebook_linkHelp"></div>
                            </div>
                            <div class="mb-3">
                                <label for="contact_link" class="form-label">Lien page contact
                                    <b>(Optionnel)</b></label>
                                <input type="text" id="contact_link" name="contact_link" class="form-control"
                                       aria-describedby="contact_linkHelp">
                                <div id="contact_linkHelp"></div>
                            </div>
                            <div class="mb-3">
                                <label for="conditions_link" class="form-label">Lien page CGU <b>(Optionnel)</b></label>
                                <input type="text" id="conditions_link" name="conditions_link" class="form-control"
                                       aria-describedby="conditions_linkHelp">
                                <div id="conditions_linkHelp"></div>
                            </div>
                            <div class="mb-3">
                                <label for="cookies_link" class="form-label">Page politique des cookies
                                    <b>(Optionnel)</b></label>
                                <input type="text" id="cookies_link" name="cookies_link" class="form-control"
                                       aria-describedby="cookies_linkHelp">
                                <div id="cookies_linkHelp"></div>
                            </div>
                            <div class="mb-3">
                                <label for="confidentialite_link" class="form-label">Page politique de confidentialité
                                    <b>(Optionnel)</b></label>
                                <input type="text" id="confidentialite_link" name="confidentialite_link"
                                       class="form-control" aria-describedby="confidentialite_linkHelp">
                                <div id="confidentialite_linkHelp"></div>
                            </div>
                            <div class="mb-3">
                                <label for="mentions" class="form-label">Page mentions légales
                                    <b>(Optionnel)</b></label>
                                <input type="text" id="mentions" name="mentions"
                                       class="form-control" aria-describedby="mentionsHelp">
                                <div id="mentionsHelp">Lien de la page mentions légales</div>
                            </div>
                            <div class="mb-3">
                                <p>Opérations du client</p>
                                @foreach($operations as $operation)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{$operation->id}}" id="ope-{{$operation->id}}" name="operation_id[]">
                                    <label class="form-check-label" for="ope-{{$operation->id}}">
                                        {{$operation->title}}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                            <button class="btn btn-primary" type="submit">Créer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
