<?php
class AutenticacaosController extends AppController{
	
	public function index(){//o desloga nm retorna -5 nunca
		$this->set('desloga', $this->Autenticacao->desLogin("39715732828"));
		$this->set('desloga', $this->Autenticacao->desLogin("39715732828"));
		$this->set('loga', $this->Autenticacao->fazLogin('39715732828', 'sindos'));
	}
	
	public function add(){ // TODO Fazer o login aqui
		CakeSession::write('login',(CakeSession::read('login')+1)%2);
		
		$this->Session->write('nome','Alex Lucchesi');
		
		$this->redirect(array('controller' => 'homes', 'action' => 'index'));
	}
}