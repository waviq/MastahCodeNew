@extends('Page.BackEnd.Profile')
@section('header')
    <h2>Form Sosial Contacts</h2>
@endsection

@section('kontent')


    {!! Form::open(['url'=>'user/sosmed']) !!}

    @include('Page.BackEnd.Users.Sosmed.partials.FormSosmed',['namaTombol' => 'Submit'])

    {!! Form::close() !!}





@endsection