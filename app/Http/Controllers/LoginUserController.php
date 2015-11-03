<?php

namespace App\Http\Controllers;


use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterSosialMediaRequest;
use App\User;
use Auth;
use DateTime;
use DB;
use Hash;
use Illuminate\Foundation\Auth\RedirectsUsers;
use App\Http\Requests;
use Input;
use Redirect;
use Laravel\Socialite\Facades\Socialite;
use Validator;


class LoginUserController extends Controller {

    use RedirectsUsers;

    public function getLogin()
    {
        return view('Page.FrontEnd.User.Login');
    }

    public function postLogin(LoginUserRequest $request)
    {
        $remember = Input::has('remember') ? true : false;

        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password,
        ], $remember)
        )
        {

            if (Auth::check() && Auth::user()->active == 1)
            {

                Auth::user()->lastLogin = new DateTime();
                Auth::user()->save();

                flash()->overlay('Selamat sukses login');

                return Redirect::intended('profile');
            } else
            {
                flash()->overlay('Akun anda belum aktif, cek email anda dan segera aktifkan');
                Auth::logout();

                return Redirect::back();
            }
        } elseif (Auth::attempt([
            'email'    => $request->username,
            'password' => $request->password,
        ], $remember)
        )
        {

            if (Auth::check() && Auth::user()->active == 1)
            {

                Auth::user()->lastLogin = new DateTime();
                Auth::user()->save();

                flash()->overlay('Selamat sukses login');

                return Redirect::intended('profile');
            } else
            {
                flash()->overlay('Akun anda belum aktif, cek email anda dan segera aktifkan');
                Auth::logout();

                return Redirect::back();
            }

        } else
        {
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
        if ($cekEmail)
        {

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


        } else
        {
            return 'data salah !!';
        }
    }

    public function getFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function getDataFacebook()
    {
        $user = Socialite::driver('facebook')->user();
        //dd($user);
        //return view('Page.FrontEnd.LoginSosials.facebook.index',compact('user'));

        $cekEmail = User::where('email', $user->email)->first();
        //dd(empty($cekEmail));
        if (!empty($cekEmail))
        {
            Auth::login($cekEmail);

            return redirect(url(action('HomeController@index')));
        } else
        {
            return view('Page.FrontEnd.LoginSosials.facebook.index', compact('user'));
        }

        /*$data = ['name' => $user->name, 'email' => $user->email, 'password' => $user->token];
        $userDB = User::where('email', $user->email)->first();
        if (!is_null($userDB))
        {
            Auth::login($userDB);
        } else
        {
            Auth::login($this->create($data));
        }

        return redirect('/home');*/
    }

    public function getRegisterSosial()
    {
        //$user = Socialite::driver('facebook')->user();

        return view('Page.FrontEnd.LoginSosials.facebook.index');
    }


    public function postRegisSosial()
    {
        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);
        $userData = array(
            'name'      => $formFields['name'],
            'username'  =>  $formFields['username'],
            'email'     =>  $formFields['email'],
            'role_id'     =>  2,
            'password'  =>  $formFields['password'],
            'password_confirmation' =>  $formFields[ 'password_confirmation'],
        );
        
        $rules = array(
            'name'      =>  'required',
            'email'     =>  'required|email|unique:users',
            'password'  =>  'required|min:6|confirmed',
        );
        $validator = Validator::make($userData,$rules);
        if($validator->fails()){
            return \Response::json(array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            ));
        }else{
            $password = $userData['password'];
            $userData['password'] = Hash::make($userData['password']);
            unset($userData['password_confirmation']);

            //save to DB
            if(User::create($userData)){
                return \Response::json(array(
                    'success' => true,
                    'email' => $userData['email'],
                    'password'    =>  $password
                ));
            }
        }

        /*$newMember = new User();
        $user_role = DB::table('roles')->select('id')->where('slug', 'user')->first()->id;
        $newMember->name = Input::get('name');
        $newMember->role_id = $user_role;
        $newMember->email = Input::get('email');
        $newMember->username = Input::get('username');
        $newMember->password = bcrypt(Input::get('password'));
        $newMember->active = 1;
        $newMember->save();

        $user = User::where('email', Input::get('email'))->first();
        Auth::login($user, $remember = true);

        return redirect('home');*/


    }

    public function create()
    {

    }
}
