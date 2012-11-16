<?php
class Produto extends AppModel{
	
	//produto por código 
	public function buscaCodigo($cod){
		$client = new SoapClient("http://localhost:8080/ProdUNICAMPServices/services/Servicos?wsdl");
		$result = $client->getProdutoByCodigo($cod);
		return $result;
	}
	
	//por categoria
	public function buscaFiltro($nome, $categoria, $fabricante, $pesoMin, $pesoMax){
		$client = new SoapClient("http://localhost:8080/ProdUNICAMPServices/services/Servicos?wsdl");
		$result = $client->getListProdutoByFilter($nome, $categoria, $fabricante, $pesoMin, $pesoMax);
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
		$result = $client->getListFabricante();
		return $result;
	}
}
?>