<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;

class AsignacionesModel
{

    protected $db;
    private $encrypt;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;
        $this->encrypt = new Encrypt();

    }

    public function getAllData(){
        $builder = $this->db->table('asignaciones asg ');
        $builder->select("asg.id, asg.comision, co.nombre as nomComisionista,  cl.nombre_corto as cliente, CONCAT(dp.primer_nombre, ' ', dp.apellido_paterno, ' ',  dp.apellido_materno) as nombre, CONCAT(cdc.valor, ' ', cdma.valor, ' ', cdm.valor) as arma, asg.tipo_pago, asg.pagos, asg.periodicidad, asg.renta, asg.tramite, asg.asignacion, asg.garantia, asg.total, asg.entrega, asg.final, asg.tipo_movimiento, asg.aplicado, asg.saldo, asg.activo, a.id as idArma");
        $builder->join("cliente cl","asg.idCliente = cl.id", "left");
        $builder->join("comision co","co.id = asg.id_comisionista", "left");
        $builder->join("datos_personales dp","asg.id_datos_personales = dp.id", "left");
        $builder->join("armas a","asg.id_armas = a.id", "left");
        $builder->join("catalogos_detalle cdc","a.idClase = cdc.id", "left");
        $builder->join("catalogos_detalle cdm","a.idModelo = cdm.id", "left");
        $builder->join("catalogos_detalle cdma","a.idMarca = cdma.id", "left");
        return $builder->get()->getResult();
    }

    public function getCountPendientes(){
        $builder = $this->db->table('compromiso_pago');
        $builder->select("count(*) as total");
        $builder->where("fecha < now() and activo = 1");

        return $builder->get()->getResult();
    }

    public function get_motivo_baja($catalogo){
        $builder = $this->db->table(' catalogos c ');
        $builder->select("cd.id, cd.valor");
        $builder->join(" catalogos_detalle cd"," cd.idCatalogo = c.idCatalogo ","left");
        $builder->like('c.valor', $catalogo);
        return $builder->get()->getResult(); 

    }

    public function reportPendientes(){
        $builder = $this->db->table('compromiso_pago cp');
        $builder->select("cl.nombre_corto as cliente, CONCAT(dp.primer_nombre, ' ', dp.apellido_paterno, ' ', dp.apellido_materno) as nombre, CONCAT(cdc.valor, ' ', cdma.valor, ' ', cdm.valor) as arma, asg.pagos, asg.periodicidad, asg.renta, COUNT(*) pagosVencidos, (select MAX(fecha_pago) from compromiso_pago where id_asignacion = asg.id) as ultimoPago");
        $builder->join("asignaciones asg","asg.id = cp.id_asignacion", "left");
        $builder->join("cliente cl","asg.idCliente = cl.id", "left");
        $builder->join("datos_personales dp","asg.id_datos_personales = dp.id", "left");
        $builder->join("armas a","asg.id_armas = a.id", "left");
        $builder->join("catalogos_detalle cdc","a.idClase = cdc.id", "left");
        $builder->join("catalogos_detalle cdm","a.idModelo = cdm.id", "left");
        $builder->join("catalogos_detalle cdma","a.idMarca = cdma.id", "left");
        $builder->where("cp.fecha < now() and cp.activo = 1");
        $builder->groupBy("asg.id");
        return $builder->get()->getResult();
    }

    public function getComisionista(){
        $builder = $this->db->table('comision');
        $builder->select("id, nombre");
        return $builder->get()->getResult();
    }

    
    public function getDataRentaUnitaria($id){
        $builder = $this->db->table('asignaciones asg ');
        $builder->select("sum(cp.importe) saldoTotal, sum(cp.saldo) abonado, sum(cp.aplicado) restante, importe");
        $builder->join("compromiso_pago cp","asg.id = cp.id_asignacion", "left");
        $builder->where("asg.id", $id);
        return $builder->get()->getResult();
    }

    public function getData($id){
        $builder = $this->db->table('asignaciones asg ');
        $builder->select("asg.id, asg.comision, cl.razon_social, cl.nombre_corto as cliente, cl.id idCliente, CONCAT(dp.primer_nombre, ' ', dp.apellido_paterno, ' ',  dp.apellido_materno) as nombre, dp.id idElemento, dp.Cuip, co.nombre nombre_comisionista, CONCAT(cdc.valor, ' ', cdma.valor, ' ', cdm.valor, ' ', a.matricula) as arma, a.id idArma, asg.tipo_pago, asg.pagos, asg.periodicidad, asg.renta, asg.tramite, asg.asignacion, asg.garantia, asg.total, asg.entrega, asg.final, asg.tipo_movimiento, asg.aplicado, asg.saldo, asg.pagos, asg.activo, asg.cantidad_Cartuchos, cdmod.valor as modalidad, a.activo as estatusArma, asg.motivo");
        $builder->join("cliente cl","asg.idCliente = cl.id", "left");
        $builder->join("datos_personales dp","asg.id_datos_personales = dp.id", "left");
        $builder->join("comision co","asg.id_comisionista = co.id", "left");
        $builder->join("armas a","asg.id_armas = a.id", "left");
        $builder->join("catalogos_detalle cdc","a.idClase = cdc.id", "left");
        $builder->join("catalogos_detalle cdm","a.idModelo = cdm.id", "left");
        $builder->join("catalogos_detalle cdma","a.idMarca = cdma.id", "left");
        $builder->join("catalogos_detalle cdmod","asg.modalidad = cdmod.id", "left");
        $builder->where("asg.id", $id);
        return $builder->get()->getResult();
    }

    public function getById($id){
        $builder = $this->db->table('asignaciones asg');
        $builder->select("ac.nombre nombreC, ac.apellido_paterno paternoC, ac.apellido_materno maternoC, asg.createddate, au.nombre nombreU, au.apellido_paterno paternoU, au.apellido_materno maternoU, asg.updateddate");
       $builder->join("sys_usuarios_admin ac","asg.createdby = ac.id","left");
       $builder->join("sys_usuarios_admin au"," asg.updatedby = au.id","left");
       $builder->where('asg.id', $id);
        return $builder->get()->getRow();
    }

    public function getDatos( $where ){

        $builder = $this->db->table('asignaciones asg ');
        $builder->select("asg.id, asg.comision, , co.nombre as nomComisionista, CONCAT(cl.razon_social, ' ', cl.nombre_corto) as cliente, CONCAT(dp.primer_nombre, ' ', dp.apellido_paterno, ' ',  dp.apellido_materno) as nombre, CONCAT(cdc.valor, ' ', cdma.valor, ' ', cdm.valor) as arma, asg.tipo_pago, asg.pagos, asg.periodicidad, asg.renta, asg.tramite, asg.asignacion, asg.garantia, asg.total, asg.entrega, asg.final, asg.tipo_movimiento, asg.aplicado, asg.saldo, asg.activo");
        $builder->join("cliente cl","asg.idCliente = cl.id", "left");
        $builder->join("comision co","co.id = asg.id_comisionista", "left");
        $builder->join("datos_personales dp","asg.id_datos_personales = dp.id", "left");
        $builder->join("armas a","asg.id_armas = a.id", "left");
        $builder->join("catalogos_detalle cdc","a.idClase = cdc.id", "left");
        $builder->join("catalogos_detalle cdm","a.idModelo = cdm.id", "left");
        $builder->join("catalogos_detalle cdma","a.idMarca = cdma.id", "left");

        if(!empty($where["periodicidad"])){
            $builder->where('asg.periodicidad', $where["periodicidad"]);
        }

        if(!empty($where["activo"])){
            if($where["activo"] == "true"){
                $builder->where('asg.activo', 1);
            }else{
                $builder->where('asg.activo', 0);
            }
        }

        if(!empty($where["tipoFecha"])){

            $fechaInicial = $where['fechaInicial'];
            $fechaFinal = $where['fechaFinal'];

            if($where["tipoFecha"] == 'inicial'){
                $builder->where("asg.entrega BETWEEN '$fechaInicial' and '$fechaFinal' ");
            }else{
                $builder->where("asg.final BETWEEN '$fechaInicial' and '$fechaFinal' ");
            }
        }

        return $builder->get()->getResult(); 
    }

    public function getCountAsignacionesBusc($where){
        $builder = $this->db->table('asignaciones asg');
        $builder->select('count(*) as totalAsign');

        if(!empty($where["periodicidad"])){
            $builder->where('asg.periodicidad', $where["periodicidad"]);
        }

        if(!empty($where["activo"])){
            if($where["activo"] == "true"){
                $builder->where('asg.activo', 1);
            }else{
                $builder->where('asg.activo', 0);
            }
        }

        if(!empty($where["tipoFecha"])){

            $fechaInicial = $where['fechaInicial'];
            $fechaFinal = $where['fechaFinal'];

            if($where["tipoFecha"] == 'inicial'){
                $builder->where("asg.entrega BETWEEN '$fechaInicial' and '$fechaFinal' ");
            }else{
                $builder->where("asg.final BETWEEN '$fechaInicial' and '$fechaFinal' ");
            }
        }

        return $builder->get()->getResult(); 
    }
    
    public function getSumSaldoAplicadoBusc($where){
        $builder = $this->db->table('asignaciones asg');
        $builder->select('SUM(saldo) saldo, SUM(aplicado) aplicado, SUM(total) total');

        if(!empty($where["periodicidad"])){
            $builder->where('asg.periodicidad', $where["periodicidad"]);
        }

        if(!empty($where["activo"])){
            if($where["activo"] == "true"){
                $builder->where('asg.activo', 1);
            }else{
                $builder->where('asg.activo', 0);
            }
        }

        if(!empty($where["tipoFecha"])){

            $fechaInicial = $where['fechaInicial'];
            $fechaFinal = $where['fechaFinal'];

            if($where["tipoFecha"] == 'inicial'){
                $builder->where("asg.entrega BETWEEN '$fechaInicial' and '$fechaFinal' ");
            }else{
                $builder->where("asg.final BETWEEN '$fechaInicial' and '$fechaFinal' ");
            }
        }

        return $builder->get()->getResult(); 
    }

    public function getCountAsignaciones(){
        $builder = $this->db->table('asignaciones');
        $builder->select('count(*) as totalAsign');
        return $builder->get()->getResult();
    }

    public function getSumSaldoAplicado(){
        $builder = $this->db->table('asignaciones');
        $builder->select('SUM(saldo) saldo, SUM(aplicado) aplicado, SUM(total) total');
        return $builder->get()->getResult();
    }

    public function getAsignaciones($idPadre){
        $builder = $this->db->table('asignaciones');
        $builder->select('saldo, aplicado, total');
        $builder->where("id", $idPadre);
        return $builder->get()->getResult();
    }
    
    public function getCompromisoPago($id){
        $builder = $this->db->table('compromiso_pago');
        $builder->select('importe, aplicado, saldo');
        $builder->where("id", $id);
        return $builder->get()->getResult();
    }

    public function getClientes(){
        $builder = $this->db->table('cliente');
        $builder->select('id, razon_social, nombre_corto');
        return $builder->get()->getResult();
    }

    public function getElemento(){
        $builder = $this->db->table('datos_personales');
        $builder->select('id, primer_nombre, segundo_nombre, apellido_paterno, apellido_materno');
        return $builder->get()->getResult();
    }

    public function getArmas(){
        $builder = $this->db->table('armas a');
        $builder->select("a.id, cdc.valor clase, cdm.valor modelo, cdma.valor marca,  a.matricula");
        $builder->join("catalogos_detalle cdc"," on a.idClase = cdc.id");
        $builder->join("catalogos_detalle cdm"," on a.idModelo = cdm.id");
        $builder->join("catalogos_detalle cdma"," on a.idMarca = cdma.id");
        $builder->where("a.activo",1);
        return $builder->get()->getResult();

    }
    public function getModalidad(){
        $builder = $this->db->table('catalogos ct');
        $builder->select("cd.id, cd.valor");
        $builder->join("catalogos_detalle cd "," ct.idCatalogo = cd.idCatalogo", "left");
        $builder->where("ct.valor", "modalidad");
        $builder->where("cd.activo",1);
        $builder->where("cd.id <>",360);
        return $builder->get()->getResult();

    }

    public function getCuentaBancaria(){
        $builder = $this->db->table('catalogos ct');
        $builder->select("cdc.id ct.valor, cdb.valor banco, cdc.valor cuenta ");
        $builder->join("catalogos_detalle cdx "," ct.idCatalogo = cdc.idCatalogo", "left");
        $builder->join("catalogos_detalle cdb "," ct.idCatalogo = cdb.idCatalogo", "left");
        $builder->where("ct.valor", "bancos");
        $builder->where("cdc.idReferencia in (6,7)");
        $builder->where("cdb.idReferencia",2);
        return $builder->get()->getResult();

    }
   
    public function addData($insert){

        $return = false;
        $this->db->table('asignaciones')->insert($insert);

        if ($this->db->affectedRows() > 0){
            $return = true;
        } 

        return $return; 
    }

    public function addCompromiso($insert){

        $return = false;
        $this->db->table('compromiso_pago')->insert($insert);

        if ($this->db->affectedRows() > 0){
            $return = true;
        } 

        return $return; 
    }

    public function elementAignArm( $update ,$id ){

        $return = false;
        $this->db->table('armas')->where('id', $id)->update($update);

        if ($this->db->affectedRows() > 0){
            $return = true;
            
        } 

        return $return; 
    }

    public function getPagos($idCompormisoPago){
        $builder = $this->db->table('compromiso_pago cp');
        $builder->select("sua.nombre, sua.apellido_paterno paterno, sua.apellido_materno materno, cp.*");
        $builder->join("sys_usuarios_admin sua"," cp.updatedby = sua.id", "left");
        $builder->where("id_asignacion	", $idCompormisoPago);
        $builder->where("concepto	<>", "Pago Comision");
        $builder->orderBy("id_asignacion","asc");


        return $builder->get()->getResult();
    }

    public function setCompromisoPago( $update ,$id ){

        $return = false;
        $this->db->table('compromiso_pago')->where('id', $id)->update($update);

        if ($this->db->affectedRows() > 0){
            $return = true;
            
        } 

        return $return; 
    }

    public function setupdateSaldoAplicado( $update ,$id ){

        $return = false;
        $this->db->table('asignaciones')->where('id', $id)->update($update);

        if ($this->db->affectedRows() > 0){
            $return = true;
            
        } 

        return $return; 
    }
    public function delete( $id, $idArma, $status, $motivo ){

        $return = false;
        $this->db->transStart();
        $query = "UPDATE asignaciones SET activo = '$status', id_motivo = '$motivo' WHERE id = '$id'";
        $this->db->query($query);
        $query = "UPDATE compromiso_pago SET activo = 0 WHERE id_asignacion = '$id'";
        $this->db->query($query);
        if($status == 0){
            $query = "UPDATE armas set id_portador = '', activo = 1 WHERE id = '$idArma'";
        }else{
            $query = "UPDATE armas set id_portador = '', activo = 3 WHERE id = '$idArma'";
        }
        $this->db->query($query);

        $this->db->transComplete();

        if ($this->db->transStatus() === TRUE)
        {
            $return = true;
        } 

        return $return; 
    }

    public function updateMonto( $update ,$id, $fecha){

        $return = false;
        $this->db->table('compromiso_pago')->where('id_asignacion', $id)->where("fecha > '$fecha'")->update($update);

        if ($this->db->affectedRows() > 0){
            $return = true;
            
        } 

        return $return; 
    }
}