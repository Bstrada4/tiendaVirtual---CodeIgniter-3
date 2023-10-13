<div class="content">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center"> 
                <div class="col-sm-6">
                    <h4 class="page-title">Detalles recetas</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Recetas</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Observar recetas</a></li>
                    </ol>

                </div>
                <div class="col-sm-6">
                
                    <div class="float-right d-none d-md-block"> 
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-settings mr-2"></i> Acción
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{$getUrl}recetas/agregar">Agregar</a>
                                <a class="dropdown-item" href="{$getUrl}recetas/listar">Listar</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{$getUrl}recetas/editar/{if isset($observar_id)}{$observar_id}{/if}">Editar recetas</a>
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
                                    <h3 class="mt-0">
                                        <img src="{$observar_imagen}" alt="logo" height="100"/>
                                    </h3>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-8">
                                        <address>
                                            <h4><strong>Datos recetas:</strong></h4><br>
                                            <strong>Título:</strong> {if isset($observar_titulo)}{$observar_titulo}{/if}<br>
                                            {if !empty($observar_subtitulo)}<strong>Subtítulo:</strong> {$observar_subtitulo}<br>{/if}
                                            <strong>Categoría:</strong> {if isset($observar_clasificacion)}{$observar_clasificacion}{/if}<br>
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