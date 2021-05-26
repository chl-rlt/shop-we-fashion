
@extends('layouts.master')

@section('content')
@forelse($products as $product)

  <div class="col-xs-6 col-sm-4">
    <div class="thumbnail">
    @if(count((array)$product->picture) > 0)
    <img width="171" src="{{asset('images/'.$product->picture)}}" alt="">
    @endif
      <div class="caption">
        <h3><a href="{{url('product', $product->id)}}">{{$product->name}}</a></h3>
        <p><a href="{{url('product', $product->id)}}">{{$product->price}} €</a></p>
      </div>
    </div>
  </div>
@empty
<p>Désolé pour l'instant aucun produit n'est publié sur le site</p>
@endforelse

{{$products->links()}} 
@endsection 