<?php

namespace App\Http\Controllers;


use Request;

class TestController extends Controller
{

    public function index()
    {
        return view('Page.FrontEnd.Test.ajaxLogin');
    }

    public function login()
    {
        if (Request::ajax()) {
            $data = \Input::all();
            print_r($data);die();
        }
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
