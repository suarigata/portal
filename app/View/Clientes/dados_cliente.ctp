<!-- File: /app/View/Clientes/dadosCliente.ctp -->
<?php
	if ($cliente != "") {
			echo '<b>NOME:</b> ' . $cliente['nome'] . '<br><br>';
			echo '<b>CPF:</b> ' . utf8_encode($cliente['cpf']) . '<br><br>';
			echo '<b>NASCIMENTO:</b> ' . $cliente['data_nascimento'] . '<br><br>';
			echo '<b>PAI:</b> ' . $cliente['nome_pai'] . '<br><br>';
			echo '<b>MAE:</b> ' . $cliente['nome_mae'] . '<br><br>';
	}
	else
			echo '<b>Não há cliente logado</b>';
?>