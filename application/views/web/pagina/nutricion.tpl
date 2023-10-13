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

{*SECTION NUTRICION*}
<section class="sect_nutricion onda_design">
	<div class="container">
		<div class="row">
			{if isset($listarNutricion)}
			<div class="col-lg-3 order2">
				<div class="box_lateral_nutricion stick_general">
					<ul id="accordion">
						<li>
							<a href="javascript:void();" class="link">Nutrición</a>
							<ul class="submenu" style="display: block;">
								{foreach $listarNutricion as $items}
									<li><a href="{$items.slug}" class="{$items.active}"><i class="fad fa-check"></i> {$items.titulo}</a></li>
								{/foreach}
							</ul>
						</li>
					</ul>
					<div class="content_banner">
						<a href="#"><img src="{$base_url}public/img/nutricion/banner-delivery.jpg" width="100%"></a>
					</div>
				</div>
			</div>
			{/if}

			<div class="col-lg-9 order1">
				<div class="box_contenido_nutricion">
					{if isset($observar_descripcion)}
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
{*END SECTION NUTRICION*}

{/strip}