<?php
@header('X-Frame-Options: SAMEORIGIN');
@header('Referrer-Policy: no-referrer');
@header('X-Powered-By: Apolomultimedia');

class SistemaConfig extends CI_Controller{
    
    private $resultado;
    private $items = array();
    
    public function __construct() {
        parent::__construct();
        ini_set('memory_limit', '1024M');
        ini_set('max_execution_time', 0);
        ini_set('upload_max_filesize', '200M');

        $librerias = array('dashboard/datos_privados');
        $helper = array();
        $modelos = array();
        $this->load->library($librerias);
        $this->load->helper($helper);
        $this->load->model($modelos);
    
        $this->items['miModulo'] = 'sistemaconfig';
        $this->items['carpetaProyecto'] = 'dashboard';
        $this->items['baseUrl'] = base_url();
        $this->items['getUrl'] = base_url().$this->items['carpetaProyecto'].'/';
        $this->scriptVista = $this->scripts->scriptVistaGeneral();
        $this->items = array_merge($this->items, $this->scriptVista);
        $this->accesoSession = sessiones_helper::obtieneInfoSesion('sesionUsuario');
        $this->verificaAcceso = $this->datos_privados->verificaAcceso();
        if($this->accesoSession->accesoTmpNivel != 500){
            echo alertas('No tiene acceso a este módulo.');
            echo re_direccion($this->items['getUrl'].'principal/panel'); EXIT(); 
        }
    }
    
    public function panel(){
        $data['tituloEncabezado'] = $this->items['sisInfoTituloEmpresa'] .' - Panel sistema';

        $configuracion = $this->m_configuracion->mostrarDatos(array('interna' => 'sistema'));
        $valores = json_decode($configuracion[0]->atributos);

        $data['config_titulo'] = (isset($valores->sisInfoTituloEmpresa)) ? $valores->sisInfoTituloEmpresa : '';
        $data['config_correo'] = (isset($valores->sisInfoCorreo)) ? $valores->sisInfoCorreo : '';
        $data['config_pie'] = (isset($valores->sisPieDePagina)) ? $valores->sisPieDePagina : '';

        $data = array_merge($data, $this->items);
        $data = array_merge($data, $this->verificaAcceso);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/page/panel_sistemaConfig', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_footer', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/footer', $data);
    }

    public function acceso(){
        $data['tituloEncabezado'] = $this->items['sisInfoTituloEmpresa'] .' - Panel sistema';

        $configuracion = $this->m_configuracion->mostrarDatos(array('interna' => 'sistema'));
        $valores = json_decode($configuracion[0]->atributos);

        $obtieneConfiguracion = $this->m_configuracion->mostrarDatos(array('interna' => 'instalacion'));
        $valores = json_decode($obtieneConfiguracion[0]->atributos);
        $data['config_error'] = (isset($valores->intentoError)) ? $valores->intentoError : 3;
        $data['config_bloqueo'] = (isset($valores->tiempoBloqueo)) ? $valores->tiempoBloqueo : 1;
        $data['config_captcha'] = (isset($valores->duracionCaptcha)) ? $valores->duracionCaptcha : 240;

        $data = array_merge($data, $this->items);
        $data = array_merge($data, $this->verificaAcceso);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/page/panel_accesoConfig', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_footer', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/footer', $data);
    }
    
