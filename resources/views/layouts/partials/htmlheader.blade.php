<head>
    <meta charset="UTF-8">
    <title>@yield('titulo', 'Your title here') </title>
    
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->

    {{--<!-- Theme style -->--}}
    <link href="{{ asset('/css/AdminLTE.css') }}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link href="{{ asset('/css/skins/skin-blue.css') }}" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="{{ asset('/plugins/iCheck/square/blue.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('/plugins/bootstrapHelper/css/bootstrap-formhelpers.css') }}" rel="stylesheet" type="text/css" />


    {{--<link href="{{ asset('/plugins/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />--}}

    <link href="{{ asset('/plugins/datatables/jquery.dataTables.css') }}" rel="stylesheet" type="text/css" />
    {{--Mi Estilos--}}
    <link href="{{ asset('/css/miCss.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/main1.css') }}" rel="stylesheet" type="text/css" />
{{--

--}}
    <link href="{{ asset('plugins/datepicker/datepicker3.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/timepicker/bootstrap-timepicker.css') }}" rel="stylesheet" type="text/css" />


    <link href="{{ asset('plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('plugins/jQueryUI/css.css') }}" rel="stylesheet" type="text/css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <!-- Ionicons -->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/css/ionicons.min.css')}}" rel="stylesheet" type="text/css" />



    <link href="https://cdn.datatables.net/buttons/1.2.3/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/datatables/responsive.bootstrap.css')}}" rel="stylesheet" type="text/css" />


    <!--[endif]-->
</head>
