<?php
/* Smarty version 3.1.36, created on 2020-08-24 18:44:36
  from '/home/s99ts68oq3kj/public_html/application/views/web/pagina/recuperar_contrasena.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f440a94039bb1_80573748',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5381d4c48cd6c1289ec3923b82318962342b1545' => 
    array (
      0 => '/home/s99ts68oq3kj/public_html/application/views/web/pagina/recuperar_contrasena.tpl',
      1 => 1595660046,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f440a94039bb1_80573748 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="sect_title_interna sect_title_general"><div class="container"><div class="row"><div class="col-lg-12"><h2 class="white">Recuperar contraseña</h2></div></div></div></section><section class="sect_recuperar onda_design"><div class="container"><div class="row justify-content-center"><div class="col-lg-12"><p class="p_info">Ingresa tu correo y en breve estaremos enviando un mail para que restaures tu contraseña.</p><form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
recuperar/clave" class="form_recupera formulario" novalidate="novalidate" method="post"><span class="respuesta"></span><div class="row"><div class="col-lg-12"><div class="flex_inputs"><input type="email" name="email" placeholder="E-mail" class="input_login" maxlength="90" minlength="6"><input type="submit" value="Enviar" class="input_recupera_submit"></div></div></div></form></div></div></div></section><?php }
}
