<?php

@session_cache_limiter('private, must-revalidate');

@header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

@header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");

@header("Cache-Control: no-store, no-cache, must-revalidate");

@header("Cache-Control: post-check=0, pre-check=0", FALSE);

@header("Pragma: no-cache");

error_reporting(0);



class Nutricion extends CI_Controller {



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

        $modelos = array('m_web_nutricion');

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



    

    public function home($url = '') {

        //CABEZERA

        $data['titulo_red'] = "El mejor pollo | Arakaky's | Avicola | Nutricion";

        $data['palabrasClaves'] = '';

        $data['metaDescripcion'] = '';

        //REDES SOCIALES

        $data['tituloRedes'] = '';

        $data['descripcionRedes'] = '';

        $data['rutaRedes'] = base_url() .'nutricion';

        $data['imagenRedes'] = base_url() .'';



        $data['css_interna'] = 'nutricion-min.css';
        $data['nutricion_active'] = 'active';

        $data['owl_carousel'] = 'active';
        $data['accordion'] = 'active';
        $data['stick_parent'] = 'active';


        if($url != ''){

            $condicionesNutricion = array(

                'web_nutricion.slug' => $url, 

                'web_nutricion.eliminacion_logica' => 1

            );

        } else {

            $condicionesNutricion = array(

                'web_nutricion.eliminacion_logica' => 1

            );

        }

        

        $webNutricion = $this->m_web_nutricion->mostrarDatos($condicionesNutricion);

        if(!empty($webNutricion)){

            $nutricion = $webNutricion[0];

            $image = ($nutricion->imagen != '') ? $nutricion->imagen : 'empty.png';

            $data['observar_id'] = $nutricion->id;

            $data['observar_titulo'] = $nutricion->titulo;

            $data['observar_subtitulo'] = $nutricion->subtitulo;

            $data['observar_descripcion'] = $nutricion->descripcion;

            $data['observar_url'] = $nutricion->slug;

            $data['observar_posicion'] = 'N°'.$nutricion->posicion;

            $data['observar_imagen'] = base_url().'public/imagen/nutricion/'.$image;

            $data['fechaRegistro'] = ($nutricion->fechaRegistro >= 1104537600) ? $this->complementos->obtenerFecha($nutricion->fechaRegistro,7) : '---';

            $data['fechaModificacion'] = ($nutricion->fechaModificacion >= 1104537600) ? $this->complementos->obtenerFecha($nutricion->fechaModificacion,7) : '---';





            $condicionesTotal = array(

                'web_nutricion.eliminacion_logica' => 1,

                'web_nutricion.posicion' => 'asc'

            );

            $listarNutricion = $this->m_web_nutricion->mostrarDatos($condicionesTotal);

            if(!empty($listarNutricion)){

                $n = 1;

                foreach($listarNutricion as $items){

                    $data['listarNutricion'][] = array(

                        'id' => $items->id, 

                        'titulo' => ($items->titulo != '') ? $items->titulo : '',

                        'slug' => ($items->slug != '') ? base_url().'nutricion/'.$items->slug : '', 

                        'active' => ($nutricion->slug == $items->slug) ? 'active' : '',

                    );

                    ++$n;

                }

            }



        } else {

            echo re_direccion(base_url()); EXIT;

        } 

        

        /*

         * Impresión de páginas

         */

        $data = array_merge($data, $this->items);

        $data = array_merge($data, $this->verificaAcceso);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/header', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/inter_header', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/pagina/nutricion', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/inter_footer', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/footer', $data);

    }



}