<?php namespace App\Controllers;
	
use App\Models\UserModel;
use App\Libraries\Crud_email;

class User extends BaseController
{
	public function index()
	{
		
		$data = [];
		helper(['form']);

		if ($this->request->getMethod() == 'post'){

			$rules = [
				'email' => 'required|min_length[6]|max_length[50]|valid_email',
				'password' => 'required|min_length[4]|max_length[255]|validateUser[email,password]',

			];

			$errors = [
				'password' => [
					'validateUser' => 'email o pass incorrecto'

				]

			];

			if (!$this->validate($rules,$errors)){
				$data['validation'] = $this->validator;
			} else{
				$model = new UserModel();

				$user = $model->where('email', $this->request->getVar('email'))->select('sys_usuarios_admin.nombre,apellido_paterno,email,sys_usuarios_admin.id,rol,idempresa')->first();

				if(!$user){

					$user = $model->userById($this->request->getVar('email'));
					$this->setUserSession($user);

				} else {
					$this->setUserSessionAdmin($user);

				}

				
				//$session->setFlashdata('success', 'Successful Registration');
				return redirect()->to(base_url().'/dash');				
			}

		}
		return view('login/login', $data);
	}

	private function setUserSessionAdmin($user){
		$encrypter = \Config\Services::encrypter();
		$idUser = $encrypter->encrypt($user['id']);
		$idEmpresa = $encrypter->encrypt($user['idempresa']);
		$data = [
			'IdUser' => $idUser,
			'firstname' => $user['nombre'],
			'lastname' => $user['apellido_paterno'],
			'email' => $user['email'],
			//'rol' => $user['rol'],
			
			'empresa' =>  $idEmpresa,
			'isLoggedIn' => true
		];


		session()->set($data);

		return true;

	}

	public function logout(){

		session()->destroy();
		return redirect()->to(base_url());
	}

	private function setUserSession($user){
		$encrypter = \Config\Services::encrypter();
		$idUser = $encrypter->encrypt($user->id);
		$idBase = $encrypter->encrypt($user->idbase);
		$idEmpresa = $encrypter->encrypt($user->idempresa);
		$data = [
			'IdUser' => $idUser,
			'firstname' => $user->nombre,
			'lastname' => $user->apellido_paterno,
			'email' => $user->email,
			//'rol' => $user->rol,
			'base' =>  $idBase,
			'empresa' =>  $idEmpresa,
			'isLoggedIn' => true
		];


		session()->set($data);

		return true;

	}

	public function olvide_contrasena()
	{
		
		return view('login/recuperarContrasena');
	}


	public function recuperarContrasena(){

		if($this->request->getMethod() == "post" && $this->request->getvar(['email'],FILTER_SANITIZE_STRING)) {

			$rules = [
				'email' =>  [ 'label' => 'Email', 'rules' => 'required|valid_email|is_not_unique_whitout_log[sys_usuarios_admin.email,activo,1]']];
				$errors = [];
				$succes = [];
				$dontSucces = [];
				$data = [];
				
				
				if($this->validate($rules)){
					$model = new UserModel();
					$this->crudEmail = new Crud_email();
					$registrar = $model->recuperacion($_POST);
					
					if ($registrar > 0){

						$Subject = "Recuperación de contraseña" ;
						foreach ($registrar as $value){

                                	
                                	$trimEmail = trim($value->email);
                                	$nombre = $value->nombre;
                                	$token = trim($value->token);

									$body = "<table width='100%' border='0' cellspacing='0' cellpadding='0'>
    	<tr>
        <td style='background-color: #fff; padding-top:25px; padding-left:10px; padding-right:10px; font-family: Arial;color: #6e2b80; font-size:14px;'>
            <center>
                <p style='font-weight:bold;color:#171514;'>Apreciable: $nombre</p>
                <p style='font-weight:bold;color:#171514;'>Da clic en el siguiente enlace para asignar tu nueva contraseña: </p>
                <p><a
                        href='".base_url()."/Recuperar/$token'>".base_url()."/Recuperar</a>
                </p>
            </center>
        </td>
    	</tr>
		</table>";
									
									$message = $this->crudEmail->message($body, $Subject);


									$email = \Config\Services::email();
									
        								$email->setTo(strval($trimEmail));
        								$email->setFrom(lang('Layout.email'),lang('Layout.emailFrom'));
        								$email->setSubject($Subject);
        								$email->setMessage($message);
        								
                        				$email->send();
                     

                            	}

                            	

						$succes = ["mensaje" => "Solicitud exitosa, se ha enviado un email al correo electronico registrado para que pueda realizar la recuperación de su contraseña." ,
                            	   "succes" => "succes"];
					} else {

						$dontSucces = ["error" => "error",
                    				  "mensaje" => 	"Hubo un error al realizar la solicitud" ];
					}
					
				} else {

					$errors = $this->validator->getErrors();
				}

			}
			echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);

	}

	

}
