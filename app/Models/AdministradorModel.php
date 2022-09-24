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
        $builder->select('sys_usuarios_admin.id, sys_usuarios_admin.nombre,apellido_paterno , email , activo ,sys_empresas.nombre AS empresa ');
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
        $where = " sys_usuarios_admin.id = '". $id ."' AND idparent != 8 AND idparent IN ((SELECT idmodulo FROM sys_facturacion WHERE idusuario = '$id' AND idestatus = 1))";
        $builder->where($where);
        return $builder->get()->getResult();
        
    }

    public function updatePermiso( $updatePermiso ,$idEdit,$idUser,$idUserAdmin , $valor){

        $return = false;

        $this->db->transStart();

        $strModulo = substr($idEdit,0,4);

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

            /////

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

        if ($valor == 1){

            if ($count == 0){

                $queryFacturacion = "UPDATE sys_facturacion SET usuariosactivos = usuariosactivos + 1 WHERE idmodulo = ".$idParent->idparent." AND idusuario = '".$idUserAdmin."'";
        
                $this->db->query($queryFacturacion);   
            }

        } else {

            $queryActivosFinal = "SELECT COUNT(*) as total FROM sys_permisos_usuarios 
                            LEFT JOIN sys_modulos ON sys_permisos_usuarios.idmodulo = sys_modulos.id
                            WHERE idparent = ".$idParent->idparent." AND permiso = 1 AND parent = 0 AND sys_permisos_usuarios.idusuario = '$idUser'";

            $countFinal = $this->db->query($queryActivosFinal)->getRow()->total;


            if ($countFinal== 0){

                $queryFacturacion = "UPDATE sys_facturacion SET usuariosactivos = usuariosactivos - 1 WHERE idmodulo = ".$idParent->idparent." AND idusuario = '".$idUserAdmin."'";
        
                $this->db->query($queryFacturacion);   
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

    

    

    public function createUsuario($data, $modulos , $idUserAdmin){

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
            idbase,
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
            ".$data['idbase'].",
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


        $moduloList = "";
        foreach($getModulos as $x =>$value){
            if ($value['val'] == 1){
                $id = $this->encrypt->Decrytp($value['modulo']);
                $moduloList.= "'".$id."'";
            }
        }

        $modulosIn = str_replace("''","','",$moduloList);

        $queryModulo = "SELECT DISTINCT idparent FROM sys_modulos WHERE id IN ($modulosIn)";
        
        $licencias = $this->db->query($queryModulo)->getResult();

        foreach($licencias as $x ){
            
            $queryFacturacion = "UPDATE sys_facturacion SET usuariosactivos = usuariosactivos + 1 WHERE idmodulo = ".$x->idparent." AND idusuario = '".$idUserAdmin."'";
        
            $this->db->query($queryFacturacion);    

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
                WHERE sys_permisos_usuarios.idusuario = '$id' AND idparent != 8 AND idparent IN ((SELECT idmodulo FROM sys_facturacion WHERE idusuario = '$idUserAdmin' AND idestatus = 1)) 
                UNION 
                SELECT CONCAT('new_' , sys_modulos.id) AS id, 0 AS permiso, sys_modulos.descripcion ,sys_modulos.parent , sys_modulos.child , sys_modulos.idparent , sys_modulos.icon, idmodulo , sys_modulos.orden
                FROM sys_permisos_usuarios 
                LEFT JOIN sys_modulos ON sys_permisos_usuarios.idmodulo = sys_modulos.id 
                WHERE sys_permisos_usuarios.idusuario = '$idUserAdmin' AND idparent != 8 AND idmodulo NOT IN ((SELECT idmodulo FROM sys_permisos_usuarios WHERE idusuario = '$id' )) ORDER BY idparent ASC , orden ASC";
        

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
        $where = " sys_usuarios_admin.id = '". $id ."' AND parent = 1 AND idparent != 8 AND idparent IN ((SELECT idmodulo FROM sys_facturacion WHERE idusuario = '$id'  AND idestatus = 1))";
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
                WHERE sys_permisos_usuarios.idusuario = '$idUserAdmin' AND idparent != 8 AND idmodulo NOT IN ((SELECT idmodulo FROM sys_permisos_usuarios WHERE idusuario = '$idUser' )) ORDER BY idmodulo ASC";
        
        return $this->db->query($query)->getResult();
        
    
    }

    

    public function getRol($idUser){
        $builder = $this->db->table('sys_usuarios_admin');
        $builder->select('rol');
        $builder->where("id",$idUser);
        return $builder->get()->getRow();
        
    }


    
    

}
