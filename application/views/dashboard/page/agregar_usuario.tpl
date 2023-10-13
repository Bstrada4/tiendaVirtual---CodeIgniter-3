 <!-- Start content -->
<div class="content">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center">     
                <div class="col-sm-6">
                    <h4 class="page-title">Formulario usuario</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Usuario</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Agregar usuario</a></li>
                    </ol>

                </div>
            </div>
        </div>
    
        <form action="{$getUrl}usuario/proceso/agregar" method="post" class="formulario" accept-charset="utf-8" enctype="multipart/form-data">
            <span class="respuesta"></span>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">

                            <label>Usuario</label>
                            <input type="text" class="form-control" maxlength="20" name="usuario" id="defaultconfig" value="{if isset($prefil_usuario)}{$prefil_usuario}{/if}" autocomplete="off"/>

                            <div class="m-t-20">
                                <label>Nombre</label>
                                <input type="text" maxlength="50" name="nombre" class="form-control" id="defaultconfig" value="{if isset($prefil_nombre)}{$prefil_nombre}{/if}" autocomplete="off"/>
                            </div>

                            <div class="m-t-20">
                                <label>Apellido</label>
                                <input type="text" maxlength="50" name="apellido" class="form-control" id="defaultconfig" value="{if isset($prefil_apellido)}{$prefil_apellido}{/if}" autocomplete="off"/>
                            </div>

                            <div class="m-t-20">
                                <label>Correo</label>
                                <input type="text" maxlength="50" name="correo" class="form-control" id="defaultconfig" value="{if isset($prefil_correo)}{$prefil_correo}{/if}" autocomplete="off"/>
                            </div>

                            {if isset($rolId)}
                            <div class="m-t-20">
                                <div class="form-group">
                                    <label class="control-label">Roles</label>
                                    {$rolId}
                                </div>
                            </div>
                            {/if}

                            <div class="m-t-20">
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <div>
                                        <input type="password" name="clave" class="form-control"  placeholder="Contraseña" maxlength="30" minlength="5"/>
                                    </div>
                                    <div class="m-t-10">
                                        <input type="password" name="reclave" class="form-control" placeholder="Verificar contraseña" maxlength="30" minlength="5"/>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div> 

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Imagen de usuario</h4>
                            <div class="form-group">
                                <label>(*) Imágen con una dimension equivalente a 1000*900 px como máximo. Tambien tener en cuenta que tiene que tener un peso Máximo de 1 MB.</label>
                                <input type="file" class="filestyle" data-buttonname="btn-secondary" name="imagenPrincipal">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-0">
                        <div class="form-group">
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