@extends('Page.BackEnd.Profile')

@section('header')
    <h2>Request Tutorial</h2>
@endsection

@section('kontent')
    @if(count($rt))
        <div class="col-md-12">
            @include('flash::message')
            <table class="table table-striped table-bordered tex">
                <thead>
                <th>Title</th>
                <th>Nama</th>
                <th>Edit</th>
                <th>Delete</th>

                </thead>

                <tbody>
                @foreach($rt as $rts)
                    <tr>
                        <td>{{$rts->title}}</td>
                        <td>{{$rts->user->name}}</td>
                        <td>{!!HTML::linkAction('TutorialRequestController@edit','Edit',array($rts->id),['class' =>'btn btn-info'])!!}</td>
                        <td>
                            {!! Form::open(array('action'=>array('TutorialRequestController@destroy',$rts->id),'method'=>'delete')) !!}
                            {!! Form::submit('Delete', ['class' =>'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            @else
                <h3 align="center">Tidak ada Request Tutorial</h3>

        </div>
    @endif
@endsection