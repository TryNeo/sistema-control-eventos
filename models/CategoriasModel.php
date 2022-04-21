<?php
require_once("./libraries/core/mysql.php");

class CategoriasModel extends Mysql
{
    public $intCategoria;
    public $strCategoria;
    public $strDescrip;
    public $strIcono;
    public $intEstado;
    public $strFechaCrea;

    public function __construct()
    {
        parent::__construct();
    }

    public function selectCategorias()
    {
        $sql = "SELECT id_categoria,nombre_categoria,descripcion,icono,estado FROM categoria_evento where estado=1 ORDER BY id_categoria DESC";
        $request = $this->select_sql_all($sql);
        return $request;
    }

    public function selectCategoria(int $id_categoria){
        $this->intCat = $id_categoria;
        $sql = "SELECT id_categoria,nombre_categoria,descripcion,icono,estado FROM categoria_evento where id_categoria =$this->intCat";
        $request = $this->select_sql($sql);
        return $request;

    }
    public function insertCategoria(string $categoriaInput, string $descriInput,string $icono)
    {
        $return = "";
        $this->strCategoria = $categoriaInput;
        $this->strDescrip = $descriInput;
        $this->strIcono = $icono;
        $sql = "SELECT * FROM categoria_evento WHERE nombre_categoria = '{$this->strCategoria}'";
        $request = $this->select_sql_all($sql);
        if (empty($request)) {
            $sql_insert = "INSERT INTO categoria_evento(nombre_categoria,descripcion,icono,estado,fecha_crea) values (?,?,?,1,now())";
            $data = array($this->strCategoria, $this->strDescrip);
            $request_insert = $this->insert_sql($sql_insert, $data);
            $return = $request_insert;
        } else {
            $return = "exist";
        }
        return $return;
    }


    public function updateCategoria(int $intCategoria,string $categoriaInput,string $descriInput,$icono)
    {
        $this->intCat = $intCategoria;
        $this->strCat = $categoriaInput;
        $this->strDescrip = $descriInput;
        $this->strIcono = $icono;

        /*$sql = "SELECT * FROM categoria_evento WHERE nombre_categoria = '$this->strCat' and  id_categoria =  $this->intCat and estado !=0";
        $request_update= $this->select_sql_all($sql);*/

        $request_update = "";
        if (empty($request_update)){
            $sql_udpate = "UPDATE categoria_evento SET nombre_categoria = ?, descripcion = ?, icono = ? ,fecha_modifica = now()  WHERE id_categoria = $this->intCat";
            $data = array($this->strCat,$this->strDescrip,$icono);
            $request_update = $this->update_sql($sql_udpate,$data);
        }else{
            $request_update= "exist";
        }
        return $request_update;
    }


    public function deleteCategoria(int $intCategoria){
        $this->intCat = $intCategoria;
        /*$sql = "SELECT * FROM registrados WHERE id_categoria = $this->intCat";
        $request_delete = $this->select_sql_all($sql);*/
        $request_delete = "";
        if(empty($request_delete)){
            $sql = "UPDATE categoria_evento set estado = ? , fecha_modifica = now() WHERE id_categoria = $this->intCat";
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
