
<!--=== Content Part ===-->
        <!-- Left Sidebar -->
        <div id="search-result" class="col-md-9 md-margin-bottom-40">
            <div class="col-md-12">
                @include('flash::message')

                @foreach($postSearch as $cariPost)
                    @if(count($cariPost))
                        <h2>
                            <a href="{{URL::action('blogController@show',$cariPost->slug)}}">{!! $cariPost->judul !!}</a>
                        </h2>
                        <p>{!!Markdown::parse(str_limit($cariPost->kontenFull, 300))!!}</p>
                        <p><a class="btn-u btn-u-sm" href="{{URL::action('blogController@show',$cariPost->slug)}}">Read
                                More <i class="fa fa-angle-double-right margin-left-5"></i></a></p>
                    @endif
                @endforeach
                    @if(count($postSearch)==0)
                    <div class="alert alert-info fade in">
                        <strong>Ooopss, maaf...</strong> Keyword yang mastah cari tidak ada dalam database kami
                    </div>
                        @endif



            </div>
            <hr class="margin-bottom-40">
            <!--Pagination-->
            <div class="text-center">
                <ul class="pagination">
                    {!!$postSearch->render()!!}
                </ul>
            </div>

        </div>
        <!-- End Left Sidebar -->

