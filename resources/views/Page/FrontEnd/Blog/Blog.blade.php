@extends('Page.FrontEnd.Blog.BlogTemplate')

@section('title')
    Kumpulan artikel tutorial|Mastahcode.com
@endsection

@section('meta')
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
@endsection

@section('content')
    @include('Page.FrontEnd.Blog.partials.content')
@endsection

@section('barKanan')
    @include('Page.FrontEnd.Blog.partials.barKanan')
@endsection

