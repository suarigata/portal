<?php
class CartaosController extends AppController{
	
	public function index(){
		//$this->set('validateTransaction', $this->Cartao->validaTransacao("344259359401285", "1"));
		//$this->set('parcelas', $this->Cartao->numParcelas('2000', 'AMEX'));
		//$this->set('realiza', $this->Cartao->realizaTransacao('1', 'AMEX', "5286028516049066", "Augusto Matraga", "12628161818", "890", "062014", "3"));
		//$this->set('cancel', $this->Cartao->cancelaTransacao(131));
		//$this->set('consulta', $this->Cartao->consultaTransacao('268'));
		//$this->set('consultall', $this->Cartao->consultarTodasTransacoes('', '','', '',''));
		//$this->set('bandeiras', $this->Cartao->consultarBandeiras());
		//$this->set('status', $this->Cartao->consultarStatus());
	}
	
	public function pagamento($tipo){
		$valorDaCompra=CakeSession::read('valorDaCompra');
		CakeSession::write('bandeira',$tipo);
		$parcelas = array();
		$x = $this->Cartao->numParcelas($valorDaCompra, $tipo);
		foreach($x as $tipo){
			$parcelas[] = $tipo['installments'];
		}
		$this->set('parcelas', $parcelas);
	}	
	
	public function efetua(){
		$cliente=CakeSession::read('cliente');
		$valorDaCompra=CakeSession::read('valorDaCompra');
		$bandeira=CakeSession::read('bandeira');
		$parcela = $this->request->data('parcela') +1;
		$this->set('parcelas', $parcela);
		$this->set('validate',$this->Cartao->realizaTransacao('10', $bandeira, $this->request->data('numero'), $cliente['nome'], $cliente['cpf'] , $this->request->data('codigo'), $this->request->data('validade'), $parcela));
	}
}
?>