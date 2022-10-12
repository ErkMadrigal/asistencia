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

			$cara = $this->modelCuip->GetCatalogoCuip('4c563bc7-5423-4562-bc6c-af797f4a5523');
			
        	$data['cara'] = $this->cuipCatalgo($cara);;
        	//////////////

			$cabello_cantidad = $this->modelCuip->GetCatalogoCuip('0814173f-fbfa-4930-9591-a81cb0f56bf0');
			
        	$data['cabello_cantidad'] = $this->cuipCatalgo($cabello_cantidad);;
        	//////////////

			$color_cabello = $this->modelCuip->GetCatalogoCuip('1c737744-f68c-418a-8ecb-19e32eb7cb73');
			
        	$data['color_cabello'] = $this->cuipCatalgo($color_cabello);;
        	//////////////

			$forma_cabello = $this->modelCuip->GetCatalogoCuip('e832ad15-b989-442b-a51a-2fcdadb08558');
			
        	$data['forma_cabello'] = $this->cuipCatalgo($forma_cabello);;
        	//////////////

			$calvicie_cabello = $this->modelCuip->GetCatalogoCuip('2f8c1d8b-a1a3-4575-9d20-b02a223b5bb9');
			
        	$data['calvicie_cabello'] = $this->cuipCatalgo($calvicie_cabello);;
        	//////////////

			$implatacion_cabello = $this->modelCuip->GetCatalogoCuip('ad94d12c-e76e-479b-8ebc-a67512a16a4e');
			
        	$data['implatacion_cabello'] = $this->cuipCatalgo($implatacion_cabello);;
        	//////////////

			$altura = $this->modelCuip->GetCatalogoCuip('3efbe8d5-8bbf-4ef7-9a0a-ce42cf41e129');
			
        	$data['altura'] = $this->cuipCatalgo($altura);;
        	//////////////

			$inclinacion = $this->modelCuip->GetCatalogoCuip('b8717cd9-56a1-4854-aa1f-b8927da93fd1');
			
        	$data['inclinacion'] = $this->cuipCatalgo($inclinacion);;
        	//////////////

			$inclinacion = $this->modelCuip->GetCatalogoCuip('2a93ddac-7cea-431d-addd-242e37cad88d');
			
        	$data['inclinacion'] = $this->cuipCatalgo($inclinacion);;
        	//////////////

			$direccion_cejas = $this->modelCuip->GetCatalogoCuip('f5e97d0d-7a9a-4045-9610-41fc901b9a35');
			
        	$data['direccion_cejas'] = $this->cuipCatalgo($direccion_cejas);;
        	//////////////

			$implantacion_cejas = $this->modelCuip->GetCatalogoCuip('519c1a54-7eec-4012-9203-d8f913550749');
			
        	$data['implantacion_cejas'] = $this->cuipCatalgo($implantacion_cejas);;
        	//////////////

			$forma = $this->modelCuip->GetCatalogoCuip('1d18c563-d7e5-437a-9834-eac8b7020257');
			
        	$data['forma'] = $this->cuipCatalgo($forma);;
        	//////////////

			$tamanno = $this->modelCuip->GetCatalogoCuip('e1ca5802-485d-4b48-a815-6242f4288413');
			
        	$data['tamanno'] = $this->cuipCatalgo($tamanno);;
        	//////////////

			$color = $this->modelCuip->GetCatalogoCuip('e3b271d6-cb6a-4240-ac43-8bb2058a9549');
			
        	$data['color'] = $this->cuipCatalgo($color);;
        	//////////////

			$forma_ojos = $this->modelCuip->GetCatalogoCuip('5c6d00af-501f-47c7-bb62-b9fdf41827b9');
			
        	$data['forma_ojos'] = $this->cuipCatalgo($forma_ojos);;
        	//////////////

			$tamanno_ojos = $this->modelCuip->GetCatalogoCuip('5197111c-90ce-4e87-8b6a-d657d35eb43e');
			
        	$data['tamanno_ojos'] = $this->cuipCatalgo($tamanno_ojos);;
        	//////////////

			$raiz = $this->modelCuip->GetCatalogoCuip('ffa8199c-da9d-418e-87ba-8b05979efbd4');
			
        	$data['raiz'] = $this->cuipCatalgo($raiz);;
        	//////////////

			$dorso = $this->modelCuip->GetCatalogoCuip('5fea1b35-8c0e-4d00-baf9-318257fde934');
			
        	$data['dorso'] = $this->cuipCatalgo($dorso);;
        	//////////////

			$ancho_nariz = $this->modelCuip->GetCatalogoCuip('c9546079-a57a-48be-bd0d-89e0d67df053');
			
        	$data['ancho_nariz'] = $this->cuipCatalgo($ancho_nariz);;
        	//////////////

			$base_nariz = $this->modelCuip->GetCatalogoCuip('82ab2593-f717-4dbe-8951-1bfbc889df9c');
			
        	$data['base_nariz'] = $this->cuipCatalgo($base_nariz);;
        	//////////////

			$altura_nariz = $this->modelCuip->GetCatalogoCuip('e9c4e2f3-2aa8-424a-969b-720010fc46d7');
			
        	$data['altura_nariz'] = $this->cuipCatalgo($altura_nariz);;
        	//////////////

			$tamanno_boca = $this->modelCuip->GetCatalogoCuip('3ec60529-f163-4681-9765-2dc706c9dcba');
			
        	$data['tamanno_boca'] = $this->cuipCatalgo($tamanno_boca);;
        	//////////////

			$comisura_boca = $this->modelCuip->GetCatalogoCuip('a3a3266d-4dc6-4b24-b414-9632d66fccc6');
			
        	$data['comisura_boca'] = $this->cuipCatalgo($comisura_boca);;
        	//////////////

			$espesor_labios = $this->modelCuip->GetCatalogoCuip('d15f3905-c039-4eeb-a861-a8c796fd3225');
			
        	$data['espesor_labios'] = $this->cuipCatalgo($espesor_labios);;
        	//////////////

			$altura_labial = $this->modelCuip->GetCatalogoCuip('de84baae-224c-4529-8c27-9e2692b7a001');
			
        	$data['altura_labial'] = $this->cuipCatalgo($altura_labial);;
        	//////////////

			$prominencia = $this->modelCuip->GetCatalogoCuip('daae3cb8-2dc6-45fa-8e53-bd5edda3f757');
			
        	$data['prominencia'] = $this->cuipCatalgo($prominencia);;
        	//////////////

			$tipo_menton = $this->modelCuip->GetCatalogoCuip('4d6a1ff3-c57d-4f8e-9c0f-168fddf86714');
			
        	$data['tipo_menton'] = $this->cuipCatalgo($tipo_menton);;
        	//////////////

			$forma_menton = $this->modelCuip->GetCatalogoCuip('a04579b4-d2c1-4255-84a5-1f5a7a7cc23c');
			
        	$data['forma_menton'] = $this->cuipCatalgo($forma_menton);;
        	//////////////

			$inclinacion_menton = $this->modelCuip->GetCatalogoCuip('ed417903-c732-441c-b312-9d3737377b8f');
			
        	$data['inclinacion_menton'] = $this->cuipCatalgo($inclinacion_menton);;
        	//////////////

			$forma_ODerecha = $this->modelCuip->GetCatalogoCuip('b8f63182-f8d6-48eb-abe8-40f2c6dd8351');
			
        	$data['forma_ODerecha'] = $this->cuipCatalgo($forma_ODerecha);;
        	//////////////

			$original = $this->modelCuip->GetCatalogoCuip('e7d93ad4-34aa-431b-8278-f3821ee2cf95');
			
        	$data['original'] = $this->cuipCatalgo($original);;
        	//////////////

			$superior = $this->modelCuip->GetCatalogoCuip('c64b42b6-8995-4d3d-a9d9-8153ee5d7ab3');
			
        	$data['superior'] = $this->cuipCatalgo($superior);;
        	//////////////

			$posterior = $this->modelCuip->GetCatalogoCuip('262612a5-21f0-4064-b747-d35f32ba2682');
			
        	$data['posterior'] = $this->cuipCatalgo($posterior);;
        	//////////////

			$adherencia = $this->modelCuip->GetCatalogoCuip('c73efaf8-c8a2-4a8e-a7f0-d6aa2ef259d1');
			
        	$data['adherencia'] = $this->cuipCatalgo($adherencia);;
        	//////////////

			$contorno = $this->modelCuip->GetCatalogoCuip('5ebbe112-fdab-4d21-9bae-a2139dd8e51f');
			
        	$data['contorno'] = $this->cuipCatalgo($contorno);;
        	//////////////

			$adherencia_lobulo = $this->modelCuip->GetCatalogoCuip('906f6a23-a415-4614-adc5-efe3fc8e4a12');
			
        	$data['adherencia_lobulo'] = $this->cuipCatalgo($adherencia_lobulo);;
        	//////////////

			$particularidad = $this->modelCuip->GetCatalogoCuip('51690090-8720-4783-9707-9d318780480b');
			
        	$data['particularidad'] = $this->cuipCatalgo($particularidad);;
        	//////////////

			$dimension = $this->modelCuip->GetCatalogoCuip('08b5ac5a-f316-4943-9d1e-bb4c2f69ed72');
			
        	$data['dimension'] = $this->cuipCatalgo($dimension);;
        	//////////////

			$tipo_sangre = $this->modelCuip->GetCatalogoCuip('9287f29f-cc75-4c2b-b1ba-9aaa5c986fac');
			
        	$data['tipo_sangre'] = $this->cuipCatalgo($tipo_sangre);;
        	//////////////

			$RH_sangre = $this->modelCuip->GetCatalogoCuip('dcaa7074-ba11-4498-a2d2-c5cf6f0e641a');
			
        	$data['RH_sangre'] = $this->cuipCatalgo($RH_sangre);;
        	//////////////

			$RH_sangre = $this->modelCuip->GetCatalogoCuip('dcaa7074-ba11-4498-a2d2-c5cf6f0e641a');
			
        	$data['RH_sangre'] = $this->cuipCatalgo($RH_sangre);;
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