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

        public function getSelectModulos()
        {   
            if (empty($_SESSION['permisos_modulo']['r']) ) {
                header('location:'.server_url.'Errors');
                $data = array("status" => false, "msg" => "Error no tiene permisos");
            }else{
                if(empty($_POST)){
                    $request_data = $this->model->selectModulos('');
                    foreach ($request_data as $row) {    
                        $data[] = array("id"=>$row['id_modulo'], "text"=>$row['nombre'],
                        "descripcion" => $row['descripcion']);
                    }
                }else{
                    $search_modulo = strclean($_POST['search']);
                    $request_data = $this->model->selectModulos($search_modulo);
                    foreach ($request_data as $row) {    
                        $data[] = array("id"=>$row['id_modulo'], "text"=>$row['nombre'],
                        "descripcion" => $row['descripcion']);
                    }
                }            
            }
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
            die();
        }


        public function getSelectSearchModulos(int $int_id_modulo){
            if (empty($_SESSION['permisos_modulo']['r']) ) {
                header('location:'.server_url.'Errors');
                $data_response = array("status" => false, "msg" => "Error no tiene permisos");
            }else{
                $intEmpleado  = Intval(strclean($int_id_modulo));
                if ($intEmpleado > 0){
                    $data = $this->model->selectSearchModulo($int_id_modulo);
                    if (empty($data)){
                        $data_response = array('status' => false,'msg'=> 'Datos no encontrados');
                    }else{
                        $data_response = array('status' => true,'msg'=> $data);
                    }
                }
            }
            echo json_encode($data_response,JSON_UNESCAPED_UNICODE);
            die();
        }
    
}