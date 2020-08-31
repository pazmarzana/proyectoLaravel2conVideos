@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

        <div class="container">
        <div class="col-4">
            <h2>Busqueda: {{$search}}</h2>
        </div>

        <div class="col-4">
            <form action="{{ url('/buscar/' . $search) }}" method="GET">
                <label for="filter">Ordenar</label>
                <select name="filter" id="filter" class="form-control">
                    <option value="new">Mas nuevos primeros</option>
                    <option value="old">Mas antiguos primeros</option>
                    <option value="alfa">De la A a la Z</option>
                </select>
                <input type="submit" value="Ordenar" class="btn btn-sm btn-primary"/>
            </form>
        </div>



        @include('video.videosList')

        </div>
    </div>
</div> 
@endsection