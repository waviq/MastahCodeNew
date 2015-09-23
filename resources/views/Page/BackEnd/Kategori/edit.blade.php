@extends('Page.BackEnd.Profile')
@section('kontent')

    @include('flash::message')

    <div class="col-md-12">

        <h1>Edit/add Image Kategori</h1>
        {!! Form::model($kategori,['method'=>'patch','action'=>['KategoriController@update', $kategori->id],'files'=>true]) !!}

        <!--NamaKategori form input-->
        <div class="form-group">
            {!! Form::label('namaKategori','Nama Kategori:') !!}
            {!! Form::text('namaKategori',null,['readonly','class'=>'form-control']) !!}
        </div>

        <!--NamaKategori form input-->
        <div class="form-group">
            {!! Form::label('image','Image') !!}
            {!! Form::text('image',null,['readonly','class'=>'form-control']) !!}
        </div>
        <!--Image form input-->
        <div class="form-group">
            {!! Form::label('image','Image:') !!}
            {!! Form::file('image',null,['class'=>'form-control']) !!}
        </div>

        <!--simpan Button Submit-->
        <div class="form-group">
            {!! Form::submit('simpan', ['class' =>'btn btn-primary form-control']) !!}
        </div>
        {!! Form::close() !!}

        @include('Page.BackEnd.Partials.ErrorMessage')

    </div>


@endsection