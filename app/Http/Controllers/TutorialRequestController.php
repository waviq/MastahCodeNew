<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestTutorialRequest;
use App\RequestTutorial;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;

class TutorialRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexFront()
    {
        return view('Page.FrontEnd.RequestTutorial.index');
    }
    public function index()
    {
        return view('Page.BackEnd.RequestTutorials.index');
    }


    public function store(RequestTutorialRequest $request)
    {
        $rt = new RequestTutorial($request->all());
        $rt->user_id = Auth::id();
        $rt->title = Input::get('title');
        $rt->description = Input::get('description');
        $rt->save();

        flash()->success('Request Mastah Telah Diterima, Terimakasih....');
        return redirect(url(action('TutorialRequestController@indexFront')));
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
