<?php namespace App\Controllers;

use App\Models\UbicacionModel;
use App\Libraries\Crud_email;
use App\Libraries\Menu;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;

class Ubicacion extends BaseController {

    private $encrypter;
	private $menu;
	private $encrypt;
	private $db;
	private $modelUbica;

    public function __construct()
	{
		$this->menu = new Menu();
		$this->encrypt = new Encrypt();
		$this->encrypter = \Config\Services::encrypter();
        $this->db =  \Config\Database::connect('default');
		$this->modelUbica = new UbicacionModel($this->db);
		
	}

    public function GetUbica(){
		if ($this->request->getMethod() == "get"){

			$data['modulos'] = $this->menu->Permisos();
			$empresa = session()->get('empresa');
			$idEmpresa = $this->encrypter->decrypt($empresa);
			$getId = str_replace(" ", "+", $_GET['id']);
			$idCliente = $this->encrypt->Decrytp($getId);
			$resultData = $this->modelUbica->GetUbicacion($idCliente);
			$cliente = $this->modelUbica->GetCliente($idCliente); 
			$result = [];


			foreach ( $resultData as $v){
				
				$id = $this->encrypt->Encrypt($v->id);
				$result[] = (object) array (
					'id' => $id ,
					'idCliente' => $v->razon_social,
					'nombre_ubicacion' => $v->nombre_ubicacion,
					'activo' => $v->activo

				) ;

				
			}
		
			$dataCrud = [
                'data' => $result];

            $data['cliente'] = $cliente;
            $data['idCliente'] =  $this->encrypt->Encrypt($idCliente);
        	$data['ubicacion'] = $dataCrud['data'];

        	$data['breadcrumb'] = ["inicio" => 'Clientes' ,
                    				"url" => 'clientes',
                    				"titulo" => 'Ubicaciones'];

			
			return view('Ubicacion/ubicacioncatalogo', $data);
		}	
    }

    public function DetalleUbicacion(){
		if ($this->request->getMethod() == "get" && $this->request->getvar(['id'],FILTER_SANITIZE_STRING)){

			$data['modulos'] = $this->menu->Permisos();

			$getId = str_replace(" ", "+", $_GET['id']);
			$id = $this->encrypt->Decrytp($getId);
			$idAdmin = session()->get('IdUser');

        	$data['ubicacion'] = $this->modelUbica->GetUbicacionById($id);

        	
        	
			
			$data['breadcrumb'] = ["inicio" => 'Ubicaciones' ,
                    				"url" => 'ubicacioncatalogo?id='.$this->encrypt->Encrypt($data['ubicacion']->id),
                    				"titulo" => 'Detalle'];
		
			return view('Ubicacion/detailUbicacion', $data);
		}	
	}

    public function EditarUbicacion(){
		if ($this->request->getMethod() == "get" && $this->request->getvar(['id'],FILTER_SANITIZE_STRING)){

			$data['modulos'] = $this->menu->Permisos();
			
			$getId = str_replace(" ", "+", $_GET['id']);
			$id = $this->encrypt->Decrytp($getId);
			$idAdmin = session()->get('IdUser');

			
            
            $data['id'] = $this->encrypt->Encrypt($id);

            $data['ubicacion'] = $this->modelUbica->GetUbicacionById($id);

			$data['breadcrumb'] = ["inicio" => 'Ubicaciones' ,
                    				"url" => 'ubicacioncatalogo?id='.$this->encrypt->Encrypt($data['ubicacion']->id),
                    				"titulo" => 'Editar'];
			return view('Ubicacion/editUbicacion', $data);
		}	
	}

