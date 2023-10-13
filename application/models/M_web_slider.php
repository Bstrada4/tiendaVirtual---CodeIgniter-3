<?php

require_once APPPATH.'libraries/Model_DB.php';

class M_web_slider extends Model_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('web_slider');
        parent::setId('id');
    }

    public function obtieneConsulta() {
        $this->ci->db->select(''
                . 'web_slider.id AS id, '
                . 'web_slider.titulo AS titulo, '
                . 'web_slider.url AS url, '
                . 'web_slider.imagen AS imagen, '
                . 'web_slider.posicion AS posicion, '
                . 'web_slider.fecha_registro AS fechaRegistro, '
                . 'web_slider.fecha_modificacion AS fechaModificacion, '
                . 'web_slider.usuario_id AS usuarioId, '
                . 'web_slider.eliminacion_logica AS  eliminacionLogica');
        $this->ci->db->from($this->tabla);
    }

    public function ordenarPosicionItems($ordenamiento = array()){
        $cantidad = $this->mostrarDatos();
        for($i=0; $i<count($cantidad)+1; $i++){
            $datos[] = $i+1;
        }
        $obtiene = $this->mostrarDatos(array( $this->tabla.'.posicion' => 'asc' ));
        $i = 0;
        foreach($obtiene as $items){
            $colunmaDatos = array( 
                $this->tabla.'.posicion' => (empty($ordenamiento)) ? $datos[$i] : $ordenamiento[$i]
            );
            $this->actualizar($colunmaDatos, array( $this->tabla.'.id' => $items->id ));
            $i++;
        }
    }

}

