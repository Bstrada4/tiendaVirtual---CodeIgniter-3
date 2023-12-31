/* ------------------------------- */

$(document).on('submit', '.formulario', function() {
    $.blockUI({css: {border: 'none', overflow: 'hidden !important', padding: '15px', backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .5, color: '#fff'}});
    var formulario = $(this);
    var metodoEnvio = formulario.attr('method');
    $.ajax({
        url: formulario.attr('action'),
        type: metodoEnvio,
        data: formulario.serialize(),
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(response) {
            $.unblockUI({});
            formulario.find('.respuesta').html(response);
        }, 
        error: function(){
            $.unblockUI({});
            alert('Ha ocurrido un error interno.');
        }
    });
    return false;
});

/* ------------------------------- */

$(document).on('click', '.removerInfo', function(e) {
    e.preventDefault();
    vinculo = $(this).attr("data-url");
    respuesta = $(this).attr("data-response");
    alertify.confirm('<h4 class="text-bold">¿Estas seguro que deseas continuar?</h4><p>Recuerda que la eliminación es permanente.</p>')
        .set('title', '<span class="text-warning"><i class="fa fa-exclamation-triangle"></i> Advertencia</span>')
        .set('labels', {ok: 'Continuar', cancel: 'Cancelar'})
        .set('onok', function() {
            $.blockUI({css: {border: 'none', overflow: 'hidden !important', padding: '15px', backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .5, color: '#fff'}});
            $.post(getUrl+vinculo, 
            { }, 
            function (response) {
                alertify.closeAll();
                $.unblockUI({});
                $('.'+respuesta).html(response);
            });
            return false;
        })
        .set('oncancel', function(){
            alertify.error("Se canceló el proceso.");
        });
});

/*--------------------------*/

$(document).on('click', '.removerInfoTotal', function(e) {
    e.preventDefault();
    vinculo = $(this).attr("data-url");
    respuesta = $(this).attr("data-response");
    alertify.confirm('<h4 class="text-bold">¿Estas seguro que deseas continuar?</h4><p>Recuerda que la eliminación es permanente.</p>')
        .set('title', '<span class="text-warning"><i class="fa fa-exclamation-triangle"></i> Advertencia</span>')
        .set('labels', {ok: 'Continuar', cancel: 'Cancelar'})
        .set('onok', function() {
            $.blockUI({css: {border: 'none', padding: '15px', backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .5, color: '#fff'}});
            $.post(getUrl+vinculo, 
            {
                checkRemover: $("input[name='checkRemover']").serializeArray()
            }, 
            function (response) {
                alertify.closeAll();
                $.unblockUI({});
                $('.'+respuesta).html(response);
            });
            return false;
        })
        .set('oncancel', function(){
            alertify.error("Se canceló el proceso.");
        });
});

/* ------------------------------- */

$(document).on('click', '.procesarInfo', function(e) {
    e.preventDefault();
    vinculo = $(this).attr("data-url");
    respuesta = $(this).attr("data-response");
    alertify.confirm('<h4 class="text-bold">¿Estas seguro que deseas continuar?</h4><p>Recuerda que estas continuando según tu consentimiento.</p>')
        .set('title', '<span class="text-warning"><i class="fa fa-exclamation-triangle"></i> Advertencia</span>')
        .set('labels', {ok: 'Continuar', cancel: 'Cancelar'})
        .set('onok', function() {
            $.blockUI({css: {border: 'none', overflow: 'hidden !important', padding: '15px', backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .5, color: '#fff'}});
            $.post(getUrl+vinculo, 
            { }, 
            function (response) {
                alertify.closeAll();
                $.unblockUI({});
                $('.'+respuesta).html(response);
            });
            return false;
        })
        .set('oncancel', function(){
            alertify.error("Se canceló el proceso.");
        });
});


/* ------------------------------- */

$(document).on('click', '.procesarConfirmacion', function(e) {
    e.preventDefault();
    vinculo = $(this).attr("data-url");
    respuesta = $(this).attr("data-response");
    alertify.confirm('<h4 class="text-bold">¿Estas seguro que deseas continuar?</h4>')
        .set('title', '<span class="text-warning"><i class="fa fa-exclamation-triangle"></i> Advertencia</span>')
        .set('labels', {ok: 'Continuar', cancel: 'Cancelar'})
        .set('onok', function() {
            $.blockUI({css: {border: 'none', overflow: 'hidden !important', padding: '15px', backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .5, color: '#fff'}});
            $.post(getUrl+vinculo, 
            { }, 
            function (response) {
                alertify.closeAll();
                $.unblockUI({});
                $('.'+respuesta).html(response);
            });
            return false;
        })
        .set('oncancel', function(){
            alertify.error("Se canceló el proceso.");
        });
});

