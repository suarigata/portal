<?php
class Endereco extends AppModel{
	
	//busca por CEP
	public function buscaCep($cep){
		$client = new SoapClient("http://g2mc437.heliohost.org/parte2/service/webserver.php?wsdl");
		$result = $client->g02_busca_por_cep($cep);
		return $result;
	}
	
	//busca por Endereço
	public function buscaEndereco($uf, $cidade, $bairro, $tipo, $logradouro, $numero){
		$client = new SoapClient("http://g2mc437.heliohost.org/parte2/service/webserver.php?wsdl");
		$result = $client->g02_busca_por_endereco($uf, $cidade, $bairro, $tipo, $logradouro, $numero);
		return $result;
	}
}
?>