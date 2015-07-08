<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', 'WelcomeController@index');

use App\Post;

Route::get('/','HalamanUtamaController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);


Route::get('coba', function(){
    return view('CobaCoba.Angular') ;
});
Route::get('artikel','blogController@indexFront');
Route::resource('blog', 'blogController');


Route::resource('profile','ProfileController');

Route::get('/ajax/artikel', function(){
   $post = Post::paginate(2);
    return view('Page.Blog', compact('post'))->render();
});



