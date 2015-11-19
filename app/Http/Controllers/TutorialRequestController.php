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
        $this->middleware('role:admin',['except'=>['indexFront','store']]);
    }

    public function indexFront()
    {
        return view('Page.FrontEnd.RequestTutorial.index');
    }
    public function index()
    {
        $rt = RequestTutorial::all();
        return view('Page.BackEnd.RequestTutorials.index', compact('rt'));
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

    }


    public function edit($id)
    {
        $rt = RequestTutorial::findOrFail($id);
        return view('Page.BackEnd.RequestTutorials.edit',compact('rt'));
    }


    public function update(Request $request, $id)
    {
        $rt = RequestTutorial::findOrFail($id);
        $rt->title = $request->get('title');
        $rt->description = $request->get('description');
        $rt->save();

        flash()->success('berhasil update');
        return redirect(url(action('TutorialRequestController@index')));
    }

    public function destroy($id)
    {
        RequestTutorial::find($id)->delete();
        flash()->success('Deleted');
        return redirect(url(action('TutorialRequestController@index')));
    }
}
