@extends('Page.FrontEnd.Blog.BlogTemplate')

@section('title') Home
@endsection

@section('bredTtitle') Home @endsection
@section('bredLinkTitle') {{URL::action('HalamanUtamaController@index')}} @endsection
@section('bredTtitle2') Artikel @endsection
@section('bredTtitle0') Artikel @endsection

@section('content')

    <!--=== Content Part ===-->
    <div class="blog_masonry_3col">
        <div class="container content grid-boxes">
            @include('flash::message')
            @foreach($post as $posts)

                <div class="grid-boxes-in linkMension">
                    @if(!empty($posts->image))
                        <img class="img-responsive" src="/img/artikel/{{$posts->image}}"
                             alt="">
                    @else
                        <img class="img-responsive" src="{{asset('/img/artikel/mastah code tutorial.png')}}"
                             alt="">
                    @endif

                    <div class="grid-boxes-caption">
                        <h3><a href="{{url(action('blogController@show',$posts->slug))}}">{{$posts->judul}}</a></h3>
                    </div>

                </div>

            @endforeach
            {{--<div class="grid-boxes-in linkMension">
                @foreach($post as $posts)
                    <h1>{{$posts->judul}}</h1>
                    <h3>{!!Markdown::parse(str_limit($posts->kontenFull, 300))!!}</h3>
                @endforeach
            </div>--}}

        </div>
        <!--/container-->
    </div>

    <hr class="margin-bottom-40">


    <!--Pagination-->
    <div class="text-center">
        <ul class="pagination">
            {!!$post->render()!!}
        </ul>
    </div>
    <!--=== End Content Part ===-->



@endsection