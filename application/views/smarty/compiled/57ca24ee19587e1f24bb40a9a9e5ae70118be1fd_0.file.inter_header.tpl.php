<?php
/* Smarty version 3.1.36, created on 2020-08-08 15:33:03
  from '/home/s99ts68oq3kj/public_html/test/application/views/dashboard/structure/inter_header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f2ec5afac97a0_65390505',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '57ca24ee19587e1f24bb40a9a9e5ae70118be1fd' => 
    array (
      0 => '/home/s99ts68oq3kj/public_html/test/application/views/dashboard/structure/inter_header.tpl',
      1 => 1596900781,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f2ec5afac97a0_65390505 (Smarty_Internal_Template $_smarty_tpl) {
?><body><div id="wrapper"><div class="topbar"><div class="topbar-left"><a href="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
principal/panel" class="logo"><span style="color: white;"><h5>PANEL DE ADMINISTRACIÓN</h5></span><i>PA</i></a></div><nav class="navbar-custom"><ul class="navbar-right list-inline float-right mb-0"><li class="dropdown notification-list list-inline-item d-none d-md-inline-block"><a class="nav-link waves-effect" href="#" id="btn-fullscreen"><i class="mdi mdi-fullscreen noti-icon"></i></a></li><li class="dropdown notification-list list-inline-item"><div class="dropdown notification-list nav-pro-img"><a class="dropdown-toggle nav-link arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false"><img src="<?php if ((isset($_smarty_tpl->tpl_vars['accesoTmpImagen']->value))) {
echo $_smarty_tpl->tpl_vars['accesoTmpImagen']->value;
}?>" alt="<?php if ((isset($_smarty_tpl->tpl_vars['accesoTmpNombre']->value))) {
echo $_smarty_tpl->tpl_vars['accesoTmpNombre']->value;
}?>" class="rounded-circle"></a><div class="dropdown-menu dropdown-menu-right profile-dropdown "><a class="dropdown-item" href="#" onClick="location.href='<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
usuario/perfil'"><i class="mdi mdi-account-circle m-r-5"></i> Perfil</a><div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#" onClick="location.href='<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
acceso/proceso/logout'"><i class="mdi mdi-power text-danger"></i> Cerrar sesión</a></div></div></li></ul><ul class="list-inline menu-left mb-0"><li class="float-left"><button class="button-menu-mobile open-left waves-effect"><i class="mdi mdi-menu"></i></button></li></ul></nav></div><div class="left side-menu"><div class="slimscroll-menu" id="remove-scroll"><div id="sidebar-menu"><ul class="metismenu" id="side-menu"><li><a href="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
principal/panel" class="waves-effect <?php if ((isset($_smarty_tpl->tpl_vars['panel_active']->value))) {
echo $_smarty_tpl->tpl_vars['panel_active']->value;
}?>"><i class="ti-home"></i><span> Inicio </span></a></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
usuario/listar" class="waves-effect <?php if ((isset($_smarty_tpl->tpl_vars['usuario_active']->value))) {
echo $_smarty_tpl->tpl_vars['usuario_active']->value;
}?>"><i class="ti-user"></i><span> Usuario </span></a></li><li class="menu-title">Menú</li><li><a href="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
slider/listar" class="waves-effect <?php if ((isset($_smarty_tpl->tpl_vars['slider_active']->value))) {
echo $_smarty_tpl->tpl_vars['slider_active']->value;
}?>"><i class="ti-image"></i><span> Slider </span></a></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
nosotros/panel" class="waves-effect <?php if ((isset($_smarty_tpl->tpl_vars['nosotros_active']->value))) {
echo $_smarty_tpl->tpl_vars['nosotros_active']->value;
}?>"><i class="ti-info-alt"></i><span> Nosotros </span></a></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
nutricion/listar" class="waves-effect <?php if ((isset($_smarty_tpl->tpl_vars['nutricion_active']->value))) {
echo $_smarty_tpl->tpl_vars['nutricion_active']->value;
}?>"><i class="ti-heart-broken"></i><span> Valor nutricional </span></a></li><li class="<?php if ((isset($_smarty_tpl->tpl_vars['receta_active']->value))) {
echo $_smarty_tpl->tpl_vars['receta_active']->value;
}?>"><a href="javascript:void(0);" class="waves-effect <?php if ((isset($_smarty_tpl->tpl_vars['receta_active']->value))) {
echo $_smarty_tpl->tpl_vars['receta_active']->value;
}?>"><i class="ti-bookmark-alt"></i><span> Preparaciones <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a><ul class="submenu"><li><a href="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
clasificacion/listar" class="<?php if ((isset($_smarty_tpl->tpl_vars['clasificacion_active']->value))) {
echo $_smarty_tpl->tpl_vars['clasificacion_active']->value;
}?>">Categoría</a></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
recetas/listar" class="<?php if ((isset($_smarty_tpl->tpl_vars['recetas_active']->value))) {
echo $_smarty_tpl->tpl_vars['recetas_active']->value;
}?>">Listar</a></li></ul></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
mitos/listar" class="waves-effect <?php if ((isset($_smarty_tpl->tpl_vars['mitos_active']->value))) {
echo $_smarty_tpl->tpl_vars['mitos_active']->value;
}?>"><i class="ti-world"></i><span> Creencias </span></a></li><li class="<?php if ((isset($_smarty_tpl->tpl_vars['producto_active']->value))) {
echo $_smarty_tpl->tpl_vars['producto_active']->value;
}?>"><a href="javascript:void(0);" class="waves-effect <?php if ((isset($_smarty_tpl->tpl_vars['producto_active']->value))) {
echo $_smarty_tpl->tpl_vars['producto_active']->value;
}?>"><i class="ti-shopping-cart"></i><span> Producto <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a><ul class="submenu"><li><a href="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
categoria/listar" class="<?php if ((isset($_smarty_tpl->tpl_vars['categoria_active']->value))) {
echo $_smarty_tpl->tpl_vars['categoria_active']->value;
}?>">Categoría</a></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
productos/listar" class="<?php if ((isset($_smarty_tpl->tpl_vars['productos_active']->value))) {
echo $_smarty_tpl->tpl_vars['productos_active']->value;
}?>">Listar</a></li></ul></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
clientes/listar" class="waves-effect <?php if ((isset($_smarty_tpl->tpl_vars['clientes_active']->value))) {
echo $_smarty_tpl->tpl_vars['clientes_active']->value;
}?>"><i class="ti-id-badge"></i><span> Clientes </span></a></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
cotizacion/listar" class="waves-effect <?php if ((isset($_smarty_tpl->tpl_vars['cotizacion_active']->value))) {
echo $_smarty_tpl->tpl_vars['cotizacion_active']->value;
}?>"><i class="ti-menu-alt"></i><span> Cotización </span></a></li><?php if ($_smarty_tpl->tpl_vars['accesoTmpRolId']->value == 500) {?><li><a href="javascript:void(0);" class="waves-effect"><i class="ti-email"></i><span> Configuración <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a><ul class="submenu"><li><a href="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
sistemaConfig/acceso">Acceso</a></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
sistemaConfig/panel">Sistema</a></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
sociales/panel">Redes sociales</a></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
maps/panel">Google maps</a></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
contacto/panel_1">Contacto 1</a></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
contacto/panel_2">Contacto 2</a></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
contacto/panel_3">Contacto 3</a></li></ul></li><?php }?></ul></div><div class="clearfix"></div></div></div><div class="content-page"><?php }
}
