{strip}
<div class="content">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center">     
                <div class="col-sm-6">
                    <h4 class="page-title">Formulario nutrición</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Nutrición</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Agregar nutrición</a></li>
                    </ol>

                </div>
            </div>
        </div>
    
        <form action="{$getUrl}nutricion/proceso/agregar" method="post" class="formulario" accept-charset="utf-8" enctype="multipart/form-data">
            <span class="respuesta"></span>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <label>Título</label>
                            <input type="text" class="form-control" maxlength="150" name="titulo" id="defaultconfig" value="{if isset($titulo)}{$titulo}{/if}" autocomplete="off" />
                            {if isset($descripcion_corta)}
                             <div class="m-t-20">
                                <label>Descripción rapida:</label>
                                {$descripcion_corta}
                            </div>
                            {/if}

                            {if isset($descripcion)}
                            <div class="m-t-20">
                                <label>Descripción:</label>
                                {$descripcion}
                            </div>
                            {/if}
                        </div>


                    </div>
                    

                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Imagen</h4>
                            <div class="form-group">
                                <label>(*) Imágen con una dimension equivalente a 2000*1100 px como máximo. Tambien tener en cuenta que tiene que tener un peso Máximo de 2 MB.</label>
                                <input type="file" class="filestyle" data-buttonname="btn-secondary" name="imagenNutricion">
                            </div>
                        </div>

                        <div class="card-body">
                            <h4 class="mt-0 header-title">Imagen home</h4>
                            <div class="form-group">
                                <label>(*) Imágen con una dimension equivalente a 1200*800 px como máximo. Tambien tener en cuenta que tiene que tener un peso Máximo de 2 MB.</label>
                                <input type="file" class="filestyle" data-buttonname="btn-secondary" name="imagenNutricionHome">
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
{* ############# CK EDITOR ############# *}
<script src="{$baseUrl}public/plugins/ckeditor/ckeditor.js"></script>
<script>
    {literal}

        CKEDITOR.replace('descripcion_corta', {
            height: 120, 
            skin: 'office2013',
            removeButtons: 'Save,Print,Templates,CreateDiv,Underline,Subscript,Superscript,Strike,Iframe,CreatePlaceholder,Image,Flash,Table,HorizontalRule,,Smiley,SpecialChar,PageBreak,Iframe,InsertPre,ImageButton,HiddenField,Form,Find,Replace,SelectAll,Scayt,Flash,Button,About,MediaEmbed,oembed'
        });

        CKEDITOR.replace('descripcion', {
            height: 280, 
            skin: 'office2013',
            removeButtons: 'Save,Form,About'
        });

    {/literal}
</script>
{* ############# JQUERY ############# *}
<script src="{$baseUrl}public/plugins/jquery/2.1.3/jquery.min.js"></script>
{/strip}