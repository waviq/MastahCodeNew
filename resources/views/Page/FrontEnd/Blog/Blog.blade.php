@extends('Page.FrontEnd.Blog.BlogTemplate')

@section('title') Home
@endsection

@section('content')



    @include('flash::message')

    @section('bredTtitle') Home @endsection
    @section('bredLinkTitle') {{URL::action('HalamanUtamaController@index')}} @endsection
    @section('bredTtitle2') Artikel @endsection
    @section('bredTtitle0') Artikel @endsection

    <!--=== Content Part ===-->
    <div class="container content">

        <div class="row blog-page">
            <!-- Left Sidebar -->
            <div class="col-md-9 md-margin-bottom-40">

                @foreach($post as $posts)

                    <div class="row blog blog-medium margin-bottom-40">
                        <div class="col-md-5">
                            <img class="img-responsive" src="{{asset('assets/img/main/img22.jpg')}}" alt="">
                        </div>
                        <div class="col-md-7">
                            <h2><a href="#"></a></h2>
                            <ul class="list-unstyled list-inline blog-info">
                                <li><i class="fa fa-calendar"></i> {{$posts->created_at}}</li>
                                <li><i class="fa fa-comments"></i> <a href="#">24 Comments</a></li>

                                @foreach($posts->kategori as $kategori)
                                    <li><i class="fa fa-tags"></i> {{$kategori->namaKategori}}</li>
                                @endforeach

                            </ul>
                            <h2><a href="{{URL::action('blogController@show',$posts->slug)}}">{!! $posts->judul !!}</a>
                            </h2>

                            <p>{!!Markdown::parse(str_limit($posts->kontenFull, 300))!!}</p>

                            <p><a class="btn-u btn-u-sm" href="{{URL::action('blogController@show',$posts->slug)}}">Read
                                    More <i class="fa fa-angle-double-right margin-left-5"></i></a></p>
                        </div>
                    </div>
                    {{--<!--End Blog Artikel-->--}}
                @endforeach


                <hr class="margin-bottom-40">

                @yield('Pagination')
                <!--Pagination-->
                <div class="text-center">
                    <ul class="pagination">
                        {!!$post->render()!!}
                    </ul>
                </div>
                <!--End Pagination-->
            </div>
            <!-- End Left Sidebar -->

            @yield('rightBar')
            {{--------------------------------------Bar Kanan--------------------------------------------------------}}
            <!-- Right Sidebar -->
            <div class="col-md-3">
                <!-- Search Bar -->
                <div class="headline headline-md"><h2>Search</h2></div>
                <div class="input-group margin-bottom-40">
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="input-group-btn">
                        <button class="btn-u" type="button">Go</button>
                    </span>
                </div>
                <!-- End Search Bar -->

                <!-- Posts -->
                <div class="posts margin-bottom-40">
                    <div class="headline headline-md"><h2>Recent Posts</h2></div>
                    <dl class="dl-horizontal">
                        <dt><a href="#"><img src="{{asset('assets/img/sliders/elastislide/6.jpg')}}" alt=""/></a></dt>
                        <dd>
                            <p><a href="#">Responsive Bootstrap 3 Template placerat idelo alac eratamet.</a></p>
                        </dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt><a href="#"><img src="{{asset('assets/img/sliders/elastislide/10.jpg')}}" alt=""/></a></dt>
                        <dd>
                            <p><a href="#">100+ Amazing Features Layer Slider, Layer Slider, Icons, 60+ Pages etc.</a>
                            </p>
                        </dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt><a href="#"><img src="{{asset('assets/img/sliders/elastislide/11.jpg')}}" alt=""/></a></dt>
                        <dd>
                            <p><a href="#">Developer Friendly Code imperdiet condime ntumi mperdiet condim.</a></p>
                        </dd>
                    </dl>
                </div>
                <!--/posts-->
                <!-- End Posts -->

                <!-- Blog Tags -->
                <div class="headline headline-md"><h2>Blog Tags</h2></div>
                <ul class="list-unstyled blog-tags margin-bottom-30">

                    @foreach($kate as $kategoris)
                        <li><a href="#"><i class="fa fa-tags"></i> {{$kategoris->namaKategori}}</a></li>
                    @endforeach
                </ul>
                <!-- End Blog Tags -->

                {{--Blog n comment--}}
                <div class="margin-bottom-50">
                    <div class="headline headline-md"><h2>Blog &amp; Comments</h2></div>

                    <div class="blog-thumb-v3">
                        <small><a href="#">Evan Bartlett</a></small>
                        <h4>Cameron's silence on defence is shameful</h4>
                    </div>

                    <hr class="hr-xs">

                </div>

                {{--End Blog n comment--}}

            </div>
            <!-- End Right Sidebar -->
            {{-----------------------------------End Bar Kanan------------------------------------------}}

        </div>
        <!--/row-->
    </div><!--/container-->
    <!--=== End Content Part ===-->




@endsection