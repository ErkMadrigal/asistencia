<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;


class LoginModel extends Model
{
    protected $table = 'docentes';  // Tabla donde están los usuarios
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre_compeldo','matricula', 'password', 'activo', 'rol'];
    protected $db;
    private $encrypt;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;
        $this->encrypt = new Encrypt();

    }

    public function getUserByMatricula($matricula){
        $builder = $this->db->table('docentes');
        $builder->select("*");
        $builder->where("activo", 1);
        $builder->where("matricula", $matricula);

        $result = $builder->get()->getRow();

        if (!$result) {
            log_message('debug', 'No se encontró usuario con matrícula: ' . $matricula);
            return null; // O devolver un mensaje más claro si no se encuentra el usuario
        }
    
        return $result;
    }

}
