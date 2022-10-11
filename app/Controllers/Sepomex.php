<?php

namespace App\Controllers;


use App\Models\CataSepomex;
use App\Libraries\Crud_email;
use App\Libraries\Menu;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;


class Sepomex extends BaseController{

    private $encrypter;
	private $menu;
	private $encrypt;
	private $db;
	private $modelSepomex;

    public function __construct(){
		$this->menu = new Menu();
		$this->encrypt = new Encrypt();
		$this->encrypter = \Config\Services::encrypter();
        $this->db =  \Config\Database::connect('default');
		$this->modelSepomex = new CataSepomex($this->db);
    }
    
    public function index(){
        if ($this->request->getMethod() == "get"){
			
            $data['modulos'] = $this->menu->Permisos();
			$resultData = $this->modelSepomex->GetSepomex();
			$result = [];
			foreach ( $resultData as $v){
				
				$result[] = (object) array (
					'id' => $v->id ,
					'codigoPostal' => $v->codigoPostal,
					'asentamiento' => $v->asentamiento,
					'municipio' => $v->municipio,
					'ciudad' => $v->ciudad,
					'estado' => $v->estado,
					'activo' => $v->activo,
                    

				) ;
			}
		
			$dataCrud = ['data' => $result]; 

        	$data['sepomex'] = $dataCrud['data'];

			return view('sepomex/sepomex', $data);
		}	
    }

    public function detail(){

        if ($this->request->getMethod() == "get" && $this->request->getvar(['id'],FILTER_SANITIZE_STRING)){

			$data['modulos'] = $this->menu->Permisos();

			$id = str_replace(" ", "+", $_GET['id']);
			$idAdmin = session()->get('IdUser');

        	$data['sepomex'] = $this->modelSepomex->GetSepomexById($id);
        	
			
			$data['breadcrumb'] = ["inicio" => 'sepomex' ,
                    				"url" => 'sepomex',
                    				"titulo" => 'Detalle'];

            return view('sepomex/detailSepomex', $data);
		}	
    }

    public function add(){
		if ($this->request->getMethod() == "get"){

			$data['modulos'] = $this->menu->Permisos();
			$data['breadcrumb'] = ["inicio" => 'Sepomex' ,
                    				"url" => 'Sepomex',
                    				"titulo" => 'Agregar Sepomex'];
			$data['sepomexEstados'] = $this->modelSepomex->GetSepomexEstados();
			
			$id = session()->get('IdUser');


			return view('sepomex/addSepomex', $data);
		}	
    }

	public function getDataSep(){
		if ($this->request->getMethod() == "post"){
			$errors = [];
            $succes = [];
            $dontSucces = [];
            $data = [];

			$getDataMunicipio = $this->modelSepomex->GetSepomexMunicipio($_POST["estado"]);
			// echo json_encode($getDataMunicipio);
			if ($getDataMunicipio) {
				$getDataCiudad = $this->modelSepomex->GetSepomexCiudad($_POST["estado"]);
				if($getDataCiudad){
					$succes = ["mensaje" => 'Datos Obtenidos con Exito', "succes" => "succes"];
				}else{
					$dontSucces = ["error" => "error", "mensaje" => 'Hubo un error al obtener los datos.'];
				}
			} else {
				$dontSucces = ["error" => "error", "mensaje" => 'Hubo un error al obtener los datos.'];
			}

            echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'dataMunicipio' => $getDataMunicipio, 'dataCiudad' => $getDataCiudad]);
			
		}	
    }

	public function insertDataSep(){
		if ($this->request->getMethod() == "post" && $this->request->getvar(['cp', 'asentamiento', 'municipio', 'ciudad', 'estado', 'activo'],FILTER_SANITIZE_STRING)){
			$rules = [
				'cp' => ['label' => '', 'rules' => 'required'],
				'asentamiento' => ['label' => '', 'rules' => 'required'],
				'municipio' => ['label' => '', 'rules' => 'required'],
				'ciudad' => ['label' => '', 'rules' => 'required'],
				'estado' => ['label' => '', 'rules' => 'required']
			];
			$errors = [];
			$succes = [];
			$dontSucces = [];
			$data = [];
			if($this->validate($rules)){
				$insertSep = array(
					"codigoPostal" =>  $_POST["cp"],
					"asentamiento" =>  $_POST["asentamiento"],
					"municipio" =>  $_POST["municipio"],
					"ciudad" =>  $_POST["ciudad"],
					"estado" =>  $_POST["estado"],
					"activo" =>  $_POST["chkActivo"],
					"createddate" =>  date("Y-m-d H:i:s"),
				);		
				
				$insert = $this->modelSepomex->addSepomex($insertSep);
				if ($insert) {
					$succes = ["mensaje" => 'Registrado con Exito', "succes" => "succes"];
				} else {
					$dontSucces = ["error" => "error", "mensaje" => 'Hubo un error al Registrar.'];
				}
			} else {	
				$errors = $this->validator->getErrors();
			}
			echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
	
		}	
	}

    public function update(){
        if ($this->request->getMethod() == "get" && $this->request->getvar(['id'],FILTER_SANITIZE_STRING)){

			$data['modulos'] = $this->menu->Permisos();
			
			$getId = str_replace(" ", "+", $_GET['id']);
			$idAdmin = session()->get('IdUser');

			$data['sepomexEstados'] = $this->modelSepomex->GetSepomexEstados();
			$data['sepomex'] = $this->modelSepomex->GetSepomexById($getId);
            $data['id'] = $getId;
			$data['breadcrumb'] = ["inicio" => 'sepomex' ,
                    				"url" => 'sepomex',
                    				"titulo" => 'Editar'];
			return view('sepomex/editSepomex', $data);
		}	
    }

    public function updateDataSep(){
        if ($this->request->getMethod() == "post" && $this->request->getvar(['id', 'cp', 'asentamiento', 'municipio', 'ciudad', 'estado', 'activo'],FILTER_SANITIZE_STRING)){
            
            $rules = [
				'id' => ['label' => '', 'rules' => 'required'],
				'cp' => ['label' => '', 'rules' => 'required'],
				'asentamiento' => ['label' => '', 'rules' => 'required'],
				'municipio' => ['label' => '', 'rules' => 'required'],
				'ciudad' => ['label' => '', 'rules' => 'required'],
				'estado' => ['label' => '', 'rules' => 'required']
			];
            
            $errors = [];
            $succes = [];
            $dontSucces = [];
            $data = [];
            if($this->validate($rules)){
                $idSep = $_POST["id"];
                $updateSep = array(
                    "codigoPostal" =>  $_POST["cp"],
                    "asentamiento" =>  $_POST["asentamiento"],
                    "municipio" =>  $_POST["municipio"],
                    "ciudad" =>  $_POST["ciudad"],
                    "estado" =>  $_POST["estado"],
                    "activo" =>  $_POST["chkActivo"],
                    "updateddate" =>  date("Y-m-d H:i:s"),
                );		
                
                $update = $this->modelSepomex->updateSepomex( $updateSep ,$idSep);

                if ($update) {
                    $succes = ["mensaje" => 'Actualizado con Exito', "succes" => "succes"];
                } else {
                    $dontSucces = ["error" => "error", "mensaje" => 'Hubo un error al intentar Atualizar.'];
                }
            } else {	
                $errors = $this->validator->getErrors();
            }
            echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
		}	
    }

}
