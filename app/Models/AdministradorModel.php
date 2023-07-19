<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;

class AdministradorModel
{

    protected $db;
    private $encrypt;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;
        $this->encrypt = new Encrypt();

    }

    public function GetUsuarios($idEmpresa){
        $builder = $this->db->table('sys_usuarios_admin');
        $builder->select('id, nombre,apellido_paterno , email');
        $builder->orderBy("nombre","asc");
        $builder->where("idempresa",$idEmpresa);
        return $builder->get()->getResult();
        
    }

    public function GetuserById($id){
        $builder = $this->db->table('sys_usuarios_admin');
        $builder->select('sys_usuarios_admin.id, sys_usuarios_admin.nombre,apellido_paterno , email , sys_usuarios_admin.activo ,sys_empresas.nombre AS empresa ');
        $builder->join("sys_empresas","sys_usuarios_admin.idempresa = sys_empresas.id","left");
        $builder->orderBy("nombre","asc");
        $builder->where("sys_usuarios_admin.id",$id);
        return $builder->get()->getRow();
        
    }

    public function GetModulosById($id){
        $builder = $this->db->table('sys_permisos_usuarios');
        $builder->select('sys_permisos_usuarios.idmodulo, sys_permisos_usuarios.permiso, sys_modulos.descripcion ,sys_modulos.parent , sys_modulos.child , sys_modulos.idparent , sys_modulos.icon');
        $builder->join("sys_usuarios_admin","sys_permisos_usuarios.idusuario = sys_usuarios_admin.id","left");
        $builder->join("sys_modulos","sys_permisos_usuarios.idmodulo = sys_modulos.id","left");
        $builder->orderBy("idparent","asc");
        $builder->orderBy("orden","asc");
        $where = " sys_usuarios_admin.id = '". $id ."' AND idparent != 1 AND idparent IN ((SELECT idmodulo FROM sys_facturacion WHERE idusuario = '$id' AND idestatus = 1))";
        $builder->where($where);
        return $builder->get()->getResult();
        
    }

    public function updatePermiso( $updatePermiso ,$idEdit,$idUser,$idUserAdmin , $valor,$tipo){

        $return = false;

        $this->db->transStart();

        $strModulo = substr($idEdit,0,4);
        if ($tipo == 1){

        

            if ($strModulo == "new_"){


                $valModulo = substr($idEdit,4);

            } else {

                $valModulo = "(SELECT idmodulo FROM sys_permisos_usuarios WHERE id = '$idEdit')";
            }


        $queryModulo = "SELECT idparent FROM sys_modulos WHERE id = $valModulo";
        

        $idParent = $this->db->query($queryModulo)->getRow();



        $queryActivos = "SELECT COUNT(*) as total FROM sys_permisos_usuarios 
                            LEFT JOIN sys_modulos ON sys_permisos_usuarios.idmodulo = sys_modulos.id
                            WHERE idparent = ".$idParent->idparent." AND permiso = 1 AND parent = 0 AND sys_permisos_usuarios.idusuario = '$idUser'";

        $count = $this->db->query($queryActivos)->getRow()->total;

        if ($strModulo == "new_"){


        $parents = $this->GetParentsByIdUpdate($idUser, $idUserAdmin);
        
        
        $clockSequence = 16383;

        foreach ($parents as $k){
            $uuid1 = Uuid::uuid1($clockSequence);
            $idPermiso = $uuid1->toString();

            if($k->idmodulo == $valModulo){
                $valPermiso = $valor;
            } else {
                $valPermiso = $k->permiso;

            }

            $queryParents = "INSERT INTO sys_permisos_usuarios (id,
                idusuario, 
                idmodulo,
                permiso) VALUES (
                '".$idPermiso."',
                '".$idUser."', 
                ".$k->idmodulo.", 
                ".$valPermiso." )";
        
            $this->db->query($queryParents);

             

        } 
           
            $configModulos = $this->SetupModulos($idPermiso,$idUser);
            
            /////
            
               

            } else {

                $this->db->table('sys_permisos_usuarios')->where('id', $idEdit)->where('idusuario', $idUser)->update($updatePermiso);

                if ($this->db->affectedRows() > 0){
                    
                    $return = true;

                    $configModulos = $this->SetupModulos($idEdit,$idUser);
                
                }
            }

        } elseif ($tipo == 2) {

            if ($strModulo == "new_"){

                $uuid = Uuid::uuid4();
                $idPermiso = $uuid->toString();
                $idEmpresa = substr($idEdit,4);

                $queryInsert = "INSERT INTO sys_empresas_usuarios (id,
                idusuario, 
                idempresa,
                permiso) VALUES (
                '".$idPermiso."',
                '".$idUser."', 
                '".$idEmpresa."', 
                ".$valor." )";
        
                $this->db->query($queryInsert);
                
                $configModulos = true;

            } else {
                $this->db->table('sys_empresas_usuarios')->where('id', $idEdit)->update($updatePermiso);
                $configModulos = true;

            }
            
        }

        $this->db->transComplete();

        if ($this->db->transStatus() === TRUE AND $configModulos);
        {
            $return = true;
        } 

        return $return; 
    }

    public function updateUsuario( $updateUsuario ,$idUser ){

        $return = false;
        $this->db->table('sys_usuarios_admin')->where('id', $idUser)->update($updateUsuario);

        if ($this->db->affectedRows() > 0){
            $return = true;
            
        } 

        return $return; 
    }

    

    

    public function createUsuario($data, $modulos , $idUserAdmin, $empresas){

        $return = false;

        $this->db->transStart();

        $uuid = Uuid::uuid4();
        $idUsuario = $uuid->toString();

        $queryUser = "INSERT INTO sys_usuarios_admin (
            id,
            nombre,
            apellido_paterno,
            email,
            password,
            rol,
            confirmacion,
            idempresa,
            activo,
            ip) VALUES (
            '".$idUsuario."',
            '".$data['firstname']['Nombre']."',
            '".$data['lastname']['apellidopaterno']."',
            '".$data['email']['email']."',
            '".$data['password']."',
            ".$data['rol'].",
            1,
            '".$data['idempresa']."',
            ".$data['activo'].",
            '".$data['ip']."')";
       
        $this->db->query($queryUser);

        $getModulos = json_decode($modulos,true);
        
        $parents = $this->GetParentsById($idUserAdmin);
        
        
        $clockSequence = 16383;

        foreach ($parents as $k){
            $uuid1 = Uuid::uuid1($clockSequence);
            $idPermiso = $uuid1->toString();
            $queryParents = "INSERT INTO sys_permisos_usuarios (id,
                idusuario, 
                idmodulo,
                permiso) VALUES (
                '".$idPermiso."',
                '".$idUsuario."', 
                ".$k->idmodulo.", 
                ".$k->permiso." )";
        
            $this->db->query($queryParents);

             

        } 
    
        foreach($getModulos as $x =>$value){
            $uuid1 = Uuid::uuid1($clockSequence);
            $idPermiso = $uuid1->toString();
            $modulo =  $value['modulo'];
            $idModulo = $this->encrypt->Decrytp($modulo);
            $val = 0;
            $queryPermisos = "INSERT INTO sys_permisos_usuarios (id,
                idusuario, 
                idmodulo,
                permiso) VALUES (
                '".$idPermiso."',
                '".$idUsuario."', 
                ".$idModulo.", 
                ".$value['val']." )";
                
            $this->db->query($queryPermisos);
 
            $queryPermisosGet = "SELECT COUNT(*) as total FROM sys_permisos_usuarios 
            LEFT JOIN sys_modulos ON sys_permisos_usuarios.idmodulo = sys_modulos.id
            WHERE sys_permisos_usuarios.permiso = 1 AND parent = 0 AND sys_modulos.idparentkey = (SELECT idparentkey FROM sys_modulos WHERE id = ".$idModulo." ) AND sys_modulos.modulo = 0 AND TRIM(sys_permisos_usuarios.idusuario) = '".$idUsuario."'" ;
            
            $count = $this->db->query($queryPermisosGet)->getRow()->total;
            
            
            if ($count == 0) {

                $val = 0; 

            } elseif ($count > 0) {
                $val = 1;

            } 
           
       

        $queryUpdatePermisos = "UPDATE sys_permisos_usuarios SET permiso = ".$val." WHERE idmodulo = (SELECT idparentkey FROM sys_modulos WHERE id = ".$idModulo.") AND TRIM(sys_permisos_usuarios.idusuario)  = '".$idUsuario."'"; 

       
         
         $this->db->query($queryUpdatePermisos);
        
            
        }

        $getEmpresas = json_decode($empresas,true);

        foreach($getEmpresas as $e =>$value){

            $uuid1 = Uuid::uuid1($clockSequence);
            $idEmpresa = $uuid1->toString();
            $empresa = $value['empresa'];
            $idEmp = $this->encrypt->Decrytp($empresa);
            $queryEmpresas = "INSERT INTO sys_empresas_usuarios (id,
                idusuario,
                idempresa, 
                permiso) VALUES (
                '".$idEmpresa."',
                '".$idUsuario."', 
                '".$idEmp."', 
                ".$value['val']." )";


        
            $this->db->query($queryEmpresas);

        }


        $this->db->transComplete();
       
        if ($this->db->transStatus() === TRUE){
            $return = true;
        } 

        return $return;


    }

    public function GetModulosUserById($id , $idUserAdmin){
        
        $query = "
                SELECT sys_permisos_usuarios.id, permiso, sys_modulos.descripcion ,sys_modulos.parent , sys_modulos.child , sys_modulos.idparent , sys_modulos.icon, idmodulo , sys_modulos.orden
                FROM sys_permisos_usuarios 
                LEFT JOIN sys_modulos ON sys_permisos_usuarios.idmodulo = sys_modulos.id 
                WHERE sys_permisos_usuarios.idusuario = '$id'  
                UNION 
                SELECT CONCAT('new_' , sys_modulos.id) AS id, 0 AS permiso, sys_modulos.descripcion ,sys_modulos.parent , sys_modulos.child , sys_modulos.idparent , sys_modulos.icon, idmodulo , sys_modulos.orden
                FROM sys_permisos_usuarios 
                LEFT JOIN sys_modulos ON sys_permisos_usuarios.idmodulo = sys_modulos.id 
                WHERE sys_permisos_usuarios.idusuario = '$idUserAdmin'  AND idmodulo NOT IN ((SELECT idmodulo FROM sys_permisos_usuarios WHERE idusuario = '$id' )) ORDER BY idparent ASC , orden ASC";
        

        return $this->db->query($query)->getResult();
        
    }

    


    public function GetModuloById($modulo){
        $builder = $this->db->table('sys_modulos');
        $builder->select('descripcion');
        $where = "id = '$modulo'";
        $builder->where($where);
        return $builder->get()->getRow();

    }

    

    private function GetParentsById($id){
        $builder = $this->db->table('sys_permisos_usuarios');
        $builder->select('sys_permisos_usuarios.idmodulo, sys_permisos_usuarios.permiso');
        $builder->join("sys_usuarios_admin","sys_permisos_usuarios.idusuario = sys_usuarios_admin.id","left");
        $builder->join("sys_modulos","sys_permisos_usuarios.idmodulo = sys_modulos.id","left");
        $builder->orderBy("idmodulo","asc");
        $where = " sys_usuarios_admin.id = '". $id ."' AND parent = 1 AND idparent != 1 ";
        $builder->where($where);
        return $builder->get()->getResult();
    
    }

    private function SetupModulos($idEdit,$idUser){

        $return = false;
        $this->db->transStart();
        $queryPermisos = "SELECT COUNT(*) as total FROM sys_permisos_usuarios 
            LEFT JOIN sys_modulos ON sys_permisos_usuarios.idmodulo = sys_modulos.id
            WHERE sys_permisos_usuarios.permiso = 1 AND parent = 0 AND sys_modulos.idparentkey = (SELECT idparentkey FROM sys_modulos WHERE id = (SELECT idmodulo from sys_permisos_usuarios WHERE id  = '" .$idEdit. "' AND idusuario = '" .$idUser. "' )) AND sys_modulos.modulo = 0 AND sys_permisos_usuarios.idusuario = '".$idUser."'";

        $count = $this->db->query($queryPermisos)->getRow()->total;


        if ($count == 0) {

           $val = 0; 


        } elseif ($count > 0) {
            $val = 1;

        }

        $queryIdParentKey = "SELECT idparentkey FROM sys_modulos WHERE id = (SELECT idmodulo from sys_permisos_usuarios SP WHERE SP.id  = '" .$idEdit. "' AND SP.idusuario = '" .$idUser. "' )";

        $idParentKey = $this->db->query($queryIdParentKey)->getRow()->idparentkey;

        $updateQueryPermisos = "UPDATE sys_permisos_usuarios SET permiso = ". $val ." WHERE idusuario = '".$idUser."' AND idmodulo = $idParentKey";

        $this->db->query($updateQueryPermisos);

        $this->db->transComplete();

        if ($this->db->transStatus() === TRUE AND ($this->db->affectedRows() > 0)){
            $return = true;
        } 

        return $return; 


    }

    

   


    

    

    public function GetEmpresaById($id){
        $builder = $this->db->table('sys_empresas');
        $builder->select("sys_empresas.id, nombre, telefonos ");
        $builder->where('sys_empresas.id', $id);
        return $builder->get()->getRow();
    }

    public function saveEmpresa( $updateEmpresa, $idEmpresa ){

        $return = false;
        $this->db->table('sys_empresas')->where('id', $idEmpresa)->update($updateEmpresa);

        if ($this->db->affectedRows() > 0){
            $return = true;
            
        } 

        return $return; 
    }

    

    

    private function GetParentsByIdUpdate($idUser,$idUserAdmin){
        
        $query = "SELECT sys_permisos_usuarios.idmodulo, sys_permisos_usuarios.permiso
                FROM sys_permisos_usuarios 
                LEFT JOIN sys_modulos ON sys_permisos_usuarios.idmodulo = sys_modulos.id 
                WHERE sys_permisos_usuarios.idusuario = '$idUserAdmin' AND idparent != 1 AND idmodulo NOT IN ((SELECT idmodulo FROM sys_permisos_usuarios WHERE idusuario = '$idUser' )) ORDER BY idmodulo ASC";
        
        return $this->db->query($query)->getResult();
        
    
    }

    

    public function getRol($idUser){
        $builder = $this->db->table('sys_usuarios_admin');
        $builder->select('rol');
        $builder->where("id",$idUser);
        return $builder->get()->getRow();
        
    }

    public function GetEmpresas($idUser){
        $builder = $this->db->table('sys_empresas');
        $builder->select('sys_empresas.id,nombre,telefonos,permiso as activo');
        $builder->join("sys_empresas_usuarios","sys_empresas_usuarios.idempresa = sys_empresas.id","left");
        $builder->where("idusuario",$idUser);
        return $builder->get()->getResult();
        
    }

    public function NewEmpresa($empresa){

        $this->db->transStart();

        $this->db->table('sys_empresas')->insert($empresa);

        $this->db->transComplete();

        if ($this->db->transStatus() === TRUE)
        {
            $return = true;
        } else {
            $return = false ;
        }

        return $return;
    }

    public function GetAllEmpresas(){
        $builder = $this->db->table('sys_empresas');
        $builder->select('id, nombre');
        $builder->orderBy("nombre","asc");
        $builder->where("activo",1);
        return $builder->get()->getResult();
        
    }

    public function GetEmpresasUserById($id , $idUserAdmin){
        
        $query = "
                SELECT sys_empresas_usuarios.id, sys_empresas_usuarios.permiso, sys_empresas.nombre
                FROM sys_empresas_usuarios 
                LEFT JOIN sys_empresas ON sys_empresas_usuarios.idempresa = sys_empresas.id 
                WHERE sys_empresas_usuarios.idusuario = '$id'  
                
                UNION 
                SELECT CONCAT('new_' , sys_empresas.id) AS id, 0 AS permiso, sys_empresas.nombre 
                FROM sys_empresas 
                WHERE sys_empresas.id  NOT IN ((SELECT idempresa FROM sys_empresas_usuarios WHERE idusuario = '$id' )) order BY nombre";
        

        return $this->db->query($query)->getResult();
        
    }


    
    

}
