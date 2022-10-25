<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;

class CargaModel
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

    public function GetCatalogoCuip($idCatalogo){
        $builder = $this->db->table('catalogos_detalle');
        $builder->select('idCatalogo, valor');
        $builder->where("activo",true);
        $builder->where("idCatalogo",$idCatalogo);
        $builder->orderBy("valor","asc");
        return $builder->get()->getResult();
        
    }


    public function insertExpDoc($data,$idPersonal,$idDocExp){
        $this->db->transStart();

        $this->db->table('documentos')->where('idPersonal', $idPersonal)->where('idDocExp', $idDocExp)->delete();

        $this->db->table('documentos')->insert($data);

        $this->db->transComplete();

        if ($this->db->transStatus() === TRUE)
        {
            $return = true;
        } else {
            $return = false ;
        }

        return $return; 
    }


    public function FileIni($id){
        $builder = $this->db->table('documentos');
        $builder->select('ruta,nombre_almacen,extension_documento');
        $builder->where("idDocumento",$id);
        return $builder->get()->getRow();
        
    }

    public function deleteDocumento($id){


        $return = false;
        $this->db->table('documentos')->where('idDocumento', $id)->delete();


        if ($this->db->affectedRows() > 0){
            $return = true;
            
        } 

        return $return; 
    }
}
