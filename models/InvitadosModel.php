<?php
require_once("./libraries/core/mysql.php");

class InvitadosModel extends Mysql
{
    public $intInvitado;
    public $strNombre;
    public $strApellido;
    public $strDescrip;
    public $strImagen;
    public $intEstado;
    public $strFechaCrea;

    public function __construct()
    {
        parent::__construct();
    }

    public function selectInvitados()
    {
        $sql = "SELECT id_invitado,nombre_invitado,apellido_invitado,descripcion,url_imagen,estado FROM invitados where estado=1 ORDER BY id_invitado DESC";
        $request = $this->select_sql_all($sql);
        return $request;
    }

    public function selectInvitado(int $id_invitado){
        $this->intInv = $id_invitado;
        $sql = "SELECT id_invitado,nombre_invitado,apellido_invitado,descripcion,url_imagen,estado FROM invitados where id_invitado =$this->intInv";
        $request = $this->select_sql($sql);
        return $request;

    }

    public function insertInvitado(string $nombreInput, string $apellidoInput, string $descriInput,$url_imagen)
    {
        $return = "";
        $this->strNombre = $nombreInput;
        $this->strApellido = $apellidoInput;
        $this->strDescrip = $descriInput;
        $this->strImagen = $url_imagen;

        $sql = "SELECT * FROM invitados WHERE nombre_invitado = '{$this->strNombre}'";
        $request = $this->select_sql_all($sql);
        if (empty($request)) {
            $sql_insert = "INSERT INTO invitados(nombre_invitado,apellido_invitado,descripcion,url_imagen,estado,fecha_crea) values (?,?,?,?,1,now())";
            $data = array($this->strNombre, $this->strApellido,  $this->strDescrip,  $this->strImagen);
            $request_insert = $this->insert_sql($sql_insert, $data);
            $return = $request_insert;
        } else {
            $return = "exist";
        }
        return $return;
    }

    public function updateInvitado(int $intInvitado,string $nombreInput,string $apellidoInput, string $descriInput, $url_imagen)
    {
        $this->intInv = $intInvitado;
        $this->strNombre = $nombreInput;
        $this->strApellido = $apellidoInput;
        $this->strDescrip = $descriInput;
        $this->strImagen = $url_imagen;

        $request_update = "";
        if (empty($request_update)){
            $sql_udpate = "UPDATE invitados SET nombre_invitado = ?, apellido_invitado = ?,descripcion = ?,url_imagen = ?,fecha_modifica = now()  WHERE id_invitado = $this->intInv";
            $data = array($this->strNombre,$this->strApellido,$this->strDescrip,$this->strImagen);
            $request_update = $this->update_sql($sql_udpate,$data);
        }else{
            $request_update= "exist";
        }
        return $request_update;

    }


    public function deleteInvitado(int $intInvitado){
        $this->intInv = $intInvitado;
        $request_delete = "";
        if(empty($request_delete)){
            $sql = "UPDATE invitados set estado = ? , fecha_modifica = now() WHERE id_invitado = $this->intInv";
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
