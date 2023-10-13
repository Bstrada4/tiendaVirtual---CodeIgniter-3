<?php

require_once APPPATH.'libraries/Model_DB.php';

class M_web_categoria extends Model_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('web_categoria');
        parent::setId('id');
    }

    public function obtieneConsulta() {
        $this->ci->db->select(''
                . 'web_categoria.id AS id, '
                . 'web_categoria.titulo AS titulo, '
                . 'web_categoria.subtitulo AS subtitulo, '
                . 'web_categoria.slug AS slug, '
                . 'web_categoria.imagen AS imagen, '
                . 'web_categoria.posicion AS posicion, '
                . 'web_categoria.fecha_registro AS fechaRegistro, '
                . 'web_categoria.fecha_modificacion AS fechaModificacion, '
                . 'web_categoria.usuario_id AS usuarioId, '
                . 'web_categoria.eliminacion_logica AS  eliminacionLogica');
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

