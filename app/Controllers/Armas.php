<?php namespace App\Controllers;

use App\Models\ArmasModel;
use App\Libraries\Crud_email;
use App\Libraries\Menu;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;
use SebastianBergmann\CodeCoverage\Driver\Selector;

class Armas extends BaseController {

    private $encrypter;
	private $menu;
	private $encrypt;
	private $db;
	private $modelArmas;

    public function __construct()
	{
		$this->menu = new Menu();
		$this->encrypt = new Encrypt();
		$this->encrypter = \Config\Services::encrypter();
        $this->db =  \Config\Database::connect('default');
		$this->modelArmas = new ArmasModel($this->db);
		
	}


    public function GetArmas(){
		if ($this->request->getMethod() == "get"){

			$data['modulos'] = $this->menu->Permisos();
			$empresa = session()->get('empresa');
			$idEmpresa = $this->encrypter->decrypt($empresa);
			$resultData = $this->modelArmas->GetArmas($idEmpresa);
			$result = [];


			foreach ( $resultData as $v){
				
				// $id = $this->encrypt->Encrypt($v->id);
				$result[] = (object) array (
					'id' => $v->id,
					'matricula' => $v->matricula,
					'clase' => $v->clase,
					'folio_manif' => $v->folio_manif,
                    'idMarca' => $v->idMarca,
					'activo' => $v->activo

				) ;
			}
		
			$dataCrud = [
                'data' => $result]; 

        	$data['arma'] = $dataCrud['data'];

			
			return view('Armas/armascatalogo', $data);
		}	
    }

    public function DetalleArmas(){
		if ($this->request->getMethod() == "get" && $this->request->getvar(['id'],FILTER_SANITIZE_STRING)){

			$data['modulos'] = $this->menu->Permisos();

			$getId = str_replace(" ", "+", $_GET['id']);
			// $id = $this->encrypt->Decrytp($getId);
			$id = $getId;
			$idAdmin = session()->get('IdUser');
        	//$idUserAdmin = $this->encrypter->decrypt($idAdmin);

        	$data['arma'] = $this->modelArmas->GetArmaById($id);

        	//$data['modulosUsuario'] = $this->modelAdministrador->GetModulosUserById($id , $idUserAdmin);
        	
			
			$data['breadcrumb'] = ["inicio" => 'Armas' ,
                    				"url" => 'armas',
                    				"titulo" => 'Detalle'];
		
			return view('Armas/detailArmas', $data);
		}	
	}

    public function EditarArma(){
		if ($this->request->getMethod() == "get" && $this->request->getvar(['id'],FILTER_SANITIZE_STRING)){

			$data['modulos'] = $this->menu->Permisos();
			
			$getId = str_replace(" ", "+", $_GET['id']);
			// $id = $this->encrypt->Decrytp($getId);
			$id = $getId;
			$idAdmin = session()->get('IdUser');

			
			$data['arma'] = $this->modelArmas->GetArmaById($id);
            // $data['id'] = $this->encrypt->Encrypt($id);
            $data['id'] = $id;
			$data['ubicaciones']=$this->modelArmas->getUbicaciones();
			$data['tipoArma'] = $this->modelArmas->searchEnMulticatalogo('tipo Arma');

			//edit

			$data['breadcrumb'] = ["inicio" => 'Armas' ,
                    				"url" => 'armas',
                    				"titulo" => 'Editar'];
			return view('Armas/editArmas', $data);
		}	
	}

    public function SaveArma(){

		if($this->request->getMethod() == "post" && $this->request->getvar(['matricula', 'id'],FILTER_SANITIZE_STRING)) {

			$rules = ['id' =>  ['label' => '', 'rules' =>'required'],
                'matricula' =>  [ 'label' => 'Matricula', 'rules' => 'required']];

				$errors = [];
				$succes = [];
				$dontSucces = [];
				$data = [];
				
				if($this->validate($rules)){
					//$getEmpresa = session()->get('empresa');
					//$idEmpresa = $this->encrypter->decrypt($getEmpresa);
                    $getUser = session()->get('IdUser');
					$LoggedUserId = $this->encrypter->decrypt($getUser);
					$TodayDate = date("Y-m-d H:i:s");
					$idModi = $this->request->getPost('id');
					$idCatalogo = $this->encrypt->Decrytp($idModi);	
					$updateEmpresa = array(
                        "activo" => $this->request->getPost('activo'),
		    			"matricula" =>  $_POST["matricula"],
                        "updatedby" => $LoggedUserId,
                				"updateddate" => $TodayDate
                    );

					$registrar = $this->modelArmas->saveArma($updateEmpresa, $idCatalogo);

					if ($registrar){

						$succes = ["mensaje" => 'Arma editada con exito' ,
                            	   "succes" => "succes"];
					} else {

						$dontSucces = ["error" => "error",
                    				  "mensaje" => 	lang('Layout.toastrError') ];
					}
					
				} else {

					$errors = $this->validator->getErrors();
				}

			}
			echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
	}


