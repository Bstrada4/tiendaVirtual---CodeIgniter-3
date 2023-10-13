<?php
@header('X-Frame-Options: SAMEORIGIN');
@header('Referrer-Policy: no-referrer');
@header('X-Powered-By: Apolomultimedia');

class Clasificacion extends CI_Controller {
    private $resultado;
    private $items = array();

    public function __construct() {
        parent::__construct();
        ini_set('memory_limit', '1024M');
        ini_set('max_execution_time', 0);
        ini_set('upload_max_filesize', '200M');

        $librerias = array('dashboard/datos_privados');
        $helper = array();
        $modelos = array('m_web_clasificacion','m_web_recetas');
        $this->load->library($librerias);
        $this->load->helper($helper);
        $this->load->model($modelos);
    
        $this->items['miModulo'] = 'clasificacion';
        $this->items['carpetaProyecto'] = 'dashboard';
        $this->items['baseUrl'] = base_url();
        $this->items['getUrl'] = base_url().$this->items['carpetaProyecto'].'/';
        $this->scriptVista = $this->scripts->scriptVistaGeneral();
        $this->items = array_merge($this->items, $this->scriptVista);
        $this->accesoSession = sessiones_helper::obtieneInfoSesion('sesionUsuario');
        $this->verificaAcceso = $this->datos_privados->verificaAcceso();
        $this->items['receta_active'] = 'mm-active';
        $this->items['clasificacion_active'] = 'mm-active-sub';
    }

