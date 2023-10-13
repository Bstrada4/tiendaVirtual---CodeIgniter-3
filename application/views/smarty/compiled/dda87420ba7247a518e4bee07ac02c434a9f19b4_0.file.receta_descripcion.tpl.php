<?php
/* Smarty version 3.1.36, created on 2020-08-24 13:44:42
  from '/home/s99ts68oq3kj/public_html/application/views/web/pagina/receta_descripcion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f440a9a042cd1_60444340',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dda87420ba7247a518e4bee07ac02c434a9f19b4' => 
    array (
      0 => '/home/s99ts68oq3kj/public_html/application/views/web/pagina/receta_descripcion.tpl',
      1 => 1596900437,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f440a9a042cd1_60444340 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="sect_title_interna sect_title_general"><div class="container"><div class="row"><?php if ((isset($_smarty_tpl->tpl_vars['observar_titulo']->value))) {?><div class="col-lg-12"><h2 class="white"><?php echo $_smarty_tpl->tpl_vars['observar_titulo']->value;?>
</h2></div><?php }?></div></div></section><section class="sect_receta_descripcion onda_design"><div class="container"><div class="row"><div class="col-lg-3 order2"><div class="box_lateral_receta stick_general"><ul id="accordion"><li><a href="javascript:void();" class="link">Más preparaciones</a><ul class="submenu" style="display: block;"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listadoRec']->value, 'items');
$_smarty_tpl->tpl_vars['items']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['items']->value) {
$_smarty_tpl->tpl_vars['items']->do_else = false;
?><li><a href="<?php echo $_smarty_tpl->tpl_vars['items']->value['slug'];?>
" class="<?php echo $_smarty_tpl->tpl_vars['items']->value['active'];?>
"><i class="fad fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['items']->value['titulo'];?>
</a></li><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ul></li></ul></div></div><div class="col-lg-9 order1"><div class="box_contenido_receta"><?php if ((isset($_smarty_tpl->tpl_vars['observar_imagen']->value))) {?><div class="box_head"><img src="<?php echo $_smarty_tpl->tpl_vars['observar_imagen']->value;?>
" width="100%"></div><?php }
if ((isset($_smarty_tpl->tpl_vars['observar_descripcion']->value))) {?><div class="box_body"><?php echo $_smarty_tpl->tpl_vars['observar_descripcion']->value;?>
</div><?php }?></div></div></div></div></section><?php }
}
