<?php

require_once APPPATH.'libraries/Model_DB.php';

class M_web_cotizacion extends Model_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('web_cotizacion');
        parent::setId('id');
    }

    public function obtieneConsulta() {
        $this->ci->db->select(''
                . 'web_cotizacion.id AS id, '
                . 'web_cotizacion.customer_id AS customerId, '
                . 'web_cotizacion.pedido_id AS pedido_id, '
                . 'web_cotizacion.nombre AS nombre, '
                . 'web_cotizacion.telefono AS telefono, '
                . 'web_cotizacion.email AS email, '
                . 'web_cotizacion.direccion AS direccion, '
                . 'web_cotizacion.mensaje AS mensaje, '
                . 'web_cotizacion.total AS total, '
                . 'web_cotizacion.fecha_registro AS fechaRegistro, '
                . 'web_cotizacion.fecha_modificacion AS fechaModificacion, '
                . 'web_cotizacion.estado AS estado, '
                . 'web_cotizacion.eliminacion_logica AS  eliminacionLogica');
        $this->ci->db->from($this->tabla);
    }

}



