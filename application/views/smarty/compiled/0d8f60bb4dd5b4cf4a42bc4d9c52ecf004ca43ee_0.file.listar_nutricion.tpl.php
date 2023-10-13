<?php
/* Smarty version 3.1.36, created on 2020-09-08 01:31:13
  from '/home/s99ts68oq3kj/public_html/application/views/dashboard/page/listar_nutricion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f56dee1db4c95_66124520',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0d8f60bb4dd5b4cf4a42bc4d9c52ecf004ca43ee' => 
    array (
      0 => '/home/s99ts68oq3kj/public_html/application/views/dashboard/page/listar_nutricion.tpl',
      1 => 1596900901,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f56dee1db4c95_66124520 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="content"><div class="container-fluid"><div class="page-title-box"><div class="row align-items-center"><div class="col-sm-6"><h4 class="page-title">Módulo valor nutricional</h4><ol class="breadcrumb"><li class="breadcrumb-item"><a href="javascript:void(0);">Valor nutricional</a></li><li class="breadcrumb-item"><a href="javascript:void(0);">Listar</a></li></ol></div><div class="col-sm-6"><div class="float-right d-md-block"><div class="dropdown"><button class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-settings mr-2"></i> Acción</button><div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
nutricion/agregar">Agregar</a></div></div></div></div></div></div><?php if ((isset($_smarty_tpl->tpl_vars['generaTabla']->value))) {?><span class="respuesta"></span><div class="row"><div class="col-12"><div class="card"><div class="card-body"><?php echo $_smarty_tpl->tpl_vars['generaTabla']->value;?>
</div></div></div></div><?php }?></div></div><?php }
}
