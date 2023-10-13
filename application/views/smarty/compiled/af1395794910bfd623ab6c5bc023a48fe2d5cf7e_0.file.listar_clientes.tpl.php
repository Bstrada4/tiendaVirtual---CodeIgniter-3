<?php
/* Smarty version 3.1.36, created on 2020-08-25 18:31:03
  from '/home/s99ts68oq3kj/public_html/application/views/dashboard/page/listar_clientes.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f459f372061d4_08056811',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'af1395794910bfd623ab6c5bc023a48fe2d5cf7e' => 
    array (
      0 => '/home/s99ts68oq3kj/public_html/application/views/dashboard/page/listar_clientes.tpl',
      1 => 1595047996,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f459f372061d4_08056811 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="content"><div class="container-fluid"><div class="page-title-box"><div class="row align-items-center"><div class="col-sm-6"><h4 class="page-title">Módulo clientes</h4><ol class="breadcrumb"><li class="breadcrumb-item"><a href="javascript:void(0);">Clientes</a></li><li class="breadcrumb-item"><a href="javascript:void(0);">Listar</a></li></ol></div></div></div><?php if ((isset($_smarty_tpl->tpl_vars['generaTabla']->value))) {?><span class="respuesta"></span><div class="row"><div class="col-12"><div class="card"><div class="card-body"><?php echo $_smarty_tpl->tpl_vars['generaTabla']->value;?>
</div></div></div></div><?php }?></div></div><?php }
}
