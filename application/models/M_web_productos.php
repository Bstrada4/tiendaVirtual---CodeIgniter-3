<?php

require_once APPPATH.'libraries/Model_DB.php';

class M_web_productos extends Model_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('web_productos');
        parent::setId('id');
    }

    public function obtieneConsulta() {
        $this->ci->db->select(''
                . 'web_productos.id AS id, '
                . 'web_productos.titulo AS titulo, '
                . 'web_productos.subtitulo AS subtitulo, '
                . 'web_productos.slug AS slug, '
                . 'web_productos.descripcion AS descripcion, '
                . 'web_productos.precio AS precio, '
                . 'web_productos.oferta AS oferta, '
                . 'web_productos.imagen AS imagen, '
                . 'web_productos.categoria_id AS categoria_id, '
                . 'web_productos.cantidad AS cantidad, '
                . 'web_productos.posicion AS posicion, '
                . 'web_productos.fecha_registro AS fechaRegistro, '
                . 'web_productos.fecha_modificacion AS fechaModificacion, '
                . 'web_productos.usuario_id AS usuarioId, '
                . 'web_productos.eliminacion_logica AS  eliminacionLogica');
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

