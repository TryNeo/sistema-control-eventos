<?php
    require_once ("./libraries/core/controllers.php");
    class Forgotpassword extends Controllers{
        public function __construct(){
            session_start();
            session_regenerate_id();
            if (isset($_SESSION['login'])) {
                header('location:'.server_url.'dashboard');
            }
            parent::__construct();
        }
        
        public function forgotpassword(){
            if (empty($_SESSION['token'])) {
                $_SESSION['token'] = bin2hex(random_bytes(32));
                $_SESSION['token-expire'] = time() + 30*60;
            }
            $token = $_SESSION['token'];
            $data["page_id"] = 11;
            $data["tag_pag"] = "Forgot";
            $data["page_title"] = "Restablecer contraseña";
            $data["page_name"] = "forgotpassword";
            $data["page"] = "forgotpassword";
            $data["csrf"] = $token;
            $this->views->getView($this,"forgotpassword",$data);

        }


        public function sendEmailCode(){
            if ($_POST) {
                $emaiL_user = strtolower(strclean($_POST["emailuser"]));
                if(validateEmptyFields(array($emaiL_user))){
                    if (empty($_POST['csrf'])) {
                        $data = array('status' => false,'msg' => 'Oops hubo un error, intentelo de nuevo','formErrors'=> array());
                    }else{
                        if (hash_equals($_SESSION['token'], $_POST['csrf'])) {
                            if (time() >=  $_SESSION['token-expire']){
                                    $data = array('status' => false,'msg' => 'Hubo un error, recargue la pagina porfavor');
                            }
                            $request_email = $this->model->searchEmail($emaiL_user);
                            if (empty($request_email)) {
                                $data = array('status' => false,'msg' => 'El email ingresado no existe, verifique que este escrito bien y vuelva a ingresarlo',
                                    'formErrors'=> array());
                            }else{
                                $data = array('status' => true,'msg' => 'Ha iniciado sesión correctamente');
                            }
                        } else {
                            $data = array('status' => false,'msg' => 'Oops hubo un error, intentelo de nuevo');
                        }
                    }
                }else{
                    $data = array('status' => false,'formErrors'=> array(
                            'emailuser' => 'el campo email se encuentra vacio',
                        ));
                }
                echo json_encode($data,JSON_UNESCAPED_UNICODE);
            }
            die();
        }
        
    }