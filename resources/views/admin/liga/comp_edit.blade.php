@if(isset($liga))
    <div>
        <h3 class="text-center">Nueva Liga</h3>

        {{Form::open()}}
            {{Form::hidden('temporada_id',$liga->temporada->id)}}

            <div class="form-group">
                {{Form::label('nombre')}}
                {{Form::text('nombre',$liga->nombre,array('class'=>'form-control'))}}
            </div>

            <div class="form-group">
                {{Form::label('Fecha inicio')}}
                {{Form::text('inicio',$liga->inicio->format('d-m-Y'),array('class'=>'form-control datepicker'))}}
                <p class="text-danger"> <i class="fa fa-info-circle"></i> La fecha de inicio debe ser postereios a <strong>{{$liga->temporada->inicio->format('d-m-Y')}}</strong> , es cuando inicia la temporada</p>

            </div>

            <div class="form-group">
                {{Form::label('Fecha a finalizar')}}
                {{Form::text('fin',$liga->fin->format('d-m-Y'),array('class'=>'form-control datepicker'))}}
                <p class="text-danger"><i class="fa fa-info-circle"></i> La fecha de finalización debe ser menor a <strong>{{$liga->temporada->fin->format('d-m-Y')}}</strong> , es cuando finaliza la temporada</p>
            </div>

            <div class="form-group">
                {{Form::label('descripción')}}
                {{Form::textArea('descripcion',$liga->descripcion,array('class'=>'form-control'))}}
            </div>

            {!! $liga->html_selectAdministradoes($liga) !!}

            @include('categoria.comp_select_multiple',['categorias'=>$liga->categorias])


            <a class="manita" data-toggle="collapse" data-target="#configuraciones_liga">Mas configuraciones +</a>

            <div id="configuraciones_liga" class="collapse">
                no posee mas configuraciones
            </div>

            <div class="centered">
                <a class="btn btn-primary save_edit " data-link="/admin/liga/{{$liga->id}}">Modificar</a>
            </div>


        {{Form::close()}}

    </div>
@else
    Falta unaLiga
@endif

