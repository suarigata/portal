<?php
class Produto extends AppModel{
	
	//produto por código 
	public function buscaCodigo($cod){
		$client = new SoapClient("localhost:8080/ProdUNICAMPServices/services/Servicos?wsdl");
		$result = $client->GetProdutoByCodigo($cod);
		return $result;
	}
	
	//por categoria
	public function buscaFiltro($nome = NULL, $categoria = NULL, $fabricante = NULL, $pesoMin = NULL, $pesoMax = NULL){
		$client = new SoapClient("localhost:8080/ProdUNICAMPServices/services/Servicos?wsdl");
		$result = $client->GetListProdutoByFilter($nome, $categoria, $fabricante, $pesoMin, $pesoMax);
		return $result;
	}
	
	//Categorias
	public function listaCategorias($nome, $superCategoria = NULL){
		$client = new SoapClient("localhost:8080/ProdUNICAMPServices/services/Servicos?wsdl");
		$result = $client->GetListCategoria($nome, $superCategoria);
		return $result;
	}
	
	// fabricantes
	public function listaFabricantes($nome){
		$client = new SoapClient("localhost:8080/ProdUNICAMPServices/services/Servicos?wsdl");
		$result = $client->GetListFabricante($nome);
		return $result;
	}
}
?>