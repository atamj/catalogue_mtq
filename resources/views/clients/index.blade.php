@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h1 class="card-header">Clients</h1>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h2>Liste des clients</h2>
                            @if (\Illuminate\Support\Facades\Auth::user()->admin)
                                <a href="{{url('admin/client/create')}}" class="btn btn-primary mb-2">Ajouter un client</a>
                            @endif
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Logo</th>
                                <th>Nom</th>
                            </tr>
                            </thead>
                            @foreach($clients as $key => $client)
                                <tr>
                                    <td>
                                        <b>{{$client->id}}</b>
                                    </td>
                                    <td>
                                        <img width="50px" height="auto" src="{{asset('storage/clients/'.$client->id.'/logo_header/'.$client->logo_header)}}" alt="Logo">
                                    </td>
                                    <td>
                                        <a href="{{url('admin/client', $client->id)}}">{{$client->name}}</a>
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
