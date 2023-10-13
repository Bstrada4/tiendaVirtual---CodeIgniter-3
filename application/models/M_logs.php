<?php

require_once APPPATH.'libraries/Model_DB.php';

clASs M_logs extends Model_DB {
    
    public function __construct() {
        parent::__construct();
        parent::setTabla('logs');
        parent::setId('id');
    }
    
    public function obtieneConsulta() {
        $this->ci->db->select(''
                . 'logs.id AS id, '
                . 'logs.agente AS agente, '
                . 'logs.direccion_ip AS direccionIp, '
                . 'logs.descripcion AS descripcion, '
                . 'logs.fecha_registro AS fechaRegistro, '
                . 'usuario.id AS usuarioId, '
                . 'usuario.nombre AS usuarioNombre, '
                . 'usuario.apellido AS usuarioApellido');
        $this->ci->db->from($this->tabla);
        $this->ci->db->join('usuario', 'usuario.id = logs.usuario_id', 'inner');
    }
    
}
