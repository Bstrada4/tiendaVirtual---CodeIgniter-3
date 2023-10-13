<?php
/* Smarty version 3.1.36, created on 2020-08-08 15:30:03
  from '/home/s99ts68oq3kj/public_html/test/application/views/web/pagina/formulario_envio.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f2ec4fb5314d4_58060177',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cf942cb8469c9ecb23462f089dfc5277c492d017' => 
    array (
      0 => '/home/s99ts68oq3kj/public_html/test/application/views/web/pagina/formulario_envio.tpl',
      1 => 1595658156,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f2ec4fb5314d4_58060177 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="sect_title_interna sect_title_general"><div class="container"><div class="row"><div class="col-lg-12"><h2 class="white">Formulario de envío</h2></div></div></div></section><section class="sect_proceso_compra onda_design"><div class="container"><div class="row"><div class="col-lg-12"><ul class="list_pasos_carrito"><li class="paso1"><h5>CARRITO DE COMPRA</h5><span>1</span></li><li class="paso2 active"><h5>FORMULARIO DE ENVÍO</h5><span>2</span></li><li class="paso3"><h5>COTIZACIÓN ENVIADA</h5><span>3</span></li></ul></div></div></div></section><section class="sect_formulario_envio"><div class="container"><div class="row"><div class="col-lg-12"><div class="form_contact"><form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
formulario-envio/cotizar" name="contact-form" class="bform h-contact-form formulario" id="contact-form" novalidate="novalidate" method="post"><span class="respuesta"></span><div class="row"><div class="col-md-6"><div class="form-group focused"><label>Nombre o Empresa</label><input type="text" class="form-control" maxlength="115" name="nombre" id="name" value="<?php if ((isset($_smarty_tpl->tpl_vars['accesoTmpNombre']->value))) {
echo $_smarty_tpl->tpl_vars['accesoTmpNombre']->value;
}?>"></div></div><div class="col-md-6"><div class="form-group"><label>Teléfono</label><input type="text" class="form-control" maxlength="25" name="celular" id="phone" value="<?php if ((isset($_smarty_tpl->tpl_vars['accesoTmpCelular']->value))) {
echo $_smarty_tpl->tpl_vars['accesoTmpCelular']->value;
}?>"></div></div><div class="col-md-12"><div class="form-group"><label>Dirección</label><input type="text" class="form-control" maxlength="155" name="direccion" id="productos" value="<?php if ((isset($_smarty_tpl->tpl_vars['accesoTmpDireccion']->value))) {
echo $_smarty_tpl->tpl_vars['accesoTmpDireccion']->value;
}?>"></div></div><div class="col-md-12"><div class="form-group"><label>E-mail</label><input type="email" class="form-control" name="email" id="email" value="<?php if ((isset($_smarty_tpl->tpl_vars['accesoTmpEmail']->value))) {
echo $_smarty_tpl->tpl_vars['accesoTmpEmail']->value;
}?>"></div></div><div class="col-md-12"><div class="form-group"><label>Mensaje</label><textarea class="form-control" rows="5" name="mensaje" id="message"></textarea></div></div><div class="col-md-12"></div><div class="col-md-12"><input type="submit" name="" value="Enviar" class="btn_frm_contact"></div></div></form></div></div></div></div></section><?php }
}
