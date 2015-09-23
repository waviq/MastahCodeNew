@extends('Page.BackEnd.Profile')

@section('kontent')

    @include('flash::message')

    @if($kategori->count())
        <h1>Kategori</h1>
        <div class="col-md-12">
            <table class="table table-striped table-bordered tex">
                <thead>
                {{--<th>Deskripsi</th>--}}
                <th>Nama Kategori</th>
                <th>Avaible Image</th>
                <th>Liat</th>
                <th>Edit</th>
                <th>Hapus</th>
                </thead>

                <tbody>
                @foreach($kategori as $kategorise)
                    <tr>
                        <td>{{$kategorise->namaKategori}}</td>
                        @if(empty($kategorise->image))
                            <td>No</td>
                        @else
                            <td>Yes</td>
                        @endif
                        <td>{!!HTML::linkAction('KategoriController@show','View',array($kategorise->id),['class' =>'btn btn-success'])!!}</td>
                        <td>{!!HTML::linkAction('KategoriController@edit','Edit',array($kategorise->id),['class' =>'btn btn-info'])!!}</td>
                        <td>
                            {!! Form::open(array('action'=>array('KategoriController@destroy', $kategorise->id), 'method'=>'delete')) !!}
                                    {!! Form::submit('delete', ['class' =>'btn btn-danger']) !!}
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