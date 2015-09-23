@extends('Page.BackEnd.Profile')
@section('kontent')

    <div class="col-md-12">

        {!! Form::model($kategori, array('action'=>array('KategoriController@postImageKategori', 'files'=>true),'method'=>'PUT')) !!}

        <!--Kategori form input-->
        <div class="form-group">
            {!! Form::label('kategori','Kategori:') !!}
            {!! Form::select('namaKategori',$kategori,null,['class'=>'form-control']) !!}
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