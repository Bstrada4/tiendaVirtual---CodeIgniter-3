<?php

require_once APPPATH.'libraries/Model_DB.php';

class M_web_nutricion extends Model_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('web_nutricion');
        parent::setId('id');
    }

    public function obtieneConsulta() {
        $this->ci->db->select(''
                . 'web_nutricion.id AS id, '
                . 'web_nutricion.titulo AS titulo, '
                . 'web_nutricion.slug AS slug, '
                . 'web_nutricion.descripcion AS descripcion, '
                . 'web_nutricion.descripcion_corta AS descripcion_corta, '
                . 'web_nutricion.imagen AS imagen, '
                . 'web_nutricion.imagen_home AS imagen_home, '
                . 'web_nutricion.posicion AS posicion, '
                . 'web_nutricion.fecha_registro AS fechaRegistro, '
                . 'web_nutricion.fecha_modificacion AS fechaModificacion, '
                . 'web_nutricion.usuario_id AS usuarioId, '
                . 'web_nutricion.eliminacion_logica AS  eliminacionLogica');
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

