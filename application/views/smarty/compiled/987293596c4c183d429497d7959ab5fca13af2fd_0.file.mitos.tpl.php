<?php
/* Smarty version 3.1.36, created on 2021-01-30 17:02:27
  from 'C:\xampp\htdocs\CLIENTES\FREELANCE\TIENDAVIRTUAL\ARAKAKYSCHICKEN\versiones\Arakakys_final\application\views\web\pagina\mitos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_60158313c452d2_13735632',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '987293596c4c183d429497d7959ab5fca13af2fd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CLIENTES\\FREELANCE\\TIENDAVIRTUAL\\ARAKAKYSCHICKEN\\versiones\\Arakakys_final\\application\\views\\web\\pagina\\mitos.tpl',
      1 => 1596900408,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60158313c452d2_13735632 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="sect_title_interna sect_title_general"><div class="container"><div class="row"><div class="col-lg-12"><h2 class="white">Creencias</h2></div></div></div></section><?php if ((isset($_smarty_tpl->tpl_vars['listadoMitos']->value))) {?><section class="sect_mitos onda_design"><div class="container"><div class="row"><div class="col-lg-12"><div class="box_mito"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listadoMitos']->value, 'items');
$_smarty_tpl->tpl_vars['items']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['items']->value) {
$_smarty_tpl->tpl_vars['items']->do_else = false;
?><a class="box_item" href="<?php echo $_smarty_tpl->tpl_vars['items']->value['slug'];?>
"><div class="box_head"><div class="icon_mito"><?php echo $_smarty_tpl->tpl_vars['items']->value['icono'];?>
</div></div><div class="box_body"><div class="content_text"><h5><?php echo $_smarty_tpl->tpl_vars['items']->value['titulo'];?>
</h5><p><?php echo $_smarty_tpl->tpl_vars['items']->value['subtitulo'];?>
</p></div></div></a><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div></div></div></div></section><?php }
}
}
