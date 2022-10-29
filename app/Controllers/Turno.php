<?php namespace App\Controllers;

use App\Models\TurnoModel;
use App\Libraries\Crud_email;
use App\Libraries\Menu;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;

class Turno extends BaseController {

    private $encrypter;
	private $menu;
	private $encrypt;
	private $db;
	private $modelTurno;

    public function __construct()
	{
		$this->menu = new Menu();
		$this->encrypt = new Encrypt();
		$this->encrypter = \Config\Services::encrypter();
        $this->db =  \Config\Database::connect('default');
		$this->modelTurno = new TurnoModel($this->db);
		
	}

    public function GetTurno(){
		if ($this->request->getMethod() == "get"){

			$data['modulos'] = $this->menu->Permisos();
			$empresa = session()->get('empresa');
			$idEmpresa = $this->encrypter->decrypt($empresa);
			$resultData = $this->modelTurno->GetTurnos($idEmpresa);
			$result = [];


			foreach ( $resultData as $v){
				
				$id = $this->encrypt->Encrypt($v->id);
				$result[] = (object) array (
					'id' => $id ,
					'idCliente' => $v->cliente,
					'idUbicacion' => $v->ubicacion,
                    'idTurno' => $v->turnos,
					'activo' => $v->activo

				) ;
			}
		
			$dataCrud = [
                'data' => $result]; 

        	$data['turno'] = $dataCrud['data'];

			
			return view('Turnos/turnos', $data);
		}	
    }

    public function DetalleTurno(){
		if ($this->request->getMethod() == "get" && $this->request->getvar(['id'],FILTER_SANITIZE_STRING)){

			$data['modulos'] = $this->menu->Permisos();

			$getId = str_replace(" ", "+", $_GET['id']);
			$id = $this->encrypt->Decrytp($getId);
			$idAdmin = session()->get('IdUser');

        	$data['turno'] = $this->modelTurno->GetTurnoById($id);
        	
			
			$data['breadcrumb'] = ["inicio" => 'Turno' ,
                    				"url" => 'turnos',
                    				"titulo" => 'Detalle'];
		
			return view('Turnos/detailTurnos', $data);
		}	
	}

    public function EditarTurno(){
		if ($this->request->getMethod() == "get" && $this->request->getvar(['id'],FILTER_SANITIZE_STRING)){

			$data['modulos'] = $this->menu->Permisos();
			
			$getId = str_replace(" ", "+", $_GET['id']);
			$id = $this->encrypt->Decrytp($getId);
			$idAdmin = session()->get('IdUser');

			
            $data['turno'] = $this->modelTurno->GetTurnoById($id);
            $data['id'] = $this->encrypt->Encrypt($id);

			$data['breadcrumb'] = ["inicio" => 'Turno' ,
                    				"url" => 'turnos',
                    				"titulo" => 'Editar'];
			return view('Turnos/editTurnos', $data);
		}	
	}

    public function SaveTurno(){

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
					$idCliente = $this->encrypt->Decrytp($idModi);	
					$updateEmpresa = array(

                        "activo" => $this->request->getPost('activo'),
                        "updatedby" => $LoggedUserId,
                		"updateddate" => $TodayDate
                    );

					$turno = $this->modelCliente->Savecliente($updateEmpresa, $idC);

					if ($turno){

						$succes = ["mensaje" => 'El Turno ha sido editado con exito' ,
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

	public function AgregaTurno(){
		if ($this->request->getMethod() == "get"){

            $getEmpresa = session()->get('empresa');
            $idEmpresa = $this->encrypter->decrypt($getEmpresa);

			$data['modulos'] = $this->menu->Permisos();
            $data['turno'] = $this->modelTurno->GetTurnoById($id);


			$data['breadcrumb'] = ["inicio" => 'Turno' ,
                    				"url" => 'turnos',
                    				"titulo" => 'Agregar Turno'];

			
			return view('Puesto/addPuesto', $data);
		}	
	}

    public function AgregarTurnos(){
		//helper(['form']);
		if ($this->request->getMethod() == "post" && $this->request->getvar(['parentesco,cve_parentesco,tipo_referencia'],FILTER_SANITIZE_STRING)){

				$getEmpresa = session()->get('empresa');
				$idEmpresa = $this->encrypter->decrypt($getEmpresa);

				

				$rules = [
				'razon_social' =>  ['label' => "Razon social", 'rules' => 'required|max_length[255]'],
				'nombre_corto' =>  ['label' => "Nombre Corto", 'rules' => 'required|max_length[255]'],
                'email' =>  ['label' => "Email", 'rules' => 'required|integer|max_length[255]']];
		 
				$errors = [];
				$succes = [];
				$dontSucces = [];
				$data = [];


				if($this->validate($rules)){
					
					$getUser = session()->get('IdUser');
					$LoggedUserId = $this->encrypter->decrypt($getUser);
					$empresa = session()->get('empresa');
					$idEmpresa = $this->encrypter->decrypt($empresa);
					
				
                    
					$result = $this->modelCliente->insertItemAndSelect('cliente', $this->request->getPost() , 'cliente',$LoggedUserId , $idEmpresa);

                    if ($result) {

            			
                    	$succes = ["mensaje" => 'El cliente agregada con exito' ,
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