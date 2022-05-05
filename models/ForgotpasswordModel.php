<?php
    require_once("./libraries/core/mysql.php");
    class ForgotpasswordModel extends Mysql{
        public $str_email;
        public $int_code;
        
        public function __construct(){
            parent::__construct();
        }

        public function searchEmail(string $str_email){
            $this->str_email = $str_email;
            $sql = "SELECT * FROM usuarios WHERE email = '$this->str_email' and estado = 1";
            $request = $this->select_sql($sql);
            return $request;
        } 

        public function generateCodeEmail(int $code,string $str_email){
            $this->str_email = $str_email;
            $this->int_code = $code;
            $sql_udpate = "UPDATE usuarios SET code = ?,fecha_modifica = now()  WHERE email = '$this->str_email'";
            $data = array($this->int_code);
            $request_update = $this->update_sql($sql_udpate,$data);
            return $request_update;
        }

    }

?>