@extends('Page.FrontEnd.Blog.BlogTemplate')


@section('bredTtitle') Home @endsection
@section('bredLinkTitle') {{URL::action('HalamanUtamaController@index')}} @endsection
@section('bredTtitle2') Artikel @endsection
@section('bredTtitle0') Artikel @endsection

@section('title')
    Tutorial {{$kategoriParamLink->namaKategori}}|Mastahcode.com
@endsection

@section('meta')
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
@endsection

@section('content')

    <!--=== Content Part ===-->
    <div class="blog_masonry_3col">
        <div class="container content grid-boxes">
            @include('flash::message')
            @if(!count($post))
                <div class="alert alert-danger fade in">
                    <strong>Maaf mastah!</strong> artikel yang mastah cari tidak ditemukan.
                </div>
            @endif
            @foreach($post as $posts)



                <div class="grid-boxes-in linkMension">
                    @if(!empty($posts->image))
                        <img class="img-responsive" src="/img/artikel/{{$posts->image}}"
                             alt="">
                    @else
                        <img class="img-responsive" src="{{asset('/img/artikel/mastah code tutorial.png')}}"
                             alt="">
                    @endif

                    <div class="grid-boxes-caption">
                        <h3><a href="{{url(action('blogController@show',$posts->slug))}}">{{$posts->judul}}</a></h3>
                    </div>
                </div>



            @endforeach

        </div>
        <!--/container-->
    </div>

    <hr class="margin-bottom-40">


    <!--Pagination-->
    <div class="text-center">
        <ul class="pagination">
            {!!$post->render()!!}
        </ul>
    </div>
    <!--=== End Content Part ===-->



@endsection