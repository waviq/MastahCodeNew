<!-- Left Sidebar -->
<div class="col-md-9 md-margin-bottom-40">
    @include('flash::message')
    @foreach($post as $posts)

        <div class="row blog blog-medium margin-bottom-40">
            {{--<div class="col-md-5">--}}
            {{--<img class="img-responsive" src="{{asset('assets/img/main/img22.jpg')}}" alt="">--}}
            {{--</div>--}}
            <div class="col-md-12">
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

    <!--Pagination-->
    <div class="text-center">
        <ul class="pagination">
            {!!$post->render()!!}
        </ul>
    </div>
    <!--End Pagination-->
</div>
<!-- End Left Sidebar -->


