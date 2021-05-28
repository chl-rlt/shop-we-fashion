@extends('layouts.master')

@section('content')
<div class="container form-edit">
    <div class="row form-edit">
        <div class="col-md-6">
            <h1>Modifier le produit </h1>
            <form action="{{route('product.update', $product->id)}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{method_field('PUT')}}
                <div class="form">
                    <div class="form-group">
                        <label class="title" for="name">Nom :</label>
                        <input type="text" name="name" value="{{$product->name}}" class="form-control" id="name" placeholder="Nom du produit">
                        @if($errors->has('name')) <span class="error bg-warning text-warning">{{$errors->first('name')}}</span>@endif
                    </div>

                    <div class="form-group">
                        <label class="title" for="description">Description :</label>
                        <textarea type="text" name="description" class="form-control">{{$product->description}}</textarea>
                        @if($errors->has('description')) <span class="error bg-warning text-warning">{{$errors->first('description')}}</span> @endif
                    </div>
                </div>
                <div class="form-select">
                    <label class="title" for="category">Catégorie :</label>
                    <select id="category" name="category_id">
                        @foreach($categories as $id => $name)
                        <option {{ (!is_null($product->category) and $product->category->id == $id)? 'selected' : '' }} value="{{$id}}">{{$name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="title" for="price">Prix :</label>
                    <input type="decimal" name="price" value="{{$product->price}}" class="form-control" id="price" placeholder="Prix du produit">
                    @if($errors->has('price')) <span class="error bg-warning text-warning">{{$errors->first('price')}}</span>@endif
                </div>
                <div class="form-group">
                    <label class="title" for="reference">Référence produit :</label>
                    <input type="text" name="reference" value="{{$product->reference}}" class="form-control" id="reference" placeholder="Référence du produit">
                    @if($errors->has('reference')) <span class="error bg-warning text-warning">{{$errors->first('reference')}}</span>@endif
                </div>

        </div><!-- #end col md 6 -->
        <div class="col-md-6 form-part-2">
            <h5>Choisissez une/des tailles :</h5>
            <div class="form-inline">
                <div class="form-group">
                    @forelse($sizes as $id => $name)
                    <label class="control-label" for="size{{$id}}">{{$name}}</label>
                    <input name="sizes[]" value="{{$id}}" @if( is_null($product->sizes) == false and in_array($id, $product->sizes()->pluck('id')->all()))
                    checked
                    @endif
                    type="checkbox" class="form-control checkbox-form-edit"
                    id="size{{$id}}">
                    @empty
                    @endforelse
                </div>
            </div>
            <div class="input-radio">
                <h5>État :</h5>
                <input type="radio" @if($product->state =='sale') checked @endif name="state" value="sale" checked> En solde<br>
                <input type="radio" @if($product->state =='standard') checked @endif name="state" value="standard" > Standard<br>
            </div>
            <div class="input-radio">
                <h5>Status :</h5>
                <input type="radio" @if($product->status =='published') checked @endif name="status" value="published" checked> publier<br>
                <input type="radio" @if($product->status =='unpublished') checked @endif name="status" value="unpublished" > dépulier<br>
            </div>
            <div class="input-file">
                <label class="title" for="picture">Image du produit : </label>
                <input class="picture" type="file" name="picture" value="{{$product->picture}}">
                @if($errors->has('picture')) <span class="error bg-warning text-warning">{{$errors->first('picture')}}</span> @endif
            </div>
            @if($product->picture)
            <div class="form-group img-old">
                <label class="title" for="picture">Image associée :</label>
                <input type="text" name="picture" value="{{$product->picture}}">
            </div>
            <div class="form-group">
                <img width="300" src="{{url('picture', $product->picture)}}" alt="">
            </div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary form-edit">Ajouter</button>
    </div><!-- #end col md 6 -->
    </form>
</div>
@endsection