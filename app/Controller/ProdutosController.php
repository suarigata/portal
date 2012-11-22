<?php
class ProdutosController extends AppController{
	
	public function index(){
		//$this->set('produtoCod', $this->Produto->buscaCodigo("7891456622181"));
		$this->set('listaProd', $this->Produto->buscaFiltro('','Videogames','Nintendo','',''));
		//$this->set('listaCat', $this->Produto->listaCategorias());
		//$this->set('listaFab', $this->Produto->listaFabricantes());
	}
	
	public function produtosListPorCategoria($categoria){
		$this->set('nome', $categoria);
		$this->set('produtos', $this->Produto->buscaFiltro('',$categoria,'','',''));
	}

	public function produtoPorCodigo($codigo){
		$this->set('produto', $this->Produto->buscaCodigo($codigo));
	}
}
?>