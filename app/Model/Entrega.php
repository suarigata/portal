<?php
class Entrega extends AppModel{
	
	// calcular frete e prazo
	public function calculaCusto($destino, $transportadora, $produtos){
		$client = new SoapClient("http://localhost:8000/grupo9/webservice/ws.php?wsdl");
		$result = $client->calculaFreteEPrazo(13083889, $destino, $transportadora, $produtos);
		return $result;
	}
	
	public function listaTransportadoras($nome = NULL){
		$client = new SoapClient("http://localhost:8000/grupo9/webservice/ws.php?wsdl");
		$result = $client->listarTransportadoras($nome);
		return $result;
	}
	
	public function novaEntrega($destino, $transportadora, $produtos){
		$client = new SoapClient("http://localhost:8000/grupo9/webservice/ws.php?wsdl");
		$result = $client->cadastrarEntrega(10, 13083889, $destino, $transportadora, $produtos);
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