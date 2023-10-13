<?php
/* Smarty version 3.1.36, created on 2020-12-26 19:31:29
  from 'C:\xampp\htdocs\CLIENTES\FREELANCE\TIENDAVIRTUAL\ARAKAKYSCHICKEN\versiones\Arakakys_final\application\views\web\pagina\productos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5fe781813df1e1_60299108',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8bc8713dca02a05cafc6baac4f60bee95a6794bc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CLIENTES\\FREELANCE\\TIENDAVIRTUAL\\ARAKAKYSCHICKEN\\versiones\\Arakakys_final\\application\\views\\web\\pagina\\productos.tpl',
      1 => 1596672430,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fe781813df1e1_60299108 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="sect_title_interna sect_title_general"><div class="container"><div class="row"><div class="col-lg-12"><h2 class="white">Nuestros productos</h2></div></div></div></section><section class="section_catalogo onda_design" id="prueba"><div class="container"><div class="row"><?php if ((isset($_smarty_tpl->tpl_vars['listadoCategoria']->value))) {?><div class="col-lg-3"><div class="box_lateral_delivery stick_general"><ul id="accordion"><li><a href="javascript:void();" class="link">Categorías</a><ul class="submenu" style="display: block;"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listadoCategoria']->value, 'items');
$_smarty_tpl->tpl_vars['items']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['items']->value) {
$_smarty_tpl->tpl_vars['items']->do_else = false;
?><li class="li-ul"><a href='javascript:;' onclick='filter_collection(<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
);' class="<?php echo $_smarty_tpl->tpl_vars['items']->value['active'];?>
" id="collection-<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
"><i class="fad fa-check"></i><?php echo $_smarty_tpl->tpl_vars['items']->value['titulo'];?>
</a></li><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ul></li></ul></div></div><?php }?><div class="col-lg-9"><div class="anuncia"><a href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/img/servicios/publicidad.jpg" width="100%"></a></div><div class="catg-toolbar"><p class="catg-result">0 productos</p><div class="catg-formserch"><div class="catg-listog"><button href="#" id="grid" title="Vista en cuadrícula" class="btn active"><i class="fad fa-th"></i></button><button href="#" id="list" title="Vista en listado" class="btn "><i class="fad fa-list"></i></button></div><form class="" action=""><select class="selectpicker" data-size="5" name="" id="select-order"><option value="" selected="selected">Ordenar por:</option><option value="asc">Precio más bajo</option><option value="desc">Precio más alto</option></select></form></div></div><div class="wrapper list"><ul class="prodlist-grid grid product-list product-list-ajax"></ul></div></div></div></div></section>



<?php }
}
