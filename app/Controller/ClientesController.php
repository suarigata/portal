<?php
class ClientesController extends AppController{
	
	public function index(){
		$this->set('existe', $this->Cliente->clientExist("84585258523"));
		$this->set('addr', $this->Cliente->clientAddress("84585258523"));
		$this->set('dado', $this->Cliente->clientData("84585258523"));
	}
	
	public function dadosCliente(){
		$logado = CakeSession::read('cliente');
		$this->set('cliente', $this->Cliente->clientData($logado['cpf']));
	}
}