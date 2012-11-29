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
			
	echo $this->Html->link(
		$this->Form->button('Acompanhar Compras', array('type'=>'submit', 'style' => 'float: left; margin-right: 600px;')),
	  	array('controller' => '', 'action' => ''),
	  	array('escape' => false));	
	  	
	echo $this->Html->link(
		$this->Form->button('Criar Ticket', array('type'=>'submit', 'style' => 'float: left; margin-right: 600px;')),
	  	array('controller' => 'atendimentos', 'action' => 'seleciona'),
	  	array('escape' => false)); 
	  	
	echo $this->Html->link(
		$this->Form->button('Consultar Tickets', array('type'=>'submit', 'style' => 'float: left; margin-right: 600px;')),
	  	array('controller' => 'atendimentos', 'action' => 'consulta'),
	  	array('escape' => false));  	  	 		
?>