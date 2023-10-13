<?php

@header('X-Frame-Options: SAMEORIGIN');

@header('Referrer-Policy: no-referrer');

@header('X-Powered-By: Apolomultimedia');



class Categoria extends CI_Controller {

    private $resultado;

    private $items = array();



    public function __construct() {

        parent::__construct();

        ini_set('memory_limit', '1024M');

        ini_set('max_execution_time', 0);

        ini_set('upload_max_filesize', '200M');



        $librerias = array('dashboard/datos_privados');

        $helper = array();

        $modelos = array('m_web_categoria','m_web_productos');

        $this->load->library($librerias);

        $this->load->helper($helper);

        $this->load->model($modelos);

    

        $this->items['miModulo'] = 'categoria';

        $this->items['carpetaProyecto'] = 'dashboard';

        $this->items['baseUrl'] = base_url();

        $this->items['getUrl'] = base_url().$this->items['carpetaProyecto'].'/';

        $this->scriptVista = $this->scripts->scriptVistaGeneral();

        $this->items = array_merge($this->items, $this->scriptVista);

        $this->accesoSession = sessiones_helper::obtieneInfoSesion('sesionUsuario');

        $this->verificaAcceso = $this->datos_privados->verificaAcceso();

        $this->items['producto_active'] = 'mm-active';

        $this->items['categoria_active'] = 'mm-active-sub';

    }



