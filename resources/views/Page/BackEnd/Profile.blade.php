<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Halaman Profile</title>

    @include('Page.partials.cssProfile')

</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">{{Auth::user()->name}}</a>
        </div>
        <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : {{auth()->user()->lastLogin}} &nbsp; <a href="{{url('/auth/logout')}}"
                                                                         class="btn btn-danger square-btn-adjust">Logout</a>
        </div>
    </nav>
    <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li class="text-center">
                    @if(($user = Auth::user()) and Auth::user()->imageUser()->count())
                        <img src="{{asset('/img/'.$user->imageUser->image)}}" class="user-image img-responsive"/>
                    @else
                        <img src="{{asset('img/default.png')}}" class="user-image img-responsive"/>
                    @endif
                </li>


                <li>
                    <a href="{{url('profile')}}"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                </li>

                <li>
                    <a href="#"><i class="fa  fa-paper-plane fa-3x"></i> Artikel<span class="fa arrow"></span> </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{url(action('blogController@index'))}}"><i class="fa fa-file-text-o  fa-3x"></i>Lihat
                                Artikel </a>
                        </li>

                        @if(Auth::user()->hasRole('admin'))
                            <li>
                                <a href="{{url(action('blogController@SeeAllArtikel'))}}"><i
                                            class="fa fa-file-text-o  fa-3x"></i>Lihat Semua Artikel </a>
                            </li>
                        @endif

                        <li>
                            <a href="{{url(action('blogController@create'))}}"><i class="fa fa-edit fa-3x "></i> Tulis
                                Artikel </a>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="#"><i class="fa fa-users fa-3x"></i> Users<span class="fa arrow"></span> </a>
                    <ul class="nav nav-second-level">
                        <li>
                            @if(Auth::user()->hasRole('admin'))
                                <a href="{{url('/user')}}"><i class="fa fa-qq fa-2x"></i> Liat Semua User </a>
                            @endif
                        </li>

                        @if(Auth::user()->hasRole('admin'))
                            <li>
                                <a href="{{url('/user/create')}}"><i class="fa  fa-user fa-2x"></i> Create User </a>
                            </li>
                        @endif

                        <li>
                            <a href="{{URL::action('UserController@gantiPassword')}}"><i
                                        class="fa   fa-unlock-alt  fa-2x"></i> Ganti Password </a>
                        </li>
                        <li>
                            <a href="{{URL::action('UserController@tambahFoto')}}"><i
                                        class="fa   fa-file-image-o  fa-2x"></i> Add|Edit Foto </a>
                        </li>
                        <li>
                            <a href="{{URL::action('JobUserController@create')}}"><i class="fa   fa-gavel   fa-2x"></i>
                                Add Job </a>
                        </li>
                        <li>
                            <a href="{{URL::action('SosialMediaController@create')}}"><i
                                        class="fa   fa-reddit   fa-2x"></i> Add Sosial Contacts </a>
                        </li>
                        <li>
                            <a href="{{URL::action('SkillController@create')}}"><i
                                        class="fa    fa-terminal    fa-2x"></i> Add Skill Information </a>
                        </li>
                        <li>
                            <a href="{{URL::action('EducationController@create')}}"><i
                                        class="fa  fa-graduation-cap fa-2x"></i>Informasi Pendidikan </a>
                        </li>
                    </ul>
                </li>

                @if(Auth::user()->hasRole('admin'))
                    <li>
                        <a href="#"><i class="fa fa-users fa-3x"></i> Kategori<span class="fa arrow"></span> </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{url(action('KategoriController@index'))}}"><i class="fa fa-qq fa-2x"></i>Kategori
                                </a>
                            </li>
                            <li>
                                <a href="{{url(action('KategoriController@create'))}}"><i class="fa fa-qq fa-2x"></i>
                                    create kategori </a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if(Auth::user()->hasRole('admin'))
                    <li>
                        <a href="#"><i class="fa  fa-comment-o  fa-3x "></i> FAQs </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{url(action('FAQsController@create'))}}"><i class="fa fa-qq fa-2x"></i>Create
                                </a>
                            </li>
                            <li>
                                <a href="{{url(action('FAQsController@edit'))}}"><i class="fa fa-qq fa-2x"></i> Edit
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif


            </ul>

        </div>

    </nav>
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    @yield('header')
                    {{--<h2>Welcome {{Auth::user()->name}} , Love to see you back</h2>--}}
                </div>
            </div>
            <!-- /. ROW  -->
            <hr/>

            {{--Content--}}
            @yield('kontent')


        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->


@include('Page.partials.jsProfile')


</body>
</html>
