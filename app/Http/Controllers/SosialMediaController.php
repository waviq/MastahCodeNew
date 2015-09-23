<?php

namespace App\Http\Controllers;


use App\Http\Requests\SosmedRequest;
use App\Sosmed;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SosialMediaController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $user_id = Auth::user()->id;

        if (Sosmed::where('user_id', '=', $user_id)->count())
        {
            flash()->error('Mastah sudah menambahkan informasi contacts,lakukan Edit & Update jika ingin merubah information contacts ');

            return redirect(url(action('ProfileController@index')));
        } else
        {
            return view('Page.BackEnd.Users.Sosmed.create');
        }
    }

    public function store(SosmedRequest $request)
    {
        $sosmed = new Sosmed($request->all());
        $sosmed->user_id = Auth::id();

        Auth::user()->sosmeds()->delete();

        $sosmed->save();

        flash()->success('Selamat Mastah, Penambahan informasi sosial media anda berhasil disimpan');

        return redirect(url(action('ProfileController@index')));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $protect = \Hashids::decode($id);
        $sosmed = Sosmed::where('user_id', '=', $protect)->firstOrFail();

        $idFkUser = $sosmed->user_id;
        $idLogin = Auth::id();

        if ($idFkUser == $idLogin)
        {
            return view('Page.BackEnd.Users.Sosmed.edit', compact('sosmed'));
        } else
        {
            return abort(401, 'Unauthorized');
        }
    }


    public function update(SosmedRequest $request, $id)
    {
        $sosmed = Sosmed::where('user_id', '=', $id)->firstOrFail();
        $sosmed->update($request->all());

        flash()->success('Selamat Mastah, Sosial Contacts berhasil di update');

        return redirect(url(action('ProfileController@index')));
    }


    public function destroy($id)
    {
        //
    }
}
