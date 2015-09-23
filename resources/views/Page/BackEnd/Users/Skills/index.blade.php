@extends('Page.BackEnd.Profile')
@section('header')
    <h2>Form Information Skills</h2>
@endsection

@section('kontent')

    @if(count($valueSkill))
        <div class="col-md-5">
            @include('flash::message')
            <table class="table table-striped table-bordered tex">
                <thead>
                <th>Skill ke</th>
                <th>Nama Skill</th>
                <th>Value</th>
                <th>Action</th>

                </thead>

                <tbody>
                @foreach($valueSkill as $key =>$valueSkills)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>
                            @foreach($valueSkills->skill as $skills)
                                {{$skills->namaSkill}}
                            @endforeach
                        </td>
                        <td>{{$valueSkills->value}}</td>
                        <td>{!!HTML::linkAction('SkillController@edit','Edit',array($valueSkills->id),['class' =>'btn btn-info'])!!}</td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            @else
                <h3 align="center">Tidak ada informasi skill yang tersedia</h3>

        </div>
    @endif


@endsection