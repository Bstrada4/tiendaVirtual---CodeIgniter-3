<?php

require_once APPPATH.'libraries/Model_DB.php';

clASs M_usuario extends Model_DB {
    
    public function __construct() {
        parent::__construct();
        parent::setTabla('usuario');
        parent::setId('id');
    }
    
    public function obtieneConsulta() {
        $this->ci->db->select(''
                . 'usuario.id AS id, '
                . 'usuario.usuario AS usuario, '
                . 'usuario.correo AS correo, '
                . 'usuario.clave AS clave, '
                . 'usuario.nombre AS nombre, '
                . 'usuario.apellido AS apellido, '
                . 'usuario.imagen AS imagen, '
                . 'usuario.fecha_registro AS fechaRegistro, '
                . 'usuario.fecha_modificacion AS fechaModificacion, '
                . 'usuario.eliminacion_logica AS eliminacionLogica, '
                . 'usuario.usuario_id AS usuarioId, '
                . 'rol.id AS rolId, '
                . 'rol.titulo AS rolTitulo, '
                . 'rol.skin AS rolSkin, ');
        $this->ci->db->from($this->tabla);
        $this->ci->db->join('rol', 'rol.id = usuario.rol_id', 'inner');
    }
    
    public function verificaAcceso($usuario, $clave){
        $condiciones = array(
            'usuario.usuario' => $usuario,
            'usuario.eliminacion_logica' => 1,
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
            'usuario.usuario' => $usuario,
            'usuario.eliminacion_logica' => 0,
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
            'usuario.usuario' => $usuario,
            'usuario.eliminacion_logica' => 1,
        );
        $usuarioRegistro = $this->mostrarDatos($condiciones);
        $resultadoContrASena = pASsword_verify($clave, $usuarioRegistro[0]->clave);
        if($resultadoContrASena){
            $condiciones = array(
                'usuario.usuario' => $usuario,
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
