@if(isset($fechas))
    @if(count($fechas) > 0)
        <table class="table">
            <thead>
                <th>Nobre</th
                <th>Fecha</th>
                <th>Estado</th>
                <th class="centered">Op</th>
            </thead>
            @foreach($fechas as $fecha)
                <tr>
                    <td>
                        {{$fecha->nombre}}
                    </td>
                    <td>
                        {{$fecha->estado}}
                    </td>
                    <td class="centered">
                        <a class="manita"> Ver partidos</a>
                        <span class="separador"></span>
                        <a class="manita fa fa-cog"></a>
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <div class="aalert alert-info">
            No han enconrado fechas
        </div>
    @endif
@else
    Falta pasar las fechas
@endif