<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Web_login {

    private $items = array();

	public function __construct() {
        $this->ci =& get_instance();
        ini_set('memory_limit', '1024M');
        ini_set('max_execution_time', 0);
        ini_set('upload_max_filesize', '200M');

        $librerias = array('web/datos_privados');
        $helper = array();
        $modelos = array('m_web_clientes','m_logs_error');
        $this->ci->load->library($librerias);
        $this->ci->load->helper($helper);
        $this->ci->load->model($modelos);

        $this->items['carpetaProyecto'] = 'web';
        $this->items['baseUrl'] = base_url();
        $this->items['getUrl'] = base_url().$this->items['carpetaProyecto'].'/';
        $this->scriptVista = $this->ci->scripts->scriptVistaGeneral();
        $this->items = array_merge($this->items, $this->scriptVista);
    }

    public function proceso($usuario = '',$clave = ''){
        $countLog = 0;
        $errorLogSess = sessiones_helper::obtieneSesion('errorLogWeb');
        $errorLog = (!$errorLogSess) ? 0 : $errorLogSess;

        $intentosError = (int) 6;
        $tiempoBloqueoError = (int)( 5 * 60);
    	if($errorLog >= $intentosError){
            $condiciones = array(
                'logs_error.ip_address' => $this->ci->input->ip_address(),
                'logs_error.desbloqueo >=' => time()
            );
            $obtieneLogs = $this->ci->m_logs_error->mostrarDatos($condiciones);
            if(empty($obtieneLogs)){
                $columnaDatos = array(
                    'logs_error.ip_address' => $this->ci->input->ip_address(), 
                    'logs_error.usuario' => $usuario, 
                    'logs_error.clave' => $clave, 
                    'logs_error.fecha_registro' => time(), 
                    'logs_error.desbloqueo' => (int) (time() + $tiempoBloqueoError)
                );
                $this->ci->m_logs_error->insertar($columnaDatos);
            }
            $message = sprintf(error_helper::msg()->msg5,'IP: '.$this->ci->input->ip_address());
            echo alerta_error($message,4); EXIT(); 
        }else
        if(!$this->ci->m_web_clientes->verificaUsuarioActivo($usuario)) {
            $countLog = $errorLog;
            $countLog++;
            sessiones_helper::creaSesion('errorLogWeb', $countLog);
            $message = sprintf(error_helper::msg()->msg201, 'El usuario se encuentra inactivo');
            echo alerta_error($message); EXIT(); 
        } else
        if(!$this->ci->m_web_clientes->verificaAcceso($usuario, $clave)) {
            $countLog = $errorLog;
            $countLog++;
            sessiones_helper::creaSesion('errorLogWeb', $countLog);
            $message = sprintf(error_helper::msg()->msg3, 'E-mail y Clave');
            echo alerta_error($message); EXIT(); 
        }

        $accesoUsuario = $this->ci->m_web_clientes->exitoAcceso($usuario, $clave);

        if($accesoUsuario !== FALSE){
            $datos = array('sesionCliente' => 
                array(
                    'accesoTmpId' => $accesoUsuario[0]->id, 
                    'accesoTmpUsuario' => $accesoUsuario[0]->usuario, 
                    'accesoTmpNombre' => $accesoUsuario[0]->nombre, 
                    'accesoTmpCelular' => $accesoUsuario[0]->celular, 
                    'accesoTmpDireccion' => $accesoUsuario[0]->direccion,
                    'accesoTmpEmail' => $accesoUsuario[0]->email, 
                    'accesoTmpTiempo' => time() + 7200
                )
            );
            $this->ci->session->set_userdata($datos);
            $message = sprintf(error_helper::msg()->msg501, $accesoUsuario[0]->usuario);
            $urlSucces = $this->items['baseUrl'].'cliente/panel';
            echo alerta_exito($message,3,$urlSucces); EXIT();
        } else{
            $message = sprintf(error_helper::msg()->msg6);
            echo alerta_error($message); EXIT();
        }

    }



    public function validar_ip(){

        $obtieneLogs = $this->ci->m_logs_error->mostrarDatos( 

            array( 

                'logs_error.ip_address' => $this->ci->input->ip_address(), 

                'logs_error.desbloqueo >=' => time() 

            )

        );

        if(empty($obtieneLogs)){
            sessiones_helper::eliminaSesion('errorLogWeb');
        } else{
            echo show_404();
        }
    }

    public function salir_login(){
        sessiones_helper::destruyeInfoSesion('sesionCliente');
        echo re_direccion($this->items['getUrl']); EXIT;
    }

}