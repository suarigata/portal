<?php
class BancosController extends AppController{
	
	public function index(){
		$this->set('emitir', $this->Banco->emitirBoleto('Thiago', '10.0'));
		//$this->set('obter', $this->Banco->obterBoleto('170'));
		$this->set('cancelar', $this->Banco->cancelarBoleto("170"));
	}
}
?>