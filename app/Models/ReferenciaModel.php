<?php
 namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;

class ReferenciaModel {
     
    protected $db;

    private $encrypt;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;
        $this->encrypt = new Encrypt();

    }


    public function GetReferencia($idEmpresa){
        $builder = $this->db->table('catalogo_referencias');
        $builder->select('catalogo_referencias.id, parentesco, cve_parentesco  as tipo_referencia,activo');
        $builder->orderBy("parentesco","asc");
        $builder->where("catalogo_referencias.idempresa",$idEmpresa);
        return $builder->get()->getResult();

    }

    public function GetReferenciaById($id){
        $builder = $this->db->table('catalogo_referencias');
        $builder->select("catalogo_referencias.id, parentesco, idReferencia, cve_parentesco as tipo_referencia,catalogo_referencias.activo, catalogo_referencias.createddate, catalogo_referencias.updateddate,CONCAT(UA.nombre,' ' ,UA.apellido_paterno) AS createdby,CONCAT(UU.nombre,' ' ,UU.apellido_paterno) AS updatedby");
       $builder->join("sys_usuarios_admin UA","catalogo_referencias.createdby = UA.id","left");
       $builder->join("sys_usuarios_admin UU","catalogo_referencias.updatedby = UU.id","left");
       $builder->orderBy("parentesco","asc");
       $builder->where('catalogo_referencias.id', $id);
        return $builder->get()->getRow();
    }

    public function saveRefe( $updateEmpresa, $idReferencia ){

        $return = false;
        $this->db->table('catalogo_referencias')->where('id', $idReferencia)->update($updateEmpresa);

        if ($this->db->affectedRows() > 0){
            $return = true;
            
        } 

        return $return; 
    }
    public function insertItemAndSelect($table, $data , $tableSelect , $LoggedUserId, $idEmpresa, $idReferencia)
    {

        $return = false;
        $this->db->transStart();
        
        
        $query = "INSERT INTO catalogo_referencias (id, parentesco,cve_parentesco, idReferencia, activo,createdby,createddate,idEmpresa) VALUES ('".$idReferencia."','".$data['parentesco']."','".$data['cve_parentesco']."','".$data['tipo_referencia']."',1,'".$LoggedUserId."', now() ,'".$idEmpresa."')";

        $this->db->query($query);
        

        $this->db->transComplete();

        if ($this->db->transStatus() === TRUE)
        {
            $return = true;
        } 

        return $return;
    }


    public function GetTipoReferencia(){
        $builder = $this->db->table('catalogo_referencias');
        $builder->select('cve_parentesco');
        $builder->orderBy("cve_parentesco","asc");
        $builder->groupBy("cve_parentesco","asc");
        $builder->where("activo",true);
        return $builder->get()->getResult();

    }
}