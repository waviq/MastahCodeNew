@extends('Page.BackEnd.Profile')
@section('header')
    <h2>Edit Form Sosial Contacts</h2>
@endsection

@section('kontent')


    {!! Form::model($sosmed,['method'=>'PATCH', 'action'=>['SosialMediaController@update',$sosmed->id]]) !!}

    @include('Page.BackEnd.Users.Sosmed.partials.FormSosmed',['namaTombol' => 'Update'])

    {!! Form::close() !!}





@endsection