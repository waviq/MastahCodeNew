@include('Page.FrontEnd.Blog.partials.header')

<div class="wrapper page-option-v1">

    @include('Page.Headers')


</div>

<!--=== Breadcrumbs v3 ===-->
<div class="breadcrumbs-v3 img-v3 text-center">
    <div class="container">

        <h1>Bagikan ilmu walaupun sedikit, Yakinlah Ilmu anda akan bertambah dan tidak akan pernah berkurang</h1>

        <p>(Ali bin Abi Thalib dan cendikiawan)</p>
        <br>
        @if(!Auth::check())
            <a href="{{url(action('RegisterUserController@getRegister'))}}"
               class="btn-u btn-brd btn-brd-hover btn-u-light">Gabung Sekarang</a>
        @endif
        <a href="{{url(action('blogController@create'))}}" class="btn-u">Mulai Menulis</a>


    </div>
    <!--/end container-->
</div>
<!--=== End Breadcrumbs v3 ===-->


<div class="container content">

    <div class="row blog-page">
        @yield('content')
        @yield('barKanan')

    </div>

</div>

@include('Page.partials.Footer')

@include('Page.partials.js')


@include('Page.FrontEnd.Blog.partials.footer')