
<?php
	echo '<h1>' . $nome . '</h1>';
	foreach($produtos as $chave => $produto) {
		echo '<div class="produto" style="float:left; margin: 10px; width: 200px;">';
		echo $this->Html->link(
			$this->Html->image($produto['imagem'], array('width' => '200', 'height' => '200', 'alt' => $produto['nome'])),
		  	array('controller' => 'produtos', 'action' => 'produtoPorCodigo', $produto['codigo']),
		  	array('escape' => false));
		echo $this->Html->link($produto['nome'], array('controller' => 'produtos', 'action' => 'produtoPorCodigo', $produto['codigo']));
		echo '</div>';
	}
?>
