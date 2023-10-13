<?php
/* Smarty version 3.1.36, created on 2020-08-05 22:57:08
  from '/home/s99ts68oq3kj/public_html/test/application/views/web/pagina/carrito.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f2b3944c7c6c3_44353504',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '487e0e52ae3780068ee1c1506660acf7c4372e16' => 
    array (
      0 => '/home/s99ts68oq3kj/public_html/test/application/views/web/pagina/carrito.tpl',
      1 => 1596649811,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f2b3944c7c6c3_44353504 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/s99ts68oq3kj/public_html/test/vendor/smarty/smarty/libs/plugins/function.counter.php','function'=>'smarty_function_counter',),));
?>
<section class="sect_title_interna sect_title_general"><div class="container"><div class="row"><div class="col-lg-12"><h2 class="white">Carrito</h2></div></div></div></section><section class="sect_proceso_compra onda_design"><div class="container"><div class="row"><div class="col-lg-12"><ul class="list_pasos_carrito"><li class="paso1 active"><h5>CARRITO DE COMPRA</h5><span>1</span></li><li class="paso2"><h5>FORMULARIO DE ENVÍO</h5><span>2</span></li><li class="paso3"><h5>COTIZACIÓN ENVIADA</h5><span>3</span></li></ul></div></div></div></section><section class="sect_carrito"><div class="container"><div class="row justify-content-end"><div class="col-lg-12"><div class="content_table_pedidos"><table width="100%"><thead><tr><th>NÚMERO</th><th>PRODUCTO</th><th>CANTIDAD</th><th>PRECIO UNITARIO</th><th>PRECIO TOTAL</th></tr></thead><tbody><?php if (!empty($_smarty_tpl->tpl_vars['itemsProducto']->value)) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['itemsProducto']->value, 'i');
$_smarty_tpl->tpl_vars['i']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['i']->value) {
$_smarty_tpl->tpl_vars['i']->do_else = false;
?><tr><td>0<?php echo smarty_function_counter(array(),$_smarty_tpl);?>
</td><td><img src="<?php echo $_smarty_tpl->tpl_vars['i']->value['options']['image'];?>
" width="100"><h6 class="name_product"><?php echo $_smarty_tpl->tpl_vars['i']->value['name'];?>
</h6></td><td><input type="number" name="" value="<?php echo $_smarty_tpl->tpl_vars['i']->value['qty'];?>
" class="input_cant" data-id="<?php echo $_smarty_tpl->tpl_vars['i']->value['rowid'];?>
"></td><td>S/ <?php echo $_smarty_tpl->tpl_vars['i']->value['price'];?>
</td><td>S/ <?php echo $_smarty_tpl->tpl_vars['i']->value['price']*$_smarty_tpl->tpl_vars['i']->value['qty'];?>
</td></tr><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
} else { ?><tr><td colspan="5"><h4>No hay productos</h4></td></tr><?php }?></tbody></table></div></div><div class="col-lg-4"><div class="box_subtotales"><div class="info"><!-- span class="title">SUBTOTAL</span><span class="monto">S/ 25.00</span><span class="title">IGV(18%)</span><span class="monto">S/ 4.50</span --><span class="title">TOTAL</span><span class="monto">S/.<?php if ((isset($_smarty_tpl->tpl_vars['cart_price']->value))) {
echo $_smarty_tpl->tpl_vars['cart_price']->value;
}?></span></div><?php if (!empty($_smarty_tpl->tpl_vars['itemsProducto']->value) && !empty($_smarty_tpl->tpl_vars['accesoTmpEmail']->value)) {?><div class="btn_carrito"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
formulario-envio" class="btn_pagar">PAGAR</a></div><?php } elseif (!empty($_smarty_tpl->tpl_vars['itemsProducto']->value)) {?><div class="btn_carrito"><a href="#" class="btn_pagar" data-toggle="modal" data-target="#modal-login-register" id="id-iniciar">INICIAR SESION</a></div><?php }?></div></div></div></div></section><?php }
}
