<div class="content">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center"> 
                <div class="col-sm-6">
                    <h4 class="page-title">Detalles clasificación</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Clasificación</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Observar clasificación</a></li>
                    </ol>

                </div>
                <div class="col-sm-6">
                
                    <div class="float-right d-none d-md-block"> 
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-settings mr-2"></i> Acción
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{$getUrl}clasificacion/agregar">Agregar</a>
                                <a class="dropdown-item" href="{$getUrl}clasificacion/listar">Listar</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{$getUrl}clasificacion/editar/{if isset($observar_id)}{$observar_id}{/if}">Editar clasificación</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <address>
                                            <h4><strong>Datos clasificación:</strong></h4><br>
                                            <strong>Título:</strong> {if isset($observar_titulo)}{$observar_titulo}{/if}<br>
                                            <strong>Posición:</strong> {if isset($observar_posicion)}{$observar_posicion}{/if}<br>
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
                                {if isset($listaRecetas)}
                                <div class="row">
                                    <span class="respuesta"></span>
                                    <div class="col-6 m-t-30">
                                        <address>
                                            <strong>Recetas:</strong>
                                        </address>
                                        <table class="table table-bordered mb-0  table-striped dt-responsive table-sm">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th style="text-align: center; vertical-align: middle;">Título</th>
                                                    <th style="text-align: center; vertical-align: middle;">Posición</th>
                                                    <th style="text-align: center; vertical-align: middle;">Estado</th>
                                                    <th style="text-align: center; vertical-align: middle;">Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {foreach $listaRecetas as $items}
                                                <tr>
                                                    <th style="text-align: center; vertical-align: middle;">{$items.titulo}</th>
                                                    <th style="text-align: center; vertical-align: middle;">{$items.posicion}</th>
                                                    <th style="text-align: center; vertical-align: middle;">{$items.estado}</th>
                                                    <th style="text-align: center; vertical-align: middle;">
                                                        {$items.accion}
                                                    </th>
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