<?php
require_once("./libraries/core/mysql.php");

class BancariasModel extends Mysql
{
    public $intBancaria;
    public $strNombreBancaria;
    public $strTipoBancaria;
    public $strNroCuenta;
    public $strCedRuc;
    public $strEmail;
    public $strDescripcion;
    public $intEstado;
    public $strFechaCrea;

    public function __construct()
    {
        parent::__construct();
    }

    public function selectBancarias()
    {
        $sql = "SELECT id_bancaria, nombre_banco, tipo, nro_cuenta, ced_ruc, email, descripcion, estado FROM bancarias where estado=1 ORDER BY id_bancaria ASC";
        $request = $this->select_sql_all($sql);
        return $request;
    }


    public function selectBancariasNoInactivos()
    {
        $sql = "SELECT id_bancaria,nombre_banco FROM bancarias WHERE estado =1 ";
        $request = $this->select_sql_all($sql);
        return $request;
    }


    public function selectBancaria(int $id_bancaria)
    {
        $this->intBancaria = $id_bancaria;
        $sql = "SELECT id_bancaria, nombre_banco, tipo, nro_cuenta, ced_ruc, email, descripcion FROM bancarias where id_bancaria =$this->intBancaria";
        $request = $this->select_sql($sql);
        return $request;

    }

    public function insertBancaria(string $bancariaInput, string $tipoInput, string $nrocuentaInput, string $cedrucInput, string $emailInput, string $descriInput)
    {
        $return = "";
        $this->strNombreBancaria = $bancariaInput;
        $this->strTipoBancaria = $tipoInput;
        $this->strNroCuenta = $nrocuentaInput;
        $this->strCedRuc = $cedrucInput;
        $this->strEmail = $emailInput;
        $this->strDescripcion = $descriInput;

        $sql = "SELECT * FROM bancarias WHERE nombre_banco = '{$this->strNombreBancaria}'";
        $request = $this->select_sql_all($sql);
        if (empty($request)) {
            $sql_insert = "INSERT INTO bancarias(nombre_banco, tipo, nro_cuenta, ced_ruc, email, descripcion, estado,fecha_crea) values (?,?,?,?,?,?,1,now())";
            $data = array($this->strNombreBancaria, $this->strTipoBancaria, $this->strNroCuenta, $this->strCedRuc, $this->strEmail, $this->strDescripcion);
            $request_insert = $this->insert_sql($sql_insert, $data);
            $return = $request_insert;
        } else {
            $return = "exist";
        }
        return $return;
    }


    public function updateBancaria(int $intBancaria, string $bancariaInput, string $tipoInput, string $nrocuentaInput, string $cedrucInput, string $emailInput, string $descriInput)
    {
        $this->intBancaria = $intBancaria;
        $this->strNombreBancaria = $bancariaInput;
        $this->strTipoBancaria = $tipoInput;
        $this->strNroCuenta = $nrocuentaInput;
        $this->strCedRuc = $cedrucInput;
        $this->strEmail = $emailInput;
        $this->strDescripcion = $descriInput;

        $request_update = "";
        if (empty($request_update)) {
            $sql_udpate = "UPDATE bancarias SET nombre_banco = ?, tipo = ?, nro_cuenta = ?, ced_ruc = ?, email = ?, descripcion = ?,fecha_modifica = now()  WHERE id_bancaria = $this->intBancaria";
            $data = array($this->strNombreBancaria, $this->strTipoBancaria, $this->strNroCuenta, $this->strCedRuc, $this->strEmail, $this->strDescripcion);
            $request_update = $this->update_sql($sql_udpate, $data);
        } else {
            $request_update = "exist";
        }
        return $request_update;
    }


    public function deleteBancaria(int $intBancaria)
    {
        $this->intBancaria = $intBancaria;
        $request_delete = "";
        if (empty($request_delete)) {
            $sql = "UPDATE bancarias set estado = ? , fecha_modifica = now() WHERE id_bancaria = $this->intBancaria";
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
