
<h2>CARRINHO</h2>

<?php
	echo $this->Html->link(
		$this->Form->button('Limpar Carrinho', array('type'=>'submit', 'style' => 'float: right; margin-left: 600px;')),
	  	array('controller' => 'carrinho', 'action' => 'limpaCarrinho'),
	  	array('escape' => false));

	foreach($cods as $chave => $qtd) {
		$produto = $produtos[$chave];
		foreach($produto as $chave2 => $value){
			echo '<div class="produto" style="float:left; margin: 10px; width: 100px;">';
			echo $this->Html->link(
				$this->Html->image($value['imagem'], array('width' => '100', 'height' => '100', 'alt' => $value['nome'])),
			  	array('controller' => 'produtos', 'action' => 'produtoPorCodigo', $value['codigo']),
			  	array('escape' => false));
			echo '</div>';
			
			echo '<div class="infos" style="float:left; margin: 10px; width: 550px; height: 100px;">';
			echo $this->Html->link($value['nome'], array('controller' => 'produtos', 'action' => 'produtoPorCodigo', $value['codigo']));
			echo '<br>Quantidade: ' . $this->Form->text('qtd', array('value' => $qtd, 'style' => 'width: 40px'));
			echo '</div>';
		}
	}

?>