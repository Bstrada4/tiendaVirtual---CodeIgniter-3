{strip}

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    {if isset($tituloEncabezado)}<title>{$tituloEncabezado}</title>{/if}

    <meta content="Admin Dashboard" name="description" />

    <meta content="Themesbrand" name="author" />

    <link rel="shortcut icon" href="{if isset($proyectoFavicon)}{$proyectoFavicon}{/if}">



    <script>

        var baseUrl = "{$baseUrl}";

        var getUrl = "{$getUrl}";

    </script>



    {if isset($jqueryDataTable) && isset($clasesDataTable)}

    <link href="{$baseUrl}public/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <link href="{$baseUrl}public/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    {/if}

    

    <link href="{$baseUrl}public/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">

    <link href="{$baseUrl}public/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <link href="{$baseUrl}public/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

    <link href="{$baseUrl}public/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />   



    <link href="{$baseUrl}public/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <link href="{$baseUrl}public/assets/css/metisMenu.min.css" rel="stylesheet" type="text/css">

    <link href="{$baseUrl}public/assets/css/icons.css" rel="stylesheet" type="text/css">

    <link href="{$baseUrl}public/assets/css/style.css" rel="stylesheet" type="text/css">



    <link rel="stylesheet" href="{$baseUrl}public/plugins/alertifyjs/css/alertify.css" type="text/css" />

    <link rel="stylesheet" href="{$baseUrl}public/plugins/alertifyjs/css/themes/default.css" type="text/css" />

    <link rel="stylesheet" href="{$baseUrl}public/dashboard/css/style.css" type="text/css" />

</head>

{/strip}