@extends('Page.BackEnd.Profile')
@section('header')
    <h1>You can view, edit, delete Your own article</h1>
@endsection
@section('kontent')
    @include('flash::message')
    @if($artikel->count())
        <div class="col-md-12">
            <h1>Artikel</h1>
            <table class="table table-striped table-bordered tex">
                <thead>
                <th>Judul</th>
                <th>Published</th>
                <th>Penulis</th>
                <th>Preview</th>
                <th>Edit</th>
                <th>Hapus</th>
                </thead>

                <tbody>
                @foreach($artikel as $artikels)
                    <tr>
                        <td>{{$artikels->judul}}</td>
                        <td>{{$artikels->published_at}}</td>
                        <td>{{$artikels->user->name}}</td>
                        <td>{!!HTML::linkAction('blogController@show','View',array($artikels->slug),['class' =>'btn btn-info'])!!}</td>
                        <td>{!!HTML::linkAction('blogController@edit','Edit', [$artikels->id],['class'=>'btn btn-warning'])!!}</td>
                        <td>
                            {!! Form::open(array('action'=>array('blogController@destroy', $artikels->id), 'method'=>'delete')) !!}
                            <!-- Button Submit-->
                            {!! Form::submit('Delete', ['class' =>'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    @else
        <div class="alert alert-info col-md-12">Tidak ada posting artikel yang tersimpan</div>
    @endif
@endsection