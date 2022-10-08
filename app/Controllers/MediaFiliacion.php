<?php namespace App\Controllers;

use App\Models\ArmasModel;
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
	private $modelArmas;

    public function __construct()
	{
		$this->menu = new Menu();
		$this->encrypt = new Encrypt();
		$this->encrypter = \Config\Services::encrypter();
        $this->db =  \Config\Database::connect('default');
		$this->modelArmas = new ArmasModel($this->db);
		
	}


    public function Form(){
		if ($this->request->getMethod() == "get"){

			$data['modulos'] = $this->menu->Permisos();
			$empresa = session()->get('empresa');
			$idEmpresa = $this->encrypter->decrypt($empresa);
			//$resultData = $this->modelArmas->GetArmas($idEmpresa);
			$result = [];


			// foreach ( $resultData as $v){
				
			// 	$id = $this->encrypt->Encrypt($v->id);
			// 	$result[] = (object) array (
			// 		'id' => $id ,
			// 		'matricula' => $v->matricula,
			// 		'folio_manif' => $v->folio_manif,
   //                  'idMarca' => $v->idMarca,
			// 		'activo' => $v->activo

			// 	) ;
			// }
		
			// $dataCrud = [
   //              'data' => $result]; 

   //      	$data['arma'] = $dataCrud['data'];

			
			return view('MediaFiliacion/mediaFiliacion', $data);
		}	
    }

    

}