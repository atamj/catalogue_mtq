@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h1 class="card-header">Liste de contacts</h1>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="bg-dark text-white">Clients</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clients as $key => $client)
                                <tr>
                                    <td class="bg-light">
                                        <b class="text-secondary text-uppercase">{{$client->name}}</b>
                                        <table class="table">
                                            <tbody>
                                            @foreach($client->operations()->get() as $operation)
                                                <tr>
                                                    <td>
                                                        <a href="{{url('admin/contact/'.$client->id.'/?operation='.$operation->id)}}">{{$operation->title}}</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </td>
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
