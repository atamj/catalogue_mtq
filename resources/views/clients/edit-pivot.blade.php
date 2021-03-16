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
                                <label for="title" class="form-label">Title d'affichage de l'opération</label>
                                <input type="text" class="form-control" id="title" name="title"
                                       aria-describedby="titleHelp" required value="{{$pivot->title ?? ""}}">
                                {{--                                <div id="titleHelp" class="form-text">Sera afficher dans le footer</div>--}}
                            </div>
                            <div class="form-floating mb-3">
                                <label for="css">CSS custom</label>
                                <textarea class="form-control" name="css" id="css" style="height: 100px">
                                        {{$pivot->css ?? ""}}
                                    </textarea>
                            </div>
                            <div class="form-floating mb-3">
                                <label for="css">JS custom</label>
                                <textarea class="form-control" name="js" id="js" style="height: 100px">
                                        {{$pivot->js ?? ""}}
                                    </textarea>
                            </div>

                            <button class="btn btn-primary" type="submit">Save</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
