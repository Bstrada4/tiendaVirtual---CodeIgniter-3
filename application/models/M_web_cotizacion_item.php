<?php
require_once APPPATH.'libraries/Model_DB.php';

class M_web_cotizacion_item extends Model_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('web_cotizacion_item');
        parent::setId('id');
    }

    public function obtieneConsulta() {
        $this->ci->db->select(''
                . 'web_cotizacion_item.id AS id, '
                . 'web_cotizacion_item.cotizacion_id AS cotizacion_id, '
                . 'web_cotizacion_item.producto_id AS producto_id, '
                . 'web_cotizacion_item.titulo AS titulo, '
                . 'web_cotizacion_item.precio AS precio, '
                . 'web_cotizacion_item.cantidad AS  cantidad');
        $this->ci->db->from($this->tabla);

    }
}



