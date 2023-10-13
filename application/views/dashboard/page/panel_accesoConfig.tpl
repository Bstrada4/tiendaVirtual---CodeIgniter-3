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

    

        <form action="{$getUrl}sistemaConfig/proceso/acceso" method="post" class="formulario" accept-charset="utf-8" enctype="multipart/form-data">

            <span class="respuesta"></span>

            <div class="row">

                <div class="col-lg-6">

                    <div class="card">

                        <div class="card-body">

                            <label>Intentos erroneos:</label>

                            <p class="text-muted m-b-15">(*) Cantidad de intentos erroneos al momento de acceder a cualquier formulario de acceso.</p>

                            <input type="text" class="form-control" maxlength="2" name="intentoError" id="defaultconfig" value="{if isset($config_error)}{$config_error}{/if}" autocomplete="off" />



                            <div class="m-t-20">

                                <label>Tiempo de bloqueo:</label>

                                <p class="text-muted m-b-15">(*) Tiempo máximo que un usuario estará bloqueado luego de haber exedido los intentos erroneos. El tiempo se expresa en minutos.</p>

                                <input type="text" maxlength="2" name="tiempoBloqueo" class="form-control" id="defaultconfig" value="{if isset($config_bloqueo)}{$config_bloqueo}{/if}" autocomplete="off"/>

                            </div>



                            <div class="m-t-20">

                                <label>Duración del captcha:</label>

                                <p class="text-muted m-b-15">(*) Tiempo máximo que durará la imágen de seguridad conocida como captcha que aparece en los paneles de acceso. El tiempo se expresa en segundos.</p>

                                <input type="text" maxlength="4" name="duracionCaptcha" class="form-control" id="defaultconfig" value="{if isset($config_captcha)}{$config_captcha}{/if}" autocomplete="off"/>

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