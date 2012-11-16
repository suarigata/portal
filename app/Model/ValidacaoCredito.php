<?php
class ValidacaoCredito extends AppModel{
	
	// valida crédito //nao funciona//funciona com nusoap
	public function validarCredito($cpf){
		$client = new SoapClient("http://localhost:8480/ModuloValidacaoCreditoWS/services/ValidacaoCreditoService?wsdl");
		$result = $client->getScore($cpf, "0123456789");
		return $result;
	}
	
}
?>