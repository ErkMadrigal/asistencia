<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;

class ClienteModel 
{
    protected $db;
    private $encrypt;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;
        $this->encrypt = new Encrypt();

    }

    public function GetClientes(){
        $builder = $this->db->table('cliente');
        $builder->select('cliente.id, razon_social, nombre_corto,email,activo');
        
        return $builder->get()->getResult();
        
    }

    public function GetClienteById($id){
        $builder = $this->db->table('cliente');
        $builder->select("razon_social,nombre_corto,nombre_contacto,whatsapp,tel_oficina,fecha_inicio,fecha_fin,calle_num,idCodigoPostal,puesto,colonia,municipio,ciudad,estado,rfc,calle_num_fiscal,idCodigoPostal_fiscal,colonia_fiscal,municipio_fiscal,ciudad_fiscal,estado_fiscal,cliente.email,cliente.activo, cliente.createddate, cliente.updateddate,CONCAT(UA.nombre,' ' ,UA.apellido_paterno) AS createdby,CONCAT(UU.nombre,' ' ,UU.apellido_paterno) AS updatedby");
       $builder->join("sys_usuarios_admin UA","cliente.createdby = UA.id","left");
       $builder->join("sys_usuarios_admin UU","cliente.updatedby = UU.id","left"); 
       $builder->orderBy("razon_social","asc");
       $builder->where('cliente.id', $id);
        return $builder->get()->getRow();
    }



   public function Updatecliente( $updateEmpresa, $idCatalogo ){

        $return = false;
        $this->db->table('cliente')->where('id')->update($updateEmpresa);

        if ($this->db->affectedRows() > 0){
            $return = true;
            
        } 

        return $return; 
    }
    public function saveCliente($cliente)
    {

        $this->db->transStart();

        $this->db->table('cliente')->insert($cliente);

        $this->db->transComplete();

        if ($this->db->transStatus() === TRUE)
        {
            $return = true;
        } else {
            $return = false ;
        }

        return $return;
    }


    
    
}