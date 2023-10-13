<?php
@header('X-Frame-Options: SAMEORIGIN');
@header('Referrer-Policy: no-referrer');
@header('X-Powered-By: Apolomultimedia');

class Principal extends CI_Controller {
    
    private $resultado;
    private $items = array();
    
    public function __construct() {
        parent::__construct();

        $librerias = array('dashboard/datos_privados');
        $helper = array();
        $modelos = array('m_web_nutricion','m_web_mitos','m_web_recetas','m_web_productos','m_web_clientes');
        $this->load->library($librerias);
        $this->load->helper($helper);
        $this->load->model($modelos);

        $this->items['carpetaProyecto'] = 'dashboard';
        $this->items['baseUrl'] = base_url();
        $this->items['getUrl'] = base_url().$this->items['carpetaProyecto'].'/';

        $this->scriptVista = $this->scripts->scriptVistaGeneral();
        $this->items = array_merge($this->items, $this->scriptVista);
        $this->accesoSession = sessiones_helper::obtieneInfoSesion('sesionUsuario');
        $this->verificaAcceso = $this->datos_privados->verificaAcceso();
        $this->items['panel_active'] = 'mm-active';
    }
    
    public function panel(){
        $data['tituloEncabezado'] = $this->items['sisInfoTituloEmpresa'] .' - Principal';
    
        $data['total_nutricion'] = $this->m_web_nutricion->contador();
        $data['total_receta'] = $this->m_web_recetas->contador();
        $data['total_cliente'] = $this->m_web_clientes->contador();
        $data['total_productos'] = $this->m_web_productos->contador();

        $data = array_merge($data, $this->items);
        $data = array_merge($data, $this->verificaAcceso);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/page/panel_principal', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_footer', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/footer', $data);
    }
    
}
