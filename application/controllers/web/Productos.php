<?php
@session_cache_limiter('private, must-revalidate');
@header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
@header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
@header("Cache-Control: no-store, no-cache, must-revalidate");
@header("Cache-Control: post-check=0, pre-check=0", FALSE);
@header("Pragma: no-cache");
//error_reporting(0);

class Productos extends CI_Controller {

    private $items = array();

    public function __construct() {
        parent::__construct();
        ini_set('memory_limit', '1024M');
        ini_set('max_execution_time', 0);
        ini_set('upload_max_filesize', '200M');
        /*
         * Configuración para librerias, helpers y modelos
         */
        $librerias = array('web/datos_privados');
        $helper = array();
        $modelos = array('m_web_categoria','m_web_productos');
        $this->load->library($librerias);
        $this->load->helper($helper);
        $this->load->model($modelos);
        /*
         * Configuración personalizada
         */
        $this->items['carpetaProyecto'] = 'web';
        $this->items['proyectoTitulo'] = 'Arakakys';
        $this->items['proyectoAutor'] = 'Boris Estrada';
        $this->items['proyectoFavicon'] =  base_url().'public/img/logo/favicon.svg';
        $this->items['base_url'] = base_url();

        $this->scriptVista = $this->scripts->scriptVistaGeneral();
        $this->items = array_merge($this->items, $this->scriptVista);

        $this->verificaAcceso = $this->datos_privados->verificaAcceso();
        

        $this->items['cart_items'] = count($this->cart->contents());
        $this->items['cart_price'] = number_format($this->cart->total(), '2', '.', '');
        $this->items['itemsProducto'] = $this->cart->contents();
    }

