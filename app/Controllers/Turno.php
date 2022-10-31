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
			$resultData = $this->modelTurno->GetTurnosAll();
			$result = [];


			foreach ( $resultData as $v){
				
				$id = $this->encrypt->Encrypt($v->id);
				$result[] = (object) array (
					'id' => $id ,
					'idCliente' => $v->razon_social,
					'idUbicacion' => $v->nombre_ubicacion,
                    'idTurno' => $v->turno,
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
            
			$data['cliente'] = $this->modelTurno->getClientes();

			$data['turnos'] = $this->modelTurno->GetTurnos();

			$data['horarios'] = $this->modelTurno->GetHorarios();

			$data['breadcrumb'] = ["inicio" => 'Turno' ,
                    				"url" => 'turnos',
                    				"titulo" => 'Agregar'];

			
			return view('Turnos/addTurnos', $data);
		}	
	}

    public function AgregarTurnos(){
		//helper(['form']);
		if ($this->request->getMethod() == "post" && $this->request->getvar(['cliente, ubicacion, turno, horario'],FILTER_SANITIZE_STRING)){


				$rules = [
				'cliente' =>  ['label' => "Cliente", 'rules' => 'required'],
				'ubicacion' =>  ['label' => "Ubicación", 'rules' => 'required'],
				'turno' =>  ['label' => "Turno", 'rules' => 'required'],
				'horario' =>  ['label' => "Horario", 'rules' => 'required']];
		 
				$errors = [];
				$succes = [];
				$dontSucces = [];
				$data = [];


				if($this->validate($rules)){
					
					$getUser = session()->get('IdUser');
					$LoggedUserId = $this->encrypter->decrypt($getUser);
					$empresa = session()->get('empresa');
					$idEmpresa = $this->encrypter->decrypt($empresa);
					$TodayDate = date("Y-m-d H:i:s");
					$uuid = Uuid::uuid4();
        			$id = $uuid->toString();

        			$getCliente = $this->request->getPost('cliente');
					$cliente = $this->encrypt->Decrytp($getCliente);

					$getUbicacion = $this->request->getPost('ubicacion');
					$ubicacion = $this->encrypt->Decrytp($getUbicacion);

					$getTurno = $this->request->getPost('turno');
					$turno = $this->encrypt->Decrytp($getTurno);

					$getHorario = $this->request->getPost('horario');
					$horario = $this->encrypt->Decrytp($getHorario);
                    
					$turnoArray = array(

						"id" =>  $id , 
						"idCliente" =>  $cliente , 
						"idUbicacion" =>  $ubicacion , 
						"idTurnos" =>  $turno , 
						"idHorario" => $horario  , 
						"activo" =>  1 , 
						"createdby" =>  $LoggedUserId , 
						"createddate" => $TodayDate
                        
                    );

					$result = $this->modelTurno->SaveTurno($turnoArray);

                    if ($result) {

            			
                    	$succes = ["mensaje" => 'Turno agregado con exito' ,
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


	public function Ubicaciones(){
		if ($this->request->getMethod() == "post" && $this->request->getvar(['cliente'])){
			$errors = [];
            $succes = [];
            $dontSucces = [];
            $data = [];

			$rules = [
				'cliente' =>  'required'];
				
				$errors = [];
				$succes = [];
				$dontSucces = [];
				$data = [];
				
				if($this->validate($rules)){
					

					$getCliente = $this->request->getPost('cliente');

					$cliente = $this->encrypt->Decrytp($getCliente);


					
					$getUbicaciones = $this->modelTurno->getUbicaciones($cliente);

					

                    if ($getUbicaciones ) {

                    	$ubicaciones = '<option value="">Selecciona una Ubicación</option>';
                    	
                    	foreach ( $getUbicaciones as $v){
				
							$id = $this->encrypt->Encrypt($v->id);
							$ubicaciones.=  '<option value="'.$id.'">'.$v->nombre_ubicacion.'</option>';

							
						
						}

						
                    	
                    	$data['ubicaciones']= $ubicaciones;
                    	
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

}