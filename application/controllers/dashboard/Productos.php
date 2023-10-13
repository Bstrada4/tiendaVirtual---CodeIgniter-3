<?php

@header('X-Frame-Options: SAMEORIGIN');

@header('Referrer-Policy: no-referrer');

@header('X-Powered-By: Apolomultimedia');



class Productos extends CI_Controller {

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

    

        $this->items['miModulo'] = 'productos';

        $this->items['carpetaProyecto'] = 'dashboard';

        $this->items['baseUrl'] = base_url();

        $this->items['getUrl'] = base_url().$this->items['carpetaProyecto'].'/';

        $this->scriptVista = $this->scripts->scriptVistaGeneral();

        $this->items = array_merge($this->items, $this->scriptVista);

        $this->accesoSession = sessiones_helper::obtieneInfoSesion('sesionUsuario');

        $this->verificaAcceso = $this->datos_privados->verificaAcceso();

        $this->items['producto_active'] = 'mm-active';

        $this->items['productos_active'] = 'mm-active-sub';

    }



    public function listar(){

        $data['tituloEncabezado'] = $this->items['sisInfoTituloEmpresa'] .' - listar Productos';

        /* Información */

            if($this->accesoSession->accesoTmpNivel == 500){

                $condiciones = array(

                    'web_productos.posicion' => 'asc'

                );

            } else{

                $condiciones = array( 

                    'web_productos.usuario_id !=' => $this->accesoSession->accesoTmpId,

                    'web_productos.posicion' => 'asc'

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

            $productos = $this->m_web_productos->mostrarDatos($condiciones);

            if(!empty($productos)){

                $this->table->set_template(

                    array(

                        'table_open' => '<table class="table table-hover table-bordered table-striped dt-responsive table-sm dataTable" style="border-collapse: collapse; border-spacing: 0; width: 100%;" id="infoTable">',

                        'heading_cell_start'  => '<th style="vertical-align:middle; text-align:center;">',

                        'thead_open'  => '<thead class="thead-dark">',

                        'cell_start' => '<td style="vertical-align:middle; text-align:center;">',

                        'cell_alt_start' => '<td style="vertical-align:middle; text-align:center;">'

                    )

                );

                $this->table->set_heading('#', 'TITULO','PRECIO','FECHA REGISTRO','ESTADO', 'ACCIÓN');

                $accion = array(

                    'entity' => $this->items['miModulo'],

                    'route' => $this->items['baseUrl'].$this->items['carpetaProyecto'], 

                    'option' => 'observar|editar|denegar|permitir|remover', 

                    'response' => 'respuesta', 

                    'class' => 'procesarInfo'

                );



                $i = 1;

                foreach($productos AS $items){



                    $fechaRegistro = ($items->fechaRegistro >= 1104537600) ? $this->complementos->obtenerFecha($items->fechaRegistro,7) : '---';





                        $this->table->add_row(

                            $i, 

                            '<span class="text-primary">'.$items->titulo.'</span>', 

                             '<span class="text-primary">S/'.$items->precio.'</span>', 

                            '<span class="text-primary">'.$fechaRegistro.'</span>', 

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

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/page/listar_productos', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_footer', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/footer', $data);

    }



    public function agregar(){

        $data['tituloEncabezado'] = $this->items['sisInfoTituloEmpresa'] .' - Agregar Producto';



        $opciones = array(

            'name' => 'descripcion', 'id' => 'descripcion',

            'value' => '',

            'class' => 'form-normal-width'

        );

        $data['descripcion'] = form_textarea($opciones);





        $categoria = $this->m_web_categoria->mostrarDatos();

        foreach($categoria as $items){

            $select[$items->id] = $items->titulo;

        }

        $data['categoriaId'] = $this->complementos->generaSelect($select, 'categoriaId', '' , 'Seleccione una opción', '', 'select'); 

        unset($select);



        $data = array_merge($data, $this->items);

        $data = array_merge($data, $this->verificaAcceso);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/header', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_header', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/page/agregar_producto', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_footer', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/footer', $data);

    }



    public function editar($id = ''){

        $data['tituloEncabezado'] = $this->items['sisInfoTituloEmpresa'] .' - Editar Producto';

        sessiones_helper::eliminaSesion('editarProductos');

        if($this->accesoSession->accesoTmpNivel == 500){

            $condiciones = array(

                'web_productos.id' => $id,

            );

        } else {

            $condiciones = array(

                'web_productos.id' => $id, 'web_productos_.usuario_id' => $this->accesoSession->accesoTmpId

            );

        }

        $resultado = $this->m_web_productos->mostrarDatos($condiciones);

        if(!empty($resultado)){

            $producto = $resultado[0];

            sessiones_helper::creaSesion('editarProductos', $producto->id);

            $data['mitosId'] = $producto->id;

            $data['titulo'] = $producto->titulo;

            $data['subtitulo'] = $producto->subtitulo;

            $data['precio'] = $producto->precio;

            

            $opciones = array(

                'name' => 'descripcion', 'id' => 'descripcion',

                'value' => $producto->descripcion,

                'class' => 'form-normal-width'

            );

            $data['descripcion'] = form_textarea($opciones);

            $data['imagen'] = $producto->imagen;



            $categoria = $this->m_web_categoria->mostrarDatos();

            foreach($categoria as $items){

                $select[$items->id] = $items->titulo;

            }

            $data['categoriaId'] = $this->complementos->generaSelect($select, 'categoriaId', $producto->categoria_id , 'Seleccione una opción', '', 'select'); 

            unset($select);

            /* ########## */

        } else {

            echo re_direccion($this->items['getUrl'].'principal/panel'); EXIT;

        }

        $data = array_merge($data, $this->items);

        $data = array_merge($data, $this->verificaAcceso);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/header', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_header', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/page/editar_producto', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_footer', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/footer', $data);

    }



    public function observar($id = ''){

        $data['tituloEncabezado'] = $this->items['sisInfoTituloEmpresa'] .' - Observar Producto';



        $condiciones = array(

            'web_productos.id' => $id

        );

        $resultado = $this->m_web_productos->mostrarDatos($condiciones);

        if(!empty($resultado)){

            $producto = $resultado[0];

            $image = ($producto->imagen != '') ? $producto->imagen : 'empty.png';

            $data['observar_id'] = $producto->id;

            $data['observar_titulo'] = $producto->titulo;

            $data['observar_subtitulo'] = $producto->subtitulo;

            $data['observar_descripcion'] = $producto->descripcion;

            $data['observar_url'] = $producto->slug;

            $data['observar_posicion'] = 'N°'.$producto->posicion;

            $data['observar_imagen'] = base_url().'crop/300/150/productos-'.$image;

            $data['fechaRegistro'] = ($producto->fechaRegistro >= 1104537600) ? $this->complementos->obtenerFecha($producto->fechaRegistro,7) : '---';

            $data['fechaModificacion'] = ($producto->fechaModificacion >= 1104537600) ? $this->complementos->obtenerFecha($producto->fechaModificacion,7) : '---';



            $condicion = array(

                'web_categoria.id' => $producto->categoria_id

            );

            $categoria = $this->m_web_categoria->mostrarDatos($condicion);

            $categoriaName = ($categoria[0]->titulo != '') ? $categoria[0]->titulo : '';

            $data['observar_categoria'] = $categoriaName;

        }

        

        $data = array_merge($data, $this->items);

        $data = array_merge($data, $this->verificaAcceso);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/header', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_header', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/page/observar_producto', $data);

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

                    $precio = $this->input->post('precio');

                    $descripcion = $this->input->post('descripcion');

                    $imagenProducto = $this->complementos->obtenerArchivo('imagenProducto', 'unico');

                    $categoriaId = $this->complementos->addSlashtag($this->input->post('categoriaId',TRUE));



                    $error = '';

                    $error .= valida_campo($titulo, 'not_empty|minlength:3|maxlength:100', 'Título');

                    $error .= valida_campo($subtitulo, 'maxlength:120', 'Subtítulo');

                    $error .= valida_campo($precio, 'maxlength:10', 'Precio');

                    $error .= valida_campo($categoriaId, 'not_empty', 'Categoría'); 

                    $error .= valida_campo($descripcion, 'maxlength:2500', 'Descripción');    

                    if(!empty($imagenProducto)){

                        $error .= valida_imagen($imagenProducto, 'maxwidth:1000|maxheight:900:|maxsize:2', 'Imagen');

                    }



                    if($error != ''){ 

                        $message = sprintf(error_helper::msg()->msg201,$error);

                        echo alerta_error($message);EXIT; 

                    }



                    if(!empty($imagenProducto)){

                        $opciones = array(

                            'marcaTipo' => FALSE,

                            'marcaInfo' => FALSE,

                            'ajuste' => 'w',

                            'ajusteImagen' => 600,

                            'desenfocado' => FALSE,

                            'cantidadCopia' => array()

                        );

                        $obtieneImagen = $this->complementos->almacenarImagen($imagenProducto, 'public/imagen/productos', $opciones, TRUE);

                    } else {

                        $obtieneImagen = '';

                    }

                     $condicion_cantidad = array(

                        'web_productos.categoria_id' => $categoriaId

                    );

                    $cantidad = $this->m_web_productos->mostrarDatos($condicion_cantidad);

                    $columnaDatos = array(

                        'titulo' => $titulo,

                        'subtitulo' => $subtitulo,

                        'slug' =>  url_seo($titulo),

                        'precio' => $precio,

                        'descripcion' => $descripcion,

                        'categoria_id' => $categoriaId,

                        'imagen' => $obtieneImagen,

                        'posicion' => (!empty($cantidad)) ? count($cantidad) + 1 : 1,

                        'fecha_registro' => time(),

                        'usuario_id' => $this->accesoSession->accesoTmpId,

                        'eliminacion_logica' => 1

                    );

                    $resultado = $this->m_web_productos->insertar($columnaDatos);

                    if(!empty($resultado)){

                        $message = sprintf(error_helper::msg()->msg502,$titulo);

                        $redUrl = $this->items['getUrl'].'productos/listar';

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

                    $productoId = sessiones_helper::obtieneSesion('editarProductos');

                    $titulo = $this->input->post('titulo');

                    $subtitulo = $this->input->post('subtitulo');

                    $precio = $this->input->post('precio');

                    $descripcion = $this->input->post('descripcion');

                    $imagenProducto = $this->complementos->obtenerArchivo('imagenProducto', 'unico');

                    $categoriaId = $this->complementos->addSlashtag($this->input->post('categoriaId',TRUE));



                    $error = '';

                    $error .= valida_campo($productoId, 'not_empty|alnum|minlength:1|maxlength:11', 'Id Producto');

                    $error .= valida_campo($titulo, 'not_empty|minlength:3|maxlength:100', 'Título');

                    $error .= valida_campo($subtitulo, 'maxlength:110', 'Subtítulo');

                    $error .= valida_campo($categoriaId, 'not_empty', 'Categoría'); 

                    $error .= valida_campo($descripcion, 'maxlength:2500', 'Descripción');



                    if(!empty($imagenProducto)){

                        $error .= valida_imagen($imagenProducto, 'maxwidth:1000|maxheight:900:|maxsize:2', 'Imagen');

                    }



                    if($error != ''){ 

                        $message = sprintf(error_helper::msg()->msg201,$error);

                        echo alerta_error($message);EXIT; 

                    }



                    $condiciones = array( 'web_productos.id' => $productoId );

                    $resultadoProductos = $this->m_web_productos->mostrarDatos($condiciones);



                    if(!empty($imagenProducto)){

                        $opciones = array(

                            'marcaTipo' => FALSE,

                            'marcaInfo' => FALSE,

                            'ajuste' => 'w',

                            'ajusteImagen' => 600,

                            'desenfocado' => FALSE,

                            'cantidadCopia' => array()

                        );

                        $obtieneImagen = $this->complementos->almacenarImagen($imagenProducto, 'public/imagen/productos', $opciones, TRUE);

                    } else {

                        $obtieneImagen = $resultadoProductos[0]->imagen;

                    }



                    $columnaDatos = array(

                        'titulo' => $titulo,

                        'subtitulo' => $subtitulo,

                        'slug' =>  url_seo($titulo),

                        'precio' => $precio,

                        'descripcion' => $descripcion,

                        'categoria_id' => $categoriaId,

                        'imagen' => $obtieneImagen,

                        'fecha_modificacion' => time(),

                    );

                    $resultado = $this->m_web_productos->actualizar($columnaDatos, array( 'web_productos.id' => $productoId ));

                    if(!empty($resultado)){

                        sessiones_helper::eliminaSesion('editarProductos');

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

                if($this->m_web_productos->existe($id)){

                    $condiciones = array(

                        'web_productos.eliminacion_logica' => 0,

                        'web_productos.id' => $id

                    );

                    $resultadoTabla = $this->m_web_productos->mostrarDatos($condiciones);

                    if(!empty($resultadoTabla)){

                        $this->m_web_productos->permitirInfo($resultadoTabla[0]->id);

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

                if($this->m_web_productos->existe($id)){

                    $condiciones = array(

                        'web_productos.eliminacion_logica' => 1,

                        'web_productos.id' => $id

                    );

                    $resultadoTabla = $this->m_web_productos->mostrarDatos($condiciones);

                    if(!empty($resultadoTabla)){

                        $this->m_web_productos->denegarInfo($resultadoTabla[0]->id);

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

                    if($this->m_web_productos->existe($id)){

                        $condiciones = array(

                            'web_productos.eliminacion_logica' => 0,

                            'web_productos.id' => $id

                        );

                        $resultadoTabla = $this->m_web_productos->mostrarDatos($condiciones);

                        if(!empty($resultadoTabla)){

                            $resultado = $this->m_web_productos->eliminar( array( 'web_productos.id' => $resultadoTabla[0]->id ) );

                            if($resultado){

                                $this->m_web_productos->ordenarPosicionItems(array(),$resultadoTabla[0]->categoria_id);

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

                            'web_productos.eliminacion_logica' => 1,

                            'web_productos.id' => $webRegistroId

                        );

                    } else {

                        $condiciones = array(

                            'web_productos.eliminacion_logica' => 1,

                            'web_productos.id' => $webRegistroId,

                            'web_productos.usuario_id' => $this->accesoSession->accesoTmpId

                        );

                    }

                    $webRegistro = $this->m_web_productos->mostrarDatos($condiciones);

                    if (!empty($webRegistro)) {

                        $condiciones = array(

                            'web_productos.posicion' => 'asc'

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