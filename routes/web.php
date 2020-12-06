<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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
Auth::routes();

//home 
Route::redirect('/', '/index');
Route::redirect('/home', '/index');
Route::get('/index', 'HomeController@index')->name('home');
//user 
Route::post('/user/{id}', "Auth\UserController@update")->name('user.update');

Route::get('/user/edit/{id}', "Auth\UserController@edit")->name('user.edit');

Route::get('/role', function () {

    if (Gate::allows('edit-settings')) {

        return 'allowed';

    }else{
        return auth()->user()->isAdmin;
    }
});


//posts 
Route::group(['namespace' => 'Posts' , 'prefix' => 'posts'] , function (){

    /**edit post */
    Route::get('/{id}/edit','PostsController@edit')->name('posts.edit');
    /** create post */
    Route::get('/create','PostsController@create')->name('posts.create');
    /** show posts for authenticated user */
    Route::get('/{id}','PostsController@show')->name('posts.show');
    /** store posts for authenticated user */
    Route::post('/store','PostsController@store')->name('posts.store');

    Route::put('/{id}','PostsController@update')->name('posts.update');

    Route::delete('/{id}','PostsController@destroy')->name('posts.destroy');

    Route::post('/likes/store','LikesController@store')->name('likes.store');
    
});
//Comments 
Route::group(['namespace' => 'Comments' , 'prefix' => 'comments'] , function (){

    Route::post('/store'  , 'CommentsController@store')->name('comments.store');
    Route::delete('/{id}' , 'CommentsController@destroy')->name('comments.destroy');
});



Route::get('/test' , function(){
    
    $path = 'storage/images/image_1593374042_.jpg';
    $name = File::name( $path );

    $extension = File::extension( $path );

    $originalName = $name . '.' . $extension;

    $mimeType = File::mimeType( $path );

    $size = File::size( $path );

    $error = null;

    $test = false;

    $object = new UploadedFile( $path, $originalName, $mimeType, $size, $error, $test );

    dd($object) ;
});


