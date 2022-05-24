<?php
    require_once ("./libraries/core/controllers.php");

    class Websitesetting extends Controllers{
        public function __construct(){
            parent::__construct();
            session_start();
            if (empty($_SESSION['login'])) {
                header('location:'.server_url.'login');
            }
            getPermisos(11);
        }

        public function websitesetting(){
            if (empty($_SESSION['permisos_modulo']['r']) ) {
                header('location:'.server_url.'Errors');
            }
            $data["page_id"] = 11;
            $data["tag_pag"] = "Websitesetting";
            $data["page_title"] = "Sitio web | Configuracion";
            $data["page_name"] = "Listado de Categorias";
            $data['page'] = "websitesetting";
            $this->views->getView($this,"websitesetting",$data);
        }
        

        
        public function getWebsite(){
            if (empty($_SESSION['permisos_modulo']['r']) ) {
                header('location:'.server_url.'Errors');
                $data = array("status" => false, "msg" => "Error no tiene permisos");
            }else{
                $data = $this->model->selectWebsite();
            }
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
            die();
        }


        
        public function setWebsite(){
        }



    }