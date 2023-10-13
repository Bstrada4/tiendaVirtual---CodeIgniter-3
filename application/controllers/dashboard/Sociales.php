<?php
@header('X-Frame-Options: SAMEORIGIN');
@header('Referrer-Policy: no-referrer');
@header('X-Powered-By: Apolomultimedia');

class Sociales extends CI_Controller{
    
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
    
        $this->items['miModulo'] = 'sociales';
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
        $data['tituloEncabezado'] = $this->items['sisInfoTituloEmpresa'] .' - Panel Redes Sociales';

        $configuracion = $this->m_configuracion->mostrarDatos(array('interna' => 'sociales'));
        $valores = json_decode($configuracion[0]->atributos);

        $data['instagram'] = (isset($valores->instagram)) ? $valores->instagram : '';
        $data['twitter'] = (isset($valores->twitter)) ? $valores->twitter : '';
        $data['facebook'] = (isset($valores->facebook)) ? $valores->facebook : '';
        $data['youtube'] = (isset($valores->youtube)) ? $valores->youtube : '';

        $data = array_merge($data, $this->items);
        $data = array_merge($data, $this->verificaAcceso);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/page/panel_sociales', $data);
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
                $instagram = $this->complementos->xxsclean($this->input->post('instagram',TRUE));
                $twitter = $this->complementos->xxsclean($this->input->post('twitter',TRUE));
                $facebook = $this->complementos->xxsclean($this->input->post('facebook',TRUE));
                $youtube = $this->complementos->xxsclean($this->input->post('youtube',TRUE));

                $error = '';
                $error .= valida_campo($instagram, 'url|maxlength:160', 'Instagram');
                $error .= valida_campo($twitter, 'url|maxlength:160', 'Twitter');
                $error .= valida_campo($facebook, 'url|maxlength:160', 'Facebook');
                $error .= valida_campo($youtube, 'url|maxlength:160', 'Youtube');

                if($error != ''){ 
                    $message = sprintf(error_helper::msg()->msg201,$error);
                    echo alerta_error($message);EXIT; 
                }

                $configuracion = $this->m_configuracion->mostrarDatos(array('interna' => 'sistema'));
                $valores = json_decode($configuracion[0]->atributos);

                $jsonEncode = array(
                    'instagram' => $instagram,     
                    'twitter' => $twitter,
                    'facebook' => $facebook,
                    'youtube' => $youtube,
                );

                $columnaDatos = array(
                    'atributos' => json_encode($jsonEncode, TRUE)
                );
                if($this->m_configuracion->actualizar($columnaDatos, array( 'configuracion.interna' => 'sociales' ))){
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