<?php
require_once("./libraries/core/mysql.php");

class EventosModel extends Mysql
{
    public $intIdEvento;
    public $strNombreEvento;
    public $intCupo;
    public $strColorEvento;
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
        $sql = "SELECT ev.id_evento,ev.nombre_evento,ev.cupo,ev.fecha_evento_inicio,
                    ev.hora_evento_inicio,ev.fecha_evento_fin,ev.hora_evento_fin,cate.nombre_categoria,inv.nombre_invitado,inv.apellido_invitado,ev.clave_evento,ev.estado
                FROM eventos as ev
                    INNER JOIN categoria_evento as cate ON ev.id_cat_evento = cate.id_categoria
                    INNER JOIN invitados as inv ON ev.id_inv = inv.id_invitado
                where ev.estado=1 ORDER BY ev.id_evento DESC";
        $request = $this->select_sql_all($sql);
        return $request;
    }

    public function selectCalendarioEventos()
    {
        $sql = "SELECT nombre_evento as title,fecha_evento_inicio as start, fecha_evento_fin as end,color_evento as color FROM eventos WHERE estado = 1";
        $request = $this->select_sql_all($sql);
        return $request;
    }


    public function selectEvento(int $id_evento){
        $this->intIdEvento = $id_evento;
        $sql = "SELECT id_evento,nombre_evento,cupo,color_evento,id_cat_evento as id_categoria ,id_inv as id_invitado,fecha_evento_inicio,hora_evento_inicio,fecha_evento_fin,hora_evento_fin,estado FROM eventos where id_evento =$this->intIdEvento";
        $request = $this->select_sql($sql);
        return $request;

    }


    public function insertEvento(string $nombre_evento,int $cupo,string $color_evento,string $fecha_inicio,string $hora_inicio, string $fecha_fin,string $hora_fin,int $id_categoria, int $id_invitado)
    {
        $return = "";
        $this->strNombreEvento = $nombre_evento;
        $this->intCupo = $cupo;
        $this->strColorEvento = $color_evento;
        $this->dateFechaInicio = $fecha_inicio;
        $this->dateFechaFin = $fecha_fin;
        $this->timeHoraInicio = $hora_inicio;
        $this->timeHoraFin = $hora_fin;
        $this->intIdCategoria = $id_categoria;
        $this->intIdInvitado = $id_invitado;

        $sql = "SELECT * FROM eventos WHERE nombre_evento = '{$this->strNombreEvento}'";
        $request = $this->select_sql_all($sql);
        if (empty($request)) {
            $sql_insert = "INSERT INTO eventos(nombre_evento,cupo,color_evento,fecha_evento_inicio,hora_evento_inicio,fecha_evento_fin,hora_evento_fin,id_cat_evento,id_inv,estado,fecha_crea) values (?,?,?,?,?,?,?,?,?,1,now())";
            $data = array($this->strNombreEvento,$this->intCupo,$this->strColorEvento,$this->dateFechaInicio,$this->timeHoraInicio,$this->dateFechaFin,$this->timeHoraFin,$this->intIdCategoria,$this->intIdInvitado);
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

    public function updateEvento(int $id_evento,string $nombre_evento,int $cupo,string $color_evento,string $fecha_inicio,string $hora_inicio, string $fecha_fin,string $hora_fin,int $id_categoria, int $id_invitado)
    {
        $this->intIdEvento = $id_evento;
        $this->strNombreEvento = $nombre_evento;
        $this->strColorEvento = $color_evento;
        $this->intCupo = $cupo;
        $this->dateFechaInicio = $fecha_inicio;
        $this->dateFechaFin = $fecha_fin;
        $this->timeHoraInicio = $hora_inicio;
        $this->timeHoraFin = $hora_fin;
        $this->intIdCategoria = $id_categoria;
        $this->intIdInvitado = $id_invitado;

        $return = "";
        $sql_insert = "UPDATE eventos SET nombre_evento = ?,cupo=?,color_evento = ?,fecha_evento_inicio = ?,hora_evento_inicio = ?,fecha_evento_fin = ?, hora_evento_fin = ?, id_cat_evento = ?, id_inv = ?, fecha_modifica = now() WHERE id_evento = $this->intIdEvento";
        $data = array($this->strNombreEvento,$this->intCupo,$this->strColorEvento,$this->dateFechaInicio,$this->timeHoraInicio,$this->dateFechaFin,$this->timeHoraFin,$this->intIdCategoria,$this->intIdInvitado);
        $request_update = $this->update_sql($sql_insert, $data);
        if($this->updateEventoClave($this->intIdCategoria,$this->intIdEvento) == "success"){
            $return = $request_update;
            return $return;
        }
    }


    public function updateEventoClave(int $id_categoria,int $last_id_evento){
        $sql = "SELECT nombre_categoria FROM categoria_evento where id_categoria = $id_categoria and estado = 1";
        $request = $this->select_sql($sql);
        $this->strclaveEvento = strtolower($request['nombre_categoria'].'_'.$last_id_evento);
        $sql_update = "UPDATE eventos SET clave_evento = ?,fecha_modifica = now()  WHERE id_evento = $last_id_evento";
        $data = array($this->strclaveEvento);
        $request_update = $this->update_sql($sql_update,$data);
        return "success";
    }

    
    public function deleteEvento(int $id_evento){
        $this->intIdEvento = $id_evento;
        /*$sql = "SELECT * FROM registrados WHERE id_categoria = $this->intCat";
        $request_delete = $this->select_sql_all($sql);*/
        $request_delete = "";
        if(empty($request_delete)){
            $sql = "UPDATE eventos set estado = ? , fecha_modifica = now() WHERE  id_evento = $this->intIdEvento";
            $data = array(0);
            $request_delete = $this->update_sql($sql,$data);
            if ($request_delete){
                $request_delete = 'ok';
            }else{
                $request_delete = 'error';
            }
        }else{
            $request_delete = 'exist';
        }
        return $request_delete;
    }
}

?>
