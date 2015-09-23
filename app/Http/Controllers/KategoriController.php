<?php

namespace App\Http\Controllers;

use App\Http\Requests\KategoriRequest;
use App\Kategori;
use App\Post;
use App\Repository\KategoriReposiotry;

use App\Http\Requests;
use Image;
use Input;
Use Request;


class KategoriController extends Controller
{
    protected $kategori_repo;


    public function __construct(KategoriReposiotry $kategori_repo)
    {
        $this->kategori_repo = $kategori_repo;

        $this->middleware('auth', ['except'=>['indexFront','showFront']]);
    }

    public function indexFront()
    {
        $kategori = Kategori::all();
        return view('Page.FrontEnd.Kategori.kategori', compact('kategori'));
    }

    public function index()
    {
        $kategori = Kategori::all();

        return view('Page.BackEnd.Kategori.indexBackKategori', compact('kategori'));
    }

    public function create()
    {
        return view('Page.BackEnd.Kategori.createKategori');
    }

    public function show(Kategori $kategori)
    {
        return view('Page.BackEnd.Kategori.show',compact('kategori'));
    }

    public function showFront($namaKategori)
    {
        $kategoriParamLink = Kategori::with('posts')->whereNamakategori($namaKategori)->firstorFail();

        $kategori = $kategoriParamLink->namaKategori;

        $post = Post::with('Kategori')
            ->latest()
            ->whereHas('kategori', function($query) use ($kategori){
                $query->where('namaKategori', '=', $kategori);
            })->paginate(3);

        if(!count($post)){
            flash()->message('maaf, artikel yang anda cari tidak ditemukan mastah');
        }

        return view('Page.FrontEnd.Kategori.show',compact('post'));

    }
    public function store(KategoriRequest $request)
    {

        //ambil gambar
        $images = Input::file('image');
        $cariFileName = Input::get('namaKategori');

        $filename = $cariFileName . '.' . $images->getClientOriginalExtension();
        $path = public_path('img/kategori/' . $filename);

        Image::make($images->getRealPath())->resize(500, 375)->save($path);

        $kategoriSave = new Kategori();
        $kategoriSave->namaKategori = Input::get('namaKategori');
        $kategoriSave->image = $filename;

        $kategoriSave->save();

        flash()->overlay('sukses menyimpan');

        return redirect('back/kategori');

    }

    public function edit(Kategori $kategori)
    {
        return view('Page.BackEnd.Kategori.edit', compact('kategori'));
    }

    public function update(Kategori $kategori, KategoriRequest $request)
    {

        $kategori->update($request->all());

        if(Input::hasFile('image')){
            $images = Input::file('image');
            $cariFileName = Input::get('namaKategori');

            $filename = $cariFileName . '.' . $images->getClientOriginalExtension();
            $path = public_path('img/kategori/' . $filename);

            Image::make($images->getRealPath())->resize(500, 375)->save($path);

            $kategori->image = $filename;
            $kategori->namaKategori = Input::get('namaKategori');
            $kategori->save(Input::except('namaKategori'));
        }

        flash()->success('berhasil update');

        return redirect(action('KategoriController@index'));
    }

    public function getImageKategori()
    {
        $kategori = Kategori::lists('namaKategori','id');
        return view('Page.BackEnd.Kategori.addImageKategori', compact('kategori'));
    }

    public function postImageKategori(Kategori $kategori)
    {
        $kategori = Kategori::find($kategori);
        if(Input::hasFile('image')){
            $images = Input::file('image');
            $cariFileName = $images->getClientOriginalName();

            $filename = $cariFileName . '.' . $images->getClientOriginalExtension();
            $path = public_path('img/kategori/' . $filename);

            Image::make($images->getRealPath())->resize(500, 375)->save($path);

            $kategori->attachment = $filename;
        }
        $kategori->save();


        flash()->success('sukses menambahkan gambar di kategori');
        return redirect(action('KategoriController@index'));
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return redirect(action('KategoriController@index'));
    }


}
