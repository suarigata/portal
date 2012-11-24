<?php
	if (!array_key_exists('faultcode', $produto)){
		$produto = $produto['return'];
		foreach($produto as $chave => $prod) {
			echo '<div class="image" style="float:left; margin: 10px;">
					<img src="' . $prod['imagem'] . '" width=200 height=200 alt="' . utf8_encode($prod['nome']) . '"/>
				  </div>';
			echo '<b>PRODUTO:</b> ' . utf8_encode($prod['nome']) . '<br>';
			echo '<b>PREÇO:</b> R$ ' . money_format('%.2n', $preco[$prod['codigo']]) . '<br>';
			echo '<b>FABRICANTE:</b> ' . utf8_encode($prod['fabricante']) . '<br>';
			echo '<b>DESCRICAO:</b> ' . utf8_encode($prod['descricao']) . '<br>';
			echo '<b>CÓDIGO:</b> ' . $prod['codigo'] . '<br>';
			echo '<b>ALTURA:</b> ' . $prod['altura'] . '<br>';
			echo '<b>LARGURA:</b> ' . $prod['largura'] . '<br>';
		}
	
		if ($qtd[$prod['codigo']] > 0){
			echo $this->Html->link(
				$this->Form->button('Comprar', array('type'=>'submit')),
			  	array('controller' => 'carrinho', 'action' => 'addCarrinho', $prod['codigo']),
			  	array('escape' => false));
		}else{
			echo '<br><b>Produto indisponível</b>';
		}
	}
?>