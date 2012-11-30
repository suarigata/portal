<?php
class EnderecosController extends AppController{
	
	public function index(){
		$this->set('buscaCep', $this->Endereco->buscaCep("13083852"));
		//$this->set('buscaEnd', $this->Endereco->buscaEndereco("","","","","Osório Alves",""));
	}
}