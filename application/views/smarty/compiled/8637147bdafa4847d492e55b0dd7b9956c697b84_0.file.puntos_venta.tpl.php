<?php
/* Smarty version 3.1.36, created on 2020-08-08 00:01:51
  from '/home/s99ts68oq3kj/public_html/test/application/views/web/pagina/puntos_venta.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f2deb6fbc0835_65605864',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8637147bdafa4847d492e55b0dd7b9956c697b84' => 
    array (
      0 => '/home/s99ts68oq3kj/public_html/test/application/views/web/pagina/puntos_venta.tpl',
      1 => 1596574584,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f2deb6fbc0835_65605864 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="sect_title_interna sect_title_general"><div class="container"><div class="row"><div class="col-lg-12"><h2 class="white">Puntos de venta</h2></div></div></div></section><section class="sect_puntos_venta onda_design"><div class="container"><div class="row"><div class="col-lg-12"><ul class="list_direcciones"><?php if (!empty($_smarty_tpl->tpl_vars['latitud_1']->value)) {?><li class="activo">Lugar 1</li><?php }
if (!empty($_smarty_tpl->tpl_vars['latitud_2']->value)) {?><li>Lugar 2</li><?php }
if (!empty($_smarty_tpl->tpl_vars['latitud_3']->value)) {?><li>Lugar 3</li><?php }
if (!empty($_smarty_tpl->tpl_vars['latitud_4']->value)) {?><li>Lugar 4</li><?php }
if (!empty($_smarty_tpl->tpl_vars['latitud_5']->value)) {?><li>Lugar 5</li><?php }
if (!empty($_smarty_tpl->tpl_vars['latitud_6']->value)) {?><li>Lugar 6</li><?php }?></ul></div></div></div><div id="map" style="width: 100%;height: 600px;" data-value1="1" data-latid1="<?php echo $_smarty_tpl->tpl_vars['latitud_1']->value;?>
" data-long1="<?php echo $_smarty_tpl->tpl_vars['longitud_1']->value;?>
" data-value2="2" data-latid2="<?php echo $_smarty_tpl->tpl_vars['latitud_2']->value;?>
" data-long2="<?php echo $_smarty_tpl->tpl_vars['longitud_2']->value;?>
" data-value3="3" data-latid3="<?php echo $_smarty_tpl->tpl_vars['latitud_3']->value;?>
" data-long3="<?php echo $_smarty_tpl->tpl_vars['longitud_3']->value;?>
" data-value4="4" data-latid4="<?php echo $_smarty_tpl->tpl_vars['latitud_4']->value;?>
" data-long4="<?php echo $_smarty_tpl->tpl_vars['longitud_4']->value;?>
" data-value3="5" data-latid5="<?php echo $_smarty_tpl->tpl_vars['latitud_5']->value;?>
" data-long5="<?php echo $_smarty_tpl->tpl_vars['longitud_5']->value;?>
" data-value6="6" data-latid6="<?php echo $_smarty_tpl->tpl_vars['latitud_6']->value;?>
" data-long6="<?php echo $_smarty_tpl->tpl_vars['longitud_6']->value;?>
"></div></section><?php }
}
