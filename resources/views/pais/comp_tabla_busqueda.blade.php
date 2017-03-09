@if((count($paises)>0 != count($provincias)>0) != count($localidades)>0)
        <div class="table-responsive">
            <table class="table table-striped table-condensed table-hover">
                <thead>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th class="text-center">Operaciones</th>
                </thead>
                @foreach($paises as $pais)
                    <tr>
                        <td>{{$pais->nombre}}</td>
                        <td>{{class_basename($pais)}}</td>
                        <td class="text-center">
                            <a data-toggle="modal" data-target="#myModal"  class="delete manita" data-link="/pais/{{$pais->id}}/deleteMsg">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                                Borrar
                            </a>
                            <span class="separador"></span>
                            <a data-toggle="modal" data-target="#myModal" class="edit manita" data-link="/pais/{{$pais->id}}/edit">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                Editar
                            </a>
                            <span class="separador"></span>
                            <a onclick="mostrarProvincia();" class="manita" href="#p_{{$pais->id}}" data-pais="{{$pais->id}}" data-toggle="tab">
                                <strong>{{$pais->provincias->count()}}</strong>
                                Provincias
                                <i class="fa fa-chevron-right" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                @foreach($provincias as $provincia)
                    <tr>
                        <td>{{$provincia->nombre}}</td>
                        <td>{{class_basename($provincia)}}</td>
                        <td class="text-center">
                            <a data-toggle="modal" data-target="#myModal"  class="delete manita" data-link="/provincia/{{$provincia->id}}/deleteMsg">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                                Borar
                            </a>
                            <span class="separador"></span>
                            <a data-toggle="modal" data-target="#myModal" class="edit manita" data-link="/provincia/{{$provincia->id}}/edit">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                Editar
                            </a>
                            <span class="separador"></span>
                            <a onclick="mostrarLocalidades();" class="manita"  data-prov="{{$provincia->id}}" href="#pr_{{$provincia->id}}" data-toggle="tab">
                                <strong>{{$provincia->localidades->count()}}</strong>
                                Localidades
                                <i class="fa fa-chevron-right" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                @foreach($localidades as $localidad)
                    <tr>
                        <td>{{$localidad->nombre}}</td>
                        <td>{{class_basename($localidad)}}</td>
                        <td class="text-center">
                            <a data-toggle="modal" data-target="#myModal"  class="delete manita" data-link="/localidad/{{$localidad->id}}/deleteMsg">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                                Borrar
                            </a>
                            <span class="separador"></span>
                            <a data-toggle="modal" data-target="#myModal" class="edit manita" data-link="/localidad/{{$localidad->id}}/edit">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                Editar
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    @else
        @if(strlen($busq)>0)
            <div class="alert alert-warning">
                No se ha encotrado registro con la palabra "{{$busq}}"
            </div>
        @else
            <div class="alert alert-info">
                Ingrese el nombre o parte del nombre del (país/provincia/localidad) que esta buscando.
            </div>
        @endif
    @endif