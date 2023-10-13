<?php
/* Smarty version 3.1.36, created on 2020-12-22 18:05:29
  from 'C:\xampp\htdocs\CLIENTES\FREELANCE\TIENDAVIRTUAL\ARAKAKYSCHICKEN\versiones\Arakakys_final\application\views\dashboard\structure\footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5fe22759a72a15_90210493',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4dadc3b7c616db0e30ad256df2b349dcad8b4b16' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CLIENTES\\FREELANCE\\TIENDAVIRTUAL\\ARAKAKYSCHICKEN\\versiones\\Arakakys_final\\application\\views\\dashboard\\structure\\footer.tpl',
      1 => 1595820320,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fe22759a72a15_90210493 (Smarty_Internal_Template $_smarty_tpl) {
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
