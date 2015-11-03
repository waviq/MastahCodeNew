{!! Form::open(array('id'=>'regForm','action'=>'LoginUserController@postRegisSosial')) !!}

<div class="reg-header">
    <h2>Finish creating your Mastahcode account</h2>
</div>

<div class="input-group margin-bottom-20 {{$errors->has('name')?'has-error':''}}">
    <span class="input-group-addon"><i class="fa fa-user"></i></span>
    {!! Form::text('name',$user->name,['class'=>'form-control','placeholder'=>'Nama Lengkap']) !!}
    <div id ="name_error"></div>
</div>
<div class="alert alert-danger" id ="email_error"></div>
<div class="input-group margin-bottom-20 {{$errors->has('email')?'has-error':''}}">
    <span class="input-group-addon"><i class="fa fa-user"></i></span>
    {!! Form::email('email',$user->email,['class'=>'form-control','placeholder'=>'email']) !!}
</div>


<!-- form input Username-->
<div class="input-group margin-bottom-20 {{$errors->has('username')?'has-error':''}}">
    <span class="input-group-addon"><i class="fa fa-user"></i></span>
    {!! Form::text('username',str_replace(' ','',$user->name),['class'=>'form-control','placeholder'=>'Username']) !!}
</div>

<!--Password form input-->
<div class="input-group margin-bottom-20 {{$errors->has('password')?'has-error':''}}">
    <span class="input-group-addon"><i class="fa fa-user"></i></span>
    {!! Form::password('password',['class'=>'form-control','placeholder'=>'Password']) !!}
    <div id ="password_error"></div>
</div>
<div class="input-group margin-bottom-20 {{$errors->has('password_confirmation')?'has-error':''}}">
    <span class="input-group-addon"><i class="fa fa-user"></i></span>
    {!! Form::password('password_confirmation',['class'=>'form-control','placeholder'=>'Konfirmasi Password']) !!}
</div>

<!-- Button Login-->
<div class="input-group margin-bottom-20">
    {!! Form::submit('Create account', ['class' =>'btn-u pull-right','id'=>'masuk']) !!}
</div>

<hr>

{!! Form::close() !!}

<div id="successMessage"></div>