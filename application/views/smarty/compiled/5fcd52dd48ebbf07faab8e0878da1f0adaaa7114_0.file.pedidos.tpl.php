<?php
/* Smarty version 3.1.36, created on 2020-08-08 01:12:55
  from '/home/s99ts68oq3kj/public_html/test/application/views/web/pagina/pedidos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f2dfc17b06453_71746390',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5fcd52dd48ebbf07faab8e0878da1f0adaaa7114' => 
    array (
      0 => '/home/s99ts68oq3kj/public_html/test/application/views/web/pagina/pedidos.tpl',
      1 => 1596633291,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f2dfc17b06453_71746390 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/s99ts68oq3kj/public_html/test/vendor/smarty/smarty/libs/plugins/function.counter.php','function'=>'smarty_function_counter',),));
?>
<section class="sect_title_interna sect_title_general"><div class="container"><div class="row"><div class="col-lg-12"><h2 class="white">Pedidos</h2></div></div></div></section><section class="sect_pedidos onda_design"><div class="container"><div class="row"><div class="col-lg-6"><div class="aviso_pedido"><h2>¡HAZ SEGUIMIENTO A TU PEDIDO!</h2><p class="p_pedidos_message">Porque estamos comprometidos en entregarte el mejor servicio, Arakakys presenta la forma más rápida y moderna de conocer dónde se encuentra tu pedido en tiempo real.</p></div></div><div class="col-lg-6"><div class="box_pedidos"><div class="box_head"></div><div class="box_body"><h4>SEGUIMIENTO DE PEDIDO</h4><form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
pedidos/buscar" method="POST" class="formulario"><span class="respuesta"></span><input type="text" name="codigo" placeholder="Ingresa tu número de pedido" class="input_ingresa" maxlength="24"><input type="submit" name="" value="ENVIAR"class="input_buscar"></form></div></div></div></div></div></section><?php if (!empty($_smarty_tpl->tpl_vars['observar_id']->value)) {?><section class="sect_carrito"><div class="container"><div class="row justify-content-end"><div class="col-lg-12"><div class="content_table_pedidos"><table width="100%"><thead><tr><th>NÚMERO</th><th>CODIGO</th><th>ESTADO</th><th>FECHA MODIFICACION</th></tr></thead><tbody><tr><td>0<?php echo smarty_function_counter(array(),$_smarty_tpl);?>
</td><td><?php echo $_smarty_tpl->tpl_vars['observar_codigo']->value;?>
</td><td><?php echo $_smarty_tpl->tpl_vars['observar_estado']->value;?>
</td><td><?php echo $_smarty_tpl->tpl_vars['fechaModificacion']->value;?>
</td></tr></tbody></table></div></div></div></div></section><?php }
}
}
