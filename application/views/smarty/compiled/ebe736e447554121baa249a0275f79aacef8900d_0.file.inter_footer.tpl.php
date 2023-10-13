<?php
/* Smarty version 3.1.36, created on 2020-08-25 23:30:57
  from '/home/s99ts68oq3kj/public_html/application/views/dashboard/structure/inter_footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f459f316dc9d6_58586343',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ebe736e447554121baa249a0275f79aacef8900d' => 
    array (
      0 => '/home/s99ts68oq3kj/public_html/application/views/dashboard/structure/inter_footer.tpl',
      1 => 1594543824,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f459f316dc9d6_58586343 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/s99ts68oq3kj/public_html/vendor/smarty/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<footer class="footer">© Copyright <?php echo smarty_modifier_date_format(time(),"%Y");?>
 - <?php if ((isset($_smarty_tpl->tpl_vars['proyectoPieDePagina']->value))) {
echo $_smarty_tpl->tpl_vars['proyectoPieDePagina']->value;
}?>.</footer></div></div><?php }
}
