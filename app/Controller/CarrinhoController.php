<?php
class CarrinhoController extends AppController{
	
	public function index(){
	}
	
	public function totalPrice(){//calcula o preço total das compras
		$ret = $this->pegaDaSessao();
		$cods = $ret['cods'];
		$produtos = $ret['produtos'];
		
		$total = 0.0;
		$this->loadModel('Estoque');
		foreach($cods as $chave => $qtd) {
			$x = $this->Estoque->currentPrice($chave);
			$x = $x['product']['price'];
			$total = $total + $x;
		}
		return $total;
	}

	public function listCarrinho(){
		$ret = $this->pegaDaSessao();
		$cods = $ret['cods'];
		$precos = $ret['precos'];
		$produtos = $ret['produtos'];
		
		$total = 0.0;
		$this->loadModel('Estoque');
		if (!empty($cods)){
			foreach($cods as $chave => $qtd) {
				$x = $this->Estoque->currentPrice($chave);
				$x = $x['product']['price'];
				$total = $total + ($x*$qtd);
			}
		}
		CakeSession::write('valorDaCompra',$total);
		$this->set("cods",$cods);
		$this->set("produtos",$produtos);
		$this->set("precos",$precos);
		$this->set("total", $total);
	}

	public function addCarrinho($codigo){
		$this->loadModel('Estoque');
		$ret = $this->pegaDaSessao();
		$cods = $ret['cods'];
		$qtds = $ret['qtds'];
		$precos = $ret['precos'];
		$produtos = $ret['produtos'];
		$new = true;
		foreach ($cods as $chave => $value){
			if ($chave == $codigo){
				$cods[$chave]++;
				$new = false;
			}
		}
		if ($new == true){
			$cods[$codigo] = 1;
			$produtos[$codigo] = $this->Produto->buscaCodigo($codigo);
			$produtoEstoque = $this->Estoque->currentPrice($codigo);
			$precos[$codigo] = $produtoEstoque['product']['price'];
			$qtds[$codigo] = $produtoEstoque['product']['quantity'];
		}		
		$this->colocaNaSessao($cods, $produtos, $precos, $qtds);
	}

	public function removerItem($codigo){
		$ret = $this->pegaDaSessao();
		$cods = $ret['cods'];
		$qtds = $ret['qtds'];
		$precos = $ret['precos'];
		$produtos = $ret['produtos'];
				
		unset($cods[$codigo]);
		unset($precos[$codigo]);
		unset($qtds[$codigo]);
		unset($produtos[$codigo]);
		
		$this->colocaNaSessao($cods, $produtos, $precos, $qtds);
	}

	public function pegaDaSessao(){
		$cods = CakeSession::read('carrinho');
		$precos = CakeSession::read('precos');
		$qtds = CakeSession::read('qtds');
		$produtos = CakeSession::read('produtos');
		return array('cods' => $cods, 'precos' => $precos, 'qtds' => $qtds, 'produtos' => $produtos);
	}

	public function colocaNaSessao($cods, $produtos, $precos, $qtds){
		$this->Session->setFlash($cods);
		$this->Session->setFlash($precos);
		$this->Session->setFlash($qtds);
		$this->Session->setFlash($produtos);
		CakeSession::write('carrinho',$cods);
		CakeSession::write('precos',$precos);
		CakeSession::write('qtds',$qtds);
		CakeSession::write('produtos',$produtos);
		$this->set("cods",$cods);
		$this->set("precos",$precos);
		$this->set("qtds",$qtds);
		$this->set("produtos",$produtos);
		$this->redirect(array('controller' => 'Carrinho', 'action' => 'listCarrinho'));
	}

	public function limpaCarrinho(){
		CakeSession::delete('carrinho');
		CakeSession::delete('produtos');
		$this->redirect(array('controller' => 'Carrinho', 'action' => 'listCarrinho'));
	}
}
?>