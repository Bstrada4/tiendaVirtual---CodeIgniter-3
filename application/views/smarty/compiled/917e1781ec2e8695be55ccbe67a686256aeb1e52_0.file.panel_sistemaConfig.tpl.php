<?php
/* Smarty version 3.1.36, created on 2020-08-22 22:05:03
  from '/home/s99ts68oq3kj/public_html/test/application/views/dashboard/page/panel_sistemaConfig.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f41968f9a15c9_31916292',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '917e1781ec2e8695be55ccbe67a686256aeb1e52' => 
    array (
      0 => '/home/s99ts68oq3kj/public_html/test/application/views/dashboard/page/panel_sistemaConfig.tpl',
      1 => 1596576091,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f41968f9a15c9_31916292 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="content"><div class="container-fluid"><div class="page-title-box"><div class="row align-items-center"><div class="col-sm-6"><h4 class="page-title">Panel sistema</h4><ol class="breadcrumb"><li class="breadcrumb-item"><a href="javascript:void(0);">Configuración</a></li><li class="breadcrumb-item"><a href="javascript:void(0);">Sistema</a></li></ol></div></div></div><form action="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
sistemaConfig/proceso/panel" method="post" class="formulario" accept-charset="utf-8" enctype="multipart/form-data"><span class="respuesta"></span><div class="row"><div class="col-lg-6"><div class="card"><div class="card-body"><label>Título empresa</label><input type="text" class="form-control" maxlength="50" name="sisInfoTituloEmpresa" id="defaultconfig" value="<?php if ((isset($_smarty_tpl->tpl_vars['config_titulo']->value))) {
echo $_smarty_tpl->tpl_vars['config_titulo']->value;
}?>" autocomplete="off" /><div class="m-t-20"><label>Correo</label><input type="text" maxlength="55" name="sisInfoCorreo" class="form-control" id="defaultconfig" value="<?php if ((isset($_smarty_tpl->tpl_vars['config_correo']->value))) {
echo $_smarty_tpl->tpl_vars['config_correo']->value;
}?>" autocomplete="off"/></div><div class="m-t-20"><label>Pie de pagina</label><input type="text" maxlength="60" name="sisPieDePagina" class="form-control" id="defaultconfig" value="<?php if ((isset($_smarty_tpl->tpl_vars['config_pie']->value))) {
echo $_smarty_tpl->tpl_vars['config_pie']->value;
}?>" autocomplete="off"/></div></div></div><div class="card"><div class="card-body"><h4 class="mt-0 header-title">Favicon</h4><div class="form-group"><label>(*) Imágen con una dimension equivalente a 200*200 px como máximo. Tambien tener en cuenta que tiene que tener un peso Máximo de 1 MB.</label><input type="file" class="filestyle" data-buttonname="btn-secondary" name="imagenFavicon"></div></div></div><div class="form-group mb-0"><div><button type="submit" class="btn btn-primary waves-effect waves-light mr-1">GUARDAR</button></div></div></div></div></form></div></div><?php }
}
