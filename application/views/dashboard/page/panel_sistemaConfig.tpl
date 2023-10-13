{strip}

<div class="content">

    <div class="container-fluid">

        <div class="page-title-box">

            <div class="row align-items-center">     

                <div class="col-sm-6">

                    <h4 class="page-title">Panel sistema</h4>

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="javascript:void(0);">Configuración</a></li>

                        <li class="breadcrumb-item"><a href="javascript:void(0);">Sistema</a></li>

                    </ol>



                </div>

            </div>

        </div>

    

        <form action="{$getUrl}sistemaConfig/proceso/panel" method="post" class="formulario" accept-charset="utf-8" enctype="multipart/form-data">

            <span class="respuesta"></span>

            <div class="row">

                <div class="col-lg-6">

                    <div class="card">

                        <div class="card-body">

                            <label>Título empresa</label>

                            <input type="text" class="form-control" maxlength="50" name="sisInfoTituloEmpresa" id="defaultconfig" value="{if isset($config_titulo)}{$config_titulo}{/if}" autocomplete="off" />



                            <div class="m-t-20">

                                <label>Correo</label>

                                <input type="text" maxlength="55" name="sisInfoCorreo" class="form-control" id="defaultconfig" value="{if isset($config_correo)}{$config_correo}{/if}" autocomplete="off"/>

                            </div>



                            <div class="m-t-20">

                                <label>Pie de pagina</label>

                                <input type="text" maxlength="60" name="sisPieDePagina" class="form-control" id="defaultconfig" value="{if isset($config_pie)}{$config_pie}{/if}" autocomplete="off"/>

                            </div>

                        </div>

                    </div>

                    <div class="card">

                        <div class="card-body">

                            <h4 class="mt-0 header-title">Favicon</h4>

                            <div class="form-group">

                                <label>(*) Imágen con una dimension equivalente a 200*200 px como máximo. Tambien tener en cuenta que tiene que tener un peso Máximo de 1 MB.</label>

                                <input type="file" class="filestyle" data-buttonname="btn-secondary" name="imagenFavicon">

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