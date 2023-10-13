{strip}

{*SECTION TITLE INTERNA*}

<section class="sect_title_interna sect_title_general">

	<div class="container">

		<div class="row">

			<div class="col-lg-12">

				<h2 class="white">Creencias</h2>

			</div>

		</div>

	</div>

</section>

{*END SECTION TITLE INTERNA*}



{*SECTION MITOS*}

{if isset($listadoMitos)}

<section class="sect_mitos onda_design">

	<div class="container">

		<div class="row">

			<div class="col-lg-12">



				<div class="box_mito">

					{foreach $listadoMitos as $items}

					<a class="box_item" href="{$items.slug}">

						<div class="box_head">

							<div class="icon_mito">

								{$items.icono}

							</div>

						</div>

						<div class="box_body">

							<div class="content_text">

								<h5>{$items.titulo}</h5>

								<p>{$items.subtitulo}</p>

							</div>

						</div>

					</a>

					{/foreach}



				</div>

			</div>

		</div>

	</div>

</section>

{/if}

{*END SECTION MITOS*}



{/strip}