@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h1 class="card-header">{{$client->name}}</h1>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table">
                            @foreach($client->toArray() as $key => $value)
                                <tr>
                                    <th>{{$key}}</th>
                                    <td>{{$value}}</td>
                                </tr>
                            @endforeach
                        </table>
                        <a href="{{url()->current()}}/edit" class="btn btn-warning">Modifier</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h2>Operations</h2>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th>url</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            @foreach($client->operations()->get() as $operation)
                                <tr>
                                    <td>{{$operation->title}}</td>
                                    <td>{{$operation->shortname}}</td>
                                    <td>
                                        <a href="{{url('admin/client-operation/'.$client->id.'/'.$operation->id)}}" class="btn btn-primary">Modifier données client</a>
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
