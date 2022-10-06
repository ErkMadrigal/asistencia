<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;

class CatDocumentosModel
{

    protected $db;
    private $encrypt;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;
        $this->encrypt = new Encrypt();

    }

    public function GetDocumentos($idEmpresa){
        $builder = $this->db->table('documentos_expediente_digital');
        $builder->select('documentos_expediente_digital.id,documento,tipo, catalogos_detalle.valor,documentos_expediente_digital.activo');
        $builder->join("catalogos_detalle","documentos_expediente_digital.idModalidad = catalogos_detalle.id","left");
        $builder->orderBy("valor","asc");
        $builder->orderBy("documento","asc");
        $builder->where("documentos_expediente_digital.idempresa",$idEmpresa);
        return $builder->get()->getResult();
        
    }

    public function GetDocumentoById($id){
        $builder = $this->db->table('documentos_expediente_digital');
        $builder->select("documentos_expediente_digital.id,documento,tipo, catalogos_detalle.valor,documentos_expediente_digital.activo,documentos_expediente_digital.createddate, documentos_expediente_digital.updateddate,CONCAT(UA.nombre,' ' ,UA.apellido_paterno) AS createdby,CONCAT(UU.nombre,' ' ,UU.apellido_paterno) AS updatedby");
        $builder->join("catalogos_detalle","documentos_expediente_digital.idModalidad = catalogos_detalle.id","left");
        $builder->join("sys_usuarios_admin UA","documentos_expediente_digital.createdby = UA.id","left");
       $builder->join("sys_usuarios_admin UU","documentos_expediente_digital.updatedby = UU.id","left");
        $builder->where('documentos_expediente_digital.id', $id);
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

    public function saveDocumento( $updateDocumento, $idDocumento ){

        $return = false;
        $this->db->table('documentos_expediente_digital')->where('id', $idDocumento)->update($updateDocumento);

        if ($this->db->affectedRows() > 0){
            $return = true;
            
        } 

        return $return; 
    }

    //obtener los catlago padre se muestra en el combo
    public function GetCatalogos(){
        $builder = $this->db->table('catalogos');
        $builder->select('idCatalogo, valor');
        //$builder->where("activo",true);
        $builder->orderBy("valor","asc");
        return $builder->get()->getResult();
        
    }

    public function insertItemAndSelect($table, $data  , $LoggedUserId, $idEmpresa , $idModalidad)
    {

        $return = false;
        $this->db->transStart();

        $uuid = Uuid::uuid4();
        
        $idDoc = $uuid->toString();

        $query = "INSERT INTO documentos_expediente_digital (id, idModalidad,documento,tipo, activo, createdby, createddate, idEmpresa) VALUES ('".$idDoc."','".$idModalidad."','".$data['documento']."','".$data['tipo']."',1,'".$LoggedUserId."', now() ,'".$idEmpresa."')";

        $this->db->query($query);
        

        $this->db->transComplete();

        if ($this->db->transStatus() === TRUE)
        {
            $return = true;
        } 

        return $return;
    }

    public function GetModalidad($idEmpresa){
        $builder = $this->db->table('catalogos_detalle');
        $builder->select('id, valor');
        $builder->where("activo",true);
        $builder->where("idCatalogo", '907feeb9-0a74-45c4-a908-2296b85f0f62');
        $builder->where("idEmpresa",$idEmpresa);
        $builder->orderBy("valor","asc");
        return $builder->get()->getResult();
        
    }



}