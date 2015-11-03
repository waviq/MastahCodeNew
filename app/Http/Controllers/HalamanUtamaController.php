<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Post;
use Illuminate\Http\Request;

class HalamanUtamaController extends Controller {


	public function index()
	{
		return view('Page.FrontEnd.Home.Home');
	}




}
