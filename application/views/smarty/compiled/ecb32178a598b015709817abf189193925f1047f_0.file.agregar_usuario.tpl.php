<?php
/* Smarty version 3.1.36, created on 2020-08-05 22:44:52
  from '/home/s99ts68oq3kj/public_html/test/application/views/dashboard/page/agregar_usuario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f2b3664f1a297_90189430',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ecb32178a598b015709817abf189193925f1047f' => 
    array (
      0 => '/home/s99ts68oq3kj/public_html/test/application/views/dashboard/page/agregar_usuario.tpl',
      1 => 1594543626,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f2b3664f1a297_90189430 (Smarty_Internal_Template $_smarty_tpl) {
?> <!-- Start content -->
<div class="content">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center">     
                <div class="col-sm-6">
                    <h4 class="page-title">Formulario usuario</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Usuario</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Agregar usuario</a></li>
                    </ol>

                </div>
            </div>
        </div>
    
        <form action="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
usuario/proceso/agregar" method="post" class="formulario" accept-charset="utf-8" enctype="multipart/form-data">
            <span class="respuesta"></span>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">

                            <label>Usuario</label>
                            <input type="text" class="form-control" maxlength="20" name="usuario" id="defaultconfig" value="<?php if ((isset($_smarty_tpl->tpl_vars['prefil_usuario']->value))) {
echo $_smarty_tpl->tpl_vars['prefil_usuario']->value;
}?>" autocomplete="off"/>

                            <div class="m-t-20">
                                <label>Nombre</label>
                                <input type="text" maxlength="50" name="nombre" class="form-control" id="defaultconfig" value="<?php if ((isset($_smarty_tpl->tpl_vars['prefil_nombre']->value))) {
echo $_smarty_tpl->tpl_vars['prefil_nombre']->value;
}?>" autocomplete="off"/>
                            </div>

                            <div class="m-t-20">
                                <label>Apellido</label>
                                <input type="text" maxlength="50" name="apellido" class="form-control" id="defaultconfig" value="<?php if ((isset($_smarty_tpl->tpl_vars['prefil_apellido']->value))) {
echo $_smarty_tpl->tpl_vars['prefil_apellido']->value;
}?>" autocomplete="off"/>
                            </div>

                            <div class="m-t-20">
                                <label>Correo</label>
                                <input type="text" maxlength="50" name="correo" class="form-control" id="defaultconfig" value="<?php if ((isset($_smarty_tpl->tpl_vars['prefil_correo']->value))) {
echo $_smarty_tpl->tpl_vars['prefil_correo']->value;
}?>" autocomplete="off"/>
                            </div>

                            <?php if ((isset($_smarty_tpl->tpl_vars['rolId']->value))) {?>
                            <div class="m-t-20">
                                <div class="form-group">
                                    <label class="control-label">Roles</label>
                                    <?php echo $_smarty_tpl->tpl_vars['rolId']->value;?>

                                </div>
                            </div>
                            <?php }?>

                            <div class="m-t-20">
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <div>
                                        <input type="password" name="clave" class="form-control"  placeholder="Contraseña" maxlength="30" minlength="5"/>
                                    </div>
                                    <div class="m-t-10">
                                        <input type="password" name="reclave" class="form-control" placeholder="Verificar contraseña" maxlength="30" minlength="5"/>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div> 

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Imagen de usuario</h4>
                            <div class="form-group">
                                <label>(*) Imágen con una dimension equivalente a 1000*900 px como máximo. Tambien tener en cuenta que tiene que tener un peso Máximo de 1 MB.</label>
                                <input type="file" class="filestyle" data-buttonname="btn-secondary" name="imagenPrincipal">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-0">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                GUARDAR
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div><?php }
}
