<!doctype html>
<html lang="en">
<head>
    <title>Live Cropping Demo</title>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    @section('htmlheader')
        {{-- Mios--}}
        {{--<link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />--}}
        {{--<link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />--}}
        {{--<link href="{{ asset('/css/miCss.css') }}" rel="stylesheet" type="text/css" />--}}
        {{--<link href="{{asset('/css/ionicons.min.css')}}" rel="stylesheet" type="text/css" />--}}


        {{--Jcrop--}}
        <link rel="stylesheet" href="{{asset('plugins/jcrop/css/main.css')}}"type="text/css" />
        <link rel="stylesheet" href="{{asset('plugins/jcrop/css/demos.css')}}" type="text/css" />
        <link rel="stylesheet" href="{{asset('plugins/jcrop/css/jquery.Jcrop.css')}}" type="text/css" />

    @show
</head>
<body>
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="jc-demo-box centered">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')

    @show

</body>
</html>

