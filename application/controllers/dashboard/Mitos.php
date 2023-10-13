<?php

@header('X-Frame-Options: SAMEORIGIN');

@header('Referrer-Policy: no-referrer');

@header('X-Powered-By: Apolomultimedia');



class Mitos extends CI_Controller {

    private $resultado;

    private $items = array();



    public function __construct() {

        parent::__construct();

        ini_set('memory_limit', '1024M');

        ini_set('max_execution_time', 0);

        ini_set('upload_max_filesize', '200M');



        $librerias = array('dashboard/datos_privados');

        $helper = array();

        $modelos = array('m_web_mitos','m_web_icon');

        $this->load->library($librerias);

        $this->load->helper($helper);

        $this->load->model($modelos);

    

        $this->items['miModulo'] = 'mitos';

        $this->items['carpetaProyecto'] = 'dashboard';

        $this->items['baseUrl'] = base_url();

        $this->items['getUrl'] = base_url().$this->items['carpetaProyecto'].'/';

        $this->scriptVista = $this->scripts->scriptVistaGeneral();

        $this->items = array_merge($this->items, $this->scriptVista);

        $this->accesoSession = sessiones_helper::obtieneInfoSesion('sesionUsuario');

        $this->verificaAcceso = $this->datos_privados->verificaAcceso();

        $this->items['mitos_active'] = 'mm-active';

    }



