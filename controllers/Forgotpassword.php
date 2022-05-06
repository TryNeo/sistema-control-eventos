<?php
    require_once ("./libraries/core/controllers.php");
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require_once ("./phpmailer/Exception.php");
    require_once ("./phpmailer/PHPMailer.php");
    require_once ("./phpmailer/SMTP.php");

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

                            $request_email = $this->model->searchEmail($emaiL_user);
                            if (empty($request_email)) {
                                $data = array('status' => false,'msg' => 'El email ingresado no existe, verifique que este escrito bien y vuelva a ingresarlo',
                                    'formErrors'=> array());
                            }else{}
                                $code = bin2hex(random_bytes(32));
                                $request_email_code = $this->model->generateCodeEmail($code,$emaiL_user);
                                if($request_email_code > 0){
                                    $mail = new PHPMailer();
                                    $mail->isSMTP();
                                    $mail->Mailer = "smtp";
                                    $mail->SMTPDebug  = 0;  
                                    $mail->SMTPAuth   = TRUE;
                                    $mail->SMTPSecure = "tls";
                                    $mail->Port       = 587;
                                    $mail->Host       = "smtp.gmail.com";
                                    $mail->Username   = "correo";
                                    $mail->Password   = "clave";

                                    $mail->setFrom('correo', 'YfdsfsfsfName');
                                    $mail->addReplyTo('correo', 'Yfsdfs');
                                    $mail->addAddress($emaiL_user, 'Resdfsdfsdfsd Name');
                                    $mail->Subject = 'Testing PHPMailer';

                                    $mail->Body = 'linkcode  ->'.server_url.'forgotpassword/reset?token='.$code;
                                    $_SESSION['emailtemp'] = $emaiL_user;
                                    $_SESSION['token-expire'] = time() + 5*60;
                                    
                                    if (!$mail->send()) {
                                        $data = array('status' => false,'msg' => 'Mailer Error: ' . $mail->ErrorInfo);
                                    } else {
                                        $data = array('status' => true, 'msg' => 'Hemos enviado un enlance restablecimiento de contraseña a tu email '.$emaiL_user, 'url' => server_url.'login');
                                    }
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
        

        public function reset(){
            if(isset($_GET['token'])){
                $data['csrf'] = bin2hex(random_bytes(32));
                $request_email_code = $this->model->verifyCodeEmail(strclean($_GET['token']));
                if($request_email_code > 0){
                    if (time() >=  $_SESSION['token-expire']){
                        $this->model->resetCodeEmail($_SESSION['emailtemp']);
                        $data_res = array("status" => false, "msg" => "El token a expirado, porfavor reenvie el enlace para restablecer su contraseña nuevamente");
                    }else{
                        $data_res = array("status" => true);
                    }
                }else{
                    $data_res = array("status" => false, "msg" => "El token a expirado o no existe , porfavor verifique este escrito bien");
                }
            }else{
                header('location:'.server_url.'login');
            }
            $data["error"] = json_encode($data_res,JSON_UNESCAPED_UNICODE);
            $this->views->getView($this,"reset",$data);
            die();
        }

        public function resetPassword(){
            if($_POST){
                if (time() >=  $_SESSION['token-expire']){
                    $data = array("status" => false, "msg" => "El token a expirado, porfavor reenvie el enlace para restablecer su contraseña nuevamente");
                }else{
                    if (empty($_POST['csrf'])) {
                        $data = array('status' => false,'msg' => 'Oops hubo un error, intentelo de nuevo','formErrors'=> array());
                    }else{
                        if (hash_equals($_SESSION['token'], $_POST['csrf'])) {
                            $password = strclean($_POST['password']);
                            $password_confirm = strclean($_POST['password_confirm']);
                            if(validateEmptyFields(array($password,$password_confirm))){
                                if($password != $password_confirm){
                                    $data= array("status" => false, "msg" => "Las contraseñas no coinciden, verifique que estén escritas bien");
                                }
                                $str_password = password_hash(strclean($_POST['password']),PASSWORD_DEFAULT,['cost' => 10]);
                                $response = $this->model->updatePassword($str_password,$_SESSION['emailtemp']);
                                if($response > 0){
                                    $this->model->resetCodeEmail($_SESSION['emailtemp']);
                                    $data = array("status" => true,"msg" => "La contraseña ha sido cambiado con exito",'url' => server_url.'login');
                                    unset($_SESSION['emailtemp']);
                                    unset($_SESSION['token-expire']);
                                }else{
                                    $data = array("status" => false,"msg" => "La contraseña no ha sido cambia con exito, intentelo nuevamente");
                                }
                            }else{
                                $data = array('status' => false,'formErrors'=> array(
                                        'password' => 'el campo se encuentra vacio',
                                        'password_confirm' => 'el campo se encuentra vacio',
                                    ));
                            }
                        }
                        $data = array('status' => false,'msg' => 'Oops hubo un error, intentelo de nuevo');
                    }
                }

                echo json_encode($data,JSON_UNESCAPED_UNICODE);
            }else{
                header('location:'.server_url.'login');
            }
            die();
        }
    }