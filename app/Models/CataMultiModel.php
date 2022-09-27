<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;

class CataMultiModel
{

    protected $db;
    private $encrypt;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;
        $this->encrypt = new Encrypt();

    }

    public function GetMulti($idEmpresa){
        $builder = $this->db->table('catalogos_detalle');
        $builder->select('catalogos_detalle.id,catalogos.valor as tipo_combo, catalogos_detalle.valor,activo');
        $builder->join("catalogos","catalogos_detalle.idCatalogo = catalogos.idCatalogo","left");
        $builder->orderBy("valor","asc");
        $builder->where("idempresa",$idEmpresa);
        return $builder->get()->getResult();
        
    }

    public function GetMultiById($id){
        $builder = $this->db->table('catalogos_detalle');
        $builder->select("catalogos.valor as tipo_combo, catalogos_detalle.valor,catalogos_detalle.activo, catalogos_detalle.createddate, catalogos_detalle.updateddate,CONCAT(UA.nombre,' ' ,UA.apellido_paterno) AS createdby,CONCAT(UU.nombre,' ' ,UU.apellido_paterno) AS updatedby");
        $builder->join("catalogos","catalogos_detalle.idCatalogo = catalogos.idCatalogo","left");
       $builder->join("sys_usuarios_admin UA","catalogos_detalle.createdby = UA.id","left");
       $builder->join("sys_usuarios_admin UU","catalogos_detalle.updatedby = UU.id","left");
       $builder->orderBy("valor","asc");
       $builder->where('catalogos_detalle.id', $id);
        return $builder->get()->getRow();
    }

    public function GetuserById($id){
        $builder = $this->db->table('sys_usuarios_admin');
        $builder->select('sys_usuarios_admin.id, sys_usuarios_admin.nombre,apellido_paterno , email , activo ,sys_empresas.nombre AS empresa ');
        $builder->join("sys_empresas","sys_usuarios_admin.idempresa = sys_empresas.id","left");
        $builder->orderBy("nombre","asc");
        $builder->where("sys_usuarios_admin.id",$id);
        return $builder->get()->getRow();
        
    }

    public function saveMulti( $updateEmpresa, $idCatalogo ){

        $return = false;
        $this->db->table('catalogos_detalle')->where('id', $idCatalogo)->update($updateEmpresa);

        if ($this->db->affectedRows() > 0){
            $return = true;
            
        } 

        return $return; 
    }
}