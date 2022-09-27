<?php namespace App\Controllers;

use App\Models\CataMultiModel;
use App\Libraries\Crud_email;
use App\Libraries\Menu;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;

class PortaCatalogoMulti extends BaseController {
    private $encrypter;
	private $menu;
	private $encrypt;
	private $db;
	private $modelMulticatalogo;

    public function __construct(){
		$this->menu = new Menu();
		$this->encrypt = new Encrypt();
		$this->encrypter = \Config\Services::encrypter();
        $this->db =  \Config\Database::connect('default');
		$this->modelMulticatalogo = new CataMultiModel($this->db);
    }

    public function GetMulti(){
		if ($this->request->getMethod() == "get"){

			$data['modulos'] = $this->menu->Permisos();
			$empresa = session()->get('empresa');
			$idEmpresa = $this->encrypter->decrypt($empresa);
			$resultData = $this->modelMulticatalogo->GetMulti($idEmpresa);
			$result = [];
			foreach ( $resultData as $v){
				
				$id = $this->encrypt->Encrypt($v->id);
				$result[] = (object) array (
					'id' => $id ,
					'tipo_combo' => $v->tipo_combo,
					'valor' => $v->valor,
					'activo' => $v->activo

				) ;
			}
		
			$dataCrud = [
                'data' => $result]; 

        	$data['catalogo'] = $dataCrud['data'];

			
			return view('Multicatalogo/multicatalogo', $data);
		}	
    }


    public function EditarMulticatalogo(){
		if ($this->request->getMethod() == "get" && $this->request->getvar(['id'],FILTER_SANITIZE_STRING)){

			$data['modulos'] = $this->menu->Permisos();
			
			$getId = str_replace(" ", "+", $_GET['id']);
			$id = $this->encrypt->Decrytp($getId);
			$idAdmin = session()->get('IdUser');

			
			$data['catalogo'] = $this->modelMulticatalogo->GetMultiById($id);

			$data['breadcrumb'] = ["inicio" => 'Multicatalogo' ,
                    				"url" => 'multicatalogo',
                    				"titulo" => 'Editar'];
			return view('Multicatalogo/editMulti', $data);
		}	
	}
    public function SaveMulti(){

		if($this->request->getMethod() == "post" && $this->request->getvar(['tipo_combo','valor'],FILTER_SANITIZE_STRING)) {

			$rules = ['valor' =>  [ 'label' => 'valor', 'rules' => 'required']];
				$errors = [];
				$succes = [];
				$dontSucces = [];
				$data = [];
				
				if($this->validate($rules)){
					$getEmpresa = session()->get('empresa');
					$idEmpresa = $this->encrypter->decrypt($getEmpresa);

					$updateEmpresa = array(
                        "activo" =>  $_POST['activo'],
		    			"tipo_combo" =>  $_POST["tipo_combo"],
		    			"valor" =>  $_POST["valor"]);

					$registrar = $this->modelMulticatalogo->saveMulti($updateEmpresa, $idEmpresa);

					if ($registrar){

						$succes = ["mensaje" => 'Multicatalogo editado con exito' ,
                            	   "succes" => "succes"];
					} else {

						$dontSucces = ["error" => "error",
                    				  "mensaje" => 	lang('Layout.toastrError') ];
					}
					
				} else {

					$errors = $this->validator->getErrors();
				}

			}
			echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
	}

    public function DetalleMulticatalogo(){
		if ($this->request->getMethod() == "get" && $this->request->getvar(['id'],FILTER_SANITIZE_STRING)){

			$data['modulos'] = $this->menu->Permisos();

			$getId = str_replace(" ", "+", $_GET['id']);
			$id = $this->encrypt->Decrytp($getId);
			$idAdmin = session()->get('IdUser');
        	//$idUserAdmin = $this->encrypter->decrypt($idAdmin);

        	$data['catalogo'] = $this->modelMulticatalogo->GetMultiById($id);
        	//$data['modulosUsuario'] = $this->modelAdministrador->GetModulosUserById($id , $idUserAdmin);
        	
			
			$data['breadcrumb'] = ["inicio" => 'Multicatalogo' ,
                    				"url" => 'multicatalogo',
                    				"titulo" => 'Detalle'];
		
			return view('Multicatalogo/detailMulti', $data);
		}	
	}



}