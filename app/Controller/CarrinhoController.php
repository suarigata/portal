<?php
class CarrinhoController extends AppController{
	
	public function index(){
	}

	public function listCarrinho(){
		$cods = CakeSession::read('carrinho');
		$produtos = CakeSession::read('produtos');
		$this->set("cods",$cods);
		$this->set("produtos",$produtos);
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