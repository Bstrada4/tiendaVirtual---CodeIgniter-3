<?php

@header('X-Frame-Options: SAMEORIGIN');

@header('Referrer-Policy: no-referrer');

@header('X-Powered-By: Apolomultimedia');



class Recetas extends CI_Controller {

    private $resultado;

    private $items = array();



    public function __construct() {

        parent::__construct();

        ini_set('memory_limit', '1024M');

        ini_set('max_execution_time', 0);

        ini_set('upload_max_filesize', '200M');



        $librerias = array('dashboard/datos_privados');

        $helper = array();

        $modelos = array('m_web_recetas','m_web_clasificacion');

        $this->load->library($librerias);

        $this->load->helper($helper);

        $this->load->model($modelos);

    

        $this->items['miModulo'] = 'recetas';

        $this->items['carpetaProyecto'] = 'dashboard';

        $this->items['baseUrl'] = base_url();

        $this->items['getUrl'] = base_url().$this->items['carpetaProyecto'].'/';

        $this->scriptVista = $this->scripts->scriptVistaGeneral();

        $this->items = array_merge($this->items, $this->scriptVista);

        $this->accesoSession = sessiones_helper::obtieneInfoSesion('sesionUsuario');

        $this->verificaAcceso = $this->datos_privados->verificaAcceso();

        $this->items['receta_active'] = 'mm-active';

        $this->items['recetas_active'] = 'mm-active-sub';

    }



    public function listar(){

        $data['tituloEncabezado'] = $this->items['sisInfoTituloEmpresa'] .' - Listar Recetas';

        /* Información */

            if($this->accesoSession->accesoTmpNivel == 500){

                $condiciones = array(

                    'web_recetas.posicion' => 'asc'

                );

            } else{

                $condiciones = array( 

                    'web_recetas.usuario_id !=' => $this->accesoSession->accesoTmpId,

                    'web_recetas.posicion' => 'asc'

                );

            }

        /* Datatable */

            $opciones = array(

                'iDisplayLength' => 10, 

                'bSort' => FALSE, 

                'bPaginate' => TRUE, 

                'bFilter' => TRUE, 

                'bLengthChange' => FALSE, 

                'bInfo' => FALSE

            );

            $dataTable = $this->complementos->datatable($opciones, '.dataTable');

            $this->items['jqueryDataTable'] = $dataTable['jquery'];

            $this->items['clasesDataTable'] = $dataTable['clases'];

        /* Información */

            $recetas = $this->m_web_recetas->mostrarDatos($condiciones);

            if(!empty($recetas)){

                $this->table->set_template(

                    array(

                        'table_open' => '<table class="table table-hover table-bordered table-striped dt-responsive table-sm dataTable" style="border-collapse: collapse; border-spacing: 0; width: 100%;" id="infoTable">',

                        'heading_cell_start'  => '<th style="vertical-align:middle; text-align:center;">',

                        'thead_open'  => '<thead class="thead-dark">',

                        'cell_start' => '<td style="vertical-align:middle; text-align:center;">',

                        'cell_alt_start' => '<td style="vertical-align:middle; text-align:center;">'

                    )

                );

                $todosCheckInfo = '<a style="color: white;" href="javascript:;" class="text-black removerInfoTotal" data-url="'.$this->items['miModulo'].'/proceso/removerTodo" data-response="respuesta" data-toggle="tooltip" title="ELIMINAR ITEMS"><i class="fa fa-trash"></i> ELIMINAR</a>';

                $todosCheck = '<input type="checkbox" name="checkTodo" id="checkTodo" />';

                $this->table->set_heading('#', 'TITULO', 'CATEGORÍA','IMAGEN','ESTADO', $todosCheckInfo.'<br />'.$todosCheck, 'ACCIÓN');

                $accion = array(

                    'entity' => $this->items['miModulo'],

                    'route' => $this->items['baseUrl'].$this->items['carpetaProyecto'], 

                    'option' => 'observar|editar|denegar|permitir|remover', 

                    'response' => 'respuesta', 

                    'class' => 'procesarInfo'

                );



                $i = 1;

                foreach($recetas AS $items){

                    $ratio = $this->complementos->ratio(90, 45, 160);

                    $imagenValue = ($items->imagen != '') ? $items->imagen : 'empty.png';

                    $imagenRecetas = '<img src="'.$this->items['baseUrl'].'crop/'.$ratio['ancho'].'/'.$ratio['alto'].'/recetas-'.$imagenValue.'" />';

                    $checkAccion = '<input type="checkbox" name="checkRemover" id="checkRemover" value="'.$items->id.'" />'; 

                    $checkAccionFinal = ($items->eliminacionLogica == 0) ? $checkAccion : '';



                    $condicion = array(

                        'web_clasificacion.id' => $items->categoriaId

                    );

                    $clasificacion = $this->m_web_clasificacion->mostrarDatos($condicion);

                    $clasificacionName = ($clasificacion[0]->titulo != '') ? $clasificacion[0]->titulo : '';

                        $this->table->add_row(

                            $i, 

                            '<span class="text-primary">'.$items->titulo.'</span>',

                            '<span class="text-primary">'.$clasificacionName.'</span>',  

                            '<span class="text-primary">'.$imagenRecetas.'</span>', 

                            $this->complementos->status_registro($items->eliminacionLogica),

                            $checkAccionFinal,

                            $this->datos_privados->formAccion($accion, $items->id, $items->eliminacionLogica)

                        );

                    $i++;

                }

                $data['generaTabla'] = $this->table->generate();

                $data['generaPaginacion'] = $this->pagination->create_links();

            }else{

                $data['generaTabla'] = '<h4>No se encontraron resultados</h4>';

            }



        $data = array_merge($data, $this->items);

        $data = array_merge($data, $this->verificaAcceso);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/header', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_header', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/page/listar_recetas', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_footer', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/footer', $data);

    }



