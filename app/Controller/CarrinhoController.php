<?php
class CarrinhoController extends AppController{
	
	public function index(){
	}
	
	public function totalPrice(){//calcula o preço total das compras
		$cods = CakeSession::read('carrinho');
		$produtos = CakeSession::read('produtos');
		
		$total = 0.0;
		$this->loadModel('Estoque');
		foreach($cods as $chave => $qtd) {
			$x = $this->Estoque->currentPrice($chave);
			$x = $x['product'];
			$x = $x['price'];
			$total = $total + $x;
		}
		return total;
	}

	public function listCarrinho(){
		$cods = CakeSession::read('carrinho');
		$produtos = CakeSession::read('produtos');
		
		$total = 0.0;
		$this->loadModel('Estoque');
		foreach($cods as $chave => $qtd) {
			$x = $this->Estoque->currentPrice($chave);
			$x = $x['product'];
			$x = $x['price'];
			$total = $total + ($x*$qtd);
		}
		CakeSession::write('valorDaCompra',$total);
		$this->set("cods",$cods);
		$this->set("produtos",$produtos);
		$this->set("total", $total);
	}

	public function addCarrinho($codigo){
		$cods = CakeSession::read('carrinho');
		$produtos = CakeSession::read('produtos');
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
		}		
		$this->Session->setFlash($cods);
		$this->Session->setFlash($produtos);
		CakeSession::write('carrinho',$cods);
		CakeSession::write('produtos',$produtos);
		$this->set("cods",$cods);
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