<?php
    require_once ("./libraries/core/controllers.php");

    class Eventos extends Controllers{
        public function __construct(){
            parent::__construct();
            session_start();
            if (empty($_SESSION['login'])) {
                header('location:'.server_url.'login');
            }
            getPermisos(8);
        }

        public function eventos(){
            if (empty($_SESSION['permisos_modulo']['r']) ) {
                header('location:'.server_url.'Errors');
            }
            $data["page_id"] = 8;
            $data["tag_pag"] = "Eventos";
            $data["page_title"] = "Eventos | Inicio";
            $data["page_name"] = "Listado de Eventos";
            $data['page'] = "eventos";
            $this->views->getView($this,"eventos",$data);

        }

    }
