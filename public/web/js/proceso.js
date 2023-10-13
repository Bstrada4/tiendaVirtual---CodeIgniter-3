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




function productosIniciales() {
    $.ajax({
        type: "POST",
        dataType: 'json',
        url: base_url + 'productos/listar',
        data: {},
        success: function (response) {
            var total = Object.keys(response).length;
            if(total == 1){
                $('.catg-result').text(total + ' producto');
            } else {
                $('.catg-result').text(total + ' productos');    
            }
            
            if(total > 0){
                for (var i = 0; i < total; i++) {
                    if (response[i].id !== null) {
                        $(".product-list-ajax").append('<li class="pogrid">\n\
                            <div class="single-prodsta">\n\
                                <div class="product-img-wrap"> \n\
                                    <a class="product-img" href="#"><img src="'+response[i].imagen+'" width="100%"></a>\n\
                                </div>\n\
                                <div class="prodst-info">\n\
                                    <h4>'+response[i].titulo+'</h4>\n\
                                    <span>'+response[i].subtitulo+'</span>\n\
                                    <div class="box_foot">\n\
                                        <div class="circles">\n\
                                            <span></span><span></span><span></span>\n\
                                        </div>\n\
                                        <div class="pro-price">\n\
                                            <span>S/'+response[i].precio+'</span>\n\
                                        </div>\n\
                                    </div>\n\
                                    <p class="info_list">'+response[i].descripcion+'</p>\n\
                                    <ul class="list_actions">\n\
                                        <li><a href="javascript:void(0);" onclick="add_cart('+response[i].id+')"><i class="fad fa-cart-plus"></i></a></li>\n\
                                    </ul>\n\
                                </div>\n\
                            </div></li>');
                    } 
                }
            }else {
                $(".product-list-ajax").append('<h3>No hay productos</h3>');
            }
            $("#login-tab").addClass("active");
            $("#logintab").addClass("active");
        }
    });
}
productosIniciales();


function filter_collection(id_collection) {
    $('.li-ul').on('click', function(){
        $(".active").removeClass("active");
        $('#collection-'+id_collection).addClass("active");
    });
    $(".product-list-ajax").empty();
    $.ajax({
        type: "POST",
        dataType: 'json',
        url: base_url + 'productos/filtrar',
        data: { categoria : id_collection},
        success: function (response) {
            var total = Object.keys(response).length;
            if(total == 1){
                $('.catg-result').text(total + ' producto');
            } else {
                $('.catg-result').text(total + ' productos');    
            }
            if(total > 0){
                for (var i = 0; i < total; i++) {
                    if (response[i].id !== null) {
                        $(".product-list-ajax").append('<li class="pogrid">\n\
                            <div class="single-prodsta">\n\
                                <div class="product-img-wrap"> \n\
                                    <a class="product-img" href="#"><img src="'+response[i].imagen+'" width="100%"></a>\n\
                                </div>\n\
                                <div class="prodst-info">\n\
                                    <h4>'+response[i].titulo+'</h4>\n\
                                    <span>'+response[i].subtitulo+'</span>\n\
                                    <div class="box_foot">\n\
                                        <div class="circles">\n\
                                            <span></span><span></span><span></span>\n\
                                        </div>\n\
                                        <div class="pro-price">\n\
                                            <span>S/'+response[i].precio+'</span>\n\
                                        </div>\n\
                                    </div>\n\
                                    <p class="info_list">'+response[i].descripcion+'</p>\n\
                                    <ul class="list_actions">\n\
                                        <li><a href="javascript:void(0);" onclick="add_cart('+response[i].id+')"><i class="fad fa-cart-plus"></i></a></li>\n\
                                    </ul>\n\
                                </div>\n\
                            </div></li>');
                    } 
                }
                
            }else {
                $(".product-list-ajax").append('<h3>No hay productos</h3>');
            }
            $("#login-tab").addClass("active");
            $("#logintab").addClass("active");
        }
    });
}




$('#select-order').on('change', function() {
    $(".product-list-ajax").empty();
    $.ajax({
        type: "POST",
        dataType: 'json',
        url: base_url + 'productos/ordenar',
        data: { posicion : this.value },
        success: function (response) {
            var total = Object.keys(response).length;
            if(total > 0){
                for (var i = 0; i < total; i++) {
                    if (response[i].id !== null) {
                        $(".product-list-ajax").append('<li class="pogrid">\n\
                            <div class="single-prodsta">\n\
                                <div class="product-img-wrap"> \n\
                                    <a class="product-img" href="#"><img src="'+response[i].imagen+'" width="100%"></a>\n\
                                </div>\n\
                                <div class="prodst-info">\n\
                                    <h4>'+response[i].titulo+'</h4>\n\
                                    <span>'+response[i].subtitulo+'</span>\n\
                                    <div class="box_foot">\n\
                                        <div class="circles">\n\
                                            <span></span><span></span><span></span>\n\
                                        </div>\n\
                                        <div class="pro-price">\n\
                                            <span>S/'+response[i].precio+'</span>\n\
                                        </div>\n\
                                    </div>\n\
                                    <p class="info_list">'+response[i].descripcion+'</p>\n\
                                    <ul class="list_actions">\n\
                                        <li><a href="javascript:void(0);" onclick="add_cart('+response[i].id+')"><i class="fad fa-cart-plus"></i></a></li>\n\
                                    </ul>\n\
                                </div>\n\
                            </div></li>');
                    } 
                }
                
            }else {
                $(".product-list").append('<h3>No hay productos</h3>');
            } 
            $("#login-tab").addClass("active");
            $("#logintab").addClass("active");  
        }
    });
});





