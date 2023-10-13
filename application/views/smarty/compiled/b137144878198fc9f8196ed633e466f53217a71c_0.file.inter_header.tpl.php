<?php
/* Smarty version 3.1.36, created on 2020-08-08 15:25:56
  from '/home/s99ts68oq3kj/public_html/test/application/views/web/estructura/inter_header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f2ec404d29b79_30649985',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b137144878198fc9f8196ed633e466f53217a71c' => 
    array (
      0 => '/home/s99ts68oq3kj/public_html/test/application/views/web/estructura/inter_header.tpl',
      1 => 1596900318,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f2ec404d29b79_30649985 (Smarty_Internal_Template $_smarty_tpl) {
?><body><header><section class="navigation-allgs"><div class="content_menu"><div class="sect_top_header"><div class="container"><div class="row align-items-center"><div class="col-4 col-sm-6 col-md-9 col-lg-8"><ul class="list_contact_top_header"><?php if (!empty($_smarty_tpl->tpl_vars['contacto_1_telefono_c_name']->value)) {?><li><a href="tel:<?php echo $_smarty_tpl->tpl_vars['contacto_1_telefono_c_value']->value;?>
"><i class="fad fa-mobile-android-alt"></i> <span><?php echo $_smarty_tpl->tpl_vars['contacto_1_telefono_c_name']->value;?>
</span></a></li><?php }
if ((isset($_smarty_tpl->tpl_vars['contacto_1_correo']->value))) {?><li><a href="mailto:<?php echo $_smarty_tpl->tpl_vars['contacto_1_correo']->value;?>
"><i class="fad fa-envelope-square"></i> <span><?php echo $_smarty_tpl->tpl_vars['contacto_1_correo']->value;?>
</span></a></li><?php }?></ul></div><div class="col-8 col-sm-6 col-md-3 col-lg-4"><ul class="list_icons_top_header"><li><a href="#" id="btn-search"><i class="fad fa-search"></i></a></li><?php if (!empty($_smarty_tpl->tpl_vars['accesoTmpEmail']->value)) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
cliente/panel" data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['accesoTmpNombre']->value;?>
"><i class="fad fa-user"></i></a></li><li><a onClick="location.href='<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
cliente/cerrar'" data-toggle="tooltip" title="Cerrar sesion"><i class="fad fa-sign-out"></i></a></li><?php } else { ?><li><a href="#" id="clic-modal-1" data-toggle="modal" data-target="#modal-login-register" ><i class="fad fa-users"></i></a></li><?php }?><li><a href="javascript:void(0);" id="open_cart" class="class-cart"><i class="fad fa-shopping-cart"></i><span class="counter"><?php if ((isset($_smarty_tpl->tpl_vars['cart_items']->value))) {
echo $_smarty_tpl->tpl_vars['cart_items']->value;
}?></span></a></li></ul></div></div></div></div><div class="conten_nav"><nav><div class="container"><div class="flex_menu_b"><div class="flex_logo"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
inicio"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/img/logo/logo.png" width="100%"></a></div><div class="flex_menu_main"><ul><li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
nosotros" class="<?php if ((isset($_smarty_tpl->tpl_vars['nosotros_active']->value))) {?>active<?php }?>">Nosotros</a></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
nutricion" class="<?php if ((isset($_smarty_tpl->tpl_vars['nutricion_active']->value))) {?>active<?php }?>">Valores<br>nutricionales</a></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
preparaciones" class="<?php if ((isset($_smarty_tpl->tpl_vars['recetas_active']->value))) {?>active<?php }?>">Preparaciones</a></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
creencias" class="<?php if ((isset($_smarty_tpl->tpl_vars['mitos_active']->value))) {?>active<?php }?>">Creencias</a></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
tiendas" class="<?php if ((isset($_smarty_tpl->tpl_vars['puntosventa_active']->value))) {?>active<?php }?>">Tiendas</a></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
productos" class="<?php if ((isset($_smarty_tpl->tpl_vars['productos_active']->value))) {?>active<?php }?>">Productos</a></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
pedidos" class="<?php if ((isset($_smarty_tpl->tpl_vars['pedidos_active']->value))) {?>active<?php }?>">Pedidos</a></li></ul><a href="javascript:void(0);" id="toggle_cel"><i class="fad fa-bars"></i></a></div><?php if (!empty($_smarty_tpl->tpl_vars['contacto_1_whatshapp_name']->value)) {?><div class="flex_contact"><a href="https://api.whatsapp.com/send?phone=<?php echo $_smarty_tpl->tpl_vars['contacto_1_whatshapp_value']->value;?>
" target="_blank"><i class="fab fa-whatsapp"></i> <span><?php echo $_smarty_tpl->tpl_vars['contacto_1_whatshapp_name']->value;?>
</span></a></div><?php }?></div></div></nav><div class="search_top"><div class="content_search_top"><input type="text" name="" placeholder="¿Qué estás buscando?" class="buscando"><a href="javascript:void(0);"class="buscarItem">Buscar</a></div></div></div></div></section><section class="fixed_carrito" id="fixed-scritp"><div class="content_carrito"><div class="content_head"><h5>Carrito de compras</h5><a href="javascript:void(0);" id="close_cart"><i class="fad fa-times"></i></a></div><div class="content_body"><ul class="list_productos"><?php if (!empty($_smarty_tpl->tpl_vars['itemsProducto']->value)) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['itemsProducto']->value, 'i');
$_smarty_tpl->tpl_vars['i']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['i']->value) {
$_smarty_tpl->tpl_vars['i']->do_else = false;
?><li id="<?php echo $_smarty_tpl->tpl_vars['i']->value['rowid'];?>
"><a href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['i']->value['options']['image'];?>
" width="100%"></a><div class="content_li"><a href="#" class="title"><?php echo $_smarty_tpl->tpl_vars['i']->value['name'];?>
</a><a href="#" class="tags"><?php echo $_smarty_tpl->tpl_vars['i']->value['options']['collection'];?>
</a><span class="price"><?php echo $_smarty_tpl->tpl_vars['i']->value['qty'];?>
 x <b><?php echo $_smarty_tpl->tpl_vars['i']->value['options']['precio'];?>
</b></span></div><a href="#" class="remove_product" onclick="delete_cart('<?php echo $_smarty_tpl->tpl_vars['i']->value['rowid'];?>
')"><i class="fad fa-trash"></i></a></li><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?></ul></div><div class="content_foot"><div class="totales"><span>SUBTOTAL:</span><span class="qty-total">S/ <?php if ((isset($_smarty_tpl->tpl_vars['cart_price']->value))) {
echo $_smarty_tpl->tpl_vars['cart_price']->value;
}?></span></div><div class="btns_cart"><?php if (!empty($_smarty_tpl->tpl_vars['itemsProducto']->value) && !empty($_smarty_tpl->tpl_vars['accesoTmpEmail']->value)) {?><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
formulario-envio" class="pay">PAGAR</a><?php } elseif (!empty($_smarty_tpl->tpl_vars['itemsProducto']->value)) {?><a href="#" class="pay clic" id="id-iniciar">INICIAR SESION</a><?php }?><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
carrito" class="view">VER CARRITO</a></div></div></div></section><section class="menu_celular"><div class="menu_celular_head"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/img/logo/logo.png" width="100%"><a href="javascript:void();" id="close_menu_cel"><i class="fad fa-times-hexagon"></i></a></div><div class="menu_celular_body"><h5>MENÚ DE NAVEGACIÓN</h5><ul id="accordion"><li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
inicio">Inicio</a></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
nosotros" class="<?php if ((isset($_smarty_tpl->tpl_vars['nosotros_active']->value))) {?>active<?php }?>">Nosotros</a></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
nutricion" class="<?php if ((isset($_smarty_tpl->tpl_vars['nutricion_active']->value))) {?>active<?php }?>">Valores<br>nutricionales</a></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
preparaciones" class="<?php if ((isset($_smarty_tpl->tpl_vars['recetas_active']->value))) {?>active<?php }?>">Preparaciones</a></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
creencias" class="<?php if ((isset($_smarty_tpl->tpl_vars['mitos_active']->value))) {?>active<?php }?>">Creencias</a></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
tiendas" class="<?php if ((isset($_smarty_tpl->tpl_vars['puntosventa_active']->value))) {?>active<?php }?>">Tiendas</a></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
productos" class="<?php if ((isset($_smarty_tpl->tpl_vars['productos_active']->value))) {?>active<?php }?>">Productos</a></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
pedidos" class="<?php if ((isset($_smarty_tpl->tpl_vars['pedidos_active']->value))) {?>active<?php }?>">Pedidos</a></li></ul></div></section><div class="modal fade" id="modal-login-register" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"><div class="modal-dialog modal-dialog-centered" role="document"><div class="modal-content"><div class="modal-header"><ul class="nav nav-tabs" id="myTablogin-register" role="tablist"><li class="nav-item"><a class="nav-link active" id="login-tab" data-toggle="tab" href="#logintab" role="tab" aria-controls="login" aria-selected="true"><i class="fad fa-user"></i> Iniciar Sesión</a></li><li class="nav-item"><a class="nav-link" id="signup-tab" data-toggle="tab" href="#signup" role="tab" aria-controls="signup" aria-selected="false"><i class="fad fa-user-plus"></i> Registrarse</a></li></ul></div><div class="modal-body"><div class="tab-content" id="myTabContent-login-signup"><div class="tab-pane fade show active" id="logintab" role="tabpanel" aria-labelledby="login-tab"><form class="form-login formulario" action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
cliente/proceso/login" method="post"><span class="respuesta"></span><div class="row justify-content-center"><div class="col-lg-12"><div class="input-form-login"><input type="text" name="usuario" maxlength="90" placeholder="E-mail"><i class="fad fa-envelope-square"></i></div></div><div class="col-lg-12"><div class="input-form-login"><input type="password" name="clave" maxlength="30" placeholder="Contraseña"><i class="fad fa-lock-alt"></i></div></div><div class="col-lg-12"><span><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
recuperar-cuenta" class="recover_password">Recuperar contraseña</a></span></div><div class="col-lg-12"><div class="input-form-login"><input type="submit" value="Ingresar" class="btn-login"></div></div></div></form></div><div class="tab-pane fade" id="signup" role="tabpanel" aria-labelledby="signup-tab"><form class="form-signup formulario" action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
cliente/proceso/registro" method="post"><span class="respuesta"></span><div class="row justify-content-center"><div class="col-lg-6"><div class="input-form-login"><input type="text" name="nombre" placeholder="Nombre" maxlength="115"><i class="fad fa-envelope-square"></i></div></div><div class="col-lg-6"><div class="input-form-login"><input type="text" name="celular" placeholder="Celular" maxlength="15"><i class="fad fa-envelope-square"></i></div></div><div class="col-lg-6"><div class="input-form-login"><input type="text" name="email" placeholder="E-mail" maxlength="90"><i class="fad fa-envelope-square"></i></div></div><div class="col-lg-6"><div class="input-form-login"><input type="password" name="contrasena" placeholder="Contraseña" maxlength="30"><i class="fad fa-lock-alt"></i></div></div><div class="col-lg-8"><div class="input-form-login"><input type="submit" value="Registrarse" name="" class="btn-login"></div></div></div></form></div></div></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button></div></div></div></div></header><div class="wrapper_content"><?php }
}
