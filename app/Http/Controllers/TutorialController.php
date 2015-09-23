<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TutorialController extends Controller
{
    public function index()
    {
        $post = Post::latest('created_at')->paginate(6);

        $kate = Kategori::all();

        return view('Page.FrontEnd.Tutorial.index', compact('post','kate'));
    }
}
