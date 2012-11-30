<?php
class ExemplosController extends AppController{
	
	public function index(){
		$this->set('exemplo', $this->Exemplo->teste());
		//$this->set('produtoCod', $this->Exemplo->buscaCodigo(1));
		//$this->set('listaProd', $this->Exemplo->buscaFiltro(NULL, "brinquedos"));
		//$this->set('listaCat', $this->Exemplo->listaCategoria());
		//$this->set('listaFab', $this->Exemplo->listaFabricante());
	}
}