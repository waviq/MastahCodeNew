<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\PendidikanValue;
use App\User;


class ProfileController extends Controller {

    public function __construct(){
        $this->middleware('auth', ['except'=>['indexFront']]);
    }

	public function index()
	{
		return view('Page.BackEnd.Profile.index');
	}


    public function indexFront($username)
    {
        $cariUser = User::where('username', '=', $username)->firstOrFail();

        $valueSkill = $cariUser->valueSkill()->get()->where('user_id', $cariUser->id, true);

        $valuePendidikan = $cariUser->valuePendidikan()->get()->where('user_id',$cariUser->id, true)->where('published',1);
        //dd(count($valuePendidikan));


        return view('Page.FrontEnd.Profile.userPublicProfile', compact('cariUser','valueSkill','valuePendidikan'));
    }

}
