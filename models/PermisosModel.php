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


        public function selectPermisos(){
            $sql = "SELECT  perm.id_rol,rl.nombre_rol,GROUP_CONCAT(md.nombre) as modulos  FROM
            permisos as perm 
                INNER JOIN modulos as md
                ON md.id_modulo = perm.id_modulo
                INNER JOIN roles as rl
                ON rl.id_rol = perm.id_rol WHERE perm.id_rol != 1 and rl.id_rol !=1
                GROUP BY perm.id_rol";
            $request = $this->select_sql_all($sql);
            return $request;
        }

        public function selectPermiso(int $id_rol){
            $this->intRol = $id_rol;
            $sql = "SELECT perm.id_permiso,md.nombre as nombre_modulo,perm.id_permiso as permiso_mod,perm.r,perm.w,perm.u,perm.d  FROM permisos as perm 
            INNER JOIN roles as rl ON perm.id_rol = rl.id_rol
            INNER JOIN modulos as md ON perm.id_modulo = md.id_modulo
            WHERE rl.id_rol =$this->intRol";
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

        public function insertPermiso(int $idRol){
            $this->intIdRol = $idRol;
            $sql = "SELECT * FROM permisos WHERE id_rol = $this->intIdRol";
            $request = $this->select_sql_all($sql);
            if (empty($request)){
                $queryInsert = "INSERT INTO permisos(id_modulo,id_rol,r,w,u,d) VALUES(?,?,?,?,?,?)";
                $data = array(1,$this->intIdRol,1,1,1,1);
                $request_insert = $this->insert_sql($queryInsert,$data);
                $return = $request_insert;
            }else{
                $return = "exist";
            }
            return $return;
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

        public function insertPermisoModulo(int $idModulo,int $idRol){
            $this->intModulo = $idModulo;
            $this->intIdRol = $idRol;
            $sql = "SELECT * FROM permisos WHERE id_modulo = $this->intModulo and id_rol= $this->intIdRol";
            $request = $this->select_sql_all($sql);
            if (empty($request)) {
                $sql_insert = "INSERT INTO permisos(id_modulo,id_rol) VALUES (?,?)";
                $data = array($this->intModulo,$this->intIdRol);
                $request_insert = $this->insert_sql($sql_insert,$data);
                $return = $request_insert;
            }else{
                $return = "exist";
            }
            return $return;
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

        public function deletePermisoModulo(int $id_permiso, int $id_rol){
            $this->intIdpermiso = $id_permiso;
            $this->intIdRol = $id_rol;
            
            $sql_delete = "DELETE FROM permisos WHERE id_permiso = $this->intIdpermiso and id_rol = $this->intIdRol";

            $request_delete = $this->delete_sql($sql_delete);
            if ($request_delete){
                $request_delete = 'ok';
            }else{
                $request_delete = 'error';
            }
            return $request_delete;
        }
    }

?>