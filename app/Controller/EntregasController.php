<?php
class EntregasController extends AppController{
		
	public function index(){
		//$this->set('prazo', $this->Entrega->calculaCusto(13083852, 13035370, 1));
		//$this->set('trans', $this->Entrega->listaTransportadoras());
		//$this->set('nova', $this->Entrega->novaEntrega(14526738, 1, ));
		//$this->set('cancela', $this->Entrega->cancelarEntrega('1'));
		$this->set('consultar', $this->Entrega->consultarEntrega(240));
	}
	
	public function calculaFrete(){
		$tipoEntrega = array('Sedex' => 1, 'e-Sedex' => 2, 'PAC' => 3, 'Fedex' => 4);
		$aux = array(1=>'Sedex',2=>'e-Sedex', 3=>'PAC',4=> 'Fedex');
		$cods = CakeSession::read('carrinho');
		$list = array();
		$i = 0;
		foreach ($cods as $prod => $qtd){
			$produtos = null;
			$produtos->id_produto = $prod;
			$produtos->quantidade = $qtd;
			$produtos->peso = 1.0;//tem q ver isso
			$produtos->volume = 1.0;//tem q ver isso	
			$list[$i] = $produtos;
			$i = $i + 1;
		}
		
		//$destino = $this->request->data('destino');
		$this->set('tipo', $aux);
		//$tipo = $this->request->data('tipoEntrega');
		
		if (!empty($this->data)) {
			if(!empty($this->data['Frete']['cep'])){
				$destino = $this->data['Frete']['cep'];
				CakeSession::write('cep',$destino);
			}
			/*else{
				$endereco = $this->data['Frete']['endereco'];
				$this->loadModel('Endereco');
				$destino = $this->Endereco->buscaEndereco('', '', '', '', $end,'');
			}*/
			$tipo = $this->data['Frete']['tipoEntrega'];
			CakeSession::write('tipoEntrega',$tipo);
			$frete = $this->Entrega->calculaCusto($destino, $tipo, $list);
			CakeSession::write('frete',$frete->frete);
			CakeSession::write('prazo',$frete->prazo);
			//$this->redirect(array('controller' => 'validacaoCreditos','action' => 'escolheFormaPagamento'));
			$valor = CakeSession::read('valorDaCompra');
			$valor = $valor + $frete->frete;
			CakeSession::write('totalCompra',$valor);
			$this->Session->setFlash('FRETE: R$ '.money_format('%.2n', $frete->frete).', com PRAZO de '.$frete->prazo.' dias. O valor total será de R$ '.money_format('%.2n', $valor).'.');
		}		
	}
	
	public function finalizaCompra(){
		$carrinho = CakeSession::read('carrinho');
		$destino = CakeSession::read('cep');
		$tipoEntrega = CakeSession::read('tipoEntrega');
		
		$list = array();
		$i = 0;
		foreach ($carrinho as $prod => $qtd){
			$produtos = null;
			$produtos->id_produto = $prod;
			$produtos->quantidade = $qtd;
			$produtos->peso = 1.0;//tem q ver isso
			$produtos->volume = 1.0;//tem q ver isso
			$list[$i] = $produtos;
			$i = $i + 1;
		}
		$tipo = CakeSession::read('bandeira');
		if($tipo == 'boleto'){
			$this->loadModel('Banco');
			$cliente = CakeSession::read('cliente');
			$valorDaCompra = CakeSession::read('totalCompra');
			$boleto = $this->Banco->emitirBoleto($cliente['nome'], $valorDaCompra);
			CakeSession::write('boleto',$boleto);
			CakeSession::write('id_pg',$boleto->id);
		}
		$entrega = $this->Entrega->novaEntrega($destino, $tipoEntrega, $list);
		CakeSession::write('id_entrega',$entrega);
		//$teste = $this->Entrega->consultarEntrega($entrega);
		//$this->set('tipo', $entrega);
		$this->redirect(array('controller' =>'carrinho','action' => 'atualizaEstoqueLimpaCarrinho'));
	}
}
?>