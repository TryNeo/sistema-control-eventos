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
                                $code = rand(999999, 111111);
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
                                    $mail->Username   = "correp";
                                    $mail->Password   = "clave";

                                    $mail->setFrom('correo', 'YfdsfsfsfName');
                                    $mail->addReplyTo('correo', 'Yfsdfs');
                                    $mail->addAddress($emaiL_user, 'Resdfsdfsdfsd Name');
                                    $mail->Subject = 'Testing PHPMailer';
                                    $mail->Body = 'Codigo  ->'.$code;
                                    if (!$mail->send()) {
                                        $data = array('status' => false,'msg' => 'Mailer Error: ' . $mail->ErrorInfo);
                                    } else {
                                        $data = array('status' => true, 'msg' => 'Hemos restablecimiento de contraseña a tu email '.$emaiL_user);
                                    }

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
        
    }