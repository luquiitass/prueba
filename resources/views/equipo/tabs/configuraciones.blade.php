<div id="">
    {{--<h3>Configuraciones</h3>--}}
    <div>
        <div class="row">
            <div class="hidden-xs col-md-3">
                <ul class="nav nav-stacked">
                    <li class=" active"><a href="#conf_datos_generales" data-toggle="tab">Datos Generales</a></li>
                    <li><a href="#conf_estadios" data-toggle="tab">Estadios</a></li>
                    <li><a href="#conf_contacto" data-toggle="tab">Contacto</a></li>
                    <li><a href="#conf_otro" data-toggle="tab">Otro</a></li>
                </ul>
            </div>

            <div class="col-xs-12 col-md-9 borde-left">
                <div class="tab-content">
                    <div id="conf_datos_generales" class="tab-pane fade in active">
                        <h3>Datos generales</h3>
                        @include('equipo.comp_edit',compact('estadio'))

                    </div>{{--Tab de Datos Del equiopo--}}

                    {{--Tabs de los Estadios de un equipo--}}
                    <div id="conf_estadios" class="tab-pane fade">
                        <h3>Estadios</h3>
                        <table class="table">
                            @forelse($equipo->estadios as $estadio)
                                <tr>
                                    <td>
                                        <h3 style="padding: 0px;margin: 0px;">Estadio {{$estadio->nombre}}</h3>
                                    </td>
                                    <td>
                                        <div class="">
                                            <a data-toggle="collapse" href="#collapse_estadio_{{$estadio->id}}" class="btn btn-info ver" >Ver</a>
                                            <a class="btn btn-danger delete" data-link="/estadio/{{$estadio->id}}/deleteMsg" data-toggle="modal" data-target="#myModal" >Eliminar</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="collapse" id="collapse_estadio_{{$estadio->id}}">
                                            @include('estadio.comp_edit',['estadio'=>$estadio])
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr >
                                    <td colspan="2" class="alert bg-info">
                                        * {{$equipo->nombre}} no posee Estadios
                                    </td>
                                </tr>
                            @endforelse
                        </table>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class=" btn-block text-left" data-toggle="collapse" href="#edit_estadio_create">Crear Estadio</a>
                                    </h4>
                                </div>
                                <div id="edit_estadio_create" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        @include('estadio.comp_create')
                                    </div>
                                </div>
                            </div>
                    </div>

                    <div id="conf_contacto" class="tab-pane fade">
                        <h3>Contacto</h3>
                        @if(isset($equipo->contacto))
                            @include('contacto.comp_edit',['contacto'=>$equipo->contacto])
                        @else
                            @include('contacto.comp_create')
                        @endif
                    </div>{{--Tab de Contacto de un Equipo--}}

                    <div id="conf_otro" class="tab-pane fade">
                        <h3>Otros</h3>
                    </div>{{--Tabd eOtros--}}
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    @parent
    <script>
        $(document).on('click','.ver',function () {
            if ($(this).text() == 'Ver'){
                $(this).text('Oculra');
            }else{
                $(this).text('Ver');
            }
        });

    </script>
@endsection
