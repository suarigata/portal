<?php
class AutenticacaosController extends AppController{
	
	public function index(){//o desloga nm retorna -5 nunca
		$this->set('desloga', $this->Autenticacao->desLogin("39715732828"));
		$this->set('desloga', $this->Autenticacao->desLogin("39715732828"));
		$this->set('loga', $this->Autenticacao->fazLogin('39715732828', 'sindos'));
	}
	
	public function add(){ // TODO Fazer o login aqui
		
		$login=$this->Autenticacao->fazLogin($this->request->data('login'),$this->request->data('password'));
		
		$flash=array(
				"Usu&aacute;rio logado com sucesso.",
				"CPF n&atilde;o existe na base.",
				"Senha inv&aacute;lida.",
				"CPF Bloqueado.",
				"Conta desativada.",
				10 => "Erro desconhecido.");
		
		$this->Session->setFlash($flash[abs($login)]);
		
		if($login==0){
			$this->loadModel('Cliente');
			// $login=$this->Cliente->clientData("84585258523"); // $this->request->data('login')); TODO fazer isso funfar 
			CakeSession::write('cliente',$login);
		}
		
		$this->redirect(array('controller' => 'homes', 'action' => 'index'));
	}
	
	public function del(){
		
		$flash=array(
				"Usu&aacute;rio deslogado com sucesso.",
				"CPF n&atilde;o existe na base.",
				5 => "Usu&aacute;rio n&atilde;o est&aacute; logado.",
				10 => "Erro desconhecido.");
		
		$this->Session->setFlash($flash[abs($login)]);
		
		//$login=$this->Autenticacao->desLogin(CakeSession::read('cliente')); TODO pegar cpf aqui
		
		CakeSession::delete('cliente');
		
		$this->redirect(array('controller' => 'homes', 'action' => 'index'));
	}
}