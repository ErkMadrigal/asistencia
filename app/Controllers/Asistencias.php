<?php

namespace App\Controllers;


use App\Models\AsistenciasModel;
use App\Libraries\Menu;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;


class Asistencias extends BaseController
{

    private $encrypter;
	private $menu;
	private $encrypt;
	private $db;
	private $AsistenciasModel;

    public function __construct(){
		$this->menu = new Menu();
		$this->encrypt = new Encrypt();
		$this->encrypter = \Config\Services::encrypter();
        $this->db =  \Config\Database::connect('default');
		$this->AsistenciasModel = new AsistenciasModel($this->db);
    }
    


    public function index()
    {
        return view('asistencias/asistencias');
    }

    public function GetAllAsistencias()
    {
        if ($this->request->getMethod() == "get"){
            
            echo json_encode($this->AsistenciasModel->GetAllAsistencias());
        }
    }

    public function setAsistencias()
    {
        $jsonData = $this->request->getJSON(true);

        if ($this->request->getMethod() !== 'post') {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Método no permitido'
            ])->setStatusCode(405); // Código 405 para métodos no permitidos
        }

        // Recibimos los datos del cliente mediante el método POST
        $data = [
            'nombre_completo' => $jsonData['nombre_Completo'],
            'matricula' => $jsonData['matricula'],
            'password' => $jsonData['password'],
            'rol' => 2, 
            'activo' => 1
        ];

        // Llamada al modelo para insertar los datos
        $insertedId = $this->AsistenciasModel->setAsistencias($data);

        // Comprobamos si la inserción fue exitosa
        if ($insertedId) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Ingreso exitoso',
                'id' => $insertedId
            ])->setStatusCode(200); // Código 200 para creación exitosa
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Error: al querer realizar el ingreso'
            ])->setStatusCode(500); // Código 500 para error en el servidor
        }
    }

    public function searchAsistencia()
    {
        $jsonData = $this->request->getJSON(true);

        if ($this->request->getMethod() !== 'post') {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Método no permitido'
            ])->setStatusCode(405); // Código 405 para métodos no permitidos
        }


        // Llamada al modelo para insertar los datos
        $selected = $this->AsistenciasModel->GetAsistenciasDate($jsonData['curp']);

        // Comprobamos si la inserción fue exitosa
        if ($selected) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Busqueda exitosa',
                'data' => $selected
            ])->setStatusCode(200); // Código 200 para creación exitosa
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'No se encontraron resultados'
            ])->setStatusCode(500); // Código 500 para error en el servidor
        }
    }

}
