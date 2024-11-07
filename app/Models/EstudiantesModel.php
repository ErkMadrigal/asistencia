<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;


class EstudiantesModel extends Model
{
    protected $table = 'estudiantes';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_escuela', 'nombre', 'paterno', 'materno', 'curp', 'matricula', 'activo'
    ];
    protected $db;
    private $encrypt;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;
        $this->encrypt = new Encrypt();

    }

    public function GetAllEstudents(){
        $builder = $this->db->table('estudiantes');
        $builder->select("*");
        return $builder->get()->getResult();
    }

    public function GetEstudents($id){
        $builder = $this->db->table('estudiantes');
        $builder->select("*");
        $builder->where("id", $id);

        return $builder->get()->getRow();
    }

    public function setEstudents($insert){
        $this->db->transStart();
        $return = false;
        $this->db->table('estudiantes')->insert($insert);

        // if ($this->db->affectedRows() > 0){
        if ($this->db->transStatus()){
            $return = true;
        } 
        $this->db->transComplete();
        return $return; 
    }


    public function updateEstudents( $update ,$id){

        $return = false;
        $this->db->table('estudiantes')->where('id', $id)->update($update);

        if ($this->db->affectedRows() > 0){
            $return = true;
            
        } 

        return $return; 
    }

    public function GetContacts($id){
        $builder = $this->db->table('contactos');
        $builder->select("*");
        $builder->where("id_estudiante", $id);

        return $builder->get()->getResult();
    }

    public function GetContact($id){
        $builder = $this->db->table('contactos');
        $builder->select("*");
        $builder->where("id", $id);

        return $builder->get()->getRow();
    }

    public function updateContacts( $update ,$id){

        $return = false;
        $this->db->table('contactos')->where('id', $id)->update($update);

        if ($this->db->affectedRows() > 0){
            $return = true;
            
        } 

        return $return; 
    }

    public function setContacts($insert){
        $this->db->transStart();
        $return = false;
        $this->db->table('contactos')->insert($insert);

        // if ($this->db->affectedRows() > 0){
        if ($this->db->transStatus()){
            $return = true;
        } 
        $this->db->transComplete();
        return $return; 
    }


}
