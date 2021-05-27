@extends('layouts.master')

@section('content')
<p><a href="{{route('product.create')}}"><button type="button" class="btn btn-primary btn-lg">Nouveau</button></a></p>
 <!--Creates the popup body-->
 @include('back.product.partials.flash')

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
            <form class="delete" method="POST" action="{{route('product.destroy', $product->id)}}">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <input type="button" value="delete" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                 <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                    <div class="modal-body">
                        Êtes-vous sur de vouloir supprimer le produit ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        <button type="submit" value="delete" class="btn btn-primary">Ok</button>
                    </div>
                    </div>
                </div>
                </div>
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

@section('scripts')
    @parent
    <script src="{{asset('js/confirm.js')}}"></script>
@endsection

