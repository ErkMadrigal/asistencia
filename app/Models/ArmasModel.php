<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;

class ArmasModel
{
    protected $db;
    private $encrypt;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;
        $this->encrypt = new Encrypt();

    }

    public function GetArmas($idEmpresa){
        $builder = $this->db->table('armas');
        $builder->select('armas.id, armas.matricula, armas.folio_manif,armas.activo, armas.idClase');
        $builder->join("clase"," clase.id = armas.idClase","left");
        $builder->orderBy("matricula","asc");
        $builder->where("armas.idempresa",$idEmpresa);
        return $builder->get()->getResult();
        
    }

    public function GetArmaById($id){
        $builder = $this->db->table('armas');
        $builder->select("armas.matricula, armas.folio_manif,armas.activo,armas.idClase,armas.idCalibre,armas.idMarca,armas.idModelo,armas.idModalidad, armas.createddate, armas.updateddate,CONCAT(UA.nombre,' ' ,UA.apellido_paterno) AS createdby,CONCAT(UU.nombre,' ' ,UU.apellido_paterno) AS updatedby");
        $builder->join("clase"," armas.idClase= clase.id  ","left");
        $builder->join("calibre","armas.idCalibre = calibre.id","left");
        $builder->join("marca"," armas.idMarca= marca.id  ","left");
        $builder->join("modelo","armas.idModelo = modelo.id","left");
        $builder->join("modalidad","armas.idModalidad = modalidad.id","left");
       $builder->join("sys_usuarios_admin UA","armas.createdby = UA.id","left");
       $builder->join("sys_usuarios_admin UU","armas.updatedby = UU.id","left");
       $builder->orderBy("matricula","asc");
       $builder->where('armas.id', $id);
        return $builder->get()->getRow();
    }

    
    public function GetClase($idEmpresa){
        $builder = $this->db->table('clase');
        $builder->select('id, valor');
        $builder->where("activo",true);
        $builder->where("idEmpresa",$idEmpresa);
        $builder->orderBy("valor","asc");
        return $builder->get()->getResult();
        
    }

    public function GetCalibre($idEmpresa){
        $builder = $this->db->table('calibre');
        $builder->select('id, valor');
        $builder->where("activo",true);
        $builder->where("idEmpresa",$idEmpresa);
        $builder->orderBy("valor","asc");
        return $builder->get()->getResult();
        
    }

    public function GetMarca($idEmpresa){
        $builder = $this->db->table('marca');
        $builder->select('id, valor');
        $builder->where("activo",true);
        $builder->where("idEmpresa",$idEmpresa);
        $builder->orderBy("valor","asc");
        return $builder->get()->getResult();
        
    }

    public function GetModelo($idEmpresa){
        $builder = $this->db->table('modelo');
        $builder->select('id, valor');
        $builder->where("activo",true);
        $builder->where("idEmpresa",$idEmpresa);
        $builder->orderBy("valor","asc");
        return $builder->get()->getResult();
        
    }

    public function GetModalidad($idEmpresa){
        $builder = $this->db->table('modalidad');
        $builder->select('id, valor');
        $builder->where("activo",true);
        $builder->where("idEmpresa",$idEmpresa);
        $builder->orderBy("valor","asc");
        return $builder->get()->getResult();
        
    }


    public function saveArma( $updateEmpresa, $idCatalogo ){

        $return = false;
        $this->db->table('armas')->where('id', $idCatalogo)->update($updateEmpresa);

        if ($this->db->affectedRows() > 0){
            $return = true;
            
        } 

        return $return; 
    }

}