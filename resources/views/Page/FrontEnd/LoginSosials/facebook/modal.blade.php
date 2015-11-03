<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add new Skill</h4>
            </div>
            <div class="modal-body">

                {!! Form::open(['url'=>'user/skill/add-skill']) !!}
                <!--NamaSkill form input-->
                <div class="form-group {{$errors->has('namaSkill')?'has-error':''}}">
                    {!! Form::label('namaSkill','Nama Skill:') !!}
                    {!! Form::text('namaSkill',null,['class'=>'form-control']) !!}
                    {!! $errors->first('namaSkill','<span class="help-block">:message</span>') !!}
                </div>
                <button type="submit" class="btn btn-success">save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                {!! Form::close() !!}


            </div>

        </div>

    </div>
</div>