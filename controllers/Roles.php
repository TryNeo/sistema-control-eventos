<?php
    require_once ("./libraries/core/controllers.php");

    class Roles extends Controllers{
        public function __construct(){
            parent::__construct();
            session_start();
            if (empty($_SESSION['login'])) {
                header('location:'.server_url.'login');
            }
            getPermisos(3);
        }

        public function roles(){
            $data["page_id"] = 3;
            $data["tag_pag"] = "Roles";
            $data["page_title"] = "Roles | Inicio";
            $data["page_name"] = "Listado de Roles";
            $data['page'] = "roles";
            $this->views->getView($this,"roles",$data);

        }

        public function getRoles(){
            if (empty($_SESSION['permisos_modulo']['r']) ) {
                header('location:'.server_url.'Errors');
                $data = array("status" => false, "msg" => "Error no tiene permisos");
            }else{
                $data = $this->model->selectRoles();
                $changeTextEdit = "Actualizacion | Rol";
                for ($i=0; $i < count($data); $i++) { 
                    $btnPermisoRol = '';
                    $btnEditarRol = '';
                    $btnEliminarRol='';
    
                   if ($data[$i]['estado'] == 1){
                       $data[$i]['estado']= '<span  class="btn btn-success btn-icon-split btn-custom-sm"><i class="icon fas fa-check-circle "></i><span class="label text-padding text-white-50">&nbsp;&nbsp;Activo</span></span>';
                   }else{
                        $data[$i]['estado']='<span  class="btn btn-danger btn-icon-split btn-custom-sm"><i class="icon fas fa-ban "></i><span class="label text-padding text-white-50">Inactivo</span></span>';
                   }
                   
          
    
                    if ($_SESSION['permisos_modulo']['u']) {
                        $btnEditarRol = '<button class="btn btn-primary btnEditarRol btn-circle " title="editar" 
                        onClick="return clickModalEditing('."'getRol/".$data[$i]['id_rol']."'".','."'Actualizacion | Rol'".','."'id_rol'".','."['nombre_rol','descripcion']".');">
                        <i class="fa fa-edit"></i></button>';
                    }
    
                    if ($_SESSION['permisos_modulo']['d']) {
                        $btnEliminarRol = '<button  class="btn btn-danger btn-circle btnEliminarRol" title="eliminar" rl="'.$data[$i]['id_rol'].'"><i class="far fa-thumbs-down"></i></button>';
                    }
    
                    $data[$i]['opciones'] = $btnEditarRol.' '.$btnEliminarRol;
                }
            }
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
            die();
        }

        public function getRol(int $id_rol){
            if (empty($_SESSION['permisos_modulo']['r']) ) {
                header('location:'.server_url.'Errors');
                $data_response = array("status" => false, "msg" => "Error no tiene permisos");
            }else{
                $id_rol  = Intval(strclean($id_rol));
                if(validateEmptyFields([$id_rol])){
                    if(empty(preg_matchall([$id_rol],regex_numbers))){
                        if ($id_rol > 0){
                            $data = $this->model->selectRol($id_rol);
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

        
        public function setRol(){
            if ($_POST) {
                $id_rol = Intval(strclean($_POST['id_rol']));
                $nombre_rol = ucwords(strtolower(strclean($_POST["nombre_rol"])));
                $descripcion_rol = ucwords(strtolower(strclean($_POST["descripcion"])));
                $validate_data = [$nombre_rol,$descripcion_rol];

                if(validateEmptyFields($validate_data)){
                    if(empty(preg_matchall($validate_data,regex_string))){
                        if ($id_rol == 0){
                            $response_rol = $this->model->insertRol($nombre_rol,$descripcion_rol);
                            $option = 1;
                        }else{
                            $response_rol = $this->model->updateRol($id_rol,$nombre_rol,$descripcion_rol);
                            $option = 2;
                        }

                        if ($response_rol > 0){ 
                            if (empty($_SESSION['permisos_modulo']['w'])){
                                header('location:'.server_url.'Errors');
                                $data= array("status" => false, "msg" => "Error no tiene permisos");
                            }else{
                                if ($option == 1){
                                    $data = array('status' => true, 'msg' => 'datos guardados correctamente');
                                }
                            }

                            if (empty($_SESSION['permisos_modulo']['u'])) {
                                header('location:'.server_url.'Errors');
                                $data= array("status" => false, "msg" => "Error no tiene permisos");
                            }else{
                                if ($option == 2){
                                    $data = array('status' => true, 'msg' => 'datos actualizados correctamente');
                                }
                            }
                        
                        }else if ($response_rol == 'exist'){
                            $data = array('status' => false,'msg' => 'Error el rol ya existe');
                        
                        }else{
                            $data = array('status' => false,'msg' => 'Hubo un error no se pudieron guardar los datos');
                        }


                    }else{
                        $data = array('status' => false,'formErrors'=> array(
                            'nombre_rol' => "El nombre contiene numero o caracteres especiales",
                            'descripcion' => "La descripcion contiene numero o caracteres especiales",
                        ));

                    }
                }else{
                    $data = array('status' => false,'formErrors' => array(
                        'nombre_rol' => "El campo usuario se encuentra vacio",
                        'descripcion' => "La descripcion se encuentra vacio",
                    ));
                }
            }else{
                header('location:'.server_url.'Errors');
            }
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
            die();
        }

        
    }
?>