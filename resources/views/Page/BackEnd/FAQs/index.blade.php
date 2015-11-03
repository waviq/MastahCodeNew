@extends('Page.BackEnd.Profile')
@section('header')
    <h2>Form Information Skills</h2>
@endsection

@section('kontent')

    @if(count($faqs))
        <div class="col-md-12">
            @include('flash::message')
            <table class="table table-striped table-bordered tex">
                <thead>
                <th>Title</th>

                <th>Edit</th>
                <th>Delete</th>

                </thead>

                <tbody>
                @foreach($faqs as $faq)
                    <tr>
                        <td>{{$faq->title}}</td>
                        <td>{!!HTML::linkAction('FAQsController@edit','Edit',array($faq->id),['class' =>'btn btn-info'])!!}</td>
                        <td>
                            {!! Form::open(array('action'=>array('FAQsController@destroy',$faq->id),'method'=>'delete')) !!}
                            {!! Form::submit('Delete', ['class' =>'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            @else
                <h3 align="center">Tidak ada informasi pendidikan yang tersedia</h3>

        </div>
    @endif


@endsection