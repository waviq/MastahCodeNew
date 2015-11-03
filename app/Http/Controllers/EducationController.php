<?php

namespace App\Http\Controllers;

use App\FormalEdu;
use App\Http\Requests\EducationRequest;
use App\Pendidikan;
use App\PendidikanValue;
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
        $pendidikan = PendidikanValue::with('pendidikan')->get()->where('user_id', Auth::id(), true);

        return view('Page.BackEnd.Users.Pendidikan.index', compact('pendidikan'));
    }


    public function create()
    {
        $pendidikan = Pendidikan::lists('namaPendidikan','id');
        //dd($pendidikan);
        //$pendidikan = array_merge([''=>'please select'],$pendidikans);

        return view('Page.BackEnd.Users.Pendidikan.create', compact('pendidikan'));
    }


    public function store(EducationRequest $request)
    {
        $cecklist = Input::get('active');
        if($cecklist == null){
            $cecklist = 0;
        }
        if($cecklist == 1){
            $cecklist = 1;
        }
        $pendidikan = new PendidikanValue();
        $pendidikan->user_id = Auth::id();
        $pendidikan->namaSekolah_kota = Input::get('namaSekolah_kota');
        $pendidikan->description = Input::get('description');
        $pendidikan->start = Input::get('start');
        $pendidikan->finish = Input::get('finish');
        $pendidikan->published = $cecklist;
        $pendidikan->save();

        $pendidikan->pendidikan()->attach($request->input('namaPendidikan'));

        flash()->success('selamat sukses menyimpan informasi pendidikan mastah');

        return redirect()->back();
    }


    public function show($id)
    {
        //
    }


    public function edit(PendidikanValue $pendidikan)
    {
        foreach($pendidikan->pendidikan as $pendidikans){
            $pendidikans = $pendidikans->namaPendidikan;
        }

        return view('Page.BackEnd.Users.Pendidikan.edit', compact('pendidikan','pendidikans'));
    }


    public function update(EducationRequest $request, PendidikanValue $pendidikanValue)
    {
        $pendidikanValue->namaSekolah_kota = $request->get('namaSekolah_kota');
        $pendidikanValue->description = $request->get('description');
        $pendidikanValue->start = $request->get('start');
        $pendidikanValue->finish = $request->get('finish');
        $pendidikanValue->published = $request->get('active');

        $pendidikanValue->save();

        flash()->success('selamat mastah, berhasil update ^_^');
        return redirect(url(action('EducationController@index')));
    }


    public function destroy(PendidikanValue $pendidikanValue)
    {
        $pendidikanValue->delete();
        return redirect()->back();
    }
}
