<?php
class ProdutosController extends AppController{
	
	public function index(){
		//$this->set('produtoCod', $this->Produto->buscaCodigo(1));
		//$this->set('listaProd', $this->Produto->buscaFiltro(NULL, "brinquedos"));
		$this->set('listaCat', $this->Produto->listaCategoria());
		$this->set('listaFab', $this->Produto->listaFabricante());
	}
}
?>