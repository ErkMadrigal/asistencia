<?php

namespace App\Controllers;


use App\Models\EstudiantesModel;
use App\Libraries\Menu;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;


class Estudiantes extends BaseController{

    private $encrypter;
	private $menu;
	private $encrypt;
	private $db;
	private $EstudiantesModel;

    public function __construct(){
		$this->menu = new Menu();
		$this->encrypt = new Encrypt();
		$this->encrypter = \Config\Services::encrypter();
        $this->db =  \Config\Database::connect('default');
		$this->EstudiantesModel = new EstudiantesModel($this->db);
    }
    
    public function index(){
        if ($this->request->getMethod() == "get"){
			
            return view('estudiantes/estudiantes');
		}	
    }

   
    public function GetAllEstudents()
    {
        if ($this->request->getMethod() == "get"){
            
            echo json_encode($this->EstudiantesModel->GetAllEstudents());
        }
    }

    public function getEstudent($id)
    {
        if ($this->request->getMethod() == "get"){
            
            echo json_encode($this->EstudiantesModel->GetEstudents($id));
        }
    }

    public function setEstudiante()
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
            'id_escuela' => 1,
            'nombres' => $jsonData['nombres'],
            'paterno' => $jsonData['paterno'],
            'materno' => $jsonData['materno'],
            'curp' => $jsonData['curp'],
            'matricula' => $jsonData['matricula'],
            'activo' => 1  // Se asume activo para el nuevo registro
        ];

        // Llamada al modelo para insertar los datos
        $insertedId = $this->EstudiantesModel->setEstudents($data);

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


    public function updateEstudiante($id)
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
            'nombres' => $jsonData['nombres'],
            'paterno' => $jsonData['paterno'],
            'materno' => $jsonData['materno'],
            'curp' => $jsonData['curp'],
            'matricula' => $jsonData['matricula'],
        ];

        // Llamada al modelo para insertar los datos
        $updateId = $this->EstudiantesModel->updateEstudents($data, $id);

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


    public function deleteEstudiantes($id)
    {


        $jsonData = $this->request->getJSON(true);

        if ($this->request->getMethod() !== 'post') {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Método no permitido'
            ])->setStatusCode(405); // Código 405 para métodos no permitidos
        }

        // Recibimos los datos del cliente mediante el método POST
        $data['activo'] = 0;
        

        // Llamada al modelo para insertar los datos
        $updateId = $this->EstudiantesModel->updateEstudents($data, $id);

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

    public function getContacts($id)
    {
        if ($this->request->getMethod() == "get"){
            
            echo json_encode($this->EstudiantesModel->GetContacts($id));
        }
    }

    public function getContact($id)
    {
        if ($this->request->getMethod() == "get"){
            
            echo json_encode($this->EstudiantesModel->GetContact($id));
        }
    }

    public function active_Desactive_Phone($id)
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
        $updateId = $this->EstudiantesModel->updateContacts($data, $id);

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

    public function setContacts()
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
            'id_estudiante' => $jsonData['id_estudiante'],
            'telefono' => $jsonData['telefono'],
            'parentesco' => $jsonData['parentesco'],
            'activo' => 1  // Se asume activo para el nuevo registro
        ];

        // Llamada al modelo para insertar los datos
        $insertedId = $this->EstudiantesModel->setContacts($data);

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


    public function updateContacts($id)
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
            'telefono' => $jsonData['telefono'],
            'parentesco' => $jsonData['parentesco'],
        ];

        // Llamada al modelo para insertar los datos
        $updateId = $this->EstudiantesModel->updateContacts($data, $id);

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

}
