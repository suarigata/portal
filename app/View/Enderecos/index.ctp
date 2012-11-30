<!-- File: /app/View/Enderecos/index.ctp -->

<?php
print_r($buscaCep);
print_r($buscaEnd);

	echo '<h1>Endereço de Entrega</h1>';
	echo $buscaCep['tipo'] . " " . $buscaCep['logradouro'] . '<br>';
	echo $buscaCep['bairro'] . ', ' . $buscaCep['cidade'] . '-' . $buscaCep['uf'] . '<br>';
?>