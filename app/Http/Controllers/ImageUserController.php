<?php

namespace App\Http\Controllers;

use App\ImageUser;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Intervention\Image\Facades\Image;

class ImageUserController extends Controller
{
    public function index()
    {
        return view('CobaCoba.ImageInput');
    }

    public function store()
    {

        $image = Input::file('image');
        //var_dump($image->getRealPath());
        //var_dump($image->getClientOriginalName());
        //Image::make($image->getRealPath());

        $image = Input::file('image');
        $filename  = time() . '.' . $image->getClientOriginalExtension();
        $path = public_path('img/' . $filename);
        Image::make($image->getRealPath())->resize(468, 249)->save($path);

        $images = new ImageUser();
        $images->title = Input::get('title');
        $images->deskription = Input::get('deskription');

        $images->image = $filename;
        $images->save();

        //$gambar = Image::make($image->getRealPath())->resize('280','200')->save('public/img/'. $filename);

        /*if(Image::make($image->getRealPath())->resize('280','200')->save('public/img/'. $filename)){
            return 'Image sukses d upload';
        }else{
            return 'gagal upload';
        }*/

        /*$image = Input::file('image');

        //image name
        $filename = $image->getClientOriginalName();

        $images = new ImageUser();
        $images->title = Input::get('title');
        $images->deskription = Input::get('deskription');
        $images->image = $filename;

        //save to database
        $saveFlag = $images->save();

        if($saveFlag){
            return 'gambar sukses di simpan';
        }*/
    }
}
