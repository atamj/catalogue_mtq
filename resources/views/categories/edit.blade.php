@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            Modifier la catégory : {{$category->name}}
                        </div>
                        <div>
                            {{$category->operation()->first()->title}}
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{url('/admin/category', $category->id)}}"
                              enctype="multipart/form-data">
                            @csrf()
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome de la catégorie</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       aria-describedby="nameHelp" required value="{{$category->name ?? ""}}">
                                <div id="nameHelp" class="form-text">C'est de nom d'affichage de la catégorie</div>
                            </div>
                            <div class="mb-3">
                                <label for="url" class="form-label">Url de la catégorie</label>
                                <input type="text" id="url" name="url" class="form-control" aria-describedby="urlHelp"
                                       required value="{{$category->url ?? ""}}">
                                <div id="urlHelp" class="text-danger">Ne pas mettre de / dans l'url</div>
                            </div>
                            <div class="mb-3">
                                <label for="img" class="form-label">Image de la catégorie</label>
                                <input type="file" id="img" name="img" class="form-control"
                                       aria-describedby="imgHelp" accept="image/*">
                                <div id="imgHelp">Sera utiliser en page d'accueil pour le menu</div>
                            </div>
                            <button class="btn btn-primary" type="submit">Save</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
