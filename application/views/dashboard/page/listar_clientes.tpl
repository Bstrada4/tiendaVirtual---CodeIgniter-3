{strip}
<div class="content">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center">
                
                <div class="col-sm-6">
                    <h4 class="page-title">Módulo clientes</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Clientes</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Listar</a></li>
                    </ol>
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