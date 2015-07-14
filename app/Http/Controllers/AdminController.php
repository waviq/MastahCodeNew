<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function filemanager()
    {
        $url = config('ckfinder.url');

        return view('Page.ckfinder', compact('url'));
    }
}
