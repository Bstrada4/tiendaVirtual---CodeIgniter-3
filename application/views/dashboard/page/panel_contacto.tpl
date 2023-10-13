{strip}
<div class="content">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center">     
                <div class="col-sm-6">
                    <h4 class="page-title">Panel contacto 1</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Configuración</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Contacto 1</a></li>
                    </ol>

                </div>
            </div>
        </div>
    
        <form action="{$getUrl}contacto/proceso/panel" method="post" class="formulario" accept-charset="utf-8" enctype="multipart/form-data">
            <span class="respuesta"></span>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <label>Correo:</label>
                            <input type="text" class="form-control" maxlength="100" name="correo" value="{if isset($correo)}{$correo}{/if}" autocomplete="off" placeholder="Correo" />
                        </div>

                        <div class="card-body">
                            <label>Dirección:</label>
                            <input type="text" class="form-control" maxlength="100" name="direccion" value="{if isset($direccion)}{$direccion}{/if}" autocomplete="off" placeholder="Dirección" />
                        </div>

                        <div class="card-body">
                            <label>Whatshapp cabecera:</label>
                            <input type="text" class="form-control" maxlength="13" name="whatshapp_value" value="{if isset($whatshapp_value)}{$whatshapp_value}{/if}" autocomplete="off" placeholder="Enlace"/>
                            <div class="m-t-10">
                                <input type="text" maxlength="24" name="whatshapp_name" class="form-control" value="{if isset($whatshapp_name)}{$whatshapp_name}{/if}" autocomplete="off" placeholder="Nombre"/>
                            </div>  
                        </div>

                        <div class="card-body">
                            <label>Teléfono cabecera:</label>
                            <input type="text" class="form-control" maxlength="12" name="telefono_c_value" value="{if isset($telefono_c_value)}{$telefono_c_value}{/if}" autocomplete="off" placeholder="Enlace" />
                            <div class="m-t-10">
                                <input type="text" maxlength="24" name="telefono_c_name" class="form-control"  value="{if isset($telefono_c_name)}{$telefono_c_name}{/if}" autocomplete="off"  placeholder="Nombre"/>
                            </div>  
                        </div>

                        <div class="card-body">
                            <label>Teléfono inferior 1:</label>
                            <input type="text" class="form-control" maxlength="12" name="telefono_i1_value" value="{if isset($telefono_i1_value)}{$telefono_i1_value}{/if}" autocomplete="off" placeholder="Enlace" />
                            <div class="m-t-10">
                                <input type="text" maxlength="24" name="telefono_i1_name" class="form-control"  value="{if isset($telefono_i1_name)}{$telefono_i1_name}{/if}" autocomplete="off"  placeholder="Nombre"/>
                            </div>  
                        </div>

                        <div class="card-body">
                            <label>Teléfono inferior 2:</label>
                            <input type="text" class="form-control" maxlength="12" name="telefono_i2_value" value="{if isset($telefono_i2_value)}{$telefono_i2_value}{/if}" autocomplete="off" placeholder="Enlace" />
                            <div class="m-t-10">
                                <input type="text" maxlength="24" name="telefono_i2_name" class="form-control"  value="{if isset($telefono_i2_name)}{$telefono_i2_name}{/if}" autocomplete="off"  placeholder="Nombre"/>
                            </div>  
                        </div>

                    </div>
                    <div class="form-group mb-0">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                GUARDAR
                            </button>
                        </div>
                    </div>
                </div> 
            </div>
        </form>
    </div>
</div>
{/strip}