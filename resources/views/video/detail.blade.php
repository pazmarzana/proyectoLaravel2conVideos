@extends('layouts.app')
@section('content')
<div class="col-md-12">
    <h2>{{ $video->title }}</h2>
    <hr>
    <div class="col-md-6">

        <!-- video -->
    <video controls id="video-player" class="col-md-6">
        <source src="{{ route('fileVideo', ['filename' => $video->video_path])}}"></source>
        Tu navegador no es compatible con HTML5
    </video>

        <!-- descripcion -->
        <div class="card">
        
            <div class="card">
                Subido por <strong> <a href="{{ route('channel',['user_id'=>$video->user->id] ) }}">{{ $video->user->name . ' ' . $video->user->surname}}</a></strong>{{ \FormatTime::LongTimeFilter($video->created_at)}}
            </div>
            <div class="card">
                {{ $video->description }}
            </div>    

        </div>

        <!-- comentarios -->
        @include('video.comments')

    </div>
</div>


@endsection