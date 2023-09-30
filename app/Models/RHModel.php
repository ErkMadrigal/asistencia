<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;

class RHModel
{

    protected $db;
    private $encrypt;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;
        $this->encrypt = new Encrypt();

    }

    public function getAllDataAlta($inicio = '', $final = ''){
        $builder = $this->db->table('datos_personales dp');
        $builder->select("de.numEmpleado, dp.apellido_paterno, dp.apellido_materno, dp.primer_nombre, dp.segundo_nombre, de.fecha_ingreso, de.nss, dp.rfc, dp.curp, dp.idCodigoPostal, cdb.valor banco, de.cuentaBanco, de.CLABE, de.sueldo, de.pagoExterno, dp.numero_telefono, cli.nombre_corto cliente, ub.nombre_ubicacion, cdp.valor puesto, cdtr.valor turno, dp.nombre_jefe, concat(sua.nombre, ' ', sua.apellido_paterno) nombreAlta");
        $builder->join("datos_empleado de", "dp.id = de.idPersonal", "left");
        $builder->join("catalogos_detalle cdb", "cdb.id = de.idBanco", "left");
        $builder->join("cliente cli", "cli.id = de.idCliente", "left");
        $builder->join("ubicacion ub", "ub.id = de.idUbicacion", "left");
        $builder->join("puestos p", "p.id = de.idPuesto", "left");
        $builder->join("catalogos_detalle cdp", "p.puesto = cdp.id", "left");
        $builder->join("turnos tr", "tr.id = de.idTurno", "left");
        $builder->join("catalogos_detalle cdtr", "cdtr.id = tr.idTurnos", "left");
        $builder->join("sys_usuarios_admin sua", "sua.id = dp.createdby", "left");
        $builder->where("dp.activo", "1");
        if($inicio != '' || $final != ''){
            $builder->where("de.fecha_ingreso >= ", $inicio);
            $builder->where("de.fecha_ingreso <= ", $final);
        }
        return $builder->get()->getResult();
    }

    public function getAllDataBaja($inicio = '', $final = ''){
        $builder = $this->db->table('datos_personales dp');
        $builder->select("de.numEmpleado, dp.apellido_paterno, dp.apellido_materno, dp.primer_nombre, dp.segundo_nombre, de.fecha_ingreso, dp.fecha_sol_baja fecha_baja, dp.fecha_efec_baja fecha_efectiva_baja, cli.nombre_corto cliente, ub.nombre_ubicacion, cdp.valor puesto, cdtr.valor turno, dp.nombre_jefe,  de.sueldo, cdf.valor finiquito, cdb.valor tipoBaja, de.motivo_baja, concat(sua.nombre, ' ', sua.apellido_paterno) nombreBaja ");
        $builder->join("datos_empleado de", "dp.id = de.idPersonal", "left");
        $builder->join("cliente cli", "cli.id = de.idCliente", "left");
        $builder->join("ubicacion ub", "ub.id = de.idUbicacion", "left");
        $builder->join("puestos p", "p.id = de.idPuesto", "left");
        $builder->join("catalogos_detalle cdf", "de.soldi = cdf.id", "left");
        $builder->join("catalogos_detalle cdp", "p.puesto = cdp.id", "left");
        $builder->join("turnos tr", "tr.id = de.idTurno", "left");
        $builder->join("catalogos_detalle cdtr", "cdtr.id = tr.idTurnos", "left");
        $builder->join("catalogos_detalle cdb", "cdb.id = de.id_motivo", "left");
        $builder->join("sys_usuarios_admin sua", "sua.id = dp.inactivateddate", "left");
        $builder->where("dp.activo", "0");
        if($inicio != '' || $final != ''){
            $builder->where("dp.fecha_efec_baja >= ", $inicio);
            $builder->where("dp.fecha_efec_baja <= ", $final);
        }
        return $builder->get()->getResult();
    }

}