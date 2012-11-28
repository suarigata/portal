<?php
class EntregasController extends AppController{
		
	public function index(){
		//$this->set('prazo', $this->Entrega->calculaCusto(13083852, 13035370, 1));
		//$this->set('trans', $this->Entrega->listaTransportadoras());
		//$this->set('nova', $this->Entrega->novaEntrega(14526738, 1, ));
		//$this->set('cancela', $this->Entrega->cancelarEntrega('1'));
		//$this->set('consulta', $this->Entrega->consultarEntrega(1));
	}
	
	public function calculaFrete(){
		$tipoEntrega = array('Sedex' => 1, 'e-Sedex' => 2, 'PAC' => 3, 'Fedex' => 4);
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
		$remetente = $this->request->data('remetente');
		$destino = $this->request->data('destino');
		$tipo = $this->request->data('tipoEntrega');
		
		//$this->set('car', $list);
		
		//Tem q descomenta a linha debaixo
		//$frete = $this->Entrega->calculaCusto($remetente, $destino, $tipoEntrega[$tipo], $list);
		//$this->set('frete', $frete);		
	}
}
?>