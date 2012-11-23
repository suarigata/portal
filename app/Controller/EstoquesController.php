<?php
class EstoquesController extends AppController{
	
	public function index(){
		$this->set('currentQuantity', $this->Estoque->currentQuantity("1010"));
		$this->set('currentPrice', $this->Estoque->currentPrice("1010"));
		$this->set('currentInfo', $this->Estoque->currentInfo("1010"));
		$this->set('quantity', $this->Estoque->quantity("1010",2));
	}
}