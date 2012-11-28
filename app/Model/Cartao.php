<?php
class Cartao extends AppModel{
	
	// calcular frete e prazo
	public function validaTransacao($cardNum, $val){
		$client = new SoapClient("http://www.chainreactor.net/services/nusoap/WebServer.php?wsdl");
		$result = $client->validateTransaction("10", $cardNum, $val);
		return json_decode($result, true);
	}
	
	public function numParcelas($val, $bandeira){
		$client = new SoapClient("http://www.chainreactor.net/services/nusoap/WebServer.php?wsdl");
		$result = $client->getInstallments("10", $val, $bandeira);
		return json_decode($result, true);
	}
	
	public function realizaTransacao($val, $bandeira, $number, $nome, $cpf, $cod, $data, $parcelas){
		$client = new SoapClient("http://www.chainreactor.net/services/nusoap/WebServer.php?wsdl");
		$result = $client->doTransaction("10", $val, $bandeira, $number, $nome, $cpf, $cod, $data, $parcelas);
		return json_decode($result, true);
	}
	
	public function cancelaTransacao($id){
		$client = new SoapClient("http://www.chainreactor.net/services/nusoap/WebServer.php?wsdl");
		$result = $client->cancelTransactionById("10", $id);
		return json_decode($result, true);
	}
	
	public function consultaTransacao($id){
		$client = new SoapClient("http://www.chainreactor.net/services/nusoap/WebServer.php?wsdl");
		$result = $client->getTransactionById("10", $id);
		return json_decode($result, true);
	}
	
	public function consultarTodasTransacoes($cpf, $status, $brand, $dateFrom, $dateTo){
		$client = new SoapClient("http://www.chainreactor.net/services/nusoap/WebServer.php?wsdl");
		$result = $client->getAllTransactions("10", $cpf, $status, $brand, $dateFrom, $dateTo);
		return json_decode($result, true);
	}
	
	public function consultarBandeiras(){
		$client = new SoapClient("http://www.chainreactor.net/services/nusoap/WebServer.php?wsdl");
		$result = $client->getPaymentBrands("10");
		return json_decode($result, true);
	}
	
	public function consultarStatus(){
		$client = new SoapClient("http://www.chainreactor.net/services/nusoap/WebServer.php?wsdl");
		$result = $client->getStatusList(10);
		return json_decode($result, true);
	}
}
?>