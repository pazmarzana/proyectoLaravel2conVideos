<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function store(Request $request){
        $validate = $this->validate($request,[
            'body'=>'required'
        ]);//cierra el validate
        $comment = new Comment();
        $user = \Auth::user();
        $comment->user_id = $user->id;    
        $comment->video_id = $request->input('video_id');    
        $comment->body = $request->input('body');     
        $comment->save();    

        return redirect()->route('detailVideo',['video_id' => $comment->video_id])->with(array(
            'message'=>'El commentario se ha grabado correctamente'
        )); //fin del array del with y del return 

    }//fin funcion store

    public function delete($comment_id){
        $user=\Auth::user();
        $comment = Comment::find($comment_id);

        if($user && ($comment->user_id == $user->id || $comment->video->user_id==$user->id)){
            $comment->delete();
        }
        return redirect()->route('detailVideo',['video_id' => $comment->video_id])->with(array(
            'message'=>'El comentario se ha borrado correctamente'
        )); //fin del array del with y del return 
    }
}
