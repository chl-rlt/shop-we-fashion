@extends('layouts.master')

@section('content')
<article class="row">
    <div class="col-md-12">
        @if(count((array)$product)>0)
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-8 col-image">
                @if(count((array)$product->picture) > 0)
                <img src="{{asset('images/'.$product->picture)}}" class="img-responsive" alt="Responsive image">
                @endif
                <h3>Description :</h3>
                <p>{{$product->description}}
                <p>
                <h3>Référence :</h3>
                <p>{{$product->reference}}</p>
            </div>
            <div class="col-xs-6 col-md-4 col-infos">
                <h3>{{$product->name}}</h3>
                <p class="price">{{$product->price}} €</p>

                <div class="form-select">
                    <select class="form-control select-size" id="size" name="size">
                        <option value="0">Taille</option>
                        @forelse($product->sizes as $size)
                        <option name="sizes[]" value="{{$size->name}}">{{$size->name}}</option>
                        @empty
                        <li>Aucun auteur</li>
                        @endforelse
                    </select>
                </div>
                <a class="btn btn-default buy-product" href="#" role="button">Acheter</a>
            </div>
        </div>
        @else
        <h1>Désolé aucun produit</h1>
        @endif
    </div>
</article>
@endsection