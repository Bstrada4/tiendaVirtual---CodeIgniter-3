{strip}
<div class="content">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center">     
                <div class="col-sm-6">
                    <h4 class="page-title">Panel redes sociales</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Configuración</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Redes sociales</a></li>
                    </ol>

                </div>
            </div>
        </div>
    
        <form action="{$getUrl}sociales/proceso/panel" method="post" class="formulario" accept-charset="utf-8" enctype="multipart/form-data">
            <span class="respuesta"></span>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <label>Instagram:</label>
                            <input type="text" class="form-control" maxlength="160" name="instagram" value="{if isset($instagram)}{$instagram}{/if}" autocomplete="off" placeholder="https://www.instagram.com" />
                        </div>

                        <div class="card-body">
                            <label>Twitter:</label>
                            <input type="text" class="form-control" maxlength="160" name="twitter" value="{if isset($twitter)}{$twitter}{/if}" autocomplete="off" placeholder="https://www.twitter.com" />
                        </div>

                        <div class="card-body">
                            <label>Facebook:</label>
                            <input type="text" class="form-control" maxlength="160" name="facebook" value="{if isset($facebook)}{$facebook}{/if}" autocomplete="off" placeholder="https://www.facebook.com" />
                        </div>

                        <div class="card-body">
                            <label>Youtube:</label>
                            <input type="text" class="form-control" maxlength="160" name="youtube" value="{if isset($youtube)}{$youtube}{/if}" autocomplete="off" placeholder="https://www.youtube.com" />
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
{/strip}