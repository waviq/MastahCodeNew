@extends('Page.BackEnd.Profile')
@section('header')
    <h2>Edit Information Profile</h2>
@endsection
@section('kontent')
    @include('flash::message')
    @if(count($job->user_id))
        <div class="col-md-9">
            {!! Form::model($job,['method'=>'PATCH','action'=>['JobUserController@update', $job->user_id]]) !!}

            <!--Job form input-->
            <div class="form-group">
                {!! Form::label('job','Job:') !!}
                {!! Form::text('Job',null,['class'=>'form-control','placeholder'=>'Web Developer']) !!}
            </div>

            <!--Position form input-->
            <div class="form-group">
                {!! Form::label('position','Position:') !!}
                {!! Form::text('position',null,['class'=>'form-control','placeholder'=>'Web Designer']) !!}
            </div>

            <!--Description form input-->
            <div class="form-group">
                {!! Form::label('description','Description:') !!}
                {!! Form::textarea('description',null,['class'=>'form-control','placeholder'=>'description job about your self ']) !!}
            </div>

            <!--save Button Submit-->
            <div class="form-group">
                {!! Form::submit('Update', ['class' =>'btn btn-primary form-control']) !!}
            </div>

            {!! Form::close() !!}

            @include('Page.BackEnd.Partials.ErrorMessage')

        </div>
        @else
        <h3>Tidak ada</h3>
    @endif

@endsection