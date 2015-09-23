<?php

namespace App\Http\Controllers;


use App\Http\Requests\GantiPasswordRequest;
use App\Http\Requests\TambahJobRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\ImageUser;
use App\Job;
use App\Repository\RoleRepository;
use App\Role;
use App\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Input;
use Intervention\Image\Facades\Image;

class UserController extends Controller {

    protected $role_repo;

    public function __construct(RoleRepository $role_repo)
    {
        $this->role_repo = $role_repo;

        $this->middleware('auth');
        $this->middleware('role:admin',['only'=>['index']]);
        //parent::__construct();
    }

    public function index()
    {
        $user = User::with('role')->get();
        $role = Role::get();

        return view('Page.BackEnd.Users.index', compact('user', 'role'));
    }

    public function create()
    {
        User::all();

        return view('Page.BackEnd.Users.CreateImage');
    }

    public function show(User $usere)
    {
        return view('Page.BackEnd.Users.show', compact('usere'));
    }

    public function store(UserRequest $request)
    {
        $cariId = Auth::user()->id;
        $cariNama = Auth::user()->name;

        //buat ngambil image/gambar
        $images = Input::file('image');
        $filename = $cariId . '.' . $images->getClientOriginalExtension();
        $path = public_path('img/' . $filename);


        Image::make($images->getRealPath())->resize(300, 250)->save($path);

        $imageSave = new ImageUser($request->all());
        $imageSave->title = Input::get('title');
        $imageSave->deskription = Input::get('deskription');
        $imageSave->user_id = Input::user()->id;

        $imageSave->image = $filename;

        Auth::user()->imageUser()->delete();

        $simpan = $imageSave->save();

        flash()->overlay('Photo berhasil ditambahkan','Horee');

        return Redirect('user');

    }

    public function gantiPassword()
    {
        return view('Page.BackEnd.Users.GantiPassword');
    }

    public function savePassword(GantiPasswordRequest $request)
    {
        $newPassword = Input::get('passwordLama');
        $oldPassword = Auth::user()->getAuthPassword();

        $passwordBaru = Input::get('passwordBaru');

        if(Hash::check($newPassword, $oldPassword)){

            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($passwordBaru);
            $user->save();

            flash()->overlay('Password berhasil di ganti','Horee');

            return redirect('user/gantipassword');
        }else{
            flash()->error('Gagal mengganti password, salah memasukan password lama !!');
            return redirect::back();
        }
    }

    public function tambahFoto()
    {
        return view('Page.BackEnd.Users.tambahFoto');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return Redirect('user');
    }

    public function edit(User $user)
    {
        return view('Page.BackEnd.Users.editUser', array_merge(compact('user'), $this->role_repo->getAllSelect()));
    }

    public function update(User $user, UserUpdateRequest $request)
    {
        $user->update($request->all());
        $user->role()->associate($request->input('role'))->save();
        flash()->success('berhasil update');

        return redirect('user');
    }

}
