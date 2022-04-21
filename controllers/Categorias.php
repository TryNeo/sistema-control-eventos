<?php
    require_once ("./libraries/core/controllers.php");

    class Categorias extends Controllers{
        public function __construct(){
            parent::__construct();
            session_start();
            if (empty($_SESSION['login'])) {
                header('location:'.server_url.'login');
            }
            getPermisos(6);
        }

        public function categorias(){
            $data["page_id"] = 6;
            $data["tag_pag"] = "Categorias";
            $data["page_title"] = "Categorias | Inicio";
            $data["page_name"] = "Listado de Categorias";
            $data['page'] = "categorias";
            $this->views->getView($this,"categorias",$data);

        }

        public function getCategorias(){
            if (empty($_SESSION['permisos_modulo']['r']) ) {
                header('location:'.server_url.'Errors');
                $data = array("status" => false, "msg" => "Error no tiene permisos");
            }else{
                $data = $this->model->selectCategorias();
                for ($i=0; $i < count($data); $i++) {
                    $btnEditarCategoria = '';
                    $btnEliminarCategoria='';

                   if ($data[$i]['estado'] == 1){
                       $data[$i]['estado']= '<span  class="btn btn-success btn-icon-split btn-custom-sm"><i class="icon fas fa-check-circle "></i><span class="label text-padding text-white-50">&nbsp;&nbsp;Activo</span></span>';
                   }else{
                        $data[$i]['estado']='<span  class="btn btn-danger btn-icon-split btn-custom-sm"><i class="icon fas fa-ban "></i><span class="label text-padding text-white-50">Inactivo</span></span>';
                   }

                    if ($_SESSION['permisos_modulo']['u']) {
                        $btnEditarCategoria = '<button class="btn btn-primary btnEditarCategoria btn-circle " title="editar" 
                        onClick="return clickModalEditing('."'getCategoria/".$data[$i]['id_categoria']."'".','."'Actualizacion | Categoria'".','."'id_categoria'".','."['nombre_categoria','descripcion']".','."'#modalCategoria'".');">
                        <i class="fa fa-edit"></i></button>';
                    }


                    if ($_SESSION['permisos_modulo']['d']) {
                        $btnEliminarCategoria = '<button  class="btn btn-danger btn-circle btnEliminarCategoria" 
                        title="eliminar" onClick="return deleteServerSide('."'delCategoria/'".','.$data[$i]['id_categoria'].','."'¿Desea eliminar esta la categoria ".$data[$i]['nombre_categoria']."?'".','."'.tableCategoria'".');"><i class="far fa-thumbs-down"></i></button>';
                    }

                    $data[$i]['opciones'] = $btnEditarCategoria.' '.$btnEliminarCategoria;
                }
            }
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
            die();
        }

        public function getCategoria(int $id_categoria){
            if (empty($_SESSION['permisos_modulo']['r']) ) {
                header('location:'.server_url.'Errors');
                $data_response = array("status" => false, "msg" => "Error no tiene permisos");
            }else{
                $id_cat  = Intval(strclean($id_categoria));
                if(validateEmptyFields([$id_cat])){
                    if(empty(preg_matchall([$id_cat],regex_numbers))){
                        if ($id_cat > 0){
                            $data = $this->model->selectCategoria($id_cat);
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

        public function setCategoria(){
            if ($_POST) {
                $id_categoria = Intval(strclean($_POST['id_categoria']));
                $nombre_categoria = ucwords(strtolower(strclean($_POST["nombre_categoria"])));
                $descripcion_categoria = ucwords(strtolower(strclean($_POST["descripcion"])));
                $icono = strtolower(strclean($_POST["icono"]));
                $validate_data = [$nombre_categoria,$descripcion_categoria];

                if(validateEmptyFields($validate_data)){
                    if(empty(preg_matchall($validate_data,regex_string))){
                        if ($id_categoria == 0){
                            $response_rol = $this->model->insertCategoria($nombre_categoria,$descripcion_categoria,$icono);
                            $option = 1;
                        }else{
                            $response_rol = $this->model->updateCategoria($id_categoria,$nombre_categoria,$descripcion_categoria,$icono);
                            $option = 2;
                        }

                        if ($response_rol > 0){
                            if (empty($_SESSION['permisos_modulo']['w'])){
                                header('location:'.server_url.'Errors');
                                $data= array("status" => false, "msg" => "Error no tiene permisos");
                            }else{
                                if ($option == 1){
                                    $data = array('status' => true, 'msg' => 'Datos guardados correctamente');
                                }
                            }

                            if (empty($_SESSION['permisos_modulo']['u'])) {
                                header('location:'.server_url.'Errors');
                                $data= array("status" => false, "msg" => "Error no tiene permisos");
                            }else{
                                if ($option == 2){
                                    $data = array('status' => true, 'msg' => 'Datos actualizados correctamente');
                                }
                            }

                        }else if ($response_rol == 'exist'){
                            $data = array('status' => false,'formErrors'=> array(
                                'nombre_categoria' => "La categoria ".$nombre_categoria." ya existe, ingrese uno nuevo",
                            ));

                        }else{
                            $data = array('status' => false,'msg' => 'Hubo un error no se pudieron guardar los datos');
                        }


                    }else{
                        $data = array('status' => false,'formErrors'=> array(
                            'nombre_categoria' => "El nombre contiene numero o caracteres especiales",
                            'descripcion' => "La descripcion contiene numero o caracteres especiales",
                        ));

                    }
                }else{
                    $data = array('status' => false,'formErrors' => array(
                        'nombre_categoria' => "El campo nombre se encuentra vacio",
                        'descripcion' => "La descripcion se encuentra vacio",
                        'icono' => "el campo icono se encuentra vacio",
                    ));
                }
            }else{
                header('location:'.server_url.'Errors');
            }
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
            die();
        }

        public function delCategoria(){
            if (empty($_SESSION['permisos_modulo']['d']) ) {
                header('location:'.server_url.'Errors');
                $data = array("status" => false, "msg" => "Error no tiene permisos");
            }else{
                if ($_POST){
                    $id_categoria = intval(strclean($_POST["id"]));
                    if(validateEmptyFields([$id_categoria])){
                        if(empty(preg_matchall([$id_categoria],regex_numbers))){
                            $response_del = $this->model->deleteCategoria($id_categoria);
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
    }
