<?php

class Scripts {
    
    private $items = array();
    
    public function __construct() {
        $this->ci =& get_instance();

        $librerias = array();
        $helper = array();
        $modelos = array('m_configuracion');
        $this->ci->load->library($librerias);
        $this->ci->load->helper($helper);
        $this->ci->load->model($modelos);

        $this->items['baseUrl'] = base_url();
    }
    
    public function scriptVistaGeneral(){
        /* CONFIGURACION GENERAL DEL INSTALACION */
        $obtieneConfiguracion = $this->ci->m_configuracion->mostrarDatos(array('interna' => 'instalacion'));
        $valores = json_decode($obtieneConfiguracion[0]->atributos);
        $this->items['insIntentoError'] = (isset($valores->intentoError)) ? $valores->intentoError : 3;
        $this->items['insTiempoBloqueo'] = (isset($valores->tiempoBloqueo)) ? $valores->tiempoBloqueo : 1;
        $this->items['insDuracionCaptcha'] = (isset($valores->duracionCaptcha)) ? $valores->duracionCaptcha : 240;
        /* CONFIGURACION GENERAL DEL SISTEMA */
        $obtieneConfiguracion = $this->ci->m_configuracion->mostrarDatos(array('interna' => 'sistema'));
        $valores = json_decode($obtieneConfiguracion[0]->atributos);
        $this->items['sisInfoTituloEmpresa'] = (isset($valores->sisInfoTituloEmpresa)) ? $valores->sisInfoTituloEmpresa : 'Sistema';
        $this->items['sisInfoCorreo'] = (isset($valores->sisInfoCorreo)) ? $valores->sisInfoCorreo : 'alf199527@gmail.com';
        $this->items['sisFavicon'] = (isset($valores->sisFavicon) && $valores->sisFavicon != '') ? $valores->sisFavicon : 'sisFaviconDefecto.png';
        $this->items['sisLogoPrincipal'] = (isset($valores->sisLogoPrincipal) && $valores->sisLogoPrincipal != '') ? $valores->sisLogoPrincipal : 'sisLogoDefecto.png';

        $this->items['sisPieDePagina'] = (isset($valores->sisPieDePagina)) ? $valores->sisPieDePagina : 'Developer';
        /*  CONFIGURACION DEFECTO DEL SISTEMA */
        $this->items['proyectoTitulo'] = $this->items['sisInfoTituloEmpresa'];
        $this->items['proyectoFavicon'] = base_url().'crop/35/35/logo-'.$this->items['sisFavicon'];
        $this->items['proyectoLogo'] = base_url().'crop/42/42/logo-'.$this->items['sisLogoPrincipal'];
        $this->items['proyectoPieDePagina'] = $this->items['sisPieDePagina'];

        return $this->items;
    }
       
}
