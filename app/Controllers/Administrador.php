<?php namespace App\Controllers;


use App\Models\AdministradorModel;
use App\Libraries\Crud_email;
use App\Libraries\Menu;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;

class Administrador extends BaseController {

	
	private $encrypter;
	private $menu;
	private $encrypt;
	private $db;
	private $modelAdministrador;

	public function __construct()
	{
		$this->crudEmail = new Crud_email();
		$this->menu = new Menu();
		$this->encrypt = new Encrypt();
		$this->encrypter = \Config\Services::encrypter();
        $this->db =  \Config\Database::connect('default');
		$this->modelAdministrador = new AdministradorModel($this->db);
		
	}

	public function GetUsuario(){
		$rolUser = $this->Rol();
		if ($this->request->getMethod() == "get" && $rolUser === "1"){

			$data['modulos'] = $this->menu->Permisos();
			$empresa = session()->get('empresa');
			$idEmpresa = $this->encrypter->decrypt($empresa);
			$resultData = $this->modelAdministrador->GetUsuarios($idEmpresa);
			$result = [];
			foreach ( $resultData as $v){
				
				$id = $this->encrypt->Encrypt($v->id);
				$result[] = (object) array (
					'id' => $id ,
					'firstname' => $v->nombre,
					'lastname' => $v->apellido_paterno,
					'email' => $v->email

				) ;
			}
		
			$dataCrud = [
                'data' => $result]; 

        	$data['result'] = $dataCrud['data'];

			
			return view('administrador/usuarios', $data);
		}	
	}

	public function EditarUsuario(){
		$rolUser = $this->Rol();
		if ($this->request->getMethod() == "get" && $rolUser === "1" && $this->request->getvar(['id'],FILTER_SANITIZE_STRING)){

			$data['modulos'] = $this->menu->Permisos();
			
			$getId = str_replace(" ", "+", $_GET['id']);
			$id = $this->encrypt->Decrytp($getId);
			$getUser = session()->get('IdUser');
			$idUserAdmin = $this->encrypter->decrypt($getUser);

			$data['modulosUsuario'] = $this->modelAdministrador->GetModulosUserById($id , $idUserAdmin);

			$data['user'] = $this->modelAdministrador->GetuserById($id);

			$data['getId'] =  $getId;

			$data['empresa'] = $this->modelAdministrador->GetEmpresasUserById($id , $idUserAdmin);
			
			$data['breadcrumb'] = ["inicio" => 'Usuarios',
                    				"url" => 'usuarios',
                    				"titulo" => 'Editar'];
			return view('administrador/editUsuarios', $data);
		}	
	}

	public function EditarPermiso(){
		$rolUser = $this->Rol();
		if ($this->request->getMethod() == "post" && $rolUser === "1" && $this->request->getvar(['idUser','idEdit','valEdit','type'],FILTER_SANITIZE_STRING)){
				$rules = [
				'idUser' =>  'required',
				'idEdit' =>  'required',
				'valEdit' =>  'required|in_list[0,1]',
				'type' =>  'required|max_length[1]|integer|in_list[2,1]'];
				
				$errors = [];
				$succes = [];
				$dontSucces = [];
				$data = [];
				
				if($this->validate($rules) && $rolUser === "1" ){
					$idUserPost = $_POST["idUser"];
					$idUser = $this->encrypt->Decrytp($idUserPost);

					$getUser = session()->get('IdUser');
					$idUserAdmin = $this->encrypter->decrypt($getUser);
					$idEditPost = $_POST["idEdit"];

					$idEdit = $this->encrypt->Decrytp($idEditPost);

						
					
						$updatePermiso = array(
		    			"permiso" =>  $_POST["valEdit"]);		


						$update = $this->modelAdministrador->updatePermiso( $updatePermiso ,$idEdit,$idUser , $idUserAdmin , $_POST["valEdit"],$_POST["type"]);

                    	if ($update) {
                    	
                    		$succes = ["mensaje" => 'Permiso editado con exito.' ,
                            	   "succes" => "succes"];
                    	
                    	} else {
                    		$dontSucces = ["error" => "error" ,
                    				   "mensaje" => 'Hubo un error al intentar editar el permiso.'];

                    	}
                    		

				} else {	
					$errors = $this->validator->getErrors();
				}

				echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
		}	
	}

