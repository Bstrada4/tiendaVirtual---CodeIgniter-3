<?php
/* Smarty version 3.1.36, created on 2020-12-22 18:06:49
  from 'C:\xampp\htdocs\CLIENTES\FREELANCE\TIENDAVIRTUAL\ARAKAKYSCHICKEN\versiones\Arakakys_final\application\views\dashboard\page\agregar_categoria.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5fe227a94c1dc6_81734895',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '076d236f48d994a8cb9508f3dd9f704adfef4123' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CLIENTES\\FREELANCE\\TIENDAVIRTUAL\\ARAKAKYSCHICKEN\\versiones\\Arakakys_final\\application\\views\\dashboard\\page\\agregar_categoria.tpl',
      1 => 1595648732,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fe227a94c1dc6_81734895 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="content"><div class="container-fluid"><div class="page-title-box"><div class="row align-items-center"><div class="col-sm-6"><h4 class="page-title">Formulario categoría</h4><ol class="breadcrumb"><li class="breadcrumb-item"><a href="javascript:void(0);">Categoría</a></li><li class="breadcrumb-item"><a href="javascript:void(0);">Agregar categoría</a></li></ol></div></div></div><form action="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
categoria/proceso/agregar" method="post" class="formulario" accept-charset="utf-8" enctype="multipart/form-data"><span class="respuesta"></span><div class="row"><div class="col-lg-6"><div class="card"><div class="card-body"><label>Título</label><input type="text" class="form-control" maxlength="50" name="titulo" id="defaultconfig" value="<?php if ((isset($_smarty_tpl->tpl_vars['titulo']->value))) {
echo $_smarty_tpl->tpl_vars['titulo']->value;
}?>" autocomplete="off" /><label>Subtitulo</label><input type="text" class="form-control" maxlength="90" name="subtitulo" id="defaultconfig" value="<?php if ((isset($_smarty_tpl->tpl_vars['subtitulo']->value))) {
echo $_smarty_tpl->tpl_vars['subtitulo']->value;
}?>" autocomplete="off" /></div></div><div class="card"><div class="card-body"><h4 class="mt-0 header-title">Imagen</h4><div class="form-group"><label>(*) Imágen con una dimension equivalente a 650*900 px como máximo. Tambien tener en cuenta que tiene que tener un peso Máximo de 2 MB.</label><input type="file" class="filestyle" data-buttonname="btn-secondary" name="imagenCategoria"></div></div></div><div class="form-group mb-0"><div class="form-group"><button type="submit" class="btn btn-primary waves-effect waves-light mr-1">GUARDAR</button></div></div></div></div></form></div></div><?php }
}
