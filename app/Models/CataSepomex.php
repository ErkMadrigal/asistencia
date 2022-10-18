<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;

class CataSepomex
{

    protected $db;
    private $encrypt;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;
        $this->encrypt = new Encrypt();

    }

    public function GetSepomex(){
        $builder = $this->db->table('sepomex');
        $builder->select('id, codigoPostal, asentamiento, municipio, ciudad, estado, activo');
        $builder->limit(1000);
        return $builder->get()->getResult();
        
    }

    public function GetSepomexEstados(){
        $builder = $this->db->table('sepomex');
        $builder->select('estado');
        $builder->groupBy("estado");
        return $builder->get()->getResult();
        
    }

    public function GetSepomexCiudad($estado){
        $builder = $this->db->table('sepomex');
        $builder->select('ciudad');
        $builder->where('estado', $estado);
        $builder->groupBy("ciudad");

        return $builder->get()->getResult(); 
    }

    public function GetSepomexMunicipio($estado){
        $builder = $this->db->table('sepomex');
        $builder->select('municipio');
        $builder->where('estado', $estado);
        $builder->groupBy("municipio");

        return $builder->get()->getResult(); 
    }

    public function GetSepomexById($id){
        $builder = $this->db->table('sepomex s');
        $builder->select("s.id, s.activo, s.codigoPostal, s.asentamiento, s.municipio, s.ciudad, s.estado, s.createddate, s.updateddate,CONCAT(UA.nombre,' ' ,UA.apellido_paterno) AS createdby,CONCAT(UU.nombre,' ' ,UU.apellido_paterno) AS updatedby");
        $builder->join("sys_usuarios_admin UA","s.createdby = UA.id","left");
        $builder->join("sys_usuarios_admin UU","s.updatedby = UU.id","left");
        $builder->orderBy("s.id","desc");
        $builder->where('s.id', $id);
        return $builder->get()->getRow();
    }


    public function updateSepomex( $updateSep ,$idSep ){

        $return = false;
        $this->db->table('sepomex')->where('id', $idSep)->update($updateSep);

        if ($this->db->affectedRows() > 0){
            $return = true;
            
        } 

        return $return; 
    }

    public function addSepomex($insertSep){

        $return = false;
        $this->db->table('sepomex')->insert($insertSep);

        if ($this->db->affectedRows() > 0){
            $return = true;
        } 

        return $return; 
    }

}