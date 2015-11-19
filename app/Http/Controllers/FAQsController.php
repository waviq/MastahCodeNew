<?php

namespace App\Http\Controllers;

use App\FAQs;
use App\Http\Requests;
use DOMDocument;
use Illuminate\Http\Request;
use Input;
use Intervention\Image\ImageManagerStatic as Image;

class FAQsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['indexFront']]);
        $this->middleware('role:admin',['except'=>['indexFront']]);
    }

    public function index()
    {
        $faqs = FAQs::all();

        return view('Page.BackEnd.FAQs.index', compact('faqs'));
    }

    public function indexFront()
    {
        $faqs = FAQs::all();

        return view('Page.FrontEnd.FAQs.index', compact('faqs'));
    }


    public function create()
    {
        return view('Page.BackEnd.FAQs.create');
    }


    public function store(Request $request)
    {
        $faqs = new FAQs();
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
        $faqs->isi = $dom->saveHTML();
        $faqs->title = Input::get('title');
        $faqs->save();

        flash()->success('saved');
        return redirect(url(action('ProfileController@index')));
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $faqs = FAQs::findOrFail($id);

        return view('Page.BackEnd.FAQs.edit', compact('faqs'));
    }


    public function update(Request $request, $id)
    {
        $faqs = FAQs::findOrFail($id);
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
        $faqs->isi = $dom->saveHTML();
        $faqs->title = Input::get('title');
        $faqs->save();

        flash()->success('updated');
        return redirect(url(action('ProfileController@index')));
    }


    public function destroy($id)
    {
        $faqs = FAQs::find($id)->delete();
        flash()->success('Deleted');
        return redirect(url(action('FAQsController@index')));
    }
}
