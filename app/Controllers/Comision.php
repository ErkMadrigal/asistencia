<?php

namespace App\Controllers;


use App\Models\ComisionModel;
use App\Libraries\Crud_email;
use App\Libraries\Menu;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;


class Comision extends BaseController{

    private $encrypter;
	private $menu;
	private $encrypt;
	private $db;
	private $modelComision;

    public function __construct(){
		$this->menu = new Menu();
		$this->encrypt = new Encrypt();
		$this->encrypter = \Config\Services::encrypter();
        $this->db =  \Config\Database::connect('default');
		$this->modelComision = new ComisionModel($this->db);
    }
    
    public function index(){
        if ($this->request->getMethod() == "get"){
			
            $data['modulos'] = $this->menu->Permisos();
			$data['datos'] = $this->modelComision->getData();
			
			return view('comisionista/comisionista', $data);
		}	
    }

    public function asignarComision(){
        if ($this->request->getMethod() == "post" && $this->request->getvar(['montoComision', 'montoComisionejemplo'],FILTER_SANITIZE_STRING)){
            
            $rules = [
				'montoComision' => ['label' => '', 'rules' => 'required'],
			];
            
            $errors = [];
            $succes = [];
            $dontSucces = [];
            $data = [];

            $getUser = session()->get('IdUser');
            $LoggedUserId = $this->encrypter->decrypt($getUser);
            $comision = $this->modelComision->getMonto($_POST['idAsignacion']);
            

            if($this->validate($rules)){
                $update = array(
                    "comision" => $comision[0]->comision - $_POST['montoComision'],
                    "comision_asignado" => $comision[0]->comisionAS + $_POST['montoComision'],
                    "updatedby" => $LoggedUserId,
                    "updateddate" =>  date("Y-m-d H:i:s"),
                );		
                $update = $this->modelComision->asignarMonto($update, $_POST['idAsignacion']);
                $update = true;
                if ($update) {
                    $succes = ["mensaje" => 'Actualizado con Exito', "succes" => "succes"];
                    $data = $update;
                } else {
                    $dontSucces = ["error" => "error", "mensaje" => 'Hubo un error al intentar Guardar.'];
                }
            } else {	
                $errors = $this->validator->getErrors();
            }
            echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
        }
    }

    public function setData(){
        if ($this->request->getMethod() == "post" && $this->request->getvar(['comisionista', 'telefono'],FILTER_SANITIZE_STRING)){
            
            $rules = [
				'comisionista' => ['label' => '', 'rules' => 'required'],
				'telefono' => ['label' => '', 'rules' => 'required'],
			];
            
            $errors = [];
            $succes = [];
            $dontSucces = [];
            $data = [];

            
            $uuid = Uuid::uuid4();
            $idComision = $uuid->toString();
            $getUser = session()->get('IdUser');
            $LoggedUserId = $this->encrypter->decrypt($getUser);

            if($this->validate($rules)){
                $insert = array(
                    "id" => $idComision,
                    "nombre" =>  $_POST["comisionista"],
                    "telefono" =>  $_POST["telefono"],
                    "activo" =>  1,
                    "createdby" => $LoggedUserId,
                    "updateddate" =>  date("Y-m-d H:i:s"),
                );		
                
                $insert = $this->modelComision->addData( $insert);

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
	
    public function update(){
        if ($this->request->getMethod() == "post" && $this->request->getvar(['comisionistaUp', 'telefonoUp', 'id'],FILTER_SANITIZE_STRING)){
            
            $rules = [
				'comisionistaUp' => ['label' => '', 'rules' => 'required'],
				'telefonoUp' => ['label' => '', 'rules' => 'required'],
				'id' => ['label' => '', 'rules' => 'required'],
			];
            
            $errors = [];
            $succes = [];
            $dontSucces = [];
            $data = [];

            
            $uuid = Uuid::uuid4();
            $idComision = $uuid->toString();
            $getUser = session()->get('IdUser');
            $LoggedUserId = $this->encrypter->decrypt($getUser);

            if($this->validate($rules)){
                $update = array(
                    "nombre" =>  $_POST["comisionistaUp"],
                    "telefono" =>  $_POST["telefonoUp"],
                    "activo" =>  $_POST["chkActivo"],
                    "updateddate" =>  date("Y-m-d H:i:s"),
                    "updatedby" => $LoggedUserId,
                );		
                
                $update = $this->modelComision->update( $update, $_POST['id']);

                if ($update) {
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

    public function delete(){
        if ($this->request->getMethod() == "post"){
            $errors = [];
            $succes = [];
            $dontSucces = [];
            $data = [];
			$validate = [];

            
            $delete = $this->modelComision->delete( $_POST['idElimn'] );
            if ($delete) {
                $succes = ["mensaje" => 'Exito', "succes" => "succes"];
                $data = $delete;
            } else {
                $dontSucces = ["error" => "error", "mensaje" => 'Hubo un error al Obtener los Datos.'];
            }
				
			echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
		}
    }

    public function detail(){
        if ($this->request->getMethod() == "post" && $this->request->getvar(['id'],FILTER_SANITIZE_STRING)){
            $errors = [];
            $succes = [];
            $dontSucces = [];
            $data = [];
			$validate = [];

            
            $select = $this->modelComision->getDataDetail( $_POST['id'] );
            $select1 = $this->modelComision->getDataComisionista( $_POST['id'] );
            if ($select) {
                    $succes = ["mensaje" => 'Exito', "succes" => "succes"];
                    $data = $select;
            } else {
                $dontSucces = ["error" => "error", "mensaje" => 'Hubo un error al Obtener los Datos.'];
            }
				
			echo json_encode(['error'=> $errors , 'succes' => $succes , 'detail' => $select1, 'dontsucces' => $dontSucces , 'data' => $data]);
		}
    }

    public function detailAC(){
        if ($this->request->getMethod() == "post" && $this->request->getvar(['idComision', 'idAsignacion'],FILTER_SANITIZE_STRING)){
            $errors = [];
            $succes = [];
            $dontSucces = [];
            $data = [];
			$validate = [];

            
            $select = $this->modelComision->getDataComisionistaAsignacion( $_POST['idComision'], $_POST['idAsignacion'] );
            if ($select) {
                    $succes = ["mensaje" => 'Exito', "succes" => "succes"];
                    $data = $select;
            } else {
                $dontSucces = ["error" => "error", "mensaje" => 'Hubo un error al Obtener los Datos.'];
            }
				
			echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
		}
    }
}
