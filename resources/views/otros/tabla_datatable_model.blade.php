@if(isset($tabla))
    <table id="{{$tabla->tabla_id}}" class="table table-hover table-striped datatable" value="{{$tabla->url}}" >
        <thead>
        <tr>
            @foreach($tabla->columnas as $columna)
                <th class="col_table" data-name="{{$columna->nombre}}" data-searchable="{{$columna->searchable}}" data-ordetable="{{$columna->orderable}}">{{$columna->nombre_col}}</th>
            @endforeach
        </tr>
        </thead>
    </table>
@else
    <div class="alert alert-danger">
        Falta los datos de la tabla
    </div>
@endif
