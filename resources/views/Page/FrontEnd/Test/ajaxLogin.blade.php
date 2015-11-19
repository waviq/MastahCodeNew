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
        <div class="col-sm-6 col-sm-offset-3">
            <h3>Send me a message</h3>
            <form role="form" id="contactForm">
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="name" class="h4">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter name" required>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="email" class="h4">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="message" class="h4 ">Message</label>
                    <textarea id="message" class="form-control" rows="5" placeholder="Enter your message" required></textarea>
                </div>
                <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Submit</button>
                <div id="msgSubmit" class="h3 text-center hidden">Message Submitted!</div>
            </form>
        </div>
    </div>
    <!--/row-->
</div><!--/container-->
<!--=== End Content Part ===-->

@stop

