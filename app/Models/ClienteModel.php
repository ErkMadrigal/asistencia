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
        $builder->select('cliente.id, razon_social, nombre_corto,fecha_inicio,fecha_fin,ubicacion.nombre_ubicacion,ubicacion.calle_num,ubicacion.ciudad,ubicacion.estado,ubicacion.activo,cliente.activo');
        $builder->join("ubicacion","ubicacion.idCliente = ubicacion.id","left");
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



   public function Updatecliente( $updateCliente, $idCliente ){

        $return = false;
        $this->db->table('cliente')->where('id',$idCliente)->update($updateCliente);

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

    public function save($data, $tabla)
    {

        $this->db->transStart();

        $this->db->table($tabla)->insert($data);

        $this->db->transComplete();

        if ($this->db->transStatus() === TRUE)
        {
            $return = true;
        } else {
            $return = false ;
        }

        return $return;
    }
    

    public function addCatalogoDetalle($data){

        $this->db->transStart();

        $this->db->table('catalogos_detalle')->insert($data);

        $insert_id = $this->db->insertID(); 

        $this->db->transComplete();

        if ($this->db->transStatus()){
            $return = $insert_id; 
        } else {
            $return = false ;
        }

        return $return;
    }

    public function searchMulticatalogo($data, $catalogo){
        $builder = $this->db->table('catalogos cat');
        $builder->select('cd.id');
        $builder->join("catalogos_detalle cd","cat.idCatalogo = cd.idCatalogo","left");
        $builder->like('cd.valor', $data);
        $builder->where('cat.valor', $catalogo);
        $result = $builder->get()->getResult(); 
        if(empty($result)) {
            return false; 
        } else {
            return $result[0]->id; 
        }
    }

    public function searchCatalogo($catalogo){
        $builder = $this->db->table('catalogos');
        $builder->select('idCatalogo');
        $builder->where('valor', $catalogo);
        $result = $builder->get()->getResult(); 
        if(empty($result)) {
            return 1; 
        } else {
            return $result[0]->idCatalogo; 
        }
    }

    public function searchCliente($data){
        $builder = $this->db->table('cliente');
        $builder->select('id');
        $builder->where('razon_social', $data);
        $result = $builder->get()->getResult(); 
        if(empty($result)) {
            return false; 
        } else {
            return $result[0]->id; 
        }
    }

    public function searchUbicacion($ubicacion, $calle,  $colonia, $cp){
        $builder = $this->db->table('ubicacion');
        $builder->select('id');
        $builder->where('nombre_ubicacion', $ubicacion);
        $builder->where('calle_num', $calle);
        $builder->where('colonia', $colonia);
        $builder->where('idCodigoPostal', $cp);
        $result = $builder->get()->getResult(); 
        if(empty($result)) {
            return false; 
        } else {
            return $result[0]->id; 
        }
    }


    
    
}