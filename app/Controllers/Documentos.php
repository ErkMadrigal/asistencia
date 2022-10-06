<?php namespace App\Controllers;

use App\Models\CatDocumentosModel;
use App\Libraries\Crud_email;
use App\Libraries\Menu;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;

class Documentos extends BaseController {
    private $encrypter;
	private $menu;
	private $encrypt;
	private $db;
	private $modelDocumentos;

    public function __construct(){
		$this->menu = new Menu();
		$this->encrypt = new Encrypt();
		$this->encrypter = \Config\Services::encrypter();
        $this->db =  \Config\Database::connect('default');
		$this->modelDocumentos = new CatDocumentosModel($this->db);
    }

    public function GetDocumentos(){
		if ($this->request->getMethod() == "get"){

			$data['modulos'] = $this->menu->Permisos();
			$empresa = session()->get('empresa');
			$idEmpresa = $this->encrypter->decrypt($empresa);
			 $resultData = $this->modelDocumentos->GetDocumentos($idEmpresa);
			 $result = [];
			foreach ( $resultData as $v){
				
				$id = $this->encrypt->Encrypt($v->id);
				$result[] = (object) array (
					'id' => $id ,
					'documento' => $v->documento,
					'tipo' => $v->tipo,
					'valor' => $v->valor,
					'activo' => $v->activo

				) ;
			}
		
			 $dataCrud = [
                 'data' => $result]; 

         	$data['documentos'] = $dataCrud['data'];

			
			return view('Documentos/documentos', $data);
		}	
    }


    public function EditarDocumento(){
		if ($this->request->getMethod() == "get" && $this->request->getvar(['id'],FILTER_SANITIZE_STRING)){

			$data['modulos'] = $this->menu->Permisos();
			
			$getId = str_replace(" ", "+", $_GET['id']);
			$id = $this->encrypt->Decrytp($getId);
			$idAdmin = session()->get('IdUser');

			
			$data['documento'] = $this->modelDocumentos->GetDocumentoById($id);
            $data['id'] = $this->encrypt->Encrypt($id);

			$data['breadcrumb'] = ["inicio" => 'Documentos' ,
                    				"url" => 'catDocumentos',
                    				"titulo" => 'Editar'];
			return view('Documentos/editDocumento', $data);
		}	
	}
    public function SaveDocumento(){

		if($this->request->getMethod() == "post" && $this->request->getvar(['tipo', 'id'],FILTER_SANITIZE_STRING)) {

			$rules = ['id' =>  ['label' => '', 'rules' =>'required'],
                'tipo' =>  [ 'label' => 'valor', 'rules' => 'required|in_list[ORIGINAL,COPIA]']];

				$errors = [];
				$succes = [];
				$dontSucces = [];
				$data = [];
				
				if($this->validate($rules)){
					$getEmpresa = session()->get('empresa');
					$idEmpresa = $this->encrypter->decrypt($getEmpresa);
                    $getUser = session()->get('IdUser');
					$LoggedUserId = $this->encrypter->decrypt($getUser);
					$TodayDate = date("Y-m-d H:i:s");
					$idDoc = $this->request->getPost('id');
					$idDocumento = $this->encrypt->Decrytp($idDoc);	
					$updateDocumento = array(
                        "activo" => $this->request->getPost('activo'),
		    			"tipo" =>  $_POST["tipo"],
                        "updatedby" => $LoggedUserId,
                		"updateddate" => $TodayDate
                    );

					$registrar = $this->modelDocumentos->saveDocumento($updateDocumento, $idDocumento);

					if ($registrar){

						$succes = ["mensaje" => 'Documento editado con exito' ,
                            	   "succes" => "succes"];
					} else {

						$dontSucces = ["error" => "error",
                    				  "mensaje" => 	'Hubo un error al editar el docuemento' ];
					}
					
				} else {

					$errors = $this->validator->getErrors();
				}

			}
			echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
	}

    public function DetalleDocumentos(){
		if ($this->request->getMethod() == "get" && $this->request->getvar(['id'],FILTER_SANITIZE_STRING)){

			$data['modulos'] = $this->menu->Permisos();

			$getId = str_replace(" ", "+", $_GET['id']);
			$id = $this->encrypt->Decrytp($getId);
			
        	$data['documento'] = $this->modelDocumentos->GetDocumentoById($id);
        	
			
			$data['breadcrumb'] = ["inicio" => 'Documentos' ,
                    				"url" => 'catDocumentos',
                    				"titulo" => 'Detalle'];
		
			return view('Documentos/detailDocumento', $data);
		}	
	}

	public function AgregarDocumento(){
		if ($this->request->getMethod() == "get"){

            $getEmpresa = session()->get('empresa');
            $idEmpresa = $this->encrypter->decrypt($getEmpresa);
			$data['modulos'] = $this->menu->Permisos();
			$data['modalidad'] = $this->modelDocumentos->GetModalidad($idEmpresa);
			$data['breadcrumb'] = ["inicio" => 'Documentos' ,
                    				"url" => 'catDocumentos',
                    				"titulo" => 'Agregar'];

			return view('Documentos/addDocumento', $data);
		}	
	}

    public function AgregarDoc(){
		//helper(['form']);
		if ($this->request->getMethod() == "post" && $this->request->getvar(['modalidad,documento,tipo'],FILTER_SANITIZE_STRING)){

				$getEmpresa = session()->get('empresa');
				$idEmpresa = $this->encrypter->decrypt($getEmpresa);

				

				$rules = [
				'modalidad' =>  ['label' => "Modalidad", 'rules' => 'required'],
				'documento' =>  ['label' => "Documento", 'rules' => 'required|max_length[255]'],
                'tipo' =>  ['label' => "Tipo", 'rules' => 'required|in_list[ORIGINAL,COPIA]']];
		 
				$errors = [];
				$succes = [];
				$dontSucces = [];
				$data = [];


				if($this->validate($rules)){
					
					$getUser = session()->get('IdUser');
					$LoggedUserId = $this->encrypter->decrypt($getUser);
					$empresa = session()->get('empresa');
					$idEmpresa = $this->encrypter->decrypt($empresa);
					$getModalidad = $this->request->getPost('modalidad');
					$idModalidad = $this->encrypt->Decrytp($getModalidad);
                    
					$result = $this->modelDocumentos->insertItemAndSelect('documentos_expediente_digital', $this->request->getPost() ,$LoggedUserId , $idEmpresa, $idModalidad);

                    if ($result) {

            			
                    	$succes = ["mensaje" => 'Documento agregado con exito' ,
                            	   "succes" => "succes"];

                           	   
                    	
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



}