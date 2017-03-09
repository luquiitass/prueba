/**
 * Created by lucas on 18/09/16.
 */

    $(document).on('focus','.datepicker',function () {
        $(this).datepicker({
            format: "dd-mm-yyyy",
            language: "es",
            autoclose: true,
        });
    });

    $(document).on('focus','.timepicker',function () {
        $(this).timepicker({
            minuteStep: 1,
            showSeconds: true,
            showMeridian: false,
            defaultTime: false
        });
    });


    $('div_datepicker',function () {
        var dateFormat = "mm-dd-yy";
        var inicio= $(this).find('.inicio');
        var fin =$(this).find('.fin');
        $(inicio).datepicker({
            format: "dd-mm-yyyy",
            language: "es",
            autoclose: true
        }).on( "change", function() {
            to.datepicker( "option", "minDate", getDate( this ) );
        }),

        to = $(fin).datepicker({
            format: "dd-mm-yyyy",
            language: "es",
            autoclose: true,
        }).on( "change", function() {
            $(inicio).datepicker( "option", "maxDate", getDate( this ) );
         });

    });
    $(document).on('focus','.autocomplete',function () {
        var url = $(this).data('link');
        var form = $(this).data('form');

        $(this).autocomplete({
            serviceUrl:url,
            onSelect: function (suggestion) {
                completarForm(form,suggestion);
                //alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
            }
        });

    });


    $(document).on('click','.link',function (e) {
        var url = $(this).attr('href');
        f_Gett(url);
        e.preventDefault();
        return false;
    })

    $(document).on('click','.borrar',function () {
        $(this).parent('.dimissable').slideUp(300).fadeOut();
        $(this).parent('.dimissable').replaceWith("");
    });

    $('.switch_edit').bootstrapToggle().change(function () {
        var estado = $(this).prop('checked');
        var div_contenedor = $(this).parents('.col-form')[0];
        var form = $(div_contenedor).find('form')[0];

        $(form).find(':input').each(function () {
            $(this).prop('disabled', estado);
        });

        $(form).find('a').toggle(!estado);


    }).bootstrapToggle('on');

    $(document).on('focus click','.autocomplete',function () {
        var url = $(this).data('link');
        var form = $(this).data('form');

        $(this).autocomplete({
            serviceUrl: url,
            onSelect: function (suggestion) {
                completarForm(form, suggestion);
                //alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
            }
        });
    });

    /*  -------------------Alta-Edit  de Jugador--------------------*/


function getDate( element ) {
    var dateFormat = "mm-dd-yy";
    var date;
    try {
        date =element.value;
    } catch( error ) {
        date = null;
    }

    return date;
}
conUsuario('#form_create_jugador');

        function conUsuario(form) {
            if ($(form).find('.con_usuario').length > 0){
                $(form).find('.sin_usuario').show();
                $(form).find('.con_usuario').hide();
                limpiarForm(form);
            }

            $(form).find('.autocomplete').prop('disabled', false);

            $(form).find('#div_imagen_jcrop > a').addClass('disabled');
            $(form).find('input[name=nombre]').prop('disabled', true);
            $(form).find('input[name=apellido]').prop('disabled', true);
            $(form).find('input[name=fecha_nacimiento]').prop('disabled', true);
            $(form).find('input[name=alias]').prop('disabled', true);
            $(form).find('input[name=peso]').prop('disabled', true);
            $(form).find('input[name=altura]').prop('disabled', true);
        }

        function sinUsuario(form) {
            if ($(form).find('.con_usuario').length > 0){
                $(form).find('.con_usuario').show();
                $(form).find('.sin_usuario').hide();
                limpiarForm(form);
            }
            $(form).find('.autocomplete').prop('disabled', true);

            $(form).find('#div_imagen_jcrop >a').removeClass('disabled');
            $(form).find('input[name=user_id]').prop('value','');
            $(form).find('input[name=nombre]').prop('disabled', false);
            $(form).find('input[name=apellido]').prop('disabled', false);
            $(form).find('input[name=fecha_nacimiento]').prop('disabled', false);
            $(form).find('input[name=alias]').prop('disabled', false);
            $(form).find('input[name=peso]').prop('disabled', false);
            $(form).find('input[name=altura]').prop('disabled', false);
        }

        function completarForm(form,data) {
            $(form).find('input[name=user_id]').prop('value', data.data);
            $(form).find('input[name=nombre]').prop('value', data.nombre);
            $(form).find('input[name=apellido]').prop('value', data.apellido);
            $(form).find('input[name=fecha_nacimiento]').prop('value', data.fecha_nacimiento);

            $(form).find('input[name=alias]').prop('value', 'a completar');
            $(form).find('input[name=peso]').prop('value', 'a completar');
            $(form).find('input[name=altura]').prop('value', 'a completar');
        }

