<?php
require_once("./libraries/core/mysql.php");

class HomeModel extends Mysql
{
    public function __construct()
    {
        parent::__construct();
    }

    public function selectUsersHome()
    {
        $sql = "SELECT  foto FROM usuarios where estado=1 and type_user='web' LIMIT 4";
        $request = $this->select_sql_all($sql);
        return $request;
    }

    public function selectInvitadosHome()
    {
        $sql = "SELECT  * FROM invitados where estado=1  LIMIT 4";
        $request = $this->select_sql_all($sql);
        return $request;
    }


    public function selectWebsite()
    {
        $sql = "SELECT * FROM website_setting WHERE id_website_setting = 1";
        $request_website = $this->select_sql($sql);
        return $request_website;
    }

    
}

?>
