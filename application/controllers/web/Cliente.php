<?php
@session_cache_limiter('private, must-revalidate');
@header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
@header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
@header("Cache-Control: no-store, no-cache, must-revalidate");
@header("Cache-Control: post-check=0, pre-check=0", FALSE);
@header("Pragma: no-cache");
//error_reporting(0);

class Cliente extends CI_Controller {

    private $items = array();

    public function __construct() {
        parent::__construct();
        ini_set('memory_limit', '1024M');
        ini_set('max_execution_time', 0);
        ini_set('upload_max_filesize', '200M');
        /*
         * Configuración para librerias, helpers y modelos
         */
        $librerias = array('web/datos_privados');
        $helper = array();
        $modelos = array('m_web_clientes','m_web_cotizacion','m_web_cotizacion_item');
        $this->load->library($librerias);
        $this->load->helper($helper);
        $this->load->model($modelos);
        /*
         * Configuración personalizada
         */
        $this->items['carpetaProyecto'] = 'web';
        $this->items['proyectoTitulo'] = 'Arakakys';
        $this->items['proyectoAutor'] = 'Boris Estrada';
        $this->items['proyectoFavicon'] =  base_url().'public/img/logo/favicon.svg';
        $this->items['base_url'] = base_url();

        $this->scriptVista = $this->scripts->scriptVistaGeneral();
        $this->items = array_merge($this->items, $this->scriptVista);
        $this->datos_privados->verificaNoAcceso();
        $this->verificaAcceso = $this->datos_privados->verificaAcceso();

        $this->items['cart_items'] = count($this->cart->contents());
        $this->items['cart_price'] = number_format($this->cart->total(), '2', '.', '');
        $this->items['itemsProducto'] = $this->cart->contents();

    }

