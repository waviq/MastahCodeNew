<?php

namespace App\Http\Controllers;

use App\FormalEdu;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;

class EducationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

    }


    public function create()
    {
        return view('Page.BackEnd.Users.FormalEdu.create');
    }


    public function store(Request $request)
    {
        $formaEdu = new FormalEdu();
        $formaEdu->user_id = Auth::id();
        $formaEdu->SD = Input::get('SD');
        /*$formaEdu->SMP = Input::get('SMP');
        $formaEdu->SMA = Input::get('SMA');*/



        $formaEdu->yearsEdu()->attach(Input::get('start'));
        $formaEdu->yearsEdu()->attach(Input::get('finish'));
        dd($formaEdu);
        $formaEdu->save();
        flash()->success('saved');
        return redirect()->back();
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
