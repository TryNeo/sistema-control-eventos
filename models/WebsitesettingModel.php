<?php
    require_once("./libraries/core/mysql.php");
    class WebsitesettingModel extends Mysql{
        
        public function __construct(){
            parent::__construct();
        }

        public function selectWebsite(){
            $sql = "SELECT * FROM website_setting WHERE id_website_setting = 1" ;
            $request_website = $this->select_sql($sql);
            return $request_website;
        }


    }

?>