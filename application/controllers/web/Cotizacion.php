<?php
@session_cache_limiter('private, must-revalidate');
@header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
@header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
@header("Cache-Control: no-store, no-cache, must-revalidate");
@header("Cache-Control: post-check=0, pre-check=0", FALSE);
@header("Pragma: no-cache");
//error_reporting(0);

class Cotizacion extends CI_Controller {

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
        $modelos = array();
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

        $this->datos_privados->verificaNoAcceso();
    }


    public function mensaje() {
        //CABEZERA
        $data['titulo_red'] = "El mejor pollo | Arakaky's | Avicola | Cotización enviada";
        $data['palabrasClaves'] = '';
        $data['metaDescripcion'] = '';
        //REDES SOCIALES
        $data['tituloRedes'] = '';
        $data['descripcionRedes'] = '';
        $data['rutaRedes'] = base_url() .'cotizacion_enviada';
        $data['imagenRedes'] = base_url() .'';

        $data['css_interna'] = 'cotizacion-enviada-min.css';
        $data['owl_carousel'] = 'active';

    
        /*
         * Impresión de páginas
         */
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $this->verificaAcceso);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/inter_header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/pagina/cotizacion_enviada', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/inter_footer', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/footer', $data);
    }



}