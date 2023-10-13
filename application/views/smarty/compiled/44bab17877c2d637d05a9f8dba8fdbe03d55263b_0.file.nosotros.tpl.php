<?php
/* Smarty version 3.1.36, created on 2020-08-08 00:02:10
  from '/home/s99ts68oq3kj/public_html/test/application/views/web/pagina/nosotros.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f2deb823f3c32_45943182',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '44bab17877c2d637d05a9f8dba8fdbe03d55263b' => 
    array (
      0 => '/home/s99ts68oq3kj/public_html/test/application/views/web/pagina/nosotros.tpl',
      1 => 1595805138,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f2deb823f3c32_45943182 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="sect_title_interna sect_title_general"><div class="container"><div class="row"><div class="col-lg-12"><h2 class="white">Nosotros</h2></div></div></div></section><section class="sect_nosotros onda_design"><div class="container"><div class="row"><?php if ((isset($_smarty_tpl->tpl_vars['observar_imagen']->value))) {
if (!empty($_smarty_tpl->tpl_vars['observar_imagen']->value)) {?><div class="col-lg-6 order2"><img src="<?php echo $_smarty_tpl->tpl_vars['observar_imagen']->value;?>
" width="100%"></div><?php }
}?><div class="col-lg-6 order1"><div class="box_nosotros"><div class="box_head"><h4><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/img/logo/logo.png" width="140"> les da la bienvenida</h4><h6>El mejor pollo</h6><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/img/iconos/line-nosotros.png"></div><?php if ((isset($_smarty_tpl->tpl_vars['descripcion_1']->value))) {
if (!empty($_smarty_tpl->tpl_vars['descripcion_1']->value)) {?><div class="box_body"><?php echo $_smarty_tpl->tpl_vars['descripcion_1']->value;?>
</div><?php }
}?><div class="box_foot"><ul><?php if ((isset($_smarty_tpl->tpl_vars['mensaje_1']->value))) {
if (!empty($_smarty_tpl->tpl_vars['mensaje_1']->value)) {?><li><i class="fad fa-heartbeat"></i><div class="content_carac"><h6>Saludable</h6><span><?php echo $_smarty_tpl->tpl_vars['mensaje_1']->value;?>
</span></div></li><?php }
}
if ((isset($_smarty_tpl->tpl_vars['mensaje_2']->value))) {
if (!empty($_smarty_tpl->tpl_vars['mensaje_2']->value)) {?><li><i class="fad fa-cauldron"></i><div class="content_carac"><h6>Fácil de cocinar</h6><span><?php echo $_smarty_tpl->tpl_vars['mensaje_2']->value;?>
</span></div></li><?php }
}
if ((isset($_smarty_tpl->tpl_vars['mensaje_3']->value))) {
if (!empty($_smarty_tpl->tpl_vars['mensaje_3']->value)) {?><li><i class="fad fa-shield-check"></i><div class="content_carac"><h6>Excelente calidad</h6><span><?php echo $_smarty_tpl->tpl_vars['mensaje_3']->value;?>
</span></div></li><?php }
}
if ((isset($_smarty_tpl->tpl_vars['mensaje_4']->value))) {
if (!empty($_smarty_tpl->tpl_vars['mensaje_4']->value)) {?><li><i class="fad fa-turkey"></i><div class="content_carac"><h6>Carne fresca</h6><span><?php echo $_smarty_tpl->tpl_vars['mensaje_4']->value;?>
</span></div></li><?php }
}
if ((isset($_smarty_tpl->tpl_vars['mensaje_5']->value))) {
if (!empty($_smarty_tpl->tpl_vars['mensaje_5']->value)) {?><li><i class="fad fa-piggy-bank"></i><div class="content_carac"><h6>Precio accesible</h6><span><?php echo $_smarty_tpl->tpl_vars['mensaje_5']->value;?>
</span></div></li><?php }
}?></ul></div></div></div></div></div></section><section class="sect_banner_nosotros"><div class="container"><div class="row align-items-center"><div class="col-lg-9"><h2>Prueba nuestro reparto a delivery aquí <i class="fad fa-hand-point-right"></i></h2></div><div class="col-lg-3"><a href="#" class="btn_delivery">Delivery</a></div></div></div></section><section class="sect_mision_vision"><div class="container"><div class="row"><?php if ((isset($_smarty_tpl->tpl_vars['descripcion_2']->value))) {
if (!empty($_smarty_tpl->tpl_vars['descripcion_2']->value)) {?><div class="col-lg-6"><div class="box_mision"><div><div class="box_head"><h6>NUESTRA MISIÓN</h6></div><div class="box_body"><?php echo $_smarty_tpl->tpl_vars['descripcion_2']->value;?>
</div><div class="box_foot"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/img/nosotros/mision.png"></div></div></div></div><?php }
}
if ((isset($_smarty_tpl->tpl_vars['descripcion_2']->value))) {
if (!empty($_smarty_tpl->tpl_vars['descripcion_2']->value)) {?><div class="col-lg-6"><div class="box_mision"><div><div class="box_head"><h6>NUESTRA VISIÓN</h6></div><div class="box_body"><?php echo $_smarty_tpl->tpl_vars['descripcion_3']->value;?>
</div><div class="box_foot"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/img/nosotros/vision.png"></div></div></div></div><?php }
}?></div></div></section><?php }
}
