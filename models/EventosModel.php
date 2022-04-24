<?php
require_once("./libraries/core/mysql.php");

class EventosModel extends Mysql
{
    public $intIdEvento;
    public $strNombreEvento;
    public $intCupo;
    public $dateFechaInicio;
    public $dateFechaFin;
    public $timeHoraInicio;
    public $timeHoraFin;
    public $strclaveEvento;
    public $intIdCategoria;
    public $intIdInvitado;


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


    public function insertEvento(string $nombre_evento,int $cupo,string $fecha_inicio,string $hora_inicio, string $fecha_fin,string $hora_fin,int $id_categoria, int $id_invitado)
    {
        $return = "";
        $this->strNombreEvento = $nombre_evento;
        $this->intCupo = $cupo;
        $this->dateFechaInicio = $fecha_inicio;
        $this->dateFechaFin = $fecha_fin;
        $this->timeHoraInicio = $hora_inicio;
        $this->timeHoraFin = $hora_fin;
        $this->intIdCategoria = $id_categoria;
        $this->intIdInvitado = $id_invitado;

        $sql = "SELECT * FROM eventos WHERE nombre_evento = '{$this->strNombreEvento}'";
        $request = $this->select_sql_all($sql);
        if (empty($request)) {
            $sql_insert = "INSERT INTO eventos(nombre_evento,cupo,fecha_evento_inicio,hora_evento_inicio,fecha_evento_fin,hora_evento_fin,id_cat_evento,id_inv,estado,fecha_crea) values (?,?,?,?,?,?,?,?,1,now())";
            $data = array($this->strNombreEvento,$this->intCupo,$this->dateFechaInicio,$this->timeHoraInicio,$this->dateFechaFin,$this->timeHoraFin,$this->intIdCategoria,$this->intIdInvitado);
            $request_insert = $this->insert_sql($sql_insert, $data);
            if($this->updateEventoClave($this->intIdCategoria,$request_insert) == "success"){
                $return = $request_insert;
                return $return;
            }
        } else {
            $return = "exist";
        }
        return $return;
    }

    public function updateEventoClave(int $id_categoria,int $last_id_evento){
        $sql = "SELECT nombre_categoria FROM categoria_evento where id_categoria = $id_categoria and estado = 1";
        $request = $this->select_sql($sql);
        $this->strclaveEvento = $request['nombre_categoria'].'_'.$last_id_evento;
        $sql_update = "UPDATE eventos SET clave_evento = ?,fecha_modifica = now()  WHERE id_evento = $last_id_evento";
        $data = array($this->strclaveEvento);
        $request_update = $this->update_sql($sql_update,$data);
        return "success";
    }

}

?>
