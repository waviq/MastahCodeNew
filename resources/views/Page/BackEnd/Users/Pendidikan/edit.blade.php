@extends('Page.BackEnd.Profile')
@section('header')
    <h2>Form Information Skills</h2>
@endsection
@section('kontent')
    @include('flash::message')

    @if(count($pendidikan))
        <div class="col-md-9">

            {!! Form::model($pendidikan,['method'=>'PATCH', 'action'=>['EducationController@update',$pendidikan->id]]) !!}

            <div class="span6 pull-right" style="text-align:right">
                <!--Published form input-->
                <div class="form-group">
                    {!! Form::label('published','Published:') !!}
                    @if($pendidikan->published == 1)
                        {!! Form::checkbox('active',$pendidikan->published,isset($pendidikan->published)) !!}
                    @else
                        {!! Form::checkbox('active') !!}
                    @endif
                </div>
            </div>

            <!--NamaPendidikan form input-->
            <div class="form-group">
                {!! Form::label('namaPendidikan','Nama Pendidikan:') !!}
                {!! Form::text('namaPendidikan',$pendidikans,['class'=>'form-control','readOnly']) !!}
            </div>

            <div class="form-group input-group">
                <span class="input-group-addon"><i class="icon-prepend fa fa-map-marker"></i></span>
                {!! Form::text('namaSekolah_kota',null,['class'=>'form-control','placeholder'=>'Nama Sekolah/Pendidikan, Kota']) !!}
            </div>

            <!--Description form input-->
            <div class="form-group">
                {!! Form::label('description','Description:') !!}
                {!! Form::textarea('description',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group input-group">
                <span class="input-group-addon"><i class="icon-prepend fa  fa-calendar"></i></span>
                {!! Form::text('start',null,['class'=>'form-control','placeholder'=>'Tahun Mulai']) !!}
                <span class="input-group-addon"><i class="icon-prepend fa fa-minus-square-o"></i></span>
                {!! Form::text('finish',null,['class'=>'form-control','placeholder'=>'Tahun Selesai']) !!}
            </div>


            <footer>
                <button type="submit" name="save_finish" class="btn-u btn-u-red">Edit & Save</button>
            </footer>

            {!! Form::close() !!}
            @else
                <h2>Tidak ada Informasi Pendidikan yang disimpan</h2>

        </div>
    @endif
    <br>
    @include('Page.BackEnd.Partials.ErrorMessage')

@endsection