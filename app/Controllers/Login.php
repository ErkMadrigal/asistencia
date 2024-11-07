<?php

namespace App\Controllers;
use App\Models\LoginModel;
use App\Libraries\Encrypt;


class Login extends BaseController
{

    private $encrypter;
	private $encrypt;
	private $db;
	private $LoginModel;

    public function __construct(){
		$this->encrypt = new Encrypt();
		$this->encrypter = \Config\Services::encrypter();
        $this->db =  \Config\Database::connect('default');
		$this->LoginModel = new LoginModel($this->db);
    }

    public function index()
    {
        if ($this->request->getMethod() == 'post') {

            $rules = [
                'matricula' => 'required|min_length[6]|max_length[50]',
                'password' => 'required|min_length[4]|max_length[255]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => 'matricula o pass incorrecto'],
            ];

            if (!$this->validate($rules, $errors)) {
                // Enviar errores de validación como JSON
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => $this->validator->getErrors(),
                ]);
            } else {
                $matricula = $this->request->getPost('matricula');
                $password = $this->request->getPost('password');

                // Validar el usuario con el modelo
                $user = $this->LoginModel->getUserByMatricula($matricula);
                if(!$user){
                    return $this->response->setJSON([
                        'status' => 'error',
                        'message' => 'Usuario no encontrado o inactivo'
                    ]);
                }
                if ($user->password == md5($password)) {
                    // Si la validación es exitosa
                    $this->setUserSession($user);
                    return $this->response->setJSON([
                        'status' => 'success',
                        'message' => 'Usuario correcto',
                    ]);
                } else {
                    return $this->response->setJSON([
                        'status' => 'error',
                        'message' => 'Contraseña incorrectos',
                    ]);
                }
            }
        }
        return view('auth/login');
    }


    private function setUserSession($user){
		$encrypter = \Config\Services::encrypter();
		$idUser = $user->id;
		$data = [
			'IdUser' => $idUser,
			'firstname' => $user->nombre_completo,
			'matricula' => $user->matricula,
			'rol' => $user->rol,
			'isLoggedIn' => true
		];


		session()->set($data);

		return true;

	}

	public function logout(){

		session()->destroy();
		return redirect()->to(base_url());
	}
}
