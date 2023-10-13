{strip}

{*SECTION TITLE INTERNA*}

<section class="sect_title_interna sect_title_general">

	<div class="container">

		<div class="row">

			<div class="col-lg-12">

				<h2 class="white">Preparaciones</h2>

			</div>

		</div>

	</div>

</section>

{*END SECTION TITLE INTERNA*}



{*SECTION RECETAS*}

{if isset($listaClasificacion)}

<section class="sect_recetas onda_design" data-ref="mixitup-container">

	<div class="container">

		<div class="row">

			<div class="col-lg-12">

				<div class="box_portafolio">

					<div class="head_navigation">

						<ul class="controls">

							<li class="d-none"><a class="control" data-filter="all"></a></li>

							{foreach $listaClasificacion as $items}

							{if !empty($items.recetas)}

								<li><a class="control {$items.active}" data-filter=".{$items.slug}-{$items.id}">{$items.titulo}</a></li>

								{if $items.numero == 1}

									<input type="hidden" value="{$items.slug}-{$items.id}" class="mixitup-recetas-gal">

								{/if}

						    {/if}

							{/foreach}

						</ul>

					</div>

				</div>

			</div>



			<div class="col-lg-12">

				<div class="content_mixitup">

					<ul class="list_mixitup" id="gallery-multimedia">

						{foreach $listaClasificacion as $items}

							{foreach $items.recetas as $item}

							<li class="item {$items.slug}-{$items.id} lg-share" data-ref="mixitup-target">

								<div class="box_item_receta">

									<a href="{$item.slug}" data-facebook-share-url="{$item.imagen}" data-twitter-share-url="twitter-share.html">

										<img src="{$item.imagen}" width="100%">

									</a>

									<div class="caption_item_receta">

										<h5>{$item.titulo}</h5>

										<p>{$item.subtitulo}</p>

										<a href="{$item.slug}">VER MÁS</a>

									</div>

								</div>

							</li>

							{/foreach}

						{/foreach}

						

					</ul>

				</div>

			</div>



		</div>

	</div>

</section>

{/if}

{*END SECTION RECETAS*}



{/strip}