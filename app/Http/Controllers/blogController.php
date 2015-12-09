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

use Markdown;
use OpenGraph;
use Request;
use SEOMeta;
use Twitter;
use View;

class blogController extends Controller {

    protected $commentRepo;

    public function __construct(CommentRepository $commentRepo)
    {
        $this->commentRepo = $commentRepo;
        $this->middleware('auth', ['except' => ['indexFront', 'show', 'search', 'getByArtikel']]);
        $this->middleware('role:admin', ['only' => ['SeeAllArtikel', 'editAll']]);
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

        $post = Post::latest('created_at')->where('published',1)->paginate(5);
        $posted = Post::with('kategori')->first();
        $recentPost = Post::latest('created_at')->paginate(3);
        $kate = Kategori::all();

        $comment = CommentDisqus::latest('date')->take(7)->get();

        $this->ArtikelIndexSEO();

        return view('Page.FrontEnd.Blog.Blog', compact('post', 'kate', 'recentPost', 'comment', 'posted'));

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

        $published = Input::get('active');
        if($published == null){
            $published = 0;
        }
        if($published == 1){
            $published = 1;
        }

        $posts->judul = Input::get('judul');
        //$posts->ringkasan = Input::get('ringkasan');
        $posts->kontenFull = Input::get('kontenFull');
        $posts->slug = Str::slug(Input::get('judul'));
        $posts->published_at = Carbon::now();
        $posts->user_id = Auth::user()->id;
        $posts->image = $filename;
        $posts->published = $published;
        $posts->save();

        $posts->kategori()->attach($request->input('kategori_list'));


        flash()->overlay('Artikel berhasil di simpan', 'Horee');

        return Redirect('blog');

    }

    public function show($slug)
    {
        $recentPost = Post::latest('created_at')->paginate(4)->where('published',1);
        $post = Post::with('kategori')->whereSlug($slug)->where('published',1)->firstorFail();
        $kategori = Request::get('kategori');

        $comment = CommentDisqus::latest('date')->take(7)->get();

        if ($kategori)
        {
            $kategori = Kategori::whereKategori($kategori)->firstOrFail();
        }

        //$this->commentRepo->showCode();

        $this->SEOfullArtikel($post);

        return view('Page.FrontEnd.Blog.ShowArtikel', compact('post', 'kategori', 'recentPost', 'comment'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        $ListKategori = $post->kategori->lists('id')->toArray();

        $idFkUser = $post->user_id;
        $idUser = Auth::id();
        if ($idUser == $idFkUser)
        {
            $kategori = Kategori::lists('namaKategori', 'id');

            return view('Page.BackEnd.Artikel.EditArtikel', compact('post', 'kategori','ListKategori'));
        } else
        {
            return abort(401, 'Unauthorized');
        }

    }

    public function editAll($id)
    {
        $post = Post::findOrFail($id);
        $ListKategori = $post->kategori->lists('id')->toArray();

        $kategori = Kategori::lists('namaKategori', 'id');

        return view('Page.BackEnd.Artikel.EditArtikel', compact('post', 'kategori','ListKategori'));

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
        $post = Post::findOrFail($id);
        $post->delete();

        flash()->success('sukses menghapus');

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


            return view('Page.FrontEnd.Blog.search', compact('postSearch', 'page'));
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
        $parameter = User::where('username', '=', $username)->firstOrFail();

        $post = $parameter->posts()->paginate(3);

        return view('Page.FrontEnd.Blog.byUsername', compact('post'));
    }

    /**
     * @param $post
     */
    private function SEOfullArtikel($post)
    {
        SEOMeta::setDescription(Markdown::parse(str_limit($post->kontenFull, 200)));
        SEOMeta::addMeta('articlepublished_time', $post->created_at->toW3CString());
        foreach ($post->kategori as $katagoro)
        {
            SEOMeta::addMeta('article:section', $katagoro->namaKategori, 'property');
        }
        $keyword = str_slug($post->judul, $separator = ',');
        SEOMeta::addKeyword($keyword);

        OpenGraph::setDescription(Markdown::parse(str_limit($post->kontenFull, 200)));
        OpenGraph::setTitle($post->judul);
        OpenGraph::setUrl(url(action('blogController@show', $post->slug)));
        foreach ($post->kategori as $katagoro)
        {
            OpenGraph::addProperty('kategori', $katagoro->namaKategori);
        }
        OpenGraph::setSiteName('Mastahcode');
        OpenGraph::addProperty('locale', 'pt-br');
        OpenGraph::addProperty('type', 'articles');
        OpenGraph::addImage(asset('img/artikel/' . $post->image));
        OpenGraph::addImage(asset('img/users/' . $post->user->imageUser->image));

        Twitter::setTitle($post->judul);
        foreach ($post->kategori as $katagoro)
        {
            Twitter::addValue('Kategori', $katagoro->namaKategori);
        }
        Twitter::setDescription(Markdown::parse(str_limit($post->kontenFull, 200)));
        Twitter::setSite('@mastahcode');
        Twitter::setUrl(url(action('blogController@show', $post->slug)));
        Twitter::setType('articles');
    }

    private function ArtikelIndexSEO()
    {
        SEOMeta::setDescription('Kumpulan artikel tutorial PHP,
            Laravel, Java, Java Spring, Java Hibernate,AngularJs,dll');
        SEOMeta::addKeyword(['tutorial laravel', 'tutorial PHP', 'tutorial java',
            'tutorial java hibernate', 'tutorial java spring', 'tutorial angularJs']);

        OpenGraph::setDescription('Kumpulan artikel tutorial PHP,
            Laravel, Java, Java Spring, Java Hibernate,AngularJs,dll');
        OpenGraph::setTitle('Kumpulan artikel tutorial|Mastahcode.com');
        OpenGraph::setUrl(url(action('blogController@indexFront')));
        OpenGraph::setSiteName('Mastahcode.com');
        OpenGraph::addProperty('type', 'articles tutorial');

        Twitter::setTitle('Kumpulan artikel tutorial|Mastahcode.com');
        Twitter::setDescription('Kumpulan artikel tutorial PHP,
            Laravel, Java, Java Spring, Java Hibernate,AngularJs,dll');
        Twitter::setSite('@mastahcode');
        Twitter::setUrl(url(action('blogController@indexFront')));
        Twitter::setType('Tutorial articles');
    }


}
