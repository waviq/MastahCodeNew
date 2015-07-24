@extends('Page.BackEnd.Profile')
@section('kontent')

    <div ng-app="MyAplications" ng-controller="MyController" class="col-md-12">

        <h1>User :{{$usere->name}}</h1>
        @if($aser = $usere->imageUser()->count())
        <h1>Image title :{{$usere->imageUser->title}}</h1>
        @else
            <h1>Image title :Mr x</h1>
        @endif

        @if($usere->imageUser()->count())
        <img src="/img/{{$usere->imageUser->image}}" alt="{{$usere->imageUser->title}}">
        @else
            <img src="{{asset('img/default.png')}}"/>
        @endif



        @include('Page.BackEnd.Partials.ErrorMessage')

    </div>


@endsection