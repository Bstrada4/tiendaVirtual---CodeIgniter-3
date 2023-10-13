<?php
/* Smarty version 3.1.36, created on 2020-08-05 17:45:52
  from '/home/s99ts68oq3kj/public_html/test/application/views/dashboard/page/listar_productos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f2b36a072f1f8_14686905',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd256436484190c9d117a388037f9a223c713191c' => 
    array (
      0 => '/home/s99ts68oq3kj/public_html/test/application/views/dashboard/page/listar_productos.tpl',
      1 => 1595143814,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f2b36a072f1f8_14686905 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="content"><div class="container-fluid"><div class="page-title-box"><div class="row align-items-center"><div class="col-sm-6"><h4 class="page-title">Módulo productos</h4><ol class="breadcrumb"><li class="breadcrumb-item"><a href="javascript:void(0);">Productos</a></li><li class="breadcrumb-item"><a href="javascript:void(0);">Listar</a></li></ol></div><div class="col-sm-6"><div class="float-right d-md-block"><div class="dropdown"><button class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-settings mr-2"></i> Acción</button><div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
productos/agregar">Agregar</a></div></div></div></div></div></div><?php if ((isset($_smarty_tpl->tpl_vars['generaTabla']->value))) {?><span class="respuesta"></span><div class="row"><div class="col-12"><div class="card"><div class="card-body"><?php echo $_smarty_tpl->tpl_vars['generaTabla']->value;?>
</div></div></div></div><?php }?></div></div><?php }
}
