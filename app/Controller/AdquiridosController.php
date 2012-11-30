<?php 
class AdquiridosController extends AppController {
	public $helpers = array('Html', 'Form');
	
	public function index() {
	}
	
	public function details($id_pedido) {
		$cliente=CakeSession::read('cliente');
		$cpf = $cliente['cpf'];
		
		$this->loadModel('Pedido');
		$this->loadModel('Banco');
		$this->loadModel('Cartao');
		$this->loadModel('Entrega');
		$this->loadModel('Produto');
		$this->loadModel('Endereco');
		
		$order = $this->Pedido->findById($id_pedido);
		
		$compra = '';
		$valor = 0;
		$data = 'data';

		if ($order['Pedido']['pagamento'] == 0) {
			$pgt = $this->Banco->recuperarBoleto($order['Pedido']['id_pgmt']);
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
		
		$entrega = $this->Entrega->consultarEntrega($order['Pedido']['id_entrega']);
		
		$products = $this->Adquirido->findByIdPedido($id_pedido);
		
		$list = array();
		
		foreach ($products as $product) {
			$list[] = array('Produto' => $this->Produto->buscaCodigo($produto['cod_produto']), 'cod' => $produto['cod_produto'], 'Qnt' => $product['quantidade']);
		}
		
		$this->set('endereco', $this->Endereco->buscaCep($order['cep_entrega']));
		$this->set('pedido', array('id' => $id_pedido, 'cpf' => $cpf, 'valor' => $valor, 'compra' => $compra, 'data' => data));
		$this->set('produtos', $list);
	}
}
?>