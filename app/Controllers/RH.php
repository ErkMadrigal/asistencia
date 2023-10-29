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
        if ($this->request->getMethod() == "post"){
			
            $errors = [];
            $succes = [];
            $dontSucces = [];
            $data = [];
            $error = [];

            $inicio = $_POST['inicio'];
            $final = '';


            if($inicio != ''){
                $final = $_POST['final'];
                if($final == ''){
                    array_push($error, 1);
                }
            }

            if(count($error) == 0){
                $data = $this->modelRH->getAllDataAlta($inicio, $final);
                $succes = ["mensaje" => 'Exito', "succes" => "succes"];
            }else{
                $dontSucces = ["error" => "error",
                                "mensaje" => 	"Requiere de la Fecha Final" ];
            }
			
            echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
		}	
    }

    public function getBajasEmpleados(){
        if ($this->request->getMethod() == "post"){
			
            $errors = [];
            $succes = [];
            $dontSucces = [];
            $data = [];
            $error = [];

            $inicio = $_POST['inicio'];
            $final = '';


            if($inicio != ''){
                $final = $_POST['final'];
                if($final == ''){
                    array_push($error, 1);
                }
            }

            if(count($error) == 0){
                $data = $this->modelRH->getAllDataBaja($inicio, $final);
    			// echo $this->db->getLastQuery();

                $succes = ["mensaje" => 'Exito', "succes" => "succes"];
            }else{
                $dontSucces = ["error" => "error",
                                "mensaje" => 	"Requiere de la Fecha Final" ];
            }

            echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
		}	
    }
}
