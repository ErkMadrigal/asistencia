<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{
	
	protected $table = 'sys_usuarios_admin';
	protected $allowedFields = ['nombre', 'apellido_paterno', 'email', 'password', 'updated_at' , 'rol', 'idbase','token'];
	protected $beforeInsert = ['beforeInsert'];
	protected $beforeUpdate = ['beforeUpdate'];


	public function getModulos($id)
    {
        
        $queryModulos = "SELECT sys_modulos.id AS idmodulo, sys_modulos.descripcion , parent , child , idparent, icon , url,business,sys_permisos_usuarios.permiso FROM sys_permisos_usuarios 
            LEFT JOIN sys_modulos ON sys_permisos_usuarios.idmodulo = sys_modulos.id 
            LEFT JOIN sys_usuarios_admin ON sys_permisos_usuarios.idusuario = sys_usuarios_admin.id
            WHERE sys_permisos_usuarios.idusuario = '$id' AND sys_permisos_usuarios.permiso = 1
            ORDER BY idparent ASC , sys_modulos.orden ASC ";
        
       

        return $this->db->query($queryModulos)->getResult();
    }

    public function recuperacion($data){

        $return = false ;
        $this->db->transStart();


         $token = md5(time() + 55);
         $getData = ["token"=>$token];   
         $email = $data['email'];
         $data = array (
            'token' => $token );
            $this->db->table('sys_usuarios_admin')->where('email', $email)->update($getData);

        $user = $this->GetUsuarioWhitToken($token);    

        $this->db->transComplete();
         

        if ($this->db->transStatus() === TRUE)
        {
            $return = $user;
        } 

        return $return;


    }

    protected function GetUsuarioWhitToken($token){
        $builder = $this->db->table('sys_usuarios_admin');
        $builder->select("nombre,email,token");
        $builder->where('token', $token);
        
        return $builder->get()->getResult();
    }

    // public function user($email)
    // {
        
    //     $builder = $this->db->table('Users');
    //     $builder->select('password');
    //     $builder->where("email",$email);
    //     return $builder->get()->getRow();
    // }

    // public function userById($email)
    // {
        
    //     $builder = $this->db->table('Users');
    //     $builder->select('firstname AS nombre,lastname AS apellido_paterno,email,IdUser AS id,rol,sys_bases.nombre as idbase,idempresa');
    //     $builder->join('sys_bases','Users.idbase = sys_bases.id','left');
    //     $builder->where('email',$email);
    //     return $builder->get()->getRow();
    // }

     /*public function getModulosUser($id)
     {
        
         $builder = $this->db->table('sys_usuarios_admin');
         $builder->select("descripcion , parent , child , idparent, url, icon");
         $builder->join("sys_permisos_usuarios","sys_usuarios_admin.id = sys_permisos_usuarios.idusuario","left");
         $builder->join("sys_modulos","sys_permisos_usuarios.idmodulo = sys_modulos.id","left");
         $builder->where("sys_permisos_usuarios.permiso","1");
         $builder->where("sys_usuarios_admin.id",$id);
         $builder->orderBy("idparent","ASC");
         $builder->orderBy("orden","ASC");
        
         return $builder->get()->getResult();
     } */ 
	

}