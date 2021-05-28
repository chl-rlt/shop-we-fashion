@extends('layouts.master')

@section('content')
<div class="container form-edit">
    <div class="row form-edit">
        <div class="col-md-6">
            <h2>Ajouter un nouveau produit : </h2>
            <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form">
                    <div class="form-group">
                        <label class="title" for="name">Nom :</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name" placeholder="Nom du produit">
                        @if($errors->has('name')) <span class="error bg-warning text-warning">{{$errors->first('name')}}</span>@endif
                    </div>

                    <div class="form-group">
                        <label class="title" for="price">Description :</label>
                        <textarea type="text" name="description" class="form-control">{{old('description')}}</textarea>
                        @if($errors->has('description')) <span class="error bg-warning text-warning">{{$errors->first('description')}}</span> @endif
                    </div>
                </div>
                <div class="form-select">
                    <label class="title" for="category">Categorie :</label>
                    <select id="category" name="category_id">
                        @foreach($categories as $id => $name)
                        <option {{ old('category_id')==$id? 'selected' : '' }} value="{{$id}}">{{$name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="title" for="price">Prix :</label>
                    <input type="decimal" name="price" value="{{old('price')}}" class="form-control" id="price" placeholder="Prix du produit">
                    @if($errors->has('price')) <span class="error bg-warning text-warning">{{$errors->first('price')}}</span>@endif
                </div>
                <div class="form-group">
                    <label class="title" for="reference">Référence produit :</label>
                    <input type="text" name="reference" value="{{old('reference')}}" class="form-control" id="reference" placeholder="Référence du produit">
                    @if($errors->has('reference')) <span class="error bg-warning text-warning">{{$errors->first('reference')}}</span>@endif
                </div>

        </div><!-- #end col md 6 -->
        <div class="col-md-6 form-part-2">
            <h5>Choisissez une/des tailles</h5>
            <div class="form-inline">
                <div class="form-group">
                    @forelse($sizes as $id => $name)
                    <label class="control-label" for="size{{$id}}">{{$name}}</label>
                    <input name="sizes[]" value="{{$id}}" {{ ( !empty(old('sizes')) and in_array($id, old('sizes')) )? 'checked' : ''  }} type="checkbox" class="form-control checkbox-form-edit" id="size{{$id}}">
                    @empty
                    @endforelse
                </div>
            </div>
            <div class="input-radio new-product">
                <h5>État</h5>
                <input type="radio" @if(old('state')=='sale' ) checked @endif name="state" value="sale" checked> En solde<br>
                <input type="radio" @if(old('state')=='standard' ) checked @endif name="state" value="standard"> Standard<br>
            </div>
            <div class="input-radio new-product">
                <h5>Status</h5>
                <input type="radio" @if(old('status')=='published' ) checked @endif name="status" value="published" checked> publier<br>
                <input type="radio" @if(old('status')=='unpublished' ) checked @endif name="status" value="unpublished"> dépulier<br>
            </div>
            <div class="input-file" style="margin-bottom: 37px;">
                <label class="title" for="picture">Image du produit :</label>
                <input class="picture" type="file" name="picture">
                @if($errors->has('picture')) <span class="error bg-warning text-warning">{{$errors->first('picture')}}</span> @endif
            </div>


        </div><!-- #end col md 6 -->
        <button type="submit" class="btn btn-primary form-edit">Ajouter</button>
        </form>

    </div>

</div>
@endsection
@section('scripts')
@parent
<script src="{{asset('js/confirm.js')}}"></script>
@endsection