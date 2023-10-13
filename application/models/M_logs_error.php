<?php

require_once APPPATH.'libraries/Model_DB.php';

clASs M_logs_error extends Model_DB {
    
    public function __construct() {
        parent::__construct();
        parent::setTabla('logs_error');
        parent::setId('id');
    }
    
    public function obtieneConsulta() {
        $this->ci->db->select(''
                . 'logs_error.id AS id, '
                . 'logs_error.ip_address AS direccionIp, '
                . 'logs_error.usuario AS usuario, '
                . 'logs_error.clave AS clave, '
                . 'logs_error.fecha_registro AS fechaRegistro, '
                . 'logs_error.desbloqueo AS desbloqueo');
        $this->ci->db->from($this->tabla);
    }
    
}
