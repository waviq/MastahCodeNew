@extends('Page.BackEnd.Profile')

@section('header')
    <h2>Welcome {{Auth::user()->name}} , Love to see you back</h2>
@endsection
@section('kontent')

    <div class="col-md-8">
        @include('flash::message')
        <table class="table table-striped table-bordered tex">
            <thead>
            {{--<th>Deskripsi</th>--}}
            <th>Informasi Job</th>
            <th>Social Contacts</th>
            <th>Skill</th>
            <th>Liat</th>
            <th>Edit</th>
            <th>Hapus</th>
            </thead>

            <tbody>

                <tr>
                    {{--{{dd($jobs)}}--}}
                    <td>{!!HTML::linkAction('JobUserController@getEditJob','Edit',array(Hashids::encode(Auth::id())),['class' =>'btn btn-info'])!!}</td>
                    <td>{!!HTML::linkAction('SosialMediaController@edit','Edit',array(Hashids::encode(Auth::id())),['class' =>'btn btn-info'])!!}</td>
                    <td><a class=" btn-u btn-u-green" href="{{url(action('SkillController@index'))}}">Edit</a> </td>
                </tr>


            </tbody>
        </table>
    </div>
@endsection