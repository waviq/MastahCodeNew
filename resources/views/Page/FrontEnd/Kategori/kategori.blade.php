@extends('Page.FrontEnd.Blog.BlogTemplate')

@section('title')
    Kategori tutorial|Mastahcode.com
@endsection

@section('meta')
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
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

            @foreach($kategori as $kategoris)
                @if(!empty($kategoris->image))
                    <div class="grid-boxes-in linkMension">
                        <img class="img-responsive" src="{{asset('/img/kategori/'.$kategoris->image)}}"
                             alt="{{$kategoris->namaKategori}}">
                        <div class="grid-boxes-caption">
                            <h3><a href="{{url(action('KategoriController@showFront', $kategoris->namaKategori))}}">{{$kategoris->namaKategori}}</a></h3>
                    </div>
                    </div>
                @else
                    <div class="grid-boxes-in linkMension">
                        <img class="img-responsive" src="{{asset('/img/kategori/Kategori.png')}}"
                             alt="{{$kategoris->namaKategori}}">
                        <div class="grid-boxes-caption">
                            <h3><a href="{{url(action('KategoriController@showFront', $kategoris->namaKategori))}}">{{$kategoris->namaKategori}}</a></h3>
                        </div>
                    </div>
                @endif
            @endforeach


        </div>
        <!--/container-->
    </div>
    <!--=== End Content Part ===-->




@endsection