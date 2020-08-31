@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

        <div class="container">
        <div class="col-4">
            <h2>Canal de: {{$user->name.' '.$user->surname}}</h2>
        </div>



        @include('video.videosList')

        </div>
    </div>
</div> 
@endsection