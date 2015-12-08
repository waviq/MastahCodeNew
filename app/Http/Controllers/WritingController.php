<?php

namespace App\Http\Controllers;

use App\Writing;
use App\Http\Requests;
use DOMDocument;
use Illuminate\Http\Request;
use Input;
use Intervention\Image\ImageManagerStatic as Image;

class WritingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>['indexFront']]);
        $this->middleware('role:admin',['except'=>['indexFront']]);
    }

    public function indexFront()
    {
        $writing = Writing::all();
        return view('Page.FrontEnd.HelpCenter.writing',compact('writing'));
    }

    public function index()
    {
        $writing = Writing::all();
        return view('Page.BackEnd.HelpCenter.Writing.index', compact('writing'));
    }

    public function create()
    {
        return view('Page.BackEnd.HelpCenter.Writing.create');
    }


    public function store(Request $request)
    {
        $writing = new Writing();
        $isi = Input::get('isi');

        $dom = new DOMDocument();
        $dom->loadHTML($isi, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $img) {
            $src = $img->getAttribute('src');

            if (preg_match('/data:image/', $src)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype = $groups['mime'];

                // Generating a random filename
                $filename = uniqid();
                $filepath = "/images/$filename.$mimetype";

                // @see http://image.intervention.io/api/
                $image = Image::make($src)
                    // resize if required
                    /* ->resize(300, 200) */
                    ->encode($mimetype, 100)// encode file to the specified mimetype
                    ->save(public_path($filepath));

                $new_src = asset($filepath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);

            }
        }
        $writing->isi = $dom->saveHTML();
        $writing->title = Input::get('title');
        $writing->save();

        flash()->success('saved');
        return redirect(url(action('ProfileController@index')));
    }


    public function edit($id)
    {
        $writing = Writing::findOrFail($id);

        return view('Page.BackEnd.HelpCenter.Writing.edit', compact('writing'));
    }


    public function update(Request $request, $id)
    {
        $writing = Writing::findOrFail($id);
        $isi = Input::get('isi');

        $dom = new DOMDocument();
        $dom->loadHTML($isi, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $img) {
            $src = $img->getAttribute('src');

            if (preg_match('/data:image/', $src)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype = $groups['mime'];

                // Generating a random filename
                $filename = uniqid();
                $filepath = "/images/$filename.$mimetype";

                // @see http://image.intervention.io/api/
                $image = Image::make($src)
                    // resize if required
                    /* ->resize(300, 200) */
                    ->encode($mimetype, 100)// encode file to the specified mimetype
                    ->save(public_path($filepath));

                $new_src = asset($filepath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);

            }
        }
        $writing->isi = $dom->saveHTML();
        $writing->title = Input::get('title');
        $writing->save();

        flash()->success('updated');
        return redirect(url(action('ProfileController@index')));
    }


    public function destroy($id)
    {
        $writing = Writing::find($id)->delete();
        flash()->success('Deleted');
        return redirect(url(action('WritingController@index')));
    }
}
