<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';

    //relacion one to many

    public function comments(){
        return $this->hasMany('App\Comment')->orderBy('id','desc');
    }
    
    //relacion many to one

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

}