/*  -------------------Alta-Edit  de Jugador--------------------*/

function operacion(response,isJSON) {
    var retorno = false;
    if(isJson(response) || isJSON)
    {
        if (! isJSON){
            var json = JSON.parse(response);
        }else{
            var json = response;
        }

        retorno = true;


        for(obj in json){

            if (typeof json[obj] == 'object'){
                operacion(json[obj],true);
            }else{

                switch (obj) {
                    case 'cargarTabla':
                        cargarTablas();
                        ocultarModal();
                        break;
                    case 'html':
                        $(json.id_content).html(json.html);
                        ocultarModal();
                        break;
                    case "html_append":
                        var html = $(json.id_content).html();
                        $(json.id_content).html(html + json.html_append);
                        ocultarModal();
                        break;
                    case 'fadeOut':
                        $(json.id_content).fadeOut("slow");
                        ocultarModal();
                        break;
                    case 'html_remplace':
                        var element = $(json.id_content);
                        element.replaceWith(json.html_remplace);
                        ocultarModal();
                        break;
                    case 'mensaje':
                        mensaje(json.mensaje,json.tipo_mensaje,json.permanente);
                        //mostrar mensaje;
                        break;
                    case 'tab_activo':
                        activarTab(json.tab_activo);
                        break;
                    case 'desactivar_tabs':
                        desactivarTabs();
                        break;
                    case 'selectElement':
                        selectElement_a(json.id_content);
                        break;
                    case 'url':
                        window.location = json.url;
                        break;
                    case 'limpiar_form':
                        limpiarForm(json.limpiar_form)
                        break;
                    case 'hide_modal':
                        ocultarModal();
                        break
                }

            }

        }
    }
    return retorno;
}


function cargarTablas(){
    var sum=0;
    $('.datatable').each(function() {
        sum = sum + 1;
        var table_id = $(this).attr('id');
        var link = $(this).attr('value');
        var columnas = new Array();

        $(this).find('.col_table').each(function () {
            var name = $(this).data('name');
            if (name == 'operaciones') {
                columnas.push({
                    data: 'action'/*, name: 'action',*/,
                    orderable: false,
                    searchable: $(this).data('searchable') == 1 ? 'true' : 'false',
                    orderable: $(this).data('searchable') == 1 ? 'true' : 'false'
                });
            } else {
                var unaColumna = {
                    data: $(this).data('name')/*, name: $(this).text(),*/,
                    searchable: $(this).data('searchable') == 1 ? 'true' : 'false',
                    orderable: $(this).data('searchable') == 1 ? 'true' : 'false'
                };
                columnas.push(unaColumna);
            }
        });


        if ($.fn.DataTable.isDataTable('#' + table_id)) {
            dataTable.destroy();
        } else{
            dataTable = $('#' + table_id).DataTable({
                //paging: false,
                //searching: false,
                // dom: 'Bfrtip',
                // buttons: [
                //     'copy', 'csv', 'excel', 'pdf', 'print'
                // ],
                responsive: true,
                language: {url: baseURL + '/plugins/datatables/dt_es.json'},
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: link,
                columns: columnas
                //columnas
            });
        }
    });
}

function cargarSelect() {
    $('.selectAC').each(function () {
        var select_id = $(this).attr('id');
        var link = $(this).data('link');

        $("#" + select_id).autocomplete({
            minLength: 1,
            //source: baseURL + link
            source: function(term, response){
                $.getJSON(baseURL + link, { q: term }, function(data){
                    response(data);
                });
            }
        });
    });
}

