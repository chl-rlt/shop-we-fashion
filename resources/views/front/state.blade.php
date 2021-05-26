
@extends('layouts.master')

@section('content')
<h1>Les produits</h1>
@forelse($products as $product)

  <div class="col-xs-6 col-sm-4">
    <div class="thumbnail">
    <img width="171" src="" alt="">
      <div class="caption">
        <h3><a href="{{url('product', $product->id)}}">{{$product->name}}</a></h3>
        <p><a href="{{url('product', $product->id)}}">{{$product->price}} €</a></p>
      </div>
    </div>
    </a>
  </div>


@empty
<p>Désolé pour l'instant aucun produit n'est publié sur le site</p>
@endforelse

{{$products->links()}}
@endsection 