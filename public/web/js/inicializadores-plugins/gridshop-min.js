$('#grid').click(function() {
    $(this).addClass("active");
    $("#list").removeClass("active");
    $("ul.prodlist-grid").fadeOut(300, function() {
        $(this).addClass("grid").removeClass("list").fadeIn(300)
    });
});

$('#list').click(function() {
    $(this).addClass("active");
    $("#grid").removeClass("active");
    $("ul.prodlist-grid").fadeOut(300, function() {
        $(this).removeClass("grid").addClass("list").fadeIn(300)
    });
});

/*var width = $(".list_filtro").width();
var value1 = document.getElementById("accesos");
value1.setAttribute("style", "width:"+width+"px");*/



/*MENU FIXED
jQuery(document).ready(function() {
    // define variables
    var navOffset = 500, scrollPos = 0;
    // function to run on page load and window resize
    function stickyUtility() {
        // only update navOffset if it is not currently using fixed position
        if (!jQuery(".section_catalogo").hasClass("bar-fixed")) {
            
        }
        // apply matching height to nav wrapper div to avoid awkward content jumps
        //jQuery(".section_catalogo").height(jQuery(".list_filtro").outerHeight());


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
            jQuery("#accesos").addClass("bar-fixed");
        } else {
            jQuery("#accesos").removeClass("bar-fixed");
        }
    });
});*/