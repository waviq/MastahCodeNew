<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\User;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Mail;
use URL;

class RegisterUserController extends Controller
{
    public function getRegister()
    {
        return view('Page.FrontEnd.User.Registrasi');
    }

    public function postRegister(RegisterRequest $request)
    {
        $username = Input::get('username');
        $name = Input::get('name');
        $jenisKelamin = Input::get('jenisKelamin');
        $tanggalLahir = Input::get('tanggalLahir');
        $alamat = Input::get('alamat');
        $nomorTelfon = Input::get('nomorTelfon');
        $email = Input::get('email');
        $password = bcrypt(Input::get('password'));
        $code = str_random(60);
        $user_role = DB::table('roles')->select('id')->where('slug','user')->first()->id;

        $createUser = User::create([
                'username' => $username,
                'name' => $name,
                'jenisKelamin' =>$jenisKelamin,
                'tanggalLahir' =>$tanggalLahir,
                'alamat' =>$alamat,
                'nomorTelfon'=>$nomorTelfon,
                'email' => $email,
                'password' => $password,
                'code' => $code,
                'role_id' => $user_role
        ]);

        if($createUser){
            Mail::send('Page.Emails.actived', array(
                'link' => URL::action('RegisterUserController@getActived', $code),
                'username' =>$username,
            ), function($message)use($createUser){
                $message->to($createUser->email, $createUser->username)
                    ->subject('actived your email');
            });
            flash()->overlay('Registrasi sukses, cek email anda untuk akivasi akun anda');
        }else{
            alert()->error('gagal melakukan registrasi');
        }
        return redirect(URL::action('HalamanUtamaController@index'));
    }

    public function getActived($code)
    {
        $user = User::where('code', '=', $code)->where('active','=',0);

        if($user->count()){
            $user = $user->first();

            //update isi DB
            $user->code = '';
            $user->active = 1;

            if($user->save()){
                flash()->overlay('Your account was actived');
                return redirect(URL::action('HalamanUtamaController@index'));
            }
        }
        flash()->error('fail for activate your account, please try again');
    }
}
