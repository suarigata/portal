<?php
class ClientesController extends AppController{
	
	public function index(){
		$this->set('existe', $this->Cliente->clientExist("96333921521"));
		$this->set('addr', $this->Cliente->clientAddress("96333921521"));
		$this->set('dado', $this->Cliente->clientData("96333921521"));
	}
}