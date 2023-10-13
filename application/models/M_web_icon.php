<?php

require_once APPPATH.'libraries/Model_DB.php';

class M_web_icon extends Model_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('web_icon');
        parent::setId('id');
    }

    public function obtieneConsulta() {
        $this->ci->db->select(''
                . 'web_icon.id AS id, '
                . 'web_icon.titulo AS titulo, '
                . 'web_icon.icono AS icono, '
                . 'web_icon.eliminacion_logica AS  eliminacionLogica');
        $this->ci->db->from($this->tabla);
    }

}

