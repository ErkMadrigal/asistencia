<?php namespace App\Controllers;

use App\Libraries\Menu;
use App\Models\AdministradorModel;

class Dashboard extends BaseController
{

	private $db;
	private $modelAdministrador;

	public function __construct()
	{
		
		
        $this->db =  \Config\Database::connect('default');
		$this->modelAdministrador = new AdministradorModel($this->db);
		
	}
	
	public function index()
	{
		if ($this->request->getMethod() == "get" ){
			$obj = new Menu();
			$data['modulos'] = $obj->Permisos();

			$rolUser = $this->Rol();

			if ($rolUser == 1){
				$this->encrypter = \Config\Services::encrypter();
				$getUser = session()->get('IdUser');
				$idUserAdmin = $this->encrypter->decrypt($getUser);


				
				
			} else {
				$data['form'] = "";
			}


			return view('dashboard/Index',$data);
		}
		
	}

	private function Rol(){

		$this->encrypter = \Config\Services::encrypter();
		$getUser = session()->get('IdUser');
		$idUser = $this->encrypter->decrypt($getUser);

		$rolUser = $this->modelAdministrador->getRol($idUser);
		return $rolUser->rol;
	}

	
	

}
