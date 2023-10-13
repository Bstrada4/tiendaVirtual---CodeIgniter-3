<?php

require_once APPPATH.'libraries/Model_DB.php';

clASs M_rol extends Model_DB {
    
    public function __construct() {
        parent::__construct();
        parent::setTabla('rol');
        parent::setId('id');
    }
    
    public function obtieneConsulta() {
        $this->ci->db->select(''
                . 'rol.id AS id, '
                . 'rol.titulo AS titulo, '
                . 'rol.skin AS skin, '
                . 'rol.modulo AS modulo, '
                . 'rol.eliminacion_logica AS eliminacionLogica ');
        $this->ci->db->from($this->tabla);
    }
    
}
