{strip}
{*SECTION TITLE INTERNA*}
<section class="sect_title_interna sect_title_general">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="white">Nuestros productos</h2>
			</div>
		</div>
	</div>
</section>
{*END SECTION TITLE INTERNA*}

{*SECTION DELIVERY*}
<section class="section_catalogo onda_design" id="prueba">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="anuncia">
					<a href="#"><img src="{$base_url}public/img/servicios/publicidad.jpg" width="100%"></a>
				</div>

				<div class="catg-toolbar">
					<p class="catg-result">{$totalResultados}</p>
					<div class="catg-formserch">
						<div class="catg-listog">
							<button href="#" id="grid"  title="Vista en cuadrícula" class="btn active">
								<i class="fad fa-th"></i>
							</button>
							<button href="#" id="list" title="Vista en listado" class="btn ">
								<i class="fad fa-list"></i>
							</button>
						</div>

						<form class="" action="">
							<select class="selectpicker" data-size="5" name="" id="select-order">
								<option value="" selected="selected">Ordenar por:</option>
								<option value="asc">Precio más bajo</option>
								<option value="desc">Precio más alto</option>
							</select> 
						</form>
					</div>
				</div>

				<div class="wrapper list">
					<ul class="prodlist-grid grid product-list">
						{if isset($listadoBusqueda)}
						{foreach $listadoBusqueda as $items}
							<li class="pogrid">
								<div class="single-prodsta">
					                <div class="product-img-wrap"> 
					                    <a class="product-img" href="#"><img src="{$items.imagen}" width="100%" title="{$items.titulo}"></a>
					                </div>
					                <div class="prodst-info">
				                    	<h4>{$items.titulo}</h4>
				                    	<span>{$items.subtitulo}</span>
				                    	<div class="box_foot">
					                        <div class="circles">
					                        	<span></span>
					                        	<span></span>
					                        	<span></span>
					                        </div>
					                        <div class="pro-price">
						                        <span>S/ {$items.precio}</span>
						                    </div>
					                    </div>
					                    <p class="info_list">
					                    	{$items.descripcion}
					                    </p>

					                    <ul class="list_actions">
					                    	<li><a href="javascript:void(0);" onclick="add_cart({$items.id})"><i class="fad fa-cart-plus"></i></a></li>
					                    </ul>
					                </div>          
								</div>
							</li>
						{/foreach}
						{/if}
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
{*END SECTION DELIVERY*}
{/strip}



