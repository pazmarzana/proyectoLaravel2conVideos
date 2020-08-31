<?php

use Illuminate\Support\Facades\Route;
use App\Video;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {

//     $videos = Video::all();
//     foreach($videos as $video){
//         echo $video->title.'<br>';
//         echo $video->user->email.'<br>';

//         foreach($video->comments as $comment){
//             echo $comment->body.'<br>';
//         }//findel foreach de comments
//         echo '<hr>';
//         //var_dump($video);
//     }//findel foreach de videos
    
//     die();


//     return view('welcome');
// });
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', array(
    'as'=>'home',
    'uses'=>'HomeController@index'
));

//Rutas de Video

Route::get('/crear-video', array(
    'as'=>'createVideo',
    'middleware'=>'auth',
    'uses'=>'VideoController@createVideo'
));//fin del array y del get

Route::post('/guardar-video', array(
    'as'=>'saveVideo',
    'middleware'=>'auth',
    'uses'=>'VideoController@saveVideo'
));//fin del array y del get

Route::get('/miniatura/{filename}', array(
    'as'=>'imageVideo',
    'uses'=>'VideoController@getImage'
));//fin del array y del get

Route::get('/video/{video_id}', array(
    'as'=>'detailVideo',
    'uses'=>'VideoController@getVideoDetail'
));//fin del array y del get

Route::get('/video-file/{filename}', array(
    'as'=>'fileVideo',
    'uses'=>'VideoController@getVideo'
));//fin del array y del get

Route::get('/delete-video/{video_id}', array(
    'as'=>'videoDelete',
    'middleware'=>'auth',
    'uses'=>'VideoController@delete'
));

Route::get('/editar-video/{video_id}', array(
    'as'=>'videoEdit',
    'middleware'=>'auth',
    'uses'=>'VideoController@edit'
));

Route::post('/update-video/{video_id}', array(
    'as'=>'updateVideo',
    'middleware'=>'auth',
    'uses'=>'VideoController@update'
));//fin del array y del get

Route::get('/buscar/{search?}/{filter?}', array(
    'as'=>'videoSearch',
    'uses'=>'VideoController@search'
));//fin del array y del get



//Rutas de Comentarios

Route::post('/comment', array(
    'as'=>'comment',
    'middleware'=>'auth',
    'uses'=>'CommentController@store'
));

Route::get('/delete-comment/{comment_id}', array(
    'as'=>'commentDelete',
    'middleware'=>'auth',
    'uses'=>'CommentController@delete'
));

//Cache
Route::get('/clear-cache', function(){
    $code = Artisan::call('cache:clear');
});

//Usuarios

Route::get('/canal/{user_id}', array(
    'as'=>'channel',
    'uses'=>'UserController@channel'
));