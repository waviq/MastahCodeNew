@include('Page.FrontEnd.Blog.partials.header')

<div class="wrapper page-option-v1">

    @include('Page.Headers')





</div>

<!--=== Breadcrumbs ===-->
<div class="breadcrumbs">
    <div class="container">
        <h1 class="pull-left">@yield('bredTtitle0')</h1>
        <ul class="pull-right breadcrumb">
            <li><a href="@yield('bredLinkTitle')">@yield('bredTtitle')</a></li>
            <li class="active">@yield('bredTtitle2')</li>
            {{--<li><a href="@yield('bredLinkTitle3')">@yield('bredTtitle3')</a></li>--}}
        </ul>
    </div>
</div><!--/breadcrumbs-->
<!--=== End Breadcrumbs ===-->

@yield('content')

@include('Page.partials.Footer')

@include('Page.partials.js')



@include('Page.FrontEnd.Blog.partials.footer')