	public function AgreArma(){
		if ($this->request->getMethod() == "get"){

            $getEmpresa = session()->get('empresa');
            $idEmpresa = $this->encrypter->decrypt($getEmpresa);

			$data['modulos'] = $this->menu->Permisos();
			$data['breadcrumb'] = ["inicio" => 'Armas' ,
                    				"url" => 'armas',
                    				"titulo" => 'Agregar Arma'];

			$data['ubicaciones']=$this->modelArmas->getUbicaciones();
			$data['clase']=$this->modelArmas->GetClase($idEmpresa);
            $data['calibre']=$this->modelArmas->GetCalibre($idEmpresa);
            $data['modelo']=$this->modelArmas->GetModelo($idEmpresa);
            $data['marca']=$this->modelArmas->GetMarca($idEmpresa);
			$data['tipoArma'] = $this->modelArmas->searchEnMulticatalogo('tipo Arma');

			
			return view('Armas/addArmas', $data);
		}	
	}

    public function AgregarArma(){
		//helper(['form']);
		if ($this->request->getMethod() == "post" && $this->request->getvar(['matricula,folio_manif,clase,calibre,marca,modelo'],FILTER_SANITIZE_STRING)){

				$getEmpresa = session()->get('empresa');
				$idEmpresa = $this->encrypter->decrypt($getEmpresa);

				$rules = [
				'matricula' =>  ['label' => "Matricula", 'rules' => 'required|max_length[255]'],
				'folio_manif' =>  ['label' => "Folio Manif", 'rules' => 'required|max_length[255]'],
                'clase' =>  ['label' => "Clase", 'rules' => 'required'],
                'calibre' =>  ['label' => "Calibre", 'rules' => 'required'],
                'marca' =>  ['label' => "Marca", 'rules' => 'required'],
                'modelo' =>  ['label' => "Modelo", 'rules' => 'required'],
                'ubicaciones' =>  ['label' => "ubicaciones", 'rules' => 'required'],
                'tipoArma' =>  ['label' => "tipo arma", 'rules' => 'required']];
		 
				$errors = [];
				$succes = [];
				$dontSucces = [];
				$data = [];


				if($this->validate($rules)){
					
					$getUser = session()->get('IdUser');
					$LoggedUserId = $this->encrypter->decrypt($getUser);
					$empresa = session()->get('empresa');
					$idEmpresa = $this->encrypter->decrypt($empresa);
					$getClase = $this->request->getPost('clase');
					$idClase = $this->encrypt->Decrytp($getClase);
                    $getCalibre= $this->request->getPost('calibre');
					$idCalibre = $this->encrypt->Decrytp($getCalibre);
                    $getMarca = $this->request->getPost('marca');
					$idMarca = $this->encrypt->Decrytp($getMarca);
                    $getModelo = $this->request->getPost('modelo');
					$idModelo = $this->encrypt->Decrytp($getModelo);

					$file = $this->request->getFile('archivo_file');
					$getfileName = $file->getName();
					$getfileExt = $file->getExtension();
					$fileName = $this->encrypt->Encrypt($getfileName);
					$extension = $this->encrypt->Encrypt($getfileExt);
					$getRuta = WRITEPATH . 'uploads/files/FolioManifiesto/'.date("Y").'/'.date("m").'/'.$idEmpresa;
        			$ruta = $this->encrypt->Encrypt($getRuta);

					if ($file->isValid() && !$file->hasMoved()){

						$file->move($getRuta,$file->getRandomName());

						$getFileNameAlmacen = $file->getName();
						$fileNameAlmacen = $this->encrypt->Encrypt($getFileNameAlmacen);

					}

					$result = $this->modelArmas->insertItemAndSelect('armas', $this->request->getPost() , 'armas',$LoggedUserId , $idEmpresa, $idClase,$idCalibre,$idMarca,$idModelo, $ruta, $fileNameAlmacen);

                    if ($result) {
                    	$succes = ["mensaje" => 'Arma Agregada con exito' , "succes" => "succes"];
						$select = $this->modelArmas->searchCatalogo($_POST['tipoArma']);
						$selectUb = $this->modelArmas->searchUbicaciones($_POST['ubicaciones']);
						$update = [];
						if($select->idReferencia == 1){
							if( $selectUb->armas_cortas_asg+1 > $selectUb->armas_Cortas ){
								$dontSucces = ["error" => "error", "mensaje" => "El limite de Armas Cortas esta al Maximo"];
							}else{
								$update = array(
									"armas_cortas_asg" => $selectUb->armas_cortas_asg+1 ,
									"updatedby" => $LoggedUserId,
									"updateddate" => date("Y-m-d H:i:s"),
								);
									
							}
						}else{
							if( $selectUb->armas_largas_asg+1 > $selectUb->armas_Largas ){
								$dontSucces = ["error" => "error", "mensaje" => "El limite de Armas Largas esta al Maximo"];

							}else{
								$update = array(
									"armas_largas_asg" => $selectUb->armas_largas_asg+1 ,
									"updatedby" => $LoggedUserId,
									"updateddate" => date("Y-m-d H:i:s"),
								);	
							}
							
						}

						if(count($update) > 0){
							$updateLicencia = $this->modelArmas->updateLicencia($update, $selectUb->id_licencia);
							if ($updateLicencia) {
									$succes = ["mensaje" => 'Registrado con Exito', "succes" => "succes"];
							} else {
								$dontSucces = ["error" => "error", "mensaje" => "No se registro el registro el CUIP ".$_POST['cuip']];
							}
							
						}
						
                    	
                    } else {
                    	$dontSucces = ["error" => "error",
                    				  "mensaje" => 	lang('Layout.toastrError')  ];

                    }
				} else {	
					$errors = $this->validator->getErrors();
				}

				echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
		}	
	}

	
	public function licencias(){
		if ($this->request->getMethod() == "get" && $this->request->getvar(['id'],FILTER_SANITIZE_STRING)){

			$data['modulos'] = $this->menu->Permisos();

			$idAdmin = session()->get('IdUser');
        	
			$data['modalidad'] = $this->modelArmas->searchEnMulticatalogo('modalidad');
			$data['licencias'] = $this->modelArmas->allLicencias();
			
			$data['breadcrumb'] = ["inicio" => 'Armas' ,
                    				"url" => 'armas',
                    				"titulo" => 'Licencia'];
			
			return view('Armas/licencia', $data);
		}	
	}

