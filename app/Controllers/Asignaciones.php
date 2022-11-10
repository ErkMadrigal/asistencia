<?php

namespace App\Controllers;


use App\Models\AsignacionesModel;
use App\Libraries\Crud_email;
use App\Libraries\Menu;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;


class Asignaciones extends BaseController{

    private $encrypter;
	private $menu;
	private $encrypt;
	private $db;
	private $modelAsign;

    public function __construct(){
		$this->menu = new Menu();
		$this->encrypt = new Encrypt();
		$this->encrypter = \Config\Services::encrypter();
        $this->db =  \Config\Database::connect('default');
		$this->modelAsign = new AsignacionesModel($this->db);
    }
    
    public function index(){
        if ($this->request->getMethod() == "get"){
			
            $data['modulos'] = $this->menu->Permisos();
			$data['datos'] = $this->modelAsign->getAllData();
			
			return view('asignaciones/asignacion', $data);
		}	
    }

    public function buscarData(){
        if ($this->request->getMethod() == "post"){
            $errors = [];
            $succes = [];
            $dontSucces = [];
            $data = [];
			$validate = [];



            $dataGet = array(
                "periodicidad" =>  empty($_POST["periodicidad"]) ? '': $_POST["periodicidad"],
                "fechaInicial" =>  empty($_POST["fechaInicial"]) ? '': $_POST["fechaInicial"],
                "fechaFinal" =>  empty($_POST["fechaFinal"]) ? '': $_POST["fechaFinal"],
                "tipoFecha" =>  empty($_POST["tipoFecha"]) ? '': $_POST["tipoFecha"],
                "activo" =>  empty($_POST["clasificacion"]) ? '': $_POST["clasificacion"],
            );		

            if($_POST["tipoFecha"] != ''){
                if($_POST["fechaInicial"] == ''){
                    array_push($validate, 1);
                }
                
                if($_POST["fechaFinal"] == ''){
                    array_push($validate, 1);
                }
            }
            if(count($validate) == 0 ){
                $select = $this->modelAsign->getDatos( $dataGet );
                if ($select) {
                    $succes = ["mensaje" => 'Exito', "succes" => "succes"];
                    $data = $select;
                } else {
                    $dontSucces = ["error" => "error", "mensaje" => 'Datos no encontrados.'];
                }
            }else{
				$dontSucces = ["error" => "error", "mensaje" => 'Es Requerido Seleccionar las 2 Fechas'];

            }
				
			echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
		}
    }

    public function getAllData(){
        if ($this->request->getMethod() == "get"){
			
            $errors = [];
            $succes = [];
            $dontSucces = [];
            $data = [];
			$data['asig'] = $this->modelAsign->getCountAsignaciones();
			$data['sumSA'] = $this->modelAsign->getSumSaldoAplicado();
            $succes = ["mensaje" => 'Exito', "succes" => "succes"];
			
            echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
		}	
    }

    public function add(){
		if ($this->request->getMethod() == "get"){

			$data['modulos'] = $this->menu->Permisos();
			$data['breadcrumb'] = ["inicio" => 'Asignaciones' ,
                    				"url" => 'asignaciones',
                    				"titulo" => 'Agregar'];
            $id = session()->get('IdUser');
			$data['clientes'] = $this->modelAsign->getClientes();
			$data['elementos'] = $this->modelAsign->getElemento();
			$data['armas'] = $this->modelAsign->getArmas();
			$data['modalidad'] = $this->modelAsign->getModalidad();
			


			return view('asignaciones/addAsign', $data);
		}	
    }

