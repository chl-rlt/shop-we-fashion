@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 create-category">
            <h2>Ajouter une nouvelle categorie : </h2>
            <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form">
                    <div class="form-group">
                        <label for="name">Nom :</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name" placeholder="Nom de la categorie">
                        @if($errors->has('name')) <span class="error bg-warning text-warning">{{$errors->first('name')}}</span>@endif
                    </div>
                    <button type="submit" class="btn btn-primary button-ok">Ajouter</button>
                </div>

            </form>
        </div>
    </div><!-- #end col md 6 -->
</div>
@endsection
@section('scripts')
@parent
<script src="{{asset('js/confirm.js')}}"></script>
@endsection