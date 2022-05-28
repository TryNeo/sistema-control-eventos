<?php 

	require_once ("./config/secretinfo.php");
	require_once ("./helpers/mailsender.php");
	class Home extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
		}

		public function home()
		{    
			if (empty($_SESSION['token'])) {
				$_SESSION['token'] = bin2hex(random_bytes(32));
			}
			$token = $_SESSION['token'];
            $data["csrf"] = $token;
            $data["page_id"] = 1;
            $data["page_title"] = "Inicio";
            $data["page"] = "home";
			$data['page_info'] =  $this->model->selectWebsite();
			$data["home_usuarios"] = $this->model->selectUsersHome();
			$data['home_invitados'] = $this->model->selectInvitadosHome();
			$this->views->getView($this,"home",$data); 
		}



		public function sendEmail(){
			if ($_POST) {
				$name = strtolower(strclean($_POST["name"]));
                $emaiL = strtolower(strclean($_POST["email"]));
				$subject = strtolower(strclean($_POST["subject"]));
				$message = strtolower(strclean($_POST["message"]));
                $recaptcha_response = strclean($_POST["g-recaptcha-response"]);
				if(validateEmptyFields(array($emaiL,$name,$subject,$message,$recaptcha_response))){
					if (empty($_POST['csrf']) != 0) {
                        $data = array('status' => false,'msg' => 'Oops hubo un error, intentelo de nuevo','formErrors'=> array());
                    }
                    if (hash_equals($_SESSION['token'], $_POST['csrf'])) {
						$cu = curl_init();
						curl_setopt($cu, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
                        curl_setopt($cu, CURLOPT_POST, 1);
                        curl_setopt($cu, CURLOPT_POSTFIELDS, http_build_query(array('secret' => GOOGLE_KEY_V2, 'response' => $recaptcha_response)));
                        curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);
                        $response = curl_exec($cu);
                        curl_close($cu);
                        $dataGoogle = json_decode($response, true);
						if($dataGoogle['success'] == 1){
							$mail = new MailSender('smtp.gmail.com', CORREO, CONTRASEÑA,true);
							$mail->setTemplateURL('./views/template/mail/mail_contact.html');
							$mail->compose(array(
								'name'=> $name,
								'email'=> $emaiL,
								'subject' => $subject,
								'message' => $message,
							));
							$data = $mail->sendEmail(array(
								CORREO,'Soporte | XenturionIT'
							),array(
								CORREO
							),$subject,array('Hubo un error al enviar el correo, intentelo nuevamente ', 'Hemos enviado el email correctamente'));
						}else{
							$data = array('status' => false,'msg' => 'El  reCAPTCHA ha sido invalido, recargue la pagiina e  intentelo nuevamente');
						}
					}else{
						$data = array('status' => false,'msg' => 'Oops hubo un error, intentelo de nuevo','formErrors'=> array());
                    }
                }else{
					$data = array('status' => false,'msg' => 'Todos los campos son obligatorios, verifique que no encuentren vacios e  intentelo nuevamente','formErrors'=> array());
                }
                echo json_encode($data,JSON_UNESCAPED_UNICODE);
            }
            die();
		}
	}
