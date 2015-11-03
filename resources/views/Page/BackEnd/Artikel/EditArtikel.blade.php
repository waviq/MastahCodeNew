@extends('Page.BackEnd.Profile')
@section('kontent')

    @include('flash::message')
    <div class="col-md-12">

        <h1>Edit: {!! $post->judul !!}</h1>

        {!! Form::model($post,['method' => 'PATCH', 'action'=>['blogController@update', $post->id],'files'=>true]) !!}


        <!--Judul form input-->
        <div class="form-group">
            {!! Form::label('Judul','Judul:') !!}
            {!! Form::text('judul',null,['class'=>'form-control','readonly']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('kontenFull','Konten Lengkap:') !!}
            {!! Form::textarea('kontenFull',null,['class'=>'form-control']) !!}
        </div>

        <!--Kategori form input-->
        <div class="form-group">
            {!! Form::select('kategori_list[]', $kategori, $ListKategori,['id'=>'kategoriList', 'class'=>'form-control','multiple']) !!}
        </div>

        <!--Add Artikel Button Submit-->
        <div class="form-group">
            {!! Form::submit('Simpan', ['class' =>'btn btn-primary form-control']) !!}
        </div>

        {!! Form::close() !!}

        @include('Page.BackEnd.Partials.ErrorMessage')


    </div>


    {{--AngularJs--}}{{--
    <script src="{{asset('assets/js/AngularJs.js')}}"></script>
    <script src="{{asset('assets/js/Angular/custom.js')}}"></script>--}}


@endsection
