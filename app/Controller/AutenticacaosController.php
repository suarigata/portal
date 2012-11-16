<?php
class AutenticacaosController extends AppController{
	
	public function index(){//o desloga nm retorna -5 nunca
		$this->set('desloga', $this->Autenticacao->desLogin("39715732828"));
		$this->set('desloga', $this->Autenticacao->desLogin("39715732828"));
		$this->set('loga', $this->Autenticacao->fazLogin('39715732828', 'sindos'));
	}
}