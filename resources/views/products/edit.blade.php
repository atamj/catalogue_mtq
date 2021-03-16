@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Produit : {{$product->designation}}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h1 class="text-center mb-4">Importer ou remplacer image</h1>
                        <h2 class="text-danger">Remplacer l'image du produit</h2>
                        <form method="POST" action="{{url('/admin/product', $product->id)}}"
                              enctype="multipart/form-data">
                            @csrf()
                            @method('PUT')
                            <div class="mb-3">
                                <label for="photo_principale" class="form-label">photo_principale</label>
                                <input type="file" class="form-control" id="photo_principale" name="photo_principale" aria-describedby="photo_principaleHelp"
                                       accept="image/*">
                                <div id="photo_principaleHelp" class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="photo_2" class="form-label">photo_2</label>
                                <input type="file" class="form-control" id="photo_2" name="photo_2" aria-describedby="photo_2Help"
                                       accept="image/*">
                                <div id="photo_2Help" class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="photo_3" class="form-label">photo_3</label>
                                <input type="file" class="form-control" id="photo_3" name="photo_3" aria-describedby="photo_3Help"
                                       accept="image/*">
                                <div id="photo_3Help" class="form-text"></div>
                            </div>
                            <button class="btn btn-primary" type="submit">Uploader</button>
                        </form>
                        <h2 class="mt-4">Détails du produits</h2>
                        <table class="mt-2 mb-4">
                            @foreach($product->toArray() as $key => $value)
                                @if ($key !='data')
                                    <tr>
                                        <td>
                                            {{$key}} :
                                        </td>
                                        @if (($key == "photo_principale" ||  $key == "photo_2" || $key == "photo_3") && $key != "")
                                            <td>
                                                @if ($value != "")
                                                    <img width="50px" height="50px"
                                                         src="{{asset('storage/'.$product->operation()->first()->shortname.'/images/products/'.$value)}}"
                                                         alt="$value"> {{$value}}

                                                @else

                                                    Aucune

                                                @endif
                                            </td>
                                        @else
                                            <td>
                                                {{$value}}
                                            </td>
                                        @endif
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
