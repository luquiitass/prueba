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
            $('#mensaje_modal').html('Cargando');
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