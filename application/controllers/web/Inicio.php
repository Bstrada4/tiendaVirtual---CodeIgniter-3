<?php

@session_cache_limiter('private, must-revalidate');

@header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

@header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");

@header("Cache-Control: no-store, no-cache, must-revalidate");

@header("Cache-Control: post-check=0, pre-check=0", FALSE);

@header("Pragma: no-cache");

//error_reporting(0);



class Inicio extends CI_Controller {



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

        $modelos = array('m_web_slider','m_web_nutricion','m_web_categoria','m_web_clasificacion','m_web_recetas','m_web_mitos','m_web_icon');

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

        $data['titulo_red'] = "El mejor pollo | Arakaky's | Avicola | Inicio";

        $data['page_content'] = '';



        $data['url_imagen'] = base_url().'';

        $data['url_noticia'] = base_url().'inicio';





        $data['css_interna'] = 'inicio-min.css';

        $data['slider'] = 'active';

        $data['owl_carousel'] = 'active';

        /*$data['img_move'] = 'active';*/

        $data['home_active'] = 'active';

        $data['maps'] = 'active';





        /*

         * TRAER DATOS SLIDER

         */

        $condicionesSlider = array('web_slider.posicion' => 'asc','web_slider.eliminacion_logica' => 1);

        $webSlider = $this->m_web_slider->mostrarDatos($condicionesSlider);

        /*

         * LISTADO SLIDER

         */

        if(!empty($webSlider)){

            $n = 1;

            foreach($webSlider as $items){

                $data['listadoSlider'][] = array(

                    'id' => $items->id, 

                    'titulo' => ($items->titulo != '') ? mb_strtoupper($items->titulo,'UTF-8') : '',

                    'imagen' => $this->items['base_url'].'public/imagen/slider/'.$items->imagen,

                    'active' => ($n == 1) ? 'active' : '',

                );

                ++$n;

            }

        }





        /*

         * TRAER DATOS PRODUCTOS

         */

        $condicionesCategoria = array('web_categoria.posicion' => 'asc','web_categoria.eliminacion_logica' => 1);

        $webCategoria = $this->m_web_categoria->mostrarDatos($condicionesCategoria);

        /*

         * LISTADO PRODUCTOS

         */

        if(!empty($webCategoria)){

            $n = 1;

            foreach($webCategoria as $items){

                $image = ($items->imagen != '') ? $items->imagen : 'empty.png';

                $data['listadoCategoria'][] = array(

                    'id' => $items->id, 

                    'titulo' => ($items->titulo != '') ? mb_strtoupper($items->titulo,'UTF-8') : '',

                    'subtitulo' => ($items->subtitulo != '') ? $items->subtitulo: '',

                    'imagen' => $this->items['base_url'].'public/imagen/categoria/'.$image,

                    'slug' => base_url().'productos/'.$items->slug,

                    'active' => ($n == 1) ? 'active' : '',

                );

                ++$n;

            }

        }



        /*

         * TRAER DATOS NUTRICION

         */

        $condicionesNutricion = array('web_nutricion.posicion' => 'asc','web_nutricion.eliminacion_logica' => 1);

        $webNutricion = $this->m_web_nutricion->mostrarDatos($condicionesNutricion);

        /*

         * LISTADO NUTRICION

         */

        if(!empty($webNutricion)){

            $n = 1;

            foreach($webNutricion as $items){

                $data['listadoNutricion'][] = array(

                    'id' => $items->id, 

                    'titulo' => ($items->titulo != '') ? mb_strtoupper($items->titulo,'UTF-8') : '',

                    'imagen' => $this->items['base_url'].'public/imagen/nutricion/'.$items->imagen,

                    'imagen_home' => $this->items['base_url'].'public/imagen/nutricion/'.$items->imagen_home,

                    'slug' => ($items->slug != '') ? base_url().'nutricion/'.$items->slug : '', 

                    'descripcion_corta' => ($items->descripcion_corta != '') ? $items->descripcion_corta : '', 

                    'active' => ($n == 1) ? 'active' : '',

                );

                ++$n;

            }

        }



        /*

         * TRAER DATOS MITOS

         */

        $condicionesMitos = array('web_mitos.posicion' => 'asc','web_mitos.eliminacion_logica' => 1);

        $webMitos = $this->m_web_mitos->mostrarDatos($condicionesMitos);

        /*

         * LISTADO MITOS

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

         * LISTADO RECETAS

         */

        $condicionesClasificacion = array('web_clasificacion.posicion' => 'asc','web_clasificacion.eliminacion_logica' => 1);

        $webClasificacion = $this->m_web_clasificacion->mostrarDatos($condicionesClasificacion,4);

        $this->items['listaClasificacion'] = array();

        if (!empty($webClasificacion)) {

            $c = 1;

            foreach ($webClasificacion AS $items) {

                $condicionesRecetas = array('web_recetas.posicion' => 'asc','web_recetas.categoria_id' => $items->id,'web_recetas.eliminacion_logica' => 1);

                $webRecetas = $this->m_web_recetas->mostrarDatos($condicionesRecetas,1); 

                $webRecetasFinal = array();

                if (!empty($webRecetas)) {

                    $i = 1;

                    foreach ($webRecetas AS $item) {

                        $webRecetasFinal[] = array(

                            'id' => $item->id, 

                            'titulo' => ($item->titulo != '') ? $item->titulo : '',

                            'subtitulo' => ($item->subtitulo != '') ? $item->subtitulo : '',

                            'imagen' => $this->items['base_url'].'public/imagen/recetas/'.$item->imagen,

                            'descripcion' => ($item->descripcion != '') ? word_limiter($item->descripcion, 35, ' ...') : '', 
                            'slug' => ($item->slug != '') ? base_url().'receta-descripcion/'.$item->slug : '', 
                            'active' => ($i == 1 and $c == 1) ? 'show active' : '',



                        );

                        ++$i;

                    }

                }  

                $this->items['listaClasificacion'][]= array(

                    'id' => $items->id, 

                    'titulo' => ($items->titulo != '') ? $items->titulo : '',

                    'slug' => ($items->slug != '') ? $items->slug : '',

                    'active' => ($c == 1) ? 'active' : '',

                    'status' => ($c == 1) ? 'true' : '',

                    'recetas' => $webRecetasFinal,

                );

                $c++;

            }

        }



        /*

         * Impresión de páginas

         */

        $data = array_merge($data, $this->items);

        $data = array_merge($data, $this->verificaAcceso);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/header', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/inter_header', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/pagina/home', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/inter_footer', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/footer', $data);

    } 



}