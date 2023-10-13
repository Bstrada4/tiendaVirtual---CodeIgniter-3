{strip}

{*SECTION TITLE INTERNA*}

<section class="sect_title_interna sect_title_general">

	<div class="container">

		<div class="row">

			{if isset($observar_titulo)}

			<div class="col-lg-12">

				<h2 class="white">{$observar_titulo}</h2>

			</div>

			{/if}

		</div>

	</div>

</section>

{*END SECTION TITLE INTERNA*}



{*SECTION RECETA DESCRIPCION*}

<section class="sect_receta_descripcion onda_design">

	<div class="container">

		<div class="row">

			<div class="col-lg-3 order2">

				<div class="box_lateral_receta stick_general">

					<ul id="accordion">

						<li>

							<a href="javascript:void();" class="link">Más preparaciones</a>

							<ul class="submenu" style="display: block;">

							    {foreach $listadoRec as $items}

								    <li><a href="{$items.slug}" class="{$items.active}"><i class="fad fa-check"></i> {$items.titulo}</a></li>

								{/foreach}

							</ul>

						</li>

					</ul>

				</div>

			</div>



			<div class="col-lg-9 order1">

				<div class="box_contenido_receta">

					{if isset($observar_imagen)}

					<div class="box_head">

						<img src="{$observar_imagen}" width="100%">

					</div>

					{/if}



					{if isset($observar_descripcion)}

					<div class="box_body">

						{$observar_descripcion}

					</div>

					{/if}

				</div>

			</div>







		</div>

	</div>

</section>

{*END SECTION RECETA DESCRIPCION*}



{/strip}