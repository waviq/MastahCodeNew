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

use App\Post;

Route::group(array('middleware'=>'guest'), function(){

    Route::get('auth/login','LoginUserController@getLogin');
    Route::post('auth/login','LoginUserController@postLogin');

    Route::get('/auth/facebook','LoginUserController@getFacebook');
    Route::get('/callback','LoginUserController@getDataFacebook');

    Route::get('auth/registerSosial','LoginUserController@getRegisterSosial');
    Route::post('auth/registerSosial','LoginUserController@postRegisSosial');

    Route::get('auth/register','RegisterUserController@getRegister');
    Route::post('auth/register','RegisterUserController@postRegister');

    Route::get('auth/actived/{code}','RegisterUserController@getActived');

    Route::get('auth/reset-password','ResetPasswordController@getResetPassword');
    Route::post('auth/reset-password','ResetPasswordController@postResetPassword');
    Route::get('auth/recover-password/{code}', 'ResetPasswordController@getRecoverPassword');

});

Route::group(array('middleware'=>'auth'), function(){
    Route::get('auth/logout','LoginUserController@getLogout');
});


Route::group(array('before' => 'csrf'),function(){
    Route::post('user/SavePassword','UserController@savePassword');
});
Route::get('user/gantipassword',[
    'as' => 'ganti-password',
    'uses' => 'UserController@gantiPassword'
]);

Route::resource('user/edu','EducationController');
Route::get('user/tambahfoto','UserController@tambahFoto');
Route::get('user/job/{user_id}/editJob','JobUserController@getEditJob');
Route::resource('user/job','JobUserController');
Route::resource('user/sosmed','SosialMediaController');

Route::get('user/skill/add-skill','SkillController@addSkill');
Route::post('user/skill/add-skill','SkillController@postNewSkillList');
Route::resource('user/skill','SkillController');

Route::resource('user','UserController');


/*
 * Kategori
*/

Route::get('kategori','KategoriController@indexFront');
Route::get('kategori/{namaKategori}','KategoriController@showFront');
Route::resource('back/kategori','KategoriController');

Route::resource('tutorial','TutorialController');
Route::resource('request-tutorial','TutorialRequestController');

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
Route::get('artikel/by/{username}','blogController@getByArtikel');
Route::get('blog/all-artikel','blogController@SeeAllArtikel');
Route::get('blog/{id}/EditAll','blogController@editAll');
Route::get('artikel/search', 'blogController@search');
Route::resource('blog', 'blogController');



Route::get('profile','ProfileController@index');
Route::get('profile/{username}','ProfileController@indexFront');

Route::get('FAQs','FAQsController@indexFront');
Route::resource('backend/FAQs','FAQsController');

Route::get('/ajax/artikel', function(){
   $post = Post::paginate(2);
    return view('Page.Blog', compact('post'))->render();
});

Route::get('sync-comments','CommentDisqusController@index');





