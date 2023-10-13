<?php
@header('X-Frame-Options: SAMEORIGIN');
@header('Referrer-Policy: no-referrer');
@header('X-Powered-By: Apolomultimedia');

class Usuario extends CI_Controller {
    private $resultado;
    private $items = array();

    public function __construct() {
        parent::__construct();
        ini_set('memory_limit', '1024M');
        ini_set('max_execution_time', 0);
        ini_set('upload_max_filesize', '200M');

        $librerias = array('dashboard/datos_privados');
        $helper = array();
        $modelos = array();
        $this->load->library($librerias);
        $this->load->helper($helper);
        $this->load->model($modelos);
    
        $this->items['miModulo'] = 'usuario';
        $this->items['carpetaProyecto'] = 'dashboard';
        $this->items['baseUrl'] = base_url();
        $this->items['getUrl'] = base_url().$this->items['carpetaProyecto'].'/';
        $this->scriptVista = $this->scripts->scriptVistaGeneral();
        $this->items = array_merge($this->items, $this->scriptVista);
        $this->accesoSession = sessiones_helper::obtieneInfoSesion('sesionUsuario');
        $this->verificaAcceso = $this->datos_privados->verificaAcceso();
        $this->items['usuario_active'] = 'mm-active';
    }

    public function listar($pagina = 0){
        $data['tituloEncabezado'] = $this->items['sisInfoTituloEmpresa'] .' - listar Usuario';
        /* Información */
            if($this->accesoSession->accesoTmpNivel == 500){
                $condiciones = array(
                    'usuario.rol_id !=' => 500
                );
            } else{
                $condiciones = array( 
                    'usuario.rol_id !=' => 500,
                    'usuario.usuario_id !=' => $this->accesoSession->accesoTmpId
                );
            }
        /* Datatable */
            $opciones = array(
                'iDisplayLength' => 10, 
                'bSort' => FALSE, 
                'bPaginate' => TRUE, 
                'bFilter' => TRUE, 
                'bLengthChange' => FALSE, 
                'bInfo' => FALSE
            );
            $dataTable = $this->complementos->datatable($opciones, '.dataTable');
            $this->items['jqueryDataTable'] = $dataTable['jquery'];
            $this->items['clasesDataTable'] = $dataTable['clases'];
        /* Información */
            $usuario = $this->m_usuario->mostrarDatos($condiciones);
            if(!empty($usuario)){
                $this->table->set_template(
                    array(
                        'table_open' => '<table class="table table-hover table-bordered table-striped dt-responsive table-sm dataTable" style="border-collapse: collapse; border-spacing: 0; width: 100%;" id="infoTable">',
                        'heading_cell_start'  => '<th style="vertical-align:middle; text-align:center;">',
                        'thead_open'  => '<thead class="thead-dark">',
                        'cell_start' => '<td style="vertical-align:middle; text-align:center;">',
                        'cell_alt_start' => '<td style="vertical-align:middle; text-align:center;">'
                    )
                );
                $todosCheckInfo = '<a style="color: white;" href="javascript:;" class="text-black removerInfoTotal" data-url="'.$this->items['miModulo'].'/proceso/removerTodo" data-response="respuesta" data-toggle="tooltip" title="ELIMINAR ITEMS"><i class="fa fa-trash"></i> ELIMINAR</a>';
                $todosCheck = '<input type="checkbox" name="checkTodo" id="checkTodo" />';
                $this->table->set_heading('#', 'USUARIO', 'NIVEL DE USUARIO', 'NOMBRE(S) & APELLIDO(S)', $todosCheckInfo.'<br />'.$todosCheck, 'ACCIÓN');
                $accion = array(
                    'entity' => $this->items['miModulo'],
                    'route' => $this->items['baseUrl'].$this->items['carpetaProyecto'], 
                    'option' => 'observar|editar|denegar|permitir|remover', 
                    'response' => 'respuesta', 
                    'class' => 'procesarInfo'
                );
                $i = 1;
                foreach($usuario AS $items){
                    $checkAccion = '<input type="checkbox" name="checkRemover" id="checkRemover" value="'.$items->id.'" />'; 
                    if($items->eliminacionLogica == 1){
                        $this->table->add_row(
                            $i, 
                            '<span class="text-primary">'.$items->usuario.'</span>', 
                            '<span class="text-primary">'.$this->datos_privados->generaSkinNivelUsuario($items->rolTitulo, $items->rolSkin).'</span>', 
                            '<span class="text-primary">'.$items->nombre.' '.$items->apellido.'</span>',  
                            '', 
                            $this->datos_privados->formAccion($accion, $items->id, $items->eliminacionLogica)
                        );
                    } else{
                        $this->table->add_row(
                            $i, 
                            '<span class="text-danger">'.$items->usuario.'</span>', 
                            '<span class="text-danger">'.$this->datos_privados->generaSkinNivelUsuario($items->rolTitulo, $items->rolSkin).'</span>', 
                            '<span class="text-danger">'.$items->nombre.' '.$items->apellido.'</span>',   
                            $checkAccion, 
                            $this->datos_privados->formAccion($accion, $items->id, $items->eliminacionLogica)
                        );
                    }
                    $i++;
                }
                $data['generaTabla'] = $this->table->generate();
                $data['generaPaginacion'] = $this->pagination->create_links();
            }else{
                $data['generaTabla'] = '<h4>No se encontraron resultados</h4>';
            }

        $data = array_merge($data, $this->items);
        $data = array_merge($data, $this->verificaAcceso);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/page/listar_usuario', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_footer', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/footer', $data);
    }

