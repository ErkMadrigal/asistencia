<?php namespace App\Controllers;

use App\Models\CargaModel;
use App\Libraries\Menu;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;

class CargaMasiva extends BaseController { 

    private $encrypter;
	private $menu;
	private $encrypt;
	private $db;
	private $modelCarga;
    public function __construct()
	{
		$this->menu = new Menu();
		$this->encrypt = new Encrypt();
		$this->encrypter = \Config\Services::encrypter();
        $this->db =  \Config\Database::connect('default');
		$this->modelCarga= new CargaModel($this->db);
		
	}

    public function GetDatos(){
		if ($this->request->getMethod() == "get"){

			$data['modulos'] = $this->menu->Permisos();
			$empresa = session()->get('empresa');
			$idEmpresa = $this->encrypter->decrypt($empresa);
			$resultData = $this->modelCarga->GetCuip($idEmpresa);
			$result = [];


			foreach ( $resultData as $v){
				
				$id = $this->encrypt->Encrypt($v->id);
				$result[] = (object) array (
					'id' => $id ,
					'matricula' => $v->matricula,
					'folio_manif' => $v->folio_manif,
                    'idClase' => $v->idClase,
					'activo' => $v->activo

				) ;
			}
		
			$dataCrud = [
                'data' => $result]; 

        	$data['cargaMasiva'] = $dataCrud['data'];

			
			//return view('Cuip/RegistroCUIP', $data);
			return view('CargaMasiva/cargaMasiva', $data);
		}	
    }

}