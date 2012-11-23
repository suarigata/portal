<?php
class BancosController extends AppController{
	
	public function index(){
		$this->set('emitir', $this->Banco->emitirBoleto('Thiago', '10.0'));
		//$this->set('obter', $this->Banco->recuperarBoleto('207'));
		//$this->set('cancelar', $this->Banco->cancelarBoleto("207"));
	}
	
	public function gerarBoleto(){
		$cliente=CakeSession::read('cliente');
		$valorDaCompra=CakeSession::read('valorDaCompra');
		$boleto = $this->Banco->emitirBoleto($cliente['nome'], $valorDaCompra);
		$this->set('boleto', $boleto);
	}
}
?>