@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>Opération : {{$operation->title}}</div>
                        <div>
                            <a href="{{url('admin/category?operation_id='.$operation->id)}}" class="btn btn-success">Gérer les catégories</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h1 class="text-center mb-4">Données de l'opération</h1>
                            <form method="POST" action="{{url('/admin/operation', $operation->id)}}" enctype="multipart/form-data" class="mb-3">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="shortname" class="form-label">Operation shortname (url)</label>
                                    <input type="text" disabled class="form-control" id="shortname" name="shortname" value="{{$operation->shortname}}">
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Nom de l'opération <i>(ne sera pas afficher)</i></label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{$operation->title}}">
                                </div>
                                <div class="mb-3">
                                    <label for="start" class="form-label">Date de début</label>
                                    <input type="date" class="form-control" id="start" name="start" value="{{date('Y-m-d', strtotime($operation->start) ?? "")}}">
                                </div>
                                <div class="mb-3">
                                    <label for="end" class="form-label">Date de fin</label>
                                    <input type="date" class="form-control" id="end" name="end" value="{{date('Y-m-d', strtotime($operation->end) ?? "")}}">
                                </div>
                                <div class="mb-3">
                                    <label for="bombe_bg" class="form-label">Background produit bombe 1</label>
                                    <input type="file" class="form-control" id="bombe_bg" name="bombe_bg">
                                </div>
                                <div class="mb-3">
                                    <label for="template" class="form-label">Template à utiliser</label>
                                    <select class="form-control" name="template">
                                        <option name="default">Default</option>
                                        <option name="v2" {{($operation->template == "v2") ? "selected" : ""}}>v2</option>
                                    </select>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Save">
                            </form>
                        <h2 class="text-danger">Remplacer les produits par import csv</h2>
                        <form method="POST" action="{{url('/admin/product')}}" enctype="multipart/form-data">
                            @csrf()
                            <div class="mb-3">
                                <label for="csv" class="form-label">CSV products</label>
                                <input type="file" class="form-control" id="csv" name="csv" aria-describedby="csvHelp" accept="text/csv">
                                <div id="csvHelp" class="form-text">Uploader un csv de produit pour <span
                                        class="text-danger">écraser</span> la liste actuelle
                                </div>
                            </div>
                            <input type="hidden" name="operation" value="{{$operation->shortname}}">
                            <button class="btn btn-danger" type="submit">Écraser</button>
                        </form>
                        <h2 class="text-danger">Uploader un zip d'images</h2>
                        <form method="POST" action="{{url('/admin/product')}}" enctype="multipart/form-data">
                            @csrf()
                            <div class="mb-3">
                                <label for="zip" class="form-label">Images zip</label>
                                <input type="file" class="form-control" id="zip" name="zip" aria-describedby="zipHelp" accept="application/*">
                                <div id="zipHelp" class="form-text">Uploader un zip d'image de produit (<span class="text-danger">Pour le premier upload</span>)</div>
                            </div>
                            <input type="hidden" name="operation" value="{{$operation->shortname}}">
                            <button class="btn btn-primary" type="submit">Uploader</button>
                        </form>
                        <h2 class="mt-4">Liste des produits</h2>
                    <!--                            <ul>
                                <li><a href="{{url('admin/product', $operation->shortname)}}">Voir la liste des produits</a></li>
                            </ul>-->
                        <table class="mt-2 mb-4">
                            @foreach($products as $product)
                                <tr>
                                    <td>
                                        {{$product->id}} -
                                    </td>
                                    <td>
                                        <a href="{{url('admin/product/'.$product->id).'/edit'}}">{{$product->designation}}</a>
                                    </td>
                                    <td>
                                        <img width="50px" height="50px"
                                             src="{{asset('storage/'.$operation->shortname.'/images/products/'.$product->photo_principale)}}"
                                             alt="">
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
