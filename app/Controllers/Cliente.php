<?php namespace App\Controllers;

use App\Models\ClienteModel;
use App\Libraries\Crud_email;
use App\Libraries\Menu;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;

class Cliente extends BaseController {

    private $encrypter;
	private $menu;
	private $encrypt;
	private $db;
	private $modelCliente;

    public function __construct()
	{
		$this->menu = new Menu();
		$this->encrypt = new Encrypt();
		$this->encrypter = \Config\Services::encrypter();
        $this->db =  \Config\Database::connect('default');
		$this->modelCliente = new ClienteModel($this->db);
		
	}

    public function GetCliente(){
		if ($this->request->getMethod() == "get"){

			$data['modulos'] = $this->menu->Permisos();
			$empresa = session()->get('empresa');
			$idEmpresa = $this->encrypter->decrypt($empresa);
			$resultData = $this->modelCliente->GetClientes($idEmpresa);
			$result = [];


			foreach ( $resultData as $v){
				
				$id = $this->encrypt->Encrypt($v->id);
				$result[] = (object) array (
					'id' => $id ,
					'razon_social' => $v->razon_social,
					'nombre_corto' => $v->nombre_corto,
					'email' => $v->email,
					'activo' => $v->activo

				) ;
			}
		
			$dataCrud = [
                'data' => $result]; 

        	$data['cliente'] = $dataCrud['data'];

			
			return view('Clientes/Clientescatalogo', $data);
		}	
    }

    public function DetalleReferencia(){
		if ($this->request->getMethod() == "get" && $this->request->getvar(['id'],FILTER_SANITIZE_STRING)){

			$data['modulos'] = $this->menu->Permisos();

			$getId = str_replace(" ", "+", $_GET['id']);
			$id = $this->encrypt->Decrytp($getId);
			$idAdmin = session()->get('IdUser');

        	$data['cliente'] = $this->modelCliente->GetClienteById($id);
        	
			
			$data['breadcrumb'] = ["inicio" => 'Clientes' ,
                    				"url" => 'clientes',
                    				"titulo" => 'Detalle'];
		
			return view('Clientes/detailCliente', $data);
		}	
	}

    public function EditarCliente(){
		if ($this->request->getMethod() == "get" && $this->request->getvar(['id'],FILTER_SANITIZE_STRING)){

			$data['modulos'] = $this->menu->Permisos();
			
			$getId = str_replace(" ", "+", $_GET['id']);
			$id = $this->encrypt->Decrytp($getId);
			$idAdmin = session()->get('IdUser');

			
            $data['cliente'] = $this->modelCliente->GetClienteById($id);
            $data['id'] = $this->encrypt->Encrypt($id);

			$data['breadcrumb'] = ["inicio" => 'Clientes' ,
                    				"url" => 'clientes',
                    				"titulo" => 'Editar'];
			return view('Clientes/editClientes', $data);
		}	
	}