	public function GuardarLic(){
		if ($this->request->getMethod() == "post"){

			$rules = [
				'Oficio' =>  ['label' => "Oficio", 'rules' => 'required'],
				'Folio' =>  ['label' => "Folio", 'rules' => 'required'],
                'modalidad' =>  ['label' => "modalidad", 'rules' => 'required'],
                'responsable' =>  ['label' => "responsable", 'rules' => 'required'],
                'fecha' =>  ['label' => "fecha", 'rules' => 'required'],
                'aCorta' =>  ['label' => "Arma Corta", 'rules' => 'required'],
                'aLargas' =>  ['label' => "Arma Larga", 'rules' => 'required'],
                'tPersonas' =>  ['label' => "Total Personas", 'rules' => 'required'],
            ];
		 
				$errors = [];
				$succes = [];
				$dontSucces = [];
				$data = [];

				$uuid = Uuid::uuid4();
				$id = $uuid->toString();
				$getUser = session()->get('IdUser');
	            $LoggedUserId = $this->encrypter->decrypt($getUser);
				$empresa = session()->get('empresa');
				$idEmpresa = $this->encrypter->decrypt($empresa);


				if($this->validate($rules)){
					
					$file = $this->request->getFile('archivo_file');
					$getfileName = $file->getName();
					$getfileExt = $file->getExtension();
					$fileName = $this->encrypt->Encrypt($getfileName);
					$extension = $this->encrypt->Encrypt($getfileExt);
					$getRuta = WRITEPATH . 'uploads/files/'.date("Y").'/'.date("m").'/'.$idEmpresa;
        			$ruta = $this->encrypt->Encrypt($getRuta);

					if ($file->isValid() && !$file->hasMoved()){

						$file->move($getRuta,$file->getRandomName());

						$getFileNameAlmacen = $file->getName();
						$fileNameAlmacen = $this->encrypt->Encrypt($getFileNameAlmacen);

					}
						$insert = array(
							"id_licencia" =>  $id,
							"id_empresa" =>  $idEmpresa,
							"No_oficio" => $_POST["Oficio"],
							"folio" =>  $_POST["Folio"],
							"id_Modalidad" => $_POST["modalidad"],
							"responsable" =>  $_POST["responsable"],
							"fecha_revalidacion" =>  $_POST['fecha'],
							"armas_Cortas" =>  $_POST['aCorta'],
							"armas_Largas" =>  $_POST['aLargas'],
							"total_Armas" =>  $_POST['aCorta']+$_POST['aLargas'],
							"total_Personas" =>  $_POST['tPersonas'],
							"docuemento_Licencia" =>  $ruta,
							"nombre_Docuemento" =>  $fileNameAlmacen,
							"activo" => 1,
							"createdby" => $LoggedUserId,
							"createddate" => date("Y-m-d H:i:s"),
	
						);	

						$insert = $this->modelArmas->addlicencia($insert);
						if ($insert) {
								$succes = ["mensaje" => 'Registrado con Exito', "succes" => "succes"];
						} else {
							$dontSucces = ["error" => "error", "mensaje" => "No se registro el registro el CUIP ".$_POST['cuip']];
						}
					
				} else {	
					$errors = $this->validator->getErrors();
				}

				echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
		}	
	}

