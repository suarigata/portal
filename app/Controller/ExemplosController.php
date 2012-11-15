<?php
class ExemplosController extends AppController{
	
	public function index(){
		$this->set('exemplo', $this->Exemplo->teste());
	}
}