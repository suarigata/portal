<?php
class Exemplo extends AppModel{
	
	// Exemplo de funcao SOAP com wsdl
	public function teste(){
		$client = new SoapClient("http://localhost:8080/ProdUNICAMPServices/services/Servicos?wsdl");
		$result = $client->getListCategoria();
		$ret = array();
		foreach ($result->return as $a){
			if ($a->supercategoria == ""){
				array_push($ret, $a->nome);
			}
		}
		return $ret;
	}
}
?>