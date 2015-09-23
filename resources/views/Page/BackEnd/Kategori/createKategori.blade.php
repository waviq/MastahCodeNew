@extends('Page.BackEnd.Profile')
@section('kontent')

    @include('flash::message')

    <div class="col-md-12">
        {!! Form::open(['url'=>'back/kategori','files'=>true]) !!}


        <!--NamaKategori form input-->
        <div class="form-group">
            {!! Form::label('namaKategori','Nama Kategori:') !!}
            {!! Form::text('namaKategori',null,['class'=>'form-control']) !!}
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