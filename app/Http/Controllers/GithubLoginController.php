<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Auth;
use Exception;
use Input;
use Redirect;
use Socialite;

class GithubLoginController extends Controller
{
    public function getGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function getDataGithub()
    {
        try {
            $user = Socialite::driver('github')->user();
        } catch (Exception $e) {
            return Redirect::to('auth/github');
        }

        $authUser = $this->findOrCreateUser($user);
        $cekEmail = User::where('email', $user->email)->first();
        $cekUsername = User::where('username',$user->user['login'])->first();
        if (!empty($cekEmail)) {
            Auth::login($cekEmail, true);
            return redirect(url(action('HomeController@index')));

        }
        if (!empty($cekUsername)) {
            Auth::login($cekUsername, true);
            return redirect(url(action('HomeController@index')));
        }
        else {
            return view('Page.FrontEnd.LoginSosials.Github.index', compact('user'));
        }
        /*Auth::login($authUser, true);
        return Redirect::to('home');*/

    }

    private function findOrCreateUser($githubUser)
    {
        $authUser = User::where('email', $githubUser->email)->first();
        if ($authUser) {
            return $authUser;
        }
        return view('Page.FrontEnd.LoginSosials.facebook.index');
        /*return User::create([
            'username'   => $githubUser->user['login'],
            'email' =>  $githubUser->email
        ]);*/
    }
}
