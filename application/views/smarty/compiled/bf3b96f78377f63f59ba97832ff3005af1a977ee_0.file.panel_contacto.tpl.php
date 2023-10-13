<?php
/* Smarty version 3.1.36, created on 2020-08-22 22:11:11
  from '/home/s99ts68oq3kj/public_html/test/application/views/dashboard/page/panel_contacto.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f4197ffb79214_71745862',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bf3b96f78377f63f59ba97832ff3005af1a977ee' => 
    array (
      0 => '/home/s99ts68oq3kj/public_html/test/application/views/dashboard/page/panel_contacto.tpl',
      1 => 1594947518,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f4197ffb79214_71745862 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="content"><div class="container-fluid"><div class="page-title-box"><div class="row align-items-center"><div class="col-sm-6"><h4 class="page-title">Panel contacto 1</h4><ol class="breadcrumb"><li class="breadcrumb-item"><a href="javascript:void(0);">Configuración</a></li><li class="breadcrumb-item"><a href="javascript:void(0);">Contacto 1</a></li></ol></div></div></div><form action="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
contacto/proceso/panel" method="post" class="formulario" accept-charset="utf-8" enctype="multipart/form-data"><span class="respuesta"></span><div class="row"><div class="col-lg-6"><div class="card"><div class="card-body"><label>Correo:</label><input type="text" class="form-control" maxlength="100" name="correo" value="<?php if ((isset($_smarty_tpl->tpl_vars['correo']->value))) {
echo $_smarty_tpl->tpl_vars['correo']->value;
}?>" autocomplete="off" placeholder="Correo" /></div><div class="card-body"><label>Dirección:</label><input type="text" class="form-control" maxlength="100" name="direccion" value="<?php if ((isset($_smarty_tpl->tpl_vars['direccion']->value))) {
echo $_smarty_tpl->tpl_vars['direccion']->value;
}?>" autocomplete="off" placeholder="Dirección" /></div><div class="card-body"><label>Whatshapp cabecera:</label><input type="text" class="form-control" maxlength="13" name="whatshapp_value" value="<?php if ((isset($_smarty_tpl->tpl_vars['whatshapp_value']->value))) {
echo $_smarty_tpl->tpl_vars['whatshapp_value']->value;
}?>" autocomplete="off" placeholder="Enlace"/><div class="m-t-10"><input type="text" maxlength="24" name="whatshapp_name" class="form-control" value="<?php if ((isset($_smarty_tpl->tpl_vars['whatshapp_name']->value))) {
echo $_smarty_tpl->tpl_vars['whatshapp_name']->value;
}?>" autocomplete="off" placeholder="Nombre"/></div></div><div class="card-body"><label>Teléfono cabecera:</label><input type="text" class="form-control" maxlength="12" name="telefono_c_value" value="<?php if ((isset($_smarty_tpl->tpl_vars['telefono_c_value']->value))) {
echo $_smarty_tpl->tpl_vars['telefono_c_value']->value;
}?>" autocomplete="off" placeholder="Enlace" /><div class="m-t-10"><input type="text" maxlength="24" name="telefono_c_name" class="form-control" value="<?php if ((isset($_smarty_tpl->tpl_vars['telefono_c_name']->value))) {
echo $_smarty_tpl->tpl_vars['telefono_c_name']->value;
}?>" autocomplete="off" placeholder="Nombre"/></div></div><div class="card-body"><label>Teléfono inferior 1:</label><input type="text" class="form-control" maxlength="12" name="telefono_i1_value" value="<?php if ((isset($_smarty_tpl->tpl_vars['telefono_i1_value']->value))) {
echo $_smarty_tpl->tpl_vars['telefono_i1_value']->value;
}?>" autocomplete="off" placeholder="Enlace" /><div class="m-t-10"><input type="text" maxlength="24" name="telefono_i1_name" class="form-control" value="<?php if ((isset($_smarty_tpl->tpl_vars['telefono_i1_name']->value))) {
echo $_smarty_tpl->tpl_vars['telefono_i1_name']->value;
}?>" autocomplete="off" placeholder="Nombre"/></div></div><div class="card-body"><label>Teléfono inferior 2:</label><input type="text" class="form-control" maxlength="12" name="telefono_i2_value" value="<?php if ((isset($_smarty_tpl->tpl_vars['telefono_i2_value']->value))) {
echo $_smarty_tpl->tpl_vars['telefono_i2_value']->value;
}?>" autocomplete="off" placeholder="Enlace" /><div class="m-t-10"><input type="text" maxlength="24" name="telefono_i2_name" class="form-control" value="<?php if ((isset($_smarty_tpl->tpl_vars['telefono_i2_name']->value))) {
echo $_smarty_tpl->tpl_vars['telefono_i2_name']->value;
}?>" autocomplete="off" placeholder="Nombre"/></div></div></div><div class="form-group mb-0"><div><button type="submit" class="btn btn-primary waves-effect waves-light mr-1">GUARDAR</button></div></div></div></div></form></div></div><?php }
}
