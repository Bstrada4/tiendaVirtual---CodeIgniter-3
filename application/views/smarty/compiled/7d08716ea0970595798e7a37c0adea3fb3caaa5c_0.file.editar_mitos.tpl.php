<?php
/* Smarty version 3.1.36, created on 2020-08-08 15:36:23
  from '/home/s99ts68oq3kj/public_html/test/application/views/dashboard/page/editar_mitos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f2ec677b8e507_12170926',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7d08716ea0970595798e7a37c0adea3fb3caaa5c' => 
    array (
      0 => '/home/s99ts68oq3kj/public_html/test/application/views/dashboard/page/editar_mitos.tpl',
      1 => 1596211598,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f2ec677b8e507_12170926 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="content"><div class="container-fluid"><div class="page-title-box"><div class="row align-items-center"><div class="col-sm-6"><h4 class="page-title">Formulario mitos</h4><ol class="breadcrumb"><li class="breadcrumb-item"><a href="javascript:void(0);">Mitos</a></li><li class="breadcrumb-item"><a href="javascript:void(0);">Editar mitos</a></li></ol></div></div></div><form action="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
mitos/proceso/editar" method="post" class="formulario" accept-charset="utf-8" enctype="multipart/form-data"><span class="respuesta"></span><div class="row"><div class="col-lg-6"><div class="card"><div class="card-body"><label>Título</label><input type="text" class="form-control" maxlength="100" name="titulo" id="defaultconfig" value="<?php if ((isset($_smarty_tpl->tpl_vars['titulo']->value))) {
echo $_smarty_tpl->tpl_vars['titulo']->value;
}?>" autocomplete="off" /><label>Subtitulo</label><input type="text" class="form-control" maxlength="100" name="subtitulo" id="defaultconfig" value="<?php if ((isset($_smarty_tpl->tpl_vars['subtitulo']->value))) {
echo $_smarty_tpl->tpl_vars['subtitulo']->value;
}?>" autocomplete="off" /><label>Icono</label><br><small>Puede encontrar iconos <a style="color:red;" href="https://fontawesome.com/icons?d=gallery" target="_blank">aquí</a>: </small><textarea id="" rows="2" name="icono" style="width: 100%;resize: none;"><?php if ((isset($_smarty_tpl->tpl_vars['icono']->value))) {
echo $_smarty_tpl->tpl_vars['icono']->value;
}?></textarea><div class="m-t-20"><label>Descripción:</label><?php echo $_smarty_tpl->tpl_vars['descripcion']->value;?>
</div></div></div><div class="card"><div class="card-body"><h4 class="mt-0 header-title">Imagen</h4><div class="form-group"><label>(*) Imágen con una dimension equivalente a 1600*900 px como máximo. Tambien tener en cuenta que tiene que tener un peso Máximo de 2 MB.</label><input type="file" class="filestyle" data-buttonname="btn-secondary" name="imagenMitos"></div></div></div><div class="form-group mb-0"><div><button type="submit" class="btn btn-primary waves-effect waves-light mr-1">GUARDAR</button></div></div></div></div></form></div></div><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/plugins/ckeditor/ckeditor.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
>

        CKEDITOR.replace('descripcion', {

            height: 280, 

            skin: 'office2013'

        });

    <?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/plugins/jquery/2.1.3/jquery.min.js"><?php echo '</script'; ?>
><?php }
}
