<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_login {

    private $items = array();

	public function __construct() {
        $this->ci =& get_instance();
        ini_set('memory_limit', '1024M');
        ini_set('max_execution_time', 0);
        ini_set('upload_max_filesize', '200M');

        $librerias = array('dashboard/datos_privados');
        $helper = array();
        $modelos = array('m_usuario','m_logs_error');
        $this->ci->load->library($librerias);
        $this->ci->load->helper($helper);
        $this->ci->load->model($modelos);

        $this->items['carpetaProyecto'] = 'dashboard';
        $this->items['baseUrl'] = base_url();
        $this->items['getUrl'] = base_url().$this->items['carpetaProyecto'].'/';
        $this->scriptVista = $this->ci->scripts->scriptVistaGeneral();
        $this->items = array_merge($this->items, $this->scriptVista);
    }

    public function proceso($usuario = '',$clave = ''){
        $countLog = 0;
        $errorLogSess = sessiones_helper::obtieneSesion('errorLog');
        $errorLog = (!$errorLogSess) ? 0 : $errorLogSess;

        $intentosError = (int) $this->items['insIntentoError'];
        $tiempoBloqueoError = (int) ($this->items['insTiempoBloqueo'] * 60);
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
            echo alerta_error($message,2); EXIT(); 
        } else
        if(!$this->ci->m_usuario->verificaAcceso($usuario, $clave)) {
            $countLog = $errorLog;
            $countLog++;
            sessiones_helper::creaSesion('errorLog', $countLog);
            $message = sprintf(error_helper::msg()->msg3, 'Usuario y Clave');
            echo alerta_error($message); EXIT(); 
        }

        $accesoUsuario = $this->ci->m_usuario->exitoAcceso($usuario, $clave);
        if($accesoUsuario !== FALSE){
            $datos = array('sesionUsuario' => 
                array(
                    'accesoTmpId' => $accesoUsuario[0]->id, 
                    'accesoTmpUsuario' => $accesoUsuario[0]->usuario, 
                    'accesoTmpNivel' => $accesoUsuario[0]->rolId, 
                    'accesoTmpTiempo' => time() + 7200
                )
            );
            $this->ci->session->set_userdata($datos);
            $message = sprintf(error_helper::msg()->msg501, $accesoUsuario[0]->usuario);
            $urlSucces = $this->items['getUrl'].'principal/panel';
            echo alerta_exito($message,2,$urlSucces); EXIT();
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
            sessiones_helper::eliminaSesion('errorLog');
        } else{
            echo show_404();
        }
    }

    public function salir_login(){
        sessiones_helper::destruyeInfoSesion('sesionUsuario');
        echo re_direccion($this->items['getUrl']); EXIT;
    }
}