	public function DetalleUsuario(){
		$rolUser = $this->Rol();
		if ($this->request->getMethod() == "get" && $rolUser === "1" && $this->request->getvar(['id'],FILTER_SANITIZE_STRING)){

			$data['modulos'] = $this->menu->Permisos();
			$getId = str_replace(" ", "+", $_GET['id']);
			$id = $this->encrypt->Decrytp($getId);
			$idAdmin = session()->get('IdUser');
        	$idUserAdmin = $this->encrypter->decrypt($idAdmin);

        	$data['user'] = $this->modelAdministrador->GetuserById($id);
        	$data['modulosUsuario'] = $this->modelAdministrador->GetModulosUserById($id , $idUserAdmin);

        	$data['empresa'] = $this->modelAdministrador->GetEmpresasUserById($id , $idUserAdmin);
        	
			
			$data['breadcrumb'] = ["inicio" => 'Usuarios' ,
                    				"url" => 'usuarios',
                    				"titulo" => 'Detalle'];
		
			return view('administrador/detailUsuarios', $data);
		}	
	}

	public function EditarUsuarioById(){
		$rolUser = $this->Rol();
		if ($this->request->getMethod() == "post" && $rolUser === "1" && $this->request->getvar(['Nombre','apellidopaterno','activo', 'id'],FILTER_SANITIZE_STRING)){
				$rules = [
				'Nombre' => ['label' => 'Nombre', 'rules' => 'required' ],
				'apellidopaterno' => ['label' => 'Apellido paterno', 'rules' => 'required'],
				'activo' => ['label' => 'Activo', 'rules' => 'in_list[0,1]'],
				'id' => ['label' => '', 'rules' => 'required']

				];
				
				$errors = [];
				$succes = [];
				$dontSucces = [];
				$data = [];
				

				if($this->validate($rules) && $rolUser === "1" ){
					
					$idUserPost = $_POST["id"];
					$idUser = $this->encrypt->Decrytp($idUserPost);
					$updateUsuario = array(
		    			"nombre" =>  $_POST["Nombre"],
		    			"apellido_paterno" =>  $_POST["apellidopaterno"],
		    			"activo" =>  $_POST["activo"],
		    			"updated_at" =>  date("Y-m-d H:i:s"),
		    		);		


					$update = $this->modelAdministrador->updateUsuario( $updateUsuario ,$idUser );

                    if ($update) {
                    	
                    	$succes = ["mensaje" => 'Usuario editado con exito.' ,
                            	   "succes" => "succes"];
                    	
                    } else {
                    	$dontSucces = ["error" => "error" ,
                    				   "mensaje" => 'Hubo un error al intentar editar el usuario.'];

                    }
				} else {	
					$errors = $this->validator->getErrors();
				}

				echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
		}	
	}

	public function AgregarUsuario(){
		$rolUser = $this->Rol();
		if ($this->request->getMethod() == "get" && $rolUser === "1"){

			$data['modulos'] = $this->menu->Permisos();
			$data['breadcrumb'] = ["inicio" => 'Usuarios' ,
                    				"url" => 'usuarios',
                    				"titulo" => 'Agregar'];

            $resultData = $this->modelAdministrador->GetAllEmpresas();
			$result = [];


			foreach ( $resultData as $v){
				
				$id = $this->encrypt->Encrypt($v->id);
				$result[] = (object) array (
					'id' => $id ,
					'nombre' => $v->nombre,
					
				) ;
			}
		
			$dataCrud = [
                'data' => $result]; 

        	$data['empresa'] = $dataCrud['data'];        				
			
			$id = session()->get('IdUser');
        	$idUser = $this->encrypter->decrypt($id);
			


			return view('administrador/addUsuario', $data);
		}	
	}

	

