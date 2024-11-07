<?php

namespace App\Controllers;


use App\Models\DocentesModel;
use App\Libraries\Menu;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;


class Docentes extends BaseController
{

    private $encrypter;
	private $menu;
	private $encrypt;
	private $db;
	private $DocentesModel;

    public function __construct(){
		$this->menu = new Menu();
		$this->encrypt = new Encrypt();
		$this->encrypter = \Config\Services::encrypter();
        $this->db =  \Config\Database::connect('default');
		$this->DocentesModel = new DocentesModel($this->db);
    }
    


    public function index()
    {
        return view('docentes/docentes');
    }

    public function GetAllDocents()
    {
        if ($this->request->getMethod() == "get"){
            
            echo json_encode($this->DocentesModel->GetAllDocents());
        }
    }

    public function GetAllDocents($id)
    {
        if ($this->request->getMethod() == "get"){
            
            echo json_encode($this->DocentesModel->GetAllDocents($id));
        }
    }

    public function setDocents()
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
            'nombre_completo' => $jsonData['nombre_completo'],
            'matricula' => $jsonData['matricula'],
            'password' => $jsonData['password'],
            'rol' => 1, 
            'activo' => 1
        ];

        // Llamada al modelo para insertar los datos
        $insertedId = $this->DocentesModel->setDocents($data);

        // Comprobamos si la inserción fue exitosa
        if ($insertedId) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Registro creado correctamente',
                'id' => $insertedId
            ])->setStatusCode(200); // Código 200 para creación exitosa
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'No se pudo crear el registro'
            ])->setStatusCode(500); // Código 500 para error en el servidor
        }
    }


    public function updateDocents($id)
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
            'nombre_completo' => $jsonData['nombre_completo'],
            'matricula' => $jsonData['matricula'],
            'password' => $jsonData['password'],
        ];

        // Llamada al modelo para insertar los datos
        $updateId = $this->DocentesModel->updateDocents($data, $id);

        // Comprobamos si la inserción fue exitosa
        if ($updateId) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Registro actualizado correctamente',
                'id' => $updateId
            ])->setStatusCode(200); 
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'No se pudo actualizar el registro'
            ])->setStatusCode(500); // Código 500 para error en el servidor
        }
    }


    public function deleteDocents($id)
    {


        $jsonData = $this->request->getJSON(true);

        if ($this->request->getMethod() !== 'post') {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Método no permitido'
            ])->setStatusCode(405); // Código 405 para métodos no permitidos
        }

        // Recibimos los datos del cliente mediante el método POST
        $data['activo'] = $jsonData['activo'];
        

        // Llamada al modelo para insertar los datos
        $updateId = $this->DocentesModel->updateDocents($data, $id);

        // Comprobamos si la inserción fue exitosa
        if ($updateId) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Registro Eliminado correctamente',
                'id' => $updateId
            ])->setStatusCode(200); 
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'No se pudo Eliminado el registro'
            ])->setStatusCode(500); // Código 500 para error en el servidor
        }
    }

}
