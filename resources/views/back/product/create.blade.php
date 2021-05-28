@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Ajouter un nouveau produit : </h2>
                <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form">
                        <div class="form-group">
                            <label for="name">Nom :</label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name"
                                   placeholder="Nom du produit">
                            @if($errors->has('name')) <span class="error bg-warning text-warning">{{$errors->first('name')}}</span>@endif
                        </div>

                        <div class="form-group">
                            <label for="price">Description :</label>
                            <textarea type="text" name="description"class="form-control">{{old('description')}}</textarea>
                            @if($errors->has('description')) <span class="error bg-warning text-warning">{{$errors->first('description')}}</span> @endif
                        </div>
                    </div>
                    <div class="form-select">
                    <label for="category">Categorie :</label>
                    <select id="category" name="category_id">
                        @foreach($categories as $id => $name)
                            <option {{ old('category_id')==$id? 'selected' : '' }} value="{{$id}}">{{$name}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                            <label for="price">Prix :</label>
                            <input type="decimal" name="price" value="{{old('price')}}" class="form-control" id="price"
                                   placeholder="Prix du produit">
                            @if($errors->has('price')) <span class="error bg-warning text-warning">{{$errors->first('price')}}</span>@endif
                    </div>
                    <div class="form-group">
                            <label for="reference">Référence produit :</label>
                            <input type="text" name="reference" value="{{old('reference')}}" class="form-control" id="reference"
                                   placeholder="Référence du produit">
                            @if($errors->has('reference')) <span class="error bg-warning text-warning">{{$errors->first('reference')}}</span>@endif
                    </div>

            </div><!-- #end col md 6 -->
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Ajouter</button>
                <h1>Choisissez une/des tailles</h1>
                    <div class="form-inline">
                        <div class="form-group">
                            <input type="checkbox" @if(old('size')=='XS') checked @endif name="size" value="XS" checked> XS<br>
                            <input type="checkbox" @if(old('size')=='S') checked @endif name="size" value="S" checked> S<br>
                            <input type="checkbox" @if(old('size')=='M') checked @endif name="size" value="M" checked> M<br>
                            <input type="checkbox" @if(old('size')=='L') checked @endif name="size" value="L" checked> L<br>
                            <input type="checkbox" @if(old('size')=='XL') checked @endif name="size" value="XL" checked> XL<br>   
                        </div>
                    </div>

                    
                <div class="input-radio">
            <h2>État</h2>
            <input type="radio" @if(old('state')=='sale') checked @endif name="state" value="sale" checked> En solde<br>
            <input type="radio" @if(old('state')=='standard') checked @endif name="state" value="standard" > Standard<br>
            </div>
            <div class="input-radio">
            <h2>Status</h2>
            <input type="radio" @if(old('status')=='published') checked @endif name="status" value="published" checked> publier<br>
            <input type="radio" @if(old('status')=='unpublished') checked @endif name="status" value="unpublished" > dépulier<br>
            </div>
            <div class="input-file">
                <h2>Image du produit :</h2>
                <label for="picture"></label>
                <input class="picture" type="file" name="picture" >
                @if($errors->has('picture')) <span class="error bg-warning text-warning">{{$errors->first('picture')}}</span> @endif
            </div>
           
            </form>
            </div><!-- #end col md 6 -->
        </div>
</div>
@endsection