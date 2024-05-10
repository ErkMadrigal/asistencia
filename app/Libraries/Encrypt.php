<?php

namespace App\Libraries;

class Encrypt {


	private $iddecrypt;
	private $encrypter;
	private $idencrypt;


	public function __construct(){

		$this->encrypter = \Config\Services::encrypter();

	}


	public function Encrypt($id){

		$this->idencrypt = $id;
		$idUser = $this->encrypter->encrypt($this->idencrypt);
		$idResult = base64_encode($idUser);

		return $idResult;

	}


	public function Decrytp($id){

		$this->iddecrypt = $id;
        $idUser = base64_decode($this->iddecrypt);
        $idResult = $this->encrypter->decrypt($idUser);

        return $idResult;

	}



}