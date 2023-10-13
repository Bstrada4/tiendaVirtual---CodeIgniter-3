<?php
/* Smarty version 3.1.36, created on 2020-08-08 15:28:20
  from '/home/s99ts68oq3kj/public_html/test/application/views/dashboard/page/panel_login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f2ec4944487c3_23205865',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fc0a1d5dc3e46636dcf95a42722bfdef3bfdf471' => 
    array (
      0 => '/home/s99ts68oq3kj/public_html/test/application/views/dashboard/page/panel_login.tpl',
      1 => 1594531662,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f2ec4944487c3_23205865 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/s99ts68oq3kj/public_html/test/vendor/smarty/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<!DOCTYPE html><html lang="es"><head><meta charset="utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui"><title><?php if ((isset($_smarty_tpl->tpl_vars['tituloEncabezado']->value))) {
echo $_smarty_tpl->tpl_vars['tituloEncabezado']->value;
}?></title><link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/assets/images/favicon.ico"><link href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"><link href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/assets/css/icons.css" rel="stylesheet" type="text/css"><link href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/assets/css/style.css" rel="stylesheet" type="text/css"><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/plugins/alertifyjs/css/alertify.css" type="text/css" /><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/plugins/alertifyjs/css/themes/default.css" type="text/css" /><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/dashboard/css/style.css" type="text/css" /></head><body><div class="home-btn d-none d-sm-block"><?php if ((isset($_smarty_tpl->tpl_vars['baseUrl']->value))) {?><a href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
" class="text-dark"><i class="fas fa-home h2"></i></a><?php }?></div><div class="wrapper-page"><div class="card overflow-hidden account-card mx-3"><div class="bg-primary p-4 text-white text-center position-relative"><h4 class="font-20 m-b-5">Bienvenido a <?php if ((isset($_smarty_tpl->tpl_vars['proyectoTitulo']->value))) {
echo $_smarty_tpl->tpl_vars['proyectoTitulo']->value;
}?> !</h4><p class="text-white-50 mb-4">Inicie sesión para continuar.</p></div><div class="account-card-content"><form class="form-horizontal m-t-30 formulario" action="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
acceso/login" method="post" ><span class="respuesta"></span><div class="form-group"><label for="username">Usuario</label><input type="text" name="usuario" class="form-control" id="username" placeholder="Ingresar usuario" maxlength="20" minlength="5" autocomplete="off"></div><div class="form-group"><label for="userpassword">Contraseña</label><input type="password" name="clave" class="form-control" id="userpassword" placeholder="Ingresar contraseña" maxlength="25" minlength="5"></div><div class="form-group row m-t-20"><div class="col-sm-12"><button class="btn btn-primary w-md waves-effect waves-light" type="submit">Ingresar</button></div></div></form></div></div><div class="m-t-40 text-center"><p>© Copyright <?php echo smarty_modifier_date_format(time(),"%Y");?>
 - <?php if ((isset($_smarty_tpl->tpl_vars['proyectoPieDePagina']->value))) {
echo $_smarty_tpl->tpl_vars['proyectoPieDePagina']->value;
}?>.</p></div></div><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/assets/js/jquery.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/assets/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/plugins/blockUI/jquery.blockUI.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/plugins/alertifyjs/alertify.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/dashboard/js/login.min.js"><?php echo '</script'; ?>
></body></html><?php }
}
