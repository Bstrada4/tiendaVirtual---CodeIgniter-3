<?php
/* Smarty version 3.1.36, created on 2020-08-05 22:44:00
  from '/home/s99ts68oq3kj/public_html/test/application/views/dashboard/structure/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f2b36305a1d38_47507342',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5f391f33df3c858ad8ae02cd655435e2ba751698' => 
    array (
      0 => '/home/s99ts68oq3kj/public_html/test/application/views/dashboard/structure/header.tpl',
      1 => 1595659188,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f2b36305a1d38_47507342 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html><html lang="es"><head><meta charset="utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui"><?php if ((isset($_smarty_tpl->tpl_vars['tituloEncabezado']->value))) {?><title><?php echo $_smarty_tpl->tpl_vars['tituloEncabezado']->value;?>
</title><?php }?><meta content="Admin Dashboard" name="description" /><meta content="Themesbrand" name="author" /><link rel="shortcut icon" href="<?php if ((isset($_smarty_tpl->tpl_vars['proyectoFavicon']->value))) {
echo $_smarty_tpl->tpl_vars['proyectoFavicon']->value;
}?>"><?php echo '<script'; ?>
>var baseUrl = "<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
";var getUrl = "<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
";<?php echo '</script'; ?>
><?php if ((isset($_smarty_tpl->tpl_vars['jqueryDataTable']->value)) && (isset($_smarty_tpl->tpl_vars['clasesDataTable']->value))) {?><link href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" /><link href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" /><?php }?><link href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet"><link href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet"><link href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" /><link href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" /><link href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"><link href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/assets/css/metisMenu.min.css" rel="stylesheet" type="text/css"><link href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/assets/css/icons.css" rel="stylesheet" type="text/css"><link href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/assets/css/style.css" rel="stylesheet" type="text/css"><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/plugins/alertifyjs/css/alertify.css" type="text/css" /><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/plugins/alertifyjs/css/themes/default.css" type="text/css" /><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/dashboard/css/style.css" type="text/css" /></head><?php }
}
