<?php namespace App\Models;

use CodeIgniter\Model;

class recuperaCuentaModel extends Model{
	

    public function cambioPassword($data,$token){

        $return = true;
        $password = password_hash($data['pass'], PASSWORD_DEFAULT);
        

        $data = array (
            'password' => $password );
            $this->db->table('SuitePrisma.sys_usuarios_admin')->where('token', $token)->update($data);
        
        if ($this->db->affectedRows() == 0){

            $return = false;
        }     


        return $return; 


    }

    public function GetUsuarioByToken($token){
        $builder = $this->db->table('SuitePrisma.sys_usuarios_admin');
        $builder->select("nombre,email");
        $builder->where('token', $token);
        
        $data = $builder->get()->getResult();

        $this->limpiaToken($token);


        return $data;
    }


    private function limpiaToken($token){

        $data = array (
            'token' => '' );
            $this->db->table('SuitePrisma.sys_usuarios_admin')->where('token', $token)->update($data);

    }

}