<?php
namespace App\Validation;
use App\Models\UserModel;
use App\Libraries\Encrypt;

class UserRules{

	private $encrypt;
	private $db;
	private $model;
	

	public function __construct()
	{
		
		$this->encrypt = new Encrypt();
		
		
	}
	
	function validateUser(string $str , string $fields , array $data){
		$model = new UserModel();
		$userAdmin = $model->where('email', $data['email'])->where('confirmacion', 1)
						->first();
								
		$this->db = db_connect();
		$this->model = new UserModel($this->db);				
					
		if(!$userAdmin)
			return false;

		if ($userAdmin)
			$pass = $userAdmin['password'];
		
		
		return password_verify(trim($data['password']),$pass);						

	}

	function validateEmpresa(string $str , string $fields , array $data){
		$model = new UserModel();
		$valEmpresa = $data['empresa'];
		$idEmpresa = $this->encrypt->Decrytp($valEmpresa);
		$empresa = $model->validEmpresa( $idEmpresa , $data['email']);
								
		$this->db = db_connect();
		$this->model = new UserModel($this->db);				
					
		if($empresa)
			return true;

		else
			return false;						

	}
}