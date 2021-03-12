@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1 class="text-center mb-4">Opération</h1>
                        <h2>Liste des opérations</h2>
                        <table class="mt-2 mb-4">
                            @foreach($operations as $operation)
                                <tr>
                                    <td>
                                        {{$operation->id}} -
                                    </td>
                                    <td>
                                        <a href="{{url('admin/operation/'.$operation->id)}}">{{$operation->title}}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <hr>
                        <h2>Ajouter une opération</h2>
                        <form method="POST" action="{{url('/admin/operation')}}">
                            @csrf()
                            <div class="mb-3">
                                <label for="shortname" class="form-label">Shortname</label>
                                <input type="text" class="form-control" id="shortname" name="shortname" aria-describedby="shortnameHelp" required>
                                <div id="shortnameHelp" class="form-text">Correspond a l'url de l'opération ex: mon-operation</div>
                            </div>
                            <div class="mb-3">
                                <label for="start" class="form-label">Start date</label>
                                <input type="date" class="form-control" name="start" id="start" aria-describedby="startHelp" required>
                                <div id="startHelp" class="form-text">Correspond a la date de début de l'opération</div>
                            </div>
                            <div class="mb-3">
                                <label for="end" class="form-label">End date</label>
                                <input type="date" class="form-control" name="end" id="end" aria-describedby="endHelp" required>
                                <div id="endHelp" class="form-text">Correspond a la date de fin de l'opération</div>
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" aria-describedby="titleHelp" required>
                                <div id="titleHelp" class="form-text">Correspond au titre de l'opération</div>
                            </div>
                            <div class="mb-3">
                                <label for="client" class="form-label">Clients</label>
                                <input type="text" class="form-control" id="client" name="client" aria-describedby="clientHelp">
                                <div id="clientHelp" class="form-text">IDs des clients qui on accès a cette campagne séparer par une virgule et sans espace</div>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
