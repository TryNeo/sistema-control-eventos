<?php
require_once("./libraries/core/mysql.php");

class EventosModel extends Mysql
{
    public $intIdEvento;
    public $strNombreEvento;
    public $dateFechaInicio;
    public $dateFechaFin;
    public $timeHoraInicio;
    public $timeHoraFin;
    public $strclaveEvento;

    public function __construct()
    {
        parent::__construct();
    }

    public function selectEventos()
    {
        $sql = "SELECT id_evento,nombre_evento FROM eventos where estado=1 ORDER BY id_evento DESC";
        $request = $this->select_sql_all($sql);
        return $request;
    }
    
}

?>
