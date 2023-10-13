<?php
/* Smarty version 3.1.36, created on 2020-12-12 16:39:34
  from 'C:\xampp\htdocs\CLIENTES\FREELANCE\TIENDAVIRTUAL\ARAKAKYSCHICKEN\versiones\Arakakys_final\application\views\web\pagina\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5fd4e4360af5d0_98794525',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3c9c739ed9e1e6fe0e2fe60d662d3f1200beaa53' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CLIENTES\\FREELANCE\\TIENDAVIRTUAL\\ARAKAKYSCHICKEN\\versiones\\Arakakys_final\\application\\views\\web\\pagina\\home.tpl',
      1 => 1598399053,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fd4e4360af5d0_98794525 (Smarty_Internal_Template $_smarty_tpl) {
if ((isset($_smarty_tpl->tpl_vars['listadoSlider']->value))) {?><section class="section_slider"><div id="carouselExampleControls" class="carousel slide" data-ride="carousel"><div class="carousel-inner"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listadoSlider']->value, 'items');
$_smarty_tpl->tpl_vars['items']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['items']->value) {
$_smarty_tpl->tpl_vars['items']->do_else = false;
?><div class="carousel-item <?php echo $_smarty_tpl->tpl_vars['items']->value['active'];?>
" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['items']->value['imagen'];?>
);"></div><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div><a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span></a></div></section><?php }?><section class="sect_title_general onda_design"><div class="container"><div class="row"><div class="col-lg-12"><h6>Calidad al mejor precio</h6><h2>Nuestros Productos</h2></div></div></div></section><?php if ((isset($_smarty_tpl->tpl_vars['listadoCategoria']->value))) {?><section class="sect_categorias"><div class="container"><div class="row"><div class="col-lg-12"><div class="owl-carousel categorias owl-theme"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listadoCategoria']->value, 'items');
$_smarty_tpl->tpl_vars['items']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['items']->value) {
$_smarty_tpl->tpl_vars['items']->do_else = false;
?><div class="item"><div class="box_categoria"><a href="<?php echo $_smarty_tpl->tpl_vars['items']->value['slug'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['items']->value['imagen'];?>
" width="100%"></a><div class="caption_categoria"><h5><?php echo $_smarty_tpl->tpl_vars['items']->value['titulo'];?>
</h5><p><?php echo $_smarty_tpl->tpl_vars['items']->value['subtitulo'];?>
</p><a href="javascript:void(0);" onclick="filter_categoria(<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
)" >VER MÁS</a></div></div></div><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div></div></div></div></section><?php }
if ((isset($_smarty_tpl->tpl_vars['listadoNutricion']->value))) {?><section class="sect_title_general onda_design"><div class="container"><div class="row"><div class="col-lg-12"><h6>El mejor pollo</h6><h2>Valor Nutricional</h2></div></div></div></section><section class="sect_nutricion"><<div class="container"><div class="row"><div class="col-lg-12"><div class="img_nutricion"><div class="owl-carousel nutricion owl-theme"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listadoNutricion']->value, 'items');
$_smarty_tpl->tpl_vars['items']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['items']->value) {
$_smarty_tpl->tpl_vars['items']->do_else = false;
?><div class="item"><div class="box_nutricion"><div class="box_left"><h2><?php echo $_smarty_tpl->tpl_vars['items']->value['titulo'];?>
 <b>ARAKAKYS</b></h2></div><div class="box_center"><img src="<?php echo $_smarty_tpl->tpl_vars['items']->value['imagen_home'];?>
" width="100%"></div><div class="box_right"><div class="box_descripcion"><?php echo $_smarty_tpl->tpl_vars['items']->value['descripcion_corta'];?>
<a href="<?php echo $_smarty_tpl->tpl_vars['items']->value['slug'];?>
" class="btn_ver_mas">Ver más</a></div></div></div></div><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div></div></div></div></div></section><?php }
if (!empty($_smarty_tpl->tpl_vars['listadoMitos']->value)) {?><section class="sect_title_general bck_grey"><div class="container"><div class="row"><div class="col-lg-12"><h6>El mejor pollo</h6><h2>Creencias</h2><p>Queremos que conozcas sobre nuestra industria, aquí te presentamos algunos mitos sobre la crianza de pollos y sobre el huevo. ¡Conócelos mejor!</p></div></div></div></section><section class="sect_mitos"><div class="container pos_relative"><div class="row"><div class="col-lg-12"><div class="box_mito"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listadoMitos']->value, 'items');
$_smarty_tpl->tpl_vars['items']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['items']->value) {
$_smarty_tpl->tpl_vars['items']->do_else = false;
?><div class="box_item"><div class="box_head"><div class="icon_mito"><?php echo $_smarty_tpl->tpl_vars['items']->value['icono'];?>
<span class="line_separate"><i class="fad fa-arrow-right"></i></span></div></div><div class="box_body"><div class="content_text"><h5><?php echo $_smarty_tpl->tpl_vars['items']->value['titulo'];?>
</h5><p><?php echo $_smarty_tpl->tpl_vars['items']->value['subtitulo'];?>
</p></div></div></div><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div></div></div></div><div class="img_plato_pollo"></div></section><?php }?><section class="sect_recetas"><div class="container"><div class="row"><div class="col-lg-12"><div class="box_recetas_title"><div class="sect_title_general"><h6>El mejor pollo</h6><h2>Preparaciones</h2><p>Prepara comidas nutritivas, sabrosas e innovadoras, para ti y tu familia</p></div></div></div><?php if ((isset($_smarty_tpl->tpl_vars['listaClasificacion']->value))) {?><div class="col-lg-12"><div class="box_recetas"><div class="box_head"><ul class="nav nav-tabs" id="myTab" role="tablist"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listaClasificacion']->value, 'items');
$_smarty_tpl->tpl_vars['items']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['items']->value) {
$_smarty_tpl->tpl_vars['items']->do_else = false;
if (!empty($_smarty_tpl->tpl_vars['items']->value['recetas'])) {?><li class="nav-item"><a class="nav-link <?php echo $_smarty_tpl->tpl_vars['items']->value['active'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['items']->value['slug'];?>
-tab" data-toggle="tab" href="#<?php echo $_smarty_tpl->tpl_vars['items']->value['slug'];?>
" role="tab" aria-controls="<?php echo $_smarty_tpl->tpl_vars['items']->value['slug'];?>
" aria-selected="<?php echo $_smarty_tpl->tpl_vars['items']->value['status'];?>
"><?php echo $_smarty_tpl->tpl_vars['items']->value['titulo'];?>
</a></li><?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ul></div><div class="box_body"><div class="tab-content" id="myTabContent"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listaClasificacion']->value, 'items');
$_smarty_tpl->tpl_vars['items']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['items']->value) {
$_smarty_tpl->tpl_vars['items']->do_else = false;
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['items']->value['recetas'], 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?><div class="tab-pane fade <?php echo $_smarty_tpl->tpl_vars['item']->value['active'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['items']->value['slug'];?>
" role="tabpanel" aria-labelledby="<?php echo $_smarty_tpl->tpl_vars['items']->value['slug'];?>
"><div class="box_content_receta"><div class="box_left"><a href="javascript:void(0);"><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['imagen'];?>
" width="100%"></a></div><div class="box_right"><div class="content"><h4><?php echo $_smarty_tpl->tpl_vars['item']->value['titulo'];?>
</h4><h6><?php echo $_smarty_tpl->tpl_vars['item']->value['subtitulo'];?>
</h6><p><?php echo $_smarty_tpl->tpl_vars['item']->value['descripcion'];?>
</p><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['slug'];?>
">Ver más</a></div></div></div></div><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div></div></div></div><?php }?></div></div></section><section class="sect_title_general"><div class="container"><div class="row"><div class="col-lg-12"><h6>El mejor pollo</h6><h2>Nuestros locales</h2><p>Tenemos establecimientos en varios puntos del país. Llegamos a más familias en todo el país</p></div></div></div></section><section class="sect_puntos_venta"><div class="container"><div class="row"><div class="col-lg-12"><ul class="list_direcciones"><?php if (!empty($_smarty_tpl->tpl_vars['latitud_1']->value)) {?><li class="activo"><?php echo $_smarty_tpl->tpl_vars['titulol_1']->value;?>
</li><?php }
if (!empty($_smarty_tpl->tpl_vars['latitud_2']->value)) {?><li><?php echo $_smarty_tpl->tpl_vars['titulol_2']->value;?>
</li><?php }
if (!empty($_smarty_tpl->tpl_vars['latitud_3']->value)) {?><li><?php echo $_smarty_tpl->tpl_vars['titulol_3']->value;?>
</li><?php }
if (!empty($_smarty_tpl->tpl_vars['latitud_4']->value)) {?><li><?php echo $_smarty_tpl->tpl_vars['titulol_4']->value;?>
</li><?php }
if (!empty($_smarty_tpl->tpl_vars['latitud_5']->value)) {?><li><?php echo $_smarty_tpl->tpl_vars['titulol_5']->value;?>
</li><?php }
if (!empty($_smarty_tpl->tpl_vars['latitud_6']->value)) {?><li><?php echo $_smarty_tpl->tpl_vars['titulol_6']->value;?>
</li><?php }?></ul></div></div></div><div id="map" style="width: 100%;height: 600px;" data-value1="1" data-latid1="<?php echo $_smarty_tpl->tpl_vars['latitud_1']->value;?>
" data-long1="<?php echo $_smarty_tpl->tpl_vars['longitud_1']->value;?>
"data-value2="2" data-latid2="<?php echo $_smarty_tpl->tpl_vars['latitud_2']->value;?>
" data-long2="<?php echo $_smarty_tpl->tpl_vars['longitud_2']->value;?>
"data-value3="3" data-latid3="<?php echo $_smarty_tpl->tpl_vars['latitud_3']->value;?>
" data-long3="<?php echo $_smarty_tpl->tpl_vars['longitud_3']->value;?>
"data-value4="4" data-latid4="<?php echo $_smarty_tpl->tpl_vars['latitud_4']->value;?>
" data-long4="<?php echo $_smarty_tpl->tpl_vars['longitud_4']->value;?>
"data-value5="5" data-latid5="<?php echo $_smarty_tpl->tpl_vars['latitud_5']->value;?>
" data-long5="<?php echo $_smarty_tpl->tpl_vars['longitud_5']->value;?>
"data-value6="6" data-latid6="<?php echo $_smarty_tpl->tpl_vars['latitud_6']->value;?>
" data-long6="<?php echo $_smarty_tpl->tpl_vars['longitud_6']->value;?>
"></div></section>
<?php }
}
