@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h1 class="card-header">Liste de contacts {{ $client->name }} pour
                        l'opération {{ $operation->title }}</h1>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (count($contacts) > 0)
                            <a href='{{$file}}'>Télécharger le CSV</a>
                        @endif
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="bg-dark text-white">Email</th>
                                <th class="bg-dark text-white">Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->Created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
