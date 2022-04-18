<?php
    require_once ("./libraries/core/controllers.php");

    class Permisos extends Controllers{
        public function __construct(){
            parent::__construct();
            session_start();
            if (empty($_SESSION['login'])) {
                header('location:'.server_url.'login');
            }
            getPermisos(5);
        }

        public function permisos(){
            $data["page_id"] = 5;
            $data["tag_pag"] = "Permisos";
            $data["page_title"] = "Permisos | Inicio";
            $data["page_name"] = "Listado de Permisos";
            $data['page'] = "permisos";
            $this->views->getView($this,"permisos",$data);

        }
    
}