	public function ubicaciones(){
		if ($this->request->getMethod() == "get" && $this->request->getvar(['id'],FILTER_SANITIZE_STRING)){

			$data['modulos'] = $this->menu->Permisos();

			$idAdmin = session()->get('IdUser');
        	$data['licencias'] = $this->modelArmas->getLicencias();
			$data['allubicacion'] = $this->modelArmas->allUbicacion();
			$data['tipoUbicacion'] = $this->modelArmas->searchEnMulticatalogo('tipo Ubicacion');
			
			$data['breadcrumb'] = ["inicio" => 'Armas' ,
                    				"url" => 'armas',
                    				"titulo" => 'Ubicacion'];
		
		
			return view('Armas/ubicacion', $data);
		}	
	}

	public function GuardarUbicacionArmas(){
		if ($this->request->getMethod() == "post"){

			$rules = [
				'licencias' =>  ['label' => "", 'rules' => 'required'],
				'tipoUbicacion' =>  ['label' => "", 'rules' => 'required'],
                'calle' =>  ['label' => "", 'rules' => 'required'],
                'No_Exterior' =>  ['label' => "", 'rules' => 'required'],
                'Colonia' =>  ['label' => "", 'rules' => 'required'],
                'Municipio' =>  ['label' => "", 'rules' => 'required'],
                'Estado' =>  ['label' => "", 'rules' => 'required'],
                'CP' =>  ['label' => "", 'rules' => 'required'],
            ];
		 
				$errors = [];
				$succes = [];
				$dontSucces = [];
				$data = [];

				$uuid = Uuid::uuid4();
				$id = $uuid->toString();
				$getUser = session()->get('IdUser');
	            $LoggedUserId = $this->encrypter->decrypt($getUser);
				$empresa = session()->get('empresa');
				$idEmpresa = $this->encrypter->decrypt($empresa);

				if($this->validate($rules)){
					$insert = array(
						"id_ubicacion" =>  $id,
						"id_licencia" =>  $_POST['licencias'],
						"id_tipo_ubicacion" => $_POST["tipoUbicacion"],
						"calle" =>  $_POST["calle"],
						"no_exterior" => $_POST["No_Exterior"],
						"no_interior" =>  $_POST["No_Interior"],
						"colonia" =>  $_POST['Colonia'],
						"municipio" =>  $_POST['Municipio'],
						"estado" =>  $_POST['Estado'],
						"codigo_postal" =>  $_POST['CP'],
						"activo" => 1,
						"createdby" => $LoggedUserId,
						"createddate" => date("Y-m-d H:i:s"),

					);	

					$insert = $this->modelArmas->addubicacion($insert);
					if ($insert) {
							$succes = ["mensaje" => 'Registrado con Exito', "succes" => "succes"];
					} else {
						$dontSucces = ["error" => "error", "mensaje" => "No se inserto el registro"];
					}
					
				} else {	
					$errors = $this->validator->getErrors();
				}

				echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
		}	
	}
	public function editarLicenia(){
		if ($this->request->getMethod() == "get" && $this->request->getvar(['id'],FILTER_SANITIZE_STRING)){

			$data['modulos'] = $this->menu->Permisos();
			
			$getId = str_replace(" ", "+", $_GET['id']);
			$idAdmin = session()->get('IdUser');
        	
			$data['modalidad'] = $this->modelArmas->searchEnMulticatalogo('modalidad');
			
			$data['licencia'] = $this->modelArmas->searchLicencia($getId);

			$data['breadcrumb'] = ["inicio" => 'licencias' ,
                    				"url" => 'licencias',
                    				"titulo" => 'Editar Licencias'];
			return view('Armas/editLicencia', $data);
		}	
	}

