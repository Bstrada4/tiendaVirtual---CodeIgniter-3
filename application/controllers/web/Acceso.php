<?php
@header('X-Frame-Options: SAMEORIGIN');
@header('Referrer-Policy: no-referrer');
@header('X-Powered-By: Apolomultimedia');

class Acceso extends CI_Controller { 
    private $resultado;
    private $items = array();

    public function __construct() {

        parent::__construct();

        ini_set('memory_limit', '1024M');
        ini_set('max_execution_time', 0);
        ini_set('upload_max_filesize', '200M');

        $librerias = array('web/datos_privados','web_login');
        $helper = array();
        $modelos = array();
        $this->load->library($librerias);
        $this->load->helper($helper);
        $this->load->model($modelos);

        $this->items['carpetaProyecto'] = 'web';
        $this->items['baseUrl'] = base_url();
        $this->items['getUrl'] = base_url().$this->items['carpetaProyecto'].'/';
        $this->scriptVista = $this->scripts->scriptVistaGeneral();
        $this->items = array_merge($this->items, $this->scriptVista);
        crawler_helper::detectar_bot();     
    }



    public function proceso($accion){
        switch($accion){
            case 'login':
                /* DATOS DE AJAX PRE PROCESADOS */
                $usuario = $this->input->post('usuario');
                $clave = $this->input->post('clave');
                /* VALIDACION DE PARAMETROS */
                $error = '';
                $error .= valida_campo($usuario, 'email|not_empty|maxlength:90', 'E-mail');
                $error .= valida_campo($clave, 'not_empty|maxlength:30', 'Contraseña');
                if($error != ''){ 
                    $message = sprintf(error_helper::msg()->msg201,$error);
                    echo alerta_error($message); 
                    EXIT; 
                }
                $this->web_login->proceso($usuario,$clave);
                break;
            case 'registrar':
                /* DATOS DE AJAX PRE PROCESADOS */
                $nombre = $this->complementos->xxsclean($this->input->post('nombre',TRUE));
                $celular = $this->complementos->xxsclean($this->input->post('celular',TRUE));
                $email = $this->complementos->xxsclean($this->input->post('email',TRUE));
                $contrasena = $this->complementos->xxsclean($this->input->post('contrasena',TRUE));
                $llave = $this->complementos->aleatorio(30,TRUE,TRUE,TRUE,TRUE) . time();
                $llaveFinal = md5($llave);

                /* VALIDACION DE PARAMETROS */
                $error = '';
                $error .= valida_campo($nombre, 'not_empty|maxlength:115', 'Nombre');
                $error .= valida_campo($celular, 'minlength:5|maxlength:20', 'Celular');
                $error .= valida_campo($email, 'email|not_empty|maxlength:90', 'Email');
                $error .= valida_campo($contrasena, 'not_empty|minlength:5|maxlength:30', 'Contraseña');

                if($error != ''){ 
                    $message = sprintf(error_helper::msg()->msg201,$error);
                    echo alerta_error($message); 
                    EXIT; 
                }
                $condicionCliente = array(
                    'web_clientes.email' => $email, 
                );
                $listarCliente = $this->m_web_clientes->mostrarDatos($condicionCliente);
                if(empty($listarCliente)){
                	$obtieneConfiguracion = $this->m_configuracion->mostrarDatos(array('interna' => 'sistema'));
            		$valores = json_decode($obtieneConfiguracion[0]->atributos);
                    /* #### CORREO REGISTRO #### */
                    $filename = '';
                    $datos = array(
                        'contactoNombre' =>  !empty($nombre) ? $nombre : '',
                        'contactoCelular' => !empty($celular) ? $celular : '',
                        'contactoEmail' => !empty($email) ? $email : '',
                        'baseUrl' => base_url(),
                        'activar' => base_url().'recuperar/activar/'.$llaveFinal,
                        'contactoFecha' => date("Y"),

                    );

                    $message = $this->parser->parse('correo/registro', $datos ,TRUE);
                    $subject = "ACTIVAR CUENTA ARAKAKY'S " ;
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
                        $columnaDatos = array(
                            'nombre' => $nombre,
                            'celular' => $celular,
                            'email' => $email,
                            'usuario' => $email,
                            'clave' => password_hash($contrasena, PASSWORD_DEFAULT),
                            'fecha_registro' => time(),
                            'eliminacion_logica' => 0,
                            'llave'=> $llaveFinal
                        );
                        $resultado = $this->m_web_clientes->insertar($columnaDatos);
                        if($resultado){
                            $message = sprintf(error_helper::msg()->msg201,'Se envió un correo de activación, si no recibe el correo revise su bandeja de spam');
                            echo alerta_exito($message,5); EXIT();
                        } 
                    }  
                } else {
                    echo refrescar(3); EXIT();
                }

                break;
            case 'logout':
                $this->web_login->salir_login();
                break;
            default:

                return FALSE;

        }

    }

    

}

