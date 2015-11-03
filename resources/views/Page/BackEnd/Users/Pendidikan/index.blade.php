@extends('Page.BackEnd.Profile')
@section('header')
    <h2>Form Information Skills</h2>
@endsection

@section('kontent')

    @if(count($pendidikan))
        <div class="col-md-12">
            @include('flash::message')
            <table class="table table-striped table-bordered tex">
                <thead>
                <th>Pendidikan</th>
                <th>Nama Pendidikan, Tempat</th>
                <th>Tahun Mulai</th>
                <th>Tahun Selesai</th>
                <th>Tampilkan</th>
                <th>Edit</th>
                <th>Delete</th>

                </thead>

                <tbody>
                @foreach($pendidikan as $pendidikans)
                    <tr>
                        <td>
                            @foreach($pendidikans->pendidikan as $pendidikanst)
                                {{$pendidikanst->namaPendidikan}}
                            @endforeach
                        </td>
                        <td>{{$pendidikans->namaSekolah_kota}}</td>
                        <td>{{$pendidikans->start}}</td>
                        <td>{{$pendidikans->finish}}</td>

                        @if($pendidikans->published == null)
                            <td>No</td>
                        @else
                            <td>Yes</td>
                        @endif

                        <td>{!!HTML::linkAction('EducationController@edit','Edit',array($pendidikans->id),['class' =>'btn btn-info'])!!}</td>
                        <td>
                            {!! Form::open(array('action'=>array('EducationController@destroy',$pendidikans->id),'method'=>'delete')) !!}
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