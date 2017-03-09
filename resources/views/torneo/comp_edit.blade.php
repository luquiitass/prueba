@if(!isset($torneo))
    <div class="alert alert-danger">
        Falta pasar la torneo
    </div>
@else

    <div class="">
        <div class="centered">
            <h3>Modificar Torneo</h3>
        </div>
        <div class="row">
            {{Form::open(array('id'=>'form_create_temporada'))}}

            {{Form::hidden('temporada_id',$torneo->temporada->id)}}

            <div class="col-xs-12 col-md-6">
                <div class="form-group">
                    {{Form::label('nombre')}}
                    {{Form::text('nombre',$torneo->nombre,array('class'=>'form-control'))}}
                </div>

                <div class="form-group">
                    {{Form::label('descripción')}}
                    {{Form::textArea('descripcion',$torneo->descripcion,array('class'=>'form-control'))}}
                </div>
            </div>


            <div class="col-xs-12 col-md-6">

                <div class="form-group">
                    {{Form::label('Fecha inicio')}}
                    {{Form::text('inicio',$torneo->inicio->format('d-m-Y'),array('class'=>'form-control datepicker'))}}

                </div>
                <div class="form-group">
                    {{Form::label('Fecha a finalizar')}}
                    {{Form::text('fin',$torneo->fin->format('d-m-Y'),array('class'=>'form-control datepicker'))}}
                </div>

                @include('categoria.comp_select_multiple',['categorias'=>$torneo->categorias])

                <div class="centered">
                    <a class="save_edit btn btn-primary manita" data-link="/torneo/{{$torneo->id}}" >Modificar</a>
                </div>
            </div>


            {{Form::close()}}
        </div>

    </div>
@endif