	public function detialLicencia(){
		if ($this->request->getMethod() == "get" && $this->request->getvar(['id'],FILTER_SANITIZE_STRING)){

			$data['modulos'] = $this->menu->Permisos();
			
			$getId = str_replace(" ", "+", $_GET['id']);
			$idAdmin = session()->get('IdUser');
        	
			$data['modalidad'] = $this->modelArmas->searchEnMulticatalogo('modalidad');
			
			$data['licencia'] = $this->modelArmas->searchLicenciaDetail($getId);

			$data['breadcrumb'] = ["inicio" => 'licencias' ,
                    				"url" => 'licencias',
                    				"titulo" => 'Detalles Licencias'];
			return view('Armas/detialLicencia', $data);
		}	
	}
	public function editLicencia(){
		if ($this->request->getMethod() == "post"){

			$rules = [
				'Oficio' =>  ['label' => "Oficio", 'rules' => 'required'],
				'Folio' =>  ['label' => "Folio", 'rules' => 'required'],
                'modalidad' =>  ['label' => "modalidad", 'rules' => 'required'],
                'responsable' =>  ['label' => "responsable", 'rules' => 'required'],
                'fecha' =>  ['label' => "fecha", 'rules' => 'required'],
                'aCorta' =>  ['label' => "Arma Corta", 'rules' => 'required'],
                'aLargas' =>  ['label' => "Arma Larga", 'rules' => 'required'],
                'tPersonas' =>  ['label' => "Total Personas", 'rules' => 'required'],
            ];
		 
				$errors = [];
				$succes = [];
				$dontSucces = [];
				$data = [];

				$uuid = Uuid::uuid4();
				$id = $uuid->toString();
				$getUser = session()->get('IdUser');
	            $LoggedUserId = $this->encrypter->decrypt($getUser);
				$empresa = session()->get('empresa');
				$idEmpresa = $this->encrypter->decrypt($empresa);

				if($this->validate($rules)){
					$update = array(
						"No_oficio" => $_POST["Oficio"],
						"folio" =>  $_POST["Folio"],
						"id_Modalidad" => $_POST["modalidad"],
						"responsable" =>  $_POST["responsable"],
						"fecha_revalidacion" =>  $_POST['fecha'],
						"armas_Cortas" =>  $_POST['aCorta'],
						"armas_Largas" =>  $_POST['aLargas'],
						"total_Armas" =>  $_POST['aCorta']+$_POST['aLargas'],
						"total_Personas" =>  $_POST['tPersonas'],
						"activo" => $_POST['activo'],
						"updatedby" => $LoggedUserId,
        				"updateddate" => date("Y-m-d H:i:s")

					);	

					$update = $this->modelArmas->updateLicencia($update, $_POST['idLicencia']);
					if ($update) {
							$succes = ["mensaje" => 'Actualizado con Exito', "succes" => "succes"];
					} else {
						$dontSucces = ["error" => "error", "mensaje" => "No se actualizo el registro"];
					}
					
				} else {	
					$errors = $this->validator->getErrors();
				}

				echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
		}	
	}

