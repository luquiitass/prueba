<div class="form-group">
    {{Form::label('administrador')}}
    {{Form::select('administradores[]',isset($users)?$users:array(),null,array('class'=>'form-control select2','data-id_selects'=>json_encode(isset($us)?$us:array()),'data-holder'=>'Buscar usuario','data-url'=>'/usersSelect2'))}}
</div>s