function cargarSelect2() {

    $.each($('.select2'),function () {
        var selects = $(this).data('id_selects') || [];
        var url = $(this).data('url');
        var holder = $(this).data('holder') || "";

        var s2 = $(this).select2({
            // tags: true,
             placeholder: holder,
             minimumInputLength: 2,
             language: "es",
             allowClear: true,
            ajax: {
                url: baseURL + url,
                dataType: 'json',
                data: function (params) {
                    return {
                        term: params.term
                    }
                },
                processResults: function (data, page){
                    return {
                        results: data
                    };
                }
            }
        });
        s2.val(selects).trigger('change');
    });
}

function cargarSelectCategoria() {
    $(".select2-basic-multiple").select2({
        placeholder: $(this).data('placeholder')
    });
}

function getProvincia(obj,pais) {
    var objects = [];
    $.each(obj,function (index,val) {
        if (val.nombre == pais){
            objects.push(val.provincias);
            return false;
        }
    });
    return objects;
}

function desactivarTabs() {
    $('li').removeClass('active');
    $('.tab-pane').removeClass('in active');
}

function activarTab(id) {
    $('#'+id).addClass('in active');
    $("a[href=#"+id+"]").parent('li').addClass('active');
}

function activarTabs(array_tab) {
    desactivarTabs();
    $.each(array_tab,function (index,       tab) {
        activarTab(tab);
    });
}

function getObjects(obj, key, val) {
    var objects = [];
    for (var i in obj) {
        if (!obj.hasOwnProperty(i)) continue;
        if (typeof obj[i] == 'object') {
            objects = objects.concat(getObjects(obj[i], key, val));
        } else if (i == key && obj[key] == val) {
            objects.push(obj);
        }
    }
    return objects;
}

function sortResults(json,prop, asc) {
    retorno = json.sort(function(a, b) {
        if (asc) {
            return (a[prop] > b[prop]) ? 1 : ((a[prop] < b[prop]) ? -1 : 0);
        } else {
            return (b[prop] > a[prop]) ? 1 : ((b[prop] < a[prop]) ? -1 : 0);
        }
    });
    return retorno;
}

function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

function selectTabsOfUrl() {
    var sParam= 'tab'
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    var borrarTab=true;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {

            if ( sParameterName[1])
            {
                if(borrarTab){
                    desactivarTabs();
                    borrarTab=false;
                }
                activarTab(sParameterName[1])
            }
            //return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

function selectElement_a(id) {
    // $('<a href="#'+id+'" ></a>').trigger( "click" );
    window.location.href =decodeURIComponent(window.location.search.substring(1))+'#'+id ;

}

function limpiarForm(form) {

    var arr = $(form).find(':input').each(function () {
        if(($(this).attr('name') != '_token') && ! $(this).prop('hide'))
        {
            if($(this).attr('type') == 'checkbox'){
                $(this ).prop( "checked", false );
            }else{
                $(this).prop('value', '');
            }

        }
    });

}

function validar(form) {
    var val = form.validate();
    return val.form();
}

function readURL(input,id_img){
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {

            $('#div_fot').replaceWith('<div id="div_fot"><img id="fot" src="" alt=""></div>');

            $(id_img).attr('src', e.target.result);

            $(id_img).load(function () {

                addCrop(id_img);
                $('.con_imagen').show();
            });

        }
        reader.readAsDataURL(input.files[0]);
    }
}

function cargando(elem) {
    if (false)
    {
        var alfa = elem;
    }else{
        var alfa = $(elem).parents('.alfa')[0];
    }
    var html_cargando =
        '<div class="cargando" id="div_cargando">' +
            '<a class="center-block text-center " href="#">' +
                '<i class="fa fa-spinner fa-pulse fa-5x fa-fw"></i>' +
                '<p class="text-blue">Cargando</p>' +
            '</a>' +
        '</div>';
    $(alfa).append(html_cargando);
    }

function eliminarCargando()
{
    $('#div_cargando').replaceWith('');
}



