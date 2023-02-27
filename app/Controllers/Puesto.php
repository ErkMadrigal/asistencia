<?php namespace App\Controllers;

use App\Models\PuestoModel;
use App\Libraries\Crud_email;
use App\Libraries\Menu;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;

class Puesto extends BaseController {

    private $encrypter;
	private $menu;
	private $encrypt;
	private $db;
	private $modelPuesto;

    public function __construct()
	{
		$this->menu = new Menu();
		$this->encrypt = new Encrypt();
		$this->encrypter = \Config\Services::encrypter();
        $this->db =  \Config\Database::connect('default');
		$this->modelPuesto = new PuestoModel($this->db);
		
	}

    public function GetPuestos(){
		if ($this->request->getMethod() == "get"){

			$data['modulos'] = $this->menu->Permisos();
			$empresa = session()->get('empresa');
			$idEmpresa = $this->encrypter->decrypt($empresa);
			$getId = str_replace(" ", "+", $_GET['id']);
			$idCliente = $this->encrypt->Decrytp($getId);
			$resultData = $this->modelPuesto->GetPuesto($idCliente);
			$cliente = $this->modelPuesto->GetCliente($idCliente);
			$result = [];


			foreach ( $resultData as $v){
				
				$id = $this->encrypt->Encrypt($v->id);
				$result[] = (object) array (
					'id' => $id ,
					'idCliente' => $v->razon_social,
					'idUbicacion' => $v->nombre_ubicacion,
                    'idTurno' => $v->turnos,
					'idPuestos' => $v->puesto,
					'activo' => $v->activo

				) ;
			}
		
			$dataCrud = [
                'data' => $result];

            $data['cliente'] = $cliente;     
            $data['idCliente'] =  $this->encrypt->Encrypt($idCliente);
        	$data['puesto'] = $dataCrud['data'];

        	$data['breadcrumb'] = ["inicio" => 'Clientes' ,
                    				"url" => 'clientes',
                    				"titulo" => 'Puestos'];

			
			return view('Puesto/puesto', $data);
		}	
    }

    public function DetallePuesto(){
		if ($this->request->getMethod() == "get" && $this->request->getvar(['id'],FILTER_SANITIZE_STRING)){

			$data['modulos'] = $this->menu->Permisos();

			$getId = str_replace(" ", "+", $_GET['id']);
			$id = $this->encrypt->Decrytp($getId);
			$idAdmin = session()->get('IdUser');

        	$data['Puesto'] = $this->modelPuesto->GetPuestoById($id);
        	
			
			$data['breadcrumb'] = ["inicio" => 'Puestos' ,
                    				"url" => 'puestocatalogo?id='.$this->encrypt->Encrypt($data['Puesto']->id),
                    				"titulo" => 'Detalle'];
		
			return view('Puesto/detailPuesto', $data);
		}	
	}

    public function EditarCliente(){
		if ($this->request->getMethod() == "get" && $this->request->getvar(['id'],FILTER_SANITIZE_STRING)){

			$data['modulos'] = $this->menu->Permisos();
			
			$getId = str_replace(" ", "+", $_GET['id']);
			$id = $this->encrypt->Decrytp($getId);
			$idAdmin = session()->get('IdUser');

			
            $data['Puesto'] = $this->modelPuesto->GetPuestoById($id);
            $data['id'] = $this->encrypt->Encrypt($id);

			$data['breadcrumb'] = ["inicio" => 'Puestos' ,
                    				"url" => 'puestocatalogo?id='.$this->encrypt->Encrypt($data['Puesto']->id),
                    				"titulo" => 'Editar'];
			return view('Puesto/editPuesto', $data);
		}	
	}

