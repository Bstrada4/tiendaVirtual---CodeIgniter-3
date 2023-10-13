<?php
/* Smarty version 3.1.36, created on 2020-08-25 23:34:39
  from '/home/s99ts68oq3kj/public_html/application/views/dashboard/page/panel_maps.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f45a00feb37b5_24395652',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5a439cc2eece98df3dd7630a189bddf3204b4deb' => 
    array (
      0 => '/home/s99ts68oq3kj/public_html/application/views/dashboard/page/panel_maps.tpl',
      1 => 1598398478,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f45a00feb37b5_24395652 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="content"><div class="container-fluid"><div class="page-title-box"><div class="row align-items-center"><div class="col-sm-6"><h4 class="page-title">Panel google maps</h4><ol class="breadcrumb"><li class="breadcrumb-item"><a href="javascript:void(0);">Configuración</a></li><li class="breadcrumb-item"><a href="javascript:void(0);">Google maps</a></li></ol></div></div></div><form action="<?php echo $_smarty_tpl->tpl_vars['getUrl']->value;?>
maps/proceso/panel" method="post" class="formulario" accept-charset="utf-8" enctype="multipart/form-data"><span class="respuesta"></span><div class="row"><div class="col-lg-6"><div class="card"><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">BUSCAR LA POSICION DE MI TIENDA</button><div class="card-body"><label>Dirección 1:</label><input type="text" class="form-control" maxlength="50" name="titulo_1" value="<?php if ((isset($_smarty_tpl->tpl_vars['titulo_1']->value))) {
echo $_smarty_tpl->tpl_vars['titulo_1']->value;
}?>" autocomplete="off" placeholder="Titulo" /><input type="text" class="form-control" maxlength="25" name="latitud_1" value="<?php if ((isset($_smarty_tpl->tpl_vars['latitud_1']->value))) {
echo $_smarty_tpl->tpl_vars['latitud_1']->value;
}?>" autocomplete="off" placeholder="Latitud" /><div class="m-t-10"><input type="text" maxlength="25" name="longitud_1" class="form-control" value="<?php if ((isset($_smarty_tpl->tpl_vars['longitud_1']->value))) {
echo $_smarty_tpl->tpl_vars['longitud_1']->value;
}?>" autocomplete="off" placeholder="Longitud"/></div></div><div class="card-body"><label>Dirección 2:</label><input type="text" class="form-control" maxlength="50" name="titulo_2" value="<?php if ((isset($_smarty_tpl->tpl_vars['titulo_2']->value))) {
echo $_smarty_tpl->tpl_vars['titulo_2']->value;
}?>" autocomplete="off" placeholder="Titulo" /><input type="text" class="form-control" maxlength="25" name="latitud_2" value="<?php if ((isset($_smarty_tpl->tpl_vars['latitud_2']->value))) {
echo $_smarty_tpl->tpl_vars['latitud_2']->value;
}?>" autocomplete="off" placeholder="Latitud" /><div class="m-t-10"><input type="text" maxlength="25" name="longitud_2" class="form-control" value="<?php if ((isset($_smarty_tpl->tpl_vars['longitud_2']->value))) {
echo $_smarty_tpl->tpl_vars['longitud_2']->value;
}?>" autocomplete="off" placeholder="Longitud"/></div></div><div class="card-body"><label>Dirección 3:</label><input type="text" class="form-control" maxlength="50" name="titulo_3" value="<?php if ((isset($_smarty_tpl->tpl_vars['titulo_3']->value))) {
echo $_smarty_tpl->tpl_vars['titulo_3']->value;
}?>" autocomplete="off" placeholder="Titulo" /><input type="text" class="form-control" maxlength="25" name="latitud_3" value="<?php if ((isset($_smarty_tpl->tpl_vars['latitud_3']->value))) {
echo $_smarty_tpl->tpl_vars['latitud_3']->value;
}?>" autocomplete="off" placeholder="Latitud" /><div class="m-t-10"><input type="text" maxlength="25" name="longitud_3" class="form-control" value="<?php if ((isset($_smarty_tpl->tpl_vars['longitud_3']->value))) {
echo $_smarty_tpl->tpl_vars['longitud_3']->value;
}?>" autocomplete="off" placeholder="Longitud"/></div></div><div class="card-body"><label>Dirección 4:</label><input type="text" class="form-control" maxlength="50" name="titulo_4" value="<?php if ((isset($_smarty_tpl->tpl_vars['titulo_4']->value))) {
echo $_smarty_tpl->tpl_vars['titulo_4']->value;
}?>" autocomplete="off" placeholder="Titulo" /><input type="text" class="form-control" maxlength="25" name="latitud_4" value="<?php if ((isset($_smarty_tpl->tpl_vars['latitud_4']->value))) {
echo $_smarty_tpl->tpl_vars['latitud_4']->value;
}?>" autocomplete="off" placeholder="Latitud" /><div class="m-t-10"><input type="text" maxlength="25" name="longitud_4" class="form-control" value="<?php if ((isset($_smarty_tpl->tpl_vars['longitud_4']->value))) {
echo $_smarty_tpl->tpl_vars['longitud_4']->value;
}?>" autocomplete="off" placeholder="Longitud"/></div></div><div class="card-body"><label>Dirección 5:</label><input type="text" class="form-control" maxlength="50" name="titulo_5" value="<?php if ((isset($_smarty_tpl->tpl_vars['titulo_5']->value))) {
echo $_smarty_tpl->tpl_vars['titulo_5']->value;
}?>" autocomplete="off" placeholder="Titulo" /><input type="text" class="form-control" maxlength="25" name="latitud_5" value="<?php if ((isset($_smarty_tpl->tpl_vars['latitud_5']->value))) {
echo $_smarty_tpl->tpl_vars['latitud_5']->value;
}?>" autocomplete="off" placeholder="Latitud" /><div class="m-t-10"><input type="text" maxlength="25" name="longitud_5" class="form-control" value="<?php if ((isset($_smarty_tpl->tpl_vars['longitud_5']->value))) {
echo $_smarty_tpl->tpl_vars['longitud_5']->value;
}?>" autocomplete="off" placeholder="Longitud"/></div></div><div class="card-body"><label>Dirección 6:</label><input type="text" class="form-control" maxlength="50" name="titulo_6" value="<?php if ((isset($_smarty_tpl->tpl_vars['titulo_6']->value))) {
echo $_smarty_tpl->tpl_vars['titulo_6']->value;
}?>" autocomplete="off" placeholder="Titulo" /><input type="text" class="form-control" maxlength="25" name="latitud_6" value="<?php if ((isset($_smarty_tpl->tpl_vars['latitud_6']->value))) {
echo $_smarty_tpl->tpl_vars['latitud_6']->value;
}?>" autocomplete="off" placeholder="Latitud" /><div class="m-t-10"><input type="text" maxlength="25" name="longitud_6" class="form-control" value="<?php if ((isset($_smarty_tpl->tpl_vars['longitud_6']->value))) {
echo $_smarty_tpl->tpl_vars['longitud_6']->value;
}?>" autocomplete="off" placeholder="Longitud"/></div></div></div><div class="form-group mb-0"><div><button type="submit" class="btn btn-primary waves-effect waves-light mr-1">GUARDAR</button></div></div></div></div></form></div></div><style>#map {height: 100%;}</style><?php echo '<script'; ?>
>

    function initMap() {

        var myLatlng = {lat: -12.060637333742575, lng: -77.02898915883299};



        var map = new google.maps.Map(

            document.getElementById('map'), {zoom: 13, center: myLatlng});

        var infoWindow = new google.maps.InfoWindow(

            {content: 'Obtener la <b>latitud/longitud!</b> de mi tienda,copie los datos obtenidos en su respectivos campos', position: myLatlng});

        infoWindow.open(map);



        map.addListener('click', function(mapsMouseEvent) {

          infoWindow.close();

          infoWindow = new google.maps.InfoWindow({position: mapsMouseEvent.latLng});

          infoWindow.setContent(mapsMouseEvent.latLng.toString());

          infoWindow.open(map);

        });

    }

    <?php echo '</script'; ?>
><?php echo '<script'; ?>
 async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCUruOZGZVXOsZHNwa9UckAahh_bwnOAPM&callback=initMap"><?php echo '</script'; ?>
><div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg"><div class="modal-content"><div><div id="map" style="width: 100%; height: 450px;"></div></div></div></div></div>



<?php }
}
