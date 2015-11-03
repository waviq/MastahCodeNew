@extends('Page.FrontEnd.Blog.BlogTemplate')

@section('title')
    {{$post->judul}}|Mastahcode.com
@endsection

@section('meta')
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}

@endsection


@section('bredTtitle') Home @endsection
@section('bredLinkTitle') {{URL::action('HalamanUtamaController@index')}} @endsection
@section('bredTtitle2') Artikel @endsection
@section('bredTtitle0') Detail Artikel @endsection

@section('content')

    @include('Page.FrontEnd.Blog.partials.artikelFull')
@endsection

@section('barKanan')
    @include('Page.FrontEnd.Blog.partials.barKanan')
@endsection