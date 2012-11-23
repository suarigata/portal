<?php
App::uses('HttpSocket', 'Network/Http');
class Autenticacao extends AppModel{
	
	public static function fazLogin($login, $senha) {
		$response = null;
		$HttpSocket = new HttpSocket();
		$uri = 'http://localhost:8888/authentications/loga.json?login=' . $login . '&senha=' . $senha;
		$results = $HttpSocket->get($uri);
		$response = json_decode($results, true);
		return $response["response"];
	}
	
	public static function desLogin($login) {
		$response = null;
		$HttpSocket = new HttpSocket();
		$uri = 'http://localhost:8888/authentications/desloga.json?login=' . $login;
		$results = $HttpSocket->get($uri);
		$response = json_decode($results, true);
		return $response["response"];
	}	
}