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


    public function uploadFile(){
		
		if ($this->request->getMethod() == "post" && $this->request->getvar(['idPersonal,idDocumento,idElemento,num'],FILTER_SANITIZE_STRING)){

			$rules = [
				'InputFile' =>  ['label' => 'Archivo', 'rules' => 'uploaded[InputFile]|max_size[InputFile,10000]|ext_in[InputFile,jpg,jpeg,png,pdf]'],
				'idPersonal' =>  ['label' => '', 'rules' => 'required'],
				'idDocumento' =>  ['label' => '', 'rules' => 'required'],
				'idElemento' =>  ['label' => '', 'rules' => 'required'],
				'num' =>  ['label' => '', 'rules' => 'required']];

			
				
				$errors = [];
				$succes = [];
				$dontSucces = [];
				$data = [];

				if($this->validate($rules)){

					$getUser = session()->get('IdUser');
					$LoggedUserId = $this->encrypter->decrypt($getUser);
					$idDocExp = $this->encrypt->Decrytp($this->request->getPost('idDocumento'));

					$idPersonal = $this->encrypt->Decrytp($this->request->getPost('idPersonal'));
					
					$uuid = Uuid::uuid4();
        			$idDocumento = $uuid->toString();
        			$TodayDate = date("Y-m-d H:i:s");
        			$getEmpresa = session()->get('empresa');
					$idEmpresa = $this->encrypter->decrypt($getEmpresa);
        			$file = $this->request->getFile('InputFile');
        			$getfileName = $file->getName();
        			$getfileExt = $file->getExtension();
        			$fileName = $this->encrypt->Encrypt($getfileName);
        			$extension = $this->encrypt->Encrypt($getfileExt);
        			$getRuta = WRITEPATH . 'uploads/files/'.date("Y").'/'.date("m").'/'.$idEmpresa;
        			$ruta = $this->encrypt->Encrypt($getRuta);


        			 if ($file->isValid() && !$file->hasMoved()){

        			 	$file->move($getRuta,$file->getRandomName());

        			 	$getFileNameAlmacen = $file->getName();
        			 	$fileNameAlmacen = $this->encrypt->Encrypt($getFileNameAlmacen);



        			 }

		         	$NewItem = array(
		         		"idDocumento" => $idDocumento,
		         		"idDocExp" => $idDocExp ,
						"idPersonal" => $idPersonal,
						"idEmpresa" => $idEmpresa,
						"nombre_documento" => $fileName,
						"extension_documento" => $extension,
						"ruta" => $ruta,
						"nombre_almacen" => $fileNameAlmacen,
						"idEstatus" => 1,
		         		"createdby" => $LoggedUserId,
		         		"createddate" => $TodayDate);

					$result = $this->modelCarga->insertExpDoc($NewItem,$idPersonal,$idDocExp);

                    if ($result) {

                    	$elemento = $this->request->getPost('idElemento');
                    	$num = $this->request->getPost('num');
                    	

                    	$archivo = '<div id="'.$elemento.'div'.$num.'" ><p><input type = "hidden" value="'.$this->encrypt->Encrypt($idDocumento).'" id="input'.$num.'" name="input'.$num.'" ></input><a href="#" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#viewModal" onclick=" hrefDoc(\''.$this->encrypt->Encrypt($idDocumento).'\');" ><i class="fa fa-file nav-icon" aria-hidden="true"></i></a><strong> '.$getfileName.'</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#exampleModal" onclick=" hrefDeleteDoc(\''.$this->encrypt->Encrypt($idDocumento).'\' ,\''.$num.'\',\''.$elemento.'\');"><i  class=" fa fa-window-close nav-icon" aria-hidden="true"></i></a></p></div>';

                    	
                    	$data['archivo'] = $archivo;
                    	$data['elemento']= $elemento;

            			
                    	$succes = ["mensaje" => 'Archivo cargado con exito.' ,
                            	   "succes" => "succes"];

                           	   
                    	
                    } else {
                    	$dontSucces = ["error" => "error",
                    				  "mensaje" => 	'Hubo un error al cargar el Archivo.' ];

                    }

				} else {	
					$errors = $this->validator->getErrors();
				}

				echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);


			
		}	
	}


	public function FileIni()
	{
		if ($this->request->getMethod() == "get" && $this->request->getvar(['h'],FILTER_SANITIZE_STRING)){

			$getId = str_replace(" ", "+", $this->request->getGet('h'));
			$idExpDoc = $this->encrypt->Decrytp($getId);


			$file = $this->modelCarga->FileIni($idExpDoc);

			$path = $this->encrypt->Decrytp($file->ruta);
			$fileName = $this->encrypt->Decrytp($file->nombre_almacen);

			$img = $path.'/'.$fileName;

			$ext = $this->encrypt->Decrytp($file->extension_documento);


			switch ($ext) {
				case 'pdf':
					
					$ctype = "application/pdf";
					break;

				case 'jpg':
					
					$ctype = "image/jpg";
					break;

				case 'jpeg':
					
					$ctype = "image/jpeg";
					break;

				case 'png':
					
					$ctype = "image/png";
					break;

					
				
				default:
					
					break;
			}

			$this->response->setHeader('Content-Type', $ctype);
			
			readfile($img);


		}

	}


	public function deleteDocumento(){
		helper(['form']);
		if ($this->request->getMethod() == "post" && $this->request->getvar(['idDelete'],FILTER_SANITIZE_STRING)){
				$rules = [
				'idDelete' =>  'required' ];
				
				$errors = [];
				$succes = [];
				$dontSucces = [];
				$data = [];

				if($this->validate($rules)){
					
					$getUser = session()->get('IdUser');
					$LoggedUserId = $this->encrypter->decrypt($getUser);
					
					$TodayDate = date("Y-m-d H:i:s");
					$getDocumento = $this->request->getPost('idDelete'); 		
					$id = $this->encrypt->Decrytp($getDocumento);		
					$documento = $this->modelCarga->deleteDocumento($id);

                    if ($documento) {
                    	$succes = ["mensaje" => 'Archivo eliminado con exito' ,
                            			   "succes" => "succes"];
                    	
                    } else {
                    	$dontSucces = ["error" => "error" ,
                    				   "mensaje" => 'Hubo un error al eliminar el Archivo'];

                    }
				} else {	
					$errors = $this->validator->getErrors();
				}

				echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
		}	
	}

}