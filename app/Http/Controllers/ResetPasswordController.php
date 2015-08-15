<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Mail;
use Redirect;
use URL;

class ResetPasswordController extends Controller
{
    public function getResetPassword()
    {
        return view('Page.FrontEnd.User.resetPassword');
    }

    public function postResetPassword()
    {

        $user = User::where('email', '=', Input::get('email'));

        if($user->count()){
            $user = $user->first();

            //generate new code n password
            $code = str_random(60);
            $password = str_random(10);

            $user->code = $code;
            $user->password_tmp = bcrypt($password);

            if($user->save()){

                Mail::send('Page.Emails.resetSendEmail',array(
                    'link' =>URL::action('ResetPasswordController@getRecoverPassword',$code),
                    'username' => $user->username,
                    'password' => $password
                ),function($message)use ($user){
                    $message->to($user->email, $user->username)
                        ->subject('new your password');
                });
                flash()->success('Password baru telah d kirimkan ke email anda');
                return Redirect::back();
            }
        }else{
            echo 'gagal reset, email salah';
        }

    }

    public function getRecoverPassword($code)
    {
        $user = User::where('code','=',$code)
            ->where('password_tmp','!=','');

        if($user->count()){
            $user = $user->first();

            $user->password = $user->password_tmp;
            $user->password_tmp = '';
            $user->code = '';

            if($user->save()){
                flash()->success('sukses mereset password anda','selamat');
                return redirect(action('LoginUserController@getLogin'));
            }
        }
        flash()->error('gagal merecovery password anda');
        return redirect(action('LoginUserController@getLogin'));

    }
}
