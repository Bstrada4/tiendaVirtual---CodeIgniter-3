{strip}
{*FOOTER*}
<footer class="sect_foot">
	
	<section class="sect_main">
		<div class="container">
			<div class="row">
	
				<div class="col-lg-3">
					<div class="box_footer">
						<div class="box_head">
							<a href="#"><img src="{$base_url}public/img/logo/logo-bl.png" width="100%"></a>
						</div>

						<div class="box_body">
							<p>Venimos trabajando en conjunto con nuestros clientes, consumidores mayoristas y minoristas, es por ustedes que hoy en día seguimos trabajando, para brindarles la mejor calidad en todos nuestros productos</p>
						</div>

						<div class="box_foot">
							<ul>
								{if !empty($facebook)}<li><a href="{$facebook}" target="_blank"><span class="fa fa-facebook"></span></a></li>{/if}
								{if !empty($twitter)}<li><a href="{$twitter}" target="_blank"><span class="fa fa-twitter"></span></a></li>{/if}
								{if !empty($instagram)}<li><a href="{$instagram}" target="_blank"><span class="fa fa-instagram"></span></a></li>{/if}
								{if !empty($youtube)}<li><a href="{$youtube}" target="_blank"><span class="fa fa-youtube"></span></a></li>{/if}
							</ul>
						</div>
					</div>
				</div>

				<div class="col-lg-3">
					<div class="box_footer marg_top">
						<div class="box_head">
							<h5>Enlaces</h5>
						</div>

						<div class="box_body">
							<ul class="list_enlaces">
								<li><a href="#"><span class="fa fa-chevron-right"></span> Libro de reclamaciones</a></li>
								<li><a href="#"><span class="fa fa-chevron-right"></span> Términos y condiciones</a></li>
								<li><a href="{$base_url}nosotros"><span class="fa fa-chevron-right"></span> Nosotros</a></li>
								<li><a href="#"><span class="fa fa-chevron-right"></span> Contacto</a></li>
								<li><a href="{$base_url}pedidos"><span class="fa fa-chevron-right"></span> Pedidos</a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-lg-3">
					<div class="box_footer marg_top">
						<div class="box_head">
							<h5>Mapa de sitio</h5>
						</div>

						<div class="box_body">
							<ul class="list_enlaces">
								<li><a href="{$base_url}productos"><span class="fa fa-chevron-right"></span> Productos</a></li>
								<li><a href="{$base_url}nutricion"><span class="fa fa-chevron-right"></span> Valores Nutricionales</a></li>
								<li><a href="{$base_url}preparaciones"><span class="fa fa-chevron-right"></span> Preparaciones</a></li>
								<li><a href="{$base_url}creencias"><span class="fa fa-chevron-right"></span> Creencias</a></li>
								<li><a href="{$base_url}tiendas"><span class="fa fa-chevron-right"></span> Puntos de venta</a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-lg-3">
					<div class="box_footer marg_top">
						<div class="box_head">
							<h5>Contacto</h5>
						</div>

						<div class="box_body">
							<ul class="owl-carousel list_contacto owl-theme">
								{if $contacto_1_direccion != '' or $contacto_1_telefono_i1_name != '' or $contacto_1_telefono_i2_name}
								<li>
									{if !empty($contacto_1_direccion)}
									<div class="item_location">
										<i class="fad fa-map-marker-alt"></i>
										<a href="#">
											<h6>Dirección:</h6>
											<p>{$contacto_1_direccion}</p>
										</a>
									</div>
									{/if}
									<div class="item_phone">
										{if $contacto_1_telefono_i1_name != '' and $contacto_1_telefono_i2_name != ''}
										<i class="fad fa-mobile-android-alt"></i>
										{/if}
										{if !empty($contacto_1_telefono_i1_name)}
										<a href="tel:{$contacto_1_telefono_i1_value}">
											<h6>Teléfonos:</h6>
											<p>{$contacto_1_telefono_i1_name}</p>
										</a>
										{/if}
										{if !empty($contacto_1_telefono_i2_name)}
										<a href="tel:{$contacto_1_telefono_i2_value}">
											<p>{$contacto_1_telefono_i2_name}</p>
										</a>
										{/if}
									</div>
								</li>
								{/if}
								{if $contacto_2_direccion != '' or $contacto_2_telefono_i1_name != '' or $contacto_2_telefono_i2_name}
								<li>
									{if !empty($contacto_2_direccion)}
									<div class="item_location">
										<i class="fad fa-map-marker-alt"></i>
										<a href="#">
											<h6>Dirección:</h6>
											<p>{$contacto_2_direccion}</p>
										</a>
									</div>
									{/if}
									<div class="item_phone">
										{if $contacto_2_telefono_i1_name != '' and $contacto_2_telefono_i2_name != ''}
										<i class="fad fa-mobile-android-alt"></i>
										{/if}
										{if !empty($contacto_2_telefono_i1_name)}
										<a href="tel:{$contacto_2_telefono_i1_value}">
											<h6>Teléfonos:</h6>
											<p>{$contacto_2_telefono_i1_name}</p>
										</a>
										{/if}
										{if !empty($contacto_2_telefono_i2_name)}
										<a href="tel:{$contacto_2_telefono_i2_value}">
											<p>{$contacto_2_telefono_i2_name}</p>
										</a>
										{/if}
									</div>
								</li>
								{/if}

								{if $contacto_3_direccion != '' or $contacto_3_telefono_i1_name != '' or $contacto_3_telefono_i2_name}
								<li>
									{if !empty($contacto_3_direccion)}
									<div class="item_location">
										<i class="fad fa-map-marker-alt"></i>
										<a href="#">
											<h6>Dirección:</h6>
											<p>{$contacto_3_direccion}</p>
										</a>
									</div>
									{/if}
									<div class="item_phone">
										{if $contacto_3_telefono_i1_name != '' and $contacto_3_telefono_i2_name != ''}
										<i class="fad fa-mobile-android-alt"></i>
										{/if}
										{if !empty($contacto_3_telefono_i1_name)}
										<a href="tel:{$contacto_3_telefono_i1_value}">
											<h6>Teléfonos:</h6>
											<p>{$contacto_3_telefono_i1_name}</p>
										</a>
										{/if}
										{if !empty($contacto_3_telefono_i2_name)}
										<a href="tel:{$contacto_3_telefono_i2_value}">
											<p>{$contacto_3_telefono_i2_name}</p>
										</a>
										{/if}
									</div>
								</li>
								{/if}
							</ul>
						</div>
					</div>
				</div>
			</div>
				
							
		</div>
	</section>

	<section class="sect_sign">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<p>Arakakys &copy 2020 - Todos los derechos reservados </p>
				</div>
			</div>
		</div>
	</section>
</footer>
{*FOOTER*}
{/strip}