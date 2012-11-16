<?php
class ValidacaoCreditosController extends AppController{
	
	public function index(){
		$this->set('validar', $this->ValidacaoCredito->validarCredito('39715732828''));
	}
}
?>