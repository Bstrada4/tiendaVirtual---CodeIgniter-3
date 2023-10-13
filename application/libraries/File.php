<?php
/*
 * @param String    $nombreArchivo      Archivo a manipular
 * @param String    $directorio         Directorio de destino del archivo 
 * @param String    $tipoArchivo        Extensión que identifica el nombre del archivo
 * @param Array     $tipoPermitido     	Arreglo con las extensiones permitidas
 * @param int       $tamanoArchivo      Tamaño del archivo (en bytes)
 * @param String    $nombreTemporal     Directorio temporal de localización del archivo
 * @param String    $nuevoNombre        Nombre del archivo a manipular
 * @param int       $tamanoMaximo       Máximo tamañoo aceptado 
 */
class File{	
    private $nombreArchivo;
    private $directorio;	
    private $tipoArchivo;
    private $tamanoArchivo;
    private $nombreTemporal;
    private $nuevoNombre;
    private $tamanoMaximo;
    
    public function loadFile($nombreArchivo, $directorio, $tamanoArchivo, $nombreTemporal, $nuevoNombre = '', $tamanoMaximo = ''){
        $this->nombreArchivo = $nombreArchivo;
        $this->directorio = $directorio;		
        $this->tipoArchivo = $this->getTypeFile($nombreArchivo);
        $this->tamanoArchivo = $tamanoArchivo;		
        $this->nuevoNombre = ($nuevoNombre == '') ? str_replace('.'.$this->tipoArchivo, '', $nombreArchivo) : $nuevoNombre;		
        $this->tamanoMaximo = ($tamanoMaximo == '') ? ini_get('upload_max_filesize') * 1048576 : $tamanoMaximo * 1048576;
        $this->nombreTemporal = $nombreTemporal;
    }
	
    /*
     * Devuelve la extensión de un archivo
     */
    private function getTypeFile($nombreArchivo){
        if($nombreArchivo != ''){
            $extention = end(explode('.', $nombreArchivo));
            return $extention;
        }
    }

    /*
     * Revisa si el archivo es del tamaño permitido
     */
    private function checkSize(){
        if($this->tamanoArchivo > $this->tamanoMaximo){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    
    /*
     * Sube los archivos
     */
    public function uploadFile(){		
        if(!$this->checkSize()){
            $mensajeAlerta = 'El archivo ha superado los '.$this->tamanoMaximo.' MB permitido.';
            $archivo = FALSE;
        } else
        if(file_exists($this->directorio.'/'.$this->nombreArchivo)){
            $mensajeAlerta = 'El archivo ya existe en la ubicación establecida.';
            $archivo = FALSE;
        } else{
            move_uploaded_file($this->nombreTemporal, $this->directorio.'/'.$this->nuevoNombre);
            $mensajeAlerta = 'El archivo fue guardado exitosamente';
            $archivo = $this->nuevoNombre;
        }
        $datos = array(
            'mensaje' => $mensajeAlerta, 
            'archivo' => $archivo
        );
        return $datos;
    }
}