<hr>
<h4>Comentarios</h4>

@if(session('message'))
    <div class="alert alert-success" >
        {{ session('message') }}
    </div>
@endif

@if(Auth::check())
    <form action="{{route('comment')}}" method="POST" class="card">
        @csrf
        <div class="form-group">
            <input type="hidden" name="video_id" value="{{ $video->id}}" required class="form-control">
            <textarea name="body" id="" class="form-control"></textarea>
            <input type="submit" value="Comentar" class="btn btn-success form-control"/>
        </div>
    </form>
@endif

@if(isset($video->comments))
<div id="comments-list" class="card">

    @foreach($video->comments as $comment)     
        <div class="card">
            <strong> {{ $comment->user->name . ' ' . $comment->user->surname}}</strong>{{ \FormatTime::LongTimeFilter($comment->created_at)}}
        </div>

        <div class="card">
            {{ $comment->body }}
        

        @if(Auth::check() && (Auth::user()->id == $comment->user_id || Auth::user()->id == $video->user_id))
        <!-- Botón en HTML (lanza el modal en Bootstrap) -->
        <a href="#victorModal{{$comment->id}}" role="button" class="btn btn-danger btn-sm" data-toggle="modal">Eliminar</a>
        
        <!-- Modal / Ventana / Overlay en HTML -->
        <div id="victorModal{{$comment->id}}" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">¿Estás seguro?</h4>
                    </div>
                    <div class="modal-body">
                        <p>¿Seguro que quieres borrar este comentario?</p>
                        <p><small>{{$comment->body}}</small></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <a href="{{url('/delete-comment/' . $comment->id)}}" type="button" class="btn btn-danger">Eliminar</a>
                    </div>
                </div>
            </div>
        </div>

        </div>    

        @endif
    @endforeach    




</div>

@endif