    public function SavePuesto(){

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
					$idPuesto = $this->encrypt->Decrytp($idModi);	
					$updatePuesto = array(
                        "activo" => $this->request->getPost('activo'),
                        "updatedby" => $LoggedUserId,
                		"updateddate" => $TodayDate
                    );

					$puesto = $this->modelPuesto->Savecliente($updatePuesto, $idPuesto);

					if ($puesto){

						$succes = ["mensaje" => 'El Puesto ha sido editado con exito' ,
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

	public function AgregaPuesto(){
		if ($this->request->getMethod() == "get"){

            $getEmpresa = session()->get('empresa');
            $idEmpresa = $this->encrypter->decrypt($getEmpresa);

			$data['modulos'] = $this->menu->Permisos();
            
			$getId = str_replace(" ", "+", $_GET['id']);
			$idCliente = $this->encrypt->Decrytp($getId);
			$cliente = $this->modelPuesto->GetCliente($idCliente);

			$data['cliente'] = $cliente;
			$data['ubicaciones'] = $this->modelPuesto->getUbicaciones($idCliente);
			$data['breadcrumb'] = ["inicio" => 'Puestos' ,
                    				"url" => 'puestocatalogo?id='.$this->encrypt->Encrypt($idCliente),
                    				"titulo" => 'Agregar'];

			
			return view('Puesto/addPuesto', $data);
		}	
	}

    public function AgregarPuesto(){
		//helper(['form']);
		if ($this->request->getMethod() == "post" && $this->request->getvar(['cliente, ubicacion, turno, puesto, numGuardias, cantSinarmas,cantArmaCorta, cantArmaLarga'],FILTER_SANITIZE_STRING)){


				$rules = [
				'cliente' =>  ['label' => "Cliente", 'rules' => 'required'],
				'ubicacion' =>  ['label' => "Ubicación", 'rules' => 'required'],
				'turno' =>  ['label' => "Turno", 'rules' => 'required'],
				'puesto' =>  ['label' => "Puesto", 'rules' => 'required|max_length[255]'],
				'numGuardias' =>  ['label' => "Numero de Guardias", 'rules' => 'required|max_length[255]'],
				'cantArmaCorta' =>  ['label' => "Cantidad Arma Corta", 'rules' => 'required|max_length[255]'],
				'cantSinarmas' =>  ['label' => "Cantidad Sin Arma", 'rules' => 'required|max_length[255]'],
				'cantArmaLarga' =>  ['label' => "Cantidad Arma Larga", 'rules' => 'required|max_length[255]']];
		 
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

        			$getCliente = $this->request->getPost('cliente');
					$idCliente = $this->encrypt->Decrytp($getCliente);


					$getUbicacion = $this->request->getPost('ubicacion');
					$ubicacion = $this->encrypt->Decrytp($getUbicacion);

					$getTurno = $this->request->getPost('turno');
					$turno = $this->encrypt->Decrytp($getTurno);

					$TodayDate = date("Y-m-d H:i:s");
                    
					$puesto = array(

						"id" =>  $id , 
						"idCliente" =>  $idCliente , 
						"idUbicacion" =>  $ubicacion , 
						"idTurno" =>  $turno , 
						"puesto" =>  $this->request->getPost('puesto') , 
						"num_guardias" =>  $this->request->getPost('numGuardias') , 
						"cant_arma_corta" =>  $this->request->getPost('cantArmaCorta') , 
						"cant_arma_larga" => $this->request->getPost('cantArmaLarga')  , 
						"cant_sin_arma" => $this->request->getPost('cantSinarmas')  , 
						"activo" =>  1 , 
						"createdby" =>  $LoggedUserId , 
						"createddate" => $TodayDate
                        
                    );

					$result = $this->modelPuesto->SavePuesto($puesto);

                    if ($result) {

            			
                    	$succes = ["mensaje" => 'Puesto agregado con exito' ,
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


	public function Turnos(){
		if ($this->request->getMethod() == "post" && $this->request->getvar(['ubicacion'])){
			$errors = [];
            $succes = [];
            $dontSucces = [];
            $data = [];

			$rules = [
				'ubicacion' =>  'required'];
				
				$errors = [];
				$succes = [];
				$dontSucces = [];
				$data = [];
				
				if($this->validate($rules)){
					

					$getUbicacion = $this->request->getPost('ubicacion');

					$ubicacion = $this->encrypt->Decrytp($getUbicacion);


					
					$getTurnos = $this->modelPuesto->getTurnos($ubicacion);

					

                    if ($getTurnos ) {

                    	$turnos = '<option value="">Selecciona una Ubicación</option>';
                    	
                    	foreach ( $getTurnos as $v){
				
							$id = $this->encrypt->Encrypt($v->id);
							$turnos.=  '<option value="'.$id.'">'.$v->turno.'</option>';

							
						
						}

						
                    	
                    	$data['turnos']= $turnos;
                    	
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