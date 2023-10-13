<?php

@header('X-Frame-Options: SAMEORIGIN');

@header('Referrer-Policy: no-referrer');

@header('X-Powered-By: Apolomultimedia');



class Maps extends CI_Controller{

    

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

    

        $this->items['miModulo'] = 'maps';

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

        $data['tituloEncabezado'] = $this->items['sisInfoTituloEmpresa'] .' - Panel Google maps';



        $configuracion = $this->m_configuracion->mostrarDatos(array('interna' => 'maps'));

        $valores = json_decode($configuracion[0]->atributos);


        $data['titulo_1'] = (isset($valores->titulo_1)) ? $valores->titulo_1 : '';
        $data['latitud_1'] = (isset($valores->latitud_1)) ? $valores->latitud_1 : '';
        $data['longitud_1'] = (isset($valores->longitud_1)) ? $valores->longitud_1 : '';


        $data['titulo_2'] = (isset($valores->titulo_2)) ? $valores->titulo_2 : '';
        $data['latitud_2'] = (isset($valores->latitud_2)) ? $valores->latitud_2 : '';
        $data['longitud_2'] = (isset($valores->longitud_2)) ? $valores->longitud_2 : '';


        $data['titulo_3'] = (isset($valores->titulo_3)) ? $valores->titulo_3 : '';
        $data['latitud_3'] = (isset($valores->latitud_3)) ? $valores->latitud_3 : '';
        $data['longitud_3'] = (isset($valores->longitud_3)) ? $valores->longitud_3 : '';


        $data['titulo_4'] = (isset($valores->titulo_4)) ? $valores->titulo_4 : '';
        $data['latitud_4'] = (isset($valores->latitud_4)) ? $valores->latitud_4 : '';
        $data['longitud_4'] = (isset($valores->longitud_4)) ? $valores->longitud_4 : '';


        $data['titulo_5'] = (isset($valores->titulo_5)) ? $valores->titulo_5 : '';
        $data['latitud_5'] = (isset($valores->latitud_5)) ? $valores->latitud_5 : '';
        $data['longitud_5'] = (isset($valores->longitud_5)) ? $valores->longitud_5 : '';


        $data['titulo_6'] = (isset($valores->titulo_6)) ? $valores->titulo_6 : '';
        $data['latitud_6'] = (isset($valores->latitud_6)) ? $valores->latitud_6 : '';
        $data['longitud_6'] = (isset($valores->longitud_6)) ? $valores->longitud_6 : '';



        $data = array_merge($data, $this->items);

        $data = array_merge($data, $this->verificaAcceso);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/header', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_header', $data);

        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/page/panel_maps', $data);

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


  				$titulo_1 = $this->input->post('titulo_1');
                $latitud_1 = $this->complementos->xxsclean($this->input->post('latitud_1',TRUE));
                $longitud_1 = $this->complementos->xxsclean($this->input->post('longitud_1',TRUE));


                $titulo_2 = $this->input->post('titulo_2');
                $latitud_2 = $this->complementos->xxsclean($this->input->post('latitud_2',TRUE));
                $longitud_2 = $this->complementos->xxsclean($this->input->post('longitud_2',TRUE));


                $titulo_3 = $this->input->post('titulo_3');
                $latitud_3 = $this->complementos->xxsclean($this->input->post('latitud_3',TRUE));
                $longitud_3 = $this->complementos->xxsclean($this->input->post('longitud_3',TRUE));  


                $titulo_4 = $this->input->post('titulo_4');
                $latitud_4 = $this->complementos->xxsclean($this->input->post('latitud_4',TRUE));
                $longitud_4 = $this->complementos->xxsclean($this->input->post('longitud_4',TRUE)); 


                $titulo_5 = $this->input->post('titulo_5');
                $latitud_5 = $this->complementos->xxsclean($this->input->post('latitud_5',TRUE));
                $longitud_5 = $this->complementos->xxsclean($this->input->post('longitud_5',TRUE)); 


                $titulo_6 = $this->input->post('titulo_6');
                $latitud_6 = $this->complementos->xxsclean($this->input->post('latitud_6',TRUE));
                $longitud_6 = $this->complementos->xxsclean($this->input->post('longitud_6',TRUE)); 


                $error = '';
                $error .= valida_campo($latitud_1, 'maxlength:25', 'Latitud Dirección 1');
                $error .= valida_campo($longitud_1, 'maxlength:25', 'Longitud Dirección 1');

                $error .= valida_campo($latitud_2, 'maxlength:25', 'Latitud Dirección 2');
                $error .= valida_campo($longitud_2, 'maxlength:25', 'Longitud Dirección 2');

                $error .= valida_campo($latitud_3, 'maxlength:25', 'Latitud Dirección 3');
                $error .= valida_campo($longitud_3, 'maxlength:25', 'Longitud Dirección 3');

                $error .= valida_campo($latitud_4, 'maxlength:25', 'Latitud Dirección 4');
                $error .= valida_campo($longitud_4, 'maxlength:25', 'Longitud Dirección 4');

                $error .= valida_campo($latitud_5, 'maxlength:25', 'Latitud Dirección 5');
                $error .= valida_campo($longitud_5, 'maxlength:25', 'Longitud Dirección 5');

                $error .= valida_campo($latitud_6, 'maxlength:25', 'Latitud Dirección 6');
                $error .= valida_campo($longitud_6, 'maxlength:25', 'Longitud Dirección 6');

                if($error != ''){ 
                    $message = sprintf(error_helper::msg()->msg201,$error);
                    echo alerta_error($message);EXIT; 
                }

                $jsonEncode = array(
                	'titulo_1' => $titulo_1,
                	'titulo_2' => $titulo_2,
                	'titulo_3' => $titulo_3,
                	'titulo_4' => $titulo_4,
                	'titulo_5' => $titulo_5,
                	'titulo_6' => $titulo_6,
                    'latitud_1' => $latitud_1,     
                    'longitud_1' => $longitud_1,
                    'latitud_2' => $latitud_2,
                    'longitud_2' => $longitud_2,
                    'latitud_3' => $latitud_3,
                    'longitud_3' => $longitud_3,
                    'latitud_4' => $latitud_4,
                    'longitud_4' => $longitud_4,
                    'latitud_5' => $latitud_5,
                    'longitud_5' => $longitud_5,
                    'latitud_6' => $latitud_6,
                    'longitud_6' => $longitud_6,
                );



                $columnaDatos = array(

                    'atributos' => json_encode($jsonEncode, TRUE)

                );

                if($this->m_configuracion->actualizar($columnaDatos, array( 'configuracion.interna' => 'maps' ))){

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