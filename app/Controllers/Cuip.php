<?php namespace App\Controllers;

use App\Models\CuipModel;
use App\Libraries\Menu;
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;

class Cuip extends BaseController { 

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

   /*public function GetDatos(){
		if ($this->request->getMethod() == "get"){

			$data['modulos'] = $this->menu->Permisos();
			$empresa = session()->get('empresa');
			$idEmpresa = $this->encrypter->decrypt($empresa);
			$resultData = $this->modelCuip->GetCuip($idEmpresa);
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

        	$data['RegistroCUIP'] = $dataCrud['data'];

			
			return view('Cuip/RegistroCUIP', $data);
			return view('Cuip/CuipPersonal', $data);
		}	
    }*/

	private function GetDatos($array){

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

	public function Form(){
		if ($this->request->getMethod() == "get"){
			$data['modulos'] = $this->menu->Permisos();
			$empresa = session()->get('empresa');
			$idEmpresa = $this->encrypter->decrypt($empresa);
			
			
			$modo_nacionalidad = $this->modelCuip->GetCatalogoCuip('6070382b-2a53-438b-998c-2b7e5b27fba7');
			
			$data['modo_nacionalidad'] = $this->GetDatos($modo_nacionalidad);
			////////////////////////////////////////////////

			$pais_nacimiento = $this->modelCuip->GetCatalogoCuip('2d688512-aae8-4626-a47d-506a8138e5ba');
			
			$data['pais_nacimiento'] = $this->GetDatos($pais_nacimiento);
			////////////////////////////////////////////////

			$entidad_nacimiento = $this->modelCuip->GetCatalogoCuip('628e1506-683c-4762-9775-f7625f6069e9');
			
			$data['entidad_nacimiento'] = $this->GetDatos($entidad_nacimiento);
			////////////////////////////////////////////////

			$nacionalidad = $this->modelCuip->GetCatalogoCuip('58b94c0f-7163-44de-af92-fb976f02cc78');
			
			$data['nacionalidad'] = $this->GetDatos($nacionalidad);
			////////////////////////////////////////////////

			$municipio_nacimiento = $this->modelCuip->GetCatalogoCuip('35da98bc-37d2-4a3d-ad1c-b4b5aab54419');
			
			$data['municipio_nacimiento'] = $this->GetDatos($municipio_nacimiento);
			////////////////////////////////////////////////

			$estado_civil = $this->modelCuip->GetCatalogoCuip('7d81e91b-99cb-4371-89d9-934b51d62fb1');
			
			$data['estado_civil'] = $this->GetDatos($estado_civil);
			////////////////////////////////////////////////

			$cuidad_nacimiento = $this->modelCuip->GetCatalogoCuip('037be4c1-e772-4896-97ad-bfd346848971');
			
			$data['cuidad_nacimiento'] = $this->GetDatos($cuidad_nacimiento);
			////////////////////////////////////////////////


			$desarrollo_academico = $this->modelCuip->GetCatalogoCuip('noesta');
			
			$data['desarrollo_academico'] = $this->GetDatos($desarrollo_academico);
			////////////////////////////////////////////////


			$entidad_federativa = $this->modelCuip->GetCatalogoCuip('628e1506-683c-4762-9775-f7625f6069e9');
			
			$data['entidad_federativa'] = $this->GetDatos($entidad_federativa);
			////////////////////////////////////////////////


			$municipio = $this->modelCuip->GetCatalogoCuip('35da98bc-37d2-4a3d-ad1c-b4b5aab54419');
			
			$data['municipio'] = $this->GetDatos($municipio);
			////////////////////////////////////////////////

			$ciudad = $this->modelCuip->GetCatalogoCuip('037be4c1-e772-4896-97ad-bfd346848971');
			
			$data['ciudad'] = $this->GetDatos($ciudad);
			////////////////////////////////////////////////

			$parentesco_familiar = $this->modelCuip->GetCatalogoCuip('e608d93e-8d57-4378-a867-1a98dfb538be');
			
			$data['parentesco_familiar'] = $this->GetDatos($parentesco_familiar);
			////////////////////////////////////////////////

			$pais = $this->modelCuip->GetCatalogoCuip('2d688512-aae8-4626-a47d-506a8138e5ba');
			
			$data['pais'] = $this->GetDatos($pais);
			////////////////////////////////////////////////

			$domicilio_tipo = $this->modelCuip->GetCatalogoCuip('1a4ad757-1946-4435-9866-8e9ed7bbc91c');
			
			$data['domicilio_tipo'] = $this->GetDatos($domicilio_tipo);
			////////////////////////////////////////////////

			$eficiencia = $this->modelCuip->GetCatalogoCuip('ac8903ca-544d-4a9e-bdfc-3b8069891437');
			
			$data['eficiencia'] = $this->GetDatos($eficiencia);
			////////////////////////////////////////////////

			$nivel_curso = $this->modelCuip->GetCatalogoCuip('ba336522-0795-43ba-b5ca-2c765ca96a56');
			
			$data['nivel_curso'] = $this->GetDatos($nivel_curso);
			////////////////////////////////////////////////

			$cuso_tomado = $this->modelCuip->GetCatalogoCuip('db5d4dad-9dc7-4a44-8834-7c6ca196bb62');
			
			$data['cuso_tomado'] = $this->GetDatos($cuso_tomado);
			////////////////////////////////////////////////

			$idioma = $this->modelCuip->GetCatalogoCuip('47c8cf77-2039-4661-a79c-dca04f685cab');
			
			$data['idioma'] = $this->GetDatos($idioma);
			////////////////////////////////////////////////

			$tipo_habilidad = $this->modelCuip->GetCatalogoCuip('fe67ef02-0b02-4894-b54f-8cc7a0914153');
			
			$data['tipo_habilidad'] = $this->GetDatos($tipo_habilidad);
			////////////////////////////////////////////////

			$grado_habilidad = $this->modelCuip->GetCatalogoCuip('b0ad414d-bbfb-404d-8683-feff143a1854');
			
			$data['grado_habilidad'] = $this->GetDatos($grado_habilidad);
			////////////////////////////////////////////////

			$tipo_fuero = $this->modelCuip->GetCatalogoCuip('2ba17e6c-3478-48d8-93cf-6bb7320e65bf');
			
			$data['tipo_fuero'] = $this->GetDatos($tipo_fuero);
			////////////////////////////////////////////////

			return view('Cuip/RegistroCUIP', $data);	
			}
	}

}