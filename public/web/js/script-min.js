/*global NaN 
$(window).on('load', function () {
    setTimeout(function () {
        $(".loader-page").css({visibility:"hidden",opacity:"0",transition:"all ease 1s"});
    }, 8000);

    setTimeout(function () {
        $(".loader-page").empty();
    }, 10000);
    /*$(".loader-page").css({visibility:"hidden",opacity:"0"}) 
});

/*------------BTN SERVICIOS MENU-------------*/
$('#btn-search').click(function(){
    $('.search_top').toggleClass('show');
});



/*CARRITO DE COMPRAS FIXED*/

$('#open_cart').click(function(){
    $('.fixed_carrito').addClass('active');
});

$('#close_cart').click(function(){
    $('.fixed_carrito').removeClass('active');
});

                                  




/**/
$('.item_menu_service').click(function(){
    $(this).toggleClass('active');
    $('#service_menu').toggleClass('active');
});


/*MENU CELULAR*/
$('#toggle_cel').click(function(){
    $(".menu_celular").addClass('open');
});
$('#close_menu_cel').click(function(){
    $(".menu_celular").removeClass('open');
});


/*MENU FIXED*/
jQuery(document).ready(function() {
    // define variables
    var navOffset, scrollPos = 0;
    // function to run on page load and window resize
    function stickyUtility() {
        // only update navOffset if it is not currently using fixed position
        if (!jQuery(".conten_nav").hasClass("head-navfixed")) {
            navOffset = jQuery(".conten_nav").offset().top;
        }
        // apply matching height to nav wrapper div to avoid awkward content jumps
        jQuery(".navigation-allgs").height(jQuery(".content_menu").outerHeight());
    } // end stickyUtility function
    // run on page load
    stickyUtility();
    // run on window resize
    jQuery(window).resize(function() {
        stickyUtility();
    });
    // run on scroll event
    jQuery(window).scroll(function() {
        scrollPos = jQuery(window).scrollTop();
        if (scrollPos > navOffset) {
            jQuery(".conten_nav").addClass("head-navfixed");
        } else {
            jQuery(".conten_nav").removeClass("head-navfixed");
        }
    });
});



$(".input_cant").on("keyup keydown change",function(event){
    var rowid = $(this).attr("data-id");
    var quantity = $(this).val();
    $(document).ready(function() {
        $.post(base_url + 'carrito/editar',
                {rowid: rowid, quantity: quantity },
        function(response) {
            setTimeout(function() {
                location.reload();
            }, 300);
        }, 'json');
    });
    return false;
});


function filter_categoria(id) {
    $(document).ready(function() {
        $.post(base_url + 'productos/categoria',
                {categoria: id},
        function(response) {
            window.location.href = base_url + 'productos';
        }, 'json');
    });
    return false;
}

function add_cart(id) {
	$(document).ready(function() {
        $.post(base_url + 'carrito/agregar',
                { id: id },
        function(response) {
            $(".list_productos").empty();
            var total = Object.keys(response).length;
            if(total > 0){
                for (var i = 0; i < total; i++) {
                    if (response[i].id !== null) {
                        $(".list_productos").append('<li id="'+response[i].rowidli+'">\n\
                            <a href="#"><img src="'+response[i].image+'" width="100%"></a>\n\
                            <div class="content_li">\n\
                                <a href="#" class="title">'+response[i].name+'</a>\n\
                                <a href="#" class="tags">'+response[i].collection+'</a>\n\
                                <span class="price">'+response[i].qty + ' x <b>'+response[i].price+'</b></span>\n\
                            </div>\n\
                            <a href="javascript:void(0);" class="remove_product" onclick="delete_cart('+response[i].rowid+')"><i class="fad fa-trash"></i></a>\n\
                        </li>');  
                    }
                }
                $('.counter').html(response[0].items);
                $('.qty-total').html(response[0].total);
            }
            $("#fixed-scritp").addClass("active");
            //$('.class-cart').click();
        }, 'json');
    });    
    return false;
}

function delete_cart(rowid) {
    $(document).ready(function() {
        $.post(base_url + 'carrito/eliminar',
                {rowid: rowid},
        function(response) {
            $('#'+response.rowid).remove();
        }, 'json');
    });
    return false;
}

$(".buscarItem").on("click", function() {
    var buscar = $(".buscando").val();
    var url_buscar = buscar.replace(/\s/g, "-");
    location.href = base_url + "buscar/" + url_buscar;
});

$(".buscando").on('keypress', function(e) {
    if (e.which == 13) {
        $(".buscarItem").trigger("click");
    }
});