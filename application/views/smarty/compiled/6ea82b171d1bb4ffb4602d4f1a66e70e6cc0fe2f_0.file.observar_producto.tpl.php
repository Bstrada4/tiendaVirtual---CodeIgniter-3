<?php
/* Smarty version 3.1.36, created on 2020-08-05 18:33:05
  from '/home/s99ts68oq3kj/public_html/test/application/views/dashboard/page/observar_producto.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f2b41b1aa32b5_58910267',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6ea82b171d1bb4ffb4602d4f1a66e70e6cc0fe2f' => 
    array (
      0 => '/home/s99ts68oq3kj/public_html/test/application/views/dashboard/page/observar_producto.tpl',
      1 => 1595295964,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f2b41b1aa32b5_58910267 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="content">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center"> 
                <div class="col-sm-6">
                    <h4 class="page-title">Detalles mitos</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Mitos</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Observar mitos</a></li>
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
mitos/agregar">Agregar</a>
                                <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
mitos/listar">Listar</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
mitos/editar/<?php if ((isset($_smarty_tpl->tpl_vars['observar_id']->value))) {
echo $_smarty_tpl->tpl_vars['observar_id']->value;
}?>">Editar mitos</a>
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
" title="<?php if ((isset($_smarty_tpl->tpl_vars['observar_titulo']->value))) {
echo $_smarty_tpl->tpl_vars['observar_titulo']->value;
}?>" alt="<?php if ((isset($_smarty_tpl->tpl_vars['observar_titulo']->value))) {
echo $_smarty_tpl->tpl_vars['observar_titulo']->value;
}?>" height="100"/>
                                    </h3>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-8">
                                        <address>
                                            <h4><strong>Datos producto:</strong></h4><br>
                                            <strong>Título:</strong> <?php if ((isset($_smarty_tpl->tpl_vars['observar_titulo']->value))) {
echo $_smarty_tpl->tpl_vars['observar_titulo']->value;
}?><br>
                                            <strong>Subtitulo:</strong> <?php if ((isset($_smarty_tpl->tpl_vars['observar_subtitulo']->value))) {
echo $_smarty_tpl->tpl_vars['observar_subtitulo']->value;
}?><br>
                                            <strong>Categoría:</strong> <?php if ((isset($_smarty_tpl->tpl_vars['observar_categoria']->value))) {
echo $_smarty_tpl->tpl_vars['observar_categoria']->value;
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
                                <?php if (!empty($_smarty_tpl->tpl_vars['observar_descripcion']->value)) {?>
                                <div class="row">
                                    <div class="col-8 m-t-30">
                                        <address>
                                            <strong>Descripción:</strong><br>
                                            <hr>
                                            <?php if ((isset($_smarty_tpl->tpl_vars['observar_descripcion']->value))) {
echo $_smarty_tpl->tpl_vars['observar_descripcion']->value;
}?>
                                        </address>
                                    </div>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div><?php }
}
