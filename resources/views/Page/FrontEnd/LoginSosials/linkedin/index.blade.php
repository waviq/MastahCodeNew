@extends('Page.FrontEnd.Home.HalamanUtama')
@section('content')


    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">Login</h1>
            <ul class="pull-right breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="">Pages</a></li>
                <li class="active">Login</li>
            </ul>
        </div>
        <!--/container-->
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->

    <!--=== Content Part ===-->
    <div class="container content">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">

                <div class="reg-page">
                    <div class="alert alert-info info" style="display: none">
                        <ul></ul>
                    </div>

                    @include('Page.partials.alertValidasi')
                    @include('flash::message')
                    @include('Page.FrontEnd.LoginSosials.linkedin.form')



                </div>

            </div>
        </div>
        <!--/row-->
    </div><!--/container-->
    <!--=== End Content Part ===-->

@stop

