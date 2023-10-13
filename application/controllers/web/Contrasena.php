<?php
@session_cache_limiter('private, must-revalidate');
@header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
@header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
@header("Cache-Control: no-store, no-cache, must-revalidate");
@header("Cache-Control: post-check=0, pre-check=0", FALSE);
@header("Pragma: no-cache");
error_reporting(0);
class Contrasena extends CI_Controller {

    private $items = array();
    public function __construct() {
        parent::__construct();
        ini_set('memory_limit', '1024M');
        ini_set('max_execution_time', 0);
        ini_set('upload_max_filesize', '200M');
        /*
         * Configuración para librerias, helpers y modelos
         */
        $librerias = array('web/datos_privados','web_login');
        $helper = array();
        $modelos = array('m_web_clientes');
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



    

    public function recuperar() {
        //CABEZERA
        $data['titulo_red'] = "El mejor pollo | Arakaky's | Avicola | Recuperar contraseña";
        $data['palabrasClaves'] = '';
        $data['metaDescripcion'] = '';
        //REDES SOCIALES
        $data['tituloRedes'] = '';
        $data['descripcionRedes'] = '';
        $data['rutaRedes'] = base_url() .'perfil-cliente';
        $data['imagenRedes'] = base_url() .'';

        $data['css_interna'] = 'recuperar-contrasena-min.css';
        $data['owl_carousel'] = 'active';

        /*
         * Impresión de páginas
         */
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $this->verificaAcceso);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/inter_header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/pagina/recuperar_contrasena', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/inter_footer', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/footer', $data);
    }

