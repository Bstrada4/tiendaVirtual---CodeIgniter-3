<?php
/* Smarty version 3.1.36, created on 2020-08-22 22:16:12
  from '/home/s99ts68oq3kj/public_html/test/application/views/dashboard/page/panel_contacto_2.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f41992c0423a8_48786695',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '94b495ba21ae7612f986ac78046ca39d6ddcf004' => 
    array (
      0 => '/home/s99ts68oq3kj/public_html/test/application/views/dashboard/page/panel_contacto_2.tpl',
      1 => 1594947534,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f41992c0423a8_48786695 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="content"><div class="container-fluid"><div class="page-title-box"><div class="row align-items-center"><div class="col-sm-6"><h4 class="page-title">Panel contacto 2</h4><ol class="breadcrumb"><li class="breadcrumb-item"><a href="javascript:void(0);">Configuración</a></li><li class="breadcrumb-item"><a href="javascript:void(0);">Contacto 2</a></li></ol></div></div></div><form action="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
contacto/proceso/panel_2" method="post" class="formulario" accept-charset="utf-8" enctype="multipart/form-data"><span class="respuesta"></span><div class="row"><div class="col-lg-6"><div class="card"><div class="card-body"><label>Dirección:</label><input type="text" class="form-control" maxlength="100" name="direccion" value="<?php if ((isset($_smarty_tpl->tpl_vars['direccion']->value))) {
echo $_smarty_tpl->tpl_vars['direccion']->value;
}?>" autocomplete="off" placeholder="Dirección" /></div><div class="card-body"><label>Teléfono inferior 1:</label><input type="text" class="form-control" maxlength="14" name="telefono_i1_value" value="<?php if ((isset($_smarty_tpl->tpl_vars['telefono_i1_value']->value))) {
echo $_smarty_tpl->tpl_vars['telefono_i1_value']->value;
}?>" autocomplete="off" placeholder="Enlace" /><div class="m-t-10"><input type="text" maxlength="24" name="telefono_i1_name" class="form-control" value="<?php if ((isset($_smarty_tpl->tpl_vars['telefono_i1_name']->value))) {
echo $_smarty_tpl->tpl_vars['telefono_i1_name']->value;
}?>" autocomplete="off" placeholder="Nombre"/></div></div><div class="card-body"><label>Teléfono inferior 2:</label><input type="text" class="form-control" maxlength="14" name="telefono_i2_value" value="<?php if ((isset($_smarty_tpl->tpl_vars['telefono_i2_value']->value))) {
echo $_smarty_tpl->tpl_vars['telefono_i2_value']->value;
}?>" autocomplete="off" placeholder="Enlace" /><div class="m-t-10"><input type="text" maxlength="24" name="telefono_i2_name" class="form-control" value="<?php if ((isset($_smarty_tpl->tpl_vars['telefono_i2_name']->value))) {
echo $_smarty_tpl->tpl_vars['telefono_i2_name']->value;
}?>" autocomplete="off" placeholder="Nombre"/></div></div></div><div class="form-group mb-0"><div><button type="submit" class="btn btn-primary waves-effect waves-light mr-1">GUARDAR</button></div></div></div></div></form></div></div><?php }
}
