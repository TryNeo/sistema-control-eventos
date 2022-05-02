<?php
require_once("./libraries/core/mysql.php");

class PlanesModel extends Mysql
{
    public $intPlan;
    public $strPlan;
    public $strDescrip;
    public $floatPrecio;
    public $intEstado;
    public $strFechaCrea;

    public function __construct()
    {
        parent::__construct();
    }

    public function selectPlanes()
    {
        $sql = "SELECT id_plan,nombre_plan,precio_plan,descripcion,estado FROM planes where estado=1 ORDER BY id_plan DESC";
        $request = $this->select_sql_all($sql);
        return $request;
    }


    public function selectPlanesNoInactivos()
    {
        $sql = "SELECT id_plan,nombre_plan FROM planes WHERE estado =1 ";
        $request = $this->select_sql_all($sql);
        return $request;
    }


    public function selectPlan(int $id_plan)
    {
        $this->intPlan = $id_plan;
        $sql = "SELECT id_plan,nombre_plan,precio_plan,descripcion,estado FROM planes where id_plan=$this->intPlan";
        $request = $this->select_sql($sql);
        return $request;

    }

    public function insertPlan(string $planInput, float $precioInput, string $descriInput)
    {
        $return = "";
        $this->strPlan = $planInput;
        $this->floatPrecio = $precioInput;
        $this->strDescrip = $descriInput;

        $sql = "SELECT * FROM planes WHERE nombre_plan = '{$this->strPlan}'";
        $request = $this->select_sql_all($sql);
        if (empty($request)) {
            $sql_insert = "INSERT INTO planes(nombre_plan,precio_plan,descripcion,estado,fecha_crea) values (?,?,?,1,now())";
            $data = array($this->strPlan, $this->floatPrecio, $this->strDescrip);
            $request_insert = $this->insert_sql($sql_insert, $data);
            $return = $request_insert;
        } else {
            $return = "exist";
        }
        return $return;
    }


    public function updatePlan(int $intPlan, string $planInput, float $precioInput, $descriInput)
    {
        $this->intPlan = $intPlan;
        $this->strPlan = $planInput;
        $this->floatPrecio = $precioInput;
        $this->strDescrip = $descriInput;
        $request_update = "";

        if (empty($request_update)) {
            $sql_udpate = "UPDATE planes SET nombre_plan = ?, precio_plan = ?, descripcion = ? ,fecha_modifica = now()  WHERE id_plan = $this->intPlan";
            $data = array($this->strPlan, $this->floatPrecio, $this->strDescrip);
            $request_update = $this->update_sql($sql_udpate, $data);
        } else {
            $request_update = "exist";
        }
        return $request_update;
    }


    public function deletePlan(int $intPlan)
    {
        $this->intPlan = $intPlan;
        $request_delete = "";
        if (empty($request_delete)) {
            $sql = "UPDATE planes set estado = ? , fecha_modifica = now() WHERE id_plan = $this->intPlan";
            $data = array(0);
            $request_delete = $this->update_sql($sql, $data);
            if ($request_delete) {
                $request_delete = 'ok';
            } else {
                $request_delete = 'error';
            }
        } else {
            $request_delete = 'exist';
        }
        return $request_delete;
    }
}

?>
