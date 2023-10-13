<?php
@header('X-Frame-Options: SAMEORIGIN');
@header('Referrer-Policy: no-referrer');
@header('X-Powered-By: Apolomultimedia');

class Nosotros extends CI_Controller{
    
    private $resultado;
    private $items = array();
    
    public function __construct() {
        parent::__construct();
        ini_set('memory_limit', '1024M');
        ini_set('max_execution_time', 0);
        ini_set('upload_max_filesize', '200M');

        $librerias = array('dashboard/datos_privados');
        $helper = array();
        $modelos = array('m_web_nosotros');
        $this->load->library($librerias);
        $this->load->helper($helper);
        $this->load->model($modelos);
    
        $this->items['miModulo'] = 'nosotros';
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
        $data['tituloEncabezado'] = $this->items['sisInfoTituloEmpresa'] .' - Panel Nosotros';

        $nosotros = $this->m_web_nosotros->mostrarDatos();
        if(!empty($nosotros)){
            $valores = $nosotros[0];

            sessiones_helper::creaSesion('editarNosotros', $valores->id);

            $data['mensaje_1'] = (isset($valores->mensaje_1)) ? $valores->mensaje_1 : '';
            $data['mensaje_2'] = (isset($valores->mensaje_2)) ? $valores->mensaje_2 : '';
            $data['mensaje_3'] = (isset($valores->mensaje_3)) ? $valores->mensaje_3 : '';
            $data['mensaje_4'] = (isset($valores->mensaje_4)) ? $valores->mensaje_4 : '';
            $data['mensaje_5'] = (isset($valores->mensaje_5)) ? $valores->mensaje_5 : '';

             $opciones = array(
                'name' => 'descripcion_1', 'id' => 'descripcion_1',
                'value' => (isset($valores->descripcion_1)) ? $valores->descripcion_1 : '',
                'class' => 'form-normal-width'
            );
            $data['descripcion_1'] = form_textarea($opciones);

             $opciones = array(
                'name' => 'descripcion_2', 'id' => 'descripcion_2',
                'value' => (isset($valores->descripcion_2)) ? $valores->descripcion_2 : '',
                'class' => 'form-normal-width'
            );
            $data['descripcion_2'] = form_textarea($opciones);

             $opciones = array(
                'name' => 'descripcion_3', 'id' => 'descripcion_3',
                'value' => (isset($valores->descripcion_3)) ? $valores->descripcion_3 : '',
                'class' => 'form-normal-width'
            );
            $data['descripcion_3'] = form_textarea($opciones);

            $image = ($valores->imagen != '') ? $valores->imagen : 'empty.png';
            $data['observar_imagen'] = base_url().'public/imagen/nosotros/'.$image;
        }

        $data = array_merge($data, $this->items);
        $data = array_merge($data, $this->verificaAcceso);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/page/editar_nosotros', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_footer', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/footer', $data);
    }

    public function proceso($accion){
        switch($accion){
            case 'editar':
                if(!$this->datos_privados->seguridadAccionModulo($this->accesoSession->accesoTmpNivel, $this->items['miModulo'], 'panel')){
                    $message = sprintf(error_helper::msg()->msg6);
                    echo alerta_error($message);EXIT; 
                }

                $msjError = TRUE;
                $nosotrosId = sessiones_helper::obtieneSesion('editarNosotros');
                $descripcion_1 = $this->input->post('descripcion_1');
                $descripcion_2 = $this->input->post('descripcion_2');
                $descripcion_3 = $this->input->post('descripcion_3');

                $mensaje_1 = $this->complementos->xxsclean($this->input->post('mensaje_1',TRUE));
                $mensaje_2 = $this->complementos->xxsclean($this->input->post('mensaje_2',TRUE));
                $mensaje_3 = $this->complementos->xxsclean($this->input->post('mensaje_3',TRUE));
                $mensaje_4 = $this->complementos->xxsclean($this->input->post('mensaje_4',TRUE));
                $mensaje_5 = $this->complementos->xxsclean($this->input->post('mensaje_5',TRUE));

                $imagenNosotros = $this->complementos->obtenerArchivo('imagenNosotros', 'unico');

               

                $error = '';
                $error .= valida_campo($descripcion_1, 'not_empty|maxlength:2500', 'Descripción'); 
                $error .= valida_campo($mensaje_1, 'maxlength:100', 'Mensaje 1');
                $error .= valida_campo($mensaje_2, 'maxlength:100', 'Mensaje 2');
                $error .= valida_campo($mensaje_3, 'maxlength:100', 'Mensaje 3');
                $error .= valida_campo($mensaje_4, 'maxlength:100', 'Mensaje 4');
                $error .= valida_campo($mensaje_5, 'maxlength:100', 'Mensaje 5');

                $error .= valida_campo($descripcion_2, 'maxlength:2500', 'Misión'); 
                $error .= valida_campo($descripcion_3, 'maxlength:2500', 'Visión'); 

                if(!empty($imagenNosotros)){
                    $error .= valida_imagen($imagenNosotros, 'maxwidth:1600|maxheight:1400:|maxsize:2', 'Imagen');
                }


                if($error != ''){ 
                    $message = sprintf(error_helper::msg()->msg201,$error);
                    echo alerta_error($message);EXIT; 
                }

                $condiciones = array( 'web_nosotros.id' => $nosotrosId );
                $resultadoNosotros = $this->m_web_nosotros->mostrarDatos($condiciones);

                if(!empty($imagenNosotros)){
                    $opciones = array(
                        'marcaTipo' => FALSE,
                        'marcaInfo' => FALSE,
                        'ajuste' => 'w',
                        'ajusteImagen' => 1050,
                        'desenfocado' => FALSE,
                        'cantidadCopia' => array()
                    );
                    $obtieneImagen = $this->complementos->almacenarImagen($imagenNosotros, 'public/imagen/nosotros', $opciones, TRUE);
                } else {
                    $obtieneImagen = $resultadoNosotros[0]->imagen;
                }


                $columnaDatos = array(
                    'descripcion_1' => $descripcion_1, 
                    'descripcion_2' => $descripcion_2, 
                    'descripcion_3' => $descripcion_3, 
                    'mensaje_1' => $mensaje_1, 
                    'mensaje_2' => $mensaje_2, 
                    'mensaje_3' => $mensaje_3, 
                    'mensaje_4' => $mensaje_4, 
                    'mensaje_5' => $mensaje_5, 
                    'imagen' => $obtieneImagen,
                    'fecha_modificacion' => time()     
                );

                $resultado = $this->m_web_nosotros->actualizar($columnaDatos, array( 'web_nosotros.id' => $nosotrosId ));
                if(!empty($resultado)){
                    sessiones_helper::eliminaSesion('editarNosotros');
                    $message = sprintf(error_helper::msg()->msg503,'Nosotros');
                    echo alerta_exito($message,3);
                    EXIT();
                }
                if($msjError){
                    $message = sprintf(error_helper::msg()->msg6);
                    echo alerta_error($message);EXIT; 
                }
                break;
            default:
                return FALSE;
        }
    }

}