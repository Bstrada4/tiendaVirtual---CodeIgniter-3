<?php
@header('X-Frame-Options: SAMEORIGIN');
@header('Referrer-Policy: no-referrer');
@header('X-Powered-By: Apolomultimedia');

class Contacto extends CI_Controller{
    
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
    
        $this->items['miModulo'] = 'contacto';
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
    
    public function panel_1(){
        $data['tituloEncabezado'] = $this->items['sisInfoTituloEmpresa'] .' - Panel Contacto 1';

        $configuracion = $this->m_configuracion->mostrarDatos(array('interna' => 'contacto_1'));
        $valores = json_decode($configuracion[0]->atributos);

        $data['correo'] = (isset($valores->correo)) ? $valores->correo : '';
        $data['direccion'] = (isset($valores->direccion)) ? $valores->direccion : '';

        $data['whatshapp_value'] = (isset($valores->whatshapp_value)) ? $valores->whatshapp_value : '';
        $data['whatshapp_name'] = (isset($valores->whatshapp_name)) ? $valores->whatshapp_name : '';

        $data['telefono_c_value'] = (isset($valores->telefono_c_value)) ? $valores->telefono_c_value : '';
        $data['telefono_c_name'] = (isset($valores->telefono_c_name)) ? $valores->telefono_c_name : '';

        $data['telefono_i1_value'] = (isset($valores->telefono_i1_value)) ? $valores->telefono_i1_value : '';
        $data['telefono_i1_name'] = (isset($valores->telefono_i1_name)) ? $valores->telefono_i1_name : '';

        $data['telefono_i2_value'] = (isset($valores->telefono_i2_value)) ? $valores->telefono_i2_value : '';
        $data['telefono_i2_name'] = (isset($valores->telefono_i2_name)) ? $valores->telefono_i2_name : '';

        $data = array_merge($data, $this->items);
        $data = array_merge($data, $this->verificaAcceso);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/page/panel_contacto', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_footer', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/footer', $data);
    }

    public function panel_2(){
        $data['tituloEncabezado'] = $this->items['sisInfoTituloEmpresa'] .' - Panel Contacto 2';

        $configuracion = $this->m_configuracion->mostrarDatos(array('interna' => 'contacto_2'));
        $valores = json_decode($configuracion[0]->atributos);


        $data['direccion'] = (isset($valores->direccion)) ? $valores->direccion : '';

        $data['telefono_i1_value'] = (isset($valores->telefono_i1_value)) ? $valores->telefono_i1_value : '';
        $data['telefono_i1_name'] = (isset($valores->telefono_i1_name)) ? $valores->telefono_i1_name : '';

        $data['telefono_i2_value'] = (isset($valores->telefono_i2_value)) ? $valores->telefono_i2_value : '';
        $data['telefono_i2_name'] = (isset($valores->telefono_i2_name)) ? $valores->telefono_i2_name : '';

        $data = array_merge($data, $this->items);
        $data = array_merge($data, $this->verificaAcceso);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/page/panel_contacto_2', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_footer', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/footer', $data);
    }

