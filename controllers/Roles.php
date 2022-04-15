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
                       $data[$i]['estado']= '<span  class="btn btn-success btn-icon-split btn-sm"><i class="icon fas fa-check-circle "></i><span class="label text-padding text-white-50">&nbsp;&nbsp;Activo</span></span>';
                   }else{
                        $data[$i]['estado']='<span  class="btn btn-danger btn-icon-split btn-sm"><i class="icon fas fa-ban "></i><span class="label text-padding text-white-50">Inactivo</span></span>';
                   }
                   
                    if ($_SESSION['permisos_modulo']['r']) {
                        $btnPermisoRol = '<button type="button" class="btn btn-secondary btn-circle btnPermiso" title="permiso" rl="'.$data[$i]['id_rol'].'"><i class="fa fa-key"></i></button>';
                    }
    
                    if ($_SESSION['permisos_modulo']['u']) {
                        $btnEditarRol = '<button  class="btn btn-primary btn-circle btnEditarRol" title="editar" rl="'.$data[$i]['id_rol'].'"><i class="fa fa-edit"></i></button>';
                    }
    
                    if ($_SESSION['permisos_modulo']['d']) {
                        $btnEliminarRol = '<button  class="btn btn-danger btn-circle btnEliminarRol" title="eliminar" rl="'.$data[$i]['id_rol'].'"><i class="far fa-thumbs-down"></i></button>';
                    }
    
                    $data[$i]['opciones'] = '<div class="text-center">'.$btnPermisoRol.' '.$btnEditarRol.' '.$btnEliminarRol.'</div>';
                }
            }
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
            die();
        }

    }
?>