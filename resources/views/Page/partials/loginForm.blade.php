{!! Form::open(['url'=>'/auth/login']) !!}
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="reg-header">
    <h2>Login to your account</h2>

    <ul class="social-icons text-center">
        <li><a class="rounded-x social_facebook" data-original-title="Facebook" href="#"></a></li>
        <li><a class="rounded-x social_twitter" data-original-title="Twitter" href="#"></a></li>
        <li><a class="rounded-x social_googleplus" data-original-title="Google Plus" href="#"></a></li>
        <li><a class="rounded-x social_linkedin" data-original-title="Linkedin" href="#"></a></li>
    </ul>
    <p>Belum punya akun? Klik <a class="color-green" href="{{url('/auth/register')}}">Sign Up</a> untuk registrasi</p>
</div>
<!-- form input Username-->
<div class="input-group margin-bottom-20">
    <span class="input-group-addon"><i class="fa fa-user"></i></span>
    {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'Username']) !!}
</div>

<!-- form input password-->
<div class="input-group margin-bottom-20">
    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
    {!! Form::password('password',['class'=>'form-control','placeholder'=>'Password']) !!}
</div>

<!-- form input checkbox-->
<div class="row">
    <div class="col-md-6 checkbox">
        <label><input type="checkbox" name="remember"> Remember Me</label>
    </div>

    <!-- Button Login-->
    <div class="col-md-6">
        {!! Form::submit('Login', ['class' =>'btn-u pull-right']) !!}
    </div>

</div>

<div>

</div>


<hr>

<h4>Lupa password anda?</h4>
<p>Gak usah khuatir, <a class="color-green" href="{{url('/password/email')}}">click here</a> untuk reset password anda.</p>

{!! Form::close() !!}