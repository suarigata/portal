<?php
class ValidacaoCreditosController extends AppController{
	
	public function index(){
		$this->set('validar', $this->ValidacaoCredito->validarCredito('84585258523'));
	}
	
	public function escolheFormaPagamento () {
		$cliente=CakeSession::read('cliente');
		$frete=CakeSession::read('frete');
		if ($cliente != "" && $frete != "") {	
			$scores = array('A' => 30000, 'B' => 15000, 'C' => 10000, 'D' => 5000, 'X' => 0);
		
			$valorDaCompra=CakeSession::read('valorDaCompra');
			
			$valido = $this->ValidacaoCredito->validarCredito($cliente['cpf']);
		
			if($valido['return']['error'] == ""){
				$this->loadModel('Cartao');
					
				$cartoes = $this->Cartao->consultarBandeiras();
					
				if ($scores[$valido['return']['score']] >= $valorDaCompra)
					$cartoes['BOLETO'] = 'Boleto';
				else
					$cartoes = array('Boleto');
			}
			$this->set('pagamentos', $cartoes);
			$this->set('total', $valorDaCompra);
		}
		else {
			if($cliente == ""){
				$this->Session->setFlash('Você não está logado, por favor realize login para continuar');
				$this->redirect(array('controller' => 'Carrinho', 'action' => 'listCarrinho'));
			}
			else{
				$this->Session->setFlash('Calcule o frete primeiro');
				$this->redirect(array('controller' => 'Entregas', 'action' => 'calculaFrete'));
			}
		}
	}
}
?>