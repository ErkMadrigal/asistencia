<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;

class UbicacionModel
{
    protected $db;
    private $encrypt;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;
        $this->encrypt = new Encrypt();

    }

    public function GetUbicacion(){
        $builder = $this->db->table('ubicacion');
        $builder->select('ubicacion.id, razon_social,nombre_ubicacion,ubicacion.activo');
        $builder->join("cliente","ubicacion.idCliente = cliente.id","left");
        $builder->orderBy('razon_social');
        $builder->orderBy('nombre_ubicacion');
        return $builder->get()->getResult();
        
    }

    public function GetUbicacionById($id){
        $builder = $this->db->table('ubicacion');
        $builder->select("razon_social AS idCliente,cliente.nombre_corto,nombre_ubicacion,ubicacion.activo,ubicacion.idCodigoPostal,ubicacion.calle_num,ubicacion.colonia,ubicacion.municipio,ubicacion.ciudad,ubicacion.estado, ubicacion.createddate, ubicacion.updateddate,CONCAT(UA.nombre,' ' ,UA.apellido_paterno) AS createdby,CONCAT(UU.nombre,' ' ,UU.apellido_paterno) AS updatedby");
       $builder->join("cliente","ubicacion.idCliente = cliente.id","left"); 
        
       $builder->join("sys_usuarios_admin UA","ubicacion.createdby = UA.id","left");
       $builder->join("sys_usuarios_admin UU","ubicacion.updatedby = UU.id","left");
       $builder->where('ubicacion.id', $id);
        return $builder->get()->getRow();
    }



   public function Savecliente( $ubicacion, $idUbicacion ){

        $return = false;
        $this->db->table('ubicacion')->where('id', $idUbicacion)->update($ubicacion);

        if ($this->db->affectedRows() > 0){
            $return = true;
            
        } 

        return $return; 
    }
    public function SaveUbicacion($ubicacion)
    {

        $this->db->transStart();

        $this->db->table('ubicacion')->insert($ubicacion);

        $this->db->transComplete();

        if ($this->db->transStatus() === TRUE)
        {
            $return = true;
        } else {
            $return = false ;
        }

        return $return;
    }


    public function getClientes(){
        $builder = $this->db->table('cliente');
        $builder->select('id,   razon_social');
        $builder->where("activo",true);
        $builder->orderBy("razon_social");
        return $builder->get()->getResult();
        
    }


    
    
}