    public function panel() {
        //CABEZERA
        $data['titulo_red'] = "El mejor pollo | Arakaky's | Avicola | Perfil";
        $data['palabrasClaves'] = '';
        $data['metaDescripcion'] = '';
        //REDES SOCIALES
        $data['tituloRedes'] = '';
        $data['descripcionRedes'] = '';
        $data['rutaRedes'] = base_url() .'perfil-cliente';
        $data['imagenRedes'] = base_url() .'';

        $data['css_interna'] = 'perfil-cliente-min.css';
        $data['owl_carousel'] = 'active';

        $condiciones = array(
            'web_clientes.id' => $this->verificaAcceso['accesoTmpId']
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
            $data['observar_imagen'] = base_url().'public/imagen/clientes/'.$image;
            $data['fechaRegistro'] = ($cliente->fechaRegistro >= 1104537600) ? $this->complementos->obtenerFecha($cliente->fechaRegistro,7) : '---';
            $data['fechaModificacion'] = ($cliente->fechaModificacion >= 1104537600) ? $this->complementos->obtenerFecha($cliente->fechaModificacion,7) : '---';
            
            $condiciones = array(
                'web_cotizacion.customer_id' => $this->verificaAcceso['accesoTmpId'],'web_cotizacion.fecha_registro' => 'desc'
            );
            $resultadoCotizacion = $this->m_web_cotizacion->mostrarDatos($condiciones);
            $data['totalPedidos'] = count($resultado);

            if(!empty($resultadoCotizacion)){
                $n = 1;
                foreach($resultadoCotizacion as $items){
                    $condicionItem = array('web_cotizacion_item.cotizacion_id' => $items->id);
                    $webIems = $this->m_web_cotizacion_item->mostrarDatos($condicionItem); 
                    $data['listadoPedidos'][] = array(
                        'id' => $items->id, 
                        'numero' => $n, 
                        'pedido' => ($items->pedido_id != '') ? $items->pedido_id : '',       
                        'email' => ($items->email != '') ? $items->email : '',
                        'cantidad' => count($webIems),
                        'fecha' => $this->complementos->obtenerFecha($items->fechaRegistro,7),
                        'total' => $items->total,
                        'estado' => $this->complementos->status_pedido_cliente($items->estado), 
                    );
                    ++$n;
                }
            }

        }

        /*
         * Impresión de páginas
         */
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $this->verificaAcceso);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/inter_header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/pagina/perfil_cliente', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/inter_footer', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/footer', $data);
    }



    public function proceso($accion){

        switch($accion){

            case 'editar':

                /* DATOS DE AJAX PRE PROCESADOS */

                $clientesId = $this->verificaAcceso['accesoTmpId'];

                $nombre = $this->complementos->xxsclean($this->input->post('nombre',TRUE));

                $celular = $this->complementos->xxsclean($this->input->post('celular',TRUE));

                $direccion = $this->complementos->xxsclean($this->input->post('direccion',TRUE));

                $contrasena = $this->complementos->xxsclean($this->input->post('contrasena',TRUE));

                $clave = $this->complementos->xxsclean($this->input->post('clave',TRUE));

                $reclave = $this->complementos->xxsclean($this->input->post('reclave',TRUE));

                $imagenCliente = $this->complementos->obtenerArchivo('fileup2', 'unico');

                $llave = $this->complementos->aleatorio(30,TRUE,TRUE,TRUE,TRUE) . time();

                $llaveFinal = md5($llave);



                /* VALIDACION DE PARAMETROS */

                $error = '';

                $error .= valida_campo($nombre, 'not_empty|maxlength:125', 'Nombre');

                $error .= valida_campo($celular, 'minlength:7|maxlength:25', 'Celular');

                $error .= valida_campo($direccion, 'maxlength:210', 'Dirección');

                if(!empty($clave)){

                    $error .= valida_campo($clave, 'minlength:5|maxlength:30', 'Nueva Contraseña');

                    $error .= valida_campo($reclave, 'not_empty|minlength:5|maxlength:30', 'Confirmar contraseña');

                    $error .= valida_campo($clave, 'password:'.$reclave, 'Contraseña');

                } 



                if(!empty($imagenCliente)){

                    $error .= valida_imagen($imagenCliente, 'maxwidth:800|maxheight:1000:|maxsize:2', 'Foto de perfil');

                }



                if($error != ''){ 

                    $message = sprintf(error_helper::msg()->msg201,$error);

                    echo alerta_error($message); 

                    EXIT; 

                }



                $condiciones = array( 'web_clientes.id' => $clientesId );

                $resultadoCliente = $this->m_web_clientes->mostrarDatos($condiciones);



                if(!empty($imagenPrincipal)){

                    $opciones = array(

                        'marcaTipo' => FALSE,

                        'marcaInfo' => FALSE,

                        'ajuste' => 'w',

                        'ajusteImagen' => '',

                        'desenfocado' => FALSE,

                        'cantidadCopia' => array()

                    );

                    $obtieneImagen = $this->complementos->almacenarImagen($imagenPrincipal, 'public/imagen/clientes', $opciones, TRUE);

                } else {

                    $obtieneImagen = $resultadoCliente[0]->imagen;

                }



                $claveEncryptada = password_hash($reclave, PASSWORD_DEFAULT);

                $claveFinal = (!empty($reclave)) ? $claveEncryptada : $resultadoCliente[0]->clave ;



                $columnaDatos = array(

                    'nombre' => $nombre,

                    'celular' => $celular,

                    'direccion' => $direccion,

                    'clave' => $claveFinal,

                    'imagen' => $obtieneImagen,

                    'fecha_modificacion' => time(),

                    'llave'=> $llaveFinal

                );

                $resultado = $this->m_web_clientes->actualizar($columnaDatos, array( 'web_clientes.id' => $clientesId ));

                if($resultado){

                    $message = sprintf(error_helper::msg()->msg503,$nombre);

                    echo alerta_exito($message,3); EXIT();

                }   



                break;

            default:

                return FALSE;

        }

    }



}