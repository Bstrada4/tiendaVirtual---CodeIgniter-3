<?php
/* Smarty version 3.1.36, created on 2020-08-22 17:04:53
  from '/home/s99ts68oq3kj/public_html/test/application/views/dashboard/page/listar_cotizacion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f419685f035f1_95024631',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e0591059ea8b2bb9900a43be0671422bafc16df6' => 
    array (
      0 => '/home/s99ts68oq3kj/public_html/test/application/views/dashboard/page/listar_cotizacion.tpl',
      1 => 1595662622,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f419685f035f1_95024631 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="content"><div class="container-fluid"><div class="page-title-box"><div class="row align-items-center"><div class="col-sm-6"><h4 class="page-title">Módulo cotización</h4><ol class="breadcrumb"><li class="breadcrumb-item"><a href="javascript:void(0);">Cotización</a></li><li class="breadcrumb-item"><a href="javascript:void(0);">Listar</a></li></ol></div></div></div><?php if ((isset($_smarty_tpl->tpl_vars['generaTabla']->value))) {?><span class="respuesta"></span><div class="row"><div class="col-12"><div class="card"><div class="card-body"><?php echo $_smarty_tpl->tpl_vars['generaTabla']->value;?>
</div></div></div></div><?php }?></div></div><?php }
}
