{strip}
<body>
	<header>
		{*MENU DE NAVEGACIÓN - ESCRITORIO*}
		<section class="navigation-allgs">
			<div class="content_menu">
				<div class="sect_top_header">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-4 col-sm-6 col-md-9 col-lg-8">
								<ul class="list_contact_top_header">
									{if !empty($contacto_1_telefono_c_name)}<li><a href="tel:{$contacto_1_telefono_c_value}"><i class="fad fa-mobile-android-alt"></i> <span>{$contacto_1_telefono_c_name}</span></a></li>{/if}
									{if isset($contacto_1_correo)}<li><a href="mailto:{$contacto_1_correo}"><i class="fad fa-envelope-square"></i> <span>{$contacto_1_correo}</span></a></li>{/if}
								</ul>
							</div>

							<div class="col-8 col-sm-6 col-md-3 col-lg-4">
								<ul class="list_icons_top_header">
									<li><a href="#" id="btn-search"><i class="fad fa-search"></i></a></li>
									{if !empty($accesoTmpEmail)}
										<li><a href="{$base_url}cliente/panel" data-toggle="tooltip" title="{$accesoTmpNombre}">
											<i class="fad fa-user"></i></a>
										</li>
										<li><a onClick="location.href='{$base_url}cliente/cerrar'" data-toggle="tooltip" title="Cerrar sesion">
											<i class="fad fa-sign-out"></i></a>
										</li>
									{else}
									 	<li><a href="#" id="clic-modal-1" data-toggle="modal" data-target="#modal-login-register" ><i class="fad fa-users"></i></a></li>
									{/if}
									<li><a href="javascript:void(0);" id="open_cart" class="class-cart"><i class="fad fa-shopping-cart"></i><span class="counter">{if isset($cart_items)}{$cart_items}{/if}</span></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div class="conten_nav">
					<nav>
					   <div class="container">
					   		<div class="flex_menu_b">
					   			<div class="flex_logo">
					   				<a href="{$base_url}inicio"><img src="{$base_url}public/img/logo/logo.png" width="100%"></a>
					   			</div>
					   			<div class="flex_menu_main">
					   				<ul>
					   					<li><a href="{$base_url}nosotros" class="{if isset($nosotros_active)}active{/if}">Nosotros</a></li>
					   					<li><a href="{$base_url}nutricion" class="{if isset($nutricion_active)}active{/if}">Valores<br>nutricionales</a></li>
					   					<li><a href="{$base_url}preparaciones" class="{if isset($recetas_active)}active{/if}">Preparaciones</a></li>
					   					<li><a href="{$base_url}creencias" class="{if isset($mitos_active)}active{/if}">Creencias</a></li>
					   					<li><a href="{$base_url}tiendas" class="{if isset($puntosventa_active)}active{/if}">Tiendas</a></li>
					   					<li><a href="{$base_url}productos" class="{if isset($productos_active)}active{/if}">Productos</a></li>
					   					<li><a href="{$base_url}pedidos" class="{if isset($pedidos_active)}active{/if}">Pedidos</a></li>
					   				</ul>
					   				<a href="javascript:void(0);" id="toggle_cel"><i class="fad fa-bars"></i></a>
					   			</div>
					   			{if !empty($contacto_1_whatshapp_name)}
					   			<div class="flex_contact">
					   				<a href="https://api.whatsapp.com/send?phone={$contacto_1_whatshapp_value}" target="_blank"><i class="fab fa-whatsapp"></i> <span>{$contacto_1_whatshapp_name}</span></a>
					   			</div>
					   			{/if}
					   			
					   		</div>
					   </div>
					</nav>
					<div class="search_top">
		   				<div class="content_search_top">
		   					<input type="text" name="" placeholder="¿Qué estás buscando?" class="buscando">
		   					<a href="javascript:void(0);" class="buscarItem">Buscar</a>
		   				</div>
		   			</div>
				</div>
			</div>
		</section>
		{*END MENU DE NAVEGACIÓN - ESCRITORIO*}

		{*CARRITO DE COMPRAS*}
		<section class="fixed_carrito" id="fixed-scritp">
			<div class="content_carrito">
				<div class="content_head">
					<h5>Carrito de compras</h5>
					<a href="javascript:void(0);" id="close_cart"><i class="fad fa-times"></i></a>
				</div>
				<div class="content_body">
					<ul class="list_productos">
						{if !empty($itemsProducto)}
                        	{foreach $itemsProducto as $i}
								<li id="{$i.rowid}">
									<a href="#"><img src="{$i.options.image}" width="100%"></a>
									<div class="content_li">
										<a href="#" class="title">{$i.name}</a>
										<a href="#" class="tags">{$i.options.collection}</a>
										<span class="price">{$i.qty} x <b>{$i.options.precio}</b></span>
									</div>
									<a href="#" class="remove_product" onclick="delete_cart('{$i.rowid}')"><i class="fad fa-trash"></i></a>
								</li>
							{/foreach}
						{/if}
					</ul>
				</div>

				<div class="content_foot">
					<div class="totales">
						<span>SUBTOTAL:</span>
						<span class="qty-total">S/ {if isset($cart_price)}{$cart_price}{/if}</span>
					</div>
					<div class="btns_cart">
						{if !empty($itemsProducto) and !empty($accesoTmpEmail)}
							<a href="{$base_url}formulario-envio" class="pay">ENVIAR COTIZACIÓN</a>
						{elseif !empty($itemsProducto) }
							<a href="#" class="pay clic" id="id-iniciar">INICIAR SESION</a>
						{/if}
						<a href="{$base_url}carrito" class="view">VER CARRITO</a>
					</div>
				</div>


			</div>
		</section>
		{*END CARRITO DE COMPRAS*}

		{*SECTION MENU CELULAR*}
		<section class="menu_celular">
			<div class="menu_celular_head">
				<img src="{$base_url}public/img/logo/logo.png" width="100%">
				<a href="javascript:void();" id="close_menu_cel"><i class="fad fa-times-hexagon"></i></a>
			</div>

			<div class="menu_celular_body">
				<h5>MENÚ DE NAVEGACIÓN</h5>
				<ul id="accordion">
					<li><a href="{$base_url}inicio">Inicio</a></li>
                    <li><a href="{$base_url}nosotros" class="{if isset($nosotros_active)}active{/if}">Nosotros</a></li>
   					<li><a href="{$base_url}nutricion" class="{if isset($nutricion_active)}active{/if}">Valores<br>nutricionales</a></li>
   					<li><a href="{$base_url}preparaciones" class="{if isset($recetas_active)}active{/if}">Preparaciones</a></li>
   					<li><a href="{$base_url}creencias" class="{if isset($mitos_active)}active{/if}">Creencias</a></li>
   					<li><a href="{$base_url}tiendas" class="{if isset($puntosventa_active)}active{/if}">Tiendas</a></li>
   					<li><a href="{$base_url}productos" class="{if isset($productos_active)}active{/if}">Productos</a></li>
   					<li><a href="{$base_url}pedidos" class="{if isset($pedidos_active)}active{/if}">Pedidos</a></li>

                </ul>

			</div>
		</section>
		{*SECTION MENU CELULAR*}


	
		{*MODAL INICIO SESION - REGISTRO*}
		<div class="modal fade" id="modal-login-register" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">

						<ul class="nav nav-tabs" id="myTablogin-register" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="login-tab" data-toggle="tab" href="#logintab" role="tab" aria-controls="login" aria-selected="true"><i class="fad fa-user"></i> Iniciar Sesión</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="signup-tab" data-toggle="tab" href="#signup" role="tab" aria-controls="signup" aria-selected="false"><i class="fad fa-user-plus"></i> Registrarse</a>
							</li>
						</ul>
					</div>
					<div class="modal-body">
						<div class="tab-content" id="myTabContent-login-signup">
							<div class="tab-pane fade show active" id="logintab" role="tabpanel" aria-labelledby="login-tab">
								<form class="form-login formulario" action="{$base_url}cliente/proceso/login" method="post">
									<span class="respuesta"></span>
									<div class="row justify-content-center">
										<div class="col-lg-12">
											<div class="input-form-login">
												<input type="text" name="usuario" maxlength="90" placeholder="E-mail">
												<i class="fad fa-envelope-square"></i>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="input-form-login">
												<input type="password" name="clave" maxlength="30" placeholder="Contraseña">
												<i class="fad fa-lock-alt"></i>
											</div>
										</div>
										<div class="col-lg-12">
											<span><a href="{$base_url}recuperar-cuenta" class="recover_password">Recuperar contraseña</a></span>
										</div>
										<div class="col-lg-12">
											<div class="input-form-login">
												<input type="submit" value="Ingresar" class="btn-login">
											</div>
										</div>
									</div>
								</form>
							</div>
							<div class="tab-pane fade" id="signup" role="tabpanel" aria-labelledby="signup-tab">
								<form class="form-signup formulario" action="{$base_url}cliente/proceso/registro" method="post">
									<span class="respuesta"></span>
									<div class="row justify-content-center">
										<div class="col-lg-6">
											<div class="input-form-login">
												<input type="text" name="nombre" placeholder="Nombre" maxlength="115">
												<i class="fad fa-envelope-square"></i>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="input-form-login">
												<input type="text" name="celular" placeholder="Celular" maxlength="15">
												<i class="fad fa-envelope-square"></i>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="input-form-login">
												<input type="text" name="email" placeholder="E-mail" maxlength="90">
												<i class="fad fa-envelope-square"></i>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="input-form-login">
												<input type="password" name="contrasena" placeholder="Contraseña" maxlength="30">
												<i class="fad fa-lock-alt"></i>
											</div>
										</div>
										<div class="col-lg-8">
											<div class="input-form-login">
												<input type="submit" value="Registrarse" name="" class="btn-login">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div>

	</header>


<div class="wrapper_content">

{/strip}