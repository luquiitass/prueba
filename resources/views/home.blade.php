@extends('layouts.app'){{--Extiende del blade app--}}

@section('titulo','Inicio')

@section('htmlheader')
	@parent
	{{--Vincular los css--}}
@endsection

@section('menu_inicio','active')



@section('main-content')

	<a href="/rol" class="link btn btn-success btn-block">Probar class JSON_retoeno</a>

	<div id="id_0" class="col-xs-12">

	</div>
	<div class="row">
		<div id="id_1" class="colxs-6">

		</div>
		<div id="id_2" class="colxs-6"></div>
	</div>
	<ul class="nav">
		<li class="list-group-item-danger">success</li>
		<li class="list-group-item-success">danger</li>
	</ul>

@endsection



@section('scripts')
	@parent

	<script>

	</script>

@endsection