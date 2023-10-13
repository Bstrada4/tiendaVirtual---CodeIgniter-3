{strip}

{*SECTION TITLE INTERNA*}

<section class="sect_title_interna sect_title_general">

	<div class="container">

		<div class="row">

			<div class="col-lg-12">

				<h2 class="white">Recuperar contraseña</h2>

			</div>

		</div>

	</div>

</section>

{*END SECTION TITLE INTERNA*}





{*SECTION RECUPERAR CONTRASEÑA*}

<section class="sect_recuperar onda_design">

	<div class="container">

		<div class="row justify-content-center">

			<div class="col-lg-12">



				<p class="p_info">Ingresa tu correo y en breve estaremos enviando un mail para que restaures tu contraseña.</p>

				<form action="{$base_url}recuperar/clave" class="form_recupera formulario" novalidate="novalidate" method="post">

					<span class="respuesta"></span>

					<div class="row">

						

						<div class="col-lg-12">

							<div class="flex_inputs">

								<input type="email" name="email" placeholder="E-mail" class="input_login" maxlength="90" minlength="6">

								<input type="submit" value="Enviar" class="input_recupera_submit">

							</div>

							

						</div>

					</div>

				</form>



			</div>

		</div>

	</div>

</section>

{*END SECTION RECUPERAR CONTRASEÑA*}



{/strip}