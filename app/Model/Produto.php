<?php
require_once "soap/nusoap.php";
class Produto extends AppModel{
	
	//produto por código 
	public function buscaCodigo($cod){
		$client = new nusoap_client("http://localhost:8080/ProdUNICAMPServices/services/Servicos?wsdl", true);
		$result = $client->call("getProdutoByCodigo", array("codigo" => $cod));
		//$client = new SoapClient("http://localhost:8080/ProdUNICAMPServices/services/Servicos?wsdl");
		//$result = $client->getProdutoByCodigo($cod);
		return $result;
	}
	
	//por categoria
	public function buscaFiltro($nome, $categoria, $fabricante, $pesoMin, $pesoMax){
		$client = new nusoap_client("http://localhost:8080/ProdUNICAMPServices/services/Servicos?wsdl", true);
		//$client = new SoapClient("http://localhost:8080/ProdUNICAMPServices/services/Servicos?wsdl");
		$result = $client->call("getListProdutoByFilter", array("nome" => $nome, "categoria" => $categoria, "fabricante" => $fabricante, "pesoMin" => $pesoMin, "pesoMax" =>$pesoMax));
		//$result = $client->getListProdutoByFilter($nome, $categoria, $fabricante, $pesoMin, $pesoMax);
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