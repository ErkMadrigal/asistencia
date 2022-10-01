<?php namespace App\Controllers;

use App\Models\ArmasModel;
use App\Libraries\Crud_email;
use App\Libraries\Menu;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;

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
				
				$id = $this->encrypt->Encrypt($v->id);
				$result[] = (object) array (
					'id' => $id ,
					'matricula' => $v->matricula,
					'folio_manif' => $v->folio_manif,
                    'idClase' => $v->idClase,
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
			$id = $this->encrypt->Decrytp($getId);
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
			$id = $this->encrypt->Decrytp($getId);
			$idAdmin = session()->get('IdUser');

			
			$data['arma'] = $this->modelArmas->GetArmaById($id);
            $data['id'] = $this->encrypt->Encrypt($id);

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

			$data['clase']=$this->modelArmas->GetClase($idEmpresa);
            $data['calibre']=$this->modelArmas->GetCalibre($idEmpresa);
            $data['modelo']=$this->modelArmas->GetModelo($idEmpresa);
            $data['marca']=$this->modelArmas->GetMarca($idEmpresa);

			$id = session()->get('IdUser');
        	$idUser = $this->encrypter->decrypt($id);
			
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
                'modelo' =>  ['label' => "Modelo", 'rules' => 'required']];
		 
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
					$result = $this->modelArmas->insertItemAndSelect('armas', $this->request->getPost() , 'armas',$LoggedUserId , $idEmpresa, $idClase,$idCalibre,$idMarca,$idModelo);

                    if ($result) {

            			
                    	$succes = ["mensaje" => 'Arma Agregada con exito' ,
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