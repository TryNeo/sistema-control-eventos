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


        public function getEventos(){
            if (empty($_SESSION['permisos_modulo']['r']) ) {
                header('location:'.server_url.'Errors');
                $data = array("status" => false, "msg" => "Error no tiene permisos");
            }else{
                $data = $this->model->selectEventos();
            }
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
            die();
        }


        public function setEvento(){
            if ($_POST) {
                
                $id_evento = Intval(strclean($_POST['id_evento']));
                $nombre_evento = ucwords(strtolower(strclean($_POST["nombre_evento"])));
                $cupo = Intval(strclean($_POST['cupo']));
                $fecha_evento_inicio = strclean($_POST["fecha_evento_inicio"]);
                $hora_evento_inicio = strclean($_POST["hora_evento_inicio"]);
                $fecha_evento_fin = strclean($_POST["fecha_evento_fin"]);
                $hora_evento_fin = strclean($_POST["hora_evento_fin"]);
                $id_categoria  = Intval(strclean($_POST['id_categoria']));
                $id_invitado  = Intval(strclean($_POST['id_invitado']));

                $validate_data = [ $nombre_evento,$cupo,$fecha_evento_inicio,
                    $hora_evento_inicio,$fecha_evento_fin,$hora_evento_fin,$id_categoria,$id_invitado];

                if(validateEmptyFields($validate_data)){
                    if(!empty(preg_matchall(array($nombre_evento),regex_string))){
                        $data = array('status' => false,'formErrors' => array(
                            'nombre_evento' => "El campo contiene numero o caracteres especiales",
                        ));
                    }

                    if(!empty(preg_matchall(array($fecha_evento_inicio,$fecha_evento_fin),regex_fechas))){
                        $data = array('status' => false,'formErrors' => array(
                            'fecha_evento_inicio' => "La fecha ingresada no es valida",
                            'fecha_evento_fin' => "La fecha ingresada no es valida",
                        ));
                    }

                    if(!empty(preg_matchall(array($hora_evento_inicio,$hora_evento_fin),regex_hora))){
                        $data = array('status' => false,'formErrors' => array(
                            'hora_evento_inicio' => "La hora ingresada no es valida",
                            'hora_evento_fin' => "La hora ingresada no es valida",
                        ));
                    }

                    if ($id_evento == 0){
                        if (empty($_SESSION['permisos_modulo']['w'])){
                            header('location:'.server_url.'Errors');
                            $data= array("status" => false, "msg" => "Error no tiene permisos");
                            $response_eventos = 0;
                        }else{
                            $response_eventos = $this->model->insertEvento($nombre_evento,$cupo,$fecha_evento_inicio,
                                $hora_evento_inicio,$fecha_evento_fin,$hora_evento_fin,$id_categoria,$id_invitado);
                            $option = 1;
                        }
                    }else{
                        $option = 2;
                    }
                    
                    if ($response_eventos > 0){ 
                        if ($option == 1){
                            $data = array('status' => true, 'msg' => 'Datos guardados correctamente');
                        }

                        if ($option == 2){
                            $data = array('status' => true, 'msg' => 'Datos actualizados correctamente');
                        }
                    
                    }else if ($response_eventos == 'exist'){
                        $data = array('status' => false,'formErrors'=> array(
                            'nombre_evento' => "El evento ".$nombre_evento." ya existe, ingrese uno nuevo",
                        ));
                    }else{
                        $data = array('status' => false,'msg' => 'Hubo un error no se pudieron guardar los datos');
                    }
                    
                }else{
                    $data = array('status' => false,'msg' => "Verifique que algunos de los campos no se encuentre vacio");
                }
            }else{
                header('location:'.server_url.'Errors');
            }
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
            die();
        }


    }
