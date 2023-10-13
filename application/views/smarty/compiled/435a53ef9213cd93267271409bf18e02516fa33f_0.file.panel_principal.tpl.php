<?php
/* Smarty version 3.1.36, created on 2020-08-25 23:30:57
  from '/home/s99ts68oq3kj/public_html/application/views/dashboard/page/panel_principal.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f459f3161ff36_81578938',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '435a53ef9213cd93267271409bf18e02516fa33f' => 
    array (
      0 => '/home/s99ts68oq3kj/public_html/application/views/dashboard/page/panel_principal.tpl',
      1 => 1596900866,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f459f3161ff36_81578938 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="content">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h4 class="page-title">Dashboard</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Welcome to Veltrix Dashboard</li>
                    </ol>

                </div>
                <div class="col-sm-6"> 
                    <div class="float-right d-none d-md-block">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-settings mr-2"></i> Settings
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-primary text-white">
                    <div class="card-body">
                        <div class="mb-4">
                           
                            <h5 class="font-16 text-uppercase mt-0 text-white-50">VALOR NUTRICIONAL</h5>
                            <h4 class="font-500"><?php echo $_smarty_tpl->tpl_vars['total_nutricion']->value;?>
 <i class="mdi  text-success ml-2"></i></h4>
                            
                        </div>
                        <div class="pt-2">
                            <div class="float-right">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
nutricion/listar" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                            </div>

                            <p class="text-white-50 mb-0">Ver mas</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-primary text-white">
                    <div class="card-body">
                        <div class="mb-4">
                           
                            <h5 class="font-16 text-uppercase mt-0 text-white-50">PREPARACIONES</h5>
                            <h4 class="font-500"><?php echo $_smarty_tpl->tpl_vars['total_receta']->value;?>
 <i class="mdi  text-success ml-2"></i></h4>
                            
                        </div>
                        <div class="pt-2">
                            <div class="float-right">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
recetas/listar" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                            </div>

                            <p class="text-white-50 mb-0">Ver mas</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-primary text-white">
                    <div class="card-body">
                        <div class="mb-4">
                           
                            <h5 class="font-16 text-uppercase mt-0 text-white-50">CLIENTES</h5>
                            <h4 class="font-500"><?php echo $_smarty_tpl->tpl_vars['total_cliente']->value;?>
 <i class="mdi  text-success ml-2"></i></h4>
                            
                        </div>
                        <div class="pt-2">
                            <div class="float-right">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
clientes/listar" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                            </div>

                            <p class="text-white-50 mb-0">Ver mas</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-primary text-white">
                    <div class="card-body">
                        <div class="mb-4">
                           
                            <h5 class="font-16 text-uppercase mt-0 text-white-50">PRODUCTOS</h5>
                            <h4 class="font-500"><?php echo $_smarty_tpl->tpl_vars['total_productos']->value;?>
 <i class="mdi  text-success ml-2"></i></h4>
                            
                        </div>
                        <div class="pt-2">
                            <div class="float-right">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
productos/listar" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                            </div>

                            <p class="text-white-50 mb-0">Ver mas</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php }
}
