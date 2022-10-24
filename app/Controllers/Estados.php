<?php

namespace App\Controllers;


use App\Models\CataEstados;
use App\Libraries\Crud_email;
use App\Libraries\Menu;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;


class Estados extends BaseController{

    private $encrypter;
	private $menu;
	private $encrypt;
	private $db;
	private $modelEstados;

    public function __construct(){
		$this->menu = new Menu();
		$this->encrypt = new Encrypt();
		$this->encrypter = \Config\Services::encrypter();
        $this->db =  \Config\Database::connect('default');
		$this->modelEstados = new CataEstados($this->db);
    }
    
    public function index(){
        if ($this->request->getMethod() == "get"){
			
            $data['modulos'] = $this->menu->Permisos();
			$data['estados'] = $this->modelEstados->GetEstados();
			
			return view('estados/estado.php', $data);
		}	
    }

    public function mostrarDatos(){
		if ($this->request->getMethod() == "post" && $this->request->getvar(['estado', 'capital'],FILTER_SANITIZE_STRING)){
            
            $errors = [];
            $succes = [];
            $dontSucces = [];
            $data = [];
			$validate = [];

			$dataEst = array(
				"capital" =>  $_POST["capital"],
				"estado" =>  $_POST["estado"],
			);		

			if(!empty($_POST["capital"])){
				array_push($validate, 1);
			}
			
			if(!empty($_POST["estado"])){
				array_push($validate, 1);
			}
			
			
			if(count($validate) == 0){
				$errors = ["error" => "error", "mensaje" => 'Es Requerido alguno de los Campos'];
			}else{

				$select = $this->modelEstados->GetDatos( $dataEst );

				if ($select) {
					$succes = ["mensaje" => 'Exito', "succes" => "succes"];
					$data = $select;
				} else {
					$dontSucces = ["error" => "error", "mensaje" => 'Hubo un error al Obtener los Datos.'];
				}
				
			}
			echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
		}
	}

    public function update(){
        if ($this->request->getMethod() == "get" && $this->request->getvar(['id'],FILTER_SANITIZE_STRING)){

			$data['modulos'] = $this->menu->Permisos();
			
			$getId = str_replace(" ", "+", $_GET['id']);
			$idAdmin = session()->get('IdUser');

			$data['estados'] = $this->modelEstados->GetEstados();
			$data['dataEstado'] = $this->modelEstados->GetEstadoById($getId);
            $data['id'] = $getId;
			$data['breadcrumb'] = ["inicio" => 'estados' ,
                    				"url" => 'estados',
                    				"titulo" => 'Editar'];
			return view('estados/editEstado', $data);
		}	
    }

    public function GetDatosEst(){
		if ($this->request->getMethod() == "post" && $this->request->getvar(['estado'],FILTER_SANITIZE_STRING)){
            
            $errors = [];
            $succes = [];
            $dontSucces = [];
            $data = [];
			$validate = [];

            $rules = [
				'estado' => ['label' => '', 'rules' => 'required']
			];
			
			
            if($this->validate($rules)){
                $select = $this->modelEstados->GetDatosEstado( $_POST['estado'] );

                if ($select) {
                    $succes = ["mensaje" => 'Exito', "succes" => "succes"];
                    $data = $select;
                } else {
                    $dontSucces = ["error" => "error", "mensaje" => 'Hubo un error al Obtener los Datos.'];
                }
			}else{
				$errors = ["error" => "error", "mensaje" => 'Es Requerido alguno de los Campos'];
			}
			echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
		}
	}

    public function updateDataEstado(){
        if ($this->request->getMethod() == "post" && $this->request->getvar(['id', 'claveEstado', 'claveMunicipio', 'municipio'],FILTER_SANITIZE_STRING)){
            
            $rules = [
				'id' => ['label' => '', 'rules' => 'required'],
				'claveEstado' => ['label' => '', 'rules' => 'required'],
				'claveMunicipio' => ['label' => '', 'rules' => 'required'],
				'municipio' => ['label' => '', 'rules' => 'required'],
			];
            
            $errors = [];
            $succes = [];
            $dontSucces = [];
            $data = [];
            if($this->validate($rules)){
                $idMun = $_POST["id"];
                $updateMun = array(
                    "claveEstado" =>  $_POST["claveEstado"],
                    "claveMunicipio" =>  $_POST["claveMunicipio"],
                    "descripcion" =>  $_POST["municipio"],
                    "activo" =>  $_POST["chkActivo"],
                    "updateddate" =>  date("Y-m-d H:i:s"),
                );		
                
                $update = $this->modelEstados->updateMunicipio( $updateMun ,$idMun);

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
    
    public function detail(){

        if ($this->request->getMethod() == "get" && $this->request->getvar(['id'],FILTER_SANITIZE_STRING)){

			$data['modulos'] = $this->menu->Permisos();

			$id = str_replace(" ", "+", $_GET['id']);
			$idAdmin = session()->get('IdUser');

        	$data['estado'] = $this->modelEstados->GetEstadoById($id);
        	
			
			$data['breadcrumb'] = ["inicio" => 'estados' ,
                                    "url" => 'estados',
                    				"titulo" => 'Detalle'];

            return view('estados/detailEstado', $data);
		}	
    }
    
    public function add(){
		if ($this->request->getMethod() == "get"){

			$data['modulos'] = $this->menu->Permisos();
			$data['breadcrumb'] = ["inicio" => 'estados' ,
                    				"url" => 'estados',
                    				"titulo" => 'Agregar'];
			$data['estados'] = $this->modelEstados->GetEstados();
			
			$id = session()->get('IdUser');


			return view('estados/addEstado', $data);
		}	
    }
	
    public function insertDataEstado(){
        if ($this->request->getMethod() == "post" && $this->request->getvar(['claveEstado', 'claveMunicipio', 'municipio'],FILTER_SANITIZE_STRING)){
            
            $rules = [
				'claveEstado' => ['label' => '', 'rules' => 'required'],
				'claveMunicipio' => ['label' => '', 'rules' => 'required'],
				'municipio' => ['label' => '', 'rules' => 'required'],
			];
            
            $errors = [];
            $succes = [];
            $dontSucces = [];
            $data = [];
            if($this->validate($rules)){
                $insertMun = array(
                    "claveEstado" =>  $_POST["claveEstado"],
                    "claveMunicipio" =>  $_POST["claveMunicipio"],
                    "descripcion" =>  $_POST["municipio"],
                    "activo" =>  $_POST["chkActivo"],
                    "updateddate" =>  date("Y-m-d H:i:s"),
                );		
                
                $insert = $this->modelEstados->addEstado( $insertMun);

                if ($insert) {
                    $succes = ["mensaje" => 'Guardado con Exito', "succes" => "succes"];
                } else {
                    $dontSucces = ["error" => "error", "mensaje" => 'Hubo un error al intentar Guardar.'];
                }
            } else {	
                $errors = $this->validator->getErrors();
            }
            echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
		}	
    }
    
}
