<?php
    require_once("./libraries/core/mysql.php");
    class PermisosModel extends Mysql{
        public $intIdpermiso;
        public $intIdRol;
        public $intModulo;
        public $str_search_modulo;
        public $r;
        public $w;
        public $u;
        public $d;

        public function __construct(){
            parent::__construct();
        }

        public function selectModulos(string $str_search_modulo){
            $this->str_search_modulo = $str_search_modulo;
            $sql = "SELECT id_modulo,nombre,descripcion FROM modulos 
            WHERE estado = 1 and nombre like '%".$this->str_search_modulo."%' ";
            $request = $this->select_sql_all($sql);
            return $request;
        }

        public function selectSearchModulo(int $intModulo){
            $this->int_id_modulo = $intModulo;
            $sql = "SELECT id_modulo,nombre,descripcion FROM modulos 
            WHERE estado = 1 and id_modulo = $this->int_id_modulo";
            $request = $this->select_sql($sql);
            return $request;
        }


        public function selectPruebas(){
            $sql = "SELECT  perm.id_rol,rl.nombre_rol,GROUP_CONCAT(md.nombre) as modulos  FROM
            permisos as perm 
                INNER JOIN modulos as md
                ON md.id_modulo = perm.id_modulo
                INNER JOIN roles as rl
                ON rl.id_rol = perm.id_rol
                GROUP BY perm.id_rol";
            $request = $this->select_sql_all($sql);
            return $request;
        }


        
        public function selectPermisoRol(int $idRol){
            $this->intIdRol = $idRol;
            $sql = "SELECT * FROM permisos WHERE id_rol = $this->intIdRol ";
            $request = $this->select_sql_all($sql);
            return $request;
        }


        public function deletePermisos(int $intIdRol){
            $this->intIdRol = $intIdRol;
            $sql = "DELETE FROM permisos  WHERE id_rol = $this->intIdRol";
            $request = $this->delete_sql($sql);
            return $request;
        }


        public function insertPermisos(int $idRol,int $idModulo,int $r,int $w,int $u,int $d){
            $this->intIdRol = $idRol;
            $this->intModulo = $idModulo;
            $this->r = $r;
            $this->w = $w;
            $this->u = $u;
            $this->d = $d;
            $queryInsert = "INSERT INTO permisos(id_modulo,id_rol,r,w,u,d) VALUES(?,?,?,?,?,?)";
            $data = array($this->intModulo,$this->intIdRol,$this->r,$this->w,$this->u,$this->d);
            $request_insert = $this->insert_sql($queryInsert,$data);
            return $request_insert;
        }


        public function permisoModel(int $idRol){
            $this->intIdRol = $idRol;
            $sql = "SELECT p.id_modulo,m.nombre,
                    p.id_rol,p.r,p.w,p.u,p.d 
                    FROM permisos p INNER JOIN modulos m ON p.id_modulo = m.id_modulo WHERE p.id_rol = $this->intIdRol";
            $request = $this->select_sql_all($sql);
            $arrPermisos = array();
            for ($i=0; $i < count($request); $i++) { 
                $arrPermisos[$request[$i]['id_modulo']] = $request[$i];
            }
            return $arrPermisos;
        }
    }

?>