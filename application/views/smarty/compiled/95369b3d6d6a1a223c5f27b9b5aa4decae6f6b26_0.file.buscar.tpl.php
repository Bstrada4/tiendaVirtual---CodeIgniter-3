<?php
/* Smarty version 3.1.36, created on 2020-12-26 19:41:37
  from 'C:\xampp\htdocs\CLIENTES\FREELANCE\TIENDAVIRTUAL\ARAKAKYSCHICKEN\versiones\Arakakys_final\application\views\web\pagina\buscar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5fe783e11b20d3_45015213',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '95369b3d6d6a1a223c5f27b9b5aa4decae6f6b26' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CLIENTES\\FREELANCE\\TIENDAVIRTUAL\\ARAKAKYSCHICKEN\\versiones\\Arakakys_final\\application\\views\\web\\pagina\\buscar.tpl',
      1 => 1595786610,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fe783e11b20d3_45015213 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="sect_title_interna sect_title_general"><div class="container"><div class="row"><div class="col-lg-12"><h2 class="white">Nuestros productos</h2></div></div></div></section><section class="section_catalogo onda_design" id="prueba"><div class="container"><div class="row"><div class="col-lg-12"><div class="anuncia"><a href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/img/servicios/publicidad.jpg" width="100%"></a></div><div class="catg-toolbar"><p class="catg-result"><?php echo $_smarty_tpl->tpl_vars['totalResultados']->value;?>
</p><div class="catg-formserch"><div class="catg-listog"><button href="#" id="grid" title="Vista en cuadrícula" class="btn active"><i class="fad fa-th"></i></button><button href="#" id="list" title="Vista en listado" class="btn "><i class="fad fa-list"></i></button></div><form class="" action=""><select class="selectpicker" data-size="5" name="" id="select-order"><option value="" selected="selected">Ordenar por:</option><option value="asc">Precio más bajo</option><option value="desc">Precio más alto</option></select></form></div></div><div class="wrapper list"><ul class="prodlist-grid grid product-list"><?php if ((isset($_smarty_tpl->tpl_vars['listadoBusqueda']->value))) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listadoBusqueda']->value, 'items');
$_smarty_tpl->tpl_vars['items']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['items']->value) {
$_smarty_tpl->tpl_vars['items']->do_else = false;
?><li class="pogrid"><div class="single-prodsta"><div class="product-img-wrap"><a class="product-img" href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['items']->value['imagen'];?>
" width="100%" title="<?php echo $_smarty_tpl->tpl_vars['items']->value['titulo'];?>
"></a></div><div class="prodst-info"><h4><?php echo $_smarty_tpl->tpl_vars['items']->value['titulo'];?>
</h4><span><?php echo $_smarty_tpl->tpl_vars['items']->value['subtitulo'];?>
</span><div class="box_foot"><div class="circles"><span></span><span></span><span></span></div><div class="pro-price"><span>S/ <?php echo $_smarty_tpl->tpl_vars['items']->value['precio'];?>
</span></div></div><p class="info_list"><?php echo $_smarty_tpl->tpl_vars['items']->value['descripcion'];?>
</p><ul class="list_actions"><li><a href="javascript:void(0);" onclick="add_cart(<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
)"><i class="fad fa-cart-plus"></i></a></li></ul></div></div></li><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?></ul></div></div></div></div></section>



<?php }
}
