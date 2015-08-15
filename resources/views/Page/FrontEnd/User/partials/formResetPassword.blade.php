{!! Form::open(['action'=>'ResetPasswordController@postResetPassword']) !!}
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="reg-header">
    <h2>Reset Password</h2>
</div>
<p align="center">Masukan email anda, jika ingin mereset password anda</p>
<br>
<!-- form input Username-->
<div class="input-group margin-bottom-20">
    <span class="input-group-addon"><i class="fa fa-user"></i></span>
    {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'email']) !!}
</div>


<div class="row">

    <!-- Button Login-->
    <div class="col-md-6">
        {!! Form::submit('Kirim', ['class' =>'btn-u pull-center']) !!}
    </div>

</div>



<div>

</div>



{!! Form::close() !!}