<?php
/* Smarty version 3.1.36, created on 2020-09-04 18:07:09
  from '/home/s99ts68oq3kj/public_html/application/views/dashboard/page/observar_cotizacion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f52c89d1f3a96_39216183',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0fb3d05071684766227a063950ced1253b9b3bfe' => 
    array (
      0 => '/home/s99ts68oq3kj/public_html/application/views/dashboard/page/observar_cotizacion.tpl',
      1 => 1596577695,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f52c89d1f3a96_39216183 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="content">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center"> 
                <div class="col-sm-6">
                    <h4 class="page-title">Detalles cotización</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Cotización</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Observar cotización</a></li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-body">
                        <div class="row">
                            <?php if ((isset($_smarty_tpl->tpl_vars['estadoId']->value))) {?>
                            <form action="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
cotizacion/proceso/editar" method="post" class="formulario" accept-charset="utf-8" enctype="multipart/form-data">
                                <span class="respuesta"></span>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="m-t-20">
                                            <div class="form-group">
                                                <label class="control-label">Estado Cotización</label>
                                                <?php echo $_smarty_tpl->tpl_vars['estadoId']->value;?>

                                            </div>
                                        </div>
                                        <input type="hidden" name="id_cotizacion" value="<?php echo $_smarty_tpl->tpl_vars['observar_id']->value;?>
">
                                        <div class="form-group mb-0">
                                            <div>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                    GUARDAR ESTADO
                                                </button>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </form>
                             <?php }?>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <address>
                                            <h4><strong>Datos cotización:</strong></h4><br>
                                            <strong>Nombre:</strong> <?php if ((isset($_smarty_tpl->tpl_vars['observar_nombre']->value))) {
echo $_smarty_tpl->tpl_vars['observar_nombre']->value;
}?><br>
                                            <strong>Email:</strong> <?php if ((isset($_smarty_tpl->tpl_vars['observar_email']->value))) {
echo $_smarty_tpl->tpl_vars['observar_email']->value;
}?><br>
                                            <strong>Teléfono:</strong> <?php if ((isset($_smarty_tpl->tpl_vars['observar_telefono']->value))) {
echo $_smarty_tpl->tpl_vars['observar_telefono']->value;
}?><br>
                                            <strong>Dirección:</strong> <?php if ((isset($_smarty_tpl->tpl_vars['observar_direccion']->value))) {
echo $_smarty_tpl->tpl_vars['observar_direccion']->value;
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

                                <?php if ((isset($_smarty_tpl->tpl_vars['listadoItem']->value))) {?>
                                <div class="row">
                                    <span class="respuesta"></span>
                                    <div class="col-6 m-t-30">
                                        <address>
                                            <strong>Productos:</strong>
                                        </address>
                                        <table class="table table-bordered mb-0  table-striped dt-responsive table-sm">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th style="text-align: center; vertical-align: middle;">Título</th>
                                                    <th style="text-align: center; vertical-align: middle;">Precio</th>
                                                    <th style="text-align: center; vertical-align: middle;">Cantidad</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listadoItem']->value, 'items');
$_smarty_tpl->tpl_vars['items']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['items']->value) {
$_smarty_tpl->tpl_vars['items']->do_else = false;
?>
                                                <tr>
                                                    <th style="text-align: center; vertical-align: middle;"><?php echo $_smarty_tpl->tpl_vars['items']->value['titulo'];?>
</th>
                                                    <th style="text-align: center; vertical-align: middle;">S/<?php echo $_smarty_tpl->tpl_vars['items']->value['precio'];?>
</th>
                                                    <th style="text-align: center; vertical-align: middle;"><?php echo $_smarty_tpl->tpl_vars['items']->value['cantidad'];?>
</th>
                                                </tr>
                                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                            </tbody>
                                        </table>
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
