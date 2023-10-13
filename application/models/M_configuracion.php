<?php

require_once APPPATH.'libraries/Model_DB.php';

class M_configuracion extends Model_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('configuracion');
        parent::setId('id');
    }
    
    public function obtieneConsulta() {
        $this->ci->db->select(''
                . 'configuracion.id as id, '
                . 'configuracion.interna as interna, '
                . 'configuracion.atributos as atributos');
        $this->ci->db->from($this->tabla);
    }
}