    public function agregar(){

        $data['tituloEncabezado'] = $this->items['sisInfoTituloEmpresa'] .' - Agregar Recetas';



        $opciones = array(

            'name' => 'descripcion', 'id' => 'descripcion',

            'value' => '',

            'class' => 'form-normal-width'

        );

        $data['descripcion'] = form_textarea($opciones);



        $clasificacion = $this->m_web_clasificacion->mostrarDatos();

        foreach($clasificacion as $items){

            $select[$items->id] = $items->titulo;

        }

        $data['clasificacionId'] = $this->complementos->generaSelect($select, 'clasificacionId', '' , 'Seleccione una opción', '', 'select'); 

        unset($select);





        $data = array_merge($data, $this->items);

        $data = array_merge($data, $this->verificaAcceso);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/header', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_header', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/page/agregar_recetas', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_footer', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/footer', $data);

    }



    public function editar($id = ''){

        $data['tituloEncabezado'] = $this->items['sisInfoTituloEmpresa'] .' - Editar Recetas';

        sessiones_helper::eliminaSesion('editarNutricion');

        if($this->accesoSession->accesoTmpNivel == 500){

            $condiciones = array(

                'web_recetas.id' => $id,

            );

        } else {

            $condiciones = array(

                'web_recetas.id' => $id, 'web_recetas.usuario_id' => $this->accesoSession->accesoTmpId

            );

        }

        $resultado = $this->m_web_recetas->mostrarDatos($condiciones);

        if(!empty($resultado)){

            $receta = $resultado[0];

            sessiones_helper::creaSesion('editarReceta', $receta->id);

            $data['recetaId'] = $receta->id;

            $data['titulo'] = $receta->titulo;

            $data['subtitulo'] = $receta->subtitulo;

            $opciones = array(

                'name' => 'descripcion', 'id' => 'descripcion',

                'value' => $receta->descripcion,

                'class' => 'form-normal-width'

            );

            $data['descripcion'] = form_textarea($opciones);

            $data['imagen'] = $receta->imagen;



            $clasificacion = $this->m_web_clasificacion->mostrarDatos();

            foreach($clasificacion as $items){

                $select[$items->id] = $items->titulo;

            }

            $data['clasificacionId'] = $this->complementos->generaSelect($select, 'clasificacionId', $receta->categoriaId , 'Seleccione una opción', '', 'select'); 

            unset($select);

            /* ########## */

        } else {

            echo re_direccion($this->items['getUrl'].'principal/panel'); EXIT;

        }



        $data = array_merge($data, $this->items);

        $data = array_merge($data, $this->verificaAcceso);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/header', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_header', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/page/editar_recetas', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_footer', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/footer', $data);

    }



