<?php
/* Smarty version 3.1.36, created on 2020-08-24 13:17:21
  from '/home/s99ts68oq3kj/public_html/application/views/web/pagina/perfil_cliente.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f4404314c36a2_83872266',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e0182c108c3b5d6eed42829f5d8ddaeb9f042e1a' => 
    array (
      0 => '/home/s99ts68oq3kj/public_html/application/views/web/pagina/perfil_cliente.tpl',
      1 => 1596581808,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f4404314c36a2_83872266 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="sect_title_interna sect_title_general"><div class="container"><div class="row"><div class="col-lg-12"><h2 class="white">PERFIL</h2></div></div></div></section><section class="sect_perfil_user"><div class="container"><div class="row"><div class="col-sm-3 col-md-3"><div class="box_photo_perfil"><?php if ((isset($_smarty_tpl->tpl_vars['observar_imagen']->value))) {?><div class="head"><img src="<?php echo $_smarty_tpl->tpl_vars['observar_imagen']->value;?>
" width="100%"></div><?php }?><div class="body"><?php if ((isset($_smarty_tpl->tpl_vars['observar_nombre']->value))) {?><h4><?php echo $_smarty_tpl->tpl_vars['observar_nombre']->value;?>
</h4><?php }?><hr class="hr_line_body"><ul class="notifications"><li><strong>Pedidos</strong><span class="totalCorreosHtml">(<?php if ((isset($_smarty_tpl->tpl_vars['totalPedidos']->value))) {
echo $_smarty_tpl->tpl_vars['totalPedidos']->value;?>
)<?php }?></span></li></ul></div></div></div><div class="col-sm-9 col-md-9"><ul class="nav nav-tabs flex_tabs"><li class="nav-item"><a href="#misdatos" class="info-box hover-effect active" data-toggle="tab"><div class="icon"><i class="fad fa-user"></i></div><div class="content"><div class="text">Mis Datos</div></div></a></li><li class="nav-item"><a data-toggle="tab" href="#pedidos" class="info-box hover-effect"><div class="icon"><i class="fad fa-cart-plus"></i></div><div class="content"><div class="text">Mis Pedidos</div></div></a></li></ul><div class="tab-content dashboard_content"><div id="misdatos" class="tab-pane active"><h2 class="h2_title">DATOS DE CONTACTO</h2><form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
cliente/editar" method="post" class="form_general bform formulario"><span class="respuesta"></span><div class="row"><div class="col-md-12 center"><div class="titulo_ofertas"><h3>Foto de perfil</h3></div><div class="btn-container"><!--the three icons: default, ok file (img), error file (not an img)--><h1 class="imgupload2"><i class="fa fa-file-image-o"></i></h1><h1 class="imgupload2 ok"><i class="fa fa-check"></i></h1><h1 class="imgupload2 stop"><i class="fa fa-times"></i></h1><!--this field changes dinamically displaying the filename we are trying to upload--><p id="namefile2">Solo está permitido seleccionar (jpg,jpeg o png)</p><!--our custom btn which which stays under the actual one--><button type="button" id="btnup" class="btn-oferta">Selecciona tu imagen</button><input type="file" value="Guardar" name="fileup2" id="fileup2"></div></div></div><div class="row"><div class="col-sm-6 col-md-6"><input type="text" name="nombre" maxlength="115" value="<?php if ((isset($_smarty_tpl->tpl_vars['observar_nombre']->value))) {
echo $_smarty_tpl->tpl_vars['observar_nombre']->value;
}?>" class="input_form_general" placeholder="Nombre o Razón Social"></div><div class="col-sm-6 col-md-6"><input type="text" name="celular" maxlength="25" value="<?php if ((isset($_smarty_tpl->tpl_vars['observar_celular']->value))) {
echo $_smarty_tpl->tpl_vars['observar_celular']->value;
}?>" class="input_form_general" placeholder="Celular/Teléfono"></div><div class="col-sm-12 col-md-12"><input type="text" name="direccion" maxlength="210" value="<?php if ((isset($_smarty_tpl->tpl_vars['observar_direccion']->value))) {
echo $_smarty_tpl->tpl_vars['observar_direccion']->value;
}?>" class="input_form_general" placeholder="Dirección"></div><div class="col-sm-6 col-md-6"><input type="text" name="clave" value="" class="input_form_general" placeholder="Nueva Contraseña"></div><div class="col-sm-6 col-md-6"><input type="text" name="reclave" value="" class="input_form_general" placeholder="Confirmar Contraseña"></div><div class="col-sm-12 col-md-12"><input type="submit" name="" class="input_frm_enviar" value="Guardar"></div></div></form></div><?php if ((isset($_smarty_tpl->tpl_vars['listadoPedidos']->value))) {?><div id="pedidos" class="tab-pane fade"><h2 class="h2_title">TODOS MIS PEDIDOS</h2><div class="content_table_pedidos"><table width="100%"><thead><tr><th>#</th><th>CODIGO PEDIDO</th><th>EMAIL</th><th>N° PRODUCTOS</th><th>FECHA COTIZACION</th><th>PRECIO TOTAL</th><th>ESTADO</th></tr></thead><tbody><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listadoPedidos']->value, 'items');
$_smarty_tpl->tpl_vars['items']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['items']->value) {
$_smarty_tpl->tpl_vars['items']->do_else = false;
?><tr><td><?php echo $_smarty_tpl->tpl_vars['items']->value['numero'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['items']->value['pedido'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['items']->value['email'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['items']->value['cantidad'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['items']->value['fecha'];?>
</td><td>S/<?php echo $_smarty_tpl->tpl_vars['items']->value['total'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['items']->value['estado'];?>
</td><!--td><a href="#"><i class="fad fa-search"></i></a></td--></tr><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></tbody></table></div></div><?php }?></div></div></div></div></section><?php }
}