    public function panel_3(){
        $data['tituloEncabezado'] = $this->items['sisInfoTituloEmpresa'] .' - Panel Contacto 3';

        $configuracion = $this->m_configuracion->mostrarDatos(array('interna' => 'contacto_3'));
        $valores = json_decode($configuracion[0]->atributos);


        $data['direccion'] = (isset($valores->direccion)) ? $valores->direccion : '';

        $data['telefono_i1_value'] = (isset($valores->telefono_i1_value)) ? $valores->telefono_i1_value : '';
        $data['telefono_i1_name'] = (isset($valores->telefono_i1_name)) ? $valores->telefono_i1_name : '';

        $data['telefono_i2_value'] = (isset($valores->telefono_i2_value)) ? $valores->telefono_i2_value : '';
        $data['telefono_i2_name'] = (isset($valores->telefono_i2_name)) ? $valores->telefono_i2_name : '';

        $data = array_merge($data, $this->items);
        $data = array_merge($data, $this->verificaAcceso);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/page/panel_contacto_3', $data);
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
                $correo = $this->complementos->xxsclean($this->input->post('correo',TRUE));
                $direccion = $this->complementos->xxsclean($this->input->post('direccion',TRUE));

                $whatshapp_value = $this->complementos->xxsclean($this->input->post('whatshapp_value',TRUE));
                $whatshapp_name = $this->complementos->xxsclean($this->input->post('whatshapp_name',TRUE));

                $telefono_c_value = $this->complementos->xxsclean($this->input->post('telefono_c_value',TRUE));
                $telefono_c_name = $this->complementos->xxsclean($this->input->post('telefono_c_name',TRUE));

                $telefono_i1_value = $this->complementos->xxsclean($this->input->post('telefono_i1_value',TRUE));
                $telefono_i1_name = $this->complementos->xxsclean($this->input->post('telefono_i1_name',TRUE));

                $telefono_i2_value = $this->complementos->xxsclean($this->input->post('telefono_i2_value',TRUE));
                $telefono_i2_name = $this->complementos->xxsclean($this->input->post('telefono_i2_name',TRUE));  

                $error = '';
                $error .= valida_campo($correo, 'email|minlength:5|maxlength:75', 'Correo');
                $error .= valida_campo($direccion, 'maxlength:100', 'Dirección');

                $error .= valida_campo($whatshapp_value, 'maxlength:13', 'Whatshapp enlace');
                $error .= valida_campo($whatshapp_name, 'maxlength:24', 'Whatshapp nombre');

                $error .= valida_campo($telefono_c_value, 'maxlength:12', 'Teléfono cabecera enlace');
                $error .= valida_campo($telefono_c_name, 'maxlength:24', 'Teléfono cabecera nombre');

                $error .= valida_campo($telefono_i1_value, 'maxlength:12', 'Teléfono inferior 1 enlace');
                $error .= valida_campo($telefono_i1_name, 'maxlength:24', 'Teléfono inferior 1 nombre');

                $error .= valida_campo($telefono_i2_value, 'maxlength:12', 'Teléfono inferior 2 enlace');
                $error .= valida_campo($telefono_i2_name, 'maxlength:24', 'Teléfono inferior 2 nombre');

                if($error != ''){ 
                    $message = sprintf(error_helper::msg()->msg201,$error);
                    echo alerta_error($message);EXIT; 
                }

                $jsonEncode = array(
                    'correo' => $correo,     
                    'direccion' => $direccion,
                    'whatshapp_value' => $whatshapp_value,
                    'whatshapp_name' => $whatshapp_name,
                    'telefono_c_value' => $telefono_c_value,
                    'telefono_c_name' => $telefono_c_name,
                    'telefono_i1_value' => $telefono_i1_value,
                    'telefono_i1_name' => $telefono_i1_name,
                    'telefono_i2_value' => $telefono_i2_value,
                    'telefono_i2_name' => $telefono_i2_name
                );

                $columnaDatos = array(
                    'atributos' => json_encode($jsonEncode, TRUE)
                );
                if($this->m_configuracion->actualizar($columnaDatos, array( 'configuracion.interna' => 'contacto_1' ))){
                    $message = sprintf(error_helper::msg()->msg503,'configuración');
                    echo alerta_exito($message,2);EXIT; 
                }
                if($msjError){
                    $message = sprintf(error_helper::msg()->msg201,$error);
                    echo alerta_error($message);EXIT; 
                }
                break;
            case 'panel_2':
                if(!$this->datos_privados->seguridadAccionModulo($this->accesoSession->accesoTmpNivel, $this->items['miModulo'], 'panel')){
                    $message = sprintf(error_helper::msg()->msg6);
                    echo alerta_error($message);EXIT; 
                }

                $msjError = TRUE;
                $direccion = $this->complementos->xxsclean($this->input->post('direccion',TRUE));


                $telefono_i1_value = $this->complementos->xxsclean($this->input->post('telefono_i1_value',TRUE));
                $telefono_i1_name = $this->complementos->xxsclean($this->input->post('telefono_i1_name',TRUE));

                $telefono_i2_value = $this->complementos->xxsclean($this->input->post('telefono_i2_value',TRUE));
                $telefono_i2_name = $this->complementos->xxsclean($this->input->post('telefono_i2_name',TRUE));  

                $error = '';
                $error .= valida_campo($direccion, 'maxlength:100', 'Dirección');

                $error .= valida_campo($telefono_i1_value, 'maxlength:12', 'Teléfono inferior 1 enlace');
                $error .= valida_campo($telefono_i1_name, 'maxlength:24', 'Teléfono inferior 1 nombre');

                $error .= valida_campo($telefono_i2_value, 'maxlength:12', 'Teléfono inferior 2 enlace');
                $error .= valida_campo($telefono_i2_name, 'maxlength:24', 'Teléfono inferior 2 nombre');

                if($error != ''){ 
                    $message = sprintf(error_helper::msg()->msg201,$error);
                    echo alerta_error($message);EXIT; 
                }

                $jsonEncode = array(    
                    'direccion' => $direccion,
                    'telefono_i1_value' => $telefono_i1_value,
                    'telefono_i1_name' => $telefono_i1_name,
                    'telefono_i2_value' => $telefono_i2_value,
                    'telefono_i2_name' => $telefono_i2_name
                );

                $columnaDatos = array(
                    'atributos' => json_encode($jsonEncode, TRUE)
                );
                if($this->m_configuracion->actualizar($columnaDatos, array( 'configuracion.interna' => 'contacto_2' ))){
                    $message = sprintf(error_helper::msg()->msg503,'configuración');
                    echo alerta_exito($message,2);EXIT; 
                }
                if($msjError){
                    $message = sprintf(error_helper::msg()->msg201,$error);
                    echo alerta_error($message);EXIT; 
                }
                break;
            case 'panel_3':
                if(!$this->datos_privados->seguridadAccionModulo($this->accesoSession->accesoTmpNivel, $this->items['miModulo'], 'panel')){
                    $message = sprintf(error_helper::msg()->msg6);
                    echo alerta_error($message);EXIT; 
                }

                $msjError = TRUE;
                $direccion = $this->complementos->xxsclean($this->input->post('direccion',TRUE));

                $telefono_i1_value = $this->complementos->xxsclean($this->input->post('telefono_i1_value',TRUE));
                $telefono_i1_name = $this->complementos->xxsclean($this->input->post('telefono_i1_name',TRUE));

                $telefono_i2_value = $this->complementos->xxsclean($this->input->post('telefono_i2_value',TRUE));
                $telefono_i2_name = $this->complementos->xxsclean($this->input->post('telefono_i2_name',TRUE));  

                $error = '';
                $error .= valida_campo($direccion, 'maxlength:100', 'Dirección');

                $error .= valida_campo($telefono_i1_value, 'maxlength:12', 'Teléfono inferior 1 enlace');
                $error .= valida_campo($telefono_i1_name, 'maxlength:24', 'Teléfono inferior 1 nombre');

                $error .= valida_campo($telefono_i2_value, 'maxlength:12', 'Teléfono inferior 2 enlace');
                $error .= valida_campo($telefono_i2_name, 'maxlength:24', 'Teléfono inferior 2 nombre');

                if($error != ''){ 
                    $message = sprintf(error_helper::msg()->msg201,$error);
                    echo alerta_error($message);EXIT; 
                }

                $jsonEncode = array(    
                    'direccion' => $direccion,
                    'telefono_i1_value' => $telefono_i1_value,
                    'telefono_i1_name' => $telefono_i1_name,
                    'telefono_i2_value' => $telefono_i2_value,
                    'telefono_i2_name' => $telefono_i2_name
                );

                $columnaDatos = array(
                    'atributos' => json_encode($jsonEncode, TRUE)
                );
                if($this->m_configuracion->actualizar($columnaDatos, array( 'configuracion.interna' => 'contacto_3' ))){
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