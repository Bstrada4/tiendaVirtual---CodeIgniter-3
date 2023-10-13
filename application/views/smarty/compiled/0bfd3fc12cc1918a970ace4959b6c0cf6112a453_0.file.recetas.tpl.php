<?php
/* Smarty version 3.1.36, created on 2020-08-24 18:16:49
  from '/home/s99ts68oq3kj/public_html/application/views/web/pagina/recetas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f440411567680_46447875',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0bfd3fc12cc1918a970ace4959b6c0cf6112a453' => 
    array (
      0 => '/home/s99ts68oq3kj/public_html/application/views/web/pagina/recetas.tpl',
      1 => 1596900382,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f440411567680_46447875 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="sect_title_interna sect_title_general"><div class="container"><div class="row"><div class="col-lg-12"><h2 class="white">Preparaciones</h2></div></div></div></section><?php if ((isset($_smarty_tpl->tpl_vars['listaClasificacion']->value))) {?><section class="sect_recetas onda_design" data-ref="mixitup-container"><div class="container"><div class="row"><div class="col-lg-12"><div class="box_portafolio"><div class="head_navigation"><ul class="controls"><li class="d-none"><a class="control" data-filter="all"></a></li><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listaClasificacion']->value, 'items');
$_smarty_tpl->tpl_vars['items']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['items']->value) {
$_smarty_tpl->tpl_vars['items']->do_else = false;
if (!empty($_smarty_tpl->tpl_vars['items']->value['recetas'])) {?><li><a class="control <?php echo $_smarty_tpl->tpl_vars['items']->value['active'];?>
" data-filter=".<?php echo $_smarty_tpl->tpl_vars['items']->value['slug'];?>
-<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['items']->value['titulo'];?>
</a></li><?php if ($_smarty_tpl->tpl_vars['items']->value['numero'] == 1) {?><input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['items']->value['slug'];?>
-<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
" class="mixitup-recetas-gal"><?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ul></div></div></div><div class="col-lg-12"><div class="content_mixitup"><ul class="list_mixitup" id="gallery-multimedia"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listaClasificacion']->value, 'items');
$_smarty_tpl->tpl_vars['items']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['items']->value) {
$_smarty_tpl->tpl_vars['items']->do_else = false;
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['items']->value['recetas'], 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?><li class="item <?php echo $_smarty_tpl->tpl_vars['items']->value['slug'];?>
-<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
 lg-share" data-ref="mixitup-target"><div class="box_item_receta"><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['slug'];?>
" data-facebook-share-url="<?php echo $_smarty_tpl->tpl_vars['item']->value['imagen'];?>
" data-twitter-share-url="twitter-share.html"><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['imagen'];?>
" width="100%"></a><div class="caption_item_receta"><h5><?php echo $_smarty_tpl->tpl_vars['item']->value['titulo'];?>
</h5><p><?php echo $_smarty_tpl->tpl_vars['item']->value['subtitulo'];?>
</p><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['slug'];?>
">VER MÁS</a></div></div></li><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ul></div></div></div></div></section><?php }
}
}
