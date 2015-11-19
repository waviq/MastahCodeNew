@extends('Page.BackEnd.Profile')

@section('header')
    <h2>Welcome {{Auth::user()->name}} , Love to see you back</h2>
@endsection
@section('kontent')

    <div class="col-md-12">
        @include('flash::message')
        <table class="table table-striped table-bordered tex">
            <thead>
            {{--<th>Deskripsi</th>--}}
            <th>Post</th>
            <th>Informasi Job</th>
            <th>Social Contacts</th>
            <th>Skill</th>
            <th>Pendidikan</th>
            @if(Auth::user()->hasRole('admin'))
                <th>FAQs</th>
            @endif
            @if(Auth::user()->hasRole('admin'))
                <th>Request Tutorials</th>
            @endif
            </thead>

            <tbody>

            <tr>
                <td><a class="btn-u btn-u-brown" href="{{url(action('blogController@index'))}}">Edit</a></td>
                <td>{!!HTML::linkAction('JobUserController@getEditJob','Edit',array(Hashids::encode(Auth::id())),['class' =>'btn-u'])!!}</td>
                <td>{!!HTML::linkAction('SosialMediaController@edit','Edit',array(Hashids::encode(Auth::id())),['class' =>'btn btn-info'])!!}</td>
                <td><a class=" btn-u btn-u-green" href="{{url(action('SkillController@index'))}}">Edit</a></td>
                <td><a class=" btn-u btn-u-purple" href="{{url(action('EducationController@index'))}}">Edit</a></td>
                @if(Auth::user()->hasRole('admin'))
                    <td><a class="btn-u btn-u-brown" href="{{url(action('FAQsController@index'))}}">Edit</a></td>
                @endif

                @if(Auth::user()->hasRole('admin'))
                    <td><a class="btn-u btn-u-brown" href="{{url(action('TutorialRequestController@index'))}}">Edit</a>
                    </td>
                @endif
            </tr>


            </tbody>
        </table>
    </div>
@endsection