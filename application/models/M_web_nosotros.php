<?php

require_once APPPATH.'libraries/Model_DB.php';

class M_web_nosotros extends Model_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('web_nosotros');
        parent::setId('id');
    }

    public function obtieneConsulta() {
        $this->ci->db->select(''
                . 'web_nosotros.id AS id, '
                . 'web_nosotros.titulo AS titulo, '
                . 'web_nosotros.descripcion_1 AS descripcion_1, '
                . 'web_nosotros.descripcion_2 AS descripcion_2, '
                . 'web_nosotros.descripcion_3 AS descripcion_3, '
                . 'web_nosotros.mensaje_1 AS mensaje_1, '
                . 'web_nosotros.mensaje_2 AS mensaje_2, '
                . 'web_nosotros.mensaje_3 AS mensaje_3, '
                . 'web_nosotros.mensaje_4 AS mensaje_4, '
                . 'web_nosotros.mensaje_5 AS mensaje_5, '
                . 'web_nosotros.imagen AS imagen, '
                . 'web_nosotros.fecha_registro AS fechaRegistro, '
                . 'web_nosotros.fecha_modificacion AS fechaModificacion, '
                . 'web_nosotros.usuario_id AS usuarioId, '
                . 'web_nosotros.eliminacion_logica AS  eliminacionLogica');
        $this->ci->db->from($this->tabla);
    }


}

