<?php
/* Smarty version 3.1.36, created on 2020-08-22 21:44:30
  from '/home/s99ts68oq3kj/public_html/test/application/views/dashboard/page/agregar_slider.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f4191be342a18_84915891',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9f48f0690d9aca8a7bfc43cc5a915579bad4ed61' => 
    array (
      0 => '/home/s99ts68oq3kj/public_html/test/application/views/dashboard/page/agregar_slider.tpl',
      1 => 1594543696,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f4191be342a18_84915891 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="content"><div class="container-fluid"><div class="page-title-box"><div class="row align-items-center"><div class="col-sm-6"><h4 class="page-title">Formulario slider</h4><ol class="breadcrumb"><li class="breadcrumb-item"><a href="javascript:void(0);">Slider</a></li><li class="breadcrumb-item"><a href="javascript:void(0);">Agregar slider</a></li></ol></div></div></div><form action="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
slider/proceso/agregar" method="post" class="formulario" accept-charset="utf-8" enctype="multipart/form-data"><span class="respuesta"></span><div class="row"><div class="col-lg-6"><div class="card"><div class="card-body"><label>Título</label><input type="text" class="form-control" maxlength="150" name="titulo" id="defaultconfig" value="<?php if ((isset($_smarty_tpl->tpl_vars['titulo']->value))) {
echo $_smarty_tpl->tpl_vars['titulo']->value;
}?>" autocomplete="off" /></div></div><div class="card"><div class="card-body"><h4 class="mt-0 header-title">Imagen</h4><div class="form-group"><label>(*) Imágen con una dimension equivalente a 2000*1100 px como máximo. Tambien tener en cuenta que tiene que tener un peso Máximo de 2 MB.</label><input type="file" class="filestyle" data-buttonname="btn-secondary" name="imagenSlider"></div></div></div><div class="form-group mb-0"><div class="form-group"><button type="submit" class="btn btn-primary waves-effect waves-light mr-1">GUARDAR</button></div></div></div></div></form></div></div><?php }
}
