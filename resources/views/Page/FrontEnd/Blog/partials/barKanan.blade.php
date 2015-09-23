{{--------------------------------------Bar Kanan--------------------------------------------------------}}
<!-- Right Sidebar -->
<div class="col-md-3">


    <!-- Search Bar -->
    <div class="headline headline-md"><h2>Search</h2></div>

    {!! Form::open(array('url'=>'artikel/search','method'=>'get')) !!}
    <div class="input-group margin-bottom-40">
        <!--Keyword form input-->
        {!! Form::text('keyword',null,['class'=>'form-control','placeholder'=>'Search']) !!}

        <span class="input-group-btn">
                        <!--go Button Submit-->
            {!! Form::submit('Go', ['class' =>'btn-u']) !!}
                    </span>
    </div>
    {!! Form::close() !!}
    <!-- End Search Bar -->

    <!-- Posts -->
    <div class="posts margin-bottom-40">
        <div class="headline headline-md"><h2>Recent Posts</h2></div>
        @foreach($recentPost as $recentPosts)
            <dl class="dl-horizontal">
                <dt><a href="{{URL::action('blogController@show',$recentPosts->slug)}}"><img
                                src="{{asset('img/artikel/'.$recentPosts->image)}}"
                                alt="{{$recentPosts->judul}}"/></a>
                </dt>
                <dd>
                    <p>
                        <a href="{{URL::action('blogController@show',$recentPosts->slug)}}">{{$recentPosts->judul}}</a>
                    </p>
                </dd>
            </dl>
        @endforeach
    </div>
    <!--/posts-->
    <!-- End Posts -->

    <!-- Blog Tags -->
    <div class="headline headline-md"><h2>Blog Tags</h2></div>
    <ul class="list-inline tags-v2 margin-bottom-50">

        @foreach($kate as $kategoris)
            <li>
                <a href="{{url(action('KategoriController@showFront', $kategoris->namaKategori))}}">{{$kategoris->namaKategori}}</a>
            </li>
        @endforeach
    </ul>
    <!-- End Blog Tags -->

    {{--Blog n comment--}}
    <div class="margin-bottom-50">
        <div class="headline headline-md"><h2>Blog &amp; Comments</h2></div>

        <div class="blog-thumb-v3">
            <div id="testimonials-7"
                 class="carousel slide testimonials testimonials-v1 testimonials-bg-dark-green">
                <div class="carousel-arrow">
                    <a class="left carousel-control" href="#testimonials-7" data-slide="prev">
                        <i class="fa fa-angle-left rounded-x"></i>
                    </a>
                    <a class="right carousel-control" href="#testimonials-7" data-slide="next">
                        <i class="fa fa-angle-right rounded-x"></i>
                    </a>
                </div>
                <div class="carousel-inner">
                    <div class="item active">
                        <p>Welcome to mastahcode...</p>

                        <div class="testimonial-info">
                            <img class="rounded-x"
                                 src="{{asset('/img/users/'.$posted->user->imageUser->image)}}"
                                 alt="">
                                        <span class="testimonial-author">
                                            Waviq
                                            <em>Web Developer</em>
                                        </span>
                        </div>
                    </div>

                    @foreach($comment as $commented)
                        <div class="item">
                            <p>{{$commented->body}}</p>

                            <div class="testimonial-info">
                                <img class="rounded-x"
                                     src="{{asset($commented->gravatar_url)}}"
                                     alt="">
                                        <span class="testimonial-author">
                                            {{str_replace('_',' ', $commented->slug)}}
                                            <em>by {{$commented->author_name}}</em>
                                        </span>
                            </div>
                        </div>
                    @endforeach


                </div>

            </div>{{--ada yang punya testimoni-7--}}


        </div>{{--<div class="blog-thumb-v3">--}}
        <hr class="hr-xs">

        {{--End Blog n comment--}}

        {{--End Blog n comment--}}

    </div>
    <!-- End Right Sidebar -->
    {{-----------------------------------End Bar Kanan------------------------------------------}}

</div>