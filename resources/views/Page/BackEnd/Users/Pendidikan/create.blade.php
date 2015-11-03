@extends('Page.BackEnd.Profile')
@section('header')
    <h2>Informasi Pendidikan</h2>
@endsection
@section('kontent')
    @include('flash::message')
    <div class="col-md-9">

        {!! Form::open(['url'=>'user/edu']) !!}
        <div class="span6 pull-right" style="text-align:right">
            <!--Published form input-->
            <div class="form-group">
                {!! Form::label('published','Published') !!}
                {!! Form::checkbox('active') !!}
            </div>
        </div>

        <!--pendidikan-->
        <div class="form-group">
            {!! Form::label('pendidikan','Pendidikan:') !!}
            {!! Form::select('namaPendidikan', $pendidikan, null,['id'=>'namaPendidikan', 'class'=>'form-control']) !!}
        </div>
        <div class="form-group input-group">
            <span class="input-group-addon"><i class="icon-prepend fa fa-map-marker"></i></span>
            {!! Form::text('namaSekolah_kota',null,['class'=>'form-control','placeholder'=>'Nama Sekolah/Pendidikan, Kota']) !!}
        </div>
        
        <!--Description form input-->
        <div class="form-group">
            {!! Form::label('description','Description:') !!}
            {!! Form::textarea('description',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group input-group">
            <span class="input-group-addon"><i class="icon-prepend fa  fa-calendar"></i></span>
            {!! Form::text('start',null,['class'=>'form-control','placeholder'=>'Tahun Mulai']) !!}
            <span class="input-group-addon"><i class="icon-prepend fa fa-minus-square-o"></i></span>
            {!! Form::text('finish',null,['class'=>'form-control','placeholder'=>'Tahun Selesai']) !!}
        </div>

        
        <!--save Button Submit-->
        <div class="form-group">
            {!! Form::submit('save', ['class' =>'btn btn-primary form-control']) !!}
        </div>
        {!! Form::close() !!}


        @include('Page.BackEnd.Partials.ErrorMessage')

    </div>
@endsection