    public function observar($id = ''){

        $data['tituloEncabezado'] = $this->items['sisInfoTituloEmpresa'] .' - Observar Recetas';



        $condiciones = array(

            'web_recetas.id' => $id

        );

        $resultado = $this->m_web_recetas->mostrarDatos($condiciones);

        if(!empty($resultado)){

            $recetas = $resultado[0];

            $image = ($recetas->imagen != '') ? $recetas->imagen : 'empty.png';

            $data['observar_id'] = $recetas->id;

            $data['observar_titulo'] = $recetas->titulo;

            $data['observar_subtitulo'] = $recetas->subtitulo;

            $data['observar_descripcion'] = $recetas->descripcion;

            $data['observar_url'] = $recetas->slug;

            $data['observar_posicion'] = 'N°'.$recetas->posicion;

            $data['observar_imagen'] = base_url().'crop/300/150/recetas-'.$image;

            $data['fechaRegistro'] = ($recetas->fechaRegistro >= 1104537600) ? $this->complementos->obtenerFecha($recetas->fechaRegistro,7) : '---';

            $data['fechaModificacion'] = ($recetas->fechaModificacion >= 1104537600) ? $this->complementos->obtenerFecha($recetas->fechaModificacion,7) : '---';

        

            $condicion = array(

                'web_clasificacion.id' => $recetas->categoriaId

            );

            $clasificacion = $this->m_web_clasificacion->mostrarDatos($condicion);

            $clasificacionName = ($clasificacion[0]->titulo != '') ? $clasificacion[0]->titulo : '';

            $data['observar_clasificacion'] = $clasificacionName;

        }

        

        $data = array_merge($data, $this->items);

        $data = array_merge($data, $this->verificaAcceso);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/header', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_header', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/page/observar_recetas', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_footer', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/footer', $data);

    }



