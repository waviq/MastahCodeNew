@extends('Page.BackEnd.Profile')
@section('header')
    <h1>Form untuk membuat artikel baru</h1>
@endsection
@section('kontent')

    <div class="col-md-12">
        {!! Form::open(['url'=>'blog','files'=>true]) !!}
        {{--{!! Form::token() !!}--}}

        <div class="span6 pull-right" style="text-align:right">
            <!--Published form input-->
            <div class="form-group">
                {!! Form::label('published','Published') !!}
                {!! Form::checkbox('active') !!}
            </div>
        </div>
        <!--Judul form input-->
        <div class="form-group">
            {!! Form::label('Judul','Judul:') !!}
            {!! Form::text('judul',null,['class'=>'form-control', 'ng-model'=>'slug']) !!}
        </div>

        {{--<label>URL: {{url('/') . '/blog/'}}@{{ slug|spasi }}</label>--}}


        <div class="form-group">
            {!! Form::label('kontenFull','Konten Lengkap:') !!}
            {!! Form::textarea('kontenFull',null,['class'=>'form-control']) !!}
        </div>

        <!--Kategori form input-->
        <div class="form-group">
            {!! Form::select('kategori_list[]', $kategori, null,['id'=>'kategoriList', 'class'=>'form-control','multiple']) !!}
        </div>

        <!--Image form input-->
        <div class="form-group">
            {!! Form::label('image','Image:') !!}
            {!! Form::file('image',null,['class'=>'form-control']) !!}
        </div>

        <br>
        <footer>
            <button type="submit" name="simpan" class="btn-u btn-u-red">Simpan</button>

            {!! Form::close() !!}
            @include('Page.BackEnd.Artikel.partials.addKategoriModal')
        </footer>

        <br>
        @include('Page.BackEnd.Partials.ErrorMessage')

    </div>




@endsection

