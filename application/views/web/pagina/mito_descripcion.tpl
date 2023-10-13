{strip}

{*SECTION TITLE INTERNA*}

<section class="sect_title_interna sect_title_general">

	<div class="container">

		<div class="row">

			{if $observar_titulo}

			<div class="col-lg-12">

				<h2 class="white">{$observar_titulo}</h2>

			</div>

			{/if}

		</div>

	</div>

</section>

{*END SECTION TITLE INTERNA*}



{*SECTION RECETA DESCRIPCION*}

<section class="sect_mitos_descripcion onda_design">

	<div class="container">

		<div class="row">

			<div class="col-lg-8">

				<div class="box_contenido_mitos stick_general">

					<div class="box_head">

						{if $observar_imagen}<img src="{$observar_imagen}" width="100%">{/if}

						{if isset($observar_descripcion)}

						<div class="caption_mito">

						    <h3>{$observar_subtitulo}</h3>

							{$observar_descripcion}

						</div>

						{/if}

					</div>



				</div>

			</div>



			<div class="col-lg-4">

				<div class="box_lateral_mitos">

					<ul id="accordion">

						<li>

							<a href="javascript:void(0);" class="link">Más creencias... <i class="fad fa-caret-down"></i></a>

							<ul class="submenu" style="display: block;">

								{foreach $listarMitos as $items}

								<li>

									<a href="{$items.slug}"><img src="{$items.imagen}" width="100%"></a>

									<div class="content_more_mitos">

										<a href="{$items.slug}">{$items.subtitulo}</a>

									</div>

								</li>

								{/foreach}



							</ul>

						</li>

					</ul>

				</div>

			</div>







		</div>

	</div>

</section>

{*END SECTION RECETA DESCRIPCION*}



{/strip}