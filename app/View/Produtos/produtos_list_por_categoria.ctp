<?php
	echo '<h1>' . $nome . '</h1>';
	$produtos = $produtos['return'];
	if (!array_key_exists('faultcode', $produtos)){
		foreach($produtos as $chave2 => $produto) {
			echo '<div class="produto" style="float:left; margin: 10px; width: 200px;">';
			echo $this->Html->link(
				$this->Html->image($produto['imagem'], array('width' => '200', 'height' => '200', 'alt' => $produto['nome'])),
			  	array('controller' => 'produtos', 'action' => 'produtoPorCodigo', $produto['codigo']),
			  	array('escape' => false));
			echo $this->Html->link($produto['nome'], 
									array('controller' => 'produtos', 'action' => 'produtoPorCodigo', $produto['codigo']));
			if ($qtds[$produto['codigo']] > 0){
				echo $this->Html->link('<br>R$ '.money_format('%.2n', $precos[$produto['codigo']]), 
										array('controller' => 'produtos', 'action' => 'produtoPorCodigo', $produto['codigo']),
										array('escape' => false));
			}else{
				echo '<br><b>Produto indisponível</b>';
			}
			echo '</div>';
		}
	}
?>
