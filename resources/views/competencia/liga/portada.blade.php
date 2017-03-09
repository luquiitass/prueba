@if(isset($competencia))

    @extends('competencia.liga.root')

    @section('menu_cmompetencia_portada','active')

@section('liga_competencia_content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Prtada</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <div>

            </div>
            <!-- /.mail-box-messages -->
        </div>
        <!-- /.box-body -->

    </div>
@endsection

@else
    <div class="alert alert-danger">
        Falta pasar la competencia
    </div>
@endif