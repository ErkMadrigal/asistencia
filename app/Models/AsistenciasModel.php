<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;


class AsistenciasModel extends Model
{
    protected $table = 'asistencias';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_estudiante', 'id_docente', 'ingreso'
    ];
    protected $db;
    private $encrypt;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;
        $this->encrypt = new Encrypt();

    }

    public function GetAllAsistencias(){
        $builder = $this->db->table('asistencias a');
        $builder->select("concat(e.nombres,' ',e.paterno,' ',e.materno) nombre_estudiante, e.curp, d.nombre_completo, a.ingreso ");
        $builder->join("estudiantes e","e.id = a.id_estudiante","left");
        $builder->join("docentes d","d.id = a.id_docente","left");
        return $builder->get()->getResult();
    }


    public function GetAsistenciasDate($data){
        $builder = $this->db->table('asistencias');
        $builder->select("concat(estudiantes.nombres,' ',estudiantes.paterno,' ',estudiantes.materno) nombre_estudiante, estudiantes.curp, docentes.nombre_completo, asistencias.ingreso");
        $builder->join("estudiantes","estudiantes.id = asistencias.id_estudiante","left");
        $builder->join("docentes","docentes.id = asistencias.id_docente","left");
        
        $builder->like('estudiantes.curp', $data);
        

        return $builder->get()->getResult();
    }
 

    public function setAsistencias($insert){
        $this->db->transStart();
        $return = false;
        $this->db->table('asistencias')->insert($insert);

        // if ($this->db->affectedRows() > 0){
        if ($this->db->transStatus()){
            $return = true;
        } 
        $this->db->transComplete();
        return $return; 
    }


}
