<?php
class BancosController extends AppController{
	
	public function index(){
		$this->set('emitir', $this->Banco->emitirBoleto('Thiago', '10.0'));
		//$this->set('obter', $this->Banco->recuperarBoleto('180'));
		//$this->set('cancelar', $this->Banco->cancelarBoleto("207"));
	}
	
	public function gerarBoleto(){
		$this->layout = 'boleto';
		$boleto=CakeSession::read('boleto');
		$cliente=CakeSession::read('cliente');
		$valorDaCompra=CakeSession::read('totalCompra');
		//$boleto = $this->Banco->emitirBoleto($cliente['nome'], $valorDaCompra);
		//CakeSession::write('id_pg',$boleto->id);
		$this->set('boleto', $boleto);
		$this->set('id', $boleto->id);
		$this->set('cnpj', $boleto->contrato_convenio->cnpj);
		$this->set('razao', $boleto->contrato_convenio->razao_social);
		$this->set('endereco', $boleto->contrato_convenio->endereco);
		$this->set('cedente', $boleto->contrato_convenio->agencia_cedente);
		$this->set('valor', $boleto->valor);
		$this->set('vencimento', $boleto->data_vencimento);
		$this->set('criacao', $boleto->data_criacao);
		$this->set('cliente', $boleto->cliente);
		
	}
}
?>