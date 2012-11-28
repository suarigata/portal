<?php
require_once "soap/nusoap.php";
class Produto extends AppModel{
	
	//produto por código 
	public function buscaCodigo($cod){
		$client = new nusoap_client("http://localhost:8080/ProdUNICAMPServices/services/Servicos?wsdl", true);
		$result = $client->call("getProdutoByCodigo", array("codigo" => $cod));
		//$client = new SoapClient("http://localhost:8080/ProdUNICAMPServices/services/Servicos?wsdl");
		//$result = $client->getProdutoByCodigo($cod);
		$first = $result['return'];
		if (!array_key_exists('0', $first)){
			$aux['0'] = $first;
			$result['return'] = $aux;
		}
		return $result;
	}
	
	//por categoria
	public function buscaFiltro($nome = NULL, $categoria = NULL, $fabricante = NULL, $pesoMin = NULL, $pesoMax = NULL){
		$client = new nusoap_client("http://localhost:8080/ProdUNICAMPServices/services/Servicos?wsdl", true);
		//$client = new SoapClient("http://localhost:8080/ProdUNICAMPServices/services/Servicos?wsdl");
		$result = $client->call("getListProdutoByFilter", array("nome" => $nome, "categoria" => $categoria, "fabricante" => $fabricante, "pesoMin" => $pesoMin, "pesoMax" =>$pesoMax));
		//$result = $client->getListProdutoByFilter($nome, $categoria, $fabricante, $pesoMin, $pesoMax);
		$first = $result['return'];
		if (!array_key_exists('0', $first)){
			$aux['0'] = $first;
			$result['return'] = $aux;
		}
		return $result;
	}
	
	//Categorias
	public function listaCategorias(){
		$client = new SoapClient("http://localhost:8080/ProdUNICAMPServices/services/Servicos?wsdl");
		$result = $client->getListCategoria();
		//$ret = array();
		//foreach ($result->return as $a){
		//	if ($a->supercategoria == ""){
		//		array_push($ret, $a->nome);
		//	}
		//}
		return $result;
	}
	
	// fabricantes
	public function listaFabricantes(){
		$client = new SoapClient("http://localhost:8080/ProdUNICAMPServices/services/Servicos?wsdl");
		$result = $client->getListFabricante();
		return $result;
	}
}
?>