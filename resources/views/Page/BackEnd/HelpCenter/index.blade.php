@extends('Page.BackEnd.Profile')

@section('kontent')

    <div class="col-md-12">
        @include('flash::message')
        <table class="table table-striped table-bordered tex">
            <thead>
            {{--<th>Deskripsi</th>--}}
            <th>FAQs</th>
            <th>Writing</th>
            <th>Reading</th>
            <th>Profile and Setting</th>


            <tbody>

            <tr>
                <td><a class="btn-u btn-u-brown" href="{{url(action('FAQsController@index'))}}">Edit</a></td>
                <td><a class="btn-u btn-u-brown" href="{{url(action('WritingController@index'))}}">Edit</a></td>
            </tr>


            </tbody>
        </table>
    </div>
@endsection