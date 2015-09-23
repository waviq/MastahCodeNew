@extends('Page.BackEnd.Profile')
@section('kontent')

    <div class="col-md-12">

        <h1>Nama Kategori :{{$kategori->namaKategori}}</h1>




        @include('Page.BackEnd.Partials.ErrorMessage')

    </div>


@endsection