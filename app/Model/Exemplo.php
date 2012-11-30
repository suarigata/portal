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
	
	//produto por código
	public function buscaCodigo($cod){
		$client = new SoapClient("http://localhost:8080/ProdUNICAMPServices/services/Servicos?wsdl");
		$result = $client->GetProdutoByCodigo($cod);
		return $result;
	}
	
	//por categoria
	public function buscaFiltro($nome = NULL, $categoria = NULL, $fabricante = NULL, $pesoMin = NULL, $pesoMax = NULL){
		$client = new SoapClient("http://localhost:8080/ProdUNICAMPServices/services/Servicos?wsdl");
		$result = $client->GetListProdutoByFilter($nome, $categoria, $fabricante, $pesoMin, $pesoMax);
		return $result;
	}
	
	//Categorias
	public function listaCategorias(){
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
	
	// fabricantes
	public function listaFabricantes(){
		$client = new SoapClient("http://localhost:8080/ProdUNICAMPServices/services/Servicos?wsdl");
		$result = $client->GetListFabricante();
		return $result;
	}
}
?>