    public function listar(){
        $data['tituloEncabezado'] = $this->items['sisInfoTituloEmpresa'] .' - listar Clasificación';
        /* Información */
            if($this->accesoSession->accesoTmpNivel == 500){
                $condiciones = array(
                    'web_clasificacion.posicion' => 'asc'
                );
            } else{
                $condiciones = array( 
                    'web_clasificacion.usuario_id !=' => $this->accesoSession->accesoTmpId,
                    'web_clasificacion.posicion' => 'asc'
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
            $clasificacion = $this->m_web_clasificacion->mostrarDatos($condiciones);
            if(!empty($clasificacion)){
                $this->table->set_template(
                    array(
                        'table_open' => '<table class="table table-hover table-bordered table-striped dt-responsive table-sm dataTable" style="border-collapse: collapse; border-spacing: 0; width: 100%;" id="infoTable">',
                        'heading_cell_start'  => '<th style="vertical-align:middle; text-align:center;">',
                        'thead_open'  => '<thead class="thead-dark">',
                        'cell_start' => '<td style="vertical-align:middle; text-align:center;">',
                        'cell_alt_start' => '<td style="vertical-align:middle; text-align:center;">'
                    )
                );
                $this->table->set_heading('#', 'TITULO','FECHA REGISTRO','POSICIÓN','ESTADO', 'ACCIÓN');
                $accion = array(
                    'entity' => $this->items['miModulo'],
                    'route' => $this->items['baseUrl'].$this->items['carpetaProyecto'], 
                    'option' => 'observar|editar|denegar|permitir|remover', 
                    'response' => 'respuesta', 
                    'class' => 'procesarInfo'
                );

                $i = 1;
                foreach($clasificacion AS $items){
                    /* Posición */
                    $posicion = '';
                    $resultado = array();
                    $cantidad = count($this->m_web_clasificacion->mostrarDatos());
                    for($j=1; $j<=$cantidad; $j++){
                        $resultado[$j] = '['.$j.'] Posición';
                    }
                    $posicion = $this->complementos->generaDesplegable($resultado, 'posicion_'.$items->id, $items->posicion, FALSE, 'none', 'onChange="ordenarItems(\''.$items->id.'\', \'posicion_'.$items->id.'\' , \''.$this->items['miModulo'].'/proceso/posicion'.'\', \'respuesta\')"', 'select');
                    unset($resultado);

                    $fechaRegistro = ($items->fechaRegistro >= 1104537600) ? $this->complementos->obtenerFecha($items->fechaRegistro,7) : '---';


                        $this->table->add_row(
                            $i, 
                            '<span class="text-primary">'.$items->titulo.'</span>', 
                            '<span class="text-primary">'.$fechaRegistro.'</span>', 
                            $posicion,
                            $this->complementos->status_registro($items->eliminacionLogica),
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
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/page/listar_clasificacion', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_footer', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/footer', $data);
    }

    public function agregar(){
        $data['tituloEncabezado'] = $this->items['sisInfoTituloEmpresa'] .' - Agregar Clasificación';

        $data = array_merge($data, $this->items);
        $data = array_merge($data, $this->verificaAcceso);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/page/agregar_clasificacion', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_footer', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/footer', $data);
    }

    public function editar($id = ''){
        $data['tituloEncabezado'] = $this->items['sisInfoTituloEmpresa'] .' - Editar Clasificación';
        sessiones_helper::eliminaSesion('editarClasificacion');
        if($this->accesoSession->accesoTmpNivel == 500){
            $condiciones = array(
                'web_clasificacion.id' => $id,
            );
        } else {
            $condiciones = array(
                'web_clasificacion.id' => $id, 'web_clasificacion.usuario_id' => $this->accesoSession->accesoTmpId
            );
        }
        $resultado = $this->m_web_clasificacion->mostrarDatos($condiciones);
        if(!empty($resultado)){
            $clasificacion = $resultado[0];
            sessiones_helper::creaSesion('editarClasificacion', $clasificacion->id);
            $data['titulo'] = $clasificacion->titulo;
            /* ########## */
        } else {
            echo re_direccion($this->items['getUrl'].'principal/panel'); EXIT;
        }
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $this->verificaAcceso);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/page/editar_clasificacion', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_footer', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/footer', $data);
    }

    public function observar($id = ''){
        $data['tituloEncabezado'] = $this->items['sisInfoTituloEmpresa'] .' - Observar Clasificación';

        $condiciones = array(
            'web_clasificacion.id' => $id
        );
        $resultado = $this->m_web_clasificacion->mostrarDatos($condiciones);
        if(!empty($resultado)){
            $clasificacion = $resultado[0];
            $data['observar_id'] = $clasificacion->id;
            $data['observar_titulo'] = $clasificacion->titulo;
            $data['observar_posicion'] = 'N°'.$clasificacion->posicion;
            $data['fechaRegistro'] = ($clasificacion->fechaRegistro >= 1104537600) ? $this->complementos->obtenerFecha($clasificacion->fechaRegistro,7) : '---';
            $data['fechaModificacion'] = ($clasificacion->fechaModificacion >= 1104537600) ? $this->complementos->obtenerFecha($clasificacion->fechaModificacion,7) : '---';
            $condicion = array(
                'web_recetas.categoria_id' => $clasificacion->id,
                'web_recetas.posicion' => 'asc'
            );
            $recetas_tbl = $this->m_web_recetas->mostrarDatos($condicion);
            if(!empty($recetas_tbl)){
                $i = 1;

                $accion = array(
                    'entity' => 'recetas',
                    'route' => $this->items['baseUrl'].$this->items['carpetaProyecto'], 
                    'option' => 'editar|remover', 
                    'response' => 'respuesta', 
                    'class' => 'procesarInfo'
                );

                foreach ($recetas_tbl as $items) {

                    /* Posición */
                    $posicion = '';
                    $resultado = array();
                    $cantidad = count($recetas_tbl);
                    for($j=1; $j<=$cantidad; $j++){
                        $resultado[$j] = '['.$j.'] Posición';
                    }
                    $posicion = $this->complementos->generaDesplegable($resultado, 'posicion_'.$items->id, $items->posicion, FALSE, 'none', 'onChange="ordenarSubitems(\''.$items->id.'\', \'posicion_'.$items->id.'\' , \''.$this->items['miModulo'].'/proceso/sub_posicion'.'\', \'respuesta\',\''.$items->categoriaId.'\')" style="height: 24px;"', 'simple');
                    unset($resultado);
                    

                    $listaRecetas[] = array(
                        'id' => $items->id,
                        'titulo' => $items->titulo,
                        'posicion' => $posicion,
                        'estado' => $this->complementos->status_registro($items->eliminacionLogica),
                        'accion' => $this->datos_privados->formAccion($accion, $items->id,$items->eliminacionLogica)
                    );
                }
                $data['listaRecetas'] = $listaRecetas;
            }
        }
        
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $this->verificaAcceso);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/page/observar_clasificacion', $data);
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
                    $titulo = $this->complementos->xxsclean($this->input->post('titulo',TRUE));
        
                    $error = '';
                    $error .= valida_campo($titulo, 'not_empty|minlength:3|maxlength:150', 'Título');   
                    if($error != ''){ 
                        $message = sprintf(error_helper::msg()->msg201,$error);
                        echo alerta_error($message);EXIT; 
                    }

                    
                    $cantidad = $this->m_web_clasificacion->mostrarDatos();
                    $columnaDatos = array(
                        'titulo' => $titulo,
                        'slug' => url_seo($titulo),                        
                        'posicion' => (!empty($cantidad)) ? count($cantidad) + 1 : 1,
                        'fecha_registro' => time(),
                        'usuario_id' => $this->accesoSession->accesoTmpId,
                        'eliminacion_logica' => 1
                    );
                    $resultado = $this->m_web_clasificacion->insertar($columnaDatos);
                    if(!empty($resultado)){
                        $message = sprintf(error_helper::msg()->msg502,$titulo);
                        $redUrl = $this->items['getUrl'].'clasificacion/listar';
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
                    $clasificacionId = sessiones_helper::obtieneSesion('editarClasificacion');
                    $titulo = $this->complementos->xxsclean($this->input->post('titulo',TRUE));
                    

                    $error = '';
                    $error .= valida_campo($clasificacionId, 'not_empty|alnum|minlength:1|maxlength:11', 'Id Clasificación');
                    $error .= valida_campo($titulo, 'not_empty|minlength:3|maxlength:150', 'Título');

                    if($error != ''){ 
                        $message = sprintf(error_helper::msg()->msg201,$error);
                        echo alerta_error($message);EXIT; 
                    }

                    $condiciones = array( 'web_clasificacion.id' => $clasificacionId );
                    $resultadoSlider = $this->m_web_clasificacion->mostrarDatos($condiciones);

                    $columnaDatos = array(
                        'titulo' => $titulo,
                        'slug' => url_seo($titulo),
                        'fecha_modificacion' => time(),
                    );
                    $resultado = $this->m_web_clasificacion->actualizar($columnaDatos, array( 'web_clasificacion.id' => $clasificacionId ));
                    if(!empty($resultado)){
                        sessiones_helper::eliminaSesion('editarClasificacion');
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
                if($this->m_web_clasificacion->existe($id)){
                    $condiciones = array(
                        'web_clasificacion.eliminacion_logica' => 0,
                        'web_clasificacion.id' => $id
                    );
                    $resultadoTabla = $this->m_web_clasificacion->mostrarDatos($condiciones);
                    if(!empty($resultadoTabla)){
                        $this->m_web_clasificacion->permitirInfo($resultadoTabla[0]->id);
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
                if($this->m_web_clasificacion->existe($id)){
                    $condiciones = array(
                        'web_clasificacion.eliminacion_logica' => 1,
                        'web_clasificacion.id' => $id
                    );
                    $resultadoTabla = $this->m_web_clasificacion->mostrarDatos($condiciones);
                    if(!empty($resultadoTabla)){
                        $this->m_web_clasificacion->denegarInfo($resultadoTabla[0]->id);
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
                    if($this->m_web_clasificacion->existe($id)){
                        $condiciones = array(
                            'web_clasificacion.eliminacion_logica' => 0,
                            'web_clasificacion.id' => $id
                        );
                        $resultadoTabla = $this->m_web_clasificacion->mostrarDatos($condiciones);
                        if(!empty($resultadoTabla)){
                            $resultado = $this->m_web_clasificacion->eliminar( array( 'web_clasificacion.id' => $resultadoTabla[0]->id ) );
                            if($resultado){
                                $this->m_web_clasificacion->ordenarPosicionItems(array(),$resultadoTabla[0]->categoriaId);
                                $this->complementos->eliminarArchivo($resultadoTabla[0]->imagen, 'public/imagen/slider');
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
                            'web_clasificacion.eliminacion_logica' => 1,
                            'web_clasificacion.id' => $webRegistroId
                        );
                    } else {
                        $condiciones = array(
                            'web_clasificacion.eliminacion_logica' => 1,
                            'web_clasificacion.id' => $webRegistroId,
                            'web_clasificacion.usuario_id' => $this->accesoSession->accesoTmpId
                        );
                    }
                    $webRegistro = $this->m_web_clasificacion->mostrarDatos($condiciones);
                    if (!empty($webRegistro)) {
                        $condiciones = array(
                            'web_clasificacion.posicion' => 'asc'
                        );
                        $lista = $this->m_web_clasificacion->mostrarDatos($condiciones);
                        foreach ($lista as $items) {
                            $datos[$items->posicion] = $items->id;
                        }
                        $resultado = $this->complementos->ordenarPosicion($datos, $webRegistro[0]->posicion, $posicionNueva);
                        foreach($resultado as $k => $v){
                            $columnaDatos = array(
                                'web_clasificacion.posicion' => $k
                            );
                            $this->m_web_clasificacion->actualizar($columnaDatos, array( 'web_clasificacion.id' => $v ));
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
            case 'sub_posicion':
                if(!$this->datos_privados->seguridadAccionModulo($this->accesoSession->accesoTmpNivel, $this->items['miModulo'], 'editar')){
                    $message = sprintf(error_helper::msg()->msg6);
                    echo alerta_error($message);EXIT; 
                }
                
                $msjError = TRUE;
                $webRegistroId = $this->input->post('id');
                $posicionNueva = $this->input->post('posicionNueva');
                $categoriaId = $this->input->post('categoria');
               

                    $condiciones = array(
                        'web_recetas.categoria_id' => $categoriaId,
                        'web_recetas.id' => $webRegistroId
                    );

                    $webRegistro = $this->m_web_recetas->mostrarDatos($condiciones);
                    if (!empty($webRegistro)) {
                        $condiciones = array(
                            'web_recetas.posicion' => 'asc',
                            'web_recetas.categoria_id' => $categoriaId,
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
                        $message = sprintf(error_helper::msg()->msg201, 'Se cambió de posición exitosamente.');
                        echo alerta_exito($message,2);EXIT; 
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