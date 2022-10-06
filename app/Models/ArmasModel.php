<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;

class ArmasModel
{
    protected $db;
    private $encrypt;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;
        $this->encrypt = new Encrypt();

    }

    public function GetArmas($idEmpresa){
        $builder = $this->db->table('armas');
        $builder->select('armas.id, armas.matricula, armas.folio_manif,armas.activo, M.valor AS idMarca');
        $builder->join("catalogos_detalle M"," armas.idMarca= M.id  ","left");
        $builder->orderBy("matricula","asc");
        $builder->where("armas.idempresa",$idEmpresa);
        return $builder->get()->getResult();
        
    }

    public function GetArmaById($id){
        $builder = $this->db->table('armas');
        $builder->select("armas.matricula, armas.folio_manif,armas.activo,CL.valor AS clase,CA.valor AS calibre,M.valor AS marca,MO.valor AS modelo, armas.createddate, armas.updateddate,CONCAT(UA.nombre,' ' ,UA.apellido_paterno) AS createdby,CONCAT(UU.nombre,' ' ,UU.apellido_paterno) AS updatedby");
        $builder->join("catalogos_detalle CL"," armas.idClase= CL.id  ","left");
        $builder->join("catalogos_detalle CA","armas.idCalibre = CA.id","left");
        $builder->join("catalogos_detalle M"," armas.idMarca= M.id  ","left");
        $builder->join("catalogos_detalle MO","armas.idModelo = MO.id","left");
       $builder->join("sys_usuarios_admin UA","armas.createdby = UA.id","left");
       $builder->join("sys_usuarios_admin UU","armas.updatedby = UU.id","left");
       $builder->orderBy("matricula","asc");
       $builder->where('armas.id', $id);
        return $builder->get()->getRow();
    }

    
    public function GetClase($idEmpresa){
        $builder = $this->db->table('catalogos_detalle');
        $builder->select('id, valor');
        $builder->where("activo",true);
        $builder->where("idCatalogo", '52785905-d9b9-47cc-898c-871b6970373d');
        $builder->where("idEmpresa",$idEmpresa);
        $builder->orderBy("valor","asc");
        return $builder->get()->getResult();
        
    }

    public function GetCalibre($idEmpresa){
        $builder = $this->db->table('catalogos_detalle');
        $builder->select('id, valor');
        $builder->where("activo",true);
        $builder->where("idCatalogo", 'b44d124c-88cb-4a75-ab74-82f056d87a20');
        $builder->where("idEmpresa",$idEmpresa);
        $builder->orderBy("valor","asc");
        return $builder->get()->getResult();
        
    }

    public function GetMarca($idEmpresa){
        $builder = $this->db->table('catalogos_detalle');
        $builder->select('id, valor');
        $builder->where("activo",true);
        $builder->where("idCatalogo", 'b1e3ff3c-abdb-410f-b6d3-2a633f28daaa');
        $builder->where("idEmpresa",$idEmpresa);
        $builder->orderBy("valor","asc");
        return $builder->get()->getResult();
        
    }

    public function GetModelo($idEmpresa){
        $builder = $this->db->table('catalogos_detalle');
        $builder->select('id, valor');
        $builder->where("activo",true);
        $builder->where("idCatalogo", '29ce45c0-d754-4400-9bcd-5a3f9ce4a081');
        $builder->where("idEmpresa",$idEmpresa);
        $builder->orderBy("valor","asc");
        return $builder->get()->getResult();
        
    }

    public function saveArma( $updateEmpresa, $idCatalogo ){

        $return = false;
        $this->db->table('armas')->where('id', $idCatalogo)->update($updateEmpresa);

        if ($this->db->affectedRows() > 0){
            $return = true;
            
        } 

        return $return; 
    }

    public function insertItemAndSelect($table, $data , $tableSelect , $LoggedUserId, $idEmpresa, $idClase, $idCalibre, $idMarca, $idModelo)
    {

        $return = false;
        $this->db->transStart();
        
        $uuid = Uuid::uuid4();
        
        $idArma = $uuid->toString();

        $query = "INSERT INTO armas (id, matricula,folio_manif, idClase, idCalibre, idMarca, idModelo, activo,createdby,createddate,idEmpresa) VALUES ('".$idArma."','".$data['matricula']."','".$data['folio_manif']."','".$idClase."','".$idCalibre."','".$idMarca."','".$idModelo."',1,'".$LoggedUserId."', now() ,'".$idEmpresa."')";

        $this->db->query($query);
        

        $this->db->transComplete();

        if ($this->db->transStatus() === TRUE)
        {
            $return = true;
        } 

        return $return;
    }

}