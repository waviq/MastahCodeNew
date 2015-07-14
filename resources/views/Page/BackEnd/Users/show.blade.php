@extends('Page.BackEnd.Profile')
@section('kontent')

    <div ng-app="MyAplications" ng-controller="MyController" class="col-md-12">

        <h1>User :{{$usere->name}}</h1>
        <h1>User :{{$usere->imageUser->title}}</h1>
        <img src="/img/{{$usere->imageUser->image}}" alt="{{$usere->imageUser->title}}">



        @include('Page.BackEnd.Partials.ErrorMessage')

    </div>


@endsection