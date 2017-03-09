@if(!isset($temporada))
    <div class="alert alert-danger">
        Falta pasar la torneo
    </div>
@else

    <div class="">
        <div class="centered">
            <h3>Nueva Torneo</h3>
        </div>
        <div class="row">
            {{Form::open(array('id'=>'form_create_temporada'))}}

                {{Form::hidden('temporada_id',$temporada->id)}}

                {{--Form::hidden('tipo_torneo_id',$temporada->competencia->tipoOrganizacionCompetencia->id)--}}



            <div class="col-xs-12 col-md-6">
                <div class="form-group">
                    {{Form::label('nombre')}}
                    {{Form::text('nombre',$temporada->competencia->nombre,array('class'=>'form-control'))}}
                </div>

                <div class="form-group">
                    {{Form::label('descripción')}}
                    {{Form::textArea('descripcion',null,array('class'=>'form-control'))}}
                </div>

                @include('otros.selectUser')
            </div>


            <div class="col-xs-12 col-md-6">

                <div class="'div_datepicker">

                    <div class="form-group">
                        {{Form::label('Fecha inicio')}}
                        {{Form::text('inicio',null,array('class'=>'form-control inicio'))}}

                    </div>
                    <div class="form-group">
                        {{Form::label('Fecha a finalizar')}}
                        {{Form::text('fin',null,array('class'=>'form-control fin'))}}
                    </div>

                </div>

                @include('categoria.comp_select_multiple')
            </div>

            {{--
           <div class="col-xs-12">
               @include($temporada->competencia->tipoOrganizacionCompetencia->nombre.'.comp_create')
           </div>
            --}}
            <div class="col-xs-12  centered">
                <a class="save_ajax btn btn-primary manita" data-link="/torneo" >Guardar</a>
            </div>


            {{Form::close()}}
        </div>

    </div>
@endif
