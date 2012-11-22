<?php
class ProdutosController extends AppController{
	
	public function index(){
		//$this->set('produtoCod', $this->Produto->buscaCodigo("7891456622181"));
		$this->set('listaProd', $this->Produto->buscaFiltro('','Videogames','Nintendo','',''));
		//$this->set('listaCat', $this->Produto->listaCategorias());
		//$this->set('listaFab', $this->Produto->listaFabricantes());
	}
	
	public function buscaPorCategoria($categoria){
		$this->set('listaProd', $this->Produto->buscaFiltro('',$categoria,'','',''));
		//$this->set('nome', $categoria);
	}
}
?>