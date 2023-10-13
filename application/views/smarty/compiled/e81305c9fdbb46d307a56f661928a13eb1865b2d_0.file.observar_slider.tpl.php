<?php
/* Smarty version 3.1.36, created on 2020-08-22 16:46:55
  from '/home/s99ts68oq3kj/public_html/test/application/views/dashboard/page/observar_slider.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f41924fa1b8d4_71499737',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e81305c9fdbb46d307a56f661928a13eb1865b2d' => 
    array (
      0 => '/home/s99ts68oq3kj/public_html/test/application/views/dashboard/page/observar_slider.tpl',
      1 => 1594538570,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f41924fa1b8d4_71499737 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="content">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center"> 
                <div class="col-sm-6">
                    <h4 class="page-title">Detalles slider</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Slider</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Observar slider</a></li>
                    </ol>

                </div>
                <div class="col-sm-6">
                
                    <div class="float-right d-none d-md-block"> 
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-settings mr-2"></i> Acción
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
slider/agregar">Agregar</a>
                                <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
slider/listar">Listar</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
slider/editar/<?php if ((isset($_smarty_tpl->tpl_vars['observar_id']->value))) {
echo $_smarty_tpl->tpl_vars['observar_id']->value;
}?>">Editar slider</a>
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
                                    <h3 class="mt-0">
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['observar_imagen']->value;?>
" alt="logo" height="100"/>
                                    </h3>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-6">
                                        <address>
                                            <h4><strong>Datos slider:</strong></h4><br>
                                            <strong>Título:</strong> <?php if ((isset($_smarty_tpl->tpl_vars['observar_titulo']->value))) {
echo $_smarty_tpl->tpl_vars['observar_titulo']->value;
}?><br>
                                            <strong>Posición:</strong> <?php if ((isset($_smarty_tpl->tpl_vars['observar_posicion']->value))) {
echo $_smarty_tpl->tpl_vars['observar_posicion']->value;
}?><br>
                                        </address>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 m-t-30">
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
