<?php
    require_once ("./libraries/core/controllers.php");

    class Roles extends Controllers{
        public function __construct(){
            parent::__construct();
            session_start();
            if (empty($_SESSION['login'])) {
                header('location:'.server_url.'login');
            }
        }

        public function roles(){
            $data["page_id"] = 3;
            $data["tag_pag"] = "Roles";
            $data["page_title"] = "Roles | Inicio";
            $data["page_name"] = "Listado de Roles";
            $data['page'] = "roles";
            $this->views->getView($this,"roles",$data);

        }

    }
?>