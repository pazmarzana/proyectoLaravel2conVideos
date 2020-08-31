<div id="videos-list">
                @if(count($videos) >= 1)            
                    @foreach($videos as $video)
                    

                        <div class="card my-2">
                            <div class="card-body pull-right">
                                <div class="row">
                                    <div class="col-md-3">
                                        @if(Storage::disk('images')->has($video->image))
                                            <img class="card-img-top" src="{{ url('/miniatura/' . $video->image) }}" style="width: 7rem;"/>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <h4 class="card-title"><a href="{{ route('detailVideo',['video_id' => $video->id]) }}">{{ $video->title }}</a></h4>
                                        <p class="card-text"><a href="{{ route('channel',['user_id'=>$video->user->id])}}">{{ $video->user->name . '' . $video->user->surname }}</a> | {{ \FormatTime::LongTimeFilter($video->created_at)}}</p>
                                    
                                        <a href="{{ route('detailVideo',['video_id' => $video->id]) }}" class="btn btn-success btn-sm">Ver</a> 
                                        @if(Auth::check() && Auth::user()->id == $video->user->id)
                                            <a href="{{ route('videoEdit',['video_id' => $video->id]) }}" class="btn btn-warning btn-sm">Editar</a>
                                        



                                                    <!-- Botón en HTML (lanza el modal en Bootstrap) -->
                                                    <a href="#victorModal{{$video->id}}" role="button" class="btn btn-danger btn-sm" data-toggle="modal">Eliminar</a>
                                                    
                                                    <!-- Modal / Ventana / Overlay en HTML -->
                                                    <div id="victorModal{{$video->id}}" class="modal fade">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                    <h4 class="modal-title">¿Estás seguro?</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>¿Seguro que quieres borrar este video?</p>
                                                                    <p><small>{{$video->title}}</small></p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                    <a href="{{url('/delete-video/' . $video->id)}}" type="button" class="btn btn-danger">Eliminar</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>






                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    @endforeach
                @else
                    <div class="alert alert-warning">
                        No hay videos actualmente
                    </div>
                @endif    
            </div>
            {{$videos->links()}}