<?php
    require_once("./libraries/core/mysql.php");
    class ForgotpasswordModel extends Mysql{
        public $str_email;
        
        public function __construct(){
            parent::__construct();
        }

        public function searchEmail(string $str_email){
            $this->str_email = $str_email;
            $sql = "SELECT * FROM usuarios WHERE email = '$this->str_email' and estado = 1";
            $request = $this->select_sql($sql);
            return $request;
        }        

    }

?>