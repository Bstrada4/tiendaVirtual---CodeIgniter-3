<?php

class Algoritmos extends CI_Controller{
    
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

        $this->items['baseUrl'] = base_url();
    }
    
    public function cropimage($ancho = '', $alto = '', $ubicacionCarpeta = ''){
        try{
            if((isset($ancho) && $ancho != '') && (isset($alto) && $alto != '') && (isset($ubicacionCarpeta) && $ubicacionCarpeta != '')){
                $ancho = (int) $ancho;
                $alto = (int) $alto;
                if(is_int($ancho) && is_int($alto) && is_string($ubicacionCarpeta)){
                    $delimitador = explode('-', $ubicacionCarpeta);
                    $obtieneUbicacion = $this->items['baseUrl'].'public/imagen/'.$delimitador[0].'/'.$delimitador[1];
                    echo $this->crop->ready($obtieneUbicacion, $ancho, $alto, '', '');
                } else{
                    return FALSE;
                }
            } else{
                return FALSE;
            }
        } catch (Exception $excepcion) {
            echo $excepcion;
        }
    }
    
    public function cropurl($anchoImagen = '', $altoImagen = '', $imagenUbicacion = ''){
        try{
            if((isset($anchoImagen) && $anchoImagen != '') && (isset($altoImagen) && $altoImagen != '') && (isset($imagenUbicacion) && $imagenUbicacion != '')){
                $anchoImagen = (int) $anchoImagen;
                $altoImagen = (int) $altoImagen;
                if(is_int($anchoImagen) && is_int($altoImagen) && is_string($imagenUbicacion)){
                    $desencriptaImagen = $this->complementos->desencriptaInfo($imagenUbicacion);
                    $generaImagen = md5($desencriptaImagen).'.png';
                    $tempUbicacion = './public/imagen/temp/'.$generaImagen;
                    file_put_contents($tempUbicacion, file_get_contents($desencriptaImagen));
                    $obtieneImagen = $this->items['baseUrl'].'public/imagen/temp/'.$generaImagen;
                    echo $this->crop->ready($obtieneImagen, $anchoImagen, $altoImagen, '', '');
                } else{
                    show_404();
                }
            } else{
                show_404();
            }
        } catch (Exception $exepcion) {
            echo $exepcion;
        }
    }

    public function thumbimage($ancho = '', $alto = '', $ubicacionCarpeta = ''){
        try{
            if((isset($ancho) && $ancho != '') && (isset($alto) && $alto != '') && (isset($ubicacionCarpeta) && $ubicacionCarpeta != '')){
                $ancho = (int) $ancho;
                $alto = (int) $alto;
                if(is_int($ancho) && is_int($alto) && is_string($ubicacionCarpeta)){
                    $restableceUbicacion = str_replace('-', '/', $ubicacionCarpeta);
                    $obtieneUbicacion = $this->items['baseUrl'].$restableceUbicacion;
                    echo $this->crop->ready($obtieneUbicacion, $ancho, $alto, '', '');
                } else{
                    return FALSE;
                }
            } else{
                return FALSE;
            }
        } catch (Exception $excepcion) {
            echo $excepcion;
        }
    }

    public function download($archivo, $ubicacionCarpeta, $activaRuteo = FALSE){
        if(!$activaRuteo){
            $obtieneArchivo = file_get_contents('public/imagen/'.$ubicacionCarpeta.'/'.$archivo);
        } else{
            $delimitador = str_replace('-', '/', $ubicacionCarpeta);
            $obtieneArchivo = file_get_contents($delimitador.'/'.$archivo);
        }
        echo force_download($archivo, $obtieneArchivo);
    }

    public function generate($accion){
        switch($accion){
            case 'captcha':
                $obtieneCaptcha = $this->datos_privados->generarCaptcha(183, 60);
                if($obtieneCaptcha !== FALSE){
                    echo $obtieneCaptcha;
                } else{
                    return FALSE;
                }
                break;
            default:
                return FALSE;
        }
    }
    
}
