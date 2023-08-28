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
        $builder->select('cuip, datos_personales.id,primer_nombre,segundo_nombre,apellido_paterno,apellido_materno,media_filiacion.idPersonal,respuesta,fecha_consulta,numEmpleado');
        $builder->join("media_filiacion"," datos_personales.id= media_filiacion.idPersonal","left");
        $builder->join("datos_empleado"," datos_personales.id= datos_empleado.idPersonal","left");
        $builder->orderBy("primer_nombre","asc");
        $builder->orderBy("apellido_paterno","asc");
       // $builder->where("cuip","");
       // $builder->where("respuesta != 'INACTIVO'");
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
        $builder->select("'' AS institucion,'' AS dependencia,NE.estado AS naciE,E.estado AS estado, idCodigoPostal AS postal,FN.valor AS nacionalidad,EC.valor AS civil,MN.valor AS nacion, MNP.descripcion AS muniE,idMunicipioNacimiento, CNP.descripcion AS ciudE,idCiudadNacimiento ,PN.valor AS pais,datos_personales.apellido_paterno,datos_personales.apellido_materno,primer_nombre,segundo_nombre,fecha_nacimiento,SG.valor AS sexo,rfc,clave_electoral,cartilla_smn,licencia_conducir,DA.valor as desarrollo_academico,vigencia_licencia,curp,pasaporte,fecha_naturalizacion,escuela,especialidad,cedula_profesional,año_inicio,año_termino,RS.valor AS registro_sep,folio_certificado,calle,numero_exterior,numero_interior,colonia,entre_calle1,entre_calle2,numero_telefono,ED.descripcion AS municipio,municipio AS idMunicipio,ciudad,dependencia,institucion,fecha_ingreso,PT.valor AS puesto,RG.valor AS rango,NM.valor AS nivel_mando,nombre_jefe,EA.estado AS idEstado_adscripcion,municipio_adscripcion AS idMunAdscripcion,MA.descripcion AS municipio_adscripcion,calle_adscripcion,numero_exterior_adscripcion,numero_interior_adscripcion,entre_calle1_adscripcion,entre_calle2_adscripcion,numero_telefono_adscripcion,idCodigoPostal_adscripcion,colonia_adscripcion,ADA.estado AS idEstado_dom_adscripcion,idEstado_dom_adscripcion AS idEdoDomAdscripcion,AMA.descripcion AS municipio_delegacion,municipio_delegacion AS idMunDomAdscripcion,ciudad_poblacion,CONCAT(UA.nombre,' ' ,UA.apellido_paterno) AS createdby,CONCAT(UU.nombre,' ' ,UU.apellido_paterno) AS updatedby");
        $builder->join("catalogos_detalle SG"," datos_personales.idGenero= SG.id  ","left");
        $builder->join("catalogos_detalle FN","datos_personales.idFormaNacionalidad = FN.id ","left");
        $builder->join("catalogos_detalle RS","datos_personales.registro_sep = RS.id ","left");
        $builder->join("catalogos_detalle DA","datos_personales.idNivelEducativo = DA.id ","left");
        $builder->join("catalogos_detalle PN"," datos_personales.idPaisNacimiento= PN.id ","left");
        $builder->join("estados NE"," datos_personales.idEntidadNacimiento= NE.claveEstado","left");
        $builder->join("estados_detalles MA"," datos_personales.municipio_adscripcion= MA.claveMunicipio","left");
        $builder->join("estados_detalles MNP"," datos_personales.idMunicipioNacimiento= MNP.claveMunicipio","left");
        $builder->join("estados_detalles CNP"," datos_personales.idCiudadNacimiento = CNP.claveMunicipio","left");
        $builder->join("estados E"," datos_personales.idEstado= E.claveEstado","left");
        $builder->join("estados EA"," datos_personales.idEstado_adscripcion= EA.claveEstado","left");
        $builder->join("estados ADA"," datos_personales.idEstado_dom_adscripcion= ADA.claveEstado","left");
        $builder->join("catalogos_detalle MN"," datos_personales.idNacionalidad= MN.id ","left");
        $builder->join("catalogos_detalle EC"," datos_personales.idEstadoCivil= EC.id  ","left");
        $builder->join("catalogos_detalle NM"," datos_personales.nivel_mando= NM.id  ","left");
        $builder->join("catalogos_detalle RG"," datos_personales.rango= RG.id  ","left");
        $builder->join("estados_detalles ED"," datos_personales.municipio= ED.claveMunicipio","left");
        $builder->join("estados_detalles AMA"," datos_personales.municipio_delegacion= AMA.claveMunicipio","left");
        $builder->join("catalogos_detalle PT"," datos_personales.puesto= PT.id  ","left");
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
        $builder->select("empleos_seg_publica.id,dependencia,corporacion,calle,numero_interior,numero_exterior,colonia,idCodigoPostal,numero_telefono,ingreso,separacion,idPuestoFuncional AS funcional,funciones,especialidad,rango,numero_placa,numero_empleado,sueldo_base,compensacion,area,division,cuip_jefe,nombre_jefe,idEstado AS estado,municipio,idMotivoSeparacion AS motivoSeparacion,tipo_separacion,tipo_baja,comentarios,CONCAT(UA.nombre,' ' ,UA.apellido_paterno) AS createdby,CONCAT(UU.nombre,' ' ,UU.apellido_paterno) AS updatedby");
        
        $builder->join("sys_usuarios_admin UA","empleos_seg_publica.createdby = UA.id","left");
        $builder->join("sys_usuarios_admin UU","empleos_seg_publica.updatedby = UU.id","left");
        $builder->where('empleos_seg_publica.idPersonal', $id);
        return $builder->get()->getRow();
    }

    public function GetEmpleosDiversos($id)
    {
        $builder = $this->db->table('empleos_diversos');
        $builder->select("empleos_diversos.id,empresa,calle,numero_exterior,numero_interior,colonia,idCodigoPostal,numero_telefono,ingreso,area,sueldo_base,idEstado AS estado,municipio,idMotivoSeparacion AS separacion,tipo_separacion,comentarios,eligio_empleo,puesto_gustaria,area_gustaria,tiempo_ascenso,RR.valor AS reglamento,RA.valor AS razon_ascenso,capacitacion,TD.valor AS disciplina,subtipo_disciplina,motivo,tipo,fecha_inicio,fecha_termino,funciones,razon_no_reconocimiento,razon_no_ascenso,TDU.valor AS duracion,cantidad,CONCAT(UA.nombre,' ' ,UA.apellido_paterno) AS createdby,CONCAT(UU.nombre,' ' ,UU.apellido_paterno) AS updatedby");
        $builder->join("catalogos_detalle RR"," empleos_diversos.reglamento= RR.id  ","left");
        $builder->join("catalogos_detalle RA"," empleos_diversos.razon_ascenso= RA.id  ","left");
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
        return $builder->get()->getResult();
    }

    public function GetSanciones($id){
        $builder = $this->db->table('sanciones');
        $builder->select("tipo_sancion,determinacion,descripcion_sancion,situacion,inicio_habilitacion,termino_habilitacion,dependencia,CONCAT(UA.nombre,' ' ,UA.apellido_paterno) AS createdby,CONCAT(UU.nombre,' ' ,UU.apellido_paterno) AS updatedby");
        //$builder->join("catalogos_detalle ES"," sanciones.idEstado= ES.id  ","left");
        //$builder->join("catalogos_detalle TF"," sanciones.idTipoFuero= TF.id  ","left");
        $builder->join("sys_usuarios_admin UA","sanciones.createdby = UA.id","left");
        $builder->join("sys_usuarios_admin UU","sanciones.updatedby = UU.id","left");
        $builder->where('sanciones.idPersonal', $id);
        return $builder->get()->getResult();
    }

    public function GetDocumentos($idEmpresa,$id){
        $builder = $this->db->table('documentos_expediente_digital');
        $builder->select('id,documento,tipo');
        $builder->join("documentos","documentos_expediente_digital.id = documentos.idDocExp AND documentos.idPersonal = '$id'","left");
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
        $builder->select("apellido_paterno,apellido_materno, CONCAT(primer_nombre,' ' ,segundo_nombre) AS nombre,fecha_nacimiento,idEntidadNacimiento,munNacimiento.claveMunicipio AS idMunicipioNacimiento,genero.idReferencia AS idGenero,civil.idReferencia AS idEstadoCivil,nivelEducativo.idreferencia AS idNivelEducativo,escuela,especialidad,rfc,clave_electoral,cartilla_smn,curp,calle,numero_exterior,numero_interior,colonia,idCodigoPostal,numero_telefono,idEstado,munDireccion.claveMunicipio AS municipio,fecha_ingreso,idEstado_adscripcion,
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
        $builder->join("estados_detalles AS munDireccion","datos_personales.municipio = munDireccion.id","left");
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
        $builder->where("fecha_consulta = '0000-00-00 00:00:00'");
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
        $builder->select("referencias.id,apellido_paterno_fam, apellido_materno_fam, primer_nombre_fam, segundo_nombre_fam, SF.valor AS idGenero_fam, OF.valor AS ocupacion_fam, RF.parentesco AS idParentesco_fam, calle_fam, numero_exterior_fam, numero_interior_fam, colonia_fam, idCodigoPostal_fam, numero_telefono_fam,PF.valor AS  idPaisNacimiento_fam, EF.estado AS idEstado_fam, MF.descripcion AS municipio_fam,municipio_fam AS idMunciRefer, ciudad_fam, apellido_paterno_pariente, apellido_materno_pariente, primer_nombre_pariente, segundo_nombre_pariente, 
            SPA.valor AS idGenero_pariente,
            OPA.valor AS ocupacion_pariente,
            RPA.parentesco AS idParentesco_pariente, calle_pariente, numero_exterior_pariente, numero_interior_pariente, colonia_pariente, idCodigoPostal_pariente, numero_telefono_pariente,
            PPA.valor AS idPaisNacimiento_pariente, 
            EPA.estado AS idEstado_pariente,
            MPA.descripcion AS municipio_pariente,municipio_pariente AS idMuniRefPariente, ciudad_pariente");
        $builder->join("catalogos_detalle SF","referencias.idGenero_fam = SF.id","left");
        $builder->join("catalogos_detalle OF","referencias.ocupacion_fam = OF.id","left");
        $builder->join("catalogo_referencias RF","referencias.idParentesco_fam = RF.id","left");
        $builder->join("catalogos_detalle PF","referencias.idPaisNacimiento_fam = PF.id","left");
        $builder->join("estados EF","referencias.idEstado_fam = EF.claveEstado","left");
        $builder->join("estados_detalles MF","referencias.municipio_fam = MF.claveMunicipio","left");
        $builder->join("catalogos_detalle SPA","referencias.idGenero_pariente = SPA.id","left");
        $builder->join("catalogos_detalle OPA","referencias.ocupacion_pariente = OPA.id","left");
        $builder->join("catalogo_referencias RPA","referencias.idParentesco_pariente = RPA.id","left");
        $builder->join("catalogos_detalle PPA","referencias.idPaisNacimiento_pariente = PPA.id","left");
        $builder->join("estados EPA","referencias.idEstado_pariente = EPA.claveEstado","left");
        $builder->join("estados_detalles MPA","referencias.municipio_pariente = MPA.claveMunicipio","left");
        $builder->where('idPersonal', $id);
        return $builder->get()->getRow();
    }


    public function GetReferenciaLabById($id){
        $builder = $this->db->table('referencias');
        $builder->select("apellido_paterno_personal, apellido_materno_personal, primer_nombre_personal, segundo_nombre_personal,
            SPE.valor AS idGenero_personal, 
            OPE.valor AS ocupacion_personal,
            RPE.parentesco AS idParentesco_personal, calle_personal, numero_exterior_personal, numero_interior_personal, colonia_personal, idCodigoPostal_personal, numero_telefono_personal,
            PPE.valor AS idPaisNacimiento_personal,
            EPE.estado AS idEstado_personal,
            MPE.descripcion AS municipio_personal, municipio_personal AS idMuniRefePersonal,ciudad_personal, apellido_paterno_laboral, apellido_materno_laboral, primer_nombre_laboral, segundo_nombre_laboral,
            SLA.valor AS idGenero_laboral,
            OLA.valor AS ocupacion_laboral,
            RLA.parentesco AS idParentesco_laboral, calle_laboral, numero_exterior_laboral, numero_interior_laboral, colonia_laboral, idCodigoPostal_laboral, numero_telefono_laboral,
            PLA.valor AS idPaisNacimiento_laboral,
            ELA.estado AS idEstado_laboral,
            MLA.descripcion AS municipio_laboral, municipio_laboral AS idRefeMuniLaboral, ciudad_laboral");
        $builder->join("catalogos_detalle SPE","referencias.idGenero_personal = SPE.id","left");
        $builder->join("catalogos_detalle OPE","referencias.ocupacion_personal = OPE.id","left");
        $builder->join("catalogo_referencias RPE","referencias.idParentesco_personal = RPE.id","left");
        $builder->join("catalogos_detalle PPE","referencias.idPaisNacimiento_personal = PPE.id","left");
        $builder->join("estados EPE","referencias.idEstado_personal = EPE.claveEstado","left");
        $builder->join("estados_detalles MPE","referencias.municipio_personal = MPE.claveMunicipio","left");
        $builder->join("catalogos_detalle SLA","referencias.idGenero_laboral = SLA.id","left");
        $builder->join("catalogos_detalle OLA","referencias.ocupacion_laboral = OLA.id","left");
        $builder->join("catalogo_referencias RLA","referencias.idParentesco_laboral = RLA.id","left");
        $builder->join("catalogos_detalle PLA","referencias.idPaisNacimiento_laboral = PLA.id","left");
        $builder->join("estados ELA","referencias.idEstado_laboral = ELA.claveEstado","left");
        $builder->join("estados_detalles MLA","referencias.municipio_laboral = MLA.claveMunicipio","left");
        $builder->where('idPersonal', $id);
        return $builder->get()->getRow();
    }


    public function GetSocioEconomicoDependientesById($id){
        $builder = $this->db->table('estudio_socioeconomico_dependientes');
        $builder->select("apellido_paterno, apellido_materno, primer_nombre, segundo_nombre, fecha_nacimiento, catalogos_detalle.valor AS idGenero, parentesco AS idParentesco");
        $builder->join("catalogos_detalle","estudio_socioeconomico_dependientes.idGenero = catalogos_detalle.id","left");
        $builder->join("catalogo_referencias","estudio_socioeconomico_dependientes.idParentesco = catalogo_referencias.id","left");
        $builder->where('idSocioeconomico', $id);
        return $builder->get()->getResult();
    }

    public function GetResolucionesById($id){
        $builder = $this->db->table('resoluciones_ministeriales');
        $builder->select("institucion_emisora, estados.estado AS idEstado, delitos, motivos, numero_expediente, agencia_mp, averiguacion_previa, catalogos_detalle.valor AS idTipoFuero, estado_averiguacion, inicio_averiguacion, aldia_averiguacion, juzgado, num_proceso, estado_procesal, inicio_proceso, aldia_proceso");
        $builder->join("catalogos_detalle","resoluciones_ministeriales.idTipoFuero = catalogos_detalle.id","left");
        $builder->join("estados","resoluciones_ministeriales.idEstado = estados.claveEstado","left");
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
        $builder->select("dependencia, inst_capacitadora, nombre_curso, tema_curso, catalogos_detalle.valor AS idNivel_curso, EF.valor AS idEficienciaCurso, inicio_curso, conclusion_curso, duracion_horas_curso, tipo_comprobante");
        $builder->join("catalogos_detalle","capacitacion_publica.idNivel_curso = catalogos_detalle.id","left");
        $builder->join("catalogos_detalle EF","capacitacion_publica.idEficienciaCurso = EF.id","left");
        $builder->where('idPersonal', $id);
        return $builder->get()->getResult();
    }

    public function GetIdiomasById($id){
        $builder = $this->db->table('idiomas_dialectos');
        $builder->select("ID.valor AS idIdioma,IL.valor AS  idIdiomaLectura, IE.valor AS idIdiomaEscritura, IC.valor AS idIdiomaConversacion");
        $builder->join("catalogos_detalle ID","idiomas_dialectos.idIdioma = ID.id","left");
        $builder->join("catalogos_detalle IL","idiomas_dialectos.idIdiomaLectura = IL.id","left");
        $builder->join("catalogos_detalle IE","idiomas_dialectos.idIdiomaEscritura = IE.id","left");
        $builder->join("catalogos_detalle IC","idiomas_dialectos.idIdiomaConversacion = IC.id","left");
        $builder->where('idPersonal', $id);
        return $builder->get()->getResult();
    }

    public function GetHabilidadesById($id){
        $builder = $this->db->table('habilidades_haptitudes');
        $builder->select("THA.valor AS idTipoHabilidad, especifique_habilidad,GHA.valor AS  idGradoHabilidad");
        $builder->join("catalogos_detalle THA","habilidades_haptitudes.idTipoHabilidad = THA.id","left");
        $builder->join("catalogos_detalle GHA","habilidades_haptitudes.idGradoHabilidad = GHA.id","left");
        $builder->where('idPersonal', $id);
        return $builder->get()->getResult();
    }

    public function GetAgrupacionesById($id){
        $builder = $this->db->table('afiliacion_agrupaciones');
        $builder->select("nombre_agrupacion, catalogos_detalle.valor AS idTipoAgrupacion, desde, hasta");
        $builder->join("catalogos_detalle","afiliacion_agrupaciones.idTipoAgrupacion = catalogos_detalle.id","left");
        $builder->where('idPersonal', $id);
        return $builder->get()->getResult();
    }

    public function GetMedFiliacionById($id){
        $builder = $this->db->table('media_filiacion');
        $builder->select("media_filiacion.id, IC.valor AS idComplexion,IP.valor AS idPiel,ICA.valor AS idCara,ICAC.valor AS idCantidadCabello,ICC.valor AS idColorCabello,IFC.valor AS idFormaCabello,ICV.valor AS idCalvicie,IIC.valor AS idImplantacionCabello,IAF.valor AS idAlturaFrente,IICF.valor AS idInclinacionFrente,IAFF.valor AS idAnchoFrente,IDC.valor AS idDireccionCejas,IICJ.valor AS idImplantacionCejas,IFCJ.valor AS idFormaCejas,ITC.valor AS  idTamanoCejas,ICO.valor AS idColorOjos,IFO.valor AS idFormaOjos,ITO.valor AS idTamanoOjos,IR.valor AS idRaiz,ID.valor AS idDorso,IAN.valor AS idAnchoNariz,IBN.valor idBaseNariz,IIAN.valor AS idAlturaNariz,IITC.valor AS idTamanoBoca,ICSU.valor AS idComisuras,IEL.valor AS idEspesorLabio,IANL.valor AS idAlturaNasolabial,IPLB.valor AS idProminenciaLabio,IMT.valor AS idMentonTipo,IMF.valor AS idMentonForma,IMIN.valor AS idMentonInclinacion,IFOA.valor AS idFormaOreja,IO.valor AS idOriginal,IS.valor AS idSuperior,IPR.valor AS idPosterior,IAH.valor AS idAdherenciaHelix,ICL.valor AS idContornoLobulo,IALBL.valor AS  idAdherenciaLobulo,IPDAD.valor AS idParticularidad,IDL.valor AS idDimensionLobulo,IST.valor AS idSangreTipo,IRH.valor AS idRH,IUA.valor AS idUsaAnteojos, estatura, peso,ICICA.valor AS idCicatrices, descrip_cicatrices,IT.valor AS idTatuajes, descrip_tatuajes,ILN.valor AS idLunares, descrip_lunares,IDF.valor AS idDefectos, descrip_defectos,IPT.valor AS idProtesis, descrip_protesis,IDCD.valor AS idDiscapacidad, descrip_discapacidad");
        $builder->join("catalogos_detalle IC","media_filiacion.idComplexion = IC.id","left");
        $builder->join("catalogos_detalle IP","media_filiacion.idPiel = IP.id","left");
        $builder->join("catalogos_detalle ICA","media_filiacion.idCara = ICA.id","left");
        $builder->join("catalogos_detalle ICAC","media_filiacion.idCantidadCabello = ICAC.id","left");
        $builder->join("catalogos_detalle ICC","media_filiacion.idColorCabello = ICC.id","left");
        $builder->join("catalogos_detalle IFC","media_filiacion.idFormaCabello = IFC.id","left");
        $builder->join("catalogos_detalle ICV","media_filiacion.idCalvicie = ICV.id","left");
        $builder->join("catalogos_detalle IIC","media_filiacion.idImplantacionCabello = IIC.id","left");
        $builder->join("catalogos_detalle IAF","media_filiacion.idAlturaFrente = IAF.id","left");
        $builder->join("catalogos_detalle IICF","media_filiacion.idInclinacionFrente = IICF.id","left");
        $builder->join("catalogos_detalle IAFF","media_filiacion.idAnchoFrente = IAFF.id","left");
        $builder->join("catalogos_detalle IDC","media_filiacion.idDireccionCejas = IDC.id","left");
        $builder->join("catalogos_detalle IICJ","media_filiacion.idImplantacionCejas = IICJ.id","left");
        $builder->join("catalogos_detalle IFCJ","media_filiacion.idFormaCejas = IFCJ.id","left");
        $builder->join("catalogos_detalle ITC","media_filiacion.idTamanoCejas = ITC.id","left");
        $builder->join("catalogos_detalle ICO","media_filiacion.idColorOjos = ICO.id","left");
        $builder->join("catalogos_detalle IFO","media_filiacion.idFormaOjos = IFO.id","left");
        $builder->join("catalogos_detalle ITO","media_filiacion.idTamanoOjos = ITO.id","left");
        $builder->join("catalogos_detalle IR","media_filiacion.idRaiz = IR.id","left");
        $builder->join("catalogos_detalle ID","media_filiacion.idDorso = ID.id","left");
        $builder->join("catalogos_detalle IAN","media_filiacion.idAnchoNariz = IAN.id","left");
        $builder->join("catalogos_detalle IBN","media_filiacion.idBaseNariz = IBN.id","left");
        $builder->join("catalogos_detalle IIAN","media_filiacion.idAlturaNariz = IIAN.id","left");
        $builder->join("catalogos_detalle IITC","media_filiacion.idTamanoBoca = IITC.id","left");
        $builder->join("catalogos_detalle ICSU","media_filiacion.idComisuras = ICSU.id","left");
        $builder->join("catalogos_detalle IEL","media_filiacion.idEspesorLabio = IEL.id","left");
        $builder->join("catalogos_detalle IANL","media_filiacion.idAlturaNasolabial = IANL.id","left");
        $builder->join("catalogos_detalle IPLB","media_filiacion.idProminenciaLabio = IPLB.id","left");
        $builder->join("catalogos_detalle IMT","media_filiacion.idMentonTipo = IMT.id","left");
        $builder->join("catalogos_detalle IMF","media_filiacion.idMentonForma = IMF.id","left");
        $builder->join("catalogos_detalle IMIN","media_filiacion.idMentonInclinacion = IMIN.id","left");
        $builder->join("catalogos_detalle IFOA","media_filiacion.idFormaOreja = IFOA.id","left");
        $builder->join("catalogos_detalle IO","media_filiacion.idOriginal = IO.id","left");
        $builder->join("catalogos_detalle IS","media_filiacion.idSuperior = IS.id","left");
        $builder->join("catalogos_detalle IPR","media_filiacion.idPosterior = IPR.id","left");
        $builder->join("catalogos_detalle IAH","media_filiacion.idAdherenciaHelix = IAH.id","left");
        $builder->join("catalogos_detalle ICL","media_filiacion.idContornoLobulo = ICL.id","left");
        $builder->join("catalogos_detalle IALBL","media_filiacion.idAdherenciaLobulo = IALBL.id","left");
        $builder->join("catalogos_detalle IPDAD","media_filiacion.idParticularidad = IPDAD.id","left");
        $builder->join("catalogos_detalle IDL","media_filiacion.idDimensionLobulo = IDL.id","left");
        $builder->join("catalogos_detalle IST","media_filiacion.idSangreTipo = IST.id","left");
        $builder->join("catalogos_detalle IRH","media_filiacion.idRH = IRH.id","left");
        $builder->join("catalogos_detalle IUA","media_filiacion.idUsaAnteojos = IUA.id","left");
        $builder->join("catalogos_detalle ICICA","media_filiacion.idCicatrices = ICICA.id","left");
        $builder->join("catalogos_detalle IT","media_filiacion.idTatuajes = IT.id","left");
        $builder->join("catalogos_detalle ILN","media_filiacion.idLunares = ILN.id","left");
        $builder->join("catalogos_detalle IDF","media_filiacion.idDefectos = IDF.id","left");
        $builder->join("catalogos_detalle IPT","media_filiacion.idProtesis = IPT.id","left");
        $builder->join("catalogos_detalle IDCD","media_filiacion.idDiscapacidad = IDCD.id","left");
        $builder->where('idPersonal', $id);
        return $builder->get()->getRow();
    }

    public function GetDocumentosEditById($id){
        $builder = $this->db->table('documentos_expediente_digital');
        $builder->select('documentos_expediente_digital.id,documentos.idDocumento,documento,tipo,idEstatus');
        $builder->join("documentos"," documentos_expediente_digital.id= documentos.idDocExp AND documentos.idPersonal = '$id'","left");
        $builder->orderBy("documento","asc");
        $builder->where('activo', true);
        //$builder->where('idPersonal', $id);
        return $builder->get()->getResult();
        
    }


    public function updateRespuesta( $respuesta, $curp ){

        $return = false;
        $this->db->table('datos_personales')->where('curp',$curp)->update($respuesta);

        if ($this->db->affectedRows() > 0){
            $return = true;
            
        } 

        return $return; 
    }

    public function updateFechaConsulta( $fecha, $curp ){

        $return = false;
        $this->db->table('datos_personales')->where('curp',$curp)->update($fecha);

        if ($this->db->affectedRows() > 0){
            $return = true;
            
        } 

        return $return; 
    }


    public function GetBajas(){
        $builder = $this->db->table("datos_personales");
        $builder->select("respuesta");
        $builder->where("activo",true);
        $builder->where("Cuip",'');
        $builder->where("fecha_consulta != '0000-00-00 00:00:00'");
        $builder->where("respuesta != 'INACTIVO'");
        $builder->orderBy("primer_nombre","asc");
        return $builder->get()->getResult();
        
    }

    public function searchCUIP($cuip){
        $builder = $this->db->table('datos_personales');
        $builder->select('id');
        $builder->where('Cuip', $cuip);

        return $builder->get()->getResult(); 
    }

    public function searchEnMulticatalogo($data, $catalogo){
        $builder = $this->db->table('catalogos cat');
        $builder->select('cd.id');
        $builder->join("catalogos_detalle cd","cat.idCatalogo = cd.idCatalogo","left");
        $builder->like('cat.valor', $catalogo);
        $builder->where('cd.idReferencia', $data);
        return $builder->get()->getResult(); 
    }

    public function searchSINO($data, $catalogo){
        $builder = $this->db->table('catalogos cat');
        $builder->select('cd.id');
        $builder->join("catalogos_detalle cd","cat.idCatalogo = cd.idCatalogo","left");
        $builder->like('cat.valor', $catalogo);
        $builder->where('cd.valor', $data);
            return $builder->get()->getResult(); 
    }

    public function searchParentesco($cveRef, $idReferencia){
        $builder = $this->db->table('catalogo_referencias');
        $builder->select('id');
        $builder->where('cve_parentesco', $cveRef);
        $builder->where('idReferencia', $idReferencia);
            return $builder->get()->getResult(); 
    }
    
    public function addData($insert){
        $this->db->transStart();
        $return = false;
        $this->db->table('datos_personales')->insert($insert);
        
        // if ($this->db->affectedRows() > 0){
        if ($this->db->transStatus()){
            $return = true;
        } 
        $this->db->transComplete();
        return $return; 
    }
    
    public function addDataMF($insert){
        $this->db->transStart();
        $return = false;
        $this->db->table('media_filiacion')->insert($insert);


        // if ($this->db->affectedRows() > 0){
        if ($this->db->transStatus()){
            $return = true;
        } 
        $this->db->transComplete();
        return $return; 
    }

    public function addDataRP($insert){
        $this->db->transStart();
        $return = false;
        $this->db->table('referencias')->insert($insert);


        // if ($this->db->affectedRows() > 0){
        if ($this->db->transStatus()){
            $return = true;
        } 
        $this->db->transComplete();
        return $return; 
    }

    public function getClientes(){
        $builder = $this->db->table('cliente');
        $builder->select('id, nombre_corto');
        $builder->where("activo",true);
        $builder->orderBy("nombre_corto","asc");
        return $builder->get()->getResult();
        
    }

    public function getUbicacion($idCliente){
        $builder = $this->db->table('ubicacion');
        $builder->select('id, nombre_ubicacion');
        $builder->where("activo",true);
        $builder->where("idCliente",$idCliente);
        $builder->orderBy("nombre_ubicacion","asc");
        return $builder->get()->getResult();
        
    }

     public function getPuesto($idTurno){
        $builder = $this->db->table('puestos');
        $builder->select('puestos.id, valor as puesto');
        $builder->join("catalogos_detalle","puestos.puesto = catalogos_detalle.id","left");
        $builder->where("puestos.activo",true);
        $builder->where("idTurno",$idTurno);
        $builder->orderBy("puesto","asc");
        return $builder->get()->getResult();
        
    }


    public function getJefes($idEmpresa){
        $builder = $this->db->table('datos_personales');
        $builder->select("id, CONCAT(primer_nombre,' ',segundo_nombre,' ',apellido_paterno,' ',apellido_paterno ) as nombre");
        $builder->where("activo",true);
        $builder->where("idEmpresa",$idEmpresa);
        $builder->orderBy("primer_nombre","asc");
        return $builder->get()->getResult();
        
    }

    public function insertAltaEmpleado($data,$equipos,$uniformes,$idPersonal){
        $this->db->transStart();

        $this->db->table('datos_empleado')->insert($data);

        $getEquipos = json_decode($equipos,true);
        $getUniformes = json_decode($uniformes,true);
        $clockSequence = 16383;
        foreach($getEquipos as $x =>$value){
            $uuid1 = Uuid::uuid1($clockSequence);
            $id = $uuid1->toString();
            $idPersonal =  $idPersonal;
            $idEquipo = $this->encrypt->Decrytp($value['Equipo']);
            
            $queryEquipos = "INSERT INTO equipos (id,
                idPersonal, 
                idTipo,
                cantidad) VALUES (
                '".$id."',
                '".$idPersonal."', 
                ".$idEquipo.", 
                ".$value['Cantidad']." )";
                
            $this->db->query($queryEquipos);
        }


        foreach($getUniformes as $j =>$value){
            $uuid1 = Uuid::uuid1($clockSequence);
            $id = $uuid1->toString();
            $idPersonal =  $idPersonal;
            $idUniforme = $this->encrypt->Decrytp($value['Uniforme']);
            
            $queryEquipos = "INSERT INTO uniformes (id,
                idPersonal, 
                idUniforme,
                cantidad,
                talla) VALUES (
                '".$id."',
                '".$idPersonal."', 
                ".$idUniforme.", 
                ".$value['Cantidad'].",
                ".$value['Talla']." )";
                
            $this->db->query($queryEquipos);
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

    public function consecutivo(){
        $builder = $this->db->table('datos_empleado');
        $builder->select("LPAD(IFNULL(MAX(SUBSTRING(numEmpleado,3,5) ),0) + 1,5,0) as con");
        
        return $builder->get()->getRow();
    }

    public function fecNac($idPersonal){
        $builder = $this->db->table('datos_personales');
        $builder->select("fecha_nacimiento as fecha");
        $builder->where("id",$idPersonal);
        return $builder->get()->getRow();
    }

    public function getUniformes($idEmpresa){
        $builder = $this->db->table('catalogos_detalle');
        $builder->select("id, CONCAT(valor,' ',idReferencia ) as uniforme");
        $builder->where("activo",true);
        $builder->where("idCatalogo","4335095b-a05a-485f-a02b-038819370aaa");
        $builder->where("idEmpresa",$idEmpresa);
        $builder->orderBy("valor","asc");
        return $builder->get()->getResult();
        
    }

    public function getEquipos($idEmpresa){
        $builder = $this->db->table('catalogos_detalle');
        $builder->select("id, CONCAT(valor,' ',idReferencia ) as equipo");
        $builder->where("activo",true);
        $builder->where("idCatalogo","1f6938fb-8a65-44db-bd8c-5ec2a7f54a41");
        $builder->where("idEmpresa",$idEmpresa);
        $builder->orderBy("valor","asc");
        return $builder->get()->getResult();
        
    }

    public function GetAltaEmpleadoById($id){
        $builder = $this->db->table('datos_empleado');
        $builder->select("datos_empleado.id,numEmpleado, datos_empleado.fecha_ingreso, cliente.nombre_corto AS idCliente, nombre_ubicacion AS idUbicacion, sueldo, T.valor AS idTurno, P.valor AS idPuesto, pagoExterno, telefonoEmpresa, N.valor AS idNomimaPeriodo, radioEmpresa, CONCAT(primer_nombre,' ',segundo_nombre,' ',apellido_paterno,' ',apellido_materno ) as idJefeInmediato, B.valor AS idBanco, cuentaBanco, CLABE, nss, I.valor AS infonavit, PE.valor AS pension, F.valor AS fonacot, S.valor AS soldi");
        $builder->join("cliente","datos_empleado.idCliente = cliente.id","left");
        $builder->join("ubicacion","datos_empleado.idUbicacion = ubicacion.id","left");
        $builder->join("turnos","datos_empleado.idTurno = turnos.id","left");
        $builder->join("catalogos_detalle T","turnos.idTurnos = T.id","left");
        $builder->join("puestos","datos_empleado.idPuesto = puestos.id","left");
        $builder->join("catalogos_detalle P","puestos.puesto = P.id","left");
        $builder->join("catalogos_detalle N","datos_empleado.idNomimaPeriodo = N.id","left");
        $builder->join("catalogos_detalle B","datos_empleado.idBanco = B.id","left");
        $builder->join("catalogos_detalle I","datos_empleado.infonavit = I.id","left");
        $builder->join("catalogos_detalle PE","datos_empleado.pension = PE.id","left");
        $builder->join("catalogos_detalle F","datos_empleado.fonacot = F.id","left");
        $builder->join("catalogos_detalle S","datos_empleado.soldi = S.id","left");
        $builder->join("datos_personales","datos_empleado.idJefeInmediato = datos_personales.id","left");

        $builder->where("idPersonal",$id);
        return $builder->get()->getRow();
    }


    public function GetUniformesById($id){
        $builder = $this->db->table('uniformes');
        $builder->select("CONCAT(valor,' ',idReferencia ) as uniforme, cantidad,talla");
        $builder->join("catalogos_detalle","uniformes.idUniforme = catalogos_detalle.id","left");
        $builder->where("idPersonal",$id);
        $builder->orderBy("uniforme","asc");
        return $builder->get()->getResult();
        
    }

    public function GetEquiposById($id){
        $builder = $this->db->table('equipos');
        $builder->select("CONCAT(valor,' ',idReferencia ) as equipo, cantidad");
        $builder->join("catalogos_detalle","equipos.idTipo = catalogos_detalle.id","left");
        $builder->where("idPersonal",$id);
        $builder->orderBy("equipo","asc");
        return $builder->get()->getResult();
        
    }

    public function updateDatosPersonales($data,$expDocenteArray,$expDocente,$id){
        $this->db->transStart();

        $this->db->table('datos_personales_experiencia')->where('idPersonales',$id)->delete();

        $this->db->table('datos_personales')->where('id',$id)->update($data);

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

    public function updateReferencias($data,$idPersonal,$id){
        $this->db->transStart();

        $this->db->table('referencias')->where('idPersonal',$idPersonal)->where('id',$id)->update($data);

        $this->db->transComplete();

        if ($this->db->transStatus() === TRUE)
        {
            $return = true;
        } else {
            $return = false ;
        }

        return $return; 
    }


    public function updateSocioEconomico($data,$datosDependientesArray,$datos,$idPersonal,$id){
        $this->db->transStart();

        $this->db->table('estudio_socioeconomico_dependientes')->where('idSocioeconomico',$id)->delete();

        
        $this->db->table('estudio_socioeconomico')->where('id',$id)->where('idPersonal',$idPersonal)->update($data);

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

    public function updateEmpleosSeguridad($data,$idPersonal,$id){
        $this->db->transStart();

        $this->db->table('empleos_seg_publica')->where('idPersonal',$idPersonal)->where('id',$id)->update($data);

        $this->db->transComplete();

        if ($this->db->transStatus() === TRUE)
        {
            $return = true;
        } else {
            $return = false ;
        }

        return $return; 
    }

    public function updateEmpDiversos($data,$idPersonal,$id){
        $this->db->transStart();

        $this->db->table('empleos_diversos')->where('idPersonal',$idPersonal)->where('id',$id)->update($data);

        $this->db->transComplete();

        if ($this->db->transStatus() === TRUE)
        {
            $return = true;
        } else {
            $return = false ;
        }

        return $return; 
    }


    public function updateSancionesEstimulos($datosEstimulos,$datosResoluciones,$datosSanciones,$sanciones,$resoluciones,$estimulo,$idPersonal){
        $this->db->transStart();

        $this->db->table('resoluciones_ministeriales')->where('idPersonal',$idPersonal)->delete();

        $this->db->table('estimulos_recibidos')->where('idPersonal',$idPersonal)->delete();

        $this->db->table('sanciones')->where('idPersonal',$idPersonal)->delete();

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


     public function updateAltaEmpleado($data,$equipos,$uniformes,$idPersonal,$id){
        $this->db->transStart();

        $this->db->table('equipos')->where('idPersonal',$idPersonal)->delete();

        $this->db->table('uniformes')->where('idPersonal',$idPersonal)->delete();

        $this->db->table('datos_empleado')->where('idPersonal',$idPersonal)->where('id',$id)->update($data);

        $getEquipos = json_decode($equipos,true);
        $getUniformes = json_decode($uniformes,true);
        $clockSequence = 16383;
        foreach($getEquipos as $x =>$value){
            $uuid1 = Uuid::uuid1($clockSequence);
            $id = $uuid1->toString();
            $idPersonal =  $idPersonal;
            $idEquipo = $this->encrypt->Decrytp($value['Equipo']);
            
            $queryEquipos = "INSERT INTO equipos (id,
                idPersonal, 
                idTipo,
                cantidad) VALUES (
                '".$id."',
                '".$idPersonal."', 
                ".$idEquipo.", 
                ".$value['Cantidad']." )";
                
            $this->db->query($queryEquipos);
        }


        foreach($getUniformes as $j =>$value){
            $uuid1 = Uuid::uuid1($clockSequence);
            $id = $uuid1->toString();
            $idPersonal =  $idPersonal;
            $idUniforme = $this->encrypt->Decrytp($value['Uniforme']);
            
            $queryEquipos = "INSERT INTO uniformes (id,
                idPersonal, 
                idUniforme,
                cantidad,
                talla) VALUES (
                '".$id."',
                '".$idPersonal."', 
                ".$idUniforme.", 
                ".$value['Cantidad'].",
                ".$value['Talla']." )";
                
            $this->db->query($queryEquipos);
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


    public function updateCapacitaciones($datosPublica,$datosCapacitacion,$datosIdioma,$datosHabilidad,$datosAfiliacion,$publica,$capacitacion,$idioma,$habilidad,$afiliacion,$idPersonal){
        $this->db->transStart();

        $this->db->table('capacitacion_publica')->where('idPersonal',$idPersonal)->delete();

        $this->db->table('capacitaciones')->where('idPersonal',$idPersonal)->delete();

        $this->db->table('idiomas_dialectos')->where('idPersonal',$idPersonal)->delete();

        $this->db->table('habilidades_haptitudes')->where('idPersonal',$idPersonal)->delete();

        $this->db->table('afiliacion_agrupaciones')->where('idPersonal',$idPersonal)->delete();

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
    
}
