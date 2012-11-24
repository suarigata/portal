<?php
	$produto = $produto['return'];
	if (!array_key_exists('faultcode', $produto)){
		foreach($produto as $chave => $prod) {
			echo '<div class="image" style="float:left; margin: 10px;">
					<img src="' . $prod['imagem'] . '" width=200 height=200 alt="' . $prod['nome'] . '"/>
				  </div>';
			echo '<b>PRODUTO:</b> ' . $prod['nome'] . '<br>';
			echo '<b>PREÇO:</b> R$ ' . money_format('%.2n', $preco[$prod['codigo']]) . '<br>';
			echo '<b>FABRICANTE:</b> ' . $prod['fabricante'] . '<br>';
			echo '<b>DESCRICAO:</b> ' . $prod['descricao'] . '<br>';
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