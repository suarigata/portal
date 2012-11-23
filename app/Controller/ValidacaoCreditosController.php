<?php
class ValidacaoCreditosController extends AppController{
	
	public function index(){
		$this->set('validar', $this->ValidacaoCredito->validarCredito('84585258523'));
	}
	
	public function selecionaMetodo () {
		$Scores = array('A' => 30000, 'B' => 15000, 'C' => 10000, 'D' => 5000, 'X' => 0);
	
		$valorDaCompra=CakeSession::read('valorDaCompra');
		$cliente=CakeSession::read('cliente');
		$valido = $this->ValidacaoCredito->validarCredito($cliente['cpf']);
	
		if($valido['return']['error'] == ""){
			$this->loadModel('Cartao');
				
			$cartoes = $this->Cartao->consultarBandeiras();
				
			if ($Scores[$valido['return']['score']] >= $valorDaCompra)
				$cartoes['BOLETO'] = 'Boleto';
			else
				$cartoes = array('Boleto');
		}
		$this->set('pagamentos', $cartoes);
		$this->set('total', $valorDaCompra);
	}
}
?>