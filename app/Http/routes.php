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

Route::group(array('middleware'=>'guest'), function(){
    Route::get('auth/login','LoginUserController@getLogin');
    Route::post('auth/login','LoginUserController@postLogin');

    Route::get('auth/register','RegisterUserController@getRegister');
    Route::post('auth/register','RegisterUserController@postRegister');

    Route::get('auth/actived/{code}','RegisterUserController@getActived');

    Route::get('auth/reset-password','ResetPasswordController@getResetPassword');
    Route::post('auth/reset-password','ResetPasswordController@postResetPassword');
    Route::get('auth/recover-password/{code}', 'ResetPasswordController@getRecoverPassword');


});

Route::group(array('middleware'=>'cekAktif'), function(){

});


Route::group(array('middleware'=>'auth'), function(){
    Route::get('auth/logout','LoginUserController@getLogout');
});


Route::group(array('before' => 'csrf'),function(){
    Route::post('user/SavePassword','UserController@savePassword');
});
Route::get('user/gantipassword',[
    'middleware'    =>'role:Admin',
    'as' => 'ganti-password',
    'uses' => 'UserController@gantiPassword'
]);


Route::get('user/tambahfoto','UserController@tambahFoto');
Route::resource('user','UserController');


Route::group(array('middleware' => 'auth'), function ()
{
    Route::get('/laravel-filemanager', 'LfmController@show');
    Route::post('/laravel-filemanager/upload', 'LfmControllerUpload@upload');
    // list all lfm routes here...
});

Route::get('/','HalamanUtamaController@index');

Route::get('home', 'HomeController@index');

/*Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);*/


Route::get('coba', function(){

    $user = \App\User::all();


    return view('CobaCoba.coba', compact('user')) ;
});
Route::get('artikel','blogController@indexFront');
Route::resource('blog', 'blogController');


Route::resource('profile','ProfileController');

Route::get('/ajax/artikel', function(){
   $post = Post::paginate(2);
    return view('Page.Blog', compact('post'))->render();
});





