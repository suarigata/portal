<?php
	foreach($produto as $chave => $prod) {
		echo '<div class="image" style="float:left; margin: 10px;">
				<img src="' . $prod['imagem'] . '" width=200 height=200 alt="' . $prod['nome'] . '"/>
			  </div>';
		echo '<b>PRODUTO:</b> ' . $prod['nome'] . '<br>';
		echo '<b>FABRICANTE:</b> ' . $prod['fabricante'] . '<br>';
		echo '<b>DESCRICAO:</b> ' . $prod['descricao'] . '<br>';
		echo '<b>CÓDIGO:</b> ' . $prod['codigo'] . '<br>';
		echo '<b>ALTURA:</b> ' . $prod['altura'] . '<br>';
		echo '<b>LARGURA:</b> ' . $prod['largura'] . '<br>';
	}
?>