	public function editDoc(){
		if ($this->request->getMethod() == "post"){

			$rules = [
				'idLicenciaFile' =>  ['label' => "", 'rules' => 'required'],
            ];
		 
				$errors = [];
				$succes = [];
				$dontSucces = [];
				$data = [];

				$uuid = Uuid::uuid4();
				$id = $uuid->toString();
				$getUser = session()->get('IdUser');
	            $LoggedUserId = $this->encrypter->decrypt($getUser);
				$empresa = session()->get('empresa');
				$idEmpresa = $this->encrypter->decrypt($empresa);

				if($this->validate($rules)){
					
					$file = $this->request->getFile('archivo_file');
					$getfileName = $file->getName();
					$getfileExt = $file->getExtension();
					$fileName = $this->encrypt->Encrypt($getfileName);
					$extension = $this->encrypt->Encrypt($getfileExt);
					$getRuta = WRITEPATH . 'uploads/files/'.date("Y").'/'.date("m").'/'.$idEmpresa;
        			$ruta = $this->encrypt->Encrypt($getRuta);

					if ($file->isValid() && !$file->hasMoved()){

						$file->move($getRuta,$file->getRandomName());

						$getFileNameAlmacen = $file->getName();
						$fileNameAlmacen = $this->encrypt->Encrypt($getFileNameAlmacen);

					}
						$update = array(
							"docuemento_Licencia" =>  $ruta,
							"nombre_Docuemento" =>  $fileNameAlmacen,
							"updatedby" => $LoggedUserId,
							"updateddate" => date("Y-m-d H:i:s")
						);	

						$update = $this->modelArmas->updateDoc($update, $_POST['idLicenciaFile']);
						if ($update) {
								$succes = ["mensaje" => 'Actualizado con Exito', "succes" => "succes"];
						} else {
							$dontSucces = ["error" => "error", "mensaje" => "No se actualizo el registro"];
						}
					
					
				} else {	
					$errors = $this->validator->getErrors();
				}
				echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
		}	
	}

	public function editarUbicacion(){
		if ($this->request->getMethod() == "get" && $this->request->getvar(['id'],FILTER_SANITIZE_STRING)){

			$data['modulos'] = $this->menu->Permisos();
			
			$getId = str_replace(" ", "+", $_GET['id']);
			$idAdmin = session()->get('IdUser');
        	
			$data['modalidad'] = $this->modelArmas->searchEnMulticatalogo('modalidad');
			
			$data['ubicacion'] = $this->modelArmas->searchUbicacion($getId);
        	$data['licencias'] = $this->modelArmas->getLicencias();

			$data['tipoUbicacion'] = $this->modelArmas->searchEnMulticatalogo('tipo Ubicacion');

			$data['breadcrumb'] = ["inicio" => 'ubicaciones' ,
                    				"url" => 'ubicaciones',
                    				"titulo" => 'Editar Ubicacion'];
			return view('Armas/editUbicacion', $data);
		}	
	}

	public function editUbicacion(){
		if ($this->request->getMethod() == "post"){

			$rules = [
				'licencias' =>  ['label' => "", 'rules' => 'required'],
				'tipoUbicacion' =>  ['label' => "", 'rules' => 'required'],
                'calle' =>  ['label' => "", 'rules' => 'required'],
                'No_Exterior' =>  ['label' => "", 'rules' => 'required'],
                'Colonia' =>  ['label' => "", 'rules' => 'required'],
                'Municipio' =>  ['label' => "", 'rules' => 'required'],
                'Estado' =>  ['label' => "", 'rules' => 'required'],
                'CP' =>  ['label' => "", 'rules' => 'required'],
            ];
		 
				$errors = [];
				$succes = [];
				$dontSucces = [];
				$data = [];

				$uuid = Uuid::uuid4();
				$id = $uuid->toString();
				$getUser = session()->get('IdUser');
	            $LoggedUserId = $this->encrypter->decrypt($getUser);
				$empresa = session()->get('empresa');
				$idEmpresa = $this->encrypter->decrypt($empresa);

				if($this->validate($rules)){
					$updated = array(
						"id_licencia" =>  $_POST['licencias'],
						"id_tipo_ubicacion" => $_POST["tipoUbicacion"],
						"calle" =>  $_POST["calle"],
						"no_exterior" => $_POST["No_Exterior"],
						"no_interior" =>  $_POST["No_Interior"],
						"colonia" =>  $_POST['Colonia'],
						"municipio" =>  $_POST['Municipio'],
						"estado" =>  $_POST['Estado'],
						"codigo_postal" =>  $_POST['CP'],
						"activo" => $_POST['activo'],
						"updatedby" => $LoggedUserId,
						"updateddate" => date("Y-m-d H:i:s")

					);	

					$updated = $this->modelArmas->updateUbicacion($updated, $_POST['idUbicacion']);
					if ($updated) {
							$succes = ["mensaje" => 'Registrado con Exito', "succes" => "succes"];
					} else {
						$dontSucces = ["error" => "error", "mensaje" => "No se inserto el registro"];
					}
					
				} else {	
					$errors = $this->validator->getErrors();
				}

				echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
		}	
	}

