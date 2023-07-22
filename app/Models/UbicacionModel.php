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

    public function GetUbicacion($idCliente){
        $builder = $this->db->table('ubicacion');
        $builder->select('ubicacion.id, razon_social,nombre_ubicacion,ubicacion.activo');
        $builder->join("cliente","ubicacion.idCliente = cliente.id","left");
        $builder->where('idCliente', $idCliente );
        $builder->orderBy('nombre_ubicacion');
        $builder->orderBy('nombre_ubicacion');
        return $builder->get()->getResult();
        
    }

    public function GetUbicacionById($id){
        $builder = $this->db->table('ubicacion');
        $builder->select("cliente.id, razon_social AS idCliente,cliente.nombre_corto,nombre_ubicacion,idRegion,idZona,latitud,longitud,ubicacion.activo,ubicacion.idCodigoPostal,ubicacion.calle_num,ubicacion.colonia,ubicacion.municipio,ubicacion.ciudad,ubicacion.estado, ubicacion.createddate, ubicacion.updateddate,CONCAT(UA.nombre,' ' ,UA.apellido_paterno) AS createdby,CONCAT(UU.nombre,' ' ,UU.apellido_paterno) AS updatedby");
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

    public function getCliente($idCliente){
        $builder = $this->db->table('cliente');
        $builder->select('id,razon_social');
        $builder->where("id",$idCliente);
        return $builder->get()->getRow();
        
    }

    public function GetZona($idEmpresa){
        $builder = $this->db->table('catalogos_detalle');
        $builder->select('catalogos_detalle.id,valor');
        $builder->where('idCatalogo', 'e6a13ff6-c2c1-4c28-904b-6357852c37b2' );
        $builder->where('activo', 1 );
        $builder->where('idEmpresa', $idEmpresa );
        $builder->orderBy('valor');
        
        return $builder->get()->getResult();
        
    }

    public function GetRegion($idEmpresa){
        $builder = $this->db->table('catalogos_detalle');
        $builder->select('catalogos_detalle.id,valor');
        $builder->where('idCatalogo', '617200c2-6157-489f-96bc-bf2a6cb8da8c' );
        $builder->where('activo', 1 );
        $builder->where('idEmpresa', $idEmpresa );
        $builder->orderBy('valor');
        
        return $builder->get()->getResult();
        
    }


    
    
}