<?php



require_once APPPATH.'libraries/Model_DB.php';



clASs M_web_clientes extends Model_DB {

    

    public function __construct() {

        parent::__construct();

        parent::setTabla('web_clientes');

        parent::setId('id');

    }

    

    public function obtieneConsulta() {

        $this->ci->db->select(''

                . 'web_clientes.id AS id, '

                . 'web_clientes.nombre AS nombre, '

                . 'web_clientes.celular AS celular, '

                . 'web_clientes.direccion AS direccion, '
                . 'web_clientes.email AS email, '

                . 'web_clientes.usuario AS usuario, '

                . 'web_clientes.clave AS clave, '

                . 'web_clientes.imagen AS imagen, '

                . 'web_clientes.fecha_registro AS fechaRegistro, '

                . 'web_clientes.fecha_modificacion AS fechaModificacion , '

                . 'web_clientes.eliminacion_logica AS eliminacionLogica , '

                . 'web_clientes.llave AS llave, ');

        $this->ci->db->from($this->tabla);

    }

    

    public function verificaAcceso($usuario, $clave){

        $condiciones = array(

            'web_clientes.usuario' => $usuario,

        );

        $usuarioRegistro = $this->mostrarDatos($condiciones);

        if(!empty($usuarioRegistro) and strcmp($usuario, $usuarioRegistro[0]->usuario) === 0){

            $resultado = pASsword_verify($clave, $usuarioRegistro[0]->clave);

            if(!$resultado){

                return FALSE;

            } else{

                return TRUE;

            }

        }else{

            return FALSE;

        }

        

    }



    public function verificaUsuarioActivo($usuario){

        $condiciones = array(

            'web_clientes.usuario' => $usuario,

            'web_clientes.eliminacion_logica' => 1,

        );

        $usuarioRegistro = $this->mostrarDatos($condiciones);

        if(!empty($usuarioRegistro)){

            return TRUE;

        }else{

            return FALSE;

        } 

    }



    public function exitoAcceso($usuario, $clave) {

        $condiciones = array(

            'web_clientes.usuario' => $usuario,

            'web_clientes.eliminacion_logica' => 1,

        );

        $usuarioRegistro = $this->mostrarDatos($condiciones);

        $resultadoContrASena = pASsword_verify($clave, $usuarioRegistro[0]->clave);

        if($resultadoContrASena){

            $condiciones = array(

                'web_clientes.usuario' => $usuario,

            );

            $resultado = $this->mostrarDatos($condiciones);

            if(!empty($resultado)){

                return $resultado;

            } else{

                return FALSE;

            }

        }

    }

    

}