	public function detialUbicacion(){
		if ($this->request->getMethod() == "get" && $this->request->getvar(['id'],FILTER_SANITIZE_STRING)){

			$data['modulos'] = $this->menu->Permisos();
			
			$getId = str_replace(" ", "+", $_GET['id']);
			$idAdmin = session()->get('IdUser');
        	
			$data['ubicacion'] = $this->modelArmas->searchUbicacionDetail($getId);

			$data['breadcrumb'] = ["inicio" => 'licencias' ,
                    				"url" => 'licencias',
                    				"titulo" => 'Detalles Licencias'];
			return view('Armas/detailUbicacion', $data);
		}	
	}

	public function mostrarDatos(){
		if ($this->request->getMethod() == "post"){
            
            $errors = [];
            $succes = [];
            $dontSucces = [];
            $data = [];
			$validate = [];

			$select = $this->modelArmas->GetSepomexOption( $_POST["cp"] );

			if ($select) {
				$succes = ["mensaje" => 'Exito', "succes" => "succes"];
				$data = $select;
			} else {
				$dontSucces = ["error" => "error", "mensaje" => 'Hubo un error al Obtener los Datos.'];
			}
				
			echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
		}
	}
	
    public function view(){
		if ($this->request->getMethod() == "get" && $this->request->getvar(['h'],FILTER_SANITIZE_STRING)){

			$getId = str_replace(" ", "+", $this->request->getGet('h'));
			
			$file = $this->modelArmas->searchLicencia($getId);

			$path = $this->encrypt->Decrytp($file->docuemento_Licencia);
			$fileName = $this->encrypt->Decrytp($file->nombre_Docuemento);
			$doc = $path.'/'.$fileName;
			$ctype = "application/pdf";
			$this->response->setHeader('Content-Type', $ctype);
			readfile($doc);
		}
    }

	public function visorFolioManifiesto(){
		if ($this->request->getMethod() == "get" && $this->request->getvar(['h'],FILTER_SANITIZE_STRING)){

			$getId = str_replace(" ", "+", $this->request->getGet('h'));
			$file = $this->modelArmas->GetFolioManifiesto($getId);
			if($file->url == ''){
				echo "<h1 style='font-family: sans-serif;text-align: center;'>Sin Documento Folio Manifiesto Asignado</h1>";

			}else{
				$path = $this->encrypt->Decrytp($file->url);
				$fileName = $this->encrypt->Decrytp($file->nombre_folio);
				$doc = $path.'/'.$fileName;
				$split = explode(".", $fileName);
				if($split[1] == "pdf"){
					$ctype = "application/pdf";
				}else{
					$ctype = "image/jpeg";
				}
				$this->response->setHeader('Content-Type', $ctype);
				
				readfile($doc);

			}
		}
    }

