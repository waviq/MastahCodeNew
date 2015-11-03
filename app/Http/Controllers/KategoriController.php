<?php

namespace App\Http\Controllers;

use App\Http\Requests\KategoriRequest;
use App\Kategori;
use App\Post;
use App\Repository\KategoriReposiotry;

use App\Http\Requests;
use Image;
use Input;
use OpenGraph;
Use Request;
use SEOMeta;
use Twitter;


class KategoriController extends Controller
{
    protected $kategori_repo;


    public function __construct(KategoriReposiotry $kategori_repo)
    {
        $this->kategori_repo = $kategori_repo;

        $this->middleware('auth', ['except'=>['indexFront','showFront']]);
        $this->middleware('role:admin', ['only' => ['update','destroy','edit']]);
    }

    public function indexFront()
    {
        $kategori = Kategori::all();

        $this->indexFrontSEO();

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

        $this->kategoriShowSEO($kategoriParamLink);

        return view('Page.FrontEnd.Kategori.show',compact('post','kategoriParamLink'));

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

        flash()->overlay('berhasil menambahkan kategori baru');

        return redirect(url(action('blogController@create')));

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

    private function indexFrontSEO()
    {
        SEOMeta::setDescription('Kategori tutorial PHP,
            Laravel, Java, Java Spring, Java Hibernate,AngularJs,dll');
        SEOMeta::addKeyword(['kategori laravel', 'kategori PHP', 'kategori java',
            'kategori java hibernate', 'kategori java spring', 'kategori angularJs']);

        OpenGraph::setDescription('Kategori tutorial PHP,
            Laravel, Java, Java Spring, Java Hibernate,AngularJs,dll');
        OpenGraph::setTitle('Kategori tutorial|Mastahcode.com');
        OpenGraph::setUrl(url(action('KategoriController@indexFront')));
        OpenGraph::setSiteName('Mastahcode.com');
        OpenGraph::addProperty('type', 'kategori tutorial');

        Twitter::setTitle('Kategori tutorial|Mastahcode.com');
        Twitter::setDescription('Kategori tutorial PHP,
            Laravel, Java, Java Spring, Java Hibernate,AngularJs,dll');
        Twitter::setSite('@mastahcode');
        Twitter::setUrl(url(action('KategoriController@indexFront')));
        Twitter::setType('Kategori tutotial');
    }

    /**
     * @param $kategoriParamLink
     */
    private function kategoriShowSEO($kategoriParamLink)
    {
        SEOMeta::setDescription('Tutorial ' . $kategoriParamLink->namaKategori . ' untuk beginner, newbie, intermediate, dan advanced');
        SEOMeta::addMeta('kategoripublished_time', $kategoriParamLink->created_at->toW3CString());
        SEOMeta::addMeta('kategori:section', $kategoriParamLink->namaKategori, 'property');
        SEOMeta::addKeyword(['tutorial ' . $kategoriParamLink->namaKategori, 'untuk beginner', 'untuk newbie', 'untuk intermediate', 'untuk advanced']);

        OpenGraph::setDescription('Tutorial ' . $kategoriParamLink->namaKategori . ' untuk beginner, newbie, intermediate, dan advanced');
        OpenGraph::setTitle('Tutorial ' . $kategoriParamLink->namaKategori . '|Mastahcode.com');
        OpenGraph::setUrl(url(action('KategoriController@showFront', $kategoriParamLink->namaKategori)));
        OpenGraph::addProperty('tutorial', $kategoriParamLink->namaKategori);
        OpenGraph::setSiteName('mastahcode');
        OpenGraph::addProperty('type', 'tutorial');

        if (!empty($kategoriParamLink->image))
        {
            OpenGraph::addImage(asset('img/kategori/' . $kategoriParamLink->image));
        }
        OpenGraph::addImage(asset('img/kategori/mastah code tutorial.png'));

        Twitter::setTitle('Tutorial ' . $kategoriParamLink->namaKategori . '|Mastahcode.com');
        Twitter::setDescription('Tutorial ' . $kategoriParamLink->namaKategori . ' untuk beginner, newbie, intermediate, dan advanced');
        Twitter::setUrl(url(action('KategoriController@showFront', $kategoriParamLink->namaKategori)));
        Twitter::setType('type', 'tutorial');
    }


}
