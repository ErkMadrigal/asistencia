<?php

namespace App\Controllers;


use App\Models\RHModel;
use App\Libraries\Crud_email;
use App\Libraries\Menu;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;


class RH extends BaseController{

    private $encrypter;
	private $menu;
	private $encrypt;
	private $db;
	private $modelRH;

    public function __construct(){
		$this->menu = new Menu();
		$this->encrypt = new Encrypt();
		$this->encrypter = \Config\Services::encrypter();
        $this->db =  \Config\Database::connect('default');
		$this->modelRH = new RHModel($this->db);
    }
    
    public function index(){
        if ($this->request->getMethod() == "get"){
			
            $data['modulos'] = $this->menu->Permisos();
			return view('RH/incidencias_empleados', $data);
		}	
    }

    public function getAltasEmpleados(){
        if ($this->request->getMethod() == "get"){
			
            $errors = [];
            $succes = [];
            $dontSucces = [];
            $data = [];
			$data = $this->modelRH->getAllDataAlta();
            $succes = ["mensaje" => 'Exito', "succes" => "succes"];
			
            echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
		}	
    }

    public function getBajasEmpleados(){
        if ($this->request->getMethod() == "get"){
			
            $errors = [];
            $succes = [];
            $dontSucces = [];
            $data = [];
			$data = $this->modelRH->getAllDataBaja();
            $succes = ["mensaje" => 'Exito', "succes" => "succes"];
			
            echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
		}	
    }
}
