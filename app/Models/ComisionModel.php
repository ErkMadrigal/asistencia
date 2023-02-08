<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;

class ComisionModel
{

    protected $db;
    private $encrypt;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;
        $this->encrypt = new Encrypt();

    }

    public function getData(){
        $builder = $this->db->table('comision');
        return $builder->get()->getResult();
    }

    public function getDataDetail($id){;
        $builder = $this->db->table('comision com');
        $builder->select("com.nombre, com.telefono, com.activo,  ac.nombre nombreC,  ac.apellido_paterno paternoC, ac.apellido_materno maternoC, com.createddate, au.nombre nombreU, au.apellido_paterno paternoU, au.apellido_materno maternoU, com.updateddate");
        $builder->join("sys_usuarios_admin ac","com.createdby = ac.id","left");
        $builder->join("sys_usuarios_admin au"," com.updatedby = au.id","left");
        $builder->where('com.id', $id);
        return $builder->get()->getRow();
    }

    
    public function getDataComisionista($id){
        $builder = $this->db->table('asignaciones asg ');
        $builder->select("asg.comision, arm.matricula matricula, cCls.valor clase, cCal.valor calibre, cMar.valor marca, cMod.valor modelo, dPer.primer_nombre, dPer.apellido_paterno, dPer.apellido_materno, cli.nombre_corto, com.nombre");
        $builder->join("comision com","com.id = asg.id_comisionista", "left");
        $builder->join("armas arm","arm.id = asg.id_armas", "left");
        $builder->join("catalogos_detalle cCls","cCls.id = arm.idClase", "left");
        $builder->join("catalogos_detalle cCal","cCal.id = arm.idCalibre", "left");
        $builder->join("catalogos_detalle cMar","cMar.id = arm.idMarca", "left");
        $builder->join("catalogos_detalle cMod","cMod.id = arm.idModelo", "left");
        $builder->join("datos_personales dPer","dPer.id = arm.id_portador", "left");
        $builder->join("cliente cli","cli.id = asg.idCliente", "left");
        $builder->where("com.id", $id);
        return $builder->get()->getResult();
    }

    public function addData($insert){

        $return = false;
        $this->db->table('comision')->insert($insert);

        if ($this->db->affectedRows() > 0){
            $return = true;
        } 
        return $return; 
    }

    public function update( $update ,$id ){

        $return = false;
        $this->db->table('comision')->where('id', $id)->update($update);

        if ($this->db->affectedRows() > 0){
            $return = true;
            
        } 

        return $return; 
    }

    public function delete( $id ){

        $return = false;
        $this->db->table('comision')->where('id', $id)->delete();

        if ($this->db->affectedRows() > 0){
            $return = true;
            
        } 

        return $return; 

    }

    
}