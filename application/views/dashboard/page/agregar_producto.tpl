{strip}
<div class="content">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center">     
                <div class="col-sm-6">
                    <h4 class="page-title">Formulario producto</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Producto</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Agregar producto</a></li>
                    </ol>

                </div>
            </div>
        </div>
    
        <form action="{$getUrl}productos/proceso/agregar" method="post" class="formulario" accept-charset="utf-8" enctype="multipart/form-data">
            <span class="respuesta"></span>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <label>Título</label>
                            <input type="text" class="form-control" maxlength="150" name="titulo" value="{if isset($titulo)}{$titulo}{/if}" autocomplete="off" />

                            <label>Subtitulo</label>
                            <input type="text" class="form-control" maxlength="100" name="subtitulo" value="{if isset($subtitulo)}{$subtitulo}{/if}" autocomplete="off" />

                            <label>Precio</label>
                            <input type="text" class="form-control" maxlength="10" name="precio" value="{if isset($precio)}{$precio}{/if}" autocomplete="off" />

                            {if isset($categoriaId)}
                            <div class="m-t-20">
                                <div class="form-group">
                                    <label class="control-label">Categoría</label>
                                    {$categoriaId}
                                </div>
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
                                <label>(*) Imágen con una dimension equivalente a 600*500 px como máximo. Tambien tener en cuenta que tiene que tener un peso Máximo de 2 MB.</label>
                                <input type="file" class="filestyle" data-buttonname="btn-secondary" name="imagenProducto">
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
        CKEDITOR.replace('descripcion', {
            height: 280, 
            skin: 'office2013',
            removeButtons: 'Source,Save,NewPage,DocProps,Preview,Print,Templates,document,Cut,Copy,Paste,PasteText,PasteFromWord,Undo,Redo,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Bold,Italic,Underline,Strike,Subscript,Superscript,RemoveFormat,NumberedList,BulletedList,Outdent,Indent,Blockquote,CreateDiv,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,BidiLtr,BidiRtl,Link,Unlink,Anchor,CreatePlaceholder,Image,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,InsertPre,Styles,Format,Font,FontSize,TextColor,BGColor,UIColor,Maximize,ShowBlocks,button1,button2,button3,oembed,MediaEmbed,About'
        });
    {/literal}
</script>
{* ############# JQUERY ############# *}
<script src="{$baseUrl}public/plugins/jquery/2.1.3/jquery.min.js"></script>
{/strip}