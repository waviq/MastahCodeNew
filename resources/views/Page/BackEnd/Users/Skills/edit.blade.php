@extends('Page.BackEnd.Profile')
@section('header')
    <h2>Form Information Skills</h2>
@endsection
@section('kontent')
    @include('flash::message')

    @if(count($valueSkill))
        <div class="col-md-9">

            {!! Form::model($valueSkill,['method'=>'PATCH', 'action'=>['SkillController@update',$valueSkill->id]]) !!}

            <!--NamaSkill form input-->
            <div class="form-group">
                {!! Form::label('namaSkill','Nama Skill:') !!}
                {!! Form::text('namaSkill',$skill,['class'=>'form-control','readOnly']) !!}
                {{--{!! Form::select('namaSkill[]', $sekil, null,['id'=>'namaSkill', 'class'=>'form-control','multiple']) !!}--}}
            </div>

            <!--Value form input-->
            <div class="form-group">
                {!! Form::label('value','Value:') !!}
                {!! Form::text('value',null,['class'=>'form-control']) !!}
            </div>

            <footer>
                <button type="submit" name="save_finish" class="btn-u btn-u-red">Edit & Save</button>
            </footer>

            {!! Form::close() !!}
            @else
                <h2>Tidak ada Informasi skill yang disimpan</h2>

                @include('Page.BackEnd.Partials.ErrorMessage')

        </div>
    @endif

@endsection