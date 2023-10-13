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

        $librerias = array('dashboard/datos_privados','admin_login');
        $helper = array();
        $modelos = array();
        $this->load->library($librerias);
        $this->load->helper($helper);
        $this->load->model($modelos);

        $this->items['carpetaProyecto'] = 'dashboard';
        $this->items['baseUrl'] = base_url();
        $this->items['getUrl'] = base_url().$this->items['carpetaProyecto'].'/';
        $this->scriptVista = $this->scripts->scriptVistaGeneral();
        $this->items = array_merge($this->items, $this->scriptVista);
        crawler_helper::detectar_bot();     
    }

    public function panel()
    {
        $data['tituloEncabezado'] = $this->items['sisInfoTituloEmpresa'] .' - Login';
        $countLog = 1;
        $this->datos_privados->verificaNoAcceso();
        $this->admin_login->validar_ip();
        
        $data = array_merge($data, $this->items);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/page/panel_login', $data);
    }

    public function proceso($accion){
        switch($accion){
            case 'login':
                /* DATOS DE AJAX PRE PROCESADOS */
                $usuario = $this->input->post('usuario');
                $clave = $this->input->post('clave');
                /* VALIDACION DE PARAMETROS */
                $error = '';
                $error .= valida_campo($usuario, 'not_empty|alnum|maxlength:30', 'Usuario');
                $error .= valida_campo($clave, 'not_empty|maxlength:30', 'Contraseña');
                if($error != ''){ 
                    $message = sprintf(error_helper::msg()->msg201,$error);
                    echo alerta_error($message); 
                    EXIT; 
                }
                $this->admin_login->proceso($usuario,$clave);
                break;
            case 'logout':
                $this->admin_login->salir_login();
                break;
            default:
                return FALSE;
        }
    }
    
}
