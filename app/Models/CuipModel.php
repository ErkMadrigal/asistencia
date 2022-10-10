<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;

class CuipModel
{
    protected $db;
    private $encrypt;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;
        $this->encrypt = new Encrypt();

    }

    public function GetCuip($idEmpresa){
        $builder = $this->db->table('armas');
        $builder->select('armas.id, armas.matricula, armas.folio_manif,armas.activo, armas.idClase');
        //$builder->join("clase"," clase.id = armas.idClase","left");
        $builder->orderBy("matricula","asc");
        $builder->where("armas.idempresa",$idEmpresa);
        return $builder->get()->getResult();
        
    }

    public function GetComplexion(){
        $builder = $this->db->table('catalogos_detalle');
        $builder->select('idCatalogo, valor');
        $builder->where("activo",true);
        $builder->where("idCatalogo",'98206a2f-1f1a-46a3-a266-3b0d537ee42f');
        $builder->orderBy("valor","asc");
        return $builder->get()->getResult();
        
    }
}
