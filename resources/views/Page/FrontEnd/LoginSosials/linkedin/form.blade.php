{!! Form::open(array('id'=>'regForm','action'=>'LoginUserController@postRegisSosial')) !!}

<div class="reg-header">
    <h2>Finish creating your Mastahcode account</h2>
</div>

<div class="input-group margin-bottom-20 {{$errors->has('name_error')?'has-error':''}}">
    <span class="input-group-addon"><i class="fa fa-user"></i></span>
    {!! Form::text('name',$user->nickname,['class'=>'form-control','placeholder'=>'Nama Lengkap','required' => 'required']) !!}
    <span class="validateRegSosial" id ="name_error"></span>
</div>
{{--<div class="alert alert-danger" id ="email_error"></div>--}}
<div class="input-group margin-bottom-20 {{$errors->has('email_error')?'has-error':''}}">
    <span class="input-group-addon"><i class="fa fa-user"></i></span>
    {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'email','required' => 'required']) !!}
    <span class="validateRegSosial" id ="email_error"></span>
</div>


<!-- form input Username-->
<div class="input-group margin-bottom-20 {{$errors->has('username')?'has-error':''}}">
    <span class="input-group-addon"><i class="fa fa-user"></i></span>
    {!! Form::text('username',$user->nickname,['class'=>'form-control','placeholder'=>'Username','required' => 'required']) !!}
    <span class="validateRegSosial" id ="username_error"></span>
</div>

<!--Password form input-->
<div class="input-group margin-bottom-20 {{$errors->has('password')?'has-error':''}}">
    <span class="input-group-addon"><i class="fa fa-user"></i></span>
    {!! Form::password('password',['class'=>'form-control','placeholder'=>'Password','required' => 'required']) !!}
    <span class="validateRegSosial" id ="password_error"></span>
</div>
<div class="input-group margin-bottom-20 {{$errors->has('password_confirmation')?'has-error':''}}">
    <span class="input-group-addon"><i class="fa fa-user"></i></span>
    {!! Form::password('password_confirmation',['class'=>'form-control','placeholder'=>'Konfirmasi Password','required' => 'required']) !!}
    <span class="validateRegSosial" id ="password_confirmation"></span>
</div>

<!-- Button Login-->
<div class="input-group margin-bottom-20">
    {!! Form::submit('Create account', ['class' =>'btn-u pull-right','id'=>'masuk']) !!}
</div>

<hr>

{!! Form::close() !!}

<div id="successMessage"></div>