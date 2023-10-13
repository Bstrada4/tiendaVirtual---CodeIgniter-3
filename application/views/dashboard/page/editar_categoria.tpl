{strip}
<div class="content">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center">     
                <div class="col-sm-6">
                    <h4 class="page-title">Formulario categoría</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Categoría</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Editar categoría</a></li>
                    </ol>

                </div>
            </div>
        </div>
    
        <form action="{$getUrl}categoria/proceso/editar" method="post" class="formulario" accept-charset="utf-8" enctype="multipart/form-data">
            <span class="respuesta"></span>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <label>Título</label>
                            <input type="text" class="form-control" maxlength="50" name="titulo" id="defaultconfig" value="{if isset($titulo)}{$titulo}{/if}" autocomplete="off" />

                            <label>Subtitulo</label>
                            <input type="text" class="form-control" maxlength="90" name="subtitulo" id="defaultconfig" value="{if isset($subtitulo)}{$subtitulo}{/if}" autocomplete="off" />
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Imagen</h4>
                            <div class="form-group">
                                <label>(*) Imágen con una dimension equivalente a 650*900 px como máximo. Tambien tener en cuenta que tiene que tener un peso Máximo de 2 MB.</label>
                                <input type="file" class="filestyle" data-buttonname="btn-secondary" name="imagenCategoria">
                            </div>
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