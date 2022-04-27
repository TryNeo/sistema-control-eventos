<?php
    require_once ("./libraries/core/controllers.php");

    class Usuarios extends Controllers{
        public function __construct(){
            parent::__construct();
            session_start();
            if (empty($_SESSION['login'])) {
                header('location:'.server_url.'login');
            }
            getPermisos(2);

        }

        public function usuarios(){
            if (empty($_SESSION['permisos_modulo']['r']) ) {
                header('location:'.server_url.'Errors');
            }

            $data['page_id'] = 2;
            $data["tag_pag"] = "Usuarios";
            $data["page_title"] = "Usuarios| Inicio";
            $data["page_name"] = "Listado de usuarios";
            $data['page'] = "usuario";
            $this->views->getView($this,"usuarios",$data);

        }

        public function getUsuarios(){
            if (empty($_SESSION['permisos_modulo']['r'])) {
                header('location:'.server_url.'Errors');
                $data = array("status" => false, "msg" => "Error no tiene permisos");
            }else{
                $data = $this->model->selectUsuarios();
                for ($i=0; $i < count($data); $i++) { 
                    
                    if ($data[$i]['foto'] == ''){
                        $data[$i]['foto'] = '<div class="m-r-10"><img src="https://demo.getstisla.com/assets/img/avatar/avatar-1.png"  class="rounded" width="45"></div>';
                    }else{
                        $data[$i]['foto'] = '<div class="m-r-10"><img src="'.$data[$i]['foto'].'"  class="rounded" width="45"></div>';
                    }

                    if ($data[$i]['estado'] == 1){
                        $data[$i]['estado']= '<span  class="btn btn-success btn-icon-split btn-custom-sm"><i class="icon fas fa-check-circle "></i><span class="label text-padding text-white-1">&nbsp;&nbsp;Activo</span></span>';
                    }else{
                        $data[$i]['estado']='<span  class="btn btn-danger btn-icon-split btn-custom-sm"><i class="icon fas fa-ban "></i><span class="label text-padding text-white-1">Inactivo</span></span>';
                    }

                    if ($data[$i]['ultimo_online'] == 1){
                        $data[$i]['ultimo_online']= '<span  class="btn btn-success btn-icon-split btn-custom-sm"><i class="icon fas fa-signal"></i><span class="label text-padding text-white-1">&nbsp;&nbsp;Online</span></span>';
                    }else{
                        $data[$i]['ultimo_online']='<span  class="btn btn-danger btn-icon-split btn-custom-sm"><i class="icon fas fa-ban"></i><span class="label text-padding text-white-1">0ffline</span></span>';
                    }

                    $data[$i]['nombre_apellido'] = $data[$i]['nombre'].' '.$data[$i]['apellido'];


                }
            }
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
            die();
        }


    }

