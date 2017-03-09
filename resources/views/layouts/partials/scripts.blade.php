<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
{{--<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>--}}
<!-- Bootstrap 3.3.2 JS -->

{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.js"></script>--}}

<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/app.min.js') }}" type="text/javascript"></script>
<!--Base o dominio de la app ej "Larrealucas.com.ar"  -->
<script> var baseURL = "{{URL::to('/')}}"</script>
<script> var public_path = "{{public_path()}}"</script>
{{--Js De libreria scafolding --}}
<script src = "{{ URL::asset('js/AjaxisBootstrap.js')}}"></script>
<script src = "{{ URL::asset('js/scaffold-interface-js/customA.js')}}"></script>

{{--mi javascript--}}
<script src="{{asset('js/miScript.js')}}"></script>

<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
<script type="text/javascript" src="{{ asset('/plugins/bootstrapHelper/js/bootstrap-formhelpers.js') }}"></script>



<script src="/plugins/select2/select2.min.js"></script>
<script src="/plugins/select2/i18n/es.js"></script>

<script src="/plugins/datatables/jquery.dataTables.js"></script>
<script src="/plugins/datatables/dataTables.bootstrap.js"></script>
<script src="/plugins/datatables/dataTables.responsive.js"></script>
{{--

--}}
<script src="{{asset('/plugins/timepicker/bootstrap-timepicker.js')}}"></script>

<script src="{{asset('/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('/plugins/datepicker/bootstrap-datepicker.es.min.js')}}"></script>
{{--
<script src="{{asset('/plugins/jQueryUI/jquery-ui.js')}}"></script>
<link href="{{ asset('plugins/datepicker/datepicker3.css') }}" rel="stylesheet" type="text/css" />
--}}

<link href="{{ asset('plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />



{{--
<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>


<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" language="javascript" src="//cdn.datatables.net/buttons/1.2.3/js/buttons.flash.min.js"></script>
<script type="text/javascript" language="javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/buttons/1.2.3/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.2.3/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/buttons/1.2.3/js/buttons.print.min.js"></script>

--}}



<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->