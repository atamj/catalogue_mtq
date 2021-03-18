@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h1 class="card-header">Catégories de l'opération : {{$operation->title}}</h1>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h2>Liste des catégories</h2>
                            {{--@if (\Illuminate\Support\Facades\Auth::user()->admin)
                                <a href="{{url('admin/client/create')}}" class="btn btn-primary mb-2">Ajouter un client</a>
                            @endif--}}
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Url</th>
                                <th>Img</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @foreach($categories as $category)
                                <tr>
                                    <td>
                                        <b>{{$category->name}}</b>
                                    </td>
                                    <td>
                                        {{$category->url}}
                                    </td>
                                    <td>
                                        @if($category->img)
                                        <img width="100px" height="auto" src="{{asset('storage/'.$operation->shortname.'/images/categories/'.$category->img)}}" alt="{{$category->name}}">
                                        @else
                                            Pas d'image
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{url('admin/category', $category->id)}}" class="btn btn-warning">Modifier</a>
                                    </td>

                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
