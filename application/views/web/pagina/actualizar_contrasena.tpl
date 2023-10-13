{strip}

{*SECTION TITLE INTERNA*}

<section class="sect_title_interna sect_title_general">

	<div class="container">

		<div class="row">

			<div class="col-lg-12">

				<h2 class="white">Actualizar contraseña</h2>

			</div>

		</div>

	</div>

</section>

{*END SECTION TITLE INTERNA*}





{*SECTION RECUPERAR CONTRASEÑA*}


<section class="sect_formulario_envio">

	<div class="container">

		<div class="row">

			<div class="col-lg-12">

				<div class="form_contact">
					<form action="{$base_url}actualizar-contrasena" name="contact-form" class="bform h-contact-form formulario" id="contact-form" novalidate="novalidate" method="post">
						<span class="respuesta"></span>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group focused">
									<label>Contraseña</label>
									<input type="password" class="form-control" maxlength="30" name="clave" id="name" value="">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label>Confirmar contraseña</label>
									<input type="password" class="form-control" maxlength="30" name="reclave" id="phone" value="">
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

{*END SECTION RECUPERAR CONTRASEÑA*}



{/strip}