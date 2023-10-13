<?php

require_once APPPATH.'libraries/Model_DB.php';

class M_web_mitos extends Model_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('web_mitos');
        parent::setId('id');
    }

    public function obtieneConsulta() {
        $this->ci->db->select(''
                . 'web_mitos.id AS id, '
                . 'web_mitos.titulo AS titulo, '
                . 'web_mitos.subtitulo AS subtitulo, '
                . 'web_mitos.slug AS slug, '
                . 'web_mitos.descripcion AS descripcion, '
                . 'web_mitos.icono_id AS icono_id, '
                . 'web_mitos.icono AS icono, '
                . 'web_mitos.imagen AS imagen, '
                . 'web_mitos.imagen_home AS imagen_home, '
                . 'web_mitos.posicion AS posicion, '
                . 'web_mitos.fecha_registro AS fechaRegistro, '
                . 'web_mitos.fecha_modificacion AS fechaModificacion, '
                . 'web_mitos.usuario_id AS usuarioId, '
                . 'web_mitos.eliminacion_logica AS  eliminacionLogica');
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



