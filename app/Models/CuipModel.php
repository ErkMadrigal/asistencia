<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;

class CuipModel
{
    protected $db;
    private $encrypt;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;
        $this->encrypt = new Encrypt();

    }

    public function GetCuip($idEmpresa){
        $builder = $this->db->table('datos_personales');
        $builder->select('id,primer_nombre,segundo_nombre,apellido_paterno,apellido_materno');
        $builder->orderBy("primer_nombre","asc");
        $builder->orderBy("apellido_paterno","asc");
        return $builder->get()->getResult();
        
    }

    public function GetCatalogoCuip($idCatalogo){
        $builder = $this->db->table('catalogos_detalle');
        $builder->select('id, valor');
        $builder->where("activo",true);
        $builder->where("idCatalogo",$idCatalogo);
        $builder->orderBy("valor","asc");
        return $builder->get()->getResult();
        
    }


    public function insertDatosPersonales($data){
        $this->db->transStart();

        $this->db->table('datos_personales')->insert($data);

        $this->db->transComplete();

        if ($this->db->transStatus() === TRUE)
        {
            $return = true;
        } else {
            $return = false ;
        }

        return $return; 
    }

    public function GetEstados(){
        $builder = $this->db->table("sepomex");
        $builder->select("estado");
        $builder->where("activo",true);
        $builder->groupBy("estado");
        $builder->orderBy("estado","asc");
        return $builder->get()->getResult();
        
    }

    public function getMunicipios($estado){
        $builder = $this->db->table("sepomex");
        $builder->select("municipio");
        $builder->where("activo",true);
        $builder->where("estado",$estado);
        $builder->groupBy("municipio");
        $builder->orderBy("municipio","asc");
        return $builder->get()->getResult();
        
    }

    public function getSepomexByCp($cp){
        $builder = $this->db->table("sepomex");
        $builder->select("municipio,ciudad,estado,asentamiento");
        $builder->where("activo",true);
        $builder->where("codigoPostal",$cp);
        $builder->orderBy("asentamiento","asc");
        return $builder->get()->getResult();
        
    }

    public function getCiudades($estado){
        $builder = $this->db->table("sepomex");
        $builder->select("ciudad");
        $builder->where("activo",true);
        $builder->where("estado",$estado);
        $builder->groupBy("ciudad");
        $builder->orderBy("ciudad","asc");
        return $builder->get()->getResult();
        
    }

    public function insertSocioEconomico($data){
        $this->db->transStart();

        $this->db->table('estudio_socioeconomico')->insert($data);

        $this->db->transComplete();

        if ($this->db->transStatus() === TRUE)
        {
            $return = true;
        } else {
            $return = false ;
        }

        return $return; 
    }

    public function insertEmpleosSeguridad($data){
        $this->db->transStart();

        $this->db->table('empleos_seg_publica')->insert($data);

        $this->db->transComplete();

        if ($this->db->transStatus() === TRUE)
        {
            $return = true;
        } else {
            $return = false ;
        }

        return $return; 
    }


    public function insertSancionesEstimulos($data){
        $this->db->transStart();

        $this->db->table('sanciones')->insert($data);

        $this->db->transComplete();

        if ($this->db->transStatus() === TRUE)
        {
            $return = true;
        } else {
            $return = false ;
        }

        return $return; 
    }


    public function insertCapacitaciones($data){
        $this->db->transStart();

        $this->db->table('capacitaciones')->insert($data);

        $this->db->transComplete();

        if ($this->db->transStatus() === TRUE)
        {
            $return = true;
        } else {
            $return = false ;
        }

        return $return; 
    }


    public function insertEmpDiversos($data){
        $this->db->transStart();

        $this->db->table('empleos_diversos')->insert($data);

        $this->db->transComplete();

        if ($this->db->transStatus() === TRUE)
        {
            $return = true;
        } else {
            $return = false ;
        }

        return $return; 
    }


    public function GetDatosPersonalesById($id){
        $builder = $this->db->table('datos_personales');
        $builder->select("'' AS institucion,'' AS dependencia,idEntidadNacimiento AS naciE,idEstado AS estado,idCodigoPostal AS postal,FN.valor AS nacionalidad,EC.valor AS civil,MN.valor AS nacion,PN.valor AS pais,datos_personales.apellido_paterno,datos_personales.apellido_materno,primer_nombre,segundo_nombre,fecha_nacimiento,SG.valor AS sexo,rfc,clave_electoral,cartilla_smn,licencia_conducir,vigencia_licencia,curp,pasaporte,fecha_naturalizacion,escuela,especialidad,cedula_profesional,año_inicio,año_termino,registro_sep,folio_certificado,calle,numero_exterior,numero_interior,colonia,entre_calle1,entre_calle2,numero_telefono,municipio,ciudad,nombre_curso,nombre_institucion,fecha_inicio,fecha_termino,certificado_por,CONCAT(UA.nombre,' ' ,UA.apellido_paterno) AS createdby,CONCAT(UU.nombre,' ' ,UU.apellido_paterno) AS updatedby");
        $builder->join("catalogos_detalle SG"," datos_personales.idGenero= SG.id  ","left");
        $builder->join("catalogos_detalle FN","datos_personales.idFormaNacionalidad = FN.id ","left");
        $builder->join("catalogos_detalle PN"," datos_personales.idPaisNacimiento= PN.id ","left");
        //$builder->join("catalogos_detalle NE"," datos_personales.idEntidadNacimiento= NE.id ","left");
        $builder->join("catalogos_detalle MN"," datos_personales.idNacionalidad= MN.id ","left");
        $builder->join("catalogos_detalle EC"," datos_personales.idEstadoCivil= EC.id  ","left");
        //$builder->join("catalogos_detalle CP"," datos_personales.idCodigoPostal= CP.id  ","left");
        //$builder->join("catalogos_detalle ES"," datos_personales.idEstado= ES.id  ","left");
        $builder->join("sys_usuarios_admin UA","datos_personales.createdby = UA.id","left");
        $builder->join("sys_usuarios_admin UU","datos_personales.updatedby = UU.id","left");
        $builder->where('datos_personales.id', $id);
        return $builder->get()->getRow();
    }

    public function GetSocioEconomicoById($id){
        $builder = $this->db->table('estudio_socioeconomico');
        $builder->select("actividades_culturales,SG.valor AS sexo,PR.valor AS parentesco,VCF.valor AS vive, TD.valor AS domicilio,inversiones,vehiculo,calidad_vida,vicios,imagen_publica,comportamiento,estudio_socioeconomico.apellido_paterno,estudio_socioeconomico.apellido_materno,primer_nombre,segundo_nombre,fecha_nacimiento,especificacion_inmueble, ingreso_familiar,CONCAT(UA.nombre,' ' ,UA.apellido_paterno) AS createdby,CONCAT(UU.nombre,' ' ,UU.apellido_paterno) AS updatedby");
        $builder->join("catalogos_detalle VCF"," estudio_socioeconomico.vive_con_familia= VCF.id  ","left");
        $builder->join("catalogos_detalle TD"," estudio_socioeconomico.idTipoDomicilio= TD.id  ","left");
        $builder->join("catalogos_detalle SG"," estudio_socioeconomico.idGenero= SG.id  ","left");
        $builder->join("catalogos_detalle PR"," estudio_socioeconomico.idParentesco= PR.id  ","left");
        $builder->join("sys_usuarios_admin UA","estudio_socioeconomico.createdby = UA.id","left");
        $builder->join("sys_usuarios_admin UU","estudio_socioeconomico.updatedby = UU.id","left");
        $builder->where('estudio_socioeconomico.idPersonal', $id);
        return $builder->get()->getRow();
    }

    public function GetEmpleosSeridadById($id){
        $builder = $this->db->table('empleos_seg_publica');
        $builder->select("dependencia,corporacion,primer_nombre,segundo_nombre,calle,numero_interior,numero_exterior,colonia,idCodigoPostal,numero_telefono,ingreso,separacion,PF.valor AS funcional,funciones,especialidad,rango,numero_placa,numero_empleado,sueldo_base,compensacion,area,division,cuip_jefe,nombre_jefe,ES.valor AS estado,municipio,MS.valor AS separacion,tipo_separacion,tipo_baja,comentarios,CONCAT(UA.nombre,' ' ,UA.apellido_paterno) AS createdby,CONCAT(UU.nombre,' ' ,UU.apellido_paterno) AS updatedby");
        $builder->join("catalogos_detalle PF"," empleos_seg_publica.idPuestoFuncional= PF.id  ","left");
        $builder->join("catalogos_detalle ES"," empleos_seg_publica.idEstado= ES.id  ","left");
        $builder->join("catalogos_detalle MS"," empleos_seg_publica.idMotivoSeparacion= MS.id  ","left");
        $builder->join("sys_usuarios_admin UA","empleos_seg_publica.createdby = UA.id","left");
        $builder->join("sys_usuarios_admin UU","empleos_seg_publica.updatedby = UU.id","left");
        $builder->where('empleos_seg_publica.idPersonal', $id);
        return $builder->get()->getRow();
    }

    public function GetEmpleosDiversos($id)
    {
        $builder = $this->db->table('empleos_diversos');
        $builder->select("empresa,calle,numero_exterior,numero_interior,colonia,idCodigoPostal,numero_telefono,ingreso,separacion,PF.valor AS funcional,area,sueldo_base,compensacion,ES.valor AS estado,municipio,MS.valor AS separacion,tipo_separacion,tipo_baja,comentarios,eligio_empleo,puesto_gustaria,area_gustaria,tiempo_ascenso,reglamento,razon_ascenso,capacitacion,TD.valor AS disciplina,subtipo_disciplina,motivo,tipo,fecha_inicio,fecha_termino,TDU.valor AS duracion,cantidad,CONCAT(UA.nombre,' ' ,UA.apellido_paterno) AS createdby,CONCAT(UU.nombre,' ' ,UU.apellido_paterno) AS updatedby");
        $builder->join("catalogos_detalle PF"," empleos_diversos.idPuestoFuncional= PF.id  ","left");
        $builder->join("catalogos_detalle ES"," empleos_diversos.idEstado= ES.id  ","left");
        $builder->join("catalogos_detalle MS"," empleos_diversos.idMotivoSeparacion= MS.id  ","left");
        $builder->join("catalogos_detalle TD"," empleos_diversos.idTipoDisciplina= TD.id  ","left");
        $builder->join("catalogos_detalle TDU"," empleos_diversos.idDuracion= TDU.id  ","left");
        $builder->join("sys_usuarios_admin UA","empleos_diversos.createdby = UA.id","left");
        $builder->join("sys_usuarios_admin UU","empleos_diversos.updatedby = UU.id","left");
        $builder->where('empleos_diversos.idPersonal', $id);
        return $builder->get()->getRow();
    }

    public function GetCapacitaciones($id){
        $builder = $this->db->table('capacitaciones');
        $builder->select("dependencia,NC.valor AS nivel,inst_capacitadora,CF.valor AS cursofue,nombre_curso,ID.valor AS idioma,GHA.valor AS gradohabilidad,TA.valor AS agrupacion,IE.valor AS escritura,GH.valor AS grado,IL.valor AS lectura,IC.valor AS conversacion,TH.valor AS habilidad ,tema_curso,NC.valor AS nivel,EC.valor AS eficiencia,inicio_curso,conclusion_curso,duracion_horas_curso,tipo_comprobante,institucion,curso,tipo_curso,EA.valor AS adicional,inicio_adicional,conclusion_adicional,duracion_horas_adicional,especifique_habilidad,nombre_agrupacion,especifique_agrupacion,CONCAT(UA.nombre,' ' ,UA.apellido_paterno) AS createdby,CONCAT(UU.nombre,' ' ,UU.apellido_paterno) AS updatedby");
        $builder->join("catalogos_detalle NC"," capacitaciones.idNivel_curso= NC.id  ","left");
        $builder->join("catalogos_detalle EC"," capacitaciones.idEficienciaCurso= EC.id  ","left");
        $builder->join("catalogos_detalle CF"," capacitaciones.idCursoFue= CF.id  ","left");
        $builder->join("catalogos_detalle EA"," capacitaciones.idEficienciaAdicional= EA.id  ","left");
        $builder->join("catalogos_detalle ID"," capacitaciones.idIdioma= ID.id  ","left");
        $builder->join("catalogos_detalle IE"," capacitaciones.idIdiomaEscritura= IE.id  ","left");
        $builder->join("catalogos_detalle IL"," capacitaciones.idIdiomaLectura= IL.id  ","left");
        $builder->join("catalogos_detalle IC"," capacitaciones.idIdiomaConversacion= IC.id  ","left");
        $builder->join("catalogos_detalle TH"," capacitaciones.idTipoHabilidad= TH.id  ","left");
        $builder->join("catalogos_detalle GH"," capacitaciones.idGradoHabilidad= GH.id  ","left");
        $builder->join("catalogos_detalle TA"," capacitaciones.idTipoAgrupacion= TA.id  ","left");
        $builder->join("catalogos_detalle GHA"," capacitaciones.idGradoHabilidadAgrup= GHA.id  ","left");
        $builder->join("sys_usuarios_admin UA","capacitaciones.createdby = UA.id","left");
        $builder->join("sys_usuarios_admin UU","capacitaciones.updatedby = UU.id","left");
        $builder->where('capacitaciones.idPersonal', $id);
        return $builder->get()->getRow();
    }

    public function GetSanciones($id){
        $builder = $this->db->table('sanciones');
        $builder->select("tipo_sancion,estado_averiguacion,aldia_averiguacion,juzgado,num_proceso,estado_procesal,inicio_proceso,aldia_proceso,tipo_estimulo,descripcion_estimulo,dependencia_otorga,otorgado,determinacion,descripcion_sancion,situacion,inicio_habilitacion,termino_habilitacion,dependencia,institucion_emisora,ES.valor AS estado,delitos,motivos,numero_expediente,agencia_mp,inicio_averiguacion,averiguacion_previa,TF.valor AS fuero,CONCAT(UA.nombre,' ' ,UA.apellido_paterno) AS createdby,CONCAT(UU.nombre,' ' ,UU.apellido_paterno) AS updatedby");
        $builder->join("catalogos_detalle ES"," sanciones.idEstado= ES.id  ","left");
        $builder->join("catalogos_detalle TF"," sanciones.idTipoFuero= TF.id  ","left");
        $builder->join("sys_usuarios_admin UA","sanciones.createdby = UA.id","left");
        $builder->join("sys_usuarios_admin UU","sanciones.updatedby = UU.id","left");
        $builder->where('sanciones.idPersonal', $id);
        return $builder->get()->getRow();
    }

    public function GetDocumentos($idEmpresa){
        $builder = $this->db->table('documentos_expediente_digital');
        $builder->select('id,documento,tipo');
        $builder->orderBy("documento","asc");
        $builder->where('activo', true);
        $builder->where('idEmpresa', $idEmpresa);
        return $builder->get()->getResult();
        
    }

    public function insertReferencias($data){
        $this->db->transStart();

        $this->db->table('referencias')->insert($data);

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
