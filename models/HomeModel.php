<?php
require_once("./libraries/core/mysql.php");

class HomeModel extends Mysql
{
    public function __construct()
    {
        parent::__construct();
    }

    public function selectInvitadosHome()
    {
        $sql = "SELECT  foto FROM usuarios where estado=1 and type_user='web' LIMIT 4";
        $request = $this->select_sql_all($sql);
        return $request;
    }

}

?>
