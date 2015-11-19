{!! Form::open(['action'=>'LoginUserController@postLogin']) !!}

<div class="reg-header">
    <h2>Login to your account</h2>

    <ul class="social-icons text-center">
        <li><a class="rounded-x social_facebook" data-original-title="Facebook" href="{{url(action('LoginUserController@getFacebook'))}}"></a></li>
        <li><a class="rounded-x social_twitter" data-original-title="Twitter" href="{{url(action('TwitterLoginController@getTwitter'))}}"></a></li>
        <li><a class="rounded-x social_github" data-original-title="Github" href="{{url(action('GithubLoginController@getGithub'))}}"></a></li>
        <li><a class="rounded-x social_linkedin" data-original-title="Linkedin" href="{{url(action('LinkedinLoginController@getLinkedin'))}}"></a></li>
    </ul>
    <p>Belum punya akun? Klik <a class="color-green" href="{{url('/auth/register')}}">Sign Up</a> untuk registrasi</p>
</div>
<!-- form input Username-->
<div class="input-group margin-bottom-20">
    <span class="input-group-addon"><i class="fa fa-user"></i></span>
    {!! Form::text('username',null,['class'=>'form-control','placeholder'=>'Username or email']) !!}
</div>

<!-- form input password-->
<div class="input-group margin-bottom-20">
    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
    {!! Form::password('password',['class'=>'form-control','placeholder'=>'Password']) !!}
</div>

<!-- form input checkbox-->
<div class="row">
    <div class="col-md-6 checkbox">
        <label for="remember">
            <input type="checkbox" name="remember"> Remember Me
        </label>
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
<p>Gak usah khuatir, <a class="color-green" href="{{url(action('ResetPasswordController@getResetPassword'))}}">click here</a> untuk reset password anda.
</p>

{!! Form::close() !!}