<?php namespace App\Controllers;

use App\Models\MediaFiliacionModel;
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
	private $modelMediaFiliacion;

    public function __construct()
	{
		$this->menu = new Menu();
		$this->encrypt = new Encrypt();
		$this->encrypter = \Config\Services::encrypter();
        $this->db =  \Config\Database::connect('default');
		$this->modelMediaFiliacion = new MediaFiliacionModel($this->db);
		
	}


    public function getMediafiliacion(){
		if ($this->request->getMethod() == "get" ){

			$data['modulos'] = $this->menu->Permisos();
			$empresa = session()->get('empresa');
			$idEmpresa = $this->encrypter->decrypt($empresa);
			

			$getId = str_replace(" ", "+", $_GET['id']);
			$id = $this->encrypt->Decrytp($getId);


			///////////MEDIA FILIACION

			$complexion = $this->modelMediaFiliacion->GetCatalogoCuip('98206a2f-1f1a-46a3-a266-3b0d537ee42f');
			
			$data['complexion'] = $this->cuipCatalgo($complexion);
        	//////////////////
        	
        	$piel = $this->modelMediaFiliacion->GetCatalogoCuip('043f4aa9-dda9-4b3f-9753-9cebf98578b7');
			
        	$data['piel'] = $this->cuipCatalgo($piel);
        	//////////////

			$cara = $this->modelMediaFiliacion->GetCatalogoCuip('4c563bc7-5423-4562-bc6c-af797f4a5523');
			
        	$data['cara'] = $this->cuipCatalgo($cara);
        	//////////////

			$cabello_cantidad = $this->modelMediaFiliacion->GetCatalogoCuip('0814173f-fbfa-4930-9591-a81cb0f56bf0');
			
        	$data['cabello_cantidad'] = $this->cuipCatalgo($cabello_cantidad);
        	//////////////

			$color_cabello = $this->modelMediaFiliacion->GetCatalogoCuip('1c737744-f68c-418a-8ecb-19e32eb7cb73');
			
        	$data['color_cabello'] = $this->cuipCatalgo($color_cabello);
        	//////////////

			$forma_cabello = $this->modelMediaFiliacion->GetCatalogoCuip('e832ad15-b989-442b-a51a-2fcdadb08558');
			
        	$data['forma_cabello'] = $this->cuipCatalgo($forma_cabello);
        	//////////////

			$calvicie_cabello = $this->modelMediaFiliacion->GetCatalogoCuip('2f8c1d8b-a1a3-4575-9d20-b02a223b5bb9');
			
        	$data['calvicie_cabello'] = $this->cuipCatalgo($calvicie_cabello);
        	//////////////

			$implatacion_cabello = $this->modelMediaFiliacion->GetCatalogoCuip('ad94d12c-e76e-479b-8ebc-a67512a16a4e');
			
        	$data['implatacion_cabello'] = $this->cuipCatalgo($implatacion_cabello);
        	//////////////

			$altura = $this->modelMediaFiliacion->GetCatalogoCuip('3efbe8d5-8bbf-4ef7-9a0a-ce42cf41e129');
			
        	$data['altura'] = $this->cuipCatalgo($altura);
        	//////////////

			$inclinacion = $this->modelMediaFiliacion->GetCatalogoCuip('b8717cd9-56a1-4854-aa1f-b8927da93fd1');
			
        	$data['inclinacion'] = $this->cuipCatalgo($inclinacion);
        	//////////////

			$ancho = $this->modelMediaFiliacion->GetCatalogoCuip('2a93ddac-7cea-431d-addd-242e37cad88d');
			
        	$data['ancho'] = $this->cuipCatalgo($ancho);
        	//////////////

			$direccion_cejas = $this->modelMediaFiliacion->GetCatalogoCuip('f5e97d0d-7a9a-4045-9610-41fc901b9a35');
			
        	$data['direccion_cejas'] = $this->cuipCatalgo($direccion_cejas);
        	//////////////

			$implantacion_cejas = $this->modelMediaFiliacion->GetCatalogoCuip('519c1a54-7eec-4012-9203-d8f913550749');
			
        	$data['implantacion_cejas'] = $this->cuipCatalgo($implantacion_cejas);
        	//////////////

			$forma = $this->modelMediaFiliacion->GetCatalogoCuip('1d18c563-d7e5-437a-9834-eac8b7020257');
			
        	$data['forma'] = $this->cuipCatalgo($forma);
        	//////////////

			$tamanno = $this->modelMediaFiliacion->GetCatalogoCuip('e1ca5802-485d-4b48-a815-6242f4288413');
			
        	$data['tamanno'] = $this->cuipCatalgo($tamanno);
        	//////////////

			$color = $this->modelMediaFiliacion->GetCatalogoCuip('e3b271d6-cb6a-4240-ac43-8bb2058a9549');
			
        	$data['color'] = $this->cuipCatalgo($color);
        	//////////////

			$forma_ojos = $this->modelMediaFiliacion->GetCatalogoCuip('5c6d00af-501f-47c7-bb62-b9fdf41827b9');
			
        	$data['forma_ojos'] = $this->cuipCatalgo($forma_ojos);
        	//////////////

			$tamanno_ojos = $this->modelMediaFiliacion->GetCatalogoCuip('5197111c-90ce-4e87-8b6a-d657d35eb43e');
			
        	$data['tamanno_ojos'] = $this->cuipCatalgo($tamanno_ojos);
        	//////////////

			$raiz = $this->modelMediaFiliacion->GetCatalogoCuip('ffa8199c-da9d-418e-87ba-8b05979efbd4');
			
        	$data['raiz'] = $this->cuipCatalgo($raiz);
        	//////////////

			$dorso = $this->modelMediaFiliacion->GetCatalogoCuip('5fea1b35-8c0e-4d00-baf9-318257fde934');
			
        	$data['dorso'] = $this->cuipCatalgo($dorso);
        	//////////////

			$ancho_nariz = $this->modelMediaFiliacion->GetCatalogoCuip('c9546079-a57a-48be-bd0d-89e0d67df053');
			
        	$data['ancho_nariz'] = $this->cuipCatalgo($ancho_nariz);
        	//////////////

			$base_nariz = $this->modelMediaFiliacion->GetCatalogoCuip('82ab2593-f717-4dbe-8951-1bfbc889df9c');
			
        	$data['base_nariz'] = $this->cuipCatalgo($base_nariz);
        	//////////////

			$altura_nariz = $this->modelMediaFiliacion->GetCatalogoCuip('e9c4e2f3-2aa8-424a-969b-720010fc46d7');
			
        	$data['altura_nariz'] = $this->cuipCatalgo($altura_nariz);
        	//////////////

			$tamanno_boca = $this->modelMediaFiliacion->GetCatalogoCuip('3ec60529-f163-4681-9765-2dc706c9dcba');
			
        	$data['tamanno_boca'] = $this->cuipCatalgo($tamanno_boca);
        	//////////////

			$comisura_boca = $this->modelMediaFiliacion->GetCatalogoCuip('a3a3266d-4dc6-4b24-b414-9632d66fccc6');
			
        	$data['comisura_boca'] = $this->cuipCatalgo($comisura_boca);
        	//////////////

			$espesor_labios = $this->modelMediaFiliacion->GetCatalogoCuip('d15f3905-c039-4eeb-a861-a8c796fd3225');
			
        	$data['espesor_labios'] = $this->cuipCatalgo($espesor_labios);
        	//////////////

			$altura_labial = $this->modelMediaFiliacion->GetCatalogoCuip('de84baae-224c-4529-8c27-9e2692b7a001');
			
        	$data['altura_labial'] = $this->cuipCatalgo($altura_labial);
        	//////////////

			$prominencia = $this->modelMediaFiliacion->GetCatalogoCuip('daae3cb8-2dc6-45fa-8e53-bd5edda3f757');
			
        	$data['prominencia'] = $this->cuipCatalgo($prominencia);
        	//////////////

			$tipo_menton = $this->modelMediaFiliacion->GetCatalogoCuip('4d6a1ff3-c57d-4f8e-9c0f-168fddf86714');
			
        	$data['tipo_menton'] = $this->cuipCatalgo($tipo_menton);
        	//////////////

			$forma_menton = $this->modelMediaFiliacion->GetCatalogoCuip('a04579b4-d2c1-4255-84a5-1f5a7a7cc23c');
			
        	$data['forma_menton'] = $this->cuipCatalgo($forma_menton);
        	//////////////

			$inclinacion_menton = $this->modelMediaFiliacion->GetCatalogoCuip('ed417903-c732-441c-b312-9d3737377b8f');
			
        	$data['inclinacion_menton'] = $this->cuipCatalgo($inclinacion_menton);
        	//////////////

			$forma_ODerecha = $this->modelMediaFiliacion->GetCatalogoCuip('b8f63182-f8d6-48eb-abe8-40f2c6dd8351');
			
        	$data['forma_ODerecha'] = $this->cuipCatalgo($forma_ODerecha);
        	//////////////

			$original = $this->modelMediaFiliacion->GetCatalogoCuip('e7d93ad4-34aa-431b-8278-f3821ee2cf95');
			
        	$data['original'] = $this->cuipCatalgo($original);
        	//////////////

			$superior = $this->modelMediaFiliacion->GetCatalogoCuip('c64b42b6-8995-4d3d-a9d9-8153ee5d7ab3');
			
        	$data['superior'] = $this->cuipCatalgo($superior);
        	//////////////

			$posterior = $this->modelMediaFiliacion->GetCatalogoCuip('262612a5-21f0-4064-b747-d35f32ba2682');
			
        	$data['posterior'] = $this->cuipCatalgo($posterior);
        	//////////////

			$adherencia = $this->modelMediaFiliacion->GetCatalogoCuip('c73efaf8-c8a2-4a8e-a7f0-d6aa2ef259d1');
			
        	$data['adherencia'] = $this->cuipCatalgo($adherencia);
        	//////////////

			$contorno = $this->modelMediaFiliacion->GetCatalogoCuip('5ebbe112-fdab-4d21-9bae-a2139dd8e51f');
			
        	$data['contorno'] = $this->cuipCatalgo($contorno);
        	//////////////

			$adherencia_lobulo = $this->modelMediaFiliacion->GetCatalogoCuip('906f6a23-a415-4614-adc5-efe3fc8e4a12');
			
        	$data['adherencia_lobulo'] = $this->cuipCatalgo($adherencia_lobulo);
        	//////////////

			$particularidad = $this->modelMediaFiliacion->GetCatalogoCuip('51690090-8720-4783-9707-9d318780480b');
			
        	$data['particularidad'] = $this->cuipCatalgo($particularidad);
        	//////////////

			$dimension = $this->modelMediaFiliacion->GetCatalogoCuip('08b5ac5a-f316-4943-9d1e-bb4c2f69ed72');
			
        	$data['dimension'] = $this->cuipCatalgo($dimension);
        	//////////////

			$tipo_sangre = $this->modelMediaFiliacion->GetCatalogoCuip('9287f29f-cc75-4c2b-b1ba-9aaa5c986fac');
			
        	$data['tipo_sangre'] = $this->cuipCatalgo($tipo_sangre);
        	//////////////

			$RH_sangre = $this->modelMediaFiliacion->GetCatalogoCuip('dcaa7074-ba11-4498-a2d2-c5cf6f0e641a');
			
        	$data['RH_sangre'] = $this->cuipCatalgo($RH_sangre);
        	//////////////

        	$SiNo = $this->modelMediaFiliacion->GetCatalogoCuip('5c9f16b5-66f8-4abd-9c72-f1ba78c93776');
			
			$data['SiNo'] = $this->GetDatos($SiNo);

			$data['foto'] = '';

			$foto = $this->modelMediaFiliacion->GetFotoById($id);
			if ($foto){
				$path = $this->encrypt->Decrytp($foto->ruta);

				$fileName = $this->encrypt->Decrytp($foto->nombre_almacen);

				$img = $path.'/'.$fileName;

				$data['foto'] = $img;

			}	


        	$data['id'] = $this->encrypt->Encrypt($id);

        	$data['breadcrumb'] = ["inicio" => 'CUIP' ,
                    				"url" => 'cuip',
                    				"titulo" => 'Media Filiación'];
			
			
			return view('MediaFiliacion/mediaFiliacion', $data);
		}	
    }

    public function AgregarMediaFiliacion(){
		if ($this->request->getMethod() == "post" && $this->request->getvar(['complexion, piel, cara, anteojos, anteojos, anteojos, cabello_cantidad, color_cabello, forma_cabello, calvicie_cabello, implatacion_cabello, altura, inclinacion, ancho, direccion_cejas, implantacion_cejas, forma, tamanno, color, forma_ojos, tamanno_ojos, raiz, dorso, ancho_nariz, base_nariz, altura_nariz, tamanno_boca, comisura_boca, espesor_labios, altura_labial, prominencia, tipo_menton, forma_menton, inclinacion_menton, forma_ODerecha, original, superior, posterior, adherencia, contorno, adherencia_lobulo, particularidad, dimension, tipo_sangre, RH_sangre, cicatrices, cicatrices_descripcion, tatuajes, tatuajes_descripcion, lunares, lunares_descripcion, fisico, fisico_descripcion, protesis, protesis_descripcion, discapacidad, discapacidad_descripcion'],FILTER_SANITIZE_STRING)){

				$rules = [
				'complexion' =>  ['label' => "Complexión", 'rules' => 'required'],
				'piel' =>  ['label' => "Piel", 'rules' => 'required'],
				'cara' =>  ['label' => "Cara", 'rules' => 'required'],
				'anteojos' =>  ['label' => "Anteojos Curso", 'rules' => 'required'],
				'cabello_cantidad' =>  ['label' => "Cabello Cantidad ", 'rules' => 'required'],
				'color_cabello' =>  ['label' => "Color Cabello", 'rules' => 'required'],
				'forma_cabello' =>  ['label' => "Forma Cabello", 'rules' => 'required'],
				'calvicie_cabello' =>  ['label' => "Calvicie Cabello", 'rules' => 'required'],
				'implatacion_cabello' =>  ['label' => "implatacion cabello", 'rules' => 'required'],
				'altura' =>  ['label' => "Altura", 'rules' => 'required'],
				'inclinacion' =>  ['label' => "Inclinacion", 'rules' => 'required'],
				'ancho' =>  ['label' => "Ancho", 'rules' => 'required'],
				'direccion_cejas' =>  ['label' => "Direccion Cejas", 'rules' => 'required'],
				'implantacion_cejas' =>  ['label' => "implantacion cejas", 'rules' => 'required'],
				'forma' =>  ['label' => "Forma", 'rules' => 'required'],
				'tamanno' =>  ['label' => "Tamaño", 'rules' => 'required'],
				'color' =>  ['label' => "Color", 'rules' => 'required'],
				'forma_ojos' =>  ['label' => "Forma Ojos", 'rules' => 'required'],
				'tamanno_ojos' =>  ['label' => "Tamaño Ojos", 'rules' => 'required'],
				'raiz' =>  ['label' => "Raiz", 'rules' => 'required'],
				'dorso' =>  ['label' => "Dorso", 'rules' => 'required'],
				'ancho_nariz' =>  ['label' => "Ancho Nariz", 'rules' => 'required'],
				'base_nariz' =>  ['label' => "Base Nariz", 'rules' => 'required'],
				'altura_nariz' =>  ['label' => "Altura Nariz", 'rules' => 'required'],
				'tamanno_boca' =>  ['label' => "Tamaño Boca", 'rules' => 'required'],
				'comisura_boca' =>  ['label' => "Comisura Boca", 'rules' => 'required'],
				'espesor_labios' =>  ['label' => "Espesor Labios", 'rules' => 'required'],
				'altura_labial' =>  ['label' => "Altura Labial", 'rules' => 'required'],
				'prominencia' =>  ['label' => "Prominencia", 'rules' => 'required'],
				'tipo_menton' =>  ['label' => "Tipo Menton", 'rules' => 'required'],
				'forma_menton' =>  ['label' => "Forma Menton", 'rules' => 'required'],
				'inclinacion_menton' =>  ['label' => "Inclinacion Menton", 'rules' => 'required'],
				'forma_ODerecha' =>  ['label' => "Forma Oreja Derecha", 'rules' => 'required'],
				'original' =>  ['label' => "Original", 'rules' => 'required'],
				'superior' =>  ['label' => "Superior", 'rules' => 'required'],
				'posterior' =>  ['label' => "Posterior", 'rules' => 'required'],
				'adherencia' =>  ['label' => "Adherencia", 'rules' => 'required'],
				'contorno' =>  ['label' => "Contorno", 'rules' => 'required'],
				'adherencia_lobulo' =>  ['label' => "Adherencia Lobulo", 'rules' => 'required'],
				'particularidad' =>  ['label' => "Particularidad", 'rules' => 'required'],
				'dimension' =>  ['label' => "Dimension", 'rules' => 'required'],
				'tipo_sangre' =>  ['label' => "Tipo Sangre", 'rules' => 'required'],
				'RH_sangre' =>  ['label' => "RH Sangre", 'rules' => 'required'],
				'anteojos' =>  ['label' => "Anteojos", 'rules' => 'required'],
				'estatura' =>  ['label' => "Estatura", 'rules' => 'required|decimal'],
				'peso' =>  ['label' => "Peso", 'rules' => 'required|decimal'],
				'cicatrices' =>  ['label' => "Cicatrices", 'rules' => 'required'],
				'tatuajes' =>  ['label' => "Tatuajes", 'rules' => 'required'],
				'lunares' =>  ['label' => "Lunares", 'rules' => 'required'],
				'fisico' =>  ['label' => "Fisico", 'rules' => 'required'],
				'protesis' =>  ['label' => "Protesis", 'rules' => 'required'],
				'discapacidad' =>  ['label' => "Discapacidad", 'rules' => 'required']];
		 

				$errors = [];
				$succes = [];
				$dontSucces = [];
				$data = [];
				

				if($this->validate($rules)){

					$getIdPersonal = $this->request->getPost('idPersonal');

        			$idPersonal = $this->encrypt->Decrytp($getIdPersonal);

					$fotos  = $this->modelMediaFiliacion->GetFotos($idPersonal);

					if ($fotos->count >= 3){ 
					
					$getUser = session()->get('IdUser');
					$LoggedUserId = $this->encrypter->decrypt($getUser);
					$empresa = session()->get('empresa');
					$idEmpresa = $this->encrypter->decrypt($empresa);
					$uuid = Uuid::uuid4();
        			$id = $uuid->toString();

        			
        			$getComplexion = $this->request->getPost('complexion');

        			$complexion = $this->encrypt->Decrytp($getComplexion);

        			$getPiel = $this->request->getPost('piel');

        			$piel = $this->encrypt->Decrytp($getPiel);

        			$getCara = $this->request->getPost('cara');

        			$cara = $this->encrypt->Decrytp($getCara);

        			$getCabello_cantidad = $this->request->getPost('cabello_cantidad');

        			$cabello_cantidad = $this->encrypt->Decrytp($getCabello_cantidad);

        			$getColor_cabello = $this->request->getPost('color_cabello');

        			$color_cabello = $this->encrypt->Decrytp($getColor_cabello);

        			$getForma_cabello = $this->request->getPost('forma_cabello');

        			$forma_cabello = $this->encrypt->Decrytp($getForma_cabello);

        			$getCalvicie_cabello = $this->request->getPost('calvicie_cabello');

        			$calvicie_cabello = $this->encrypt->Decrytp($getCalvicie_cabello);

        			$getImplatacion_cabello = $this->request->getPost('implatacion_cabello');

        			$implatacion_cabello = $this->encrypt->Decrytp($getImplatacion_cabello);

        			$getAltura = $this->request->getPost('altura');

        			$altura = $this->encrypt->Decrytp($getAltura);

        			$getInclinacion = $this->request->getPost('inclinacion');

        			$inclinacion = $this->encrypt->Decrytp($getInclinacion);

        			$getAncho = $this->request->getPost('ancho');

        			$ancho = $this->encrypt->Decrytp($getAncho);

        			$getDireccion_cejas = $this->request->getPost('direccion_cejas');

        			$direccion_cejas = $this->encrypt->Decrytp($getDireccion_cejas);

        			$getImplantacion_cejas = $this->request->getPost('implantacion_cejas');

        			$implantacion_cejas = $this->encrypt->Decrytp($getImplantacion_cejas);

        			$getForma = $this->request->getPost('forma');

        			$forma = $this->encrypt->Decrytp($getForma);

        			$getTamanno = $this->request->getPost('tamanno');

        			$tamanno = $this->encrypt->Decrytp($getTamanno);

        			$getColor = $this->request->getPost('color');

        			$color = $this->encrypt->Decrytp($getColor);

        			$getForma_ojos = $this->request->getPost('forma_ojos');

        			$forma_ojos = $this->encrypt->Decrytp($getForma_ojos);

        			$getTamanno_ojos = $this->request->getPost('tamanno_ojos');

        			$tamanno_ojos = $this->encrypt->Decrytp($getTamanno_ojos);

        			$getRaiz = $this->request->getPost('raiz');

        			$raiz = $this->encrypt->Decrytp($getRaiz);

        			$getDorso = $this->request->getPost('dorso');

        			$dorso = $this->encrypt->Decrytp($getDorso);

        			$getAncho_nariz = $this->request->getPost('ancho_nariz');

        			$ancho_nariz = $this->encrypt->Decrytp($getAncho_nariz);

        			$getBase_nariz = $this->request->getPost('base_nariz');

        			$base_nariz = $this->encrypt->Decrytp($getBase_nariz);

        			$getAltura_nariz = $this->request->getPost('altura_nariz');

        			$altura_nariz = $this->encrypt->Decrytp($getAltura_nariz);

        			$getTamanno_boca = $this->request->getPost('tamanno_boca');

        			$tamanno_boca = $this->encrypt->Decrytp($getTamanno_boca);

        			$getComisura_boca = $this->request->getPost('comisura_boca');

        			$comisura_boca = $this->encrypt->Decrytp($getComisura_boca);

        			$getEspesor_labios = $this->request->getPost('espesor_labios');

        			$espesor_labios = $this->encrypt->Decrytp($getEspesor_labios);

        			$getAltura_labial = $this->request->getPost('altura_labial');

        			$altura_labial = $this->encrypt->Decrytp($getAltura_labial);

        			$getProminencia = $this->request->getPost('prominencia');

        			$prominencia = $this->encrypt->Decrytp($getProminencia);

        			$getTipo_menton = $this->request->getPost('tipo_menton');

        			$tipo_menton = $this->encrypt->Decrytp($getTipo_menton);

        			$getForma_menton = $this->request->getPost('forma_menton');

        			$forma_menton = $this->encrypt->Decrytp($getForma_menton);

        			$getInclinacion_menton = $this->request->getPost('inclinacion_menton');

        			$inclinacion_menton = $this->encrypt->Decrytp($getInclinacion_menton);

        			$getForma_ODerecha = $this->request->getPost('forma_ODerecha');

        			$forma_ODerecha = $this->encrypt->Decrytp($getForma_ODerecha);

        			$getOriginal = $this->request->getPost('original');

        			$original = $this->encrypt->Decrytp($getOriginal);

        			$getSuperior = $this->request->getPost('superior');

        			$superior = $this->encrypt->Decrytp($getSuperior);

        			$getPosterior = $this->request->getPost('posterior');

        			$posterior = $this->encrypt->Decrytp($getPosterior);

        			$getAdherencia = $this->request->getPost('adherencia');

        			$adherencia = $this->encrypt->Decrytp($getAdherencia);

        			$getContorno = $this->request->getPost('contorno');

        			$contorno = $this->encrypt->Decrytp($getContorno);

        			$getAdherencia_lobulo = $this->request->getPost('adherencia_lobulo');

        			$adherencia_lobulo = $this->encrypt->Decrytp($getAdherencia_lobulo);

        			$getParticularidad = $this->request->getPost('particularidad');

        			$particularidad = $this->encrypt->Decrytp($getParticularidad);

        			$getDimension = $this->request->getPost('dimension');

        			$dimension = $this->encrypt->Decrytp($getDimension);

        			$getTipo_sangre = $this->request->getPost('tipo_sangre');

        			$tipo_sangre = $this->encrypt->Decrytp($getTipo_sangre);

        			$getRH_sangre = $this->request->getPost('RH_sangre');

        			$RH_sangre = $this->encrypt->Decrytp($getRH_sangre);

        			$getAnteojos = $this->request->getPost('anteojos');

        			$anteojos = $this->encrypt->Decrytp($getAnteojos);

        			$getCicatrices = $this->request->getPost('cicatrices');

        			$cicatrices = $this->encrypt->Decrytp($getCicatrices);

        			$getTatuajes = $this->request->getPost('tatuajes');

        			$tatuajes = $this->encrypt->Decrytp($getTatuajes);

        			$getLunares = $this->request->getPost('lunares');

        			$lunares = $this->encrypt->Decrytp($getLunares);

        			$getFisico = $this->request->getPost('fisico');

        			$fisico = $this->encrypt->Decrytp($getFisico);

        			$getProtesis = $this->request->getPost('protesis');

        			$protesis = $this->encrypt->Decrytp($getProtesis);

        			$getDiscapacidad = $this->request->getPost('discapacidad');

        			$discapacidad = $this->encrypt->Decrytp($getDiscapacidad);

        			


					$mediaFiliacion = array(
		    					
		    					
						"id" => $id  ,
						"idPersonal" => $idPersonal  , 
						"idEmpresa" =>  $idEmpresa , 
						"idComplexion" => $complexion , 
						"idPiel" => $piel , 
						"idCara" => $cara , 
						"idCantidadCabello" => $cabello_cantidad , 
						"idColorCabello" => $color_cabello , 
						"idFormaCabello" => $forma_cabello , 
						"idCalvicie" => $calvicie_cabello , 
						"idImplantacionCabello" => $implatacion_cabello , 
						"idAlturaFrente" => $altura , 
						"idInclinacionFrente" => $inclinacion , 
						"idAnchoFrente" => $ancho , 
						"idDireccionCejas" => $direccion_cejas , 
						"idImplantacionCejas" => $implantacion_cejas , 
						"idFormaCejas" => $forma , 
						"idTamañoCejas" => $tamanno , 
						"idColorOjos" => $color , 
						"idFormaOjos" => $forma_ojos , 
						"idTamañoOjos" => $tamanno_ojos , 
						"idRaiz" => $raiz , 
						"idDorso" => $dorso , 
						"idAnchoNariz" => $ancho_nariz , 
						"idBaseNariz" => $base_nariz , 
						"idAlturaNariz" => $altura_nariz , 
						"idTamañoBoca" => $tamanno_boca , 
						"idComisuras" => $comisura_boca , 
						"idEspesorLabio" => $espesor_labios , 
						"idAlturaNasolabial" => $altura_labial , 
						"idProminenciaLabio" => $prominencia , 
						"idMentonTipo" => $tipo_menton , 
						"idMentonForma" => $forma_menton , 
						"idMentonInclinacion" => $inclinacion_menton , 
						"idFormaOreja" => $forma_ODerecha , 
						"idOriginal" => $original , 
						"idSuperior" => $superior , 
						"idPosterior" => $posterior , 
						"idAdherenciaHelix" => $adherencia , 
						"idContornoLobulo" => $contorno , 
						"idAdherenciaLobulo" => $adherencia_lobulo , 
						"idParticularidad" => $particularidad , 
						"idDimensionLobulo" => $dimension , 
						"idSangreTipo" => $tipo_sangre , 
						"idRH" => $RH_sangre , 
						"idUsaAnteojos" => $anteojos , 
						"estatura" => $this->request->getPost('estatura') , 
						"peso" => $this->request->getPost('peso') , 
						"idCicatrices" => $cicatrices , 
						"descrip_cicatrices" => $this->request->getPost('cicatrices_descripcion') , 
						"idTatuajes" => $tatuajes , 
						"descrip_tatuajes" => $this->request->getPost('tatuajes_descripcion') , 
						"idLunares" => $lunares , 
						"descrip_lunares" => $this->request->getPost('lunares_descripcion') , 
						"idDefectos" => $fisico , 
						"descrip_defectos" => $this->request->getPost('fisico_descripcion') , 
						"idProtesis" => $protesis , 
						"descrip_protesis" => $this->request->getPost('protesis_descripcion') , 
						"idDiscapacidad" => $discapacidad , 
						"descrip_discapacidad" => $this->request->getPost('discapacidad_descripcion') ,
						"activo" => 1 , 
						"createdby" => $LoggedUserId , 
						"createddate" => date("Y-m-d H:i:s") );


					$result = $this->modelMediaFiliacion->insertMediaFiliacion( $mediaFiliacion);

					
					
                    if ($result) {

            			
                    	$succes = ["mensaje" => 'Información guardada con exito' ,
                            	   "succes" => "succes"];

                           	   
                    	
                    } else {
                    	$dontSucces = ["error" => "error",
                    				  "mensaje" => 	'Hubo un error al guardar la Información'  ];

                    }

                } else {

                	$dontSucces = ["error" => "error",
                    				  "mensaje" => 	'Aun no se han cargado Fotos y Huellas'  ];

                }



				} else {	
					$errors = $this->validator->getErrors();
				}

				echo json_encode(['error'=> $errors , 'succes' => $succes , 'dontsucces' => $dontSucces , 'data' => $data]);
		}	
	}

	private function cuipCatalgo($array){

    	$result = [];

    	foreach ( $array as $value){
				
				$id = $this->encrypt->Encrypt($value->id);
				$result[] = (object) array (
					'id' => $id ,
					'valor' => $value->valor

				) ;
			}

		return $result;
			
    }

    private function GetDatos($array){

    	$result = [];

    	foreach ( $array as $value){
				
				$id = $this->encrypt->Encrypt($value->id);
				$result[] = (object) array (
					'id' => $id ,
					'valor' => $value->valor

				) ;
			}

		return $result;
			
    }
    

}