<?php
namespace App\Validation;
use App\Models\UserModel;

class UserRules
{
	
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
}