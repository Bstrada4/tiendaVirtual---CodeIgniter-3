{strip}
{*SECTION TITLE INTERNA*}
<section class="sect_title_interna sect_title_general">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="white">Nosotros</h2>
			</div>
		</div>
	</div>
</section>
{*END SECTION TITLE INTERNA*}

{*SECTION NOSOTROS*}
<section class="sect_nosotros onda_design">
	<div class="container">
		<div class="row">
			{if isset($observar_imagen)}
				{if !empty($observar_imagen)}
					<div class="col-lg-6 order2">
						<img src="{$observar_imagen}" width="100%">
					</div>
				{/if}
			{/if}

			<div class="col-lg-6 order1">
				<div class="box_nosotros">
					<div class="box_head">
						<h4><img src="{$base_url}public/img/logo/logo.png" width="140"> les da la bienvenida</h4>
						<h6>El mejor pollo</h6>
						<img src="{$base_url}public/img/iconos/line-nosotros.png">
					</div>
					{if isset($descripcion_1)}
						{if !empty($descripcion_1)}
							<div class="box_body">
								{$descripcion_1}
							</div>
						{/if}
					{/if}
					<div class="box_foot">
						<ul>
							{if isset($mensaje_1)}
								{if !empty($mensaje_1)}
									<li>
										<i class="fad fa-heartbeat"></i>
										<div class="content_carac">
											<h6>Saludable</h6>
											<span>{$mensaje_1}</span>
										</div>
									</li>
								{/if}
							{/if}
							{if isset($mensaje_2)}
								{if !empty($mensaje_2)}
									<li>
										<i class="fad fa-cauldron"></i> 
										<div class="content_carac">
											<h6>Fácil de cocinar</h6>
											<span>{$mensaje_2}</span>
										</div>
									</li>
								{/if}
							{/if}
							{if isset($mensaje_3)}
								{if !empty($mensaje_3)}
									<li>
										<i class="fad fa-shield-check"></i>
										<div class="content_carac">
											<h6>Excelente calidad</h6>
											<span>{$mensaje_3}</span>
										</div>
									</li>
								{/if}
							{/if}
							{if isset($mensaje_4)}
								{if !empty($mensaje_4)}
									<li>
										<i class="fad fa-turkey"></i>
										<div class="content_carac">
											<h6>Carne fresca</h6>
											<span>{$mensaje_4}</span>
										</div>
									</li>
								{/if}
							{/if}
							{if isset($mensaje_5)}
								{if !empty($mensaje_5)}
									<li>
										<i class="fad fa-piggy-bank"></i>
										<div class="content_carac">
											<h6>Precio accesible</h6>
											<span>{$mensaje_5}</span>
										</div>
									</li>
								{/if}
							{/if}
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
{*END SECTION NOSOTROS*}



{*SECTION BANNER*}
<section class="sect_banner_nosotros">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-9">
				<h2>Prueba nuestro reparto a delivery aquí <i class="fad fa-hand-point-right"></i></h2>
			</div>

			<div class="col-lg-3">
				<a href="#" class="btn_delivery">Delivery</a>
			</div>
		</div>
	</div>
</section>
{*END SECTION BANNER*}

{*SECTION MISION - VISION*}
<section class="sect_mision_vision">
	<div class="container">
		<div class="row">
			{if isset($descripcion_2)}
				{if !empty($descripcion_2)}
					<div class="col-lg-6">
						<div class="box_mision">
							<div>
								<div class="box_head">
									<h6>NUESTRA MISIÓN</h6>
								</div>
								<div class="box_body">
									{$descripcion_2}
								</div>
								<div class="box_foot">
									<img src="{$base_url}public/img/nosotros/mision.png">
								</div>
							</div>
						</div>
					</div>
				{/if}
			{/if}

			{if isset($descripcion_2)}
				{if !empty($descripcion_2)}
					<div class="col-lg-6">
						<div class="box_mision">
							<div>
								<div class="box_head">
									<h6>NUESTRA VISIÓN</h6>
								</div>
								<div class="box_body">
									{$descripcion_3}
								</div>
								<div class="box_foot">
									<img src="{$base_url}public/img/nosotros/vision.png">
								</div>
							</div>
						</div>
					</div>
				{/if}
			{/if}


		</div>
	</div>
</section>
{*END SECTION MISION - VISION*}


{/strip}