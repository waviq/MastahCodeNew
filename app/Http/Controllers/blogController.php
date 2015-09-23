<?php namespace App\Http\Controllers;


use App\CommentDisqus;
//use App\Http\Requests;
use App\Http\Requests\BlogRequest;
use App\Kategori;
use App\Post;
use App\Repository\CommentRepository;
use App\User;
use Auth;
use Carbon\Carbon;
use DB;
//use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use Input;

use Request;
use View;

class blogController extends Controller {

    protected $commentRepo;
    public function __construct(CommentRepository $commentRepo)
    {
        $this->commentRepo = $commentRepo;
        $this->middleware('auth', ['except' => ['indexFront', 'show', 'search','getByArtikel']]);
        $this->middleware('role:admin', ['only' => ['SeeAllArtikel','editAll']]);
        parent::__construct();
    }


    public function index()
    {
        $artikel = $this->user->posts()->latest()->get();

        return view('Page.BackEnd.Artikel.KumpulanArtikel', compact('artikel'));
    }

    public function SeeAllArtikel()
    {
        $artikel = Post::all();

        return view('Page.BackEnd.Artikel.AllArtikelUsers', compact('artikel'));
    }

    public function indexFront()
    {

        $post = Post::latest('created_at')->paginate(5);
        $posted = Post::with('kategori')->first();
        $recentPost = Post::latest('created_at')->paginate(3);
        $kate = Kategori::all();

        $comment = CommentDisqus::latest('date')->take(7)->get();

        return view('Page.FrontEnd.Blog.Blog', compact('post', 'kate', 'recentPost','comment','posted'));

    }

    public function create()
    {

        $kategori = Kategori::lists('namaKategori', 'id');


        return view('Page.BackEnd.Artikel.CreateArtikel', compact('kategori'));
    }

    public function store(BlogRequest $request)
    {

        //ambil gambar
        $images = Input::file('image');
        $cariFileName = $images->getClientOriginalName();

        $filename = $cariFileName;
        $path = public_path('img/artikel/' . $filename);

        Image::make($images->getRealPath())->resize(500, 375)->save($path);
        //close code ambil n resize image

        $posts = new Post($request->all());

        $posts->judul = Input::get('judul');
        //$posts->ringkasan = Input::get('ringkasan');
        $posts->kontenFull = Input::get('kontenFull');
        $posts->slug = Str::slug(Input::get('judul'));
        $posts->published_at = Carbon::now();
        $posts->user_id = Auth::user()->id;
        $posts->image = $filename;
        $posts->save();

        $posts->kategori()->attach($request->input('kategori_list'));


        flash()->overlay('Artikel berhasil di simpan', 'Horee');

        return Redirect('blog');

    }

    public function show($slug)
    {
        $recentPost = Post::latest('created_at')->paginate(4);
        $post = Post::with('kategori')->whereSlug($slug)->firstorFail();
        $kategori = Request::get('kategori');

        $comment = CommentDisqus::latest('date')->take(7)->get();

        if ($kategori)
        {
            $kategori = Kategori::whereKategori($kategori)->firstOrFail();
        }

        $this->commentRepo->showCode();


        return view('Page.FrontEnd.Blog.ShowArtikel', compact('post', 'kategori', 'recentPost','comment'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $idFkUser = $post->user_id;
        $idUser = Auth::id();
        if ($idUser == $idFkUser)
        {
            $kategori = Kategori::lists('namaKategori', 'id');

            return view('Page.BackEnd.Artikel.EditArtikel', compact('post', 'kategori'));
        } else
        {
            return abort(401, 'Unauthorized');
        }

    }

    public function editAll($id)
    {
        $post = Post::findOrFail($id);

        $kategori = Kategori::lists('namaKategori', 'id');

        return view('Page.BackEnd.Artikel.EditArtikel', compact('post', 'kategori'));

    }


    public function update($id, BlogRequest $request)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());
        $post->kategori()->sync($request->input('kategori_list'));

        flash()->overlay('Artikel berhasil di Update', 'Horee');

        return Redirect('blog');
    }

    public function destroy($id)
    {
        Post::find($id)->delete();

        return Redirect('blog');
    }

    public function search()
    {
        $ambilInput = Input::get('keyword');

        if (empty($ambilInput))
        {
            flash()->warning('Masukan keyword mastah');

            return redirect()->back();
        } else
        {
            $searchTerms = explode(' ', $ambilInput);
            $postTable = \DB::table('posts');

            foreach ($searchTerms as $term)
            {
                $postTable->where('judul', 'LIKE', '%' . $term . '%')
                    ->orWhere('kontenFull', 'LIKE', '%' . $ambilInput . '%');
            }

            $postSearch = $postTable->paginate(5);

            //dd(count($postSearch));



            return view('Page.FrontEnd.Blog.search', compact('postSearch','page'));
        }
        /*$ambilInput = Input::get('keyword');
        $postSearch = Post::search($ambilInput)->get();
        $limit = 5;
        $page = Input::has('page')?$request->page -1:0;
        $total = $postSearch->count();
        $postSearch = $postSearch->slice($page * $limit, $limit);
        $postSearch = new \Illuminate\Pagination\LengthAwarePaginator($postSearch, $total, $limit);
        $postSearch->setPath('/artikel/search')->appends(['search'=>$ambilInput]);

        return view('Page.FrontEnd.Blog.search', compact('postSearch'));*/

    }

    public function getByArtikel($username)
    {
        $parameter = User::where('username','=',$username)->firstOrFail();

        $post = $parameter->posts()->paginate(3);

        return view('Page.FrontEnd.Blog.byUsername',compact('post'));
    }



}
