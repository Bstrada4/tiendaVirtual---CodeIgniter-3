<?php
/* Smarty version 3.1.36, created on 2020-08-08 15:27:44
  from '/home/s99ts68oq3kj/public_html/test/application/views/web/pagina/mito_descripcion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f2ec4704b7588_09412871',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b98183aead9a1c0bce0dce6869675e229b6b9a9c' => 
    array (
      0 => '/home/s99ts68oq3kj/public_html/test/application/views/web/pagina/mito_descripcion.tpl',
      1 => 1596900458,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f2ec4704b7588_09412871 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="sect_title_interna sect_title_general"><div class="container"><div class="row"><?php if ($_smarty_tpl->tpl_vars['observar_titulo']->value) {?><div class="col-lg-12"><h2 class="white"><?php echo $_smarty_tpl->tpl_vars['observar_titulo']->value;?>
</h2></div><?php }?></div></div></section><section class="sect_mitos_descripcion onda_design"><div class="container"><div class="row"><div class="col-lg-8"><div class="box_contenido_mitos stick_general"><div class="box_head"><?php if ($_smarty_tpl->tpl_vars['observar_imagen']->value) {?><img src="<?php echo $_smarty_tpl->tpl_vars['observar_imagen']->value;?>
" width="100%"><?php }
if ((isset($_smarty_tpl->tpl_vars['observar_descripcion']->value))) {?><div class="caption_mito"><h3><?php echo $_smarty_tpl->tpl_vars['observar_subtitulo']->value;?>
</h3><?php echo $_smarty_tpl->tpl_vars['observar_descripcion']->value;?>
</div><?php }?></div></div></div><div class="col-lg-4"><div class="box_lateral_mitos"><ul id="accordion"><li><a href="javascript:void(0);" class="link">Más creencias... <i class="fad fa-caret-down"></i></a><ul class="submenu" style="display: block;"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listarMitos']->value, 'items');
$_smarty_tpl->tpl_vars['items']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['items']->value) {
$_smarty_tpl->tpl_vars['items']->do_else = false;
?><li><a href="<?php echo $_smarty_tpl->tpl_vars['items']->value['slug'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['items']->value['imagen'];?>
" width="100%"></a><div class="content_more_mitos"><a href="<?php echo $_smarty_tpl->tpl_vars['items']->value['slug'];?>
"><?php echo $_smarty_tpl->tpl_vars['items']->value['subtitulo'];?>
</a></div></li><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ul></li></ul></div></div></div></div></section><?php }
}
