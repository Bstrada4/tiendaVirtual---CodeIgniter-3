{strip}

<div class="content">

    <div class="container-fluid">

        <div class="page-title-box">

            <div class="row align-items-center">     

                <div class="col-sm-6">

                    <h4 class="page-title">Formulario mitos</h4>

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="javascript:void(0);">Mitos</a></li>

                        <li class="breadcrumb-item"><a href="javascript:void(0);">Editar mitos</a></li>

                    </ol>



                </div>

            </div>

        </div>

    

        <form action="{$getUrl}mitos/proceso/editar" method="post" class="formulario" accept-charset="utf-8" enctype="multipart/form-data">

            <span class="respuesta"></span>

            <div class="row">

                <div class="col-lg-6">

                    <div class="card">

                        <div class="card-body">

                            <label>Título</label>

                            <input type="text" class="form-control" maxlength="100" name="titulo" id="defaultconfig" value="{if isset($titulo)}{$titulo}{/if}" autocomplete="off" />



                            <label>Subtitulo</label>

                            <input type="text" class="form-control" maxlength="100" name="subtitulo" id="defaultconfig" value="{if isset($subtitulo)}{$subtitulo}{/if}" autocomplete="off" />



                            <label>Icono</label><br>
                            <small>Puede encontrar iconos <a style="color:red;" href="https://fontawesome.com/icons?d=gallery" target="_blank">aquí</a>: </small>
                            <textarea id="" rows="2"  name="icono" style="width: 100%;resize: none;">
                            {if isset($icono)}{$icono}{/if}
                            </textarea>



                            <div class="m-t-20">

                                <label>Descripción:</label>

                                {$descripcion}

                            </div>

                        </div>

                    </div>

                    <div class="card">

                        <div class="card-body">

                            <h4 class="mt-0 header-title">Imagen</h4>

                            <div class="form-group">

                                <label>(*) Imágen con una dimension equivalente a 1600*900 px como máximo. Tambien tener en cuenta que tiene que tener un peso Máximo de 2 MB.</label>

                                <input type="file" class="filestyle" data-buttonname="btn-secondary" name="imagenMitos">

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

{* ############# CK EDITOR ############# *}

<script src="{$baseUrl}public/plugins/ckeditor/ckeditor.js"></script>

<script>

    {literal}

        CKEDITOR.replace('descripcion', {

            height: 280, 

            skin: 'office2013'

        });

    {/literal}

</script>

{* ############# JQUERY ############# *}

<script src="{$baseUrl}public/plugins/jquery/2.1.3/jquery.min.js"></script>

{/strip}