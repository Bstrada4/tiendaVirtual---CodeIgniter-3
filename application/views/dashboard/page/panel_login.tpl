{strip}
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>{if isset($tituloEncabezado)}{$tituloEncabezado}{/if}</title>
        <link rel="shortcut icon" href="{$baseUrl}public/assets/images/favicon.ico">

        <link href="{$baseUrl}public/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="{$baseUrl}public/assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="{$baseUrl}public/assets/css/style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{$baseUrl}public/plugins/alertifyjs/css/alertify.css" type="text/css" />
        <link rel="stylesheet" href="{$baseUrl}public/plugins/alertifyjs/css/themes/default.css" type="text/css" />
        <link rel="stylesheet" href="{$baseUrl}public/dashboard/css/style.css" type="text/css" />
    </head>

    <body>
        <div class="home-btn d-none d-sm-block">
            {if isset($baseUrl)}<a href="{$baseUrl}" class="text-dark"><i class="fas fa-home h2"></i></a>{/if}
        </div>
        <div class="wrapper-page">
            <div class="card overflow-hidden account-card mx-3">
                <div class="bg-primary p-4 text-white text-center position-relative">
                    <h4 class="font-20 m-b-5">Bienvenido a {if isset($proyectoTitulo)}{$proyectoTitulo}{/if} !</h4>
                    <p class="text-white-50 mb-4">Inicie sesión para continuar.</p>
                </div>
                <div class="account-card-content"> 
                    <form class="form-horizontal m-t-30 formulario" action="{$getUrl}acceso/login" method="post" >
                        <span class="respuesta"></span>
                        <div class="form-group">
                            <label for="username">Usuario</label>
                            <input type="text" name="usuario" class="form-control" id="username" placeholder="Ingresar usuario" maxlength="20" minlength="5" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="userpassword">Contraseña</label>
                            <input type="password" name="clave" class="form-control" id="userpassword" placeholder="Ingresar contraseña" maxlength="25" minlength="5">
                        </div>

                        <div class="form-group row m-t-20">
                            <div class="col-sm-12">
                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Ingresar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="m-t-40 text-center">
                <p>© Copyright {$smarty.now|date_format:"%Y"} - {if isset($proyectoPieDePagina)}{$proyectoPieDePagina}{/if}.</p>
            </div>

        </div>

        <script src="{$baseUrl}public/assets/js/jquery.min.js"></script>
        <script src="{$baseUrl}public/assets/js/bootstrap.bundle.min.js"></script>
        <script src="{$baseUrl}public/plugins/blockUI/jquery.blockUI.js"></script>
        <script src="{$baseUrl}public/plugins/alertifyjs/alertify.js"></script>
        <script src="{$baseUrl}public/dashboard/js/login.min.js"></script>
    </body>
</html>
{/strip}