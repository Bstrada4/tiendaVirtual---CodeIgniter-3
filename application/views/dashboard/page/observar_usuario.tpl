<div class="content">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center"> 
                <div class="col-sm-6">
                    <h4 class="page-title">Perfil usuario</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Usuario</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Observar usuario</a></li>
                    </ol>

                </div>
                <div class="col-sm-6">
                
                    <div class="float-right d-none d-md-block"> 
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-settings mr-2"></i> Acción
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{$getUrl}usuario/agregar">Agregar</a>
                                <a class="dropdown-item" href="{$getUrl}usuario/listar">Listar</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{$getUrl}usuario/editar/{if isset($observar_id)}{$observar_id}{/if}">Editar usuario</a>
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
                                    <h4 class="float-right font-16"><strong>Rol: {if isset($observar_nivel)}{$observar_nivel}{/if}</strong></h4>
                                    <h3 class="mt-0">
                                        <img src="{$observar_imagen}" alt="logo" height="100"/>
                                    </h3>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-6">
                                        <address>
                                            <h4><strong>Datos usuarios:</strong></h4><br>
                                            <strong>Usuario:</strong> {if isset($observar_usuario)}{$observar_usuario}{/if}<br>
                                            <strong>Nombre:</strong> {if isset($observar_nombre)}{$observar_nombre}{/if}<br>
                                            <strong>Apellido:</strong> {if isset($observar_apellido)}{$observar_apellido}{/if}<br>
                                            <strong>Correo:</strong> {if isset($observar_correo)}{$observar_correo}{/if}<br>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>