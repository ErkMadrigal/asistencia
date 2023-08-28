<?php namespace App\Controllers;

use App\Models\CuipModel;
use App\Models\ReferenciaModel;
use App\Libraries\Menu;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Cuip extends BaseController { 

    private $encrypter;
	private $menu;
	private $encrypt;
	private $db;
	private $modelCuip;
	private $modelReferencia;

    public function __construct()
	{
		$this->menu = new Menu();
		$this->encrypt = new Encrypt();
		$this->encrypter = \Config\Services::encrypter();
        $this->db =  \Config\Database::connect('default');
		$this->modelCuip = new CuipModel($this->db);
		$this->modelReferencia = new ReferenciaModel($this->db);

		
	}

   public function GetCuip(){
		if ($this->request->getMethod() == "get"){

			$data['modulos'] = $this->menu->Permisos();
			$empresa = session()->get('empresa');
			$idEmpresa = $this->encrypter->decrypt($empresa);
			$resultData = $this->modelCuip->GetCuip($idEmpresa);
			$result = [];


			foreach ( $resultData as $v){
				
				$id = $this->encrypt->Encrypt($v->id);
				$result[] = (object) array (
					'id' => $id ,
					'numEmpleado' => $v->numEmpleado ,
					'nCuip' => $v->cuip ,
					'primer_nombre' => $v->primer_nombre,
					'segundo_nombre' => $v->segundo_nombre,
                    'apellido_paterno' => $v->apellido_paterno,
                    'apellido_materno' => $v->apellido_materno,
                    'media_filiacion' => $v->idPersonal
				) ;
			}
		
			$dataCrud = [
                'data' => $result]; 

        	$data['CuipPersonal'] = $dataCrud['data'];

			
			
			return view('Cuip/CuipPersonal', $data);
		}	
    }

	private function GetDatos($array){

    	$result = [];

    	foreach ( $array as $value){
				
				$id = $this->encrypt->Encrypt($value->id);
				$result[] = (object) array (
					'id' => $id ,
					'valor' => $value->valor

				) ;
			}

		return $result;
			
    }

	public function AgregarCuip(){
		if ($this->request->getMethod() == "get"){
			$data['modulos'] = $this->menu->Permisos();
			$empresa = session()->get('empresa');
			$idEmpresa = $this->encrypter->decrypt($empresa);
			
			
			$modo_nacionalidad = $this->modelCuip->GetCatalogoCuip('6070382b-2a53-438b-998c-2b7e5b27fba7');
			
			$data['modo_nacionalidad'] = $this->GetDatos($modo_nacionalidad);
			////////////////////////////////////////////////

			$pais_nacimiento = $this->modelCuip->GetCatalogoCuip('2d688512-aae8-4626-a47d-506a8138e5ba');
			
			$data['pais_nacimiento'] = $this->GetDatos($pais_nacimiento);
			
			//////////////////////////////////////////////

			$nacionalidad = $this->modelCuip->GetCatalogoCuip('58b94c0f-7163-44de-af92-fb976f02cc78');
			
			$data['nacionalidad'] = $this->GetDatos($nacionalidad);
			////////////////////////////////////////////////

			

			$estado_civil = $this->modelCuip->GetCatalogoCuip('7d81e91b-99cb-4371-89d9-934b51d62fb1');
			
			$data['estado_civil'] = $this->GetDatos($estado_civil);
			////////////////////////////////////////////////

			


			$desarrollo_academico = $this->modelCuip->GetCatalogoCuip('2623fe26-3e18-11ed-b4f6-50a1320785a8');
			
			$data['desarrollo_academico'] = $this->GetDatos($desarrollo_academico);
			////////////////////////////////////////////////


			$getEstados = $this->modelCuip->GetEstados();

			$data['entidad_federativa'] = $this->GetDatos($getEstados);
			////////////////////////////////////////////////


			$parentesco_pariente = $this->modelCuip->GetParenteco(2);
			
			$data['parentesco_pariente'] = $this->GetDatos($parentesco_pariente);
			////////////////////////////////////////////////

			$parentesco_personal = $this->modelCuip->GetParenteco(3);
			
			$data['parentesco_personal'] = $this->GetDatos($parentesco_personal);
			////////////////////////////////////////////////

			$parentesco_laboral = $this->modelCuip->GetParenteco(4);
			
			$data['parentesco_laboral'] = $this->GetDatos($parentesco_laboral);
			////////////////////////////////////////////////

			$parentesco_familiar = $this->modelCuip->GetParenteco(1);
			
			$data['parentesco_familiar'] = $this->GetDatos($parentesco_familiar);
			////////////////////////////////////////////////

			$parentesco_todos = $this->modelCuip->GetParentecoAll();
			
			$data['parentesco_todos'] = $this->GetDatos($parentesco_todos);
			////////////////////////////////////////////////

			$pais = $this->modelCuip->GetCatalogoCuip('2d688512-aae8-4626-a47d-506a8138e5ba');
			
			$data['pais'] = $this->GetDatos($pais);
			////////////////////////////////////////////////

			$domicilio_tipo = $this->modelCuip->GetCatalogoCuip('1a4ad757-1946-4435-9866-8e9ed7bbc91c');
			
			$data['domicilio_tipo'] = $this->GetDatos($domicilio_tipo);
			////////////////////////////////////////////////

			$eficiencia = $this->modelCuip->GetCatalogoCuip('ac8903ca-544d-4a9e-bdfc-3b8069891437');
			
			$data['eficiencia'] = $this->GetDatos($eficiencia);
			////////////////////////////////////////////////

			$nivel_curso = $this->modelCuip->GetCatalogoCuip('ba336522-0795-43ba-b5ca-2c765ca96a56');
			
			$data['nivel_curso'] = $this->GetDatos($nivel_curso);
			////////////////////////////////////////////////

			$cuso_tomado = $this->modelCuip->GetCatalogoCuip('db5d4dad-9dc7-4a44-8834-7c6ca196bb62');
			
			$data['cuso_tomado'] = $this->GetDatos($cuso_tomado);
			////////////////////////////////////////////////

			$idioma = $this->modelCuip->GetCatalogoCuip('47c8cf77-2039-4661-a79c-dca04f685cab');
			
			$data['idioma'] = $this->GetDatos($idioma);
			////////////////////////////////////////////////

			$tipo_habilidad = $this->modelCuip->GetCatalogoCuip('fe67ef02-0b02-4894-b54f-8cc7a0914153');
			
			$data['tipo_habilidad'] = $this->GetDatos($tipo_habilidad);
			////////////////////////////////////////////////

			$grado_habilidad = $this->modelCuip->GetCatalogoCuip('b0ad414d-bbfb-404d-8683-feff143a1854');
			
			$data['grado_habilidad'] = $this->GetDatos($grado_habilidad);
			////////////////////////////////////////////////

			$tipo_fuero = $this->modelCuip->GetCatalogoCuip('2ba17e6c-3478-48d8-93cf-6bb7320e65bf');
			
			$data['tipo_fuero'] = $this->GetDatos($tipo_fuero);
			////////////////////////////////////////////////

			$genero = $this->modelCuip->GetCatalogoCuip('a7e79d68-f018-415d-a450-94ad0814682d');
			
			$data['genero'] = $this->GetDatos($genero);

			//////////////////////////////////////////////

			$SiNo = $this->modelCuip->GetCatalogoCuip('5c9f16b5-66f8-4abd-9c72-f1ba78c93776');
			
			$data['SiNo'] = $this->GetDatos($SiNo);

			//////////////////////////////////////////////

			$tipoAgrupacion = $this->modelCuip->GetCatalogoCuip('1cff1d2c-946b-4e37-a0ac-c107c392032b');
			
			$data['tipo_agrupacion'] = $this->GetDatos($tipoAgrupacion);

			//////////////////////////////////////////////
			
			$porsentajeIdioma = $this->modelCuip->GetCatalogoCuip('a2a091a0-8fa2-4eae-89a2-2d95a9092768');
			
			$data['porsentajeIdioma'] = $this->GetDatos($porsentajeIdioma);

			//////////////////////////////////////////////

			$tipoDisciplina = $this->modelCuip->GetCatalogoCuip('5a626264-d6ad-4761-8923-98be05b44941');
			
			$data['tipoDisciplina'] = $this->GetDatos($tipoDisciplina);

			//////////////////////////////////////////////

			$duracion = $this->modelCuip->GetCatalogoCuip('349c2acb-72e0-4cd7-ac3e-7bd306176056');
			
			$data['duracion'] = $this->GetDatos($duracion);

			///////////////////////////////////
			
			$getOcupacion = $this->modelCuip->GetCatalogoCuip('478159d8-3e20-11ed-b4f6-50a1320785a8');
			
        	$data['ocupacion'] = $this->cuipCatalgo($getOcupacion);
        	//////////////

        	$getRango = $this->modelCuip->GetCatalogoCuip('190ea697-f3c7-44f3-832b-02e063d9a518');
			
        	$data['rango'] = $this->cuipCatalgo($getRango);
        	//////////////

        	$getMando = $this->modelCuip->GetCatalogoCuip('448ea88c-222f-4bf4-a157-7bac6846d822');
			
        	$data['mando'] = $this->cuipCatalgo($getMando);
        	//////////////

        	$getPuesto = $this->modelCuip->GetCatalogoCuip('29773b6a-a69c-4245-ba1c-755e17398d73');
			
        	$data['puesto'] = $this->cuipCatalgo($getPuesto);
        	//////////////
        	$data['clientes'] = $this->modelCuip->getClientes();
        	//////////////
        	$getBanco = $this->modelCuip->GetCatalogoCuip('9d392e39-27fa-4307-824b-66d40facba07');
			
        	$data['banco'] = $this->cuipCatalgo($getBanco);
        	//////////////
        	$getNomina = $this->modelCuip->GetCatalogoCuip('2b2bccdd-2f39-47b5-8aad-0272ea9096bb');
			
        	$data['nomina'] = $this->cuipCatalgo($getNomina);
        	//////////////
        	$data['jefes'] = $this->modelCuip->getJefes($idEmpresa);
        	/////////////
        	$data['uniformes'] = $this->modelCuip->getUniformes($idEmpresa);

        	$data['equipos'] = $this->modelCuip->getEquipos($idEmpresa);

        	$data['breadcrumb'] = ["inicio" => 'CUIP' ,
                    				"url" => 'cuip',
                    				"titulo" => 'Nueva'];


			return view('Cuip/RegistroCUIP', $data);	
			}
	}



	public function AgregarPersonales(){
		if ($this->request->getMethod() == "post" && $this->request->getvar(['primerNombre, segundoNombre, apellidoPaterno, apellidoMaterno, fecha_nacimiento, sexo, rfc, claveE, cartilla, licencia, vigenciaLic, CURP, pasaporte, modo_nacionalidad, fecha_naturalizacion, pais_nacimiento, entidad_nacimiento, nacionalidad, municipio_nacimiento, cuidad_nacimiento, estado_civil, desarrollo_academico, escuela, especialidad, cedula, anno_inicio, anno_termino, registroSep, certificado, promedio, calle, exterior, interior, numeroTelefono, entrecalle, ylacalle, codigo, coloniacodigo, estadocodigo, municipiocodigo, ciudadcodigo, nombrecurso, nombreInstitucion, fecha_inicial, fecha_final, certificado_por'],FILTER_SANITIZE_STRING)){

				$rules = [
				'primerNombre' =>  ['label' => "Primer Nombre", 'rules' => 'required|max_length[255]'],
				
				'apellidoPaterno' =>  ['label' => "Apellido Paterno", 'rules' => 'required|max_length[255]'],
				'apellidoMaterno' =>  ['label' => "Apellido Materno", 'rules' => 'required|max_length[255]'],
				'fecha_nacimiento' =>  ['label' => 'Fecha de Nacimiento', 'rules' =>'required|valid_only_date_chek|date_mayor'],
				'sexo' =>  ['label' => 'Sexo', 'rules' =>'required'],
				'rfc' =>  ['label' => "RFC", 'rules' => 'required|max_length[10]|min_length[10]'],
				'claveE' =>  ['label' => "Clave Electoral", 'rules' => 'required|max_length[255]'],
				'cartilla' =>  ['label' => "Cartilla SMN", 'rules' => 'required|max_length[255]'],
				'licencia' =>  ['label' => "Licencia", 'rules' => 'required_with[vigenciaLic]'],
				'vigenciaLic' =>  ['label' => "Vigencia de Licencia", 'rules' => 'required_with[licencia]'],
				'CURP' =>  ['label' => "CURP", 'rules' => 'required|max_length[18]|min_length[18]'],
				
				'modo_nacionalidad' =>  ['label' => "Modo de Nacionalidad", 'rules' => 'required'],
				'pais_nacimiento' =>  ['label' => "Pais de Nacimiento", 'rules' => 'required'],
				'entidad_nacimiento' =>  ['label' => "Entidad de Nacimiento", 'rules' => 'required|max_length[255]'],
				'municipio_nacimiento' =>  ['label' => "Municipio de Nacimiento", 'rules' => 'required|max_length[255]'],
				'cuidad_nacimiento' =>  ['label' => "Cuidad de Nacimiento", 'rules' => 'required|max_length[255]'],
				'nacionalidad' =>  ['label' => "Nacionalidad", 'rules' => 'required'],
				'estado_civil' =>  ['label' => "Estado Civil", 'rules' => 'required'],
				'desarrollo_academico' =>  ['label' => "Desarrollo Académico", 'rules' => 'required'],
				'escuela' =>  ['label' => "Escuela", 'rules' => 'required|max_length[255]'],
				'especialidad' =>  ['label' => "Especialidad", 'rules' => 'required|max_length[255]'],
				
				'anno_inicio' =>  ['label' => "Año de Inicio", 'rules' => 'required|max_length[4]|integer'],
				'anno_termino' =>  ['label' => "Año de Termino", 'rules' => 'required|max_length[4]|integer'],
				'registroSep' =>  ['label' => "Registro SEP", 'rules' => 'required'],
				'certificado' =>  ['label' => "Num. de Folio Certificado", 'rules' => 'required|max_length[255]'],
				'promedio' =>  ['label' => "Promedio", 'rules' => 'required|max_length[255]'],
				'calle' =>  ['label' => "Calle", 'rules' => 'required|max_length[255]'],
				'exterior' =>  ['label' => "No. Exterior", 'rules' => 'required|max_length[255]'],
				'interior' =>  ['label' => "No. Interior", 'rules' => 'required|max_length[255]'],
				'numeroTelefono' =>  ['label' => "Numero Telefónico", 'rules' => 'required|max_length[10]|integer|min_length[10]'],
				'entrecalle' =>  ['label' => "Entre la calle de", 'rules' => 'required|max_length[255]'],
				'ylacalle' =>  ['label' => "Y la calle ", 'rules' => 'required|max_length[255]'],
				'codigo' =>  ['label' => "Código Postal", 'rules' => 'required|max_length[5]|integer'],
				'coloniacodigo' =>  ['label' => "Colonia", 'rules' => 'required'],
				'estadocodigo' =>  ['label' => "Entidad Federativa", 'rules' => 'required'],
				'municipiocodigo' =>  ['label' => "Municipio", 'rules' => 'required'],
				'ciudadcodigo' =>  ['label' => "Ciudad", 'rules' => 'required'],
				
				'dependencia_adscripcion' =>  ['label' => "Dependencia", 'rules' => 'required|max_length[255]'],
				'institucion_adscripcion' =>  ['label' => "Institución", 'rules' => 'required|max_length[255]'],
				'fechaingreso_adscripcion' =>  ['label' => "Fecha de Ingreso", 'rules' => 'required|valid_only_date_chek'],
				'puesto_adscripcion' =>  ['label' => "Puesto", 'rules' => 'required|max_length[255]'],
				
				
				'rango_adscripcion' =>  ['label' => "Rango o Categoria", 'rules' => 'required|max_length[255]'],
				'nivel_adscripcion' =>  ['label' => "Nivel de Mando", 'rules' => 'required|max_length[255]'],
				
				'nombrejefe_adscripcion' =>  ['label' => "Nombre del jefe inmediato", 'rules' => 'required|max_length[255]'],
				'entidad_adscripcion' =>  ['label' => "Entidad Federativa", 'rules' => 'required|max_length[255]'],
				'municipio_adscripcion' =>  ['label' => "Municipio", 'rules' => 'required|max_length[255]'],
				
				'calle_adscripcion' =>  ['label' => "Calle", 'rules' => 'required|max_length[255]'],
				'exterior_adscripcion' =>  ['label' => "No. Exterior", 'rules' => 'required|max_length[255]'],
				
				'entrecalle_adscripcion' =>  ['label' => "Entre la calle de", 'rules' => 'required|max_length[255]'],
				'ylacalle_adscripcion' =>  ['label' => "Y la calle", 'rules' => 'required|max_length[255]'],
				'telefono_adscripcion' =>  ['label' => "Número Telefonico", 'rules' => 'required|max_length[10]|integer'],
				'codigoAds' =>  ['label' => "Código Postal", 'rules' => 'required|max_length[5]|integer'],
				'coloniacodigoAds' =>  ['label' => "Colonia", 'rules' => 'required|max_length[255]'],
				'federativa_adscripcion' =>  ['label' => "Entidad Federativa", 'rules' => 'required|max_length[255]'],
				'delegacion_adscripcion' =>  ['label' => "Municipio o Delegación", 'rules' => 'required|max_length[255]'],
				'ciudadcodigoAds' =>  ['label' => "Ciudad o Poblacion", 'rules' => 'required|max_length[255]']];

				$expDocente = $this->request->getPost('expDocente');

				
				if ($expDocente == 0){

					$rules['nombrecurso'] =  ['label' => "Nombre del Curso", 'rules' => 'required|max_length[255]'];
					$rules['nombreInstitucion'] =  ['label' => "Nombre de la Institución", 'rules' => 'required|max_length[255]'];
					$rules['fecha_inicial'] =  ['label' => "Fecha de Inicio", 'rules' => 'required|valid_only_date_chek'];
					$rules['fecha_final'] =  ['label' => "Fecha de Término", 'rules' => 'required|valid_only_date_chek'];
					$rules['certificado_por'] =  ['label' => "Certificado por", 'rules' => 'required|max_length[255]'];


					$rules['nombrecursoB'] =  ['label' => "Nombre del Curso", 'rules' => 'required_with[nombreInstitucionB,fecha_inicialB,fecha_finalB,certificado_porB]|max_length[255]'];


					$rules['fecha_inicialB'] =  ['label' => "Fecha de Inicio", 'rules' => 'required_with[nombreInstitucionB,nombrecursoB,fecha_finalB,certificado_porB]'];

					$rules['fecha_finalB'] =  ['label' => "Fecha de Término", 'rules' => 'required_with[nombreInstitucionB,nombrecursoB,fecha_inicialB,certificado_porB]'];

					$rules['certificado_porB'] =  ['label' => "Certificado por", 'rules' => 'required_with[nombrecursoB,nombreInstitucionB,fecha_inicialB,fecha_finalB]|max_length[255]'];

					$rules['nombreInstitucionB'] =  ['label' => "Nombre de la Institución", 'rules' => 'required_with[nombrecursoB,,fecha_inicialB,fecha_finalB,certificado_porB]|max_length[255]'];


				}

				$getModo_nacionalidad = $this->request->getPost('modo_nacionalidad');

				if(!empty($getModo_nacionalidad)){
        			$modo_nacionalidad = $this->encrypt->Decrytp($getModo_nacionalidad);

        			if ( $modo_nacionalidad != 1){
        			$rules['fecha_naturalizacion'] =  ['label' => "Fecha de Naturalización", 'rules' => 'required|valid_only_date_chek'];
        			}

        		}
		 
				$errors = [];
				$succes = [];
				$dontSucces = [];
				$data = [];

				if($this->validate($rules)){
					
					$getUser = session()->get('IdUser');
					$LoggedUserId = $this->encrypter->decrypt($getUser);
					$empresa = session()->get('empresa');
					$idEmpresa = $this->encrypter->decrypt($empresa);
					$uuid = Uuid::uuid4();
        			$id = $uuid->toString();

        			$getGenero = $this->request->getPost('sexo');

        			$getGenero = $this->encrypt->Decrytp($getGenero);

        			
					
					$getPais_nacimiento = $this->request->getPost('pais_nacimiento');

        			$pais_nacimiento = $this->encrypt->Decrytp($getPais_nacimiento);

        			$getNacionalidad = $this->request->getPost('nacionalidad');

        			$nacionalidad = $this->encrypt->Decrytp($getNacionalidad);

        			$getEstado_civil = $this->request->getPost('estado_civil');

        			$estado_civil = $this->encrypt->Decrytp($getEstado_civil);

        			$getregistroSep = $this->request->getPost('registroSep');

        			$registroSep = $this->encrypt->Decrytp($getregistroSep);


        			$getDesarrollo_academico = $this->request->getPost('desarrollo_academico');

        			$desarrollo_academico = $this->encrypt->Decrytp($getDesarrollo_academico);

        			$getDesarrollo_academico = $this->request->getPost('desarrollo_academico');

        			$getFechaNacimiento = $this->request->getPost('fecha_nacimiento');

        			$fecha_nacimiento = date( "Y-m-d" ,strtotime($getFechaNacimiento));


        			if ( $modo_nacionalidad != 1){

        				$getFecha_naturalizacion = $this->request->getPost('fecha_naturalizacion');

        				$fecha_naturalizacion = date( "Y-m-d" ,strtotime($getFecha_naturalizacion));
        			} else {

        				$fecha_naturalizacion = '';

        			} 

        			$getVigenciaLic = $this->request->getPost('vigenciaLic');

        			$vigenciaLic = date( "Y-m-d" ,strtotime($getVigenciaLic));

        			$getFechaingreso_adscripcion = $this->request->getPost('fechaingreso_adscripcion');

        			$fechaingreso_adscripcion = date( "Y-m-d" ,strtotime($getFechaingreso_adscripcion));

        			

        			$getPuesto = $this->request->getPost('puesto_adscripcion');

        			$puesto = $this->encrypt->Decrytp($getPuesto);

        			$getRango = $this->request->getPost('rango_adscripcion');

        			$rango = $this->encrypt->Decrytp($getRango);

        			$getNivel_mando = $this->request->getPost('nivel_adscripcion');
        			
        			$nivel_mando = $this->encrypt->Decrytp($getNivel_mando);


        			$getEntidad_nacimiento = $this->request->getPost('entidad_nacimiento');
        			
        			$entidad_nacimiento = $this->encrypt->Decrytp($getEntidad_nacimiento);


        			$getMunicipio_nacimiento = $this->request->getPost('municipio_nacimiento');
        			
        			$municipio_nacimiento = $this->encrypt->Decrytp($getMunicipio_nacimiento);

        			$getEstadocodigo = $this->request->getPost('estadocodigo');
        			
        			$estadocodigo = $this->encrypt->Decrytp($getEstadocodigo);

        			$getMunicipiocodigo = $this->request->getPost('municipiocodigo');
        			
        			$municipiocodigo = $this->encrypt->Decrytp($getMunicipiocodigo);

        			$getEntidad_adscripcion = $this->request->getPost('entidad_adscripcion');
        			
        			$entidad_adscripcion = $this->encrypt->Decrytp($getEntidad_adscripcion);

        			$getMunicipio_adscripcion = $this->request->getPost('municipio_adscripcion');
        			
        			$municipio_adscripcion = $this->encrypt->Decrytp($getMunicipio_adscripcion);

        			

					$datosPersonales = array(
		    					
		    					
						"id" => $id ,
						"idEmpresa" => $idEmpresa , 
						"primer_nombre" => strtoupper($this->request->getPost('primerNombre')) , 
						"segundo_nombre" => strtoupper($this->request->getPost('segundoNombre')) , 
						"apellido_paterno" => strtoupper($this->request->getPost('apellidoPaterno')) , 
						"apellido_materno" => strtoupper($this->request->getPost('apellidoMaterno')) , 
						"fecha_nacimiento" => $fecha_nacimiento , 
						"idGenero" => $getGenero , 
						"rfc" => strtoupper($this->request->getPost('rfc')) , 
						"clave_electoral" => strtoupper($this->request->getPost('claveE')) , 
						"cartilla_smn" => strtoupper($this->request->getPost('cartilla')) , 
						"licencia_conducir" => strtoupper($this->request->getPost('licencia')) , 
						"vigencia_licencia" => $vigenciaLic , 
						"curp" => strtoupper($this->request->getPost('CURP')) , 
						"pasaporte" => strtoupper($this->request->getPost('pasaporte')) , 
						"idFormaNacionalidad" =>  $modo_nacionalidad , 
						"fecha_naturalizacion" => $fecha_naturalizacion , 
						"idPaisNacimiento" => $pais_nacimiento , 
						"idEntidadNacimiento" => $entidad_nacimiento , 
						"idMunicipioNacimiento" => $municipio_nacimiento , 
						"idCiudadNacimiento" => $this->request->getPost('cuidad_nacimiento') , 
						"idNacionalidad" => $nacionalidad , 
						"idEstadoCivil" => $estado_civil , 
						"idNivelEducativo" => $desarrollo_academico , 
						"escuela" => strtoupper($this->request->getPost('escuela')) , 
						"especialidad" => strtoupper($this->request->getPost('especialidad')) , 
						"cedula_profesional" => strtoupper($this->request->getPost('cedula')) , 
						"año_inicio" => $this->request->getPost('anno_inicio') , 
						"año_termino" => $this->request->getPost('anno_termino') , 
						"registro_sep" => $registroSep , 
						"folio_certificado" => strtoupper($this->request->getPost('certificado')) , 
						"calle" => strtoupper($this->request->getPost('calle')) , 
						"numero_exterior" => strtoupper($this->request->getPost('exterior')) , 
						"numero_interior" => strtoupper($this->request->getPost('interior')) , 
						"colonia" => strtoupper($this->request->getPost('coloniacodigo')) , 
						"entre_calle1" => strtoupper($this->request->getPost('entrecalle')) , 
						"entre_calle2" => strtoupper($this->request->getPost('ylacalle')) , 
						"idCodigoPostal" => $this->request->getPost('codigo') , 
						"numero_telefono" => $this->request->getPost('numeroTelefono') , 
						"idEstado" => $estadocodigo , 
						"municipio" => $municipiocodigo , 
						"ciudad" => strtoupper($this->request->getPost('ciudadcodigo')) ,
					  "dependencia" => $this->request->getPost('dependencia_adscripcion'), 
					  "institucion" => $this->request->getPost('institucion_adscripcion'),
					  "fecha_ingreso" => $fechaingreso_adscripcion,
					  "puesto" => $puesto,
					  "rango" => $rango,
					  "nivel_mando" => $nivel_mando,
					  "nombre_jefe" => strtoupper($this->request->getPost('nombrejefe_adscripcion')),
					  "idEstado_adscripcion" => $entidad_adscripcion,
					  "municipio_adscripcion" => $municipio_adscripcion,
					  "calle_adscripcion" => strtoupper($this->request->getPost('calle_adscripcion')),
					  "numero_exterior_adscripcion" => strtoupper($this->request->getPost('exterior_adscripcion')),
					  "numero_interior_adscripcion" => strtoupper($this->request->getPost('interior_adscripcion')),
					  "entre_calle1_adscripcion" => strtoupper($this->request->getPost('entrecalle_adscripcion')),
					  "entre_calle2_adscripcion" => strtoupper($this->request->getPost('ylacalle_adscripcion')),
					  "numero_telefono_adscripcion" => $this->request->getPost('telefono_adscripcion'),
					  "idCodigoPostal_adscripcion" => $this->request->getPost('codigoAds'),
					  "colonia_adscripcion" => $this->request->getPost('coloniacodigoAds'),
					  "idEstado_dom_adscripcion" => $this->request->getPost('federativa_adscripcion'),
					  "municipio_delegacion" => $this->request->getPost('delegacion_adscripcion'),
					  "ciudad_poblacion" => $this->request->getPost('ciudadcodigoAds'), 
						"activo" => 1 , 
						"createdby" => $LoggedUserId , 
						"createddate" => date("Y-m-d H:i:s") );

					$expDocenteArray=[];
					
				if ($expDocente == 0){	
					$val ="";
					 $clockSequence = 16383;
					for ($i = 1; $i <= 2; $i++) {
  						
  						 $uuid1 = Uuid::uuid1($clockSequence);
        				$idExp = $uuid1->toString();
  						 
  						$getFecha_final = $this->request->getPost('fecha_final'.$val);

        				$fecha_final = date( "Y-m-d" ,strtotime($getFecha_final));

        				$getFecha_inicial = $this->request->getPost('fecha_inicial'.$val);

        				$fecha_inicial = date( "Y-m-d" ,strtotime($getFecha_inicial));

					$expDocenteArray[] = array(

						"id" => $idExp ,
						"idPersonales" => $id , 
						"nombre_curso" => strtoupper($this->request->getPost('nombrecurso'.$val)) , 
						"nombre_institucion" => strtoupper($this->request->getPost('nombreInstitucion'.$val)) , 
						"fecha_inicio" => $fecha_inicial , 
						"fecha_termino" => $fecha_final , 
						"certificado_por" => strtoupper($this->request->getPost('certificado_por'.$val)) , 
						"activo" => 1 , 
						"createdby" => $LoggedUserId , 
						"createddate" => date("Y-m-d H:i:s"));

						$val ="B";

						$valB =$this->request->getPost('nombrecursoB');

        				if (!isset($valB) || empty($valB)){

            				$i = 3;
        				}
					}
				}	


					$result = $this->modelCuip->insertDatosPersonales( $datosPersonales,$expDocenteArray,$expDocente);

					
					
                    if ($result) {

            			
                    	$succes = ["mensaje" => 'Datos Personales agregados con exito' ,
                            	   "succes" => "succes"];

                        $data['idPersonal'] = $this->encrypt->Encrypt($id);
    	   

                           	   
                    	
                    } else {
                    	$dontSucces = ["error" => "error",
                    				  "mensaje" => 	'Hubo un error al registrar los DAtos Persoanles'  ];

                    }
				} else {	
					$errors = $this->validator->getErrors();
				}

				echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
		}	
	}


	public function CiudadEstado(){
		if ($this->request->getMethod() == "post" && $this->request->getvar(['estado'])){
			$errors = [];
            $succes = [];
            $dontSucces = [];
            $data = [];

			$rules = [
				'estado' =>  'required'];
				
				$errors = [];
				$succes = [];
				$dontSucces = [];
				$data = [];
				
				if($this->validate($rules)){
					

					$getEstado = $this->request->getPost('estado');

					$estado = $this->encrypt->Decrytp($getEstado);


					
					$getMunicipios = $this->modelCuip->getMunicipios($estado);

					

                    if ($getMunicipios ) {

                    	$municipio = '<option value="">Selecciona una Opcion</option>';
                    	$ciudad = '<option value="">Selecciona una Opcion</option>';
                    	foreach ( $getMunicipios as $v){
				
							$id = $this->encrypt->Encrypt($v->id);
							$municipio.=  '<option value="'.$id.'">'.$v->descripcion.'</option>';

							$ciudad.=  '<option value="'.$id.'">'.$v->descripcion.'</option>';
						
						}

						
                    	
                    	$data['municipio']= $municipio;
                    	$data['ciudad']= $ciudad;
                    	$succes = ["mensaje" => 'Exito.' ,
                            	   "succes" => "succes"];
                    	
                    } else {
                    		
                    	$dontSucces = ["error" => "error" ,
                    				   "mensaje" => 'Hubo un error al obtener los datos.'];

                    }
                    		

				} else {	
					$errors = $this->validator->getErrors();
				}

				echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
			
		}	
    }


    public function getCP(){
		if ($this->request->getMethod() == "post" && $this->request->getvar(['cp'])){
			$errors = [];
            $succes = [];
            $dontSucces = [];
            $data = [];

			$rules = [
				'cp' =>  'required'];
				
				$errors = [];
				$succes = [];
				$dontSucces = [];
				$data = [];
				
				if($this->validate($rules)){
					

					$cp = $this->request->getPost('cp');
					
					$getSepomex = $this->modelCuip->getSepomexByCp($cp);


                    if ($getSepomex) {

                    	$ResultMunicipio = '<option value="">Selecciona una Opcion</option>';

                    	$ResultCiudad = '<option value="">Selecciona una Opcion</option>';

                    	$ResultEstado = '<option value="">Selecciona una Opcion</option>';

                    	$colonia = '<option value="">Selecciona una Opcion</option>';

                    	foreach ( $getSepomex as $v){
				
							
							$municipio =  '<option value="'.$v->municipio.'">'.$v->municipio.'</option>';

							$ciudad =  '<option value="'.$v->ciudad.'">'.$v->ciudad.'</option>';

							$estado =  '<option value="'.$v->estado.'">'.$v->estado.'</option>';

							$colonia.=  '<option value="'.$v->asentamiento.'">'.$v->asentamiento.'</option>';
						
						}

						
						$ResultMunicipio = $ResultMunicipio.$municipio;

						$ResultCiudad = $ResultCiudad.$ciudad;

						$ResultEstado = $ResultEstado.$estado;
                    	
                    	$data['municipio']= $ResultMunicipio;
                    	$data['ciudad']= $ResultCiudad;
                    	$data['estado']= $ResultEstado;
                    	$data['colonia']= $colonia;

                    	$succes = ["mensaje" => 'Exito.' ,
                            	   "succes" => "succes"];
                    	
                    } else {
                    		
                    	$dontSucces = ["error" => "error" ,
                    				   "mensaje" => 'Hubo un error al obtener los datos.'];

                    }
                    		

				} else {	
					$errors = $this->validator->getErrors();
				}

				echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
			
		}	
    }


    public function AgregarSocioEconomico(){
		if ($this->request->getMethod() == "post" && $this->request->getvar(['familia, ingreso, domicilio_tipo, actividad, especificacion, inversion, vehiculo, calidad, vicio, imagen, comportamiento, calle, apellidoMaterno, primerNombre, nombre, fecha_nacimiento_dep, sexo_dep, parentesco_familiar,idPersonal'],FILTER_SANITIZE_STRING)){

			$errors = [];
			$succes = [];
			$dontSucces = [];
			$data = [];
			$getIdPersonal = $this->request->getPost('idPersonal');

			if(!empty($getIdPersonal)){

				$rules = [
				'familia' =>  ['label' => "¿Vive con su Familia?", 'rules' => 'required'],
				'ingreso' =>  ['label' => "Ingreso familiar adicional (Mensual)", 'rules' => 'required|max_length[255]'],
				'domicilio_tipo' =>  ['label' => "Su domicilio es", 'rules' => 'required'],
				'actividad' =>  ['label' => "Actividades culturales o deportivas que practique", 'rules' => 'required|max_length[255]'],
				'especificacion' =>  ['label' => "Especifiación de inmueble y costo", 'rules' => 'required|max_length[255]'],
				'inversion' =>  ['label' => "Inversiones y monto aproximado", 'rules' => 'required|max_length[255]'],
				'vehiculo' =>  ['label' => "Vehiculo y costo Aproximado", 'rules' => 'required|max_length[255]'],
				'calidad' =>  ['label' => "Calidad de Vida", 'rules' => 'required|max_length[255]'],
				'vicio' =>  ['label' => "Vicios", 'rules' => 'required|max_length[255]'],
				'imagen' =>  ['label' => "Imagen Publica", 'rules' => 'required|max_length[255]'],
				'comportamiento' =>  ['label' => "Comportamiento Social", 'rules' => 'required|max_length[255]']];
		 
			$datos = $this->request->getPost('dependientes');	

		 	if($datos == 0){
				$rules['apellidoPaterno'] =  ['label' => "Apellido Paterno", 'rules' => 'required|max_length[255]'];
				$rules['apellidoMaterno'] =  ['label' => "Apellido Materno", 'rules' => 'required|max_length[255]'];
				$rules['primerNombre'] =  ['label' => "Primer Nombre", 'rules' => 'required|max_length[255]'];
				$rules['segundoNombre'] =  ['label' => "Segundo Nombre Nombre", 'rules' => 'required|max_length[255]'];
				$rules['fecha_nacimiento_dep'] =  ['label' => "Fecha de Nacimiento", 'rules' => 'required|valid_only_date_chek'];
				$rules['sexo_dep'] =  ['label' => "Sexo", 'rules' => 'required'];
				$rules['parentesco_familiar'] =  ['label' => "Parentesco", 'rules' => 'required'];

				$rules['apellidoPaternoB'] =  ['label' => "Apellido Paterno", 'rules' => 'required_with[apellidoMaternoB,primerNombreB,segundoNombreB,fecha_nacimiento_depB,sexo_depB,parentesco_familiarB]|max_length[255]'];
				$rules['apellidoMaternoB'] =  ['label' => "Apellido Materno", 'rules' => 'required_with[apellidoPaternoB,primerNombreB,segundoNombreB,fecha_nacimiento_depB,sexo_depB,parentesco_familiarB]|max_length[255]'];
				$rules['primerNombreB'] =  ['label' => "Primer Nombre", 'rules' => 'required_with[apellidoPaternoB,apellidoMaternoB,segundoNombreB,fecha_nacimiento_depB,sexo_depB,parentesco_familiarB]|max_length[255]'];
				$rules['segundoNombreB'] =  ['label' => "Segundo Nombre Nombre", 'rules' => 'required_with[apellidoPaternoB,apellidoMaternoB,primerNombreB,fecha_nacimiento_depB,sexo_depB,parentesco_familiarB]|max_length[255]'];
				$rules['fecha_nacimiento_depB'] =  ['label' => "Fecha de Nacimiento", 'rules' => 'required_with[apellidoPaternoB,apellidoMaternoB,primerNombreB,segundoNombreB,sexo_depB,parentesco_familiarB]'];
				$rules['sexo_depB'] =  ['label' => "Sexo", 'rules' => 'required_with[apellidoPaternoB,apellidoMaternoB,primerNombreB,segundoNombreB,fecha_nacimiento_depB,parentesco_familiarB]'];
				$rules['parentesco_familiarB'] =  ['label' => "Parentesco", 'rules' => 'required_with[apellidoPaternoB,apellidoMaternoB,primerNombreB,segundoNombreB,fecha_nacimiento_depB,sexo_depB]'];
			}	

				if($this->validate($rules)){
					
					$getUser = session()->get('IdUser');
					$LoggedUserId = $this->encrypter->decrypt($getUser);
					$empresa = session()->get('empresa');
					$idEmpresa = $this->encrypter->decrypt($empresa);
					$uuid = Uuid::uuid4();
        			$id = $uuid->toString();

        			

        			$getFamilia = $this->request->getPost('familia');

        			$familia = $this->encrypt->Decrytp($getFamilia);
					
					$getDomicilio_tipo = $this->request->getPost('domicilio_tipo');

        			$domicilio_tipo = $this->encrypt->Decrytp($getDomicilio_tipo);

        			
        			$idPersonal = $this->encrypt->Decrytp($getIdPersonal);


					$socioEconomico = array(
		    					
		    					
						"id" => $id  ,
						"idPersonal" => $idPersonal  , 
						"idEmpresa" =>  $idEmpresa , 
						"vive_con_familia" => $familia  , 
						"ingreso_familiar" =>  strtoupper($this->request->getPost('ingreso')) , 
						"idTipoDomicilio" => $domicilio_tipo , 
						"actividades_culturales" =>  strtoupper($this->request->getPost('actividad')) , 
						"especificacion_inmueble" =>  strtoupper($this->request->getPost('especificacion')) , 
						"inversiones" =>  strtoupper($this->request->getPost('inversion')) , 
						"vehiculo" =>  strtoupper($this->request->getPost('vehiculo')) , 
						"calidad_vida" => strtoupper($this->request->getPost('calidad'))  , 
						"vicios" =>  strtoupper($this->request->getPost('vicio')) , 
						"imagen_publica" =>  strtoupper($this->request->getPost('imagen')) , 
						"comportamiento" => strtoupper($this->request->getPost('comportamiento'))  ,
						"activo" => 1 , 
						"createdby" => $LoggedUserId , 
						"createddate" => date("Y-m-d H:i:s") );


					$datosDependientesArray=[];
					
				if ($datos == 0){	
					$val ="";
					$clockSequence = 16383;
					for ($i = 1; $i <= 2; $i++) {
  						
  						$uuid1 = Uuid::uuid1($clockSequence);
                        $idDep = $uuid1->toString();

  						$getFecha_nacimiento_dep = $this->request->getPost('fecha_nacimiento_dep'.$val);

        				$fecha_nacimiento_dep = date( "Y-m-d" ,strtotime($getFecha_nacimiento_dep));

        				$getSexo_dep = $this->request->getPost('sexo_dep'.$val);

        				$sexo_dep = $this->encrypt->Decrytp($getSexo_dep);

        				$getParentesco_familiar = $this->request->getPost('parentesco_familiar'.$val);

        				$parentesco_familiar = $this->encrypt->Decrytp($getParentesco_familiar);

					$datosDependientesArray[] = array(

						"id" => $idDep ,
						"idSocioeconomico" => $id , 
						"apellido_paterno" => strtoupper($this->request->getPost('apellidoPaterno'.$val))  , 
						"apellido_materno" => strtoupper($this->request->getPost('apellidoMaterno'.$val))  , 
						"primer_nombre" => strtoupper($this->request->getPost('primerNombre'.$val))  , 
						"segundo_nombre" => strtoupper($this->request->getPost('segundoNombre'.$val))  , 
						"fecha_nacimiento" => $fecha_nacimiento_dep  , 
						"idGenero" => $sexo_dep  ,
						"idParentesco" =>  $parentesco_familiar ,
						"activo" => 1 , 
						"createdby" => $LoggedUserId , 
						"createddate" => date("Y-m-d H:i:s"));

						$val ="B";

						$valB =$this->request->getPost('apellidoPaternoB');

						if (!isset($valB) || empty($valB)){

							$i = 3;
						}
					}
				}



					$result = $this->modelCuip->insertSocioEconomico( $socioEconomico,$datosDependientesArray,$datos);

					
					
                    if ($result) {

            			
                    	$succes = ["mensaje" => 'Socio Economicos agregados con exito' ,
                            	   "succes" => "succes"];

                           	   
                    	
                    } else {
                    	$dontSucces = ["error" => "error",
                    				  "mensaje" => 	'Hubo un error al registrar los Socio Economicos'  ];

                    }
				} else {	
					$errors = $this->validator->getErrors();
				}

				

			} else {

				$dontSucces = ["error" => "error",
                    				  "mensaje" => 	'Es necesario que primero capture la sección de datos personales'  ];

			}	


			echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
		}	
	}


	public function AgregarEmpSegPublica(){
		if ($this->request->getMethod() == "post" && $this->request->getvar(['dependencia, corporacion, calle, exterior, interior, numero, codigoSegPub, coloniacodigoSegPub, aprobacion, separacionEmpSeg, puesto_funcional, funciones, especialidad, rango, numero_placa, numero_empleado, sueldo, compensaciones, area, division, jefe_inmediato, nombre_jefe, estadocodigoSegPub, municipiocodigoSegPub, motivo_separacion, tipo_separacion, tipo_baja, comentarios'],FILTER_SANITIZE_STRING)){

			$errors = [];
			$succes = [];
			$dontSucces = [];
			$data = [];
			
			$getIdPersonal = $this->request->getPost('idPersonal');

			if(!empty($getIdPersonal)){	

				$datos = $this->request->getPost('empleo');

				if($datos == 0){


					$rules = [
					'dependencia' =>  ['label' => "Dependencia", 'rules' => 'required|max_length[255]'],
					'corporacion' =>  ['label' => "Corporacióne", 'rules' => 'required|max_length[255]'],
					'calle' =>  ['label' => "Calle ", 'rules' => 'required|max_length[255]'],
					'exterior' =>  ['label' => "No. Exterior", 'rules' => 'required|max_length[255]'],
					
					'numero' =>  ['label' => "Numero Telefónico", 'rules' => 'required|max_length[10]|integer|min_length[10]'],
					'codigoSegPub' =>  ['label' => "Código Postal", 'rules' => 'required|max_length[5]|integer'],
					'coloniacodigoSegPub' =>  ['label' => "Colonia", 'rules' => 'required'],
					'ingresoEmpPublic' =>  ['label' => "Ingreso", 'rules' => 'required|valid_only_date_chek'],
					'separacionEmpSeg' =>  ['label' => "Separación", 'rules' => 'required|valid_only_date_chek'],
					'puesto_funcional' =>  ['label' => "Puesto Funcional", 'rules' => 'required|max_length[255]'],
					'funciones' =>  ['label' => "Funciones", 'rules' => 'required|max_length[255]'],
					'especialidad' =>  ['label' => "Especialidad", 'rules' => 'required|max_length[255]'],
					'rango' =>  ['label' => "Rango o categoría", 'rules' => 'required|max_length[255]'],
					'numero_placa' =>  ['label' => "Numero de placa", 'rules' => 'required|max_length[255]'],
					'numero_empleado' =>  ['label' => "Numero de empleado", 'rules' => 'required|max_length[255]'],
					'sueldo' =>  ['label' => "Sueldo Base (Mensual)", 'rules' => 'required|max_length[255]'],
					'compensaciones' =>  ['label' => "Compensaciones (Mensual)", 'rules' => 'required|max_length[255]'],
					'area' =>  ['label' => "Area", 'rules' => 'required|max_length[255]'],
					'division' =>  ['label' => "División", 'rules' => 'required|max_length[255]'],
					'jefe_inmediato' =>  ['label' => "CUIP Jefe Inmediato", 'rules' => 'required|max_length[255]'],
					'nombre_jefe' =>  ['label' => "Nombre del Jefe Inmediato", 'rules' => 'required|max_length[255]'],
					'estadocodigoSegPub' =>  ['label' => "Entidad Federativa", 'rules' => 'required'],
					'municipiocodigoSegPub' =>  ['label' => "Municipio", 'rules' => 'required'],
					'motivo_separacion' =>  ['label' => "Motivo de separación", 'rules' => 'required|max_length[255]'],
					'tipo_separacion' =>  ['label' => "Tipo de Separación", 'rules' => 'required|max_length[255]'],
					'tipo_baja' =>  ['label' => "Tipo de Baja", 'rules' => 'required|max_length[255]'],
					'comentarios' =>  ['label' => "Comentarios", 'rules' => 'required|max_length[255]']];
		 
				



					if($this->validate($rules)){
					
						$getUser = session()->get('IdUser');
						$LoggedUserId = $this->encrypter->decrypt($getUser);
						$empresa = session()->get('empresa');
						$idEmpresa = $this->encrypter->decrypt($empresa);
						$uuid = Uuid::uuid4();
	        			$id = $uuid->toString();

	        			$idPersonal = $this->encrypt->Decrytp($getIdPersonal);

	        			
	        			$getIngresoEmpPublic = $this->request->getPost('ingresoEmpPublic');

	        			$ingresoEmpPublic = date( "Y-m-d" ,strtotime($getIngresoEmpPublic));


	        			$getSeparacion = $this->request->getPost('separacionEmpSeg');

	        			$separacion = date( "Y-m-d" ,strtotime($getSeparacion));

	        			

						$empleosSeguridad = array(
			    					
			    					
							"id" => $id  ,
							"idPersonal" => $idPersonal  , 
							"idEmpresa" =>  $idEmpresa , 
							"dependencia" =>  strtoupper($this->request->getPost('dependencia')) , 
							"corporacion" =>  strtoupper($this->request->getPost('corporacion')) , 
							
							"calle" =>  strtoupper($this->request->getPost('calle')) , 
							"numero_exterior" => strtoupper($this->request->getPost('exterior'))  , 
							"numero_interior" => strtoupper($this->request->getPost('interior'))  , 
							"colonia" =>  strtoupper($this->request->getPost('coloniacodigoSegPub')) , 
							"idCodigoPostal" => $this->request->getPost('codigoSegPub')  , 
							"numero_telefono" => $this->request->getPost('numero')  , 
							"ingreso" =>  $ingresoEmpPublic , 
							"separacion" =>  $separacion , 
							"idPuestoFuncional" =>  strtoupper($this->request->getPost('puesto_funcional')) , 
							"funciones" => strtoupper($this->request->getPost('funciones'))  , 
							"especialidad" => strtoupper($this->request->getPost('especialidad'))  , 
							"rango" =>  strtoupper($this->request->getPost('rango')) , 
							"numero_placa" => strtoupper($this->request->getPost('numero_placa'))  , 
							"numero_empleado" => strtoupper($this->request->getPost('numero_empleado'))  , 
							"sueldo_base" => strtoupper($this->request->getPost('sueldo'))  , 
							"compensacion" =>  strtoupper($this->request->getPost('compensaciones')) , 
							"area" =>  strtoupper($this->request->getPost('area')) , 
							"division" =>  strtoupper($this->request->getPost('division')) , 
							"cuip_jefe" =>  strtoupper($this->request->getPost('jefe_inmediato')) , 
							"nombre_jefe" =>  strtoupper($this->request->getPost('nombre_jefe')) , 
							"idEstado" =>  strtoupper($this->request->getPost('estadocodigoSegPub')) , 
							"municipio" => strtoupper($this->request->getPost('municipiocodigoSegPub'))  , 
							"idMotivoSeparacion" =>  strtoupper($this->request->getPost('motivo_separacion')) , 
							"tipo_separacion" => strtoupper($this->request->getPost('tipo_separacion'))  , 
							"tipo_baja" =>  strtoupper($this->request->getPost('tipo_baja')) , 
							"comentarios" => strtoupper($this->request->getPost('comentarios')) , 
							"activo" => 1 , 
							"createdby" => $LoggedUserId , 
							"createddate" => date("Y-m-d H:i:s") );
						

						$result = $this->modelCuip->insertEmpleosSeguridad( $empleosSeguridad);

					
					
                    	if ($result) {

            			
                    		$succes = ["mensaje" => 'Empleos en Seguridad Publica agregados con exito' ,
                            	   "succes" => "succes"];

                           	   
                    	
                    	} else {
                    	$dontSucces = ["error" => "error",
                    				  "mensaje" => 	'Hubo un error al registrar los Empleos en Seguridad Publica'  ];

                    	}
					} else {	
						$errors = $this->validator->getErrors();
					}
				} else {

					$dontSucces = ["error" => "error",
                    				  "mensaje" => 	'Ningun dato capturado'  ];	
				}	
				
				

			} else {

				$dontSucces = ["error" => "error",
                    				  "mensaje" => 	'Es necesario que primero capture la sección de datos personales'  ];
			}

			echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);	
		}	
	}


	public function AgregarSancionesEstimulos(){
		if ($this->request->getMethod() == "post" && $this->request->getvar(['tipo, determinacion, descripcion, situacion, inicio_inhabilitacion, termino_inhabilitacion, organismo, emisora, entidad_federativaSE, delitos, motivo, no_expediente, agencia_mp, averiguacion_previa, tipo_fuero, averiguacion_estado, inicio_averiguacion, al_dia, juzgado, no_proceso, estado_procesal, inicio_proceso, al_dia_proceso, tipo_estimulo, descripcion_estimulo, dependencia, otrogado_estimulo'],FILTER_SANITIZE_STRING)){

			$errors = [];
			$succes = [];
			$dontSucces = [];
			$data = [];
			$getIdPersonal = $this->request->getPost('idPersonal');



			if(!empty($getIdPersonal)){

				
				$sanciones = $this->request->getPost('sanciones');
				$resoluciones = $this->request->getPost('resoluciones');
				$estimulo = $this->request->getPost('estimulo');

				if( $sanciones == 0 && $resoluciones == 0 && $estimulo == 0){

					if($sanciones == 0){
				
					$rules['tipo'] =  ['label' => "Tipo", 'rules' => 'required|max_length[255]'];
					$rules['determinacion'] =  ['label' => "Determinación", 'rules' => 'required'];
					$rules['descripcion'] =  ['label' => "Descripción", 'rules' => 'required|max_length[255]'];
					$rules['situacion'] =  ['label' => "Situación", 'rules' => 'required|max_length[255]'];
					$rules['inicio_inhabilitacion'] =  ['label' => "Inicio de la inhabilitación", 'rules' => 'required'];
					$rules['termino_inhabilitacion'] =  ['label' => "Término de la inhabilitación", 'rules' => 'required'];
					$rules['organismo'] =  ['label' => "Dependencia u organismo que emite la determinación", 'rules' => 'required|max_length[255]'];

					$rules['tipoB'] =  ['label' => "Tipo", 'rules' => 'required_with[determinacionB,descripcionB,situacionB,inicio_inhabilitacionB,termino_inhabilitacionB,organismoB]|max_length[255]'];
					$rules['determinacionB'] =  ['label' => "Determinación", 'rules' => 'required_with[tipoB,descripcionB,situacionB,inicio_inhabilitacionB,termino_inhabilitacionB,organismoB]'];
					$rules['descripcionB'] =  ['label' => "Descripción", 'rules' => 'required_with[tipoB,determinacionB,situacionB,inicio_inhabilitacionB,termino_inhabilitacionB,organismoB]|max_length[255]'];
					$rules['situacionB'] =  ['label' => "Situación", 'rules' => 'required_with[tipoB,determinacionB,descripcionB,inicio_inhabilitacionB,termino_inhabilitacionB,organismoB]|max_length[255]'];
					$rules['inicio_inhabilitacionB'] =  ['label' => "Inicio de la inhabilitación", 'rules' => 'required_with[tipoB,determinacionB,descripcionB,situacionB,termino_inhabilitacionB,organismoB]'];
					$rules['termino_inhabilitacionB'] =  ['label' => "Término de la inhabilitación", 'rules' => 'required_with[tipoB,determinacionB,descripcionB,situacionB,inicio_inhabilitacionB,organismoB]'];
					$rules['organismoB'] =  ['label' => "Dependencia u organismo que emite la determinación", 'rules' => 'required_with[tipoB,determinacionB,descripcionB,situacionB,inicio_inhabilitacionB,termino_inhabilitacionB]|max_length[255]'];

				}

			if($resoluciones == 0){

				
				
				$rules['emisora'] =  ['label' => "Institución emisora", 'rules' => 'required|max_length[255]'];
				$rules['entidad_federativaSE'] =  ['label' => "Entidad federativa", 'rules' => 'required'];
				$rules['delitos'] =  ['label' => "Delitos", 'rules' => 'required|max_length[255]'];
				$rules['motivo'] =  ['label' => "Motivo", 'rules' => 'required|max_length[255]'];
				$rules['no_expediente'] =  ['label' => "No. Expediente", 'rules' => 'required|max_length[255]'];
				$rules['agencia_mp'] =  ['label' => "Agencia del MP", 'rules' => 'required|max_length[255]'];
				$rules['averiguacion_previa'] =  ['label' => "Averiguación previa", 'rules' => 'required|max_length[255]'];
				$rules['tipo_fuero'] =  ['label' => "Tipo de Fuero", 'rules' => 'required'];
				$rules['averiguacion_estado'] =  ['label' => "Estado de la averiguación previa", 'rules' => 'required|max_length[255]'];
				$rules['inicio_averiguacion'] =  ['label' => "Inicio de la averiguación", 'rules' => 'required'];
				$rules['al_dia'] =  ['label' => "Al día", 'rules' => 'required'];
				$rules['juzgado'] =  ['label' => "Juzgado", 'rules' => 'required|max_length[255]'];
				$rules['no_proceso'] =  ['label' => "No. Proceso", 'rules' => 'required|max_length[255]'];
				$rules['estado_procesal'] =  ['label' => "Estado Procesal", 'rules' => 'required|max_length[255]'];
				$rules['inicio_proceso'] =  ['label' => "Inicio del proceso", 'rules' => 'required'];
				$rules['al_dia_proceso'] =  ['label' => "Al día", 'rules' => 'required'];

				/////

				$rules['emisoraB'] =  ['label' => "Institución emisora", 'rules' => 'required_with[entidad_federativaSEB,delitosB,motivoB,no_expedienteB,agencia_mpB,averiguacion_previaB,tipo_fueroB,averiguacion_estadoB,inicio_averiguacionB,al_diaB,juzgadoB,no_procesoB,estado_procesalB,inicio_procesoB,al_dia_procesoB]|max_length[255]'];
				$rules['entidad_federativaSEB'] =  ['label' => "Entidad federativa", 'rules' => 'required_with[emisoraB,delitosB,motivoB,no_expedienteB,agencia_mpB,averiguacion_previaB,tipo_fueroB,averiguacion_estadoB,inicio_averiguacionB,al_diaB,juzgadoB,no_procesoB,estado_procesalB,inicio_procesoB,al_dia_procesoB]'];
				$rules['delitosB'] =  ['label' => "Delitos", 'rules' => 'required_with[emisoraB,entidad_federativaSEB,motivoB,no_expedienteB,agencia_mpB,averiguacion_previaB,tipo_fueroB,averiguacion_estadoB,inicio_averiguacionB,al_diaB,juzgadoB,no_procesoB,estado_procesalB,inicio_procesoB,al_dia_procesoB]|max_length[255]'];
				$rules['motivoB'] =  ['label' => "Motivo", 'rules' => 'required_with[emisoraB,entidad_federativaSEB,delitosB,no_expedienteB,agencia_mpB,averiguacion_previaB,tipo_fueroB,averiguacion_estadoB,inicio_averiguacionB,al_diaB,juzgadoB,no_procesoB,estado_procesalB,inicio_procesoB,al_dia_procesoB]|max_length[255]'];
				$rules['no_expedienteB'] =  ['label' => "No. Expediente", 'rules' => 'required_with[emisoraB,entidad_federativaSEB,delitosB,motivoB,agencia_mpB,averiguacion_previaB,tipo_fueroB,averiguacion_estadoB,inicio_averiguacionB,al_diaB,juzgadoB,no_procesoB,estado_procesalB,inicio_procesoB,al_dia_procesoB]|max_length[255]'];
				$rules['agencia_mpB'] =  ['label' => "Agencia del MP", 'rules' => 'required_with[emisoraB,entidad_federativaSEB,delitosB,motivoB,no_expedienteB,averiguacion_previaB,tipo_fueroB,averiguacion_estadoB,inicio_averiguacionB,al_diaB,juzgadoB,no_procesoB,estado_procesalB,inicio_procesoB,al_dia_procesoB]|max_length[255]'];
				$rules['averiguacion_previaB'] =  ['label' => "Averiguación previa", 'rules' => 'required_with[emisoraB,entidad_federativaSEB,delitosB,motivoB,no_expedienteB,agencia_mpB,tipo_fueroB,averiguacion_estadoB,inicio_averiguacionB,al_diaB,juzgadoB,no_procesoB,estado_procesalB,inicio_procesoB,al_dia_procesoB]|max_length[255]'];
				$rules['tipo_fueroB'] =  ['label' => "Tipo de Fuero", 'rules' => 'required_with[emisoraB,entidad_federativaSEB,delitosB,motivoB,no_expedienteB,agencia_mpB,averiguacion_previaB,averiguacion_estadoB,inicio_averiguacionB,al_diaB,juzgadoB,no_procesoB,estado_procesalB,inicio_procesoB,al_dia_procesoB]'];
				$rules['averiguacion_estadoB'] =  ['label' => "Estado de la averiguación previa", 'rules' => 'required_with[emisoraB,entidad_federativaSEB,delitosB,motivoB,no_expedienteB,agencia_mpB,averiguacion_previaB,tipo_fueroB,inicio_averiguacionB,al_diaB,juzgadoB,no_procesoB,estado_procesalB,inicio_procesoB,al_dia_procesoB]|max_length[255]'];
				$rules['inicio_averiguacionB'] =  ['label' => "Inicio de la averiguación", 'rules' => 'required_with[emisoraB,entidad_federativaSEB,delitosB,motivoB,no_expedienteB,agencia_mpB,averiguacion_previaB,tipo_fueroB,averiguacion_estadoB,al_diaB,juzgadoB,no_procesoB,estado_procesalB,inicio_procesoB,al_dia_procesoB]'];
				$rules['al_diaB'] =  ['label' => "Al día", 'rules' => 'required_with[emisoraB,entidad_federativaSEB,delitosB,motivoB,no_expedienteB,agencia_mpB,averiguacion_previaB,tipo_fueroB,averiguacion_estadoB,inicio_averiguacionB,juzgadoB,no_procesoB,estado_procesalB,inicio_procesoB,al_dia_procesoB]'];
				$rules['juzgadoB'] =  ['label' => "Juzgado", 'rules' => 'required_with[emisoraB,entidad_federativaSEB,delitosB,motivoB,no_expedienteB,agencia_mpB,averiguacion_previaB,tipo_fueroB,averiguacion_estadoB,inicio_averiguacionB,al_diaB,no_procesoB,estado_procesalB,inicio_procesoB,al_dia_procesoB]|max_length[255]'];
				$rules['no_procesoB'] =  ['label' => "No. Proceso", 'rules' => 'required_with[emisoraB,entidad_federativaSEB,delitosB,motivoB,no_expedienteB,agencia_mpB,averiguacion_previaB,tipo_fueroB,averiguacion_estadoB,inicio_averiguacionB,al_diaB,juzgadoB,estado_procesalB,inicio_procesoB,al_dia_procesoB]|max_length[255]'];
				$rules['estado_procesalB'] =  ['label' => "Estado Procesal", 'rules' => 'required_with[emisoraB,entidad_federativaSEB,delitosB,motivoB,no_expedienteB,agencia_mpB,averiguacion_previaB,tipo_fueroB,averiguacion_estadoB,inicio_averiguacionB,al_diaB,juzgadoB,no_procesoB,inicio_procesoB,al_dia_procesoB]|max_length[255]'];
				$rules['inicio_procesoB'] =  ['label' => "Inicio del proceso", 'rules' => 'required_with[emisoraB,entidad_federativaSEB,delitosB,motivoB,no_expedienteB,agencia_mpB,averiguacion_previaB,tipo_fueroB,averiguacion_estadoB,inicio_averiguacionB,al_diaB,juzgadoB,no_procesoB,estado_procesalB,al_dia_procesoB]'];
				$rules['al_dia_procesoB'] =  ['label' => "Al día", 'rules' => 'required_with[emisoraB,entidad_federativaSEB,delitosB,motivoB,no_expedienteB,agencia_mpB,averiguacion_previaB,tipo_fueroB,averiguacion_estadoB,inicio_averiguacionB,al_diaB,juzgadoB,no_procesoB,estado_procesalB,inicio_procesoB]'];

			} 

			if($estimulo == 0){

				$rules['tipo_estimulo'] =  ['label' => "Tipo", 'rules' => 'required|max_length[255]'];
				$rules['descripcion_estimulo'] =  ['label' => "Descripción", 'rules' => 'required|max_length[255]'];
				$rules['dependencia'] =  ['label' => "Dependencia que otorga", 'rules' => 'required|max_length[255]'];
				$rules['otrogado_estimulo'] =  ['label' => "Otorgado", 'rules' => 'required'];


				$rules['tipo_estimuloB'] =  ['label' => "Tipo", 'rules' => 'required_with[descripcion_estimuloB,dependenciaB,otrogado_estimuloB]|max_length[255]'];
				$rules['descripcion_estimuloB'] =  ['label' => "Descripción", 'rules' => 'required_with[tipo_estimuloB,dependenciaB,otrogado_estimuloB]|max_length[255]'];
				$rules['dependenciaB'] =  ['label' => "Dependencia que otorga", 'rules' => 'required_with[tipo_estimuloB,descripcion_estimuloB,otrogado_estimuloB]|max_length[255]'];
				$rules['otrogado_estimuloB'] =  ['label' => "Otorgado", 'rules' => 'required_with[tipo_estimuloB,descripcion_estimuloB,dependenciaB]'];
				
			}	 
		 
				
				if($this->validate($rules)){
					
					$getUser = session()->get('IdUser');
					$LoggedUserId = $this->encrypter->decrypt($getUser);
					$empresa = session()->get('empresa');
					$idEmpresa = $this->encrypter->decrypt($empresa);
					$uuid = Uuid::uuid4();
        			

        			$idPersonal = $this->encrypt->Decrytp($getIdPersonal);
//$idPersonal = $getIdPersonal;
        			
        			
        			$datosSanciones=[];
        			$datosResoluciones=[];
        			$datosEstimulos=[];
					
				if ($sanciones == 0){	
					$val ="";
					$clockSequence = 16383;
					for ($i = 1; $i <= 2; $i++) {
  						
  						$uuid1 = Uuid::uuid1($clockSequence);
                        $idSan = $uuid1->toString();

  						$getDeterminacion = $this->request->getPost('determinacion'.$val);

        				$determinacion = date( "Y-m-d" ,strtotime($getDeterminacion));

        				$getInicio_inhabilitacion = $this->request->getPost('inicio_inhabilitacion'.$val);

        				$inicio_inhabilitacion = date( "Y-m-d" ,strtotime($getInicio_inhabilitacion));

        				$getTermino_inhabilitacion = $this->request->getPost('termino_inhabilitacion'.$val);

        				$termino_inhabilitacion = date( "Y-m-d" ,strtotime($getTermino_inhabilitacion));

					$datosSanciones[] = array(

						"id" => $idSan ,
						"idPersonal" => $idPersonal , 
						"idEmpresa" => $idEmpresa ,
						"tipo_sancion" =>  strtoupper($this->request->getPost('tipo'.$val)) , 
						"determinacion" =>  $determinacion , 
						"descripcion_sancion" => strtoupper($this->request->getPost('descripcion'.$val))  , 
						"situacion" =>  strtoupper($this->request->getPost('situacion'.$val)) , 
						"inicio_habilitacion" =>  $inicio_inhabilitacion , 
						"termino_habilitacion" => $termino_inhabilitacion  , 
						"dependencia" =>  strtoupper($this->request->getPost('organismo'.$val)) ,
						"activo" => 1 , 
						"createdby" => $LoggedUserId , 
						"createddate" => date("Y-m-d H:i:s"));

						$val ="B";

						$valB =$this->request->getPost('tipoB');

						if (!isset($valB) || empty($valB)){

							$i = 3;
						}
					}
				}

				if ($resoluciones == 0){	
					$val ="";
					$clockSequence = 16383;
					for ($i = 1; $i <= 2; $i++) {
  						
  						$uuid1 = Uuid::uuid1($clockSequence);
                        $idRes = $uuid1->toString();

  						$getInicio_averiguacion = $this->request->getPost('inicio_averiguacion'.$val);

        				$inicio_averiguacion = date( "Y-m-d" ,strtotime($getInicio_averiguacion));

        				$getAl_dia = $this->request->getPost('al_dia'.$val);

        				$al_dia = date( "Y-m-d" ,strtotime($getAl_dia));

        				$getInicio_proceso = $this->request->getPost('inicio_proceso'.$val);

        				$inicio_proceso = date( "Y-m-d" ,strtotime($getInicio_proceso));

        				$getAl_dia_proceso = $this->request->getPost('al_dia_proceso'.$val);

        				$al_dia_proceso = date( "Y-m-d" ,strtotime($getAl_dia_proceso));


        				$getIdTipoFuero = $this->request->getPost('tipo_fuero'.$val);

        				$idTipoFuero = $this->encrypt->Decrytp($getIdTipoFuero);

        				$getIdEstado = $this->request->getPost('entidad_federativaSE'.$val);

        				$idEstado = $this->encrypt->Decrytp($getIdEstado);

						$datosResoluciones[] = array(

							"id" => $idRes ,
							"idPersonal" => $idPersonal , 
							"idEmpresa" => $idEmpresa ,
							"institucion_emisora" =>  strtoupper($this->request->getPost('emisora'.$val)) , 
							"idEstado" =>  $idEstado , 
							"delitos" =>  strtoupper($this->request->getPost('delitos'.$val)) , 
							"motivos" =>  strtoupper($this->request->getPost('motivo'.$val)) , 
							"numero_expediente" =>  strtoupper($this->request->getPost('no_expediente'.$val)) , 
							"agencia_mp" =>  strtoupper($this->request->getPost('agencia_mp'.$val)) , 
							"averiguacion_previa" =>  strtoupper($this->request->getPost('averiguacion_previa'.$val)) , 
							"idTipoFuero" =>  $idTipoFuero , 
							"estado_averiguacion" =>  strtoupper($this->request->getPost('averiguacion_estado'.$val)) , 
							"inicio_averiguacion" =>  $inicio_averiguacion , 
							"aldia_averiguacion" => $al_dia  , 
							"juzgado" =>  strtoupper($this->request->getPost('juzgado'.$val)) , 
							"num_proceso" =>  strtoupper($this->request->getPost('no_proceso'.$val)) , 
							"estado_procesal" => strtoupper($this->request->getPost('estado_procesal'.$val))  , 
							"inicio_proceso" => $inicio_proceso  , 
							"aldia_proceso" =>  $al_dia_proceso ,
							"activo" => 1 , 
							"createdby" => $LoggedUserId , 
							"createddate" => date("Y-m-d H:i:s"));

						$val ="B";

						$valB =$this->request->getPost('emisoraB');

						if (!isset($valB) || empty($valB)){

							$i = 3;
						}
					}
				}


					if ($estimulo == 0){	
						$val ="";
						$clockSequence = 16383;
						for ($i = 1; $i <= 2; $i++){
  						
  							$uuid1 = Uuid::uuid1($clockSequence);
                        	$idEst = $uuid1->toString();

  							$getOtrogado_estimulo = $this->request->getPost('otrogado_estimulo'.$val);

        					$otrogado_estimulo = date( "Y-m-d" ,strtotime($getOtrogado_estimulo));

							$datosEstimulos[] = array(

								"id" => $idEst ,
								"idPersonal" => $idPersonal , 
								"idEmpresa" => $idEmpresa ,
								"tipo_estimulo" => strtoupper($this->request->getPost('tipo_estimulo'.$val))  , 
								"descripcion_estimulo" => strtoupper($this->request->getPost('descripcion_estimulo'.$val))  , 
								"dependencia_otorga" => strtoupper($this->request->getPost('dependencia'.$val))  , 
								"otorgado" =>  $otrogado_estimulo ,
								"activo" => 1 , 
								"createdby" => $LoggedUserId , 
								"createddate" => date("Y-m-d H:i:s"));

								$val ="B";

								$valB =$this->request->getPost('tipo_estimuloB');

								if (!isset($valB) || empty($valB)){

									$i = 3;
								}
						}
				
					}	

					
						$result = $this->modelCuip->insertSancionesEstimulos($datosEstimulos,$datosResoluciones,$datosSanciones,$sanciones,$resoluciones,$estimulo);

					
					
                    	if ($result) {

            			
                    		$succes = ["mensaje" => 'Sanciones / Estimulos agregados con exito' ,
                            	   "succes" => "succes"];

                           	   
                    	
                    	} else {
                    		$dontSucces = ["error" => "error",
                    				  "mensaje" => 	'Hubo un error al registrar las Sanciones / Estimulos'  ];

                    	}
					} else {	
						$errors = $this->validator->getErrors();
					}

				} else {

					$dontSucces = ["error" => "error",
                    				  "mensaje" => 	'Ningun dato capturado'  ];	
				}	
					

			} else {

				$dontSucces = ["error" => "error",
                    				  "mensaje" => 	'Es necesario que primero capture la sección de datos personales'  ];

			}

			echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);	
		}	
	}

	public function AgregarCapacitaciones(){
		if ($this->request->getMethod() == "post" && $this->request->getvar(['dependencia, institucion, nombre_curso, tema_curso, nivel_curso, eficienciaCursos, inicio, conclusion, duracion, comprobante, empresa, curso, tipo_curso, cuso_tomado, eficiencia, inicioAdicional, conclusionAdicional, duracion_horas, idioma, lectura, escritura, conversacion, tipo_habilidad, nombre, tipoAgrupa, especificacion, grado_habilidad, desde, hasta'],FILTER_SANITIZE_STRING)){

			$errors = [];
			$succes = [];
			$dontSucces = [];
			$data = [];
			$getIdPersonal = $this->request->getPost('idPersonal');

			if(!empty($getIdPersonal)){

				$publica = $this->request->getPost('publica');
				$capacitacion = $this->request->getPost('capacitacion');
				$valIdioma = $this->request->getPost('valIdioma');
				$habilidad = $this->request->getPost('habilidad');
				$afiliacion = $this->request->getPost('afiliacion');

				if($publica == 0 && $capacitacion == 0 && $valIdioma == 0 && $habilidad == 0 && $afiliacion == 0 ){

					if($capacitacion == 0){
				
						$rules['dependencia'] =  ['label' => "Dependencia responsable", 'rules' => 'required|max_length[255]'];
						$rules['institucion'] =  ['label' => "Institución Capacitadora", 'rules' => 'required|max_length[255]'];
						$rules['nombre_curso'] =  ['label' => "Nombre del curso", 'rules' => 'required|max_length[255]'];
						$rules['tema_curso'] =  ['label' => "Tema del curso", 'rules' => 'required|max_length[255]'];
						$rules['nivel_curso'] =  ['label' => "Nivel del curso recibido", 'rules' => 'required'];
						$rules['eficienciaCursos'] =  ['label' => "Eficiencia terminal", 'rules' => 'required'];
						$rules['inicio'] =  ['label' => "Inicio", 'rules' => 'required'];
						$rules['conclusion'] =  ['label' => "Conclusión", 'rules' => 'required'];
						$rules['duracion'] =  ['label' => "Duración en horas", 'rules' => 'required|max_length[255]'];
						$rules['comprobante'] =  ['label' => "Tipo de comprobante", 'rules' => 'required|max_length[255]'];

						////

						$rules['dependenciaB'] =  ['label' => "Dependencia responsable", 'rules' => 'required_with[institucionB,nombre_cursoB,tema_cursoB,nivel_cursoB,eficienciaCursosB,inicioB,conclusionB,duracionB,comprobanteB]|max_length[255]'];
						$rules['institucionB'] =  ['label' => "Institución Capacitadora", 'rules' => 'required_with[dependenciaB,nombre_cursoB,tema_cursoB,nivel_cursoB,eficienciaCursosB,inicioB,conclusionB,duracionB,comprobanteB]|max_length[255]'];
						$rules['nombre_cursoB'] =  ['label' => "Nombre del curso", 'rules' => 'required_with[dependenciaB,institucionB,tema_cursoB,nivel_cursoB,eficienciaCursosB,inicioB,conclusionB,duracionB,comprobanteB]|max_length[255]'];
						$rules['tema_cursoB'] =  ['label' => "Tema del curso", 'rules' => 'required_with[dependenciaB,institucionB,nombre_cursoB,nivel_cursoB,eficienciaCursosB,inicioB,conclusionB,duracionB,comprobanteB]|max_length[255]'];
						$rules['nivel_cursoB'] =  ['label' => "Nivel del curso recibido", 'rules' => 'required_with[dependenciaB,institucionB,nombre_cursoB,tema_cursoB,eficienciaCursosB,inicioB,conclusionB,duracionB,comprobanteB]'];
						$rules['eficienciaCursosB'] =  ['label' => "Eficiencia terminal", 'rules' => 'required_with[dependenciaB,institucionB,nombre_cursoB,tema_cursoB,nivel_cursoB,inicioB,conclusionB,duracionB,comprobanteB]'];
						$rules['inicioB'] =  ['label' => "Inicio", 'rules' => 'required_with[dependenciaB,institucionB,nombre_cursoB,tema_cursoB,nivel_cursoB,eficienciaCursosB,conclusionB,duracionB,comprobanteB]'];
						$rules['conclusionB'] =  ['label' => "Conclusión", 'rules' => 'required_with[dependenciaB,institucionB,nombre_cursoB,tema_cursoB,nivel_cursoB,eficienciaCursosB,inicioB,duracionB,comprobanteB]'];
						$rules['duracionB'] =  ['label' => "Duración en horas", 'rules' => 'required_with[dependenciaB,institucionB,nombre_cursoB,tema_cursoB,nivel_cursoB,eficienciaCursosB,inicioB,conclusionB,comprobanteB]|max_length[255]'];
						$rules['comprobanteB'] =  ['label' => "Tipo de comprobante", 'rules' => 'required_with[dependenciaB,institucionB,nombre_cursoB,tema_cursoB,nivel_cursoB,eficienciaCursosB,inicioB,conclusionB,duracionB]|max_length[255]'];

					} 

					if($publica == 0){
					
						$rules['empresa'] =  ['label' => "Insitutción o Empresa", 'rules' => 'required|max_length[255]'];
						$rules['curso'] =  ['label' => "Estudio o Curso", 'rules' => 'required|max_length[255]'];
						$rules['tipo_curso'] =  ['label' => "Tipo de curso", 'rules' => 'required'];
						$rules['cuso_tomado'] =  ['label' => "¿El curso fue?", 'rules' => 'required'];
						$rules['eficiencia'] =  ['label' => "Eficiencia terminal", 'rules' => 'required'];
						$rules['inicioAdicional'] =  ['label' => "Inicio", 'rules' => 'required'];
						$rules['conclusionAdicional'] =  ['label' => "Conclusión", 'rules' => 'required'];
						$rules['duracion_horas'] =  ['label' => "Duración en horas", 'rules' => 'required|integer'];

						////

						$rules['empresaB'] =  ['label' => "Insitutción o Empresa", 'rules' => 'required_with[cursoB,tipo_cursoB,cuso_tomadoB,eficienciaB,inicioAdicionalB,conclusionAdicionalB,duracion_horasB]|max_length[255]'];
						$rules['cursoB'] =  ['label' => "Estudio o Curso", 'rules' => 'required_with[empresaB,tipo_cursoB,cuso_tomadoB,eficienciaB,inicioAdicionalB,conclusionAdicionalB,duracion_horasB]|max_length[255]'];
						$rules['tipo_cursoB'] =  ['label' => "Tipo de curso", 'rules' => 'required_with[empresaB,cursoB,cuso_tomadoB,eficienciaB,inicioAdicionalB,conclusionAdicionalB,duracion_horasB]'];
						$rules['cuso_tomadoB'] =  ['label' => "¿El curso fue?", 'rules' => 'required_with[empresaB,cursoB,tipo_cursoB,eficienciaB,inicioAdicionalB,conclusionAdicionalB,duracion_horasB]'];
						$rules['eficienciaB'] =  ['label' => "Eficiencia terminal", 'rules' => 'required_with[empresaB,cursoB,tipo_cursoB,cuso_tomadoB,inicioAdicionalB,conclusionAdicionalB,duracion_horasB]'];
						$rules['inicioAdicionalB'] =  ['label' => "Inicio", 'rules' => 'required_with[empresaB,cursoB,tipo_cursoB,cuso_tomadoB,eficienciaB,conclusionAdicionalB,duracion_horasB]'];

						$rules['duracion_horasB'] = ['label' => "Duración en horas", 'rules' => 'required_with[empresaB,cursoB,tipo_cursoB,cuso_tomadoB,eficienciaB,inicioAdicionalB,conclusionAdicionalB]'];

						$rules['conclusionAdicionalB'] =  ['label' => "Conclusión", 'rules' => 'required_with[empresaB,cursoB,tipo_cursoB,cuso_tomadoB,eficienciaB,inicioAdicionalB,duracion_horasB]'];
						

					} 

					if($valIdioma == 0){
					
						$rules['idioma'] =  ['label' => "Lectura", 'rules' => 'required'];
						$rules['escritura'] =  ['label' => "Escritura", 'rules' => 'required'];
						$rules['lectura'] =  ['label' => "Lectura", 'rules' => 'required'];
						$rules['conversacion'] =  ['label' => "Conversación", 'rules' => 'required'];

						////

						$rules['idiomaB'] =  ['label' => "Lectura", 'rules' => 'required_with[escrituraB,lecturaB,conversacionB]'];
						$rules['escrituraB'] =  ['label' => "Escritura", 'rules' => 'required_with[idiomaB,lecturaB,conversacionB]'];
						$rules['lecturaB'] =  ['label' => "Lectura", 'rules' => 'required_with[idiomaB,escrituraB,conversacionB]'];
						$rules['conversacionB'] =  ['label' => "Conversación", 'rules' => 'required_with[idiomaB,escrituraB,lecturaB]'];

					}

					if($habilidad == 0){
					
						$rules['tipo_habilidad'] =  ['label' => "Tipo", 'rules' => 'required'];
						$rules['especificacion'] =  ['label' => "Especifique", 'rules' => 'required|max_length[255]'];
						$rules['grado_habilidadCap'] =  ['label' => "Grado de aptitude o dominio", 'rules' => 'required'];

						///

						$rules['tipo_habilidadB'] =  ['label' => "Tipo", 'rules' => 'required_with[especificacionB,grado_habilidadCapB]'];
						$rules['especificacionB'] =  ['label' => "Especifique", 'rules' => 'required_with[tipo_habilidadB,grado_habilidadCapB]|max_length[255]'];
						$rules['grado_habilidadCapB'] =  ['label' => "Grado de aptitude o dominio", 'rules' => 'required_with[tipo_habilidadB,especificacionB]'];

					}

					if($afiliacion == 0){
					
						$rules['nombre'] =  ['label' => "Nombre", 'rules' => 'required'];
						$rules['tipoAgrupa'] =  ['label' => "Tipo", 'rules' => 'required'];
					
						$rules['desde'] =  ['label' => "Desde", 'rules' => 'required'];
						$rules['hasta'] =  ['label' => "Hasta", 'rules' => 'required'];


						///


						$rules['nombreB'] =  ['label' => "Nombre", 'rules' => 'required_with[tipoAgrupaB,desdeB,hastaB]'];
						$rules['tipoAgrupaB'] =  ['label' => "Tipo", 'rules' => 'required_with[nombreB,desdeB,hastaB]'];
					
						$rules['desdeB'] =  ['label' => "Desde", 'rules' => 'required_with[nombreB,tipoAgrupaB,hastaB]'];
						$rules['hastaB'] =  ['label' => "Hasta", 'rules' => 'required_with[nombreB,tipoAgrupaB,desdeB]'];

					}


					
				if($this->validate($rules)){
					
					$getUser = session()->get('IdUser');
					$LoggedUserId = $this->encrypter->decrypt($getUser);
					$empresa = session()->get('empresa');
					$idEmpresa = $this->encrypter->decrypt($empresa);
					$uuid = Uuid::uuid4();
        			
        			$idPersonal = $this->encrypt->Decrytp($getIdPersonal);

        			
        			$datosPublica=[];
        			$datosCapacitacion=[];
        			$datosIdioma=[];
        			$datosHabilidad=[];
        			$datosAfiliacion=[];


        			if ($capacitacion == 0){	
						$val ="";
						$clockSequence = 16383;
						for ($i = 1; $i <= 2; $i++) {
  							
  							
  						
  							$uuid1 = Uuid::uuid1($clockSequence);
                        	$idCap = $uuid1->toString();

  							$getInicioAdicional = $this->request->getPost('inicioAdicional'.$val);

        					$inicioAdicional = date( "Y-m-d" ,strtotime($getInicioAdicional));

        					$getConclusionAdicional = $this->request->getPost('conclusionAdicional'.$val);

        					$conclusionAdicional = date( "Y-m-d" ,strtotime($getConclusionAdicional));

        					$getCuso_tomado = $this->request->getPost('cuso_tomado'.$val);

        					$cuso_tomado = $this->encrypt->Decrytp($getCuso_tomado);

        					$getEficiencia = $this->request->getPost('eficiencia'.$val);

        					$eficiencia = $this->encrypt->Decrytp($getEficiencia);

							$datosCapacitacion[] = array(

								"id" => $idCap ,
								"idPersonal" => $idPersonal , 
								"idEmpresa" => $idEmpresa ,
								"institucion"  => strtoupper($this->request->getPost('empresa'))  , 
								"curso"  =>  strtoupper($this->request->getPost('curso'.$val)) , 
								"tipo_curso"  =>  strtoupper($this->request->getPost('tipo_curso'.$val)) , 
								"idCursoFue"  => $cuso_tomado  , 
								"idEficienciaAdicional"  => $eficiencia  , 
								"inicio_adicional"  =>  $inicioAdicional , 
								"conclusion_adicional"  =>  $conclusionAdicional , 
								"duracion_horas_adicional"  => $this->request->getPost('duracion_horas'.$val)  , 
								"activo" => 1 , 
								"createdby" => $LoggedUserId , 
								"createddate" => date("Y-m-d H:i:s"));

							$val ="B";

							$valB =$this->request->getPost('empresaB');

							if (!isset($valB) || empty($valB)){

								$i = 3;
							}
  							
						}
					} 

					if ($publica == 0){

						$val ="";
						$clockSequence = 16383;
						for ($i = 1; $i <= 2; $i++) {

							$uuid1 = Uuid::uuid1($clockSequence);
                        	$idPubli = $uuid1->toString();

  							$getInicio = $this->request->getPost('inicio'.$val);

        					$inicio = date( "Y-m-d" ,strtotime($getInicio));

        					$getConclusion = $this->request->getPost('conclusion'.$val);

        					$conclusion = date( "Y-m-d" ,strtotime($getConclusion));

        					$getNivel_curso = $this->request->getPost('nivel_curso'.$val);

        					$nivel_curso = $this->encrypt->Decrytp($getNivel_curso);

        					$getEficienciaCursos = $this->request->getPost('eficienciaCursos'.$val);

        					$eficienciaCursos = $this->encrypt->Decrytp($getEficienciaCursos);

							$datosPublica[] = array(

								"id" => $idPubli ,
								"idPersonal" => $idPersonal , 
								"idEmpresa" => $idEmpresa ,
								"dependencia"  =>  strtoupper($this->request->getPost('dependencia'.$val)) , 
								"inst_capacitadora"  =>  strtoupper($this->request->getPost('institucion'.$val)) , 
								"nombre_curso"  =>  strtoupper($this->request->getPost('nombre_curso'.$val)) , 
								"tema_curso"  =>  strtoupper($this->request->getPost('tema_curso'.$val)) , 
								"idNivel_curso"  =>  $nivel_curso , 
								"idEficienciaCurso"  =>  $eficienciaCursos , 
								"inicio_curso"  =>  $inicio , 
								"conclusion_curso"  => $conclusion  , 
								"duracion_horas_curso"  =>  $this->request->getPost('duracion'.$val) , 
								"tipo_comprobante"  =>  strtoupper($this->request->getPost('comprobante'.$val)) ,
								"activo" => 1 , 
								"createdby" => $LoggedUserId , 
								"createddate" => date("Y-m-d H:i:s"));

							$val ="B";

							$valB =$this->request->getPost('dependenciaB');

							if (!isset($valB) || empty($valB)){

								$i = 3;
							}	
						
						}
					}

					if ($valIdioma == 0){	
						$val ="";
						$clockSequence = 16383;
						for ($i = 1; $i <= 2; $i++) {
  						
  							$uuid1 = Uuid::uuid1($clockSequence);
                        	$idIdioma = $uuid1->toString();

  							$getIdioma = $this->request->getPost('idioma'.$val);

		        			$idioma = $this->encrypt->Decrytp($getIdioma);

		        			$getLectura = $this->request->getPost('lectura'.$val);

		        			$lectura = $this->encrypt->Decrytp($getLectura);

		        			$getEscritura = $this->request->getPost('escritura'.$val);

		        			$escritura = $this->encrypt->Decrytp($getEscritura);

		        			$getConversacion = $this->request->getPost('conversacion'.$val);

		        			$conversacion = $this->encrypt->Decrytp($getConversacion);

							$datosIdioma[] = array(

								"id" => $idIdioma ,
								"idPersonal" => $idPersonal , 
								"idEmpresa" => $idEmpresa ,
								"idIdioma"  =>  $idioma , 
								"idIdiomaLectura"  => $lectura  , 
								"idIdiomaEscritura"  =>  $escritura , 
								"idIdiomaConversacion"  => $conversacion  ,
								"activo" => 1 , 
								"createdby" => $LoggedUserId , 
								"createddate" => date("Y-m-d H:i:s"));

							$val ="B";

							$valB =$this->request->getPost('idiomaB');

							if (!isset($valB) || empty($valB)){

								$i = 3;
							}
						}
					} 

					if ($habilidad == 0){	
						$val ="";
						$clockSequence = 16383;
						for ($i = 1; $i <= 2; $i++) {
  						
  							$uuid1 = Uuid::uuid1($clockSequence);
                        	$idHab = $uuid1->toString();

  							$getTipo_habilidad = $this->request->getPost('tipo_habilidad'.$val);

        					$tipo_habilidad = $this->encrypt->Decrytp($getTipo_habilidad);

        					$getGrado_habilidadCap = $this->request->getPost('grado_habilidadCap'.$val);

        					$grado_habilidadCap = $this->encrypt->Decrytp($getGrado_habilidadCap);

							$datosHabilidad[] = array(

								"id" => $idHab ,
								"idPersonal" => $idPersonal , 
								"idEmpresa" => $idEmpresa ,
								"idTipoHabilidad"  =>  $tipo_habilidad , 
								"especifique_habilidad"  =>  strtoupper($this->request->getPost('especificacion'.$val)) , 
								"idGradoHabilidad"  => $grado_habilidadCap  ,	
								"activo" => 1 , 
								"createdby" => $LoggedUserId , 
								"createddate" => date("Y-m-d H:i:s"));

							$val ="B";

							$valB =$this->request->getPost('tipo_habilidadB');

							if (!isset($valB) || empty($valB)){

								$i = 3;
							}
						}
					} 

					if ($afiliacion == 0){	
						$val ="";
						$clockSequence = 16383;
						for ($i = 1; $i <= 2; $i++) {
  						
  							$uuid1 = Uuid::uuid1($clockSequence);
                        	$idAfil = $uuid1->toString();

  							$getDesde = $this->request->getPost('desde'.$val);

		        			$desde = date( "Y-m-d" ,strtotime($getDesde));

		        			$getHasta = $this->request->getPost('hasta'.$val);

		        			$hasta = date( "Y-m-d" ,strtotime($getHasta));

		        			$getTipoAgrupa = $this->request->getPost('tipoAgrupa'.$val);

		        			$tipoAgrupa = $this->encrypt->Decrytp($getTipoAgrupa);

							$datosAfiliacion[] = array(

								"id" => $idAfil ,
								"idPersonal" => $idPersonal , 
								"idEmpresa" => $idEmpresa ,
								"nombre_agrupacion"  =>  strtoupper($this->request->getPost('nombre'.$val)) , 
								"idTipoAgrupacion"  =>  $tipoAgrupa , 
						 
								"desde"  =>  $desde , 
								"hasta"  => $hasta ,
								"activo" => 1 , 
								"createdby" => $LoggedUserId , 
								"createddate" => date("Y-m-d H:i:s"));

							$val ="B";

							$valB =$this->request->getPost('nombreB');

							if (!isset($valB) || empty($valB)){

								$i = 3;
							}
						}
					} 

        			

					$result = $this->modelCuip->insertCapacitaciones( $datosPublica,$datosCapacitacion,$datosIdioma,$datosHabilidad,$datosAfiliacion,$publica,$capacitacion,$valIdioma,$habilidad,$afiliacion);

					
					
                    if ($result) {

            			
                    	$succes = ["mensaje" => 'Capacitaciones agregados con exito' ,
                            	   "succes" => "succes"];

                           	   
                    	
                    } else {
                    	$dontSucces = ["error" => "error",
                    				  "mensaje" => 	'Hubo un error al registrar las Capacitaciones'  ];

                    }
				} else {	
					$errors = $this->validator->getErrors();
				}

			} else {

					$dontSucces = ["error" => "error",
                    				  "mensaje" => 	'Ningun dato capturado'  ];	
				}	

			} else {

				$dontSucces = ["error" => "error",
                    				  "mensaje" => 	'Es necesario que primero capture la sección de datos personales'  ];

			}

			echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);	
		}	
	}
	


	public function AgregarEmpDiversos(){
		if ($this->request->getMethod() == "post" && $this->request->getvar(['empresa, calle, exterior, interior, codigoEmpDiv, coloniacodigoEmpDiv, estadocodigoEmpDiv, municipiocodigoEmpDiv, numero, ingresoEmpDiv,  funciones, sueldo, area, motivo_separacion, tipo_separacion, comentarios, empleo, puesto, area_gustaria, ascender, reglamentacion, reconomiento, reglamentacion_ascenso, razones_ascenso, capacitacion, desciplina, subtipo_disciplina, motivo, tipo, fecha_inicialDis, fecha_finalDis, duracion, cantidad'],FILTER_SANITIZE_STRING)){

			$errors = [];
			$succes = [];
			$dontSucces = [];
			$data = [];
			$getIdPersonal = $this->request->getPost('idPersonal');

			if(!empty($getIdPersonal)){

				$rules = [
				
				'empleo' =>  ['label' => "¿Por qué Eligio este empleo?", 'rules' => 'required|max_length[255]'],
				'puesto' =>  ['label' => "¿Qué puesto le gustaria tener?", 'rules' => 'required|max_length[255]'],
				'area_gustaria' =>  ['label' => "¿En que area le gustaría estar?", 'rules' => 'required|max_length[255]'],
				'ascender' =>  ['label' => "¿En que tiempo desea ascender?", 'rules' => 'required|max_length[255]'],
				'reglamentacion' =>  ['label' => "¿Conoce la reglamentación de los reconocimientos?", 'rules' => 'required'],
				'reconomiento' =>  ['label' => "¿Razones por las que no ha recibido un reconocimiento?", 'rules' => 'required|max_length[255]'],
				'reglamentacion_ascenso' =>  ['label' => "¿Conoce la reglamentación de los ascensos?", 'rules' => 'required'],
				'razones_ascenso' =>  ['label' => "¿Razones por las que no ha recibido un ascenso?", 'rules' => 'required|max_length[255]'],
				'capacitacion' =>  ['label' => "¿Qué capacitación le gustaría recibir?", 'rules' => 'required|max_length[255]'],
				'desciplina' =>  ['label' => "Tipo de Disciplina", 'rules' => 'required'],
				'subtipo_disciplina' =>  ['label' => "Subtipo de disciplina", 'rules' => 'required|max_length[255]'],
				'motivo' =>  ['label' => "Motivo", 'rules' => 'required|max_length[255]'],
				'tipo' =>  ['label' => "Tipo", 'rules' => 'required|max_length[255]'],
				'fecha_inicialDis' =>  ['label' => "Fecha de Inicio", 'rules' => 'required|valid_only_date_chek'],
				'fecha_finalDis' =>  ['label' => "Fecha de Término", 'rules' => 'required|valid_only_date_chek'],
				
				'duracion' =>  ['label' => "Duración", 'rules' => 'required_with[cantidad]'],
				'cantidad' =>  ['label' => "Cantidad", 'rules' => 'required_with[duracion]']];


				$datos = $this->request->getPost('diversos');

				if($datos == 0){

					$rules['empresa'] =  ['label' => "Empresa", 'rules' => 'required|max_length[255]'];
				$rules['calle'] =  ['label' => "Calle", 'rules' => 'required|max_length[255]'];
				$rules['exterior'] =  ['label' => "No. Exterior", 'rules' => 'required|max_length[255]'];
				
				$rules['codigoEmpDiv'] =  ['label' => "Código Postal ", 'rules' => 'required|max_length[5]|integer'];
				$rules['coloniacodigoEmpDiv'] =  ['label' => "Colonia", 'rules' => 'required'];
				$rules['estadocodigoEmpDiv'] =  ['label' => "Entidad Federativa", 'rules' => 'required'];
				$rules['municipiocodigoEmpDiv'] =  ['label' => "Municipio", 'rules' => 'required'];
				$rules['numero'] = ['label' => "Numero Telefónico", 'rules' => 'required|max_length[10]|min_length[10]'];
				$rules['ingresoEmpDiv'] =  ['label' => "Ingreso", 'rules' => 'required|valid_only_date_chek'];
				$rules['funciones'] =  ['label' => "Funciones", 'rules' => 'required|max_length[255]'];
				$rules['sueldo'] =  ['label' => "Ingreso Neto (Mensual)", 'rules' => 'required|max_length[255]'];
				$rules['area'] =  ['label' => "Area", 'rules' => 'required|max_length[255]'];
				$rules['motivo_separacion'] =  ['label' => "Motivo de separación", 'rules' => 'required|max_length[255]'];
				$rules['tipo_separacion'] =  ['label' => "Tipo de Separación", 'rules' => 'required|max_length[255]'];
				
				$rules['comentarios'] =  ['label' => "Comentarios", 'rules' => 'required|max_length[255]'];

				}
		 
				

				if($this->validate($rules)){
					
					$getUser = session()->get('IdUser');
					$LoggedUserId = $this->encrypter->decrypt($getUser);
					$empresa = session()->get('empresa');
					$idEmpresa = $this->encrypter->decrypt($empresa);
					$uuid = Uuid::uuid4();
        			$id = $uuid->toString();

        			
        			$idPersonal = $this->encrypt->Decrytp($getIdPersonal);

        			
        			$getingresoEmpDiv = $this->request->getPost('ingresoEmpDiv');

        			$ingresoEmpDiv = date( "Y-m-d" ,strtotime($getingresoEmpDiv));

        			
        			$getFecha_inicialDis = $this->request->getPost('fecha_inicialDis');

        			$fecha_inicialDis = date( "Y-m-d" ,strtotime($getFecha_inicialDis));

        			$getFecha_finalDis = $this->request->getPost('fecha_finalDis');

        			$fecha_finalDis = date( "Y-m-d" ,strtotime($getFecha_finalDis));

        			

        			$getReglamentacion = $this->request->getPost('reglamentacion');

        			$reglamentacion = $this->encrypt->Decrytp($getReglamentacion);

        			$getReglamentacion_ascenso = $this->request->getPost('reglamentacion_ascenso');

        			$reglamentacion_ascenso = $this->encrypt->Decrytp($getReglamentacion_ascenso);

        			$getDesciplina = $this->request->getPost('desciplina');

        			$desciplina = $this->encrypt->Decrytp($getDesciplina);

        			$getDuracion = $this->request->getPost('duracion');

        			$duracion = $this->encrypt->Decrytp($getDuracion);

        			if($datos == 1){
					$empDiversos = array(
		    					
		    					
						"id" => $id  ,
						"idPersonal" => $idPersonal  , 
						"idEmpresa" =>  $idEmpresa , 
						"empresa"  => ""  , 
						"calle"  => "" , 
						"numero_exterior"  => ""  , 
						"numero_interior"  =>  "" , 
						"colonia" => "" , 
						"idCodigoPostal" =>  "" , 
						"numero_telefono"  =>  "" , 
						"ingreso"  =>  "",
						"area"  =>  "" , 
						"sueldo_base"  => "" ,
						"idEstado"  =>  "" , 
						"municipio"  =>  "" , 
						"idMotivoSeparacion"  => ""  , 
						"tipo_separacion"  => ""  ,
						"comentarios"  => ""  , 
						"eligio_empleo"  =>  strtoupper($this->request->getPost('empleo')) , 
						"puesto_gustaria"  =>  strtoupper($this->request->getPost('puesto')) , 
						"area_gustaria"  =>  strtoupper($this->request->getPost('area_gustaria')) , 
						"tiempo_ascenso"  =>  strtoupper($this->request->getPost('ascender')) , 
						"reglamento"  =>  $reglamentacion , 
						"razon_ascenso"  => $reglamentacion_ascenso  , 
						"capacitacion"  =>  strtoupper($this->request->getPost('capacitacion')) , 
						"idTipoDisciplina"  =>  $desciplina , 
						"subtipo_disciplina"  =>  strtoupper($this->request->getPost('subtipo_disciplina')) , 
						"motivo"  => strtoupper($this->request->getPost('motivo'))  , 
						"tipo"  =>  strtoupper($this->request->getPost('tipo')) , 
						"fecha_inicio"  =>  $fecha_inicialDis , 
						"fecha_termino"  => $fecha_finalDis  , 
						"idDuracion"  => $duracion   , 
						"cantidad" => strtoupper($this->request->getPost('cantidad')) , 
						"activo" => 1 , 
						"createdby" => $LoggedUserId , 
						"createddate" => date("Y-m-d H:i:s") );

					} else {

						$empDiversos = array(
		    					
		    					
						"id" => $id  ,
						"idPersonal" => $idPersonal  , 
						"idEmpresa" =>  $idEmpresa , 
						"empresa"  => strtoupper($this->request->getPost('empresa'))  , 
						"calle"  => strtoupper($this->request->getPost('calle'))  , 
						"numero_exterior"  => strtoupper($this->request->getPost('exterior'))  , 
						"numero_interior"  =>  strtoupper($this->request->getPost('interior')) , 
						"colonia"  =>  strtoupper($this->request->getPost('coloniacodigoEmpDiv')) , 
						"idCodigoPostal"  =>  $this->request->getPost('codigoEmpDiv') , 
						"numero_telefono"  =>  $this->request->getPost('numero') , 
						"ingreso"  =>  $ingresoEmpDiv , 
						
						"area"  =>  strtoupper($this->request->getPost('area')) ,
						"funciones"  =>  strtoupper($this->request->getPost('funciones')) ,
						"sueldo_base"  => strtoupper($this->request->getPost('sueldo'))  , 
						 
						"idEstado"  =>  strtoupper($this->request->getPost('estadocodigoEmpDiv')) , 
						"municipio"  =>  $this->request->getPost('municipiocodigoEmpDiv') , 
						"idMotivoSeparacion"  => strtoupper($this->request->getPost('motivo_separacion'))  , 
						"tipo_separacion"  => strtoupper($this->request->getPost('tipo_separacion'))  , 
						
						"comentarios"  => strtoupper($this->request->getPost('comentarios'))  , 
						"eligio_empleo"  =>  strtoupper($this->request->getPost('empleo')) , 
						"puesto_gustaria"  =>  strtoupper($this->request->getPost('puesto')) , 
						"area_gustaria"  =>  strtoupper($this->request->getPost('area_gustaria')) , 
						"tiempo_ascenso"  =>  strtoupper($this->request->getPost('ascender')) , 
						"reglamento"  =>  $reglamentacion , 
						"razon_ascenso"  => $reglamentacion_ascenso  ,
						"razon_no_reconocimiento" => strtoupper($this->request->getPost('reconomiento')),
						"razon_no_ascenso" => strtoupper($this->request->getPost('razones_ascenso')), 
						"capacitacion"  =>  strtoupper($this->request->getPost('capacitacion')) , 
						"idTipoDisciplina"  =>  $desciplina , 
						"subtipo_disciplina"  =>  strtoupper($this->request->getPost('subtipo_disciplina')) , 
						"motivo"  => strtoupper($this->request->getPost('motivo'))  , 
						"tipo"  =>  strtoupper($this->request->getPost('tipo')) , 
						"fecha_inicio"  =>  $fecha_inicialDis , 
						"fecha_termino"  => $fecha_finalDis  , 
						"idDuracion"  => $duracion   , 
						"cantidad" => strtoupper($this->request->getPost('cantidad')) , 
						"activo" => 1 , 
						"createdby" => $LoggedUserId , 
						"createddate" => date("Y-m-d H:i:s") );

					}

					
					$result = $this->modelCuip->insertEmpDiversos( $empDiversos);

					
					
                    if ($result) {

            			
                    	$succes = ["mensaje" => 'Empleos Diversos agregados con exito' ,
                            	   "succes" => "succes"];

                           	   
                    	
                    } else {
                    	$dontSucces = ["error" => "error",
                    				  "mensaje" => 	'Hubo un error al registrar los Empleos Diversos'  ];

                    }
				} else {	
					$errors = $this->validator->getErrors();
				}

				
			} else {

				$dontSucces = ["error" => "error",
                    				  "mensaje" => 	'Es necesario que primero capture la sección de datos personales'  ];

			}


			echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);	

		}	
	}


	public function getExpediente(){
		if ($this->request->getMethod() == "get"){

			$data['modulos'] = $this->menu->Permisos();
			$empresa = session()->get('empresa');
			$idEmpresa = $this->encrypter->decrypt($empresa);
			$getId = str_replace(" ", "+", $_GET['id']);
			$id = $this->encrypt->Decrytp($getId);
			$documentos = $this->modelCuip->GetDocumentos($idEmpresa,$id);

			$result = [];

    		foreach ( $documentos as $value){
				
				$id = $this->encrypt->Encrypt($value->id);
				$result[] = (object) array (
					'id' => $id ,
					'documento' => $value->documento,
					'tipo' => $value->tipo

				) ;
			}

			$getId = str_replace(" ", "+", $_GET['id']);
			$idDec = $this->encrypt->Decrytp($getId);
			$id = $this->encrypt->Encrypt($idDec);
			
			$data['documentos'] = $result;
			$data['idPersonal'] = $id; 

			$data['breadcrumb'] = ["inicio" => 'CUIP' ,
                    				"url" => 'cuip',
                    				"titulo" => 'Expediente'];
			
			return view('CargaMasiva/cargaMasiva', $data);
		}	
    }


    


    public function getCuipDetail(){
		if ($this->request->getMethod() == "get" && $this->request->getvar(['id'],FILTER_SANITIZE_STRING)){

			$data['modulos'] = $this->menu->Permisos();
			
			$getId = str_replace(" ", "+", $_GET['id']);
			$id = $this->encrypt->Decrytp($getId);

         	$data['variable'] = $this->modelCuip->GetDatosPersonalesById($id);
         	$data['experiencia'] = $this->modelCuip->GetExperienciaPersonalesById($id);
			$economico = $this->modelCuip->GetSocioEconomicoById($id);
			$data['estudio'] = $economico;
			if (!empty($economico)){
				$data['economico_dependientes'] = $this->modelCuip->GetSocioEconomicoDependientesById($economico->id);
			}
			$data['seguridad'] = $this->modelCuip->GetEmpleosSeridadById($id);
			$data['diversos'] = $this->modelCuip->GetEmpleosDiversos($id);
			$data['capacitacion'] = $this->modelCuip->GetCapacitaciones($id);
			$data['capacitacion_publica'] = $this->modelCuip->GetCapacitacionesPublicById($id);
			$data['idiomas'] = $this->modelCuip->GetIdiomasById($id);
			$data['habilidades'] = $this->modelCuip->GetHabilidadesById($id);
			$data['agrupaciones'] = $this->modelCuip->GetAgrupacionesById($id);
			$data['sanciones'] = $this->modelCuip->GetSanciones($id);

			$data['resoluciones'] = $this->modelCuip->GetResolucionesById($id);

			$data['estimulos'] = $this->modelCuip->GetEstimulosById($id);
			$data['referencia'] = $this->modelCuip->GetReferenciaById($id);
			$data['referenciaLab'] = $this->modelCuip->GetReferenciaLabById($id);
			$data['mediaFiliacion'] = $this->modelCuip->GetMedFiliacionById($id);
			$data['datosEmpleado'] = $this->modelCuip->GetAltaEmpleadoById($id);
			$data['uniforme'] = $this->modelCuip->GetUniformesById($id);
			$data['equipo'] = $this->modelCuip->GetEquiposById($id);
//var_dump($data['referenciaLab']);
			$documentos = $this->modelCuip->GetDocumentosById($id);



			$result = [];

    		foreach ( $documentos as $value){
				
				$idDoc = $this->encrypt->Encrypt($value->idDocumento);
				$result[] = (object) array (
					'id' => $idDoc ,
					'documento' => $value->documento,
					'tipo' => $value->tipo

				) ;
			}

			$data['documentos'] = $result;



			$data['id'] = $this->encrypt->Encrypt($id);;
			
			
			$data['breadcrumb'] = ["inicio" => 'CUIP' ,
                    				"url" => 'cuip',
                    				"titulo" => 'Detalle'];
			
			return view('Cuip/detailCUIP', $data);
		}	
    }


    private function cuipCatalgo($array){

    	$result = [];

    	foreach ( $array as $value){
				
				$id = $this->encrypt->Encrypt($value->id);
				$result[] = (object) array (
					'id' => $id ,
					'valor' => $value->valor

				) ;
			}

		return $result;
			
    }


    public function CuipEdit(){
		if ($this->request->getMethod() == "get"){
			$data['modulos'] = $this->menu->Permisos();
			$empresa = session()->get('empresa');
			$idEmpresa = $this->encrypter->decrypt($empresa);
			
			
			$modo_nacionalidad = $this->modelCuip->GetCatalogoCuip('6070382b-2a53-438b-998c-2b7e5b27fba7');
			
			$data['modo_nacionalidad'] = $this->GetDatos($modo_nacionalidad);
			////////////////////////////////////////////////

			$pais_nacimiento = $this->modelCuip->GetCatalogoCuip('2d688512-aae8-4626-a47d-506a8138e5ba');
			
			$data['pais_nacimiento'] = $this->GetDatos($pais_nacimiento);
			
			//////////////////////////////////////////////

			$nacionalidad = $this->modelCuip->GetCatalogoCuip('58b94c0f-7163-44de-af92-fb976f02cc78');
			
			$data['nacionalidad'] = $this->GetDatos($nacionalidad);
			////////////////////////////////////////////////

			

			$estado_civil = $this->modelCuip->GetCatalogoCuip('7d81e91b-99cb-4371-89d9-934b51d62fb1');
			
			$data['estado_civil'] = $this->GetDatos($estado_civil);
			////////////////////////////////////////////////

			


			$desarrollo_academico = $this->modelCuip->GetCatalogoCuip('2623fe26-3e18-11ed-b4f6-50a1320785a8');
			
			$data['desarrollo_academico'] = $this->GetDatos($desarrollo_academico);
			////////////////////////////////////////////////


			$getEstados = $this->modelCuip->GetEstados();


			$data['entidad_federativa'] = $this->GetDatos($getEstados);
			////////////////////////////////////////////////


			$parentesco_pariente = $this->modelCuip->GetParenteco(2);
			
			$data['parentesco_pariente'] = $this->GetDatos($parentesco_pariente);
			////////////////////////////////////////////////

			$parentesco_personal = $this->modelCuip->GetParenteco(3);
			
			$data['parentesco_personal'] = $this->GetDatos($parentesco_personal);
			////////////////////////////////////////////////

			$parentesco_laboral = $this->modelCuip->GetParenteco(4);
			
			$data['parentesco_laboral'] = $this->GetDatos($parentesco_laboral);
			////////////////////////////////////////////////

			$parentesco_familiar = $this->modelCuip->GetParenteco(1);
			
			$data['parentesco_familiar'] = $this->GetDatos($parentesco_familiar);
			////////////////////////////////////////////////

			$pais = $this->modelCuip->GetCatalogoCuip('2d688512-aae8-4626-a47d-506a8138e5ba');
			
			$data['pais'] = $this->GetDatos($pais);
			////////////////////////////////////////////////

			$domicilio_tipo = $this->modelCuip->GetCatalogoCuip('1a4ad757-1946-4435-9866-8e9ed7bbc91c');
			
			$data['domicilio_tipo'] = $this->GetDatos($domicilio_tipo);
			////////////////////////////////////////////////

			$eficiencia = $this->modelCuip->GetCatalogoCuip('ac8903ca-544d-4a9e-bdfc-3b8069891437');
			
			$data['eficiencia'] = $this->GetDatos($eficiencia);
			////////////////////////////////////////////////

			$nivel_curso = $this->modelCuip->GetCatalogoCuip('ba336522-0795-43ba-b5ca-2c765ca96a56');
			
			$data['nivel_curso'] = $this->GetDatos($nivel_curso);
			////////////////////////////////////////////////

			$cuso_tomado = $this->modelCuip->GetCatalogoCuip('db5d4dad-9dc7-4a44-8834-7c6ca196bb62');
			
			$data['cuso_tomado'] = $this->GetDatos($cuso_tomado);
			////////////////////////////////////////////////

			$idioma = $this->modelCuip->GetCatalogoCuip('47c8cf77-2039-4661-a79c-dca04f685cab');
			
			$data['idioma'] = $this->GetDatos($idioma);
			////////////////////////////////////////////////

			$tipo_habilidad = $this->modelCuip->GetCatalogoCuip('fe67ef02-0b02-4894-b54f-8cc7a0914153');
			
			$data['tipo_habilidad'] = $this->GetDatos($tipo_habilidad);
			////////////////////////////////////////////////

			$grado_habilidad = $this->modelCuip->GetCatalogoCuip('b0ad414d-bbfb-404d-8683-feff143a1854');
			
			$data['grado_habilidad'] = $this->GetDatos($grado_habilidad);
			////////////////////////////////////////////////

			$tipo_fuero = $this->modelCuip->GetCatalogoCuip('2ba17e6c-3478-48d8-93cf-6bb7320e65bf');
			
			$data['tipo_fuero'] = $this->GetDatos($tipo_fuero);
			////////////////////////////////////////////////

			$genero = $this->modelCuip->GetCatalogoCuip('a7e79d68-f018-415d-a450-94ad0814682d');
			
			$data['genero'] = $this->GetDatos($genero);

			//////////////////////////////////////////////
			$parentesco_todos = $this->modelCuip->GetParentecoAll();
			
			$data['parentesco_todos'] = $this->GetDatos($parentesco_todos);

			/////////////////////////////////////////////

			$SiNo = $this->modelCuip->GetCatalogoCuip('5c9f16b5-66f8-4abd-9c72-f1ba78c93776');
			
			$data['SiNo'] = $this->GetDatos($SiNo);

			//////////////////////////////////////////////

			$tipoAgrupacion = $this->modelCuip->GetCatalogoCuip('1cff1d2c-946b-4e37-a0ac-c107c392032b');
			
			$data['tipo_agrupacion'] = $this->GetDatos($tipoAgrupacion);

			//////////////////////////////////////////////
			
			$porsentajeIdioma = $this->modelCuip->GetCatalogoCuip('a2a091a0-8fa2-4eae-89a2-2d95a9092768');
			
			$data['porsentajeIdioma'] = $this->GetDatos($porsentajeIdioma);

			//////////////////////////////////////////////

			$tipoDisciplina = $this->modelCuip->GetCatalogoCuip('5a626264-d6ad-4761-8923-98be05b44941');
			
			$data['tipoDisciplina'] = $this->GetDatos($tipoDisciplina);

			//////////////////////////////////////////////

			$duracion = $this->modelCuip->GetCatalogoCuip('349c2acb-72e0-4cd7-ac3e-7bd306176056');
			
			$data['duracion'] = $this->GetDatos($duracion);

			//////////////////////////////////////////////MEDIA FILIACION

			$complexion = $this->modelCuip->GetCatalogoCuip('98206a2f-1f1a-46a3-a266-3b0d537ee42f');
			
			$data['complexion'] = $this->cuipCatalgo($complexion);
        	//////////////////
        	
        	$piel = $this->modelCuip->GetCatalogoCuip('043f4aa9-dda9-4b3f-9753-9cebf98578b7');
			
        	$data['piel'] = $this->cuipCatalgo($piel);
        	//////////////

			$cara = $this->modelCuip->GetCatalogoCuip('4c563bc7-5423-4562-bc6c-af797f4a5523');
			
        	$data['cara'] = $this->cuipCatalgo($cara);
        	//////////////

			$cabello_cantidad = $this->modelCuip->GetCatalogoCuip('0814173f-fbfa-4930-9591-a81cb0f56bf0');
			
        	$data['cabello_cantidad'] = $this->cuipCatalgo($cabello_cantidad);
        	//////////////

			$color_cabello = $this->modelCuip->GetCatalogoCuip('1c737744-f68c-418a-8ecb-19e32eb7cb73');
			
        	$data['color_cabello'] = $this->cuipCatalgo($color_cabello);
        	//////////////

			$forma_cabello = $this->modelCuip->GetCatalogoCuip('e832ad15-b989-442b-a51a-2fcdadb08558');
			
        	$data['forma_cabello'] = $this->cuipCatalgo($forma_cabello);
        	//////////////

			$calvicie_cabello = $this->modelCuip->GetCatalogoCuip('2f8c1d8b-a1a3-4575-9d20-b02a223b5bb9');
			
        	$data['calvicie_cabello'] = $this->cuipCatalgo($calvicie_cabello);
        	//////////////

			$implatacion_cabello = $this->modelCuip->GetCatalogoCuip('ad94d12c-e76e-479b-8ebc-a67512a16a4e');
			
        	$data['implatacion_cabello'] = $this->cuipCatalgo($implatacion_cabello);
        	//////////////

			$altura = $this->modelCuip->GetCatalogoCuip('3efbe8d5-8bbf-4ef7-9a0a-ce42cf41e129');
			
        	$data['altura'] = $this->cuipCatalgo($altura);
        	//////////////

			$inclinacion = $this->modelCuip->GetCatalogoCuip('b8717cd9-56a1-4854-aa1f-b8927da93fd1');
			
        	$data['inclinacion'] = $this->cuipCatalgo($inclinacion);
        	//////////////

			$ancho = $this->modelCuip->GetCatalogoCuip('2a93ddac-7cea-431d-addd-242e37cad88d');
			
        	$data['ancho'] = $this->cuipCatalgo($ancho);
        	//////////////

			$direccion_cejas = $this->modelCuip->GetCatalogoCuip('f5e97d0d-7a9a-4045-9610-41fc901b9a35');
			
        	$data['direccion_cejas'] = $this->cuipCatalgo($direccion_cejas);
        	//////////////

			$implantacion_cejas = $this->modelCuip->GetCatalogoCuip('519c1a54-7eec-4012-9203-d8f913550749');
			
        	$data['implantacion_cejas'] = $this->cuipCatalgo($implantacion_cejas);
        	//////////////

			$forma = $this->modelCuip->GetCatalogoCuip('1d18c563-d7e5-437a-9834-eac8b7020257');
			
        	$data['forma'] = $this->cuipCatalgo($forma);
        	//////////////

			$tamanno = $this->modelCuip->GetCatalogoCuip('e1ca5802-485d-4b48-a815-6242f4288413');
			
        	$data['tamanno'] = $this->cuipCatalgo($tamanno);
        	//////////////

			$color = $this->modelCuip->GetCatalogoCuip('e3b271d6-cb6a-4240-ac43-8bb2058a9549');
			
        	$data['color'] = $this->cuipCatalgo($color);
        	//////////////

			$forma_ojos = $this->modelCuip->GetCatalogoCuip('5c6d00af-501f-47c7-bb62-b9fdf41827b9');
			
        	$data['forma_ojos'] = $this->cuipCatalgo($forma_ojos);
        	//////////////

			$tamanno_ojos = $this->modelCuip->GetCatalogoCuip('5197111c-90ce-4e87-8b6a-d657d35eb43e');
			
        	$data['tamanno_ojos'] = $this->cuipCatalgo($tamanno_ojos);
        	//////////////

			$raiz = $this->modelCuip->GetCatalogoCuip('ffa8199c-da9d-418e-87ba-8b05979efbd4');
			
        	$data['raiz'] = $this->cuipCatalgo($raiz);
        	//////////////

			$dorso = $this->modelCuip->GetCatalogoCuip('5fea1b35-8c0e-4d00-baf9-318257fde934');
			
        	$data['dorso'] = $this->cuipCatalgo($dorso);
        	//////////////

			$ancho_nariz = $this->modelCuip->GetCatalogoCuip('c9546079-a57a-48be-bd0d-89e0d67df053');
			
        	$data['ancho_nariz'] = $this->cuipCatalgo($ancho_nariz);
        	//////////////

			$base_nariz = $this->modelCuip->GetCatalogoCuip('82ab2593-f717-4dbe-8951-1bfbc889df9c');
			
        	$data['base_nariz'] = $this->cuipCatalgo($base_nariz);
        	//////////////

			$altura_nariz = $this->modelCuip->GetCatalogoCuip('e9c4e2f3-2aa8-424a-969b-720010fc46d7');
			
        	$data['altura_nariz'] = $this->cuipCatalgo($altura_nariz);
        	//////////////

			$tamanno_boca = $this->modelCuip->GetCatalogoCuip('3ec60529-f163-4681-9765-2dc706c9dcba');
			
        	$data['tamanno_boca'] = $this->cuipCatalgo($tamanno_boca);
        	//////////////

			$comisura_boca = $this->modelCuip->GetCatalogoCuip('a3a3266d-4dc6-4b24-b414-9632d66fccc6');
			
        	$data['comisura_boca'] = $this->cuipCatalgo($comisura_boca);
        	//////////////

			$espesor_labios = $this->modelCuip->GetCatalogoCuip('d15f3905-c039-4eeb-a861-a8c796fd3225');
			
        	$data['espesor_labios'] = $this->cuipCatalgo($espesor_labios);
        	//////////////

			$altura_labial = $this->modelCuip->GetCatalogoCuip('de84baae-224c-4529-8c27-9e2692b7a001');
			
        	$data['altura_labial'] = $this->cuipCatalgo($altura_labial);
        	//////////////

			$prominencia = $this->modelCuip->GetCatalogoCuip('daae3cb8-2dc6-45fa-8e53-bd5edda3f757');
			
        	$data['prominencia'] = $this->cuipCatalgo($prominencia);
        	//////////////

			$tipo_menton = $this->modelCuip->GetCatalogoCuip('4d6a1ff3-c57d-4f8e-9c0f-168fddf86714');
			
        	$data['tipo_menton'] = $this->cuipCatalgo($tipo_menton);
        	//////////////

			$forma_menton = $this->modelCuip->GetCatalogoCuip('a04579b4-d2c1-4255-84a5-1f5a7a7cc23c');
			
        	$data['forma_menton'] = $this->cuipCatalgo($forma_menton);
        	//////////////

			$inclinacion_menton = $this->modelCuip->GetCatalogoCuip('ed417903-c732-441c-b312-9d3737377b8f');
			
        	$data['inclinacion_menton'] = $this->cuipCatalgo($inclinacion_menton);
        	//////////////

			$forma_ODerecha = $this->modelCuip->GetCatalogoCuip('b8f63182-f8d6-48eb-abe8-40f2c6dd8351');
			
        	$data['forma_ODerecha'] = $this->cuipCatalgo($forma_ODerecha);
        	//////////////

			$original = $this->modelCuip->GetCatalogoCuip('e7d93ad4-34aa-431b-8278-f3821ee2cf95');
			
        	$data['original'] = $this->cuipCatalgo($original);
        	//////////////

			$superior = $this->modelCuip->GetCatalogoCuip('c64b42b6-8995-4d3d-a9d9-8153ee5d7ab3');
			
        	$data['superior'] = $this->cuipCatalgo($superior);
        	//////////////

			$posterior = $this->modelCuip->GetCatalogoCuip('262612a5-21f0-4064-b747-d35f32ba2682');
			
        	$data['posterior'] = $this->cuipCatalgo($posterior);
        	//////////////

			$adherencia = $this->modelCuip->GetCatalogoCuip('c73efaf8-c8a2-4a8e-a7f0-d6aa2ef259d1');
			
        	$data['adherencia'] = $this->cuipCatalgo($adherencia);
        	//////////////

			$contorno = $this->modelCuip->GetCatalogoCuip('5ebbe112-fdab-4d21-9bae-a2139dd8e51f');
			
        	$data['contorno'] = $this->cuipCatalgo($contorno);
        	//////////////

			$adherencia_lobulo = $this->modelCuip->GetCatalogoCuip('906f6a23-a415-4614-adc5-efe3fc8e4a12');
			
        	$data['adherencia_lobulo'] = $this->cuipCatalgo($adherencia_lobulo);
        	//////////////

			$particularidad = $this->modelCuip->GetCatalogoCuip('51690090-8720-4783-9707-9d318780480b');
			
        	$data['particularidad'] = $this->cuipCatalgo($particularidad);
        	//////////////

			$dimension = $this->modelCuip->GetCatalogoCuip('08b5ac5a-f316-4943-9d1e-bb4c2f69ed72');
			
        	$data['dimension'] = $this->cuipCatalgo($dimension);
        	//////////////

			$tipo_sangre = $this->modelCuip->GetCatalogoCuip('9287f29f-cc75-4c2b-b1ba-9aaa5c986fac');
			
        	$data['tipo_sangre'] = $this->cuipCatalgo($tipo_sangre);
        	//////////////

			$RH_sangre = $this->modelCuip->GetCatalogoCuip('dcaa7074-ba11-4498-a2d2-c5cf6f0e641a');
			
        	$data['RH_sangre'] = $this->cuipCatalgo($RH_sangre);
        	//////////////

        	$getOcupacion = $this->modelCuip->GetCatalogoCuip('478159d8-3e20-11ed-b4f6-50a1320785a8');
			
        	$data['ocupacion'] = $this->cuipCatalgo($getOcupacion);
        	//////////////
		
			///////
			
        	$getRango = $this->modelCuip->GetCatalogoCuip('190ea697-f3c7-44f3-832b-02e063d9a518');
			
        	$data['rango'] = $this->cuipCatalgo($getRango);
        	//////////////

        	$getMando = $this->modelCuip->GetCatalogoCuip('448ea88c-222f-4bf4-a157-7bac6846d822');
			
        	$data['mando'] = $this->cuipCatalgo($getMando);
        	//////////////

        	$getPuesto = $this->modelCuip->GetCatalogoCuip('29773b6a-a69c-4245-ba1c-755e17398d73');
			
        	$data['puesto'] = $this->cuipCatalgo($getPuesto);
			////////////////////
			$getBanco = $this->modelCuip->GetCatalogoCuip('9d392e39-27fa-4307-824b-66d40facba07');
			
        	$data['banco'] = $this->cuipCatalgo($getBanco);
        	//////////////
        	$getNomina = $this->modelCuip->GetCatalogoCuip('2b2bccdd-2f39-47b5-8aad-0272ea9096bb');
			
        	$data['nomina'] = $this->cuipCatalgo($getNomina);
        	//////////////
        	$data['jefes'] = $this->modelCuip->getJefes($idEmpresa);
        	/////////////
        	$data['uniformes'] = $this->modelCuip->getUniformes($idEmpresa);

        	$data['equipos'] = $this->modelCuip->getEquipos($idEmpresa);
        	$getId = str_replace(" ", "+", $_GET['id']);
			$id = $this->encrypt->Decrytp($getId);

        	$data['variable'] = $this->modelCuip->GetDatosPersonalesById($id);
         	$data['experiencia'] = $this->modelCuip->GetExperienciaPersonalesById($id);
			$economico = $this->modelCuip->GetSocioEconomicoById($id);
			$data['datosEmpleado'] = $this->modelCuip->GetAltaEmpleadoById($id);
			$data['estudio'] = $economico;
			$data['uniforme'] = $this->modelCuip->GetUniformesById($id);
			$data['equipo'] = $this->modelCuip->GetEquiposById($id);
			if (!empty($economico)){
				$data['economico_dependientes'] = $this->modelCuip->GetSocioEconomicoDependientesById($economico->id);
			}
			
			$data['clientes'] = $this->modelCuip->getClientes();
			
			$data['seguridad'] = $this->modelCuip->GetEmpleosSeridadById($id);
			$data['diversos'] = $this->modelCuip->GetEmpleosDiversos($id);
			$data['capacitacion'] = $this->modelCuip->GetCapacitaciones($id);
			$data['capacitacion_publica'] = $this->modelCuip->GetCapacitacionesPublicById($id);
			$data['idiomas'] = $this->modelCuip->GetIdiomasById($id);
			$data['habilidades'] = $this->modelCuip->GetHabilidadesById($id);
			$data['agrupaciones'] = $this->modelCuip->GetAgrupacionesById($id);
			$data['sanciones'] = $this->modelCuip->GetSanciones($id);

			$data['resoluciones'] = $this->modelCuip->GetResolucionesById($id);

			$data['estimulos'] = $this->modelCuip->GetEstimulosById($id);
			$data['referencia'] = $this->modelCuip->GetReferenciaById($id);
			$data['referenciaLab'] = $this->modelCuip->GetReferenciaLabById($id);
			$data['mediaFiliacion'] = $this->modelCuip->GetMedFiliacionById($id);
			$documentos = $this->modelCuip->GetDocumentosEditById($id);

			

			$result = [];

    		foreach ( $documentos as $value){
				
				$idDocumentos = $this->encrypt->Encrypt($value->id);
				$idDoc = $this->encrypt->Encrypt($value->idDocumento);
				$result[] = (object) array (
					'id' => $idDocumentos ,
					'idDoc' => $idDoc,
					'documento' => $value->documento,
					'tipo' => $value->tipo,
					'estatus' => $value->idEstatus

				) ;
			}


			$data['documentos'] = $result;

			
			$data['id'] = $this->encrypt->Encrypt($id); 
			
			$data['breadcrumb'] = ["inicio" => 'CUIP' ,
                    				"url" => 'cuip',
                    				"titulo" => 'Editar'];
                   				
			return view('Cuip/EditCUIP', $data);	
			
			}
			
	}


	public function AgregarReferencias(){
		if ($this->request->getMethod() == "post" && $this->request->getvar(['apellidoPaterno, apellidoMaterno, primerNombre, segundoNombre, sexo_fam_cer, ocupacion, parentesco_fam_cercano, calle, exterior, interior, numero, codigoRefCer, coloniacodigoRefCer, estadocodigoRefCer, municipiocodigoRefCer, ciudadcodigoRefCer, pais, calle, apellidoMaterno, primerNombreParCer, segundoNombreParCer, sexo_par_cer, ocupacionParCer, parentesco_cercano, calleParCer, exteriorParCer, interiorParCer, numeroParCer, codigoParCer, coloniacodigoParCer, estadocodigoParCer, municipiocodigoParCer, ciudadcodigoParCer, paisParCer, apellidoPaternoRefPer, apellidoMaternoRefPer, primerNombreRefPer, segundoNombreRefPer, sexo_per, ocupacionRefPer, parentesco_personal, calleRefPer, exteriorRefPer, interiorRefPer, numeroRefPer, codigoPersonal, coloniacodigoPersonal, estadocodigoPersonal, municipiocodigoPersonal, ciudadcodigoPersonal, paisRefPer, apellidoPaternoRefLab, apellidoMaternoRefLab, primerNombreRefLab, segundoNombreRefLab, sexo_lab, ocupacionRefLab, parentesco_laboral, calleRefLab, exteriorRefLab, interiorRefLab, numeroRefLab, codigoLaboral, coloniacodigoLaboral, estadocodigoLaboral, municipiocodigoLaboral, ciudadcodigoLaboral, paisRefLab, idPersonal'],FILTER_SANITIZE_STRING)){

			$errors = [];
			$succes = [];
			$dontSucces = [];
			$data = [];
			$getIdPersonal = $this->request->getPost('idPersonal');

			if(!empty($getIdPersonal)){

				$rules = [
					////////////////////familiar cercano//////////////////
				'apellidoPaterno' =>  ['label' => "Apellido Paterno", 'rules' => 'required|max_length[255]'],
				'apellidoMaterno' =>  ['label' => "Apellido Materno", 'rules' => 'required|max_length[255]'],
				'primerNombre' =>  ['label' => "Primer Nombre", 'rules' => 'required|max_length[255]'],
				'sexo_fam_cer' =>  ['label' => "Sexo", 'rules' => 'required'],
				'ocupacion' =>  ['label' => "Ocupacion", 'rules' => 'required'],
				'parentesco_fam_cercano' =>  ['label' => "Parentesco", 'rules' => 'required'],
				'calle' =>  ['label' => "Calle", 'rules' => 'required|max_length[255]'],
				'exterior' =>  ['label' => "Exterior", 'rules' => 'required|max_length[255]'],
				
				'coloniacodigoRefCer' =>  ['label' => "Colonia", 'rules' => 'required|max_length[255]'],
				'codigoRefCer' =>  ['label' => "Codigo Postal", 'rules' => 'required|max_length[5]|integer'],
				'numero' =>  ['label' => "Numero Telefonico", 'rules' => 'required|max_length[10]|integer'],
				'pais' =>  ['label' => "Pais", 'rules' => 'required|max_length[255]'],
				'estadocodigoRefCer' =>  ['label' => "Entidad Federativa", 'rules' => 'required|max_length[255]'],
				'municipiocodigoRefCer' =>  ['label' => "Municipio", 'rules' => 'required|max_length[255]'],
				'ciudadcodigoRefCer' =>  ['label' => "Ciudad", 'rules' => 'required|max_length[255]'],
				//////////////////////pariente cercano///////////////////////
				'apellidoPaternoParCer' =>  ['label' => "Apellido Paterno", 'rules' => 'required|max_length[255]'],
				'apellidoMaternoParCer' =>  ['label' => "Apellido Materno", 'rules' => 'required|max_length[255]'],
				'primerNombreParCer' =>  ['label' => "Primer Nombre", 'rules' => 'required|max_length[255]'],
				
				'sexo_par_cer' =>  ['label' => "Sexo", 'rules' => 'required|max_length[255]'],
				'ocupacionParCer' =>  ['label' => "Ocupacion", 'rules' => 'required'],
				'parentesco_cercano' =>  ['label' => "Parentesco", 'rules' => 'required|max_length[255]'],
				'calleParCer' =>  ['label' => "Calle", 'rules' => 'required|max_length[255]'],
				'exteriorParCer' =>  ['label' => "NO.Exterior", 'rules' => 'required|max_length[255]'],
				
				'codigoParCer' =>  ['label' => "Codigo Postal", 'rules' => 'required|max_length[5]|integer'],
				'coloniacodigoParCer' =>  ['label' => "Colonia", 'rules' => 'required|max_length[255]'],
				'numeroParCer' =>  ['label' => "Numero Telefonico", 'rules' => 'required|max_length[10]|integer'],
				'estadocodigoParCer' =>  ['label' => "Entidad Federativa", 'rules' => 'required|max_length[255]'],
				'municipiocodigoParCer' =>  ['label' => "Municipio", 'rules' => 'required|max_length[255]'],
				'ciudadcodigoParCer' =>  ['label' => "Ciudad", 'rules' => 'required|max_length[255]'],
				'paisParCer' =>  ['label' => "Pais", 'rules' => 'required|max_length[255]'],
				'apellidoPaternoRefLab' =>  ['label' => "Apellido Paterno", 'rules' => 'required|max_length[255]'],
				'apellidoMaternoRefLab' =>  ['label' => "Apellido Materno", 'rules' => 'required|max_length[255]'],
				'primerNombreRefLab' =>  ['label' => "Primer Nombre", 'rules' => 'required|max_length[255]'],
				
				'sexo_lab' =>  ['label' => "Sexo", 'rules' => 'required|max_length[255]'],
				'ocupacionRefLab' =>  ['label' => "Ocupacion", 'rules' => 'required'],
				'parentesco_laboral' =>  ['label' => "Parentesco", 'rules' => 'required|max_length[255]'],
				'calleRefLab' =>  ['label' => "Calle", 'rules' => 'required|max_length[255]'],
				'exteriorRefLab' =>  ['label' => "NO.Exterior", 'rules' => 'required|max_length[255]'],
				
				'numeroRefLab' =>  ['label' => "Numero Telefonico", 'rules' => 'required|max_length[10]|integer'],
				'codigoLaboral' =>  ['label' => "Codigo Postal", 'rules' => 'required|max_length[5]|integer'],
				'coloniacodigoLaboral' =>  ['label' => "Colonia", 'rules' => 'required|max_length[255]'],
				'estadocodigoLaboral' =>  ['label' => "Entidad Federativa", 'rules' => 'required|max_length[255]'],
				'municipiocodigoLaboral' =>  ['label' => "Municipio", 'rules' => 'required|max_length[255]'],
				'ciudadcodigoLaboral' =>  ['label' => "Ciudad", 'rules' => 'required|max_length[255]'],
				'paisRefLab' =>  ['label' => "Pais", 'rules' => 'required|max_length[255]'],
				'apellidoPaternoRefPer' =>  ['label' => "Apellido Paterno", 'rules' => 'required|max_length[255]'],
				'apellidoMaternoRefPer' =>  ['label' => "Apellido Materno", 'rules' => 'required|max_length[255]'],
				'primerNombreRefPer' =>  ['label' => "Primer Nombre", 'rules' => 'required|max_length[255]'],
				
				'sexo_per' =>  ['label' => "Sexo", 'rules' => 'required|max_length[255]'],
				'ocupacionRefPer' =>  ['label' => "Ocupacion", 'rules' => 'required'],
				'parentesco_personal' =>  ['label' => "Parentesco", 'rules' => 'required|max_length[255]'],
				'calleRefPer' =>  ['label' => "Calle", 'rules' => 'required|max_length[255]'],
				'exteriorRefPer' =>  ['label' => "NO.Exterior", 'rules' => 'required|max_length[255]'],
				
				'numeroRefPer' =>  ['label' => "Numero Telefonico", 'rules' => 'required|max_length[10]|integer'],
				'codigoPersonal' =>  ['label' => "Codigo Postal", 'rules' => 'required|max_length[5]|integer'],
				'coloniacodigoPersonal' =>  ['label' => "Colonia", 'rules' => 'required|max_length[255]'],
				'estadocodigoPersonal' =>  ['label' => "Entidad Federativa", 'rules' => 'required|max_length[255]'],
				'municipiocodigoPersonal' =>  ['label' => "Municipio", 'rules' => 'required|max_length[255]'],
				'ciudadcodigoPersonal' =>  ['label' => "Ciudad", 'rules' => 'required|max_length[255]'],
				'paisRefPer' =>  ['label' => "Pais", 'rules' => 'required|max_length[255]']];
		 
				$errors = [];
				$succes = [];
				$dontSucces = [];
				$data = [];

				if($this->validate($rules)){
					
					$getUser = session()->get('IdUser');
					$LoggedUserId = $this->encrypter->decrypt($getUser);
					$empresa = session()->get('empresa');
					$idEmpresa = $this->encrypter->decrypt($empresa);
					$uuid = Uuid::uuid4();
        			$id = $uuid->toString();

        			

        			$getIdPersonal = $this->request->getPost('idPersonal');

        			$idPersonal = $this->encrypt->Decrytp($getIdPersonal);

        			

        			$getSexo_fam_cer = $this->request->getPost('sexo_fam_cer');

        			$sexo_fam_cer = $this->encrypt->Decrytp($getSexo_fam_cer);

        			$getParentesco_fam_cercano = $this->request->getPost('parentesco_fam_cercano');

        			$parentesco_fam_cercano = $this->encrypt->Decrytp($getParentesco_fam_cercano);

        			$getPais = $this->request->getPost('pais');

        			$pais = $this->encrypt->Decrytp($getPais);

        			$getSexo_per = $this->request->getPost('sexo_per');

        			$sexo_per = $this->encrypt->Decrytp($getSexo_per);

        			$getParentesco_personal = $this->request->getPost('parentesco_personal');

        			$parentesco_personal = $this->encrypt->Decrytp($getParentesco_personal);

        			$getPaisRefPer = $this->request->getPost('paisRefPer');

        			$paisRefPer = $this->encrypt->Decrytp($getPaisRefPer);

        			$getSexo_lab = $this->request->getPost('sexo_lab');

        			$sexo_lab = $this->encrypt->Decrytp($getSexo_lab);

        			$getParentesco_laboral = $this->request->getPost('parentesco_laboral');

        			$parentesco_laboral = $this->encrypt->Decrytp($getParentesco_laboral);

        			$getPaisRefLab = $this->request->getPost('paisRefLab');

        			$paisRefLab = $this->encrypt->Decrytp($getPaisRefLab);

        			$getSexo_par_cer = $this->request->getPost('sexo_par_cer');

        			$sexo_par_cer = $this->encrypt->Decrytp($getSexo_par_cer);

        			$getParentesco_cercano = $this->request->getPost('parentesco_cercano');

        			$parentesco_cercano = $this->encrypt->Decrytp($getParentesco_cercano);


        			$getPaisParCer = $this->request->getPost('paisParCer');

        			$paisParCer = $this->encrypt->Decrytp($getPaisParCer);

        			$getOcupacion = $this->request->getPost('ocupacion');

        			$ocupacion = $this->encrypt->Decrytp($getOcupacion);

        			$getOcupacionParCer = $this->request->getPost('ocupacionParCer');

        			$ocupacionParCer = $this->encrypt->Decrytp($getOcupacionParCer);

        			$getOcupacionRefPer = $this->request->getPost('ocupacionRefPer');

        			$ocupacionRefPer = $this->encrypt->Decrytp($getOcupacionRefPer);

        			$getOcupacionRefLab = $this->request->getPost('ocupacionRefLab');

        			$ocupacionRefLab = $this->encrypt->Decrytp($getOcupacionRefLab);

        			$getEstadocodigoRefCer = $this->request->getPost('estadocodigoRefCer');

        			$estadocodigoRefCer = $this->encrypt->Decrytp($getEstadocodigoRefCer);

        			$getMunicipiocodigoRefCer = $this->request->getPost('municipiocodigoRefCer');

        			$municipiocodigoRefCer = $this->encrypt->Decrytp($getMunicipiocodigoRefCer);

        			$getEstadocodigoParCer = $this->request->getPost('estadocodigoParCer');

        			$estadocodigoParCer = $this->encrypt->Decrytp($getEstadocodigoParCer);

        			$getMunicipiocodigoParCer = $this->request->getPost('municipiocodigoParCer');

        			$municipiocodigoParCer = $this->encrypt->Decrytp($getMunicipiocodigoParCer);

        			$getEstadocodigoPersonal = $this->request->getPost('estadocodigoPersonal');

        			$estadocodigoPersonal = $this->encrypt->Decrytp($getEstadocodigoPersonal);

        			$getMunicipiocodigoPersonal = $this->request->getPost('municipiocodigoPersonal');

        			$municipiocodigoPersonal = $this->encrypt->Decrytp($getMunicipiocodigoPersonal);

        			$getEstadocodigoLaboral = $this->request->getPost('estadocodigoLaboral');

        			$estadocodigoLaboral = $this->encrypt->Decrytp($getEstadocodigoLaboral);

        			$getMunicipiocodigoLaboral = $this->request->getPost('municipiocodigoLaboral');

        			$municipiocodigoLaboral = $this->encrypt->Decrytp($getMunicipiocodigoLaboral);

        			


					$referencias = array(
		    					
		    					
						"id" => $id  ,
						"idPersonal" => $idPersonal  , 
						"idEmpresa" =>  $idEmpresa , 
						"apellido_paterno_fam" => strtoupper($this->request->getPost('apellidoPaterno')) , 
						"apellido_materno_fam" => strtoupper($this->request->getPost('apellidoMaterno')) , 
						"primer_nombre_fam" => strtoupper($this->request->getPost('primerNombre')) , 
						"segundo_nombre_fam" => strtoupper($this->request->getPost('segundoNombre')) , 
						"idGenero_fam" => $sexo_fam_cer , 
						"ocupacion_fam" => $ocupacion , 
						"idParentesco_fam" => $parentesco_fam_cercano , 
						"calle_fam" => strtoupper($this->request->getPost('calle')) , 
						"numero_exterior_fam" => strtoupper($this->request->getPost('exterior')) , 
						"numero_interior_fam" => strtoupper($this->request->getPost('interior')) , 
						"colonia_fam" => strtoupper($this->request->getPost('coloniacodigoRefCer')) , 
						"idCodigoPostal_fam" => $this->request->getPost('codigoRefCer') , 
						"numero_telefono_fam" => $this->request->getPost('numero') , 
						"idPaisNacimiento_fam" => $pais , 
						"idEstado_fam" => $estadocodigoRefCer , 
						"municipio_fam" => $municipiocodigoRefCer , 
						"ciudad_fam" => strtoupper($this->request->getPost('ciudadcodigoRefCer')) , 
						"apellido_paterno_pariente" => strtoupper($this->request->getPost('apellidoPaternoParCer')) , 
						"apellido_materno_pariente" => strtoupper($this->request->getPost('apellidoMaternoParCer')) , 
						"primer_nombre_pariente" => strtoupper($this->request->getPost('primerNombreParCer')) , 
						"segundo_nombre_pariente" => strtoupper($this->request->getPost('segundoNombreParCer')) , 
						"idGenero_pariente" => $sexo_par_cer , 
						"ocupacion_pariente" => $ocupacionParCer , 
						"idParentesco_pariente" => $parentesco_cercano , 
						"calle_pariente" => strtoupper($this->request->getPost('calleParCer')) , 
						"numero_exterior_pariente" => strtoupper($this->request->getPost('exteriorParCer')) , 
						"numero_interior_pariente" => strtoupper($this->request->getPost('interiorParCer')) , 
						"colonia_pariente" => strtoupper($this->request->getPost('coloniacodigoParCer')) , 
						"idCodigoPostal_pariente" => $this->request->getPost('codigoParCer') , 
						"numero_telefono_pariente" => $this->request->getPost('numeroParCer') , 
						"idPaisNacimiento_pariente" => $paisParCer , 
						"idEstado_pariente" => $estadocodigoParCer , 
						"municipio_pariente" => $municipiocodigoParCer , 
						"ciudad_pariente" => strtoupper($this->request->getPost('ciudadcodigoParCer')) , 

						"apellido_paterno_personal" => strtoupper($this->request->getPost('apellidoPaternoRefPer')) , 
						"apellido_materno_personal" => strtoupper($this->request->getPost('apellidoMaternoRefPer')) , 
						"primer_nombre_personal" => strtoupper($this->request->getPost('primerNombreRefPer')) , 
						"segundo_nombre_personal" => strtoupper($this->request->getPost('segundoNombreRefPer')) , 
						"idGenero_personal" => $sexo_per , 
						"ocupacion_personal" => $ocupacionRefPer , 
						"idParentesco_personal" => $parentesco_personal , 
						"calle_personal" => strtoupper($this->request->getPost('calleRefPer')) , 
						"numero_exterior_personal" => strtoupper($this->request->getPost('exteriorRefPer')) , 
						"numero_interior_personal" => strtoupper($this->request->getPost('interiorRefPer')) , 
						"colonia_personal" => strtoupper($this->request->getPost('coloniacodigoPersonal')) , 
						"idCodigoPostal_personal" => $this->request->getPost('codigoPersonal') , 
						"numero_telefono_personal" => $this->request->getPost('numeroRefPer') , 
						"idPaisNacimiento_personal" => $paisRefPer, 
						"idEstado_personal" => $estadocodigoPersonal , 
						"municipio_personal" => $municipiocodigoPersonal , 
						"ciudad_personal" => strtoupper($this->request->getPost('ciudadcodigoPersonal')) ,

						"apellido_paterno_laboral" => strtoupper($this->request->getPost('apellidoPaternoRefLab')) , 
						"apellido_materno_laboral" => strtoupper($this->request->getPost('apellidoMaternoRefLab')) , 
						"primer_nombre_laboral" => strtoupper($this->request->getPost('primerNombreRefLab')) , 
						"segundo_nombre_laboral" => strtoupper($this->request->getPost('segundoNombreRefLab')) , 
						"idGenero_laboral" => $sexo_lab , 
						"ocupacion_laboral" => $ocupacionRefLab , 
						"idParentesco_laboral" => $parentesco_laboral , 
						"calle_laboral" => strtoupper($this->request->getPost('calleRefLab')) , 
						"numero_exterior_laboral" => strtoupper($this->request->getPost('exteriorRefLab')) , 
						"numero_interior_laboral" => strtoupper($this->request->getPost('interiorRefLab')) , 
						"colonia_laboral" => strtoupper($this->request->getPost('coloniacodigoLaboral')) , 
						"idCodigoPostal_laboral" => $this->request->getPost('codigoLaboral') , 
						"numero_telefono_laboral" => $this->request->getPost('numeroRefLab') , 
						"idPaisNacimiento_laboral" => $paisRefLab , 
						"idEstado_laboral" => $estadocodigoLaboral , 
						"municipio_laboral" => $municipiocodigoLaboral , 
						"ciudad_laboral" => strtoupper($this->request->getPost('ciudadcodigoLaboral')) ,
						"activo" => 1 , 
						"createdby" => $LoggedUserId , 
						"createddate" => date("Y-m-d H:i:s") );


					$result = $this->modelCuip->insertReferencias( $referencias);

					
					
                    if ($result) {

            			
                    	$succes = ["mensaje" => 'Referencias agregadas con exito' ,
                            	   "succes" => "succes"];

                           	   
                    	
                    } else {
                    	$dontSucces = ["error" => "error",
                    				  "mensaje" => 	'Hubo un error al registrar las Referencias'  ];

                    }
				} else {	
					$errors = $this->validator->getErrors();
				}

				

			} else {

				$dontSucces = ["error" => "error",
                    				  "mensaje" => 	'Es necesario que primero capture la sección de datos personales'  ];

			}

			echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);	
		}	
	}


	function export()
	{
		$data = $this->modelCuip->GetCuipExcel();
		$getRuta = WRITEPATH . 'uploads/files/';
		$file_name = '45_CAMPOS_14_ELEMENTOS(1944).xlsx';
		$newFile_name = '45_CAMPOS_14_ELEMENTOS_(1944).xlsx';

		if($data > 0){

			if (copy($getRuta.$file_name, $getRuta.$newFile_name)) {

		

		

		$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($getRuta.$newFile_name);

		$sheet = $spreadsheet->getActiveSheet();

		

		$count = 2;
		$i = 1;
		foreach($data as $row)
		{
			
			$sheet->setCellValue('A' . $count,$i);

			$sheet->setCellValue('B' . $count, $row->apellido_paterno);

			$sheet->setCellValue('C' . $count, $row->apellido_materno);

			$sheet->setCellValue('D' . $count, $row->nombre);
			
			$sheet->setCellValue('E' . $count, date( "d/m/Y" ,strtotime($row->fecha_nacimiento)));

			$sheet->setCellValue('F' . $count, $row->idEntidadNacimiento);

			$sheet->setCellValue('G' . $count, $row->idMunicipioNacimiento);

			$sheet->setCellValue('H' . $count, $row->idGenero);

			$sheet->setCellValue('I' . $count, $row->idEstadoCivil);

			$sheet->setCellValue('J' . $count, $row->idNivelEducativo);

			$sheet->setCellValue('K' . $count, $row->escuela);

			$sheet->setCellValue('L' . $count, $row->especialidad);

			$sheet->setCellValue('M' . $count, $row->rfc);

			$sheet->setCellValue('N' . $count, $row->clave_electoral);

			$sheet->setCellValue('O' . $count, $row->cartilla_smn);

			$sheet->setCellValue('P' . $count, $row->curp);

			$sheet->setCellValue('Q' . $count, $row->calle);

			$sheet->setCellValue('R' . $count, $row->numero_exterior);

			$sheet->setCellValue('S' . $count, $row->numero_interior);

			$sheet->setCellValue('T' . $count, $row->colonia);

			$sheet->setCellValue('U' . $count, $row->idCodigoPostal);

			$sheet->setCellValue('V' . $count, $row->numero_telefono);

			$sheet->setCellValue('W' . $count, $row->idEstado);

			$sheet->setCellValue('X' . $count, $row->municipio);

			$sheet->setCellValue('Y' . $count, date( "d/m/Y" ,strtotime($row->fecha_ingreso)));

			$sheet->setCellValue('Z' . $count, $row->idEstado_adscripcion);

			$sheet->setCellValue('AA' . $count, $row->municipio_adscripcion);

			//Referencia
			$sheet->setCellValue('AB' . $count, $row->apellido_paterno_fam);
			$sheet->setCellValue('AC' . $count, $row->apellido_materno_fam);
			$sheet->setCellValue('AD' . $count, $row->nombreFam);
			$sheet->setCellValue('AE' . $count, $row->idGenero_fam);
			$sheet->setCellValue('AF' . $count, $row->ocupacion_fam);
			$sheet->setCellValue('AG' . $count, 1);
			$sheet->setCellValue('AH' . $count, $row->idParentesco_fam);
			$sheet->setCellValue('AI' . $count, $row->calle_fam);
			$sheet->setCellValue('AJ' . $count, $row->numero_exterior_fam);
			$sheet->setCellValue('AK' . $count, $row->numero_interior_fam);
			$sheet->setCellValue('AL' . $count, $row->colonia_fam);
			$sheet->setCellValue('AM' . $count, $row->idCodigoPostal_fam);
			$sheet->setCellValue('AN' . $count, $row->numero_telefono_fam);
			$sheet->setCellValue('AO' . $count, $row->idEstado_fam);
			$sheet->setCellValue('AP' . $count, $row->municipio_fam);
			$sheet->setCellValue('AQ' . $count, $row->ciudad_fam);
			

			//MEDIA FILIACION
			$sheet->setCellValue('AR' . $count, $row->tiposangre);
			$sheet->setCellValue('AS' . $count, $row->rhSangre);
			$sheet->setCellValue('AT' . $count, $row->anteojos);
			$sheet->setCellValue('AU' . $count, $row->estatura);
			$sheet->setCellValue('AV' . $count, $row->peso);
			$sheet->setCellValue('AW' . $count, $row->complexion);
			$sheet->setCellValue('AX' . $count, $row->colorPiel);
			$sheet->setCellValue('AY' . $count, $row->cara);
			$sheet->setCellValue('AZ' . $count, $row->cantidadCabello);
			$sheet->setCellValue('BA' . $count, $row->colorCabello);
			$sheet->setCellValue('BB' . $count, $row->formaCabello);
			 $sheet->setCellValue('BC' . $count, $row->calvicieCabello);
			 $sheet->setCellValue('BD' . $count, $row->implantacionCabello);
			 $sheet->setCellValue('BE' . $count, $row->frenteAltura);
			 $sheet->setCellValue('BF' . $count, $row->frenteInclinacion);
			 $sheet->setCellValue('BG' . $count, $row->frenteAncho);
			 $sheet->setCellValue('BH' . $count, $row->direccionCejas);
			 $sheet->setCellValue('BI' . $count, $row->implantacionCejas);
			 $sheet->setCellValue('BJ' . $count, $row->formasCejas);
			 $sheet->setCellValue('BK' . $count, $row->tamCejas);
			 $sheet->setCellValue('BL' . $count, $row->ojosColor);
			 $sheet->setCellValue('BM' . $count, $row->ojosForma);
			 $sheet->setCellValue('BN' . $count, $row->TamOjos);
			$sheet->setCellValue('BO' . $count, $row->Raiz);
			$sheet->setCellValue('BP' . $count, $row->Dorso);
			$sheet->setCellValue('BQ' . $count, $row->AnchoNariz);
			$sheet->setCellValue('BR' . $count, $row->BaseNariz);
			$sheet->setCellValue('BS' . $count, $row->AlturaNariz);
			$sheet->setCellValue('BT' . $count, $row->TamanoBoca);
			$sheet->setCellValue('BU' . $count, $row->Comisuras);
			$sheet->setCellValue('BV' . $count, $row->EspesorLabio);
			$sheet->setCellValue('BW' . $count, $row->AlturaNasolabial);
			$sheet->setCellValue('BX' . $count, $row->ProminenciaLabio);
			$sheet->setCellValue('BY' . $count, $row->MentonTipo);
			$sheet->setCellValue('BZ' . $count, $row->MentonForma);
			$sheet->setCellValue('CA' . $count, $row->MentonInclinacion);
			$sheet->setCellValue('CB' . $count, $row->FormaOreja);
			$sheet->setCellValue('CC' . $count, $row->Original);
			$sheet->setCellValue('CD' . $count, $row->Superior);
			$sheet->setCellValue('CE' . $count, $row->Posterior);
			$sheet->setCellValue('CF' . $count, $row->AdherenciaHelix);
			$sheet->setCellValue('CG' . $count, $row->ContornoLobulo);
			$sheet->setCellValue('CH' . $count, $row->AdherenciaLobulo);
			$sheet->setCellValue('CI' . $count, $row->Particularidad);
			$sheet->setCellValue('CJ' . $count, $row->DimensionLobulo);


			$count++;
			$i++;
		}

		$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');

		
		
		$writer->save($getRuta.$newFile_name);

		
		$this->response->setHeader('Content-Type', 'application/vnd.ms-excel');

		
			
		readfile($getRuta.$newFile_name);

	}
		} else {

			$errors = [];
			$succes = [];
			$dontSucces = [];
			

			$dontSucces = ["error" => "error",
                    				  "mensaje" => 	'No se encontro ningun registro'  ];

			echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces ]);
		}

	}


	public function GetPreconsulta(){
		if ($this->request->getMethod() == "get"){

			$data['modulos'] = $this->menu->Permisos();
			$empresa = session()->get('empresa');
			$idEmpresa = $this->encrypter->decrypt($empresa);
			$resultData = $this->modelCuip->GetCuip($idEmpresa);
			$result = [];


			foreach ( $resultData as $v){
				
				$id = $this->encrypt->Encrypt($v->id);
				$result[] = (object) array (
					'id' => $id ,
					'nCuip' => '' ,
					'primer_nombre' => $v->primer_nombre,
					'segundo_nombre' => $v->segundo_nombre,
                    'apellido_paterno' => $v->apellido_paterno,
                    'apellido_materno' => $v->apellido_materno,
                    'respuesta' => $v->respuesta,
                    'fecha_consulta' => $v->fecha_consulta
				) ;
			}
		
			$dataCrud = [
                'data' => $result]; 

        	$data['CuipPersonal'] = $dataCrud['data'];

			
			
			return view('Cuip/Preconsulta', $data);
		}	
    }


    function exportPreconsulta()
	{
		$data = $this->modelCuip->GetPreConsulta();


		$getRuta = WRITEPATH . 'uploads/files/';
		$file_name = 'PRECONSULTA.xlsx';
		$newFile_name = 'F_PRECONSULTA.xlsx';

		if($data){

			if (copy($getRuta.$file_name, $getRuta.$newFile_name)) {

		
				$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($getRuta.$newFile_name);;

				$sheet = $spreadsheet->getActiveSheet();

		

				$count = 12;
				$i = 1;

				foreach($data as $row){
			
					$sheet->setCellValue('A' . $count, $i);

					$sheet->setCellValue('B' . $count, $row->apellido_paterno);

					$sheet->setCellValue('C' . $count, $row->apellido_materno);

					$sheet->setCellValue('D' . $count, $row->nombre);

					$sheet->setCellValue('E' . $count, $row->curp);

					$sheet->setCellValue('F' . $count, $row->rfc);

					$sheet->setCellValue('G' . $count, date( "d/m/Y" ,strtotime($row->fecha_nacimiento)));

					$fecha = array(
			         				
						"fecha_consulta" => date("Y-m-d H:i:s"));

	        		$curp = $row->curp;

					$result = $this->modelCuip->updateFechaConsulta($fecha, $curp);

					$count++;
					$i++;
				}

				$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
		
				$writer->save($getRuta.$newFile_name);

		
				$this->response->setHeader('Content-Type', 'application/vnd.ms-excel');


		
				readfile($getRuta.$newFile_name);




				
			} 

				
			
		}
	}

	function src($fileName,$type = "full"){

		$path = '';

		if ($type != 'full')

			$path .= $type . '/';

		return $path . $fileName;	

	}


	public function cargaRespuestasPre(){
		
		if ($this->request->getMethod() == "post" && $this->request->getvar(['InputFile'],FILTER_SANITIZE_STRING)){

			$rules = [
				'InputFile' =>  ['label' => 'Archivo', 'rules' => 'uploaded[InputFile]|max_size[InputFile,10000]|ext_in[InputFile,xlsx,csv]']];
				
				$errors = [];
				$succes = [];
				$dontSucces = [];
				$data = [];

				if($this->validate($rules)){

        			$file = $this->request->getFile('InputFile');

        			if ($file->isValid() && !$file->hasMoved()){

        				$getUser = session()->get('IdUser');
						$LoggedUserId = $this->encrypter->decrypt($getUser);
        			 	$newName = 'Respuesta'.$LoggedUserId;
                		$file->move(WRITEPATH . 'uploads/csvfile', $newName);
                		
                		$getRuta = WRITEPATH . 'uploads/csvfile/';
                		
						$inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($getRuta.$newName);

						$objReader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);


 						$objPHPExcel = $objReader->load($getRuta.$newName);
	 					$sheet = $objPHPExcel->getSheet(0); 
	 					$highestRow = $sheet->getHighestRow();
	 
	 					
	 					for ($row = 2; $row <= $highestRow; $row++){ 
	   
	 	
	 						$respuesta = array(
			         				
								"respuesta" => $sheet->getCell("I".$row)->getValue());

	                		$curp = $sheet->getCell("H".$row)->getValue();

							$result = $this->modelCuip->updateRespuesta($respuesta, $curp);
	           
	        
	     				}


	                	$msg = 'Respuestas cargadas correctamente';
	            			
	                    $succes = ["mensaje" =>  $msg ,
	                            	   "succes" => "succes"];

	                } else {
	                	$dontSucces = ["error" => "error",
	                    				  "mensaje" => 'Hubo un error al cargar las respuestas' ];

	                }


				} else {	
						
					$errors = $this->validator->getErrors();
				}

					echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);


				
			}	
		}


		public function valPreconsulta(){
		
		if ($this->request->getMethod() == "post"){
				
			$errors = [];
			$succes = [];
			$dontSucces = [];
			$data = [];

				
			$data = $this->modelCuip->GetPreConsulta();
        			
        	if ($data){

	            $succes = ["mensaje" =>  "" ,
	                            	   "succes" => "succes"];

	        } else {
	                	
	            $dontSucces = ["error" => "error",
	                  			 "mensaje" => 'Ningun registro encontrado' ];

	        }

			echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);


				
			}	
		}


		public function valBajas(){
		
		if ($this->request->getMethod() == "post"){
				
			$errors = [];
			$succes = [];
			$dontSucces = [];
			$data = [];

				
			$data = $this->modelCuip->GetBajas();
        			
        	if ($data){

	            $succes = ["mensaje" =>  "" ,
	                            	   "succes" => "succes"];

	        } else {
	                	
	            $dontSucces = ["error" => "error",
	                  			 "mensaje" => 'Ningun registro encontrado' ];

	        }

			echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);


				
			}	
		}


		function bajasExport(){

			$data = $this->modelCuip->GetBajas();


			if($data){

				$phpWord = new \PhpOffice\PhpWord\PhpWord();
        		$template = new \PhpOffice\PhpWord\TemplateProcessor(WRITEPATH . 'uploads/files/SEGURIDAD_PRIVADA_PARA_BAJAS.docx');

        		$getRuta = WRITEPATH . 'uploads/files/';
        		$temp_filename = 'SEGURIDAD_PRIVADA_BAJAS.docx';
        		

        		foreach($data as $row){

					$empresa = 'SERVICIOS TERRESTRES DE SEGURIDAD PRIVADA S.A. DE C.V. ';
					$respuesta = $row->respuesta;
					$baja = 'VOLUNTARIA';

        			$template->setValue('empresa', $empresa);
        			$template->setValue('respuesta', $respuesta);
        			$template->setValue('baja', $baja);

        			$template->saveAs($getRuta.$temp_filename);

        			$this->response->setHeader('Content-Type', 'application/msword');

        			readfile($getRuta.$temp_filename);
        			
        		}
			}
		}

		function cargaMasivaCUIP(){
			if ($this->request->getMethod() == "post"){
				$errors = [];
				$succes = [];
				$dontSucces = [];
				$data = [];
				$this->db->transStart();
        
				$uuid = Uuid::uuid4();
				$idDP = $uuid->toString();
				$idMF = $uuid->toString();
				$idRP = $uuid->toString();
				$getUser = session()->get('IdUser');
	            $LoggedUserId = $this->encrypter->decrypt($getUser);
				$empresa = session()->get('empresa');
				$idEmpresa = $this->encrypter->decrypt($empresa);
			
				$insertDP = array(
					"id" => $idDP	,
					"idEmpresa" => $idEmpresa,
					"Cuip" =>  $_POST["cuip"],
					"apellido_paterno" => $_POST["apellidoP"],
					"apellido_materno" => $_POST["apellidoM"],
					"primer_nombre" => $_POST["primerN"],
					"segundo_nombre" => $_POST["segundoN"],
					"fecha_nacimiento" => $_POST["fechaN"],
					"idFormaNacionalidad" => 11,
					"idPaisNacimiento" => 143,
					"idEntidadNacimiento" => $_POST["estadoNacim"],
					"idMunicipioNacimiento" => $_POST["MunNacim"],
					"idGenero" =>  $this->modelCuip->searchEnMulticatalogo($_POST['genero'], 'genero')[0]->id,
					"idEstadoCivil" =>  $this->modelCuip->searchEnMulticatalogo($_POST['estadoCiv'], 'estado civil')[0]->id,
					"idNivelEducativo" => $this->modelCuip->searchEnMulticatalogo($_POST['nivelEdu'], 'Nivel Educativo')[0]->id,
					"escuela" => $_POST['escuela'],
					"especialidad" => $_POST['especialidad'],
					"rfc" => $_POST["rfc"],
					"clave_electoral" => $_POST["claveEl"],
					"cartilla_smn" => $_POST["cartilla"],
					"curp" => $_POST["curp"],
					"calle_adscripcion" => $_POST["calleAds"],
					"numero_exterior_adscripcion" => $_POST["numExAds"],
					"numero_interior_adscripcion" => $_POST["numIntAds"],
					"colonia_adscripcion" => $_POST["coloniaAds"],
					"idCodigoPostal_adscripcion" => $_POST["cpAds"],
					"numero_telefono_adscripcion" => $_POST["telefonoAds"],
					"idEstado_dom_adscripcion" => $_POST["estadoDom"],
					"municipio_delegacion" => $_POST["minicipioDom"],
					"fecha_ingreso" => $_POST["fecha_ingreso"],
					"idEstado_adscripcion" => $_POST["estadoAds"],
					"municipio_adscripcion" => $_POST["municipioAds"],
					"idNacionalidad" => 146,
					"activo" => 1,
                    "createdby" => $LoggedUserId,
					"createddate" => date("Y-m-d H:i:s"),
					"puesto" => 74,
					"rango" => 631,
					"nivel_mando" => 632,
				);	

				$insertMF = array(
					"id" => $idMF	,
					"idEmpresa" => $idEmpresa,
					"idPersonal" => $idDP,
					"idSangreTipo" => $this->modelCuip->searchEnMulticatalogo($_POST['idSangreTipo'], 'Tipo Sangre')[0]->id,
					"idRH" => $this->modelCuip->searchEnMulticatalogo($_POST['idRH'], 'Sangre RH')[0]->id,
					"idUsaAnteojos" => $this->modelCuip->searchSINO($_POST['idUsaAnteojos']== 'S' ? 'SI' : 'NO', 'Si / No')[0]->id,
					"estatura" => $_POST["estatura"],
					"peso" => $_POST["peso"],
					"idComplexion" => $this->modelCuip->searchEnMulticatalogo($_POST['idComplexion'], 'Complexion')[0]->id,
					"idPiel" => $this->modelCuip->searchEnMulticatalogo($_POST['idPiel'], 'piel')[0]->id,
					"idCara" => $this->modelCuip->searchEnMulticatalogo($_POST['idCara'], 'Cara')[0]->id,
					"idCantidadCabello" => $this->modelCuip->searchEnMulticatalogo($_POST['idCantidadCabello'], 'Cabello Cantidad')[0]->id,
					"idColorCabello" => $this->modelCuip->searchEnMulticatalogo($_POST['idColorCabello'], 'Cabello Color')[0]->id,
					"idFormaCabello" => $this->modelCuip->searchEnMulticatalogo($_POST['idFormaCabello'], 'Cabello Forma')[0]->id,
					"idCalvicie" => $this->modelCuip->searchEnMulticatalogo($_POST['idCalvicie'], 'Cabello Calvicie')[0]->id,
					"idImplantacionCabello" => $this->modelCuip->searchEnMulticatalogo($_POST['idImplantacionCabello'], 'Cabello Implantacion')[0]->id,
					"idAlturaFrente" => $this->modelCuip->searchEnMulticatalogo($_POST['idAlturaFrente'], 'Frente Altura')[0]->id,
					"idInclinacionFrente" => $this->modelCuip->searchEnMulticatalogo($_POST['idInclinacionFrente'], 'Frente Inclinacion')[0]->id,
					"idAnchoFrente" => $this->modelCuip->searchEnMulticatalogo($_POST['idAnchoFrente'], 'Frente Ancho')[0]->id,
					"idDireccionCejas" => $this->modelCuip->searchEnMulticatalogo($_POST['idDireccionCejas'], 'Cejas Direccion')[0]->id,
					"idImplantacionCejas" => $this->modelCuip->searchEnMulticatalogo($_POST['idImplantacionCejas'], 'Cejas Implantacion')[0]->id,
					"idFormaCejas" => $this->modelCuip->searchEnMulticatalogo($_POST['idFormaCejas'], 'cejas Forma')[0]->id,
					"idTamanoCejas" => $this->modelCuip->searchEnMulticatalogo($_POST['idTamanoCejas'], 'cejas Tamaño')[0]->id,
					"idColorOjos" => $this->modelCuip->searchEnMulticatalogo($_POST['idColorOjos'], 'Ojos Color')[0]->id,
					"idFormaOjos" => $this->modelCuip->searchEnMulticatalogo($_POST['idFormaOjos'], 'Ojos Forma')[0]->id,
					"idTamanoOjos" => $this->modelCuip->searchEnMulticatalogo($_POST['idTamanoOjos'], 'Ojos Tamaño')[0]->id,
					"idRaiz" => $this->modelCuip->searchEnMulticatalogo($_POST['idRaiz'], 'Nariz raiz')[0]->id,
					"idDorso" => $this->modelCuip->searchEnMulticatalogo($_POST['idDorso'], 'Nariz Dorso')[0]->id,
					"idAnchoNariz" => $this->modelCuip->searchEnMulticatalogo($_POST['idAnchoNariz'], 'Nariz Ancho')[0]->id,
					"idBaseNariz" => $this->modelCuip->searchEnMulticatalogo($_POST['idBaseNariz'], 'Nariz  base')[0]->id,
					"idAlturaNariz" => $this->modelCuip->searchEnMulticatalogo($_POST['idAlturaNariz'], 'Nariz Altura')[0]->id,
					"idTamanoBoca" => $this->modelCuip->searchEnMulticatalogo($_POST['idTamanoBoca'], 'Boca Tamaño')[0]->id,
					"idComisuras" => $this->modelCuip->searchEnMulticatalogo($_POST['idComisuras'], 'Boca Comisuras')[0]->id,
					"idEspesorLabio" => $this->modelCuip->searchEnMulticatalogo($_POST['idEspesorLabio'], 'Labios Espesor')[0]->id,
					"idAlturaNasolabial" => $this->modelCuip->searchEnMulticatalogo($_POST['idAlturaNasolabial'], 'Labios Altura')[0]->id,
					"idProminenciaLabio" => $this->modelCuip->searchEnMulticatalogo($_POST['idProminenciaLabio'], 'Labios Prominencia')[0]->id,
					"idMentonTipo" => $this->modelCuip->searchEnMulticatalogo($_POST['idMentonTipo'], 'Menton Tipo')[0]->id,
					"idMentonForma" => $this->modelCuip->searchEnMulticatalogo($_POST['idMentonForma'], 'Menton Forma')[0]->id,
					"idMentonInclinacion" => $this->modelCuip->searchEnMulticatalogo($_POST['idMentonInclinacion'], 'Menton Inclinación')[0]->id,
					"idFormaOreja" => $this->modelCuip->searchEnMulticatalogo($_POST['idFormaOreja'], 'Oreja Forma')[0]->id,
					"idOriginal" => $this->modelCuip->searchEnMulticatalogo($_POST['idOriginal'], 'Oreja Original')[0]->id,
					"idSuperior" => $this->modelCuip->searchEnMulticatalogo($_POST['idSuperior'], 'Oreja Superior')[0]->id,
					"idPosterior" => $this->modelCuip->searchEnMulticatalogo($_POST['idPosterior'], 'Oreja Posterior')[0]->id,
					"idAdherenciaHelix" => $this->modelCuip->searchEnMulticatalogo($_POST['idAdherenciaHelix'], 'Oreja Adherencia')[0]->id,
					"idContornoLobulo" => $this->modelCuip->searchEnMulticatalogo($_POST['idContornoLobulo'], 'Oreja Contorno')[0]->id,
					"idAdherenciaLobulo" => $this->modelCuip->searchEnMulticatalogo($_POST['idAdherenciaLobulo'], 'Oreja lobulo Adherencia')[0]->id,
					"idParticularidad" => $this->modelCuip->searchEnMulticatalogo($_POST['idParticularidad'], 'Oreja Particularidad')[0]->id,
					"idDimensionLobulo" => $this->modelCuip->searchEnMulticatalogo($_POST['idDimensionLobulo'], 'Oreja Dimensiones')[0]->id,
					"activo" => 1,
					"createdby" => $LoggedUserId,
					"createddate" => date("Y-m-d H:i:s"),
					"idCicatrices" => 1,
					"idTatuajes" => 1,
					"idLunares" => 1,
					"idDefectos" => 1,
					"idProtesis" => 1,
					"idDiscapacidad"  => 1,
				);
				$insertRP = array(
					"id" => $idRP	,
					"idEmpresa" => $idEmpresa,
					"idPersonal" => $idDP,
					"apellido_paterno_fam" => $_POST["paterno"] , 
					"apellido_materno_fam" => $_POST["materno"] , 
					"primer_nombre_fam" => $_POST["nombre"] , 
					"segundo_nombre_fam" => $_POST["nombre2"] , 
					"idGenero_fam" => $this->modelCuip->searchEnMulticatalogo($_POST['sexo'], 'genero')[0]->id, 
					"ocupacion_fam" => $_POST["ocupacion"] , 
					"idParentesco_fam" => $this->modelCuip->searchParentesco($_POST['tipoRef'], $_POST['parentesco'])[0]->id, 
					"calle_fam" => $_POST["calle"] , 
					"numero_exterior_fam" => $_POST["noExterior"] , 
					"numero_interior_fam" => $_POST["noInterior"] , 
					"colonia_fam" => $_POST["colonia"] , 
					"idCodigoPostal_fam" => $_POST["cp"] , 
					"numero_telefono_fam" => $_POST["telefono"] , 
					"idPaisNacimiento_fam" => 143 , 
					"idEstado_fam" => $_POST["entidad"] , 
					"municipio_fam" => $_POST["codMunicipal"] , 
					"ciudad_fam" => $_POST["ciudad"] , 
					"idGenero_personal" => 100 , 
					"ocupacion_personal" => 100 , 
					"idParentesco_personal" => $this->modelCuip->searchParentesco($_POST['tipoRef'], $_POST['parentesco'])[0]->id, 
					"idGenero_laboral" => 100 , 
					"ocupacion_laboral" => 100 , 
					"idParentesco_laboral" => $this->modelCuip->searchParentesco($_POST['tipoRef'], $_POST['parentesco'])[0]->id, 
					"idGenero_pariente" => 100 , 
					"ocupacion_pariente" => 100 , 
					"idParentesco_pariente" => $this->modelCuip->searchParentesco($_POST['tipoRef'], $_POST['parentesco'])[0]->id, 
					"activo" => 1,
					"createdby" => $LoggedUserId,
					"createddate" => date("Y-m-d H:i:s"),
				);

				$errorsUndefined = [];
				foreach ($_POST as $clave => $valor) {
					if ($valor === "undefined") {
						array_push($errorsUndefined, "sin datos");
					}
				}
				
				if(count($errorsUndefined) === 0){
					$selectCuip = $this->modelCuip->searchCUIP($_POST['cuip']);
					if(count($selectCuip) == 0){
						$insert = $this->modelCuip->addData($insertDP);
						if ($insert) {
							$insert = $this->modelCuip->addDataMF($insertMF);
							$insert = $this->modelCuip->addDataRP($insertRP);
							if($insert){
								$succes = ["mensaje" => 'Registrado con Exito', "succes" => "succes"];
							}else{

								$dontSucces = ["error" => "error", "mensaje" => "No se inserto el registro verifica tus Datos"];
							}
						} else {
							$dontSucces = ["error" => "error", "mensaje" => "No se inserto el registro el CUIP ".$_POST['cuip']];
						}
	
					}else{
						$dontSucces = ["error" => "error", "mensaje" => "la CUIP ".$_POST['cuip']." ya ha existe"];
					}
				}else{
					$dontSucces = ["error" => "error", "mensaje" => "comprueba que los campos esten completos"];
				}

			} else {	
				$errors = $this->validator->getErrors();
			}
			$this->db->transComplete();

			echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
	
		}


		public function getUbicacion(){
		if ($this->request->getMethod() == "post" && $this->request->getvar(['asignacionServ'])){
			$errors = [];
            $succes = [];
            $dontSucces = [];
            $data = [];

			$rules = [
				'asignacionServ' =>  'required'];
				
				$errors = [];
				$succes = [];
				$dontSucces = [];
				$data = [];
				
				if($this->validate($rules)){
					

					$getCliente = $this->request->getPost('asignacionServ');

					$cliente = $this->encrypt->Decrytp($getCliente);


					
					$getUbicaciones = $this->modelCuip->getUbicacion($cliente);

					

                    if ($getUbicaciones ) {

                    	$ubicaciones = '<option value="">Selecciona una Opción</option>';
                    	
                    	foreach ( $getUbicaciones as $v){
				
							$id = $this->encrypt->Encrypt($v->id);
							$ubicaciones.=  '<option value="'.$id.'">'.$v->nombre_ubicacion.'</option>';

							
						
						}

						
                    	
                    	$data['ubicacionRH']= $ubicaciones;


                    	$succes = ["mensaje" => 'Exito.' ,
                            	   "succes" => "succes"];
                    	
                    } else {
                    		
                    	$dontSucces = ["error" => "error" ,
                    				   "mensaje" => 'Hubo un error al obtener los datos.'];

                    }
                    		

				} else {	
					$errors = $this->validator->getErrors();
				}

				echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
			
		}	
    }

    public function getPuesto(){
		if ($this->request->getMethod() == "post" && $this->request->getvar(['asignacionServ'])){
			$errors = [];
            $succes = [];
            $dontSucces = [];
            $data = [];

			$rules = [
				'turno' =>  'required'];
				
				$errors = [];
				$succes = [];
				$dontSucces = [];
				$data = [];
				
				if($this->validate($rules)){
					

					$getTurno = $this->request->getPost('turno');

					$turno = $this->encrypt->Decrytp($getTurno);


					
					$getPuestos = $this->modelCuip->getPuesto($turno);

					
                    if ($getPuestos ) {

                    	$puestos = '<option value="">Selecciona una Opción</option>';
                    	
                    	foreach ( $getPuestos as $v){
				
							$id = $this->encrypt->Encrypt($v->id);
							$puestos.=  '<option value="'.$id.'">'.$v->puesto.'</option>';

							
						
						}

						
                    	
                    	$data['puestos']= $puestos;

                    	
                    	$succes = ["mensaje" => 'Exito.' ,
                            	   "succes" => "succes"];
                    	
                    } else {
                    		
                    	$dontSucces = ["error" => "error" ,
                    				   "mensaje" => 'Hubo un error al obtener los datos.'];

                    }
                    		

				} else {	
					$errors = $this->validator->getErrors();
				}

				echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
			
		}	
    }

    public function AgregarAltasEmpleados(){
		if ($this->request->getMethod() == "post" && $this->request->getvar(['fecha_ingreso,asignacionServ,ubicacionRH,sueldoRH,turnoRH,puestoRH,pagoExterno,telEmpresaRH,nominaPeriodo,radioEmpresa,jefeInmediatoRH,bancoRH,cuentaRH,clabeRH,nssRH,pension,infonavit,fonacot,soldi'],FILTER_SANITIZE_STRING)){

			$errors = [];
			$succes = [];
			$dontSucces = [];
			$data = [];
			
			$getIdPersonal = $this->request->getPost('idPersonal');

			
			if(!empty($getIdPersonal)){	

				
					$rules = [
					'fecha_ingreso' =>  ['label' => "Fecha de Ingreso", 'rules' => 'required|valid_only_date_chek'],
					'asignacionServ' =>  ['label' => "Asignación Servicio", 'rules' => 'required'],
					'ubicacionRH' =>  ['label' => "Ubicación", 'rules' => 'required'],
					'sueldoRH' =>  ['label' => "Sueldo", 'rules' => 'required|max_length[25]'],
					
					'turnoRH' =>  ['label' => "Turno", 'rules' => 'required'],
					'puestoRH' =>  ['label' => "Puesto", 'rules' => 'required'],
					'pagoExterno' =>  ['label' => "Pago Externo", 'rules' => 'required|max_length[25]'],
					'telEmpresaRH' =>  ['label' => "Teléfono Empresa", 'rules' => 'required|max_length[50]'],
					'nominaPeriodo' =>  ['label' => "Periodicidad de la nómina", 'rules' => 'required'],
					'radioEmpresa' =>  ['label' => "Radio Empresa", 'rules' => 'required|max_length[50]'],
					'jefeInmediatoRH' =>  ['label' => "Jefe Inmediato", 'rules' => 'required'],
					'bancoRH' =>  ['label' => "Banco", 'rules' => 'required'],
					'cuentaRH' =>  ['label' => "Cuenta", 'rules' => 'required|max_length[50]'],
					'clabeRH' =>  ['label' => "CLABE", 'rules' => 'required|max_length[30]'],
					'infonavit' =>  ['label' => "Crédito Infonavit", 'rules' => 'required'],
					'nssRH' =>  ['label' => "NSS", 'rules' => 'required|min_length[11]|max_length[11]'],
					'pension' =>  ['label' => "Pensión Alimenticia", 'rules' => 'required'],
					'soldi' =>  ['label' => "SOLDI", 'rules' => 'required'],
					'fonacot' =>  ['label' => "Crédito Fonacot", 'rules' => 'required']];
		 
				



					if($this->validate($rules)){
					
						$getUser = session()->get('IdUser');
						$LoggedUserId = $this->encrypter->decrypt($getUser);
						$empresa = session()->get('empresa');
						$idEmpresa = $this->encrypter->decrypt($empresa);
						$uuid = Uuid::uuid4();
	        			$id = $uuid->toString();

	        			$idPersonal = $this->encrypt->Decrytp($getIdPersonal);
	        			
	        			
	        			$getFechaIngreso = $this->request->getPost('fecha_ingreso');

	        			$fechaIngreso = date( "Y-m-d" ,strtotime($getFechaIngreso));

	        			$getasignacionServ = $this->request->getPost('asignacionServ');

        				$signacionServ = $this->encrypt->Decrytp($getasignacionServ);

        				$getubicacionRH = $this->request->getPost('ubicacionRH');

        				$ubicacionRH = $this->encrypt->Decrytp($getubicacionRH);

        				$getturnoRH = $this->request->getPost('turnoRH');

        				$turnoRH = $this->encrypt->Decrytp($getturnoRH);

        				$getpuestoRH = $this->request->getPost('puestoRH');

        				$puestoRH = $this->encrypt->Decrytp($getpuestoRH);

        				$getjefeInmediatoRH = $this->request->getPost('jefeInmediatoRH');

        				$jefeInmediatoRHj = $this->encrypt->Decrytp($getjefeInmediatoRH);

        				$getbancoRH = $this->request->getPost('bancoRH');



        				$banco = $this->encrypt->Decrytp($getbancoRH);

        				$getinfonavit = $this->request->getPost('infonavit');

        				$infonavit = $this->encrypt->Decrytp($getinfonavit);

        				$getpension = $this->request->getPost('pension');

        				$pension = $this->encrypt->Decrytp($getpension);

        				$getNomimaPeriodo = $this->request->getPost('nominaPeriodo');

        				$NomimaPeriodo = $this->encrypt->Decrytp($getNomimaPeriodo);

	        			$date = date('y') ;
	        			$consecutivo = $this->modelCuip->consecutivo();
	        			$fecNac = $this->modelCuip->fecNac($idPersonal);

	        			$fechaNacimiento = date('y',strtotime($fecNac->fecha));

	        			$numEmpleado = $date.$consecutivo->con.$fechaNacimiento;

	        			$getfonacot = $this->request->getPost('fonacot');

        				$fonacot = $this->encrypt->Decrytp($getfonacot);

        				$getsoldi = $this->request->getPost('soldi');

        				$soldi = $this->encrypt->Decrytp($getsoldi);

	        			

						$altaEmpleado = array(
			    					
			    					
							"id" => $id  ,
							"numEmpleado" => $numEmpleado , 
							"idPersonal" => $idPersonal  , 
							"idEmpresa" =>  $idEmpresa , 
							"fecha_ingreso" =>  $fechaIngreso , 
							"idCliente" => $signacionServ   ,
							"idUbicacion" => $ubicacionRH  , 
							"sueldo" => $this->request->getPost('sueldoRH')  , 
							"idTurno" =>  $turnoRH , 
							"idPuesto" =>  $puestoRH , 
							"pagoExterno" => $this->request->getPost('pagoExterno')  , 
							"telefonoEmpresa" => $this->request->getPost('telEmpresaRH')  , 
							"idNomimaPeriodo" =>  $NomimaPeriodo , 
							"radioEmpresa" =>  $this->request->getPost('radioEmpresa') , 
							"idJefeInmediato" => $jefeInmediatoRHj  , 
							"idBanco" =>  $banco , 
							"cuentaBanco" => $this->request->getPost('cuentaRH')  , 
							"CLABE" =>  $this->request->getPost('clabeRH') , 
							"nss" => $this->request->getPost('nssRH')  , 
							"infonavit" =>  $infonavit , 
							"pension" =>  $pension ,
							"fonacot" =>  $fonacot ,
							"soldi" =>  $soldi ,
							"createdby" => $LoggedUserId , 
							"createddate" => date("Y-m-d H:i:s") );
						 
						$result = $this->modelCuip->insertAltaEmpleado($altaEmpleado,$_POST['pTableDataEquipo'],$_POST['pTableDataUniforme'],$idPersonal);

					
                    	if ($result) {

            			
                    		$succes = ["mensaje" => 'Alta de Empleado realizada con exito, Número de empleado: '.$numEmpleado  ,
                            	   "succes" => "succes"];

                           	   
                    	
                    	} else {
                    	$dontSucces = ["error" => "error",
                    				  "mensaje" => 	'Hubo un error al realizar la Alta de Empleado realizada'  ];

                    	}
					} else {	
						$errors = $this->validator->getErrors();
					}
					
				
				

			} else {

				$dontSucces = ["error" => "error",
                    				  "mensaje" => 	'Es necesario que primero capture la sección de datos personales'  ];
			}

			echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);	
		}	
	}


	public function EditarPersonales(){
		if ($this->request->getMethod() == "post" && $this->request->getvar(['idPersonal,primerNombre, segundoNombre, apellidoPaterno, apellidoMaterno, fecha_nacimiento, sexo, rfc, claveE, cartilla, licencia, vigenciaLic, CURP, pasaporte, modo_nacionalidad, fecha_naturalizacion, pais_nacimiento, entidad_nacimiento, nacionalidad, municipio_nacimiento, cuidad_nacimiento, estado_civil, desarrollo_academico, escuela, especialidad, cedula, anno_inicio, anno_termino, registroSep, certificado, promedio, calle, exterior, interior, numeroTelefono, entrecalle, ylacalle, codigo, coloniacodigo, estadocodigo, municipiocodigo, ciudadcodigo, nombrecurso, nombreInstitucion, fecha_inicial, fecha_final, certificado_por'],FILTER_SANITIZE_STRING)){

				$rules = [
				'idPersonal' =>  ['label' => "
				", 'rules' => 'required'],	
				'primerNombre' =>  ['label' => "Primer Nombre", 'rules' => 'required|max_length[255]'],
				
				'apellidoPaterno' =>  ['label' => "Apellido Paterno", 'rules' => 'required|max_length[255]'],
				'apellidoMaterno' =>  ['label' => "Apellido Materno", 'rules' => 'required|max_length[255]'],
				'fecha_nacimiento' =>  ['label' => 'Fecha de Nacimiento', 'rules' =>'required|valid_only_date_chek|date_mayor'],
				'sexo' =>  ['label' => 'Sexo', 'rules' =>'required'],
				'rfc' =>  ['label' => "RFC", 'rules' => 'required|max_length[10]|min_length[10]'],
				'claveE' =>  ['label' => "Clave Electoral", 'rules' => 'required|max_length[255]'],
				'cartilla' =>  ['label' => "Cartilla SMN", 'rules' => 'required|max_length[255]'],
				'licencia' =>  ['label' => "Licencia", 'rules' => 'required_with[vigenciaLic]'],
				'vigenciaLic' =>  ['label' => "Vigencia de Licencia", 'rules' => 'required_with[licencia]'],
				'CURP' =>  ['label' => "CURP", 'rules' => 'required|max_length[18]|min_length[18]'],
				
				'modo_nacionalidad' =>  ['label' => "Modo de Nacionalidad", 'rules' => 'required'],
				'pais_nacimiento' =>  ['label' => "Pais de Nacimiento", 'rules' => 'required'],
				'entidad_nacimiento' =>  ['label' => "Entidad de Nacimiento", 'rules' => 'required|max_length[255]'],
				'municipio_nacimiento' =>  ['label' => "Municipio de Nacimiento", 'rules' => 'required|max_length[255]'],
				'cuidad_nacimiento' =>  ['label' => "Cuidad de Nacimiento", 'rules' => 'required|max_length[255]'],
				'nacionalidad' =>  ['label' => "Nacionalidad", 'rules' => 'required'],
				'estado_civil' =>  ['label' => "Estado Civil", 'rules' => 'required'],
				'desarrollo_academico' =>  ['label' => "Desarrollo Académico", 'rules' => 'required'],
				'escuela' =>  ['label' => "Escuela", 'rules' => 'required|max_length[255]'],
				'especialidad' =>  ['label' => "Especialidad", 'rules' => 'required|max_length[255]'],
				
				'anno_inicio' =>  ['label' => "Año de Inicio", 'rules' => 'required|max_length[4]|integer'],
				'anno_termino' =>  ['label' => "Año de Termino", 'rules' => 'required|max_length[4]|integer'],
				'registroSep' =>  ['label' => "Registro SEP", 'rules' => 'required'],
				'certificado' =>  ['label' => "Num. de Folio Certificado", 'rules' => 'required|max_length[255]'],
				'promedio' =>  ['label' => "Promedio", 'rules' => 'required|max_length[255]'],
				'calle' =>  ['label' => "Calle", 'rules' => 'required|max_length[255]'],
				'exterior' =>  ['label' => "No. Exterior", 'rules' => 'required|max_length[255]'],
				'interior' =>  ['label' => "No. Interior", 'rules' => 'required|max_length[255]'],
				'numeroTelefono' =>  ['label' => "Numero Telefónico", 'rules' => 'required|max_length[10]|integer|min_length[10]'],
				'entrecalle' =>  ['label' => "Entre la calle de", 'rules' => 'required|max_length[255]'],
				'ylacalle' =>  ['label' => "Y la calle ", 'rules' => 'required|max_length[255]'],
				'codigo' =>  ['label' => "Código Postal", 'rules' => 'required|max_length[5]|integer'],
				'coloniacodigo' =>  ['label' => "Colonia", 'rules' => 'required'],
				'estadocodigo' =>  ['label' => "Entidad Federativa", 'rules' => 'required'],
				'municipiocodigo' =>  ['label' => "Municipio", 'rules' => 'required'],
				'ciudadcodigo' =>  ['label' => "Ciudad", 'rules' => 'required'],
				
				'dependencia_adscripcion' =>  ['label' => "Dependencia", 'rules' => 'required|max_length[255]'],
				'institucion_adscripcion' =>  ['label' => "Institución", 'rules' => 'required|max_length[255]'],
				'fechaingreso_adscripcion' =>  ['label' => "Fecha de Ingreso", 'rules' => 'required|valid_only_date_chek'],
				'puesto_adscripcion' =>  ['label' => "Puesto", 'rules' => 'required|max_length[255]'],
				
				
				'rango_adscripcion' =>  ['label' => "Rango o Categoria", 'rules' => 'required|max_length[255]'],
				'nivel_adscripcion' =>  ['label' => "Nivel de Mando", 'rules' => 'required|max_length[255]'],
				
				'nombrejefe_adscripcion' =>  ['label' => "Nombre del jefe inmediato", 'rules' => 'required|max_length[255]'],
				'entidad_adscripcion' =>  ['label' => "Entidad Federativa", 'rules' => 'required|max_length[255]'],
				'municipio_adscripcion' =>  ['label' => "Municipio", 'rules' => 'required|max_length[255]'],
				
				'calle_adscripcion' =>  ['label' => "Calle", 'rules' => 'required|max_length[255]'],
				'exterior_adscripcion' =>  ['label' => "No. Exterior", 'rules' => 'required|max_length[255]'],
				
				'entrecalle_adscripcion' =>  ['label' => "Entre la calle de", 'rules' => 'required|max_length[255]'],
				'ylacalle_adscripcion' =>  ['label' => "Y la calle", 'rules' => 'required|max_length[255]'],
				'telefono_adscripcion' =>  ['label' => "Número Telefonico", 'rules' => 'required|max_length[10]|integer'],
				'codigoAds' =>  ['label' => "Código Postal", 'rules' => 'required|max_length[5]|integer'],
				'coloniacodigoAds' =>  ['label' => "Colonia", 'rules' => 'required|max_length[255]'],
				'federativa_adscripcion' =>  ['label' => "Entidad Federativa", 'rules' => 'required|max_length[255]'],
				'delegacion_adscripcion' =>  ['label' => "Municipio o Delegación", 'rules' => 'required|max_length[255]'],
				'ciudadcodigoAds' =>  ['label' => "Ciudad o Poblacion", 'rules' => 'required|max_length[255]']];

				$expDocente = $this->request->getPost('expDocente');

				
				if ($expDocente == 0){

					$rules['nombrecurso'] =  ['label' => "Nombre del Curso", 'rules' => 'required|max_length[255]'];
					$rules['nombreInstitucion'] =  ['label' => "Nombre de la Institución", 'rules' => 'required|max_length[255]'];
					$rules['fecha_inicial'] =  ['label' => "Fecha de Inicio", 'rules' => 'required|valid_only_date_chek'];
					$rules['fecha_final'] =  ['label' => "Fecha de Término", 'rules' => 'required|valid_only_date_chek'];
					$rules['certificado_por'] =  ['label' => "Certificado por", 'rules' => 'required|max_length[255]'];


					$rules['nombrecursoB'] =  ['label' => "Nombre del Curso", 'rules' => 'required_with[nombreInstitucionB,fecha_inicialB,fecha_finalB,certificado_porB]|max_length[255]'];


					$rules['fecha_inicialB'] =  ['label' => "Fecha de Inicio", 'rules' => 'required_with[nombreInstitucionB,nombrecursoB,fecha_finalB,certificado_porB]'];

					$rules['fecha_finalB'] =  ['label' => "Fecha de Término", 'rules' => 'required_with[nombreInstitucionB,nombrecursoB,fecha_inicialB,certificado_porB]'];

					$rules['certificado_porB'] =  ['label' => "Certificado por", 'rules' => 'required_with[nombrecursoB,nombreInstitucionB,fecha_inicialB,fecha_finalB]|max_length[255]'];

					$rules['nombreInstitucionB'] =  ['label' => "Nombre de la Institución", 'rules' => 'required_with[nombrecursoB,,fecha_inicialB,fecha_finalB,certificado_porB]|max_length[255]'];


				}

				$getModo_nacionalidad = $this->request->getPost('modo_nacionalidad');

				if(!empty($getModo_nacionalidad)){
        			$modo_nacionalidad = $this->encrypt->Decrytp($getModo_nacionalidad);

        			if ( $modo_nacionalidad != 1){
        			$rules['fecha_naturalizacion'] =  ['label' => "Fecha de Naturalización", 'rules' => 'required|valid_only_date_chek'];
        			}

        		}
		 
				$errors = [];
				$succes = [];
				$dontSucces = [];
				$data = [];

				if($this->validate($rules)){
					
					$getUser = session()->get('IdUser');
					$LoggedUserId = $this->encrypter->decrypt($getUser);
					$empresa = session()->get('empresa');
					$idEmpresa = $this->encrypter->decrypt($empresa);
					$uuid = $this->request->getPost('idPersonal');
        			$id = $this->encrypt->Decrytp($uuid);

        			$getGenero = $this->request->getPost('sexo');

        			$getGenero = $this->encrypt->Decrytp($getGenero);

        			
					
					$getPais_nacimiento = $this->request->getPost('pais_nacimiento');

        			$pais_nacimiento = $this->encrypt->Decrytp($getPais_nacimiento);

        			$getNacionalidad = $this->request->getPost('nacionalidad');

        			$nacionalidad = $this->encrypt->Decrytp($getNacionalidad);

        			$getEstado_civil = $this->request->getPost('estado_civil');

        			$estado_civil = $this->encrypt->Decrytp($getEstado_civil);

        			$getregistroSep = $this->request->getPost('registroSep');

        			$registroSep = $this->encrypt->Decrytp($getregistroSep);


        			$getDesarrollo_academico = $this->request->getPost('desarrollo_academico');

        			$desarrollo_academico = $this->encrypt->Decrytp($getDesarrollo_academico);

        			$getDesarrollo_academico = $this->request->getPost('desarrollo_academico');

        			$getFechaNacimiento = $this->request->getPost('fecha_nacimiento');

        			$fecha_nacimiento = date( "Y-m-d" ,strtotime($getFechaNacimiento));


        			if ( $modo_nacionalidad != 1){

        				$getFecha_naturalizacion = $this->request->getPost('fecha_naturalizacion');

        				$fecha_naturalizacion = date( "Y-m-d" ,strtotime($getFecha_naturalizacion));
        			} else {

        				$fecha_naturalizacion = '';

        			} 

        			$getVigenciaLic = $this->request->getPost('vigenciaLic');

        			$vigenciaLic = date( "Y-m-d" ,strtotime($getVigenciaLic));

        			$getFechaingreso_adscripcion = $this->request->getPost('fechaingreso_adscripcion');

        			$fechaingreso_adscripcion = date( "Y-m-d" ,strtotime($getFechaingreso_adscripcion));

        			

        			$getPuesto = $this->request->getPost('puesto_adscripcion');

        			$puesto = $this->encrypt->Decrytp($getPuesto);

        			$getRango = $this->request->getPost('rango_adscripcion');

        			$rango = $this->encrypt->Decrytp($getRango);

        			$getNivel_mando = $this->request->getPost('nivel_adscripcion');
        			
        			$nivel_mando = $this->encrypt->Decrytp($getNivel_mando);


        			$getEntidad_nacimiento = $this->request->getPost('entidad_nacimiento');
        			
        			$entidad_nacimiento = $this->encrypt->Decrytp($getEntidad_nacimiento);


        			$getMunicipio_nacimiento = $this->request->getPost('municipio_nacimiento');
        			
        			$municipio_nacimiento = $this->encrypt->Decrytp($getMunicipio_nacimiento);

        			$getEstadocodigo = $this->request->getPost('estadocodigo');
        			
        			$estadocodigo = $this->encrypt->Decrytp($getEstadocodigo);

        			$getMunicipiocodigo = $this->request->getPost('municipiocodigo');
        			
        			$municipiocodigo = $this->encrypt->Decrytp($getMunicipiocodigo);

        			$getEntidad_adscripcion = $this->request->getPost('entidad_adscripcion');
        			
        			$entidad_adscripcion = $this->encrypt->Decrytp($getEntidad_adscripcion);

        			$getMunicipio_adscripcion = $this->request->getPost('municipio_adscripcion');
        			
        			$municipio_adscripcion = $this->encrypt->Decrytp($getMunicipio_adscripcion);

        			

					$datosPersonales = array(
		    					
		    					
						
						 
						"primer_nombre" => strtoupper($this->request->getPost('primerNombre')) , 
						"segundo_nombre" => strtoupper($this->request->getPost('segundoNombre')) , 
						"apellido_paterno" => strtoupper($this->request->getPost('apellidoPaterno')) , 
						"apellido_materno" => strtoupper($this->request->getPost('apellidoMaterno')) , 
						"fecha_nacimiento" => $fecha_nacimiento , 
						"idGenero" => $getGenero , 
						"rfc" => strtoupper($this->request->getPost('rfc')) , 
						"clave_electoral" => strtoupper($this->request->getPost('claveE')) , 
						"cartilla_smn" => strtoupper($this->request->getPost('cartilla')) , 
						"licencia_conducir" => strtoupper($this->request->getPost('licencia')) , 
						"vigencia_licencia" => $vigenciaLic , 
						"curp" => strtoupper($this->request->getPost('CURP')) , 
						"pasaporte" => strtoupper($this->request->getPost('pasaporte')) , 
						"idFormaNacionalidad" =>  $modo_nacionalidad , 
						"fecha_naturalizacion" => $fecha_naturalizacion , 
						"idPaisNacimiento" => $pais_nacimiento , 
						"idEntidadNacimiento" => $entidad_nacimiento , 
						"idMunicipioNacimiento" => $municipio_nacimiento , 
						"idCiudadNacimiento" => $this->request->getPost('cuidad_nacimiento') , 
						"idNacionalidad" => $nacionalidad , 
						"idEstadoCivil" => $estado_civil , 
						"idNivelEducativo" => $desarrollo_academico , 
						"escuela" => strtoupper($this->request->getPost('escuela')) , 
						"especialidad" => strtoupper($this->request->getPost('especialidad')) , 
						"cedula_profesional" => strtoupper($this->request->getPost('cedula')) , 
						"año_inicio" => $this->request->getPost('anno_inicio') , 
						"año_termino" => $this->request->getPost('anno_termino') , 
						"registro_sep" => $registroSep , 
						"folio_certificado" => strtoupper($this->request->getPost('certificado')) , 
						"calle" => strtoupper($this->request->getPost('calle')) , 
						"numero_exterior" => strtoupper($this->request->getPost('exterior')) , 
						"numero_interior" => strtoupper($this->request->getPost('interior')) , 
						"colonia" => strtoupper($this->request->getPost('coloniacodigo')) , 
						"entre_calle1" => strtoupper($this->request->getPost('entrecalle')) , 
						"entre_calle2" => strtoupper($this->request->getPost('ylacalle')) , 
						"idCodigoPostal" => $this->request->getPost('codigo') , 
						"numero_telefono" => $this->request->getPost('numeroTelefono') , 
						"idEstado" => $estadocodigo , 
						"municipio" => $municipiocodigo , 
						"ciudad" => strtoupper($this->request->getPost('ciudadcodigo')) ,
					  "dependencia" => $this->request->getPost('dependencia_adscripcion'), 
					  "institucion" => $this->request->getPost('institucion_adscripcion'),
					  "fecha_ingreso" => $fechaingreso_adscripcion,
					  "puesto" => $puesto,
					  "rango" => $rango,
					  "nivel_mando" => $nivel_mando,
					  "nombre_jefe" => strtoupper($this->request->getPost('nombrejefe_adscripcion')),
					  "idEstado_adscripcion" => $entidad_adscripcion,
					  "municipio_adscripcion" => $municipio_adscripcion,
					  "calle_adscripcion" => strtoupper($this->request->getPost('calle_adscripcion')),
					  "numero_exterior_adscripcion" => strtoupper($this->request->getPost('exterior_adscripcion')),
					  "numero_interior_adscripcion" => strtoupper($this->request->getPost('interior_adscripcion')),
					  "entre_calle1_adscripcion" => strtoupper($this->request->getPost('entrecalle_adscripcion')),
					  "entre_calle2_adscripcion" => strtoupper($this->request->getPost('ylacalle_adscripcion')),
					  "numero_telefono_adscripcion" => $this->request->getPost('telefono_adscripcion'),
					  "idCodigoPostal_adscripcion" => $this->request->getPost('codigoAds'),
					  "colonia_adscripcion" => $this->request->getPost('coloniacodigoAds'),
					  "idEstado_dom_adscripcion" => $this->request->getPost('federativa_adscripcion'),
					  "municipio_delegacion" => $this->request->getPost('delegacion_adscripcion'),
					  "ciudad_poblacion" => $this->request->getPost('ciudadcodigoAds'), 
						"updatedby" => $LoggedUserId , 
						"updateddate" => date("Y-m-d H:i:s") );

					$expDocenteArray=[];
					
				if ($expDocente == 0){	
					$val ="";
					 $clockSequence = 16383;
					for ($i = 1; $i <= 2; $i++) {
  						
  						$uuid1 = Uuid::uuid1($clockSequence);
        				$idExp = $uuid1->toString();
  						 
  						$getFecha_final = $this->request->getPost('fecha_final'.$val);

        				$fecha_final = date( "Y-m-d" ,strtotime($getFecha_final));

        				$getFecha_inicial = $this->request->getPost('fecha_inicial'.$val);

        				$fecha_inicial = date( "Y-m-d" ,strtotime($getFecha_inicial));

					$expDocenteArray[] = array(

						"id" => $idExp ,
						"idPersonales" => $id , 
						"nombre_curso" => strtoupper($this->request->getPost('nombrecurso'.$val)) , 
						"nombre_institucion" => strtoupper($this->request->getPost('nombreInstitucion'.$val)) , 
						"fecha_inicio" => $fecha_inicial , 
						"fecha_termino" => $fecha_final , 
						"certificado_por" => strtoupper($this->request->getPost('certificado_por'.$val)) , 
						"activo" => 1 , 
						"createdby" => $LoggedUserId , 
						"createddate" => date("Y-m-d H:i:s"));

						$val ="B";

						$valB =$this->request->getPost('nombrecursoB');

        				if (!isset($valB) || empty($valB)){

            				$i = 3;
        				}
					}
				}	


					$result = $this->modelCuip->updateDatosPersonales( $datosPersonales,$expDocenteArray,$expDocente,$id);

					
					
                    if ($result) {

            			
                    	$succes = ["mensaje" => 'Datos Personales editados con exito' ,
                            	   "succes" => "succes"];

                        $data['idPersonal'] = $this->encrypt->Encrypt($id);
    	   

                           	   
                    	
                    } else {
                    	$dontSucces = ["error" => "error",
                    				  "mensaje" => 	'Hubo un error al editar los Datos Persoanles'  ];

                    }
				} else {	
					$errors = $this->validator->getErrors();
				}

				echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
		}	
	}

	public function EditarReferencias(){
		if ($this->request->getMethod() == "post" && $this->request->getvar(['idReferencia,apellidoPaterno, apellidoMaterno, primerNombre, segundoNombre, sexo_fam_cer, ocupacion, parentesco_fam_cercano, calle, exterior, interior, numero, codigoRefCer, coloniacodigoRefCer, estadocodigoRefCer, municipiocodigoRefCer, ciudadcodigoRefCer, pais, calle, apellidoMaterno, primerNombreParCer, segundoNombreParCer, sexo_par_cer, ocupacionParCer, parentesco_cercano, calleParCer, exteriorParCer, interiorParCer, numeroParCer, codigoParCer, coloniacodigoParCer, estadocodigoParCer, municipiocodigoParCer, ciudadcodigoParCer, paisParCer, apellidoPaternoRefPer, apellidoMaternoRefPer, primerNombreRefPer, segundoNombreRefPer, sexo_per, ocupacionRefPer, parentesco_personal, calleRefPer, exteriorRefPer, interiorRefPer, numeroRefPer, codigoPersonal, coloniacodigoPersonal, estadocodigoPersonal, municipiocodigoPersonal, ciudadcodigoPersonal, paisRefPer, apellidoPaternoRefLab, apellidoMaternoRefLab, primerNombreRefLab, segundoNombreRefLab, sexo_lab, ocupacionRefLab, parentesco_laboral, calleRefLab, exteriorRefLab, interiorRefLab, numeroRefLab, codigoLaboral, coloniacodigoLaboral, estadocodigoLaboral, municipiocodigoLaboral, ciudadcodigoLaboral, paisRefLab, idPersonal'],FILTER_SANITIZE_STRING)){

			$errors = [];
			$succes = [];
			$dontSucces = [];
			$data = [];
			$getIdPersonal = $this->request->getPost('idPersonal');

			if(!empty($getIdPersonal)){

				$rules = [
				'idPersonal' =>  ['label' => "", 'rules' => 'required'],
				'idReferencia' =>  ['label' => "", 'rules' => 'required'],	
					////////////////////familiar cercano//////////////////
				'apellidoPaterno' =>  ['label' => "Apellido Paterno", 'rules' => 'required|max_length[255]'],
				'apellidoMaterno' =>  ['label' => "Apellido Materno", 'rules' => 'required|max_length[255]'],
				'primerNombre' =>  ['label' => "Primer Nombre", 'rules' => 'required|max_length[255]'],
				'sexo_fam_cer' =>  ['label' => "Sexo", 'rules' => 'required'],
				'ocupacion' =>  ['label' => "Ocupacion", 'rules' => 'required'],
				'parentesco_fam_cercano' =>  ['label' => "Parentesco", 'rules' => 'required'],
				'calle' =>  ['label' => "Calle", 'rules' => 'required|max_length[255]'],
				'exterior' =>  ['label' => "Exterior", 'rules' => 'required|max_length[255]'],
				
				'coloniacodigoRefCer' =>  ['label' => "Colonia", 'rules' => 'required|max_length[255]'],
				'codigoRefCer' =>  ['label' => "Codigo Postal", 'rules' => 'required|max_length[5]|integer'],
				'numero' =>  ['label' => "Numero Telefonico", 'rules' => 'required|max_length[10]|integer'],
				'pais' =>  ['label' => "Pais", 'rules' => 'required|max_length[255]'],
				'estadocodigoRefCer' =>  ['label' => "Entidad Federativa", 'rules' => 'required|max_length[255]'],
				'municipiocodigoRefCer' =>  ['label' => "Municipio", 'rules' => 'required|max_length[255]'],
				'ciudadcodigoRefCer' =>  ['label' => "Ciudad", 'rules' => 'required|max_length[255]'],
				//////////////////////pariente cercano///////////////////////
				'apellidoPaternoParCer' =>  ['label' => "Apellido Paterno", 'rules' => 'required|max_length[255]'],
				'apellidoMaternoParCer' =>  ['label' => "Apellido Materno", 'rules' => 'required|max_length[255]'],
				'primerNombreParCer' =>  ['label' => "Primer Nombre", 'rules' => 'required|max_length[255]'],
				
				'sexo_par_cer' =>  ['label' => "Sexo", 'rules' => 'required|max_length[255]'],
				'ocupacionParCer' =>  ['label' => "Ocupacion", 'rules' => 'required'],
				'parentesco_cercano' =>  ['label' => "Parentesco", 'rules' => 'required|max_length[255]'],
				'calleParCer' =>  ['label' => "Calle", 'rules' => 'required|max_length[255]'],
				'exteriorParCer' =>  ['label' => "NO.Exterior", 'rules' => 'required|max_length[255]'],
				
				'codigoParCer' =>  ['label' => "Codigo Postal", 'rules' => 'required|max_length[5]|integer'],
				'coloniacodigoParCer' =>  ['label' => "Colonia", 'rules' => 'required|max_length[255]'],
				'numeroParCer' =>  ['label' => "Numero Telefonico", 'rules' => 'required|max_length[10]|integer'],
				'estadocodigoParCer' =>  ['label' => "Entidad Federativa", 'rules' => 'required|max_length[255]'],
				'municipiocodigoParCer' =>  ['label' => "Municipio", 'rules' => 'required|max_length[255]'],
				'ciudadcodigoParCer' =>  ['label' => "Ciudad", 'rules' => 'required|max_length[255]'],
				'paisParCer' =>  ['label' => "Pais", 'rules' => 'required|max_length[255]'],
				'apellidoPaternoRefLab' =>  ['label' => "Apellido Paterno", 'rules' => 'required|max_length[255]'],
				'apellidoMaternoRefLab' =>  ['label' => "Apellido Materno", 'rules' => 'required|max_length[255]'],
				'primerNombreRefLab' =>  ['label' => "Primer Nombre", 'rules' => 'required|max_length[255]'],
				
				'sexo_lab' =>  ['label' => "Sexo", 'rules' => 'required|max_length[255]'],
				'ocupacionRefLab' =>  ['label' => "Ocupacion", 'rules' => 'required'],
				'parentesco_laboral' =>  ['label' => "Parentesco", 'rules' => 'required|max_length[255]'],
				'calleRefLab' =>  ['label' => "Calle", 'rules' => 'required|max_length[255]'],
				'exteriorRefLab' =>  ['label' => "NO.Exterior", 'rules' => 'required|max_length[255]'],
				
				'numeroRefLab' =>  ['label' => "Numero Telefonico", 'rules' => 'required|max_length[10]|integer'],
				'codigoLaboral' =>  ['label' => "Codigo Postal", 'rules' => 'required|max_length[5]|integer'],
				'coloniacodigoLaboral' =>  ['label' => "Colonia", 'rules' => 'required|max_length[255]'],
				'estadocodigoLaboral' =>  ['label' => "Entidad Federativa", 'rules' => 'required|max_length[255]'],
				'municipiocodigoLaboral' =>  ['label' => "Municipio", 'rules' => 'required|max_length[255]'],
				'ciudadcodigoLaboral' =>  ['label' => "Ciudad", 'rules' => 'required|max_length[255]'],
				'paisRefLab' =>  ['label' => "Pais", 'rules' => 'required|max_length[255]'],
				'apellidoPaternoRefPer' =>  ['label' => "Apellido Paterno", 'rules' => 'required|max_length[255]'],
				'apellidoMaternoRefPer' =>  ['label' => "Apellido Materno", 'rules' => 'required|max_length[255]'],
				'primerNombreRefPer' =>  ['label' => "Primer Nombre", 'rules' => 'required|max_length[255]'],
				
				'sexo_per' =>  ['label' => "Sexo", 'rules' => 'required|max_length[255]'],
				'ocupacionRefPer' =>  ['label' => "Ocupacion", 'rules' => 'required'],
				'parentesco_personal' =>  ['label' => "Parentesco", 'rules' => 'required|max_length[255]'],
				'calleRefPer' =>  ['label' => "Calle", 'rules' => 'required|max_length[255]'],
				'exteriorRefPer' =>  ['label' => "NO.Exterior", 'rules' => 'required|max_length[255]'],
				
				'numeroRefPer' =>  ['label' => "Numero Telefonico", 'rules' => 'required|max_length[10]|integer'],
				'codigoPersonal' =>  ['label' => "Codigo Postal", 'rules' => 'required|max_length[5]|integer'],
				'coloniacodigoPersonal' =>  ['label' => "Colonia", 'rules' => 'required|max_length[255]'],
				'estadocodigoPersonal' =>  ['label' => "Entidad Federativa", 'rules' => 'required|max_length[255]'],
				'municipiocodigoPersonal' =>  ['label' => "Municipio", 'rules' => 'required|max_length[255]'],
				'ciudadcodigoPersonal' =>  ['label' => "Ciudad", 'rules' => 'required|max_length[255]'],
				'paisRefPer' =>  ['label' => "Pais", 'rules' => 'required|max_length[255]']];
		 
				$errors = [];
				$succes = [];
				$dontSucces = [];
				$data = [];

				if($this->validate($rules)){
					
					$getUser = session()->get('IdUser');
					$LoggedUserId = $this->encrypter->decrypt($getUser);
					$empresa = session()->get('empresa');
					$idEmpresa = $this->encrypter->decrypt($empresa);
					$uuid = $this->request->getPost('idReferencia');
        			$id = $this->encrypt->Decrytp($uuid);

        			

        			$getIdPersonal = $this->request->getPost('idPersonal');

        			$idPersonal = $this->encrypt->Decrytp($getIdPersonal);

        			

        			$getSexo_fam_cer = $this->request->getPost('sexo_fam_cer');

        			$sexo_fam_cer = $this->encrypt->Decrytp($getSexo_fam_cer);

        			$getParentesco_fam_cercano = $this->request->getPost('parentesco_fam_cercano');

        			$parentesco_fam_cercano = $this->encrypt->Decrytp($getParentesco_fam_cercano);

        			$getPais = $this->request->getPost('pais');

        			$pais = $this->encrypt->Decrytp($getPais);

        			$getSexo_per = $this->request->getPost('sexo_per');

        			$sexo_per = $this->encrypt->Decrytp($getSexo_per);

        			$getParentesco_personal = $this->request->getPost('parentesco_personal');

        			$parentesco_personal = $this->encrypt->Decrytp($getParentesco_personal);

        			$getPaisRefPer = $this->request->getPost('paisRefPer');

        			$paisRefPer = $this->encrypt->Decrytp($getPaisRefPer);

        			$getSexo_lab = $this->request->getPost('sexo_lab');

        			$sexo_lab = $this->encrypt->Decrytp($getSexo_lab);

        			$getParentesco_laboral = $this->request->getPost('parentesco_laboral');

        			$parentesco_laboral = $this->encrypt->Decrytp($getParentesco_laboral);

        			$getPaisRefLab = $this->request->getPost('paisRefLab');

        			$paisRefLab = $this->encrypt->Decrytp($getPaisRefLab);

        			$getSexo_par_cer = $this->request->getPost('sexo_par_cer');

        			$sexo_par_cer = $this->encrypt->Decrytp($getSexo_par_cer);

        			$getParentesco_cercano = $this->request->getPost('parentesco_cercano');

        			$parentesco_cercano = $this->encrypt->Decrytp($getParentesco_cercano);


        			$getPaisParCer = $this->request->getPost('paisParCer');

        			$paisParCer = $this->encrypt->Decrytp($getPaisParCer);

        			$getOcupacion = $this->request->getPost('ocupacion');

        			$ocupacion = $this->encrypt->Decrytp($getOcupacion);

        			$getOcupacionParCer = $this->request->getPost('ocupacionParCer');

        			$ocupacionParCer = $this->encrypt->Decrytp($getOcupacionParCer);

        			$getOcupacionRefPer = $this->request->getPost('ocupacionRefPer');

        			$ocupacionRefPer = $this->encrypt->Decrytp($getOcupacionRefPer);

        			$getOcupacionRefLab = $this->request->getPost('ocupacionRefLab');

        			$ocupacionRefLab = $this->encrypt->Decrytp($getOcupacionRefLab);

        			$getEstadocodigoRefCer = $this->request->getPost('estadocodigoRefCer');

        			$estadocodigoRefCer = $this->encrypt->Decrytp($getEstadocodigoRefCer);

        			$getMunicipiocodigoRefCer = $this->request->getPost('municipiocodigoRefCer');

        			$municipiocodigoRefCer = $this->encrypt->Decrytp($getMunicipiocodigoRefCer);

        			$getEstadocodigoParCer = $this->request->getPost('estadocodigoParCer');

        			$estadocodigoParCer = $this->encrypt->Decrytp($getEstadocodigoParCer);

        			$getMunicipiocodigoParCer = $this->request->getPost('municipiocodigoParCer');

        			$municipiocodigoParCer = $this->encrypt->Decrytp($getMunicipiocodigoParCer);

        			$getEstadocodigoPersonal = $this->request->getPost('estadocodigoPersonal');

        			$estadocodigoPersonal = $this->encrypt->Decrytp($getEstadocodigoPersonal);

        			$getMunicipiocodigoPersonal = $this->request->getPost('municipiocodigoPersonal');

        			$municipiocodigoPersonal = $this->encrypt->Decrytp($getMunicipiocodigoPersonal);

        			$getEstadocodigoLaboral = $this->request->getPost('estadocodigoLaboral');

        			$estadocodigoLaboral = $this->encrypt->Decrytp($getEstadocodigoLaboral);

        			$getMunicipiocodigoLaboral = $this->request->getPost('municipiocodigoLaboral');

        			$municipiocodigoLaboral = $this->encrypt->Decrytp($getMunicipiocodigoLaboral);

        			


					$referencias = array(
		    					
		    			
						"apellido_paterno_fam" => strtoupper($this->request->getPost('apellidoPaterno')) , 
						"apellido_materno_fam" => strtoupper($this->request->getPost('apellidoMaterno')) , 
						"primer_nombre_fam" => strtoupper($this->request->getPost('primerNombre')) , 
						"segundo_nombre_fam" => strtoupper($this->request->getPost('segundoNombre')) , 
						"idGenero_fam" => $sexo_fam_cer , 
						"ocupacion_fam" => $ocupacion , 
						"idParentesco_fam" => $parentesco_fam_cercano , 
						"calle_fam" => strtoupper($this->request->getPost('calle')) , 
						"numero_exterior_fam" => strtoupper($this->request->getPost('exterior')) , 
						"numero_interior_fam" => strtoupper($this->request->getPost('interior')) , 
						"colonia_fam" => strtoupper($this->request->getPost('coloniacodigoRefCer')) , 
						"idCodigoPostal_fam" => $this->request->getPost('codigoRefCer') , 
						"numero_telefono_fam" => $this->request->getPost('numero') , 
						"idPaisNacimiento_fam" => $pais , 
						"idEstado_fam" => $estadocodigoRefCer , 
						"municipio_fam" => $municipiocodigoRefCer , 
						"ciudad_fam" => strtoupper($this->request->getPost('ciudadcodigoRefCer')) , 
						"apellido_paterno_pariente" => strtoupper($this->request->getPost('apellidoPaternoParCer')) , 
						"apellido_materno_pariente" => strtoupper($this->request->getPost('apellidoMaternoParCer')) , 
						"primer_nombre_pariente" => strtoupper($this->request->getPost('primerNombreParCer')) , 
						"segundo_nombre_pariente" => strtoupper($this->request->getPost('segundoNombreParCer')) , 
						"idGenero_pariente" => $sexo_par_cer , 
						"ocupacion_pariente" => $ocupacionParCer , 
						"idParentesco_pariente" => $parentesco_cercano , 
						"calle_pariente" => strtoupper($this->request->getPost('calleParCer')) , 
						"numero_exterior_pariente" => strtoupper($this->request->getPost('exteriorParCer')) , 
						"numero_interior_pariente" => strtoupper($this->request->getPost('interiorParCer')) , 
						"colonia_pariente" => strtoupper($this->request->getPost('coloniacodigoParCer')) , 
						"idCodigoPostal_pariente" => $this->request->getPost('codigoParCer') , 
						"numero_telefono_pariente" => $this->request->getPost('numeroParCer') , 
						"idPaisNacimiento_pariente" => $paisParCer , 
						"idEstado_pariente" => $estadocodigoParCer , 
						"municipio_pariente" => $municipiocodigoParCer , 
						"ciudad_pariente" => strtoupper($this->request->getPost('ciudadcodigoParCer')) , 

						"apellido_paterno_personal" => strtoupper($this->request->getPost('apellidoPaternoRefPer')) , 
						"apellido_materno_personal" => strtoupper($this->request->getPost('apellidoMaternoRefPer')) , 
						"primer_nombre_personal" => strtoupper($this->request->getPost('primerNombreRefPer')) , 
						"segundo_nombre_personal" => strtoupper($this->request->getPost('segundoNombreRefPer')) , 
						"idGenero_personal" => $sexo_per , 
						"ocupacion_personal" => $ocupacionRefPer , 
						"idParentesco_personal" => $parentesco_personal , 
						"calle_personal" => strtoupper($this->request->getPost('calleRefPer')) , 
						"numero_exterior_personal" => strtoupper($this->request->getPost('exteriorRefPer')) , 
						"numero_interior_personal" => strtoupper($this->request->getPost('interiorRefPer')) , 
						"colonia_personal" => strtoupper($this->request->getPost('coloniacodigoPersonal')) , 
						"idCodigoPostal_personal" => $this->request->getPost('codigoPersonal') , 
						"numero_telefono_personal" => $this->request->getPost('numeroRefPer') , 
						"idPaisNacimiento_personal" => $paisRefPer, 
						"idEstado_personal" => $estadocodigoPersonal , 
						"municipio_personal" => $municipiocodigoPersonal , 
						"ciudad_personal" => strtoupper($this->request->getPost('ciudadcodigoPersonal')) ,

						"apellido_paterno_laboral" => strtoupper($this->request->getPost('apellidoPaternoRefLab')) , 
						"apellido_materno_laboral" => strtoupper($this->request->getPost('apellidoMaternoRefLab')) , 
						"primer_nombre_laboral" => strtoupper($this->request->getPost('primerNombreRefLab')) , 
						"segundo_nombre_laboral" => strtoupper($this->request->getPost('segundoNombreRefLab')) , 
						"idGenero_laboral" => $sexo_lab , 
						"ocupacion_laboral" => $ocupacionRefLab , 
						"idParentesco_laboral" => $parentesco_laboral , 
						"calle_laboral" => strtoupper($this->request->getPost('calleRefLab')) , 
						"numero_exterior_laboral" => strtoupper($this->request->getPost('exteriorRefLab')) , 
						"numero_interior_laboral" => strtoupper($this->request->getPost('interiorRefLab')) , 
						"colonia_laboral" => strtoupper($this->request->getPost('coloniacodigoLaboral')) , 
						"idCodigoPostal_laboral" => $this->request->getPost('codigoLaboral') , 
						"numero_telefono_laboral" => $this->request->getPost('numeroRefLab') , 
						"idPaisNacimiento_laboral" => $paisRefLab , 
						"idEstado_laboral" => $estadocodigoLaboral , 
						"municipio_laboral" => $municipiocodigoLaboral , 
						"ciudad_laboral" => strtoupper($this->request->getPost('ciudadcodigoLaboral')) ,
						"updatedby" => $LoggedUserId , 
						"updateddate" => date("Y-m-d H:i:s") );


					$result = $this->modelCuip->updateReferencias( $referencias,$idPersonal,$id);

					
					
                    if ($result) {

            			
                    	$succes = ["mensaje" => 'Referencias editadas con exito' ,
                            	   "succes" => "succes"];

                           	   
                    	
                    } else {
                    	$dontSucces = ["error" => "error",
                    				  "mensaje" => 	'Hubo un error al editar las Referencias'  ];

                    }
				} else {	
					$errors = $this->validator->getErrors();
				}

				

			} else {

				$dontSucces = ["error" => "error",
                    				  "mensaje" => 	'Es necesario que primero capture la sección de datos personales'  ];

			}

			echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);	
		}	
	}


	public function EditarSocioEconomico(){
		if ($this->request->getMethod() == "post" && $this->request->getvar(['idSocioEconomico,familia, ingreso, domicilio_tipo, actividad, especificacion, inversion, vehiculo, calidad, vicio, imagen, comportamiento, calle, apellidoMaterno, primerNombre, nombre, fecha_nacimiento_dep, sexo_dep, parentesco_familiar,idPersonal'],FILTER_SANITIZE_STRING)){

			$errors = [];
			$succes = [];
			$dontSucces = [];
			$data = [];
			$getIdPersonal = $this->request->getPost('idPersonal');

			if(!empty($getIdPersonal)){

				$rules = [
				'idPersonal' =>  ['label' => "", 'rules' => 'required'],
				'idSocioEconomico' =>  ['label' => "", 'rules' => 'required'],	
				'familia' =>  ['label' => "¿Vive con su Familia?", 'rules' => 'required'],
				'ingreso' =>  ['label' => "Ingreso familiar adicional (Mensual)", 'rules' => 'required|max_length[255]'],
				'domicilio_tipo' =>  ['label' => "Su domicilio es", 'rules' => 'required'],
				'actividad' =>  ['label' => "Actividades culturales o deportivas que practique", 'rules' => 'required|max_length[255]'],
				'especificacion' =>  ['label' => "Especifiación de inmueble y costo", 'rules' => 'required|max_length[255]'],
				'inversion' =>  ['label' => "Inversiones y monto aproximado", 'rules' => 'required|max_length[255]'],
				'vehiculo' =>  ['label' => "Vehiculo y costo Aproximado", 'rules' => 'required|max_length[255]'],
				'calidad' =>  ['label' => "Calidad de Vida", 'rules' => 'required|max_length[255]'],
				'vicio' =>  ['label' => "Vicios", 'rules' => 'required|max_length[255]'],
				'imagen' =>  ['label' => "Imagen Publica", 'rules' => 'required|max_length[255]'],
				'comportamiento' =>  ['label' => "Comportamiento Social", 'rules' => 'required|max_length[255]']];
		 
			$datos = $this->request->getPost('dependientes');	

		 	if($datos == 0){
				$rules['apellidoPaterno'] =  ['label' => "Apellido Paterno", 'rules' => 'required|max_length[255]'];
				$rules['apellidoMaterno'] =  ['label' => "Apellido Materno", 'rules' => 'required|max_length[255]'];
				$rules['primerNombre'] =  ['label' => "Primer Nombre", 'rules' => 'required|max_length[255]'];
				$rules['segundoNombre'] =  ['label' => "Segundo Nombre Nombre", 'rules' => 'required|max_length[255]'];
				$rules['fecha_nacimiento_dep'] =  ['label' => "Fecha de Nacimiento", 'rules' => 'required|valid_only_date_chek'];
				$rules['sexo_dep'] =  ['label' => "Sexo", 'rules' => 'required'];
				$rules['parentesco_familiar'] =  ['label' => "Parentesco", 'rules' => 'required'];

				$rules['apellidoPaternoB'] =  ['label' => "Apellido Paterno", 'rules' => 'required_with[apellidoMaternoB,primerNombreB,segundoNombreB,fecha_nacimiento_depB,sexo_depB,parentesco_familiarB]|max_length[255]'];
				$rules['apellidoMaternoB'] =  ['label' => "Apellido Materno", 'rules' => 'required_with[apellidoPaternoB,primerNombreB,segundoNombreB,fecha_nacimiento_depB,sexo_depB,parentesco_familiarB]|max_length[255]'];
				$rules['primerNombreB'] =  ['label' => "Primer Nombre", 'rules' => 'required_with[apellidoPaternoB,apellidoMaternoB,segundoNombreB,fecha_nacimiento_depB,sexo_depB,parentesco_familiarB]|max_length[255]'];
				$rules['segundoNombreB'] =  ['label' => "Segundo Nombre Nombre", 'rules' => 'required_with[apellidoPaternoB,apellidoMaternoB,primerNombreB,fecha_nacimiento_depB,sexo_depB,parentesco_familiarB]|max_length[255]'];
				$rules['fecha_nacimiento_depB'] =  ['label' => "Fecha de Nacimiento", 'rules' => 'required_with[apellidoPaternoB,apellidoMaternoB,primerNombreB,segundoNombreB,sexo_depB,parentesco_familiarB]'];
				$rules['sexo_depB'] =  ['label' => "Sexo", 'rules' => 'required_with[apellidoPaternoB,apellidoMaternoB,primerNombreB,segundoNombreB,fecha_nacimiento_depB,parentesco_familiarB]'];
				$rules['parentesco_familiarB'] =  ['label' => "Parentesco", 'rules' => 'required_with[apellidoPaternoB,apellidoMaternoB,primerNombreB,segundoNombreB,fecha_nacimiento_depB,sexo_depB]'];
			}	

				if($this->validate($rules)){
					
					$getUser = session()->get('IdUser');
					$LoggedUserId = $this->encrypter->decrypt($getUser);
					$empresa = session()->get('empresa');
					$idEmpresa = $this->encrypter->decrypt($empresa);
					$uuid = $this->request->getPost('idSocioEconomico');
        			$id = $this->encrypt->Decrytp($uuid);

        			

        			$getFamilia = $this->request->getPost('familia');

        			$familia = $this->encrypt->Decrytp($getFamilia);
					
					$getDomicilio_tipo = $this->request->getPost('domicilio_tipo');

        			$domicilio_tipo = $this->encrypt->Decrytp($getDomicilio_tipo);

        			
        			$idPersonal = $this->encrypt->Decrytp($getIdPersonal);


					$socioEconomico = array(
		    					
		    					
						
						"vive_con_familia" => $familia  , 
						"ingreso_familiar" =>  strtoupper($this->request->getPost('ingreso')) , 
						"idTipoDomicilio" => $domicilio_tipo , 
						"actividades_culturales" =>  strtoupper($this->request->getPost('actividad')) , 
						"especificacion_inmueble" =>  strtoupper($this->request->getPost('especificacion')) , 
						"inversiones" =>  strtoupper($this->request->getPost('inversion')) , 
						"vehiculo" =>  strtoupper($this->request->getPost('vehiculo')) , 
						"calidad_vida" => strtoupper($this->request->getPost('calidad'))  , 
						"vicios" =>  strtoupper($this->request->getPost('vicio')) , 
						"imagen_publica" =>  strtoupper($this->request->getPost('imagen')) , 
						"comportamiento" => strtoupper($this->request->getPost('comportamiento'))  ,
						"updatedby" => $LoggedUserId , 
						"updateddate" => date("Y-m-d H:i:s") );


					$datosDependientesArray=[];
					
				if ($datos == 0){	
					$val ="";
					$clockSequence = 16383;
					for ($i = 1; $i <= 2; $i++) {
  						
  						$uuid1 = Uuid::uuid1($clockSequence);
                        $idDep = $uuid1->toString();

  						$getFecha_nacimiento_dep = $this->request->getPost('fecha_nacimiento_dep'.$val);

        				$fecha_nacimiento_dep = date( "Y-m-d" ,strtotime($getFecha_nacimiento_dep));

        				$getSexo_dep = $this->request->getPost('sexo_dep'.$val);

        				$sexo_dep = $this->encrypt->Decrytp($getSexo_dep);

        				$getParentesco_familiar = $this->request->getPost('parentesco_familiar'.$val);

        				$parentesco_familiar = $this->encrypt->Decrytp($getParentesco_familiar);

					$datosDependientesArray[] = array(

						"id" => $idDep ,
						"idSocioeconomico" => $id , 
						"apellido_paterno" => strtoupper($this->request->getPost('apellidoPaterno'.$val))  , 
						"apellido_materno" => strtoupper($this->request->getPost('apellidoMaterno'.$val))  , 
						"primer_nombre" => strtoupper($this->request->getPost('primerNombre'.$val))  , 
						"segundo_nombre" => strtoupper($this->request->getPost('segundoNombre'.$val))  , 
						"fecha_nacimiento" => $fecha_nacimiento_dep  , 
						"idGenero" => $sexo_dep  ,
						"idParentesco" =>  $parentesco_familiar ,
						"activo" => 1 , 
						"createdby" => $LoggedUserId , 
						"createddate" => date("Y-m-d H:i:s"));

						$val ="B";

						$valB =$this->request->getPost('apellidoPaternoB');

						if (!isset($valB) || empty($valB)){

							$i = 3;
						}
					}
				}



					$result = $this->modelCuip->updateSocioEconomico( $socioEconomico,$datosDependientesArray,$datos,$idPersonal,$id);

					
					
                    if ($result) {

            			
                    	$succes = ["mensaje" => 'Socio Economicos editados con exito' ,
                            	   "succes" => "succes"];

                           	   
                    	
                    } else {
                    	$dontSucces = ["error" => "error",
                    				  "mensaje" => 	'Hubo un error al editar los Socio Economicos'  ];

                    }
				} else {	
					$errors = $this->validator->getErrors();
				}

				

			} else {

				$dontSucces = ["error" => "error",
                    				  "mensaje" => 	'Es necesario que primero capture la sección de datos personales'  ];

			}	


			echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
		}	
	}


	public function EditarEmpSegPublica(){
		if ($this->request->getMethod() == "post" && $this->request->getvar(['idSegPublica,idPersonal,dependencia, corporacion, calle, exterior, interior, numero, codigoSegPub, coloniacodigoSegPub, aprobacion, separacionEmpSeg, puesto_funcional, funciones, especialidad, rango, numero_placa, numero_empleado, sueldo, compensaciones, area, division, jefe_inmediato, nombre_jefe, estadocodigoSegPub, municipiocodigoSegPub, motivo_separacion, tipo_separacion, tipo_baja, comentarios'],FILTER_SANITIZE_STRING)){

			$errors = [];
			$succes = [];
			$dontSucces = [];
			$data = [];
			
			$getIdPersonal = $this->request->getPost('idPersonal');

			if(!empty($getIdPersonal)){	

				$datos = $this->request->getPost('empleo');

				if($datos == 0){


					$rules = [
					'idPersonal' =>  ['label' => "", 'rules' => 'required'],
					'idSegPublica' =>  ['label' => "", 'rules' => 'required'],		
					'dependencia' =>  ['label' => "Dependencia", 'rules' => 'required|max_length[255]'],
					'corporacion' =>  ['label' => "Corporacióne", 'rules' => 'required|max_length[255]'],
					'calle' =>  ['label' => "Calle ", 'rules' => 'required|max_length[255]'],
					'exterior' =>  ['label' => "No. Exterior", 'rules' => 'required|max_length[255]'],
					
					'numero' =>  ['label' => "Numero Telefónico", 'rules' => 'required|max_length[10]|integer|min_length[10]'],
					'codigoSegPub' =>  ['label' => "Código Postal", 'rules' => 'required|max_length[5]|integer'],
					'coloniacodigoSegPub' =>  ['label' => "Colonia", 'rules' => 'required'],
					'ingresoEmpPublic' =>  ['label' => "Ingreso", 'rules' => 'required|valid_only_date_chek'],
					'separacionEmpSeg' =>  ['label' => "Separación", 'rules' => 'required|valid_only_date_chek'],
					'puesto_funcional' =>  ['label' => "Puesto Funcional", 'rules' => 'required|max_length[255]'],
					'funciones' =>  ['label' => "Funciones", 'rules' => 'required|max_length[255]'],
					'especialidad' =>  ['label' => "Especialidad", 'rules' => 'required|max_length[255]'],
					'rango' =>  ['label' => "Rango o categoría", 'rules' => 'required|max_length[255]'],
					'numero_placa' =>  ['label' => "Numero de placa", 'rules' => 'required|max_length[255]'],
					'numero_empleado' =>  ['label' => "Numero de empleado", 'rules' => 'required|max_length[255]'],
					'sueldo' =>  ['label' => "Sueldo Base (Mensual)", 'rules' => 'required|max_length[255]'],
					'compensaciones' =>  ['label' => "Compensaciones (Mensual)", 'rules' => 'required|max_length[255]'],
					'area' =>  ['label' => "Area", 'rules' => 'required|max_length[255]'],
					'division' =>  ['label' => "División", 'rules' => 'required|max_length[255]'],
					'jefe_inmediato' =>  ['label' => "CUIP Jefe Inmediato", 'rules' => 'required|max_length[255]'],
					'nombre_jefe' =>  ['label' => "Nombre del Jefe Inmediato", 'rules' => 'required|max_length[255]'],
					'estadocodigoSegPub' =>  ['label' => "Entidad Federativa", 'rules' => 'required'],
					'municipiocodigoSegPub' =>  ['label' => "Municipio", 'rules' => 'required'],
					'motivo_separacion' =>  ['label' => "Motivo de separación", 'rules' => 'required|max_length[255]'],
					'tipo_separacion' =>  ['label' => "Tipo de Separación", 'rules' => 'required|max_length[255]'],
					'tipo_baja' =>  ['label' => "Tipo de Baja", 'rules' => 'required|max_length[255]'],
					'comentarios' =>  ['label' => "Comentarios", 'rules' => 'required|max_length[255]']];
		 
				



					if($this->validate($rules)){
					
						$getUser = session()->get('IdUser');
						$LoggedUserId = $this->encrypter->decrypt($getUser);
						$empresa = session()->get('empresa');
						$idEmpresa = $this->encrypter->decrypt($empresa);
						$uuid = $this->request->getPost('idSegPublica');
        				$id = $this->encrypt->Decrytp($uuid);

	        			$idPersonal = $this->encrypt->Decrytp($getIdPersonal);

	        			
	        			$getIngresoEmpPublic = $this->request->getPost('ingresoEmpPublic');

	        			$ingresoEmpPublic = date( "Y-m-d" ,strtotime($getIngresoEmpPublic));


	        			$getSeparacion = $this->request->getPost('separacionEmpSeg');

	        			$separacion = date( "Y-m-d" ,strtotime($getSeparacion));

	        			

						$empleosSeguridad = array(
			    					
			    					
							
							"dependencia" =>  strtoupper($this->request->getPost('dependencia')) , 
							"corporacion" =>  strtoupper($this->request->getPost('corporacion')) , 
							
							"calle" =>  strtoupper($this->request->getPost('calle')) , 
							"numero_exterior" => strtoupper($this->request->getPost('exterior'))  , 
							"numero_interior" => strtoupper($this->request->getPost('interior'))  , 
							"colonia" =>  strtoupper($this->request->getPost('coloniacodigoSegPub')) , 
							"idCodigoPostal" => $this->request->getPost('codigoSegPub')  , 
							"numero_telefono" => $this->request->getPost('numero')  , 
							"ingreso" =>  $ingresoEmpPublic , 
							"separacion" =>  $separacion , 
							"idPuestoFuncional" =>  strtoupper($this->request->getPost('puesto_funcional')) , 
							"funciones" => strtoupper($this->request->getPost('funciones'))  , 
							"especialidad" => strtoupper($this->request->getPost('especialidad'))  , 
							"rango" =>  strtoupper($this->request->getPost('rango')) , 
							"numero_placa" => strtoupper($this->request->getPost('numero_placa'))  , 
							"numero_empleado" => strtoupper($this->request->getPost('numero_empleado'))  , 
							"sueldo_base" => strtoupper($this->request->getPost('sueldo'))  , 
							"compensacion" =>  strtoupper($this->request->getPost('compensaciones')) , 
							"area" =>  strtoupper($this->request->getPost('area')) , 
							"division" =>  strtoupper($this->request->getPost('division')) , 
							"cuip_jefe" =>  strtoupper($this->request->getPost('jefe_inmediato')) , 
							"nombre_jefe" =>  strtoupper($this->request->getPost('nombre_jefe')) , 
							"idEstado" =>  strtoupper($this->request->getPost('estadocodigoSegPub')) , 
							"municipio" => strtoupper($this->request->getPost('municipiocodigoSegPub'))  , 
							"idMotivoSeparacion" =>  strtoupper($this->request->getPost('motivo_separacion')) , 
							"tipo_separacion" => strtoupper($this->request->getPost('tipo_separacion'))  , 
							"tipo_baja" =>  strtoupper($this->request->getPost('tipo_baja')) , 
							"comentarios" => strtoupper($this->request->getPost('comentarios')) , 
							"updatedby" => $LoggedUserId , 
							"updateddate" => date("Y-m-d H:i:s") );
						

						$result = $this->modelCuip->updateEmpleosSeguridad( $empleosSeguridad,$idPersonal,$id);

					
					
                    	if ($result) {

            			
                    		$succes = ["mensaje" => 'Empleos en Seguridad Publica editados con exito' ,
                            	   "succes" => "succes"];

                           	   
                    	
                    	} else {
                    	$dontSucces = ["error" => "error",
                    				  "mensaje" => 	'Hubo un error al editar los Empleos en Seguridad Publica'  ];

                    	}
					} else {	
						$errors = $this->validator->getErrors();
					}
				} else {

					$dontSucces = ["error" => "error",
                    				  "mensaje" => 	'Ningun dato capturado'  ];	
				}	
				
				

			} else {

				$dontSucces = ["error" => "error",
                    				  "mensaje" => 	'Es necesario que primero capture la sección de datos personales'  ];
			}

			echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);	
		}	
	}


	public function EditarEmpDiversos(){
		if ($this->request->getMethod() == "post" && $this->request->getvar(['idPersonales,idEmpDiversos,empresa, calle, exterior, interior, codigoEmpDiv, coloniacodigoEmpDiv, estadocodigoEmpDiv, municipiocodigoEmpDiv, numero, ingresoEmpDiv,  funciones, sueldo, area, motivo_separacion, tipo_separacion, comentarios, empleo, puesto, area_gustaria, ascender, reglamentacion, reconomiento, reglamentacion_ascenso, razones_ascenso, capacitacion, desciplina, subtipo_disciplina, motivo, tipo, fecha_inicialDis, fecha_finalDis, duracion, cantidad'],FILTER_SANITIZE_STRING)){

			$errors = [];
			$succes = [];
			$dontSucces = [];
			$data = [];
			$getIdPersonal = $this->request->getPost('idPersonal');

			if(!empty($getIdPersonal)){

				$rules = [
				'idPersonal' =>  ['label' => "", 'rules' => 'required'],
				'idEmpDiversos' =>  ['label' => "", 'rules' => 'required'],
				'empleo' =>  ['label' => "¿Por qué Eligio este empleo?", 'rules' => 'required|max_length[255]'],
				'puesto' =>  ['label' => "¿Qué puesto le gustaria tener?", 'rules' => 'required|max_length[255]'],
				'area_gustaria' =>  ['label' => "¿En que area le gustaría estar?", 'rules' => 'required|max_length[255]'],
				'ascender' =>  ['label' => "¿En que tiempo desea ascender?", 'rules' => 'required|max_length[255]'],
				'reglamentacion' =>  ['label' => "¿Conoce la reglamentación de los reconocimientos?", 'rules' => 'required'],
				'reconomiento' =>  ['label' => "¿Razones por las que no ha recibido un reconocimiento?", 'rules' => 'required|max_length[255]'],
				'reglamentacion_ascenso' =>  ['label' => "¿Conoce la reglamentación de los ascensos?", 'rules' => 'required'],
				'razones_ascenso' =>  ['label' => "¿Razones por las que no ha recibido un ascenso?", 'rules' => 'required|max_length[255]'],
				'capacitacion' =>  ['label' => "¿Qué capacitación le gustaría recibir?", 'rules' => 'required|max_length[255]'],
				'desciplina' =>  ['label' => "Tipo de Disciplina", 'rules' => 'required'],
				'subtipo_disciplina' =>  ['label' => "Subtipo de disciplina", 'rules' => 'required|max_length[255]'],
				'motivo' =>  ['label' => "Motivo", 'rules' => 'required|max_length[255]'],
				'tipo' =>  ['label' => "Tipo", 'rules' => 'required|max_length[255]'],
				'fecha_inicialDis' =>  ['label' => "Fecha de Inicio", 'rules' => 'required|valid_only_date_chek'],
				'fecha_finalDis' =>  ['label' => "Fecha de Término", 'rules' => 'required|valid_only_date_chek'],
				
				'duracion' =>  ['label' => "Duración", 'rules' => 'required_with[cantidad]'],
				'cantidad' =>  ['label' => "Cantidad", 'rules' => 'required_with[duracion]']];


				$datos = $this->request->getPost('diversos');

				if($datos == 0){

					$rules['empresa'] =  ['label' => "Empresa", 'rules' => 'required|max_length[255]'];
				$rules['calle'] =  ['label' => "Calle", 'rules' => 'required|max_length[255]'];
				$rules['exterior'] =  ['label' => "No. Exterior", 'rules' => 'required|max_length[255]'];
				
				$rules['codigoEmpDiv'] =  ['label' => "Código Postal ", 'rules' => 'required|max_length[5]|integer'];
				$rules['coloniacodigoEmpDiv'] =  ['label' => "Colonia", 'rules' => 'required'];
				$rules['estadocodigoEmpDiv'] =  ['label' => "Entidad Federativa", 'rules' => 'required'];
				$rules['municipiocodigoEmpDiv'] =  ['label' => "Municipio", 'rules' => 'required'];
				$rules['numero'] = ['label' => "Numero Telefónico", 'rules' => 'required|max_length[10]|min_length[10]'];
				$rules['ingresoEmpDiv'] =  ['label' => "Ingreso", 'rules' => 'required|valid_only_date_chek'];
				$rules['funciones'] =  ['label' => "Funciones", 'rules' => 'required|max_length[255]'];
				$rules['sueldo'] =  ['label' => "Ingreso Neto (Mensual)", 'rules' => 'required|max_length[255]'];
				$rules['area'] =  ['label' => "Area", 'rules' => 'required|max_length[255]'];
				$rules['motivo_separacion'] =  ['label' => "Motivo de separación", 'rules' => 'required|max_length[255]'];
				$rules['tipo_separacion'] =  ['label' => "Tipo de Separación", 'rules' => 'required|max_length[255]'];
				
				$rules['comentarios'] =  ['label' => "Comentarios", 'rules' => 'required|max_length[255]'];

				}
		 
				

				if($this->validate($rules)){
					
					$getUser = session()->get('IdUser');
					$LoggedUserId = $this->encrypter->decrypt($getUser);
					$empresa = session()->get('empresa');
					$idEmpresa = $this->encrypter->decrypt($empresa);
					$uuid = $this->request->getPost('idEmpDiversos');
        			$id = $this->encrypt->Decrytp($uuid);

        			
        			$idPersonal = $this->encrypt->Decrytp($getIdPersonal);

        			
        			$getingresoEmpDiv = $this->request->getPost('ingresoEmpDiv');

        			$ingresoEmpDiv = date( "Y-m-d" ,strtotime($getingresoEmpDiv));

        			
        			$getFecha_inicialDis = $this->request->getPost('fecha_inicialDis');

        			$fecha_inicialDis = date( "Y-m-d" ,strtotime($getFecha_inicialDis));

        			$getFecha_finalDis = $this->request->getPost('fecha_finalDis');

        			$fecha_finalDis = date( "Y-m-d" ,strtotime($getFecha_finalDis));

        			

        			$getReglamentacion = $this->request->getPost('reglamentacion');

        			$reglamentacion = $this->encrypt->Decrytp($getReglamentacion);

        			$getReglamentacion_ascenso = $this->request->getPost('reglamentacion_ascenso');

        			$reglamentacion_ascenso = $this->encrypt->Decrytp($getReglamentacion_ascenso);

        			$getDesciplina = $this->request->getPost('desciplina');

        			$desciplina = $this->encrypt->Decrytp($getDesciplina);

        			$getDuracion = $this->request->getPost('duracion');

        			$duracion = $this->encrypt->Decrytp($getDuracion);

        			if($datos == 1){
					$empDiversos = array(
		    					
		    					
						 
						"empresa"  => ""  , 
						"calle"  => "" , 
						"numero_exterior"  => ""  , 
						"numero_interior"  =>  "" , 
						"colonia" => "" , 
						"idCodigoPostal" =>  "" , 
						"numero_telefono"  =>  "" , 
						"ingreso"  =>  "",
						"area"  =>  "" , 
						"sueldo_base"  => "" ,
						"idEstado"  =>  "" , 
						"municipio"  =>  "" , 
						"idMotivoSeparacion"  => ""  , 
						"tipo_separacion"  => ""  ,
						"comentarios"  => ""  , 
						"eligio_empleo"  =>  strtoupper($this->request->getPost('empleo')) , 
						"puesto_gustaria"  =>  strtoupper($this->request->getPost('puesto')) , 
						"area_gustaria"  =>  strtoupper($this->request->getPost('area_gustaria')) , 
						"tiempo_ascenso"  =>  strtoupper($this->request->getPost('ascender')) , 
						"reglamento"  =>  $reglamentacion , 
						"razon_ascenso"  => $reglamentacion_ascenso  , 
						"capacitacion"  =>  strtoupper($this->request->getPost('capacitacion')) , 
						"idTipoDisciplina"  =>  $desciplina , 
						"subtipo_disciplina"  =>  strtoupper($this->request->getPost('subtipo_disciplina')) , 
						"motivo"  => strtoupper($this->request->getPost('motivo'))  , 
						"tipo"  =>  strtoupper($this->request->getPost('tipo')) , 
						"fecha_inicio"  =>  $fecha_inicialDis , 
						"fecha_termino"  => $fecha_finalDis  , 
						"idDuracion"  => $duracion   , 
						"cantidad" => strtoupper($this->request->getPost('cantidad')) , 
						 
						"updatedby" => $LoggedUserId , 
						"updateddate" => date("Y-m-d H:i:s") );

					} else {

						$empDiversos = array(
		    					
		    					
						 
						"empresa"  => strtoupper($this->request->getPost('empresa'))  , 
						"calle"  => strtoupper($this->request->getPost('calle'))  , 
						"numero_exterior"  => strtoupper($this->request->getPost('exterior'))  , 
						"numero_interior"  =>  strtoupper($this->request->getPost('interior')) , 
						"colonia"  =>  strtoupper($this->request->getPost('coloniacodigoEmpDiv')) , 
						"idCodigoPostal"  =>  $this->request->getPost('codigoEmpDiv') , 
						"numero_telefono"  =>  $this->request->getPost('numero') , 
						"ingreso"  =>  $ingresoEmpDiv , 
						
						"area"  =>  strtoupper($this->request->getPost('area')) ,
						"funciones"  =>  strtoupper($this->request->getPost('funciones')) ,
						"sueldo_base"  => strtoupper($this->request->getPost('sueldo'))  , 
						 
						"idEstado"  =>  strtoupper($this->request->getPost('estadocodigoEmpDiv')) , 
						"municipio"  =>  $this->request->getPost('municipiocodigoEmpDiv') , 
						"idMotivoSeparacion"  => strtoupper($this->request->getPost('motivo_separacion'))  , 
						"tipo_separacion"  => strtoupper($this->request->getPost('tipo_separacion'))  , 
						
						"comentarios"  => strtoupper($this->request->getPost('comentarios'))  , 
						"eligio_empleo"  =>  strtoupper($this->request->getPost('empleo')) , 
						"puesto_gustaria"  =>  strtoupper($this->request->getPost('puesto')) , 
						"area_gustaria"  =>  strtoupper($this->request->getPost('area_gustaria')) , 
						"tiempo_ascenso"  =>  strtoupper($this->request->getPost('ascender')) , 
						"reglamento"  =>  $reglamentacion , 
						"razon_ascenso"  => $reglamentacion_ascenso  ,
						"razon_no_reconocimiento" => strtoupper($this->request->getPost('reconomiento')),
						"razon_no_ascenso" => strtoupper($this->request->getPost('razones_ascenso')), 
						"capacitacion"  =>  strtoupper($this->request->getPost('capacitacion')) , 
						"idTipoDisciplina"  =>  $desciplina , 
						"subtipo_disciplina"  =>  strtoupper($this->request->getPost('subtipo_disciplina')) , 
						"motivo"  => strtoupper($this->request->getPost('motivo'))  , 
						"tipo"  =>  strtoupper($this->request->getPost('tipo')) , 
						"fecha_inicio"  =>  $fecha_inicialDis , 
						"fecha_termino"  => $fecha_finalDis  , 
						"idDuracion"  => $duracion   , 
						"cantidad" => strtoupper($this->request->getPost('cantidad')) , 
						
						"updatedby" => $LoggedUserId , 
						"updateddate" => date("Y-m-d H:i:s") );

					}

					
					$result = $this->modelCuip->updateEmpDiversos( $empDiversos,$idPersonal,$id);

					
					
                    if ($result) {

            			
                    	$succes = ["mensaje" => 'Empleos Diversos editados con exito' ,
                            	   "succes" => "succes"];

                           	   
                    	
                    } else {
                    	$dontSucces = ["error" => "error",
                    				  "mensaje" => 	'Hubo un error al editar los Empleos Diversos'  ];

                    }
				} else {	
					$errors = $this->validator->getErrors();
				}

				
			} else {

				$dontSucces = ["error" => "error",
                    				  "mensaje" => 	'Es necesario que primero capture la sección de datos personales'  ];

			}


			echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);	

		}	
	}


	public function EditarSancionesEstimulos(){
		if ($this->request->getMethod() == "post" && $this->request->getvar(['idSancionesEstim, idPersonal,tipo, determinacion, descripcion, situacion, inicio_inhabilitacion, termino_inhabilitacion, organismo, emisora, entidad_federativaSE, delitos, motivo, no_expediente, agencia_mp, averiguacion_previa, tipo_fuero, averiguacion_estado, inicio_averiguacion, al_dia, juzgado, no_proceso, estado_procesal, inicio_proceso, al_dia_proceso, tipo_estimulo, descripcion_estimulo, dependencia, otrogado_estimulo'],FILTER_SANITIZE_STRING)){

			$errors = [];
			$succes = [];
			$dontSucces = [];
			$data = [];
			$getIdPersonal = $this->request->getPost('idPersonal');



			if(!empty($getIdPersonal)){

				
				$sanciones = $this->request->getPost('sanciones');
				$resoluciones = $this->request->getPost('resoluciones');
				$estimulo = $this->request->getPost('estimulo');

				if( $sanciones == 0 && $resoluciones == 0 && $estimulo == 0){

					if($sanciones == 0){
				
					$rules['tipo'] =  ['label' => "Tipo", 'rules' => 'required|max_length[255]'];
					$rules['determinacion'] =  ['label' => "Determinación", 'rules' => 'required'];
					$rules['descripcion'] =  ['label' => "Descripción", 'rules' => 'required|max_length[255]'];
					$rules['situacion'] =  ['label' => "Situación", 'rules' => 'required|max_length[255]'];
					$rules['inicio_inhabilitacion'] =  ['label' => "Inicio de la inhabilitación", 'rules' => 'required'];
					$rules['termino_inhabilitacion'] =  ['label' => "Término de la inhabilitación", 'rules' => 'required'];
					$rules['organismo'] =  ['label' => "Dependencia u organismo que emite la determinación", 'rules' => 'required|max_length[255]'];

					$rules['tipoB'] =  ['label' => "Tipo", 'rules' => 'required_with[determinacionB,descripcionB,situacionB,inicio_inhabilitacionB,termino_inhabilitacionB,organismoB]|max_length[255]'];
					$rules['determinacionB'] =  ['label' => "Determinación", 'rules' => 'required_with[tipoB,descripcionB,situacionB,inicio_inhabilitacionB,termino_inhabilitacionB,organismoB]'];
					$rules['descripcionB'] =  ['label' => "Descripción", 'rules' => 'required_with[tipoB,determinacionB,situacionB,inicio_inhabilitacionB,termino_inhabilitacionB,organismoB]|max_length[255]'];
					$rules['situacionB'] =  ['label' => "Situación", 'rules' => 'required_with[tipoB,determinacionB,descripcionB,inicio_inhabilitacionB,termino_inhabilitacionB,organismoB]|max_length[255]'];
					$rules['inicio_inhabilitacionB'] =  ['label' => "Inicio de la inhabilitación", 'rules' => 'required_with[tipoB,determinacionB,descripcionB,situacionB,termino_inhabilitacionB,organismoB]'];
					$rules['termino_inhabilitacionB'] =  ['label' => "Término de la inhabilitación", 'rules' => 'required_with[tipoB,determinacionB,descripcionB,situacionB,inicio_inhabilitacionB,organismoB]'];
					$rules['organismoB'] =  ['label' => "Dependencia u organismo que emite la determinación", 'rules' => 'required_with[tipoB,determinacionB,descripcionB,situacionB,inicio_inhabilitacionB,termino_inhabilitacionB]|max_length[255]'];

				}

			if($resoluciones == 0){

				
				
				$rules['emisora'] =  ['label' => "Institución emisora", 'rules' => 'required|max_length[255]'];
				$rules['entidad_federativaSE'] =  ['label' => "Entidad federativa", 'rules' => 'required'];
				$rules['delitos'] =  ['label' => "Delitos", 'rules' => 'required|max_length[255]'];
				$rules['motivo'] =  ['label' => "Motivo", 'rules' => 'required|max_length[255]'];
				$rules['no_expediente'] =  ['label' => "No. Expediente", 'rules' => 'required|max_length[255]'];
				$rules['agencia_mp'] =  ['label' => "Agencia del MP", 'rules' => 'required|max_length[255]'];
				$rules['averiguacion_previa'] =  ['label' => "Averiguación previa", 'rules' => 'required|max_length[255]'];
				$rules['tipo_fuero'] =  ['label' => "Tipo de Fuero", 'rules' => 'required'];
				$rules['averiguacion_estado'] =  ['label' => "Estado de la averiguación previa", 'rules' => 'required|max_length[255]'];
				$rules['inicio_averiguacion'] =  ['label' => "Inicio de la averiguación", 'rules' => 'required'];
				$rules['al_dia'] =  ['label' => "Al día", 'rules' => 'required'];
				$rules['juzgado'] =  ['label' => "Juzgado", 'rules' => 'required|max_length[255]'];
				$rules['no_proceso'] =  ['label' => "No. Proceso", 'rules' => 'required|max_length[255]'];
				$rules['estado_procesal'] =  ['label' => "Estado Procesal", 'rules' => 'required|max_length[255]'];
				$rules['inicio_proceso'] =  ['label' => "Inicio del proceso", 'rules' => 'required'];
				$rules['al_dia_proceso'] =  ['label' => "Al día", 'rules' => 'required'];

				/////

				$rules['emisoraB'] =  ['label' => "Institución emisora", 'rules' => 'required_with[entidad_federativaSEB,delitosB,motivoB,no_expedienteB,agencia_mpB,averiguacion_previaB,tipo_fueroB,averiguacion_estadoB,inicio_averiguacionB,al_diaB,juzgadoB,no_procesoB,estado_procesalB,inicio_procesoB,al_dia_procesoB]|max_length[255]'];
				$rules['entidad_federativaSEB'] =  ['label' => "Entidad federativa", 'rules' => 'required_with[emisoraB,delitosB,motivoB,no_expedienteB,agencia_mpB,averiguacion_previaB,tipo_fueroB,averiguacion_estadoB,inicio_averiguacionB,al_diaB,juzgadoB,no_procesoB,estado_procesalB,inicio_procesoB,al_dia_procesoB]'];
				$rules['delitosB'] =  ['label' => "Delitos", 'rules' => 'required_with[emisoraB,entidad_federativaSEB,motivoB,no_expedienteB,agencia_mpB,averiguacion_previaB,tipo_fueroB,averiguacion_estadoB,inicio_averiguacionB,al_diaB,juzgadoB,no_procesoB,estado_procesalB,inicio_procesoB,al_dia_procesoB]|max_length[255]'];
				$rules['motivoB'] =  ['label' => "Motivo", 'rules' => 'required_with[emisoraB,entidad_federativaSEB,delitosB,no_expedienteB,agencia_mpB,averiguacion_previaB,tipo_fueroB,averiguacion_estadoB,inicio_averiguacionB,al_diaB,juzgadoB,no_procesoB,estado_procesalB,inicio_procesoB,al_dia_procesoB]|max_length[255]'];
				$rules['no_expedienteB'] =  ['label' => "No. Expediente", 'rules' => 'required_with[emisoraB,entidad_federativaSEB,delitosB,motivoB,agencia_mpB,averiguacion_previaB,tipo_fueroB,averiguacion_estadoB,inicio_averiguacionB,al_diaB,juzgadoB,no_procesoB,estado_procesalB,inicio_procesoB,al_dia_procesoB]|max_length[255]'];
				$rules['agencia_mpB'] =  ['label' => "Agencia del MP", 'rules' => 'required_with[emisoraB,entidad_federativaSEB,delitosB,motivoB,no_expedienteB,averiguacion_previaB,tipo_fueroB,averiguacion_estadoB,inicio_averiguacionB,al_diaB,juzgadoB,no_procesoB,estado_procesalB,inicio_procesoB,al_dia_procesoB]|max_length[255]'];
				$rules['averiguacion_previaB'] =  ['label' => "Averiguación previa", 'rules' => 'required_with[emisoraB,entidad_federativaSEB,delitosB,motivoB,no_expedienteB,agencia_mpB,tipo_fueroB,averiguacion_estadoB,inicio_averiguacionB,al_diaB,juzgadoB,no_procesoB,estado_procesalB,inicio_procesoB,al_dia_procesoB]|max_length[255]'];
				$rules['tipo_fueroB'] =  ['label' => "Tipo de Fuero", 'rules' => 'required_with[emisoraB,entidad_federativaSEB,delitosB,motivoB,no_expedienteB,agencia_mpB,averiguacion_previaB,averiguacion_estadoB,inicio_averiguacionB,al_diaB,juzgadoB,no_procesoB,estado_procesalB,inicio_procesoB,al_dia_procesoB]'];
				$rules['averiguacion_estadoB'] =  ['label' => "Estado de la averiguación previa", 'rules' => 'required_with[emisoraB,entidad_federativaSEB,delitosB,motivoB,no_expedienteB,agencia_mpB,averiguacion_previaB,tipo_fueroB,inicio_averiguacionB,al_diaB,juzgadoB,no_procesoB,estado_procesalB,inicio_procesoB,al_dia_procesoB]|max_length[255]'];
				$rules['inicio_averiguacionB'] =  ['label' => "Inicio de la averiguación", 'rules' => 'required_with[emisoraB,entidad_federativaSEB,delitosB,motivoB,no_expedienteB,agencia_mpB,averiguacion_previaB,tipo_fueroB,averiguacion_estadoB,al_diaB,juzgadoB,no_procesoB,estado_procesalB,inicio_procesoB,al_dia_procesoB]'];
				$rules['al_diaB'] =  ['label' => "Al día", 'rules' => 'required_with[emisoraB,entidad_federativaSEB,delitosB,motivoB,no_expedienteB,agencia_mpB,averiguacion_previaB,tipo_fueroB,averiguacion_estadoB,inicio_averiguacionB,juzgadoB,no_procesoB,estado_procesalB,inicio_procesoB,al_dia_procesoB]'];
				$rules['juzgadoB'] =  ['label' => "Juzgado", 'rules' => 'required_with[emisoraB,entidad_federativaSEB,delitosB,motivoB,no_expedienteB,agencia_mpB,averiguacion_previaB,tipo_fueroB,averiguacion_estadoB,inicio_averiguacionB,al_diaB,no_procesoB,estado_procesalB,inicio_procesoB,al_dia_procesoB]|max_length[255]'];
				$rules['no_procesoB'] =  ['label' => "No. Proceso", 'rules' => 'required_with[emisoraB,entidad_federativaSEB,delitosB,motivoB,no_expedienteB,agencia_mpB,averiguacion_previaB,tipo_fueroB,averiguacion_estadoB,inicio_averiguacionB,al_diaB,juzgadoB,estado_procesalB,inicio_procesoB,al_dia_procesoB]|max_length[255]'];
				$rules['estado_procesalB'] =  ['label' => "Estado Procesal", 'rules' => 'required_with[emisoraB,entidad_federativaSEB,delitosB,motivoB,no_expedienteB,agencia_mpB,averiguacion_previaB,tipo_fueroB,averiguacion_estadoB,inicio_averiguacionB,al_diaB,juzgadoB,no_procesoB,inicio_procesoB,al_dia_procesoB]|max_length[255]'];
				$rules['inicio_procesoB'] =  ['label' => "Inicio del proceso", 'rules' => 'required_with[emisoraB,entidad_federativaSEB,delitosB,motivoB,no_expedienteB,agencia_mpB,averiguacion_previaB,tipo_fueroB,averiguacion_estadoB,inicio_averiguacionB,al_diaB,juzgadoB,no_procesoB,estado_procesalB,al_dia_procesoB]'];
				$rules['al_dia_procesoB'] =  ['label' => "Al día", 'rules' => 'required_with[emisoraB,entidad_federativaSEB,delitosB,motivoB,no_expedienteB,agencia_mpB,averiguacion_previaB,tipo_fueroB,averiguacion_estadoB,inicio_averiguacionB,al_diaB,juzgadoB,no_procesoB,estado_procesalB,inicio_procesoB]'];

			} 

			if($estimulo == 0){

				$rules['tipo_estimulo'] =  ['label' => "Tipo", 'rules' => 'required|max_length[255]'];
				$rules['descripcion_estimulo'] =  ['label' => "Descripción", 'rules' => 'required|max_length[255]'];
				$rules['dependencia'] =  ['label' => "Dependencia que otorga", 'rules' => 'required|max_length[255]'];
				$rules['otrogado_estimulo'] =  ['label' => "Otorgado", 'rules' => 'required'];


				$rules['tipo_estimuloB'] =  ['label' => "Tipo", 'rules' => 'required_with[descripcion_estimuloB,dependenciaB,otrogado_estimuloB]|max_length[255]'];
				$rules['descripcion_estimuloB'] =  ['label' => "Descripción", 'rules' => 'required_with[tipo_estimuloB,dependenciaB,otrogado_estimuloB]|max_length[255]'];
				$rules['dependenciaB'] =  ['label' => "Dependencia que otorga", 'rules' => 'required_with[tipo_estimuloB,descripcion_estimuloB,otrogado_estimuloB]|max_length[255]'];
				$rules['otrogado_estimuloB'] =  ['label' => "Otorgado", 'rules' => 'required_with[tipo_estimuloB,descripcion_estimuloB,dependenciaB]'];
				
			}	 
		 
				
				if($this->validate($rules)){
					
					$getUser = session()->get('IdUser');
					$LoggedUserId = $this->encrypter->decrypt($getUser);
					$empresa = session()->get('empresa');
					$idEmpresa = $this->encrypter->decrypt($empresa);
					

        			$idPersonal = $this->encrypt->Decrytp($getIdPersonal);

        			
        			
        			$datosSanciones=[];
        			$datosResoluciones=[];
        			$datosEstimulos=[];
					
				if ($sanciones == 0){	
					$val ="";
					$clockSequence = 16383;
					for ($i = 1; $i <= 2; $i++) {
  						
  						$uuid1 = Uuid::uuid1($clockSequence);
                        $idSan = $uuid1->toString();

  						$getDeterminacion = $this->request->getPost('determinacion'.$val);

        				$determinacion = date( "Y-m-d" ,strtotime($getDeterminacion));

        				$getInicio_inhabilitacion = $this->request->getPost('inicio_inhabilitacion'.$val);

        				$inicio_inhabilitacion = date( "Y-m-d" ,strtotime($getInicio_inhabilitacion));

        				$getTermino_inhabilitacion = $this->request->getPost('termino_inhabilitacion'.$val);

        				$termino_inhabilitacion = date( "Y-m-d" ,strtotime($getTermino_inhabilitacion));

					$datosSanciones[] = array(

						"id" => $idSan ,
						"idPersonal" => $idPersonal , 
						"idEmpresa" => $idEmpresa ,
						"tipo_sancion" =>  strtoupper($this->request->getPost('tipo'.$val)) , 
						"determinacion" =>  $determinacion , 
						"descripcion_sancion" => strtoupper($this->request->getPost('descripcion'.$val))  , 
						"situacion" =>  strtoupper($this->request->getPost('situacion'.$val)) , 
						"inicio_habilitacion" =>  $inicio_inhabilitacion , 
						"termino_habilitacion" => $termino_inhabilitacion  , 
						"dependencia" =>  strtoupper($this->request->getPost('organismo'.$val)) ,
						"activo" => 1 , 
						"createdby" => $LoggedUserId , 
						"createddate" => date("Y-m-d H:i:s"));

						$val ="B";

						$valB =$this->request->getPost('tipoB');

						if (!isset($valB) || empty($valB)){

							$i = 3;
						}
					}
				}

				if ($resoluciones == 0){	
					$val ="";
					$clockSequence = 16383;
					for ($i = 1; $i <= 2; $i++) {
  						
  						$uuid1 = Uuid::uuid1($clockSequence);
                        $idRes = $uuid1->toString();

  						$getInicio_averiguacion = $this->request->getPost('inicio_averiguacion'.$val);

        				$inicio_averiguacion = date( "Y-m-d" ,strtotime($getInicio_averiguacion));

        				$getAl_dia = $this->request->getPost('al_dia'.$val);

        				$al_dia = date( "Y-m-d" ,strtotime($getAl_dia));

        				$getInicio_proceso = $this->request->getPost('inicio_proceso'.$val);

        				$inicio_proceso = date( "Y-m-d" ,strtotime($getInicio_proceso));

        				$getAl_dia_proceso = $this->request->getPost('al_dia_proceso'.$val);

        				$al_dia_proceso = date( "Y-m-d" ,strtotime($getAl_dia_proceso));


        				$getIdTipoFuero = $this->request->getPost('tipo_fuero'.$val);

        				$idTipoFuero = $this->encrypt->Decrytp($getIdTipoFuero);

        				$getIdEstado = $this->request->getPost('entidad_federativaSE'.$val);

        				$idEstado = $this->encrypt->Decrytp($getIdEstado);

						$datosResoluciones[] = array(

							"id" => $idRes ,
							"idPersonal" => $idPersonal , 
							"idEmpresa" => $idEmpresa ,
							"institucion_emisora" =>  strtoupper($this->request->getPost('emisora'.$val)) , 
							"idEstado" =>  $idEstado , 
							"delitos" =>  strtoupper($this->request->getPost('delitos'.$val)) , 
							"motivos" =>  strtoupper($this->request->getPost('motivo'.$val)) , 
							"numero_expediente" =>  strtoupper($this->request->getPost('no_expediente'.$val)) , 
							"agencia_mp" =>  strtoupper($this->request->getPost('agencia_mp'.$val)) , 
							"averiguacion_previa" =>  strtoupper($this->request->getPost('averiguacion_previa'.$val)) , 
							"idTipoFuero" =>  $idTipoFuero , 
							"estado_averiguacion" =>  strtoupper($this->request->getPost('averiguacion_estado'.$val)) , 
							"inicio_averiguacion" =>  $inicio_averiguacion , 
							"aldia_averiguacion" => $al_dia  , 
							"juzgado" =>  strtoupper($this->request->getPost('juzgado'.$val)) , 
							"num_proceso" =>  strtoupper($this->request->getPost('no_proceso'.$val)) , 
							"estado_procesal" => strtoupper($this->request->getPost('estado_procesal'.$val))  , 
							"inicio_proceso" => $inicio_proceso  , 
							"aldia_proceso" =>  $al_dia_proceso ,
							"activo" => 1 , 
							"createdby" => $LoggedUserId , 
							"createddate" => date("Y-m-d H:i:s"));

						$val ="B";

						$valB =$this->request->getPost('emisoraB');

						if (!isset($valB) || empty($valB)){

							$i = 3;
						}
					}
				}


					if ($estimulo == 0){	
						$val ="";
						$clockSequence = 16383;
						for ($i = 1; $i <= 2; $i++){
  						
  							$uuid1 = Uuid::uuid1($clockSequence);
                        	$idEst = $uuid1->toString();

  							$getOtrogado_estimulo = $this->request->getPost('otrogado_estimulo'.$val);

        					$otrogado_estimulo = date( "Y-m-d" ,strtotime($getOtrogado_estimulo));

							$datosEstimulos[] = array(

								"id" => $idEst ,
								"idPersonal" => $idPersonal , 
								"idEmpresa" => $idEmpresa ,
								"tipo_estimulo" => strtoupper($this->request->getPost('tipo_estimulo'.$val))  , 
								"descripcion_estimulo" => strtoupper($this->request->getPost('descripcion_estimulo'.$val))  , 
								"dependencia_otorga" => strtoupper($this->request->getPost('dependencia'.$val))  , 
								"otorgado" =>  $otrogado_estimulo ,
								"activo" => 1 , 
								"createdby" => $LoggedUserId , 
								"createddate" => date("Y-m-d H:i:s"));

								$val ="B";

								$valB =$this->request->getPost('tipo_estimuloB');

								if (!isset($valB) || empty($valB)){

									$i = 3;
								}
						}
				
					}	

					
						$result = $this->modelCuip->updateSancionesEstimulos($datosEstimulos,$datosResoluciones,$datosSanciones,$sanciones,$resoluciones,$estimulo,$idPersonal);

					
					
                    	if ($result) {

            			
                    		$succes = ["mensaje" => 'Sanciones / Estimulos editados con exito' ,
                            	   "succes" => "succes"];

                           	   
                    	
                    	} else {
                    		$dontSucces = ["error" => "error",
                    				  "mensaje" => 	'Hubo un error al editar las Sanciones / Estimulos'  ];

                    	}
					} else {	
						$errors = $this->validator->getErrors();
					}

				} else {

					$dontSucces = ["error" => "error",
                    				  "mensaje" => 	'Ningun dato capturado'  ];	
				}	
					

			} else {

				$dontSucces = ["error" => "error",
                    				  "mensaje" => 	'Es necesario que primero capture la sección de datos personales'  ];

			}

			echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);	
		}	
	}


	public function EditarAltasEmpleados(){
		if ($this->request->getMethod() == "post" && $this->request->getvar(['idAltaEmpleado,idPersonal,fecha_ingreso,asignacionServ,ubicacionRH,sueldoRH,turnoRH,puestoRH,pagoExterno,telEmpresaRH,nominaPeriodo,radioEmpresa,jefeInmediatoRH,bancoRH,cuentaRH,clabeRH,nssRH,pension,infonavit,fonacot,soldi'],FILTER_SANITIZE_STRING)){

			$errors = [];
			$succes = [];
			$dontSucces = [];
			$data = [];
			
			$getIdPersonal = $this->request->getPost('idPersonal');

			
			if(!empty($getIdPersonal)){	

				
					$rules = [
					'idPersonal' =>  ['label' => "", 'rules' => 'required'],
					'idAltaEmpleado' =>  ['label' => "", 'rules' => 'required'],
					'fecha_ingreso' =>  ['label' => "Fecha de Ingreso", 'rules' => 'required|valid_only_date_chek'],
					'asignacionServ' =>  ['label' => "Asignación Servicio", 'rules' => 'required'],
					'ubicacionRH' =>  ['label' => "Ubicación", 'rules' => 'required'],
					'sueldoRH' =>  ['label' => "Sueldo", 'rules' => 'required|max_length[25]'],
					
					'turnoRH' =>  ['label' => "Turno", 'rules' => 'required'],
					'puestoRH' =>  ['label' => "Puesto", 'rules' => 'required'],
					'pagoExterno' =>  ['label' => "Pago Externo", 'rules' => 'required|max_length[25]'],
					'telEmpresaRH' =>  ['label' => "Teléfono Empresa", 'rules' => 'required|max_length[50]'],
					'nominaPeriodo' =>  ['label' => "Periodicidad de la nómina", 'rules' => 'required'],
					'radioEmpresa' =>  ['label' => "Radio Empresa", 'rules' => 'required|max_length[50]'],
					'jefeInmediatoRH' =>  ['label' => "Jefe Inmediato", 'rules' => 'required'],
					'bancoRH' =>  ['label' => "Banco", 'rules' => 'required'],
					'cuentaRH' =>  ['label' => "Cuenta", 'rules' => 'required|max_length[50]'],
					'clabeRH' =>  ['label' => "CLABE", 'rules' => 'required|max_length[30]'],
					'infonavit' =>  ['label' => "Crédito Infonavit", 'rules' => 'required'],
					'nssRH' =>  ['label' => "NSS", 'rules' => 'required|min_length[11]|max_length[11]'],
					'pension' =>  ['label' => "Pensión Alimenticia", 'rules' => 'required'],
					'soldi' =>  ['label' => "SOLDI", 'rules' => 'required'],
					'fonacot' =>  ['label' => "Crédito Fonacot", 'rules' => 'required']];
		 
				



					if($this->validate($rules)){
					
						$getUser = session()->get('IdUser');
						$LoggedUserId = $this->encrypter->decrypt($getUser);
						$empresa = session()->get('empresa');
						$idEmpresa = $this->encrypter->decrypt($empresa);
						$uuid = $this->request->getPost('idAltaEmpleado');
        				$id = $this->encrypt->Decrytp($uuid);

	        			$idPersonal = $this->encrypt->Decrytp($getIdPersonal);
	        			
	        			
	        			$getFechaIngreso = $this->request->getPost('fecha_ingreso');

	        			$fechaIngreso = date( "Y-m-d" ,strtotime($getFechaIngreso));

	        			$getasignacionServ = $this->request->getPost('asignacionServ');

        				$signacionServ = $this->encrypt->Decrytp($getasignacionServ);

        				$getubicacionRH = $this->request->getPost('ubicacionRH');

        				$ubicacionRH = $this->encrypt->Decrytp($getubicacionRH);

        				$getturnoRH = $this->request->getPost('turnoRH');

        				$turnoRH = $this->encrypt->Decrytp($getturnoRH);

        				$getpuestoRH = $this->request->getPost('puestoRH');

        				$puestoRH = $this->encrypt->Decrytp($getpuestoRH);

        				$getjefeInmediatoRH = $this->request->getPost('jefeInmediatoRH');

        				$jefeInmediatoRHj = $this->encrypt->Decrytp($getjefeInmediatoRH);

        				$getbancoRH = $this->request->getPost('bancoRH');



        				$banco = $this->encrypt->Decrytp($getbancoRH);

        				$getinfonavit = $this->request->getPost('infonavit');

        				$infonavit = $this->encrypt->Decrytp($getinfonavit);

        				$getpension = $this->request->getPost('pension');

        				$pension = $this->encrypt->Decrytp($getpension);

        				$getNomimaPeriodo = $this->request->getPost('nominaPeriodo');

        				$NomimaPeriodo = $this->encrypt->Decrytp($getNomimaPeriodo);

	        			$date = date('y') ;
	        			$consecutivo = $this->modelCuip->consecutivo();
	        			$fecNac = $this->modelCuip->fecNac($idPersonal);

	        			$fechaNacimiento = date('y',strtotime($fecNac->fecha));

	        			$numEmpleado = $date.$consecutivo->con.$fechaNacimiento;

	        			$getfonacot = $this->request->getPost('fonacot');

        				$fonacot = $this->encrypt->Decrytp($getfonacot);

        				$getsoldi = $this->request->getPost('soldi');

        				$soldi = $this->encrypt->Decrytp($getsoldi);

	        			

						$altaEmpleado = array(
			    					
			    					
							 
							"fecha_ingreso" =>  $fechaIngreso , 
							"idCliente" => $signacionServ   ,
							"idUbicacion" => $ubicacionRH  , 
							"sueldo" => $this->request->getPost('sueldoRH')  , 
							"idTurno" =>  $turnoRH , 
							"idPuesto" =>  $puestoRH , 
							"pagoExterno" => $this->request->getPost('pagoExterno')  , 
							"telefonoEmpresa" => $this->request->getPost('telEmpresaRH')  , 
							"idNomimaPeriodo" =>  $NomimaPeriodo , 
							"radioEmpresa" =>  $this->request->getPost('radioEmpresa') , 
							"idJefeInmediato" => $jefeInmediatoRHj  , 
							"idBanco" =>  $banco , 
							"cuentaBanco" => $this->request->getPost('cuentaRH')  , 
							"CLABE" =>  $this->request->getPost('clabeRH') , 
							"nss" => $this->request->getPost('nssRH')  , 
							"infonavit" =>  $infonavit , 
							"pension" =>  $pension ,
							"fonacot" =>  $fonacot ,
							"soldi" =>  $soldi ,
							"createdby" => $LoggedUserId , 
							"createddate" => date("Y-m-d H:i:s") );
						 
						$result = $this->modelCuip->updateAltaEmpleado($altaEmpleado,$_POST['pTableDataEquipo'],$_POST['pTableDataUniforme'],$idPersonal,$id);

					
                    	if ($result) {

            			
                    		$succes = ["mensaje" => 'Información del empleado editada con éxito' ,
                            	   "succes" => "succes"];

                           	   
                    	
                    	} else {
                    	$dontSucces = ["error" => "error",
                    				  "mensaje" => 	'Hubo un error al editar la información del Empleado'  ];

                    	}
					} else {	
						$errors = $this->validator->getErrors();
					}
					
				
				

			} else {

				$dontSucces = ["error" => "error",
                    				  "mensaje" => 	'Es necesario que primero capture la sección de datos personales'  ];
			}

			echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);	
		}	
	}


	public function EditarCapacitaciones(){
		if ($this->request->getMethod() == "post" && $this->request->getvar(['idPersonal,dependencia, institucion, nombre_curso, tema_curso, nivel_curso, eficienciaCursos, inicio, conclusion, duracion, comprobante, empresa, curso, tipo_curso, cuso_tomado, eficiencia, inicioAdicional, conclusionAdicional, duracion_horas, idioma, lectura, escritura, conversacion, tipo_habilidad, nombre, tipoAgrupa, especificacion, grado_habilidad, desde, hasta'],FILTER_SANITIZE_STRING)){

			$errors = [];
			$succes = [];
			$dontSucces = [];
			$data = [];
			$getIdPersonal = $this->request->getPost('idPersonal');

			if(!empty($getIdPersonal)){

				$publica = $this->request->getPost('publica');
				$capacitacion = $this->request->getPost('capacitacion');
				$valIdioma = $this->request->getPost('valIdioma');
				$habilidad = $this->request->getPost('habilidad');
				$afiliacion = $this->request->getPost('afiliacion');

				if($publica == 0 && $capacitacion == 0 && $valIdioma == 0 && $habilidad == 0 && $afiliacion == 0 ){

					if($capacitacion == 0){
				
						$rules['dependencia'] =  ['label' => "Dependencia responsable", 'rules' => 'required|max_length[255]'];
						$rules['institucion'] =  ['label' => "Institución Capacitadora", 'rules' => 'required|max_length[255]'];
						$rules['nombre_curso'] =  ['label' => "Nombre del curso", 'rules' => 'required|max_length[255]'];
						$rules['tema_curso'] =  ['label' => "Tema del curso", 'rules' => 'required|max_length[255]'];
						$rules['nivel_curso'] =  ['label' => "Nivel del curso recibido", 'rules' => 'required'];
						$rules['eficienciaCursos'] =  ['label' => "Eficiencia terminal", 'rules' => 'required'];
						$rules['inicio'] =  ['label' => "Inicio", 'rules' => 'required'];
						$rules['conclusion'] =  ['label' => "Conclusión", 'rules' => 'required'];
						$rules['duracion'] =  ['label' => "Duración en horas", 'rules' => 'required|max_length[255]'];
						$rules['comprobante'] =  ['label' => "Tipo de comprobante", 'rules' => 'required|max_length[255]'];

						////

						$rules['dependenciaB'] =  ['label' => "Dependencia responsable", 'rules' => 'required_with[institucionB,nombre_cursoB,tema_cursoB,nivel_cursoB,eficienciaCursosB,inicioB,conclusionB,duracionB,comprobanteB]|max_length[255]'];
						$rules['institucionB'] =  ['label' => "Institución Capacitadora", 'rules' => 'required_with[dependenciaB,nombre_cursoB,tema_cursoB,nivel_cursoB,eficienciaCursosB,inicioB,conclusionB,duracionB,comprobanteB]|max_length[255]'];
						$rules['nombre_cursoB'] =  ['label' => "Nombre del curso", 'rules' => 'required_with[dependenciaB,institucionB,tema_cursoB,nivel_cursoB,eficienciaCursosB,inicioB,conclusionB,duracionB,comprobanteB]|max_length[255]'];
						$rules['tema_cursoB'] =  ['label' => "Tema del curso", 'rules' => 'required_with[dependenciaB,institucionB,nombre_cursoB,nivel_cursoB,eficienciaCursosB,inicioB,conclusionB,duracionB,comprobanteB]|max_length[255]'];
						$rules['nivel_cursoB'] =  ['label' => "Nivel del curso recibido", 'rules' => 'required_with[dependenciaB,institucionB,nombre_cursoB,tema_cursoB,eficienciaCursosB,inicioB,conclusionB,duracionB,comprobanteB]'];
						$rules['eficienciaCursosB'] =  ['label' => "Eficiencia terminal", 'rules' => 'required_with[dependenciaB,institucionB,nombre_cursoB,tema_cursoB,nivel_cursoB,inicioB,conclusionB,duracionB,comprobanteB]'];
						$rules['inicioB'] =  ['label' => "Inicio", 'rules' => 'required_with[dependenciaB,institucionB,nombre_cursoB,tema_cursoB,nivel_cursoB,eficienciaCursosB,conclusionB,duracionB,comprobanteB]'];
						$rules['conclusionB'] =  ['label' => "Conclusión", 'rules' => 'required_with[dependenciaB,institucionB,nombre_cursoB,tema_cursoB,nivel_cursoB,eficienciaCursosB,inicioB,duracionB,comprobanteB]'];
						$rules['duracionB'] =  ['label' => "Duración en horas", 'rules' => 'required_with[dependenciaB,institucionB,nombre_cursoB,tema_cursoB,nivel_cursoB,eficienciaCursosB,inicioB,conclusionB,comprobanteB]|max_length[255]'];
						$rules['comprobanteB'] =  ['label' => "Tipo de comprobante", 'rules' => 'required_with[dependenciaB,institucionB,nombre_cursoB,tema_cursoB,nivel_cursoB,eficienciaCursosB,inicioB,conclusionB,duracionB]|max_length[255]'];

					} 

					if($publica == 0){
					
						$rules['empresa'] =  ['label' => "Insitutción o Empresa", 'rules' => 'required|max_length[255]'];
						$rules['curso'] =  ['label' => "Estudio o Curso", 'rules' => 'required|max_length[255]'];
						$rules['tipo_curso'] =  ['label' => "Tipo de curso", 'rules' => 'required'];
						$rules['cuso_tomado'] =  ['label' => "¿El curso fue?", 'rules' => 'required'];
						$rules['eficiencia'] =  ['label' => "Eficiencia terminal", 'rules' => 'required'];
						$rules['inicioAdicional'] =  ['label' => "Inicio", 'rules' => 'required'];
						$rules['conclusionAdicional'] =  ['label' => "Conclusión", 'rules' => 'required'];
						$rules['duracion_horas'] =  ['label' => "Duración en horas", 'rules' => 'required|integer'];

						////

						$rules['empresaB'] =  ['label' => "Insitutción o Empresa", 'rules' => 'required_with[cursoB,tipo_cursoB,cuso_tomadoB,eficienciaB,inicioAdicionalB,conclusionAdicionalB,duracion_horasB]|max_length[255]'];
						$rules['cursoB'] =  ['label' => "Estudio o Curso", 'rules' => 'required_with[empresaB,tipo_cursoB,cuso_tomadoB,eficienciaB,inicioAdicionalB,conclusionAdicionalB,duracion_horasB]|max_length[255]'];
						$rules['tipo_cursoB'] =  ['label' => "Tipo de curso", 'rules' => 'required_with[empresaB,cursoB,cuso_tomadoB,eficienciaB,inicioAdicionalB,conclusionAdicionalB,duracion_horasB]'];
						$rules['cuso_tomadoB'] =  ['label' => "¿El curso fue?", 'rules' => 'required_with[empresaB,cursoB,tipo_cursoB,eficienciaB,inicioAdicionalB,conclusionAdicionalB,duracion_horasB]'];
						$rules['eficienciaB'] =  ['label' => "Eficiencia terminal", 'rules' => 'required_with[empresaB,cursoB,tipo_cursoB,cuso_tomadoB,inicioAdicionalB,conclusionAdicionalB,duracion_horasB]'];
						$rules['inicioAdicionalB'] =  ['label' => "Inicio", 'rules' => 'required_with[empresaB,cursoB,tipo_cursoB,cuso_tomadoB,eficienciaB,conclusionAdicionalB,duracion_horasB]'];

						$rules['duracion_horasB'] = ['label' => "Duración en horas", 'rules' => 'required_with[empresaB,cursoB,tipo_cursoB,cuso_tomadoB,eficienciaB,inicioAdicionalB,conclusionAdicionalB]'];

						$rules['conclusionAdicionalB'] =  ['label' => "Conclusión", 'rules' => 'required_with[empresaB,cursoB,tipo_cursoB,cuso_tomadoB,eficienciaB,inicioAdicionalB,duracion_horasB]'];
						

					} 

					if($valIdioma == 0){
					
						$rules['idioma'] =  ['label' => "Lectura", 'rules' => 'required'];
						$rules['escritura'] =  ['label' => "Escritura", 'rules' => 'required'];
						$rules['lectura'] =  ['label' => "Lectura", 'rules' => 'required'];
						$rules['conversacion'] =  ['label' => "Conversación", 'rules' => 'required'];

						////

						$rules['idiomaB'] =  ['label' => "Lectura", 'rules' => 'required_with[escrituraB,lecturaB,conversacionB]'];
						$rules['escrituraB'] =  ['label' => "Escritura", 'rules' => 'required_with[idiomaB,lecturaB,conversacionB]'];
						$rules['lecturaB'] =  ['label' => "Lectura", 'rules' => 'required_with[idiomaB,escrituraB,conversacionB]'];
						$rules['conversacionB'] =  ['label' => "Conversación", 'rules' => 'required_with[idiomaB,escrituraB,lecturaB]'];

					}

					if($habilidad == 0){
					
						$rules['tipo_habilidad'] =  ['label' => "Tipo", 'rules' => 'required'];
						$rules['especificacion'] =  ['label' => "Especifique", 'rules' => 'required|max_length[255]'];
						$rules['grado_habilidadCap'] =  ['label' => "Grado de aptitude o dominio", 'rules' => 'required'];

						///

						$rules['tipo_habilidadB'] =  ['label' => "Tipo", 'rules' => 'required_with[especificacionB,grado_habilidadCapB]'];
						$rules['especificacionB'] =  ['label' => "Especifique", 'rules' => 'required_with[tipo_habilidadB,grado_habilidadCapB]|max_length[255]'];
						$rules['grado_habilidadCapB'] =  ['label' => "Grado de aptitude o dominio", 'rules' => 'required_with[tipo_habilidadB,especificacionB]'];

					}

					if($afiliacion == 0){
					
						$rules['nombre'] =  ['label' => "Nombre", 'rules' => 'required'];
						$rules['tipoAgrupa'] =  ['label' => "Tipo", 'rules' => 'required'];
					
						$rules['desde'] =  ['label' => "Desde", 'rules' => 'required'];
						$rules['hasta'] =  ['label' => "Hasta", 'rules' => 'required'];


						///


						$rules['nombreB'] =  ['label' => "Nombre", 'rules' => 'required_with[tipoAgrupaB,desdeB,hastaB]'];
						$rules['tipoAgrupaB'] =  ['label' => "Tipo", 'rules' => 'required_with[nombreB,desdeB,hastaB]'];
					
						$rules['desdeB'] =  ['label' => "Desde", 'rules' => 'required_with[nombreB,tipoAgrupaB,hastaB]'];
						$rules['hastaB'] =  ['label' => "Hasta", 'rules' => 'required_with[nombreB,tipoAgrupaB,desdeB]'];

					}


					
				if($this->validate($rules)){
					
					$getUser = session()->get('IdUser');
					$LoggedUserId = $this->encrypter->decrypt($getUser);
					$empresa = session()->get('empresa');
					$idEmpresa = $this->encrypter->decrypt($empresa);
					
        			
        			$idPersonal = $this->encrypt->Decrytp($getIdPersonal);

        			
        			$datosPublica=[];
        			$datosCapacitacion=[];
        			$datosIdioma=[];
        			$datosHabilidad=[];
        			$datosAfiliacion=[];


        			if ($capacitacion == 0){	
						$val ="";
						$clockSequence = 16383;
						for ($i = 1; $i <= 2; $i++) {
  							
  							
  						
  							$uuid1 = Uuid::uuid1($clockSequence);
                        	$idCap = $uuid1->toString();

  							$getInicioAdicional = $this->request->getPost('inicioAdicional'.$val);

        					$inicioAdicional = date( "Y-m-d" ,strtotime($getInicioAdicional));

        					$getConclusionAdicional = $this->request->getPost('conclusionAdicional'.$val);

        					$conclusionAdicional = date( "Y-m-d" ,strtotime($getConclusionAdicional));

        					$getCuso_tomado = $this->request->getPost('cuso_tomado'.$val);

        					$cuso_tomado = $this->encrypt->Decrytp($getCuso_tomado);

        					$getEficiencia = $this->request->getPost('eficiencia'.$val);

        					$eficiencia = $this->encrypt->Decrytp($getEficiencia);

							$datosCapacitacion[] = array(

								"id" => $idCap ,
								"idPersonal" => $idPersonal , 
								"idEmpresa" => $idEmpresa ,
								"institucion"  => strtoupper($this->request->getPost('empresa'))  , 
								"curso"  =>  strtoupper($this->request->getPost('curso'.$val)) , 
								"tipo_curso"  =>  strtoupper($this->request->getPost('tipo_curso'.$val)) , 
								"idCursoFue"  => $cuso_tomado  , 
								"idEficienciaAdicional"  => $eficiencia  , 
								"inicio_adicional"  =>  $inicioAdicional , 
								"conclusion_adicional"  =>  $conclusionAdicional , 
								"duracion_horas_adicional"  => $this->request->getPost('duracion_horas'.$val)  , 
								"activo" => 1 , 
								"createdby" => $LoggedUserId , 
								"createddate" => date("Y-m-d H:i:s"));

							$val ="B";

							$valB =$this->request->getPost('empresaB');

							if (!isset($valB) || empty($valB)){

								$i = 3;
							}
  							
						}
					} 

					if ($publica == 0){

						$val ="";
						$clockSequence = 16383;
						for ($i = 1; $i <= 2; $i++) {

							$uuid1 = Uuid::uuid1($clockSequence);
                        	$idPubli = $uuid1->toString();

  							$getInicio = $this->request->getPost('inicio'.$val);

        					$inicio = date( "Y-m-d" ,strtotime($getInicio));

        					$getConclusion = $this->request->getPost('conclusion'.$val);

        					$conclusion = date( "Y-m-d" ,strtotime($getConclusion));

        					$getNivel_curso = $this->request->getPost('nivel_curso'.$val);

        					$nivel_curso = $this->encrypt->Decrytp($getNivel_curso);

        					$getEficienciaCursos = $this->request->getPost('eficienciaCursos'.$val);

        					$eficienciaCursos = $this->encrypt->Decrytp($getEficienciaCursos);

							$datosPublica[] = array(

								"id" => $idPubli ,
								"idPersonal" => $idPersonal , 
								"idEmpresa" => $idEmpresa ,
								"dependencia"  =>  strtoupper($this->request->getPost('dependencia'.$val)) , 
								"inst_capacitadora"  =>  strtoupper($this->request->getPost('institucion'.$val)) , 
								"nombre_curso"  =>  strtoupper($this->request->getPost('nombre_curso'.$val)) , 
								"tema_curso"  =>  strtoupper($this->request->getPost('tema_curso'.$val)) , 
								"idNivel_curso"  =>  $nivel_curso , 
								"idEficienciaCurso"  =>  $eficienciaCursos , 
								"inicio_curso"  =>  $inicio , 
								"conclusion_curso"  => $conclusion  , 
								"duracion_horas_curso"  =>  $this->request->getPost('duracion'.$val) , 
								"tipo_comprobante"  =>  strtoupper($this->request->getPost('comprobante'.$val)) ,
								"activo" => 1 , 
								"createdby" => $LoggedUserId , 
								"createddate" => date("Y-m-d H:i:s"));

							$val ="B";

							$valB =$this->request->getPost('dependenciaB');

							if (!isset($valB) || empty($valB)){

								$i = 3;
							}	
						
						}
					}

					if ($valIdioma == 0){	
						$val ="";
						$clockSequence = 16383;
						for ($i = 1; $i <= 2; $i++) {
  						
  							$uuid1 = Uuid::uuid1($clockSequence);
                        	$idIdioma = $uuid1->toString();

  							$getIdioma = $this->request->getPost('idioma'.$val);

		        			$idioma = $this->encrypt->Decrytp($getIdioma);

		        			$getLectura = $this->request->getPost('lectura'.$val);

		        			$lectura = $this->encrypt->Decrytp($getLectura);

		        			$getEscritura = $this->request->getPost('escritura'.$val);

		        			$escritura = $this->encrypt->Decrytp($getEscritura);

		        			$getConversacion = $this->request->getPost('conversacion'.$val);

		        			$conversacion = $this->encrypt->Decrytp($getConversacion);

							$datosIdioma[] = array(

								"id" => $idIdioma ,
								"idPersonal" => $idPersonal , 
								"idEmpresa" => $idEmpresa ,
								"idIdioma"  =>  $idioma , 
								"idIdiomaLectura"  => $lectura  , 
								"idIdiomaEscritura"  =>  $escritura , 
								"idIdiomaConversacion"  => $conversacion  ,
								"activo" => 1 , 
								"createdby" => $LoggedUserId , 
								"createddate" => date("Y-m-d H:i:s"));

							$val ="B";

							$valB =$this->request->getPost('idiomaB');

							if (!isset($valB) || empty($valB)){

								$i = 3;
							}
						}
					} 

					if ($habilidad == 0){	
						$val ="";
						$clockSequence = 16383;
						for ($i = 1; $i <= 2; $i++) {
  						
  							$uuid1 = Uuid::uuid1($clockSequence);
                        	$idHab = $uuid1->toString();

  							$getTipo_habilidad = $this->request->getPost('tipo_habilidad'.$val);

        					$tipo_habilidad = $this->encrypt->Decrytp($getTipo_habilidad);

        					$getGrado_habilidadCap = $this->request->getPost('grado_habilidadCap'.$val);

        					$grado_habilidadCap = $this->encrypt->Decrytp($getGrado_habilidadCap);

							$datosHabilidad[] = array(

								"id" => $idHab ,
								"idPersonal" => $idPersonal , 
								"idEmpresa" => $idEmpresa ,
								"idTipoHabilidad"  =>  $tipo_habilidad , 
								"especifique_habilidad"  =>  strtoupper($this->request->getPost('especificacion'.$val)) , 
								"idGradoHabilidad"  => $grado_habilidadCap  ,	
								"activo" => 1 , 
								"createdby" => $LoggedUserId , 
								"createddate" => date("Y-m-d H:i:s"));

							$val ="B";

							$valB =$this->request->getPost('tipo_habilidadB');

							if (!isset($valB) || empty($valB)){

								$i = 3;
							}
						}
					} 

					if ($afiliacion == 0){	
						$val ="";
						$clockSequence = 16383;
						for ($i = 1; $i <= 2; $i++) {
  						
  							$uuid1 = Uuid::uuid1($clockSequence);
                        	$idAfil = $uuid1->toString();

  							$getDesde = $this->request->getPost('desde'.$val);

		        			$desde = date( "Y-m-d" ,strtotime($getDesde));

		        			$getHasta = $this->request->getPost('hasta'.$val);

		        			$hasta = date( "Y-m-d" ,strtotime($getHasta));

		        			$getTipoAgrupa = $this->request->getPost('tipoAgrupa'.$val);

		        			$tipoAgrupa = $this->encrypt->Decrytp($getTipoAgrupa);

							$datosAfiliacion[] = array(

								"id" => $idAfil ,
								"idPersonal" => $idPersonal , 
								"idEmpresa" => $idEmpresa ,
								"nombre_agrupacion"  =>  strtoupper($this->request->getPost('nombre'.$val)) , 
								"idTipoAgrupacion"  =>  $tipoAgrupa , 
						 
								"desde"  =>  $desde , 
								"hasta"  => $hasta ,
								"activo" => 1 , 
								"createdby" => $LoggedUserId , 
								"createddate" => date("Y-m-d H:i:s"));

							$val ="B";

							$valB =$this->request->getPost('nombreB');

							if (!isset($valB) || empty($valB)){

								$i = 3;
							}
						}
					} 

        			

					$result = $this->modelCuip->updateCapacitaciones( $datosPublica,$datosCapacitacion,$datosIdioma,$datosHabilidad,$datosAfiliacion,$publica,$capacitacion,$valIdioma,$habilidad,$afiliacion,$idPersonal);

					
					
                    if ($result) {

            			
                    	$succes = ["mensaje" => 'Capacitaciones editadas con exito' ,
                            	   "succes" => "succes"];

                           	   
                    	
                    } else {
                    	$dontSucces = ["error" => "error",
                    				  "mensaje" => 	'Hubo un error al editar las Capacitaciones'  ];

                    }
				} else {	
					$errors = $this->validator->getErrors();
				}

			} else {

					$dontSucces = ["error" => "error",
                    				  "mensaje" => 	'Ningun dato capturado'  ];	
				}	

			} else {

				$dontSucces = ["error" => "error",
                    				  "mensaje" => 	'Es necesario que primero capture la sección de datos personales'  ];

			}

			echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);	
		}	
	}

}