    public function home() {
        //CABEZERA
        $data['titulo_red'] = "El mejor pollo | Arakaky's | Avicola | Productos";
        $data['palabrasClaves'] = '';
        $data['metaDescripcion'] = '';
        //REDES SOCIALES
        $data['tituloRedes'] = '';
        $data['descripcionRedes'] = '';
        $data['rutaRedes'] = base_url() .'productos';
        $data['imagenRedes'] = base_url() .'';


        $data['css_interna'] = 'productos-min.css';
        $data['owl_carousel'] = 'active';
        $data['productos_script'] = 'active';


        $data['accordion'] = 'active';
        $data['stick_parent'] = 'active';
        $data['grid_shop'] = 'active';

        /*
         * TRAER DATOS CATEGORIA
         */
        $categoria = sessiones_helper::obtieneSesion('listarCategoriaId');
        if(!empty($categoria )){
            $condicionesCategoriaSlug = array('web_categoria.id' => $categoria ,'web_categoria.posicion' => 'asc','web_categoria.eliminacion_logica' => 1);
            $webCategoriaSlug = $this->m_web_categoria->mostrarDatos($condicionesCategoriaSlug); 
        } else {
            $condicionesCategoriaSlug = array('web_categoria.posicion' => 'asc','web_categoria.eliminacion_logica' => 1);
            $webCategoriaSlug = $this->m_web_categoria->mostrarDatos($condicionesCategoriaSlug);
        }

        sessiones_helper::creaSesion('listarCategoriaId', $webCategoriaSlug[0]->id);
        
        /*
         * LISTADO CATEGORIA
         */
        $condicionesCategoria = array('web_categoria.posicion' => 'asc','web_categoria.eliminacion_logica' => 1);
        $webCategoria = $this->m_web_categoria->mostrarDatos($condicionesCategoria);
        if(!empty($webCategoria)){
            $n = 1;
            foreach($webCategoria as $items){
                $data['listadoCategoria'][] = array(
                    'id' => $items->id, 
                    'titulo' => ($items->titulo != '') ? $items->titulo : '',
                    'active' => ($items->slug == $webCategoriaSlug[0]->slug) ? 'active' : '',
                );
                ++$n;
            }
        }
        /*
         * Impresión de páginas
         */
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $this->verificaAcceso);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/inter_header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/pagina/productos', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/inter_footer', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/footer', $data);
    }

    public function buscar($palabra = '') {
        //CABEZERA
        $data['titulo_red'] = "El mejor pollo | Arakaky's | Avicola | Busqueda de productos";
        $data['palabrasClaves'] = '';
        $data['metaDescripcion'] = '';
        //REDES SOCIALES
        $data['tituloRedes'] = '';
        $data['descripcionRedes'] = '';
        $data['rutaRedes'] = base_url() .'productos';
        $data['imagenRedes'] = base_url() .'';


        $data['css_interna'] = 'productos-min.css';
        $data['owl_carousel'] = 'active';
        $data['busqueda_script'] = 'active';


        $data['accordion'] = 'active';
        $data['stick_parent'] = 'active';
        $data['grid_shop'] = 'active';

        $palabra = str_replace("%", " ", $palabra);
        $palabra = str_replace("-", " ", $palabra);
        $palabra = str_replace("%C3%B1", "ñ", $palabra);
        $palabra = str_replace("%C3%A1", "á", $palabra);
        $palabra = str_replace("%C3%A9", "é", $palabra);
        $palabra = str_replace("%C3%AD", "í", $palabra);
        $palabra = str_replace("%C3%B3", "ó", $palabra);
        $palabra = str_replace("%C3%BA", "ú", $palabra);

        $condicionesProducto = array(
            'web_productos.titulo' => $palabra,
            'web_productos.eliminacion_logica' => 1
        );
        $webProducto = $this->m_web_productos->buscarDatos($condicionesProducto);
        $countProduct = count($webProducto);
        if($countProduct == 1){
            $mensajeResultado = '<b>'.$countProduct . '</b> Resultado con la palabra : <b>' .$palabra . '</b>';
        } else {
            $mensajeResultado = '<b>'.$countProduct . '</b> Resultados con la palabra : <b>' .$palabra .'</b>';
        }
        $data['totalResultados'] = $mensajeResultado;
        

        /*
         * LISTADO PRODUCTO
         */
        $datos = array();
        if(!empty($webProducto)){
            $n = 1;
            foreach($webProducto as $items){
                $image = ($items->imagen != '') ? $items->imagen : 'empty.png';
                $data['listadoBusqueda'][] = array(
                    'id' => $items->id, 
                    'titulo' => ($items->titulo != '') ? $items->titulo : '',
                    'subtitulo' => ($items->subtitulo != '') ? $items->subtitulo : '',
                    'descripcion' => ($items->descripcion != '') ? strip_tags($items->descripcion) : '',
                    'slug' => ($items->slug != '') ? $items->slug : '',
                    'precio' => ($items->precio != '') ? $items->precio : '',
                    'imagen' => base_url().'public/imagen/productos/'.$image,
                );
                ++$n;
            }
        }

        /*
         * Impresión de páginas
         */
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $this->verificaAcceso);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/inter_header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/pagina/buscar', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/inter_footer', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/footer', $data);
    }

    public function proceso($accion){
        switch($accion){
            case 'listar':
                $categoria = sessiones_helper::obtieneSesion('listarCategoriaId');
                /*
                 * TRAER DATOS PRODUCTO
                 */
                $condicionesProducto = array(
                    'web_productos.categoria_id' => $categoria,
                    'web_productos.posicion' => 'asc',
                    'web_productos.eliminacion_logica' => 1
                );
                $webProducto = $this->m_web_productos->mostrarDatos($condicionesProducto);
                /*
                 * LISTADO PRODUCTO
                 */
                $datos = array();
                if(!empty($webProducto)){
                    $n = 1;
                    foreach($webProducto as $items){
                        $image = ($items->imagen != '') ? $items->imagen : 'empty.png';
                        $datos[] = array(
                            'id' => $items->id, 
                            'titulo' => ($items->titulo != '') ? $items->titulo : '',
                            'subtitulo' => ($items->subtitulo != '') ? $items->subtitulo : '',
                            'descripcion' => ($items->descripcion != '') ? strip_tags($items->descripcion) : '',
                            'slug' => ($items->slug != '') ? $items->slug : '',
                            'precio' => ($items->precio != '') ? $items->precio : '',
                            'imagen' => base_url().'public/imagen/productos/'.$image,
                        );
                        ++$n;
                    }
                }
                header('Access-Control-Allow-Origin: *');
                header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
                header('Content-type: application/json; charset=utf-8');
                echo json_encode($datos);    
                break;
            case 'filtrar':
                sessiones_helper::eliminaSesion('listarCategoriaId');
                $categoria = $this->input->post('categoria');
                sessiones_helper::creaSesion('listarCategoriaId', $categoria);
                /*
                 * TRAER DATOS PRODUCTO
                 */
                $condicionesProducto = array(
                    'web_productos.categoria_id' => $categoria,
                    'web_productos.posicion' => 'asc',
                    'web_productos.eliminacion_logica' => 1
                );
                $webProducto = $this->m_web_productos->mostrarDatos($condicionesProducto);
                /*
                 * LISTADO PRODUCTO
                 */
                $datos = array();
                if(!empty($webProducto)){
                    $n = 1;
                    foreach($webProducto as $items){
                        $image = ($items->imagen != '') ? $items->imagen : 'empty.png';
                        $datos[] = array(
                            'id' => $items->id, 
                            'titulo' => ($items->titulo != '') ? $items->titulo : '',
                            'subtitulo' => ($items->subtitulo != '') ? $items->subtitulo : '',
                            'descripcion' => ($items->descripcion != '') ? strip_tags($items->descripcion) : '',
                            'slug' => ($items->slug != '') ? $items->slug : '',
                            'precio' => ($items->precio != '') ? $items->precio : '',
                            'imagen' => base_url().'public/imagen/productos/'.$image,
                        );
                        ++$n;
                    }
                }
                header('Access-Control-Allow-Origin: *');
                header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
                header('Content-type: application/json; charset=utf-8');
                echo json_encode($datos);    
                break;
            case 'ordenar':
                $posicion = $this->input->post('posicion');
                $categoria = sessiones_helper::obtieneSesion('listarCategoriaId');
                /*
                 * TRAER DATOS PRODUCTO
                 */
                $condicionesProducto = array(
                    'web_productos.categoria_id' => $categoria,
                    'web_productos.precio' => $posicion,
                    'web_productos.eliminacion_logica' => 1
                );
                $webProducto = $this->m_web_productos->mostrarDatos($condicionesProducto);
                /*
                 * LISTADO PRODUCTO
                 */
                $datos = array();
                if(!empty($webProducto)){
                    $n = 1;
                    foreach($webProducto as $items){
                        $image = ($items->imagen != '') ? $items->imagen : 'empty.png';
                        $datos[] = array(
                            'id' => $items->id, 
                            'titulo' => ($items->titulo != '') ? $items->titulo : '',
                            'subtitulo' => ($items->subtitulo != '') ? $items->subtitulo : '',
                            'descripcion' => ($items->descripcion != '') ? strip_tags($items->descripcion) : '',
                            'slug' => ($items->slug != '') ? $items->slug : '',
                            'precio' => ($items->precio != '') ? $items->precio : '',
                            'imagen' => base_url().'public/imagen/productos/'.$image,
                        );
                        ++$n;
                    }
                }
                header('Access-Control-Allow-Origin: *');
                header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
                header('Content-type: application/json; charset=utf-8');
                echo json_encode($datos);    
                break;
            case 'categoria':
                sessiones_helper::eliminaSesion('listarCategoriaId');
                $categoria = $this->input->post('categoria');
                sessiones_helper::creaSesion('listarCategoriaId', $categoria);

                $datos = array('categoria' => $categoria);

                header('Access-Control-Allow-Origin: *');
                header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
                header('Content-type: application/json; charset=utf-8');
                echo json_encode($datos);    
                break;
            default:
                return FALSE;
        }
    }

}