<?php 
class PedidosController extends AppController {
	public $helpers = array('Html', 'Form');
	
	public function index() {
		$orders = $this->Pedido->findAllByCpf(CakeSession::read('cliente')['cpf']);
		
		$this->loadModel('Banco');
		$this->loadModel('Cartao');
		$this->loadModel('Entrega');
		
		$info = array();
		$pgt = null;
		$boleto = array ('Cancelado', 'Compensado', 'Gerado', 'Pago', 'Retificado');
		
		$compra = '';
		$valor = 0;
		$data = 'data';
		
		foreach ($orders as $order) {
			if ($order['Pedido']['pagamento'] == 0) {
				$pgt = $this->Banco->recuperarBoleto(180);//$order['Pedido']['id_pgmt']);
				$compra = $boleto[$pgt->estado];
				$valor = $pgt->valor;
				$data = $pgt->data_criacao;
			}
			else {
				$pgt = $this->Cartao->consultaTransacao($order['Pedido']['id_pgmt']);
				$compra = $pgt['status'];
				$valor = $pgt['value'];
				$data = $pgt['date'];
			}
			
			$entrega = $this->Entrega->consultarEntrega(345);//$order['Pedido']['id_entrega']); 
			
			$info[] = array('id' => $order['Pedido']['id'], 'cpf' => $order['Pedido']['cpf'], 'data' => $data ,'valor' => $valor, 'compra' => $compra, 'entrega' => $entrega);
		}
		
		$this->set('pedidos', $info);
	}
}
?>