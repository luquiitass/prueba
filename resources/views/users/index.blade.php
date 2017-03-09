@extends('layouts.app'){{--Extiende del blade app--}}

@section('titulo','Inicio')

@section('htmlheader')
    @parent
    {{--Vincular los css--}}
@endsection

@section('menu_inicio','active')



@section('main-content')

   <h3>Usuarios</h3>

    @include('otros.tabla_datatable_model',compact('tabla'))

@endsection



@section('scripts')
    @parent

    <script>
        cargarTablas();
    </script>

@endsection