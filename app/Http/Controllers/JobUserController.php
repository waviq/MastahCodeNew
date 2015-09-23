<?php

namespace App\Http\Controllers;


use App\Http\Requests\TambahJobRequest;
use App\Job;
use Auth;
use Hashids\Hashids;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Vinkla\Hashids\HashidsManager;

class JobUserController extends Controller {

    protected $hashids;

    public function __construct(HashidsManager $hashids)
    {
        $this->hashids = $hashids;
        $this->middleware('auth');
//        $this->middleware('csrf',['only'=>['create','edit']]);
    }

    public function index()
    {

        return view('Page.BackEnd.Profile.index');

    }


    public function create()
    {
        $user_id = Auth::user()->id;

        if (Job::where('user_id', '=', $user_id)->count())
        {
            flash()->error('Mastah sudah menambahkan informasi job, lakukan Edit & Update jika ingin merubah Information Job');

            return redirect(url(action('ProfileController@index')));

        }

        return view('Page.BackEnd.Users.Job.tambahJob');


    }


    public function store(TambahJobRequest $request)
    {
        $job = new Job($request->all());
        $job->user_id = Auth::user()->id;

        Auth::user()->jobs()->delete();
        $job->save();

        flash()->success('selamat mastah, data Job berhasil di simpan');

        return redirect(url(action('ProfileController@index')));
    }


    public function show($id)
    {

    }

    public function getEditJob($user_id)
    {
        $protec = $this->hashids->decode($user_id);
        $job = Job::where('user_id', '=', $protec)->firstOrFail();

        $idFkUser = $job->user_id;

        $idLogin = Auth::id();

        if ($idFkUser == $idLogin)
        {
            return view('Page.BackEnd.Users.Job.edit', compact('job'));
        } else
        {
            return abort(401, 'Unauthorized');
        }
    }

    /*public function edit(TambahJobRequest $request, $id)
    {
        $job = Job::findOrFail($id);
        $cek = Auth::user()->jobs()->first();
        $idFkUser = $job->user_id;
        $idUser = Auth::id();
        //dd($idFkUser);

        if($idUser == $idFkUser){
            return view('Page.BackEnd.Users.Job.edit', compact('job'));
        }else{
            return abort(401, 'Unauthorized');
        }


    }*/


    public function update(TambahJobRequest $request, $user_id)
    {
        $job = Job::where('user_id', '=', $user_id)->firstOrFail();
        $job->Job = $request->get('Job');
        $job->position = $request->get('position');
        $job->description = $request->get('description');
        $save = $job->save();

        flash()->success('Selamat, data mastah berhasil di update');

        return redirect(url(action('ProfileController@index')));;
    }


    public function destroy($id)
    {
        //
    }
}
