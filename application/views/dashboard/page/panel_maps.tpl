{strip}

<div class="content">

    <div class="container-fluid">

        <div class="page-title-box">

            <div class="row align-items-center">     

                <div class="col-sm-6">

                    <h4 class="page-title">Panel google maps</h4>

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="javascript:void(0);">Configuración</a></li>

                        <li class="breadcrumb-item"><a href="javascript:void(0);">Google maps</a></li>

                    </ol>



                </div>

            </div>

        </div>

    

        <form action="{$getUrl}maps/proceso/panel" method="post" class="formulario" accept-charset="utf-8" enctype="multipart/form-data">

            <span class="respuesta"></span>

            <div class="row">

                <div class="col-lg-6">

                    <div class="card">

            

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">

                            BUSCAR LA POSICION DE MI TIENDA

                        </button>



                        <div class="card-body">

                            <label>Dirección 1:</label>

                            <input type="text" class="form-control" maxlength="50" name="titulo_1" value="{if isset($titulo_1)}{$titulo_1}{/if}" autocomplete="off" placeholder="Titulo" />

                            <input type="text" class="form-control" maxlength="25" name="latitud_1" value="{if isset($latitud_1)}{$latitud_1}{/if}" autocomplete="off" placeholder="Latitud" />

                            <div class="m-t-10">

                                <input type="text" maxlength="25" name="longitud_1" class="form-control"  value="{if isset($longitud_1)}{$longitud_1}{/if}" autocomplete="off"  placeholder="Longitud"/>

                            </div>  

                        </div>



                        <div class="card-body">

                            <label>Dirección 2:</label>

                            <input type="text" class="form-control" maxlength="50" name="titulo_2" value="{if isset($titulo_2)}{$titulo_2}{/if}" autocomplete="off" placeholder="Titulo" />

                            <input type="text" class="form-control" maxlength="25" name="latitud_2" value="{if isset($latitud_2)}{$latitud_2}{/if}" autocomplete="off" placeholder="Latitud" />

                            <div class="m-t-10">

                                <input type="text" maxlength="25" name="longitud_2" class="form-control"  value="{if isset($longitud_2)}{$longitud_2}{/if}" autocomplete="off"  placeholder="Longitud"/>

                            </div>  

                        </div>



                        <div class="card-body">

                            <label>Dirección 3:</label>

                            <input type="text" class="form-control" maxlength="50" name="titulo_3" value="{if isset($titulo_3)}{$titulo_3}{/if}" autocomplete="off" placeholder="Titulo" />

                            <input type="text" class="form-control" maxlength="25" name="latitud_3" value="{if isset($latitud_3)}{$latitud_3}{/if}" autocomplete="off" placeholder="Latitud" />

                            <div class="m-t-10">

                                <input type="text" maxlength="25" name="longitud_3" class="form-control"  value="{if isset($longitud_3)}{$longitud_3}{/if}" autocomplete="off"  placeholder="Longitud"/>

                            </div>  

                        </div>



                        <div class="card-body">

                            <label>Dirección 4:</label>

                            <input type="text" class="form-control" maxlength="50" name="titulo_4" value="{if isset($titulo_4)}{$titulo_4}{/if}" autocomplete="off" placeholder="Titulo" />

                            <input type="text" class="form-control" maxlength="25" name="latitud_4" value="{if isset($latitud_4)}{$latitud_4}{/if}" autocomplete="off" placeholder="Latitud" />

                            <div class="m-t-10">

                                <input type="text" maxlength="25" name="longitud_4" class="form-control"  value="{if isset($longitud_4)}{$longitud_4}{/if}" autocomplete="off"  placeholder="Longitud"/>

                            </div>  

                        </div>



                        <div class="card-body">

                            <label>Dirección 5:</label>

                            <input type="text" class="form-control" maxlength="50" name="titulo_5" value="{if isset($titulo_5)}{$titulo_5}{/if}" autocomplete="off" placeholder="Titulo" />

                            <input type="text" class="form-control" maxlength="25" name="latitud_5" value="{if isset($latitud_5)}{$latitud_5}{/if}" autocomplete="off" placeholder="Latitud" />

                            <div class="m-t-10">

                                <input type="text" maxlength="25" name="longitud_5" class="form-control"  value="{if isset($longitud_5)}{$longitud_5}{/if}" autocomplete="off"  placeholder="Longitud"/>

                            </div>  

                        </div>



                        <div class="card-body">

                            <label>Dirección 6:</label>

                            <input type="text" class="form-control" maxlength="50" name="titulo_6" value="{if isset($titulo_6)}{$titulo_6}{/if}" autocomplete="off" placeholder="Titulo" />

                            <input type="text" class="form-control" maxlength="25" name="latitud_6" value="{if isset($latitud_6)}{$latitud_6}{/if}" autocomplete="off" placeholder="Latitud" />

                            <div class="m-t-10">

                                <input type="text" maxlength="25" name="longitud_6" class="form-control"  value="{if isset($longitud_6)}{$longitud_6}{/if}" autocomplete="off"  placeholder="Longitud"/>

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

<style>

    #map {

        height: 100%;

    }

</style>

<script>

    {literal}

    function initMap() {

        var myLatlng = {lat: -12.060637333742575, lng: -77.02898915883299};



        var map = new google.maps.Map(

            document.getElementById('map'), {zoom: 13, center: myLatlng});

        var infoWindow = new google.maps.InfoWindow(

            {content: 'Obtener la <b>latitud/longitud!</b> de mi tienda,copie los datos obtenidos en su respectivos campos', position: myLatlng});

        infoWindow.open(map);



        map.addListener('click', function(mapsMouseEvent) {

          infoWindow.close();

          infoWindow = new google.maps.InfoWindow({position: mapsMouseEvent.latLng});

          infoWindow.setContent(mapsMouseEvent.latLng.toString());

          infoWindow.open(map);

        });

    }

    {/literal}

</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCUruOZGZVXOsZHNwa9UckAahh_bwnOAPM&callback=initMap"></script>



<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

        <div>

          <div id="map" style="width: 100%; height: 450px;"></div>

        </div>

    </div>

  </div>

</div>



{/strip}