	public function CrearUsuario(){
		$rolUser = $this->Rol();
		if ($this->request->getMethod() == "post" && $rolUser === "1" && $this->request->getvar(['Nombre','email','apellidopaterno'],FILTER_SANITIZE_STRING)){
				$rules = [
				'Nombre' => ['label' => 'Nombre', 'rules' => 'required' ],
				'apellidopaterno' => ['label' => 'Apellido paterno', 'rules' => 'required'],
				'email' =>  [ 'label' => 'Email', 'rules' => 'required|valid_email|is_unique[sys_usuarios_admin.email]']

				];
				
				$errors = [];
				$succes = [];
				$dontSucces = [];
				$data = [];
				
				
				$getModulos = json_decode($_POST['mod'],true);
				$modulosCount = 0;
				foreach ($getModulos as $x =>$value) {
					if ($value['val'] == 1){

						$modulosCount = $modulosCount + 1;

					}
				}

				$getEmpresas = json_decode($_POST['emp'],true);
				$empresasCount = 0;
				foreach ($getEmpresas as $x =>$value) {
					if ($value['val'] == 1){

						$empresasCount = $empresasCount + 1;

					}
				}
				 
				if($this->validate($rules) && $rolUser === "1" && $modulosCount > 0 && $empresasCount > 0){
					
					$getUser = session()->get('IdUser');
					$idUser = $this->encrypter->decrypt($getUser);
					
						
						
						
						$pass = $this->randomPass();
						$password = password_hash($pass, PASSWORD_DEFAULT); 
        				$nombre = $this->request->getvar(['Nombre'],FILTER_SANITIZE_STRING);
        				$apellidoPaterno = $this->request->getvar(['apellidopaterno'],FILTER_SANITIZE_STRING);
        				$email = $this->request->getvar(['email'],FILTER_SANITIZE_STRING);
						$createUsuario = array(
		    				"firstname" =>  $nombre ,
		    				"lastname" =>  $apellidoPaterno,
		    				"email" => $email,
		    				"activo" =>  1,
		    				"rol" => 2,
		    				"idempresa" => '',
		    				"password" => $password,
		    				"ip" => $this->getRealIP()
		    			);		

						$create = $this->modelAdministrador->createUsuario( $createUsuario ,$_POST['mod'],$idUser , $_POST['emp']); 
					
						
                    	if ($create) {
                    		$Subject = lang('Administrador.altaUsuario');
                    		$trimEmail = $_POST['email'];
                            
                           

							$body = "<table width='100%' border='0' cellspacing='0' cellpadding='0'>
    	<tr>
        <td style='background-color: #fff; padding-top:25px; padding-left:10px; padding-right:10px; font-family: Arial;color: #6e2b80; font-size:14px;'>
            <center>
                <p style='font-weight:bold;color:#171514;'>Bienvenido, ".$_POST['Nombre']."</p>
                <p style='font-weight:bold;color:#171514;'>Has sido registrado en Serprosep, ingresa al siguiente enlace:</p>
                <p><a href='".base_url()."'>".base_url()."</a>
                </p>
                <p style='font-weight:bold;color:#171514;'>Usuario: ".$trimEmail."</p>
                <p style='font-weight:bold;color:#171514;'>Contraseña: ".$pass."</p>
            </center>
        </td>
    	</tr>
		</table>";
									
							$message = $this->crudEmail->message($body, $Subject);

							
							$emailObj = \Config\Services::email();
									
        					$emailObj->setTo(strval($trimEmail));
        					$emailObj->setFrom(lang('Layout.email'),lang('Layout.emailFrom'));
        					$emailObj->setSubject($Subject);
        					$emailObj->setMessage($message);
        								
                        	$emailObj->send();
                    	
                    		$succes = ["mensaje" => lang('Administrador.creaUsuarioExito') ,
                            	   "succes" => "succes"];
                    	
                    	} else {
                    		$dontSucces = ["error" => "error" ,
                    				   "mensaje" => lang('Administrador.creaUsuarioError')];

                    	}
                	
				} else {	
					$errors = $this->validator->getErrors();
				}

				echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
		}	
	}

	

	

    


	

	

	public function InfoEmpresa(){
		$rolUser = $this->Rol();
		if ($this->request->getMethod() == "get" && $rolUser === "1" ){

			$data['modulos'] = $this->menu->Permisos();
			
			$getUser = session()->get('IdUser');
			$idUser = $this->encrypter->decrypt($getUser);
			$resultData = $this->modelAdministrador->GetEmpresas($idUser);
			$result = [];


			foreach ( $resultData as $v){
				
				$id = $this->encrypt->Encrypt($v->id);
				$result[] = (object) array (
					'id' => $id ,
					'nombre' => $v->nombre,
					'telefonos' => $v->telefonos,
					'activo' => $v->activo

				) ;
			}
		
			$dataCrud = [
                'data' => $result]; 

        	$data['empresa'] = $dataCrud['data'];

        	
		
			return view('administrador/detailEmpresa', $data);
		}	
	}

	public function EditarEmpresa(){
		$rolUser = $this->Rol();
		if ($this->request->getMethod() == "get" && $rolUser === "1" ){

			$data['modulos'] = $this->menu->Permisos();
			
			$getId = str_replace(" ", "+", $_GET['id']);
			$idEmpresa = $this->encrypt->Decrytp($getId);
			
			$data['empresa'] = $this->modelAdministrador->GetEmpresaById($idEmpresa);

			$data['id'] = $this->encrypt->Encrypt($idEmpresa);


			$data['breadcrumb'] = ["inicio" => 'Empresa' ,
                    				"url" => 'empresa',
                    				"titulo" => 'Editar'];
			return view('administrador/editEmpresa', $data);
		}	
	}

