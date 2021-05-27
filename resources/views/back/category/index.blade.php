@extends('layouts.master')

@section('content')
<p><a href="{{route('category.create')}}"><button type="button" class="btn btn-primary btn-lg">Nouvelle catégorie</button></a></p>
@include('back.product.partials.flash')
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Editer</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
    @forelse($categories as $category)
        <tr>
            <td>{{$category->name}}</td>
            <td>
            <a href="{{route('category.edit', $category->id)}}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
            </td>
            <td> 
            <form class="delete" method="POST" action="{{route('category.destroy', $category->id)}}">
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
@endsection 

@section('scripts')
    @parent
    <script src="{{asset('js/confirm.js')}}"></script>
@endsection