/* ------------------------------- */

$(document).ready(function(){
    /*
     * ----------------------------------
     * SCRIPT PARA LA RECARGA DEL CAPTCHA
     * ----------------------------------
     */
    $('#refrescarCaptcha').on('click', function (){
        $.blockUI({css: {border: 'none', overflow: 'hidden !important', padding: '15px', backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .5, color: '#fff'}});
        $.post(baseUrl+'generar/captcha', 
        { }, 
        function (response) {
            $.unblockUI({});
            $('#obtenerCaptcha').html(response);
        });
    });
});
/*
 * ----------------------------------
 * Activar destacado registros
 * ----------------------------------
 */
function activaDestacadoProducto(id, inputId){
    $(document).ready(function() {
        $.blockUI({css: {border: 'none', padding: '15px', backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .5, color: '#fff'}});
        $.post(baseUrl+'sistema/webProducto/proceso/destacado', 
        { 
            id: id, 
            check: $('#'+inputId).is(':checked')
        }, 
        function (response) {
            $.unblockUI({});
            $('.respuesta').html(response);
        });
    });
}


/*
 * -------------------------------------
 * SCRIPT PARA ORDENAR POSICION DE ITEMS
 * -------------------------------------
 */

function ordenarItems(id, posicionNueva, enlace, respuesta){
    $(document).ready(function(){
        $.blockUI({css: {border: 'none', overflow: 'hidden !important', padding: '15px', backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .5, color: '#fff'}});
        $.post(getUrl+enlace, 
        { id: id, posicionNueva: $('#'+posicionNueva).val() }, 
        function (response) {
            $.unblockUI({});
            $('.'+respuesta).html(response);
        });
    });
    return false;
}

function ordenarSubitems(id, posicionNueva, enlace, respuesta,categoria){
    $(document).ready(function(){
        $.blockUI({css: {border: 'none', overflow: 'hidden !important', padding: '15px', backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .5, color: '#fff'}});
        $.post(getUrl+enlace, 
        { id: id, posicionNueva: $('#'+posicionNueva).val() , categoria: categoria}, 
        function (response) {
            $.unblockUI({});
            $('.'+respuesta).html(response);
        });
    });
    return false;
}

/*
 * -------------------------------------
 * SCRIPT PARA PROCESAR GESTION DE DATOS
 * -------------------------------------
 */
function procesarItems(id, enlace, respuesta){
    $(document).ready(function(){
        $.blockUI({css: {border: 'none', overflow: 'hidden !important', padding: '15px', backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .5, color: '#fff'}});
        $.post(getUrl+enlace, 
        { id: id}, 
        function (response) {
            $.unblockUI({});
            $('.'+respuesta).html(response);
        });
    });
    return false;
}


/*
 * --------------------------------------------
 * SCRIPT PARA ELIMINAR UN GRUPO DE INFORMACIÓN
 * --------------------------------------------
 */
$("#checkTodo").change(function () {
    if ($(this).is(':checked')) {
        //$("input[type=checkbox]").prop('checked', true); //todos los check
        $("#infoTable input[type=checkbox]").prop('checked', true); //solo los del objeto #diasHabilitados
    } else {
        //$("input[type=checkbox]").prop('checked', false);//todos los check
        $("#infoTable input[type=checkbox]").prop('checked', false);//solo los del objeto #diasHabilitados
    }
});


function init_contadorTa(idtextarea, idcontador, max){
    $(document).ready(function(){
        $("#"+idtextarea).keyup(function(){
            updateContadorTa(idtextarea, idcontador, max);
        });
        $("#"+idtextarea).change(function(){
            updateContadorTa(idtextarea, idcontador, max);
        });
    });
}

function updateContadorTa(idtextarea, idcontador,max){
    $(document).ready(function(){
        var contador = $("#"+idcontador);
        var ta = $("#"+idtextarea);
        contador.html("0/"+max);
        contador.html(ta.val().length+"/"+max);
        if(parseInt(ta.val().length)>max){
            ta.val(ta.val().substring(0,max-1));
            contador.html(max+"/"+max);
        }
    });
}
