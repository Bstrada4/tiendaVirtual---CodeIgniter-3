<div class="content">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center"> 
                <div class="col-sm-6">
                    <h4 class="page-title">Detalles cotización</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Cotización</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Observar cotización</a></li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-body">
                        <div class="row">
                            {if isset($estadoId)}
                            <form action="{$getUrl}cotizacion/proceso/editar" method="post" class="formulario" accept-charset="utf-8" enctype="multipart/form-data">
                                <span class="respuesta"></span>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="m-t-20">
                                            <div class="form-group">
                                                <label class="control-label">Estado Cotización</label>
                                                {$estadoId}
                                            </div>
                                        </div>
                                        <input type="hidden" name="id_cotizacion" value="{$observar_id}">
                                        <div class="form-group mb-0">
                                            <div>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                    GUARDAR ESTADO
                                                </button>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </form>
                             {/if}

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <address>
                                            <h4><strong>Datos cotización:</strong></h4><br>
                                            <strong>Nombre:</strong> {if isset($observar_nombre)}{$observar_nombre}{/if}<br>
                                            <strong>Email:</strong> {if isset($observar_email)}{$observar_email}{/if}<br>
                                            <strong>Teléfono:</strong> {if isset($observar_telefono)}{$observar_telefono}{/if}<br>
                                            <strong>Dirección:</strong> {if isset($observar_direccion)}{$observar_direccion}{/if}<br>   
                                        </address>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6 m-t-30">
                                        <address>
                                            <strong>Datos registro:</strong><br>
                                            <strong>Fecha registro:</strong> {if isset($fechaRegistro)}{$fechaRegistro}{/if}<br>
                                            <strong>Fecha modificación:</strong> {if isset($fechaModificacion)}{$fechaModificacion}{/if}<br>
                                        </address>
                                    </div>
                                </div>

                                {if isset($listadoItem)}
                                <div class="row">
                                    <span class="respuesta"></span>
                                    <div class="col-6 m-t-30">
                                        <address>
                                            <strong>Productos:</strong>
                                        </address>
                                        <table class="table table-bordered mb-0  table-striped dt-responsive table-sm">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th style="text-align: center; vertical-align: middle;">Título</th>
                                                    <th style="text-align: center; vertical-align: middle;">Precio</th>
                                                    <th style="text-align: center; vertical-align: middle;">Cantidad</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                {foreach $listadoItem as $items}
                                                <tr>
                                                    <th style="text-align: center; vertical-align: middle;">{$items.titulo}</th>
                                                    <th style="text-align: center; vertical-align: middle;">S/{$items.precio}</th>
                                                    <th style="text-align: center; vertical-align: middle;">{$items.cantidad}</th>
                                                </tr>
                                                {/foreach}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                {/if}
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>