{strip}

{*SECTION TITLE INTERNA*}

<section class="sect_title_interna sect_title_general">

	<div class="container">

		<div class="row">

			<div class="col-lg-12">

				<h2 class="white">PERFIL</h2>

			</div>

		</div>

	</div>

</section>

{*END SECTION TITLE INTERNA*}



{*SECTION DASHBOARD*}

<section class="sect_perfil_user">

	<div class="container">

		<div class="row">

			<div class="col-sm-3 col-md-3">

				<div class="box_photo_perfil">

					{if isset($observar_imagen)}

					<div class="head">

						<img src="{$observar_imagen}" width="100%">

					</div>

					{/if}

					<div class="body">
						{if isset($observar_nombre)}<h4>{$observar_nombre}</h4>{/if}
						<hr class="hr_line_body">
						<ul class="notifications">
							<li>
								<strong>Pedidos</strong>
								<span class="totalCorreosHtml">({if isset($totalPedidos)}{$totalPedidos}){/if}</span>
							</li>
						</ul>
					</div>
				</div>
			</div>

			<div class="col-sm-9 col-md-9">

				<ul class="nav nav-tabs flex_tabs">
					<li class="nav-item">
						<a href="#misdatos" class="info-box hover-effect active" data-toggle="tab">
	                        <div class="icon">
	                            <i class="fad fa-user"></i>
	                        </div>

	                        <div class="content">
	                            <div class="text">Mis Datos</div>
	                        </div>
	                    </a>
					</li>

					<li class="nav-item">
						<a data-toggle="tab" href="#pedidos" class="info-box hover-effect">
	                        <div class="icon">
	                            <i class="fad fa-cart-plus"></i>
	                        </div>

	                        <div class="content">
	                            <div class="text">Mis Pedidos</div>
	                        </div>
	                    </a>
					</li>
				</ul>

				<div class="tab-content dashboard_content">
					<div id="misdatos" class="tab-pane active">
						<h2 class="h2_title">DATOS DE CONTACTO</h2>
						<form action="{$base_url}cliente/editar" method="post" class="form_general bform formulario">
							<span class="respuesta"></span>
							<div class="row">
								<div class="col-md-12 center">
									<div class="titulo_ofertas">
										<h3>Foto de perfil</h3>
									</div>

									<div class="btn-container">
										<!--the three icons: default, ok file (img), error file (not an img)-->
										<h1 class="imgupload2"><i class="fa fa-file-image-o"></i></h1>
										<h1 class="imgupload2 ok"><i class="fa fa-check"></i></h1>
										<h1 class="imgupload2 stop"><i class="fa fa-times"></i></h1>
										<!--this field changes dinamically displaying the filename we are trying to upload-->
										<p id="namefile2">Solo está permitido seleccionar (jpg,jpeg o png)</p>
										<!--our custom btn which which stays under the actual one-->
										<button type="button" id="btnup" class="btn-oferta">Selecciona tu imagen</button>
										<input type="file" value="Guardar" name="fileup2" id="fileup2">
									</div>
								</div>
							</div>

		                    <div class="row">

		                        <div class="col-sm-6 col-md-6">
		                            <input type="text" name="nombre" maxlength="115" value="{if isset($observar_nombre)}{$observar_nombre}{/if}" class="input_form_general" placeholder="Nombre o Razón Social">
		                        </div>

		                        <div class="col-sm-6 col-md-6">
		                            <input type="text" name="celular" maxlength="25" value="{if isset($observar_celular)}{$observar_celular}{/if}" class="input_form_general" placeholder="Celular/Teléfono">
		                        </div>

		                        <div class="col-sm-12 col-md-12">
		                            <input type="text" name="direccion" maxlength="210" value="{if isset($observar_direccion)}{$observar_direccion}{/if}" class="input_form_general" placeholder="Dirección">
		                        </div>

		                        <div class="col-sm-6 col-md-6">
		                            <input type="text" name="clave" value="" class="input_form_general" placeholder="Nueva Contraseña">
		                        </div>

		                        <div class="col-sm-6 col-md-6">
		                            <input type="text" name="reclave" value="" class="input_form_general" placeholder="Confirmar Contraseña">
		                        </div>

		                        <div class="col-sm-12 col-md-12">
		                            <input type="submit" name="" class="input_frm_enviar" value="Guardar">
		                        </div>
		                   </div>
		               </form>
					</div>



					
					{if isset($listadoPedidos)}
					<div id="pedidos" class="tab-pane fade">
						<h2 class="h2_title">TODOS MIS PEDIDOS</h2>
						<div class="content_table_pedidos">
							<table width="100%">
								<thead>
									<tr>
										<th>#</th>
										<th>CODIGO PEDIDO</th>
										<th>EMAIL</th>
										<th>N° PRODUCTOS</th>
										<th>FECHA COTIZACION</th>
										<th>PRECIO TOTAL</th>
										<th>ESTADO</th>
									</tr>
								</thead>
								<tbody>
									{foreach  $listadoPedidos as $items}
									<tr>
										<td>{$items.numero}</td>
										<td>{$items.pedido}</td>
										<td>{$items.email}</td>
										<td>{$items.cantidad}</td>
										<td>{$items.fecha}</td>
										<td>S/{$items.total}</td>
										<td>{$items.estado}</td>
										<!--td><a href="#"><i class="fad fa-search"></i></a></td-->
									</tr>
									{/foreach}
								</tbody>
							</table>
						</div>
					</div>
					{/if}
					

				</div>



			</div>

		</div>

	</div>

</section>

{*SECTION PERFIL CLIENTE*}



{/strip}