<?php

namespace App\Libraries;
use App\Models\UserModel;

class Menu {

	public function Permisos(){

		$model = new UserModel();
		$encrypter = \Config\Services::encrypter();
		$idUser = $encrypter->decrypt(session()->get('IdUser'));
		$rolUser = session()->get('rol');

		//if ($rolUser === "1"){
			$data = $model->getModulos($idUser);
		//} elseif ($rolUser === "2"){
		//	$data = $model->getModulosUser($idUser);
	//	}	

		
		return $data;

	}


}