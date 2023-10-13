<?php
@session_cache_limiter('private, must-revalidate');
@header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
@header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
@header("Cache-Control: no-store, no-cache, must-revalidate");
@header("Cache-Control: post-check=0, pre-check=0", FALSE);
@header("Pragma: no-cache");
//error_reporting(0);

class Envio extends CI_Controller {

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
        $modelos = array('m_web_cotizacion','m_web_cotizacion_item');
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

    public function formulario() {
        //CABEZERA
        $data['titulo_red'] = "El mejor pollo | Arakaky's | Avicola | Formulario de envío";
        $data['palabrasClaves'] = '';
        $data['metaDescripcion'] = '';
        //REDES SOCIALES
        $data['tituloRedes'] = '';
        $data['descripcionRedes'] = '';
        $data['rutaRedes'] = base_url() .'formulario_envio';
        $data['imagenRedes'] = base_url() .'';

        $data['css_interna'] = 'formulario-envio-min.css';
        $data['owl_carousel'] = 'active';

        /*
         * Impresión de páginas
         */

        $data = array_merge($data, $this->items);
        $data = array_merge($data, $this->verificaAcceso);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/inter_header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/pagina/formulario_envio', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/inter_footer', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/footer', $data);

    }



    public function cotizar(){
        $varCliente = sessiones_helper::obtieneInfoSesion('sesionCliente');
        $cart = $this->cart->contents();

        if ($cart !== FALSE) {
            $obtieneConfiguracion = $this->m_configuracion->mostrarDatos(array('interna' => 'sistema'));
            $valores = json_decode($obtieneConfiguracion[0]->atributos);

            $nombre = $this->complementos->xxsclean($this->input->post('nombre',TRUE));
            $celular = $this->complementos->xxsclean($this->input->post('celular',TRUE));
            $direccion = $this->complementos->xxsclean($this->input->post('direccion',TRUE));
            $email = $this->complementos->xxsclean($this->input->post('email',TRUE));
            $mensaje = $this->complementos->xxsclean($this->input->post('mensaje',TRUE));

            /* VALIDACION DE PARAMETROS */
            $error = '';
            $error .= valida_campo($nombre, 'not_empty|maxlength:115', 'Nombre');
            $error .= valida_campo($celular, 'minlength:5|maxlength:20', 'Celular');
            $error .= valida_campo($direccion, 'maxlength:155', 'Dirección');
            $error .= valida_campo($email, 'email|not_empty|maxlength:90', 'Email');
            $error .= valida_campo($mensaje, 'maxlength:300', 'Mensaje');

            if($error != ''){ 
                $message = sprintf(error_helper::msg()->msg201,$error);
                echo alerta_error($message); 
                EXIT; 
            }

            $columnaDatos = array(
                'customer_id'=> $varCliente->accesoTmpId,
                'pedido_id'=> 'COT-'.$this->complementos->aleatorio(12,FALSE,TRUE,TRUE,FALSE),
                'nombre' => $nombre,
                'telefono' => $celular,
                'email' => $email,
                'direccion' => $direccion,
                'mensaje' => $mensaje,
                'total' => $this->cart->total(),
                'fecha_registro' => time(),
                'estado' => 1,
                'eliminacion_logica'=>0
            );
            $lastId = $this->m_web_cotizacion->insertar($columnaDatos, TRUE);
            if($lastId !== FALSE){
                $cart_items = '';
                foreach ($cart as $items) {
                    $itemProductos = array(
                        'cotizacion_id' => $lastId,
                        'producto_id' => $items['id'],
                        'titulo' => $items['name'],
                        'precio' => $items['price'],
                        'cantidad' => $items['qty'],
                    );
                    $this->m_web_cotizacion_item->insertar($itemProductos);
                    $cart_items .=' <tr>
                        <td width="500"><b>'.$items['qty'] .'</b>x<b>'. $items['name'].'</b></td><td width="150">S/'.$items['price']* $items['qty'].'</td>
                    </tr>';
                }

                /* #### CORREO COTIZACION #### */
                    $filename = '';
                    $datos = array(
                        'contactoNombre' =>  !empty($nombre) ? $nombre : '',
                        'contactoCelular' => !empty($celular) ? $celular : '',
                        'contactoEmail' => !empty($email) ? $email : '',
                        'contactoDireccion' => !empty($celular) ? $celular : '',
                        'contactoMensaje' => !empty($mensaje) ? $mensaje : '',
                        'cart_items' => $cart_items,
                        'cart_total' => $this->cart->total(),
                        'baseUrl' => base_url(),
                        'contactoFecha' => date("Y"),
                    );
                    $message = $this->parser->parse('correo/cotizacion', $datos ,TRUE);
                    $subject = "COTIZACION ARAKAKY'S " ;
                    $uid= md5(uniqid(time()));
                    $eol = PHP_EOL;
                    $bound="--".$uid.$eol;
                    $last_bound="--".$uid."--".$eol;
                    $header = '';
                    $header = "From: ".$nombre." <".$email.">".$eol;
                    $header .= "Reply-To: ".$email.$eol;
                    $header .= "BCC: programmer19@apolomultimedia.com".$eol;
                    //$header .= "Return-Path: The Sender <".$email.">".$eol;
                    $header .= "Organization: ARAKAKY'S\r\n";
                    $header .= "MIME-Version: 1.0\n";
                    $header .= "Content-Type: multipart/mixed; boundary=\"" . $uid . "\"\n\n";
                    $emessage = "--" . $uid . "\n";
                    $emessage .= "Content-type:text/html; charset=iso-8859-1\n";
                    //$emessage .= "Content-type: text/html; charset=utf-8\r\n";
                    //$emessage .= "X-Priority: 3\r\n";
                    $emessage .= "Content-Transfer-Encoding: 7bit\n\n";
                    $emessage .= $message . "\n\n";

                    $send = mail($valores->sisInfoCorreo, $subject, $emessage, $header);

                    /* #### FINAL CORREO REGISTRO #### */

                    if($send){
                        $this->cart->destroy();
                        $message = sprintf(error_helper::msg()->msg201,'Se envío su cotización');
                        $urlSucces = base_url().'cotizacion-enviada';
                        echo alerta_exito($message,2,$urlSucces); EXIT();
                    } 

            }

        } else {

            $message = sprintf(error_helper::msg()->msg201,'No hay productos selecionados');

            echo alerta_error($message); EXIT();

        }

    }



}