<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Auth;
use Exception;
use Input;
use Redirect;
use Socialite;

class LinkedinLoginController extends Controller
{
    public function getLinkedin()
    {
        return Socialite::with('linkedin')->redirect();
    }

    public function getDataLinkedin()
    {

        try {
            $user = Socialite::driver('linkedin')->user();
        } catch (Exception $e) {
            return Redirect::to('auth/linkedin');
        }

        dd($user);
        $authUser = $this->findOrCreateUser($user);
        $cekEmail = User::where('email', $user->email)->first();
        $cekUsername = User::where('username',$user->nickname)->first();
        if (!empty($cekEmail)) {
            Auth::login($cekEmail, true);
            return redirect(url(action('HomeController@index')));

        }
        if (!empty($cekUsername)) {
            Auth::login($cekUsername, true);
            return redirect(url(action('HomeController@index')));
        }
        else {
            return view('Page.FrontEnd.LoginSosials.linkedin.index', compact('user'));
        }

    }

    private function findOrCreateUser($githubUser)
    {
        $authUser = User::where('email', $githubUser->email)->first();
        if ($authUser) {
            return $authUser;
        }
        return view('Page.FrontEnd.LoginSosials.linkedin.index');
    }
}
