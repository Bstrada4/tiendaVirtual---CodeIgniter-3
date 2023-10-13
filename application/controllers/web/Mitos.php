<?php

@session_cache_limiter('private, must-revalidate');

@header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

@header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");

@header("Cache-Control: no-store, no-cache, must-revalidate");

@header("Cache-Control: post-check=0, pre-check=0", FALSE);

@header("Pragma: no-cache");

error_reporting(0);



class Mitos extends CI_Controller {



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

        $modelos = array('m_web_mitos','m_web_icon');

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

        $data['titulo_red'] = "El mejor pollo | Arakaky's | Avicola | Mitos";

        $data['palabrasClaves'] = '';

        $data['metaDescripcion'] = '';

        //REDES SOCIALES

        $data['tituloRedes'] = '';

        $data['descripcionRedes'] = '';

        $data['rutaRedes'] = base_url() .'mitos';

        $data['imagenRedes'] = base_url() .'';



        $data['css_interna'] = 'mitos-min.css';

        /*$data['accordion'] = 'active';*/

        /*$data['stick_parent'] = 'active';*/

        $data['owl_carousel'] = 'active';





        /*

         * TRAER DATOS SLIDER

         */

        $condicionesMitos = array('web_mitos.posicion' => 'asc','web_mitos.eliminacion_logica' => 1);

        $webMitos = $this->m_web_mitos->mostrarDatos($condicionesMitos);

        /*

         * LISTADO SLIDER

         */

        if(!empty($webMitos)){

            $n = 1;

            foreach($webMitos as $items){

                $var_ico = array('»','«');
                $icon_t = str_replace($var_ico, '"', $items->icono);
                $data['listadoMitos'][] = array(
                    'id' => $items->id, 
                    'titulo' => ($items->titulo != '') ? $items->titulo : '',
                    'subtitulo' => ($items->subtitulo != '') ? $items->subtitulo : '',
                    'icono' =>  ($items->icono != '') ? $icon_t : '',
                    'slug' => base_url().'mito-descripcion/'.$items->slug,
                    'active' => ($n == 1) ? 'active' : '',
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

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/pagina/mitos', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/inter_footer', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/footer', $data);

    }



    public function mito_descripcion($url = '') {

        //CABEZERA

        $data['titulo_red'] = "El mejor pollo | Arakaky's | Avicola | Mitos";

        $data['palabrasClaves'] = '';

        $data['metaDescripcion'] = '';

        //REDES SOCIALES

        $data['tituloRedes'] = '';

        $data['descripcionRedes'] = '';

        $data['rutaRedes'] = base_url() .'mitos';

        $data['imagenRedes'] = base_url() .'';



        $data['css_interna'] = 'mito-descripcion-min.css';

        $data['accordion'] = 'active';

        $data['stick_parent'] = 'active';

        $data['owl_carousel'] = 'active';



        $condicionesNutricion = array(

            'web_mitos.slug' => $url, 

            'web_mitos.eliminacion_logica' => 1

        );



        

        $webMitos = $this->m_web_mitos->mostrarDatos($condicionesNutricion);

        if(!empty($webMitos)){

            $mitos = $webMitos[0];

            $image = ($mitos->imagen != '') ? $mitos->imagen : 'empty.png';

            $data['observar_id'] = $mitos->id;

            $data['observar_titulo'] = $mitos->titulo;

            $data['observar_subtitulo'] = $mitos->subtitulo;

            $data['observar_descripcion'] = $mitos->descripcion;

            $data['observar_url'] = $mitos->slug;

            $data['observar_imagen'] = base_url().'public/imagen/mitos/'.$image;





            $condicionesTotal = array(

                'web_mitos.id !=' => $mitos->id,

                'web_mitos.posicion' => 'asc',

                'web_mitos.eliminacion_logica' => 1

            );

            $listarMitos = $this->m_web_mitos->mostrarDatos($condicionesTotal);

            if(!empty($listarMitos)){

                $n = 1;

                foreach($listarMitos as $items){

                    $imagen = ($items->imagen != '') ? $items->imagen : 'empty.png';

                    $data['listarMitos'][] = array(

                        'id' => $items->id, 

                        'titulo' => ($items->titulo != '') ? $items->titulo : '',

                        'subtitulo' => ($items->subtitulo != '') ? $items->subtitulo : '',

                        'slug' => base_url().'mito-descripcion/'.$items->slug,

                        'imagen' => base_url().'crop/350/190/mitos-'.$imagen,

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

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/pagina/mito_descripcion', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/inter_footer', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/footer', $data);

    }



}