    public function listar(){

        $data['tituloEncabezado'] = $this->items['sisInfoTituloEmpresa'] .' - listar Categoría';

        /* Información */

            if($this->accesoSession->accesoTmpNivel == 500){

                $condiciones = array(

                    'web_categoria.posicion' => 'asc'

                );

            } else{

                $condiciones = array( 

                    'web_categoria.usuario_id !=' => $this->accesoSession->accesoTmpId,

                    'web_categoria.posicion' => 'asc'

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

            $categoria = $this->m_web_categoria->mostrarDatos($condiciones);

            if(!empty($categoria)){

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

                    'option' => 'observar|editar|denegar|permitir', 

                    'response' => 'respuesta', 

                    'class' => 'procesarInfo'

                );



                $i = 1;

                foreach($categoria AS $items){

                    /* Posición */

                    $posicion = '';

                    $resultado = array();

                    $cantidad = count($this->m_web_categoria->mostrarDatos());

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

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/page/listar_categoria', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_footer', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/footer', $data);

    }



    public function agregar(){

        $data['tituloEncabezado'] = $this->items['sisInfoTituloEmpresa'] .' - Agregar Categoría';



        $data = array_merge($data, $this->items);

        $data = array_merge($data, $this->verificaAcceso);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/header', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_header', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/page/agregar_categoria', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_footer', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/footer', $data);

    }



    public function editar($id = ''){

        $data['tituloEncabezado'] = $this->items['sisInfoTituloEmpresa'] .' - Editar Categoría';

        sessiones_helper::eliminaSesion('editarCategoria');

        if($this->accesoSession->accesoTmpNivel == 500){

            $condiciones = array(

                'web_categoria.id' => $id,

            );

        } else {

            $condiciones = array(

                'web_categoria.id' => $id, 'web_categoria.usuario_id' => $this->accesoSession->accesoTmpId

            );

        }

        $resultado = $this->m_web_categoria->mostrarDatos($condiciones);

        if(!empty($resultado)){

            $clasificacion = $resultado[0];

            sessiones_helper::creaSesion('editarCategoria', $clasificacion->id);

            $data['titulo'] = $clasificacion->titulo;

            $data['subtitulo'] = $clasificacion->subtitulo;

            /* ########## */

        } else {

            echo re_direccion($this->items['getUrl'].'principal/panel'); EXIT;

        }

        $data = array_merge($data, $this->items);

        $data = array_merge($data, $this->verificaAcceso);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/header', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_header', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/page/editar_categoria', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_footer', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/footer', $data);

    }



    public function observar($id = ''){

        $data['tituloEncabezado'] = $this->items['sisInfoTituloEmpresa'] .' - Observar Categoría';



        $condiciones = array(

            'web_categoria.id' => $id

        );

        $resultado = $this->m_web_categoria->mostrarDatos($condiciones);

        if(!empty($resultado)){

            $clasificacion = $resultado[0];

            $image = ($clasificacion->imagen != '') ? $clasificacion->imagen : 'empty.png';

            $data['observar_id'] = $clasificacion->id;

            $data['observar_titulo'] = $clasificacion->titulo;

            $data['observar_subtitulo'] = $clasificacion->subtitulo;

            $data['observar_posicion'] = 'N°'.$clasificacion->posicion;

            $data['observar_imagen'] = base_url().'crop/300/150/categoria-'.$image;

            $data['fechaRegistro'] = ($clasificacion->fechaRegistro >= 1104537600) ? $this->complementos->obtenerFecha($clasificacion->fechaRegistro,7) : '---';

            $data['fechaModificacion'] = ($clasificacion->fechaModificacion >= 1104537600) ? $this->complementos->obtenerFecha($clasificacion->fechaModificacion,7) : '---';

            $condicion = array(

                'web_productos.categoria_id' => $clasificacion->id,

                'web_productos.posicion' => 'asc'

            );

            $producto_tbl = $this->m_web_productos->mostrarDatos($condicion);

            if(!empty($producto_tbl)){

                $i = 1;



                $accion = array(

                    'entity' => 'recetas',

                    'route' => $this->items['baseUrl'].$this->items['carpetaProyecto'], 

                    'option' => 'editar', 

                    'response' => 'respuesta', 

                    'class' => 'procesarInfo'

                );



                foreach ($producto_tbl as $items) {



                    /* Posición */

                    $posicion = '';

                    $resultado = array();

                    $cantidad = count($producto_tbl);

                    for($j=1; $j<=$cantidad; $j++){

                        $resultado[$j] = '['.$j.'] Posición';

                    }

                    $posicion = $this->complementos->generaDesplegable($resultado, 'posicion_'.$items->id, $items->posicion, FALSE, 'none', 'onChange="ordenarSubitems(\''.$items->id.'\', \'posicion_'.$items->id.'\' , \''.$this->items['miModulo'].'/proceso/sub_posicion'.'\', \'respuesta\',\''.$items->categoria_id.'\')" style="height: 24px;"', 'simple');

                    unset($resultado);

                    



                    $listaProducto[] = array(

                        'id' => $items->id,

                        'titulo' => $items->titulo,

                        'posicion' => $posicion,

                        'estado' => $this->complementos->status_registro($items->eliminacionLogica),

                        'accion' => $this->datos_privados->formAccion($accion, $items->id,$items->eliminacionLogica)

                    );

                }

                $data['listaProducto'] = $listaProducto;

            }

        }

        

        $data = array_merge($data, $this->items);

        $data = array_merge($data, $this->verificaAcceso);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/header', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_header', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/page/observar_categoria', $data);

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
                    $imagenCategoria = $this->complementos->obtenerArchivo('imagenCategoria', 'unico');

                    $error = '';
                    $error .= valida_campo($titulo, 'not_empty|minlength:3|maxlength:50', 'Título');  
                    $error .= valida_campo($subtitulo, 'maxlength:90', 'Subtítulo');

                    if(!empty($imagenCategoria)){

                        $error .= valida_imagen($imagenCategoria, 'maxwidth:1000|maxheight:900:|maxsize:2', 'Imagen');

                    }



                    if($error != ''){ 

                        $message = sprintf(error_helper::msg()->msg201,$error);

                        echo alerta_error($message);EXIT; 

                    }



                    if(!empty($imagenCategoria)){

                        $opciones = array(

                            'marcaTipo' => FALSE,

                            'marcaInfo' => FALSE,

                            'ajuste' => 'w',

                            'ajusteImagen' => 600,

                            'desenfocado' => FALSE,

                            'cantidadCopia' => array()

                        );

                        $obtieneImagen = $this->complementos->almacenarImagen($imagenCategoria, 'public/imagen/categoria', $opciones, TRUE);

                    } else {

                        $obtieneImagen = '';

                    }



                    

                    $cantidad = $this->m_web_categoria->mostrarDatos();

                    $columnaDatos = array(

                        'titulo' => $titulo,

                        'subtitulo' => $subtitulo,

                        'imagen' => $obtieneImagen,

                        'slug' => url_seo($titulo),                        

                        'posicion' => (!empty($cantidad)) ? count($cantidad) + 1 : 1,

                        'fecha_registro' => time(),

                        'usuario_id' => $this->accesoSession->accesoTmpId,

                        'eliminacion_logica' => 1

                    );

                    $resultado = $this->m_web_categoria->insertar($columnaDatos);

                    if(!empty($resultado)){

                        $message = sprintf(error_helper::msg()->msg502,$titulo);

                        $redUrl = $this->items['getUrl'].'categoria/listar';

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

                    $clasificacionId = sessiones_helper::obtieneSesion('editarCategoria');

                    $titulo = $this->input->post('titulo');

                    $subtitulo = $this->input->post('subtitulo');

                    $imagenCategoria = $this->complementos->obtenerArchivo('imagenCategoria', 'unico');



                    $error = '';

                    $error .= valida_campo($clasificacionId, 'not_empty|alnum|minlength:1|maxlength:11', 'Id Categoria');

                    $error .= valida_campo($titulo, 'not_empty|minlength:3|maxlength:50', 'Título');  

                    $error .= valida_campo($subtitulo, 'maxlength:90', 'Subtítulo');



                     if(!empty($imagenCategoria)){

                        $error .= valida_imagen($imagenCategoria, 'maxwidth:1000|maxheight:900:|maxsize:2', 'Imagen');

                    }



                    if($error != ''){ 

                        $message = sprintf(error_helper::msg()->msg201,$error);

                        echo alerta_error($message);EXIT; 

                    }

                    



                    $condiciones = array( 'web_categoria.id' => $clasificacionId );

                    $resultadoCategoria = $this->m_web_categoria->mostrarDatos($condiciones);



                    if(!empty($imagenCategoria)){

                        $opciones = array(

                            'marcaTipo' => FALSE,

                            'marcaInfo' => FALSE,

                            'ajuste' => 'w',

                            'ajusteImagen' => 600,

                            'desenfocado' => FALSE,

                            'cantidadCopia' => array()

                        );

                        $obtieneImagen = $this->complementos->almacenarImagen($imagenCategoria, 'public/imagen/categoria', $opciones, TRUE);

                    } else {

                        $obtieneImagen = $resultadoCategoria[0]->imagen;

                    }



                    $columnaDatos = array(

                        'titulo' => $titulo,

                        'subtitulo' => $subtitulo,

                        'imagen' => $obtieneImagen,

                        'slug' => url_seo($titulo),

                        'fecha_modificacion' => time(),

                    );

                    $resultado = $this->m_web_categoria->actualizar($columnaDatos, array( 'web_categoria.id' => $clasificacionId ));

                    if(!empty($resultado)){

                        sessiones_helper::eliminaSesion('editarCategoria');

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

                if($this->m_web_categoria->existe($id)){

                    $condiciones = array(

                        'web_categoria.eliminacion_logica' => 0,

                        'web_categoria.id' => $id

                    );

                    $resultadoTabla = $this->m_web_categoria->mostrarDatos($condiciones);

                    if(!empty($resultadoTabla)){

                        $this->m_web_categoria->permitirInfo($resultadoTabla[0]->id);

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

                if($this->m_web_categoria->existe($id)){

                    $condiciones = array(

                        'web_categoria.eliminacion_logica' => 1,

                        'web_categoria.id' => $id

                    );

                    $resultadoTabla = $this->m_web_categoria->mostrarDatos($condiciones);

                    if(!empty($resultadoTabla)){

                        $this->m_web_categoria->denegarInfo($resultadoTabla[0]->id);

                        $message = sprintf(error_helper::msg()->msg201, 'Se desactivó el item exitosamente.');

                        echo alerta_exito($message,2);EXIT;

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

                            'web_categoria.eliminacion_logica' => 1,

                            'web_categoria.id' => $webRegistroId

                        );

                    } else {

                        $condiciones = array(

                            'web_categoria.eliminacion_logica' => 1,

                            'web_categoria.id' => $webRegistroId,

                            'web_categoria.usuario_id' => $this->accesoSession->accesoTmpId

                        );

                    }

                    $webRegistro = $this->m_web_categoria->mostrarDatos($condiciones);

                    if (!empty($webRegistro)) {

                        $condiciones = array(

                            'web_categoria.posicion' => 'asc'

                        );

                        $lista = $this->m_web_categoria->mostrarDatos($condiciones);

                        foreach ($lista as $items) {

                            $datos[$items->posicion] = $items->id;

                        }

                        $resultado = $this->complementos->ordenarPosicion($datos, $webRegistro[0]->posicion, $posicionNueva);

                        foreach($resultado as $k => $v){

                            $columnaDatos = array(

                                'web_categoria.posicion' => $k

                            );

                            $this->m_web_categoria->actualizar($columnaDatos, array( 'web_categoria.id' => $v ));

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

                        'web_productos.categoria_id' => $categoriaId,

                        'web_productos.id' => $webRegistroId

                    );



                    $webRegistro = $this->m_web_productos->mostrarDatos($condiciones);

                    if (!empty($webRegistro)) {

                        $condiciones = array(

                            'web_productos.posicion' => 'asc',

                            'web_productos.categoria_id' => $categoriaId,

                        );

                        $lista = $this->m_web_productos->mostrarDatos($condiciones);

                        foreach ($lista as $items) {

                            $datos[$items->posicion] = $items->id;

                        }

                        $resultado = $this->complementos->ordenarPosicion($datos, $webRegistro[0]->posicion, $posicionNueva);

                        foreach($resultado as $k => $v){

                            $columnaDatos = array(

                                'web_productos.posicion' => $k

                            );

                            $this->m_web_productos->actualizar($columnaDatos, array( 'web_productos.id' => $v ));

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