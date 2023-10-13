{strip}
{*SECTION TITLE INTERNA*}
<section class="sect_title_interna sect_title_general">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="white">Formulario de envío</h2>
			</div>
		</div>
	</div>
</section>
{*END SECTION TITLE INTERNA*}

{*SECTION PASOS PROCESO COMPRA*}
<section class="sect_proceso_compra onda_design">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="list_pasos_carrito">
					<li class="paso1">
						<h5>CARRITO DE COMPRA</h5>
						<span>1</span>
					</li>

					<li class="paso2 active">
						<h5>FORMULARIO DE ENVÍO</h5>
						<span>2</span>
					</li>

					<li class="paso3">
						<h5>COTIZACIÓN ENVIADA</h5>
						<span>3</span>
					</li>

				</ul>
			</div>
		</div>
	</div>
</section>
{*END SECTION PASOS PROCESO COMPRA*}

{*SECTION FORMULARIO DE ENVÍO*}
<section class="sect_formulario_envio">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="form_contact">
					<form action="{$base_url}formulario-envio/cotizar" name="contact-form" class="bform h-contact-form formulario" id="contact-form" novalidate="novalidate" method="post">
						<span class="respuesta"></span>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group focused">
									<label>Nombre o Empresa</label>
									<input type="text" class="form-control" maxlength="115" name="nombre" id="name" value="{if isset($accesoTmpNombre)}{$accesoTmpNombre}{/if}">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label>Teléfono</label>
									<input type="text" class="form-control" maxlength="25" name="celular" id="phone" value="{if isset($accesoTmpCelular)}{$accesoTmpCelular}{/if}">
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<label>Dirección</label>
									<input type="text" class="form-control" maxlength="155" name="direccion" id="productos" value="{if isset($accesoTmpDireccion)}{$accesoTmpDireccion}{/if}">
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<label>E-mail</label>
									<input type="email" class="form-control" name="email" id="email" value="{if isset($accesoTmpEmail)}{$accesoTmpEmail}{/if}">
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<label>Mensaje</label>
									<textarea class="form-control" rows="5" name="mensaje" id="message"></textarea>
								</div>
							</div>
							<div class="col-md-12"></div>

							<div class="col-md-12">
								<input type="submit" name="" value="Enviar" class="btn_frm_contact">
							</div>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>
</section>
{*END SECTION FORMULARIO DE ENVÍO*}
{/strip}