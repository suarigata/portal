<?php
class CartaosController extends AppController{
	
	public function index(){
		$this->set('bandeiras', $this->Cartao->consultarBandeiras());
		$this->set('status', $this->Cartao->consultarStatus());
		$this->set('parcelas', $this->Cartao->numParcelas('2000', 'MasterCard'));
	}
}
?>