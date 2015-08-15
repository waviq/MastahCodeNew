<?php

namespace App\Http\Controllers\Auth;

use App\User;
use DB;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|unique:users',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'alamat' =>'required|min:15|max:100',
            'nomorTelfon' =>'required|unique:users|min:6|max:100',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)

    {
        $user_role = DB::table('roles')->select('id')->where('slug','user')->first()->id;
        return User::create([
            'username' => $data['username'],
            'name' => $data['name'],
            'jenisKelamin' =>$data['jenisKelamin'],
            'tanggalLahir' =>$data['tanggalLahir'],
            'alamat' =>$data['alamat'],
            'nomorTelfon'=>$data['nomorTelfon'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role_id' => $user_role
        ]);
    }
}
