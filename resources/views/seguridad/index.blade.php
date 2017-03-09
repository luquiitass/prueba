@extends('layouts.app'){{--Extiende del blade app--}}

@section('titulo','Seguridad')

@section('htmlheader')
    @parent
    {{--Vincular los css--}}
    <style>
        .li_roles,.li_permission{
            border-bottom: 1px solid antiquewhite;
        }

        li.active.li_rol > a{
            border-top: 1px solid #e3e1e1;
            border-bottom: 1px solid #e3e1e1;
            border-radius: 3px;
            background-color: #dcedf8;
        }
        .roles,.description,.permission{
            max-height: 400px;
            height: auto;
            overflow: auto;
        }

    </style>
@endsection

@section('menu_parametros','active')

@section('menu2_seguridad','active')

@section('main-content')
    <div id="content ">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
                <h3>Seguridad</h3>
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab_roles">Roles</a></li>
                    <li><a data-toggle="tab" href="#tab_permission">Permisos</a></li>
                </ul>

                <div class="tab-content">
                    <div id="tab_roles" class="tab-pane fade in active">

                        @include('seguridad.tabs.roles',compact('roles'))
                    </div>


                    <div id="tab_permission" class="tab-pane fade">

                        @include('seguridad.tabs.permission',compact('permission'))

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('scripts')
    @parent

    <script src="{{ asset('/js/smoothscroll.js') }}"></script>

    <script>
        selectTabsOfUrl();
    </script>

@endsection