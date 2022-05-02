<?php
    require_once ("./libraries/core/controllers.php");

    class Planes extends Controllers{
        public function __construct(){
            parent::__construct();
            session_start();
            if (empty($_SESSION['login'])) {
                header('location:'.server_url.'login');
            }
            getPermisos(6);
        }

        public function planes(){
            if (empty($_SESSION['permisos_modulo']['r']) ) {
                header('location:'.server_url.'Errors');
            }
            $data["page_id"] = 10;
            $data["tag_pag"] = "Planes";
            $data["page_title"] = "Planes | Inicio";
            $data["page_name"] = "Listado de Planes de Eventos";
            $data['page'] = "planes";
            $this->views->getView($this,"planes",$data);

        }

        public function getPlanes(){
            if (empty($_SESSION['permisos_modulo']['r']) ) {
                header('location:'.server_url.'Errors');
                $data = array("status" => false, "msg" => "Error no tiene permisos");
            }else{
                $data = $this->model->selectPlanes();
                for ($i=0; $i < count($data); $i++) {
                    $btnEditarPlan = '';
                    $btnEliminarPlan = '';

                   if ($data[$i]['estado'] == 1){
                       $data[$i]['estado']= '<span  class="btn btn-success btn-icon-split btn-custom-sm"><i class="icon fas fa-check-circle "></i><span class="label text-padding text-white-50">&nbsp;&nbsp;Activo</span></span>';
                   }else{
                        $data[$i]['estado']='<span  class="btn btn-danger btn-icon-split btn-custom-sm"><i class="icon fas fa-ban "></i><span class="label text-padding text-white-50">Inactivo</span></span>';
                   }

                    if ($_SESSION['permisos_modulo']['u']) {
                        $btnEditarPlan = '<button class="btn btn-primary btnEditarPlan btn-circle " title="editar" 
                        onClick="return clickModalEditing('."'getPlan/".$data[$i]['id_plan']."'".','."'Actualizacion | Planes'".','."'id_plan'".','."['nombre_plan','precio_plan','descripcion']".','."'#modalPlan'".');">
                        <i class="fa fa-edit"></i></button>';
                    }

                    if ($_SESSION['permisos_modulo']['d']) {
                        $btnEliminarPlan = '<button  class="btn btn-danger btn-circle btnEliminarPlan" 
                        title="eliminar" onClick="return deleteServerSide('."'delPlan/'".','.$data[$i]['id_plan'].','."'¿Desea eliminar el plan ".$data[$i]['nombre_plan']."?'".','."'.tablePlan'".');"><i class="far fa-thumbs-down"></i></button>';
                    }

                    $data[$i]['opciones'] = $btnEditarPlan.' '.$btnEliminarPlan;
                }
            }
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
            die();
        }

        public function getPlan(int $id_plan){
            if (empty($_SESSION['permisos_modulo']['r']) ) {
                header('location:'.server_url.'Errors');
                $data_response = array("status" => false, "msg" => "Error no tiene permisos");
            }else{
                $id_plan  = Intval(strclean($id_plan));
                if(validateEmptyFields([$id_plan])){
                    if(empty(preg_matchall([$id_plan],regex_numbers))){
                        if ($id_plan > 0){
                            $data = $this->model->selectPlan($id_plan);
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

        public function setPlan(){
            if ($_POST) {
                $id_plan= Intval(strclean($_POST['id_plan']));
                $nombre_plan = ucwords(strtolower(strclean($_POST["nombre_plan"])));
                $precio_plan = strclean($_POST["precio_plan"]);
                $descripcion = ucwords(strtolower(strclean($_POST["descripcion"])));
                $validate_data = [$nombre_plan,$precio_plan,$descripcion];
                if(validateEmptyFields($validate_data)){
                    if(!empty(preg_matchall(array($nombre_plan,$descripcion),regex_string))){
                        $data = array('status' => false,'formErrors' => array(
                            'nombre_plan' => "El campo contiene numero o caracteres especiales"),
                            'descripcion' => "El campo contiene numero o caracteres especiales");
                    }

                    if(!empty(preg_matchall(array($precio_plan),regex_numbers))){
                        $data = array('status' => false,'formErrors' => array(
                            'precio_plan' =>  "contiene caracteres , solo se permiten numeros"));
                    }

                    if ($id_plan == 0){
                        if (empty($_SESSION['permisos_modulo']['w'])){
                            header('location:'.server_url.'Errors');
                            $data= array("status" => false, "msg" => "Error no tiene permisos");
                            $response_plan   = 0;
                        }else{
                            $response_plan = $this->model->insertPlan($nombre_plan,$precio_plan,$descripcion);
                            $option = 1;
                        }
                    }else{
                        if (empty($_SESSION['permisos_modulo']['w'])){
                            header('location:'.server_url.'Errors');
                            $data= array("status" => false, "msg" => "Error no tiene permisos");
                            $response_plan   = 0;
                        }else{
                            $response_plan = $this->model->updatePlan($id_plan,$nombre_plan,$precio_plan,$descripcion);
                            $option = 2;
                        }
                    }

                    if ($response_plan  > 0){
                        if ($option == 1){
                            $data = array('status' => true, 'msg' => 'Datos guardados correctamente');
                        }

                        if ($option == 2){
                            $data = array('status' => true, 'msg' => 'Datos actualizados correctamente');
                        }
                    }else if ($response_plan  == 'exist'){
                        $data = array('status' => false,'formErrors'=> array(
                            'nombre_plan' => "El plan ".$nombre_plan." ya existe, ingrese uno nuevo",
                        ));

                    }else{
                        $data = array('status' => false,'msg' => 'Hubo un error no se pudieron guardar los datos');
                    }
                }else{
                    $data = array('status' => false,'formErrors' => array(
                        'nombre_plan' => "El campo es obligatorio",
                        'precio_plan' => "El campo es obligatorio",
                        'descripcion' => "El campo es obligatorio",
                    ));
                }

            }else{
                header('location:'.server_url.'Errors');
            }
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
            die();
        }

        public function getSelectPlanes()
        {
            if (empty($_SESSION['permisos_modulo']['r']) ) {
                header('location:'.server_url.'Errors');
                $data = array("status" => false, "msg" => "Error no tiene permisos");
            }else{
                $html_options = "";
                $data = $this->model->selectPlanesNoInactivos();
                if (count($data) > 0) {
                    for ($i=0; $i < count($data) ; $i++) {
                        $html_options .='<option value="'.$data[$i]['id_plan'].'">'.$data[$i]['nombre_plan'].'</option>';
                    }
                }
                echo $html_options;
                die();
            }
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
        }

        public function delPlan(){
            if (empty($_SESSION['permisos_modulo']['d']) ) {
                header('location:'.server_url.'Errors');
                $data = array("status" => false, "msg" => "Error no tiene permisos");
            }else{
                if ($_POST){
                    $id_plan = intval(strclean($_POST["id"]));
                    if(validateEmptyFields([$id_plan])){
                        if(empty(preg_matchall([$id_plan],regex_numbers))){
                            $response_del = $this->model->deletePlan($id_plan);
                            if($response_del == "ok"){
                                $data = array("status" => true, "msg" => "Se ha eliminado el plan");
                            }else if ($response_del == "exist"){
                                $data = array("status" => false, "msg" => "No fue posisible");
                            }else{
                                $data = array("status" => false, "msg" => "Error al eliminar el plan");
                            }
                        }
                    }
                }else{
                    $data = array("status" => false, "msg" => "Error Hubo problemas");
                }
            }
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
            die();
        }
    }
