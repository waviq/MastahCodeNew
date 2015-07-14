@extends('Page.FrontEnd.Home.HalamanUtama')

@section('content')

    <h1>Insert Your Image</h1>
    {!! Form::open(['url'=>'image','files' => true ]) !!}
    <!--Title form input-->
    <div class="form-group">
        {!! Form::label('Title','Title:') !!}
        {!! Form::text('title',null,['class'=>'form-control']) !!}
    </div>

    <!-- form input image-->
    <div class="form-group">
        {!! Form::file('image',['class'=>'form-control']) !!}
    </div>

    <!--Deskription form input-->
    <div class="form-group">
        {!! Form::label('deskription','Deskription:') !!}
        {!! Form::textarea('deskription',null,['class'=>'form-control']) !!}
    </div>

    <!--submit Button Submit-->
    <div class="form-group">
        {!! Form::submit('submit', ['class' =>'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
    
@endsection

