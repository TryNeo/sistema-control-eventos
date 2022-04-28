<?php
require_once ("./libraries/core/controllers.php");

class Bancarias extends Controllers{
    public function __construct(){
        parent::__construct();
        session_start();
        if (empty($_SESSION['login'])) {
            header('location:'.server_url.'login');
        }
        getPermisos(9);
    }

    public function bancarias(){
        if (empty($_SESSION['permisos_modulo']['r']) ) {
            header('location:'.server_url.'Errors');
        }
        $data["page_id"] = 9;
        $data["tag_pag"] = "Bancarias";
        $data["page_title"] = "Cuentas Bancarias | Inicio";
        $data["page_name"] = "Listado de Cuentas Bancarias";
        $data['page'] = "bancarias";
        $this->views->getView($this,"bancarias",$data);

    }

    public function getBancarias(){
        if (empty($_SESSION['permisos_modulo']['r']) ) {
            header('location:'.server_url.'Errors');
            $data = array("status" => false, "msg" => "Error no tiene permisos");
        }else{
            $data = $this->model->selectBancarias();
            for ($i=0; $i < count($data); $i++) {
                $btnEditarBancaria = '';
                $btnEliminarBancaria ='';

                if ($data[$i]['estado'] == 1){
                    $data[$i]['estado']= '<span  class="btn btn-success btn-icon-split btn-custom-sm"><i class="icon fas fa-check-circle "></i><span class="label text-padding text-white-50">&nbsp;&nbsp;Activo</span></span>';
                }else{
                    $data[$i]['estado']='<span  class="btn btn-danger btn-icon-split btn-custom-sm"><i class="icon fas fa-ban "></i><span class="label text-padding text-white-50">Inactivo</span></span>';
                }

                if ($_SESSION['permisos_modulo']['u']) {
                    $btnEditarBancaria = '<button class="btn btn-primary btnEditarBancaria btn-circle " title="editar" 
                        onClick="return clickModalEditing('."'getBancaria/".$data[$i]['id_bancaria']."'".','."'Actualizacion | Cuentas Bancarias'".','."'id_bancaria'".','."['nombre_banco','tipo','nro_cuenta','ced_ruc','email','descripcion']".','."'#modalBancaria'".');">
                        <i class="fa fa-edit"></i></button>';
                }

                if ($_SESSION['permisos_modulo']['d']) {
                    $btnEliminarBancaria = '<button  class="btn btn-danger btn-circle btnEliminarBancaria" 
                        title="eliminar" onClick="return deleteServerSide('."'delBancaria/'".','.$data[$i]['id_bancaria'].','."'¿Desea eliminar la cuenta bancaria # ".$data[$i]['nro_cuenta']."?'".','."'.tableBancaria'".');"><i class="far fa-thumbs-down"></i></button>';
                }

                $data[$i]['opciones'] = $btnEditarBancaria.' '.$btnEliminarBancaria;
            }
        }
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getBancaria(int $id_bancaria){
        if (empty($_SESSION['permisos_modulo']['r']) ) {
            header('location:'.server_url.'Errors');
            $data_response = array("status" => false, "msg" => "Error no tiene permisos");
        }else{
            $id_bank  = Intval(strclean($id_bancaria));
            if(validateEmptyFields([$id_bank])){
                if(empty(preg_matchall([$id_cat],regex_numbers))){
                    if ($id_bank > 0){
                        $data = $this->model->selectBancaria($id_bank);
                        if (empty($data)){
                            $data_response = array('status' => false,'msg'=> 'Datos no encontrados');
                        }else{
                            $data_response = array('status' => true,'msg'=> $data);
                        }
                    }
                }else{
                    $data = array('status' => false,'msg' => 'El campo esta mal escrito , verifique y vuelva a ingresarlo');
                }
            }else {
                $data = array('status' => false,'msg' => 'El campo se encuentra vacio , verifique y vuelva a ingresarlo');
            }
        }
        echo json_encode($data_response,JSON_UNESCAPED_UNICODE);
        die();
    }

    public function setBancaria(){
        if ($_POST) {
            $id_bancaria = Intval(strclean($_POST['id_bancaria']));
            $nombre_bancaria = ucwords(strtolower(strclean($_POST["nombre_banco"])));
            $tipo_bancaria = ucwords(strtolower(strclean($_POST["tipo"])));
            $nrocuenta_bancaria = ucwords(strtolower(strclean($_POST["nro_cuenta"])));
            $cedruc_bancaria = ucwords(strtolower(strclean($_POST["ced_ruc"])));
            $email_bancaria = ucwords(strtolower(strclean($_POST["email"])));
            $descripcion_bancaria = ucwords(strtolower(strclean($_POST["descripcion"])));
            $validate_data = [$nombre_bancaria,$tipo_bancaria,$nrocuenta_bancaria,$cedruc_bancaria,$email_bancaria,$descripcion_bancaria];

            if(validateEmptyFields($validate_data)){
                if(empty(preg_matchall($validate_data,regex_string))){

                    if ($id_bancaria == 0){
                        if (empty($_SESSION['permisos_modulo']['w'])){
                            header('location:'.server_url.'Errors');
                            $data= array("status" => false, "msg" => "Error no tiene permisos");
                            $response_bancaria = 0;
                        }else{
                            $response_bancaria = $this->model->insertBancaria($nombre_bancaria,$tipo_bancaria,$nrocuenta_bancaria,$cedruc_bancaria,$email_bancaria,$descripcion_bancaria);
                            $option = 1;
                        }
                    }else{
                        if (empty($_SESSION['permisos_modulo']['w'])){
                            header('location:'.server_url.'Errors');
                            $data= array("status" => false, "msg" => "Error no tiene permisos");
                            $response_bancaria = 0;
                        }else{
                            $response_bancaria = $this->model->updateBancaria($id_bancaria,$nombre_bancaria,$tipo_bancaria,$nrocuenta_bancaria,$cedruc_bancaria,$email_bancaria,$descripcion_bancaria);
                            $option = 2;
                        }
                    }

                    if ($response_bancaria > 0){
                        if ($option == 1){
                            $data = array('status' => true, 'msg' => 'Datos guardados correctamente');
                        }

                        if ($option == 2){
                            $data = array('status' => true, 'msg' => 'Datos actualizados correctamente');
                        }
                    }else if ($response_bancaria == 'exist'){
                        $data = array('status' => false,'formErrors'=> array(
                            'nombre_bancaria' => "La cuenta nro ".$nrocuenta_bancaria." ya existe, ingrese uno nuevo",
                        ));

                    }else{
                        $data = array('status' => false,'msg' => 'Hubo un error no se pudieron guardar los datos');
                    }


                }else{
                    $data = array('status' => false,'formErrors'=> array(
                        'nombre_bancaria' => "El nombre contiene numero o caracteres especiales",
                        'descripcion' => "La descripcion contiene numero o caracteres especiales",
                    ));

                }
            }else{
                $data = array('status' => false,'formErrors' => array(
                    'nombre_bancaria' => "El campo nombre se encuentra vacio",
                    'tipo_bancaria' => "El tipo de cuenta se encuentra vacio",
                    'nrocuenta_bancaria' => "El campo numero de cuenta se encuentra vacio",
                    'cedruc_bancaria' => "La cedula o ruc se encuentra vacio",
                    'email_bancaria' => "El campo email se encuentra vacio",
                    'descripcion_bancaria' => "La descripcion se encuentra vacio",
                ));
            }
        }else{
            header('location:'.server_url.'Errors');
        }
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getSelectBancarias()
    {
        if (empty($_SESSION['permisos_modulo']['r']) ) {
            header('location:'.server_url.'Errors');
            $data = array("status" => false, "msg" => "Error no tiene permisos");
        }else{
            $html_options = "";
            $data = $this->model->selectBancariasNoInactivos();
            if (count($data) > 0) {
                for ($i=0; $i < count($data) ; $i++) {
                    $html_options .='<option value="'.$data[$i]['id_bancaria'].'">'.$data[$i]['nombre_banco'].'</option>';
                }
            }
            echo $html_options;
            die();
        }
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
    }

    public function delBancaria(){
        if (empty($_SESSION['permisos_modulo']['d']) ) {
            header('location:'.server_url.'Errors');
            $data = array("status" => false, "msg" => "Error no tiene permisos");
        }else{
            if ($_POST){
                $id_bancaria = intval(strclean($_POST["id"]));
                if(validateEmptyFields([$id_bancaria])){
                    if(empty(preg_matchall([$id_bancaria],regex_numbers))){
                        $response_del = $this->model->deleteBancaria($id_bancaria);
                        if($response_del == "ok"){
                            $data = array("status" => true, "msg" => "Se ha eliminado la cuenta bancaria");
                        }else if ($response_del == "exist"){
                            $data = array("status" => false, "msg" => "No fue posisible");
                        }else{
                            $data = array("status" => false, "msg" => "Error al eliminar la cuenta bancaria");
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
