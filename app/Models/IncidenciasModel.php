<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;

class IncidenciasModel{

    protected $db;
    private $encrypt;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;
        $this->encrypt = new Encrypt();

    }

    
    public function getUsers($idEmpresa){
        $builder = $this->db->table('datos_personales dp');
        $builder->select("dp.id, concat(dp.primer_nombre, ' ', dp.apellido_paterno, ' ', dp.apellido_materno) nombre, de.numEmpleado, u.nombre_ubicacion, concat(dpj.primer_nombre, ' ', dpj.segundo_nombre, ' ', dpj.apellido_paterno, ' ', dpj.apellido_materno) nomJefe, c.nombre_corto");
        $builder->join("datos_empleado de", "de.idPersonal = dp.id","left");
        $builder->join("ubicacion u", "u.id = de.idUbicacion","left");
        $builder->join("datos_personales dpj", "dpj.id = de.idJefeInmediato","left");
        $builder->join("cliente c", "c.id = de.idCliente","left");
        $builder->where("dp.idEmpresa", $idEmpresa);
        $builder->where("dp.activo", 1);

        return $builder->get()->getResult();
    }


    public function getIncidenciasAll($idEmpresa){
        $builder = $this->db->table('incidencias_personal ip');
        $builder->select(" ip.id, ip.id_tipo_incidencia, concat(dp.primer_nombre, ' ', dp.apellido_paterno, ' ', dp.apellido_materno) nombre, cd.valor tipo_incidencia, de.numEmpleado, u.nombre_ubicacion, concat(dpj.primer_nombre, ' ', dpj.segundo_nombre, ' ', dpj.apellido_paterno, ' ', dpj.apellido_materno) nomJefe, c.nombre_corto, ip.descripcion, ip.fecha_incidencia_inicio, ip.fecha_incidencia_final, ip.activo");
        $builder->join("catalogos_detalle cd","cd.id = ip.id_tipo_incidencia","left");
        $builder->join("datos_personales dp", "dp.id = ip.idPersonal","left");
        $builder->join("datos_empleado de", "de.idPersonal = dp.id","left");
        $builder->join("ubicacion u", "u.id = de.idUbicacion","left");
        $builder->join("datos_personales dpj", "dpj.id = de.idJefeInmediato","left");
        $builder->join("cliente c", "c.id = de.idCliente","left");
        $builder->where("ip.idEmpresa", $idEmpresa);

        return $builder->get()->getResult();
    }

    public function getIncidenciasList($like){
        $builder = $this->db->table('catalogos cat');
        $builder->select("cd.id, cd.valor");
        $builder->join("catalogos_detalle cd","cd.idCatalogo = cat.idCatalogo","left");
        $builder->like("cat.valor", $like);
        return $builder->get()->getResult();
    }


    public function addIncidencia($insert){
        $this->db->transStart();
        $return = false;
        $this->db->table('incidencias_Personal')->insert($insert);


        // if ($this->db->affectedRows() > 0){
        if ($this->db->transStatus()){
            $return = true;
        } 
        $this->db->transComplete();
        return $return; 
    }

    public function seachIncidencia($where){
        $builder = $this->db->table('incidencias_personal ip');
        $builder->select("cd.valor, concat(sysC.nombre, ' ', sysC.apellido_paterno) nombreCreate, concat(sysU.nombre, ' ', sysU.apellido_paterno) nombreUpdate, ip.descripcion, ip.fecha_incidencia_inicio, ip.fecha_incidencia_final, ip.createdby, ip.createddate, ip.updatedby, ip.updateddate, ip.inactivatedby, ip.inactivateddate");
        $builder->join("catalogos_detalle cd","cd.id = ip.id_tipo_incidencia","left");
        $builder->join("sys_usuarios_admin sysC","sysC.id = ip.createdby","left");
        $builder->join("sys_usuarios_admin sysU","sysU.id = ip.updatedby","left");
        $builder->where("ip.id", $where);
        return $builder->get()->getResult(); 
    }

    public function update( $update ,$id){

        $return = false;
        $this->db->table('incidencias_personal')->where('id', $id)->update($update);

        if ($this->db->affectedRows() > 0){
            $return = true;
            
        } 

        return $return; 
    }

}

