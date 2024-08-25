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
                "activo" =>  $_POST["activo"],
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

    public function jefeTurno(){
        if ($this->request->getMethod() == "get"){
			$empresa = session()->get('empresa');
			$idEmpresa = $this->encrypter->decrypt($empresa);
            $data['modulos'] = $this->menu->Permisos();
			$data['users'] = $this->IncidenciasModel->getUsers($idEmpresa);
            $data['incidencias'] = $this->IncidenciasModel->getIncidenciasList("incidencias");
			$data['servicios'] = $this->IncidenciasModel->getClientes();

			return view('incidencias/incidencias_jefeTurno', $data);
		}	
    }

    public function evidencia(){
        if ($this->request->getMethod() == "post"){

            $errors = [];
            $succes = [];
            $dontSucces = [];
            $data = [];
            $uuid = Uuid::uuid4();
            $idDocumento = $uuid->toString();
            $idDocExp = $this->IncidenciasModel->searchDoc('EVIDENCIA');

            $empresa = session()->get('empresa');
            $idEmpresa = $this->encrypter->decrypt($empresa);
            $getUser = session()->get('IdUser');
            $LoggedUserId = $this->encrypter->decrypt($getUser);


            $fileLista = $this->request->getFile('fileLista');
            $getfileNameLista = $fileLista->getName();
            $getfileExtLista = $fileLista->getExtension();
            $fileNameLista = $this->encrypt->Encrypt($getfileNameLista);
            $extensionLista = $this->encrypt->Encrypt($getfileExtLista);
            $getRutaLista = WRITEPATH . 'uploads/files/'.date("Y").'/'.date("m").'/'.$idEmpresa.'/'.$_POST['servicio'];
            $rutaLista = $this->encrypt->Encrypt($getRutaLista);
            if ($fileLista->isValid() && !$fileLista->hasMoved()){

                $fileLista->move($getRutaLista,$fileLista->getRandomName());

                $getFileNameAlmacenLista = $fileLista->getName();
                $fileNameAlmacenLista = $this->encrypt->Encrypt($getFileNameAlmacenLista);
            }

            $fileMonta = $this->request->getFile('fileMonta');
            $getfileNameMonta = $fileMonta->getName();
            $getfileExtMonta = $fileMonta->getExtension();
            $fileNameMonta = $this->encrypt->Encrypt($getfileNameMonta);
            $extensionMonta = $this->encrypt->Encrypt($getfileExtMonta);
            $getRutaMonta = WRITEPATH . 'uploads/files/'.date("Y").'/'.date("m").'/'.$idEmpresa.'/'.$_POST['servicio'];
            $rutaMonta = $this->encrypt->Encrypt($getRutaMonta);
            if ($fileMonta->isValid() && !$fileMonta->hasMoved()){

                $fileMonta->move($getRutaMonta,$fileMonta->getRandomName());

                $getFileNameAlmacenMonta = $fileMonta->getName();
                $fileNameAlmacenMonta = $this->encrypt->Encrypt($getFileNameAlmacenMonta);
            }

            
            $monta = array(
                "idDocumento" => $idDocumento,
                "idDocExp" => $idDocExp ,
                "IdPersonal" => '844d3b48-3f7b-11ee-b611-000000003fff',
                "idEmpresa" => $idEmpresa,

                "nombre_documento" => $fileNameMonta,
                "extension_documento" => $extensionMonta,
                "ruta" => $rutaMonta,
                "nombre_almacen" => $fileNameAlmacenMonta,
                "servicio" => $_POST['servicio'],
                "idEstatus" => 1,
                "createdby" => $LoggedUserId,
                "createddate" => date("Y-m-d H:i:s"));
            $result = $this->IncidenciasModel->insertExpDoc($monta);

                
            if ($result) {
                $lista = array(
                    "idDocumento" => $idDocumento,
                    "idDocExp" => $idDocExp ,
                    // "idPersonal" => $LoggedUserId,
                    "IdPersonal" => '844d3b48-3f7b-11ee-b611-000000003fff',
                    "idEmpresa" => $idEmpresa,
    
                    "nombre_documento" => $fileNameLista,
                    "extension_documento" => $extensionLista,
                    "ruta" => $rutaLista,
                    "nombre_almacen" => $fileNameAlmacenLista,
                    "servicio" => $_POST['servicio'],
                    "idEstatus" => 1,
                    "createdby" => $LoggedUserId,
                    "createddate" => date("Y-m-d H:i:s"));
    
                $result = $this->IncidenciasModel->insertExpDoc($lista);
                if($result){
                    $this->db->transCommit(); 
                    $succes = ["mensaje" => 'Exito: al cargar la evidencia', "succes" => "succes"];
                }else{
                    $this->db->transRollback();
                    $dontSucces = ["error" => "error", "mensaje" => 'Error: al cargal la imagen Lista.'];
                }

            } else {
                $this->db->transRollback();
                $dontSucces = ["error" => "error", "mensaje" => 'Error: al cargal la imagen Monta.'];
            }
				
			echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces]);
		}	
    }

}
