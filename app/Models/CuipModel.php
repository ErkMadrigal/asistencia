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
        $builder = $this->db->table('datos_personales');
        $builder->select('id,primer_nombre,segundo_nombre,apellido_paterno,apellido_materno');
        $builder->orderBy("primer_nombre","asc");
        $builder->orderBy("apellido_paterno","asc");
        return $builder->get()->getResult();
        
    }

    public function GetCatalogoCuip($idCatalogo){
        $builder = $this->db->table('catalogos_detalle');
        $builder->select('id, valor');
        $builder->where("activo",true);
        $builder->where("idCatalogo",$idCatalogo);
        $builder->orderBy("valor","asc");
        return $builder->get()->getResult();
        
    }


    public function insertDatosPersonales($data){
        $this->db->transStart();

        $this->db->table('datos_personales')->insert($data);

        $this->db->transComplete();

        if ($this->db->transStatus() === TRUE)
        {
            $return = true;
        } else {
            $return = false ;
        }

        return $return; 
    }

    public function GetEstados(){
        $builder = $this->db->table("sepomex");
        $builder->select("estado");
        $builder->where("activo",true);
        $builder->groupBy("estado");
        $builder->orderBy("estado","asc");
        return $builder->get()->getResult();
        
    }

    public function getMunicipios($estado){
        $builder = $this->db->table("sepomex");
        $builder->select("municipio");
        $builder->where("activo",true);
        $builder->where("estado",$estado);
        $builder->groupBy("municipio");
        $builder->orderBy("municipio","asc");
        return $builder->get()->getResult();
        
    }

    public function getSepomexByCp($cp){
        $builder = $this->db->table("sepomex");
        $builder->select("municipio,ciudad,estado,asentamiento");
        $builder->where("activo",true);
        $builder->where("codigoPostal",$cp);
        $builder->orderBy("asentamiento","asc");
        return $builder->get()->getResult();
        
    }

    public function getCiudades($estado){
        $builder = $this->db->table("sepomex");
        $builder->select("ciudad");
        $builder->where("activo",true);
        $builder->where("estado",$estado);
        $builder->groupBy("ciudad");
        $builder->orderBy("ciudad","asc");
        return $builder->get()->getResult();
        
    }

    public function insertSocioEconomico($data){
        $this->db->transStart();

        $this->db->table('estudio_socioeconomico')->insert($data);

        $this->db->transComplete();

        if ($this->db->transStatus() === TRUE)
        {
            $return = true;
        } else {
            $return = false ;
        }

        return $return; 
    }

    public function insertEmpleosSeguridad($data){
        $this->db->transStart();

        $this->db->table('empleos_seg_publica')->insert($data);

        $this->db->transComplete();

        if ($this->db->transStatus() === TRUE)
        {
            $return = true;
        } else {
            $return = false ;
        }

        return $return; 
    }


    public function insertSancionesEstimulos($data){
        $this->db->transStart();

        $this->db->table('sanciones')->insert($data);

        $this->db->transComplete();

        if ($this->db->transStatus() === TRUE)
        {
            $return = true;
        } else {
            $return = false ;
        }

        return $return; 
    }


    public function insertCapacitaciones($data){
        $this->db->transStart();

        $this->db->table('capacitaciones')->insert($data);

        $this->db->transComplete();

        if ($this->db->transStatus() === TRUE)
        {
            $return = true;
        } else {
            $return = false ;
        }

        return $return; 
    }


    public function insertEmpDiversos($data){
        $this->db->transStart();

        $this->db->table('empleos_diversos')->insert($data);

        $this->db->transComplete();

        if ($this->db->transStatus() === TRUE)
        {
            $return = true;
        } else {
            $return = false ;
        }

        return $return; 
    }


    public function GetDatosPersonalesById($id){
        $builder = $this->db->table('datos_personales');
        $builder->select("'' AS institucion,'' AS dependencia,CONCAT(UA.nombre,' ' ,UA.apellido_paterno) AS createdby,CONCAT(UU.nombre,' ' ,UU.apellido_paterno) AS updatedby");
       $builder->join("sys_usuarios_admin UA","datos_personales.createdby = UA.id","left");
       $builder->join("sys_usuarios_admin UU","datos_personales.updatedby = UU.id","left");
       $builder->where('datos_personales.id', $id);
        return $builder->get()->getRow();
    }
}