    public function proceso($accion, $id = ''){

        $this->datos_privados->verificaAcceso();

        switch($accion){

            case 'agregar':

                    if(!$this->datos_privados->seguridadAccionModulo($this->accesoSession->accesoTmpNivel, $this->items['miModulo'], 'agregar')){

                        $message = sprintf(error_helper::msg()->msg6);

                        echo alerta_error($message);EXIT; 

                    }

                    $msjError = TRUE;

                    $titulo = $this->input->post('titulo');

                    $subtitulo = $this->input->post('subtitulo');

                    $descripcion = $this->input->post('descripcion');

                    $imagenRecetas = $this->complementos->obtenerArchivo('imagenRecetas', 'unico');

                    $clasificacionId = $this->complementos->addSlashtag($this->input->post('clasificacionId',TRUE));



                    $error = '';

                    $error .= valida_campo($titulo, 'not_empty|minlength:3|maxlength:150', 'Título');

                    $error .= valida_campo($subtitulo, 'maxlength:100', 'Subtítulo');

                    $error .= valida_campo($clasificacionId, 'not_empty', 'Categoría'); 

                    $error .= valida_campo($descripcion, 'not_empty|maxlength:9500', 'Descripción');    

                    if(!empty($imagenRecetas)){

                        $error .= valida_imagen($imagenRecetas, 'maxwidth:2000|maxheight:1100:|maxsize:2', 'Imagen');

                    }



                    if($error != ''){ 

                        $message = sprintf(error_helper::msg()->msg201,$error);

                        echo alerta_error($message);EXIT; 

                    }



                    if(!empty($imagenRecetas)){

                        $opciones = array(

                            'marcaTipo' => FALSE,

                            'marcaInfo' => FALSE,

                            'ajuste' => 'w',

                            'ajusteImagen' => 765,

                            'desenfocado' => FALSE,

                            'cantidadCopia' => array()

                        );

                        $obtieneImagen = $this->complementos->almacenarImagen($imagenRecetas, 'public/imagen/recetas', $opciones, TRUE);

                    } else {

                        $obtieneImagen = '';

                    }

                     $condicion_cantidad = array(

                        'web_recetas.categoria_id' => $clasificacionId

                    );

                    $cantidad = $this->m_web_recetas->mostrarDatos($condicion_cantidad);

                    $columnaDatos = array(

                        'titulo' => $titulo,

                        'subtitulo' => $subtitulo,

                        'slug' =>  url_seo($titulo),

                        'descripcion' => $descripcion,

                        'categoria_id' => $clasificacionId,

                        'imagen' => $obtieneImagen,

                        'posicion' => (!empty($cantidad)) ? count($cantidad) + 1 : 1,

                        'fecha_registro' => time(),

                        'usuario_id' => $this->accesoSession->accesoTmpId,

                        'eliminacion_logica' => 1

                    );

                    $resultado = $this->m_web_recetas->insertar($columnaDatos);

                    if(!empty($resultado)){

                        $message = sprintf(error_helper::msg()->msg502,$titulo);

                        $redUrl = $this->items['getUrl'].'recetas/listar';

                        echo alerta_exito($message,3,$redUrl);

                        EXIT();

                    }

                    if($msjError){

                        $message = sprintf(error_helper::msg()->msg6);

                        echo alerta_error($message);EXIT; 

                    }

                break;

            case 'editar':

                    if(!$this->datos_privados->seguridadAccionModulo($this->accesoSession->accesoTmpNivel, $this->items['miModulo'], 'editar')){

                        $message = sprintf(error_helper::msg()->msg6);

                        echo alerta_error($message);EXIT; 

                    }

                    $msjError = TRUE;

                    $recetaId = sessiones_helper::obtieneSesion('editarReceta');

                    $titulo = $this->input->post('titulo');

                    $subtitulo = $this->input->post('subtitulo');

                    $descripcion = $this->input->post('descripcion');

                    $imagenRecetas = $this->complementos->obtenerArchivo('imagenRecetas', 'unico');

                    $clasificacionId = $this->complementos->addSlashtag($this->input->post('clasificacionId',TRUE));



                    $error = '';

                    $error .= valida_campo($recetaId, 'not_empty|alnum|minlength:1|maxlength:11', 'Id Recetas');

                    $error .= valida_campo($titulo, 'not_empty|minlength:3|maxlength:150', 'Título');

                    $error .= valida_campo($subtitulo, 'maxlength:100', 'Subtítulo');

                    $error .= valida_campo($clasificacionId, 'not_empty', 'Categoría'); 

                    $error .= valida_campo($descripcion, 'not_empty|maxlength:9500', 'Descripción');



                    if(!empty($imagenRecetas)){

                        $error .= valida_imagen($imagenRecetas, 'maxwidth:2000|maxheight:1100:|maxsize:2', 'Imagen');

                    }



                    if($error != ''){ 

                        $message = sprintf(error_helper::msg()->msg201,$error);

                        echo alerta_error($message);EXIT; 

                    }



                    $condiciones = array( 'web_recetas.id' => $recetaId );

                    $resultadoRecetas = $this->m_web_recetas->mostrarDatos($condiciones);



                    if(!empty($imagenRecetas)){

                        $opciones = array(

                            'marcaTipo' => FALSE,

                            'marcaInfo' => FALSE,

                            'ajuste' => 'w',

                            'ajusteImagen' => 1600,

                            'desenfocado' => FALSE,

                            'cantidadCopia' => array()

                        );

                        $obtieneImagen = $this->complementos->almacenarImagen($imagenRecetas, 'public/imagen/recetas', $opciones, TRUE);

                    } else {

                        $obtieneImagen = $resultadoRecetas[0]->imagen;

                    }



                    $columnaDatos = array(

                        'titulo' => $titulo,

                        'subtitulo' => $subtitulo,

                        'slug' => url_seo($titulo),

                        'categoria_id' => $clasificacionId,

                        'descripcion' => $descripcion,

                        'imagen' => $obtieneImagen,

                        'fecha_modificacion' => time(),

                    );

                    $resultado = $this->m_web_recetas->actualizar($columnaDatos, array( 'web_recetas.id' => $recetaId ));

                    if(!empty($resultado)){

                        sessiones_helper::eliminaSesion('editarReceta');

                        $message = sprintf(error_helper::msg()->msg503,$titulo);

                        echo alerta_exito($message,3);

                        EXIT();

                    }

                    if($msjError){

                        $message = sprintf(error_helper::msg()->msg6);

                        echo alerta_error($message);EXIT; 

                    }

                break;

            case 'permitir':

                if(!$this->datos_privados->seguridadAccionModulo($this->accesoSession->accesoTmpNivel, $this->items['miModulo'], 'permitir')){

                    $message = sprintf(error_helper::msg()->msg6);

                    echo alerta_error($message);EXIT; 

                }

                $msjError = TRUE;

                if($this->m_web_recetas->existe($id)){

                    $condiciones = array(

                        'web_recetas.eliminacion_logica' => 0,

                        'web_recetas.id' => $id

                    );

                    $resultadoTabla = $this->m_web_recetas->mostrarDatos($condiciones);

                    if(!empty($resultadoTabla)){

                        $this->m_web_recetas->permitirInfo($resultadoTabla[0]->id);

                        $message = sprintf(error_helper::msg()->msg201, 'Se activó el item exitosamente.');

                        echo alerta_exito($message,2);EXIT;

                    }

                }

                if($msjError){

                    $message = sprintf(error_helper::msg()->msg6);

                    echo alerta_error($message);EXIT; 

                }

                break;

            case 'denegar':

                if(!$this->datos_privados->seguridadAccionModulo($this->accesoSession->accesoTmpNivel, $this->items['miModulo'], 'denegar')){

                    $message = sprintf(error_helper::msg()->msg6);

                    echo alerta_error($message);EXIT; 

                }

                $msjError = TRUE;

                if($this->m_web_recetas->existe($id)){

                    $condiciones = array(

                        'web_recetas.eliminacion_logica' => 1,

                        'web_recetas.id' => $id

                    );

                    $resultadoTabla = $this->m_web_recetas->mostrarDatos($condiciones);

                    if(!empty($resultadoTabla)){

                        $this->m_web_recetas->denegarInfo($resultadoTabla[0]->id);

                        $message = sprintf(error_helper::msg()->msg201, 'Se desactivó el item exitosamente.');

                        echo alerta_exito($message,2);EXIT;

                    }

                }

                if($msjError){

                    $message = sprintf(error_helper::msg()->msg6);

                    echo alerta_error($message);EXIT; 

                }

                break;

            case 'remover':

                if(!$this->datos_privados->seguridadAccionModulo($this->accesoSession->accesoTmpNivel, $this->items['miModulo'], 'remover')){

                    $message = sprintf(error_helper::msg()->msg6);

                    echo alerta_error($message);EXIT; 

                }

                $msjError = TRUE;

                if($this->accesoSession->accesoTmpNivel == 500){

                    if($this->m_web_recetas->existe($id)){

                        $condiciones = array(

                            'web_recetas.eliminacion_logica' => 0,

                            'web_recetas.id' => $id

                        );

                        $resultadoTabla = $this->m_web_recetas->mostrarDatos($condiciones);

                        if(!empty($resultadoTabla)){

                            $resultado = $this->m_web_recetas->eliminar( array( 'web_recetas.id' => $resultadoTabla[0]->id ) );

                            if($resultado){

                                $this->m_web_recetas->ordenarPosicionItems(array());

                                $this->complementos->eliminarArchivo($resultadoTabla[0]->imagen, 'public/imagen/recetas');

                                $message = sprintf(error_helper::msg()->msg201, 'La eliminación se completo exitosamente.');

                                echo alerta_exito($message,2);EXIT; 

                            }

                        }

                    }

                }

                if($msjError){

                    $message = sprintf(error_helper::msg()->msg6);

                    echo alerta_error($message);EXIT; 

                }

                break;

            case 'removerTodo':

                if(!$this->datos_privados->seguridadAccionModulo($this->accesoSession->accesoTmpNivel, $this->items['miModulo'], 'remover')){

                    $message = sprintf(error_helper::msg()->msg6);

                    echo alerta_error($message);EXIT; 

                }

                $msjError = TRUE;

                if($this->accesoSession->accesoTmpNivel == 500){

                    $checkRemover = $this->input->post('checkRemover');

                    if(!empty($checkRemover)){

                        foreach($checkRemover as $items){

                            if($this->m_web_recetas->existe($items['value'])){

                                $condiciones = array(

                                    'web_recetas.eliminacion_logica' => 0,

                                    'web_recetas.id' => $items['value']

                                );

                                $resultadoTabla = $this->m_web_recetas->mostrarDatos($condiciones);

                                if(!empty($resultadoTabla)){

                                    $resultado = $this->m_web_recetas->eliminar( array( 'web_recetas.id' => $resultadoTabla[0]->id ) );

                                    if($resultado){

                                        $this->complementos->eliminarArchivo($resultadoTabla[0]->imagen, 'public/imagen/recetas');

                                        $this->m_web_recetas->ordenarPosicionItems(array());

                                    } else{

                                        continue;

                                    }  

                                } else{

                                    continue;

                                }

                            } else{

                                continue;

                            }

                        }

                        $message = sprintf(error_helper::msg()->msg201, 'Se eliminaron correctamente los elementos seleccionados.');

                        echo alerta_exito($message);EXIT; 

                    }

                }

                if($msjError){

                    $message = sprintf(error_helper::msg()->msg6);

                    echo alerta_error($message);EXIT; 

                }

                break;

            case 'posicion':

                if(!$this->datos_privados->seguridadAccionModulo($this->accesoSession->accesoTmpNivel, $this->items['miModulo'], 'configurar')){

                    $message = sprintf(error_helper::msg()->msg6);

                    echo alerta_error($message);EXIT; 

                }



                    $msjError = TRUE;

                    $webRegistroId = $this->input->post('id');

                    $posicionNueva = $this->input->post('posicionNueva');

                    if($this->accesoSession->accesoTmpNivel == 500){

                        $condiciones = array(

                            'web_recetas.eliminacion_logica' => 1,

                            'web_recetas.id' => $webRegistroId

                        );

                    } else {

                        $condiciones = array(

                            'web_recetas.eliminacion_logica' => 1,

                            'web_recetas.id' => $webRegistroId,

                            'web_recetas.usuario_id' => $this->accesoSession->accesoTmpId

                        );

                    }

                    $webRegistro = $this->m_web_recetas->mostrarDatos($condiciones);

                    if (!empty($webRegistro)) {

                        $condiciones = array(

                            'web_recetas.posicion' => 'asc'

                        );

                        $lista = $this->m_web_recetas->mostrarDatos($condiciones);

                        foreach ($lista as $items) {

                            $datos[$items->posicion] = $items->id;

                        }

                        $resultado = $this->complementos->ordenarPosicion($datos, $webRegistro[0]->posicion, $posicionNueva);

                        foreach($resultado as $k => $v){

                            $columnaDatos = array(

                                'web_recetas.posicion' => $k

                            );

                            $this->m_web_recetas->actualizar($columnaDatos, array( 'web_recetas.id' => $v ));

                        }

                        $message = sprintf(error_helper::msg()->msg201,'Se cambió de posición exitosamente.');

                        echo alerta_exito($message,2);

                        EXIT();

                    }

                    if($msjError){

                        $message = sprintf(error_helper::msg()->msg6);

                        echo alerta_error($message);EXIT; 

                    }

                break;

            default:

                return FALSE;

        }

    }

    



}