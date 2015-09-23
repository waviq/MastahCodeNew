
{!! Form::open(['url'=>'/auth/register','id'=>'ValidasiRegistrasi','class'=>'reg-page']) !!}

<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="reg-header">
    <h2>Register a new account</h2>
    <p>Already Signed Up? Click <a href="{{url(action('LoginUserController@getLogin'))}}" class="color-green">Sign In</a> to login your account.</p>
</div>

<!--username form input-->
<div class="form-group">
    {!! Form::label('username','Username:') !!}
    {!! Form::text('username',null,['class'=>'form-control margin-bottom-20']) !!}
</div>

<!--Nama lengkap form input-->
<div class="form-group">
    {!! Form::label('nama','Nama lengkap:') !!}
    {!! Form::text('name',null,['class'=>'form-control margin-bottom-20']) !!}
</div>

<!--gender form input-->
<div class="form-group">
    {!! Form::label('jenisKelamin','Jenis Kelamin:') !!}
    {!! Form::select('jenisKelamin', array('0' => '--Pilih--', '1' => 'Pria', '2' => 'Wanita'), null, array('class' => 'form-control margin-bottom-20')) !!}
</div>

<!--Tanggal Lahir form input-->
<div class="form-group">
    {!! Form::label('tanggalLahir','Tanggal Lahir:') !!}
    {!! Form::text('tanggalLahir',null,['class'=>'form-control','id'=>'date']) !!}
</div>

<!--Alamat lengkap form input-->
<div class="form-group ">
    {!! Form::label('Alamat','Alamat Lengkap:') !!}
    {!! Form::text('alamat',null,['class'=>'form-control margin-bottom-20']) !!}
</div>

<!--NomorTelfon form input-->
<div class="form-group">
    {!! Form::label('nomorTelfon','Nomor Telfon/HP:') !!}
    {!! Form::text('nomorTelfon',null,['class'=>'form-control margin-bottom-20']) !!}
</div>

<!--Email form input-->
<div class="form-group">
    {!! Form::label('email','Email:') !!}
    {!! Form::email('email',null,['class'=>'form-control margin-bottom-20']) !!}
</div>

<div class="row">
    <!-- form input password-->
    <div class="col-sm-6">
        {!! Form::label('password','Password:') !!}
        {!! Form::password('password',['class'=>'form-control margin-bottom-20']) !!}
    </div>

    <!-- form input password-->
    <div class="col-sm-6">
        {!! Form::label('password_confirmation','Korfimasi Password:') !!}
        {!! Form::password('password_confirmation',['class'=>'form-control margin-bottom-20']) !!}
    </div>
</div>

{!! app('captcha')->display() !!}

<hr>

<div class="row">
    <div class="col-lg-6 checkbox">
        <label>
            {!! Form::checkbox('agree', 1, null) !!}
            I read <a href="page_terms.html" class="color-green">Terms and Conditions</a>
        </label>
    </div>
    <!-- Button Register-->
    <div class="col-md-6">
        {!! Form::submit('Register', ['class' =>'btn-u pull-right']) !!}
    </div>
</div>
{!! Form::close() !!}
