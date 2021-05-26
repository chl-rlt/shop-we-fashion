@extends('layouts.master')

@section('content')
<p><a href="{{route('product.create')}}"><button type="button" class="btn btn-primary btn-lg">Nouveau</button></a></p>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Catégorie</th>
	        <th>Prix €</th>
            <th>État</th>
            <th>Editer</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
    @forelse($products as $product)
        <tr>
            <td>{{$product->name}}</td>
            <td>{{$product->category->name?? 'aucune categorie' }}</td>
            
	        <td>{{$product->price}}</td>
            <td>{{$product->state}}</td>
            <td>
            <a href="{{route('product.edit', $product->id)}}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
            </td>
            <td> 
            <form class="delete" method="POST" action="">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <input class="btn btn-danger" type="submit" value="delete" >
            </form>
            </td>
        </tr>
    @empty
        aucun titre ...
    @endforelse
    </tbody>
</table>
{{$products->links()}}
@endsection 

