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
                for ($i=0; $i < count($data); $i++) {
                    $btnEditarEvento = '';
                    $btnEliminarEvento = '';

                    if ($data[$i]['estado'] == 1){
                        $data[$i]['estado']= '<span  class="btn btn-success btn-icon-split btn-custom-sm"><i class="icon fas fa-check-circle "></i><span class="label text-padding text-white-50">&nbsp;&nbsp;Activo</span></span>';
                    }else{
                         $data[$i]['estado']='<span  class="btn btn-danger btn-icon-split btn-custom-sm"><i class="icon fas fa-ban "></i><span class="label text-padding text-white-50">Inactivo</span></span>';
                    }

                    if ($_SESSION['permisos_modulo']['u']) {
                        $btnEditarEvento = '<button class="btn btn-primary btnEditarEvento btn-circle " title="editar" 
                        onClick="return clickModalEditing('."'getEvento/".$data[$i]['id_evento']."'".','."'Actualizacion | Evento'".','."'id_evento'".','."['id_evento','nombre_evento','cupo','color_evento','fecha_evento_inicio','hora_evento_inicio','fecha_evento_fin','hora_evento_fin']".','."'#modalEvento'".','.'true'.','."['id_categoria','id_invitado']".');">
                        <i class="fa fa-edit"></i></button>';
                    }
                    

                    if ($_SESSION['permisos_modulo']['d']) {
                        $btnEliminarEvento = '<button  class="btn btn-danger btn-circle btnEliminarEvento" 
                        title="eliminar" onClick="return deleteServerSide('."'delEvento/'".','.$data[$i]['id_evento'].','."'¿Desea eliminar esta la categoria ".$data[$i]['nombre_evento']."?'".','."'.tableEvento'".');"><i class="far fa-thumbs-down"></i></button>';
                    }

                   
                    $data[$i]['nombre_invitado'] = $data[$i]['nombre_invitado'].' '.$data[$i]['apellido_invitado'];
                    $data[$i]['fecha_inicio_hora_inicio'] = $data[$i]['fecha_evento_inicio'].' '.$data[$i]['hora_evento_inicio'];
                    $data[$i]['fecha_fin_hora_fin'] = $data[$i]['fecha_evento_fin'].' '.$data[$i]['hora_evento_fin'];
                    $data[$i]['opciones'] = $btnEditarEvento.' '.$btnEliminarEvento;
                }
            }
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
            die();
        }

        
        public function getEvento(int $id_evento){
            if (empty($_SESSION['permisos_modulo']['r']) ) {
                header('location:'.server_url.'Errors');
                $data_response = array("status" => false, "msg" => "Error no tiene permisos");
            }else{
                $id_evento  = Intval(strclean($id_evento));
                if(validateEmptyFields([$id_evento])){
                    if(empty(preg_matchall([$id_evento],regex_numbers))){
                        if ($id_evento > 0){
                            $data = $this->model->selectEvento($id_evento);
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

        public function setEvento(){
            if ($_POST) {
                
                $id_evento = Intval(strclean($_POST['id_evento']));
                $nombre_evento = ucwords(strtolower(strclean($_POST["nombre_evento"])));
                $cupo = Intval(strclean($_POST['cupo']));
                $color_evento = strclean($_POST['color_evento']);
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
                            $response_eventos = $this->model->insertEvento($nombre_evento,$cupo,$color_evento,$fecha_evento_inicio,
                                $hora_evento_inicio,$fecha_evento_fin,$hora_evento_fin,$id_categoria,$id_invitado);
                            $option = 1;
                        }
                    }else{
                        if (empty($_SESSION['permisos_modulo']['w'])){
                            header('location:'.server_url.'Errors');
                            $data= array("status" => false, "msg" => "Error no tiene permisos");
                            $response_eventos = 0;
                        }else{
                            $response_eventos = $this->model->UpdateEvento($id_evento,$nombre_evento,$cupo,$color_evento,$fecha_evento_inicio,
                                $hora_evento_inicio,$fecha_evento_fin,$hora_evento_fin,$id_categoria,$id_invitado);
                            $option = 2;
                        }
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


        public function delEvento(){
            if (empty($_SESSION['permisos_modulo']['d']) ) {
                header('location:'.server_url.'Errors');
                $data = array("status" => false, "msg" => "Error no tiene permisos");
            }else{
                if ($_POST){
                    $id_evento = intval(strclean($_POST["id"]));
                    if(validateEmptyFields([$id_evento])){
                        if(empty(preg_matchall([$id_evento],regex_numbers))){
                            $response_del = $this->model->deleteEvento($id_evento);
                            if($response_del == "ok"){
                                $data = array("status" => true, "msg" => "Se ha eliminado la categoria");
                            }else if ($response_del == "exist"){
                                $data = array("status" => false, "msg" => "No es posisible eliminar una categoria ya asociada");
                            }else{
                                $data = array("status" => false, "msg" => "Error al eliminar la categoria");
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

        
        public function calendario(){
            if (empty($_SESSION['permisos_modulo']['r']) ) {
                header('location:'.server_url.'Errors');
            }
            $data["page_id"] = 15;
            $data["tag_pag"] = "Eventos";
            $data["page_title"] = "Eventos | Inicio";
            $data["page_name"] = "Listado de Eventos";
            $data['page'] = "calendar";
            $this->views->getView($this,"calendario",$data);

        }

        public function getCalendario(){
            if (empty($_SESSION['permisos_modulo']['r']) ) {
                header('location:'.server_url.'Errors');
                $data = array("status" => false, "msg" => "Error no tiene permisos");
            }else{
                $data = $this->model->selectCalendarioEventos();
            }
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
            die();
        }

    }
