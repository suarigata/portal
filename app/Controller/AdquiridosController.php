<?php 
class AdquiridosController extends AppController {
	public $helpers = array('Html', 'Form');
	
	public function index() {
	}
	
	public function details($id_pedido, $tipo, $id_pgt, $id_entrega) {
		$this->set('pedido', $id_pedido);
		$this->set('tipo', $tipo);
		$this->set('pgt', $id_pgt);
		$this->set('entrega', $id_entrega);
	}
}
?>