    public function proceso($accion){
        switch($accion){
            case 'panel':
                if(!$this->datos_privados->seguridadAccionModulo($this->accesoSession->accesoTmpNivel, $this->items['miModulo'], 'panel')){
                    $message = sprintf(error_helper::msg()->msg6);
                    echo alerta_error($message);EXIT; 
                }

                $msjError = TRUE;
                $sisInfoTituloEmpresa = $this->complementos->xxsclean($this->input->post('sisInfoTituloEmpresa',TRUE));
                $sisInfoCorreo = $this->complementos->xxsclean($this->input->post('sisInfoCorreo',TRUE));
                $sisPieDePagina = $this->complementos->xxsclean($this->input->post('sisPieDePagina',TRUE));
                $favicon = $this->complementos->obtenerArchivo('imagenFavicon', 'unico');

                $error = '';
                $error .= valida_campo($sisInfoTituloEmpresa, 'not_empty|minlength:5|maxlength:50', 'Título de empresa');
                $error .= valida_campo($sisInfoCorreo, 'not_empty|email|minlength:5|maxlength:55', 'Correo');
                $error .= valida_campo($sisPieDePagina, 'not_empty|maxlength:60', 'Pie de página');
                if($error != ''){ 
                    $message = sprintf(error_helper::msg()->msg201,$error);
                    echo alerta_error($message);EXIT; 
                }

                $configuracion = $this->m_configuracion->mostrarDatos(array('interna' => 'sistema'));
                $valores = json_decode($configuracion[0]->atributos);
                if($favicon !== FALSE){
                    $error = valida_imagen($favicon, 'maxwidth:300|maxheight:300|maxsize:1', 'Favicon');
                    if($error != ''){
                        $message = sprintf(error_helper::msg()->msg201,$error);
                        echo alerta_error($message);EXIT; 
                    } else{
                        $opciones = array(
                            'marcaTipo' => FALSE,
                            'marcaInfo' => FALSE,
                            'ajuste' => 'w',
                            'ajusteImagen' => 50,
                            'desenfocado' => FALSE,
                            'cantidadCopia' => array()
                        );
                        $obtieneFavicon = $this->complementos->almacenarImagen($favicon, 'public/imagen/logo', $opciones, TRUE);
                        if(isset($valores->sisFavicon) && ($valores->sisFavicon != 'sisFaviconDefecto.png') ){
                            $this->complementos->eliminarArchivo($valores->sisFavicon, 'public/imagen/logo');
                        }
                    }
                } else{
                    $obtieneFavicon = (isset($valores->sisFavicon)) ? $valores->sisFavicon : 'sisFaviconDefecto.png';
                }
                $jsonEncode = array(
                    'sisInfoTituloEmpresa' => $sisInfoTituloEmpresa,     
                    'sisInfoCorreo' => $sisInfoCorreo,
                    'sisPieDePagina' => $sisPieDePagina,
                    'sisFavicon' => $obtieneFavicon
                );

                $columnaDatos = array(
                    'atributos' => json_encode($jsonEncode, TRUE)
                );
                if($this->m_configuracion->actualizar($columnaDatos, array( 'configuracion.interna' => 'sistema' ))){
                    $message = sprintf(error_helper::msg()->msg503,'configuración');
                    echo alerta_exito($message,2);EXIT; 
                }
                if($msjError){
                    $message = sprintf(error_helper::msg()->msg201,$error);
                    echo alerta_error($message);EXIT; 
                }
                break;
            case 'acceso':
                if(!$this->datos_privados->seguridadAccionModulo($this->accesoSession->accesoTmpNivel, $this->items['miModulo'], 'acceso')){
                    $message = sprintf(error_helper::msg()->msg6);
                    echo alerta_error($message);EXIT; 
                }
                $msjError = TRUE;
                $intentoError = $this->complementos->xxsclean($this->input->post('intentoError',TRUE));
                $tiempoBloqueo = $this->complementos->xxsclean($this->input->post('tiempoBloqueo',TRUE));
                $duracionCaptcha = $this->complementos->xxsclean($this->input->post('duracionCaptcha',TRUE));

                $error = '';
                $error .= valida_campo($intentoError, 'not_empty|not_space|numeric|minlength:1|maxlength:2', 'Intentos erroneos');
                $error .= valida_campo($tiempoBloqueo, 'not_empty|not_space|numeric|minlength:1|maxlength:2', 'Tiempo de bloqueo');
                $error .= valida_campo($duracionCaptcha, 'not_empty|not_space|numeric|minlength:1|maxlength:4', 'Duración del captcha');
                if($error != ''){ 
                    $message = sprintf(error_helper::msg()->msg201,$error);
                    echo alerta_error($message);EXIT; 
                }

                $jsonEncode = array(
                    'intentoError' => $intentoError,     
                    'tiempoBloqueo' => $tiempoBloqueo,
                    'duracionCaptcha' => $duracionCaptcha
                );

                $columnaDatos = array(
                    'atributos' => json_encode($jsonEncode, TRUE)
                );
                if($this->m_configuracion->actualizar($columnaDatos, array( 'configuracion.interna' => 'instalacion' ))){
                    $message = sprintf(error_helper::msg()->msg503,'configuración');
                    echo alerta_exito($message,2);EXIT; 
                }
                if($msjError){
                    $message = sprintf(error_helper::msg()->msg201,$error);
                    echo alerta_error($message);EXIT; 
                }
                break;
            default:
                return FALSE;
        }
    }

}