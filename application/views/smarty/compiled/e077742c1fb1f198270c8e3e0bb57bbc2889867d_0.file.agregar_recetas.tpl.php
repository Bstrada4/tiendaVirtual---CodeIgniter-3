<?php
/* Smarty version 3.1.36, created on 2020-08-22 22:01:28
  from '/home/s99ts68oq3kj/public_html/test/application/views/dashboard/page/agregar_recetas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f4195b84507a5_18384309',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e077742c1fb1f198270c8e3e0bb57bbc2889867d' => 
    array (
      0 => '/home/s99ts68oq3kj/public_html/test/application/views/dashboard/page/agregar_recetas.tpl',
      1 => 1594600800,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f4195b84507a5_18384309 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="content"><div class="container-fluid"><div class="page-title-box"><div class="row align-items-center"><div class="col-sm-6"><h4 class="page-title">Formulario recetas</h4><ol class="breadcrumb"><li class="breadcrumb-item"><a href="javascript:void(0);">Recetas</a></li><li class="breadcrumb-item"><a href="javascript:void(0);">Agregar recetas</a></li></ol></div></div></div><form action="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
recetas/proceso/agregar" method="post" class="formulario" accept-charset="utf-8" enctype="multipart/form-data"><span class="respuesta"></span><div class="row"><div class="col-lg-6"><div class="card"><div class="card-body"><label>Título</label><input type="text" class="form-control" maxlength="150" name="titulo" id="defaultconfig" value="<?php if ((isset($_smarty_tpl->tpl_vars['titulo']->value))) {
echo $_smarty_tpl->tpl_vars['titulo']->value;
}?>" autocomplete="off" /><label>Subtítulo</label><input type="text" class="form-control" maxlength="100" name="subtitulo" value="<?php if ((isset($_smarty_tpl->tpl_vars['subtitulo']->value))) {
echo $_smarty_tpl->tpl_vars['subtitulo']->value;
}?>" autocomplete="off" /><?php if ((isset($_smarty_tpl->tpl_vars['clasificacionId']->value))) {?><div class="m-t-20"><div class="form-group"><label class="control-label">Categoría</label><?php echo $_smarty_tpl->tpl_vars['clasificacionId']->value;?>
</div></div><?php }?><div class="m-t-20"><label>Descripción:</label><?php echo $_smarty_tpl->tpl_vars['descripcion']->value;?>
</div></div></div><div class="card"><div class="card-body"><h4 class="mt-0 header-title">Imagen</h4><div class="form-group"><label>(*) Imágen con una dimension equivalente a 1600*900 px como máximo. Tambien tener en cuenta que tiene que tener un peso Máximo de 2 MB.</label><input type="file" class="filestyle" data-buttonname="btn-secondary" name="imagenRecetas"></div></div></div><div class="form-group mb-0"><div class="form-group"><button type="submit" class="btn btn-primary waves-effect waves-light mr-1">GUARDAR</button></div></div></div></div></form></div></div><?php echo '<script'; ?>
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
