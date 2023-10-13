<div class="content">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center"> 
                <div class="col-sm-6">
                    <h4 class="page-title">Detalles nutrición</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Nutrición</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Observar nutrición</a></li>
                    </ol>

                </div>
                <div class="col-sm-6">
                
                    <div class="float-right d-none d-md-block"> 
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-settings mr-2"></i> Acción
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{$getUrl}nutricion/agregar">Agregar</a>
                                <a class="dropdown-item" href="{$getUrl}nutricion/listar">Listar</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{$getUrl}nutricion/editar/{if isset($observar_id)}{$observar_id}{/if}">Editar nutrición</a>
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
                                <div class="invoice-title">
                                    <h3 class="mt-0" style="display: inline-block;">
                                        <img src="{$observar_imagen}" title="{if isset($observar_titulo)}{$observar_titulo}{/if}" alt="{if isset($observar_titulo)}{$observar_titulo}{/if}" height="100"/>
                                    </h3>
                                    <h3 class="mt-0" style="display: inline-block;">
                                        <img src="{$observar_imagen_home}" title="{if isset($observar_titulo)}{$observar_titulo}{/if}" alt="{if isset($observar_titulo)}{$observar_titulo}{/if}" height="100"/>
                                    </h3>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-8">
                                        <address>
                                            <h4><strong>Datos nutrición:</strong></h4><br>
                                            <strong>Título:</strong> {if isset($observar_titulo)}{$observar_titulo}{/if}<br>
                                            <strong>Posición:</strong> {if isset($observar_posicion)}{$observar_posicion}{/if}<br>
                                        </address>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 m-t-30">
                                        <address>
                                            <strong>Datos registro:</strong><br>
                                            <strong>Fecha registro:</strong> {if isset($fechaRegistro)}{$fechaRegistro}{/if}<br>
                                            <strong>Fecha modificación:</strong> {if isset($fechaModificacion)}{$fechaModificacion}{/if}<br>
                                        </address>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 m-t-30">
                                        <address>
                                            <strong>Descripción rapida:</strong><br>
                                            <hr>
                                            {if isset($observar_descripcion_corta)}{$observar_descripcion_corta}{/if}
                                        </address>
                                        <address>
                                            <strong>Descripción:</strong><br>
                                            <hr>
                                            {if isset($observar_descripcion)}{$observar_descripcion}{/if}
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>