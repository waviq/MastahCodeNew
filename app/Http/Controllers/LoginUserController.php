<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\User;
use Auth;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Lang;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Mail;
use Redirect;
use URL;

class LoginUserController extends Controller
{
    use RedirectsUsers;

    public function getLogin()
    {
        return view('Page.FrontEnd.User.Login');
    }

    public function postLogin(LoginUserRequest $request)
    {
        $remember = Input::has('remember') ? true:false;

            if(Auth::attempt([
                'username'  =>  $request->username,
                'password'  =>  $request->password,
                'active'    =>  1
            ],$remember)){
                flash()->overlay('Selamat sukses login');
                return Redirect::intended('home');
            }

            elseif(Auth::attempt([
                'email' =>  $request->username,
                'password'  =>  $request->password,
            ],$remember)){

                if(Auth::check() && Auth::user()->active == 1){
                    flash()->overlay('Selamat sukses login');
                    return Redirect::intended('profile');
                }else{
                    flash()->overlay('Akun anda belum aktif, cek email anda dan segera aktifkan');
                    Auth::logout();
                    return Redirect::back();
                }

            }

            else{
                flash()->error('Gagal Login, cek kembali Username dan Password anda');
                return Redirect::back();
            }



    }
    public function getLogout()
    {
        Auth::logout();

        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }

    public function cekAktivUser()
    {
        return view('Page.FrontEnd.User.cekAktiv');
    }

    public function postResendAktivasiCode()
    {
        $cekEmail = User::where('email', '=', Input::get('email'))->first();
        $cekCode = User::where('code')->count();
        if($cekEmail){

                return 'data benar';
               /*$username = Auth::user()->username;
               $code = Auth::user()->code;*/

               /*Mail::send('Page.Emails.actived', array(
                   'link' => URL::action('RegisterUserController@getActived', $code),
                   'username' =>$username,
               ), function($message){
                   $message->to(Auth::user()->email, Auth::user()->username)
                       ->subject('actived your email');
               });*/


        }else{
            return 'data salah !!';
        }
    }






}
