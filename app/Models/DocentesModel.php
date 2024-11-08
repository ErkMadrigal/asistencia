<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;


class DocentesModel extends Model
{
    protected $table = 'docentes';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nombre_completo', 'matricula', 'password', 'activo', 'rol'
    ];
    protected $db;
    private $encrypt;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;
        $this->encrypt = new Encrypt();

    }

    public function GetAllDocents(){
        $builder = $this->db->table('docentes d');
        $builder->select("d.id, d.nombre_completo, d.matricula, d.activo, r.rol");
        $builder->join("roles r","r.id = d.rol","left");
        return $builder->get()->getResult();
    }

    public function GetDocents($id){
        $builder = $this->db->table('docentes');
        $builder->select("id, nombre_completo, matricula");
        $builder->where("id", $id);

        return $builder->get()->getRow();
    }

    public function setDocents($insert){
        $this->db->transStart();
        $return = false;
        $this->db->table('docentes')->insert($insert);

        // if ($this->db->affectedRows() > 0){
        if ($this->db->transStatus()){
            $return = true;
        } 
        $this->db->transComplete();
        return $return; 
    }


    public function updateDocents( $update ,$id){

        $return = false;
        $this->db->table('docentes')->where('id', $id)->update($update);

        if ($this->db->affectedRows() > 0){
            $return = true;
            
        } 

        return $return; 
    }



}
