<?php namespace App\Controllers;

use App\Models\ConfirmaCuentaModel;

class ConfirmaCuenta extends BaseController
{


	function __construct()
	{
		$this->db = db_connect();
		$this->modelConfirma = new ConfirmaCuentaModel($this->db);
	}

	public function Confirmar()
	{
		$uri = service('uri');
		$token = $uri->getSegment(2);
		
		if ($token != "")
		{
			
			$data['result'] = false;
			$data['message'] = 'Error al activar la cuenta';
			$valid = $this->modelConfirma->validaCuenta($token);


			if($valid){
				$data['result'] = false;
				$data['message'] = 'La cuenta ya fue activada con anterioridad';
			} else {
				$result = $this->modelConfirma->ConfirmarCuenta($token);

				if ($result > 0){
				$data['result'] = true;
				$data['message'] = 'Cuenta activada correctamente';	
				}

			}

			
			echo view('login/confirmarCuenta', $data); 
		}
		
		
	}

	

}
