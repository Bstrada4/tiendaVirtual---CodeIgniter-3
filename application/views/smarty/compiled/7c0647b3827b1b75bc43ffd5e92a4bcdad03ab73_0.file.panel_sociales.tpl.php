<?php
/* Smarty version 3.1.36, created on 2020-09-08 01:35:27
  from '/home/s99ts68oq3kj/public_html/application/views/dashboard/page/panel_sociales.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f56dfdff3e5a2_25875332',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7c0647b3827b1b75bc43ffd5e92a4bcdad03ab73' => 
    array (
      0 => '/home/s99ts68oq3kj/public_html/application/views/dashboard/page/panel_sociales.tpl',
      1 => 1594611210,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f56dfdff3e5a2_25875332 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="content"><div class="container-fluid"><div class="page-title-box"><div class="row align-items-center"><div class="col-sm-6"><h4 class="page-title">Panel redes sociales</h4><ol class="breadcrumb"><li class="breadcrumb-item"><a href="javascript:void(0);">Configuración</a></li><li class="breadcrumb-item"><a href="javascript:void(0);">Redes sociales</a></li></ol></div></div></div><form action="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
sociales/proceso/panel" method="post" class="formulario" accept-charset="utf-8" enctype="multipart/form-data"><span class="respuesta"></span><div class="row"><div class="col-lg-6"><div class="card"><div class="card-body"><label>Instagram:</label><input type="text" class="form-control" maxlength="160" name="instagram" value="<?php if ((isset($_smarty_tpl->tpl_vars['instagram']->value))) {
echo $_smarty_tpl->tpl_vars['instagram']->value;
}?>" autocomplete="off" placeholder="https://www.instagram.com" /></div><div class="card-body"><label>Twitter:</label><input type="text" class="form-control" maxlength="160" name="twitter" value="<?php if ((isset($_smarty_tpl->tpl_vars['twitter']->value))) {
echo $_smarty_tpl->tpl_vars['twitter']->value;
}?>" autocomplete="off" placeholder="https://www.twitter.com" /></div><div class="card-body"><label>Facebook:</label><input type="text" class="form-control" maxlength="160" name="facebook" value="<?php if ((isset($_smarty_tpl->tpl_vars['facebook']->value))) {
echo $_smarty_tpl->tpl_vars['facebook']->value;
}?>" autocomplete="off" placeholder="https://www.facebook.com" /></div><div class="card-body"><label>Youtube:</label><input type="text" class="form-control" maxlength="160" name="youtube" value="<?php if ((isset($_smarty_tpl->tpl_vars['youtube']->value))) {
echo $_smarty_tpl->tpl_vars['youtube']->value;
}?>" autocomplete="off" placeholder="https://www.youtube.com" /></div></div><div class="form-group mb-0"><div><button type="submit" class="btn btn-primary waves-effect waves-light mr-1">GUARDAR</button></div></div></div></div></form></div></div><?php }
}
