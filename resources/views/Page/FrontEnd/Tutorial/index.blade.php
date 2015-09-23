@extends('Page.FrontEnd.Blog.BlogTemplate')

@section('title') Home
@endsection


@include('flash::message')

@section('bredTtitle') Home @endsection
@section('bredLinkTitle') {{URL::action('HalamanUtamaController@index')}} @endsection
@section('bredTtitle2') Artikel @endsection
@section('bredTtitle0') Artikel @endsection

@section('content')
    <!--=== Content Part ===-->
    <div class="blog_masonry_3col">
        <div class="container content grid-boxes">

            @foreach($post as $posts)
                <div class="grid-boxes-in linkMension">
                    @if(!empty($posts->image))
                        <img class="img-responsive" src="{{asset('/img/artikel/'.$posts->image)}}"
                             alt="">
                    @else
                        <img class="img-responsive" src="{{asset('/img/artikel/mastah code tutorial.png')}}"
                             alt="">
                    @endif
                    <div class="grid-boxes-caption">
                        <h3><a href="{{url(action('blogController@show',$posts->slug))}}">{{$posts->judul}}</a></h3>
                    </div>

                    <div class="waviqKategori">
                        <ul class="blog-grid-tags">
                            @foreach($posts->kategori as $kategori)
                                <li><a href="{{url(action('KategoriController@showFront', $kategori->namaKategori))}}"
                                       class="tag-{{$kategori->namaKategori}}">{{$kategori->namaKategori}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach


        </div>
        <!--/container-->
    </div>
    <!--=== End Content Part ===-->
    <hr class="margin-bottom-40">

    @yield('Pagination')
    <!--Pagination-->
    <div class="text-center">
        <ul class="pagination">
            {!!$post->render()!!}
        </ul>
    </div>
    <!--End Pagination-->




@endsection