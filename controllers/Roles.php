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
                        $btnEditarRol = '<button  class="btn btn-primary btn-circle btnEditarRol" title="editar" rl="'.$data[$i]['id_rol'].'"><i class="fa fa-edit"></i></button>';
                    }
    
                    if ($_SESSION['permisos_modulo']['d']) {
                        $btnEliminarRol = '<button  class="btn btn-danger btn-circle btnEliminarRol" title="eliminar" rl="'.$data[$i]['id_rol'].'"><i class="far fa-thumbs-down"></i></button>';
                    }
    
                    $data[$i]['opciones'] = '<div class="text-center">'.$btnEditarRol.' '.$btnEliminarRol.'</div>';
                }
            }
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
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
                        $data = array('status' => true,'msg' => 'a');
                    }else{
                        $data = array('status' => false,'msg' => 'Los campos estan mal escrito , verifique y vuelva a ingresarlos');
                    }
                }else{
                    $data = array('status' => false,'msg' => 'Los campos se encuentra vacios, verifique y vuelva a ingresarlos');
                }
            }else{
                header('location:'.server_url.'Errors');
            }
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
            die();
        }

        
    }
?>