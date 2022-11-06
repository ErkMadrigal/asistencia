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
        $builder->select('datos_personales.id,primer_nombre,segundo_nombre,apellido_paterno,apellido_materno,media_filiacion.idPersonal');
        $builder->join("media_filiacion"," datos_personales.id= media_filiacion.idPersonal","left");
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

    public function insertDatosPersonales($data,$expDocenteArray,$expDocente){
        $this->db->transStart();

        $this->db->table('datos_personales')->insert($data);

        if ($expDocente == 0){
            $this->db->table('datos_personales_experiencia')->insertBatch($expDocenteArray);
        }
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
        $builder = $this->db->table("estados");
        $builder->select("claveEstado AS id,estado AS valor");
        $builder->orderBy("estado","asc");
        return $builder->get()->getResult();
        
    }

    public function getMunicipios($estado){
        $builder = $this->db->table("estados_detalles");
        $builder->select("id, descripcion");
        $builder->where("activo",true);
        $builder->where("claveEstado",$estado);
        $builder->orderBy("descripcion","asc");
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

    public function insertSocioEconomico($data,$datosDependientesArray,$datos){
        $this->db->transStart();

        $this->db->table('estudio_socioeconomico')->insert($data);

        if($datos == 0){

           $this->db->table('estudio_socioeconomico_dependientes')->insertBatch($datosDependientesArray); 
        }

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


    public function insertSancionesEstimulos($datosEstimulos,$datosResoluciones,$datosSanciones,$sanciones,$resoluciones,$estimulo){
        $this->db->transStart();

        if($resoluciones == 0){
            $this->db->table('resoluciones_ministeriales')->insertBatch($datosResoluciones);
        
        }

        if($sanciones == 0){
            $this->db->table('sanciones')->insertBatch($datosSanciones);
        }

        if($estimulo == 0){
            $this->db->table('estimulos_recibidos')->insertBatch($datosEstimulos);
        }

        $this->db->transComplete();

        if ($this->db->transStatus() === TRUE)
        {
            $return = true;
        } else {
            $return = false ;
        }

        return $return; 
    }


    public function insertCapacitaciones($datosPublica,$datosCapacitacion,$datosIdioma,$datosHabilidad,$datosAfiliacion,$publica,$capacitacion,$idioma,$habilidad,$afiliacion){
        $this->db->transStart();

        if($publica == 0){
            $this->db->table('capacitacion_publica')->insertBatch($datosPublica);
        }
        if($capacitacion == 0){
            $this->db->table('capacitaciones')->insertBatch($datosCapacitacion);
        }
        if($idioma == 0){
            $this->db->table('idiomas_dialectos')->insertBatch($datosIdioma);
        }
        if($habilidad == 0){
            $this->db->table('habilidades_haptitudes')->insertBatch($datosHabilidad);
        }
        if($afiliacion == 0){
            $this->db->table('afiliacion_agrupaciones')->insertBatch($datosAfiliacion);
        }
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
        $builder->select("'' AS institucion,'' AS dependencia,idEntidadNacimiento AS naciE,idEstado AS estado,idCodigoPostal AS postal,FN.valor AS nacionalidad,EC.valor AS civil,MN.valor AS nacion,PN.valor AS pais,datos_personales.apellido_paterno,datos_personales.apellido_materno,primer_nombre,segundo_nombre,fecha_nacimiento,SG.valor AS sexo,rfc,clave_electoral,cartilla_smn,licencia_conducir,idNivelEducativo as desarrollo_academico,vigencia_licencia,curp,pasaporte,fecha_naturalizacion,escuela,especialidad,cedula_profesional,año_inicio,año_termino,registro_sep,folio_certificado,calle,numero_exterior,numero_interior,colonia,entre_calle1,entre_calle2,numero_telefono,municipio,ciudad,CONCAT(UA.nombre,' ' ,UA.apellido_paterno) AS createdby,CONCAT(UU.nombre,' ' ,UU.apellido_paterno) AS updatedby");
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
        $builder->select("estudio_socioeconomico.id,actividades_culturales,VCF.valor AS vive, TD.valor AS domicilio,inversiones,vehiculo,calidad_vida,vicios,imagen_publica,comportamiento,estudio_socioeconomico.apellido_paterno,estudio_socioeconomico.apellido_materno,primer_nombre,segundo_nombre,fecha_nacimiento,especificacion_inmueble, ingreso_familiar,CONCAT(UA.nombre,' ' ,UA.apellido_paterno) AS createdby,CONCAT(UU.nombre,' ' ,UU.apellido_paterno) AS updatedby");
        $builder->join("catalogos_detalle VCF"," estudio_socioeconomico.vive_con_familia= VCF.id  ","left");
        $builder->join("catalogos_detalle TD"," estudio_socioeconomico.idTipoDomicilio= TD.id  ","left");
       // $builder->join("catalogos_detalle SG"," estudio_socioeconomico.idGenero= SG.id  ","left");
        //$builder->join("catalogos_detalle PR"," estudio_socioeconomico.idParentesco= PR.id  ","left");
        $builder->join("sys_usuarios_admin UA","estudio_socioeconomico.createdby = UA.id","left");
        $builder->join("sys_usuarios_admin UU","estudio_socioeconomico.updatedby = UU.id","left");
        $builder->where('estudio_socioeconomico.idPersonal', $id);
        return $builder->get()->getRow();
    }

    public function GetEmpleosSeridadById($id){
        $builder = $this->db->table('empleos_seg_publica');
        $builder->select("dependencia,corporacion,calle,numero_interior,numero_exterior,colonia,idCodigoPostal,numero_telefono,ingreso,separacion,PF.valor AS funcional,funciones,especialidad,rango,numero_placa,numero_empleado,sueldo_base,compensacion,area,division,cuip_jefe,nombre_jefe,ES.valor AS estado,municipio,MS.valor AS separacion,tipo_separacion,tipo_baja,comentarios,CONCAT(UA.nombre,' ' ,UA.apellido_paterno) AS createdby,CONCAT(UU.nombre,' ' ,UU.apellido_paterno) AS updatedby");
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
        $builder->select("empresa,calle,numero_exterior,numero_interior,colonia,idCodigoPostal,numero_telefono,ingreso,area,sueldo_base,ES.valor AS estado,municipio,MS.valor AS separacion,tipo_separacion,comentarios,eligio_empleo,puesto_gustaria,area_gustaria,tiempo_ascenso,reglamento,razon_ascenso,capacitacion,TD.valor AS disciplina,subtipo_disciplina,motivo,tipo,fecha_inicio,fecha_termino,TDU.valor AS duracion,cantidad,CONCAT(UA.nombre,' ' ,UA.apellido_paterno) AS createdby,CONCAT(UU.nombre,' ' ,UU.apellido_paterno) AS updatedby");
        
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
        $builder->select("CF.valor AS cursofue,institucion,curso,tipo_curso,EA.valor AS adicional,inicio_adicional,conclusion_adicional,duracion_horas_adicional,CONCAT(UA.nombre,' ' ,UA.apellido_paterno) AS createdby,CONCAT(UU.nombre,' ' ,UU.apellido_paterno) AS updatedby");
        //$builder->join("catalogos_detalle NC"," capacitaciones.idNivel_curso= NC.id  ","left");
        //$builder->join("catalogos_detalle EC"," capacitaciones.idEficienciaCurso= EC.id  ","left");
        $builder->join("catalogos_detalle CF"," capacitaciones.idCursoFue= CF.id  ","left");
        $builder->join("catalogos_detalle EA"," capacitaciones.idEficienciaAdicional= EA.id  ","left");
        //$builder->join("catalogos_detalle ID"," capacitaciones.idIdioma= ID.id  ","left");
        //$builder->join("catalogos_detalle IE"," capacitaciones.idIdiomaEscritura= IE.id  ","left");
        //$builder->join("catalogos_detalle IL"," capacitaciones.idIdiomaLectura= IL.id  ","left");
        //$builder->join("catalogos_detalle IC"," capacitaciones.idIdiomaConversacion= IC.id  ","left");
       // $builder->join("catalogos_detalle TH"," capacitaciones.idTipoHabilidad= TH.id  ","left");
        //$builder->join("catalogos_detalle GH"," capacitaciones.idGradoHabilidad= GH.id  ","left");
        //$builder->join("catalogos_detalle TA"," capacitaciones.idTipoAgrupacion= TA.id  ","left");
        
        $builder->join("sys_usuarios_admin UA","capacitaciones.createdby = UA.id","left");
        $builder->join("sys_usuarios_admin UU","capacitaciones.updatedby = UU.id","left");
        $builder->where('capacitaciones.idPersonal', $id);
        return $builder->get()->getRow();
    }

    public function GetSanciones($id){
        $builder = $this->db->table('sanciones');
        $builder->select("tipo_sancion,determinacion,descripcion_sancion,situacion,inicio_habilitacion,termino_habilitacion,dependencia,CONCAT(UA.nombre,' ' ,UA.apellido_paterno) AS createdby,CONCAT(UU.nombre,' ' ,UU.apellido_paterno) AS updatedby");
        //$builder->join("catalogos_detalle ES"," sanciones.idEstado= ES.id  ","left");
        //$builder->join("catalogos_detalle TF"," sanciones.idTipoFuero= TF.id  ","left");
        $builder->join("sys_usuarios_admin UA","sanciones.createdby = UA.id","left");
        $builder->join("sys_usuarios_admin UU","sanciones.updatedby = UU.id","left");
        $builder->where('sanciones.idPersonal', $id);
        return $builder->get()->getRow();
    }

    public function GetDocumentos($idEmpresa){
        $builder = $this->db->table('documentos_expediente_digital');
        $builder->select('id,documento,tipo');
        $builder->join("documentos","documentos_expediente_digital.id = documentos.idDocExp","left");
        $builder->orderBy("documento","asc");
        $builder->where('activo', true);
        $builder->where('nombre_documento IS NULL');
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


    public function GetDocumentosById($id){
        $builder = $this->db->table('documentos_expediente_digital');
        $builder->select('documentos.idDocumento,documento,tipo');
        $builder->join("documentos"," documentos_expediente_digital.id= documentos.idDocExp  ","left");
        $builder->orderBy("documento","asc");
        $builder->where('activo', true);
        $builder->where('idPersonal', $id);
        return $builder->get()->getResult();
        
    }

    public function GetCuipExcel(){
        $builder = $this->db->table("datos_personales");
        $builder->select("apellido_paterno,apellido_materno, CONCAT(primer_nombre,' ' ,segundo_nombre) AS nombre,fecha_nacimiento,idEntidadNacimiento,munNacimiento.claveMunicipio AS idMunicipioNacimiento,genero.idReferencia AS idGenero,civil.idReferencia AS idEstadoCivil,nivelEducativo.idreferencia AS idNivelEducativo,escuela,especialidad,rfc,clave_electoral,cartilla_smn,curp,calle,numero_exterior,numero_interior,colonia,idCodigoPostal,numero_telefono,idEstado,municipio,fecha_ingreso,idEstado_adscripcion,
            munAdscripcion.claveMunicipio AS municipio_adscripcion,
            Complexion.idReferencia AS complexion,
            TSangre.idReferencia AS tiposangre,
            SangreRH.idReferencia AS rhSangre,
            Anteojos.idReferencia AS anteojos,
            estatura,
            peso,
            ColorPiel.idReferencia AS colorPiel,
            Cara.idReferencia AS cara,
            CantidadCabello.idReferencia AS cantidadCabello,
            CabelloColor.idReferencia AS colorCabello,
            CabelloForma.idReferencia AS formaCabello,
            CabelloCalvicie.idReferencia AS calvicieCabello,
            CabelloImplantacion.idReferencia AS implantacionCabello,
            FrenteAltura.idReferencia AS frenteAltura,
            FrenteInclinacion.idReferencia AS frenteInclinacion,
            FrenteAncho.idReferencia AS frenteAncho,
            CejasDireccion.idReferencia AS direccionCejas,
            CejasImplantacion.idReferencia AS implantacionCejas,
            CejasFormas.idReferencia AS formasCejas,
            CejasTam.idReferencia AS tamCejas,
            OjosColor.idReferencia AS ojosColor,
            OjosForma.idReferencia AS ojosForma,
            OjosTam.idReferencia AS TamOjos,
            Raiz.idReferencia AS Raiz,
            Dorso.idReferencia AS Dorso,
            AnchoNariz.idReferencia AS AnchoNariz,
            BaseNariz.idReferencia AS BaseNariz,
            AlturaNariz.idReferencia AS AlturaNariz,
            TamanoBoca.idReferencia AS TamanoBoca,
            Comisuras.idReferencia AS Comisuras,
            EspesorLabio.idReferencia AS EspesorLabio,
            AlturaNasolabial.idReferencia AS AlturaNasolabial,
            ProminenciaLabio.idReferencia AS ProminenciaLabio,
            MentonTipo.idReferencia AS MentonTipo,
            MentonForma.idReferencia AS MentonForma,
            MentonInclinacion.idReferencia AS MentonInclinacion,
            FormaOreja.idReferencia AS FormaOreja,
            Original.idReferencia AS Original,
            Superior.idReferencia AS Superior,
            Posterior.idReferencia AS Posterior,
            AdherenciaHelix.idReferencia AS AdherenciaHelix,
            ContornoLobulo.idReferencia AS ContornoLobulo,
            AdherenciaLobulo.idReferencia AS AdherenciaLobulo,
            Particularidad.idReferencia AS Particularidad,
            DimensionLobulo.idReferencia AS DimensionLobulo,
            apellido_paterno_fam,
            apellido_materno_fam, 
            CONCAT(primer_nombre_fam,' ' ,segundo_nombre_fam) AS nombreFam,
            generoFam.idReferencia AS idGenero_fam,
            ocupacionFam.idReferencia AS ocupacion_fam,
            parentescoFam.idReferencia AS idParentesco_fam,
            calle_fam,
            numero_exterior_fam,
            numero_interior_fam,
            colonia_fam,
            idCodigoPostal_fam,
            numero_telefono_fam,
            idEstado_fam,
            munReferencia.claveMunicipio AS municipio_fam,
            ciudad_fam
            ");
        $builder->join("catalogos_detalle AS genero","datos_personales.idGenero = genero.id","left");
        $builder->join("catalogos_detalle AS civil","datos_personales.idEstadoCivil = civil.id","left");
        $builder->join("media_filiacion","datos_personales.id = media_filiacion.idPersonal","inner");
        $builder->join("catalogos_detalle AS Complexion","media_filiacion.idComplexion = Complexion.id","left");
        $builder->join("catalogos_detalle AS TSangre","media_filiacion.idSangreTipo = TSangre.id","left");
        $builder->join("catalogos_detalle AS SangreRH","media_filiacion.idRH = SangreRH.id","left");
        $builder->join("catalogos_detalle AS Anteojos","media_filiacion.idUsaAnteojos = Anteojos.id","left");
        $builder->join("catalogos_detalle AS ColorPiel","media_filiacion.idPiel = ColorPiel.id","left");
        $builder->join("catalogos_detalle AS Cara","media_filiacion.idCara = Cara.id","left");
        $builder->join("catalogos_detalle AS CantidadCabello","media_filiacion.idCantidadCabello = CantidadCabello.id","left");
        $builder->join("catalogos_detalle AS CabelloColor","media_filiacion.idColorCabello = CabelloColor.id","left");
        $builder->join("catalogos_detalle AS CabelloForma","media_filiacion.idFormaCabello = CabelloForma.id","left");
        $builder->join("catalogos_detalle AS CabelloCalvicie","media_filiacion.idCalvicie = CabelloCalvicie.id","left");
        $builder->join("catalogos_detalle AS CabelloImplantacion","media_filiacion.idImplantacionCabello = CabelloImplantacion.id","left");
        $builder->join("catalogos_detalle AS FrenteAltura","media_filiacion.idAlturaFrente = FrenteAltura.id","left");
        $builder->join("catalogos_detalle AS FrenteInclinacion","media_filiacion.idInclinacionFrente = FrenteInclinacion.id","left");
        $builder->join("catalogos_detalle AS FrenteAncho","media_filiacion.idAnchoFrente = FrenteAncho.id","left");
        $builder->join("catalogos_detalle AS CejasDireccion","media_filiacion.idDireccionCejas = CejasDireccion.id","left");
        $builder->join("catalogos_detalle AS CejasImplantacion","media_filiacion.idImplantacionCejas = CejasImplantacion.id","left");
        $builder->join("catalogos_detalle AS CejasFormas","media_filiacion.idFormaCejas = CejasFormas.id","left");
        $builder->join("catalogos_detalle AS CejasTam","media_filiacion.idTamanoCejas = CejasTam.id","left");
        $builder->join("catalogos_detalle AS OjosColor","media_filiacion.idColorOjos = OjosColor.id","left");
        $builder->join("catalogos_detalle AS OjosForma","media_filiacion.idFormaOjos = OjosForma.id","left");
        $builder->join("catalogos_detalle AS OjosTam","media_filiacion.idTamanoOjos = OjosTam.id","left");
        $builder->join("catalogos_detalle AS Raiz","media_filiacion.idRaiz = Raiz.id","left");
        $builder->join("catalogos_detalle AS Dorso","media_filiacion.idDorso = Dorso.id","left");
        $builder->join("catalogos_detalle AS AnchoNariz","media_filiacion.idAnchoNariz = AnchoNariz.id","left");
        $builder->join("catalogos_detalle AS BaseNariz","media_filiacion.idBaseNariz = BaseNariz.id","left");
        $builder->join("catalogos_detalle AS AlturaNariz","media_filiacion.idAlturaNariz = AlturaNariz.id","left");
        $builder->join("catalogos_detalle AS TamanoBoca","media_filiacion.idTamanoBoca = TamanoBoca.id","left");
        $builder->join("catalogos_detalle AS Comisuras","media_filiacion.idComisuras = Comisuras.id","left");
        $builder->join("catalogos_detalle AS EspesorLabio","media_filiacion.idEspesorLabio = EspesorLabio.id","left");
        $builder->join("catalogos_detalle AS AlturaNasolabial","media_filiacion.idAlturaNasolabial = AlturaNasolabial.id","left");
        $builder->join("catalogos_detalle AS ProminenciaLabio","media_filiacion.idProminenciaLabio = ProminenciaLabio.id","left");
        $builder->join("catalogos_detalle AS MentonTipo","media_filiacion.idMentonTipo = MentonTipo.id","left");
        $builder->join("catalogos_detalle AS MentonForma","media_filiacion.idMentonForma = MentonForma.id","left");
        $builder->join("catalogos_detalle AS MentonInclinacion","media_filiacion.idMentonInclinacion = MentonInclinacion.id","left");
        $builder->join("catalogos_detalle AS FormaOreja","media_filiacion.idFormaOreja = FormaOreja.id","left");
        $builder->join("catalogos_detalle AS Original","media_filiacion.idOriginal = Original.id","left");
        $builder->join("catalogos_detalle AS Superior","media_filiacion.idSuperior = Superior.id","left");
        $builder->join("catalogos_detalle AS Posterior","media_filiacion.idPosterior = Posterior.id","left");
        $builder->join("catalogos_detalle AS AdherenciaHelix","media_filiacion.idAdherenciaHelix = AdherenciaHelix.id","left");
        $builder->join("catalogos_detalle AS ContornoLobulo","media_filiacion.idContornoLobulo = ContornoLobulo.id","left");
        $builder->join("catalogos_detalle AS AdherenciaLobulo","media_filiacion.idAdherenciaLobulo = AdherenciaLobulo.id","left");
        $builder->join("catalogos_detalle AS Particularidad","media_filiacion.idParticularidad = Particularidad.id","left");
        $builder->join("catalogos_detalle AS DimensionLobulo","media_filiacion.idDimensionLobulo = DimensionLobulo.id","left");
        $builder->join("referencias","datos_personales.id = referencias.idPersonal","left");
        $builder->join("catalogos_detalle AS generoFam","referencias.idGenero_fam = generoFam.id","left");
        $builder->join("catalogos_detalle AS ocupacionFam","referencias.ocupacion_fam = ocupacionFam.id","left");
        $builder->join("catalogo_referencias AS parentescoFam","referencias.idParentesco_fam = parentescoFam.id","left");

        $builder->join("catalogos_detalle AS nivelEducativo","datos_personales.idNivelEducativo = nivelEducativo.id","left");
        $builder->join("estados_detalles AS munReferencia","referencias.municipio_fam = munReferencia.id","left");
        $builder->join("estados_detalles AS munAdscripcion","datos_personales.municipio_adscripcion = munAdscripcion.id","left");
        $builder->join("estados_detalles AS munNacimiento","datos_personales.idMunicipioNacimiento = munNacimiento.id","left");
        $builder->where("datos_personales.activo",true);
        $builder->where("Cuip",'');
        
        $builder->orderBy("primer_nombre","asc");
        return $builder->get()->getResult();
        
    }


    public function GetPreConsulta(){
        $builder = $this->db->table("datos_personales");
        $builder->select("apellido_paterno,apellido_materno, CONCAT(primer_nombre,' ' ,segundo_nombre) AS nombre,curp,rfc,fecha_nacimiento");
        $builder->where("activo",true);
        $builder->where("Cuip",'');
        $builder->orderBy("primer_nombre","asc");
        return $builder->get()->getResult();
        
    }

    public function GetParenteco($tipo){
        $builder = $this->db->table('catalogo_referencias');
        $builder->select('id, parentesco AS valor');
        $builder->where("activo",true);
        $builder->where("cve_parentesco",$tipo);
        $builder->orderBy("valor","asc");
        return $builder->get()->getResult();
        
    }


    public function GetParentecoAll(){
        $builder = $this->db->table('catalogo_referencias');
        $builder->select('id, parentesco AS valor');
        $builder->where("activo",true);
        
        $builder->orderBy("valor","asc");
        return $builder->get()->getResult();
        
    }

    public function GetExperienciaPersonalesById($id){
        $builder = $this->db->table('datos_personales_experiencia');
        $builder->select("nombre_curso,nombre_institucion,fecha_inicio,fecha_termino,certificado_por");
        $builder->where('idPersonales', $id);
        return $builder->get()->getResult();
    }

    public function GetReferenciaById($id){
        $builder = $this->db->table('referencias');
        $builder->select("apellido_paterno_fam, apellido_materno_fam, primer_nombre_fam, segundo_nombre_fam, idGenero_fam, ocupacion_fam, idParentesco_fam, calle_fam, numero_exterior_fam, numero_interior_fam, colonia_fam, idCodigoPostal_fam, numero_telefono_fam, idPaisNacimiento_fam, idEstado_fam, municipio_fam, ciudad_fam, apellido_paterno_pariente, apellido_materno_pariente, primer_nombre_pariente, segundo_nombre_pariente, idGenero_pariente, ocupacion_pariente, idParentesco_pariente, calle_pariente, numero_exterior_pariente, numero_interior_pariente, colonia_pariente, idCodigoPostal_pariente, numero_telefono_pariente, idPaisNacimiento_pariente, idEstado_pariente, municipio_pariente, ciudad_pariente, apellido_paterno_personal, apellido_materno_personal, primer_nombre_personal, segundo_nombre_personal, idGenero_personal, ocupacion_personal, idParentesco_personal, calle_personal, numero_exterior_personal, numero_interior_personal, colonia_personal, idCodigoPostal_personal, numero_telefono_personal, idPaisNacimiento_personal, idEstado_personal, municipio_personal, ciudad_personal, apellido_paterno_laboral, apellido_materno_laboral, primer_nombre_laboral, segundo_nombre_laboral, idGenero_laboral, ocupacion_laboral, idParentesco_laboral, calle_laboral, numero_exterior_laboral, numero_interior_laboral, colonia_laboral, idCodigoPostal_laboral, numero_telefono_laboral, idPaisNacimiento_laboral, idEstado_laboral, municipio_laboral, ciudad_laboral");
        $builder->where('idPersonal', $id);
        return $builder->get()->getRow();
    }


    public function GetSocioEconomicoDependientesById($id){
        $builder = $this->db->table('estudio_socioeconomico_dependientes');
        $builder->select("apellido_paterno, apellido_materno, primer_nombre, segundo_nombre, fecha_nacimiento, idGenero, idParentesco");
        $builder->where('idSocioeconomico', $id);
        return $builder->get()->getResult();
    }

    public function GetResolucionesById($id){
        $builder = $this->db->table('resoluciones_ministeriales');
        $builder->select("institucion_emisora, idEstado, delitos, motivos, numero_expediente, agencia_mp, averiguacion_previa, idTipoFuero, estado_averiguacion, inicio_averiguacion, aldia_averiguacion, juzgado, num_proceso, estado_procesal, inicio_proceso, aldia_proceso");
        $builder->where('idPersonal', $id);
        return $builder->get()->getResult();
    }

    public function GetEstimulosById($id){
        $builder = $this->db->table('estimulos_recibidos');
        $builder->select("tipo_estimulo, descripcion_estimulo, dependencia_otorga, otorgado");
        $builder->where('idPersonal', $id);
        return $builder->get()->getResult();
    }

    public function GetCapacitacionesPublicById($id){
        $builder = $this->db->table('capacitacion_publica');
        $builder->select("dependencia, inst_capacitadora, nombre_curso, tema_curso, idNivel_curso, idEficienciaCurso, inicio_curso, conclusion_curso, duracion_horas_curso, tipo_comprobante");
        $builder->where('idPersonal', $id);
        return $builder->get()->getResult();
    }

    public function GetIdiomasById($id){
        $builder = $this->db->table('idiomas_dialectos');
        $builder->select("idIdioma, idIdiomaLectura, idIdiomaEscritura, idIdiomaConversacion");
        $builder->where('idPersonal', $id);
        return $builder->get()->getResult();
    }

    public function GetHabilidadesById($id){
        $builder = $this->db->table('habilidades_haptitudes');
        $builder->select("idTipoHabilidad, especifique_habilidad, idGradoHabilidad");
        $builder->where('idPersonal', $id);
        return $builder->get()->getResult();
    }

    public function GetAgrupacionesById($id){
        $builder = $this->db->table('afiliacion_agrupaciones');
        $builder->select("nombre_agrupacion, idTipoAgrupacion, desde, hasta");
        $builder->where('idPersonal', $id);
        return $builder->get()->getResult();
    }

    public function GetMedFiliacionById($id){
        $builder = $this->db->table('media_filiacion');
        $builder->select("idComplexion, idPiel, idCara, idCantidadCabello, idColorCabello, idFormaCabello, idCalvicie, idImplantacionCabello, idAlturaFrente, idInclinacionFrente, idAnchoFrente, idDireccionCejas, idImplantacionCejas, idFormaCejas, idTamanoCejas, idColorOjos, idFormaOjos, idTamanoOjos, idRaiz, idDorso, idAnchoNariz, idBaseNariz, idAlturaNariz, idTamanoBoca, idComisuras, idEspesorLabio, idAlturaNasolabial, idProminenciaLabio, idMentonTipo, idMentonForma, idMentonInclinacion, idFormaOreja, idOriginal, idSuperior, idPosterior, idAdherenciaHelix, idContornoLobulo, idAdherenciaLobulo, idParticularidad, idDimensionLobulo, idSangreTipo, idRH, idUsaAnteojos, estatura, peso, idCicatrices, descrip_cicatrices, idTatuajes, descrip_tatuajes, idLunares, descrip_lunares, idDefectos, descrip_defectos, idProtesis, descrip_protesis, idDiscapacidad, descrip_discapacidad");
        $builder->where('idPersonal', $id);
        return $builder->get()->getRow();
    }
    
}
