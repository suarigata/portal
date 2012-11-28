<?php
class Entrega extends AppModel{
	
	// calcular frete e prazo
	public function calculaCusto($remetente, $destino, $transportadora, $produtos){
		$client = new SoapClient("http://localhost:8000/grupo9/webservice/ws.php?wsdl");
		$result = $client->calculaFreteEPrazo($remetente, $destino, $transportadora, $produtos);
		return $result;
	}
	
	public function listaTransportadoras($nome = NULL){
		$client = new SoapClient("http://localhost:8000/grupo9/webservice/ws.php?wsdl");
		$result = $client->listarTransportadoras($nome);
		return $result;
	}
	
	public function novaEntrega($remetente, $destino, $transportadora, $produtos){
		$client = new SoapClient("http://localhost:8000/grupo9/webservice/ws.php?wsdl");
		$result = $client->cadastrarEntrega(10, $remetente, $destino, $transportadora, $produtos);
		return $result;
	}
	
	public function cancelarEntrega($entrega){
		$client = new SoapClient("http://localhost:8000/grupo9/webservice/ws.php?wsdl");
		$result = $client->cancelarEntrega($entrega);
		return $result;
	}
	
	public function consultarEntrega($entrega){
		$client = new SoapClient("http://localhost:8000/grupo9/webservice/ws.php?wsdl");
		$result = $client->consultarEntrega($entrega);
		return $result;
	}
}
?>