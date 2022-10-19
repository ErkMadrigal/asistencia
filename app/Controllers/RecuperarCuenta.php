<?php namespace App\Controllers;

use App\Models\RecuperaCuentaModel;
use App\Libraries\Crud_email;

class RecuperarCuenta extends BaseController
{


	function __construct()
	{
		$this->db = db_connect();
		$this->modelRecupera = new RecuperaCuentaModel($this->db);
		$this->crudEmail = new Crud_email();
	}

	public function Recuperar()
	{
		$uri = service('uri');
		$token = $uri->getSegment(2);
		$data['token'] = $token;
        			
		return view('login/asignaContrasena',$data); 
		
	}

	public function asignar_contrasena(){

		if($this->request->getMethod() == "post" && $this->request->getvar(['pass','confirmPass'],FILTER_SANITIZE_STRING)) {

			$rules = [
				'token' =>  [ 'label' => 'token', 'rules' => 'required'],
				'confirmPass' =>  [ 'label' => 'Confirmar nueva contraseña', 'rules' => 'required|matches[pass]'],
				'pass' =>  [ 'label' => 'Nueva contraseña', 'rules' => 'required|min_length[8]|password_regex_special|password_regex_lowercase|password_regex_uppercase|password_regex_number']];
				$errors = [];
				$succes = [];
				$dontSucces = [];
				$data = [];
				
				
				if($this->validate($rules)){

					$token = $_POST['token'];
					$update = $this->modelRecupera->cambioPassword($_POST,$token);

						if ($update){

							 $registrar = $this->modelRecupera->GetUsuarioByToken($token);


							 $Subject = "Cambio de contraseña" ;
							 	foreach ($registrar as $value){

                                	
                                 	$trimEmail = trim($value->email);
                                 	$nombre = $value->nombre;
                                 	

							 		$body = "<table width='100%' border='0' cellspacing='0' cellpadding='0'>
    			 								<tr>
         										<td style='background-color: #fff; padding-top:25px; padding-left:10px; padding-right:10px; font-family: Arial;color: #6e2b80; font-size:14px;'>
             									<center>
                 								<p style='font-weight:bold;color:#171514;'>Apreciable: $nombre</p>
                 									<p style='font-weight:bold;color:#171514;'>Has realizado el cambio de contraseña con éxito.</p>
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

                            	

						$succes = ["mensaje" => "Se realizó el cambio de contraseña de forma éxitosa." ,
                            	   "succes" => "succes"];
					} else {

						$dontSucces = ["error" => "error",
                    				  "mensaje" => 	"Hubo un error al realizar el cambio de contraseña" ];
					}
					
				} else {

					$errors = $this->validator->getErrors();
				}

			}
			echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);

	}
	

}
