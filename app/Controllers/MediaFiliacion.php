<?php namespace App\Controllers;

use App\Models\CuipModel;
use App\Libraries\Crud_email;
use App\Libraries\Menu;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;

class MediaFiliacion extends BaseController {

    private $encrypter;
	private $menu;
	private $encrypt;
	private $db;
	private $modelCuip;

    public function __construct()
	{
		$this->menu = new Menu();
		$this->encrypt = new Encrypt();
		$this->encrypter = \Config\Services::encrypter();
        $this->db =  \Config\Database::connect('default');
		$this->modelCuip = new CuipModel($this->db);
		
	}


    public function Form(){
		if ($this->request->getMethod() == "get"){

			$data['modulos'] = $this->menu->Permisos();
			$empresa = session()->get('empresa');
			$idEmpresa = $this->encrypter->decrypt($empresa);
			
			
			$complexion = $this->modelCuip->GetCatalogoCuip('98206a2f-1f1a-46a3-a266-3b0d537ee42f');
			
			$data['complexion'] = $this->cuipCatalgo($complexion);
        	//////////////////
        	
        	$piel = $this->modelCuip->GetCatalogoCuip('043f4aa9-dda9-4b3f-9753-9cebf98578b7');
			
        	$data['piel'] = $this->cuipCatalgo($piel);;
        	//////////////
			
			return view('MediaFiliacion/mediaFiliacion', $data);
		}	
    }

    private function cuipCatalgo($array){

    	$result = [];

    	foreach ( $array as $value){
				
				$id = $this->encrypt->Encrypt($value->idCatalogo);
				$result[] = (object) array (
					'id' => $id ,
					'valor' => $value->valor

				) ;
			}

		return $result;
			
    }

    

}