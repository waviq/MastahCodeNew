<!-- Left Sidebar -->
<div class="col-md-9 md-margin-bottom-60">
    <!--Blog Post-->
    <div class="blog margin-bottom-40">
        @include('flash::message')

        <h2>{!! $post->judul !!}</h2>

        <div class="overflow-h margin-bottom-10">
            <div class="pull-right">
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_sharing_toolbox"></div>
            </div>
        </div>


        <p>{!! $post->kontenFull !!}</p>
    </div>
    <div class="row">
        <div class="margin-bottom-40">
            <div id="testimonials-1" class="carousel slide testimonials testimonials-v1">
                <div class="carousel-inner">
                    <div class="item active">
                        <a href="{{url(action('ProfileController@indexFront',$post->user->username))}}">
                            <div class="testimonial-info">
                                @if(count($post->user->imageUser))
                                    <img class="rounded-x"
                                         src="{{asset('/img/users/'.$post->user->imageUser->image)}}"
                                         alt="">
                                @else
                                    <img class="rounded-x" src="{{asset('/img/users/default.png')}}" alt="">
                                @endif

                                <span class="testimonial-author">
                                        {{$post->user->name}}
                                    @if(count($post->user->jobs))
                                        <em>{{$post->user->jobs->Job}}, {{$post->user->jobs->position}}</em>
                                    @else
                                        Information job: N/A
                                    @endif

                                    </span>
                            </div>
                        </a>

                    </div>
                </div>

            </div>
        </div>
    </div>


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
            @foreach($recentPost as $recentPos)
                <div class="col-sm-3 col-xs-6 sm-margin-bottom-30">
                    <!-- Blog Thumb v4 -->
                    <div class="blog-thumb-v4">
                        <div class="blog-thumb-item">
                            <img class="img-responsive margin-bottom-10"
                                 src="{{asset('img/artikel/'.$recentPos->image)}}"
                                 alt="{{$recentPos->judul}}">
                            <!--/end center wrap-->
                        </div>
                        <h3>
                            <a href="{{URL::action('blogController@show',$recentPos->slug)}}">{{$recentPos->judul}}</a>
                        </h3>
                    </div>
                    <!-- End Blog Thumb v4 -->
                </div>
            @endforeach


        </div>
        <!--/end row-->
    </div>

    {{--End Related Post--}}

    <hr>


    {{--Comment Start--}}
    <div id="disqus_thread"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES * * */
        var disqus_shortname = 'mastahcode';

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function () {
            var dsq = document.createElement('script');
            dsq.type = 'text/javascript';
            dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript"
                                                      rel="nofollow">comments powered by Disqus.</a>
    </noscript>
    {{--Comment End--}}


    <hr>

</div>
<!-- End Left Sidebar -->



