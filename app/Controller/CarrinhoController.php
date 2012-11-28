<?php
class CarrinhoController extends AppController{
	
	var $helpers = array('Form', 'Html', 'DezAstre');
	
	public function index(){
	}
	
	public function totalPrice(){//calcula o preรงo total das compras
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
		if (!empty($cods)){
			foreach ($cods as $chave => $value){
				if ($chave == $codigo){
					$cods[$chave]++;
					$new = false;
				}
			}
		}
		if ($new == true){
			$cods[$codigo] = 1;
			$produtos[$codigo] = $this->Produto->buscaCodigo($codigo);
			$produtoEstoque = $this->Estoque->currentPrice($codigo);
			$precos[$codigo] = $produtoEstoque['product']['price'];
			$produtoEstoque = $this->Estoque->currentQuantity($codigo);
			$qtds[$codigo] = $produtoEstoque['product']['quantity'];
		}		
		$this->colocaNaSessao($cods, $produtos, $precos, $qtds);
		$this->redirect(array('controller' => 'Carrinho', 'action' => 'listCarrinho'));
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
		$this->redirect(array('controller' => 'Carrinho', 'action' => 'listCarrinho'));
		}

	public function pegaDaSessao(){
		$cods = CakeSession::read('carrinho');
		$precos = CakeSession::read('precos');
		$qtds = CakeSession::read('qtds');
		$produtos = CakeSession::read('produtos');
		return array('cods' => $cods, 'precos' => $precos, 'qtds' => $qtds, 'produtos' => $produtos);
	}

	public function colocaNaSessao($cods, $produtos, $precos, $qtds){
		
		CakeSession::write('carrinho',$cods);
		CakeSession::write('precos',$precos);
		CakeSession::write('qtds',$qtds);
		CakeSession::write('produtos',$produtos);
		$this->set("cods",$cods);
		$this->set("precos",$precos);
		$this->set("qtds",$qtds);
		$this->set("produtos",$produtos);
	}

	public function limpaCarrinho(){
		CakeSession::delete('cods'); // TODO ver se faz sentido apagar esses dois primeiros que eu pus
		CakeSession::delete('precos');
		CakeSession::delete('carrinho');
		CakeSession::delete('produtos');
		$this->redirect(array('controller' => 'Carrinho', 'action' => 'listCarrinho'));
	}
	
	public function atualizaEstoqueLimpaCarrinho(){ // TODO checar se isso tแ funfando
		$this->loadModel('Estoque');
		$ret = $this->pegaDaSessao();
		$cods = $ret['cods'];
		
		if (!empty($cods)){
			foreach ($cods as $chave => $value){
				$this->Estoque->quantity($chave,-1*$value); // isso retorna 0 se funfou
			}
		}
		
		CakeSession::delete('cods');
		CakeSession::delete('precos');
		CakeSession::delete('carrinho');
		CakeSession::delete('produtos');
		$this->redirect(array('controller' => 'produtos'));
	}
}
?>