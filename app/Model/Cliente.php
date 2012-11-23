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
		//$results='{"ativo":1,"cep":"13013051","cpf":"84585258523","created_at":"2012-09-28T22:16:59Z","data_nascimento":"1988-08-24","email":"biana@orkut.com","estado_civil_id":1,"hobby_id":6,"id":29,"local_nascimento":"Sumar\u00e9","nome":"Ana Beatriz dos Santos","nome_mae":"Ana Maria Airam dos Santos","nome_pai":"Anastor Pitaco dos Santos","numero":974,"observacoes":"Pessoa muito alegre por estudar MC437!","quantidade_filhos":0,"religiao_id":3,"rg":"478873547","telefone":"1992422924","trabalho_area_id":"1","trabalho_cargo_id":"2","trabalho_renda_id":"6","updated_at":"2012-11-07T03:38:06Z"}';
		$response = json_decode($results, true);
		return $response;
	}
}