@if(!isset($temporadas))
    Falta pasar las temporadas temporada.comp_index
@else
    @if(count($temporadas) > 0)
    <table class="table">
        <thead>
            <th>N°</th>
            <th>Nombre</th>
            <th>Estado</th>
            <th>Inicio</th>
            <th>Fin</th>
            <th>Operaciones</th>
        </thead>
        @for($i=0;$i < count($temporadas); $i++)
            <tr id="temporada_{{$temporadas->all()[$i]->id}}">
                <td>
                    {{count($temporadas) - $i }}
                </td>
                <td style="padding-right: 20px">
                    {{$temporadas->all()[$i]->nombre}}
                    {{$temporadas->all()[$i]->sub>1?"-".$temporadas->all()[$i]->sub:''}}
                </td>
                <td>
                    {{$temporadas->all()[$i]->str_activo() }}
                </td>
                <td>
                    {{$temporadas->all()[$i]->inicio_con_formato() }}
                </td>
                <td>
                    {{$temporadas->all()[$i]->fin_con_formato()}}
                </td>
                <td>
                    <a class="manita" href="{{url('/configuraciones/temporada/'.$temporadas->all()[$i]->id)}}">Ver</a>
                    <span class="separador"></span>
                    {{--<a class="manita edit" data-toggle="modal" data-target="#myModal" data-link="/temporada/{{$temporadas->all()[$i]->id}}/edit" href="">Editar</a>--}}
                    {{--<span class="separador"></span>--}}
                    <a class="manita delete" data-toggle="modal" data-target="#myModal" data-link="/temporada/{{$temporadas->all()[$i]->id}}/deleteMgs" href="">Eliminar</a>

                </td>
            </tr>
        @endfor
        @else
            <div class="alert alert-warning">
                Sin temporadas
            </div>
        @endif
    </table>
@endif
