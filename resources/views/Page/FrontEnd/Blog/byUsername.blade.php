@extends('Page.FrontEnd.Blog.BlogTemplate')

@section('title') Home
@endsection


@section('bredTtitle') Home @endsection
@section('bredLinkTitle') {{URL::action('HalamanUtamaController@index')}} @endsection
@section('bredTtitle2') Artikel @endsection
@section('bredTtitle0') Artikel @endsection

@section('content')


    <!--=== Blog Posts ===-->
    <div class="container content-md">
        @foreach($post as $posts)

            <div class="row margin-bottom-20">
                <div class="col-sm-5 sm-margin-bottom-20">
                    <img class="img-responsive" src="{{asset('/img/artikel/'.$posts->image)}}" alt="">
                </div>
                <div class="col-sm-7">
                    <div class="news-v3">
                        <ul class="list-inline posted-info">
                            <li>{{$posts->user->name}}</li>
                            @foreach($posts->kategori as $kategori)
                                <li>
                                    <a href="#">{{$kategori->namaKategori}}</a>
                                </li>
                            @endforeach

                            <li>Posted January 24, 2015</li>
                        </ul>
                        <h2><a href="{{URL::action('blogController@show',$posts->slug)}}">{{$posts->judul}}</a></h2>
                        <p>{!!Markdown::parse(str_limit($posts->kontenFull, 200))!!}</p>
                        <p><a class="btn-u btn-u-sm" href="{{URL::action('blogController@show',$posts->slug)}}">Read
                                More <i class="fa fa-angle-double-right margin-left-5"></i></a></p>
                        <ul class="post-shares">
                            <li>
                                <a href="{{URL::action('blogController@show',$posts->slug)}}" data-disqus-identifier="{{$posts->slug}}">
                                    <i class="rounded-x icon-speech"></i>
                                    <span class="disqus-comment-count" data-disqus-url="{{URL::action('blogController@show',$posts->slug)}}"></span>
                                </a>
                            </li>
                            <li><a href="#"><i class="rounded-x icon-share"></i></a></li>
                            <li><a href="#"><i class="rounded-x icon-heart"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div><!--/end row-->
            <div class="clearfix margin-bottom-20"><hr></div>
        @endforeach

                <!--Pagination-->
            <div class="text-center">
                <ul class="pagination">
                    {!!$post->render()!!}
                </ul>
            </div>
            <!--End Pagination-->

    </div>


@endsection