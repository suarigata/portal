<?php
class ProdutosController extends AppController{
	
	public function index(){
		//$this->set('produtoCod', $this->Produto->buscaCodigo("7891456622181"));
		$this->set('listaProd', $this->Produto->buscaFiltro('','Videogames','Nintendo','',''));
		//$this->set('listaCat', $this->Produto->listaCategorias());
		//$this->set('listaFab', $this->Produto->listaFabricantes());
	}
	
	public function produtosListPorCategoria($categoria){
		$produtos = $this->Produto->buscaFiltro('',$categoria,'','','');
		$precos = array();
		$qtds = array();
		$this->loadModel('Estoque');
		if ($produtos['faultcode'] == NULL){
			foreach($produtos as $chave => $prods) {
				foreach($prods as $chave2 => $produto) {
					$precos[] = $this->Estoque->currentPrice($produto['codigo']);
					$qtds[] = $this->Estoque->currentQuantity($produto['codigo']);
				}
			}
		}
		$precosHash = array();
		foreach ($precos as $chave => $value){
			if ($value['status'] == 0){
				$val = $value['product'];
				$precosHash[$val['code']] = $val['price'];
			}
		}
		$qtdsHash = array();
		foreach ($qtds as $chave => $value){
			if ($value['status'] == 0){
				$val = $value['product'];
				$qtdsHash[$val['code']] = $val['quantity'];
			}
		}
		
		$this->set('nome', $categoria);
		$this->set('produtos', $produtos);
		$this->set('precos', $precosHash);
		$this->set('qtds', $qtdsHash);
		
	}

	public function produtoPorCodigo($codigo){
		$this->set('produto', $this->Produto->buscaCodigo($codigo));
	}
}
?>