    public function recuperar_contrasena($key = '') {
        //CABEZERA
        $data['titulo_red'] = "El mejor pollo | Arakaky's | Avicola | Actualizar contraseña";
        $data['palabrasClaves'] = '';
        $data['metaDescripcion'] = '';

        $data['css_interna'] = 'recuperar-contrasena-min.css';
        $data['css_interna'] = 'formulario-envio-min.css';
        $data['owl_carousel'] = 'active';

        $condiciones = array(
            'web_clientes.llave' => $key
        );
        $resultado = $this->m_web_clientes->mostrarDatos($condiciones);
        if(!empty($resultado)){
            $cliente = $resultado[0];
            sessiones_helper::creaSesion('contrasenaActualizada', $cliente->id);
        } else {
            echo re_direccion(base_url()); 
            EXIT;
        }

        /*
         * Impresión de páginas
         */
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $this->verificaAcceso);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/inter_header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/pagina/actualizar_contrasena', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/inter_footer', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/footer', $data);
    }

    public function proceso($accion,$id){
        switch($accion){
            case 'verificar':
                /* DATOS DE AJAX PRE PROCESADOS */
                $email = $this->complementos->xxsclean($this->input->post('email',TRUE));
                /* VALIDACION DE PARAMETROS */
                $error = '';
                $error .= valida_campo($email, 'email|not_empty|maxlength:90', 'Email');

                if($error != ''){ 
                    $message = sprintf(error_helper::msg()->msg201,$error);
                    echo alerta_error($message); 
                    EXIT; 
                }

                $condicionCliente = array(
                    'web_clientes.email' => $email, 
                );

                $listarCliente = $this->m_web_clientes->mostrarDatos($condicionCliente);

                if(!empty($listarCliente)){
                    $obtieneConfiguracion = $this->m_configuracion->mostrarDatos(array('interna' => 'sistema'));
                    $valores = json_decode($obtieneConfiguracion[0]->atributos);
                    /* #### CORREO REGISTRO #### */
                    $datos = array(
                        'contactoEmail' => !empty($email) ? $email : '',
                        'baseUrl' => base_url(),
                        'activar' => base_url().'recuperar-contrasena/'.$listarCliente[0]->llave,
                        'contactoFecha' => date("Y"),
                    );
                    $message = $this->parser->parse('correo/recuperar', $datos ,TRUE);
                    $subject = "RECUPERAR CUENTA ARAKAKY'S " ;
                    $uid= md5(uniqid(time()));
                    $eol = PHP_EOL;
                    $bound="--".$uid.$eol;
                    $last_bound="--".$uid."--".$eol;
                    $header = '';
                    $header = "From: Arakaky's <".$valores->sisInfoCorreo.">".$eol;
                    $header .= "Reply-To: ".$valores->sisInfoCorreo.$eol;
                    $header .= "MIME-Version: 1.0\n";
                    $header .= "Content-Type: multipart/mixed; boundary=\"" . $uid . "\"\n\n";
                    $emessage = "--" . $uid . "\n";
                    $emessage .= "Content-type:text/html; charset=iso-8859-1\n";
                    $emessage .= "Content-Transfer-Encoding: 7bit\n\n";
                    $emessage .= $message . "\n\n";
                    $send = mail($email, $subject, $emessage, $header);
                    /* #### FINAL CORREO REGISTRO #### */
                    if($send){
                        $message = sprintf(error_helper::msg()->msg201,'Se envío correo de recuperación');
                        echo alerta_exito($message); EXIT();
                    }  
                } else {
                    echo refrescar(3); EXIT();
                }
                break;
            case 'actualizar':
                /* DATOS DE AJAX PRE PROCESADOS */
                $clienteId = sessiones_helper::obtieneSesion('contrasenaActualizada');
                $clave = $this->complementos->xxsclean($this->input->post('clave',TRUE));
                $reclave = $this->complementos->xxsclean($this->input->post('reclave',TRUE));
                $llave = $this->complementos->aleatorio(30,TRUE,TRUE,TRUE,TRUE) . time();
                $llaveFinal = md5($llave);
                /* VALIDACION DE PARAMETROS */
                $error = '';
                $error .= valida_campo($clave, 'minlength:5|maxlength:30', 'Nueva Contraseña');
                $error .= valida_campo($reclave, 'not_empty|minlength:5|maxlength:30', 'Confirmar contraseña');
                $error .= valida_campo($clave, 'password:'.$reclave, 'Contraseña');

                if($error != ''){ 
                    $message = sprintf(error_helper::msg()->msg201,$error);
                    echo alerta_error($message); 
                    EXIT; 
                }

                $claveEncryptada = password_hash($reclave, PASSWORD_DEFAULT);

                $columnaDatos = array(
                    'clave' => $claveEncryptada,
                    'fecha_modificacion' => time(),
                    'llave'=> $llaveFinal
                );

                $resultado = $this->m_web_clientes->actualizar($columnaDatos, array( 'web_clientes.id' => $clienteId ));
                if($resultado){
                    $message = sprintf(error_helper::msg()->msg201,'Contraseña Actualizada');
                    $redUrl = base_url();
                    echo alerta_exito($message,3,$redUrl);
                }   
                break;
            case 'activar':
                /* DATOS DE AJAX PRE PROCESADOS */
                $key = $id;
                $condicionCliente = array(
                    'web_clientes.eliminacion_logica' => 0, 
                    'web_clientes.llave' => $id, 
                );
                $listarCliente = $this->m_web_clientes->mostrarDatos($condicionCliente);
                if(!empty($listarCliente)){
                    $message = ( 'Su cuenta se activo correctamente: '. $listarCliente[0]->usuario);
                    echo alertas($message); 
                    $llave = $this->complementos->aleatorio(30,TRUE,TRUE,TRUE,TRUE) . time();
                    $llaveFinal = md5($llave);
                    $columnaDatos = array(
                        'web_clientes.eliminacion_logica' => 1, 
                        'llave' => $llaveFinal
                    );
                    $resultado = $this->m_web_clientes->actualizar($columnaDatos, array( 'web_clientes.id' => $listarCliente[0]->id ));
                    if($resultado){
                        echo re_direccion(base_url()); EXIT();
                    }
                } else{
                    $message = 'Hubo problemas en el acceso';
                    echo alertas($message);
                    echo re_direccion(base_url());EXIT();
                }
                break;
            default:
                return FALSE;
        }

    }



}