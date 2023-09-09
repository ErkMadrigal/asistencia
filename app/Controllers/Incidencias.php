<?php

namespace App\Controllers;


use App\Models\IncidenciasModel;
use App\Libraries\Menu;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;


class Incidencias extends BaseController{

    private $encrypter;
	private $menu;
	private $encrypt;
	private $db;
	private $IncidenciasModel;

    public function __construct(){
		$this->menu = new Menu();
		$this->encrypt = new Encrypt();
		$this->encrypter = \Config\Services::encrypter();
        $this->db =  \Config\Database::connect('default');
		$this->IncidenciasModel = new IncidenciasModel($this->db);
    }
    
    public function index(){
        if ($this->request->getMethod() == "get"){
			
            $empresa = session()->get('empresa');
			$idEmpresa = $this->encrypter->decrypt($empresa);
            $data['modulos'] = $this->menu->Permisos();
			$data['incidencias'] = $this->IncidenciasModel->getIncidenciasAll($idEmpresa);
            $data['incidenciasList'] = $this->IncidenciasModel->getIncidenciasList("incidencias");

			return view('incidencias/incidencias', $data);
		}	
    }

    public function addIncidencias(){
        if ($this->request->getMethod() == "get"){
			
            $empresa = session()->get('empresa');
			$idEmpresa = $this->encrypter->decrypt($empresa);
            $data['modulos'] = $this->menu->Permisos();
			$data['users'] = $this->IncidenciasModel->getUsers($idEmpresa);
            $data['breadcrumb'] = ["inicio" => 'Incidencias' ,
                    				"url" => 'incidencias',
                    				"titulo" => 'Agregar Incidencias'];
            $data['incidencias'] = $this->IncidenciasModel->getIncidenciasList("incidencias");
			return view('incidencias/incidencias_add', $data);
		}	
    }

    public function agregar(){
        if ($this->request->getMethod() == "post"){

            $rules = [
				'descripcion' =>  ['label' => "Descripcion", 'rules' => 'required'],
				'id_incidencia' =>  ['label' => "Tipo Incidencia", 'rules' => 'required'],
                'id_empleado' =>  ['label' => "Empleado", 'rules' => 'required'],
                'fecha_inicio' =>  ['label' => "Fecha", 'rules' => 'required'],
                'fecha_final' =>  ['label' => "Fecha", 'rules' => 'required'],
            ];

            $errors = [];
            $succes = [];
            $dontSucces = [];
            $data = [];
            $uuid = Uuid::uuid4();
            $idAsignacion = $uuid->toString();
            $getUser = session()->get('IdUser');
            $LoggedUserId = $this->encrypter->decrypt($getUser);
            $empresa = session()->get('empresa');
            $idEmpresa = $this->encrypter->decrypt($empresa);

            $data = array(
                "id" =>  $idAsignacion,
                "idEmpresa" =>  $idEmpresa,
                "id_tipo_incidencia" =>  $_POST["id_incidencia"],
                "idPersonal" =>  $_POST["id_empleado"],
                "descripcion" =>  $_POST["descripcion"],
                "fecha_incidencia_inicio" =>  $_POST["fecha_inicio"],
                "fecha_incidencia_final" =>  $_POST["fecha_final"],
                "activo" =>  1,
                "createdby" => $LoggedUserId,
                "createddate" => date("Y-m-d H:i:s")
            );		

            if($this->validate($rules) ){
                $insert = $this->IncidenciasModel->addIncidencia( $data );
                if ($insert) {
                    $succes = ["mensaje" => 'Exito', "succes" => "succes"];
                    $data = $insert;
                } else {
                    $dontSucces = ["error" => "error", "mensaje" => 'Error: al asignar la incidencia.'];
                }
            }else{
				$dontSucces = ["error" => "error", "mensaje" => 'Error: Valida los campos'];

            }
				
			echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
		}
    }

    public function detail(){
        if ($this->request->getMethod() == "post"){

            $errors = [];
            $succes = [];
            $dontSucces = [];
            $data = [];
            $select = $this->IncidenciasModel->seachIncidencia( $_POST["idBuqueda"] );
            if (count($select) > 0) {
                $data = $select;
                $succes = ["mensaje" => 'Exito', "succes" => "succes"];

            } else {
                $dontSucces = ["error" => "error", "mensaje" => 'No Cuenta con Incidencias.'];
            }
				
			echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
		}
    }

    public function edit(){
        if ($this->request->getMethod() == "post"){

            $rules = [
				'descripcion' =>  ['label' => "Descripcion", 'rules' => 'required'],
				'id_incidencia' =>  ['label' => "Tipo Incidencia", 'rules' => 'required'],
                'id_empleado' =>  ['label' => "Empleado", 'rules' => 'required'],
                'fecha_inicio' =>  ['label' => "Fecha", 'rules' => 'required'],
                'fecha_final' =>  ['label' => "Fecha", 'rules' => 'required'],
            ];

            $errors = [];
            $succes = [];
            $dontSucces = [];
            $data = [];
            $this->db->transStart();
        
            $getUser = session()->get('IdUser');
            $LoggedUserId = $this->encrypter->decrypt($getUser);

            $updateAsign = array(
                "id_tipo_incidencia" =>  $_POST['id_incidencia'],
                "descripcion" =>  $_POST['descripcion'],
                "fecha_incidencia_inicio" =>  $_POST["fecha_inicio"],
                "fecha_incidencia_final" =>  $_POST["fecha_final"],
                "updateddate" =>  date("Y-m-d H:i:s"),
                "updatedby" => $LoggedUserId,
            );
            $update = $this->IncidenciasModel->update($updateAsign, $_POST['id_empleado']);

            $this->db->transComplete();
            if($this->validate($rules) ){
                if ($update) {
                    $succes = ["mensaje" => 'Exito', "succes" => "succes"];
                    $data = $update;
                } else {
                    $dontSucces = ["error" => "error", "mensaje" => 'Hubo un error al registrar los Datos.'];
                }
            }else{
				$dontSucces = ["error" => "error", "mensaje" => 'Error: Valida los campos'];

            }
				
			echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
		}
    }

}
