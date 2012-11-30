<?php
class CarrinhoController extends AppController{
	
	public $helpers = array('Js', 'Form', 'Html', 'DezAstre');
	
	public function index(){
	}
	
	public function totalPrice(){//calcula o preço total das compras
		$ret = $this->pegaDaSessao();
		$cods = $ret['cods'];
		$produtos = $ret['produtos'];
		
		$total = 0.0;
		$this->loadModel('Estoque');
		foreach($cods as $chave => $qtd) {
			$x = $this->Estoque->currentPrice($chave);
			$x = $x['product']['price'];
			$total = $total + $x;
		}
		return $total;
	}

	public function listCarrinho(){
		$ret = $this->pegaDaSessao();
		$cods = $ret['cods'];
		$precos = $ret['precos'];
		$produtos = $ret['produtos'];
		
		$total = 0.0;
		$this->loadModel('Estoque');
		if (!empty($cods)){
			foreach($cods as $chave => $qtd) {
				$x = $this->Estoque->currentPrice($chave);
				$x = $x['product']['price'];
				$total = $total + ($x*$qtd);
			}
		}
		CakeSession::write('valorDaCompra',$total);
		$this->set("cods",$cods);
		$this->set("produtos",$produtos);
		$this->set("precos",$precos);
		$this->set("total", $total);
	}
	
	public function addCarrinho($codigo,$incremento = 1,$redirect = 1){
		
		$this->loadModel('Estoque');
		$ret = $this->pegaDaSessao();
		$cods = $ret['cods'];
		$qtds = $ret['qtds'];
		$precos = $ret['precos'];
		$produtos = $ret['produtos'];
		if (!empty($cods) && $cods[$codigo]!=''){
			$cods[$codigo]+=$incremento;
			if($cods[$codigo]<1){
				$cods[$codigo]=0;
				// XXX talvez arranque do carrinho se zerar
				// $this->redirect(array('controller' => 'Carrinho', 'action' => 'removerItem',$codigo,$redirect)); //TODO talvez redirect
				// TODO quando for abrir o carrinho poderia arrancar itens zerados se n�o redirecionar acima
			}
		}
		else
			if($incremento==1){
				$cods[$codigo] = 1;
				$produtos[$codigo] = $this->Produto->buscaCodigo($codigo);
				$produtoEstoque = $this->Estoque->currentPrice($codigo);
				$precos[$codigo] = $produtoEstoque['product']['price'];
				$produtoEstoque = $this->Estoque->currentQuantity($codigo);
				$qtds[$codigo] = $produtoEstoque['product']['quantity'];
			}
		$this->colocaNaSessao($cods, $produtos, $precos, $qtds);
		if($redirect == 1)
			$this->redirect(array('controller' => 'Carrinho', 'action' => 'listCarrinho'));
		else
			$this->redirect(array('controller' => 'Carrinho', 'action' => 'itemQtd',$cods[$codigo]));
	}

	public function removerItem($codigo,$redirect = 1){
		$ret = $this->pegaDaSessao();
		$cods = $ret['cods'];
		$qtds = $ret['qtds'];
		$precos = $ret['precos'];
		$produtos = $ret['produtos'];
		
		$quantidade=$cods[$codigo];
		
		unset($cods[$codigo]);
		unset($precos[$codigo]);
		unset($qtds[$codigo]);
		unset($produtos[$codigo]);
		
		$this->colocaNaSessao($cods, $produtos, $precos, $qtds);
		if($redirect == 1)
			$this->redirect(array('controller' => 'Carrinho', 'action' => 'listCarrinho'));
		else
			$this->redirect(array('controller' => 'Carrinho', 'action' => 'itemQtd',0));
	}

	public function itemQtd($qtd){
		$this->layout="ajax";
		$this->set('qtd',$qtd);
	}
	
	public function pegaDaSessao(){
		$cods = CakeSession::read('carrinho');
		$precos = CakeSession::read('precos');
		$qtds = CakeSession::read('qtds');
		$produtos = CakeSession::read('produtos');
		return array('cods' => $cods, 'precos' => $precos, 'qtds' => $qtds, 'produtos' => $produtos);
	}

	public function colocaNaSessao($cods, $produtos, $precos, $qtds){
		
		CakeSession::write('carrinho',$cods);
		CakeSession::write('precos',$precos);
		CakeSession::write('qtds',$qtds);
		CakeSession::write('produtos',$produtos);
		$this->set("cods",$cods);
		$this->set("precos",$precos);
		$this->set("qtds",$qtds);
		$this->set("produtos",$produtos);
	}

	public function limpaCarrinho(){
		CakeSession::delete('cods'); // TODO ver se faz sentido apagar esses dois primeiros que eu pus
		CakeSession::delete('precos');
		CakeSession::delete('carrinho');
		CakeSession::delete('produtos');
		$this->redirect(array('controller' => 'Carrinho', 'action' => 'listCarrinho'));
	}
	
	public function atualizaEstoqueLimpaCarrinho(){ // TODO checar se isso t� funfando
		$this->loadModel('Estoque');
		$ret = $this->pegaDaSessao();
		$cods = $ret['cods'];
		
		if (!empty($cods)){
			foreach ($cods as $chave => $value){
				$this->Estoque->quantity($chave,-1*$value); // TODO se n�o retorna 0, rollback
			}
		}
		
		$this->loadModel('Pedido');
		$cliente = CakeSession::read('cliente');
		$forma = CakeSession::read('bandeira');
		if($forma == 'boleto'){
			$tipo = 0;
		}
		else $tipo = 1;
		$id = CakeSession::read('id_pg');
		$id_entrega = CakeSession::read('id_entrega');
		$destino = CakeSession::read('cep');
		$aux = array();
		$aux['cpf'] = $cliente['cpf'];
		$aux['id_pgmt'] = $id;
		$aux['id_entrega'] = $id_entrega;
		$aux['pagamento'] = $tipo;
		$aux['cep_entrega'] = $destino;
		//$aux = array(['cpf']=>$cliente['cpf'],['id_pgmt']=> $id, ['id_entrega']=>$id_entrega, ['pagamento'] =>$tipo);
		$pedido = array();
		$pedido['Pedido'] = $aux;
		$this->Pedido->save($pedido);
		
		CakeSession::delete('cods');
		CakeSession::delete('precos');
		CakeSession::delete('carrinho');
		CakeSession::delete('produtos');
		CakeSession::delete('bandeira');
		CakeSession::delete('cep');
		CakeSession::delete('valorDaCompra');
		CakeSession::delete('frete');
		CakeSession::delete('prazo');
		
		//$teste = CakeSession::read('tipo');
		$this->set('tipo', $forma);
		$this->set('id', $id);
		//$this->redirect(array('controller' => 'produtos'));
	}
}
?>