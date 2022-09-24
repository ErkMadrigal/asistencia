<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class ConfirmaCuentaModel
{

    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;

    }

    public function ConfirmarCuenta($token){

        $this->db->transStart();

        $return = 0;


        $data = array (
            'confirmacion' => 1 );
        $this->db->table('sys_usuarios_admin')->where('token', $token)->update($data);
        
        $update =  $this->db->affectedRows();

        $this->db->transComplete();
         

        if ($this->db->transStatus() === TRUE)
        {
            $return = $update;
        }

        return $return;
    }

    public function validaCuenta($token)
    {
        

        $query = "SELECT id FROM sys_usuarios_admin  WHERE token = '$token' AND confirmacion = 1";
        $result = $this->db->query($query)->getResult();


        if (!empty($result)){
            return true;
           
        } else {
           
            return false;

        }

    }


}
