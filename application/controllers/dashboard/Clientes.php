<?php
@header('X-Frame-Options: SAMEORIGIN');
@header('Referrer-Policy: no-referrer');
@header('X-Powered-By: Apolomultimedia');

class Clientes extends CI_Controller {
    private $resultado;
    private $items = array();

    public function __construct() {
        parent::__construct();
        ini_set('memory_limit', '1024M');
        ini_set('max_execution_time', 0);
        ini_set('upload_max_filesize', '200M');

        $librerias = array('dashboard/datos_privados');
        $helper = array();
        $modelos = array('m_web_clientes');
        $this->load->library($librerias);
        $this->load->helper($helper);
        $this->load->model($modelos);
    
        $this->items['miModulo'] = 'clientes';
        $this->items['carpetaProyecto'] = 'dashboard';
        $this->items['baseUrl'] = base_url();
        $this->items['getUrl'] = base_url().$this->items['carpetaProyecto'].'/';
        $this->scriptVista = $this->scripts->scriptVistaGeneral();
        $this->items = array_merge($this->items, $this->scriptVista);
        $this->accesoSession = sessiones_helper::obtieneInfoSesion('sesionUsuario');
        $this->verificaAcceso = $this->datos_privados->verificaAcceso();
        $this->items['clientes_active'] = 'mm-active';
    }

    public function listar(){
        $data['tituloEncabezado'] = $this->items['sisInfoTituloEmpresa'] .' - listar Clientes';
        /* Datatable */
            $opciones = array(
                'iDisplayLength' => 10, 
                'bSort' => FALSE, 
                'bPaginate' => TRUE, 
                'bFilter' => TRUE, 
                'bLengthChange' => FALSE, 
                'bInfo' => FALSE
            );
            $dataTable = $this->complementos->datatable($opciones, '.dataTable');
            $this->items['jqueryDataTable'] = $dataTable['jquery'];
            $this->items['clasesDataTable'] = $dataTable['clases'];
        /* Información */
            $clientes = $this->m_web_clientes->mostrarDatos();
            if(!empty($clientes)){
                $this->table->set_template(
                    array(
                        'table_open' => '<table class="table table-hover table-bordered table-striped dt-responsive table-sm dataTable" style="border-collapse: collapse; border-spacing: 0; width: 100%;" id="infoTable">',
                        'heading_cell_start'  => '<th style="vertical-align:middle; text-align:center;">',
                        'thead_open'  => '<thead class="thead-dark">',
                        'cell_start' => '<td style="vertical-align:middle; text-align:center;">',
                        'cell_alt_start' => '<td style="vertical-align:middle; text-align:center;">'
                    )
                );
                $this->table->set_heading('#', 'NOMBRE', 'EMAIL','FECHA REGISTRO','ESTADO', 'ACCIÓN');
                $accion = array(
                    'entity' => $this->items['miModulo'],
                    'route' => $this->items['baseUrl'].$this->items['carpetaProyecto'], 
                    'option' => 'observar|denegar|permitir', 
                    'response' => 'respuesta', 
                    'class' => 'procesarInfo'
                );

                $i = 1;
                foreach($clientes AS $items){
                        $fechaRegistro = ($items->fechaRegistro >= 1104537600) ? $this->complementos->obtenerFecha($items->fechaRegistro,7) : '---';
                        $this->table->add_row(
                            $i, 
                            '<span class="text-primary">'.$items->nombre.'</span>', 
                            '<span class="text-primary">'.$items->email.'</span>', 
                            $fechaRegistro,
                            $this->complementos->status_registro($items->eliminacionLogica),
                            $this->datos_privados->formAccion($accion, $items->id, $items->eliminacionLogica)
                        );
                    $i++;
                }
                $data['generaTabla'] = $this->table->generate();
                $data['generaPaginacion'] = $this->pagination->create_links();
            }else{
                $data['generaTabla'] = '<h4>No se encontraron resultados</h4>';
            }

        $data = array_merge($data, $this->items);
        $data = array_merge($data, $this->verificaAcceso);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/page/listar_clientes', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_footer', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/footer', $data);
    }

    public function observar($id = ''){
        $data['tituloEncabezado'] = $this->items['sisInfoTituloEmpresa'] .' - Observar Cliente';

        $condiciones = array(
            'web_clientes.id' => $id
        );
        $resultado = $this->m_web_clientes->mostrarDatos($condiciones);
        if(!empty($resultado)){
            $cliente = $resultado[0];
            $image = ($cliente->imagen != '') ? $cliente->imagen : 'empty.png';
            $data['observar_id'] = $cliente->id;
            $data['observar_nombre'] = $cliente->nombre;
            $data['observar_email'] = $cliente->email;
            $data['observar_celular'] = $cliente->celular;
            $data['observar_direccion'] = $cliente->direccion;
            $data['observar_imagen'] = base_url().'crop/300/150/clientes-'.$image;
            $data['fechaRegistro'] = ($cliente->fechaRegistro >= 1104537600) ? $this->complementos->obtenerFecha($cliente->fechaRegistro,7) : '---';
            $data['fechaModificacion'] = ($cliente->fechaModificacion >= 1104537600) ? $this->complementos->obtenerFecha($cliente->fechaModificacion,7) : '---';
        }
        
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $this->verificaAcceso);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/page/observar_cliente', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_footer', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/footer', $data);
    }

    public function proceso($accion, $id = ''){
        switch($accion){
            case 'permitir':
                if(!$this->datos_privados->seguridadAccionModulo($this->accesoSession->accesoTmpNivel, $this->items['miModulo'], 'permitir')){
                    $message = sprintf(error_helper::msg()->msg6);
                    echo alerta_error($message);EXIT; 
                }
                $msjError = TRUE;
                if($this->m_web_clientes->existe($id)){
                    $condiciones = array(
                        'web_clientes.eliminacion_logica' => 0,
                        'web_clientes.id' => $id
                    );
                    $resultadoTabla = $this->m_web_clientes->mostrarDatos($condiciones);
                    if(!empty($resultadoTabla)){
                        $this->m_web_clientes->permitirInfo($resultadoTabla[0]->id);
                        $message = sprintf(error_helper::msg()->msg201, 'Se activó el item exitosamente.');
                        echo alerta_exito($message,2);EXIT;
                    }
                }
                if($msjError){
                    $message = sprintf(error_helper::msg()->msg6);
                    echo alerta_error($message);EXIT; 
                }
                break;
            case 'denegar':
                if(!$this->datos_privados->seguridadAccionModulo($this->accesoSession->accesoTmpNivel, $this->items['miModulo'], 'denegar')){
                    $message = sprintf(error_helper::msg()->msg6);
                    echo alerta_error($message);EXIT; 
                }
                $msjError = TRUE;
                if($this->m_web_clientes->existe($id)){
                    $condiciones = array(
                        'web_clientes.eliminacion_logica' => 1,
                        'web_clientes.id' => $id
                    );
                    $resultadoTabla = $this->m_web_clientes->mostrarDatos($condiciones);
                    if(!empty($resultadoTabla)){
                        $this->m_web_clientes->denegarInfo($resultadoTabla[0]->id);
                        $message = sprintf(error_helper::msg()->msg201, 'Se desactivó el item exitosamente.');
                        echo alerta_exito($message,2);EXIT;
                    }
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