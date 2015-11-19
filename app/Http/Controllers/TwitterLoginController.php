<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Auth;
use Exception;
use Input;
use Redirect;
use Socialite;

class TwitterLoginController extends Controller
{
    public function getTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function getDataTwitter()
    {
        try {
            $user = Socialite::driver('twitter')->user();
        } catch (Exception $e) {
            return Redirect::to('auth/twitter');
        }

        //dd($user);
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
            return view('Page.FrontEnd.LoginSosials.Twitter.index', compact('user'));
        }

    }

    private function findOrCreateUser($githubUser)
    {
        $authUser = User::where('email', $githubUser->email)->first();
        if ($authUser) {
            return $authUser;
        }
        return view('Page.FrontEnd.LoginSosials.Twitter.index');
    }
}
