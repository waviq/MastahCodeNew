@extends('Page.BackEnd.Profile')

@section('kontent')

    @include('flash::message')

    @if($user->count())
        <h1>Artikel</h1>
        <div class="col-md-12">
            <table class="table table-striped table-bordered tex">
                <thead>
                {{--<th>Deskripsi</th>--}}
                <th>Nama</th>
                <th>Role</th>
                <th>Seen</th>
                <th>Liat</th>
                <th>Edit</th>
                <th>Hapus</th>
                </thead>

                <tbody>
                @foreach($user as $users)
                    <tr>
                        <td>{{$users->name}}</td>
                        {{--<td>{!! substr($artikels->kontenFull, 0, 50). '[...]'!!}</td>--}}
                        <td>{{$users->role->title}}</td>
                        <td>{{$users->seen}}</td>
                        <td>{!!HTML::linkAction('UserController@show','View',array($users->id),['class' =>'btn btn-success'])!!}</td>
                        <td>{!!HTML::linkAction('UserController@edit','Edit',array($users->id),['class' =>'btn btn-info'])!!}</td>
                        {{--<td>{!!HTML::linkAction('blogController@edit','Edit', [$artikels->id],['class'=>'btn btn-warning'])!!}</td>--}}
                        <td>
                            {!! Form::open(array('action'=>array('UserController@destroy', $users->id), 'method'=>'delete')) !!}
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
        <div class="alert alert-info col-md-12">Tidak ada User</div>
    @endif
@endsection