	public function editFolioManifisto(){
		if ($this->request->getMethod() == "post"){

			$rules = [
				'idFolio' =>  ['label' => "", 'rules' => 'required'],
            ];
		 
				$errors = [];
				$succes = [];
				$dontSucces = [];
				$data = [];

				$uuid = Uuid::uuid4();
				$id = $uuid->toString();
				$getUser = session()->get('IdUser');
	            $LoggedUserId = $this->encrypter->decrypt($getUser);
				$empresa = session()->get('empresa');
				$idEmpresa = $this->encrypter->decrypt($empresa);

				if($this->validate($rules)){
					
					$file = $this->request->getFile('archivo_file');
					$getfileName = $file->getName();
					$getfileExt = $file->getExtension();
					$fileName = $this->encrypt->Encrypt($getfileName);
					$extension = $this->encrypt->Encrypt($getfileExt);
					$getRuta = WRITEPATH . 'uploads/files/FolioManifiesto/'.date("Y").'/'.date("m").'/'.$idEmpresa;
        			$ruta = $this->encrypt->Encrypt($getRuta);

					if ($file->isValid() && !$file->hasMoved()){

						$file->move($getRuta,$file->getRandomName());

						$getFileNameAlmacen = $file->getName();
						$fileNameAlmacen = $this->encrypt->Encrypt($getFileNameAlmacen);

					}
						$update = array(
							"url" =>  $ruta,
							"nombre_folio" =>  $fileNameAlmacen,
							"updatedby" => $LoggedUserId,
							"updateddate" => date("Y-m-d H:i:s")
						);	

						$update = $this->modelArmas->updateFolioMani($update, $_POST['idFolio']);
						if ($update) {
								$succes = ["mensaje" => 'Actualizado con Exito', "succes" => "succes"];
						} else {
							$dontSucces = ["error" => "error", "mensaje" => "No se actualizo el registro"];
						}
					
					
				} else {	
					$errors = $this->validator->getErrors();
				}
				echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
		}	
	}

	public function limpiar_datos(){
		$this->modelArmas->update_url_name();
		echo "succes";
	}


	public function cargaMasivaArmas(){
		if ($this->request->getMethod() == "get"){
			
			$errors = [];
			$succes = [];
			$dontSucces = [];
			$data = [];
			$getUser = session()->get('IdUser');
			$LoggedUserId = $this->encrypter->decrypt($getUser);
			$this->db->transStart();
	
			$folios = $this->modelArmas->buscarAllFolios();
			foreach ($folios as $folio) {
				
				$resp = $this->_buscarArchivoEnCarpetas($folio->folio_manif, $folio->idEmpresa);
				if($resp['status'] === "ok"){
					$data[] = $folio;
					$update = array(
						"url" =>  $resp['ruta_db'],
						"nombre_folio" =>  $resp['nombre_file_db'],
						"updatedby" => $LoggedUserId,
						"updateddate" => date("Y-m-d H:i:s")
					);	

					$update = $this->modelArmas->updateFolioMani($update, $folio->id);
					if ($update) {
						$succes = ["mensaje" => 'Actualizado con Exito', "succes" => "succes"];
					} else {
						$dontSucces = ["error" => "error", "mensaje" => "No se actualizo el registro"];
					}
				}else{
					$dontSucces = ["error" => "error", "mensaje" => $resp['msg']];
				}
			}

		} else {	
			$errors = $this->validator->getErrors();
		}
		$this->db->transComplete();

		echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $resp]);

	}


	private function _buscarArchivoEnCarpetas($nombre, $idEmpresa) {


		$carpetas = [WRITEPATH."files/SETER_MATRICULAS_Y_FOLIOS_TRASLADO", WRITEPATH."files/SERPROSEP_MATRICULAS_Y_FOLIOS", WRITEPATH."files/HOJAS_ROSAS_1"];
	    $res = array(
			"status" => "error",
			"msg" => "No se econtro el Archivo"
		);
		
		foreach ($carpetas as $carpeta) {
		
			$archivosCoincidentes = glob($carpeta . '/*' . $nombre . '*');
			if(count($archivosCoincidentes) == 1){
				if (!empty($archivosCoincidentes)) {
					$name_file = explode("/", $archivosCoincidentes[0]);
					$getRuta = WRITEPATH . 'uploads/files/FolioManifiesto/'.date("Y").'/'.date("m").'/'.$idEmpresa.'/'.$name_file[2];

					$directorio = WRITEPATH . 'uploads/files/FolioManifiesto/'.date("Y").'/'.date("m").'/'.$idEmpresa.'/'; 
					$res = $name_file;
					if (!is_dir($directorio)) {
						mkdir($directorio, 0777, true);
					}
					if (rename($archivosCoincidentes[0], $getRuta)) {
						$res = array(
							"status" => "ok",
							"ruta_file" => $archivosCoincidentes[0],
							"nombre_file_db" => $this->encrypt->Encrypt($name_file[7]),
							"ruta_db" => $this->encrypt->Encrypt($directorio)
						);
					} else {
						$res = array(
							"status" => "error",
							"msg" => "No se pudo Cargar el archivo al Servidor"
						);
					}
				}else{
					$res = array(
						"status" => "error",
						"msg" => "No se econtro el Archivo"
					);
				}
			}
		}

		return $res;
	}
	
}