<?php
class AutenticacaosController extends AppController{
	
	public function index(){
		$this->set('desloga', $this->Autenticacao->desLogin("39715732828"));
		$this->set('loga', $this->Autenticacao->fazLogin('39715732828', 'sindos'));
	}
	
	public function add(){
		
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
			$login=$this->Cliente->clientData($this->request->data('login'));
			CakeSession::write('cliente',$login);
		}
		
		$this->redirect($this->request->data('login_from_url'));
	}
	
	public function del(){
		
		$flash=array(
				"Usu&aacute;rio deslogado com sucesso.",
				"CPF n&atilde;o existe na base.",
				5 => "Usu&aacute;rio n&atilde;o est&aacute; logado.",
				10 => "Erro desconhecido.");
		
		$cliente=CakeSession::read('cliente');
		$login=$this->Autenticacao->desLogin($cliente['cpf']);
		
		$this->Session->setFlash($flash[abs($login)]);
		
		CakeSession::delete('cliente');
		
		$this->redirect(array('controller' => 'produtos'));
	}
}