@extends('layouts.master')

@section('content')
<article class="row">
    <div class="col-md-12">
    @if(count((array)$product)>0)
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-8">
            @if(count((array)$product->picture) > 0)
                <img src="" class="img-responsive" alt="Responsive image">
            @endif
                <h2>Description :</h2>
                {{$product->description}}   
            </div>
            <div class="col-xs-6 col-md-4">
                <h3>{{$product->name}}</h3>
                <div class="form-select">
                    <select id="size" name="size">
                        <option value="0">Taille</option>
                        <option value="1">XS</option>
                        <option value="2">S</option>
                        <option value="3">M</option>
                        <option value="4">L</option>
                        <option value="5">XL</option>
                    </select>                   
                </div>
                <a class="btn btn-default" href="#" role="button">Buy</a>
            </div>
        </div>
    @else 
    <h1>Désolé aucun produit</h1>
    @endif 
    </div>
</article>
@endsection 