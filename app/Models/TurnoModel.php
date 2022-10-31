<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;

class TurnoModel
{
    protected $db;
    private $encrypt;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;
        $this->encrypt = new Encrypt();

    }

    public function GetTurnos(){
        $builder = $this->db->table('catalogos_detalle');
        $builder->select('id,valor');
        $builder->where("idCatalogo","0d1f3b8d-ecdb-400b-bfeb-dc362dde9929");
        $builder->where("activo",true);
        return $builder->get()->getResult();
        
    }


    public function GetHorarios(){
        $builder = $this->db->table('catalogos_detalle');
        $builder->select('id,valor');
        $builder->where("idCatalogo","13ec8413-c313-4e70-9c18-ee60705be252");
        $builder->where("activo",true);
        return $builder->get()->getResult();
        
    }

    public function GetTurnoById($id){
        $builder = $this->db->table('turnos');
        $builder->select("turnos.id, razon_social,catalogos_detalle.valor As turno, turnos.activo,ubicacion.nombre_ubicacion, turnos.createddate, turnos.updateddate,CONCAT(UA.nombre,' ' ,UA.apellido_paterno) AS createdby,CONCAT(UU.nombre,' ' ,UU.apellido_paterno) AS updatedby");
        $builder->join("cliente","turnos.idCliente = cliente.id","left");
        $builder->join("ubicacion","turnos.idUbicacion = ubicacion.id","left");
        $builder->join("catalogos_detalle","turnos.idTurnos = catalogos_detalle.id","left");
        $builder->join("sys_usuarios_admin UA","turnos.createdby = UA.id","left");
       $builder->join("sys_usuarios_admin UU","turnos.updatedby = UU.id","left");
       
       $builder->where('turnos.id', $id);
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
    public function SaveTurno($data)
    {

        $this->db->transStart();

        $this->db->table('turnos')->insert($data);

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


    public function getUbicaciones($idCliente){
        $builder = $this->db->table('ubicacion');
        $builder->select('id,nombre_ubicacion');
        $builder->where("activo",true);
        $builder->where("idCliente",$idCliente);
        $builder->orderBy("nombre_ubicacion");
        return $builder->get()->getResult();
        
    }

    public function GetTurnosAll(){
        $builder = $this->db->table('turnos');
        $builder->select('turnos.id, razon_social,catalogos_detalle.valor As turno, turnos.activo,ubicacion.nombre_ubicacion');
        $builder->join("cliente","turnos.idCliente = cliente.id","left");
        $builder->join("ubicacion","turnos.idUbicacion = ubicacion.id","left");
        $builder->join("catalogos_detalle","turnos.idTurnos = catalogos_detalle.id","left");
        $builder->orderBy('razon_social');
        $builder->orderBy('turno');
        return $builder->get()->getResult();
        
    }
    
}