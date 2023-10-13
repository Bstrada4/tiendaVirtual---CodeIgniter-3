<?php
/* Smarty version 3.1.36, created on 2020-08-22 21:57:47
  from '/home/s99ts68oq3kj/public_html/test/application/views/dashboard/page/agregar_nutricion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f4194db0a3518_46704159',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e51a29ef7b7ff698336dc721dab07cee426a0601' => 
    array (
      0 => '/home/s99ts68oq3kj/public_html/test/application/views/dashboard/page/agregar_nutricion.tpl',
      1 => 1594605060,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f4194db0a3518_46704159 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="content"><div class="container-fluid"><div class="page-title-box"><div class="row align-items-center"><div class="col-sm-6"><h4 class="page-title">Formulario nutrición</h4><ol class="breadcrumb"><li class="breadcrumb-item"><a href="javascript:void(0);">Nutrición</a></li><li class="breadcrumb-item"><a href="javascript:void(0);">Agregar nutrición</a></li></ol></div></div></div><form action="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
nutricion/proceso/agregar" method="post" class="formulario" accept-charset="utf-8" enctype="multipart/form-data"><span class="respuesta"></span><div class="row"><div class="col-lg-6"><div class="card"><div class="card-body"><label>Título</label><input type="text" class="form-control" maxlength="150" name="titulo" id="defaultconfig" value="<?php if ((isset($_smarty_tpl->tpl_vars['titulo']->value))) {
echo $_smarty_tpl->tpl_vars['titulo']->value;
}?>" autocomplete="off" /><?php if ((isset($_smarty_tpl->tpl_vars['descripcion_corta']->value))) {?><div class="m-t-20"><label>Descripción rapida:</label><?php echo $_smarty_tpl->tpl_vars['descripcion_corta']->value;?>
</div><?php }
if ((isset($_smarty_tpl->tpl_vars['descripcion']->value))) {?><div class="m-t-20"><label>Descripción:</label><?php echo $_smarty_tpl->tpl_vars['descripcion']->value;?>
</div><?php }?></div></div><div class="card"><div class="card-body"><h4 class="mt-0 header-title">Imagen</h4><div class="form-group"><label>(*) Imágen con una dimension equivalente a 2000*1100 px como máximo. Tambien tener en cuenta que tiene que tener un peso Máximo de 2 MB.</label><input type="file" class="filestyle" data-buttonname="btn-secondary" name="imagenNutricion"></div></div><div class="card-body"><h4 class="mt-0 header-title">Imagen home</h4><div class="form-group"><label>(*) Imágen con una dimension equivalente a 1200*800 px como máximo. Tambien tener en cuenta que tiene que tener un peso Máximo de 2 MB.</label><input type="file" class="filestyle" data-buttonname="btn-secondary" name="imagenNutricionHome"></div></div></div><div class="form-group mb-0"><div class="form-group"><button type="submit" class="btn btn-primary waves-effect waves-light mr-1">GUARDAR</button></div></div></div></div></form></div></div><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/plugins/ckeditor/ckeditor.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
>

        CKEDITOR.replace('descripcion_corta', {
            height: 120, 
            skin: 'office2013',
            removeButtons: 'Save,Print,Templates,CreateDiv,Underline,Subscript,Superscript,Strike,Iframe,CreatePlaceholder,Image,Flash,Table,HorizontalRule,,Smiley,SpecialChar,PageBreak,Iframe,InsertPre,ImageButton,HiddenField,Form,Find,Replace,SelectAll,Scayt,Flash,Button,About,MediaEmbed,oembed'
        });

        CKEDITOR.replace('descripcion', {
            height: 280, 
            skin: 'office2013',
            removeButtons: 'Save,Form,About'
        });

    <?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/plugins/jquery/2.1.3/jquery.min.js"><?php echo '</script'; ?>
><?php }
}
