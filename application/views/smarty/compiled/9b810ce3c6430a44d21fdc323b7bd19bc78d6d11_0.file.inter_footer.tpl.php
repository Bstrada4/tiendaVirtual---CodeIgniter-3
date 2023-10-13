<?php
/* Smarty version 3.1.36, created on 2020-12-22 18:05:29
  from 'C:\xampp\htdocs\CLIENTES\FREELANCE\TIENDAVIRTUAL\ARAKAKYSCHICKEN\versiones\Arakakys_final\application\views\dashboard\structure\inter_footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5fe22759a29258_30173619',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9b810ce3c6430a44d21fdc323b7bd19bc78d6d11' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CLIENTES\\FREELANCE\\TIENDAVIRTUAL\\ARAKAKYSCHICKEN\\versiones\\Arakakys_final\\application\\views\\dashboard\\structure\\inter_footer.tpl',
      1 => 1594543824,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fe22759a29258_30173619 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\CLIENTES\\FREELANCE\\TIENDAVIRTUAL\\ARAKAKYSCHICKEN\\versiones\\Arakakys_final\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<footer class="footer">© Copyright <?php echo smarty_modifier_date_format(time(),"%Y");?>
 - <?php if ((isset($_smarty_tpl->tpl_vars['proyectoPieDePagina']->value))) {
echo $_smarty_tpl->tpl_vars['proyectoPieDePagina']->value;
}?>.</footer></div></div><?php }
}
