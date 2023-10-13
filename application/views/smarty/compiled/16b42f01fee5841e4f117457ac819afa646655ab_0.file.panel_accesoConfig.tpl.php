<?php
/* Smarty version 3.1.36, created on 2020-08-28 21:16:17
  from '/home/s99ts68oq3kj/public_html/application/views/dashboard/page/panel_accesoConfig.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f497421874429_05662313',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '16b42f01fee5841e4f117457ac819afa646655ab' => 
    array (
      0 => '/home/s99ts68oq3kj/public_html/application/views/dashboard/page/panel_accesoConfig.tpl',
      1 => 1596576092,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f497421874429_05662313 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="content"><div class="container-fluid"><div class="page-title-box"><div class="row align-items-center"><div class="col-sm-6"><h4 class="page-title">Panel sistema</h4><ol class="breadcrumb"><li class="breadcrumb-item"><a href="javascript:void(0);">Configuración</a></li><li class="breadcrumb-item"><a href="javascript:void(0);">Sistema</a></li></ol></div></div></div><form action="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
sistemaConfig/proceso/acceso" method="post" class="formulario" accept-charset="utf-8" enctype="multipart/form-data"><span class="respuesta"></span><div class="row"><div class="col-lg-6"><div class="card"><div class="card-body"><label>Intentos erroneos:</label><p class="text-muted m-b-15">(*) Cantidad de intentos erroneos al momento de acceder a cualquier formulario de acceso.</p><input type="text" class="form-control" maxlength="2" name="intentoError" id="defaultconfig" value="<?php if ((isset($_smarty_tpl->tpl_vars['config_error']->value))) {
echo $_smarty_tpl->tpl_vars['config_error']->value;
}?>" autocomplete="off" /><div class="m-t-20"><label>Tiempo de bloqueo:</label><p class="text-muted m-b-15">(*) Tiempo máximo que un usuario estará bloqueado luego de haber exedido los intentos erroneos. El tiempo se expresa en minutos.</p><input type="text" maxlength="2" name="tiempoBloqueo" class="form-control" id="defaultconfig" value="<?php if ((isset($_smarty_tpl->tpl_vars['config_bloqueo']->value))) {
echo $_smarty_tpl->tpl_vars['config_bloqueo']->value;
}?>" autocomplete="off"/></div><div class="m-t-20"><label>Duración del captcha:</label><p class="text-muted m-b-15">(*) Tiempo máximo que durará la imágen de seguridad conocida como captcha que aparece en los paneles de acceso. El tiempo se expresa en segundos.</p><input type="text" maxlength="4" name="duracionCaptcha" class="form-control" id="defaultconfig" value="<?php if ((isset($_smarty_tpl->tpl_vars['config_captcha']->value))) {
echo $_smarty_tpl->tpl_vars['config_captcha']->value;
}?>" autocomplete="off"/></div></div></div><div class="form-group mb-0"><div><button type="submit" class="btn btn-primary waves-effect waves-light mr-1">GUARDAR</button></div></div></div></div></form></div></div><?php }
}
