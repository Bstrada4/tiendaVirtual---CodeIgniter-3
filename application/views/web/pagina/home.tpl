{strip}
{*SECTION SLIDER*}
{if isset($listadoSlider)}
<section class="section_slider">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
        	{foreach $listadoSlider as $items}
            	<div class="carousel-item {$items.active}" style="background-image: url({$items.imagen});"></div>
            {/foreach}
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>
{/if}
{*END SECTION SLIDER*}

{*SECTION TITLE GENERAL*}
<section class="sect_title_general onda_design">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h6>Calidad al mejor precio</h6>
				<h2>Nuestros Productos</h2>
			</div>
		</div>
	</div>
</section>
{*END SECTION TITLE GENERAL*}


{*SECTION CATEGORÍAS*}
{if isset($listadoCategoria)}
<section class="sect_categorias">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="owl-carousel categorias owl-theme">
					{foreach $listadoCategoria as $items}
					<div class="item">
						<div class="box_categoria">
							<a href="{$items.slug}"><img src="{$items.imagen}" width="100%"></a>
							<div class="caption_categoria">
								<h5>{$items.titulo}</h5>
								<p>{$items.subtitulo}</p>
								<a href="javascript:void(0);" onclick="filter_categoria({$items.id})" >VER MÁS</a>
							</div>
						</div>
					</div>
					{/foreach}
				</div>
			</div>
		</div>
	</div>
</section>
{/if}
{*END SECTION CATEGORÍAS*}

{if isset($listadoNutricion)}
{*SECTION TITLE GENERAL*}
<section class="sect_title_general onda_design">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h6>El mejor pollo</h6>
				<h2>Valor Nutricional</h2>
			</div>
		</div>
	</div>
</section>
{*END SECTION TITLE GENERAL*}

{*SECTION NUTRICIÓN*}
<section class="sect_nutricion"><
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="img_nutricion">
					<div class="owl-carousel nutricion owl-theme">
						{foreach $listadoNutricion as $items}
						<div class="item">
							<div class="box_nutricion">
								<div class="box_left">
									<h2>{$items.titulo} <b>ARAKAKYS</b></h2>
								</div>
								<div class="box_center">
									<img src="{$items.imagen_home}" width="100%">
								</div>
								<div class="box_right">
									<div class="box_descripcion">
										{$items.descripcion_corta}
										<a href="{$items.slug}" class="btn_ver_mas">Ver más</a>
									</div>
								</div>
							</div>
						</div>
						{/foreach}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
{*END SECTION NUTRICIÓN*}
{/if}

{if !empty($listadoMitos)}
{*SECTION TITLE GENERAL*}
<section class="sect_title_general bck_grey">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h6>El mejor pollo</h6>
				<h2>Creencias</h2>
				<p>Queremos que conozcas sobre nuestra industria, aquí te presentamos algunos mitos sobre la crianza de pollos y sobre el huevo. ¡Conócelos mejor!</p>
			</div>
		</div>
	</div>
</section>
{*END SECTION TITLE GENERAL*}

{*SECTION MITOS*}
<section class="sect_mitos">
	<div class="container pos_relative">
		<div class="row">
			<div class="col-lg-12">
				<div class="box_mito">
					{foreach $listadoMitos as $items}
					<div class="box_item">
						<div class="box_head">
							<div class="icon_mito">
								{$items.icono}
								<span class="line_separate"><i class="fad fa-arrow-right"></i></span>
							</div>
						</div>
						<div class="box_body">
							<div class="content_text">
								<h5>{$items.titulo}</h5>
								<p>{$items.subtitulo}</p>
							</div>
						</div>
					</div>
					{/foreach}

				</div>
			</div>
		</div>
	</div>
	<div class="img_plato_pollo"></div>
</section>
{/if}
{*END SECTION MITOS*}

{*SECTION RECETAS*}
<section class="sect_recetas">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="box_recetas_title">
					<div class="sect_title_general">
						<h6>El mejor pollo</h6>
						<h2>Preparaciones</h2>
						<p>Prepara comidas nutritivas, sabrosas e innovadoras, para ti y tu familia</p>
					</div>
				</div>
			</div>
			{if isset($listaClasificacion)}
			<div class="col-lg-12">
				<div class="box_recetas">
					<div class="box_head">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							{foreach $listaClasificacion as $items}
							{if !empty($items.recetas)}
								<li class="nav-item">
									<a class="nav-link {$items.active}" id="{$items.slug}-tab" data-toggle="tab" href="#{$items.slug}" role="tab" aria-controls="{$items.slug}" aria-selected="{$items.status}">{$items.titulo}</a>
								</li>
							{/if}
							{/foreach}
							
						</ul>
					</div>

					<div class="box_body">
						<div class="tab-content" id="myTabContent">
							{foreach $listaClasificacion as $items}
								{foreach $items.recetas as $item}
								<div class="tab-pane fade {$item.active}" id="{$items.slug}" role="tabpanel" aria-labelledby="{$items.slug}">
									<div class="box_content_receta">
										<div class="box_left">
											<a href="javascript:void(0);"><img src="{$item.imagen}" width="100%"></a>
										</div>
										<div class="box_right">
											<div class="content">
												<h4>{$item.titulo}</h4>
												<h6>{$item.subtitulo}</h6>
												<p>{$item.descripcion}</p>
												<a href="{$item.slug}">Ver más</a>
											</div>
										</div>
									</div>
								</div>
								{/foreach}
							{/foreach}
						</div>

					</div>
				</div>
			</div>
			{/if}
		</div>
	</div>
</section>
{*END SECTION RECETAS*}

{*SECTION TITLE GENERAL*}
<section class="sect_title_general">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h6>El mejor pollo</h6>
				<h2>Nuestros locales</h2>
				<p>Tenemos establecimientos en varios puntos del país. Llegamos a más familias en todo el país</p>
			</div>
		</div>
	</div>
</section>
{*END SECTION TITLE GENERAL*}

{*SECTION PUNTOS DE VENTA*}
<section class="sect_puntos_venta">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="list_direcciones">
					{if !empty($latitud_1)}<li class="activo">{$titulol_1}</li>{/if}
					{if !empty($latitud_2)}<li>{$titulol_2}</li>{/if}
				    {if !empty($latitud_3)}<li>{$titulol_3}</li>{/if}
					{if !empty($latitud_4)}<li>{$titulol_4}</li>{/if}
					{if !empty($latitud_5)}<li>{$titulol_5}</li>{/if}
					{if !empty($latitud_6)}<li>{$titulol_6}</li>{/if}
				</ul>
			</div>
		</div>
	</div>
	<div id="map" style="width: 100%;height: 600px;" 
	data-value1="1" data-latid1="{$latitud_1}" data-long1="{$longitud_1}" 
	data-value2="2" data-latid2="{$latitud_2}" data-long2="{$longitud_2}" 
	data-value3="3" data-latid3="{$latitud_3}" data-long3="{$longitud_3}" 
	data-value4="4" data-latid4="{$latitud_4}" data-long4="{$longitud_4}" 
	data-value5="5" data-latid5="{$latitud_5}" data-long5="{$longitud_5}"
	data-value6="6" data-latid6="{$latitud_6}" data-long6="{$longitud_6}"
	></div>
</section>
{*END SECTION PUNTOS DE VENTA*}

{/strip}