    public function SaveUbicacion(){

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
					$idUbicacion = $this->encrypt->Decrytp($idModi);	
					$ubicacion = array(

						
                        "activo" => $this->request->getPost('activo'),
                        "updatedby" => $LoggedUserId,
                		"updateddate" => $TodayDate
                    );

					$ubi = $this->modelUbica->Savecliente($ubicacion, $idUbicacion);

					if ($ubi){

						$succes = ["mensaje" => 'La Ubicacion ha sido editado con exito' ,
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

	public function AgregaUbicacion(){
		if ($this->request->getMethod() == "get"){

            $getEmpresa = session()->get('empresa');
            $idEmpresa = $this->encrypter->decrypt($getEmpresa);
            $getId = str_replace(" ", "+", $_GET['id']);
			$idCliente = $this->encrypt->Decrytp($getId);
			$cliente = $this->modelUbica->GetCliente($idCliente);
			$data['modulos'] = $this->menu->Permisos();
			$data['zona'] = $this->modelUbica->GetZona($idEmpresa);
			$data['region'] = $this->modelUbica->GetRegion($idEmpresa);
			$data['cliente'] = $cliente;

			$data['breadcrumb'] = ["inicio" => 'Ubicaciones' ,
                    				"url" => 'ubicacioncatalogo?id='.$this->encrypt->Encrypt($idCliente),
                    				"titulo" => 'Agregar'];

			
			return view('Ubicacion/addUbicacion', $data);
		}	
	}

    public function AgregarUbicacion(){
		//helper(['form']);
		if ($this->request->getMethod() == "post" && $this->request->getvar(['cliente, ubicacion, calle, codigo, coloniacodigo, municipiocodigo, ciudadcodigo, estadocodigo,region,zona,latitud,longitud'],FILTER_SANITIZE_STRING)){


				$rules = [
				'cliente' =>  ['label' => "Cliente", 'rules' => 'required'],
				'ubicacion' =>  ['label' => "Ubicación", 'rules' => 'required|max_length[255]'],
				'calle' =>  ['label' => "Calle y Número", 'rules' => 'required|max_length[255]'],
				'codigo' =>  ['label' => "Código Postal", 'rules' => 'required|integer|max_length[5]'],
				'coloniacodigo' =>  ['label' => "Colonia", 'rules' => 'required'],
				'municipiocodigo' =>  ['label' => "Municipio", 'rules' => 'required'],
				'ciudadcodigo' =>  ['label' => "Ciudad", 'rules' => 'required'],
				'estadocodigo' =>  ['label' => "Estado", 'rules' => 'required'],
				'zona' =>  ['label' => "Zona", 'rules' => 'required'],
				'region' =>  ['label' => "Región", 'rules' => 'required'],
				'latitud' =>  ['label' => "Latitud", 'rules' => 'max_length[15]'],
				'longitud' =>  ['label' => "Longitud", 'rules' => 'max_length[15]']];
		 
				$errors = [];
				$succes = [];
				$dontSucces = [];
				$data = [];


				if($this->validate($rules)){
					
					$getUser = session()->get('IdUser');
					$LoggedUserId = $this->encrypter->decrypt($getUser);
					$TodayDate = date("Y-m-d H:i:s");
					
					$uuid = Uuid::uuid4();
        			$id = $uuid->toString();

        			$getCliente = $this->request->getPost('cliente');
					$idCliente = $this->encrypt->Decrytp($getCliente);

					$getRegion = $this->request->getPost('region');
					$idRegion = $this->encrypt->Decrytp($getRegion);

					$getZona = $this->request->getPost('zona');
					$idZona = $this->encrypt->Decrytp($getZona);
                    
					$ubicacion = array(

						"id" =>  $id , 
						"idCliente" =>  $idCliente ,
						"idZona" => $idZona,
						"idRegion" => $idRegion,
						"longitud" => $this->request->getPost('longitud'),
						"latitud" => $this->request->getPost('latitud'), 
						"nombre_ubicacion" =>  $this->request->getPost('ubicacion') , 
						"calle_num" =>  $this->request->getPost('calle') , 
						"idCodigoPostal" =>  $this->request->getPost('codigo') , 
						"colonia" =>  $this->request->getPost('coloniacodigo') , 
						"municipio" => $this->request->getPost('municipiocodigo')  , 
						"ciudad" => $this->request->getPost('ciudadcodigo')  , 
						"estado" =>  $this->request->getPost('estadocodigo') , 
						"activo" =>  1 , 
						"createdby" =>  $LoggedUserId , 
						"createddate" => $TodayDate
                        
                    );

					$result = $this->modelUbica->SaveUbicacion($ubicacion);

                    if ($result) {

            			
                    	$succes = ["mensaje" => 'Ubicación agregada con exito' ,
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