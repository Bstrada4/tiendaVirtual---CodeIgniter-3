<?php
/* Smarty version 3.1.36, created on 2020-08-05 22:46:03
  from '/home/s99ts68oq3kj/public_html/test/application/views/web/estructura/inter_footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f2b36ab726a16_82161623',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7b8f0b58143499207175e715fddc7e6ae4d5d57d' => 
    array (
      0 => '/home/s99ts68oq3kj/public_html/test/application/views/web/estructura/inter_footer.tpl',
      1 => 1595037916,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f2b36ab726a16_82161623 (Smarty_Internal_Template $_smarty_tpl) {
?>	<footer class="sect_foot"><section class="sect_main"><div class="container"><div class="row"><div class="col-lg-3"><div class="box_footer"><div class="box_head"><a href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/img/logo/logo-bl.png" width="100%"></a></div><div class="box_body"><p>Venimos trabajando en conjunto con nuestros clientes, consumidores mayoristas y minoristas, es por ustedes que hoy en día seguimos trabajando, para brindarles la mejor calidad en todos nuestros productos</p></div><div class="box_foot"><ul><?php if (!empty($_smarty_tpl->tpl_vars['facebook']->value)) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['facebook']->value;?>
" target="_blank"><span class="fa fa-facebook"></span></a></li><?php }
if (!empty($_smarty_tpl->tpl_vars['twitter']->value)) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['twitter']->value;?>
" target="_blank"><span class="fa fa-twitter"></span></a></li><?php }
if (!empty($_smarty_tpl->tpl_vars['instagram']->value)) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['instagram']->value;?>
" target="_blank"><span class="fa fa-instagram"></span></a></li><?php }
if (!empty($_smarty_tpl->tpl_vars['youtube']->value)) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['youtube']->value;?>
" target="_blank"><span class="fa fa-youtube"></span></a></li><?php }?></ul></div></div></div><div class="col-lg-3"><div class="box_footer marg_top"><div class="box_head"><h5>Enlaces</h5></div><div class="box_body"><ul class="list_enlaces"><li><a href="#"><span class="fa fa-chevron-right"></span> Libro de reclamaciones</a></li><li><a href="#"><span class="fa fa-chevron-right"></span> Términos y condiciones</a></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
nosotros"><span class="fa fa-chevron-right"></span> Nosotros</a></li><li><a href="#"><span class="fa fa-chevron-right"></span> Contacto</a></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
pedidos"><span class="fa fa-chevron-right"></span> Pedidos</a></li></ul></div></div></div><div class="col-lg-3"><div class="box_footer marg_top"><div class="box_head"><h5>Mapa de sitio</h5></div><div class="box_body"><ul class="list_enlaces"><li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
productos"><span class="fa fa-chevron-right"></span> Productos</a></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
nutricion"><span class="fa fa-chevron-right"></span> Nutrición</a></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
recetas"><span class="fa fa-chevron-right"></span> Recetas</a></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
mitos"><span class="fa fa-chevron-right"></span> Mitos</a></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
puntos-venta"><span class="fa fa-chevron-right"></span> Puntos de venta</a></li><li><a href="#"><span class="fa fa-chevron-right"></span> Delivery</a></li></ul></div></div></div><div class="col-lg-3"><div class="box_footer marg_top"><div class="box_head"><h5>Contacto</h5></div><div class="box_body"><ul class="owl-carousel list_contacto owl-theme"><?php if ($_smarty_tpl->tpl_vars['contacto_1_direccion']->value != '' || $_smarty_tpl->tpl_vars['contacto_1_telefono_i1_name']->value != '' || $_smarty_tpl->tpl_vars['contacto_1_telefono_i2_name']->value) {?><li><?php if (!empty($_smarty_tpl->tpl_vars['contacto_1_direccion']->value)) {?><div class="item_location"><i class="fad fa-map-marker-alt"></i><a href="#"><h6>Dirección:</h6><p><?php echo $_smarty_tpl->tpl_vars['contacto_1_direccion']->value;?>
</p></a></div><?php }?><div class="item_phone"><?php if ($_smarty_tpl->tpl_vars['contacto_1_telefono_i1_name']->value != '' && $_smarty_tpl->tpl_vars['contacto_1_telefono_i2_name']->value != '') {?><i class="fad fa-mobile-android-alt"></i><?php }
if (!empty($_smarty_tpl->tpl_vars['contacto_1_telefono_i1_name']->value)) {?><a href="tel:<?php echo $_smarty_tpl->tpl_vars['contacto_1_telefono_i1_value']->value;?>
"><h6>Teléfonos:</h6><p><?php echo $_smarty_tpl->tpl_vars['contacto_1_telefono_i1_name']->value;?>
</p></a><?php }
if (!empty($_smarty_tpl->tpl_vars['contacto_1_telefono_i2_name']->value)) {?><a href="tel:<?php echo $_smarty_tpl->tpl_vars['contacto_1_telefono_i2_value']->value;?>
"><p><?php echo $_smarty_tpl->tpl_vars['contacto_1_telefono_i2_name']->value;?>
</p></a><?php }?></div></li><?php }
if ($_smarty_tpl->tpl_vars['contacto_2_direccion']->value != '' || $_smarty_tpl->tpl_vars['contacto_2_telefono_i1_name']->value != '' || $_smarty_tpl->tpl_vars['contacto_2_telefono_i2_name']->value) {?><li><?php if (!empty($_smarty_tpl->tpl_vars['contacto_2_direccion']->value)) {?><div class="item_location"><i class="fad fa-map-marker-alt"></i><a href="#"><h6>Dirección:</h6><p><?php echo $_smarty_tpl->tpl_vars['contacto_2_direccion']->value;?>
</p></a></div><?php }?><div class="item_phone"><?php if ($_smarty_tpl->tpl_vars['contacto_2_telefono_i1_name']->value != '' && $_smarty_tpl->tpl_vars['contacto_2_telefono_i2_name']->value != '') {?><i class="fad fa-mobile-android-alt"></i><?php }
if (!empty($_smarty_tpl->tpl_vars['contacto_2_telefono_i1_name']->value)) {?><a href="tel:<?php echo $_smarty_tpl->tpl_vars['contacto_2_telefono_i1_value']->value;?>
"><h6>Teléfonos:</h6><p><?php echo $_smarty_tpl->tpl_vars['contacto_2_telefono_i1_name']->value;?>
</p></a><?php }
if (!empty($_smarty_tpl->tpl_vars['contacto_2_telefono_i2_name']->value)) {?><a href="tel:<?php echo $_smarty_tpl->tpl_vars['contacto_2_telefono_i2_value']->value;?>
"><p><?php echo $_smarty_tpl->tpl_vars['contacto_2_telefono_i2_name']->value;?>
</p></a><?php }?></div></li><?php }
if ($_smarty_tpl->tpl_vars['contacto_3_direccion']->value != '' || $_smarty_tpl->tpl_vars['contacto_3_telefono_i1_name']->value != '' || $_smarty_tpl->tpl_vars['contacto_3_telefono_i2_name']->value) {?><li><?php if (!empty($_smarty_tpl->tpl_vars['contacto_3_direccion']->value)) {?><div class="item_location"><i class="fad fa-map-marker-alt"></i><a href="#"><h6>Dirección:</h6><p><?php echo $_smarty_tpl->tpl_vars['contacto_3_direccion']->value;?>
</p></a></div><?php }?><div class="item_phone"><?php if ($_smarty_tpl->tpl_vars['contacto_3_telefono_i1_name']->value != '' && $_smarty_tpl->tpl_vars['contacto_3_telefono_i2_name']->value != '') {?><i class="fad fa-mobile-android-alt"></i><?php }
if (!empty($_smarty_tpl->tpl_vars['contacto_3_telefono_i1_name']->value)) {?><a href="tel:<?php echo $_smarty_tpl->tpl_vars['contacto_3_telefono_i1_value']->value;?>
"><h6>Teléfonos:</h6><p><?php echo $_smarty_tpl->tpl_vars['contacto_3_telefono_i1_name']->value;?>
</p></a><?php }
if (!empty($_smarty_tpl->tpl_vars['contacto_3_telefono_i2_name']->value)) {?><a href="tel:<?php echo $_smarty_tpl->tpl_vars['contacto_3_telefono_i2_value']->value;?>
"><p><?php echo $_smarty_tpl->tpl_vars['contacto_3_telefono_i2_name']->value;?>
</p></a><?php }?></div></li><?php }?></ul></div></div></div></div></div></section><section class="sect_sign"><div class="container"><div class="row"><div class="col-lg-12"><p>Arakakys &copy 2020 - Todos los derechos reservados </p></div></div></div></section></footer><?php }
}
