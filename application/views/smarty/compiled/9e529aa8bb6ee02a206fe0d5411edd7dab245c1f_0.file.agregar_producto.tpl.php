<?php
/* Smarty version 3.1.36, created on 2020-08-05 22:51:57
  from '/home/s99ts68oq3kj/public_html/test/application/views/dashboard/page/agregar_producto.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f2b380d205ae0_43016912',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9e529aa8bb6ee02a206fe0d5411edd7dab245c1f' => 
    array (
      0 => '/home/s99ts68oq3kj/public_html/test/application/views/dashboard/page/agregar_producto.tpl',
      1 => 1595651904,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f2b380d205ae0_43016912 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="content"><div class="container-fluid"><div class="page-title-box"><div class="row align-items-center"><div class="col-sm-6"><h4 class="page-title">Formulario producto</h4><ol class="breadcrumb"><li class="breadcrumb-item"><a href="javascript:void(0);">Producto</a></li><li class="breadcrumb-item"><a href="javascript:void(0);">Agregar producto</a></li></ol></div></div></div><form action="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
productos/proceso/agregar" method="post" class="formulario" accept-charset="utf-8" enctype="multipart/form-data"><span class="respuesta"></span><div class="row"><div class="col-lg-6"><div class="card"><div class="card-body"><label>Título</label><input type="text" class="form-control" maxlength="150" name="titulo" value="<?php if ((isset($_smarty_tpl->tpl_vars['titulo']->value))) {
echo $_smarty_tpl->tpl_vars['titulo']->value;
}?>" autocomplete="off" /><label>Subtitulo</label><input type="text" class="form-control" maxlength="100" name="subtitulo" value="<?php if ((isset($_smarty_tpl->tpl_vars['subtitulo']->value))) {
echo $_smarty_tpl->tpl_vars['subtitulo']->value;
}?>" autocomplete="off" /><label>Precio</label><input type="text" class="form-control" maxlength="10" name="precio" value="<?php if ((isset($_smarty_tpl->tpl_vars['precio']->value))) {
echo $_smarty_tpl->tpl_vars['precio']->value;
}?>" autocomplete="off" /><?php if ((isset($_smarty_tpl->tpl_vars['categoriaId']->value))) {?><div class="m-t-20"><div class="form-group"><label class="control-label">Categoría</label><?php echo $_smarty_tpl->tpl_vars['categoriaId']->value;?>
</div></div><?php }
if ((isset($_smarty_tpl->tpl_vars['descripcion']->value))) {?><div class="m-t-20"><label>Descripción:</label><?php echo $_smarty_tpl->tpl_vars['descripcion']->value;?>
</div><?php }?></div></div><div class="card"><div class="card-body"><h4 class="mt-0 header-title">Imagen</h4><div class="form-group"><label>(*) Imágen con una dimension equivalente a 600*500 px como máximo. Tambien tener en cuenta que tiene que tener un peso Máximo de 2 MB.</label><input type="file" class="filestyle" data-buttonname="btn-secondary" name="imagenProducto"></div></div></div><div class="form-group mb-0"><div class="form-group"><button type="submit" class="btn btn-primary waves-effect waves-light mr-1">GUARDAR</button></div></div></div></div></form></div></div><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/plugins/ckeditor/ckeditor.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
>
        CKEDITOR.replace('descripcion', {
            height: 280, 
            skin: 'office2013',
            removeButtons: 'Source,Save,NewPage,DocProps,Preview,Print,Templates,document,Cut,Copy,Paste,PasteText,PasteFromWord,Undo,Redo,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Bold,Italic,Underline,Strike,Subscript,Superscript,RemoveFormat,NumberedList,BulletedList,Outdent,Indent,Blockquote,CreateDiv,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,BidiLtr,BidiRtl,Link,Unlink,Anchor,CreatePlaceholder,Image,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,InsertPre,Styles,Format,Font,FontSize,TextColor,BGColor,UIColor,Maximize,ShowBlocks,button1,button2,button3,oembed,MediaEmbed,About'
        });
    <?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/plugins/jquery/2.1.3/jquery.min.js"><?php echo '</script'; ?>
><?php }
}
