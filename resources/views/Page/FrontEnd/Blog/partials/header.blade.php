<!doctype html>
<!--[if IE 8]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en"> <!--<![endif]-->

<head>

    <title>@yield('title')</title>

    {{--Meta--}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Waviq Own Mastahcode">
    @yield('meta')

    {{--favicon--}}
    <link rel="shortcut icon" href="{{asset('icon/icon.ico')}}">

    {{--Web Font--}}
    <link href='https://fonts.googleapis.com/css?family=PT+Sans&subset=latin,cyrillic' rel='stylesheet' type='text/css'>

    @include('Page.partials.css')

</head>

<body onload="prettyPrint()">