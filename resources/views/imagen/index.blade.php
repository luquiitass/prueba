@extends('layouts.app'){{--Extiende del blade app--}}

@section('titulo','Inicio')

@section('htmlheader')
    @parent
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/2.0.4/css/Jcrop.min.css" type="text/css" />

    {{--Vincular los css--}}
@endsection

@section('menu_inicio','active')



@section('main-content')
    <div class="centered">

        <a class="manita btn btn-success " data-toggle="modal" data-target="#modal_imagen"> Subir imagen</a>

        <div id="img_terminada">

        </div>
    </div>


@endsection

@section('modals')
    <div class="modal fade" id="modal_imagen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div>




            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">{{isset($title)?$title:''}}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="mensaje_modal"></div>
                        {!! isset($body)?$body:'' !!}
                        <div id="modal_body">
                            <div class="centered">
                                {{Form::open(array('id'=>'form_subir_imagen','url'=>url('imagen/recortar'),'files'=>true,'class'=>'subir_imagen'))}}
                                <div class="form-group centered">
                                    {{Form::label('Seleccionar Imagen')}}
                                    {{Form::file('imagen',array('id'=>'imagen'))}}
                                </div>

                                {{Form::submit('Actualizar',array('class'=>'btn btn-primary'))}}

                                {{Form::close()}}
                            </div>
                        </div>

                        {{--<p>Some text in the modal.</p>--}}
                    </div>

                    <div class="modal-footer">
                        {!! isset($footer)?$footer:'' !!}
                        {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="hide">
        <div id="seleccionar_imagen">
            {{Form::open(array('id'=>'form_subir_imagen','url'=>url('imagen/recortar'),'files'=>true,'onsubmit'=>"return checSelect();"))}}
            {{Form::token()}}
            <div class="form-group">
                {{Form::label('Seleccionar Imagen')}}
                {{Form::file('imagen')}}
            </div>

            {{Form::submit('Cortar',array('class'=>'btn btn-primary'))}}

            {{Form::close()}}
        </div>

        <div id="seleccionar_corte">
            <img src="" id="cropbox" style="max-width: 100%;" >
        <img src="" alt="">

            <!-- This is the form that our event handler fills -->
            <form action="{{url('imagen/cortar')}}" method="post" onsubmit="return checkCoords();">
                {{Form::token()}}
                <input type="hidden" name="ruta" id="ruta_img_cortar" value="" />
                <input type="hidden" id="x" name="x" />
                <input type="hidden" id="y" name="y" />
                <input type="hidden" id="w" name="w" />
                <input type="hidden" id="h" name="h" />
                <a value="Crop Image" class="btn btn-large btn-inverse save_ajax manita" data-link="/imagen/cortar" >Cortar</a>
            </form>

        </div>

    </div>


@endsection



@section('scripts')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/2.0.4/js/Jcrop.js"></script>


    <script>



        function readURL(input,id_img){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#'+id_img).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
                $('#btn_buscatImagen').hide();
                $('#btns_cargar_cancelar').show();
            }
        }

        function cancelarCargaDeFoto(fotoVieja,id_img){
            $('#'+id_img).attr('src',fotoVieja);
            $('#btn_buscatImagen').show();
            $('#btns_cargar_cancelar').hide();
            return false;
        }

        function subirImagen(id_form){
            var form_data = $(id_form).serialize();
            form_data.push({name: 'image',value: $( '#imp_file_foto' ).files[0]});
            POST($(id_form).serializeArray(),'/image/save');
        }

        function addCrop(id_img) {
            $(id_img).Jcrop({
                aspectRatio: 1,
                onSelect: updateCoords
            });
        }

        function updateCoords(c)
        {
            $('#x').val(c.x);
            $('#y').val(c.y);
            $('#w').val(c.w);
            $('#h').val(c.h);
        };

        function checkCoords()
        {
            if (parseInt($('#w').val())) return true;
            alert('Please select a crop region then press submit.');
            return false;
        };

        $(document).on('submit','.subir_imagen',function (e) {
            e.preventDefault();

            var form = $(this);
            var id = $(form).attr('id');

            var data = new FormData(this);

            $.ajax({
                url:baseURL+'/imagen/recortar',
                type:'POST',
                data:data,
                cache:false,
                contentType:false,
                processData:false,

                beforeSend:function () {
                    $('#mensaje_modal').html('Cargando');
                },
                success:function (data) {
                    data = $.parseJSON(data);
                    $('#cropbox').attr('src',baseURL+'/'+data.url_image );
                    $('#ruta_img_cortar').attr('value',data.url_image );
                    $('#modal_body').html($(data.div_mostrar).html());
                    addCrop('#cropbox');

                },
                error:function (data) {
                    alert('algo salio mal'+data);
                }
            });
        });

    </script>

    <script>$('#img_final').attr('src',$('#img_final').attr('src')+'?'+Math.random())</script>

@endsection