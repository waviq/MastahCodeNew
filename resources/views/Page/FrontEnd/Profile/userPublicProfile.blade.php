@extends('Page.FrontEnd.Blog.BlogTemplate')

@section('title') Home
@endsection

@section('bredTtitle') Home @endsection
@section('bredLinkTitle') {{URL::action('HalamanUtamaController@index')}} @endsection
@section('bredTtitle2') Artikel @endsection
@section('bredTtitle0') Artikel @endsection

@section('content')

    <!--=== Profile ===-->
    <div class="container content profile">
        <div class="row">

            <!--Left Sidebar-->
            <div class="col-md-3 md-margin-bottom-40">
                <img class="img-responsive profile-img margin-bottom-20"
                @if(count($cariUser->imageUser()->first()))
                     src="{{asset('/img/users/'.$cariUser->imageUser()->first()->image)}}" alt="{{$cariUser->name}}">
                @else
                    src="{{asset('/img/users/default.png')}}">
                @endif


                <ul class="list-group sidebar-nav-v1 margin-bottom-40" id="sidebar-nav-1">
                    <li class="list-group-item">
                        <a href="{{url(action('ProfileController@indexFront', $cariUser->username))}}"><i class="fa fa-user"></i> About me</a>
                    </li>
                    <li class="list-group-item">
                        <a href="page_profile_me.html"><i class="fa fa-user"></i> Profile</a>
                    </li>
                    <li class="list-group-item">
                        <a href="page_profile_users.html"><i class="fa fa-group"></i> Users</a>
                    </li>
                    <li class="list-group-item">
                        <a href="page_profile_projects.html"><i class="fa fa-cubes"></i> My Projects</a>
                    </li>
                    <li class="list-group-item">
                        <a href="page_profile_comments.html"><i class="fa fa-comments"></i> Comments</a>
                    </li>
                    <li class="list-group-item">
                        <a href="page_profile_history.html"><i class="fa fa-history"></i> History</a>
                    </li>
                    <li class="list-group-item">
                        <a href="page_profile_settings.html"><i class="fa fa-cog"></i> Settings</a>
                    </li>
                </ul>

                <hr>


                <div class="margin-bottom-50"></div>

                <!--Datepicker-->
                <form action="#" id="sky-form2" class="sky-form">
                    <div id="inline-start"></div>
                </form>
                <!--End Datepicker-->
            </div>
            <!--End Left Sidebar-->
            <!-- Profile Content -->
            <div class="col-md-9">
                <div class="profile-body">
                    <div class="profile-bio">
                        <div class="row">
                            <div class="col-md-5">
                                @if(count($cariUser->imageUser()->first()))
                                    <img class="img-responsive md-margin-bottom-10"
                                         src="{{asset('/img/users/'.$cariUser->imageUser()->first()->image)}}"
                                         alt="{{$cariUser->name}}">
                                @else
                                    <img class="img-responsive md-margin-bottom-10"
                                         src="{{asset('/img/users/default.png')}}" alt="">
                                @endif

                            </div>
                            <div class="col-md-7">
                                <h2>{{$cariUser->name}}</h2>
                                @if(count($cariUser->jobs()->first()))
                                    <span><strong>Job:</strong> {{$cariUser->jobs()->first()->Job}}</span>
                                    <span><strong>Position:</strong> {{$cariUser->jobs()->first()->position}}</span>
                                    <hr>
                                    <p>{{$cariUser->jobs()->first()->description}}</p>

                                @else
                                    <span><strong>Job:</strong> N/A</span>
                                    <span><strong>Position:</strong> N/A</span>
                                    <hr>
                                    <p>N/A</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!--/end row-->

                    <hr>

                    <div class="row">
                        <!--Social Icons v3-->
                        <div class="col-sm-6 sm-margin-bottom-30">
                            <div class="panel panel-profile">
                                <div class="panel-heading overflow-h">
                                    <h2 class="panel-title heading-sm pull-left"><i class="fa fa-pencil"></i> Social
                                        Contacts</h2>
                                </div>
                                <div class="panel-body">
                                    <ul class="list-unstyled social-contacts-v2">
                                        @if(count($cariUser->sosmeds()->first()))
                                            <li><i class="rounded-x gm fa fa-envelope"></i> <a
                                                        href="{{$cariUser->sosmeds()->first()->email}}">{{$cariUser->sosmeds()->first()->email}}</a>
                                            </li>
                                            <li><i class="rounded-x fb fa fa-facebook"></i> <a
                                                        href="{{$cariUser->sosmeds()->first()->facebook}}">{{$cariUser->sosmeds()->first()->facebook}}</a>
                                            </li>
                                            <li><i class="rounded-x tw fa fa-twitter"></i> <a
                                                        href="#">{{$cariUser->sosmeds()->first()->twitter}}</a></li>
                                            <li><i class="rounded-x gp fa  fa-linkedin-square"></i> <a
                                                        href="#">{{$cariUser->sosmeds()->first()->linkedin}}</a></li>
                                            <li><i class="rounded-x sk fa fa-skype"></i> <a
                                                        href="#">{{$cariUser->sosmeds()->first()->skype}}</a></li>

                                        @else
                                            <li><i class="rounded-x gm fa fa-envelope"></i> <a
                                                        href="">N/A</a>
                                            </li>
                                            <li><i class="rounded-x fb fa fa-facebook"></i> <a
                                                        href="">N/A</a>
                                            </li>
                                            <li><i class="rounded-x tw fa fa-twitter"></i> <a
                                                        href="#">N/A</a></li>
                                            <li><i class="rounded-x gp fa  fa-linkedin-square"></i> <a
                                                        href="#">N/A</a></li>
                                            <li><i class="rounded-x sk fa fa-skype"></i> <a
                                                        href="#">N/A</a></li>
                                        @endif

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--End Social Icons v3-->

                        <!--Skills-->
                        <div class="col-sm-6 sm-margin-bottom-30">
                            <div class="panel panel-profile">
                                <div class="panel-heading overflow-h">
                                    <h2 class="panel-title heading-sm pull-left"><i class="fa fa-lightbulb-o"></i>
                                        Skills</h2>
                                </div>
                                <div class="panel-body">
                                    @if(count($valueSkill->first()))
                                        @foreach($valueSkill as $valueSkills)
                                            <small>
                                                @foreach($valueSkills->skill as $skills)
                                                    {{$skills->namaSkill}}
                                                @endforeach
                                            </small>
                                            <small>{{$valueSkills->value}}</small>
                                            <div class="progress progress-u progress-xxs">
                                                <div style="width:{{$valueSkills->value}}%" aria-valuemax="100"
                                                     aria-valuemin="0" aria-valuenow="{{$valueSkills->value}}"
                                                     role="progressbar" class="progress-bar progress-bar-u">
                                                </div>
                                            </div>
                                        @endforeach

                                    @else

                                    @endif


                                </div>
                            </div>
                        </div>
                        <!--End Skills-->
                    </div>
                    <!--/end row-->

                    <hr>
                    <!--Timeline-->
                    <div class="panel panel-profile">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-pencil-square-o"></i> Posting</h2>
                        </div>
                        <div class="panel-body margin-bottom-40">
                            @if(count($cariUser->posts()->first()))
                                <ul class="timeline-v2 timeline-me">
                                    @foreach($cariUser->posts()->get()->take(3) as $posts)
                                        <li>
                                            <time datetime="" class="cbp_tmtime">
                                                <span>
                                                    @foreach($posts->kategori as $kategoris)
                                                        {{$kategoris->namaKategori}}
                                                    @endforeach
                                                </span>
                                                <span>{{$posts->created_at}}</span>
                                            </time>
                                            <i class="cbp_tmicon rounded-x hidden-xs"></i>

                                            <div class="cbp_tmlabel">
                                                <h2>
                                                    <a href="{{URL::action('blogController@show',$posts->slug)}}">{{$posts->judul}}</a>
                                                </h2>

                                                <p>{!!Markdown::parse(str_limit($posts->kontenFull, 150))!!}</p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                @else
                                <div class="alert alert-info fade in">
                                    <strong>Ooopss!</strong> Tidak ada artikel yang di publish
                                </div>
                            @endif
                            @if(count($cariUser->posts)>3)
                                <a class="btn-u"
                                      href="{{URL::action('blogController@getByArtikel',$posts->user->username)}}">See More</a>
                                @endif



                        </div>
                    </div>
                    <!--End Timeline-->


                    <!--Timeline-->
                    <div class="panel panel-profile">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-mortar-board"></i> Education
                            </h2>
                        </div>
                        <div class="panel-body">
                            <ul class="timeline-v2 timeline-me">
                                <li>
                                    <time datetime="" class="cbp_tmtime"><span>Bachelor of IT</span>
                                        <span>2003 - 2000</span></time>
                                    <i class="cbp_tmicon rounded-x hidden-xs"></i>

                                    <div class="cbp_tmlabel">
                                        <h2>Harvard University</h2>

                                        <p>Winter purslane courgette pumpkin quandong komatsuna fennel green bean
                                            cucumber watercress. Peasprouts wattle seed rutabaga okra yarrow cress
                                            avocado grape.</p>
                                    </div>
                                </li>
                                <li>
                                    <time datetime="" class="cbp_tmtime"><span>Web Design</span>
                                        <span>1997 - 2000</span></time>
                                    <i class="cbp_tmicon rounded-x hidden-xs"></i>

                                    <div class="cbp_tmlabel">
                                        <h2>Imperial College London</h2>

                                        <p>Caulie dandelion maize lentil collard greens radish arugula sweet pepper
                                            water spinach kombu courgette lettuce.</p>
                                    </div>
                                </li>
                                <li>
                                    <time datetime="" class="cbp_tmtime"><span>High School</span>
                                        <span>1988 - 1997</span></time>
                                    <i class="cbp_tmicon rounded-x hidden-xs"></i>

                                    <div class="cbp_tmlabel">
                                        <h2>Chicago High School</h2>

                                        <p>Caulie dandelion maize lentil collard greens radish arugula sweet pepper
                                            water spinach kombu courgette lettuce. Celery coriander bitterleaf epazote
                                            radicchio shallot.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--End Timeline-->

                    <hr>

                    <div class="row">
                        <!--Social Contacts v2-->
                        <div class="col-sm-6">
                            <div class="panel panel-profile">
                                <div class="panel-heading overflow-h">
                                    <h2 class="panel-title heading-sm pull-left"><i class="fa fa-lightbulb-o"></i>
                                        Social Contacts</h2>
                                </div>
                                <div class="panel-body">
                                    <ul class="list-unstyled social-contacts-v3">
                                        <li><i class="rounded-x tw fa fa-twitter"></i> <a href="#">edward.rooster</a>
                                        </li>
                                        <li><i class="rounded-x fb fa fa-facebook"></i> <a href="#">Edward Rooster</a>
                                        </li>
                                        <li><i class="rounded-x sk fa fa-skype"></i> <a href="#">edwardRooster77</a>
                                        </li>
                                        <li><i class="rounded-x gp fa fa-google-plus"></i> <a
                                                    href="#">rooster77edward</a></li>
                                        <li><i class="rounded-x gm icon-envelope"></i> <a href="#">edward77@gmail
                                                .com</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--End Social Contacts v2-->

                        <!--Design Skills-->
                        <div class="col-sm-6">
                            <div class="panel panel-profile">
                                <div class="panel-heading overflow-h">
                                    <h2 class="panel-title heading-sm pull-left"><i class="fa fa-pencil"></i> Language
                                        Skills</h2>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="p-chart col-sm-6 col-xs-6 sm-margin-bottom-10">
                                            <div class="circle margin-bottom-20" id="circle-4"></div>
                                            <h3 class="heading-xs">Engagement Score</h3>

                                            <p>Celery coriander bitterleaf epazote radicchio shallot.</p>
                                        </div>
                                        <div class="p-chart col-sm-6 col-xs-6">
                                            <div class="circle margin-bottom-20" id="circle-5"></div>
                                            <h3 class="heading-xs">Progfile Completness</h3>

                                            <p>Celery coriander bitterleaf epazote radicchio shallot.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Design Skills-->
                    </div>
                    <!--/end row-->
                </div>
            </div>
            <!-- End Profile Content -->
        </div>
    </div>
    <!--=== End Profile ===-->

@endsection