<?php
/* Smarty version 3.1.36, created on 2020-08-05 22:44:00
  from '/home/s99ts68oq3kj/public_html/test/application/views/dashboard/structure/inter_footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f2b3630711665_52061934',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0368b9c628048e4083d239dfd33422c1fe5c800d' => 
    array (
      0 => '/home/s99ts68oq3kj/public_html/test/application/views/dashboard/structure/inter_footer.tpl',
      1 => 1594543824,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f2b3630711665_52061934 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/s99ts68oq3kj/public_html/test/vendor/smarty/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<footer class="footer">© Copyright <?php echo smarty_modifier_date_format(time(),"%Y");?>
 - <?php if ((isset($_smarty_tpl->tpl_vars['proyectoPieDePagina']->value))) {
echo $_smarty_tpl->tpl_vars['proyectoPieDePagina']->value;
}?>.</footer></div></div><?php }
}
