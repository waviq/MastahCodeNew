@extends('Page.BackEnd.Profile')
@section('kontent')

    <div class="col-md-12">
        {!! Form::model($user,['method'=>'PATCH','action'=>['UserController@update', $user->id]]) !!}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <!--Nama form input-->
        <div class="form-group">
            {!! Form::label('nama','Nama:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        
        <!--Email form input-->
        <div class="form-group">
            {!! Form::label('email','Email:') !!}
            {!! Form::text('email',null,['class'=>'form-control']) !!}
        </div>
        
        <!--Role form input-->
        <div class="form-group">
            {!! Form::label('role','Role:') !!}
            {!! Form::select('role',$select,$user->role_id,['class'=>'form-control']) !!}
        </div>

        <!--save Button Submit-->
        <div class="form-group">
            {!! Form::submit('Save', ['class' =>'btn btn-primary form-control']) !!}
        </div>
        {!! Form::close() !!}

        @include('Page.BackEnd.Partials.ErrorMessage')

    </div>

@endsection