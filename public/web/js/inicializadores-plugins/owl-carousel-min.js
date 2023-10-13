$('.categorias').owlCarousel({
    loop: true,
    margin: 20,
    nav: true,
    dots: false,
    navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    responsive:{
        0:{
            items:1
        },
        550:{
            items:2
        },
        767:{
            items:3
        },
        1000:{
            items:3
        },
        1200:{
            items:4
        }
    },
    autoplay: false,
    autoplayTimeout: 4000,
    autoplayHoverPause: false
});

$('.marcas').owlCarousel({
    loop: true,
    margin: 30,
    nav: true,
    dots: false,
    navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    responsive:{
        0:{
            items:2
        },
        700:{
            items:3
        },
        1000:{
            items:5
        }
    },
    autoplay: false,
    autoplayTimeout: 4000,
    autoplayHoverPause: false
});

$('.list_contacto').owlCarousel({
    loop: true,
    margin:0,
    nav: false,
    dots: false,
    navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    items: 1,
    center:true,
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: false
});

$('.nutricion').owlCarousel({
    loop: true,
    margin:0,
    nav: false,
    dots: true,
    navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    items: 1,
    center:true,
    autoplay: false,
    touchDrag  : false,
    mouseDrag  : false,
    autoplayTimeout: 4000,
    autoplayHoverPause: false
});