    public function SaveClientes(){

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

					$cliente = $this->modelCliente->Savecliente($updateEmpresa, $idC);

					if ($cliente){

						$succes = ["mensaje" => 'El Cliente ha sido editada con exito' ,
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

	public function Agrecliente(){
		if ($this->request->getMethod() == "get"){

            $getEmpresa = session()->get('empresa');
            $idEmpresa = $this->encrypter->decrypt($getEmpresa);

			$data['modulos'] = $this->menu->Permisos();
			


			$data['breadcrumb'] = ["inicio" => 'Clientes' ,
                    				"url" => 'clientes',
                    				"titulo" => 'Agregar'];

			
			return view('Clientes/addClientes', $data);
		}	
	}

    public function AgregarClientes(){
		//helper(['form']);
		if ($this->request->getMethod() == "post" && $this->request->getvar(['razon_social, nombre_corto, nombre_contacto, puesto_contacto, whatsApp, telefono_oficina, email, fecha_inicio_servicio, fecha_fin_servicio, calle, codigo, coloniacodigo, municipiocodigo, ciudadcodigo, estadocodigo, rfc, nombreInstitucion, codigoDatosFis, coloniacodigoDatosFis, municipiocodigoDatosFis, ciudadcodigoDatosFis, estadocodigoDatosFis,datosFiscales'],FILTER_SANITIZE_STRING)){

				$getEmpresa = session()->get('empresa');
				$idEmpresa = $this->encrypter->decrypt($getEmpresa);

				

				$rules = [
				'razon_social' =>  ['label' => "Razon social", 'rules' => 'required|max_length[255]'],
				'nombre_corto' =>  ['label' => "Nombre Corto", 'rules' => 'required|max_length[255]'],
                'email' =>  ['label' => "Email", 'rules' => 'required|max_length[255]|valid_email'],
				'nombre_contacto' =>  ['label' => "Nombre del contacto", 'rules' => 'required|max_length[255]'],
				'puesto_contacto' =>  ['label' => "Puesto del Contacto", 'rules' => 'required|max_length[255]'],
				'whatsApp' =>  ['label' => "WhatsApp", 'rules' => 'required|max_length[10]|integer'],
				'telefono_oficina' =>  ['label' => "Teléfono Oficina", 'rules' => 'required|max_length[10]|integer'],
				'fecha_inicio_servicio' =>  ['label' => "Fecha de Inicio Servicio", 'rules' => 'required|valid_only_date_chek'],
				'fecha_fin_servicio' =>  ['label' => "Fecha Fin Servicio:", 'rules' => 'required|valid_only_date_chek'],
				'calle' =>  ['label' => "Calle y Número", 'rules' => 'required|max_length[255]'],
				'codigo' =>  ['label' => "Código Postal", 'rules' => 'required|max_length[5]|integer'],
				'coloniacodigo' =>  ['label' => "Colonia", 'rules' => 'required'],
				'municipiocodigo' =>  ['label' => "Municipio", 'rules' => 'required'],
				'ciudadcodigo' =>  ['label' => "Ciudad", 'rules' => 'required'],
				'estadocodigo' =>  ['label' => "Estado", 'rules' => 'required'],
				'rfc' =>  ['label' => "R.F.C", 'rules' => 'required|max_length[13]'],
				];


				$fiscales = $this->request->getPost('datosFiscales');

				if($fiscales == 0){

					
					$rules['calleFiscales'] =  ['label' => "Calle y Número", 'rules' => 'required|max_length[255]'];
					$rules['codigoDatosFis'] =  ['label' => "Código Postal", 'rules' => 'required|max_length[5]|integer'];
					$rules['coloniacodigoDatosFis'] =  ['label' => "Colonia", 'rules' => 'required'];
					$rules['municipiocodigoDatosFis'] =  ['label' => "Municipio", 'rules' => 'required'];
					$rules['ciudadcodigoDatosFis'] =  ['label' => "Ciudad", 'rules' => 'required'];
					$rules['estadocodigoDatosFis'] =  ['label' => "Estado", 'rules' => 'required'];
				}
		 
				$errors = [];
				$succes = [];
				$dontSucces = [];
				$data = [];


				if($this->validate($rules)){
					
					$getUser = session()->get('IdUser');
					$LoggedUserId = $this->encrypter->decrypt($getUser);
					
					$uuid = Uuid::uuid4();
        			$id = $uuid->toString();
					
					$TodayDate = date("Y-m-d H:i:s");

					$getFecha_inicio_servicio = $this->request->getPost('fecha_inicio_servicio');

        			$fecha_inicio_servicio = date( "Y-m-d" ,strtotime($getFecha_inicio_servicio));

        			$getFecha_fin_servicio = $this->request->getPost('fecha_fin_servicio');

        			$fecha_fin_servicio = date( "Y-m-d" ,strtotime($getFecha_fin_servicio));

        			if($fiscales == 0){

        				$fisCalle = $this->request->getPost('calleFiscales');
        				$fisCodigo = $this->request->getPost('codigoDatosFis');
        				$fisColonia = $this->request->getPost('coloniacodigoDatosFis');
        				$fismunicipio = $this->request->getPost('municipiocodigoDatosFis');
        				$fisCiudad = $this->request->getPost('ciudadcodigoDatosFis') ;
        				$fisEstado = $this->request->getPost('estadocodigoDatosFis') ;

        				

        			} else {

        				$fisCalle = $this->request->getPost('calle');
        				$fisCodigo = $this->request->getPost('codigo');
        				$fisColonia = $this->request->getPost('coloniacodigo');
        				$fismunicipio = $this->request->getPost('municipiocodigo');
        				$fisCiudad = $this->request->getPost('ciudadcodigo');
        				$fisEstado = $this->request->getPost('estadocodigo');
        				
        			}
					
					$Cliente = array(
                        "id" => $id  , 
                        "razon_social" =>  $this->request->getPost('razon_social') , 
                        "nombre_corto" =>  $this->request->getPost('nombre_corto') , 
                        "nombre_contacto" =>  $this->request->getPost('nombre_contacto') , 
                        "puesto" =>  $this->request->getPost('puesto_contacto') , 
                        "whatsapp" => $this->request->getPost('whatsApp')  , 
                        "tel_oficina" =>  $this->request->getPost('telefono_oficina') , 
                        "email" => $this->request->getPost('email')  , 
                        "fecha_inicio" => $fecha_inicio_servicio  , 
                        "fecha_fin" => $fecha_fin_servicio  , 
                        "calle_num" =>  $this->request->getPost('calle') , 
                        "idCodigoPostal" =>  $this->request->getPost('codigo') , 
                        "colonia" =>  $this->request->getPost('coloniacodigo') , 
                        "municipio" =>  $this->request->getPost('municipiocodigo') , 
                        "ciudad" =>  $this->request->getPost('ciudadcodigo') , 
                        "estado" =>  $this->request->getPost('estadocodigo') , 
                        "rfc" =>  $this->request->getPost('rfc') , 
                        "calle_num_fiscal" => $fisCalle  , 
                        "idCodigoPostal_fiscal" => $fisCodigo  , 
                        "colonia_fiscal" => $fisColonia  , 
                        "municipio_fiscal" =>  $fismunicipio , 
                        "ciudad_fiscal" =>  $fisCiudad , 
                        "estado_fiscal" => $fisEstado  , 
                        "activo" =>  1 , 
                        "createdby" =>  $LoggedUserId , 
                        "createddate" =>  $TodayDate 
                    );

					$result = $this->modelCliente->saveCliente($Cliente);

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