<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\BlogRequest;
use App\Kategori;
use App\Post;
use App\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Input;
use Redirect;
use Request;
use Validator;

class blogController extends Controller {

    public function __construct(){
        $this->middleware('auth', ['except'=>['indexFront', 'show']]);
        parent::__construct();
    }


    public function index()
    {
        $artikel = $this->user->posts()->latest()->get();

        return view('Page.BackEnd.Artikel.KumpulanArtikel', compact('artikel'));
    }

	public function indexFront(){

        $post = Post::latest('created_at')->paginate(2);

        $kate = Kategori::all();

        return view('Page.FrontEnd.Blog.Blog', compact('post','kate'));

    }

    public function create(){

        $kategori = Kategori::lists('namaKategori','id');

        return view('Page.BackEnd.Artikel.CreateArtikel', compact('kategori'));
    }

    public function store(BlogRequest $request){

        $posts = new Post($request->all());

        $posts->judul = Input::get('judul');
        $posts->ringkasan = Input::get('ringkasan');
        $posts->kontenFull = Input::get('kontenFull');
        $posts->slug = Str::slug(Input::get('judul'));
        $posts->published_at = Carbon::now();
        $posts->user_id = Auth::user()->id;
        $posts->save();

        $posts->kategori()->attach($request->input('kategori_list'));

        /*$posts = Auth::user()->posts()->save($post);

        $posts->kategori()->attach($request->input('kategori_list'));*/

        flash()->overlay('Artikel berhasil di simpan','Horee');

        return Redirect('blog');

    }

    public function show($slug)
    {
        $post = Post::with('kategori')->whereSlug($slug)->firstorFail();
        $kategori = Request::get('kategori');

        if($kategori){
            $kategori = Kategori::whereKategori($kategori)->firstOrFail();
        }

        return view('Page.FrontEnd.Blog.ShowArtikel', compact('post','kategori'));
    }

    public function edit($id)
    {
        //$a = Crypt::encrypt($id);
        $post = Post::findOrFail($id);
        if(is_null($post))
        {
            return redirect('blog');
        }
        $kategori = Kategori::lists('namaKategori', 'id');

        return view('Page.BackEnd.Artikel.EditArtikel', compact('post','kategori'));
    }

    public function update($id, BlogRequest $request)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());
        $post->kategori()->sync($request->input('kategori_list'));

        flash()->overlay('Artikel berhasil di Update','Horee');

        return Redirect('blog');
    }

    public function destroy($id)
    {
        Post::find($id)->delete();
        return Redirect('blog');
    }







}
