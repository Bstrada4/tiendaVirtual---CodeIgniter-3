{strip}
{*SECTION TITLE INTERNA*}
<section class="sect_title_interna sect_title_general">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="white">Pedidos</h2>
			</div>
		</div>
	</div>
</section>
{*END SECTION TITLE INTERNA*}


{*SECTION PEDIDOS*}
<section class="sect_pedidos onda_design">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="aviso_pedido">
					<h2>¡HAZ SEGUIMIENTO A TU PEDIDO!</h2>
					<p class="p_pedidos_message">Porque estamos comprometidos en entregarte el mejor servicio, Arakakys presenta la forma más rápida y moderna de conocer dónde se encuentra tu pedido en tiempo real.</p>
				</div>
			</div>

			<div class="col-lg-6">
				<div class="box_pedidos">
					<div class="box_head">

					</div>

					<div class="box_body">
						<h4>SEGUIMIENTO DE PEDIDO</h4>
						<form action="{$base_url}pedidos/buscar" method="POST" class="formulario">
							<span class="respuesta"></span>
							<input type="text" name="codigo" placeholder="Ingresa tu número de pedido" class="input_ingresa" maxlength="24">
							<input type="submit" name="" value="ENVIAR"class="input_buscar">	
						</form>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
{*END SECTION PEDIDOS*}

{*SECTION CARRITO*}
{if !empty($observar_id)}
<section class="sect_carrito">
	<div class="container">
		<div class="row justify-content-end">
			<div class="col-lg-12">
				<div class="content_table_pedidos">
					<table width="100%">
						<thead>
							<tr>
								<th>NÚMERO</th>
								<th>CODIGO</th>
								<th>ESTADO</th>
								<th>FECHA MODIFICACION</th>
							</tr>
						</thead>

						<tbody>
							
                        	
							<tr>
								<td>0{counter}</td>
								<td>{$observar_codigo}</td>
								<td>{$observar_estado}</td>
								<td>{$fechaModificacion}</td>
							</tr>
                            
                            
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
{/if}
{*END SECTION CARRITO*}
{/strip}