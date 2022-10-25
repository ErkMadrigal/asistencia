<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;

class CataEstados
{

    protected $db;
    private $encrypt;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;
        $this->encrypt = new Encrypt();

    }

    public function GetEstados(){
        $builder = $this->db->table('estados');
        return $builder->get()->getResult();
    }

    public function GetDatos( $where ){
        $builder = $this->db->table('estados est');
        $builder->select('estd.id, est.estado, est.capital, estd.descripcion, estd.activo');
        $builder->join(" estados_detalles estd", "est.claveEstado = estd.claveEstado");
        if(!empty($where["capital"])){
            $builder->where('capital', $where["capital"]);
        }
        if(!empty($where["estado"])){
            $builder->where('estado', $where["estado"]);
        }

        return $builder->get()->getResult(); 
    }

     public function GetDatosEstado( $where ){
        $builder = $this->db->table('estados');
        $builder->select('claveEstado, claveCapital, capital');
        $builder->where('estado', $where);

        return $builder->get()->getResult(); 
    }

    public function GetEstadoById($id){
        $builder = $this->db->table('estados est');
        $builder->select("estd.id, est.claveEstado, est.estado, est.claveCapital, est.capital, estd.claveMunicipio, estd.descripcion municipio, estd.activo, est.createddate, est.updateddate,CONCAT(UA.nombre,' ' ,UA.apellido_paterno) AS createdby,CONCAT(UU.nombre,' ' ,UU.apellido_paterno) AS updatedby");
        $builder->join("estados_detalles estd", "est.claveEstado = estd.claveEstado");
        $builder->join("sys_usuarios_admin UA","estd.createdby = UA.id","left");
        $builder->join("sys_usuarios_admin UU","estd.updatedby = UU.id","left");
        $builder->orderBy("estd.id","desc");
        $builder->where('estd.id', $id);
        return $builder->get()->getRow();
    }

    public function updateMunicipio( $update ,$id ){

        $return = false;
        $this->db->table('estados_detalles')->where('id', $id)->update($update);

        if ($this->db->affectedRows() > 0){
            $return = true;
            
        } 

        return $return; 
    }
    
    public function addEstado($insert){

        $return = false;
        $this->db->table('estados_detalles')->insert($insert);

        if ($this->db->affectedRows() > 0){
            $return = true;
        } 

        return $return; 
    }

}