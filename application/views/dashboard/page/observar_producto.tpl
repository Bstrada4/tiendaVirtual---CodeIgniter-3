<div class="content">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center"> 
                <div class="col-sm-6">
                    <h4 class="page-title">Detalles mitos</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Mitos</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Observar mitos</a></li>
                    </ol>

                </div>
                <div class="col-sm-6">
                
                    <div class="float-right d-md-block"> 
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-settings mr-2"></i> Acción
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{$getUrl}mitos/agregar">Agregar</a>
                                <a class="dropdown-item" href="{$getUrl}mitos/listar">Listar</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{$getUrl}mitos/editar/{if isset($observar_id)}{$observar_id}{/if}">Editar mitos</a>
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
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-8">
                                        <address>
                                            <h4><strong>Datos producto:</strong></h4><br>
                                            <strong>Título:</strong> {if isset($observar_titulo)}{$observar_titulo}{/if}<br>
                                            <strong>Subtitulo:</strong> {if isset($observar_subtitulo)}{$observar_subtitulo}{/if}<br>
                                            <strong>Categoría:</strong> {if isset($observar_categoria)}{$observar_categoria}{/if}<br>
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
                                {if !empty($observar_descripcion)}
                                <div class="row">
                                    <div class="col-8 m-t-30">
                                        <address>
                                            <strong>Descripción:</strong><br>
                                            <hr>
                                            {if isset($observar_descripcion)}{$observar_descripcion}{/if}
                                        </address>
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