    public function agregar(){
        $data['tituloEncabezado'] = $this->items['sisInfoTituloEmpresa'] .' - Agregar Usuario';

        /* Desplegable */
        switch($this->accesoSession->accesoTmpNivel){
            case 201: $condiciones = array( 'rol.id' => 0 ); break;
            case 401: $condiciones = array( 'rol.id >=' => 100, 'rol.id !=' => 500 ); break;
            case 500: $condiciones = array( 'rol.id >=' => 100, 'rol.id !=' => 500 ); break;
            default: $condiciones = array( 'rol.id' => 0 );
        }
        $rol = $this->m_rol->mostrarDatos($condiciones);
        foreach($rol as $items){
            $select[$items->id] = $items->titulo;
        }
        $data['rolId'] = $this->complementos->generaSelect($select, 'rolId', '' , 'Seleccione una opción', 'style="height: 24px;"', 'select'); 
        unset($select);
        /* ########## */

        $data = array_merge($data, $this->items);
        $data = array_merge($data, $this->verificaAcceso);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/page/agregar_usuario', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_footer', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/footer', $data);
    }

    public function editar($id = ''){
        $data['tituloEncabezado'] = $this->items['sisInfoTituloEmpresa'] .' - Editar Usuario';
        sessiones_helper::eliminaSesion('editarUsuario');
        if($this->accesoSession->accesoTmpNivel == 500){
            $condiciones = array(
                'usuario.id' => $id,'usuario.rol_id !=' => 500,
            );
        } else {
            $condiciones = array(
                'usuario.id' => $id, 'usuario.rol_id !=' => 500, 'usuario.usuario_id' => $this->accesoSession->accesoTmpId
            );
        }
        $resultado = $this->m_usuario->mostrarDatos($condiciones);
        if(!empty($resultado)){
            $usuario = $resultado[0];
            sessiones_helper::creaSesion('editarUsuario', $usuario->id);
            $data['prefil_usuario'] = $usuario->usuario;
            $data['prefil_correo'] = $usuario->correo;
            $data['prefil_nombre'] = $usuario->nombre;
            $data['prefil_apellido'] = $usuario->apellido;
            /* Desplegable */
            switch($this->accesoSession->accesoTmpNivel){
                case 201: $condiciones = array( 'rol.id' => 0 ); break;
                case 401: $condiciones = array( 'rol.id >=' => 100, 'rol.id !=' => 500 ); break;
                case 500: $condiciones = array( 'rol.id >=' => 100, 'rol.id !=' => 500 ); break;
                default: $condiciones = array( 'rol.id' => 0 );
            }
            $rol = $this->m_rol->mostrarDatos($condiciones);
            foreach($rol as $items){
                $select[$items->id] = $items->titulo;
            }
            $data['rolId'] = $this->complementos->generaSelect($select, 'rolId', $usuario->rolId , 'Seleccione una opción', '', 'select'); 
            unset($select);
            /* ########## */
        } else {
            echo re_direccion($this->items['getUrl'].'principal/panel'); EXIT;
        }
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $this->verificaAcceso);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/page/editar_usuario', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_footer', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/footer', $data);
    }


    public function perfil(){
        $data['tituloEncabezado'] = $this->items['sisInfoTituloEmpresa'] .' - Perfil Usuario';

        $condiciones = array(
            'usuario.id' => $this->accesoSession->accesoTmpId
        );
        $resultado = $this->m_usuario->mostrarDatos($condiciones);
        if(!empty($resultado)){
            $usuario = $resultado[0];
            $data['prefil_usuario'] = $usuario->usuario;
            $data['prefil_correo'] = $usuario->correo;
            $data['prefil_nombre'] = $usuario->nombre;
            $data['prefil_apellido'] = $usuario->apellido;
        }
        
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $this->verificaAcceso);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/page/perfil_usuario', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_footer', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/footer', $data);
    }

    public function observar($id = ''){
        $data['tituloEncabezado'] = $this->items['sisInfoTituloEmpresa'] .' - Observar Usuario';

        $condiciones = array(
            'usuario.id' => $id
        );
        $resultado = $this->m_usuario->mostrarDatos($condiciones);
        if(!empty($resultado)){
            $usuario = $resultado[0];
            $image = ($usuario->imagen != '') ? $usuario->imagen : 'empty.png';
            $data['observar_id'] = $usuario->id;
            $data['observar_usuario'] = $usuario->usuario;
            $data['observar_correo'] = $usuario->correo;
            $data['observar_nombre'] = $usuario->nombre;
            $data['observar_apellido'] = $usuario->apellido;
            $data['observar_nivel'] = $usuario->rolTitulo;
            $data['observar_imagen'] = base_url().'crop/150/150/usuario-'.$image;
            $data['fechaRegistro'] = ($usuario->fechaRegistro >= 1104537600) ? $this->complementos->obtenerFecha($usuario->fechaRegistro,7) : '---';
            $data['fechaModificacion'] = ($usuario->fechaModificacion >= 1104537600) ? $this->complementos->obtenerFecha($usuario->fechaModificacion,7) : '---';
        }
        
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $this->verificaAcceso);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/page/observar_usuario', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/inter_footer', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/structure/footer', $data);
    }

    public function proceso($accion, $id = ''){
        $this->datos_privados->verificaAcceso();
        switch($accion){
            case 'agregar':
                    $msjError = TRUE;
                    $usuario = $this->complementos->xxsclean($this->input->post('usuario',TRUE));
                    $nombre = $this->complementos->xxsclean($this->input->post('nombre',TRUE));
                    $apellido = $this->complementos->xxsclean($this->input->post('apellido',TRUE));
                    $correo = $this->complementos->xxsclean($this->input->post('correo',TRUE));
                    $clave = $this->complementos->xxsclean($this->input->post('clave',TRUE));
                    $reclave = $this->complementos->xxsclean($this->input->post('reclave',TRUE));
                    $rolId = $this->complementos->xxsclean($this->input->post('rolId',TRUE));
                    $imagenPrincipal = $this->complementos->obtenerArchivo('imagenPrincipal', 'unico');

                    $error = '';
                    $error .= valida_campo($usuario, 'not_empty|alnum|minlength:5|maxlength:20', 'Usuario');
                    $error .= valida_campo($nombre, 'not_empty|minlength:2|maxlength:50', 'Nombre');
                    $error .= valida_campo($apellido, 'not_empty|minlength:2|maxlength:50', 'Apellido');
                    $error .= valida_campo($correo, 'not_empty|email|minlength:10|maxlength:50', 'Correo');
                    $error .= valida_campo($rolId, 'not_empty', 'Roles');
                    $error .= valida_campo($clave, 'not_empty|minlength:5|maxlength:30', 'Contraseña');    
                    if(!empty($clave)){
                        $error .= valida_campo($reclave, 'not_empty|minlength:5|maxlength:30', 'Verificar contraseña');
                        $error .= valida_campo($clave, 'password:'.$reclave, 'Contraseña');
                    } 
                    if(!empty($imagenPrincipal)){
                        $error .= valida_imagen($imagenPrincipal, 'maxwidth:500|maxheight:500:|maxsize:1', 'Imagen');
                    }

                    if($error != ''){ 
                        $message = sprintf(error_helper::msg()->msg201,$error);
                        echo alerta_error($message);EXIT; 
                    }

                    if($this->m_usuario->existeInfo('usuario', $usuario)){
                        $message = sprintf(error_helper::msg()->msg7, 'usuario '.$usuario);
                        echo alerta_error($message);EXIT; 
                    }

                    if(!empty($imagenPrincipal)){
                        $opciones = array(
                            'marcaTipo' => FALSE,
                            'marcaInfo' => FALSE,
                            'ajuste' => 'w',
                            'ajusteImagen' => 500,
                            'desenfocado' => FALSE,
                            'cantidadCopia' => array()
                        );
                        $obtieneImagen = $this->complementos->almacenarImagen($imagenPrincipal, 'public/imagen/usuario', $opciones, TRUE);
                    } else {
                        $obtieneImagen = '';
                    }

                    $claveFinal = password_hash($reclave, PASSWORD_DEFAULT);
                    $columnaDatos = array(
                        'usuario' => $usuario,
                        'correo' => $correo,
                        'clave' => $claveFinal,
                        'nombre' => $nombre,
                        'apellido' => $apellido,
                        'imagen' => $obtieneImagen,
                        'fecha_registro' => time(),
                        'rol_id' => $rolId,
                        'usuario_id' => $this->accesoSession->accesoTmpId,
                        'eliminacion_logica' => 1
                    );
                    $resultado = $this->m_usuario->insertar($columnaDatos);
                    if(!empty($resultado)){
                        $message = sprintf(error_helper::msg()->msg502,$usuario);
                        $redUrl = $this->items['getUrl'].'usuario/listar';
                        echo alerta_exito($message,3,$redUrl);
                        EXIT();
                    }
                    if($msjError){
                        $message = sprintf(error_helper::msg()->msg6);
                        echo alerta_error($message);EXIT; 
                    }
                break;
            case 'editar':
                    $msjError = TRUE;
                    $usuarioId = sessiones_helper::obtieneSesion('editarUsuario');
                    $usuario = $this->complementos->xxsclean($this->input->post('usuario',TRUE));
                    $nombre = $this->complementos->xxsclean($this->input->post('nombre',TRUE));
                    $apellido = $this->complementos->xxsclean($this->input->post('apellido',TRUE));
                    $correo = $this->complementos->xxsclean($this->input->post('correo',TRUE));
                    $clave = $this->complementos->xxsclean($this->input->post('clave',TRUE));
                    $reclave = $this->complementos->xxsclean($this->input->post('reclave',TRUE));
                    $rolId = $this->complementos->xxsclean($this->input->post('rolId',TRUE));
                    $imagenPrincipal = $this->complementos->obtenerArchivo('imagenPrincipal', 'unico');

                    $error = '';
                    $error .= valida_campo($usuario, 'not_empty|alnum|minlength:5|maxlength:20', 'Usuario');
                    $error .= valida_campo($nombre, 'not_empty|minlength:2|maxlength:50', 'Nombre');
                    $error .= valida_campo($apellido, 'not_empty|minlength:2|maxlength:50', 'Apellido');
                    $error .= valida_campo($correo, 'not_empty|email|minlength:10|maxlength:50', 'Correo');
                    $error .= valida_campo($rolId, 'not_empty', 'Roles');
                    if(!empty($clave)){
                        $error .= valida_campo($clave, 'minlength:5|maxlength:30', 'Nueva contraseña');
                        $error .= valida_campo($reclave, 'not_empty|minlength:5|maxlength:30', 'Verificar contraseña');
                        $error .= valida_campo($clave, 'password:'.$reclave, 'Contraseña');
                    } 
                    if(!empty($imagenPrincipal)){
                        $error .= valida_imagen($imagenPrincipal, 'maxwidth:500|maxheight:500:|maxsize:1', 'Imagen');
                    }

                    if($error != ''){ 
                        $message = sprintf(error_helper::msg()->msg201,$error);
                        echo alerta_error($message);EXIT; 
                    }

                    if($this->m_usuario->existeInfo('usuario', $usuario,$usuarioId)){
                        $message = sprintf(error_helper::msg()->msg7, 'usuario '.$usuario);
                        echo alerta_error($message);EXIT; 
                    }

                    $condiciones = array( 'usuario.id' => $usuarioId );
                    $resultadoUsuario = $this->m_usuario->mostrarDatos($condiciones);

                    if(!empty($imagenPrincipal)){
                        $opciones = array(
                            'marcaTipo' => FALSE,
                            'marcaInfo' => FALSE,
                            'ajuste' => 'w',
                            'ajusteImagen' => 500,
                            'desenfocado' => FALSE,
                            'cantidadCopia' => array()
                        );
                        $obtieneImagen = $this->complementos->almacenarImagen($imagenPrincipal, 'public/imagen/usuario', $opciones, TRUE);
                    } else {
                        $obtieneImagen = $resultadoUsuario[0]->imagen;
                    }

                    $claveEncryptada = password_hash($reclave, PASSWORD_DEFAULT);
                    $claveFinal = (!empty($reclave)) ? $claveEncryptada : $resultadoUsuario[0]->clave ;

                    $columnaDatos = array(
                        'usuario' => $usuario,
                        'correo' => $correo,
                        'clave' => $claveFinal,
                        'nombre' => $nombre,
                        'apellido' => $apellido,
                        'imagen' => $obtieneImagen,
                         'rol_id' => $rolId,
                        'fecha_modificacion' => time(),
                    );
                    $resultado = $this->m_usuario->actualizar($columnaDatos, array( 'usuario.id' => $usuarioId ));
                    if(!empty($resultado)){
                        sessiones_helper::eliminaSesion('editarUsuario');
                        $message = sprintf(error_helper::msg()->msg503,$usuario);
                        echo alerta_exito($message,3);
                        EXIT();
                    }
                    if($msjError){
                        $message = sprintf(error_helper::msg()->msg6);
                        echo alerta_error($message);EXIT; 
                    }
                break;
            case 'perfil':
                    $msjError = TRUE;
                    $usuarioId = $this->accesoSession->accesoTmpId;
                    $usuario = $this->complementos->xxsclean($this->input->post('usuario',TRUE));
                    $nombre = $this->complementos->xxsclean($this->input->post('nombre',TRUE));
                    $apellido = $this->complementos->xxsclean($this->input->post('apellido',TRUE));
                    $correo = $this->complementos->xxsclean($this->input->post('correo',TRUE));
                    $clave = $this->complementos->xxsclean($this->input->post('clave',TRUE));
                    $reclave = $this->complementos->xxsclean($this->input->post('reclave',TRUE));
                    $imagenPrincipal = $this->complementos->obtenerArchivo('imagenPrincipal', 'unico');

                    $error = '';
                    $error .= valida_campo($usuario, 'not_empty|alnum|minlength:5|maxlength:20', 'Usuario');
                    $error .= valida_campo($nombre, 'not_empty|minlength:2|maxlength:50', 'Nombre');
                    $error .= valida_campo($apellido, 'not_empty|minlength:2|maxlength:50', 'Apellido');
                    $error .= valida_campo($correo, 'not_empty|email|minlength:10|maxlength:50', 'Correo');
                    if(!empty($clave)){
                        $error .= valida_campo($clave, 'minlength:5|maxlength:30', 'Nueva contraseña');
                        $error .= valida_campo($reclave, 'not_empty|minlength:5|maxlength:30', 'Verificar contraseña');
                        $error .= valida_campo($clave, 'password:'.$reclave, 'Contraseña');
                    } 
                    if(!empty($imagenPrincipal)){
                        $error .= valida_imagen($imagenPrincipal, 'maxwidth:500|maxheight:500:|maxsize:1', 'Imagen');
                    }

                    if($error != ''){ 
                        $message = sprintf(error_helper::msg()->msg201,$error);
                        echo alerta_error($message);EXIT; 
                    }

                    $condiciones = array(
                        'usuario.id' => $usuarioId
                    );
                    $resultadoUsuario = $this->m_usuario->mostrarDatos($condiciones);

                    if(!empty($imagenPrincipal)){
                        $opciones = array(
                            'marcaTipo' => FALSE,
                            'marcaInfo' => FALSE,
                            'ajuste' => 'w',
                            'ajusteImagen' => 500,
                            'desenfocado' => FALSE,
                            'cantidadCopia' => array()
                        );
                        $obtieneImagen = $this->complementos->almacenarImagen($imagenPrincipal, 'public/imagen/usuario', $opciones, TRUE);
                    } else {
                        $obtieneImagen = $resultadoUsuario[0]->imagen;
                    }

                    $claveEncryptada = password_hash($reclave, PASSWORD_DEFAULT);
                    $claveFinal = (!empty($reclave)) ? $claveEncryptada : $resultadoUsuario[0]->clave ;

                    $columnaDatos = array(
                        'usuario' => $usuario,
                        'correo' => $correo,
                        'clave' => $claveFinal,
                        'nombre' => $nombre,
                        'apellido' => $apellido,
                        'imagen' => $obtieneImagen,
                        'fecha_modificacion' => time(),
                    );
                    $resultado = $this->m_usuario->actualizar($columnaDatos, array( 'usuario.id' => $usuarioId ));
                    if(!empty($resultado)){
                        $message = sprintf(error_helper::msg()->msg503,$usuario);
                        echo alerta_exito($message,3);
                        EXIT();
                    }
                    if($msjError){
                        $message = sprintf(error_helper::msg()->msg6);
                        echo alerta_error($message);EXIT; 
                    }
                break;
            case 'permitir':
                $msjError = TRUE;

                if($this->m_usuario->existe($id)){
                    $condiciones = array(
                        'usuario.eliminacion_logica' => 0,
                        'usuario.id' => $id
                    );
                    $usuario = $this->m_usuario->mostrarDatos($condiciones);
                    if(!empty($usuario)){
                        $this->m_usuario->permitirInfo($usuario[0]->id);
                        $message = sprintf(error_helper::msg()->msg201, 'Se activó el item exitosamente.');
                        echo alerta_exito($message,2);EXIT;
                    }
                }
                if($msjError){
                    $message = sprintf(error_helper::msg()->msg6);
                    echo alerta_error($message);EXIT; 
                }
                break;
            case 'denegar':
                $msjError = TRUE;
                if($this->m_usuario->existe($id)){
                    $condiciones = array(
                        'usuario.eliminacion_logica' => 1,
                        'usuario.id' => $id
                    );
                    $usuario = $this->m_usuario->mostrarDatos($condiciones);
                    if(!empty($usuario)){
                        $this->m_usuario->denegarInfo($usuario[0]->id);
                        $message = sprintf(error_helper::msg()->msg201, 'Se desactivó el item exitosamente.');
                        echo alerta_exito($message,2);EXIT;
                    }
                }
                if($msjError){
                    $message = sprintf(error_helper::msg()->msg6);
                    echo alerta_error($message);EXIT; 
                }
                break;
            case 'remover':
                $msjError = TRUE;
                if($this->m_usuario->existe($id)){
                    $condiciones = array(
                        'usuario.eliminacion_logica' => 0,
                        'usuario.id' => $id
                    );
                    $usuario = $this->m_usuario->mostrarDatos($condiciones);
                    if(!empty($usuario)){
                        if($this->m_logs->existeInfo('usuario_id', $usuario[0]->id)){
                            $message = sprintf(error_helper::msg()->msg201, 'Es imposible eliminar al usuario.');
                            echo alerta_error($message);EXIT; 
                        } else{
                            $resultado = $this->m_usuario->eliminar( array( 'usuario.id' => $usuario[0]->id ) );
                            if($resultado){
                                $this->complementos->eliminarArchivo($usuario[0]->imagen, 'public/imagen/usuario');
                                $message = sprintf(error_helper::msg()->msg201, 'La eliminación se completo exitosamente.');
                                echo alerta_exito($message,2);EXIT; 
                            }
                        }
                    }
                }
                if($msjError){
                    $message = sprintf(error_helper::msg()->msg6);
                    echo alerta_error($message);EXIT; 
                }
                break;
            case 'removerTodo':
                $msjError = TRUE;
                $checkRemover = $this->input->post('checkRemover');
                if(!empty($checkRemover)){
                    foreach($checkRemover as $items){
                        if($this->m_usuario->existe($items['value'])){
                            $condiciones = array(
                                'usuario.eliminacion_logica' => 0,
                                'usuario.id' => $items['value']
                            );
                            $usuario = $this->m_usuario->mostrarDatos($condiciones);
                            if(!empty($usuario)){
                                $resultado = $this->m_usuario->eliminar( array( 'usuario.id' => $usuario[0]->id ) );
                                if($resultado){
                                    $this->complementos->eliminarArchivo($usuario[0]->imagen, 'public/imagen/usuario');
                                } else{
                                    continue;
                                }  
                            } else{
                                continue;
                            }
                        } else{
                            continue;
                        }
                    }
                    $message = sprintf(error_helper::msg()->msg201, 'Se eliminaron correctamente los elementos seleccionados.');
                    echo alerta_exito($message);EXIT; 
                }
                if($msjError){
                    $message = sprintf(error_helper::msg()->msg6);
                    echo alerta_error($message);EXIT; 
                }
                break;
            default:
                return FALSE;
        }
    }
    

}