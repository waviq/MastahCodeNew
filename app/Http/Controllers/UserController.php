<?php

namespace App\Http\Controllers;

use App\ImageUser;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Input;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        //parent::__construct();
    }

    public function index()
    {
        $user = User::with('role')->get();
        $role = Role::get();
        return view('Page.BackEnd.Users.index', compact('user','role'));
    }

    public function show($id)
    {
        //$usere = User::whereName($name)->firstorFail();
        $usere = User::where('id',$id)->firstOrFail();
        //$images = $user->get();

        return view('Page.BackEnd.Users.show', compact('usere'));
    }

    public function store()
    {
        //buat ngambil image/gambar
        $images = Input::file('image');
        $filename = time() . '.' . $images->getClientOriginalName();
        $path = public_path('img/' .$filename);

        Image::make($images->getRealPath())->resize(300, 250)->save($path);

        $imageSave = new ImageUser();
        $imageSave->title = Input::get('title');
        $imageSave->deskription = Input::get('deskription');

        $imageSave->image = $filename;
        $simpan = $imageSave->save();

        if($simpan){
            echo 'sukses menyimpan';
        }else{
            return 'gagal menyimpan';
        }

        //var_dump(\Input::all());
        /*$user = ImageUser::create([
           'title' => \Input::get('title'),
            'description' => \Input::get('deskription')
        ]);*/

        //Image Upload crate n attach
        //$images = Input::file('image');


        /*$move = $images->move('public/img', $images->getClientOriginalName());
        if($move){
            $imagedata = ImageUser::create([
                'title' =>$images->getClientOriginalName(),
                'filename' =>$images->getClientOriginalName()
            ]);
            var_dump('image uploaded');*/

        }

    public function destroy($id)
    {
        User::find($id)->delete();
        return Redirect('user');
    }


}
