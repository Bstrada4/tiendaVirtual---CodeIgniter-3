<?php

require_once APPPATH.'libraries/Model_DB.php';

class M_products extends Model_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('products');
        parent::setId('id');
    }

    public function obtieneConsulta() {
        $this->ci->db->select(''
                . 'products.id AS id, '
                . 'products.id_product AS id_product, '
                . 'products.title AS title, '
                . 'products.body_html AS body_html, '
                . 'products.vendor AS vendor, '
                . 'products.product_type AS product_type, '
                . 'products.created_at AS created_at, '
                . 'products.handle AS handle, '
                . 'products.template_suffix AS template_suffix, '
                . 'products.tags AS tags, '
                . 'products.published_scope AS published_scope');
        $this->ci->db->from($this->tabla);
    }

}

