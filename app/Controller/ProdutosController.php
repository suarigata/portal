<?php
class ProdutosController extends AppController{
	
	public function index(){
		// XXX codigo teste antigo
		//$this->set('produtoCod', $this->Produto->buscaCodigo("7891456622181"));
 		//$this->set('listaProd', $this->Produto->buscaFiltro('','Videogames','Nintendo','',''));
		//$this->set('listaCat', $this->Produto->listaCategorias());
		//$this->set('listaFab', $this->Produto->listaFabricantes());
		
		$produtos = $this->Produto->buscaFiltro('','Perfumes','','','');
		$this->set('produtos', $produtos);
		$this->set('precos', $this->doHashPrecos($produtos));
		$this->set('qtds', $this->doHashQuantidades($produtos));
	}
	
	public function produtosListPorCategoria($categoria){
		$produtos = $this->Produto->buscaFiltro('',$categoria,'','','');
		$this->set('nome', $categoria);
		$this->set('produtos', $produtos);
		$this->set('precos', $this->doHashPrecos($produtos));
		$this->set('qtds', $this->doHashQuantidades($produtos));
	}

	public function produtoPorCodigo($codigo){
		$produto = $this->Produto->buscaCodigo($codigo);
		$this->set('produto', $produto);
		$this->set('preco', $this->doHashPrecos($produto));
		$this->set('qtd', $this->doHashQuantidades($produto));
	}

	public function doHashPrecos($produtos){
		$precos = array();
		$this->loadModel('Estoque');
		if (!array_key_exists('faultcode', $produtos)){
			foreach($produtos['return'] as $chave => $produto) {
				$precos[] = $this->Estoque->currentPrice($produto['codigo']);
			}
		}
		$precosHash = array();
		foreach ($precos as $chave => $value){
			if ($value['status'] == 0){
				$val = $value['product'];
				$precosHash[$val['code']] = $val['price'];
			}
		}
		return $precosHash;
	}

	public function doHashQuantidades($produtos){
		$qtds = array();
		$this->loadModel('Estoque');
		if (!array_key_exists('faultcode', $produtos)){
			foreach($produtos['return'] as $chave => $produto) {
				$qtds[] = $this->Estoque->currentQuantity($produto['codigo']);
			}
		}
		$qtdsHash = array();
		foreach ($qtds as $chave => $value){
			if ($value['status'] == 0){
				$val = $value['product'];
				$qtdsHash[$val['code']] = $val['quantity'];
			}
		}
		return $qtdsHash;
	}
	
}
?>