    public function listar(){

        $data['tituloEncabezado'] = $this->items['sisInfoTituloEmpresa'] .' - Listar Mitos';

        /* Información */

            if($this->accesoSession->accesoTmpNivel == 500){

                $condiciones = array(

                    'web_mitos.posicion' => 'asc'

                );

            } else{

                $condiciones = array( 

                    'web_mitos.usuario_id !=' => $this->accesoSession->accesoTmpId,

                    'web_mitos.posicion' => 'asc'

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

            $mitos = $this->m_web_mitos->mostrarDatos($condiciones);

            if(!empty($mitos)){

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

                $this->table->set_heading('#', 'TITULO', 'IMAGEN','POSICIÓN','ESTADO', $todosCheckInfo.'<br />'.$todosCheck, 'ACCIÓN');

                $accion = array(

                    'entity' => $this->items['miModulo'],

                    'route' => $this->items['baseUrl'].$this->items['carpetaProyecto'], 

                    'option' => 'observar|editar|denegar|permitir|remover', 

                    'response' => 'respuesta', 

                    'class' => 'procesarInfo'

                );



                $i = 1;

                foreach($mitos AS $items){

                    /* Posición */

                    $posicion = '';

                    $resultado = array();

                    $cantidad = count($this->m_web_mitos->mostrarDatos());

                    for($j=1; $j<=$cantidad; $j++){

                        $resultado[$j] = '['.$j.'] Posición';

                    }

                    $posicion = $this->complementos->generaDesplegable($resultado, 'posicion_'.$items->id, $items->posicion, FALSE, 'none', 'onChange="ordenarItems(\''.$items->id.'\', \'posicion_'.$items->id.'\' , \''.$this->items['miModulo'].'/proceso/posicion'.'\', \'respuesta\')"', 'select');

                    unset($resultado);



                    $ratio = $this->complementos->ratio(90, 45, 160);

                    $imagenValue = ($items->imagen != '') ? $items->imagen : 'empty.png';

                    $imagenMitos = '<img src="'.$this->items['baseUrl'].'crop/'.$ratio['ancho'].'/'.$ratio['alto'].'/mitos-'.$imagenValue.'" />';

                    $checkAccion = '<input type="checkbox" name="checkRemover" id="checkRemover" value="'.$items->id.'" />'; 

                    $checkAccionFinal = ($items->eliminacionLogica == 0) ? $checkAccion : '';

                        $this->table->add_row(

                            $i, 

                            '<span class="text-primary">'.$items->titulo.'</span>', 

                            '<span class="text-primary">'.$imagenMitos.'</span>', 

                            $posicion,

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

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/page/listar_mitos', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_footer', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/footer', $data);

    }



    public function agregar(){

        $data['tituloEncabezado'] = $this->items['sisInfoTituloEmpresa'] .' - Agregar Mitos';



        $opciones = array(

            'name' => 'descripcion', 'id' => 'descripcion',

            'value' => '',

            'class' => 'form-normal-width'

        );

        $data['descripcion'] = form_textarea($opciones);



        /*$icono = $this->m_web_icon->mostrarDatos();

        foreach($icono as $items){

            $select[$items->id] = $items->titulo;

        }

        $data['iconoId'] = $this->complementos->generaSelect($select, 'iconoId', '' , 'Seleccione una opción', '', 'select'); 

        unset($select);*/





        $data = array_merge($data, $this->items);

        $data = array_merge($data, $this->verificaAcceso);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/header', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_header', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/page/agregar_mitos', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_footer', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/footer', $data);

    }



    public function editar($id = ''){
        $data['tituloEncabezado'] = $this->items['sisInfoTituloEmpresa'] .' - Editar Mitos';
        sessiones_helper::eliminaSesion('editarMitos');
        if($this->accesoSession->accesoTmpNivel == 500){
            $condiciones = array(
                'web_mitos.id' => $id,
            );
        } else {
            $condiciones = array(
                'web_mitos.id' => $id, 'web_mitos.usuario_id' => $this->accesoSession->accesoTmpId
            );
        }

        $resultado = $this->m_web_mitos->mostrarDatos($condiciones);

        if(!empty($resultado)){
            $mitos = $resultado[0];
            sessiones_helper::creaSesion('editarMitos', $mitos->id);
            $data['mitosId'] = $mitos->id;
            $data['titulo'] = $mitos->titulo;
            $data['subtitulo'] = $mitos->subtitulo;
            $data['icono'] = $mitos->icono;

            $opciones = array(
                'name' => 'descripcion', 'id' => 'descripcion',
                'value' => $mitos->descripcion,
                'class' => 'form-normal-width'
            );
            $data['descripcion'] = form_textarea($opciones);
            $data['imagen'] = $mitos->imagen;

            /*$icono = $this->m_web_icon->mostrarDatos();
            foreach($icono as $items){
                $select[$items->id] = $items->titulo;
            }
            $data['iconoId'] = $this->complementos->generaSelect($select, 'iconoId', $mitos->icono_id , 'Seleccione una opción', '', 'select'); 
            unset($select);*/
            /* ########## */
        } else {
            echo re_direccion($this->items['getUrl'].'principal/panel'); EXIT;
        }

        $data = array_merge($data, $this->items);
        $data = array_merge($data, $this->verificaAcceso);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/page/editar_mitos', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_footer', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/footer', $data);
    }



    public function observar($id = ''){

        $data['tituloEncabezado'] = $this->items['sisInfoTituloEmpresa'] .' - Observar Nutrición';



        $condiciones = array(

            'web_mitos.id' => $id

        );

        $resultado = $this->m_web_mitos->mostrarDatos($condiciones);

        if(!empty($resultado)){

            $mitos = $resultado[0];

            $image = ($mitos->imagen != '') ? $mitos->imagen : 'empty.png';

            $image_home = ($mitos->imagen_home != '') ? $mitos->imagen_home : 'empty.png';
            $data['observar_id'] = $mitos->id;
            $data['observar_titulo'] = $mitos->titulo;
            $data['observar_subtitulo'] = $mitos->subtitulo;
            $data['observar_icono'] = $mitos->icono;
            $data['observar_descripcion'] = $mitos->descripcion;
            $data['observar_url'] = $mitos->slug;
            $data['observar_posicion'] = 'N°'.$mitos->posicion;
            $data['observar_imagen'] = base_url().'crop/300/150/mitos-'.$image;
            $data['observar_imagen_home'] = base_url().'crop/300/150/mitos-'.$image_home;
            $data['fechaRegistro'] = ($mitos->fechaRegistro >= 1104537600) ? $this->complementos->obtenerFecha($mitos->fechaRegistro,7) : '---';
            $data['fechaModificacion'] = ($mitos->fechaModificacion >= 1104537600) ? $this->complementos->obtenerFecha($mitos->fechaModificacion,7) : '---';
        }

        

        $data = array_merge($data, $this->items);

        $data = array_merge($data, $this->verificaAcceso);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/header', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_header', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/page/observar_mitos', $data);

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

                    $imagenMitos = $this->complementos->obtenerArchivo('imagenMitos', 'unico');

                    $icono = $this->input->post('icono');



                    $error = '';

                    $error .= valida_campo($titulo, 'not_empty|minlength:3|maxlength:150', 'Título');

                    $error .= valida_campo($subtitulo, 'maxlength:100', 'Subtitulo');

                    $error .= valida_campo($icono, 'not_empty', 'Icono');

                    $error .= valida_campo($descripcion, 'not_empty|maxlength:9500', 'Descripción'); 

                    



                    if(!empty($imagenMitos)){

                        $error .= valida_imagen($imagenMitos, 'maxwidth:1900|maxheight:900:|maxsize:2', 'Imagen');

                    }



                    if($error != ''){ 

                        $message = sprintf(error_helper::msg()->msg201,$error);

                        echo alerta_error($message);EXIT; 

                    }



                    if(!empty($imagenMitos)){

                        $opciones = array(

                            'marcaTipo' => FALSE,

                            'marcaInfo' => FALSE,

                            'ajuste' => 'w',

                            'ajusteImagen' => 1600,

                            'desenfocado' => FALSE,

                            'cantidadCopia' => array()

                        );

                        $obtieneImagen = $this->complementos->almacenarImagen($imagenMitos, 'public/imagen/mitos', $opciones, TRUE);

                    } else {

                        $obtieneImagen = '';

                    }



                    $cantidad = $this->m_web_mitos->mostrarDatos();

                    $columnaDatos = array(

                        'titulo' => $titulo,

                        'subtitulo' => $subtitulo,

                        'slug' => $this->complementos->parseoUrl($titulo),

                        'descripcion' => $descripcion,

                        'icono' => $icono,

                        'imagen' => $obtieneImagen,

                        'posicion' => (!empty($cantidad)) ? count($cantidad) + 1 : 1,

                        'fecha_registro' => time(),

                        'usuario_id' => $this->accesoSession->accesoTmpId,

                        'eliminacion_logica' => 1

                    );

                    $resultado = $this->m_web_mitos->insertar($columnaDatos);

                    if(!empty($resultado)){

                        $message = sprintf(error_helper::msg()->msg502,$titulo);

                        $redUrl = $this->items['getUrl'].'mitos/listar';

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

                    $mitosId = sessiones_helper::obtieneSesion('editarMitos');

                    $titulo = $this->input->post('titulo');

                    $subtitulo = $this->input->post('subtitulo');

                    $descripcion = $this->input->post('descripcion');

                    $imagenMitos = $this->complementos->obtenerArchivo('imagenMitos', 'unico');

                    $icono = $this->input->post('icono');

                    $error = '';
                    $error .= valida_campo($mitosId, 'not_empty|alnum|minlength:1|maxlength:11', 'Id Mitos');
                    $error .= valida_campo($titulo, 'not_empty|minlength:3|maxlength:150', 'Título');
                    $error .= valida_campo($subtitulo, 'maxlength:100', 'Subtitulo');
                    $error .= valida_campo($icono, 'not_empty', 'Icono');
                    $error .= valida_campo($descripcion, 'not_empty|maxlength:9500', 'Descripción'); 



                    if(!empty($imagenMitos)){
                        $error .= valida_imagen($imagenMitos, 'maxwidth:1900|maxheight:900:|maxsize:2', 'Imagen');

                    }



                    if($error != ''){ 
                        $message = sprintf(error_helper::msg()->msg201,$error);
                        echo alerta_error($message);EXIT; 
                    }


                    $condiciones = array( 'web_mitos.id' => $mitosId );
                    $resultadomitos = $this->m_web_mitos->mostrarDatos($condiciones);



                    if(!empty($imagenMitos)){

                        $opciones = array(

                            'marcaTipo' => FALSE,

                            'marcaInfo' => FALSE,

                            'ajuste' => 'w',

                            'ajusteImagen' => 1200,

                            'desenfocado' => FALSE,

                            'cantidadCopia' => array()

                        );

                        $obtieneImagen = $this->complementos->almacenarImagen($imagenMitos, 'public/imagen/mitos', $opciones, TRUE);

                    } else {

                        $obtieneImagen = $resultadomitos[0]->imagen;

                    }



                    $columnaDatos = array(

                        'titulo' => $titulo,

                        'subtitulo' => $subtitulo,

                        'slug' => url_seo($titulo),

                        'descripcion' => $descripcion,

                        'icono' => $icono,

                        'imagen' => $obtieneImagen,

                        'fecha_modificacion' => time(),

                    );

                    $resultado = $this->m_web_mitos->actualizar($columnaDatos, array( 'web_mitos.id' => $mitosId ));

                    if(!empty($resultado)){

                        sessiones_helper::eliminaSesion('editarMitos');

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

                if($this->m_web_mitos->existe($id)){

                    $condiciones = array(

                        'web_mitos.eliminacion_logica' => 0,

                        'web_mitos.id' => $id

                    );

                    $resultadoTabla = $this->m_web_mitos->mostrarDatos($condiciones);

                    if(!empty($resultadoTabla)){

                        $this->m_web_mitos->permitirInfo($resultadoTabla[0]->id);

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

                if($this->m_web_mitos->existe($id)){

                    $condiciones = array(

                        'web_mitos.eliminacion_logica' => 1,

                        'web_mitos.id' => $id

                    );

                    $resultadoTabla = $this->m_web_mitos->mostrarDatos($condiciones);

                    if(!empty($resultadoTabla)){

                        $this->m_web_mitos->denegarInfo($resultadoTabla[0]->id);

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

                    if($this->m_web_mitos->existe($id)){

                        $condiciones = array(

                            'web_mitos.eliminacion_logica' => 0,

                            'web_mitos.id' => $id

                        );

                        $resultadoTabla = $this->m_web_mitos->mostrarDatos($condiciones);

                        if(!empty($resultadoTabla)){

                            $resultado = $this->m_web_mitos->eliminar( array( 'web_mitos.id' => $resultadoTabla[0]->id ) );

                            if($resultado){

                                $this->m_web_mitos->ordenarPosicionItems(array());

                                $this->complementos->eliminarArchivo($resultadoTabla[0]->imagen, 'public/imagen/mitos');

                                $this->complementos->eliminarArchivo($resultadoTabla[0]->imagen_home, 'public/imagen/mitos');

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

                            if($this->m_web_mitos->existe($items['value'])){

                                $condiciones = array(

                                    'web_mitos.eliminacion_logica' => 0,

                                    'web_mitos.id' => $items['value']

                                );

                                $resultadoTabla = $this->m_web_mitos->mostrarDatos($condiciones);

                                if(!empty($resultadoTabla)){

                                    $resultado = $this->m_web_mitos->eliminar( array( 'web_mitos.id' => $resultadoTabla[0]->id ) );

                                    if($resultado){

                                        $this->complementos->eliminarArchivo($resultadoTabla[0]->imagen, 'public/imagen/mitos');

                                        $this->complementos->eliminarArchivo($resultadoTabla[0]->imagen_home, 'public/imagen/mitos');

                                        $this->m_web_mitos->ordenarPosicionItems(array());

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

                            'web_mitos.eliminacion_logica' => 1,

                            'web_mitos.id' => $webRegistroId

                        );

                    } else {

                        $condiciones = array(

                            'web_mitos.eliminacion_logica' => 1,

                            'web_mitos.id' => $webRegistroId,

                            'web_mitos.usuario_id' => $this->accesoSession->accesoTmpId

                        );

                    }

                    $webRegistro = $this->m_web_mitos->mostrarDatos($condiciones);

                    if (!empty($webRegistro)) {

                        $condiciones = array(

                            'web_mitos.posicion' => 'asc'

                        );

                        $lista = $this->m_web_mitos->mostrarDatos($condiciones);

                        foreach ($lista as $items) {

                            $datos[$items->posicion] = $items->id;

                        }

                        $resultado = $this->complementos->ordenarPosicion($datos, $webRegistro[0]->posicion, $posicionNueva);

                        foreach($resultado as $k => $v){

                            $columnaDatos = array(

                                'web_mitos.posicion' => $k

                            );

                            $this->m_web_mitos->actualizar($columnaDatos, array( 'web_mitos.id' => $v ));

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