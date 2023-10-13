<?php

@session_cache_limiter('private, must-revalidate');

@header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

@header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");

@header("Cache-Control: no-store, no-cache, must-revalidate");

@header("Cache-Control: post-check=0, pre-check=0", FALSE);

@header("Pragma: no-cache");

//error_reporting(0);



class Carrito extends CI_Controller {



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

        $modelos = array('m_web_productos','m_web_categoria');

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

        $data['titulo_red'] = "El mejor pollo | Arakaky's | Avicola | Carrito";

        $data['palabrasClaves'] = '';

        $data['metaDescripcion'] = '';

        //REDES SOCIALES

        $data['tituloRedes'] = '';

        $data['descripcionRedes'] = '';

        $data['rutaRedes'] = base_url() .'perfil-cliente';

        $data['imagenRedes'] = base_url() .'';



        $data['css_interna'] = 'carrito-min.css';

        $data['owl_carousel'] = 'active';

        

        

        

        /*

         * Impresión de páginas

         */

        $data = array_merge($data, $this->items);

        $data = array_merge($data, $this->verificaAcceso);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/header', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/inter_header', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/pagina/carrito', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/inter_footer', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/footer', $data);

    }





    public function agregar_unidad() {
        $idProducto = $this->input->post('id');
        $cantidadUnidad = 1;
        $result = array();
        /*Datos Producto*/
        $condiciones = array('web_productos.id' => $idProducto ,'web_productos.eliminacion_logica'=> 1);
        $producto = $this->m_web_productos->mostrarDatos($condiciones);

        if (!empty($producto)) {
            $condicion = array(
                'web_categoria.id' => $producto[0]->categoria_id
            );
            $categoria = $this->m_web_categoria->mostrarDatos($condicion);

            $data_cart = array(
                'id' => $idProducto,
                'qty' => $cantidadUnidad,
                'price' => $producto[0]->precio,
                'name' => $producto[0]->titulo,
                'options' => 
                    array(
                        'slug' => $producto[0]->slug,
                        'image' => base_url().'public/imagen/productos/'.$producto[0]->imagen,
                        'precioId' => $producto[0]->id,
                        'precio' => $producto[0]->precio,
                        'collection' => $categoria[0]->titulo,
                        'stock' => 1,
                    )
                );
            $this->cart->insert($data_cart);
            /*$result = array(
                'total' => 'S/' . $this->cart->total(),
                'name' =>  $producto[0]->titulo,
                'price' => 'S/' . $producto[0]->precio,
                'image' => base_url().'public/imagen/productos/'.$producto[0]->imagen,
                'collection' => $categoria[0]->titulo,
                'qty' => $cantidadUnidad,
                'items' => count($this->cart->contents())
            );*/

            $listar_cart = $this->cart->contents();

            foreach($listar_cart as $items){
                $result[] = array(
                    'id' => $items['id'], 
                    'name' => ($items['name'] != '') ? $items['name'] : '',
                    'price' => ($items['price'] != '') ? $items['price'] : '',
                    'qty' => ($items['qty'] != '') ? $items['qty']  : '',
                    'slug' => ($items['options']['slug'] != '') ? $items['options']['slug'] : '',
                    'collection' => ($items['options']['collection'] != '') ? $items['options']['collection'] : '',
                    'image' => $items['options']['image'],
                    'rowid' => "'".$items['rowid']."'",
                    'rowidli' => $items['rowid'],
                    'total' => 'S/' . $this->cart->total(),
                    'items' => count($this->cart->contents())
                );
            }
        }

        

        echo json_encode($result, TRUE);

    }



    public function eliminar_unidad() {

        $rowid = $this->input->post('rowid');

        $this->cart->remove($rowid);

        $result = array(

            'rowid' => $rowid ,

        );

        echo json_encode($result, TRUE);

    }



    public function editar_unidad() {

        $rowid = $this->input->post('rowid');

        $qty = $this->input->post('quantity');

        



        $data = array(

            'rowid' => $rowid,

            'qty' => $qty

        );

        $this->cart->update($data);

        $result = array(

            'mensaje' => true,

        );

        echo json_encode($result, TRUE);

    }





}