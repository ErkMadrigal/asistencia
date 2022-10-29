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

    public function GetUbicacion($idEmpresa){
        $builder = $this->db->table('ubicacion');
        $builder->select('ubicacion.id, idCliente,nombre_ubicacion,activo');
        $builder->where("ubicacion.id");
        return $builder->get()->getResult();
        
    }

    public function GetUbicacionById($id){
        $builder = $this->db->table('ubicacion');
        $builder->select("idCliente,idUbicacion,ubicacion.activo, ubicacion.createddate, ubicacion.updateddate,CONCAT(UA.nombre,' ' ,UA.apellido_paterno) AS createdby,CONCAT(UU.nombre,' ' ,UU.apellido_paterno) AS updatedby");
       $builder->orderBy("idCliente","asc");
       $builder->where('ubicacion.id', $id);
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