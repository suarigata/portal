<!-- File: /app/View/Produtos/index.ctp -->

<?php
// XXX Codigo antigo para teste
//print_r($produtoCod);
//print_r($listaProd);
//print_r($listaCat);
//print_r($listaFab);
?>

<?php
	if (!array_key_exists('faultcode', $produtos)){
		$produtos = $produtos['return'];
		foreach($produtos as $chave2 => $produto) {
			echo '<div class="produto" style="float:left; margin: 10px; width: 200px;">';
			echo $this->Html->link(
				$this->Html->image($produto['imagem'], array('width' => '200', 'height' => '200', 'alt' => utf8_encode($produto['nome']))),
			  	array('controller' => 'produtos', 'action' => 'produtoPorCodigo', $produto['codigo']),
			  	array('escape' => false));
			echo $this->Html->link(utf8_encode($produto['nome']), 
									array('controller' => 'produtos', 'action' => 'produtoPorCodigo', $produto['codigo']));
			if ($qtds[$produto['codigo']] > 0){
				echo $this->Html->link('<br>R$ '.money_format('%.2n', $precos[$produto['codigo']]), 
										array('controller' => 'produtos', 'action' => 'produtoPorCodigo', $produto['codigo']),
										array('escape' => false));
			}else{
				echo '<br><b>Produto indispon&iacute;­vel</b>';
			}
			echo '</div>';
		}
	}
?>