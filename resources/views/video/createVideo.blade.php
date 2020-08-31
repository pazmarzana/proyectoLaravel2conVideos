@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-7">
            <h2 >Crear un nuevo video</h2>
        </div>
        
        <hr>
        <form action="{{ route('saveVideo')}}" method="POST" enctype="multipart/form-data" class="col-lg-7">
        @csrf

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach($errors->all() as $error)
                    <li> {{$error}}</li>
                @endforeach
                </ul>
            </div>
        @endif
        <div class="for-group mt-3">
            <label for="title">Titulo</label>
            <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}"/>
        </div>

        <div class="for-group mt-3">
            <label for="description">Descripcion</label>
            <textarea class="form-control" id="description" name="description">{{old('description')}}</textarea>
        </div>

        <div class="for-group mt-3">
            <label for="image">Miniatura</label>
            <input type="file" class="form-control" id="image" name="image"/>
        </div>

        <div class="for-group mt-3">
            <label for="video">Archivo de video</label>
            <input type="file" class="form-control" id="video" name="video"/>
        </div>

        <button type="submit" class="btn btn-success mt-3">Crear video</button>

        </form>
    </div>
</div>
@endsection