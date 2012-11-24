<?php
App::uses('HttpSocket', 'Network/Http');
class Cliente extends AppModel{

	public static function clientExist($cpf) {
		$response = null;
		$HttpSocket = new HttpSocket();
		$uri = 'http://mc437.herokuapp.com/existe/'.$cpf.'.json';
		$results = $HttpSocket->get($uri);
		$response = json_decode($results, true);
		return $response;
	}
	
	public static function clientAddress($cpf) {
		$response = null;
		$HttpSocket = new HttpSocket();
		$uri = 'http://mc437.herokuapp.com/cep/'.$cpf.'.json';
		$results = $HttpSocket->get($uri);
		$response = json_decode($results, true);
		return $response;
	}
	
	public static function clientData($cpf) {
		$response = null;
		$HttpSocket = new HttpSocket();
		$uri = 'http://mc437.herokuapp.com/tudo/'.$cpf.'.json';
		$results = $HttpSocket->get($uri);
		$response = json_decode($results, true);
		return $response;
	}
}