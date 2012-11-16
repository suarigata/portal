<?php
App::uses('HttpSocket', 'Network/Http');
class Estoque extends AppModel{
	
	public static function quantity($code, $quantity) {
		$response = null;
		$HttpSocket = new HttpSocket();
		$uri = 'http://g10:g10@mc437-g8-estoque-v2.webbyapp.com/products/quantity.json';
		$results = $HttpSocket->put($uri, array('code'=> $code, 'quantity' => $quantity));
		$response = json_decode($results, true);
		return $response;
	}
	
	public static function currentQuantity($code) {
		$response = null;
		$HttpSocket = new HttpSocket();
		$uri = 'http://g10:g10@mc437-g8-estoque-v2.webbyapp.com/products/currentQuantity/'.$code.'.json';
		$results = $HttpSocket->get($uri);
		$response = json_decode($results, true);
		return $response;
	}
	
	public static function currentPrice($code) {
		$response = null;
		$HttpSocket = new HttpSocket();
		$uri = 'http://g10:g10@mc437-g8-estoque-v2.webbyapp.com/products/currentPrice/'.$code.'.json';
		$results = $HttpSocket->get($uri);
		$response = json_decode($results, true);
		return $response;
	}
	
	public static function currentInfo($code) {
		$response = null;
		$HttpSocket = new HttpSocket();
		$uri = 'http://g10:g10@mc437-g8-estoque-v2.webbyapp.com/products/currentInfo/'.$code.'.json';
		$results = $HttpSocket->get($uri);
		$response = json_decode($results, true);
		return $response;
	}
}