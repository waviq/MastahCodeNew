@extends('Page.BackEnd.Profile')
@section('header')
    <h2>Pendidikan Formal</h2>
@endsection
@section('kontent')
    @include('flash::message')
    <div class="col-md-9">

        {!! Form::open(['url'=>'user/formal-edu']) !!}
        <h3 style="color: #5fb611;text-decoration: underline;">Sekolah Dasar</h3>

        <!--Sekolah dasar form input-->
        <div class="form-group input-group">
            <span class="input-group-addon"><i class="icon-prepend fa  fa-child"></i></span>
            {!! Form::text('SD',null,['class'=>'form-control','placeholder'=>'Sekolah dasar']) !!}
        </div>
        <div class="form-group input-group">
            <span class="input-group-addon"><i class="icon-prepend fa fa-map-marker"></i></span>
            {!! Form::text('tempat',null,['class'=>'form-control','placeholder'=>'Nama Sekolah, Kota']) !!}
        </div>

        <div class="form-group input-group">
            <span class="input-group-addon"><i class="icon-prepend fa  fa-calendar"></i></span>
            {!! Form::text('start',null,['class'=>'form-control','placeholder'=>'Tahun Mulai']) !!}
            <span class="input-group-addon"><i class="icon-prepend fa fa-minus-square-o"></i></span>
            {!! Form::text('finish',null,['class'=>'form-control','placeholder'=>'Tahun Selesai']) !!}
        </div>

        {{--<hr>

        <h3 style="color: #5fb611;text-decoration: underline;">Sekolah Menengah Pertama</h3>

        <!--Sekolah dasar form input-->
        <div class="form-group input-group">
            <span class="input-group-addon"><i class="icon-prepend fa  fa-child"></i></span>
            {!! Form::text('SMP',null,['class'=>'form-control','placeholder'=>'Sekolah dasar']) !!}
        </div>
        <div class="form-group input-group">
            <span class="input-group-addon"><i class="icon-prepend fa fa-map-marker"></i></span>
            {!! Form::text('tempat',null,['class'=>'form-control','placeholder'=>'Nama Sekolah, Kota']) !!}
        </div>

        <div class="form-group input-group">
            <span class="input-group-addon"><i class="icon-prepend fa  fa-calendar"></i></span>
            {!! Form::text('start',null,['class'=>'form-control','placeholder'=>'Tahun Mulai']) !!}
            <span class="input-group-addon"><i class="icon-prepend fa fa-minus-square-o"></i></span>
            {!! Form::text('finish',null,['class'=>'form-control','placeholder'=>'Tahun Selesai']) !!}
        </div>

        <hr>

        <h3 style="color: #5fb611;text-decoration: underline;">Sekolah Menengah Atas</h3>
        <!--SMA-->
        <div class="form-group input-group">
            <span class="input-group-addon"><i class="icon-prepend fa  fa-child"></i></span>
            {!! Form::text('SMA',null,['class'=>'form-control','placeholder'=>'Sekolah dasar']) !!}
        </div>
        <div class="form-group input-group">
            <span class="input-group-addon"><i class="icon-prepend fa fa-map-marker"></i></span>
            {!! Form::text('tempat',null,['class'=>'form-control','placeholder'=>'Nama Sekolah, Kota']) !!}
        </div>

        <div class="form-group input-group">
            <span class="input-group-addon"><i class="icon-prepend fa  fa-calendar"></i></span>
            {!! Form::text('start',null,['class'=>'form-control','placeholder'=>'Tahun Mulai']) !!}
            <span class="input-group-addon"><i class="icon-prepend fa fa-minus-square-o"></i></span>
            {!! Form::text('finish',null,['class'=>'form-control','placeholder'=>'Tahun Selesai']) !!}
        </div>--}}
        
        <!--save Button Submit-->
        <div class="form-group">
            {!! Form::submit('save', ['class' =>'btn btn-primary form-control']) !!}
        </div>
        {!! Form::close() !!}


        @include('Page.BackEnd.Partials.ErrorMessage')

    </div>
@endsection