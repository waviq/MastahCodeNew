@extends('Page.FrontEnd.Blog.BlogTemplate')

@section('title') {{$post->judul}}
@endsection


    @include('flash::message')

@section('bredTtitle') Home @endsection
@section('bredLinkTitle') {{URL::action('HalamanUtamaController@index')}} @endsection
@section('bredTtitle2') Artikel @endsection
@section('bredTtitle0') Detail Artikel @endsection

@section('content')

    <!--=== Content Part ===-->
    <div class="container content">
        <div class="row blog-page blog-item">

            <!-- Left Sidebar -->
            <div class="col-md-9 md-margin-bottom-60">
                <!--Blog Post-->
                <div class="blog margin-bottom-40">
                    <h2>{!! $post->judul !!}</h2>

                    <div class="overflow-h margin-bottom-10">
                        <div class="pull-right">
                            <!-- Go to www.addthis.com/dashboard to customize your tools -->
                            <div class="addthis_sharing_toolbox"></div>
                        </div>
                    </div>

                    {{--<div class="blog-post-tags">
                        <ul class="list-unstyled list-inline blog-info">
                            <li><i class="fa fa-calendar"></i> February 02, 2013</li>
                            <li><i class="fa fa-pencil"></i> Diana Anderson</li>
                            <li><i class="fa fa-comments"></i> <a href="#">24 Comments</a></li>
                        </ul>
                        <ul class="list-unstyled list-inline blog-tags">
                            <li>
                                <i class="fa fa-tags"></i>
                                <a href="#">Technology</a>
                                <a href="#">Education</a>
                                <a href="#">Internet</a>
                                <a href="#">Media</a>
                            </li>
                        </ul>
                    </div>--}}

                    {{--<div class="blog-img">--}}
                        {{--<img class="img-responsive" src="{{asset('assets/img/sliders/11.jpg')}}" alt="">--}}
                    {{--</div>--}}

                    <p>{!! Markdown::parse($post->kontenFull) !!}</p>
                </div>
                {{--Penulis footer--}}
                <ul class="source-list">
                    <li><strong>Source:</strong> <a href="#">The Next Web</a></li>
                    <li><strong>Penulis:</strong> <a href="#">{{$post->user->name}}</a></li>
                </ul>

                <!-- Blog Grid Tagds -->
                <ul class="blog-grid-tags">
                    <li class="head">Tags</li>
                    @foreach($post->kategori as $kategori)
                        <li><a href="#">{{$kategori->namaKategori}}</a></li>
                    @endforeach

                </ul>
                <!-- End Blog Grid Tagds -->
                <!--End Blog Post-->

                {{--Related Post--}}
                <div class="margin-bottom-50">
                    <h2 class="title-v4">Related Posts</h2>
                    <div class="row margin-bottom-50">
                        <div class="col-sm-3 col-xs-6 sm-margin-bottom-30">
                            <!-- Blog Thumb v4 -->
                            <div class="blog-thumb-v4">
                                <div class="blog-thumb-item">
                                    <img class="img-responsive margin-bottom-10" src="{{asset('assets/img/sliders/11.jpg')}}" alt="">
                                    <div class="center-wrap">
                                        <div class="center-alignCenter">
                                            <div class="center-body">
                                                <a href="https://player.vimeo.com/video/74197060" class="fbox-modal fancybox.iframe video-play-btn" title="What will fashion be like in 25 years?">
                                                    <img class="video-play-btn" src="assets/img/icons/video-play.png" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div><!--/end center wrap-->
                                </div>
                                <h3><a href="blog_single.html">What will fashion be like in 25 years?</a></h3>
                            </div>
                            <!-- End Blog Thumb v4 -->
                        </div>

                        <div class="col-sm-3 col-xs-6 sm-margin-bottom-30">
                            <!-- Blog Thumb v4 -->
                            <div class="blog-thumb-v4">
                                <img class="img-responsive margin-bottom-10" src="assets/img/blog/img35.jpg" alt="">
                                <h3><a href="blog_single.html">Where will be your next destination</a></h3>
                            </div>
                            <!-- End Blog Thumb v4 -->
                        </div>

                        <div class="col-sm-3 col-xs-6">
                            <!-- Blog Thumb v4 -->
                            <div class="blog-thumb-v4">
                                <div class="blog-thumb-item">
                                    <img class="img-responsive margin-bottom-10" src="assets/img/blog/img43.jpg" alt="">
                                    <div class="center-wrap">
                                        <div class="center-alignCenter">
                                            <div class="center-body">
                                                <a href="https://player.vimeo.com/video/74197060" class="fbox-modal fancybox.iframe video-play-btn" title="Suffering from gastritis? Here's the solution ....">
                                                    <img class="video-play-btn" src="assets/img/icons/video-play.png" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div><!--/end center wrap-->
                                </div>
                                <h3><a href="blog_single.html">Suffering from gastritis? Here's the solution ....</a></h3>
                            </div>
                            <!-- End Blog Thumb v4 -->
                        </div>

                        <div class="col-sm-3 col-xs-6">
                            <!-- Blog Thumb v4 -->
                            <div class="blog-thumb-v4">
                                <img class="img-responsive margin-bottom-10" src="assets/img/blog/img41.jpg" alt="">
                                <h3><a href="blog_single.html">The places you must visit, before you die</a></h3>
                            </div>
                            <!-- End Blog Thumb v4 -->
                        </div>
                    </div><!--/end row-->
                </div>

                {{--End Related Post--}}

                <hr>

                <!-- Recent Comments -->
                <div class="media">
                    <h3>Comments</h3>
                    <a class="pull-left" href="#">
                        <img class="media-object" src="{{asset('assets/img/testimonials/img1.jpg')}}" alt="" />
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Media heading <span>5 hours ago / <a href="#">Reply</a></span></h4>
                        <p>Donec id elit non mi portas sats eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna..</p>

                        <hr>

                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="{{asset('assets/img/testimonials/img2.jpg')}}" alt="" />
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Media heading <span>17 hours ago / <a href="#">Reply</a></span></h4>
                                <p>Donec id elit non mi portas sats eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum anibhut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna..</p>
                            </div>
                        </div>

                        <hr>

                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="{{asset('assets/img/testimonials/img3.jpg')}}" alt="" />
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Media heading <span>2 days ago / <a href="#">Reply</a></span></h4>
                                <p>Donec id elit non mi portas sats eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum anibhut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna..</p>
                            </div>
                        </div>
                    </div>
                </div><!--/media-->

                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="{{asset('assets/img/testimonials/img4.jpg')}}" alt="" />
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Media heading <span>July 5,2013 / <a href="#">Reply</a></span></h4>
                        <p>Donec id elit non mi portas sats eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna..</p>
                    </div>
                </div><!--/media-->
                <!-- End Recent Comments -->

                <hr>

                <!-- Comment Form -->
                <div class="post-comment">
                    <h3>Leave a Comment</h3>
                    <form>
                        <label>Name</label>
                        <div class="row margin-bottom-20">
                            <div class="col-md-7 col-md-offset-0">
                                <input type="text" class="form-control">
                            </div>
                        </div>

                        <label>Email <span class="color-red">*</span></label>
                        <div class="row margin-bottom-20">
                            <div class="col-md-7 col-md-offset-0">
                                <input type="text" class="form-control">
                            </div>
                        </div>

                        <label>Message</label>
                        <div class="row margin-bottom-20">
                            <div class="col-md-11 col-md-offset-0">
                                <textarea class="form-control" rows="8"></textarea>
                            </div>
                        </div>

                        <p><button class="btn-u" type="submit">Send Message</button></p>
                    </form>
                </div>
                <!-- End Comment Form -->
            </div>
            <!-- End Left Sidebar -->




            {{--<!-- Left Sidebar -->
            <div class="col-md-9 md-margin-bottom-40">



                    <div class="row blog blog-medium margin-bottom-40">
                        <div class="col-md-5">
                            <img class="img-responsive" src="{{asset('assets/img/main/img22.jpg')}}" alt="">
                        </div>
                        <div class="col-md-7">
                            <h2><a href="#"></a></h2>
                            <ul class="list-unstyled list-inline blog-info">
                                <li><i class="fa fa-calendar"></i> {{$post->created_at}}</li>
                                <li><i class="fa fa-comments"></i> <a href="#">24 Comments</a></li>
                                @foreach($post->kategori as $kategori)
                                    <li><i class="fa fa-tags"></i> {{$kategori->namaKategori}}</li>
                                @endforeach
                            </ul>
                            <h2>{!! $post->judul !!}</h2>
                            <p>{!!$post->kontenFull!!}</p>

                        </div>
                    </div>
                    --}}{{--<!--End Blog Artikel-->--}}{{--



                <hr class="margin-bottom-40">


            </div>
            <!-- End Left Sidebar -->--}}

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
                        <dt><a href="#"><img src="{{asset('assets/img/sliders/elastislide/6.jpg')}}" alt="" /></a></dt>
                        <dd>
                            <p><a href="#">Responsive Bootstrap 3 Template placerat idelo alac eratamet.</a></p>
                        </dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt><a href="#"><img src="{{asset('assets/img/sliders/elastislide/10.jpg')}}" alt="" /></a></dt>
                        <dd>
                            <p><a href="#">100+ Amazing Features Layer Slider, Layer Slider, Icons, 60+ Pages etc.</a></p>
                        </dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt><a href="#"><img src="{{asset('assets/img/sliders/elastislide/11.jpg')}}" alt="" /></a></dt>
                        <dd>
                            <p><a href="#">Developer Friendly Code imperdiet condime ntumi mperdiet condim.</a></p>
                        </dd>
                    </dl>
                </div><!--/posts-->
                <!-- End Posts -->

                <!-- Blog Tags -->
                <div class="headline headline-md"><h2>Blog Tags</h2></div>
                <ul class="list-unstyled blog-tags margin-bottom-30">
                    <li><a href="#"><i class="fa fa-tags"></i> Business</a></li>
                    <li><a href="#"><i class="fa fa-tags"></i> Music</a></li>
                    <li><a href="#"><i class="fa fa-tags"></i> Internet</a></li>
                    <li><a href="#"><i class="fa fa-tags"></i> Money</a></li>
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
        </div><!--/row-->
    </div><!--/container-->
    <!--=== End Content Part ===-->

@endsection