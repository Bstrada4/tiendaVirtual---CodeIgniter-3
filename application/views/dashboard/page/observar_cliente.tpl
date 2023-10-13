<div class="content">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center"> 
                <div class="col-sm-6">
                    <h4 class="page-title">Detalles clientes</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Clientes</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Observar cliente</a></li>
                    </ol>

                </div>
                <div class="col-sm-6">
                
                    <div class="float-right d-md-block"> 
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-settings mr-2"></i> Acción
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{$getUrl}clientes/listar">Listar</a>
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
                                        <img src="{$observar_imagen}" title="{if isset($observar_nombre)}{$observar_nombre}{/if}" alt="{if isset($observar_nombre)}{$observar_nombre}{/if}" height="100"/>
                                    </h3>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-8">
                                        <address>
                                            <h4><strong>Datos mitos:</strong></h4><br>
                                            <strong>Nombre:</strong> {if isset($observar_nombre)}{$observar_nombre}{/if}<br>
                                            <strong>Email:</strong> {if isset($observar_email)}{$observar_email}{/if}<br>
                                            <strong>Celular/Teléfono:</strong> {if isset($observar_celular)}{$observar_celular}{/if}<br>
                                            <strong>Dirección:</strong> {if isset($observar_direccion)}{$observar_direccion}{/if}<br>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>