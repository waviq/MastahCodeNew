@extends('Page.FrontEnd.Blog.BlogTemplate')

@section('title') Home
@endsection


@section('bredTtitle') Home @endsection
@section('bredLinkTitle') {{URL::action('HalamanUtamaController@index')}} @endsection
@section('bredTtitle2') Artikel @endsection
@section('bredTtitle0') Artikel @endsection

@section('content')
    @include('Page.FrontEnd.Blog.partials.content')
@endsection

@section('barKanan')
    @include('Page.FrontEnd.Blog.partials.barKanan')
@endsection

