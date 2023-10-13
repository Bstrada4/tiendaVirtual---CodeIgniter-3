/*MENU FIXED*/
jQuery(document).ready(function() {
    // define variables
    var navOffset, scrollPos = 0;
    // function to run on page load and window resize
    function stickyUtility() {
        // only update navOffset if it is not currently using fixed position
        if (!jQuery(".navigation-allgs").hasClass("head-navfixed")) {
            navOffset = jQuery(".navigation-allgs").offset().top;
        }
        //apply matching height to nav wrapper div to avoid awkward content jumps
        jQuery(".navigation-allgs").height(jQuery(".navbar_main").outerHeight());

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

