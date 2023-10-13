<?php
@session_cache_limiter('private, must-revalidate');
@header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
@header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
@header("Cache-Control: no-store, no-cache, must-revalidate");
@header("Cache-Control: post-check=0, pre-check=0", FALSE);
@header("Pragma: no-cache");
//error_reporting(0);

class Pedidos extends CI_Controller {

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
        $modelos = array('m_web_cotizacion','m_web_cotizacion_item','m_estado_pedido');
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


    public function home($codigo = '') {
        //CABEZERA
        $data['titulo_red'] = "El mejor pollo | Arakaky's | Avicola | Pedidos";
        $data['palabrasClaves'] = '';
        $data['metaDescripcion'] = '';
        //REDES SOCIALES
        $data['tituloRedes'] = '';
        $data['descripcionRedes'] = '';
        $data['rutaRedes'] = base_url() .'pedidos';
        $data['imagenRedes'] = base_url() .'';

        $data['css_interna'] = 'pedidos-min.css';
        $data['owl_carousel'] = 'active';


        $condiciones = array(
            'web_cotizacion.pedido_id' => $codigo
        );
        $resultado = $this->m_web_cotizacion->mostrarDatos($condiciones);

        if(!empty($resultado)){
            $cotizacion = $resultado[0];
            $data['observar_id'] = $cotizacion->id;
            $data['observar_codigo'] = $cotizacion->pedido_id;
            $data['observar_nombre'] = $cotizacion->nombre;
            $data['observar_telefono'] = $cotizacion->telefono;
            $data['observar_email'] = $cotizacion->email;
            $data['observar_direccion'] = $cotizacion->direccion;
            $data['observar_estado'] = $this->complementos->status_pedido_cliente($cotizacion->estado);
            $data['fechaRegistro'] = ($cotizacion->fechaRegistro >= 1104537600) ? $this->complementos->obtenerFecha($cotizacion->fechaRegistro,7) : '---';
            $data['fechaModificacion'] = ($cotizacion->fechaModificacion >= 1104537600) ? $this->complementos->obtenerFecha($cotizacion->fechaModificacion,7) : '---';

            /*$condicionesItem = array(
                'web_cotizacion_item.cotizacion_id' => $cotizacion->id
            );
            $resultadoItem = $this->m_web_cotizacion_item->mostrarDatos($condicionesItem);

            if(!empty($resultadoItem)){
                $n = 1;
                foreach($resultadoItem as $items){
                    $data['listadoItem'][] = array(
                        'numero' => $n,
                        'titulo' => ($items->titulo != '') ? $items->titulo : '', 
                        'precio' => ($items->precio != '') ? $items->precio : '',
                        'cantidad' => ($items->cantidad != '') ? $items->cantidad : '',
                    );
                    ++$n;
                }
            }*/

        } else {
            $data['observar_id'] = '';
        }

        /*
         * Impresión de páginas
         */
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $this->verificaAcceso);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/inter_header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/pagina/pedidos', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/inter_footer', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/footer', $data);
    }

    public function proceso($accion){
        switch($accion){
            case 'buscar':
                $codigo = $this->input->post('codigo');

                $error = '';
                $error .= valida_campo($codigo, 'not_empty|maxlength:25', 'Número de pedido');
                if($error != ''){ 
                    $message = sprintf(error_helper::msg()->msg201,$error);
                    echo alerta_error($message); 
                    EXIT; 
                }


                $urlSucces = base_url().'pedidos/codigo/'.$codigo;
                echo re_direccion($urlSucces); EXIT();
                break;
            default:

                return FALSE;

        }
    }

}