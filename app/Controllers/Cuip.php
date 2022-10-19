<?php namespace App\Controllers;

use App\Models\CuipModel;
use App\Libraries\Menu;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;

class Cuip extends BaseController { 

    private $encrypter;
	private $menu;
	private $encrypt;
	private $db;
	private $modelCuip;
    public function __construct()
	{
		$this->menu = new Menu();
		$this->encrypt = new Encrypt();
		$this->encrypter = \Config\Services::encrypter();
        $this->db =  \Config\Database::connect('default');
		$this->modelCuip = new CuipModel($this->db);
		
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
					'nCuip' => '' ,
					'primer_nombre' => $v->primer_nombre,
					'segundo_nombre' => $v->segundo_nombre,
                    'apellido_paterno' => $v->apellido_paterno,
                    'apellido_materno' => $v->apellido_materno
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

			$data['entidad_federativa'] = $getEstados;
			////////////////////////////////////////////////


			$parentesco_familiar = $this->modelCuip->GetCatalogoCuip('e608d93e-8d57-4378-a867-1a98dfb538be');
			
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
			

			return view('Cuip/RegistroCUIP', $data);	
			}
	}



	public function AgregarPersonales(){
		if ($this->request->getMethod() == "post" && $this->request->getvar(['primerNombre, segundoNombre, apellidoPaterno, apellidoMaterno, fecha_nacimiento, sexo, rfc, claveE, cartilla, licencia, vigenciaLic, CURP, pasaporte, modo_nacionalidad, fecha_naturalizacion, pais_nacimiento, entidad_nacimiento, nacionalidad, municipio_nacimiento, cuidad_nacimiento, estado_civil, desarrollo_academico, escuela, especialidad, cedula, anno_inicio, anno_termino, registroSep, certificado, promedio, calle, exterior, interior, numeroTelefono, entrecalle, ylacalle, codigo, coloniacodigo, estadocodigo, municipiocodigo, ciudadcodigo, nombrecurso, nombreInstitucion, fecha_inicial, fecha_final, certificado'],FILTER_SANITIZE_STRING)){

				$rules = [
				'primerNombre' =>  ['label' => "Valor", 'rules' => 'required|max_length[255]']];
		 
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

        			$getModo_nacionalidad = $this->request->getPost('modo_nacionalidad');

        			$modo_nacionalidad = $this->encrypt->Decrytp($getModo_nacionalidad);
					
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

        			$getFecha_naturalizacion = $this->request->getPost('fecha_naturalizacion');

        			$fecha_naturalizacion = date( "Y-m-d" ,strtotime($getFecha_naturalizacion));

        			$getVigenciaLic = $this->request->getPost('vigenciaLic');

        			$vigenciaLic = date( "Y-m-d" ,strtotime($getVigenciaLic));


        			$getFecha_final = $this->request->getPost('fecha_final');

        			$fecha_final = date( "Y-m-d" ,strtotime($getFecha_final));

        			$getFecha_inicial = $this->request->getPost('fecha_inicial');

        			$fecha_inicial = date( "Y-m-d" ,strtotime($getFecha_inicial));




					$datosPersonales = array(
		    					
		    					
						"id" => $id ,
						"idEmpresa" => $idEmpresa , 
						"primer_nombre" => $this->request->getPost('primerNombre') , 
						"segundo_nombre" => $this->request->getPost('segundoNombre') , 
						"apellido_paterno" => $this->request->getPost('apellidoPaterno') , 
						"apellido_materno" => $this->request->getPost('apellidoMaterno') , 
						"fecha_nacimiento" => $fecha_nacimiento , 
						"idGenero" => $getGenero , 
						"rfc" => $this->request->getPost('rfc') , 
						"clave_electoral" => $this->request->getPost('claveE') , 
						"cartilla_smn" => $this->request->getPost('cartilla') , 
						"licencia_conducir" => $this->request->getPost('licencia') , 
						"vigencia_licencia" => $vigenciaLic , 
						"curp" => $this->request->getPost('CURP') , 
						"pasaporte" => $this->request->getPost('pasaporte') , 
						"idFormaNacionalidad" =>  $modo_nacionalidad , 
						"fecha_naturalizacion" => $fecha_naturalizacion , 
						"idPaisNacimiento" => $pais_nacimiento , 
						"idEntidadNacimiento" => $this->request->getPost('entidad_nacimiento') , 
						"idMunicipioNacimiento" => $this->request->getPost('municipio_nacimiento') , 
						"idCiudadNacimiento" => $this->request->getPost('cuidad_nacimiento') , 
						"idNacionalidad" => $nacionalidad , 
						"idEstadoCivil" => $estado_civil , 
						"idNivelEducativo" => $desarrollo_academico , 
						"escuela" => $this->request->getPost('escuela') , 
						"especialidad" => $this->request->getPost('especialidad') , 
						"cedula_profesional" => $this->request->getPost('cedula') , 
						"año_inicio" => $this->request->getPost('anno_inicio') , 
						"año_termino" => $this->request->getPost('anno_termino') , 
						"registro_sep" => $registroSep , 
						"folio_certificado" => $this->request->getPost('certificado') , 
						"calle" => $this->request->getPost('calle') , 
						"numero_exterior" => $this->request->getPost('exterior') , 
						"numero_interior" => $this->request->getPost('interior') , 
						"colonia" => $this->request->getPost('coloniacodigo') , 
						"entre_calle1" => $this->request->getPost('entrecalle') , 
						"entre_calle2" => $this->request->getPost('ylacalle') , 
						"idCodigoPostal" => $this->request->getPost('codigo') , 
						"numero_telefono" => $this->request->getPost('numeroTelefono') , 
						"idEstado" => $this->request->getPost('estadocodigo') , 
						"municipio" => $this->request->getPost('municipiocodigo') , 
						"ciudad" => $this->request->getPost('ciudadcodigo') , 
						"nombre_curso" => $this->request->getPost('nombrecurso') , 
						"nombre_institucion" => $this->request->getPost('nombreInstitucion') , 
						"fecha_inicio" => $fecha_inicial , 
						"fecha_termino" => $fecha_final , 
						"certificado_por" => $this->request->getPost('certificado') , 
						"activo" => 1 , 
						"createdby" => $LoggedUserId , 
						"createddate" => date("Y-m-d H:i:s") );


					$result = $this->modelCuip->insertDatosPersonales( $datosPersonales);

					
					
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
					

					$estado = $this->request->getPost('estado');
					
					$getMunicipios = $this->modelCuip->getMunicipios($estado);

					$getCiudades = $this->modelCuip->getCiudades($estado);

                    if ($getMunicipios && $getCiudades) {

                    	$municipio = '<option value="">Selecciona una Opcion</option>';
                    	foreach ( $getMunicipios as $v){
				
							
							$municipio.=  '<option value="'.$v->municipio.'">'.$v->municipio.'</option>';
						
						}

						$ciudad = '<option value="">Selecciona una Opcion</option>';
                    	foreach ( $getCiudades as $v){
				
							
							$ciudad.=  '<option value="'.$v->ciudad.'">'.$v->ciudad.'</option>';
						
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
		if ($this->request->getMethod() == "post" && $this->request->getvar(['familia, ingreso, domicilio_tipo, actividad, especificacion, inversion, vehiculo, calidad, vicio, imagen, comportamiento, calle, apellidoMaterno, primerNombre, nombre, fecha_nacimiento_dep, sexo_dep, parentesco_familiar'],FILTER_SANITIZE_STRING)){

				$rules = [
				'ingreso' =>  ['label' => "Ingreso familiar adicional (Mensual)", 'rules' => 'required|max_length[255]']];
		 
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

        			$getSexo_dep = $this->request->getPost('sexo_dep');

        			$sexo_dep = $this->encrypt->Decrytp($getSexo_dep);

        			$getFamilia = $this->request->getPost('familia');

        			$familia = $this->encrypt->Decrytp($getFamilia);
					
					$getDomicilio_tipo = $this->request->getPost('domicilio_tipo');

        			$domicilio_tipo = $this->encrypt->Decrytp($getDomicilio_tipo);

        			$getParentesco_familiar = $this->request->getPost('parentesco_familiar');

        			$parentesco_familiar = $this->encrypt->Decrytp($getParentesco_familiar);

        			$getIdPersonal = $this->request->getPost('idPersonal');

        			$idPersonal = $this->encrypt->Decrytp($getIdPersonal);

        			$getFecha_nacimiento_dep = $this->request->getPost('fecha_nacimiento_dep');

        			$fecha_nacimiento_dep = date( "Y-m-d" ,strtotime($getFecha_nacimiento_dep));


					$socioEconomico = array(
		    					
		    					
						"id" => $id  ,
						"idPersonal" => $idPersonal  , 
						"idEmpresa" =>  $idEmpresa , 
						"vive_con_familia" => $familia  , 
						"ingreso_familiar" =>  $this->request->getPost('ingreso') , 
						"idTipoDomicilio" => $domicilio_tipo , 
						"actividades_culturales" =>  $this->request->getPost('actividad') , 
						"especificacion_inmueble" =>  $this->request->getPost('especificacion') , 
						"inversiones" =>  $this->request->getPost('inversion') , 
						"vehiculo" =>  $this->request->getPost('vehiculo') , 
						"calidad_vida" => $this->request->getPost('calidad')  , 
						"vicios" =>  $this->request->getPost('vicio') , 
						"imagen_publica" =>  $this->request->getPost('imagen') , 
						"comportamiento" => $this->request->getPost('comportamiento')  , 
						"apellido_paterno" => $this->request->getPost('apellidoPaterno')  , 
						"apellido_materno" => $this->request->getPost('apellidoMaterno')  , 
						"primer_nombre" => $this->request->getPost('primerNombre')  , 
						"segundo_nombre" => $this->request->getPost('segundoNombre')  , 
						"fecha_nacimiento" => $fecha_nacimiento_dep  , 
						"idGenero" => $sexo_dep  ,
						"idParentesco" =>  $parentesco_familiar ,
						"activo" => 1 , 
						"createdby" => $LoggedUserId , 
						"createddate" => date("Y-m-d H:i:s") );


					$result = $this->modelCuip->insertSocioEconomico( $socioEconomico);

					
					
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

				echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
		}	
	}


	public function AgregarEmpSegPublica(){
		if ($this->request->getMethod() == "post" && $this->request->getvar(['dependencia, corporacion, primerNombre, nombre, calle, exterior, interior, numero, codigoSegPub, coloniacodigoSegPub, aprobacion, separacion, puesto_funcional, funciones, especialidad, rango, numero_placa, numero_empleado, sueldo, compensaciones, area, division, jefe_inmediato, nombre_jefe, estadocodigoSegPub, municipiocodigoSegPub, motivo_separacion, tipo_separacion, tipo_baja, comentarios'],FILTER_SANITIZE_STRING)){

				$rules = [
				'dependencia' =>  ['label' => "Dependencia", 'rules' => 'required|max_length[255]']];
		 
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

        			$getIngresoEmpPublic = $this->request->getPost('ingresoEmpPublic');

        			$ingresoEmpPublic = date( "Y-m-d" ,strtotime($getIngresoEmpPublic));

					$empleosSeguridad = array(
		    					
		    					
						"id" => $id  ,
						"idPersonal" => $idPersonal  , 
						"idEmpresa" =>  $idEmpresa , 
						"dependencia" =>  $this->request->getPost('dependencia') , 
						"corporacion" =>  $this->request->getPost('corporacion') , 
						"primer_nombre" =>  $this->request->getPost('primerNombre') , 
						"segundo_nombre" =>  $this->request->getPost('segundoNombre') , 
						"calle" =>  $this->request->getPost('calle') , 
						"numero_exterior" => $this->request->getPost('exterior')  , 
						"numero_interior" => $this->request->getPost('interior')  , 
						"colonia" =>  $this->request->getPost('coloniacodigoSegPub') , 
						"idCodigoPostal" => $this->request->getPost('codigoSegPub')  , 
						"numero_telefono" => $this->request->getPost('numero')  , 
						"ingreso" =>  $ingresoEmpPublic , 
						"separacion" =>  $this->request->getPost('separacion') , 
						"idPuestoFuncional" =>  $this->request->getPost('puesto_funcional') , 
						"funciones" => $this->request->getPost('funciones')  , 
						"especialidad" => $this->request->getPost('especialidad')  , 
						"rango" =>  $this->request->getPost('rango') , 
						"numero_placa" => $this->request->getPost('numero_placa')  , 
						"numero_empleado" => $this->request->getPost('numero_empleado')  , 
						"sueldo_base" => $this->request->getPost('sueldo')  , 
						"compensacion" =>  $this->request->getPost('compensaciones') , 
						"area" =>  $this->request->getPost('area') , 
						"division" =>  $this->request->getPost('division') , 
						"cuip_jefe" =>  $this->request->getPost('jefe_inmediato') , 
						"nombre_jefe" =>  $this->request->getPost('nombre_jefe') , 
						"idEstado" =>  $this->request->getPost('estadocodigoSegPub') , 
						"municipio" => $this->request->getPost('municipiocodigoSegPub')  , 
						"idMotivoSeparacion" =>  $this->request->getPost('motivo_separacion') , 
						"tipo_separacion" => $this->request->getPost('tipo_separacion')  , 
						"tipo_baja" =>  $this->request->getPost('tipo_baja') , 
						"comentarios" => $this->request->getPost('comentarios') , 
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

				echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
		}	
	}


	public function AgregarSancionesEstimulos(){
		if ($this->request->getMethod() == "post" && $this->request->getvar(['tipo, determinacion, descripcion, situacion, inicio_inhabilitacion, termino_inhabilitacion, organismo, emisora, entidad_federativaSE, delitos, motivo, no_expediente, agencia_mp, averiguacion_previa, tipo_fuero, averiguacion_estado, inicio_averiguacion, al_dia, juzgado, no_proceso, estado_procesal, inicio_proceso, al_dia_proceso, tipo_estimulo, descripcion_estimulo, dependencia, otrogado_estimulo'],FILTER_SANITIZE_STRING)){

				$rules = [
				'tipo' =>  ['label' => "Tipo", 'rules' => 'required|max_length[255]']];
		 
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

        			$getDeterminacion = $this->request->getPost('determinacion');

        			$determinacion = date( "Y-m-d" ,strtotime($getDeterminacion));

        			$getInicio_inhabilitacion = $this->request->getPost('inicio_inhabilitacion');

        			$inicio_inhabilitacion = date( "Y-m-d" ,strtotime($getInicio_inhabilitacion));

        			$getTermino_inhabilitacion = $this->request->getPost('termino_inhabilitacion');

        			$termino_inhabilitacion = date( "Y-m-d" ,strtotime($getTermino_inhabilitacion));

        			$getInicio_averiguacion = $this->request->getPost('inicio_averiguacion');

        			$inicio_averiguacion = date( "Y-m-d" ,strtotime($getInicio_averiguacion));

        			$getAl_dia = $this->request->getPost('al_dia');

        			$al_dia = date( "Y-m-d" ,strtotime($getAl_dia));

        			$getInicio_proceso = $this->request->getPost('inicio_proceso');

        			$inicio_proceso = date( "Y-m-d" ,strtotime($getInicio_proceso));

        			$getAl_dia_proceso = $this->request->getPost('al_dia_proceso');

        			$al_dia_proceso = date( "Y-m-d" ,strtotime($getAl_dia_proceso));

        			$getOtrogado_estimulo = $this->request->getPost('otrogado_estimulo');

        			$otrogado_estimulo = date( "Y-m-d" ,strtotime($getOtrogado_estimulo));

					$sancionesEstimulos = array(
		    					
		    					
						"id" => $id  ,
						"idPersonal" => $idPersonal  , 
						"idEmpresa" =>  $idEmpresa , 
						"tipo_sancion" =>  $this->request->getPost('tipo') , 
						"determinacion" =>  $determinacion , 
						"descripcion_sancion" => $this->request->getPost('descripcion')  , 
						"situacion" =>  $this->request->getPost('situacion') , 
						"inicio_habilitacion" =>  $inicio_inhabilitacion , 
						"termino_habilitacion" => $termino_inhabilitacion  , 
						"dependencia" =>  $this->request->getPost('organismo') , 
						"institucion_emisora" =>  $this->request->getPost('emisora') , 
						"idEstado" =>  $this->request->getPost('entidad_federativaSE') , 
						"delitos" =>  $this->request->getPost('delitos') , 
						"motivos" =>  $this->request->getPost('motivo') , 
						"numero_expediente" =>  $this->request->getPost('no_expediente') , 
						"agencia_mp" =>  $this->request->getPost('agencia_mp') , 
						"averiguacion_previa" =>  $this->request->getPost('averiguacion_previa') , 
						"idTipoFuero" =>  $this->request->getPost('tipo_fuero') , 
						"estado_averiguacion" =>  $this->request->getPost('averiguacion_estado') , 
						"inicio_averiguacion" =>  $inicio_averiguacion , 
						"aldia_averiguacion" => $al_dia  , 
						"juzgado" =>  $this->request->getPost('juzgado') , 
						"num_proceso" =>  $this->request->getPost('no_proceso') , 
						"estado_procesal" => $this->request->getPost('estado_procesal')  , 
						"inicio_proceso" => $inicio_proceso  , 
						"aldia_proceso" =>  $al_dia_proceso , 
						"tipo_estimulo" => $this->request->getPost('tipo_estimulo')  , 
						"descripcion_estimulo" => $this->request->getPost('descripcion_estimulo')  , 
						"dependencia_otorga" => $this->request->getPost('dependencia')  , 
						"otorgado" =>  $otrogado_estimulo ,
						"activo" => 1 , 
						"createdby" => $LoggedUserId , 
						"createddate" => date("Y-m-d H:i:s") );


					$result = $this->modelCuip->insertSancionesEstimulos( $sancionesEstimulos);

					
					
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

				echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
		}	
	}

	public function AgregarCapacitaciones(){
		if ($this->request->getMethod() == "post" && $this->request->getvar(['dependencia, institucion, nombre_curso, tema_curso, nivel_curso, eficienciaCursos, inicio, conclusion, duracion, comprobante, empresa, curso, tipo_curso, cuso_tomado, eficiencia, inicioAdicional, conclusionAdicional, duracion_horas, idioma, lectura, escritura, conversacion, tipo_habilidad, especificacion, grado_habilidadCap, nombre, tipoAgrupa, especificacion, grado_habilidad, desde, hasta'],FILTER_SANITIZE_STRING)){

				$rules = [
				'dependencia' =>  ['label' => "Tipo", 'rules' => 'required|max_length[255]']];
		 
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

        			

        			$getInicio = $this->request->getPost('inicio');

        			$inicio = date( "Y-m-d" ,strtotime($getInicio));

        			$getConclusion = $this->request->getPost('conclusion');

        			$conclusion = date( "Y-m-d" ,strtotime($getConclusion));

        			$getInicioAdicional = $this->request->getPost('inicioAdicional');

        			$inicioAdicional = date( "Y-m-d" ,strtotime($getInicioAdicional));

        			$getConclusionAdicional = $this->request->getPost('conclusionAdicional');

        			$conclusionAdicional = date( "Y-m-d" ,strtotime($getConclusionAdicional));

        			$getDesde = $this->request->getPost('desde');

        			$desde = date( "Y-m-d" ,strtotime($getDesde));

        			$getHasta = $this->request->getPost('hasta');

        			$hasta = date( "Y-m-d" ,strtotime($getHasta));

        			$getNivel_curso = $this->request->getPost('nivel_curso');

        			$nivel_curso = $this->encrypt->Decrytp($getNivel_curso);

        			$getEficienciaCursos = $this->request->getPost('eficienciaCursos');

        			$eficienciaCursos = $this->encrypt->Decrytp($getEficienciaCursos);

        			$getCuso_tomado = $this->request->getPost('cuso_tomado');

        			$cuso_tomado = $this->encrypt->Decrytp($getCuso_tomado);

        			$getEficiencia = $this->request->getPost('eficiencia');

        			$eficiencia = $this->encrypt->Decrytp($getEficiencia);

        			$getIdioma = $this->request->getPost('idioma');

        			$idioma = $this->encrypt->Decrytp($getIdioma);

        			$getLectura = $this->request->getPost('lectura');

        			$lectura = $this->encrypt->Decrytp($getLectura);

        			$getEscritura = $this->request->getPost('escritura');

        			$escritura = $this->encrypt->Decrytp($getEscritura);

        			$getConversacion = $this->request->getPost('conversacion');

        			$conversacion = $this->encrypt->Decrytp($getConversacion);

        			$getTipo_habilidad = $this->request->getPost('tipo_habilidad');

        			$tipo_habilidad = $this->encrypt->Decrytp($getTipo_habilidad);

        			$getGrado_habilidadCap = $this->request->getPost('grado_habilidadCap');

        			$grado_habilidadCap = $this->encrypt->Decrytp($getGrado_habilidadCap);

        			$getTipoAgrupa = $this->request->getPost('tipoAgrupa');

        			$tipoAgrupa = $this->encrypt->Decrytp($getTipoAgrupa);

        			$getGrado_habilidad = $this->request->getPost('grado_habilidad');

        			$grado_habilidad = $this->encrypt->Decrytp($getGrado_habilidad);


					$capacitaciones = array(
		    					
		    					
						"id" => $id  ,
						"idPersonal" => $idPersonal  , 
						"idEmpresa" =>  $idEmpresa , 
						"dependencia"  =>  $this->request->getPost('dependencia') , 
						"inst_capacitadora"  =>  $this->request->getPost('institucion') , 
						"nombre_curso"  =>  $this->request->getPost('nombre_curso') , 
						"tema_curso"  =>  $this->request->getPost('tema_curso') , 
						"idNivel_curso"  =>  $nivel_curso , 
						"idEficienciaCurso"  =>  $eficienciaCursos , 
						"inicio_curso"  =>  $inicio , 
						"conclusion_curso"  => $conclusion  , 
						"duracion_horas_curso"  =>  $this->request->getPost('duracion') , 
						"tipo_comprobante"  =>  $this->request->getPost('comprobante') , 
						"institucion"  => $this->request->getPost('empresa')  , 
						"curso"  =>  $this->request->getPost('curso') , 
						"tipo_curso"  =>  $this->request->getPost('tipo_curso') , 
						"idCursoFue"  => $cuso_tomado  , 
						"idEficienciaAdicional"  => $eficiencia  , 
						"inicio_adicional"  =>  $inicioAdicional , 
						"conclusion_adicional"  =>  $conclusionAdicional , 
						"duracion_horas_adicional"  => $this->request->getPost('duracion_horas')  , 
						"idIdioma"  =>  $idioma , 
						"idIdiomaLectura"  => $lectura  , 
						"idIdiomaEscritura"  =>  $escritura , 
						"idIdiomaConversacion"  => $conversacion  , 
						"idTipoHabilidad"  =>  $tipo_habilidad , 
						"especifique_habilidad"  =>  $this->request->getPost('especificacion') , 
						"idGradoHabilidad"  => $grado_habilidadCap  , 
						"nombre_agrupacion"  =>  $this->request->getPost('nombre') , 
						"idTipoAgrupacion"  =>  $tipoAgrupa , 
						"especifique_agrupacion"  =>  $this->request->getPost('especificacion') , 
						"idGradoHabilidadAgrup"  =>  $grado_habilidad , 
						"desde"  =>  $desde , 
						"hasta"  => $hasta ,
						"activo" => 1 , 
						"createdby" => $LoggedUserId , 
						"createddate" => date("Y-m-d H:i:s") );


					$result = $this->modelCuip->insertCapacitaciones( $capacitaciones);

					
					
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

				echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
		}	
	}
	


	public function AgregarEmpDiversos(){
		if ($this->request->getMethod() == "post" && $this->request->getvar(['empresa, calle, exterior, interior, codigoEmpDiv, coloniacodigoEmpDiv, estadocodigoEmpDiv, municipiocodigoEmpDiv, numero, ingresoEmpDiv, separacion, puesto_funcional, funciones, sueldo, compensaciones, area, motivo_separacion, tipo_separacion, tipo_baja, comentarios, empleo, puesto, area_gustaria, ascender, reglamentacion, reconomiento, reglamentacion_ascenso, razones_ascenso, capacitacion, desciplina, subtipo_disciplina, motivo, tipo, fecha_inicialDis, fecha_finalDis, licencias_medicas, duracion, cantidad'],FILTER_SANITIZE_STRING)){

				$rules = [
				'empresa' =>  ['label' => "Empresa", 'rules' => 'required|max_length[255]']];
		 
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

        			

        			$getingresoEmpDiv = $this->request->getPost('ingresoEmpDiv');

        			$ingresoEmpDiv = date( "Y-m-d" ,strtotime($getingresoEmpDiv));

        			$getSeparacion = $this->request->getPost('separacion');

        			$separacion = date( "Y-m-d" ,strtotime($getSeparacion));

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

        			
					$empDiversos = array(
		    					
		    					
						"id" => $id  ,
						"idPersonal" => $idPersonal  , 
						"idEmpresa" =>  $idEmpresa , 
						"empresa"  => $this->request->getPost('empresa')  , 
						"calle"  => $this->request->getPost('calle')  , 
						"numero_exterior"  => $this->request->getPost('exterior')  , 
						"numero_interior"  =>  $this->request->getPost('interior') , 
						"colonia"  =>  $this->request->getPost('coloniacodigoEmpDiv') , 
						"idCodigoPostal"  =>  $this->request->getPost('codigoEmpDiv') , 
						"numero_telefono"  =>  $this->request->getPost('numero') , 
						"ingreso"  =>  $ingresoEmpDiv , 
						"separacion"  => $separacion  , 
						"idPuestoFuncional"  => $this->request->getPost('puesto_funcional')  , 
						"area"  =>  $this->request->getPost('area') , 
						"sueldo_base"  => $this->request->getPost('sueldo')  , 
						"compensacion"  => $this->request->getPost('compensaciones')  , 
						"idEstado"  =>  $this->request->getPost('estadocodigoEmpDiv') , 
						"municipio"  =>  $this->request->getPost('municipiocodigoEmpDiv') , 
						"idMotivoSeparacion"  => $this->request->getPost('motivo_separacion')  , 
						"tipo_separacion"  => $this->request->getPost('tipo_separacion')  , 
						"tipo_baja"  => $this->request->getPost('tipo_baja')  , 
						"comentarios"  => $this->request->getPost('comentarios')  , 
						"eligio_empleo"  =>  $this->request->getPost('empleo') , 
						"puesto_gustaria"  =>  $this->request->getPost('puesto') , 
						"area_gustaria"  =>  $this->request->getPost('area_gustaria') , 
						"tiempo_ascenso"  =>  $this->request->getPost('ascender') , 
						"reglamento"  =>  $reglamentacion , 
						"razon_ascenso"  => $reglamentacion_ascenso  , 
						"capacitacion"  =>  $this->request->getPost('capacitacion') , 
						"idTipoDisciplina"  =>  $desciplina , 
						"subtipo_disciplina"  =>  $this->request->getPost('subtipo_disciplina') , 
						"motivo"  => $this->request->getPost('motivo')  , 
						"tipo"  =>  $this->request->getPost('tipo') , 
						"fecha_inicio"  =>  $fecha_inicialDis , 
						"fecha_termino"  => $fecha_finalDis  , 
						"idDuracion"  => $duracion   , 
						"cantidad" => $this->request->getPost('cantidad') , 
						"activo" => 1 , 
						"createdby" => $LoggedUserId , 
						"createddate" => date("Y-m-d H:i:s") );


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

				echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
		}	
	}


	public function getExpediente(){
		if ($this->request->getMethod() == "get"){

			$data['modulos'] = $this->menu->Permisos();
			$empresa = session()->get('empresa');
			$idEmpresa = $this->encrypter->decrypt($empresa);
			
			$documentos = $this->modelCuip->GetDocumentos($idEmpresa);

			$result = [];

    		foreach ( $documentos as $value){
				
				$id = $this->encrypt->Encrypt($value->id);
				$result[] = (object) array (
					'id' => $id ,
					'documento' => $value->documento,
					'tipo' => $value->tipo

				) ;
			}

		
			
			$data['documentos'] = $result; 

			$data['breadcrumb'] = ["inicio" => 'CUIP' ,
                    				"url" => 'cuip',
                    				"titulo" => 'Expediente'];
			
			return view('CargaMasiva/cargaMasiva', $data);
		}	
    }


    public function getMediafiliacion(){
		if ($this->request->getMethod() == "get" ){

			$data['modulos'] = $this->menu->Permisos();
			$empresa = session()->get('empresa');
			$idEmpresa = $this->encrypter->decrypt($empresa);
			$resultData = $this->modelCuip->GetCuip($idEmpresa);
			$result = [];


			///////////MEDIA FILIACION

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

        	$data['breadcrumb'] = ["inicio" => 'CUIP' ,
                    				"url" => 'cuip',
                    				"titulo" => 'Media Filiación'];
			
			
			return view('MediaFiliacion/mediaFiliacion', $data);
		}	
    }


    public function getCuipDetail(){
		if ($this->request->getMethod() == "get" && $this->request->getvar(['id'],FILTER_SANITIZE_STRING)){

			$data['modulos'] = $this->menu->Permisos();
			
			$getId = str_replace(" ", "+", $_GET['id']);
			$id = $this->encrypt->Decrytp($getId);

         	$data['variable'] = $this->modelCuip->GetDatosPersonalesById($id);
			$data['estudio'] = $this->modelCuip->GetSocioEconomicoById($id);
			$data['seguridad'] = $this->modelCuip->GetEmpleosSeridadById($id);
			$data['diversos'] = $this->modelCuip->GetEmpleosDiversos($id);
			$data['capacitacion'] = $this->modelCuip->GetCapacitaciones($id);
			$data['sanciones'] = $this->modelCuip->GetSanciones($id);

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

			$data['entidad_federativa'] = $getEstados;
			////////////////////////////////////////////////


			$parentesco_familiar = $this->modelCuip->GetCatalogoCuip('e608d93e-8d57-4378-a867-1a98dfb538be');
			
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

        	$getId = str_replace(" ", "+", $_GET['id']);
			$id = $this->encrypt->Decrytp($getId);

        	$data['variable'] = $this->modelCuip->GetDatosPersonalesById($id);
			$data['estudio'] = $this->modelCuip->GetSocioEconomicoById($id);
			$data['seguridad'] = $this->modelCuip->GetEmpleosSeridadById($id);
			$data['diversos'] = $this->modelCuip->GetEmpleosDiversos($id);
			$data['capacitacion'] = $this->modelCuip->GetCapacitaciones($id);

			$data['sanciones'] = $this->modelCuip->GetSanciones($id);

			$data['id'] = $this->encrypt->Encrypt($id); 
			
			$data['breadcrumb'] = ["inicio" => 'CUIP' ,
                    				"url" => 'cuip',
                    				"titulo" => 'Editar'];

			return view('Cuip/EditCUIP', $data);	
			}
	}


	public function AgregarReferencias(){
		if ($this->request->getMethod() == "post" && $this->request->getvar([''],FILTER_SANITIZE_STRING)){

				$rules = [
				'apellidoPaterno' =>  ['label' => "Apellido Paterno", 'rules' => 'required|max_length[255]']];
		 
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

        			

        			$getInicio = $this->request->getPost('inicio');

        			$inicio = date( "Y-m-d" ,strtotime($getInicio));

        			$getConclusion = $this->request->getPost('conclusion');

        			$conclusion = date( "Y-m-d" ,strtotime($getConclusion));

        			$getInicioAdicional = $this->request->getPost('inicioAdicional');

        			$inicioAdicional = date( "Y-m-d" ,strtotime($getInicioAdicional));

        			$getConclusionAdicional = $this->request->getPost('conclusionAdicional');

        			$conclusionAdicional = date( "Y-m-d" ,strtotime($getConclusionAdicional));

        			$getDesde = $this->request->getPost('desde');

        			$desde = date( "Y-m-d" ,strtotime($getDesde));

        			$getHasta = $this->request->getPost('hasta');

        			$hasta = date( "Y-m-d" ,strtotime($getHasta));

        			$getNivel_curso = $this->request->getPost('nivel_curso');

        			$nivel_curso = $this->encrypt->Decrytp($getNivel_curso);

        			$getEficienciaCursos = $this->request->getPost('eficienciaCursos');

        			$eficienciaCursos = $this->encrypt->Decrytp($getEficienciaCursos);

        			$getCuso_tomado = $this->request->getPost('cuso_tomado');

        			$cuso_tomado = $this->encrypt->Decrytp($getCuso_tomado);

        			$getEficiencia = $this->request->getPost('eficiencia');

        			$eficiencia = $this->encrypt->Decrytp($getEficiencia);

        			$getIdioma = $this->request->getPost('idioma');

        			$idioma = $this->encrypt->Decrytp($getIdioma);

        			$getLectura = $this->request->getPost('lectura');

        			$lectura = $this->encrypt->Decrytp($getLectura);

        			$getEscritura = $this->request->getPost('escritura');

        			$escritura = $this->encrypt->Decrytp($getEscritura);

        			$getConversacion = $this->request->getPost('conversacion');

        			$conversacion = $this->encrypt->Decrytp($getConversacion);

        			$getTipo_habilidad = $this->request->getPost('tipo_habilidad');

        			$tipo_habilidad = $this->encrypt->Decrytp($getTipo_habilidad);

        			$getGrado_habilidadCap = $this->request->getPost('grado_habilidadCap');

        			$grado_habilidadCap = $this->encrypt->Decrytp($getGrado_habilidadCap);

        			$getTipoAgrupa = $this->request->getPost('tipoAgrupa');

        			$tipoAgrupa = $this->encrypt->Decrytp($getTipoAgrupa);

        			$getGrado_habilidad = $this->request->getPost('grado_habilidad');

        			$grado_habilidad = $this->encrypt->Decrytp($getGrado_habilidad);


					$referencias = array(
		    					
		    					
						"id" => $id  ,
						"idPersonal" => $idPersonal  , 
						"idEmpresa" =>  $idEmpresa , 
						"dependencia"  =>  $this->request->getPost('dependencia') , 
						"inst_capacitadora"  =>  $this->request->getPost('institucion') , 
						"nombre_curso"  =>  $this->request->getPost('nombre_curso') , 
						"tema_curso"  =>  $this->request->getPost('tema_curso') , 
						"idNivel_curso"  =>  $nivel_curso , 
						"idEficienciaCurso"  =>  $eficienciaCursos , 
						"inicio_curso"  =>  $inicio , 
						"conclusion_curso"  => $conclusion  , 
						"duracion_horas_curso"  =>  $this->request->getPost('duracion') , 
						"tipo_comprobante"  =>  $this->request->getPost('comprobante') , 
						"institucion"  => $this->request->getPost('empresa')  , 
						"curso"  =>  $this->request->getPost('curso') , 
						"tipo_curso"  =>  $this->request->getPost('tipo_curso') , 
						"idCursoFue"  => $cuso_tomado  , 
						"idEficienciaAdicional"  => $eficiencia  , 
						"inicio_adicional"  =>  $inicioAdicional , 
						"conclusion_adicional"  =>  $conclusionAdicional , 
						"duracion_horas_adicional"  => $this->request->getPost('duracion_horas')  , 
						"idIdioma"  =>  $idioma , 
						"idIdiomaLectura"  => $lectura  , 
						"idIdiomaEscritura"  =>  $escritura , 
						"idIdiomaConversacion"  => $conversacion  , 
						"idTipoHabilidad"  =>  $tipo_habilidad , 
						"especifique_habilidad"  =>  $this->request->getPost('especificacion') , 
						"idGradoHabilidad"  => $grado_habilidadCap  , 
						"nombre_agrupacion"  =>  $this->request->getPost('nombre') , 
						"idTipoAgrupacion"  =>  $tipoAgrupa , 
						"especifique_agrupacion"  =>  $this->request->getPost('especificacion') , 
						"idGradoHabilidadAgrup"  =>  $grado_habilidad , 
						"desde"  =>  $desde , 
						"hasta"  => $hasta ,
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

				echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
		}	
	}

}