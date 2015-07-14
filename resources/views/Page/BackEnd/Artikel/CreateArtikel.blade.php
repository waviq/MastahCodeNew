@extends('Page.BackEnd.Profile')
@section('kontent')



    <div ng-app="MyAplications" ng-controller="MyController" class="col-md-12">
        {!! Form::open(['url'=>'blog']) !!}

        {{--<div  class="form-group">
            <label>Judul :</label>
            <input type="text" ng-model="slug" class="form-control">
        </div>--}}


        <!--Judul form input-->
        <div class="form-group">
            {!! Form::label('Judul','Judul:') !!}
            {!! Form::text('judul',null,['class'=>'form-control', 'ng-model'=>'slug']) !!}
        </div>

        <label>URL: {{url('/') . '/blog/'}}@{{ slug|spasi }}</label>
        
        {{--<!--Konten form input-->
        <div class="form-group">
            {!! Form::label('ringkasan','Ringkasan:') !!}
            {!! Form::textarea('ringkasan',null,['class'=>'ckeditor']) !!}
        </div>--}}

        <!--Konten form input-->
        <div class="form-group">
            {!! Form::label('kontenFull','Konten Lengkap:') !!}
            {!! Form::textarea('kontenFull',null,['class'=>'ckeditor']) !!}
        </div>

        <!--Kategori form input-->
        <div class="form-group">
            {!! Form::label('kategori','Kategori:') !!}
            {!! Form::select('kategori_list[]', $kategori, null,['id'=>'kategoriList', 'class'=>'form-control','multiple']) !!}
        </div>



        <!--Add Artikel Button Submit-->
        <div class="form-group">
            {!! Form::submit('Simpan', ['class' =>'btn btn-primary form-control']) !!}
        </div>

        {!! Form::close() !!}

        @include('Page.BackEnd.Partials.ErrorMessage')

    </div>


    {{--AngularJs--}}
    <script src="{{asset('assets/js/AngularJs.js')}}"></script>
    <script src="{{asset('assets/js/Angular/custom.js')}}"></script>


@endsection
