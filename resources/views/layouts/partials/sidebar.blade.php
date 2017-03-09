<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->apellido }} {{Auth::user()->nombre}}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            {{--<li class="@yield('menu_inicio','')">--}}
                {{--<a href="{{ url('home') }}">--}}
                    {{--<i class='fa fa-link'></i>--}}
                    {{--<span>{{ trans('adminlte_lang::message.home') }}</span>--}}
                {{--</a>--}}
            {{--</li>--}}

            {{--<li class="@yield('menu_usuarios','')">--}}
                {{--<a href="{{ url('user') }}">--}}
                    {{--<i class='fa fa-link'></i>--}}
                    {{--<span>{{ trans('string.link_usuarios') }}</span>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--}}<li><a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.anotherlink') }}</span></a></li>--}}

            <li class="@yield('menu_competencias','')">
                <a href="{{ route('admin.competencia.index') }}">
                    <i class='fa fa-link'></i>
                    <span>{{ trans('string.link_competencias') }}</span>
                </a>
            </li>

            {{--Menu de Competenci --}}
            {{--<li class="treeview @yield('menu_competencias','')">--}}
                {{--<a href="#">--}}
                    {{--<i class='fa fa-link'></i>--}}
                    {{--<span>{{ trans('string.link_competencias') }}</span>--}}
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                {{--</a>--}}
                {{--<ul class="treeview-menu">--}}
                    {{--@role('admin')--}}
                    {{--<li class="@yield('menu2_nuevaCompetencia','')"><a href="{{route('competencia.create')}}">{{ trans('string.link_nueva_competencia') }}</a></li>--}}
                    {{--<li class="@yield('menu2_admCompetencia','')"><a href="{{route('competencia.index')}}">{{ trans('string.link_adm_competencia') }}</a></li>--}}
                    {{--@foreach( App\Competencia::get() as $competencia)--}}
                        {{--<li class="@yield('menu2_'.$competencia->nombre,'')"><a href="{{url('competencia/'.$competencia->id)}}">Comp. {{$competencia->nombre}}</a></li>--}}
                    {{--@endforeach--}}
                    {{--@endrole--}}
                {{--</ul>--}}
            {{--</li>--}}{{--Fin de menu de parametros--}}
            {{--Menu de Parametros --}}
            {{--<li class="treeview @yield('menu_parametros','')">--}}
                {{--<a href="#">--}}
                    {{--<i class='fa fa-link'></i>--}}
                    {{--<span>{{ trans('string.link_parametros') }}</span>--}}
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                {{--</a>--}}
                {{--<ul class="treeview-menu">--}}
                    {{--@role('abm.pais|admin')--}}
                    {{--<li class="@yield('menu2_pasies','')"><a href="{{route('pais')}}">{{ trans('string.link_pais,provincia,localidad') }}</a></li>--}}
                    {{--@endrole--}}
                    {{--<li class="@yield('menu2_seguridad','')"><a href="{{route('segutidad.index')}}">{{trans('string.link_seguridad')}}</a></li>--}}

                    {{--<li class="@yield('menu2_estados','')"><a href="{{route('estado.index')}}">{{trans('string.link_estados')}}</a></li>--}}

                    {{--<li class="@yield('menu2_configuraciones','')"><a href="{{route('configuracion.index')}}">{{trans('string.link_configuraciones')}}</a></li>--}}

                    {{--<li class="@yield('menu2_tipo_organizacion_competencia','')"><a href="{{route('tipoOrganizacionCompetencia.index')}}">{{trans('string.link_adm_tipos_de_Organizacion_competencia')}}</a></li>--}}

                    {{--<li class="@yield('menu2_tipo_fase','')"><a href="{{route('tipoFase.index')}}">{{trans('string.link_adm_tipos_de_Fase')}}</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}{{--Fin de menu de parametros--}}

            {{--<li class="@yield('menu_equipos','')">--}}
                {{--<a href="{{ route('equipo.index') }}">--}}
                    {{--<i class='fa fa-link'></i>--}}
                    {{--<span>{{ trans('string.link_adm_equipos') }}</span>--}}
                {{--</a>--}}
            {{--</li>--}}

            {{--<li class="treeview @yield('menu_equipos','')">--}}
                {{--<a href="#">--}}
                    {{--<i class='fa fa-link'></i>--}}
                    {{--<span>Equipos</span>--}}
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                {{--</a>--}}
                {{--<ul class="treeview-menu">--}}
                    {{--<li class="@yield('menu2_equipos','')">--}}
                        {{--<a href="{{route('equipo.index')}}">{{ trans('string.link_adm_equipo_administrar') }}</a>--}}
                    {{--</li>--}}
                    {{--<li class="@yield('menu2_nuevoEquipo','')">--}}
                        {{--<a href="{{route('equipo.create')}}">{{ trans('string.link_adm_equipo_nuevo') }}</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}

            {{--<li class="treeview @yield('menu_estadios','')">--}}
                {{--<a href="#">--}}
                    {{--<i class='fa fa-link'></i>--}}
                    {{--<span>Estadios</span>--}}
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                {{--</a>--}}
                {{--<ul class="treeview-menu">--}}
                    {{--<li class="@yield('menu2_administrarEstadios','')">--}}
                        {{--<a href="{{route('estadio.index')}}">{{ trans('string.link_adm_estadio_administrar') }}</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
