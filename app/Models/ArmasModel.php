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
        $builder->select('armas.id, armas.matricula, armas.folio_manif,armas.activo, M.valor AS idMarca,C.valor AS clase');
        $builder->join("catalogos_detalle M"," armas.idMarca= M.id  ","left");
        $builder->join("catalogos_detalle C"," armas.idClase= C.id  ","left");
        $builder->orderBy("clase","asc");
        $builder->orderBy("matricula","asc");
        $builder->where("armas.idempresa",$idEmpresa);
        return $builder->get()->getResult();
        
    }

    public function GetArmaById($id){
        $builder = $this->db->table('armas');
        $builder->select("armas.matricula, armas.folio_manif,armas.activo,CL.valor AS clase,CA.valor AS calibre,M.valor AS marca,MO.valor AS modelo, armas.createddate, armas.updateddate,CONCAT(UA.nombre,' ' ,UA.apellido_paterno) AS createdby,CONCAT(UU.nombre,' ' ,UU.apellido_paterno) AS updatedby,  CONCAT(dp.primer_nombre,' ' ,dp.apellido_paterno) portador, dp.Cuip, concat(ubArm.calle, ' # ex ',ubArm.no_exterior, ' # in ',ubArm.no_interior, ', Col. ', ubArm.colonia, ' ', ubArm.municipio, ' ', ubArm.estado, ' CP.', ubArm.codigo_postal ) direccion, armas.id_ubicacion , TA.valor tipoArma, armas.tipo_arma id_tipo_arma");
        $builder->join("datos_personales dp"," armas.id_portador = dp.id ","left");
        $builder->join("ubicacion_armamento ubArm"," ubArm.id_ubicacion  = armas.id_ubicacion  ","left");
        $builder->join("catalogos_detalle CL"," armas.idClase= CL.id  ","left");
        $builder->join("catalogos_detalle CA","armas.idCalibre = CA.id","left");
        $builder->join("catalogos_detalle M"," armas.idMarca= M.id  ","left");
        $builder->join("catalogos_detalle MO","armas.idModelo = MO.id","left");
        $builder->join("catalogos_detalle TA","TA.id = armas.tipo_arma","left");
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

        $query = "INSERT INTO armas (id, matricula,folio_manif, idClase, idCalibre, idMarca, idModelo, activo,createdby,createddate,idEmpresa, id_ubicacion, tipo_arma ) VALUES ('".$idArma."','".$data['matricula']."','".$data['folio_manif']."','".$idClase."','".$idCalibre."','".$idMarca."','".$idModelo."',1,'".$LoggedUserId."', now() ,'".$idEmpresa."', '".$data['ubicaciones']."','".$data['tipoArma']."')";

        $this->db->query($query);
        

        $this->db->transComplete();

        if ($this->db->transStatus() === TRUE)
        {
            $return = true;
        } 

        return $return;
    }

    public function addlicencia($insert){
        $this->db->transStart();
        $return = false;
        $this->db->table('licencias')->insert($insert);


        // if ($this->db->affectedRows() > 0){
        if ($this->db->transStatus()){
            $return = true;
        } 
        $this->db->transComplete();
        return $return; 
    }

    public function addubicacion($insert){
        $this->db->transStart();
        $return = false;
        $this->db->table('ubicacion_armamento')->insert($insert);


        // if ($this->db->affectedRows() > 0){
        if ($this->db->transStatus()){
            $return = true;
        } 
        $this->db->transComplete();
        return $return; 
    }

    public function searchEnMulticatalogo($catalogo){
        $builder = $this->db->table('catalogos cat');
        $builder->select('cd.id, cd.valor');
        $builder->join("catalogos_detalle cd","cat.idCatalogo = cd.idCatalogo","left");
        $builder->like('cat.valor', $catalogo);
        return $builder->get()->getResult(); 
    }

    public function searchCatalogo($id){
        $builder = $this->db->table('catalogos_detalle');
        $builder->select('id, valor, idReferencia');
        $builder->where('id', $id);
        return $builder->get()->getRow(); 
    }

    public function searchUbicaciones($id){
        $builder = $this->db->table('ubicacion_armamento ua');
        $builder->select('ua.id_ubicacion, lic.id_licencia, lic.armas_Largas, lic.armas_Cortas, lic.total_Personas, lic.armas_largas_asg, lic.armas_cortas_asg, lic.personas_asignadas');
        $builder->join("licencias lic","lic.id_licencia = ua.id_licencia","left");
        $builder->where('ua.id_ubicacion', $id);
        return $builder->get()->getRow(); 
    }

    public function searchLicencia($id){
        $builder = $this->db->table('licencias');
        $builder->select('*');
        $builder->where('id_licencia', $id);
        return $builder->get()->getRow();
    }

    public function searchUbicacion($id){
        $builder = $this->db->table('ubicacion_armamento');
        $builder->select('*');
        $builder->where('id_ubicacion ', $id);
        return $builder->get()->getRow();
    }

    public function searchLicenciaDetail($id){
        $builder = $this->db->table('licencias li');
        $builder->select('li.*, cd.valor Modalidad');
        $builder->join("catalogos_detalle cd"," cd.id = li.id_Modalidad ","left");
        $builder->where('li.id_licencia', $id);
        return $builder->get()->getRow();
    }

    public function searchUbicacionDetail($id){
        $builder = $this->db->table('ubicacion_armamento ua');
        $builder->select('ua.*, cd.valor tipo_ubicacion, li.No_oficio');
        $builder->join("licencias li"," li.id_licencia = ua.id_licencia ","left");
        $builder->join("catalogos_detalle cd"," cd.id = ua.id_tipo_ubicacion","left");
        $builder->where('id_ubicacion ', $id);
        return $builder->get()->getRow();
    }

    public function getLicencias(){
        $builder = $this->db->table('licencias');
        $builder->select('id_licencia, No_oficio');
        return $builder->get()->getResult(); 
        
    }

    public function getUbicaciones(){
        $builder = $this->db->table('ubicacion_armamento');
        $builder->select("id_ubicacion, concat(calle, ' # ex ',no_exterior, ' # in ',no_interior, ', Col. ', colonia, ' ', municipio ) direccion");
        return $builder->get()->getResult(); 
        
    }

    public function allLicencias(){
        $builder = $this->db->table('licencias li');
        $builder->select('id_licencia, No_oficio, folio, cd.valor, responsable, fecha_revalidacion, armas_Cortas, armas_Largas, total_Armas, total_Personas, docuemento_Licencia, nombre_Docuemento, li.activo');
        $builder->join("catalogos_detalle cd"," cd.id = li.id_Modalidad","left");
        return $builder->get()->getResult();
    }

    public function allUbicacion(){
        $builder = $this->db->table('ubicacion_armamento ua');
        $builder->select("id_ubicacion, li.No_oficio, cd.valor tipo_ubicacion, concat(ua.calle, ' # ex ',ua.no_exterior, ' # in ',ua.no_interior, ', Col. ', ua.colonia, ' ', ua.municipio ) direccion, estado, codigo_postal, ua.activo");
        $builder->join("licencias li"," li.id_licencia = ua.id_licencia","left");
        $builder->join("catalogos_detalle cd"," cd.id = ua.id_tipo_ubicacion","left");
        return $builder->get()->getResult();
    }
    public function updateLicencia( $updated, $id ){

        $return = false;
        $this->db->table('licencias')->where('id_licencia', $id)->update($updated);

        if ($this->db->affectedRows() > 0){
            $return = true;
            
        } 

        return $return; 
    }
    public function updateDoc( $updated, $id ){

        $return = false;
        $this->db->table('licencias')->where('id_licencia', $id)->update($updated);

        if ($this->db->affectedRows() > 0){
            $return = true;
            
        } 

        return $return; 
    }

    
    public function updateUbicacion( $updated, $id ){

        $return = false;
        $this->db->table('ubicacion_armamento')->where('id_ubicacion ', $id)->update($updated);

        if ($this->db->affectedRows() > 0){
            $return = true;
            
        } 

        return $return; 
    }

    public function GetSepomexOption( $where ){
        $builder = $this->db->table('sepomex');
        $builder->select('codigoPostal, asentamiento, municipio, estado');
        $builder->where('codigoPostal', $where);
        return $builder->get()->getResult(); 
    }
}