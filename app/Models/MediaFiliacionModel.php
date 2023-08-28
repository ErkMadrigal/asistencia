<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;

class MediaFiliacionModel
{
    protected $db;
    private $encrypt;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;
        $this->encrypt = new Encrypt();

    }

    public function insertMediaFiliacion($data){
        $this->db->transStart();

        $this->db->table('media_filiacion')->insert($data);

        $this->db->transComplete();

        if ($this->db->transStatus() === TRUE)
        {
            $return = true;
        } else {
            $return = false ;
        }

        return $return; 
    }


    public function GetCatalogoCuip($idCatalogo){
        $builder = $this->db->table('catalogos_detalle');
        $builder->select('id, valor');
        $builder->where("activo",true);
        $builder->where("idCatalogo",$idCatalogo);
        $builder->orderBy("valor","asc");
        return $builder->get()->getResult();
        
    }



    public function GetFotos($idPersonal){
        
        $query = "SELECT COUNT(idPersonal) AS count FROM documentos WHERE idPersonal = '$idPersonal' AND idDocExp IN ('cf82912d-8f84-4e79-afb2-e60622ff72c5','d2282fcc-76ba-410e-828b-2fe365e874ff','d9289eb1-c76d-4945-9f59-4618b146dabe') ";

        $result = $this->db->query($query)->getRow();

        return $result ;
        
    }


    public function GetFotoById($id){
        $builder = $this->db->table('documentos');
        $builder->select('idDocumento');
        $builder->where("idPersonal",$id);
        $builder->where("idDocExp", "d2282fcc-76ba-410e-828b-2fe365e874ff");
        return $builder->get()->getRow();
        
    }

    public function GetFotoIzqById($id){
        $builder = $this->db->table('documentos');
        $builder->select('idDocumento');
        $builder->where("idPersonal",$id);
        $builder->where("idDocExp", "d9289eb1-c76d-4945-9f59-4618b146dabe");
        return $builder->get()->getRow();
        
    }

    public function GetFotoDerById($id){
        $builder = $this->db->table('documentos');
        $builder->select('idDocumento');
        $builder->where("idPersonal",$id);
        $builder->where("idDocExp", "cf82912d-8f84-4e79-afb2-e60622ff72c5");
        return $builder->get()->getRow();
        
    }


    public function updateMediaFiliacion($data,$idPersonal,$id){
        $this->db->transStart();

        $this->db->table('media_filiacion')->where('idPersonal',$idPersonal)->where('id',$id)->update($data);

        $this->db->transComplete();

        if ($this->db->transStatus() === TRUE)
        {
            $return = true;
        } else {
            $return = false ;
        }

        return $return; 
    }


    
}
