<?php
class ProdutosController extends AppController{
	
	public function index(){
		//dando pau//$this->set('produtoCod', $this->Produto->buscaCodigo(7891456622181));
		//ta estranho tbm//$this->set('listaProd', $this->Produto->buscaFiltro(null, "Informática", "phil", null,null));
		$this->set('listaCat', $this->Produto->listaCategorias());
		$this->set('listaFab', $this->Produto->listaFabricantes());
	}
}
?>