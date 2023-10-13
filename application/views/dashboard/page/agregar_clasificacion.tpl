{strip}
<div class="content">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center">     
                <div class="col-sm-6">
                    <h4 class="page-title">Formulario clasificación</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Clasificación</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Agregar clasificación</a></li>
                    </ol>

                </div>
            </div>
        </div>
    
        <form action="{$getUrl}clasificacion/proceso/agregar" method="post" class="formulario" accept-charset="utf-8" enctype="multipart/form-data">
            <span class="respuesta"></span>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <label>Título</label>
                            <input type="text" class="form-control" maxlength="150" name="titulo" id="defaultconfig" value="{if isset($titulo)}{$titulo}{/if}" autocomplete="off" />
                        </div>
                    </div>
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
{/strip}