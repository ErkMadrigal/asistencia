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

    public function GetPuesto($idCliente){
        $builder = $this->db->table('puestos');
        $builder->select('puestos.id, ,razon_social,nombre_ubicacion,puestos.activo,puestos.puesto,catalogos_detalle.valor AS turnos');
        $builder->join("cliente","puestos.idCliente = cliente.id","left");
        $builder->join("ubicacion","puestos.idUbicacion = ubicacion.id","left");

        $builder->join("turnos","puestos.idTurno = turnos.id","left");    
        $builder->join("catalogos_detalle","turnos.idTurnos = catalogos_detalle.id","left");
        $builder->where("puestos.idCliente", $idCliente);
        $builder->orderBy("puestos.puesto");
        return $builder->get()->getResult();
        
    }

    public function GetPuestoById($id){
        $builder = $this->db->table('puestos');
        $builder->select("cliente.id, razon_social AS idCliente,catalogos_detalle.valor AS turnos,num_guardias,cant_arma_corta,cant_arma_larga,cant_sin_arma,nombre_ubicacion,puestos.puesto,puestos.activo,cliente.nombre_corto, puestos.createddate, puestos.updateddate,CONCAT(UA.nombre,' ' ,UA.apellido_paterno) AS createdby,CONCAT(UU.nombre,' ' ,UU.apellido_paterno) AS updatedby");
        $builder->join("cliente","puestos.idCliente = cliente.id","left");

        $builder->join("ubicacion","puestos.idUbicacion = ubicacion.id","left");
        $builder->join("turnos","puestos.idTurno = turnos.id","left");  
        $builder->join("catalogos_detalle","turnos.idTurnos = catalogos_detalle.id","left");
        $builder->join("sys_usuarios_admin UA","puestos.createdby = UA.id","left");
       $builder->join("sys_usuarios_admin UU","puestos.updatedby = UU.id","left");
       $builder->orderBy("idCliente","asc");
       $builder->where('puestos.id', $id);
        return $builder->get()->getRow();
    }



   public function Savecliente( $updatePuesto, $idPuesto ){

        $return = false;
        $this->db->table('puestos')->where('id',$idPuesto)->update($updatePuesto);

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

    public function getCliente($idCliente){
        $builder = $this->db->table('cliente');
        $builder->select('id,razon_social');
        $builder->where("id",$idCliente);
        return $builder->get()->getRow();
        
    }


    public function getUbicaciones($idCliente){
        $builder = $this->db->table('ubicacion');
        $builder->select('id,nombre_ubicacion');
        $builder->where("activo",true);
        $builder->where("idCliente",$idCliente);
        $builder->orderBy("nombre_ubicacion");
        return $builder->get()->getResult();
        
    }


    
    
}