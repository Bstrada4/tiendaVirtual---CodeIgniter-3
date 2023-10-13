<?php
@header('X-Frame-Options: SAMEORIGIN');
@header('Referrer-Policy: no-referrer');
@header('X-Powered-By: Apolomultimedia');

class Cotizacion extends CI_Controller {
    private $resultado;
    private $items = array();

    public function __construct() {
        parent::__construct();
        ini_set('memory_limit', '1024M');
        ini_set('max_execution_time', 0);
        ini_set('upload_max_filesize', '200M');
        $librerias = array('dashboard/datos_privados');
        $helper = array();
        $modelos = array('m_web_cotizacion','m_web_cotizacion_item','m_estado_pedido');
        $this->load->library($librerias);
        $this->load->helper($helper);
        $this->load->model($modelos);


        $this->items['miModulo'] = 'cotizacion';
        $this->items['carpetaProyecto'] = 'dashboard';
        $this->items['baseUrl'] = base_url();
        $this->items['getUrl'] = base_url().$this->items['carpetaProyecto'].'/';
        $this->scriptVista = $this->scripts->scriptVistaGeneral();
        $this->items = array_merge($this->items, $this->scriptVista);
        $this->accesoSession = sessiones_helper::obtieneInfoSesion('sesionUsuario');
        $this->verificaAcceso = $this->datos_privados->verificaAcceso();
        $this->items['cotizacion_active'] = 'mm-active';
    }



    public function listar(){
        $data['tituloEncabezado'] = $this->items['sisInfoTituloEmpresa'] .' - Listar Cotización';
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
            $cotizacion = $this->m_web_cotizacion->mostrarDatos();
            if(!empty($cotizacion)){
                $this->table->set_template(
                    array(
                        'table_open' => '<table class="table table-hover table-bordered table-striped dt-responsive table-sm dataTable" style="border-collapse: collapse; border-spacing: 0; width: 100%;" id="infoTable">',
                        'heading_cell_start'  => '<th style="vertical-align:middle; text-align:center;">',
                        'thead_open'  => '<thead class="thead-dark">',
                        'cell_start' => '<td style="vertical-align:middle; text-align:center;">',
                        'cell_alt_start' => '<td style="vertical-align:middle; text-align:center;">'
                    )
                );
                $this->table->set_heading('#', 'NOMBRE','EMAIL','TELEFONO','ESTADO','FECHA COTIZACION', 'ACCIÓN');
                $accion = array(
                    'entity' => $this->items['miModulo'],
                    'route' => $this->items['baseUrl'].$this->items['carpetaProyecto'], 
                    'option' => 'observar', 
                    'response' => 'respuesta', 
                    'class' => 'procesarInfo'

                );
                $i = 1;
                foreach($cotizacion AS $items){
                    $fechaCotizacion = ($items->fechaRegistro >= 1104537600) ? $this->complementos->obtenerFecha($items->fechaRegistro,7) : '---';
                    $this->table->add_row(
                        $i, 
                        '<span class="text-primary">'.$items->nombre.'</span>',
                        '<span class="text-primary">'.$items->email.'</span>',  
                        '<span class="text-primary">'.$items->telefono.'</span>',  
                        '<span class="text-primary">'.$this->complementos->status_pedido($items->estado).'</span>',
                        '<span class="text-primary">'.$fechaCotizacion.'</span>',
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
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/page/listar_cotizacion', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_footer', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/footer', $data);
    }


    public function observar($id = ''){
        $data['tituloEncabezado'] = $this->items['sisInfoTituloEmpresa'] .' - Observar Cotización';
        $condiciones = array(
            'web_cotizacion.id' => $id
        );
        $resultado = $this->m_web_cotizacion->mostrarDatos($condiciones);
        if(!empty($resultado)){
            $cotizacion = $resultado[0];
            $data['observar_id'] = $cotizacion->id;
            $data['observar_nombre'] = $cotizacion->nombre;
            $data['observar_telefono'] = $cotizacion->telefono;
            $data['observar_email'] = $cotizacion->email;
            $data['observar_direccion'] = $cotizacion->direccion;
            $data['fechaRegistro'] = ($cotizacion->fechaRegistro >= 1104537600) ? $this->complementos->obtenerFecha($cotizacion->fechaRegistro,7) : '---';
            $data['fechaModificacion'] = ($cotizacion->fechaModificacion >= 1104537600) ? $this->complementos->obtenerFecha($cotizacion->fechaModificacion,7) : '---';

            $condicionesItem = array(
                'web_cotizacion_item.cotizacion_id' => $cotizacion->id
            );
            $resultadoItem = $this->m_web_cotizacion_item->mostrarDatos($condicionesItem);

            if(!empty($resultadoItem)){
                $n = 1;
                foreach($resultadoItem as $items){
                    $data['listadoItem'][] = array(
                        'numero' => $n,
                        'titulo' => ($items->titulo != '') ? $items->titulo : '', 
                        'precio' => ($items->precio != '') ? $items->precio : '',
                        'cantidad' => ($items->cantidad != '') ? $items->cantidad : '',
                    );
                    ++$n;
                }
            }

            $estadoPedido = $this->m_estado_pedido->mostrarDatos();
            foreach($estadoPedido as $items){
                $select[$items->id] = $items->titulo;
            }
            $data['estadoId'] = $this->complementos->generaSelect($select, 'estadoId', $cotizacion->estado , 'Seleccione una opción', '', 'simple'); 
            unset($select);
        }

        $data = array_merge($data, $this->items);
        $data = array_merge($data, $this->verificaAcceso);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/page/observar_cotizacion', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_footer', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/footer', $data);
    }


    public function proceso($accion){
        switch($accion){
            case 'editar':
                if(!$this->datos_privados->seguridadAccionModulo($this->accesoSession->accesoTmpNivel, $this->items['miModulo'], 'editar')){
                    $message = sprintf(error_helper::msg()->msg6);
                    echo alerta_error($message);EXIT; 
                }

                $msjError = TRUE;
                $id_cotizacion = $this->complementos->xxsclean($this->input->post('id_cotizacion',TRUE));
                $estadoId = $this->complementos->xxsclean($this->input->post('estadoId',TRUE));

                $error = '';
                $error .= valida_campo($id_cotizacion, 'maxlength:15', 'Id cotización');
                $error .= valida_campo($estadoId, 'not_empty', 'Estado');

                if($error != ''){ 
                    $message = sprintf(error_helper::msg()->msg201,$error);
                    echo alerta_error($message);EXIT; 
                }

                $columnaDatos = array(
                    'estado' => $estadoId,
                    'fecha_modificacion' => time()
                );

                if($this->m_web_cotizacion->actualizar($columnaDatos, array( 'web_cotizacion.id' =>  $id_cotizacion))){
                    $message = sprintf(error_helper::msg()->msg503,' Cotización');
                    echo alerta_exito($message,2);EXIT; 
                }

                if($msjError){
                    $message = sprintf(error_helper::msg()->msg201,$error);
                    echo alerta_error($message);EXIT; 
                }
                break;

            }
    }


}