    public function setData(){
        if ($this->request->getMethod() == "post" && $this->request->getvar(['cliente', 'elemento', 'arma', 'modalidad', 'cartuchos', 'tipoPago', 'periodicidad', 'renta'],FILTER_SANITIZE_STRING)){
            
            $rules = [
				'cliente' => ['label' => '', 'rules' => 'required'],
				'elemento' => ['label' => '', 'rules' => 'required'],
				'arma' => ['label' => '', 'rules' => 'required'],
				'modalidad' => ['label' => '', 'rules' => 'required'],
				'cartuchos' => ['label' => '', 'rules' => 'required'],
				'tipoPago' => ['label' => '', 'rules' => 'required'],
				'periodicidad' => ['label' => '', 'rules' => 'required'],
				'renta' => ['label' => '', 'rules' => 'required'],
			];
            
            $errors = [];
            $succes = [];
            $dontSucces = [];
            $data = [];
            $this->db->transStart();
        
            $uuid = Uuid::uuid4();
        
            $idAsignacion = $uuid->toString();
            $idComp = $uuid->toString();
            $getUser = session()->get('IdUser');
            $LoggedUserId = $this->encrypter->decrypt($getUser);
            $empresa = session()->get('empresa');

            if($this->validate($rules)){
                $fechaActual = date('Y-m-d'); 
                $fechaEntrega = $_POST['FechaEntrega'] == '' ? $fechaActual : $_POST['FechaEntrega'];
                $nuevaFecha = strtotime ('+1 year' , strtotime($fechaEntrega)); //Se añade un año mas
                $nuevaFecha = date ('Y-m-d',$nuevaFecha);
                $insertData = array(
                    "id" => $idAsignacion,
                    "idCliente" =>  $_POST["cliente"],
                    "id_datos_personales" =>  $_POST["elemento"],
                    "id_armas" =>  $_POST["arma"],
                    "cantidad_Cartuchos" =>  $_POST["cartuchos"],
                    "modalidad" =>  $_POST["modalidad"],
                    "tipo_pago" => $_POST["tipoPago"],
                    "periodicidad" =>  $_POST["periodicidad"],
                    "pagos" =>  $_POST["pagos"],
                    "renta" =>  $_POST["renta"],
                    "tramite" =>  $_POST["tramite"],
                    "asignacion" =>  $_POST["asignacion"],
                    "garantia" =>  $_POST["garantia"],
                    "total" =>  $_POST["total"],
                    "entrega" => $fechaEntrega,
                    "final" =>  $nuevaFecha,
                    "tipo_movimiento" =>  'ingreso',
                    "activo" => 1,
                    "aplicado" => 0, 
                    "saldo" =>  $_POST['saldo'],
                    "createdby" => $LoggedUserId,
                    "updateddate" =>  date("Y-m-d H:i:s"),
                );
                                
                $insert = $this->modelAsign->addData($insertData);
                if($insert){
                    $contador = 0;
                    for ($i=0; $i < $_POST["pagos"]; $i++) { 
                        if($_POST["periodicidad"] == "mensual"){
                            $contador = $i*1;
                        }
                        if($_POST["periodicidad"] == "bimestral"){
                            $contador = $i*2;
                        }
                        if($_POST["periodicidad"] == "trimestral"){
                            $contador = $i*3;
                        }
                        if($_POST["periodicidad"] == "semestral"){
                            $contador = $i*6;
                        }
                        if($_POST["periodicidad"] == "anual"){
                            $contador = $i*1;
                        }
                        $insertCompr = array(
                            "pago" =>  $i+1,
                            "fecha" =>  date("Y-m-d",strtotime($fechaActual."+ $contador month")),
                            "concepto" =>  "Renta",
                            "importe" => $_POST["renta"],
                            "aplicado" =>  $_POST["renta"],
                            "saldo" =>  0,
                            "forma_pago" =>  $_POST["tipoPago"],
                            "activo" => 1,
                            "createdby" => $LoggedUserId,
                            "id_asignacion" => $idAsignacion,
                        );
                        $insert = $this->modelAsign->addCompromiso($insertCompr);
                        
                    }
                    if($_POST['tramite'] != ''){
                        $insertCompr = array(
                            "pago" =>  1,
                            "fecha" => $fechaActual,
                            "concepto" =>  "Tramite",
                            "importe" => $_POST["tramite"],
                            "aplicado" =>  $_POST["tramite"],
                            "saldo" =>  0,
                            "forma_pago" =>  $_POST["tipoPago"],
                            "activo" => 1,
                            "id_asignacion" => $idAsignacion,
                        );	
                        $insert = $this->modelAsign->addCompromiso($insertCompr);
                    }
                    
                    if($_POST['asignacion'] != ''){
                        $insertCompr = array(
                            "pago" =>  1,
                            "fecha" => $fechaActual,
                            "concepto" =>  "Asignacion",
                            "importe" => $_POST["asignacion"],
                            "aplicado" =>  $_POST["asignacion"],
                            "saldo" =>  0,
                            "forma_pago" =>  $_POST["tipoPago"],
                            "activo" => 1,
                            "createdby" => $LoggedUserId,
                            "id_asignacion" => $idAsignacion,
                        );	
                        $insert = $this->modelAsign->addCompromiso($insertCompr);
                    }
                    
                    if($_POST['garantia'] != ''){
                        $insertCompr = array(
                            "pago" =>  1,
                            "fecha" => $fechaActual,
                            "concepto" =>  "Garantia",
                            "importe" => $_POST["garantia"],
                            "aplicado" =>  $_POST["garantia"],
                            "saldo" =>  0,
                            "forma_pago" =>  $_POST["tipoPago"],
                            "activo" => 1,
                            "createdby" => $LoggedUserId,
                            "id_asignacion" => $idAsignacion,
                        );	
                        $insert = $this->modelAsign->addCompromiso($insertCompr);
                    }

                    $idArm = $_POST["arma"];
                    $asignArm = array(
                        "id_portador" =>  $_POST["elemento"],
                        "activo" =>  0,
                        "updateddate" =>  date("Y-m-d H:i:s"),
                        "updatedby" => $LoggedUserId,
                    );		
                    

                    $update = $this->modelAsign->elementAignArm($asignArm, $idArm);
                }

                $this->db->transComplete();

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
	
    public function getCompromisoPago(){
        if ($this->request->getMethod() == "post"){
            $errors = [];
            $succes = [];
            $dontSucces = [];
            $data = [];
			$validate = [];

            $select = $this->modelAsign->getPagos( $_POST['pago'] );

            if ($select) {
                $succes = ["mensaje" => 'Exito', "succes" => "succes"];
                $data = $select;
            } else {
                $dontSucces = ["error" => "error", "mensaje" => 'Hubo un error al Obtener los Datos.'];
            }
            
			echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
		}	
    }

    public function setCompromisoPago(){
        if ($this->request->getMethod() == "post" && $this->request->getvar(['id', 'saldo', 'idPadre'],FILTER_SANITIZE_STRING)){
            
            $rules = [
				'id' => ['label' => '', 'rules' => 'required'],
				'saldo' => ['label' => '', 'rules' => 'required'],
				'idPadre' => ['label' => '', 'rules' => 'required'],
			];
            
            $errors = [];
            $succes = [];
            $dontSucces = [];
            $data = [];
            $this->db->transStart();
        
            $getUser = session()->get('IdUser');
            $LoggedUserId = $this->encrypter->decrypt($getUser);

            if($this->validate($rules)){
                    
                $idCP = $_POST["id"];
                $idPadre = $_POST["idPadre"];

                $select = $this->modelAsign->getAsignaciones($idPadre);
                $selectCP = $this->modelAsign->getCompromisoPago($idCP);
                $saldoT = $select[0]->saldo-$_POST["saldo"];
                if($saldoT == 0){
                    $updateAsign = array(
                        "saldo" =>  $saldoT,
                        "aplicado" =>  $select[0]->aplicado+$_POST["saldo"],
                        "activo" =>  0,
                        "updateddate" =>  date("Y-m-d H:i:s"),
                        "updatedby" => $LoggedUserId,
                    );		
                }else{
                    $updateAsign = array(
                        "saldo" =>  $saldoT,
                        "aplicado" =>  $select[0]->aplicado+$_POST["saldo"],
                        "updatedby" => $LoggedUserId,
                        "updateddate" =>  date("Y-m-d H:i:s"),
                    );		
                }

                if($_POST["saldo"] ==  $selectCP[0]->importe){
                    $dataCP = array(
                        "saldo" =>  $_POST["saldo"],
                        "aplicado" =>  $selectCP[0]->importe-$_POST["saldo"],
                        "activo" =>  0,
                        "fecha_pago" =>  $_POST["fechaSaldo"],
                        "banco" =>  $_POST["banco"],
                        "cuenta" =>  $_POST["cuenta"],
                        "forma_pago" =>  $_POST["formaPago"],
                        "updatedby" => $LoggedUserId,

                    );	
                }else{
                    $dataCP = array(
                        "saldo" =>  $_POST["saldo"],
                        "aplicado" =>  $selectCP[0]->importe-$_POST["saldo"],
                        "fecha_pago" =>  $_POST["fechaSaldo"],
                        "banco" =>  $_POST["banco"],
                        "cuenta" =>  $_POST["cuenta"],
                        "forma_pago" =>  $_POST["formaPago"],
                        "updatedby" => $LoggedUserId,
                    );		
                }

                $update = $this->modelAsign->setCompromisoPago($dataCP, $idCP);
                $update = $this->modelAsign->setupdateSaldoAplicado($updateAsign, $idPadre);

                $this->db->transComplete();

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
        
    public function detailAsignacion(){

        if ($this->request->getMethod() == "get" && $this->request->getvar(['id'],FILTER_SANITIZE_STRING)){

			$data['modulos'] = $this->menu->Permisos();
			$data['breadcrumb'] = ["inicio" => 'Asignaciones' ,
                    				"url" => 'asignaciones',
                    				"titulo" => 'Detalle'];
			$id = str_replace(" ", "+", $_GET['id']);
			$idAdmin = session()->get('IdUser');

			$data['datos'] = $this->modelAsign->getData($id);
			$data['getById'] = $this->modelAsign->getById($id);
			$data['datosPagos'] = $this->modelAsign->getPagos($id);


			return view('asignaciones/detailAsign', $data);
		}
    }
   


    public function deleteData(){
        if ($this->request->getMethod() == "post"){
            $errors = [];
            $succes = [];
            $dontSucces = [];
            $data = [];
			$validate = [];

            
            $delete = $this->modelAsign->delete( $_POST['idElimn'], $_POST["idArma"] );
            if ($delete) {
                $succes = ["mensaje" => 'Exito', "succes" => "succes"];
                $data = $delete;
            } else {
                $dontSucces = ["error" => "error", "mensaje" => 'Hubo un error al Obtener los Datos.'];
            }
				
			echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
		}
    }
}
