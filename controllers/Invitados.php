<?php
    require_once ("./libraries/core/controllers.php");

    class Invitados extends Controllers{
        public function __construct(){
            parent::__construct();
            session_start();
            if (empty($_SESSION['login'])) {
                header('location:'.server_url.'login');
            }
            getPermisos(7);
        }

        public function invitados(){
            if (empty($_SESSION['permisos_modulo']['r']) ) {
                header('location:'.server_url.'Errors');
            }
            $data["page_id"] = 7;
            $data["tag_pag"] = "Invitados";
            $data["page_title"] = "Invitados | Inicio";
            $data["page_name"] = "Listado de Invitados";
            $data['page'] = "invitados";
            $this->views->getView($this,"invitados",$data);

        }

        public function getInvitados(){
            if (empty($_SESSION['permisos_modulo']['r']) ) {
                header('location:'.server_url.'Errors');
                $data = array("status" => false, "msg" => "Error no tiene permisos");
            }else{
                $data = $this->model->selectInvitados();
                for ($i=0; $i < count($data); $i++) {
                    $btnEditarInvitados = '';
                    $btnEliminarInvitados='';

                   if ($data[$i]['estado'] == 1){
                       $data[$i]['estado']= '<span  class="btn btn-success btn-icon-split btn-custom-sm"><i class="icon fas fa-check-circle "></i><span class="label text-padding text-white-50">&nbsp;&nbsp;Activo</span></span>';
                   }else{
                        $data[$i]['estado']='<span  class="btn btn-danger btn-icon-split btn-custom-sm"><i class="icon fas fa-ban "></i><span class="label text-padding text-white-50">Inactivo</span></span>';
                   }

                    if ($_SESSION['permisos_modulo']['u']) {
                        $btnEditarInvitados = '<button class="btn btn-primary btnEditarInvitado btn-circle " title="editar" 
                        onClick="return clickModalEditing('."'getInvitado/".$data[$i]['id_invitado']."'".','."'Actualizacion | Invitado'".','."'id_invitado'".','."['nombre_invitado','apellido_invitado','descripcion', 'url_imagen']".','."'#modalInvitado'".');">
                        <i class="fa fa-edit"></i></button>';
                    }


                    if ($_SESSION['permisos_modulo']['d']) {
                        $btnEliminarInvitados = '<button  class="btn btn-danger btn-circle btnEliminarInvitado" 
                        title="eliminar" onClick="return deleteServerSide('."'delInvitado/'".','.$data[$i]['id_invitado'].','."'¿Desea eliminar este invitado ".$data[$i]['nombre_invitado']."?'".','."'.tableInvitado'".');"><i class="far fa-thumbs-down"></i></button>';
                    }

                    $data[$i]['opciones'] = $btnEditarInvitados.' '.$btnEliminarInvitados;
                }
            }
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
            die();
        }


        public function getInvitado(int $id_invitado){
            if (empty($_SESSION['permisos_modulo']['r']) ) {
                header('location:'.server_url.'Errors');
                $data_response = array("status" => false, "msg" => "Error no tiene permisos");
            }else{
                $id_invitado  = Intval(strclean($id_invitado));
                if(validateEmptyFields([$id_invitado])){
                    if(empty(preg_matchall([$id_invitado],regex_numbers))){
                        if ($id_invitado > 0){
                            $data = $this->model->selectInvitado($id_invitado);
                            if (empty($data)){
                                $data_response = array('status' => false,'msg'=> 'Datos no encontrados');
                            }else{
                                $data_response = array('status' => true,'msg'=> $data);
                            }
                        }
                    }else{
                        $data = array('status' => false,'msg' => 'El campo estan mal escrito , verifique y vuelva a ingresarlo');
                    }
                }else {
                    $data = array('status' => false,'msg' => 'El campo se encuentra vacio , verifique y vuelva a ingresarlo');
                }
            }
            echo json_encode($data_response,JSON_UNESCAPED_UNICODE);
            die();
        }
        
        public function setInvitado(){
            if ($_POST) {
                $id_invitado = Intval(strclean($_POST['id_invitado']));
                $nombre_invitado = ucwords(strtolower(strclean($_POST["nombre_invitado"])));
                $apellido_invitado = ucwords(strtolower(strclean($_POST["apellido_invitado"])));
                $descripcion_invitado = ucwords(strtolower(strclean($_POST["descripcion"])));
                $url_imagen = strtolower(strclean($_POST["url_imagen"]));
                $validate_data = [$nombre_invitado,$apellido_invitado,$descripcion_invitado,$url_imagen];
                $validate_data_string = [$nombre_invitado,$apellido_invitado,$descripcion_invitado];
                if(validateEmptyFields($validate_data)){
                    if(!empty(preg_matchall($validate_data_string,regex_string))){
                        $data = array('status' => false,'formErrors' => array(
                            'nombre_invitado' => "El campo contiene numero o caracteres especiales",
                            'descripcion_invitado' =>  "El campo contiene numero o caracteres especiales",
                        ));
                    }

                    if(!empty(preg_matchall(array($url_imagen),regex_imagen))){
                        $data = array('status' => false,'formErrors' => array(
                            'url_imagen' => 'La url '.$url_imagen.' ingresada no es una imagen',
                        ));
                    }

                    if ($id_invitado == 0){
                        $response_invitado = $this->model->insertInvitado($nombre_invitado,$apellido_invitado,$descripcion_invitado,$url_imagen);
                        $option = 1;
                    }else{
                        $response_invitado = $this->model->updateInvitado($id_invitado,$nombre_invitado,$apellido_invitado,$descripcion_invitado,$url_imagen);
                        $option = 2;
                    }

                    if ($response_invitado > 0){ 
                        if (empty($_SESSION['permisos_modulo']['w'])){
                            header('location:'.server_url.'Errors');
                            $data= array("status" => false, "msg" => "Error no tiene permisos");
                        }else{
                            if ($option == 1){
                                $data = array('status' => true, 'msg' => 'Datos guardados correctamente');
                            }
                        }

                        if (empty($_SESSION['permisos_modulo']['u'])) {
                            header('location:'.server_url.'Errors');
                            $data= array("status" => false, "msg" => "Error no tiene permisos");
                        }else{
                            if ($option == 2){
                                $data = array('status' => true, 'msg' => 'Datos actualizados correctamente');
                            }
                        }
                    
                    }else if ($response_invitado == 'exist'){
                        $data = array('status' => false,'formErrors'=> array(
                            'nombre_invitado' => "El invitado ".$nombre_invitado." ya existe, ingrese uno nuevo",
                        ));
                    
                    }else{
                        $data = array('status' => false,'msg' => 'Hubo un error no se pudieron guardar los datos');
                    }
                }else{
                    $data = array('status' => false,'formErrors' => array(
                        'nombre_invitado' => "El campo es obligatorio",
                        'descripcion_invitado' => "El campo es obligatorio",
                        'url_imagen' => "El campo es obligatorio",
                    ));
                }
                
            }else{
                header('location:'.server_url.'Errors');
            }
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
            die();
        }

        public function getSelectInvitados()
        {   
            if (empty($_SESSION['permisos_modulo']['r']) ) {
                header('location:'.server_url.'Errors');
                $data = array("status" => false, "msg" => "Error no tiene permisos");
            }else{
                $html_options = "";
                $data = $this->model->selectInvitadosNoInactivos();
                if (count($data) > 0) {
                    for ($i=0; $i < count($data) ; $i++) { 
                        $html_options .='<option value="'.$data[$i]['id_invitado'].'">'.$data[$i]['nombre_invitado'].' '.$data[$i]['apellido_invitado'].'</option>';
                    }
                }
                echo $html_options;                
                die();
            }
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
        }


        public function delInvitado(){
            if (empty($_SESSION['permisos_modulo']['d']) ) {
                header('location:'.server_url.'Errors');
                $data = array("status" => false, "msg" => "Error no tiene permisos");
            }else{
                if ($_POST){
                    $id_invitado = intval(strclean($_POST["id"]));
                    if(validateEmptyFields([$id_invitado])){
                        if(empty(preg_matchall([$id_invitado],regex_numbers))){
                            $response_del = $this->model->deleteInvitado($id_invitado);
                            if($response_del == "ok"){
                                $data = array("status" => true, "msg" => "Se ha eliminado el invitado");
                            }else if ($response_del == "exist"){
                                $data = array("status" => false, "msg" => "No es posisible eliminar un invitado ya asociado");
                            }else{
                                $data = array("status" => false, "msg" => "Error al eliminar el invitado");
                            }
                        }
                    }
                }else{
                    $data = array("status" => false, "msg" => "Error Hubo problemas");
                }
            }
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
            die();
        }
    }
