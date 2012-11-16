<?php
class ValidacaoCredito extends AppModel{
	
	// valida crédito
	public function validarCredito($cpf){
		$client = new SoapClient("localhost:8480/ModuloValidacaoCreditoWS/services/ValidacaoCreditoService?wsdl");
		$result = $client->getScore($cpf, "0123456789");
		return $result;
	}
	
}
?>