@extends('Page.BackEnd.Profile')
@section('header')
    <h2>Form Information Skills</h2>
@endsection
@section('kontent')
    @include('flash::message')
    <div class="col-md-9">

        {!! Form::open(['url'=>'user/skill','files'=>true]) !!}

        <!--Kategori form input-->
        <div class="form-group">
            {!! Form::label('skill','Skill List:') !!}
            {!! Form::select('namaSkill', $skill, null,['id'=>'namaSkill', 'class'=>'form-control']) !!}
        </div>

        <!--Value form input-->
        <div class="form-group {{$errors->has('value')?'has-error':''}}">
            {!! Form::label('value','Value:') !!}
            {!! Form::text('value',null,['class'=>'form-control','placeholder'=>'Besarnya kemampuan skill tersebut yang dikuasai [1-100%]']) !!}
            {!! $errors->first('value','<span class="help-block">:message</span>') !!}
        </div>
        <br>

        <footer>

            <button type="submit" name="save_next" class="btn-u btn-u-purple">Tambah Skill +</button>
            <button type="submit" name="save_finish" class="btn-u btn-u-red">Finish & Save</button>

            {!! Form::close() !!}
            @include('Page.BackEnd.Users.Skills.addSkill')
        </footer>
        <br>
        @include('Page.BackEnd.Partials.ErrorMessage')

    </div>
@endsection