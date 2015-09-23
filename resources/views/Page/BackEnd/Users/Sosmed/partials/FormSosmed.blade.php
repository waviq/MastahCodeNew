<div class="col-md-5">
    <div class="form-group input-group">
        <span class="input-group-addon"><i class="icon-prepend fa  fa-envelope"></i></span>
        {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'Email']) !!}
    </div>
    <div class="form-group input-group input-group">
        <span class="input-group-addon"><i class="icon-prepend fa fa-facebook-square"></i></span>
        {!! Form::text('facebook',null,['class'=>'form-control','placeholder'=>'Facebook']) !!}
    </div>

    <div class="form-group input-group input-group">
        <span class="input-group-addon"><i class="icon-prepend fa fa-twitter"></i></span>
        {!! Form::text('twitter',null,['class'=>'form-control','placeholder'=>'Twitter']) !!}
    </div>

    <div class="form-group input-group input-group">
        <span class="input-group-addon"><i class="icon-prepend fa fa-linkedin"></i></span>
        {!! Form::text('linkedin',null,['class'=>'form-control','placeholder'=>'Linkedin']) !!}
    </div>

    <div class="form-group input-group input-group">
        <span class="input-group-addon"><i class="icon-prepend fa fa-skype"></i></span>
        {!! Form::text('skype',null,['class'=>'form-control','placeholder'=>'Skype']) !!}
    </div>

    <!--submit Button Submit-->
    <div class="form-group">
        {!! Form::submit($namaTombol, ['class' =>'btn btn-primary form-control']) !!}
    </div>

    @include('Page.BackEnd.Partials.ErrorMessage')
</div>

