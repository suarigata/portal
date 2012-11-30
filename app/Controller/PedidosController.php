<?php 
class PedidosController extends AppController {
	public $helpers = array('Html', 'Form');
	
	public function index() {
		$this->set('pedidos', $this->Pedido->find('all'));
	}
}
?>