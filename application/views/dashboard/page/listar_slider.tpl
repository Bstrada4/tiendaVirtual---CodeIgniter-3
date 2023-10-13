{strip}
<div class="content">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center">
                
                <div class="col-sm-6">
                    <h4 class="page-title">Módulo slider</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Slider</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Listar</a></li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    <div class="float-right d-md-block">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-settings mr-2"></i> Acción
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{$getUrl}slider/agregar">Agregar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {if isset($generaTabla)}
        <span class="respuesta"></span>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                       {$generaTabla}
                    </div>
                </div>
            </div>
        </div>
        {/if}
    </div>
</div>
{/strip}