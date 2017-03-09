@section('htmlheader')
    @parent
    <link rel="stylesheet" href="{{asset('/plugins/jcrop/css/jquery.Jcrop.css')}}" type="text/css" />

    <style>
        .modal-large {
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            padding: 5px;
        }
        .modal-content{
            width: 100%;
            height: 100%;
        }.modal-body{
             width: 100%;
             height: 100%;
         }
        #modal_body{
            height: 100%;
        }

        .height_cien {
            height: 100%;
        }

        #div_fot{
            vertical-align: middle;
            height: 90%;
        }

        #fot{
            height: auto;
            width: auto;
            max-height: 100%;
            max-width: 100%;
        }
        .group-a > a{
            margin-top: 10px;
            padding: 10px;
        }

        .foto_perfil{
            width: 128px;
            height: 128px;

        }
        #div_imagen_jcrop > a.disabled
        {
            cursor: not-allowed;
            background-color: #eeeeee;
            opacity: 1;

        }



    </style>
@endsection

@section('scripts')
    @parent
    <script src="{{asset('/plugins/jcrop/js/jcrop.js')}}"></script>

    <script>
        /**
         * Created by lucas on 14/12/16.
         */
        var cont=0;
        var id_img_original;

        var id_input_img_original;

        var url_modal;


        function init_jcrop(img) {

            if($(img).hasClass('disabled')){
                return false;
            }
            id_img_original = '#'+$(img).data('img');

            id_input_img_original = $(img).data('input');

            url_modal = $(img).data('link');

            GET_Imagen(url_modal);


            $(document).on('click','.select_imagen',function () {
                $(this).addClass('disabled');
                $('#imp_img').trigger('click');
                $(this).removeClass('disabled');
            });

        }

        function guardarImagen(btn){

            cont = cont +1;

            var form = $(btn).parents('form')[0];

            var url = $(btn).data('link');

            var id = $(form).attr('id');

            var data = new FormData(form);

            $.ajax({
                url:baseURL+url,
                type:'POST',
                data:data,
                cache:false,
                contentType:false,
                processData:false,

                beforeSend:function () {
                    cargando(btn);
                },
                complete: function () {
                    eliminarCargando();
                },
                success:function (data) {
                    data = $.parseJSON(data);
                    //$('#div_fot').replaceWith('<div id="div_fot"><img id="fot" src="'+data.url_imagen+'" alt=""></div>');
                    $(id_img_original).attr('src',data.url_imagen);
                    $(id_input_img_original).val(data.url_imagen);
                    cerrarCrop();
                },
                error:function (data) {
                    alert('algo salio mal'+data);
                }
            });

        }

        function addCrop(id_img) {

            xsize = $(id_img).width();
            ysize = $(id_img).height();

            $(id_img).Jcrop({
                aspectRatio: 1,
                boxWidth: xsize,
                boxHeight: ysize,
                onSelect: updateCoords
            });
        }

        function updateCoords(c) {
            $('#x').val(c.x);
            $('#y').val(c.y);
            $('#w').val(c.w);
            $('#h').val(c.h);
        };

        function cerrarCrop() {
            var im = $('.Modal_Imagen_Crop').html();
            if ( im == '')
            {
                ocultarModal();
            }else{
                $('.AjaxisModal').show();
                $('.Modal_Imagen_Crop').html('');
            }

        }

        function readURL(input,id_img){
            cargando(id_img);
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {

                    $('#div_fot').replaceWith('<div id="div_fot"><img id="fot" src="" alt=""></div>');

                    $(id_img).attr('src', e.target.result);

                    $(id_img).load(function () {

                        addCrop(id_img);
                        $('.con_imagen').show();
                        eliminarCargando();
                    });

                }
                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>

@endsection