{strip}

{*SECTION TITLE INTERNA*}

<section class="sect_title_interna sect_title_general">

	<div class="container">

		<div class="row">

			<div class="col-lg-12">

				<h2 class="white">Puntos de venta</h2>

			</div>

		</div>

	</div>

</section>

{*END SECTION TITLE INTERNA*}



{*SECTION PUNTOS DE VENTA*}

<section class="sect_puntos_venta onda_design">
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

	<div id="map" style="width: 100%;height: 600px;" data-value1="1" data-latid1="{$latitud_1}" data-long1="{$longitud_1}" data-value2="2" data-latid2="{$latitud_2}" data-long2="{$longitud_2}" data-value3="3" data-latid3="{$latitud_3}" data-long3="{$longitud_3}" data-value4="4" data-latid4="{$latitud_4}" data-long4="{$longitud_4}" data-value3="5" data-latid5="{$latitud_5}" data-long5="{$longitud_5}" data-value6="6" data-latid6="{$latitud_6}" data-long6="{$longitud_6}"></div>



</section>

{*END SECTION PUNTOS DE VENTA*}





{/strip}