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
            $data["data_website"] = $this->model->selectWebsite();
            $this->views->getView($this,"websitesetting",$data);
        }
        

        public function setWebsite(){
        }

    }