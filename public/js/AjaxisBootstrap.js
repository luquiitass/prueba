/*|
 *| jQuery File Ajaxis Plugin for Bootstrap
 *| https://github.com/amranidev/ajaxis
 *|
 *| Copyright 2015, Amrani Houssain
 *| amranidev@gmail.com
 *|
 *| Licensed under the MIT license:
 *| http://www.opensource.org/licenses/MIT
 *|
 */

$(document).on('click', '.delete', function() {
    GET($(this).data('link'));
})
$(document).on('click', '.edit', function() {
    GET($(this).data('link'));
})
$(document).on('click', '.display', function() {
    GET($(this).data('link'));
})
$(document).on('click', '.create', function() {
    GET($(this).data('link'));
})
$(document).on('click', '.destroy', function() {
    $.ajax({
        async: true,
        type: 'get',
        url: baseURL + $(this).data('link'),
        success: function(response) {
            var conOperaciones = operacion(response,false);
            if(! conOperaciones){
                window.location = response;
            }
        }
    })
})


$(document).on('click', '.save', function() {
    POST($('#AjaxisForm').serializeArray(), $(this).data('link'));
})

$(document).on('click', '.saveForm', function() {
    var form = $(this).data('form')[0];
    POST($('#'+form).serializeArray(), $(this).data('link'));
})







/* *************** Mios **********************/
$(document).on('click', '.save_edit', function() {
    var form = $(this).parents('form');
    //VALID(form,$(form).serializeArray(),'PUT',$(this).data('link'));
    //if(validar(form)) {
        PUT($(form).serializeArray(), $(this).data('link'));
    //}
})

$(document).on('click', '.save_ajax', function(event) {
    var form = $(this).parents('form');
    //if(validar(form)) {
    //VALID(form,$(form).serializeArray(),'POST',$(this).data('link'));
    POST($(form).serializeArray(), $(this).data('link'));
    //}
})

$(document).on('hidden.bs.modal','#myModal', function () {
    $('.AjaxisModal').html('');
})

$(document).on('hidden.bs.modal','.modal', function () {
    $('.AjaxisModal').html('');

    var form = $(this).find('form')[0];

    limpiarForm(form);
})

$(document).on('change paste keyup', '.input_change_ajax', function() {
    var form = $(this).parents('form');
    POST($(form).serializeArray(), $(this).data('link'));
})


function GET_Imagen(dataLink) {
    $.ajax({
        async: true,
        type: 'get',
        url: baseURL + dataLink,
        success: function(response) {
            var conOperaciones = operacion(response,false);
            if(! conOperaciones){
                var a = $('.AjaxisModal').html();
                if (a != ''){
                    $('.Modal_Imagen_Crop').html(response);
                    $('.AjaxisModal').hide();
                }else{
                    $('.AjaxisModal').html(response);
                }
            }
        }
    });
    $('#myModal').modal('show');
}


function GET(dataLink) {
    $.ajax({
        async: true,
        type: 'get',
        url: baseURL + dataLink,
        success: function(response) {
            var conOperaciones = operacion(response,false);
            if(! conOperaciones){
                $('.AjaxisModal').html(response);
            }
        }
    })
}

function PUT(postData, dataLink) {
    $.ajax({
        async: true,
        type: 'put',
        url: baseURL + dataLink,
        data: postData,
        success: function(response) {
            var conOperaciones = operacion(response,false);
            if(! conOperaciones){
                //window.location = response;
            }
        },
        error:function(xhr){
            if (xhr.status == 422 ){
                var html='<ul>';
                $.each(xhr.responseJSON,function(index,value){
                    html=html+"<li>"+value+"</li>";
                });
                html=html+"</ul>";
                mensaje(html,'danger','true');
            }
        }
    })
}



function POST(postData, dataLink) {
    $.ajax({
        async: true,
        type: 'post',
        url: baseURL + dataLink,
        data: postData,
        success: function(response) {
            var conOperaciones = operacion(response,false);
            if(! conOperaciones){
                //window.location = response;
            }
        },
        error:function(xhr){
            if (xhr.status == 422 ){
                var html='<ul>';
                $.each(xhr.responseJSON,function(index,value){
                    html=html+"<li>"+value+"</li>";
                });
                html=html+"</ul>";
                mensaje(html,'danger','true');
            }
        }
    })
}

function VALID(form,data,metodo,link) {
    var inpp = $(form).find(':input').not('').addClass('a_validado');


    $.ajax({
        async: true,
        type: metodo,
        url: baseURL + link,
        data: data,
        success: function(response) {
            //$(form).attr('name',)
        },
        error:function(xhr){
            if (xhr.status == 422 ){

            }
        }
    })

}

//
// function operaciones(response) {
//     var retorno = false;
//     if(isJson(response))
//     {
//         var json = JSON.parse(response);
//         retorno = true;
//         for (operacion in json) {
//
//             switch (operacion) {
//                 case 'cargarTabla':
//                     cargarTablas();
//                     ocultarModal();
//                     break;
//                 case 'html':
//                     $(json.id_content).html(json.html);
//                     ocultarModal();
//                     break;
//                 case "html_append":
//                     var html = $(json.id_content).html();
//                     $(json.id_content).html(html + json.html_append);
//                     ocultarModal();
//                     break;
//                 case 'fadeOut':
//                     $(json.id_content).fadeOut();
//                     ocultarModal();
//                     break;
//                 case 'html_remplace':
//                     var element = $(json.id_content);
//                     element.replaceWith(json.html_remplace);
//                     ocultarModal();
//                     break;
//                 case 'mensaje':
//                     mensaje(json.mensaje,json.tipo_mensaje,json.permanente);
//                     //mostrar mensaje;
//                     break;
//
//             }
//         }
//
//     }
//     return retorno;
// }

function isJson(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}

function mensaje(mensaje,tipo,permanente){
    if (modalIsActiv()){
        var elemento_mensaje = $(modalIsActiv()).find('.mensaje_modal');
    }else{
        var elemento_mensaje = $('#mensaje');
    }

    var clase = ' dimissable resaltar forma forma-'+tipo;

    var boton = '<span class="glyphicon glyphicon-remove borrar"></span>';

    if($('#div_mensaje').length && $('#div_mensaje').is(":visible")){
        $('#list_mensaje').html('<li>'+mensaje+'</li>');
        $('#div_mensaje').removeClass().addClass(clase);
    }else {
        elemento_mensaje.html('<div id="div_mensaje" class="'+clase+'">'+ boton +'<ul class="list-unstyled" id="list_mensaje"><li>'+ mensaje +'</li></ul></div>');// '<div id="div_mensaje" class="'+clase+'">'+ boton + mensaje + '</div>';
        if (permanente == 'true')
        {
            elemento_mensaje.fadeIn(400).delay(3000);
        }else{
            elemento_mensaje.fadeIn(400).delay(3000).fadeOut(400);
        }
    }



}
function modalIsActiv() {
    var retorno= false;
    $.each($('.modal'),function () {
       if ($(this).hasClass('in'))
       {
           retorno = this;
       }
    });
    return retorno;
}

function ocultarModal()
{
    $('#myModal').modal('hide');
    $('.modal').modal('hide');
}