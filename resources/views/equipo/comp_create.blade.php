<div>
    <div class="">
        <div id="form_create_equipo">
            {{Form::open(array('url'=>url('equipo'),'id'=>'form_equipo'))}}
            {{Form::token()}}
            <div class="form-group">
                @include('crop.otros.escudo')
                {{Form::label('nombre')}}
                {{Form::text('nombre',null,array('class'=>'form-control'))}}
            </div>

            <div class="form-group">
                {{Form::label('alias')}}
                {{Form::text('alias',null,array('class'=>'form-control'))}}
            </div>


            @include('otros.selectUser')

            @include('categoria.comp_select')


            <a class="manita save_ajax btn btn-primary center-block" data-link="/admin/equipo"  >Crear</a>

            {{--Form::submit('Crear',array('class'=>'fomr-control btn btn-primary center-block'))--}}
            {{Form::close()}}
        </div>


        {{--@include('otros.direccion.direccion')--}}

    </div>
</div>
