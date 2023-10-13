<?php

require_once APPPATH.'libraries/Model_DB.php';

class M_estado_pedido extends Model_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('estado_pedido');
        parent::setId('id');
    }

    public function obtieneConsulta() {
        $this->ci->db->select(''
                . 'estado_pedido.id AS id, '
                . 'estado_pedido.titulo AS titulo, '
                . 'estado_pedido.eliminacion_logica AS  eliminacionLogica');
        $this->ci->db->from($this->tabla);
    }

}



