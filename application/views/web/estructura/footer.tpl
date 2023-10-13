{strip}

{*JQUERY*}
<script type="text/javascript" src="{$base_url}public/plugins/jquery/jquery.min.js"></script>

{*JQUERY UI*}
<script type="text/javascript" src="{$base_url}public/plugins/jquery-ui/jquery-ui.min.js"></script>

{*BOOTSTRAP*}
<script src="{$base_url}public/plugins/bootstrap/assets/js/vendor/popper.min.js"></script>
<script src="{$base_url}public/plugins/bootstrap/dist/js/bootstrap.min.js"></script>

{*FONT AWESOME*}
<script src="{$base_url}public/plugins/font-awesome/font-awesome-5-min.js"></script>

{*OWL - CAROUSEL*}
{if isset($owl_carousel)}
<script src="{$base_url}public/plugins/owlcarousel/dist/owl.carousel.min.js"></script>
<script src="{$base_url}public/web/js/inicializadores-plugins/owl-carousel-min.js"></script>
{/if}

{*Light Gallery Plugin Js*}
{if isset($light_gallery)}
<script src="{$base_url}public/plugins/light-gallery/dist/js/lightgallery-all.js"></script>
<script src="{$base_url}public/plugins/light-gallery/modules/lg-thumbnail.min.js"></script>
<script src="{$base_url}public/plugins/light-gallery/modules/lg-fullscreen.min.js"></script>
<script type="text/javascript" src="{$base_url}public/web/js/inicializadores-plugins/light-gallery-min.js"></script>
{/if}


{if isset($efectoletters)}
<script type="text/javascript" src="{$base_url}public/plugins/type_js/js/typed.js"></script>
<script type="text/javascript" src="{$base_url}public/web/js/inicializadores-plugins/initialization-type-min.js"></script>
{/if}

{if isset($mixitup_col3)}
<script src="{$base_url}public/plugins/mixitup/mixitup-min.js"></script>
<script src="{$base_url}public/web/js/inicializadores-plugins/mixitup-min.js"></script>
{/if}

{*<!--script type="text/javascript">
$(document).ready(function() {
	$('#modalinicio').modal('show');
	function modal(){
		$('#modalinicio').modal('hide');
	}
    setTimeout(modal, 13000);

});
</script-->*}

{if isset($accordion)}
<script type="text/javascript" src="{$base_url}public/web/js/inicializadores-plugins/accordion-min.js"></script>
{/if}


{if isset($slider)}
<script type="text/javascript" src="{$base_url}public/web/js/inicializadores-plugins/slider-min.js"></script>
{/if}

{*STICK PARENT*}
{if isset($stick_parent)}
<script src="{$base_url}public/plugins/stick-parent/stick-parent-min.js"></script>
<script src="{$base_url}public/web/js/inicializadores-plugins/stick-parent-ini-min.js"></script>
{/if}

{*GRID SHOP*}
{if isset($grid_shop)}
<script src="{$base_url}public/web/js/inicializadores-plugins/gridshop-min.js"></script>
{/if}

{if isset($img_move)}
<script src="{$base_url}public/web/js/inicializadores-plugins/img-move-min.js"></script>
{/if}

{*PAGE CARGA*}
{if isset($page_carga)}
<script src="{$base_url}public/plugins/page_carga/js/prefixfree-min.js"></script>
<script src="{$base_url}public/plugins/page_carga/js/index.js"></script>
{/if}

{*SCRIPT BLOCK UI AND ALERTIFY*}
<script src="{$baseUrl}public/plugins/blockUI/jquery.blockUI.js"></script>
<script src="{$baseUrl}public/plugins/alertifyjs/alertify.js"></script>

{*SCRIPT GENERAL*}
<script type="text/javascript" src="{$base_url}public/web/js/script-min.js"></script>
<script type="text/javascript" src="{$base_url}public/web/js/login.min.js"></script>
{if isset($productos_script)}
<script type="text/javascript" src="{$base_url}public/web/js/proceso.js"></script>
{/if}
{if isset($busqueda_script)}
<script type="text/javascript" src="{$base_url}public/web/js/busqueda.js"></script>
{/if}
{*GOOGLE MAPS*}
{if isset($maps)}
<!--script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;key=AIzaSyCUruOZGZVXOsZHNwa9UckAahh_bwnOAPM&callback"></script-->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCUruOZGZVXOsZHNwa9UckAahh_bwnOAPM&callback"></script>
<script src="{$base_url}public/plugins/googlemaps/googlemaps-min.js"></script>
{/if}

<script>
	$('#clic-modal-1').click(function(){
	    $("#login-tab").addClass("active");
	    $("#logintab").addClass("active");
	});  
</script>

</body>

</html>
{/strip}