@extends('layouts.app'){{--Extiende del blade app--}}

@section('titulo','Inicio')

@section('menu_inicio','active')

@include('imagen.incluir_librerias_jcrop')

@section('main-content')
    @include('imagen.perfil.imagen_perfil')

@endsection
