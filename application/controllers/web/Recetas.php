<?php

@session_cache_limiter('private, must-revalidate');

@header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

@header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");

@header("Cache-Control: no-store, no-cache, must-revalidate");

@header("Cache-Control: post-check=0, pre-check=0", FALSE);

@header("Pragma: no-cache");

//error_reporting(0);



class Recetas extends CI_Controller {



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

        $modelos = array('m_web_clasificacion','m_web_recetas');

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
        $data['titulo_red'] = "El mejor pollo | Arakaky's | Avicola | Recetas";
        $data['palabrasClaves'] = '';
        $data['metaDescripcion'] = '';

        //REDES SOCIALES
        $data['tituloRedes'] = '';
        $data['descripcionRedes'] = '';
        $data['rutaRedes'] = base_url() .'recetas';
        $data['imagenRedes'] = base_url() .'';


        $data['css_interna'] = 'recetas-min.css';
        $data['owl_carousel'] = 'active';
        $data['mixitup_col3'] = 'active';
        $data['light_gallery'] = 'active';



        /*

         * LISTADO RECETAS

         */

        $condicionesClasificacion = array('web_clasificacion.posicion' => 'asc','web_clasificacion.eliminacion_logica' => 1);

        $webClasificacion = $this->m_web_clasificacion->mostrarDatos($condicionesClasificacion);

        $this->items['listaClasificacion'] = array();

        if (!empty($webClasificacion)) {

            $c = 1;

            foreach ($webClasificacion AS $items) {

                $condicionesRecetas = array('web_recetas.posicion' => 'asc','web_recetas.categoria_id' => $items->id,'web_recetas.eliminacion_logica' => 1);

                $webRecetas = $this->m_web_recetas->mostrarDatos($condicionesRecetas); 

                $webRecetasFinal = array();

                if (!empty($webRecetas)) {

                    $i = 1;

                    foreach ($webRecetas AS $item) {

                        $webRecetasFinal[] = array(

                            'id' => $item->id, 

                            'titulo' => ($item->titulo != '') ? $item->titulo : '',

                            'subtitulo' => ($item->subtitulo != '') ? $item->subtitulo : '',

                            'imagen' => $this->items['base_url'].'public/imagen/recetas/'.$item->imagen,

                            'descripcion' => ($item->descripcion != '') ? $item->descripcion : '', 

                            'slug' => ($item->slug != '') ? base_url().'receta-descripcion/'.$item->slug : '', 



                        );

                        ++$i;

                    }



                    $this->items['listaClasificacion'][]= array(

                        'id' => $items->id, 

                        'numero' => $c, 

                        'titulo' => ($items->titulo != '') ? $items->titulo : '',

                        'slug' => ($items->slug != '') ? $items->slug : '',

                        'active' => ($c == 1) ? 'active mixitup-control-active' : '',

                        'recetas' => $webRecetasFinal,

                    );

                    $c++;

                }  

                

            }

        }

        

        /*

         * Impresión de páginas

         */

        $data = array_merge($data, $this->items);

        $data = array_merge($data, $this->verificaAcceso);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/header', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/inter_header', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/pagina/recetas', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/inter_footer', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/footer', $data);

    }



    public function receta_descripcion($url = '') {

        //CABEZERA

        $data['titulo_red'] = "El mejor pollo | Arakaky's | Avicola | Recetas";

        $data['palabrasClaves'] = '';

        $data['metaDescripcion'] = '';

        //REDES SOCIALES

        $data['tituloRedes'] = '';

        $data['descripcionRedes'] = '';

        $data['rutaRedes'] = base_url() .'receta_descripcion';
        $data['imagenRedes'] = base_url() .'';



        $data['css_interna'] = 'receta-descripcion-min.css';

        $data['accordion'] = 'active';

        $data['stick_parent'] = 'active';

        $data['owl_carousel'] = 'active';
        
        
        
        /*

         * TRAER DATOS NUTRICION

         */

        $condicionesRec = array('web_recetas.posicion' => 'asc','web_recetas.eliminacion_logica' => 1);

        $webRec = $this->m_web_recetas->mostrarDatos($condicionesRec);

        /*

         * LISTADO NUTRICION

         */

        if(!empty($webRec)){

            $n = 1;

            foreach($webRec as $items){

                $data['listadoRec'][] = array(
                    'id' => $items->id, 
                    'titulo' => ($items->titulo != '') ? $items->titulo : '',
                    'slug' => ($items->slug != '') ? base_url().'receta-descripcion/'.$items->slug : '',
                    'active' => ($items->slug == $url) ? 'active' : '',

                );

                ++$n;

            }

        }



        $condicionesRecetas = array(

            'web_recetas.slug' => $url, 

            'web_recetas.eliminacion_logica' => 1

        );

        $webRecetas = $this->m_web_recetas->mostrarDatos($condicionesRecetas);

        if(!empty($webRecetas)){

            $recetas = $webRecetas[0];

            $image = ($recetas->imagen != '') ? $recetas->imagen : 'empty.png';

            $data['observar_id'] = $recetas->id;

            $data['observar_titulo'] = $recetas->titulo;

            $data['observar_subtitulo'] = $recetas->subtitulo;

            $data['observar_descripcion'] = $recetas->descripcion;

            $data['observar_url'] = $recetas->slug;

            $data['observar_posicion'] = 'N°'.$recetas->posicion;

            $data['observar_imagen'] = base_url().'public/imagen/recetas/'.$image;

            $data['fechaRegistro'] = ($recetas->fechaRegistro >= 1104537600) ? $this->complementos->obtenerFecha($recetas->fechaRegistro,7) : '---';

            $data['fechaModificacion'] = ($recetas->fechaModificacion >= 1104537600) ? $this->complementos->obtenerFecha($recetas->fechaModificacion,7) : '---';

        

            $condicion = array(

                'web_clasificacion.id' => $recetas->categoriaId

            );

            $clasificacion = $this->m_web_clasificacion->mostrarDatos($condicion);

            $clasificacionName = ($clasificacion[0]->titulo != '') ? $clasificacion[0]->titulo : '';

            $data['observar_clasificacion'] = $clasificacionName;

        } else {

            echo re_direccion(base_url().'recetas'); EXIT;

        } 

        

        /*

         * Impresión de páginas

         */

        $data = array_merge($data, $this->items);

        $data = array_merge($data, $this->verificaAcceso);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/header', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/inter_header', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/pagina/receta_descripcion', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/inter_footer', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/footer', $data);

    }



}