{strip}
<div class="content">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center">     
                <div class="col-sm-6">
                    <h4 class="page-title">Formulario nosotros</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Nosotros</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Editar nosotros</a></li>
                    </ol>

                </div>
            </div>
        </div>
    
        <form action="{$getUrl}nosotros/proceso/editar" method="post" class="formulario" accept-charset="utf-8" enctype="multipart/form-data">
            <span class="respuesta"></span>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">

                            {if isset($descripcion_1)}
                            <div class="m-t-20">
                                <label>Descripción:</label>
                                {$descripcion_1}
                            </div>
                            <br>
                            {/if}
                            {if isset($mensaje_1)}
                            <label>Mensaje 1</label>
                            <input type="text" class="form-control" maxlength="100" name="mensaje_1" value="{$mensaje_1}" autocomplete="off" />
                            {/if}

                            {if isset($mensaje_2)}
                            <label>Mensaje 2</label>
                            <input type="text" class="form-control" maxlength="100" name="mensaje_2" value="{$mensaje_2}" autocomplete="off" />
                            {/if}

                            {if isset($mensaje_3)}
                            <label>Mensaje 3</label>
                            <input type="text" class="form-control" maxlength="100" name="mensaje_3" value="{$mensaje_3}" autocomplete="off" />
                            {/if}

                            {if isset($mensaje_4)}
                            <label>Mensaje 4</label>
                            <input type="text" class="form-control" maxlength="100" name="mensaje_4" value="{$mensaje_4}" autocomplete="off" />
                            {/if}

                            {if isset($mensaje_5)}
                            <label>Mensaje 5</label>
                            <input type="text" class="form-control" maxlength="100" name="mensaje_5" value="{$mensaje_5}" autocomplete="off" />
                            {/if}

                            {if isset($descripcion_2)}
                            <div class="m-t-20">
                                <label>Misión:</label>
                                {$descripcion_2}
                            </div>
                            {/if}

                            {if isset($descripcion_3)}
                            <div class="m-t-20">
                                <label>Visión:</label>
                                {$descripcion_3}
                            </div>
                            {/if}
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Imagen</h4>
                            <div class="form-group">
                                <label>(*) Imágen con una dimension equivalente a 1000*1100 px como máximo. Tambien tener en cuenta que tiene que tener un peso Máximo de 2 MB.</label>
                                <input type="file" class="filestyle" data-buttonname="btn-secondary" name="imagenNosotros">
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
                {if !empty($observar_imagen)}
                <div class="col-lg-6">
                    <div class="card">
                        <img src="{$observar_imagen}" width="100%">
                    </div>
                </div>
                {/if}
            </div>
        </form>
    </div>
</div>
{* ############# CK EDITOR ############# *}
<script src="{$baseUrl}public/plugins/ckeditor/ckeditor.js"></script>
<script>
    {literal}
        CKEDITOR.replace('descripcion_1', {
            height: 120, 
            skin: 'office2013',
            removeButtons: 'Save,Print,Templates,CreateDiv,Underline,Subscript,Superscript,Strike,Iframe,CreatePlaceholder,Image,Flash,Table,HorizontalRule,,Smiley,SpecialChar,PageBreak,Iframe,InsertPre,ImageButton,HiddenField,Form,Find,Replace,SelectAll,Scayt,Flash,Button,About,MediaEmbed,oembed'
        });

        CKEDITOR.replace('descripcion_2', {
            height: 120, 
            skin: 'office2013',
            removeButtons: 'Save,Print,Templates,CreateDiv,Underline,Subscript,Superscript,Strike,Iframe,CreatePlaceholder,Image,Flash,Table,HorizontalRule,,Smiley,SpecialChar,PageBreak,Iframe,InsertPre,ImageButton,HiddenField,Form,Find,Replace,SelectAll,Scayt,Flash,Button,About,MediaEmbed,oembed'
        });

        CKEDITOR.replace('descripcion_3', {
            height: 120, 
            skin: 'office2013',
            removeButtons: 'Save,Print,Templates,CreateDiv,Underline,Subscript,Superscript,Strike,Iframe,CreatePlaceholder,Image,Flash,Table,HorizontalRule,,Smiley,SpecialChar,PageBreak,Iframe,InsertPre,ImageButton,HiddenField,Form,Find,Replace,SelectAll,Scayt,Flash,Button,About,MediaEmbed,oembed'
        });
    {/literal}
</script>
{* ############# JQUERY ############# *}
<script src="{$baseUrl}public/plugins/jquery/2.1.3/jquery.min.js"></script>
{/strip}