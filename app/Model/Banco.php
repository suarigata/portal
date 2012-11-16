<?php
class Banco extends AppModel{
	
	//emmite boleto
	public function emitirBoleto($cliente, $val){
		$client = new SoapClient("http://mc437-2012s2-banco-ws.pagodabox.com/ws/BancoApi?wsdl");

		$result = $client->emitir_boleto('55.265.546/0001-66', 'a9ec4c4ad33040371cd6f50cdd2b6f47', $cliente, $val);
		return $result;
	}
	
	//cancela boleto
	public function cancelarBoleto($id){
		$client = new SoapClient("http://mc437-2012s2-banco-ws.pagodabox.com/ws/BancoApi?wsdl");
		
		$result = $client->cancelar_boleto('55.265.546/0001-66', 'a9ec4c4ad33040371cd6f50cdd2b6f47', $id);
		return $result;
	}
	
	//recupera boleto
	public function recuperarBoleto($id){
		$client = new SoapClient("http://mc437-2012s2-banco-ws.pagodabox.com/ws/BancoApi?wsdl");
		$result = $client->obter_boleto("55.265.546/0001-66", "a9ec4c4ad33040371cd6f50cdd2b6f47", $id);
		return $result;
	}
}
?>