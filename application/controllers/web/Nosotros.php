<?php
@session_cache_limiter('private, must-revalidate');
@header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
@header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
@header("Cache-Control: no-store, no-cache, must-revalidate");
@header("Cache-Control: post-check=0, pre-check=0", FALSE);
@header("Pragma: no-cache");
error_reporting(0);

class Nosotros extends CI_Controller {

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
        $modelos = array('m_web_nosotros');
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
        $data['titulo_red'] = "El mejor pollo | Arakaky's | Avicola | Nosotros";
        $data['palabrasClaves'] = '';
        $data['metaDescripcion'] = '';
        //REDES SOCIALES
        $data['tituloRedes'] = '';
        $data['descripcionRedes'] = '';
        $data['rutaRedes'] = base_url() .'nosotros';
        $data['imagenRedes'] = base_url() .'';

        $data['owl_carousel'] = 'active';
        $data['css_interna'] = 'nosotros-min.css';
        
        $nosotros = $this->m_web_nosotros->mostrarDatos();
        if(!empty($nosotros)){
            $valores = $nosotros[0];

            $data['mensaje_1'] = (isset($valores->mensaje_1)) ? $valores->mensaje_1 : '';
            $data['mensaje_2'] = (isset($valores->mensaje_2)) ? $valores->mensaje_2 : '';
            $data['mensaje_3'] = (isset($valores->mensaje_3)) ? $valores->mensaje_3 : '';
            $data['mensaje_4'] = (isset($valores->mensaje_4)) ? $valores->mensaje_4 : '';
            $data['mensaje_5'] = (isset($valores->mensaje_5)) ? $valores->mensaje_5 : '';

            $data['descripcion_1'] = (isset($valores->descripcion_1)) ? $valores->descripcion_1 : '';
            $data['descripcion_2'] = (isset($valores->descripcion_2)) ? $valores->descripcion_2 : '';
            $data['descripcion_3'] = (isset($valores->descripcion_3)) ? $valores->descripcion_3 : '';

            $image = ($valores->imagen != '') ? $valores->imagen : 'empty.png';
            $data['observar_imagen'] = base_url().'public/imagen/nosotros/'.$image;

        }
        /*
         * Impresión de páginas
         */
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $this->verificaAcceso);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/inter_header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/pagina/nosotros', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/inter_footer', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/footer', $data);
    }

}