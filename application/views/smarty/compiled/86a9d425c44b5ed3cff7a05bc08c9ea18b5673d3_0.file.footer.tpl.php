<?php
/* Smarty version 3.1.36, created on 2020-08-05 22:44:00
  from '/home/s99ts68oq3kj/public_html/test/application/views/dashboard/structure/footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f2b36307266c3_83370947',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '86a9d425c44b5ed3cff7a05bc08c9ea18b5673d3' => 
    array (
      0 => '/home/s99ts68oq3kj/public_html/test/application/views/dashboard/structure/footer.tpl',
      1 => 1595820320,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f2b36307266c3_83370947 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- jQuery  --><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/assets/js/jquery.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/assets/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/assets/js/metisMenu.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/assets/js/jquery.slimscroll.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/assets/js/waves.min.js"><?php echo '</script'; ?>
><?php if ((isset($_smarty_tpl->tpl_vars['jqueryDataTable']->value)) && (isset($_smarty_tpl->tpl_vars['clasesDataTable']->value))) {?><!-- Required datatable js --><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/plugins/datatables/jquery.dataTables.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/plugins/datatables/dataTables.bootstrap4.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
>$(document).ready(function(){var jqueryDataTable = <?php echo $_smarty_tpl->tpl_vars['jqueryDataTable']->value;?>
;var clasesDataTable = '<?php echo $_smarty_tpl->tpl_vars['clasesDataTable']->value;?>
';$(clasesDataTable).DataTable(jqueryDataTable);});<?php echo '</script'; ?>
><?php }?><!-- Plugins js --><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/plugins/select2/js/select2.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"><?php echo '</script'; ?>
><!-- Plugins Init js --><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/assets/pages/form-advanced.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/plugins/blockUI/jquery.blockUI.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/plugins/alertifyjs/alertify.js"><?php echo '</script'; ?>
><!-- App js --><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/assets/js/app.js"><?php echo '</script'; ?>
><!-- Proceso js --><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
public/dashboard/js/proceso.js"><?php echo '</script'; ?>
><?php echo '</script'; ?>
></body><?php }
}