	public function SaveEmpresa(){

		if($this->request->getMethod() == "post" && $this->request->getvar(['empresa','telefonos'],FILTER_SANITIZE_STRING)) {

			$rules = ['empresa' =>  [ 'label' => 'Empresa', 'rules' => 'required']];
				$errors = [];
				$succes = [];
				$dontSucces = [];
				$data = [];

				
				if($this->validate($rules)){
					$getEmpresa = session()->get('empresa');
					$idEmpresa = $this->encrypter->decrypt($getEmpresa);

					$idModi = $this->request->getPost('id');
					$idEmpresa = $this->encrypt->Decrytp($idModi);


					$updateEmpresa = array(
		    			"nombre" =>  $_POST["empresa"],
		    			"telefonos" =>  $_POST["telefonos"]);

					$registrar = $this->modelAdministrador->saveEmpresa($updateEmpresa, $idEmpresa);

					if ($registrar){

						$succes = ["mensaje" => 'Empresa editada con exito' ,
                            	   "succes" => "succes"];
					} else {

						$dontSucces = ["error" => "error",
                    				  "mensaje" => 	'Hubo un error al intentar editar la empresa' ];
					}
					
				} else {

					$errors = $this->validator->getErrors();
				}

			}
			echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);



	}

	
    	

	private function Rol(){

		$this->encrypter = \Config\Services::encrypter();
		$getUser = session()->get('IdUser');
		$idUser = $this->encrypter->decrypt($getUser);

		$rolUser = $this->modelAdministrador->getRol($idUser);
		return $rolUser->rol;
	}

	private function getRealIP(){

        if (isset($_SERVER["HTTP_CLIENT_IP"]))
        {
            return $_SERVER["HTTP_CLIENT_IP"];
        }
        elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
        {
            return $_SERVER["HTTP_X_FORWARDED_FOR"];
        }
        elseif (isset($_SERVER["HTTP_X_FORWARDED"]))
        {
            return $_SERVER["HTTP_X_FORWARDED"];
        }
        elseif (isset($_SERVER["HTTP_FORWARDED_FOR"]))
        {
            return $_SERVER["HTTP_FORWARDED_FOR"];
        }
        elseif (isset($_SERVER["HTTP_FORWARDED"]))
        {
            return $_SERVER["HTTP_FORWARDED"];
        }
        else
        {
            return $_SERVER["REMOTE_ADDR"];
        }

    }

    private function randomPass(){

    	$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890!@.$%&(=*_:";
    	$password = "";
   
   		for($i=0;$i < 11 ;$i++) {
      //obtenemos un caracter aleatorio escogido de la cadena de caracteres
      		$password .= substr($str,rand(0,72),1);
   		}
   
   		return $password;
    }

    public function sendEmailTest(){


    	$uuid = Uuid::uuid4();
        $id = $uuid->toString();

        echo $id;


        // $email = \Config\Services::email();
		
		// $email->setFrom('soporte.tech@arma2.com.mx','Arma2 Administrador');
		// $email->setTo('ferma_3@live.com.mx');
		// $email->setCC('fmartinez@aesoftware.com.mx');
		
		// $email->setSubject('teste');
		// $email->setMessage('hola');
		// $email->send();

    	// 	$email->printDebugger(['headers']);

       
	}

	public function agregarEmpresa(){
		if ($this->request->getMethod() == "get"){

			$data['modulos'] = $this->menu->Permisos();
			
			$data['breadcrumb'] = ["inicio" => 'Empresas' ,
                    				"url" => 'empresa',
                    				"titulo" => 'Agregar'];

			
			return view('administrador/addEmpresa', $data);
		}	
	}

	public function AgrEmpresa(){
		//helper(['form']);
		if ($this->request->getMethod() == "post" && $this->request->getvar(['nombre,telefonos'],FILTER_SANITIZE_STRING)){


				$rules = [
				
				'nombre' =>  ['label' => "Nombre", 'rules' => 'required|max_length[200]|is_unique[sys_empresas.nombre]'],
				'telefonos' =>  ['label' => "Telefonos", 'rules' => 'required|max_length[100]']];
		 
				$errors = [];
				$succes = [];
				$dontSucces = [];
				$data = [];


				if($this->validate($rules)){
					
					$getUser = session()->get('IdUser');
					$LoggedUserId = $this->encrypter->decrypt($getUser);
					
                    
					$uuid = Uuid::uuid4();
        			$id = $uuid->toString();


					$TodayDate = date("Y-m-d H:i:s");
                    
					$empresa = array(

						"id" =>  $id , 
						"nombre" =>  $this->request->getPost('nombre') ,
						"telefonos" =>  $this->request->getPost('telefonos') , 
						"activo" =>  1 , 
						"created_at" => $TodayDate
                        
                    );

					$result = $this->modelAdministrador->NewEmpresa($empresa);

                    if ($result) {

            			
                    	$succes = ["mensaje" => 'Empresa agregada con exito' ,
                            	   "succes" => "succes"];

                           	   
                    	
                    } else {
                    	$dontSucces = ["error" => "error",
                    				  "mensaje" => 	lang('Layout.toastrError')  ];

                    }
				} else {	
					$errors = $this->validator->getErrors();
				}

				echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
		}	
	}

    


}