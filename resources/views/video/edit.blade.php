@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-7">
            <h2 >Editar el video {{$video->title}}</h2>
        </div>
        
        <hr>
        <form action="{{ route('updateVideo',['video_id' => $video->id] ) }}" method="POST" enctype="multipart/form-data" class="col-lg-7">
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
            <input type="text" class="form-control" id="title" name="title" value="{{$video->title}}"/>
        </div>

        <div class="for-group mt-3">
            <label for="description">Descripcion</label>
            <textarea class="form-control" id="description" name="description">{{$video->description}}</textarea>
        </div>

        <div class="for-group mt-3">
            <div>
                <label for="image">Miniatura</label>
            </div>
            @if(Storage::disk('images')->has($video->image))
                <img class="card-img-top" src="{{ url('/miniatura/' . $video->image) }}" style="width: 7rem;"/>
            @endif

            <input type="file" class="form-control" id="image" name="image"/>
        </div>

        <div class="for-group mt-3">
        <label for="video">Archivo de video</label>
            <div>
                <video controls id="video-player" class="col-md-6">
                    <source src="{{ route('fileVideo', ['filename' => $video->video_path])}}"></source>
                    Tu navegador no es compatible con HTML5
                </video>
            </div>

            <input type="file" class="form-control" id="video" name="video"/>
        </div>

        <button type="submit" class="btn btn-success mt-3">Modificar video</button>

        </form>
    </div>
</div>
@endsection