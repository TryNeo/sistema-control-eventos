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
                        onClick="return clickModalEditing('."'getInvitado/".$data[$i]['id_invitado']."'".','."'Actualizacion | Invitado'".','."'getInvitado'".','."['nombre_invitado','apellido_invitado','descripcion', 'url_imagen']".','."'#modalInvitado'".');">
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

        public function setInvitado(){
            if ($_POST) {
                $id_invitado = Intval(strclean($_POST['id_invitado']));
                $nombre_invitado = ucwords(strtolower(strclean($_POST["nombre_invitado"])));
                $apellido_invitado = ucwords(strtolower(strclean($_POST["apellido_invitado"])));
                $descripcion_invitado = ucwords(strtolower(strclean($_POST["descripcion_invitado"])));
                $validate_data = [$nombre_invitado,$apellido_invitado,$descripcion_invitado];
                $data = "";
            }else{
                header('location:'.server_url.'Errors');
            }
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
            die();
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
