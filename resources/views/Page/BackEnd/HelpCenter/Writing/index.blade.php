@extends('Page.BackEnd.Profile')
@section('header')
    <h2>Form Information Skills</h2>
@endsection

@section('kontent')

    @if(count($writing))
        <div class="col-md-12">
            @include('flash::message')
            <table class="table table-striped table-bordered tex">
                <thead>
                <th>Title</th>

                <th>Edit</th>
                <th>Delete</th>

                </thead>

                <tbody>
                @foreach($writing as $writings)
                    <tr>
                        <td>{{$writings->title}}</td>
                        <td>{!!HTML::linkAction('WritingController@edit','Edit',array($writings->id),['class' =>'btn btn-info'])!!}</td>
                        <td>
                            {!! Form::open(array('action'=>array('WritingController@destroy',$writings->id),'method'=>'delete')) !!}
                            {!! Form::submit('Delete', ['class' =>'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            @else
                <h3 align="center">Tidak ada informasi yang tersedia</h3>

        </div>
    @endif


@endsection