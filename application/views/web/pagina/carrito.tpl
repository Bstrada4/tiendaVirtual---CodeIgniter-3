{strip}

{*SECTION TITLE INTERNA*}

<section class="sect_title_interna sect_title_general">

	<div class="container">

		<div class="row">

			<div class="col-lg-12">

				<h2 class="white">Carrito</h2>

			</div>

		</div>

	</div>

</section>

{*END SECTION TITLE INTERNA*}



{*SECTION PASOS PROCESO COMPRA*}

<section class="sect_proceso_compra onda_design">

	<div class="container">

		<div class="row">

			<div class="col-lg-12">

				<ul class="list_pasos_carrito">

					<li class="paso1 active">

						<h5>CARRITO DE COMPRA</h5>

						<span>1</span>

					</li>



					<li class="paso2">

						<h5>FORMULARIO DE ENVÍO</h5>

						<span>2</span>

					</li>



					<li class="paso3">

						<h5>COTIZACIÓN ENVIADA</h5>

						<span>3</span>

					</li>



				</ul>

			</div>

		</div>

	</div>

</section>

{*END SECTION PASOS PROCESO COMPRA*}



{*SECTION CARRITO*}

<section class="sect_carrito">

	<div class="container">

		<div class="row justify-content-end">

			<div class="col-lg-12">

				<div class="content_table_pedidos">

					<table width="100%">

						<thead>

							<tr>

								<th>NÚMERO</th>

								<th>PRODUCTO</th>

								<th>CANTIDAD</th>

								<th>PRECIO UNITARIO</th>

								<th>PRECIO TOTAL</th>

							</tr>

						</thead>

						<tbody>

							{if !empty($itemsProducto)}

                        	{foreach $itemsProducto as $i}

							<tr>

								<td>0{counter}</td>

								<td>

									<img src="{$i.options.image}" width="100">

									<h6 class="name_product">{$i.name}</h6>

								</td>

								<td>

									<input type="number" name="" value="{$i.qty}" class="input_cant" data-id="{$i.rowid}">

								</td>

								<td>S/ {$i.price}</td>

								<td>S/ {$i.price * $i.qty}</td>

							</tr>

							{/foreach}

                            {else}

                            <tr>

                                <td colspan="5">

                                    <h4>No hay productos</h4>

                                </td>

                            </tr>

                            {/if}

						</tbody>

					</table>

				</div>



			</div>



			<div class="col-lg-4">

				<div class="box_subtotales">

					<div class="info">



						<!-- span class="title">SUBTOTAL</span>

						<span class="monto">S/ 25.00</span>

						 

						<span class="title">IGV(18%)</span>

						<span class="monto">S/ 4.50</span -->



						<span class="title">TOTAL</span>

						<span class="monto">S/.{if isset($cart_price)}{$cart_price}{/if}</span>

					</div>

					{if !empty($itemsProducto) and !empty($accesoTmpEmail)}

						<div class="btn_carrito">

							<a href="{$base_url}formulario-envio" class="btn_pagar">PAGAR</a>

						</div>

					{elseif !empty($itemsProducto) }

	                    <div class="btn_carrito">

							<a href="#" class="btn_pagar" data-toggle="modal" data-target="#modal-login-register" id="id-iniciar">INICIAR SESION</a>

						</div>   

					{/if}

				</div>

			</div>





		</div>

	</div>

</section>

{*END SECTION CARRITO*}





{/strip}