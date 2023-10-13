<?php
/* Smarty version 3.1.36, created on 2020-09-04 18:38:49
  from '/home/s99ts68oq3kj/public_html/application/views/dashboard/page/observar_cliente.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f52d009e0b8c1_30540677',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6fe204ef93c3a5ad760c698cf49deb2482112af3' => 
    array (
      0 => '/home/s99ts68oq3kj/public_html/application/views/dashboard/page/observar_cliente.tpl',
      1 => 1595048876,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f52d009e0b8c1_30540677 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="content">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center"> 
                <div class="col-sm-6">
                    <h4 class="page-title">Detalles clientes</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Clientes</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Observar cliente</a></li>
                    </ol>

                </div>
                <div class="col-sm-6">
                
                    <div class="float-right d-md-block"> 
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-settings mr-2"></i> Acción
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
clientes/listar">Listar</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12">
                                <div class="invoice-title">
                                    <h3 class="mt-0" style="display: inline-block;">
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['observar_imagen']->value;?>
" title="<?php if ((isset($_smarty_tpl->tpl_vars['observar_nombre']->value))) {
echo $_smarty_tpl->tpl_vars['observar_nombre']->value;
}?>" alt="<?php if ((isset($_smarty_tpl->tpl_vars['observar_nombre']->value))) {
echo $_smarty_tpl->tpl_vars['observar_nombre']->value;
}?>" height="100"/>
                                    </h3>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-8">
                                        <address>
                                            <h4><strong>Datos mitos:</strong></h4><br>
                                            <strong>Nombre:</strong> <?php if ((isset($_smarty_tpl->tpl_vars['observar_nombre']->value))) {
echo $_smarty_tpl->tpl_vars['observar_nombre']->value;
}?><br>
                                            <strong>Email:</strong> <?php if ((isset($_smarty_tpl->tpl_vars['observar_email']->value))) {
echo $_smarty_tpl->tpl_vars['observar_email']->value;
}?><br>
                                            <strong>Celular/Teléfono:</strong> <?php if ((isset($_smarty_tpl->tpl_vars['observar_celular']->value))) {
echo $_smarty_tpl->tpl_vars['observar_celular']->value;
}?><br>
                                            <strong>Dirección:</strong> <?php if ((isset($_smarty_tpl->tpl_vars['observar_direccion']->value))) {
echo $_smarty_tpl->tpl_vars['observar_direccion']->value;
}?><br>
                                        </address>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 m-t-30">
                                        <address>
                                            <strong>Datos registro:</strong><br>
                                            <strong>Fecha registro:</strong> <?php if ((isset($_smarty_tpl->tpl_vars['fechaRegistro']->value))) {
echo $_smarty_tpl->tpl_vars['fechaRegistro']->value;
}?><br>
                                            <strong>Fecha modificación:</strong> <?php if ((isset($_smarty_tpl->tpl_vars['fechaModificacion']->value))) {
echo $_smarty_tpl->tpl_vars['fechaModificacion']->value;
}?><br>
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div><?php }
}
