<?php
class BancosController extends AppController{
	
	public function index(){
		$this->set('emitir', $this->Banco->emitirBoleto("Thiago", 10.0));
		$this->set('obter', $this->Banco->obterBoleto(1));
		$this->set('cancelar', $this->Banco->cancelarBoleto(1));
	}
}