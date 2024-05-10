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
					'fecha_inicio' => $v->fecha_inicio,
					'fecha_inicio' => $v->fecha_inicio,
					'fecha_fin' => $v->fecha_fin,
					'nombre_ubicacion' => $v->nombre_ubicacion,
					
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

		if($this->request->getMethod() == "post" && $this->request->getvar(['id,razon_social, nombre_corto, nombre_contacto, puesto_contacto, whatsApp, telefono_oficina, email, fecha_inicio_servicio, fecha_fin_servicio, calle, codigo, coloniacodigo, municipiocodigo, ciudadcodigo, estadocodigo, rfc, nombreInstitucion, codigoDatosFis, coloniacodigoDatosFis, municipiocodigoDatosFis, ciudadcodigoDatosFis, estadocodigoDatosFis,datosFiscales'],FILTER_SANITIZE_STRING)) {

			$rules = ['id' =>  ['label' => '', 'rules' =>'required'],
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
				'rfc' =>  ['label' => "R.F.C", 'rules' => 'required|max_length[13]']];

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
					
					$updateCliente = array(
                         
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
                        "activo" => $this->request->getPost('activo'),
                        "updatedby" => $LoggedUserId,
                		"updateddate" => $TodayDate 
                    );

					$idModi = $this->request->getPost('id');
					$idCliente = $this->encrypt->Decrytp($idModi);	
					

					$cliente = $this->modelCliente->Updatecliente($updateCliente, $idCliente);

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

	function cargaCortaClientes(){
		if ($this->request->getMethod() == "post"){
			$errors = [];
			$succes = [];
			$dontSucces = [];
			$data = [];
			$this->db->transStart();
	
			$uuid = Uuid::uuid4();
			$idTurno = $uuid->toString();
			$idPuestos = $uuid->toString();
			
			$getUser = session()->get('IdUser');
			$LoggedUserId = $this->encrypter->decrypt($getUser);
			$empresa = session()->get('empresa');
			$idEmpresa = $this->encrypter->decrypt($empresa);

			$idCliente = $this->modelCliente->searchCliente($_POST['razonSocial']);
			
			if(!$idCliente){
				$idCliente = $uuid->toString();
				$insertCliente = array(
					"id" => $idCliente	,
					"idEmpresa" => $idEmpresa,
					
					"razon_social" =>  $_POST["razonSocial"],
					"nombre_corto" =>  $_POST["nombreCorto"],
					"nombre_contacto" =>  $_POST["coordinador"],
					"whatsapp" =>  $_POST["telefono"],
					"tel_oficina" =>  $_POST["telefono"],
					"activo" => 1,
					"createdby" => $LoggedUserId,
					"createddate" => date("Y-m-d H:i:s"),
				);
				$this->modelCliente->save($insertCliente, 'cliente');
			}

			$idUbicacion = $this->modelCliente->searchUbicacion($_POST['ubicacion'], $_POST["calle"],  $_POST["colonia"], $_POST["cp"]);

			if(!$idUbicacion){
				$idUbicacion = $uuid->toString();
				
				$insertUbicacion = array(
					"id" => $idUbicacion,
					"idCliente" => $idCliente,
					"nombre_ubicacion" =>  $_POST["ubicacion"],
					"calle_num" =>  $_POST["calle"],
					"colonia" =>  $_POST["colonia"],
					"idCodigoPostal" =>  $_POST["cp"],
					"activo" => 1,
					"createdby" => $LoggedUserId,
					"createddate" => date("Y-m-d H:i:s"),
				);
				$this->modelCliente->save($insertUbicacion, 'ubicacion');
			}

			$turnos = $this->modelCliente->searchMulticatalogo($_POST['turno'], 'Turnos');

			if(!$turnos){
				$insertCatalogoDetalleTurno = array(
					"idEmpresa" => $idEmpresa,
					"idCatalogo" => $this->modelCliente->searchCatalogo('Turnos'),
					"valor" => $_POST['turno'],
					"activo" => 1,
					"createdby" => $LoggedUserId,
					"createddate" => date("Y-m-d H:i:s"),
				);
				$turnos = $this->modelCliente->addCatalogoDetalle($insertCatalogoDetalleTurno);
			}

			$insertTurnos = array(
				"id" => $idTurno	,
				"idCliente" => $idCliente,
				"idUbicacion" => $idUbicacion,
				"idTurnos" =>  $turnos, //buscar en catalogos_detalle catalogo Turnos, 
				"idHorario" =>  1822,
				"activo" => 1,
				"createdby" => $LoggedUserId,
				"createddate" => date("Y-m-d H:i:s"),
			);



			$puesto = $this->modelCliente->searchMulticatalogo($_POST['puesto'], 'Puesto');

			if(!$puesto){
				$insertCatalogoDetallePuesto = array(
					"idEmpresa" => $idEmpresa,
					"idCatalogo" => $this->modelCliente->searchCatalogo('Puesto'),
					"valor" => $_POST['puesto'],
					"activo" => 1,
					"createdby" => $LoggedUserId,
					"createddate" => date("Y-m-d H:i:s"),
				);
				$puesto = $this->modelCliente->addCatalogoDetalle($insertCatalogoDetallePuesto);
			}

			$insertPuestos = array(
				"id" => $idPuestos	,
				"idCliente" => $idCliente,
				"idUbicacion" => $idUbicacion,
				"idTurno" =>  $idTurno, 
				"puesto" =>  $puesto,
				"num_guardias" =>  $_POST['elementos'],
				"activo" => 1,
				"createdby" => $LoggedUserId,
				"createddate" => date("Y-m-d H:i:s"),
			);

			
			$insert1 = $this->modelCliente->save($insertTurnos, 'turnos');
			$insert2 = $this->modelCliente->save($insertPuestos, 'puestos');
			if ($insert1 && $insert2) {
				$this->db->transCommit(); 
				$succes = ["mensaje" => 'Registrado con Éxito', "succes" => "succes"];
			} else {
				$this->db->transRollback(); 
				$dontSucces = ["error" => "error", "mensaje" => "No se insertó el registro"];
			}


		} else {	
			$errors = $this->validator->getErrors();
		}
		$this->db->transComplete();

		echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);

	}

}