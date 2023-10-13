<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datos_privados {

    private $items = array();

	public function __construct() {
        $this->ci =& get_instance();
        ini_set('memory_limit', '1024M');
        ini_set('max_execution_time', 0);
        ini_set('upload_max_filesize', '200M');

        $librerias = array('web/scripts');
        $helper = array();
        $modelos = array('m_web_clientes');
        $this->ci->load->library($librerias);
        $this->ci->load->helper($helper);
        $this->ci->load->model($modelos);
        $this->ci->accesoSession = sessiones_helper::obtieneInfoSesion('sesionCliente');

        $this->scriptVista = $this->ci->scripts->scriptVistaGeneral();
        $this->items = array_merge($this->items, $this->scriptVista);

        $this->items['carpetaProyecto'] = 'web';
        $this->items['baseUrl'] = base_url();
        $this->items['getUrl'] = base_url().$this->items['carpetaProyecto'].'/';
    }

    public function verificaAcceso(){
        $data = array();
        if(!empty($this->ci->accesoSession->accesoTmpId)){
            $condiciones = array( 'web_clientes.id' => $this->ci->accesoSession->accesoTmpId, 'web_clientes.eliminacion_logica' => 1 );
            $obtieneUsuario = $this->ci->m_web_clientes->mostrarDatos($condiciones);
            if(!empty($obtieneUsuario)){
                $obtieneUsuario = $obtieneUsuario[0];
                $obtieneImagen = ($obtieneUsuario->imagen != '') ? $obtieneUsuario->imagen : 'empty.png';
                $data['accesoTmpId'] = $obtieneUsuario->id;
                $data['accesoTmpImagen'] =  base_url().'crop/150/150/clientes-'.$obtieneImagen;
                $data['accesoTmpNombre'] = $obtieneUsuario->nombre;
                $data['accesoTmpCelular'] = $obtieneUsuario->celular;
                $data['accesoTmpDireccion'] = $obtieneUsuario->direccion;
                $data['accesoTmpEmail'] = $obtieneUsuario->email;
            } else {
                sessiones_helper::destruyeInfoSesion('sesionCliente');
                echo re_direccion($this->items['baseUrl']); 
                EXIT();
            }

        }
        return $data;
        
    }

    public function verificaNoAcceso(){
        if(empty($this->ci->accesoSession->accesoTmpId)){
            echo re_direccion($this->items['baseUrl']); exit;
        }
    }

}

