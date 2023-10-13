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
			{if isset($listadoCategoria)}
			<div class="col-lg-3">
				<div class="box_lateral_delivery stick_general">
					<ul id="accordion">
						<li>
							<a href="javascript:void();" class="link">Categorías</a>
							<ul class="submenu" style="display: block;">
								{foreach $listadoCategoria as $items}
									<li class="li-ul">
										<a href='javascript:;' onclick='filter_collection({$items.id});' class="{$items.active}" id="collection-{$items.id}">
											<i class="fad fa-check"></i>
											{$items.titulo}
										</a>
									</li>
								{/foreach}
							</ul>
						</li>
					</ul>
				</div>
			</div>
			{/if}

			<div class="col-lg-9">
				<div class="anuncia">
					<a href="#"><img src="{$base_url}public/img/servicios/publicidad.jpg" width="100%"></a>
				</div>

				<div class="catg-toolbar">
					<p class="catg-result">0 productos</p>
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
					<ul class="prodlist-grid grid product-list product-list-ajax">
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
{*END SECTION DELIVERY*}
{/strip}



