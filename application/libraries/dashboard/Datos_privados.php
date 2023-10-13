<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Datos_privados {



    private $items = array();



	public function __construct() {

        $this->ci =& get_instance();

        ini_set('memory_limit', '1024M');

        ini_set('max_execution_time', 0);

        ini_set('upload_max_filesize', '200M');



        $librerias = array('dashboard/scripts');

        $helper = array();

        $modelos = array('m_usuario','m_rol');

        $this->ci->load->library($librerias);

        $this->ci->load->helper($helper);

        $this->ci->load->model($modelos);

        $this->ci->accesoSession = sessiones_helper::obtieneInfoSesion('sesionUsuario');



        $this->scriptVista = $this->ci->scripts->scriptVistaGeneral();

        $this->items = array_merge($this->items, $this->scriptVista);



        $this->items['carpetaProyecto'] = 'dashboard';

        $this->items['baseUrl'] = base_url();

        $this->items['getUrl'] = base_url().$this->items['carpetaProyecto'].'/';

    }



    public function verificaAcceso(){

        if(!isset($this->ci->accesoSession->accesoTmpId)){

            sessiones_helper::destruyeInfoSesion('sesionUsuario');

            echo re_direccion($this->items['getUrl'].'acceso/panel'); 

            EXIT();

        } else {

            $condiciones = array( 'usuario.id' => $this->ci->accesoSession->accesoTmpId, 'usuario.eliminacion_logica' => 1 );

            $obtieneUsuario = $this->ci->m_usuario->mostrarDatos($condiciones);

            if(!empty($obtieneUsuario)){

                $obtieneUsuario = $obtieneUsuario[0];

                $obtieneImagen = ($obtieneUsuario->imagen != '') ? $obtieneUsuario->imagen : 'empty.png';

                $data['accesoTmpId'] = $obtieneUsuario->id;

                $data['accesoTmpImagen'] =  base_url().'crop/150/150/usuario-'.$obtieneImagen;

                $data['accesoTmpNombre'] = $obtieneUsuario->nombre;

                $data['accesoTmpRolTitulo'] = $obtieneUsuario->rolTitulo;

                $data['accesoTmpRolId'] = $obtieneUsuario->rolId;

            } else {

                sessiones_helper::destruyeInfoSesion('sesionUsuario');

                echo re_direccion($this->items['getUrl'].'acceso/panel'); 

                EXIT();

            }

        }

        return $data;

    }



    public function verificaNoAcceso(){

        if(isset($this->ci->accesoSession->accesoTmpId)){

            echo re_direccion($this->items['getUrl'].'principal/panel'); exit;

        }

    }



    public function generaSkinNivelUsuario($nivelDescripcion, $skin){

        $texto = '';

        $texto .= '<span class="btn btn-flat btn-xs '.$skin.'">'.$nivelDescripcion.'</span>';

        return $texto;

    }



    public function formAccion($accion, $id, $eliminacionLogica = 1){

        $obtieneAccion = $accion;

        $defectoAccion = array(

            'entity' => 'usuario',

            'route' => $this->items['baseUrl'].$this->items['carpetaProyecto'], 

            'option' => 'observar|editar|denegar|permitir|remover', 

            'response' => 'respuesta', 

            'class' => 'procesarInfo'

        );

        $generaAccion = array_merge($defectoAccion, $obtieneAccion);

        $resultado = explode('|', $generaAccion['option']);

        $texto = '';

        foreach($resultado as $items){

            switch(trim($items)){
                case 'observar':
                        $texto .= '<small style="padding: 2px; display: inline-block;"><a href="'.$generaAccion['route'].'/'.$generaAccion['entity'].'/observar/'.$id.'" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="OBSERVAR ITEM">';
                        $texto .= '<i class="fa fa-eye"></i></a></small>';
                    break;
                case 'editar':
                        $texto .= '<small style="padding: 2px; display: inline-block;"><a href="'.$generaAccion['route'].'/'.$generaAccion['entity'].'/editar/'.$id.'" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="EDITAR ITEM">';

                        $texto .= '<i class="fa fa-edit"></i></a></small>';
                    break;
                case 'denegar':
                        if($eliminacionLogica == 1){
                            $texto .= '<small style="padding: 2px; display: inline-block;"><a href="javascript:;" data-url="'.$generaAccion['entity'].'/proceso/denegar/'.$id.'" data-response="'.$generaAccion['response'].'" class="btn btn-warning '.$generaAccion['class'].'" data-toggle="tooltip" data-placement="bottom" title="DENEGAR ITEM">';

                            $texto .= '<i class="fa fa-unlock-alt"></i></a></small>';
                        }
                    break;
                case 'permitir':
                        if($eliminacionLogica == 0){
                            $texto .= '<small style="padding: 2px; display: inline-block;"><a href="javascript:;" data-url="'.$generaAccion['entity'].'/proceso/permitir/'.$id.'" data-response="'.$generaAccion['response'].'" class="btn btn-primary '.$generaAccion['class'].'" data-toggle="tooltip" data-placement="bottom" title="PERMITIR ITEM">';

                            $texto .= '<i class="fa fa-unlock"></i></a></small>';
                        }
                    break;
                case 'remover':
                        if($this->seguridadAccionModulo($this->ci->accesoSession->accesoTmpNivel, $generaAccion['entity'], 'remover')){
                            if($eliminacionLogica == 0){
                                $texto .= '<small style="padding: 2px; display: inline-block;"><a href="javascript:;" data-url="'.$generaAccion['entity'].'/proceso/remover/'.$id.'" data-response="'.$generaAccion['response'].'" class="btn btn-danger '.$generaAccion['class'].'" data-toggle="tooltip" data-placement="bottom" title="ELIMINAR ITEM">';

                                $texto .= '<i class="fa fa-trash"></i></a></small>';
                            } 
                        }
                    break;
                default:
                    return FALSE;

            }

        }

        return $texto;

    }



    public function seguridadAccionModulo($nivelId, $modulo, $accion){

        $obtieneModulo = $this->ci->m_rol->mostrarDatos(array( 'rol.id' => $nivelId ));

        if(!empty($obtieneModulo)){

            $obtieneModulo = $obtieneModulo[0];

            $jsonDecode = json_decode($obtieneModulo->modulo);

            foreach($jsonDecode as $k => $v){

                if($k == $accion){

                    switch($v){

                        case 0:

                            return FALSE;

                        case 1:

                            return TRUE;

                    }

                } else{

                    continue;

                }

            }

            return FALSE;

        } else{

            return FALSE;

        }

    }



}



