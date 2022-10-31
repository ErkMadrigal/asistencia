<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;

class PuestoModel
{
    protected $db;
    private $encrypt;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;
        $this->encrypt = new Encrypt();

    }

    public function GetPuesto(){
        $builder = $this->db->table('puestos');
        $builder->select('puestos.id, ,razon_social,nombre_ubicacion,puestos.activo,puestos.puesto,catalogos_detalle.valor AS turnos');
        $builder->join("cliente","puestos.idCliente = cliente.id","left");
        $builder->join("ubicacion","puestos.idUbicacion = ubicacion.id","left");

        $builder->join("turnos","puestos.idTurno = turnos.id","left");    
        $builder->join("catalogos_detalle","turnos.idTurnos = catalogos_detalle.id","left");
        $builder->orderBy("puestos.puesto");
        return $builder->get()->getResult();
        
    }

    public function GetPuestoById($id){
        $builder = $this->db->table('puestos');
        $builder->select("idCliente,idUbicacion,idTurno,puesto,puestos.activo, puestos.createddate, puestos.updateddate,CONCAT(UA.nombre,' ' ,UA.apellido_paterno) AS createdby,CONCAT(UU.nombre,' ' ,UU.apellido_paterno) AS updatedby");
        $builder->join("sys_usuarios_admin UA","puestos.createdby = UA.id","left");
       $builder->join("sys_usuarios_admin UU","puestos.updatedby = UU.id","left");
       $builder->orderBy("idCliente","asc");
       $builder->where('puestos.id', $id);
        return $builder->get()->getRow();
    }



   public function Savecliente( $updateEmpresa, $idCatalogo ){

        $return = false;
        $this->db->table('cliente')->where('id')->update($updateEmpresa);

        if ($this->db->affectedRows() > 0){
            $return = true;
            
        } 

        return $return; 
    }
    public function SavePuesto($puesto)
    {

        $this->db->transStart();

        $this->db->table('puestos')->insert($puesto);

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



    public function getTurnos($idUbicacion){
        $builder = $this->db->table('turnos');
        $builder->select('turnos.id,catalogos_detalle.valor AS turno');
        $builder->where("turnos.activo",true);
        $builder->where("idUbicacion",$idUbicacion);
        $builder->join("catalogos_detalle","turnos.idTurnos = catalogos_detalle.id","left");
        $builder->orderBy("turno");
        return $builder->get()->getResult();
        
    }


    
    
}