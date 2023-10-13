<?php

require_once APPPATH.'libraries/Model_DB.php';

class M_web_recetas extends Model_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('web_recetas');
        parent::setId('id');
    }

    public function obtieneConsulta() {
        $this->ci->db->select(''
                . 'web_recetas.id AS id, '
                . 'web_recetas.titulo AS titulo, '
                . 'web_recetas.subtitulo AS subtitulo, '
                . 'web_recetas.slug AS slug, '
                . 'web_recetas.descripcion AS descripcion, '
                . 'web_recetas.categoria_id AS categoriaId, '
                . 'web_recetas.imagen AS imagen, '
                . 'web_recetas.posicion AS posicion, '
                . 'web_recetas.fecha_registro AS fechaRegistro, '
                . 'web_recetas.fecha_modificacion AS fechaModificacion, '
                . 'web_recetas.usuario_id AS usuarioId, '
                . 'web_recetas.eliminacion_logica AS  eliminacionLogica');
        $this->ci->db->from($this->tabla);
    }

    public function ordenarPosicionItems($ordenamiento = array(),$categoriaId = ''){
        $condicion1 = array($this->tabla.'.categoria_id' => $categoriaId);
        $cantidad = $this->mostrarDatos($condicion1);
        for($i=0; $i<count($cantidad)+1; $i++){
            $datos[] = $i+1;
        }
        $obtiene = $this->mostrarDatos(array( $this->tabla.'.posicion' => 'asc',$this->tabla.'.categoria_id' => $categoriaId ));
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

