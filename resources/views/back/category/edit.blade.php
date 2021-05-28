@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 create-category">
                <h2>Modifier la categorie </h2>
                <form action="{{route('category.update', $category->id)}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{method_field('PUT')}}
                    <div class="form">
                        <div class="form-group">
                            <label for="name">Nom :</label>
                            <input type="text" name="name" value="{{$category->name}}" class="form-control" id="name"
                                   placeholder="Nom de la categorie">
                            @if($errors->has('name')) <span class="error bg-warning text-warning">{{$errors->first('name')}}</span>@endif
                        </div>
                        <button type="submit" class="btn btn-primary button-ok">Ajouter</button>
                    </div>
                </form>
            </div>
        </div><!-- #end col md 6 -->
            
    </div>
@endsection