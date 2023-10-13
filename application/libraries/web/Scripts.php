<?php



class Scripts {

    

    private $items = array();

    

    public function __construct() {

        $this->ci =& get_instance();



        $librerias = array();

        $helper = array();

        $modelos = array('m_configuracion');

        $this->ci->load->library($librerias);

        $this->ci->load->helper($helper);

        $this->ci->load->model($modelos);



        $this->items['baseUrl'] = base_url();

    }

    

    public function scriptVistaGeneral(){

        /* CONFIGURACION CONTACTO 1*/

        $obtieneConfiguracion1 = $this->ci->m_configuracion->mostrarDatos(array('interna' => 'contacto_1'));

        $valores1 = json_decode($obtieneConfiguracion1[0]->atributos);

        $this->items['contacto_1_correo'] = (isset($valores1->correo)) ? $valores1->correo : '';

        $this->items['contacto_1_direccion'] = (isset($valores1->direccion)) ? $valores1->direccion : '';

        $this->items['contacto_1_whatshapp_value'] = (isset($valores1->whatshapp_value)) ? $valores1->whatshapp_value : '';

        $this->items['contacto_1_whatshapp_name'] = (isset($valores1->whatshapp_name)) ? $valores1->whatshapp_name : '';

        $this->items['contacto_1_telefono_c_value'] = (isset($valores1->telefono_c_value)) ? $valores1->telefono_c_value : '';

        $this->items['contacto_1_telefono_c_name'] = (isset($valores1->telefono_c_name)) ? $valores1->telefono_c_name : '';

        $this->items['contacto_1_telefono_i1_value'] = (isset($valores1->telefono_i1_value)) ? $valores1->telefono_i1_value : '';

        $this->items['contacto_1_telefono_i1_name'] = (isset($valores1->telefono_i1_name)) ? $valores1->telefono_i1_name : '';

        $this->items['contacto_1_telefono_i2_value'] = (isset($valores1->telefono_i2_value)) ? $valores1->telefono_i2_value : '';

        $this->items['contacto_1_telefono_i2_name'] = (isset($valores1->telefono_i2_name)) ? $valores1->telefono_i2_name : '';



        /* CONFIGURACION CONTACTO 2*/

        $obtieneConfiguracion2 = $this->ci->m_configuracion->mostrarDatos(array('interna' => 'contacto_2'));

        $valores2 = json_decode($obtieneConfiguracion2[0]->atributos);

        $this->items['contacto_2_direccion'] = (isset($valores2->direccion)) ? $valores2->direccion : '';

        $this->items['contacto_2_telefono_i1_value'] = (isset($valores2->telefono_i1_value)) ? $valores2->telefono_i1_value : '';

        $this->items['contacto_2_telefono_i1_name'] = (isset($valores2->telefono_i1_name)) ? $valores2->telefono_i1_name : '';

        $this->items['contacto_2_telefono_i2_value'] = (isset($valores2->telefono_i2_value)) ? $valores2->telefono_i2_value : '';

        $this->items['contacto_2_telefono_i2_name'] = (isset($valores2->telefono_i2_name)) ? $valores2->telefono_i2_name : '';



        /* CONFIGURACION CONTACTO 3*/

        $obtieneConfiguracion3 = $this->ci->m_configuracion->mostrarDatos(array('interna' => 'contacto_3'));

        $valores3 = json_decode($obtieneConfiguracion3[0]->atributos);

        $this->items['contacto_3_direccion'] = (isset($valores3->direccion)) ? $valores3->direccion : '';

        $this->items['contacto_3_telefono_i1_value'] = (isset($valores3->telefono_i1_value)) ? $valores3->telefono_i1_value : '';

        $this->items['contacto_3_telefono_i1_name'] = (isset($valores3->telefono_i1_name)) ? $valores3->telefono_i1_name : '';

        $this->items['contacto_3_telefono_i2_value'] = (isset($valores3->telefono_i2_value)) ? $valores3->telefono_i2_value : '';

        $this->items['contacto_3_telefono_i2_name'] = (isset($valores3->telefono_i2_name)) ? $valores3->telefono_i2_name : '';





        /* CONFIGURACION REDES SOCIALES*/

        $obtieneConfiguracion4 = $this->ci->m_configuracion->mostrarDatos(array('interna' => 'sociales'));

        $valores4 = json_decode($obtieneConfiguracion4[0]->atributos);

        $this->items['instagram'] = (isset($valores4->instagram)) ? $valores4->instagram : '';

        $this->items['twitter'] = (isset($valores4->twitter)) ? $valores4->twitter : '';

        $this->items['facebook'] = (isset($valores4->facebook)) ? $valores4->facebook : '';

        $this->items['youtube'] = (isset($valores4->youtube)) ? $valores4->youtube : '';



        /* CONFIGURACION GOOGLE MAPS*/

        $obtieneConfiguracion5 = $this->ci->m_configuracion->mostrarDatos(array('interna' => 'maps'));
        $valores5 = json_decode($obtieneConfiguracion5[0]->atributos);
        $this->items['titulol_1'] = (isset($valores5->titulo_1) and !empty($valores5->titulo_1)) ?  $valores5->titulo_1: 'Lugar 1';
        $this->items['titulol_2'] = (isset($valores5->titulo_2) and !empty($valores5->titulo_2)) ?  $valores5->titulo_2: 'Lugar 2';
        $this->items['titulol_3'] = (isset($valores5->titulo_3) and !empty($valores5->titulo_3)) ?  $valores5->titulo_3: 'Lugar 3';
        $this->items['titulol_4'] = (isset($valores5->titulo_4) and !empty($valores5->titulo_4)) ?  $valores5->titulo_4: 'Lugar 4';
        $this->items['titulol_5'] = (isset($valores5->titulo_5) and !empty($valores5->titulo_5)) ?  $valores5->titulo_5: 'Lugar 5';
        $this->items['titulol_6'] = (isset($valores5->titulo_6) and !empty($valores5->titulo_6)) ?  $valores5->titulo_6: 'Lugar 6';

        $this->items['latitud_1'] = (isset($valores5->latitud_1)) ?  str_replace('-', '', $valores5->latitud_1): '';
        $this->items['longitud_1'] = (isset($valores5->longitud_1)) ?   str_replace('-', '', $valores5->longitud_1): '';
        $this->items['latitud_2'] = (isset($valores5->latitud_2)) ?  str_replace('-', '', $valores5->latitud_2) : '';
        $this->items['longitud_2'] = (isset($valores5->longitud_2)) ?  str_replace('-', '', $valores5->longitud_2) : '';
        $this->items['latitud_3'] = (isset($valores5->latitud_3)) ?  str_replace('-', '', $valores5->latitud_3) : '';
        $this->items['longitud_3'] = (isset($valores5->longitud_3)) ?  str_replace('-', '', $valores5->longitud_3) : '';
        $this->items['latitud_4'] = (isset($valores5->latitud_4)) ?  str_replace('-', '', $valores5->latitud_4) : '';
        $this->items['longitud_4'] = (isset($valores5->longitud_4)) ?  str_replace('-', '', $valores5->longitud_4) : '';
        $this->items['latitud_5'] = (isset($valores5->latitud_5)) ?  str_replace('-', '', $valores5->latitud_5) : '';
        $this->items['longitud_5'] = (isset($valores5->longitud_5)) ?  str_replace('-', '', $valores5->longitud_5) : '';
        $this->items['latitud_6'] = (isset($valores5->latitud_6)) ?  str_replace('-', '', $valores5->latitud_6) : '';
        $this->items['longitud_6'] = (isset($valores5->longitud_6)) ? str_replace('-', '', $valores5->longitud_6 ) : '';
        return $this->items;

    }

       

}

