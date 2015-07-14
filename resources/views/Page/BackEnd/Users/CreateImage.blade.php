@extends('Page.BackEnd.Profile')
@section('kontent')

    <div ng-app="MyAplications" ng-controller="MyController" class="col-md-12">
        {!! Form::open(['url'=>'user','files'=>true]) !!}

        <!--Title form input-->
        <div class="form-group">
            {!! Form::label('title','Title:') !!}
            {!! Form::text('title',null,['class'=>'form-control']) !!}
        </div>

        <!--Image form input-->
        <div class="form-group">
            {!! Form::label('image','Image:') !!}
            {!! Form::file('image',null,['class'=>'form-control']) !!}
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

        @include('Page.BackEnd.Partials.ErrorMessage')

    </div>


@endsection