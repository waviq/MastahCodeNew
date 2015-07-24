@extends('Page.BackEnd.Profile')
@section('kontent')

    <div ng-app="MyAplications" ng-controller="MyController" class=" col-md-12">

        {!! Form::open(['url'=>'user/SavePassword']) !!}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <!--PasswordLama form input-->
        <div class="form-group">
            {!! Form::label('passwordLama','Password Lama:') !!}
            {!! Form::password('passwordLama',['class'=>'form-control']) !!}
        </div>

        <!--PasswordBaru form input-->
        <div class="form-group">
            {!! Form::label('passwordBaru','Password Baru:') !!}
            {!! Form::password('passwordBaru',['class'=>'form-control']) !!}
        </div>

        <!--PasswordBaruLagi form input-->
        <div class="form-group">
            {!! Form::label('passwordBaru','Ulangi Password Baru:') !!}
            {!! Form::password('ulangiPasswordBaru',['class'=>'form-control']) !!}
        </div>

        <!--simpan Button Submit-->
        <div class="form-group">
            {!! Form::submit('simpan', ['class' =>'btn btn-primary form-control']) !!}
        </div>

        {!! Form::close() !!}
        @include('Page.BackEnd.Partials.ErrorMessage')

    </div>

@endsection