<?php namespace App\Controllers;

use App\Models\ReferenciaModel;
use App\Libraries\Menu;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Referencia extends BaseController { 
    private $encrypter;
	private $menu;
	private $encrypt;
	private $db;
	private $modelReferencia;
    public function __construct()
	{
		$this->menu = new Menu();
		$this->encrypt = new Encrypt();
		$this->encrypter = \Config\Services::encrypter();
        $this->db =  \Config\Database::connect('default');
		$this->modelReferencia = new ReferenciaModel($this->db);
		
	}

    public function GetReferencias(){
		if ($this->request->getMethod() == "get"){

			$data['modulos'] = $this->menu->Permisos();
			$empresa = session()->get('empresa');
			$idEmpresa = $this->encrypter->decrypt($empresa);
			$resultData = $this->modelReferencia->GetReferencia($idEmpresa);
			$result = [];


			foreach ( $resultData as $v){
				
				$id = $this->encrypt->Encrypt($v->id);
				$result[] = (object) array (
					'id' => $id ,
					'parentesco' => $v->parentesco,
					'idReferencia' => $v->tipo_referencia,
					'activo' => $v->activo
				) ;
			}
		
			$dataCrud = [
                'data' => $result]; 

        	$data['referencias'] = $dataCrud['data'];

            //var_dump($resultData);
            //var_dump($data["referencias"]);

			
			return view('Referencias/referencia', $data);
          

		}	

    }

    public function DetalleReferencia(){
		if ($this->request->getMethod() == "get" && $this->request->getvar(['id'],FILTER_SANITIZE_STRING)){

			$data['modulos'] = $this->menu->Permisos();

			$getId = str_replace(" ", "+", $_GET['id']);
			$id = $this->encrypt->Decrytp($getId);
			$idAdmin = session()->get('IdUser');

        	$data['referencias'] = $this->modelReferencia->GetReferenciaById($id);
        	
			
			$data['breadcrumb'] = ["inicio" => 'Referencias' ,
                    				"url" => 'referencias',
                    				"titulo" => 'Detalle'];
		
			return view('Referencias/detailReferencia', $data);
		}	
	}

    public function EditarReferencia(){
		if ($this->request->getMethod() == "get" && $this->request->getvar(['id'],FILTER_SANITIZE_STRING)){

			$data['modulos'] = $this->menu->Permisos();
			
			$getId = str_replace(" ", "+", $_GET['id']);
			$id = $this->encrypt->Decrytp($getId);
			$idAdmin = session()->get('IdUser');

			
			$data['referencias'] = $this->modelReferencia->GetReferenciaById($id);
            $data['id'] = $this->encrypt->Encrypt($id);

			$data['breadcrumb'] = ["inicio" => 'Referencia' ,
                    				"url" => 'referencias',
                    				"titulo" => 'Editar'];
			return view('Referencias/editReferencia', $data);
		}	
	}

    public function SaveReferencia(){

		if($this->request->getMethod() == "post" && $this->request->getvar(['id'],FILTER_SANITIZE_STRING)) {

			$rules = ['id' =>  ['label' => '', 'rules' =>'required']];

				$errors = [];
				$succes = [];
				$dontSucces = [];
				$data = [];
				
				if($this->validate($rules)){
                    $getUser = session()->get('IdUser');
					$LoggedUserId = $this->encrypter->decrypt($getUser);
					$TodayDate = date("Y-m-d H:i:s");
					$idModi = $this->request->getPost('id');
					$idReferencia = $this->encrypt->Decrytp($idModi);	
					$updateEmpresa = array(
                        "activo" => $this->request->getPost('activo'),
                        "updatedby" => $LoggedUserId,
                		"updateddate" => $TodayDate
                    );

					$referenci = $this->modelReferencia->saveRefe($updateEmpresa, $idReferencia);

					if ($referenci){

						$succes = ["mensaje" => 'La referencia ha sido editada con exito' ,
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

	public function AgreRefe(){
		if ($this->request->getMethod() == "get"){

            $getEmpresa = session()->get('empresa');
            $idEmpresa = $this->encrypter->decrypt($getEmpresa);

			$data['modulos'] = $this->menu->Permisos();
			$data['tipo'] = $this->modelReferencia->GetTipoReferencia();


			$data['breadcrumb'] = ["inicio" => 'Referencia' ,
                    				"url" => 'referencias',
                    				"titulo" => 'Agregar Referencia'];

			
			return view('Referencias/addReferencia', $data);
		}	
	}

    public function AgregarReferencia(){
		//helper(['form']);
		if ($this->request->getMethod() == "post" && $this->request->getvar(['parentesco,cve_parentesco,tipo_referencia'],FILTER_SANITIZE_STRING)){

				$getEmpresa = session()->get('empresa');
				$idEmpresa = $this->encrypter->decrypt($getEmpresa);

				

				$rules = [
				'parentesco' =>  ['label' => "Parentesco", 'rules' => 'required|max_length[255]'],
				'cve_parentesco' =>  ['label' => "Clave Parentesco", 'rules' => 'required|max_length[255]'],
                'tipo_referencia' =>  ['label' => "Tipo Referencia", 'rules' => 'required|integer|in_list[1,2,3,4]']];
		 
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
        			$idReferencia = $uuid->toString();
                    
					$result = $this->modelReferencia->insertItemAndSelect('catalogo_referencias', $this->request->getPost() , 'catalogo_referencias',$LoggedUserId , $idEmpresa, $idReferencia);

                    if ($result) {

            			
                    	$succes = ["mensaje" => 'Referencia agregada con exito' ,
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