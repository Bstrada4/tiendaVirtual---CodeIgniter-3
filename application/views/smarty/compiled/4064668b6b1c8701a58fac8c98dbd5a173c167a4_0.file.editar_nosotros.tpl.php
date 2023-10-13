<?php
/* Smarty version 3.1.36, created on 2020-09-03 19:31:56
  from '/home/s99ts68oq3kj/public_html/application/views/dashboard/page/editar_nosotros.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f5144ac4b26d2_44108193',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4064668b6b1c8701a58fac8c98dbd5a173c167a4' => 
    array (
      0 => '/home/s99ts68oq3kj/public_html/application/views/dashboard/page/editar_nosotros.tpl',
      1 => 1595054170,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f5144ac4b26d2_44108193 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="content"><div class="container-fluid"><div class="page-title-box"><div class="row align-items-center"><div class="col-sm-6"><h4 class="page-title">Formulario nosotros</h4><ol class="breadcrumb"><li class="breadcrumb-item"><a href="javascript:void(0);">Nosotros</a></li><li class="breadcrumb-item"><a href="javascript:void(0);">Editar nosotros</a></li></ol></div></div></div><form action="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
nosotros/proceso/editar" method="post" class="formulario" accept-charset="utf-8" enctype="multipart/form-data"><span class="respuesta"></span><div class="row"><div class="col-lg-6"><div class="card"><div class="card-body"><?php if ((isset($_smarty_tpl->tpl_vars['descripcion_1']->value))) {?><div class="m-t-20"><label>Descripción:</label><?php echo $_smarty_tpl->tpl_vars['descripcion_1']->value;?>
</div><br><?php }
if ((isset($_smarty_tpl->tpl_vars['mensaje_1']->value))) {?><label>Mensaje 1</label><input type="text" class="form-control" maxlength="100" name="mensaje_1" value="<?php echo $_smarty_tpl->tpl_vars['mensaje_1']->value;?>
" autocomplete="off" /><?php }
if ((isset($_smarty_tpl->tpl_vars['mensaje_2']->value))) {?><label>Mensaje 2</label><input type="text" class="form-control" maxlength="100" name="mensaje_2" value="<?php echo $_smarty_tpl->tpl_vars['mensaje_2']->value;?>
" autocomplete="off" /><?php }
if ((isset($_smarty_tpl->tpl_vars['mensaje_3']->value))) {?><label>Mensaje 3</label><input type="text" class="form-control" maxlength="100" name="mensaje_3" value="<?php echo $_smarty_tpl->tpl_vars['mensaje_3']->value;?>
" autocomplete="off" /><?php }
if ((isset($_smarty_tpl->tpl_vars['mensaje_4']->value))) {?><label>Mensaje 4</label><input type="text" class="form-control" maxlength="100" name="mensaje_4" value="<?php echo $_smarty_tpl->tpl_vars['mensaje_4']->value;?>
" autocomplete="off" /><?php }
if ((isset($_smarty_tpl->tpl_vars['mensaje_5']->value))) {?><label>Mensaje 5</label><input type="text" class="form-control" maxlength="100" name="mensaje_5" value="<?php echo $_smarty_tpl->tpl_vars['mensaje_5']->value;?>
" autocomplete="off" /><?php }
if ((isset($_smarty_tpl->tpl_vars['descripcion_2']->value))) {?><div class="m-t-20"><label>Misión:</label><?php echo $_smarty_tpl->tpl_vars['descripcion_2']->value;?>
</div><?php }
if ((isset($_smarty_tpl->tpl_vars['descripcion_3']->value))) {?><div class="m-t-20"><label>Visión:</label><?php echo $_smarty_tpl->tpl_vars['descripcion_3']->value;?>
</div><?php }?></div></div><div class="card"><div class="card-body"><h4 class="mt-0 header-title">Imagen</h4><div class="form-group"><label>(*) Imágen con una dimension equivalente a 1000*1100 px como máximo. Tambien tener en cuenta que tiene que tener un peso Máximo de 2 MB.</label><input type="file" class="filestyle" data-buttonname="btn-secondary" name="imagenNosotros"></div></div></div><div class="form-group mb-0"><div><button type="submit" class="btn btn-primary waves-effect waves-light mr-1">GUARDAR</button></div></div></div><?php if (!empty($_smarty_tpl->tpl_vars['observar_imagen']->value)) {?><div class="col-lg-6"><div class="card"><img src="<?php echo $_smarty_tpl->tpl_vars['observar_imagen']->value;?>
" width="100%"></div></div><?php }?></div></form></div></div><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/plugins/ckeditor/ckeditor.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
>
        CKEDITOR.replace('descripcion_1', {
            height: 120, 
            skin: 'office2013',
            removeButtons: 'Save,Print,Templates,CreateDiv,Underline,Subscript,Superscript,Strike,Iframe,CreatePlaceholder,Image,Flash,Table,HorizontalRule,,Smiley,SpecialChar,PageBreak,Iframe,InsertPre,ImageButton,HiddenField,Form,Find,Replace,SelectAll,Scayt,Flash,Button,About,MediaEmbed,oembed'
        });

        CKEDITOR.replace('descripcion_2', {
            height: 120, 
            skin: 'office2013',
            removeButtons: 'Save,Print,Templates,CreateDiv,Underline,Subscript,Superscript,Strike,Iframe,CreatePlaceholder,Image,Flash,Table,HorizontalRule,,Smiley,SpecialChar,PageBreak,Iframe,InsertPre,ImageButton,HiddenField,Form,Find,Replace,SelectAll,Scayt,Flash,Button,About,MediaEmbed,oembed'
        });

        CKEDITOR.replace('descripcion_3', {
            height: 120, 
            skin: 'office2013',
            removeButtons: 'Save,Print,Templates,CreateDiv,Underline,Subscript,Superscript,Strike,Iframe,CreatePlaceholder,Image,Flash,Table,HorizontalRule,,Smiley,SpecialChar,PageBreak,Iframe,InsertPre,ImageButton,HiddenField,Form,Find,Replace,SelectAll,Scayt,Flash,Button,About,MediaEmbed,oembed'
        });
    <?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/plugins/jquery/2.1.3/jquery.min.js"><?php echo '</script'; ?>
><?php }
}
